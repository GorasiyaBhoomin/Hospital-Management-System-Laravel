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
                            <i class="fa fa-calendar-plus-o"></i>
                        </span>
                        Book Patient Appointment
                    </h2>
                    <p>Schedule an in-person or online consultation, assign specialist doctor, and set time slot.</p>
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
                    <div class="admin-form-container">
                        <form action="add_appointment_validates" method="POST">
                            @csrf

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
                                            <input class="admin-form-control" type="text" name="appointmentname" value="{{ old('appointmentname') }}" placeholder="Full name of patient" >
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
                                            <input class="admin-form-control" type="email" name="email" value="{{ old('email') }}" placeholder="patient@example.com" >
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
                                            <input class="admin-form-control" type="number" name="phone" value="{{ old('phone') }}" placeholder="10-digit mobile number" >
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
                                                <input type="radio" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }} >
                                                <span>Male</span>
                                            </label>
                                            <label class="d-flex align-items-center gap-2 mb-0" style="cursor: pointer; font-weight: 600;">
                                                <input type="radio" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }} >
                                                <span>Female</span>
                                            </label>
                                        </div>
                                        @error('gender')
                                            <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Section 2: Clinical Slot & Specialist -->
                            <div class="form-section-title mt-4">
                                <i class="fa fa-stethoscope text-primary"></i> 2. Department & Doctor Allocation
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label>Department <span class="text-danger">*</span></label>
                                        <select id="department" name="departmentname" class="admin-form-control no-icon" required>
                                            <option value="" disabled selected>-- Select Department --</option>
                                            @foreach($departments as $list)
                                                <option value="{{ $list->departmentname }}" {{ old('departmentname') == $list->departmentname ? 'selected' : '' }}>{{ $list->departmentname }}</option>
                                            @endforeach
                                        </select>
                                        @error('departmentname')
                                            <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label>Assigned Doctor <span class="text-danger">*</span></label>
                                        <select id="doctors" name="username" class="admin-form-control no-icon" required>
                                            <option value="">-- Select Specialist Doctor --</option>
                                        </select>
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
                                            <input class="admin-form-control" type="date" id="appointment_date" name="date" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+30 days')) }}" value="{{ old('date', date('Y-m-d', strtotime('+1 day'))) }}" required>
                                        </div>
                                        <small class="text-muted" style="font-size: 11px;"><i class="fa fa-info-circle text-primary"></i> Monthly schedule: allowed till {{ date('d M Y', strtotime('+30 days')) }}.</small>
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
                                            <input class="admin-form-control" type="text" id="appointment_day" name="day" readonly value="{{ old('day') }}" placeholder="Auto-calculated Day" style="background: #f8fafc; font-weight: 700; color: #0284c7;">
                                        </div>
                                        <small class="text-muted" style="font-size: 11px;">Calculated automatically from consultation date.</small>
                                    </div>
                                </div>

                                <!-- Doctor Schedule & Duty Banner -->
                                <div class="col-12" id="adminDoctorScheduleNotice" style="display: none;">
                                    <div class="p-3 mb-3" id="adminScheduleNoticeBox" style="border-radius: 12px; border: 1px solid #e2e8f0; background: #f8fafc; font-size: 13px;">
                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="badge badge-info px-2 py-1 text-white" id="adminDayBadge" style="background: #0284c7; font-weight: 700;">DAY</span>
                                                <strong id="adminDocTitle" style="color: #0f172a;">Doctor Shift Schedule</strong>
                                            </div>
                                            <span id="adminDocDutyBadge" class="badge">Checking...</span>
                                        </div>
                                        <div class="mt-2" id="adminDocDetails" style="font-size: 12.5px; color: #64748b;"></div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label>Doctor OPD Time Slot <span class="text-danger">*</span></label>
                                        <div class="admin-input-wrap">
                                            <i class="fa fa-clock-o input-icon"></i>
                                            <select id="time_slot" name="time" class="admin-form-control" required style="padding-left: 42px;">
                                                <option value="">-- Choose Doctor & Date first --</option>
                                            </select>
                                        </div>
                                        <small id="adminSlotHint" class="text-muted" style="font-size: 11px;">Doctor time slots will dynamically load here.</small>
                                        @error('time')
                                            <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label>Consultation Mode / Room</label>
                                        <div class="admin-input-wrap">
                                            <i class="fa fa-building-o input-icon"></i>
                                            <input class="admin-form-control" type="text" id="adminDocRoom" readonly value="Central OPD" style="background: #f8fafc;">
                                        </div>
                                        <small class="text-muted" style="font-size: 11px;">Assigned doctor's consultation chamber.</small>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="admin-form-group">
                                        <label>Patient Chief Complaint / Problem Details <span class="text-danger">*</span></label>
                                        <textarea class="admin-form-control admin-textarea" rows="4" name="message" placeholder="Describe symptoms, previous diagnoses, or purpose of consultation..." required>{{ old('message') }}</textarea>
                                        @error('message')
                                            <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="mt-5 pt-3 text-right" style="border-top: 1px solid var(--border-light); display: flex; justify-content: flex-end; gap: 12px;">
                                <a href="{{ url('adminappointments') }}" class="btn-admin-light">Cancel</a>
                                <button type="submit" class="btn-admin-primary">
                                    <i class="fa fa-calendar-check-o"></i> Confirm & Book Appointment
                                </button>
                            </div>
                        </form>
                    </div>
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

            function fetchDoctorSlotsAndSchedule() {
                var doctor = $('#doctors').val();
                var date = $('#appointment_date').val();

                var dayName = getDayOfWeek(date);
                $('#appointment_day').val(dayName);

                if (!doctor) {
                    $('#adminDoctorScheduleNotice').hide();
                    $('#time_slot').html('<option value="">-- Select Specialist Doctor first --</option>');
                    $('#adminSlotHint').text('Doctor time slots will dynamically load here.');
                    return;
                }

                if (!date) {
                    $('#adminDoctorScheduleNotice').hide();
                    $('#time_slot').html('<option value="">-- Choose appointment date --</option>');
                    return;
                }

                $('#time_slot').html('<option value="">Loading doctor time slots...</option>');
                $('#adminSlotHint').text('Fetching doctor slots & availability...');

                $.ajax({
                    url: '{{ route("doctor.slots.api") }}',
                    type: 'GET',
                    data: { doctor: doctor, date: date },
                    success: function(res) {
                        if (res.status === 'success') {
                            $('#appointment_day').val(res.day);
                            $('#adminDayBadge').text(res.day.toUpperCase());
                            $('#adminDocTitle').text(res.doctor.name + ' (' + res.doctor.department + ')');
                            $('#adminDocRoom').val(res.doctor.room_no || 'Central OPD');
                            $('#adminDoctorScheduleNotice').show();

                            if (res.is_day_off) {
                                $('#adminScheduleNoticeBox').css({'background': '#fef2f2', 'border-color': '#fecaca'});
                                $('#adminDocDutyBadge').removeClass().addClass('badge badge-danger text-white').css('background', '#dc2626').text('Off-Duty (' + res.schedule_notes + ')');
                                $('#adminDocDetails').html('<strong>Notice:</strong> Doctor has weekly off on <strong>' + res.day + 's</strong>. Consultation may be rescheduled or confirmed as emergency.');
                                $('#adminSlotHint').text('Doctor is marked off-duty on this day.');
                            } else {
                                $('#adminScheduleNoticeBox').css({'background': '#f0fdf4', 'border-color': '#bbf7d0'});
                                $('#adminDocDutyBadge').removeClass().addClass('badge badge-success text-white').css('background', '#16a34a').text('On Duty');
                                $('#adminDocDetails').html('<strong>Shift Timings:</strong> ' + (res.shift_timings || 'Regular Consultations') + ' | <strong>Consultation Fee:</strong> ₹' + res.doctor.fee);
                                $('#adminSlotHint').text(res.slots.length + ' active time slots found.');
                            }

                            var slotOptions = '<option value="">-- Select Doctor OPD Time Slot (' + res.day + ') --</option>';
                            var visibleSlots = 0;
                            if (res.slots && res.slots.length > 0) {
                                $.each(res.slots, function(idx, s) {
                                    // Skip past/expired slots for today
                                    if (s.is_past) return;
                                    visibleSlots++;
                                    var isFull = s.is_full;
                                    var seatInfo = isFull ? '(Full)' : '(' + s.remaining + ' seats left)';
                                    slotOptions += '<option value="' + s.slot_display + '" ' + (isFull ? 'disabled style="color:#94a3b8;"' : '') + '>' + s.slot_display + ' ' + seatInfo + '</option>';
                                });
                            }
                            if (visibleSlots === 0) {
                                slotOptions = '<option value="">-- All consultation slots have ended for today --</option>';
                                $('#adminSlotHint').text('All OPD slots for today have already passed.');
                            } else {
                                $('#adminSlotHint').text(visibleSlots + ' active upcoming time slots found.');
                            }
                            $('#time_slot').html(slotOptions);
                        } else {
                            $('#time_slot').html('<option value="">-- ' + (res.message || 'Unable to load slots') + ' --</option>');
                        }
                    },
                    error: function(xhr) {
                        console.error('Error fetching doctor slots:', xhr.responseText);
                        $('#time_slot').html('<option value="">-- Error loading doctor slots --</option>');
                    }
                });
            }

            // Department change -> reload doctors
            $('#department').change(function() {
                var cid = $(this).val();
                $('#doctors').html('<option value="">Loading doctors...</option>');
                $.ajax({
                    url: '/getdoctor',
                    type: 'post',
                    data: { cid: cid, _token: '{{ csrf_token() }}' },
                    success: function(result) {
                        $('#doctors').html(result);
                        fetchDoctorSlotsAndSchedule();
                    },
                    error: function(xhr, status, error) {
                        console.error('Doctor fetch error:', xhr.responseText);
                        $('#doctors').html('<option value="">Select doctors</option>');
                    }
                });
            });

            // Doctor or Date change -> reload slots & day
            $('#doctors').change(fetchDoctorSlotsAndSchedule);
            $('#appointment_date').change(fetchDoctorSlotsAndSchedule);

            // Trigger initial calculation if date is preset
            if ($('#appointment_date').val()) {
                $('#appointment_day').val(getDayOfWeek($('#appointment_date').val()));
            }
        });
    </script>
</body>

</html>
