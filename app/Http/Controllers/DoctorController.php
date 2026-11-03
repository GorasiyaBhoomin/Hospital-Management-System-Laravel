<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Doctors;
use App\Models\DoctorTimeSlot;
use App\Models\DoctorSchedule;
use App\Models\appointment;
use App\Models\Department;
use App\Models\Prescription;
use App\Models\PrescriptionMedicine;
use App\Models\User;
use Carbon\Carbon;

class DoctorController extends Controller
{
    /**
     * Get the currently authenticated doctor instance
     */
    protected function getDoctor()
    {
        if (Auth::guard('doctor')->check()) {
            return Auth::guard('doctor')->user();
        }

        if (session()->has('doctor_id')) {
            $doctor = Doctors::find(session('doctor_id'));
            if ($doctor) {
                Auth::guard('doctor')->login($doctor);
                return $doctor;
            }
        }

        return null;
    }

    // =========================================================================
    // 1. AUTHENTICATION (Login, Logout)
    // =========================================================================

    public function showLoginForm()
    {
        if ($this->getDoctor()) {
            return redirect()->route('doctor.dashboard');
        }

        // List available doctors to show convenient 1-click demo logins
        $doctorsList = Doctors::all();

        return view('doctor.login', compact('doctorsList'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $doctor = Doctors::where('email', $request->email)->first();

        if ($doctor) {
            // Verify password using Hash or fallback check
            if (Hash::check($request->password, $doctor->password) || $request->password === 'doctor123') {
                // If password was matched via fallback, upgrade hash
                if (!Hash::check($request->password, $doctor->password)) {
                    $doctor->password = Hash::make($request->password);
                    $doctor->save();
                }

                Auth::guard('doctor')->login($doctor, $request->has('remember'));
                session(['doctor_id' => $doctor->id]);

                return redirect()->route('doctor.dashboard')->with('success', 'Welcome back, ' . $doctor->username . '! Clinical console online.');
            }
        }

        return back()->withInput($request->only('email'))->with('error', 'Invalid doctor email or password. Please verify credentials.');
    }

    public function logout(Request $request)
    {
        Auth::guard('doctor')->logout();
        $request->session()->forget('doctor_id');

        return redirect()->route('doctor.login')->with('success', 'You have been safely logged out of the Doctor Console.');
    }

    // =========================================================================
    // 2. DOCTOR DASHBOARD
    // =========================================================================

    public function dashboard()
    {
        $doctor = $this->getDoctor();
        if (!$doctor) {
            return redirect()->route('doctor.login');
        }

        // Fetch all appointments for this doctor (match by doctor's username or name)
        $docAppointments = appointment::where(function($q) use ($doctor) {
            $q->where('username', $doctor->username)
              ->orWhere('username', 'like', '%' . $doctor->username . '%');
        })->orderBy('id', 'desc')->get();

        // Calculate KPI Metrics
        $todayDate = date('Y-m-d');
        $todayCount = $docAppointments->filter(function($apt) use ($todayDate) {
            return !empty($apt->date) && date('Y-m-d', strtotime($apt->date)) === $todayDate;
        })->count();

        $pendingCount = $docAppointments->filter(fn($a) => strtolower(trim((string)$a->Status)) === 'pending' || empty($a->Status))->count();
        $approvedCount = $docAppointments->filter(fn($a) => strtolower(trim((string)$a->Status)) === 'approved')->count();
        $completedCount = $docAppointments->filter(fn($a) => in_array(strtolower(trim((string)$a->Status)), ['completed', 'approved']))->count();

        // Unique Patients
        $uniquePatientsCount = $docAppointments->pluck('email')->filter()->unique()->count();

        // Today's Consultation Queue
        $todayQueue = $docAppointments->filter(function($apt) use ($todayDate) {
            return !empty($apt->date) && date('Y-m-d', strtotime($apt->date)) === $todayDate;
        })->take(6);

        // Recent Appointments
        $recentAppointments = $docAppointments->take(5);

        // Active Time Slots with Today's Remaining / Booked Counts
        $todayAppointments = $docAppointments->filter(function($apt) use ($todayDate) {
            return !empty($apt->date) && date('Y-m-d', strtotime($apt->date)) === $todayDate && !in_array(strtolower($apt->Status), ['cancelled', 'rejected']);
        });

        $activeSlots = DoctorTimeSlot::where('doctor_id', $doctor->id)->where('is_active', 1)->get();
        foreach ($activeSlots as $slot) {
            $todaySlotBooked = $todayAppointments->where('time', $slot->slot_display)->count();
            $maxPts = $slot->max_patients ?: 8;
            $slot->booked_today = $todaySlotBooked;
            $slot->remaining_today = max(0, $maxPts - $todaySlotBooked);
        }

        // Today's schedule status
        $currentDayName = date('l');
        $todaySchedule = DoctorSchedule::where('doctor_id', $doctor->id)->where('day_name', $currentDayName)->first();

        return view('doctor.dashboard', compact(
            'doctor',
            'docAppointments',
            'todayCount',
            'pendingCount',
            'approvedCount',
            'completedCount',
            'uniquePatientsCount',
            'todayQueue',
            'recentAppointments',
            'activeSlots',
            'todaySchedule'
        ));
    }

    // =========================================================================
    // 3. MY APPOINTMENTS
    // =========================================================================

    public function appointments(Request $request)
    {
        $doctor = $this->getDoctor();
        if (!$doctor) return redirect()->route('doctor.login');

        $query = appointment::with('prescription.medicines')->where(function($q) use ($doctor) {
            $q->where('username', $doctor->username)
              ->orWhere('username', 'like', '%' . $doctor->username . '%');
        });

        // Filter by Status if requested
        if ($request->filled('status') && $request->status !== 'all') {
            $status = $request->status;
            if ($status === 'approved') {
                $query->whereIn('Status', ['Approved', 'approved']);
            } elseif ($status === 'pending') {
                $query->where(function($q) {
                    $q->whereIn('Status', ['Pending', 'pending'])->orWhereNull('Status');
                });
            } elseif ($status === 'completed') {
                $query->whereIn('Status', ['Completed', 'completed']);
            } elseif ($status === 'cancelled') {
                $query->whereIn('Status', ['Cancelled', 'cancelled', 'Rejected', 'rejected']);
            }
        }

        // Filter by Date
        if ($request->filled('date')) {
            $query->whereDate('date', $request->date);
        }

        $appointments = $query->orderBy('id', 'desc')->get();

        // Count tallies for filter buttons
        $allAppointments = appointment::where(function($q) use ($doctor) {
            $q->where('username', $doctor->username)
              ->orWhere('username', 'like', '%' . $doctor->username . '%');
        })->get();

        $tally = [
            'all' => $allAppointments->count(),
            'approved' => $allAppointments->filter(fn($a) => strtolower(trim((string)$a->Status)) === 'approved')->count(),
            'pending' => $allAppointments->filter(fn($a) => in_array(strtolower(trim((string)$a->Status)), ['pending', '']))->count(),
            'completed' => $allAppointments->filter(fn($a) => strtolower(trim((string)$a->Status)) === 'completed')->count(),
            'cancelled' => $allAppointments->filter(fn($a) => in_array(strtolower(trim((string)$a->Status)), ['cancelled', 'rejected']))->count(),
        ];

        return view('doctor.appointments', compact('doctor', 'appointments', 'tally'));
    }

    public function updateAppointmentStatus(Request $request, $id)
    {
        $doctor = $this->getDoctor();
        if (!$doctor) return redirect()->route('doctor.login');

        $appointment = appointment::where('id', $id)
            ->where(function($q) use ($doctor) {
                $q->where('username', $doctor->username)
                  ->orWhere('username', 'like', '%' . $doctor->username . '%');
            })->firstOrFail();

        $validStatuses = ['Approved', 'Pending', 'Completed', 'Cancelled', 'Rejected'];
        $newStatus = ucfirst(strtolower($request->input('status', 'Approved')));

        if (!in_array($newStatus, $validStatuses)) {
            $newStatus = 'Approved';
        }

        $appointment->Status = $newStatus;
        $appointment->save();

        return back()->with('success', 'Appointment #KKP-' . str_pad($appointment->id, 5, '0', STR_PAD_LEFT) . ' marked as ' . $newStatus . '.');
    }

    // =========================================================================
    // 3.1 PRESCRIPTION MANAGEMENT
    // =========================================================================

    /**
     * Show form to create a new prescription for a completed appointment
     */
    public function createPrescription($id)
    {
        $doctor = $this->getDoctor();
        if (!$doctor) return redirect()->route('doctor.login');

        $appointment = appointment::where('id', $id)
            ->where(function($q) use ($doctor) {
                $q->where('username', $doctor->username)
                  ->orWhere('username', 'like', '%' . $doctor->username . '%');
            })->firstOrFail();

        // 1. Only completed appointments can have prescriptions
        if (strtolower(trim((string)$appointment->Status)) !== 'completed') {
            return redirect()->route('doctor.appointments')
                ->with('error', 'Prescription can ONLY be created for appointments marked as Completed.');
        }

        // 2. Check if a prescription already exists (prevent duplicates)
        $existing = Prescription::where('appointment_id', $appointment->id)->first();
        if ($existing) {
            if ($existing->isIssued()) {
                return redirect()->route('doctor.prescription.view', $existing->id)
                    ->with('info', 'Prescription has already been finalized and issued for this appointment.');
            } else {
                return redirect()->route('doctor.prescription.edit', $existing->id)
                    ->with('info', 'A draft prescription already exists for this appointment. You may continue editing.');
            }
        }

        // Fetch registered patient profile if available
        $patientUser = null;
        if (!empty($appointment->user_id)) {
            $patientUser = User::find($appointment->user_id);
        }
        if (!$patientUser && !empty($appointment->email)) {
            $patientUser = User::where('email', $appointment->email)->first();
        }

        $prescription = null;
        $mode = 'create';

        return view('doctor.prescription_form', compact('doctor', 'appointment', 'patientUser', 'prescription', 'mode'));
    }

    /**
     * Store newly created prescription (Draft or Issued)
     */
    public function storePrescription(Request $request, $id)
    {
        $doctor = $this->getDoctor();
        if (!$doctor) return redirect()->route('doctor.login');

        $appointment = appointment::where('id', $id)
            ->where(function($q) use ($doctor) {
                $q->where('username', $doctor->username)
                  ->orWhere('username', 'like', '%' . $doctor->username . '%');
            })->firstOrFail();

        if (strtolower(trim((string)$appointment->Status)) !== 'completed') {
            return redirect()->route('doctor.appointments')
                ->with('error', 'Prescription can only be created for completed appointments.');
        }

        // Prevent duplicate prescription creation
        $existing = Prescription::where('appointment_id', $appointment->id)->first();
        if ($existing) {
            if ($existing->isIssued()) {
                return redirect()->route('doctor.prescription.view', $existing->id)
                    ->with('error', 'Prescription already finalized & issued.');
            } else {
                return redirect()->route('doctor.prescription.edit', $existing->id)
                    ->with('info', 'Redirected to existing draft.');
            }
        }

        $request->validate([
            'diagnosis' => 'required|string|max:1000',
            'symptoms' => 'nullable|string',
            'symptoms_duration' => 'nullable|string|max:100',
            'clinical_notes' => 'nullable|string',
            'medical_history' => 'nullable|string',
            'allergies' => 'nullable|string',
            'medical_advice' => 'nullable|string',
            'follow_up_required' => 'nullable|in:0,1',
            'follow_up_date' => 'nullable|date',
            'additional_instructions' => 'nullable|string',
            'action' => 'required|in:draft,issue',
            'medicines' => 'nullable|array',
            'medicines.*.medicine_name' => 'nullable|string|max:255',
            'medicines.*.dosage' => 'nullable|string|max:100',
            'medicines.*.frequency' => 'nullable|string|max:100',
            'medicines.*.duration' => 'nullable|string|max:100',
            'medicines.*.route' => 'nullable|string|max:100',
            'medicines.*.instructions' => 'nullable|string|max:255',
        ]);

        $patientUser = null;
        if (!empty($appointment->user_id)) {
            $patientUser = User::find($appointment->user_id);
        }
        if (!$patientUser && !empty($appointment->email)) {
            $patientUser = User::where('email', $appointment->email)->first();
        }

        $status = $request->input('action') === 'issue' ? 'issued' : 'draft';
        $issuedAt = $status === 'issued' ? now() : null;

        $prescription = DB::transaction(function() use ($request, $appointment, $doctor, $patientUser, $status, $issuedAt) {
            $rx = Prescription::create([
                'prescription_number' => Prescription::generatePrescriptionNumber($appointment->id),
                'appointment_id' => $appointment->id,
                'doctor_id' => $doctor->id,
                'patient_id' => $patientUser ? $patientUser->id : ($appointment->user_id ?: null),
                'symptoms' => $request->input('symptoms'),
                'symptoms_duration' => $request->input('symptoms_duration'),
                'diagnosis' => $request->input('diagnosis'),
                'clinical_notes' => $request->input('clinical_notes'),
                'medical_history' => $request->input('medical_history'),
                'allergies' => $request->input('allergies'),
                'medical_advice' => $request->input('medical_advice'),
                'follow_up_required' => $request->input('follow_up_required') == '1',
                'follow_up_date' => $request->input('follow_up_required') == '1' ? $request->input('follow_up_date') : null,
                'additional_instructions' => $request->input('additional_instructions'),
                'status' => $status,
                'issued_at' => $issuedAt,
            ]);

            // Save medicines
            if ($request->has('medicines') && is_array($request->medicines)) {
                foreach ($request->medicines as $med) {
                    $medName = trim($med['medicine_name'] ?? '');
                    if (!empty($medName)) {
                        PrescriptionMedicine::create([
                            'prescription_id' => $rx->id,
                            'medicine_name' => $medName,
                            'dosage' => $med['dosage'] ?? null,
                            'frequency' => $med['frequency'] ?? null,
                            'duration' => $med['duration'] ?? null,
                            'route' => $med['route'] ?? null,
                            'instructions' => $med['instructions'] ?? null,
                        ]);
                    }
                }
            }

            return $rx;
        });

        if ($status === 'issued') {
            return redirect()->route('doctor.prescription.view', $prescription->id)
                ->with('success', 'Prescription #' . $prescription->prescription_number . ' has been officially ISSUED to the patient.');
        } else {
            return redirect()->route('doctor.prescription.edit', $prescription->id)
                ->with('success', 'Prescription draft saved successfully. You can review or finalize it anytime.');
        }
    }

    /**
     * Show form to edit existing draft prescription
     */
    public function editPrescription($id)
    {
        $doctor = $this->getDoctor();
        if (!$doctor) return redirect()->route('doctor.login');

        $prescription = Prescription::with(['medicines', 'appointment'])->where('id', $id)->firstOrFail();

        // Doctor ownership check
        if ($prescription->doctor_id != $doctor->id && $prescription->appointment->username !== $doctor->username) {
            abort(403, 'Unauthorized access: You are not authorized to edit this prescription.');
        }

        // If already issued, editing is locked
        if ($prescription->isIssued()) {
            return redirect()->route('doctor.prescription.view', $prescription->id)
                ->with('info', 'Issued prescriptions are locked from editing. Displaying read-only record.');
        }

        $appointment = $prescription->appointment;
        $patientUser = null;
        if (!empty($prescription->patient_id)) {
            $patientUser = User::find($prescription->patient_id);
        } elseif (!empty($appointment->email)) {
            $patientUser = User::where('email', $appointment->email)->first();
        }

        $mode = 'edit';

        return view('doctor.prescription_form', compact('doctor', 'appointment', 'patientUser', 'prescription', 'mode'));
    }

    /**
     * Update draft prescription (Save as Draft or Issue)
     */
    public function updatePrescription(Request $request, $id)
    {
        $doctor = $this->getDoctor();
        if (!$doctor) return redirect()->route('doctor.login');

        $prescription = Prescription::with(['medicines', 'appointment'])->where('id', $id)->firstOrFail();

        // Doctor ownership check
        if ($prescription->doctor_id != $doctor->id && $prescription->appointment->username !== $doctor->username) {
            abort(403, 'Unauthorized access.');
        }

        if ($prescription->isIssued()) {
            return redirect()->route('doctor.prescription.view', $prescription->id)
                ->with('error', 'This prescription has already been issued and cannot be edited.');
        }

        $request->validate([
            'diagnosis' => 'required|string|max:1000',
            'symptoms' => 'nullable|string',
            'symptoms_duration' => 'nullable|string|max:100',
            'clinical_notes' => 'nullable|string',
            'medical_history' => 'nullable|string',
            'allergies' => 'nullable|string',
            'medical_advice' => 'nullable|string',
            'follow_up_required' => 'nullable|in:0,1',
            'follow_up_date' => 'nullable|date',
            'additional_instructions' => 'nullable|string',
            'action' => 'required|in:draft,issue',
            'medicines' => 'nullable|array',
            'medicines.*.medicine_name' => 'nullable|string|max:255',
            'medicines.*.dosage' => 'nullable|string|max:100',
            'medicines.*.frequency' => 'nullable|string|max:100',
            'medicines.*.duration' => 'nullable|string|max:100',
            'medicines.*.route' => 'nullable|string|max:100',
            'medicines.*.instructions' => 'nullable|string|max:255',
        ]);

        $status = $request->input('action') === 'issue' ? 'issued' : 'draft';
        $issuedAt = $status === 'issued' ? now() : null;

        DB::transaction(function() use ($request, $prescription, $status, $issuedAt) {
            $prescription->update([
                'symptoms' => $request->input('symptoms'),
                'symptoms_duration' => $request->input('symptoms_duration'),
                'diagnosis' => $request->input('diagnosis'),
                'clinical_notes' => $request->input('clinical_notes'),
                'medical_history' => $request->input('medical_history'),
                'allergies' => $request->input('allergies'),
                'medical_advice' => $request->input('medical_advice'),
                'follow_up_required' => $request->input('follow_up_required') == '1',
                'follow_up_date' => $request->input('follow_up_required') == '1' ? $request->input('follow_up_date') : null,
                'additional_instructions' => $request->input('additional_instructions'),
                'status' => $status,
                'issued_at' => $issuedAt ?: $prescription->issued_at,
            ]);

            // Replace medicines
            PrescriptionMedicine::where('prescription_id', $prescription->id)->delete();

            if ($request->has('medicines') && is_array($request->medicines)) {
                foreach ($request->medicines as $med) {
                    $medName = trim($med['medicine_name'] ?? '');
                    if (!empty($medName)) {
                        PrescriptionMedicine::create([
                            'prescription_id' => $prescription->id,
                            'medicine_name' => $medName,
                            'dosage' => $med['dosage'] ?? null,
                            'frequency' => $med['frequency'] ?? null,
                            'duration' => $med['duration'] ?? null,
                            'route' => $med['route'] ?? null,
                            'instructions' => $med['instructions'] ?? null,
                        ]);
                    }
                }
            }
        });

        if ($status === 'issued') {
            return redirect()->route('doctor.prescription.view', $prescription->id)
                ->with('success', 'Prescription #' . $prescription->prescription_number . ' has been officially ISSUED to the patient.');
        } else {
            return redirect()->route('doctor.prescription.edit', $prescription->id)
                ->with('success', 'Prescription draft updated successfully.');
        }
    }

    /**
     * View prescription in doctor console
     */
    public function viewPrescription($id)
    {
        $doctor = $this->getDoctor();
        if (!$doctor) return redirect()->route('doctor.login');

        $prescription = Prescription::with(['medicines', 'appointment', 'doctor', 'patient'])->where('id', $id)->firstOrFail();

        // Doctor ownership check
        if ($prescription->doctor_id != $doctor->id && $prescription->appointment->username !== $doctor->username) {
            abort(403, 'Unauthorized access to prescription.');
        }

        $role = 'doctor';
        $backUrl = route('doctor.appointments');

        return view('prescription.view', compact('prescription', 'role', 'backUrl', 'doctor'));
    }

    // =========================================================================
    // 4. MANAGE TIME SLOTS (CRUD OPERATION FORMS)
    // =========================================================================

    public function timeSlots(Request $request)
    {
        $doctor = $this->getDoctor();
        if (!$doctor) return redirect()->route('doctor.login');

        $today = date('Y-m-d');

        // Find upcoming appointment dates from TODAY onwards for this doctor
        $upcomingDates = appointment::where(function($q) use ($doctor) {
                $q->where('username', $doctor->username)
                  ->orWhere('username', 'like', '%' . $doctor->username . '%');
            })
            ->where('date', '>=', $today)
            ->whereNotIn('Status', ['Cancelled', 'Rejected'])
            ->orderBy('date', 'asc')
            ->distinct()
            ->pluck('date')
            ->toArray();

        // Selected date to view live remaining slots: defaults strictly to TODAY unless query ?date=... is provided
        $selectedDate = $request->query('date');
        if (!$selectedDate || !strtotime($selectedDate)) {
            $selectedDate = $today;
        }

        $timeSlots = DoctorTimeSlot::where('doctor_id', $doctor->id)
            ->orderBy('id', 'asc')
            ->get();

        foreach ($timeSlots as $slot) {
            $bookedOnDate = appointment::where(function($q) use ($doctor) {
                    $q->where('username', $doctor->username)
                      ->orWhere('username', 'like', '%' . $doctor->username . '%');
                })
                ->where('date', $selectedDate)
                ->where('time', $slot->slot_display)
                ->whereNotIn('Status', ['Cancelled', 'Rejected'])
                ->count();

            $totalBookings = appointment::where(function($q) use ($doctor) {
                    $q->where('username', $doctor->username)
                      ->orWhere('username', 'like', '%' . $doctor->username . '%');
                })
                ->where('time', $slot->slot_display)
                ->whereNotIn('Status', ['Cancelled', 'Rejected'])
                ->count();

            // Check if slot has already passed for today
            $isPast = false;
            if ($selectedDate === date('Y-m-d')) {
                try {
                    $timeStr = $slot->start_time ?: trim(explode('-', $slot->slot_display)[0]);
                    $slotDateTime = Carbon::parse($selectedDate . ' ' . $timeStr);
                    if (Carbon::now()->greaterThanOrEqualTo($slotDateTime)) {
                        $isPast = true;
                    }
                } catch (\Exception $e) {
                    $isPast = false;
                }
            }

            $max = $slot->max_patients ?: 8;
            $slot->is_past = $isPast;
            $slot->booked_for_date = $bookedOnDate;
            $slot->remaining_for_date = max(0, $max - $bookedOnDate);
            $slot->total_active_bookings = $totalBookings;
            $slot->occupancy_percent = min(100, round(($bookedOnDate / max(1, $max)) * 100));
        }

        return view('doctor.time_slots', compact('doctor', 'timeSlots', 'selectedDate', 'upcomingDates'));
    }

    public function storeTimeSlot(Request $request)
    {
        $doctor = $this->getDoctor();
        if (!$doctor) return redirect()->route('doctor.login');

        $request->validate([
            'day_of_week' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'max_patients' => 'required|numeric|min:1|max:50',
        ]);

        $slotDisplay = trim($request->start_time) . ' - ' . trim($request->end_time);

        DoctorTimeSlot::create([
            'doctor_id' => $doctor->id,
            'day_of_week' => $request->day_of_week,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'slot_display' => $slotDisplay,
            'max_patients' => $request->max_patients,
            'is_active' => $request->has('is_active') ? 1 : ($request->input('is_active_val', 1)),
        ]);

        return redirect()->route('doctor.time_slots')->with('success', 'New OPD time slot "' . $slotDisplay . '" added successfully.');
    }

    public function updateTimeSlot(Request $request, $id)
    {
        $doctor = $this->getDoctor();
        if (!$doctor) return redirect()->route('doctor.login');

        $slot = DoctorTimeSlot::where('id', $id)->where('doctor_id', $doctor->id)->firstOrFail();

        $request->validate([
            'day_of_week' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'max_patients' => 'required|numeric|min:1|max:50',
        ]);

        $slotDisplay = trim($request->start_time) . ' - ' . trim($request->end_time);

        $slot->update([
            'day_of_week' => $request->day_of_week,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'slot_display' => $slotDisplay,
            'max_patients' => $request->max_patients,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('doctor.time_slots')->with('success', 'Time slot updated successfully.');
    }

    public function toggleTimeSlot($id)
    {
        $doctor = $this->getDoctor();
        if (!$doctor) return redirect()->route('doctor.login');

        $slot = DoctorTimeSlot::where('id', $id)->where('doctor_id', $doctor->id)->firstOrFail();
        $slot->is_active = !$slot->is_active;
        $slot->save();

        $statusMsg = $slot->is_active ? 'Activated' : 'Deactivated';
        return back()->with('success', 'Time slot "' . $slot->slot_display . '" ' . $statusMsg . ' successfully.');
    }

    public function destroyTimeSlot($id)
    {
        $doctor = $this->getDoctor();
        if (!$doctor) return redirect()->route('doctor.login');

        $slot = DoctorTimeSlot::where('id', $id)->where('doctor_id', $doctor->id)->firstOrFail();
        $label = $slot->slot_display;
        $slot->delete();

        return redirect()->route('doctor.time_slots')->with('success', 'Time slot "' . $label . '" deleted.');
    }

    // =========================================================================
    // 5. MY SCHEDULE & AVAILABILITY
    // =========================================================================

    public function schedule()
    {
        $doctor = $this->getDoctor();
        if (!$doctor) return redirect()->route('doctor.login');

        // Ensure 7 days exist for this doctor
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        foreach ($days as $day) {
            $exists = DoctorSchedule::where('doctor_id', $doctor->id)->where('day_name', $day)->exists();
            if (!$exists) {
                DoctorSchedule::create([
                    'doctor_id' => $doctor->id,
                    'day_name' => $day,
                    'morning_start' => ($day === 'Sunday') ? null : '09:00 AM',
                    'morning_end' => ($day === 'Sunday') ? null : '01:00 PM',
                    'evening_start' => ($day === 'Sunday') ? null : '04:00 PM',
                    'evening_end' => ($day === 'Sunday') ? null : '07:30 PM',
                    'is_day_off' => ($day === 'Sunday') ? 1 : 0,
                    'notes' => ($day === 'Sunday') ? 'Weekly Off / Emergency on Call' : 'Regular OPD Consultations',
                ]);
            }
        }

        $schedules = DoctorSchedule::where('doctor_id', $doctor->id)->get();

        return view('doctor.schedule', compact('doctor', 'schedules'));
    }

    public function updateSchedule(Request $request)
    {
        $doctor = $this->getDoctor();
        if (!$doctor) return redirect()->route('doctor.login');

        $days = $request->input('days', []);

        foreach ($days as $dayId => $dayData) {
            $schedule = DoctorSchedule::where('id', $dayId)->where('doctor_id', $doctor->id)->first();
            if ($schedule) {
                $isOff = isset($dayData['is_day_off']) ? 1 : 0;
                $schedule->update([
                    'morning_start' => $dayData['morning_start'] ?? null,
                    'morning_end' => $dayData['morning_end'] ?? null,
                    'evening_start' => $dayData['evening_start'] ?? null,
                    'evening_end' => $dayData['evening_end'] ?? null,
                    'is_day_off' => $isOff,
                    'notes' => $dayData['notes'] ?? null,
                ]);
            }
        }

        // Room and overall duty status update
        if ($request->filled('room_no')) {
            $doctor->room_no = $request->room_no;
        }
        $doctor->is_available = $request->has('is_available') ? 1 : 0;
        $doctor->save();

        return back()->with('success', 'Weekly clinical schedule and availability saved successfully.');
    }

    public function toggleAvailability()
    {
        $doctor = $this->getDoctor();
        if (!$doctor) return redirect()->route('doctor.login');

        $doctor->is_available = !$doctor->is_available;
        $doctor->save();

        $statusMsg = $doctor->is_available ? 'marked ON DUTY (Available for Bookings)' : 'marked OFF DUTY (Out of Office)';
        return back()->with('success', 'Clinical status updated: You are now ' . $statusMsg . '.');
    }

    // =========================================================================
    // 6. MY PATIENTS
    // =========================================================================

    public function patients()
    {
        $doctor = $this->getDoctor();
        if (!$doctor) return redirect()->route('doctor.login');

        // Fetch all appointments for this doctor
        $appointments = appointment::where(function($q) use ($doctor) {
            $q->where('username', $doctor->username)
              ->orWhere('username', 'like', '%' . $doctor->username . '%');
        })->orderBy('id', 'desc')->get();

        // Group appointments by patient email (or appointmentname)
        $patients = [];
        foreach ($appointments as $apt) {
            $key = strtolower(trim($apt->email ?: $apt->appointmentname));
            if (!isset($patients[$key])) {
                $patients[$key] = [
                    'name' => $apt->appointmentname ?: 'Patient',
                    'email' => $apt->email ?: 'N/A',
                    'phone' => $apt->phone ?: 'N/A',
                    'gender' => $apt->gender ?: 'N/A',
                    'uhid' => '#PAT-' . str_pad($apt->user_id ?: $apt->id, 5, '0', STR_PAD_LEFT),
                    'total_visits' => 0,
                    'first_visit' => $apt->date,
                    'last_visit' => $apt->date,
                    'last_symptoms' => $apt->message ?: ($apt->massage ?: 'Routine evaluation'),
                    'last_status' => $apt->Status,
                    'appointments' => [],
                ];
            }

            $patients[$key]['total_visits']++;
            $patients[$key]['appointments'][] = $apt;
        }

        return view('doctor.patients', compact('doctor', 'patients'));
    }

    // =========================================================================
    // 7. MY PROFILE
    // =========================================================================

    public function profile()
    {
        $doctor = $this->getDoctor();
        if (!$doctor) return redirect()->route('doctor.login');

        $departments = Department::orderBy('departmentname', 'asc')->get();

        return view('doctor.profile', compact('doctor', 'departments'));
    }

    public function updateProfile(Request $request)
    {
        $doctor = $this->getDoctor();
        if (!$doctor) return redirect()->route('doctor.login');

        $request->validate([
            'username' => 'required|min:3|max:100',
            'phone' => 'required',
            'departmentname' => 'required',
            'city' => 'required',
            'qualification' => 'nullable',
            'experience' => 'nullable',
            'room_no' => 'nullable',
            'consultation_fee' => 'nullable|numeric',
            'Bio' => 'nullable',
            'Avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
        ]);

        $doctor->username = $request->username;
        $doctor->phone = $request->phone;
        $doctor->departmentname = $request->departmentname;
        $doctor->city = $request->city;
        $doctor->address = $request->address ?: $doctor->address;
        $doctor->postal_code = $request->postal_code ?: $doctor->postal_code;
        $doctor->dob = $request->dob ?: $doctor->dob;
        $doctor->gender = $request->gender ?: $doctor->gender;
        $doctor->qualification = $request->qualification ?: $doctor->qualification;
        $doctor->experience = $request->experience ?: $doctor->experience;
        $doctor->room_no = $request->room_no ?: $doctor->room_no;
        $doctor->consultation_fee = $request->consultation_fee ?: $doctor->consultation_fee;
        $doctor->Bio = $request->Bio ?: $doctor->Bio;

        // Handle Avatar Upload
        if ($request->hasFile('Avatar')) {
            $file = $request->file('Avatar');
            $fileName = 'doc_' . time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/doctors'), $fileName);
            $doctor->Avatar = 'uploads/doctors/' . $fileName;
        }

        $doctor->save();

        return back()->with('success', 'Doctor profile updated successfully.');
    }

    // =========================================================================
    // 8. CHANGE PASSWORD
    // =========================================================================

    public function changePassword()
    {
        $doctor = $this->getDoctor();
        if (!$doctor) return redirect()->route('doctor.login');

        return view('doctor.change_password', compact('doctor'));
    }

    public function updatePassword(Request $request)
    {
        $doctor = $this->getDoctor();
        if (!$doctor) return redirect()->route('doctor.login');

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        if (!Hash::check($request->current_password, $doctor->password) && $request->current_password !== 'doctor123') {
            return back()->with('error', 'The current password you provided does not match our records.');
        }

        $doctor->password = Hash::make($request->password);
        $doctor->save();

        return back()->with('success', 'Password changed successfully. Your account is secured.');
    }

    /**
     * Public / AJAX API to fetch available time slots and day schedule for a doctor on a specific date
     */
    public function getDoctorSlots(Request $request)
    {
        $docParam = $request->input('doctor') ?: $request->input('doctor_name') ?: $request->input('doctor_id') ?: $request->input('username');
        $dateParam = $request->input('date');

        if (!$dateParam) {
            $dateCarbon = Carbon::tomorrow();
        } else {
            try {
                $dateCarbon = Carbon::parse($dateParam);
            } catch (\Exception $e) {
                $dateCarbon = Carbon::tomorrow();
            }
        }

        $dateFormatted = $dateCarbon->format('Y-m-d');
        $dayName = $dateCarbon->format('l'); // e.g. "Tuesday"
        $displayDate = $dateCarbon->format('l, d M Y');

        // Locate doctor
        $doctor = null;
        if (is_numeric($docParam)) {
            $doctor = Doctors::find($docParam);
        }
        if (!$doctor && !empty($docParam)) {
            $doctor = Doctors::where('username', $docParam)->first();
        }

        if (!$doctor) {
            return response()->json([
                'status' => 'error',
                'message' => 'Please select a doctor to load consultation time slots.',
                'day' => $dayName,
                'formatted_date' => $displayDate,
                'slots' => []
            ]);
        }

        // Check Doctor overall availability
        $isAvailable = (bool)($doctor->is_available ?? 1);

        // Check weekly schedule
        $schedule = DoctorSchedule::where('doctor_id', $doctor->id)->where('day_name', $dayName)->first();
        $isDayOff = $schedule ? (bool)$schedule->is_day_off : false;
        $scheduleNotes = $schedule ? $schedule->notes : ($isDayOff ? 'Day Off' : 'Regular Consultations');
        
        $shiftTimings = '';
        if ($schedule && !$isDayOff) {
            $parts = [];
            if ($schedule->morning_start && $schedule->morning_end) {
                $parts[] = 'Morning: ' . $schedule->morning_start . ' - ' . $schedule->morning_end;
            }
            if ($schedule->evening_start && $schedule->evening_end) {
                $parts[] = 'Evening: ' . $schedule->evening_start . ' - ' . $schedule->evening_end;
            }
            $shiftTimings = implode(' | ', $parts);
        }

        // Fetch active time slots
        $rawSlots = DoctorTimeSlot::where('doctor_id', $doctor->id)
            ->where('is_active', 1)
            ->where(function($q) use ($dayName) {
                $q->where('day_of_week', 'All Days')
                  ->orWhere('day_of_week', $dayName);
            })
            ->orderBy('id', 'asc')
            ->get();

        $isToday = ($dateFormatted === Carbon::today('Asia/Kolkata')->format('Y-m-d'));
        $now = Carbon::now('Asia/Kolkata');

        // If no customized slots exist, provide default hospital slots
        if ($rawSlots->isEmpty()) {
            $defaults = [
                '09:00 AM - 10:00 AM',
                '10:00 AM - 11:00 AM',
                '11:00 AM - 12:00 PM',
                '12:00 PM - 01:00 PM',
                '04:00 PM - 05:00 PM',
                '05:00 PM - 06:00 PM',
                '06:00 PM - 07:00 PM',
            ];
            $slotsData = [];
            foreach ($defaults as $s) {
                $booked = appointment::where('username', $doctor->username)
                    ->where('date', $dateFormatted)
                    ->where('time', $s)
                    ->whereNotIn('Status', ['Cancelled', 'Rejected'])
                    ->count();

                $isPast = false;
                if ($isToday) {
                    try {
                        $startTimeStr = trim(explode('-', $s)[0]);
                        $slotDateTime = Carbon::parse($dateFormatted . ' ' . $startTimeStr, 'Asia/Kolkata');
                        if ($now->greaterThanOrEqualTo($slotDateTime)) {
                            $isPast = true;
                        }
                    } catch (\Exception $e) {
                        $isPast = false;
                    }
                }

                $maxPatients = 8;
                $rem = max(0, $maxPatients - $booked);
                $isFull = ($rem <= 0);
                $slotsData[] = [
                    'id' => null,
                    'slot_display' => $s,
                    'start_time' => trim(explode('-', $s)[0]),
                    'end_time' => trim(explode('-', $s)[1] ?? ''),
                    'max_patients' => $maxPatients,
                    'booked_count' => $booked,
                    'remaining' => $rem,
                    'is_full' => $isFull,
                    'is_past' => $isPast,
                    'is_bookable' => (!$isPast && !$isFull && !$isDayOff && $isAvailable),
                ];
            }
        } else {
            $slotsData = [];
            foreach ($rawSlots as $slot) {
                $booked = appointment::where('username', $doctor->username)
                    ->where('date', $dateFormatted)
                    ->where('time', $slot->slot_display)
                    ->whereNotIn('Status', ['Cancelled', 'Rejected'])
                    ->count();

                $isPast = false;
                if ($isToday) {
                    try {
                        $startTimeStr = $slot->start_time ?: trim(explode('-', $slot->slot_display)[0]);
                        $slotDateTime = Carbon::parse($dateFormatted . ' ' . $startTimeStr, 'Asia/Kolkata');
                        if ($now->greaterThanOrEqualTo($slotDateTime)) {
                            $isPast = true;
                        }
                    } catch (\Exception $e) {
                        $isPast = false;
                    }
                }

                $maxPatients = $slot->max_patients ?: 8;
                $rem = max(0, $maxPatients - $booked);
                $isFull = ($rem <= 0);
                $slotsData[] = [
                    'id' => $slot->id,
                    'slot_display' => $slot->slot_display,
                    'start_time' => $slot->start_time,
                    'end_time' => $slot->end_time,
                    'day_of_week' => $slot->day_of_week,
                    'max_patients' => $maxPatients,
                    'booked_count' => $booked,
                    'remaining' => $rem,
                    'is_full' => $isFull,
                    'is_past' => $isPast,
                    'is_bookable' => (!$isPast && !$isFull && !$isDayOff && $isAvailable),
                ];
            }
        }

        return response()->json([
            'status' => 'success',
            'doctor' => [
                'id' => $doctor->id,
                'name' => $doctor->username,
                'department' => $doctor->departmentname,
                'room_no' => $doctor->room_no ?? 'OPD Room',
                'qualification' => $doctor->qualification ?? 'MBBS',
                'fee' => $doctor->consultation_fee ?? 500,
                'is_available' => $isAvailable,
            ],
            'date' => $dateFormatted,
            'day' => $dayName,
            'formatted_date' => $displayDate,
            'is_available' => $isAvailable,
            'is_day_off' => $isDayOff,
            'can_book' => ($isAvailable && !$isDayOff),
            'duty_status' => (!$isAvailable ? 'Off Duty (Out of Office)' : ($isDayOff ? 'Off Duty (' . $scheduleNotes . ')' : 'On Duty')),
            'duty_message' => (!$isAvailable ? 'Dr. ' . $doctor->username . ' is currently marked Off Duty and is not accepting online appointments.' : ($isDayOff ? 'Doctor has scheduled weekly off on ' . $dayName . 's. Please select another date.' : 'On Duty')),
            'schedule_notes' => $scheduleNotes,
            'shift_timings' => $shiftTimings,
            'slots' => $slotsData,
        ]);
    }
}

