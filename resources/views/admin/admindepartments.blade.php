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
                        <span class="title-icon-box">
                            <i class="fa fa-hospital-o"></i>
                        </span>
                        Clinical Departments
                    </h2>
                    <p>Super speciality medical wings, clinical units, department heads, and inpatient facilities.</p>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <span class="badge badge-pill badge-primary" style="padding: 8px 16px; font-size: 13px; font-weight: 700;">
                        <i class="fa fa-check-circle m-r-5"></i> Total Wings: {{ count($std2) }}
                    </span>
                    <a href="{{ url('add_department') }}" class="btn-admin-primary">
                        <i class="fa fa-plus"></i> Add Department
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

            <!-- Modern Departments Table Container -->
            <div class="admin-table-wrapper">
                <div class="admin-table-header-bar">
                    <h4 style="font-size: 16px; font-weight: 800; color: #0f172a; margin: 0;">
                        <i class="fa fa-th-large text-primary m-r-5"></i> Active Super Speciality Departments
                    </h4>
                    <span style="font-size: 13px; color: #64748b; font-weight: 600;">
                        24/7 OPD & Emergency Care Integrated
                    </span>
                </div>

                <div class="table-responsive">
                    <table class="table admin-modern-table mb-0">
                        <thead>
                            <tr>
                                <th style="width: 60px;">ID</th>
                                <th style="width: 90px;">Thumbnail</th>
                                <th>Department Name</th>
                                <th>Department Head</th>
                                <th>Overview / Description</th>
                                <th class="text-right" style="width: 120px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($std2 as $r2)
                                <tr>
                                    <td>
                                        <strong style="color: #64748b; font-weight: 700;">#{{ $r2['id'] }}</strong>
                                    </td>
                                    <td>
                                        @if($r2->departmentimage)
                                            <img src="{{ asset($r2->departmentimage) }}"
                                                 alt="{{ $r2['departmentname'] }}"
                                                 style="width: 60px; height: 50px; border-radius: 10px; object-fit: cover; border: 1px solid #e2e8f0; box-shadow: 0 2px 6px rgba(0,0,0,0.06);"
                                                 onerror="this.src='{{ URL::to('/assets/img/user.jpg') }}'">
                                        @else
                                            <div style="width: 60px; height: 50px; border-radius: 10px; background: #e0f2fe; display: flex; align-items: center; justify-content: center; color: #0284c7; font-size: 20px;">
                                                <i class="fa fa-hospital-o"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="badge-dept-tag" style="font-size: 13.5px; font-weight: 800; color: #0f172a; background: #f0f7ff; border-color: #bae6fd;">
                                                <i class="fa fa-stethoscope text-primary m-r-5"></i> {{ $r2['departmentname'] }}
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="font-weight: 700; color: #0284c7; display: flex; align-items: center; gap: 6px;">
                                            <i class="fa fa-user-md text-primary"></i> {{ $r2['departmenthead'] }}
                                        </div>
                                    </td>
                                    <td style="max-width: 380px; color: #64748b; font-size: 13px; line-height: 1.5;">
                                        {{ $r2['description'] }}
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ URL::to('/') }}/edit_department/{{ $r2->id }}" class="action-btn-pill btn-pill-edit" title="Edit Department">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{ URL::to('/') }}/delete_department/{{ $r2->id }}" class="action-btn-pill btn-pill-delete"
                                           onclick="return confirm('Are you sure you want to delete this department?');" title="Delete Department">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <div style="font-size: 40px; color: #cbd5e1; margin-bottom: 10px;"><i class="fa fa-hospital-o"></i></div>
                                        <h5 style="color: #64748b;">No Departments Found</h5>
                                        <a href="{{ url('add_department') }}" class="btn-admin-primary mt-2">
                                            <i class="fa fa-plus"></i> Add First Department
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
