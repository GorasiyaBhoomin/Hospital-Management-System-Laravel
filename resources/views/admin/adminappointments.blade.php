<!DOCTYPE html>
<html lang="en">

@include('admin.adminnavbar_master')
@section('nav')
@endsection

<head>
    <style>
        /* Scoped Enhancements for Admin Appointments Console */
        .admin-page-header {
            margin-top: 15px;
            padding: 22px 28px;
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 20px -2px rgba(15, 23, 42, 0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
            position: relative;
            overflow: hidden;
        }

        .admin-page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #0284c7 0%, #38bdf8 50%, #6366f1 100%);
        }

        /* KPI Metric Mini Cards */
        .metric-mini-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 16px 20px;
            box-shadow: 0 2px 10px rgba(15, 23, 42, 0.04);
            display: flex;
            align-items: center;
            gap: 16px;
            transition: all 0.25s ease;
            height: 100%;
        }

        .metric-mini-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
            border-color: #cbd5e1;
        }

        .metric-mini-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .metric-mini-info h3 {
            font-size: 22px;
            font-weight: 800;
            color: #0f172a;
            margin: 0;
            line-height: 1.1;
        }

        .metric-mini-info span {
            font-size: 12.5px;
            font-weight: 600;
            color: #64748b;
        }

        /* Filter & Search Bar */
        .admin-filter-bar {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 14px 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(15, 23, 42, 0.03);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 14px;
        }

        .filter-status-tabs {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .status-tab-pill {
            background: #f8fafc;
            color: #475569;
            border: 1.5px solid #e2e8f0;
            border-radius: 50px;
            padding: 6px 16px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            outline: none !important;
        }

        .status-tab-pill:hover {
            background: #ffffff;
            border-color: #0284c7;
            color: #0284c7;
        }

        .status-tab-pill.active {
            background: #0284c7;
            color: #ffffff;
            border-color: #0284c7;
            box-shadow: 0 4px 12px rgba(2, 132, 199, 0.3);
        }

        .status-tab-pill.active .tab-badge {
            background: rgba(255, 255, 255, 0.25);
            color: #ffffff;
        }

        .tab-badge {
            background: #e2e8f0;
            color: #475569;
            font-size: 11px;
            font-weight: 800;
            padding: 2px 7px;
            border-radius: 50px;
        }

        .search-box-pill {
            position: relative;
            min-width: 280px;
            max-width: 360px;
            flex-grow: 1;
        }

        .search-box-pill input {
            width: 100%;
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: 50px;
            padding: 8px 16px 8px 38px;
            font-size: 13px;
            font-weight: 600;
            color: #0f172a;
            outline: none;
            transition: all 0.2s ease;
        }

        .search-box-pill input:focus {
            background: #ffffff;
            border-color: #0284c7;
            box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.15);
        }

        .search-box-pill .search-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 14px;
            pointer-events: none;
        }

        /* Modern Appointments Table Specifications */
        .admin-table-container {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 4px 20px -2px rgba(15, 23, 42, 0.05);
            overflow: hidden;
            margin-bottom: 30px;
        }

        .table-responsive-custom {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .appointments-master-table {
            width: 100%;
            min-width: 980px;
            border-collapse: separate;
            border-spacing: 0;
            margin: 0;
        }

        .appointments-master-table thead th {
            background: #f8fafc;
            color: #334155;
            font-size: 11.5px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            padding: 14px 18px;
            border: none;
            border-bottom: 1.5px solid #e2e8f0;
            white-space: nowrap;
        }

        .appointments-master-table tbody tr {
            transition: all 0.18s ease;
        }

        .appointments-master-table tbody tr:hover {
            background-color: #f0f7ff !important;
        }

        .appointments-master-table tbody td {
            padding: 15px 18px;
            vertical-align: middle;
            border-top: none;
            border-bottom: 1px solid #f1f5f9;
            font-size: 13.5px;
            color: #334155;
        }

        /* Clean Element Badges */
        .token-chip {
            font-family: monospace;
            font-weight: 800;
            font-size: 13.5px;
            color: #0284c7;
            letter-spacing: 0.3px;
            display: inline-block;
        }

        .patient-avatar-box {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 14px;
            flex-shrink: 0;
            box-shadow: 0 2px 6px rgba(2, 132, 199, 0.25);
        }

        .badge-date-pill {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 4px 8px;
            font-size: 12.5px;
            font-weight: 700;
            color: #0f172a;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap !important;
        }

        .badge-time-slot {
            font-size: 12px;
            font-weight: 600;
            color: #0284c7;
            margin-top: 3px;
            display: flex;
            align-items: center;
            gap: 5px;
            white-space: nowrap !important;
        }

        /* Status Dropdown Pill */
        .status-dropdown-btn {
            border: none;
            cursor: pointer;
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.2s ease;
            white-space: nowrap !important;
        }

        .status-dropdown-btn:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        /* Action Buttons */
        .btn-pill-slip {
            background: #fbf5fa;
            color: #69275c;
            border: 1px solid #ebdbe8;
        }
        .btn-pill-slip:hover {
            background: #69275c;
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(105, 39, 92, 0.35);
        }

        /* Table Action Cell */
        .td-actions {
            white-space: nowrap !important;
            text-align: right;
            min-width: 135px;
        }
    </style>
</head>

<body>

    <div class="page-wrapper" style="padding-top: 75px !important;">
        <!-- Ambient Glowing Background Meshes -->
        <div class="admin-ambient-mesh admin-mesh-1"></div>
        <div class="admin-ambient-mesh admin-mesh-2"></div>
        <div class="admin-ambient-mesh admin-mesh-3"></div>

        <div class="content admin-ambient-wrapper" style="padding: 24px 30px !important;">

            <!-- Page Header Bar (Never Cut Off) -->
            <div class="admin-page-header">
                <div class="admin-page-title-wrap">
                    <div style="font-size: 12px; font-weight: 700; color: #0284c7; text-transform: uppercase; letter-spacing: 0.8px; margin-bottom: 4px;">
                        <i class="fa fa-hospital-o m-r-5"></i> KK Patel Super Speciality Hospital &bull; Central OPD Console
                    </div>
                    <h2 style="font-size: 24px; font-weight: 800; color: #0f172a; margin: 0 0 4px; display: flex; align-items: center; gap: 10px;">
                        <span class="title-icon-box" style="background: #e0f2fe; color: #0284c7;">
                            <i class="fa fa-calendar-check-o"></i>
                        </span>
                        Patient Appointments Console
                    </h2>
                    <p style="font-size: 13.5px; color: #64748b; margin: 0;">
                        Real-time outpatient consultation schedules, patient queues, doctor bookings, and digital OPD slips.
                    </p>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <a href="{{ url('adminappointments') }}" class="btn-admin-light" title="Refresh Appointments Data">
                        <i class="fa fa-refresh"></i> Refresh
                    </a>
                    <a href="{{ url('add_appointment') }}" class="btn-admin-primary">
                        <i class="fa fa-plus"></i> New Appointment
                    </a>
                </div>
            </div>

            <!-- Flash Session Alerts -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" style="border-radius: 14px; font-weight: 600; box-shadow: 0 4px 14px rgba(16, 185, 129, 0.15); border: 1px solid #a7f3d0; background: #ecfdf5; color: #065f46;">
                    <i class="fa fa-check-circle m-r-8" style="font-size: 16px;"></i> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: #065f46;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert" style="border-radius: 14px; font-weight: 600; box-shadow: 0 4px 14px rgba(239, 68, 68, 0.15); border: 1px solid #fecaca; background: #fef2f2; color: #991b1b;">
                    <i class="fa fa-exclamation-circle m-r-8" style="font-size: 16px;"></i> {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: #991b1b;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- 4 Quick Medical Metric KPI Cards -->
            <div class="row my-4">
                <div class="col-12 col-sm-6 col-xl-3 mb-3 mb-xl-0">
                    <div class="metric-mini-card">
                        <div class="metric-mini-icon" style="background: #e0f2fe; color: #0284c7;">
                            <i class="fa fa-calendar-check-o"></i>
                        </div>
                        <div class="metric-mini-info">
                            <h3>{{ count($std3) }}</h3>
                            <span>Total Bookings</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3 mb-3 mb-xl-0">
                    <div class="metric-mini-card">
                        <div class="metric-mini-icon" style="background: #ecfdf5; color: #059669;">
                            <i class="fa fa-check-circle"></i>
                        </div>
                        <div class="metric-mini-info">
                            <h3>{{ $std3->filter(fn($a) => in_array(strtolower($a->Status ?? ''), ['approved', 'completed']))->count() }}</h3>
                            <span>Confirmed OPDs</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3 mb-3 mb-xl-0">
                    <div class="metric-mini-card">
                        <div class="metric-mini-icon" style="background: #fef3c7; color: #d97706;">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        <div class="metric-mini-info">
                            <h3>{{ $std3->filter(fn($a) => in_array(strtolower($a->Status ?? ''), ['pending', '']))->count() }}</h3>
                            <span>Pending Approvals</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="metric-mini-card">
                        <div class="metric-mini-icon" style="background: #fee2e2; color: #dc2626;">
                            <i class="fa fa-times-circle"></i>
                        </div>
                        <div class="metric-mini-info">
                            <h3>{{ $std3->filter(fn($a) => in_array(strtolower($a->Status ?? ''), ['cancelled', 'rejected']))->count() }}</h3>
                            <span>Cancelled / Rejected</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter & Search Toolbar Bar -->
            <div class="admin-filter-bar">
                <!-- Status Tabs -->
                <div class="filter-status-tabs">
                    <button type="button" class="status-tab-pill active" onclick="setFilterStatus('all', this)">
                        All Consultations <span class="tab-badge">{{ count($std3) }}</span>
                    </button>
                    <button type="button" class="status-tab-pill" onclick="setFilterStatus('approved', this)">
                        <i class="fa fa-check text-success"></i> Confirmed <span class="tab-badge">{{ $std3->filter(fn($a) => in_array(strtolower($a->Status ?? ''), ['approved', 'completed']))->count() }}</span>
                    </button>
                    <button type="button" class="status-tab-pill" onclick="setFilterStatus('pending', this)">
                        <i class="fa fa-clock-o text-warning"></i> Pending <span class="tab-badge">{{ $std3->filter(fn($a) => in_array(strtolower($a->Status ?? ''), ['pending', '']))->count() }}</span>
                    </button>
                    <button type="button" class="status-tab-pill" onclick="setFilterStatus('cancelled', this)">
                        <i class="fa fa-times text-danger"></i> Cancelled <span class="tab-badge">{{ $std3->filter(fn($a) => in_array(strtolower($a->Status ?? ''), ['cancelled', 'rejected']))->count() }}</span>
                    </button>
                </div>

                <!-- Instant Search Box -->
                <div class="search-box-pill">
                    <i class="fa fa-search search-icon"></i>
                    <input type="text" id="appointmentSearch" placeholder="Search patient, doctor, token #, phone..." oninput="filterAppointmentsTable()">
                </div>
            </div>

            <!-- Modern Appointments Table Container -->
            <div class="admin-table-container">
                <div class="admin-table-header-bar px-4 py-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
                    <div class="d-flex align-items-center gap-2">
                        <span style="font-size: 15px; font-weight: 800; color: #0f172a;">
                            <i class="fa fa-list-alt text-primary m-r-5"></i> Scheduled Consultations Queue
                        </span>
                        <span class="badge badge-pill badge-light text-primary" style="border: 1px solid #bae6fd; font-size: 11.5px;" id="visibleRecordsBadge">
                            Showing {{ count($std3) }} of {{ count($std3) }}
                        </span>
                    </div>

                    <div style="font-size: 12px; color: #64748b;">
                        <i class="fa fa-info-circle text-info m-r-4"></i> Click status pill to quickly change state &bull; Click <i class="fa fa-file-text-o text-purple"></i> for official OPD slip
                    </div>
                </div>

                <div class="table-responsive-custom">
                    <table class="table appointments-master-table mb-0" id="appointmentsTable">
                        <thead>
                            <tr>
                                <th style="width: 120px;">OPD Token #</th>
                                <th style="min-width: 230px;">Patient Details</th>
                                <th style="min-width: 190px;">Specialist & Department</th>
                                <th style="min-width: 180px;">Schedule Date & Slot</th>
                                <th style="min-width: 160px;">Chief Complaint</th>
                                <th style="width: 130px; text-align: center;">Status</th>
                                <th style="width: 130px; text-align: right;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($std3 as $r2)
                                @php
                                    $st = strtolower(trim((string)$r2->Status));
                                    if ($st == 'rejected') $st = 'cancelled';
                                    if (empty($st)) $st = 'pending';

                                    $tokenStr = '#KKP-' . str_pad($r2->id, 5, '0', STR_PAD_LEFT);
                                    $uhidStr = '#PAT-' . str_pad($r2->user_id ?? $r2->id, 5, '0', STR_PAD_LEFT);
                                    $patientName = $r2->appointmentname ?: 'Patient';
                                    $patientInitial = strtoupper(substr($patientName, 0, 1));
                                    $doctorName = $r2->username ?: 'Accredited Specialist';
                                    $deptName = $r2->departmentname ?: 'General OPD';
                                    $complaint = $r2->message ?: ($r2->massage ?: 'Regular Consultation');

                                    // Parse schedule date cleanly
                                    $dateTs = strtotime($r2->date);
                                    $formattedDate = $dateTs ? date('d M Y', $dateTs) : $r2->date;
                                    $dayName = $dateTs ? date('D', $dateTs) : '';
                                    $timeSlot = $r2->time ?: '10:00 AM - 11:00 AM';

                                    // Search text haystack
                                    $searchBlob = strtolower($tokenStr . ' ' . $patientName . ' ' . $r2->email . ' ' . $r2->phone . ' ' . $doctorName . ' ' . $deptName . ' ' . $uhidStr . ' ' . $complaint);
                                @endphp
                                <tr class="appointment-table-row" data-status="{{ $st }}" data-search="{{ $searchBlob }}">
                                    <!-- 1. Token / ID -->
                                    <td>
                                        <span class="token-chip">{{ $tokenStr }}</span>
                                        <small class="text-muted d-block" style="font-size: 11px; margin-top: 2px;">
                                            {{ date('d M Y', strtotime($r2->created_at ?? now())) }}
                                        </small>
                                    </td>

                                    <!-- 2. Patient Details -->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="patient-avatar-box m-r-10">
                                                {{ $patientInitial }}
                                            </div>
                                            <div style="line-height: 1.35;">
                                                <div class="d-flex align-items-center gap-2">
                                                    <strong style="color: #0f172a; font-size: 14px;">{{ $patientName }}</strong>
                                                    <span class="badge badge-light" style="font-size: 10px; border: 1px solid #e2e8f0; color: #475569; padding: 2px 6px;">
                                                        {{ $r2->gender ?: 'Patient' }}
                                                    </span>
                                                </div>
                                                <div style="font-size: 12px; margin-top: 3px;">
                                                    <a href="mailto:{{ $r2->email }}" style="color: #0284c7; text-decoration: none;" class="m-r-6">
                                                        <i class="fa fa-envelope-o text-muted"></i> {{ $r2->email }}
                                                    </a>
                                                </div>
                                                <div style="font-size: 11.5px; color: #64748b;">
                                                    <a href="tel:{{ $r2->phone }}" style="color: #475569; text-decoration: none;">
                                                        <i class="fa fa-phone text-muted"></i> {{ $r2->phone }}
                                                    </a>
                                                    <span class="text-muted mx-1">&bull;</span>
                                                    <span style="font-family: monospace; font-size: 11px; color: #0284c7;">{{ $uhidStr }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- 3. Specialist & Department -->
                                    <td>
                                        <div style="white-space: nowrap !important; line-height: 1.35;">
                                            <strong style="color: #0f172a; font-size: 13.5px; display: block;">
                                                <i class="fa fa-user-md text-primary m-r-5"></i> {{ $doctorName }}
                                            </strong>
                                            <span class="badge-dept-tag mt-1">
                                                <i class="fa fa-stethoscope text-primary"></i> {{ $deptName }}
                                            </span>
                                        </div>
                                    </td>

                                    <!-- 4. Schedule Date & Slot (Never Broken onto Multi-Lines) -->
                                    <td>
                                        <div style="white-space: nowrap !important;">
                                            <span class="badge-date-pill">
                                                <i class="fa fa-calendar-check-o text-primary"></i>
                                                <span>{{ $formattedDate }}</span>
                                                @if($dayName)
                                                    <span style="color: #64748b; font-weight: 500;">({{ $dayName }})</span>
                                                @endif
                                            </span>
                                            <div class="badge-time-slot">
                                                <i class="fa fa-clock-o text-primary"></i> {{ $timeSlot }}
                                            </div>
                                        </div>
                                    </td>

                                    <!-- 5. Chief Complaint -->
                                    <td>
                                        <div style="max-width: 200px; font-size: 12.5px; color: #475569; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;" title="{{ $complaint }}">
                                            {{ $complaint }}
                                        </div>
                                    </td>

                                    <!-- 6. Status with 1-Click State Changer Dropdown -->
                                    <td class="text-center" style="white-space: nowrap !important;">
                                        <div class="dropdown d-inline-block">
                                            @if($st == 'approved' || $st == 'completed')
                                                <button class="status-dropdown-btn badge-status-approved dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Click to change status">
                                                    <i class="fa fa-check-circle"></i> Approved
                                                </button>
                                            @elseif($st == 'pending')
                                                <button class="status-dropdown-btn badge-status-pending dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Click to change status">
                                                    <i class="fa fa-clock-o"></i> Pending
                                                </button>
                                            @else
                                                <button class="status-dropdown-btn badge-status-rejected dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Click to change status">
                                                    <i class="fa fa-times-circle"></i> {{ ucfirst($st) }}
                                                </button>
                                            @endif

                                            <!-- Dropdown Options to Quickly Change Status -->
                                            <div class="dropdown-menu dropdown-menu-right shadow-sm border-0" style="border-radius: 12px; font-size: 12.5px; min-width: 150px;">
                                                <h6 class="dropdown-header text-uppercase" style="font-size: 10px; font-weight: 800; color: #94a3b8;">Set Status</h6>
                                                <a class="dropdown-item text-success font-weight-bold" href="{{ url('/admin/appointment/' . $r2->id . '/status/Approved') }}">
                                                    <i class="fa fa-check-circle m-r-5"></i> Mark Approved
                                                </a>
                                                <a class="dropdown-item text-primary font-weight-bold" href="{{ url('/admin/appointment/' . $r2->id . '/status/Pending') }}">
                                                    <i class="fa fa-clock-o m-r-5"></i> Mark Pending
                                                </a>
                                                <a class="dropdown-item text-danger font-weight-bold" href="{{ url('/admin/appointment/' . $r2->id . '/status/Cancelled') }}">
                                                    <i class="fa fa-times-circle m-r-5"></i> Mark Cancelled
                                                </a>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- 7. Actions (Always Visible on Screen) -->
                                    <td class="td-actions">
                                        <!-- View / Print OPD Slip Voucher -->
                                        <a href="{{ url('/user/appointment/' . $r2->id . '/slip') }}" target="_blank" class="action-btn-pill btn-pill-slip" title="View & Print Official OPD Slip">
                                            <i class="fa fa-file-text-o"></i>
                                        </a>

                                        <!-- Edit Appointment -->
                                        <a href="{{ url('/edit_appointment/' . $r2->id) }}" class="action-btn-pill btn-pill-edit" title="Edit Appointment Schedule & Doctor">
                                            <i class="fa fa-pencil"></i>
                                        </a>

                                        <!-- Delete Appointment -->
                                        <a href="{{ url('/delete_appointment/' . $r2->id) }}" class="action-btn-pill btn-pill-delete"
                                           onclick="return confirm('Are you sure you want to delete appointment {{ $tokenStr }} for patient {{ $patientName }}?');" title="Delete Appointment">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <div style="font-size: 42px; color: #cbd5e1; margin-bottom: 12px;"><i class="fa fa-calendar-times-o"></i></div>
                                        <h5 style="color: #64748b; font-weight: 700;">No Patient Appointments Found</h5>
                                        <p style="color: #94a3b8; font-size: 13px;">No patient consultations have been booked in the hospital system yet.</p>
                                        <a href="{{ url('add_appointment') }}" class="btn-admin-primary mt-2">
                                            <i class="fa fa-plus"></i> Book First Appointment
                                        </a>
                                    </td>
                                </tr>
                            @endforelse

                            <!-- Hidden No Matches Row (Used by Live JS Search) -->
                            <tr id="noMatchesRow" style="display: none;">
                                <td colspan="7" class="text-center py-5">
                                    <div style="font-size: 36px; color: #94a3b8; margin-bottom: 8px;"><i class="fa fa-search"></i></div>
                                    <h6 style="color: #475569; font-weight: 700;">No Matching Appointments Found</h6>
                                    <p style="color: #94a3b8; font-size: 12.5px; margin-bottom: 10px;">Try adjusting your search terms or status filter tab.</p>
                                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3" onclick="resetAllFilters()">
                                        <i class="fa fa-undo"></i> Reset Filters
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- Live Client-Side Instant Filtering Script -->
    <script>
        let currentStatusFilter = 'all';

        function setFilterStatus(status, element) {
            currentStatusFilter = status.toLowerCase();
            
            // Toggle active class on pills
            document.querySelectorAll('.status-tab-pill').forEach(btn => {
                btn.classList.remove('active');
            });
            if (element) {
                element.classList.add('active');
            }

            filterAppointmentsTable();
        }

        function filterAppointmentsTable() {
            const query = (document.getElementById('appointmentSearch').value || '').trim().toLowerCase();
            const rows = document.querySelectorAll('.appointment-table-row');
            let visibleCount = 0;

            rows.forEach(row => {
                const rowStatus = (row.getAttribute('data-status') || '').toLowerCase();
                const rowSearch = (row.getAttribute('data-search') || '').toLowerCase();

                const matchesStatus = (currentStatusFilter === 'all') || (rowStatus === currentStatusFilter);
                const matchesSearch = !query || rowSearch.includes(query);

                if (matchesStatus && matchesSearch) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            // Update badge counter
            const badge = document.getElementById('visibleRecordsBadge');
            if (badge) {
                badge.innerText = `Showing ${visibleCount} of ${rows.length}`;
            }

            // Show / hide no matches row
            const noMatches = document.getElementById('noMatchesRow');
            if (noMatches) {
                noMatches.style.display = (visibleCount === 0 && rows.length > 0) ? '' : 'none';
            }
        }

        function resetAllFilters() {
            const searchInput = document.getElementById('appointmentSearch');
            if (searchInput) searchInput.value = '';

            const allTab = document.querySelector('.status-tab-pill');
            setFilterStatus('all', allTab);
        }
    </script>

</body>

</html>