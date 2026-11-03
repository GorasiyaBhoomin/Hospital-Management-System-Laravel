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
                            <i class="fa fa-user-md"></i>
                        </span>
                        Edit Specialist Doctor
                    </h2>
                    <p>Modify consultant profile, department assignment, clinic timings, and contact details.</p>
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
                    @if(isset($std))
                        @foreach ($std as $r1)
                            <div class="admin-form-container">
                                <form action="{{ URL::to('/') }}/update_doctor" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <!-- Section 1: Doctor Identity -->
                                    <div class="form-section-title">
                                        <i class="fa fa-user-md text-primary"></i> 1. Consultant Identity
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="admin-form-group">
                                                <label>Doctor Full Name <span class="text-danger">*</span></label>
                                                <div class="admin-input-wrap">
                                                    <i class="fa fa-user-md input-icon"></i>
                                                    <input class="admin-form-control" type="text" name="username" value="{{ $r1->username }}" >
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
                                                    <input class="admin-form-control" type="email" name="email" value="{{ $r1->email }}" readonly style="background: #f1f5f9; cursor: not-allowed;">
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
                                                    <input type="date" class="admin-form-control" name="dob" value="{{ $r1->dob }}">
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
                                                        <input type="radio" name="gender" value="male" {{ $r1->gender == 'male' ? 'checked' : '' }} >
                                                        <span>Male</span>
                                                    </label>
                                                    <label class="d-flex align-items-center gap-2 mb-0" style="cursor: pointer; font-weight: 600;">
                                                        <input type="radio" name="gender" value="female" {{ $r1->gender == 'female' ? 'checked' : '' }} >
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
                                        <i class="fa fa-stethoscope text-primary"></i> 2. Department & Contact
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="admin-form-group">
                                                <label>Department <span class="text-danger">*</span></label>
                                                <select id="department" name="departmentname" class="admin-form-control no-icon" >
                                                    <option value="" disabled>-- Select Department --</option>
                                                    @foreach($departments as $list)
                                                        <option value="{{ $list->departmentname }}" {{ $r1->departmentname == $list->departmentname ? 'selected' : '' }}>
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
                                                    <input class="admin-form-control" type="number" name="phone" value="{{ $r1->phone }}" >
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
                                                    <input type="text" class="admin-form-control" name="address" value="{{ $r1->address }}">
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
                                                    <input type="text" class="admin-form-control" name="city" value="{{ $r1->city }}" >
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
                                                    <input type="text" class="admin-form-control" name="postal_code" value="{{ $r1->postal_code }}" >
                                                </div>
                                                @error('postal_code')
                                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Section 3: Media & Biography -->
                                    <div class="form-section-title mt-4">
                                        <i class="fa fa-file-text-o text-primary"></i> 3. Photo & Biography
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-3 text-center mb-3 mb-md-0">
                                            <img src="{{ $r1->Avatar ? asset($r1->Avatar) : URL::to('/assets/img/user.jpg') }}"
                                                 alt="{{ $r1->username }}"
                                                 style="width: 90px; height: 90px; border-radius: 50%; object-fit: cover; border: 3px solid #0284c7; box-shadow: 0 4px 12px rgba(0,0,0,0.15);"
                                                 onerror="this.src='{{ URL::to('/assets/img/user.jpg') }}'">
                                            <div style="font-size: 11px; color: #64748b; margin-top: 4px;">Current Avatar</div>
                                        </div>

                                        <div class="col-md-9">
                                            <div class="admin-form-group">
                                                <label>Update Doctor Photo</label>
                                                <input type="file" class="admin-form-control no-icon" name="Avatar">
                                                <small style="color: #64748b; margin-top: 4px; display: block;">Leave blank to preserve current photo.</small>
                                                @error('Avatar')
                                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-2">
                                            <div class="admin-form-group">
                                                <label>Doctor Biography & Qualifications</label>
                                                <textarea class="admin-form-control admin-textarea" rows="4" name="Bio">{{ $r1->short_bio ? $r1->short_bio : $r1->Bio }}</textarea>
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
                                            <i class="fa fa-check-circle"></i> Save Doctor Changes
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

</body>

</html>
