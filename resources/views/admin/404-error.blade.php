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
            <div class="admin-box-card p-5 d-inline-block" style="max-width: 520px; border-top: 4px solid #0284c7;">
                <div style="font-size: 72px; font-weight: 900; color: #0284c7; line-height: 1; letter-spacing: -2px;">404</div>
                <h3 style="font-weight: 800; color: #0f172a; margin: 16px 0 8px;">
                    <i class="fa fa-exclamation-triangle text-warning m-r-5"></i> Page Not Found
                </h3>
                <p style="color: #64748b; font-size: 14px; margin-bottom: 24px;">
                    The hospital administrative resource or dashboard link you requested could not be located.
                </p>
                <a href="{{ url('/admin/admindashboard') }}" class="btn-admin-primary">
                    <i class="fa fa-dashboard"></i> Return to Admin Dashboard
                </a>
            </div>
        </div>
    </div>

</body>

</html>
