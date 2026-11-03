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
                            <i class="fa fa-users"></i>
                        </span>
                        Registered Users Directory
                    </h2>
                    <p>Hospital portal user accounts, patient logins, and administrative access records.</p>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <span class="badge badge-pill badge-primary" style="padding: 8px 16px; font-size: 13px; font-weight: 700;">
                        <i class="fa fa-users m-r-5"></i> Total Users: {{ isset($users) ? count($users) : 0 }}
                    </span>
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

            <!-- Users Data Table Container -->
            <div class="admin-table-wrapper">
                <div class="admin-table-header-bar">
                    <h4 style="font-size: 16px; font-weight: 800; color: #0f172a; margin: 0;">
                        <i class="fa fa-user-circle text-primary m-r-5"></i> Registered Portal Accounts
                    </h4>
                    <span style="font-size: 13px; color: #64748b; font-weight: 600;">
                        Secure Authentication Active
                    </span>
                </div>

                <div class="table-responsive">
                    <table class="table admin-modern-table mb-0">
                        <thead>
                            <tr>
                                <th style="width: 60px;">ID</th>
                                <th style="width: 80px;">Avatar</th>
                                <th>Full Name</th>
                                <th>Email Address</th>
                                <th>Phone Number</th>
                                <th>City</th>
                                <th>Address</th>
                                <th>Account Status</th>
                                <th class="text-right" style="width: 100px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>
                                        <strong style="color: #64748b; font-weight: 700;">#{{ $user->id }}</strong>
                                    </td>
                                    <td>
                                        @if ($user->logo)
                                            <img src="{{ URL::to('/') }}/{{ $user->logo }}" alt="{{ $user->name }}"
                                                 style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover; border: 2px solid #e2e8f0;">
                                        @else
                                            <div style="width: 40px; height: 40px; border-radius: 50%; background: #e0f2fe; color: #0284c7; display: flex; align-items: center; justify-content: center; font-size: 16px;">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <strong style="color: #0f172a; font-size: 14px;">{{ $user->name }}</strong>
                                    </td>
                                    <td>
                                        <a href="mailto:{{ $user->email }}" style="color: #0284c7; text-decoration: none;">
                                            <i class="fa fa-envelope-o text-muted m-r-4"></i> {{ $user->email }}
                                        </a>
                                    </td>
                                    <td>
                                        <span style="color: #475569; font-weight: 600;">{{ $user->phone }}</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-light" style="border: 1px solid #e2e8f0; font-weight: 600;">{{ $user->city }}</span>
                                    </td>
                                    <td style="max-width: 200px; color: #64748b; font-size: 12.5px;">
                                        {{ $user->address }}
                                    </td>
                                    <td>
                                        <span class="badge-status badge-status-approved">
                                            <i class="fa fa-check-circle"></i> {{ ucfirst($user->status ? $user->status : 'Active') }}
                                        </span>
                                    </td>
                                    <td class="text-right">
                                        <a class="action-btn-pill btn-pill-delete"
                                           href="{{ URL::to('/') }}/delete_user/{{ $user->email }}"
                                           onclick="return confirm('Are you sure you want to delete this user?');" title="Delete User">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center py-5">
                                        <div style="font-size: 40px; color: #cbd5e1; margin-bottom: 10px;"><i class="fa fa-users"></i></div>
                                        <h5 style="color: #64748b;">No Users Registered Yet</h5>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</body>

</html>
