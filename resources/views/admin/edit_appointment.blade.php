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
                                                <div class="d-flex align-items-center gap-4 pt-1">
                                                    <label class="d-flex align-items-center gap-2 mb-0" style="cursor: pointer; font-weight: 700; color: #059669;">
                                                        <input type="radio" name="Status" value="Approved" {{ $r2['Status'] == 'Approved' ? 'checked' : '' }} >
                                                        <span><i class="fa fa-check-circle"></i> Approved</span>
                                                    </label>
                                                    <label class="d-flex align-items-center gap-2 mb-0" style="cursor: pointer; font-weight: 700; color: #dc2626;">
                                                        <input type="radio" name="Status" value="Rejected" {{ $r2['Status'] == 'Rejected' ? 'checked' : '' }} >
                                                        <span><i class="fa fa-times-circle"></i> Rejected</span>
                                                    </label>
                                                </div>
                                                @error('Status')
                                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

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
