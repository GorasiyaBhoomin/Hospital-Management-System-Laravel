<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\appointment;
use App\Models\Department;
use App\Models\Doctors;

class UserController extends Controller
{
    /**
     * Show User Login Page
     */
    public function showLogin()
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin == 1) {
                return redirect('/admin/admindashboard');
            }
            return redirect('/user/dashboard');
        }
        return view('user.login');
    }

    /**
     * Handle User Login Submission
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:4',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            $user = Auth::user();
            $user->status = 'active';
            $user->save();

            if ($user->is_admin == 1) {
                return redirect()->intended('/admin/admindashboard')->with('success', 'Welcome, Administrator ' . $user->name);
            }
            return redirect()->intended('/user/dashboard')->with('success', 'Welcome back, ' . $user->name . '! Your medical portal is ready.');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Show User Registration Page
     */
    public function showRegister()
    {
        if (Auth::check()) {
            return redirect('/user/dashboard');
        }
        return view('user.register');
    }

    /**
     * Handle User Registration Submission
     */
    public function register(Request $request)
    {
        $request->validate([
            'name'                  => 'required|string|max:120',
            'email'                 => 'required|string|email:rfc,dns|max:150|unique:users,email',
            'phone'                 => 'required|string|max:20',
            'password'              => 'required|string|min:6|confirmed',
            'city'                  => 'nullable|string|max:100',
            'address'               => 'nullable|string|max:255',
            'postal_code'           => 'nullable|string|max:20',
        ]);

        $user = User::create([
            'name'        => trim($request->name),
            'email'       => strtolower(trim($request->email)),
            'phone'       => trim($request->phone),
            'city'        => $request->city ?: 'Bhuj',
            'address'     => $request->address ?: 'Bhuj, Kutch',
            'postal_code' => $request->postal_code ?: '370001',
            'is_admin'    => 0,
            'status'      => 'active',
            'password'    => Hash::make($request->password),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect('/user/dashboard')->with('success', 'Registration successful! Welcome to KK Patel Patient Portal.');
    }

    /**
     * Handle User Logout
     */
    public function logout(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $user->status = 'inactive';
            $user->save();
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/user/login')->with('success', 'You have been safely signed out.');
    }

    /**
     * User Patient Portal Dashboard
     */
    public function dashboard()
    {
        $user = Auth::user();

        // Appointments belonging to this user
        $query = appointment::where(function($q) use ($user) {
            $q->where('user_id', $user->id)
              ->orWhere('email', $user->email);
        });

        $totalAppointments = (clone $query)->count();
        $upcomingAppointments = (clone $query)
            ->whereDate('date', '>=', date('Y-m-d'))
            ->where('Status', '!=', 'Cancelled')
            ->count();
        $completedAppointments = (clone $query)
            ->where(function($q) {
                $q->where('Status', 'Approved')
                  ->orWhere('Status', 'Completed');
            })
            ->count();
        $pendingAppointments = (clone $query)->where('Status', 'Pending')->count();

        $recentAppointments = (clone $query)->orderByDesc('id')->take(5)->get();

        $departments = Department::all();
        $doctors = Doctors::all();

        return view('user.dashboard', compact(
            'user',
            'totalAppointments',
            'upcomingAppointments',
            'completedAppointments',
            'pendingAppointments',
            'recentAppointments',
            'departments',
            'doctors'
        ));
    }

    /**
     * View and Edit User Profile
     */
    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    /**
     * Update User Profile Details
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'        => 'required|string|max:120',
            'phone'       => 'required|string|max:20',
            'city'        => 'nullable|string|max:100',
            'address'     => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'logo'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->postal_code = $request->postal_code;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = 'user_' . $user->id . '_' . time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/avatars');
            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }
            $file->move($destinationPath, $fileName);
            $user->logo = 'uploads/avatars/' . $fileName;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    /**
     * Change User Password
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password'     => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Current password is incorrect.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully!');
    }

    /**
     * User Appointment Booking Form
     */
    public function bookAppointment(Request $request)
    {
        $departments = Department::all();
        $doctors = Doctors::all();
        $selectedDept = $request->query('dept');
        $selectedDoc = $request->query('doc');

        return view('user.book_appointment', compact('departments', 'doctors', 'selectedDept', 'selectedDoc'));
    }

    /**
     * Store Booked Appointment in Database
     */
    public function storeAppointment(Request $request)
    {
        $user = Auth::user();

        $maxAdvanceDate = date('Y-m-d', strtotime('+30 days'));

        $request->validate([
            'date' => 'required|date|after_or_equal:today|before_or_equal:' . $maxAdvanceDate,
            'time' => 'required',
        ], [
            'date.after_or_equal' => 'Please select a date from today onwards. Past dates are not allowed.',
            'date.before_or_equal' => 'Appointments can only be booked up to 30 days in advance (till ' . date('d M Y', strtotime('+30 days')) . ') according to the monthly schedule.',
            'time.required' => 'Please select an available doctor consultation time slot.',
        ]);

        // Prevent booking slots that have already passed for today
        if ($request->date === date('Y-m-d')) {
            $timeInput = $request->time;
            $slotStartStr = trim(explode('-', $timeInput)[0]);
            try {
                $slotStart = \Carbon\Carbon::parse($request->date . ' ' . $slotStartStr, 'Asia/Kolkata');
                if (\Carbon\Carbon::now('Asia/Kolkata')->greaterThanOrEqualTo($slotStart)) {
                    return back()->withInput()->withErrors([
                        'time' => "The time slot '{$timeInput}' has already passed for today. Please select an upcoming slot or choose another date."
                    ]);
                }
            } catch (\Exception $e) {
                // ignore
            }
        }

        $dept   = $request->input('departmentname') ?: $request->input('department', 'General Medicine');
        $doc    = $request->input('username') ?: $request->input('doctor', 'Senior Consultant');
        $phone  = $request->input('phone') ?: $request->input('phone_number') ?: ($user->phone ?: ($user->phone_number ?: '9999999999'));
        $gender = $request->input('gender', 'Male');
        $msg    = $request->input('message') ?: $request->input('massage', 'Regular Clinical OPD Consultation');

        $day = $request->input('day');
        if (empty($day) && $request->filled('date')) {
            try {
                $day = \Carbon\Carbon::parse($request->date)->format('l');
            } catch (\Exception $e) {
                $day = null;
            }
        }

        $appointment = appointment::create([
            'user_id'         => $user->id,
            'appointmentname' => $user->name,
            'email'           => $user->email,
            'phone'           => $phone,
            'gender'          => $gender,
            'departmentname'  => $dept,
            'username'        => $doc,
            'date'            => $request->date,
            'day'             => $day,
            'time'            => $request->time,
            'message'         => $msg,
            'Status'          => 'Pending',
        ]);

        return redirect('/user/appointment-history')->with('success', 'Appointment successfully requested! Doctor confirmation is pending.');
    }

    /**
     * View Appointment History for the Logged-in User
     */
    public function appointmentHistory()
    {
        $user = Auth::user();

        $appointments = appointment::where(function($q) use ($user) {
            $q->where('user_id', $user->id)
              ->orWhere('email', $user->email);
        })->orderByDesc('id')->get();

        return view('user.appointment_history', compact('appointments', 'user'));
    }

    /**
     * View and Print Full OPD Consultation Token Slip
     */
    public function viewSlip($id)
    {
        $user = Auth::user();

        if ($user && $user->is_admin == 1) {
            $appointment = appointment::where('id', $id)->firstOrFail();
        } else {
            $appointment = appointment::where('id', $id)
                ->where(function($q) use ($user) {
                    $q->where('user_id', $user->id)
                      ->orWhere('email', $user->email);
                })
                ->firstOrFail();
        }

        return view('user.opd_slip', compact('appointment', 'user'));
    }

    /**
     * Cancel an Appointment
     */
    public function cancelAppointment($id)
    {
        $user = Auth::user();

        $apt = appointment::where('id', $id)
            ->where(function($q) use ($user) {
                $q->where('user_id', $user->id)
                  ->orWhere('email', $user->email);
            })
            ->firstOrFail();

        if (strtolower($apt->Status) == 'completed') {
            return back()->with('error', 'Completed appointments cannot be cancelled.');
        }

        $apt->Status = 'Cancelled';
        $apt->save();

        return redirect()->back()->with('success', 'Appointment #' . $id . ' has been cancelled.');
    }

    /**
     * View Doctors Directory within User Portal
     */
    public function doctors(Request $request)
    {
        $departments = Department::all();
        $selectedDept = $request->query('dept');

        if ($selectedDept && $selectedDept != 'all') {
            $doctors = Doctors::where('departmentname', $selectedDept)->get();
        } else {
            $doctors = Doctors::all();
        }

        return view('user.doctors', compact('doctors', 'departments', 'selectedDept'));
    }

    /**
     * View Clinical Departments within User Portal
     */
    public function departments()
    {
        $departments = Department::all();
        return view('user.departments', compact('departments'));
    }
}

