<!DOCTYPE html>
<html lang="en">

@include('admin.adminnavbar_master')
@section('nav')
@endsection

<body>

    <div class="page-wrapper">
        <!-- Ambient Glowing Background Meshes -->
        <div class="admin-ambient-mesh admin-mesh-1"></div>
        <div class="admin-ambient-mesh admin-mesh-2"></div>
        <div class="admin-ambient-mesh admin-mesh-3"></div>

        <div class="content admin-ambient-wrapper">

            <!-- Page Header Bar -->
            <div class="admin-page-header">
                <div class="admin-page-title-wrap">
                    <h2>
                        <span class="title-icon-box" style="background: #e0f2fe; color: #0284c7;">
                            <i class="fa fa-calendar"></i>
                        </span>
                        Edit Patient Appointment
                    </h2>
                    <p>Update consultation schedule, change assigned specialist, or adjust appointment approval status.</p>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ url('adminappointments') }}" class="btn-admin-light">
                        <i class="fa fa-arrow-left"></i> Back to Appointments
                    </a>
                </div>
            </div>

            <!-- Flash Alerts -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 14px; font-weight: 600; box-shadow: 0 4px 14px rgba(16, 185, 129, 0.15); border: 1px solid #a7f3d0; background: #ecfdf5; color: #065f46;">
                    <i class="fa fa-check-circle m-r-8"></i> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 14px; font-weight: 600; box-shadow: 0 4px 14px rgba(239, 68, 68, 0.15); border: 1px solid #fecaca; background: #fef2f2; color: #991b1b;">
                    <i class="fa fa-exclamation-circle m-r-8"></i> {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-12 col-xl-10">
                    @if(isset($std3))
                        @foreach ($std3 as $r2)
                            <div class="admin-form-container">
                                <form action="{{ URL::to('/') }}/update_appointment" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $r2->id }}">

                                    <!-- Section 1: Patient Information -->
                                    <div class="form-section-title">
                                        <i class="fa fa-user text-primary"></i> 1. Patient Details
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="admin-form-group">
                                                <label>Patient Full Name <span class="text-danger">*</span></label>
                                                <div class="admin-input-wrap">
                                                    <i class="fa fa-user input-icon"></i>
                                                    <input class="admin-form-control" type="text" name="appointmentname" value="{{ $r2->appointmentname }}" >
                                                </div>
                                                @error('appointmentname')
                                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="admin-form-group">
                                                <label>Email Address <span class="text-danger">*</span></label>
                                                <div class="admin-input-wrap">
                                                    <i class="fa fa-envelope-o input-icon"></i>
                                                    <input class="admin-form-control" type="email" name="email" value="{{ $r2->email }}" readonly style="background: #f1f5f9; cursor: not-allowed;">
                                                </div>
                                                @error('email')
                                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="admin-form-group">
                                                <label>Phone Number <span class="text-danger">*</span></label>
                                                <div class="admin-input-wrap">
                                                    <i class="fa fa-phone input-icon"></i>
                                                    <input class="admin-form-control" type="number" name="phone" value="{{ $r2->phone }}" >
                                                </div>
                                                @error('phone')
                                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="admin-form-group">
                                                <label>Gender <span class="text-danger">*</span></label>
                                                <div class="d-flex align-items-center gap-4 pt-2">
                                                    <label class="d-flex align-items-center gap-2 mb-0" style="cursor: pointer; font-weight: 600;">
                                                        <input type="radio" name="gender" value="male" {{ $r2->gender == 'male' ? 'checked' : '' }} >
                                                        <span>Male</span>
                                                    </label>
                                                    <label class="d-flex align-items-center gap-2 mb-0" style="cursor: pointer; font-weight: 600;">
                                                        <input type="radio" name="gender" value="female" {{ $r2->gender == 'female' ? 'checked' : '' }} >
                                                        <span>Female</span>
                                                    </label>
                                                </div>
                                                @error('gender')
                                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Section 2: Clinical Details -->
                                    <div class="form-section-title mt-4">
                                        <i class="fa fa-stethoscope text-primary"></i> 2. Department & Doctor Allocation
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="admin-form-group">
                                                <label>Department <span class="text-danger">*</span></label>
                                                <select id="department" name="departmentname" class="admin-form-control no-icon" >
                                                    <option value="" disabled>-- Select Department --</option>
                                                    @foreach($departments as $list)
                                                        <option value="{{ $list->departmentname }}" {{ $r2->departmentname == $list->departmentname ? 'selected' : '' }}>
                                                            {{ $list->departmentname }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('departmentname')
                                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="admin-form-group">
                                                <label>Assigned Specialist <span class="text-danger">*</span></label>
                                                <input type="text" class="admin-form-control no-icon" id="edit_apt_doctor" name="username" value="{{ $r2->username }}" required>
                                                @error('username')
                                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="admin-form-group">
                                                <label>Appointment Date <span class="text-danger">*</span></label>
                                                <div class="admin-input-wrap">
                                                    <i class="fa fa-calendar input-icon"></i>
                                                    <input class="admin-form-control" type="date" id="edit_apt_date" name="date" value="{{ $r2->date }}" required>
                                                </div>
                                                @error('date')
                                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="admin-form-group">
                                                <label>Consultation Day <span class="text-danger">*</span></label>
                                                <div class="admin-input-wrap">
                                                    <i class="fa fa-calendar-check-o input-icon"></i>
                                                    <input class="admin-form-control" type="text" id="edit_apt_day" name="day" readonly value="{{ $r2->day ?: (\Carbon\Carbon::parse($r2->date)->format('l') ?? '') }}" style="background: #f8fafc; font-weight: 700; color: #0284c7;">
                                                </div>
                                                <small class="text-muted" style="font-size: 11px;">Automatically calculated from appointment date.</small>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="admin-form-group">
                                                <label>Time Slot <span class="text-danger">*</span></label>
                                                <div class="admin-input-wrap">
                                                    <i class="fa fa-clock-o input-icon"></i>
                                                    <select class="admin-form-control" id="edit_apt_time" name="time" required style="padding-left: 42px;">
                                                        <option value="{{ $r2->time }}" selected>{{ $r2->time }} (Current Slot)</option>
                                                    </select>
                                                </div>
                                                @error('time')
                                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="admin-form-group">
                                                <label>Problem / Chief Complaint <span class="text-danger">*</span></label>
                                                <textarea class="admin-form-control admin-textarea" rows="4" name="message" >{{ $r2->message }}</textarea>
                                                @error('message')
                                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Section 3: Status -->
                                        <div class="col-md-12">
                                            <div class="admin-form-group">
                                                <label>Appointment Clinical Status <span class="text-danger">*</span></label>
                                                @php
                                                    $currentStatus = strtolower(trim((string)($r2->Status ?? $r2['Status'] ?? 'pending')));
                                                    if ($currentStatus === 'rejected') $currentStatus = 'cancelled';
                                                @endphp
                                                <div class="d-flex align-items-center gap-3 pt-1 flex-wrap">
                                                    <label class="d-flex align-items-center gap-2 mb-0" style="cursor: pointer; font-weight: 700; color: #d97706; background: #fffbeb; border: 1.5px solid {{ $currentStatus === 'pending' ? '#d97706' : '#fde68a' }}; border-radius: 8px; padding: 7px 14px; font-size: 13px;">
                                                        <input type="radio" name="Status" value="Pending" {{ $currentStatus === 'pending' ? 'checked' : '' }} required>
                                                        <span><i class="fa fa-clock-o"></i> Pending</span>
                                                    </label>
                                                    <label class="d-flex align-items-center gap-2 mb-0" style="cursor: pointer; font-weight: 700; color: #0284c7; background: #f0f9ff; border: 1.5px solid {{ $currentStatus === 'approved' ? '#0284c7' : '#bae6fd' }}; border-radius: 8px; padding: 7px 14px; font-size: 13px;">
                                                        <input type="radio" name="Status" value="Approved" {{ $currentStatus === 'approved' ? 'checked' : '' }} required>
                                                        <span><i class="fa fa-check-circle"></i> Approved</span>
                                                    </label>
                                                    <label class="d-flex align-items-center gap-2 mb-0" style="cursor: pointer; font-weight: 700; color: #059669; background: #ecfdf5; border: 1.5px solid {{ $currentStatus === 'completed' ? '#059669' : '#a7f3d0' }}; border-radius: 8px; padding: 7px 14px; font-size: 13px;">
                                                        <input type="radio" name="Status" value="Completed" {{ $currentStatus === 'completed' ? 'checked' : '' }} required>
                                                        <span><i class="fa fa-check-square"></i> Completed</span>
                                                    </label>
                                                    <label class="d-flex align-items-center gap-2 mb-0" style="cursor: pointer; font-weight: 700; color: #dc2626; background: #fef2f2; border: 1.5px solid {{ $currentStatus === 'cancelled' ? '#dc2626' : '#fecaca' }}; border-radius: 8px; padding: 7px 14px; font-size: 13px;">
                                                        <input type="radio" name="Status" value="Cancelled" {{ $currentStatus === 'cancelled' ? 'checked' : '' }} required>
                                                        <span><i class="fa fa-times-circle"></i> Cancelled</span>
                                                    </label>
                                                </div>
                                                @error('Status')
                                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Section 4: Clinical Prescription Details (Read-Only for Admin) -->
                                    @if($r2->prescription)
                                        <div class="mt-4 pt-3" style="border-top: 1.5px dashed #cbd5e1;">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                                                <div class="form-section-title mb-0">
                                                    <i class="fa fa-medkit text-success"></i> 4. Doctor's Clinical Prescription
                                                </div>
                                                <div class="d-flex align-items-center gap-2">
                                                    @if($r2->prescription->isIssued())
                                                        <span class="badge badge-success px-3 py-1 font-weight-bold" style="font-size: 11.5px; background: #00a896;">
                                                            <i class="fa fa-check-circle"></i> Officially Issued
                                                        </span>
                                                    @else
                                                        <span class="badge badge-warning text-dark px-3 py-1 font-weight-bold" style="font-size: 11.5px;">
                                                            <i class="fa fa-pencil"></i> Draft Record
                                                        </span>
                                                    @endif
                                                    <a href="{{ route('admin.prescription.view', $r2->prescription->id) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3 font-weight-bold" style="font-size: 12px;">
                                                        <i class="fa fa-file-text-o"></i> View & Print Prescription
                                                    </a>
                                                </div>
                                            </div>

                                            <div style="background: #f8fafc; border: 1.5px solid #e2e8f0; border-radius: 12px; padding: 18px 20px;">
                                                <div class="row">
                                                    <div class="col-md-4 mb-2">
                                                        <small class="text-muted text-uppercase font-weight-bold" style="font-size: 10.5px;">Prescription Reference</small>
                                                        <div style="font-family: monospace; font-size: 14px; font-weight: 800; color: #69275c;">
                                                            {{ $r2->prescription->prescription_number }}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-2">
                                                        <small class="text-muted text-uppercase font-weight-bold" style="font-size: 10.5px;">Consulting Doctor</small>
                                                        <div style="font-weight: 700; color: #0f172a;">
                                                            @php
                                                                $docRaw = $r2->prescription->doctor_name ?: ($r2->prescription->doctor->username ?? $r2->username);
                                                                $docClean = (stripos(trim((string)$docRaw), 'dr.') === 0 || stripos(trim((string)$docRaw), 'dr ') === 0) ? $docRaw : 'Dr. ' . $docRaw;
                                                            @endphp
                                                            {{ $docClean }}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-2">
                                                        <small class="text-muted text-uppercase font-weight-bold" style="font-size: 10.5px;">Prescription Date</small>
                                                        <div style="font-weight: 700; color: #0f172a;">
                                                            {{ date('d M Y', strtotime($r2->prescription->created_at)) }}
                                                        </div>
                                                    </div>

                                                    <div class="col-12 mt-2 mb-2">
                                                        <div style="background: #ffffff; border: 1px solid #99f6e4; border-left: 4px solid #00a896; border-radius: 8px; padding: 10px 14px;">
                                                            <span style="font-size: 11px; font-weight: 800; text-transform: uppercase; color: #0f766e;">Clinical Diagnosis:</span>
                                                            <strong style="color: #0f172a; margin-left: 6px;">{{ $r2->prescription->diagnosis }}</strong>
                                                        </div>
                                                    </div>

                                                    @if($r2->prescription->medicines && $r2->prescription->medicines->count() > 0)
                                                        <div class="col-12 mt-2">
                                                            <small class="text-muted text-uppercase font-weight-bold" style="font-size: 10.5px;">Prescribed Medications ({{ $r2->prescription->medicines->count() }})</small>
                                                            <ul class="list-group list-group-flush border rounded mt-1" style="background: #fff; font-size: 12.5px;">
                                                                @foreach($r2->prescription->medicines as $m)
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center py-2 px-3">
                                                                        <span><strong>{{ $m->medicine_name }}</strong> <span class="text-muted">({{ $m->dosage ?: '-' }})</span></span>
                                                                        <span class="badge badge-light border text-primary">{{ $m->frequency ?: 'As directed' }} &bull; {{ $m->duration ?: '-' }}</span>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif

                                                    <div class="col-12 mt-3">
                                                        <div style="font-size: 11.5px; color: #64748b; background: #fffbeb; border: 1px solid #fde68a; border-radius: 8px; padding: 8px 12px;">
                                                            <i class="fa fa-lock text-warning m-r-4"></i> <strong>Medical Integrity Notice:</strong> Clinical diagnosis and prescriptions are legally authored by attending medical officers and cannot be altered by administrative staff.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Form Actions -->
                                    <div class="mt-5 pt-3 text-right" style="border-top: 1px solid var(--border-light); display: flex; justify-content: flex-end; gap: 12px;">
                                        <a href="{{ url('adminappointments') }}" class="btn-admin-light">Cancel</a>
                                        <button type="submit" class="btn-admin-primary">
                                            <i class="fa fa-check-circle"></i> Save Appointment Changes
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

        </div>
    </div>

    <script src="{{ URL::to('/') }}/assets/js/jquery-3.2.1.min.js"></script>
    <script>
        $(document).ready(function() {
            function getDayOfWeek(dateStr) {
                if (!dateStr) return '';
                var d = new Date(dateStr + 'T00:00:00');
                var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                return days[d.getDay()];
            }

            function reloadDoctorSlots() {
                var doctor = $('#edit_apt_doctor').val();
                var date = $('#edit_apt_date').val();
                var currentSlot = $('#edit_apt_time').val();

                if (date) {
                    $('#edit_apt_day').val(getDayOfWeek(date));
                }

                if (!doctor || !date) return;

                $.ajax({
                    url: '{{ route("doctor.slots.api") }}',
                    type: 'GET',
                    data: { doctor: doctor, date: date },
                    success: function(res) {
                        if (res.status === 'success' && res.slots && res.slots.length > 0) {
                            var opts = '';
                            var hasCurrent = false;

                            $.each(res.slots, function(idx, s) {
                                var isSelected = (s.slot_display === currentSlot);
                                if (isSelected) hasCurrent = true;
                                var seatInfo = s.is_full ? '(Full)' : '(' + s.remaining + ' seats left)';
                                opts += '<option value="' + s.slot_display + '" ' + (isSelected ? 'selected' : '') + '>' + s.slot_display + ' ' + seatInfo + '</option>';
                            });

                            if (!hasCurrent && currentSlot) {
                                opts = '<option value="' + currentSlot + '" selected>' + currentSlot + ' (Current Slot)</option>' + opts;
                            }

                            $('#edit_apt_time').html(opts);
                        }
                    }
                });
            }

            $('#edit_apt_date').change(reloadDoctorSlots);
            $('#edit_apt_doctor').change(reloadDoctorSlots);
            reloadDoctorSlots();
        });
    </script>
</body>

</html>
