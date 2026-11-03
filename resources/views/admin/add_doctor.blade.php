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
                            <i class="fa fa-user-plus"></i>
                        </span>
                        Add Specialist Doctor
                    </h2>
                    <p>Onboard a new medical consultant, surgeon, or department specialist to KK Patel Hospital.</p>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ url('admindoctors') }}" class="btn-admin-light">
                        <i class="fa fa-arrow-left"></i> Back to Doctors Directory
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
                        <form action="{{ route('add_doctor') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Section 1: Doctor Identity -->
                            <div class="form-section-title">
                                <i class="fa fa-user-md text-primary"></i> 1. Consultant Identity & Basic Info
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label>Doctor Full Name <span class="text-danger">*</span></label>
                                        <div class="admin-input-wrap">
                                            <i class="fa fa-user-md input-icon"></i>
                                            <input class="admin-form-control" type="text" name="username" value="{{ old('username') }}" placeholder="e.g. Dr. Rajesh Sharma" >
                                        </div>
                                        @error('username')
                                            <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label>Email Address <span class="text-danger">*</span></label>
                                        <div class="admin-input-wrap">
                                            <i class="fa fa-envelope-o input-icon"></i>
                                            <input class="admin-form-control" type="email" name="email" value="{{ old('email') }}" placeholder="doctor@kkpatelhospital.com" >
                                        </div>
                                        @error('email')
                                            <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label>Date of Birth</label>
                                        <div class="admin-input-wrap">
                                            <i class="fa fa-calendar input-icon"></i>
                                            <input type="date" class="admin-form-control" name="dob" value="{{ old('dob') }}">
                                        </div>
                                        @error('dob')
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

                            <!-- Section 2: Department & Contact -->
                            <div class="form-section-title mt-4">
                                <i class="fa fa-stethoscope text-primary"></i> 2. Clinical Department & Location
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label>Department <span class="text-danger">*</span></label>
                                        <select id="department" name="departmentname" class="admin-form-control no-icon" >
                                            <option value="" disabled selected>-- Select Department --</option>
                                            @foreach($departments as $list)
                                                <option value="{{ $list->departmentname }}" {{ old('departmentname') == $list->departmentname ? 'selected' : '' }}>
                                                    {{ $list->departmentname }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('department')
                                            <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label>Contact Phone <span class="text-danger">*</span></label>
                                        <div class="admin-input-wrap">
                                            <i class="fa fa-phone input-icon"></i>
                                            <input class="admin-form-control" type="number" name="phone" value="{{ old('phone') }}" placeholder="10-digit mobile number" >
                                        </div>
                                        @error('phone')
                                            <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="admin-form-group">
                                        <label>Hospital / Clinic Address</label>
                                        <div class="admin-input-wrap">
                                            <i class="fa fa-building-o input-icon"></i>
                                            <input type="text" class="admin-form-control" name="address" value="{{ old('address') }}" placeholder="OPD Wing, Room #, Hospital Campus">
                                        </div>
                                        @error('address')
                                            <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label>City <span class="text-danger">*</span></label>
                                        <div class="admin-input-wrap">
                                            <i class="fa fa-map-pin input-icon"></i>
                                            <input type="text" class="admin-form-control" name="city" value="{{ old('city') }}" placeholder="e.g. Bhuj" >
                                        </div>
                                        @error('city')
                                            <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label>Postal Code <span class="text-danger">*</span></label>
                                        <div class="admin-input-wrap">
                                            <i class="fa fa-envelope input-icon"></i>
                                            <input type="text" class="admin-form-control" name="postal_code" value="{{ old('postal_code') }}" placeholder="370001" >
                                        </div>
                                        @error('postal_code')
                                            <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Section 3: Media & Credentials -->
                            <div class="form-section-title mt-4">
                                <i class="fa fa-file-text-o text-primary"></i> 3. Profile Photo, CV & Biography
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label>Doctor Profile Image <span class="text-danger">*</span></label>
                                        <input type="file" class="admin-form-control no-icon" name="Avatar" >
                                        <small style="color: #64748b; margin-top: 4px; display: block;">JPG, PNG, or WEBP doctor headshot</small>
                                        @error('Avatar')
                                            <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="admin-form-group">
                                        <label>Upload Curriculum Vitae (CV) <span class="text-danger">*</span></label>
                                        <input type="file" class="admin-form-control no-icon" name="CV" >
                                        <small style="color: #64748b; margin-top: 4px; display: block;">PDF or DOC format medical credentials</small>
                                        @error('CV')
                                            <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="admin-form-group">
                                        <label>Doctor Biography & Qualifications <span class="text-danger">*</span></label>
                                        <textarea class="admin-form-control admin-textarea" rows="4" name="Bio" placeholder="Consultant qualifications, clinical fellowships, medical background..." >{{ old('Bio') }}</textarea>
                                        @error('Bio')
                                            <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="mt-5 pt-3 text-right" style="border-top: 1px solid var(--border-light); display: flex; justify-content: flex-end; gap: 12px;">
                                <a href="{{ url('admindoctors') }}" class="btn-admin-light">Cancel</a>
                                <button type="submit" class="btn-admin-primary">
                                    <i class="fa fa-user-plus"></i> Save & Onboard Doctor
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>
