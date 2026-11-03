<!DOCTYPE html>
<html lang="en">

@include('admin.adminnavbar_master')
@section('nav')
@endsection

<body>

    <div class="page-wrapper" style="min-height: 100vh; display: flex; align-items: center; justify-content: center;">
        <!-- Ambient Glowing Background Meshes -->
        <div class="admin-ambient-mesh admin-mesh-1"></div>
        <div class="admin-ambient-mesh admin-mesh-2"></div>

        <div class="content text-center py-5">
            <div class="admin-box-card p-5 d-inline-block" style="max-width: 520px; border-top: 4px solid #ef4444;">
                <div style="font-size: 72px; font-weight: 900; color: #ef4444; line-height: 1; letter-spacing: -2px;">500</div>
                <h3 style="font-weight: 800; color: #0f172a; margin: 16px 0 8px;">
                    <i class="fa fa-server text-danger m-r-5"></i> Internal Server Error
                </h3>
                <p style="color: #64748b; font-size: 14px; margin-bottom: 24px;">
                    The hospital server encountered an unexpected error processing your administrative request.
                </p>
                <a href="{{ url('/admin/admindashboard') }}" class="btn-admin-primary">
                    <i class="fa fa-dashboard"></i> Return to Admin Dashboard
                </a>
            </div>
        </div>
    </div>

</body>

</html>
