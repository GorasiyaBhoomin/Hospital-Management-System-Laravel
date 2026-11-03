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
                                        <select id="department" name="departmentname" class="admin-form-control no-icon" >
                                            <option value="" disabled selected>-- Select Department --</option>
                                            @foreach($departments as $list)
                                                <option value="{{ $list->departmentname }}">{{ $list->departmentname }}</option>
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
                                        <select id="doctors" name="username" class="admin-form-control no-icon" >
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
                                            <input class="admin-form-control" type="date" name="date" min="{{ date('Y-m-d') }}" value="{{ old('date') }}" >
                                        </div>
                                        @error('date')
                                            <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label>Preferred Time Slot <span class="text-danger">*</span></label>
                                        <div class="admin-input-wrap">
                                            <i class="fa fa-clock-o input-icon"></i>
                                            <input class="admin-form-control" type="time" name="time" value="{{ old('time') }}" >
                                        </div>
                                        @error('time')
                                            <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="admin-form-group">
                                        <label>Patient Chief Complaint / Problem Details <span class="text-danger">*</span></label>
                                        <textarea class="admin-form-control admin-textarea" rows="4" name="message" placeholder="Describe symptoms, previous diagnoses, or purpose of consultation..." >{{ old('message') }}</textarea>
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
            $('#department').change(function() {
                var cid = $(this).val();
                $('#doctors').html('<option value="">Loading doctors...</option>');
                $.ajax({
                    url: '/getdoctor',
                    type: 'post',
                    data: { cid: cid, _token: '{{ csrf_token() }}' },
                    success: function(result) {
                        $('#doctors').html(result);
                    },
                    error: function(xhr, status, error) {
                        console.error('Doctor fetch error:', xhr.responseText);
                        $('#doctors').html('<option value="">Select doctors</option>');
                    }
                });
            });
        });
    </script>
</body>

</html>
