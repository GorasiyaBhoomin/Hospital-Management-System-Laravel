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
                        <span class="title-icon-box" style="background: #d1fae5; color: #10b981;">
                            <i class="fa fa-hospital-o"></i>
                        </span>
                        Add Super Speciality Department
                    </h2>
                    <p>Register a new clinical department, appoint the department head, and set unit facilities.</p>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ url('admindepartments') }}" class="btn-admin-light">
                        <i class="fa fa-arrow-left"></i> Back to Departments
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
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="admin-form-container">
                        <form action="add_departments" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-section-title">
                                <i class="fa fa-info-circle text-primary"></i> Department Information
                            </div>

                            <div class="admin-form-group">
                                <label>Department Name <span class="text-danger">*</span></label>
                                <div class="admin-input-wrap">
                                    <i class="fa fa-stethoscope input-icon"></i>
                                    <input class="admin-form-control" type="text" name="departmentname" value="{{ old('departmentname') }}" placeholder="e.g. Cardiology & Cath Lab" >
                                </div>
                                @error('departmentname')
                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="admin-form-group">
                                <label>Department Head (Consultant / Chief) <span class="text-danger">*</span></label>
                                <div class="admin-input-wrap">
                                    <i class="fa fa-user-md input-icon"></i>
                                    <input class="admin-form-control" type="text" name="departmenthead" value="{{ old('departmenthead', 'Dr.') }}" placeholder="Dr. Department Head" >
                                </div>
                                @error('departmenthead')
                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="admin-form-group">
                                <label>Department Cover / Banner Image</label>
                                <input type="file" name="departmentimage" class="admin-form-control no-icon">
                                <small style="color: #64748b; margin-top: 4px; display: block;">Recommended size: 600x400 JPG or PNG</small>
                                @error('departmentimage')
                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="admin-form-group">
                                <label>Clinical Scope & Description</label>
                                <textarea cols="30" rows="4" name="description" class="admin-form-control admin-textarea" placeholder="Detail surgical capabilities, equipment, OPD hours, and emergency care...">{{ old('description') }}</textarea>
                                @error('description')
                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Form Actions -->
                            <div class="mt-4 pt-3 text-right" style="border-top: 1px solid var(--border-light); display: flex; justify-content: flex-end; gap: 12px;">
                                <a href="{{ url('admindepartments') }}" class="btn-admin-light">Cancel</a>
                                <button type="submit" class="btn-admin-primary">
                                    <i class="fa fa-plus-circle"></i> Create Department
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
