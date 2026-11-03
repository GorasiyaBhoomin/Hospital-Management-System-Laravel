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
                            <i class="fa fa-user-md"></i>
                        </span>
                        Specialist Doctors Directory
                    </h2>
                    <p>Manage medical consultants, surgeons, department heads, and duty schedules.</p>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <span class="badge badge-pill badge-primary" style="padding: 8px 16px; font-size: 13px; font-weight: 700;">
                        <i class="fa fa-check-circle m-r-5"></i> Total Specialists: {{ count($std) }}
                    </span>
                    <a href="{{ url('add_doctor') }}" class="btn-admin-primary">
                        <i class="fa fa-plus"></i> Add New Doctor
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

            <!-- Live Filter & Search Toolbar -->
            <div class="admin-box-card mb-4">
                <div class="admin-box-body py-3 px-4">
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-2 mb-md-0">
                            <div class="admin-input-wrap">
                                <i class="fa fa-search input-icon"></i>
                                <input type="text" id="adminDoctorSearch" class="admin-form-control" placeholder="Search doctor by name, specialty, or city..." onkeyup="filterAdminDoctors()">
                            </div>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <span style="font-size: 13px; color: #64748b; font-weight: 600;">
                                <i class="fa fa-info-circle text-primary m-r-5"></i> Showing all accredited consultants & hospital staff
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Doctor Cards Grid -->
            <div class="row" id="adminDoctorsGrid">
                @forelse ($std as $r1)
                    <div class="col-md-6 col-lg-4 col-xl-3 admin-doc-card-col"
                         data-search="{{ strtolower($r1['username'] . ' ' . $r1['departmentname'] . ' ' . $r1->city) }}">
                        <div class="admin-box-card text-center" style="transition: all 0.3s ease; position: relative;">
                            <!-- Top Accent Line -->
                            <div style="position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, #0284c7, #38bdf8);"></div>

                            <div class="admin-box-body pt-4 pb-3">
                                <!-- Avatar Frame with Online Dot -->
                                <div style="position: relative; width: 100px; height: 100px; margin: 0 auto 16px;">
                                    <img alt="{{ $r1['username'] }}"
                                         src="{{ $r1->Avatar ? asset($r1->Avatar) : URL::to('/assets/img/user.jpg') }}"
                                         style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; border: 3px solid #ffffff; box-shadow: 0 4px 15px rgba(2, 132, 199, 0.25);"
                                         onerror="this.src='{{ URL::to('/assets/img/user.jpg') }}'">
                                    <span style="position: absolute; bottom: 4px; right: 4px; width: 16px; height: 16px; background: #10b981; border: 2.5px solid #ffffff; border-radius: 50%; box-shadow: 0 0 8px #10b981;" title="Active Status"></span>
                                </div>

                                <!-- Doctor Name -->
                                <h4 style="font-size: 17px; font-weight: 800; color: #0f172a; margin: 0 0 6px;">
                                    <a href="{{ URL::to('/') }}/edit_doctor/{{ $r1->email }}" style="color: #0f172a; text-decoration: none;">
                                        {{ $r1['username'] }}
                                    </a>
                                </h4>

                                <!-- Department Pill -->
                                <div style="margin-bottom: 14px;">
                                    <span class="badge-dept-tag">
                                        <i class="fa fa-stethoscope text-primary"></i> {{ $r1['departmentname'] }}
                                    </span>
                                </div>

                                <!-- Contact Info -->
                                <div style="font-size: 12px; color: #64748b; line-height: 1.6; margin-bottom: 18px; text-align: left; background: #f8fafc; padding: 10px 14px; border-radius: 10px; border: 1px solid #edf2f7;">
                                    @if(!empty($r1->city))
                                        <div class="text-truncate"><i class="fa fa-map-marker text-muted m-r-5"></i> {{ $r1->city }}</div>
                                    @endif
                                    @if(!empty($r1->phone))
                                        <div class="text-truncate"><i class="fa fa-phone text-muted m-r-5"></i> {{ $r1->phone }}</div>
                                    @endif
                                    @if(!empty($r1->email))
                                        <div class="text-truncate"><i class="fa fa-envelope-o text-muted m-r-5"></i> {{ $r1->email }}</div>
                                    @endif
                                </div>

                                <!-- Action Buttons -->
                                <div class="d-flex align-items-center justify-content-center" style="gap: 8px;">
                                    <a href="{{ URL::to('/') }}/edit_doctor/{{ $r1->email }}" class="btn-admin-light flex-grow-1 justify-content-center py-2" style="font-size: 12.5px;">
                                        <i class="fa fa-pencil text-primary"></i> Edit
                                    </a>
                                    <a href="{{ URL::to('/') }}/delete_doctor/{{ $r1->email }}" class="action-btn-pill btn-pill-delete"
                                       onclick="return confirm('Are you sure you want to delete Dr. {{ $r1['username'] }}?');" title="Delete Doctor">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div style="font-size: 48px; color: #cbd5e1; margin-bottom: 12px;"><i class="fa fa-user-md"></i></div>
                        <h4 style="color: #64748b; font-weight: 700;">No Specialist Doctors Found</h4>
                        <a href="{{ url('add_doctor') }}" class="btn-admin-primary mt-3">
                            <i class="fa fa-plus"></i> Add First Doctor
                        </a>
                    </div>
                @endforelse
            </div>

        </div>
    </div>

    <script>
        function filterAdminDoctors() {
            var input = document.getElementById('adminDoctorSearch');
            var filter = input.value.toLowerCase().trim();
            var cards = document.querySelectorAll('.admin-doc-card-col');
            cards.forEach(function(card) {
                var searchData = card.getAttribute('data-search') || '';
                if (searchData.indexOf(filter) > -1) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>
</body>

</html>
