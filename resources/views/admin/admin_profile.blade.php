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

            @foreach ($std3 as $r1)
                <!-- Page Header Bar -->
                <div class="admin-page-header">
                    <div class="admin-page-title-wrap">
                        <h2>
                            <span class="title-icon-box" style="background: #e0f2fe; color: #0284c7;">
                                <i class="fa fa-user-circle"></i>
                            </span>
                            Administrator Profile
                        </h2>
                        <p>Hospital administrative credentials, security settings, and contact information.</p>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <a href="{{ URL::to('/') }}/admin_edit_profile/{{ $r1->email }}" class="btn-admin-primary">
                            <i class="fa fa-pencil"></i> Edit Profile
                        </a>
                        <a href="{{ url('admin_change_password') }}" class="btn-admin-light">
                            <i class="fa fa-key text-warning"></i> Change Password
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

                <!-- Executive Profile Card Layout -->
                <div class="row">
                    <!-- Profile Hero Card -->
                    <div class="col-12 col-lg-4 mb-4">
                        <div class="admin-box-card text-center" style="border-top: 4px solid #0284c7;">
                            <div class="admin-box-body py-4">
                                <div style="position: relative; width: 120px; height: 120px; margin: 0 auto 18px;">
                                    <img src="{{ $r1->logo ? asset($r1->logo) : URL::to('/assets/img/user.jpg') }}"
                                         alt="{{ $r1['name'] }}"
                                         style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 4px solid #ffffff; box-shadow: 0 6px 20px rgba(2, 132, 199, 0.25);"
                                         onerror="this.src='{{ URL::to('/assets/img/user.jpg') }}'">
                                    <span style="position: absolute; bottom: 6px; right: 6px; width: 18px; height: 18px; background: #10b981; border: 3px solid #ffffff; border-radius: 50%; box-shadow: 0 0 10px #10b981;" title="Online"></span>
                                </div>

                                <h3 style="font-size: 20px; font-weight: 800; color: #0f172a; margin: 0 0 4px;">{{ $r1['name'] }}</h3>
                                <p style="font-size: 13px; color: #64748b; margin-bottom: 12px;">Chief Hospital Administrator</p>

                                <span class="badge badge-pill badge-primary" style="padding: 6px 14px; font-size: 12px; font-weight: 700; background: #e0f2fe; color: #0284c7; border: 1px solid #bae6fd;">
                                    <i class="fa fa-shield m-r-5"></i> Super Admin Privileges
                                </span>

                                <div class="mt-4 pt-3" style="border-top: 1px solid var(--border-light); font-size: 12.5px; color: #64748b;">
                                    <div><i class="fa fa-calendar-check-o text-muted m-r-5"></i> Member Since: 2024</div>
                                    <div class="mt-1"><i class="fa fa-map-marker text-muted m-r-5"></i> Bhuj, Gujarat, India</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Personal & Administrative Information -->
                    <div class="col-12 col-lg-8 mb-4">
                        <div class="admin-box-card">
                            <div class="admin-box-header">
                                <h4><i class="fa fa-id-card-o text-primary"></i> Account Credentials & Details</h4>
                                <span class="badge badge-success" style="padding: 5px 10px; font-weight: 700;">Account Active</span>
                            </div>
                            <div class="admin-box-body">
                                <div class="row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <div style="background: #f8fafc; padding: 16px; border-radius: 12px; border: 1px solid #edf2f7;">
                                            <small style="text-transform: uppercase; font-size: 11px; font-weight: 700; color: #94a3b8;">Admin Username</small>
                                            <div style="font-size: 16px; font-weight: 700; color: #0f172a; margin-top: 4px;">{{ $r1['name'] }}</div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <div style="background: #f8fafc; padding: 16px; border-radius: 12px; border: 1px solid #edf2f7;">
                                            <small style="text-transform: uppercase; font-size: 11px; font-weight: 700; color: #94a3b8;">Official Email Address</small>
                                            <div style="font-size: 16px; font-weight: 700; color: #0284c7; margin-top: 4px;">{{ $r1['email'] }}</div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <div style="background: #f8fafc; padding: 16px; border-radius: 12px; border: 1px solid #edf2f7;">
                                            <small style="text-transform: uppercase; font-size: 11px; font-weight: 700; color: #94a3b8;">Contact Phone Number</small>
                                            <div style="font-size: 16px; font-weight: 700; color: #0f172a; margin-top: 4px;">{{ $r1['phone'] ? $r1['phone'] : '+91 2832 236000' }}</div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <div style="background: #f8fafc; padding: 16px; border-radius: 12px; border: 1px solid #edf2f7;">
                                            <small style="text-transform: uppercase; font-size: 11px; font-weight: 700; color: #94a3b8;">Hospital Campus Address</small>
                                            <div style="font-size: 15px; font-weight: 700; color: #0f172a; margin-top: 4px;">{{ $r1['address'] ? $r1['address'] : 'Near Kutch University, Mundra Road, Bhuj, Gujarat' }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 pt-3" style="border-top: 1px solid var(--border-light); display: flex; gap: 12px; flex-wrap: wrap;">
                                    <a href="{{ URL::to('/') }}/admin_edit_profile/{{ $r1->email }}" class="btn-admin-primary">
                                        <i class="fa fa-pencil"></i> Update Profile Information
                                    </a>
                                    <a href="{{ url('admin_change_password') }}" class="btn-admin-light">
                                        <i class="fa fa-key text-warning"></i> Security & Password
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

</body>

</html>
