@extends('user.user_layout')

@section('title', 'Book OPD Consultation | KK Patel Super Speciality Hospital')
@section('page_title', 'Book Appointment')
@section('hero_title', 'Schedule OPD Consultation')
@section('hero_subtitle', 'Select your clinical department, preferred specialist doctor, and convenient OPD time slot.')

@php
    $activePortalTab = 'book';
@endphp

@section('content')

    <div class="row">
        <!-- Main Booking Form Card -->
        <div class="col-12 col-lg-8 mb-4 mb-lg-0">
            <div class="site-card">
                <div class="site-card-header">
                    <h3 class="site-card-title">
                        <span class="card-icon" style="background: #fbf5fa; color: #69275c;">
                            <i class="fa fa-calendar-plus-o"></i>
                        </span>
                        Hospital OPD Consultation Form
                    </h3>
                    <span class="badge badge-pill" style="font-size: 12px; font-weight: 700; color: #00a896; border: 1px solid #ccfbf1; background: #f0fdfa; padding: 6px 12px;">
                        <i class="fa fa-check-circle"></i> Instant Token Confirmation
                    </span>
                </div>

                <div class="site-card-body">
                    @if (isset($errors) && $errors->any())
                        <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-4" role="alert" style="font-size: 13.5px;">
                            <strong><i class="fa fa-exclamation-triangle"></i> Please check the required fields:</strong>
                            <ul class="mb-0 mt-2 pl-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('user.appointment.store') }}" method="POST">
                        @csrf

                        <!-- Row 1: Patient Identity -->
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
                                <label class="form-label font-weight-bold" style="font-size: 13px; color: #0f172a;">Patient Full Name <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light border-right-0"><i class="fa fa-user-o text-muted"></i></span>
                                    </div>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', Auth::user()->name) }}" required placeholder="Patient full name" style="height: 46px; font-size: 14px;">
                                </div>
                            </div>

                            <div class="col-12 col-md-6 mb-3">
                                <label class="form-label font-weight-bold" style="font-size: 13px; color: #0f172a;">Patient Email Address <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light border-right-0"><i class="fa fa-envelope-o text-muted"></i></span>
                                    </div>
                                    <input type="email" name="email" class="form-control" value="{{ old('email', Auth::user()->email) }}" required readonly placeholder="patient@example.com" style="height: 46px; font-size: 14px; background: #f8fafc;">
                                </div>
                            </div>
                        </div>

                        <!-- Row 2: Contact & Department -->
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
                                <label class="form-label font-weight-bold" style="font-size: 13px; color: #0f172a;">Mobile / WhatsApp Number <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light border-right-0"><i class="fa fa-phone text-muted"></i></span>
                                    </div>
                                    <input type="tel" name="phone_number" class="form-control" value="{{ old('phone_number', Auth::user()->phone_number) }}" required placeholder="10-digit mobile number" style="height: 46px; font-size: 14px;">
                                </div>
                            </div>

                            <div class="col-12 col-md-6 mb-3">
                                <label class="form-label font-weight-bold" style="font-size: 13px; color: #0f172a;">Clinical Department <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light border-right-0"><i class="fa fa-hospital-o text-muted"></i></span>
                                    </div>
                                    <select name="department" id="deptSelect" class="form-control" required style="height: 46px; font-size: 14px;">
                                        <option value="">-- Choose Speciality Wing --</option>
                                        @foreach($departments as $dept)
                                            <option value="{{ $dept->departmentname }}" {{ (old('department') == $dept->departmentname || (isset($selectedDept) && $selectedDept == $dept->departmentname)) ? 'selected' : '' }}>
                                                {{ $dept->departmentname }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Row 3: Doctor & Date -->
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
                                <label class="form-label font-weight-bold" style="font-size: 13px; color: #0f172a;">Select Doctor / Specialist <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light border-right-0"><i class="fa fa-user-md text-muted"></i></span>
                                    </div>
                                    <select name="doctor" id="doctorSelect" class="form-control" required style="height: 46px; font-size: 14px;">
                                        <option value="">-- Choose Specialist Doctor --</option>
                                        @foreach($doctors as $doc)
                                            <option value="{{ $doc->username }}" data-dept="{{ $doc->departmentname }}" {{ (old('doctor') == $doc->username || (isset($selectedDoc) && $selectedDoc == $doc->username)) ? 'selected' : '' }}>
                                                {{ $doc->username }} ({{ $doc->departmentname }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 mb-3">
                                <label class="form-label font-weight-bold" style="font-size: 13px; color: #0f172a;">Preferred Consultation Date <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light border-right-0"><i class="fa fa-calendar text-muted"></i></span>
                                    </div>
                                    <input type="date" name="date" id="dateInput" class="form-control" value="{{ old('date', date('Y-m-d', strtotime('+1 day'))) }}" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+30 days')) }}" required style="height: 46px; font-size: 14px;">
                                </div>
                                <small class="text-muted d-block mt-1" style="font-size: 11.5px;">
                                    <i class="fa fa-info-circle text-primary"></i> Booking open for this month (till {{ date('d M Y', strtotime('+30 days')) }}).
                                </small>
                                <input type="hidden" name="day" id="userDayInput" value="{{ old('day') }}">
                            </div>

                            <!-- Doctor Availability & Day Schedule Live Banner -->
                            <div class="col-12 mb-3" id="doctorScheduleNotice" style="display: none;">
                                <div class="p-3 rounded-3" id="scheduleNoticeBox" style="border: 1px solid #e2e8f0; background: #f8fafc; font-size: 13px;">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge px-3 py-1 text-uppercase text-white" id="dayDisplayBadge" style="background: #69275c; letter-spacing: 0.5px; font-weight: 700; border-radius: 6px;">Day</span>
                                            <strong id="docScheduleName" style="color: #0f172a;">Doctor Schedule</strong>
                                        </div>
                                        <span id="docDutyStatusBadge" class="badge badge-pill px-3 py-1" style="font-weight: 700;">Checking availability...</span>
                                    </div>
                                    <div class="mt-2" id="docScheduleDetails" style="font-size: 12.5px; color: #475569;"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Row 4: Time Slot & Gender -->
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <label class="form-label font-weight-bold mb-0" style="font-size: 13px; color: #0f172a;">Doctor OPD Time Slot <span class="text-danger">*</span></label>
                                    <small id="slotStatusHint" class="text-muted" style="font-size: 11px;">Dynamic doctor slots</small>
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light border-right-0"><i class="fa fa-clock-o text-muted"></i></span>
                                    </div>
                                    <select name="time" id="slotSelect" class="form-control" required style="height: 46px; font-size: 14px;">
                                        <option value="">-- Choose Doctor & Date first --</option>
                                    </select>
                                </div>
                                <!-- Interactive Quick Slot Chips -->
                                <div id="slotChipsContainer" class="d-flex flex-wrap gap-2 mt-2" style="max-height: 120px; overflow-y: auto;"></div>
                            </div>

                            <div class="col-12 col-md-6 mb-3">
                                <label class="form-label font-weight-bold" style="font-size: 13px; color: #0f172a;">Patient Gender</label>
                                <div class="d-flex align-items-center gap-4 mt-2">
                                    <label class="d-flex align-items-center gap-2 mb-0" style="font-size: 14px; cursor: pointer;">
                                        <input type="radio" name="gender" value="Male" {{ old('gender', 'Male') == 'Male' ? 'checked' : '' }}> Male
                                    </label>
                                    <label class="d-flex align-items-center gap-2 mb-0" style="font-size: 14px; cursor: pointer;">
                                        <input type="radio" name="gender" value="Female" {{ old('gender') == 'Female' ? 'checked' : '' }}> Female
                                    </label>
                                    <label class="d-flex align-items-center gap-2 mb-0" style="font-size: 14px; cursor: pointer;">
                                        <input type="radio" name="gender" value="Other" {{ old('gender') == 'Other' ? 'checked' : '' }}> Other
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Row 5: Symptoms -->
                        <div class="mb-4">
                            <label class="form-label font-weight-bold" style="font-size: 13px; color: #0f172a;">Symptoms / Reason for Consultation</label>
                            <textarea name="massage" class="form-control" rows="3" placeholder="Describe symptoms or reasons for OPD visit (optional)..." style="font-size: 14px; border-radius: 12px;">{{ old('massage') }}</textarea>
                            <small class="text-muted">This helps our medical team prepare before your consultation.</small>
                        </div>

                        <!-- Actions -->
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 pt-3" style="border-top: 1px solid #f1f5f9;">
                            <a href="{{ url('/user/dashboard') }}" class="btn btn-light rounded-pill px-4" style="font-weight: 700; color: #64748b; border: 1px solid #e2e8f0;">
                                &larr; Back to Dashboard
                            </a>
                            <button type="submit" class="btn btn-primary rounded-pill px-4 font-weight-bold" style="background: linear-gradient(135deg, #69275c, #8b1d6b); border: none; padding: 11px 28px; font-size: 14px;">
                                <i class="fa fa-calendar-check-o"></i> Confirm & Book Appointment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar Guidelines Card -->
        <div class="col-12 col-lg-4">
            <!-- OPD Instructions -->
            <div class="site-card mb-4" style="border-top: 4px solid #69275c;">
                <div class="site-card-header">
                    <h4 style="font-size: 16px; font-weight: 800; color: #0f172a; margin: 0;">
                        <i class="fa fa-info-circle text-primary"></i> Patient OPD Guide
                    </h4>
                </div>
                <div class="site-card-body">
                    <ul class="list-unstyled mb-0" style="font-size: 13px; color: #475569; line-height: 1.8;">
                        <li class="mb-2 d-flex align-items-start gap-2">
                            <i class="fa fa-clock-o text-primary mt-1"></i>
                            <span>Please arrive <strong>15 minutes</strong> prior to your slot for initial triage & vitals recording.</span>
                        </li>
                        <li class="mb-2 d-flex align-items-start gap-2">
                            <i class="fa fa-file-text-o text-primary mt-1"></i>
                            <span>Bring past clinical prescriptions, test reports, and list of current medications.</span>
                        </li>
                        <li class="mb-2 d-flex align-items-start gap-2">
                            <i class="fa fa-id-card-o text-primary mt-1"></i>
                            <span>Keep your Aadhaar card or Government photo ID handy at the reception desk.</span>
                        </li>
                        <li class="d-flex align-items-start gap-2">
                            <i class="fa fa-shield text-success mt-1"></i>
                            <span>Cashless PMJAY desk is available right inside the central registration lobby.</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Hospital Location & Helpdesk -->
            <div class="site-card">
                <div class="site-card-body text-center">
                    <div style="width: 52px; height: 52px; border-radius: 16px; background: #e0f2fe; color: #0284c7; display: flex; align-items: center; justify-content: center; font-size: 24px; margin: 0 auto 12px;">
                        <i class="fa fa-hospital-o"></i>
                    </div>
                    <h5 style="font-size: 16px; font-weight: 800; color: #0f172a; margin: 0 0 4px;">KK Patel Super Speciality</h5>
                    <p style="font-size: 12.5px; color: #64748b; margin-bottom: 12px;">
                        Bhuj - Mirzapar Highway, Bhuj, Kutch, Gujarat 370001
                    </p>
                    <a href="tel:02832236000" class="btn btn-outline-primary btn-sm rounded-pill px-3 font-weight-bold">
                        <i class="fa fa-phone"></i> Helpdesk: 02832 236000
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var deptSelect = document.getElementById('deptSelect');
        var docSelect = document.getElementById('doctorSelect');
        var dateInput = document.getElementById('dateInput');
        var dayInput = document.getElementById('userDayInput');
        var slotSelect = document.getElementById('slotSelect');
        var slotChipsContainer = document.getElementById('slotChipsContainer');
        var scheduleNotice = document.getElementById('doctorScheduleNotice');
        var scheduleNoticeBox = document.getElementById('scheduleNoticeBox');
        var dayDisplayBadge = document.getElementById('dayDisplayBadge');
        var docScheduleName = document.getElementById('docScheduleName');
        var docDutyStatusBadge = document.getElementById('docDutyStatusBadge');
        var docScheduleDetails = document.getElementById('docScheduleDetails');
        var slotStatusHint = document.getElementById('slotStatusHint');

        // Department filter
        if (deptSelect && docSelect) {
            deptSelect.addEventListener('change', function() {
                var selectedDept = this.value;
                var currentDocVal = docSelect.value;
                var docStillValid = false;

                for (var i = 0; i < docSelect.options.length; i++) {
                    var opt = docSelect.options[i];
                    if (!opt.value) continue;
                    var docDept = opt.getAttribute('data-dept');
                    if (!selectedDept || docDept === selectedDept) {
                        opt.style.display = '';
                        if (opt.value === currentDocVal) docStillValid = true;
                    } else {
                        opt.style.display = 'none';
                    }
                }

                if (!docStillValid && currentDocVal) {
                    docSelect.value = '';
                    loadDoctorSlotsAndDay();
                }
            });
        }

        // Calculate Day Name from Date string
        function getDayName(dateString) {
            if (!dateString) return '';
            var d = new Date(dateString + 'T00:00:00');
            var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            return days[d.getDay()];
        }

        // Fetch Doctor Slots & Day Schedule from API
        function loadDoctorSlotsAndDay() {
            var doctor = docSelect ? docSelect.value : '';
            var date = dateInput ? dateInput.value : '';

            // Calculate Day
            var calculatedDay = getDayName(date);
            if (dayInput) dayInput.value = calculatedDay;

            if (!doctor) {
                if (scheduleNotice) scheduleNotice.style.display = 'none';
                if (slotSelect) slotSelect.innerHTML = '<option value="">-- Choose Specialist Doctor first --</option>';
                if (slotChipsContainer) slotChipsContainer.innerHTML = '';
                if (slotStatusHint) slotStatusHint.textContent = 'Please choose doctor';
                return;
            }

            if (!date) {
                if (scheduleNotice) scheduleNotice.style.display = 'none';
                if (slotSelect) slotSelect.innerHTML = '<option value="">-- Select consultation date --</option>';
                if (slotChipsContainer) slotChipsContainer.innerHTML = '';
                return;
            }

            if (slotStatusHint) slotStatusHint.textContent = 'Loading live doctor slots...';
            if (slotSelect) slotSelect.innerHTML = '<option value="">Loading consultation slots...</option>';

            fetch('{{ route("doctor.slots.api") }}?doctor=' + encodeURIComponent(doctor) + '&date=' + encodeURIComponent(date))
                .then(function(res) { return res.json(); })
                .then(function(data) {
                    if (data.status === 'success') {
                        if (dayInput) dayInput.value = data.day;
                        if (scheduleNotice) scheduleNotice.style.display = 'block';
                        if (dayDisplayBadge) dayDisplayBadge.textContent = data.day;
                        if (docScheduleName) docScheduleName.textContent = data.doctor.name + ' (' + data.doctor.department + ')';

                        if (data.is_day_off) {
                            // Doctor Day Off
                            scheduleNoticeBox.style.background = '#fef2f2';
                            scheduleNoticeBox.style.borderColor = '#fecaca';
                            docDutyStatusBadge.className = 'badge badge-danger px-3 py-1';
                            docDutyStatusBadge.style.background = '#dc2626';
                            docDutyStatusBadge.style.color = '#fff';
                            docDutyStatusBadge.innerHTML = '<i class="fa fa-exclamation-circle"></i> Off-Duty (' + data.schedule_notes + ')';
                            docScheduleDetails.innerHTML = '<strong>Note:</strong> Doctor does not have regular OPD on <strong>' + data.day + 's</strong>. You may book emergency slot or choose another date.';
                            if (slotStatusHint) slotStatusHint.textContent = 'Doctor off-duty';
                        } else {
                            // Doctor on duty
                            scheduleNoticeBox.style.background = '#f0fdf4';
                            scheduleNoticeBox.style.borderColor = '#bbf7d0';
                            docDutyStatusBadge.className = 'badge badge-success px-3 py-1';
                            docDutyStatusBadge.style.background = '#16a34a';
                            docDutyStatusBadge.style.color = '#fff';
                            docDutyStatusBadge.innerHTML = '<i class="fa fa-check-circle"></i> On Duty';
                            docScheduleDetails.innerHTML = '<strong>Hours:</strong> ' + (data.shift_timings || 'Regular Consultations') + ' | <strong>Room:</strong> ' + data.doctor.room_no + ' | <strong>Fee:</strong> ₹' + data.doctor.fee;
                            if (slotStatusHint) slotStatusHint.textContent = data.slots.length + ' slots available';
                        }

                        // Populate Slots Dropdown & Chips (Excluding Past/Expired Slots for Today)
                        var selectHtml = '<option value="">-- Select Time Slot (' + data.day + ') --</option>';
                        var chipsHtml = '';
                        var visibleSlotsCount = 0;

                        if (data.slots && data.slots.length > 0) {
                            data.slots.forEach(function(s) {
                                // If the time has already passed for today, do not show it
                                if (s.is_past) {
                                    return;
                                }
                                visibleSlotsCount++;

                                var isFull = s.is_full;
                                var seatsText = isFull ? '(Full)' : '(' + s.remaining + ' seats left)';
                                selectHtml += '<option value="' + s.slot_display + '" ' + (isFull ? 'disabled style="color: #94a3b8;"' : '') + '>' + s.slot_display + ' ' + seatsText + '</option>';

                                if (!isFull) {
                                    chipsHtml += '<button type="button" class="btn btn-sm btn-outline-secondary slot-chip-btn rounded-pill px-3 py-1" data-slot="' + s.slot_display + '" style="font-size: 12px; font-weight: 600; border-color: #cbd5e1; color: #334155;">' +
                                        '<i class="fa fa-clock-o mr-1"></i> ' + s.slot_display +
                                        '</button>';
                                }
                            });
                        }

                        if (visibleSlotsCount === 0) {
                            selectHtml = '<option value="">-- All consultation slots have ended for today. Please pick tomorrow or an upcoming date. --</option>';
                            chipsHtml = '<span class="text-danger" style="font-size: 12px;"><i class="fa fa-clock-o mr-1"></i> All OPD sessions for today have passed. Please pick another date.</span>';
                            if (slotStatusHint) slotStatusHint.textContent = '0 slots left today';
                        } else {
                            if (slotStatusHint) slotStatusHint.textContent = visibleSlotsCount + ' upcoming slots available';
                        }

                        if (slotSelect) slotSelect.innerHTML = selectHtml;
                        if (slotChipsContainer) {
                            slotChipsContainer.innerHTML = chipsHtml;
                            attachChipListeners();
                        }
                    } else {
                        if (slotSelect) slotSelect.innerHTML = '<option value="">-- Select doctor & date --</option>';
                        if (slotChipsContainer) slotChipsContainer.innerHTML = '';
                    }
                })
                .catch(function(err) {
                    console.error('Error fetching doctor slots:', err);
                    if (slotSelect) slotSelect.innerHTML = '<option value="">-- Error loading doctor slots --</option>';
                });
        }

        // Clickable Slot Chips Listener
        function attachChipListeners() {
            var chips = document.querySelectorAll('.slot-chip-btn');
            chips.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var slotVal = this.getAttribute('data-slot');
                    if (slotSelect) {
                        slotSelect.value = slotVal;
                    }
                    chips.forEach(function(c) {
                        c.style.background = '';
                        c.style.color = '#334155';
                        c.style.borderColor = '#cbd5e1';
                    });
                    this.style.background = '#69275c';
                    this.style.color = '#ffffff';
                    this.style.borderColor = '#69275c';
                });
            });
        }

        // When slotSelect changes, highlight the active chip
        if (slotSelect) {
            slotSelect.addEventListener('change', function() {
                var selectedSlot = this.value;
                var chips = document.querySelectorAll('.slot-chip-btn');
                chips.forEach(function(c) {
                    if (c.getAttribute('data-slot') === selectedSlot) {
                        c.style.background = '#69275c';
                        c.style.color = '#ffffff';
                        c.style.borderColor = '#69275c';
                    } else {
                        c.style.background = '';
                        c.style.color = '#334155';
                        c.style.borderColor = '#cbd5e1';
                    }
                });
            });
        }

        // Listeners for Doctor and Date changes
        if (docSelect) docSelect.addEventListener('change', loadDoctorSlotsAndDay);
        if (dateInput) dateInput.addEventListener('change', loadDoctorSlotsAndDay);

        // Initial trigger on load
        if (docSelect && docSelect.value) {
            loadDoctorSlotsAndDay();
        } else if (dateInput && dateInput.value) {
            if (dayInput) dayInput.value = getDayName(dateInput.value);
        }
    });
</script>
@endpush
