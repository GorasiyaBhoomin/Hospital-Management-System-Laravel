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
                        Edit Clinical Department
                    </h2>
                    <p>Modify department branding, head of department, facilities, and overview description.</p>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ url('admindepartments') }}" class="btn-admin-light">
                        <i class="fa fa-arrow-left"></i> Back to Departments
                    </a>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="admin-form-container">
                        <form action="{{ URL::to('/') }}/update_department" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $department->id }}">

                            <div class="form-section-title">
                                <i class="fa fa-pencil text-primary"></i> Department Details
                            </div>

                            <div class="admin-form-group">
                                <label>Department Name <span class="text-danger">*</span></label>
                                <div class="admin-input-wrap">
                                    <i class="fa fa-stethoscope input-icon"></i>
                                    <input class="admin-form-control" type="text" name="departmentname" value="{{ $department->departmentname }}" >
                                </div>
                                @error('departmentname')
                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="admin-form-group">
                                <label>Department Head <span class="text-danger">*</span></label>
                                <div class="admin-input-wrap">
                                    <i class="fa fa-user-md input-icon"></i>
                                    <input class="admin-form-control" type="text" name="departmenthead" value="{{ $department->departmenthead }}" >
                                </div>
                                @error('departmenthead')
                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="admin-form-group">
                                <label>Department Image</label>
                                <div class="d-flex align-items-center gap-3 mb-2">
                                    @if($department->departmentimage)
                                        <img alt="{{ $department->departmentname }}" src="{{ asset($department->departmentimage) }}"
                                             style="width: 70px; height: 50px; border-radius: 8px; object-fit: cover; border: 1px solid #e2e8f0;">
                                    @endif
                                    <input type="file" name="departmentimage" class="admin-form-control no-icon flex-grow-1">
                                </div>
                                <small style="color: #64748b; display: block;">Leave empty to keep existing image</small>
                                @error('departmentimage')
                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="admin-form-group">
                                <label>Clinical Scope & Description</label>
                                <textarea cols="30" rows="4" name="description" class="admin-form-control admin-textarea">{{ $department->description }}</textarea>
                                @error('description')
                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Form Actions -->
                            <div class="mt-4 pt-3 text-right" style="border-top: 1px solid var(--border-light); display: flex; justify-content: flex-end; gap: 12px;">
                                <a href="{{ url('admindepartments') }}" class="btn-admin-light">Cancel</a>
                                <button type="submit" class="btn-admin-primary">
                                    <i class="fa fa-check-circle"></i> Save Department Changes
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
