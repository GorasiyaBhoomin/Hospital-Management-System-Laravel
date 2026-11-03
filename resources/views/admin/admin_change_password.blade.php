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
                        <span class="title-icon-box" style="background: #fef3c7; color: #d97706;">
                            <i class="fa fa-key"></i>
                        </span>
                        Change Security Password
                    </h2>
                    <p>Update administrator portal password and protect hospital system access.</p>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ url('admin_profile') }}" class="btn-admin-light">
                        <i class="fa fa-user-circle"></i> View Profile
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
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="admin-form-container">
                        <form action="{{ route('password.change') }}" method="POST">
                            @csrf

                            <div class="form-section-title">
                                <i class="fa fa-shield text-primary"></i> Portal Authentication Security
                            </div>

                            <!-- Old Password -->
                            <div class="admin-form-group">
                                <label>Current / Old Password <span class="text-danger">*</span></label>
                                <div class="admin-input-wrap">
                                    <i class="fa fa-lock input-icon"></i>
                                    <input type="password" id="old_pass" name="old_pass" class="admin-form-control" placeholder="Enter current password"  style="padding-right: 42px;">
                                    <button type="button" onclick="togglePassVisibility('old_pass')" style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); background: none; border: none; color: #94a3b8; cursor: pointer;">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                                @error('old_pass')
                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- New Password -->
                            <div class="admin-form-group">
                                <label>New Password <span class="text-danger">*</span></label>
                                <div class="admin-input-wrap">
                                    <i class="fa fa-key input-icon"></i>
                                    <input type="password" id="current_pass" name="current_pass" class="admin-form-control" placeholder="Minimum 8 characters"  style="padding-right: 42px;">
                                    <button type="button" onclick="togglePassVisibility('current_pass')" style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); background: none; border: none; color: #94a3b8; cursor: pointer;">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                                @error('current_pass')
                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="admin-form-group">
                                <label>Confirm New Password <span class="text-danger">*</span></label>
                                <div class="admin-input-wrap">
                                    <i class="fa fa-check-square-o input-icon"></i>
                                    <input type="password" id="current_pass_confirmation" name="current_pass_confirmation" class="admin-form-control" placeholder="Re-type new password"  style="padding-right: 42px;">
                                    <button type="button" onclick="togglePassVisibility('current_pass_confirmation')" style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); background: none; border: none; color: #94a3b8; cursor: pointer;">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                                @error('current_pass_confirmation')
                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Security Checklist -->
                            <div class="p-3 my-3" style="background: #f8fafc; border-radius: 12px; border: 1px solid #edf2f7; font-size: 12.5px; color: #64748b;">
                                <div style="font-weight: 700; color: #0f172a; margin-bottom: 6px;"><i class="fa fa-info-circle text-primary m-r-5"></i> Password Security Requirements:</div>
                                <ul style="margin: 0; padding-left: 20px;">
                                    <li>At least 8 alphanumeric characters</li>
                                    <li>Mix of uppercase, lowercase & numbers recommended</li>
                                    <li>Keep hospital administrative credentials confidential</li>
                                </ul>
                            </div>

                            <!-- Form Actions -->
                            <div class="mt-4 pt-3 text-right" style="border-top: 1px solid var(--border-light); display: flex; justify-content: flex-end; gap: 12px;">
                                <a href="{{ url('admin_profile') }}" class="btn-admin-light">Cancel</a>
                                <button type="submit" class="btn-admin-primary">
                                    <i class="fa fa-shield"></i> Update Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        function togglePassVisibility(inputId) {
            var el = document.getElementById(inputId);
            if (el) {
                if (el.type === 'password') {
                    el.type = 'text';
                } else {
                    el.type = 'password';
                }
            }
        }
    </script>
</body>

</html>
