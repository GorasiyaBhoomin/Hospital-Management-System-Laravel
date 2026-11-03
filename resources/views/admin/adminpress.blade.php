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
                            <i class="fa fa-newspaper-o"></i>
                        </span>
                        Hospital Press Desk & Media Releases
                    </h2>
                    <p>Official announcements, medical camp notices, surgical breakthroughs, and press publications.</p>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <span class="badge badge-pill badge-primary" style="padding: 8px 16px; font-size: 13px; font-weight: 700;">
                        <i class="fa fa-newspaper-o m-r-5"></i> Total Releases: {{ count($std) }}
                    </span>
                    <a href="{{ url('add_press_desk') }}" class="btn-admin-primary">
                        <i class="fa fa-plus"></i> Add Press Release
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

            <!-- Press Desk Modern Table Container -->
            <div class="admin-table-wrapper">
                <div class="admin-table-header-bar">
                    <h4 style="font-size: 16px; font-weight: 800; color: #0f172a; margin: 0;">
                        <i class="fa fa-bullhorn text-primary m-r-5"></i> Published Press Releases
                    </h4>
                    <span style="font-size: 13px; color: #64748b; font-weight: 600;">
                        Live on Public Hospital Website
                    </span>
                </div>

                <div class="table-responsive">
                    <table class="table admin-modern-table mb-0">
                        <thead>
                            <tr>
                                <th style="width: 60px;">ID</th>
                                <th style="width: 120px;">Media Image</th>
                                <th>Press Release Description</th>
                                <th class="text-right" style="width: 120px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($std as $r3)
                                <tr>
                                    <td>
                                        <strong style="color: #64748b; font-weight: 700;">#{{ $r3['id'] }}</strong>
                                    </td>
                                    <td>
                                        @if($r3->pressimage)
                                            <img src="{{ asset($r3->pressimage) }}"
                                                 alt="Press Image"
                                                 style="width: 85px; height: 58px; border-radius: 10px; object-fit: cover; border: 1px solid #e2e8f0; box-shadow: 0 2px 6px rgba(0,0,0,0.06);"
                                                 onerror="this.src='{{ URL::to('/assets/img/user.jpg') }}'">
                                        @else
                                            <div style="width: 85px; height: 58px; border-radius: 10px; background: #e0f2fe; display: flex; align-items: center; justify-content: center; color: #0284c7; font-size: 22px;">
                                                <i class="fa fa-newspaper-o"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td style="color: #334155; font-size: 13.5px; line-height: 1.6; font-weight: 500;">
                                        {{ $r3['description'] }}
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ URL::to('/') }}/edit_press_desk/{{ $r3->id }}" class="action-btn-pill btn-pill-edit" title="Edit Press Release">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{ URL::to('/') }}/delete_press_desk/{{ $r3->id }}" class="action-btn-pill btn-pill-delete"
                                           onclick="return confirm('Are you sure you want to delete this press item?');" title="Delete Press Release">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5">
                                        <div style="font-size: 40px; color: #cbd5e1; margin-bottom: 10px;"><i class="fa fa-newspaper-o"></i></div>
                                        <h5 style="color: #64748b;">No Press Desk Releases Found</h5>
                                        <a href="{{ url('add_press_desk') }}" class="btn-admin-primary mt-2">
                                            <i class="fa fa-plus"></i> Add First Press Release
                                        </a>
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
