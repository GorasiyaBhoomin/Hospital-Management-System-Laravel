<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('/') }}/img/logo3.png">
    <title>@yield('title', 'Doctor Clinical Console | KK Patel Super Speciality Hospital')</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@500;700&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/assets/css/font-awesome.min.css">

    <style>
        :root {
            --doc-navy: #091e3a;
            --doc-navy-light: #112d4e;
            --doc-teal: #00a896;
            --doc-teal-light: #e6f7f5;
            --doc-blue: #0284c7;
            --doc-blue-light: #e0f2fe;
            --doc-dark: #0f172a;
            --doc-body: #334155;
            --doc-muted: #64748b;
            --doc-border: #e2e8f0;
            --doc-bg: #f8fafc;
            --doc-card: #ffffff;
            --sidebar-width: 260px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            background-color: var(--doc-bg);
            color: var(--doc-body);
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* -------------------------------------------------------------
           1. TOP NAVIGATION HEADER
           ------------------------------------------------------------- */
        .doctor-top-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 64px;
            background: #ffffff;
            border-bottom: 1.5px solid var(--doc-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 24px;
            z-index: 1040;
            box-shadow: 0 2px 10px rgba(15, 23, 42, 0.04);
        }

        .header-brand-wrap {
            display: flex;
            align-items: center;
            gap: 12px;
            width: var(--sidebar-width);
            flex-shrink: 0;
        }

        .header-brand-logo {
            height: 36px;
        }

        .header-brand-text {
            line-height: 1.1;
        }

        .header-brand-title {
            font-size: 14px;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: 0.3px;
        }

        .header-brand-badge {
            font-size: 10px;
            font-weight: 800;
            color: var(--doc-teal);
            letter-spacing: 0.8px;
            text-transform: uppercase;
        }

        .header-controls-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-toggle-btn {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
            color: #334155;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .sidebar-toggle-btn:hover {
            background: #e2e8f0;
            color: var(--doc-blue);
        }

        .duty-status-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 5px 14px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none !important;
            transition: all 0.2s ease;
        }

        .duty-status-available {
            background: #ecfdf5;
            color: #059669;
            border: 1px solid #a7f3d0;
        }

        .duty-status-available:hover {
            background: #d1fae5;
            color: #047857;
        }

        .duty-status-off {
            background: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }

        .pulse-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
        }

        .pulse-dot-green {
            background: #10b981;
            box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.25);
            animation: pulseAnim 1.8s infinite;
        }

        .pulse-dot-red {
            background: #ef4444;
        }

        @keyframes pulseAnim {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.6); }
            70% { transform: scale(1.1); box-shadow: 0 0 0 6px rgba(16, 185, 129, 0); }
            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
        }

        .header-controls-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .doctor-profile-capsule {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 4px 10px 4px 4px;
            border-radius: 50px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            text-decoration: none !important;
            color: var(--doc-dark);
            transition: all 0.2s ease;
        }

        .doctor-profile-capsule:hover {
            background: #ffffff;
            border-color: #cbd5e1;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .doc-avatar-img {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            object-fit: cover;
            border: 1.5px solid #ffffff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .doc-avatar-initial {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--doc-blue) 0%, #0369a1 100%);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 13px;
        }

        /* -------------------------------------------------------------
           2. DEDICATED DOCTOR SIDEBAR MENU (STRUCTURE AS REQUESTED)
           ------------------------------------------------------------- */
        .doctor-sidebar {
            position: fixed;
            top: 64px;
            left: 0;
            bottom: 0;
            width: var(--sidebar-width);
            background: linear-gradient(180deg, #091e3a 0%, #0f172a 100%);
            border-right: 1px solid rgba(255, 255, 255, 0.08);
            z-index: 1030;
            overflow-y: auto;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar-inner {
            padding: 18px 14px;
        }

        .sidebar-section-title {
            font-size: 11px;
            font-weight: 800;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 10px 14px 6px;
            display: block;
        }

        .doc-nav-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .doc-nav-item {
            margin-bottom: 4px;
        }

        .doc-nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            border-radius: 10px;
            color: #cbd5e1;
            font-size: 13.5px;
            font-weight: 600;
            text-decoration: none !important;
            transition: all 0.2s ease;
            position: relative;
        }

        .doc-nav-link i {
            font-size: 16px;
            width: 20px;
            text-align: center;
            color: #94a3b8;
            transition: color 0.2s ease;
        }

        .doc-nav-link:hover {
            background: rgba(255, 255, 255, 0.08);
            color: #ffffff;
        }

        .doc-nav-link:hover i {
            color: var(--doc-teal);
        }

        .doc-nav-link.active {
            background: linear-gradient(135deg, rgba(2, 132, 199, 0.25) 0%, rgba(0, 168, 150, 0.25) 100%);
            color: #ffffff;
            font-weight: 700;
            border: 1px solid rgba(56, 189, 248, 0.3);
            box-shadow: 0 4px 14px rgba(2, 132, 199, 0.15);
        }

        .doc-nav-link.active i {
            color: #38bdf8;
        }

        .nav-counter-pill {
            margin-left: auto;
            background: rgba(255, 255, 255, 0.15);
            color: #ffffff;
            font-size: 11px;
            font-weight: 800;
            padding: 2px 7px;
            border-radius: 50px;
        }

        .doc-nav-link.active .nav-counter-pill {
            background: #0284c7;
        }

        /* Sidebar Bottom Doctor Card */
        .sidebar-bottom-card {
            padding: 14px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(0, 0, 0, 0.2);
        }

        .doc-mini-card {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .doc-mini-text h6 {
            color: #ffffff;
            font-size: 13px;
            font-weight: 700;
            margin: 0;
            line-height: 1.2;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 140px;
        }

        .doc-mini-text small {
            color: #38bdf8;
            font-size: 11px;
            display: block;
        }

        /* -------------------------------------------------------------
           3. MAIN CONTENT WRAPPER
           ------------------------------------------------------------- */
        .doctor-page-wrapper {
            margin-left: var(--sidebar-width);
            padding-top: 64px;
            min-height: 100vh;
            background-color: var(--doc-bg);
            transition: all 0.3s ease;
        }

        .doctor-content-container {
            padding: 28px 32px;
            max-width: 1440px;
            margin: 0 auto;
        }

        /* Page Banner Header */
        .doc-page-banner {
            background: #ffffff;
            border: 1px solid var(--doc-border);
            border-radius: 16px;
            padding: 22px 28px;
            margin-bottom: 26px;
            box-shadow: 0 4px 18px -2px rgba(15, 23, 42, 0.04);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
            position: relative;
            overflow: hidden;
        }

        .doc-page-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #00a896 0%, #0284c7 50%, #6366f1 100%);
        }

        .doc-banner-title {
            font-size: 22px;
            font-weight: 800;
            color: #0f172a;
            margin: 0 0 4px;
            display: flex;
            align-items: center;
            gap: 10px;
            letter-spacing: -0.3px;
        }

        .doc-banner-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: var(--doc-teal-light);
            color: var(--doc-teal);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .doc-banner-subtitle {
            font-size: 13px;
            color: var(--doc-muted);
            margin: 0;
        }

        /* Medical Theme Button Classes */
        .btn-doc-primary {
            background: linear-gradient(135deg, #00a896 0%, #0284c7 100%) !important;
            color: #ffffff !important;
            border: none !important;
            font-weight: 700 !important;
            padding: 8px 18px !important;
            border-radius: 50px !important;
            font-size: 13px !important;
            box-shadow: 0 3px 12px rgba(0, 168, 150, 0.25) !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 6px !important;
            text-decoration: none !important;
            transition: all 0.2s ease !important;
        }

        .btn-doc-primary:hover {
            transform: translateY(-1px) !important;
            box-shadow: 0 6px 18px rgba(0, 168, 150, 0.35) !important;
            color: #ffffff !important;
        }

        .btn-doc-light {
            background: #ffffff !important;
            color: #334155 !important;
            border: 1.5px solid var(--doc-border) !important;
            font-weight: 700 !important;
            padding: 8px 18px !important;
            border-radius: 50px !important;
            font-size: 13px !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 6px !important;
            text-decoration: none !important;
            transition: all 0.2s ease !important;
        }

        .btn-doc-light:hover {
            background: #f8fafc !important;
            border-color: #cbd5e1 !important;
            color: var(--doc-blue) !important;
        }

        /* Cards */
        .doc-card {
            background: #ffffff;
            border: 1px solid var(--doc-border);
            border-radius: 16px;
            box-shadow: 0 4px 18px -2px rgba(15, 23, 42, 0.04);
            margin-bottom: 24px;
            overflow: hidden;
            transition: all 0.25s ease;
        }

        .doc-card-header {
            padding: 18px 24px;
            border-bottom: 1px solid #f1f5f9;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
        }

        .doc-card-title {
            font-size: 16px;
            font-weight: 800;
            color: #0f172a;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* KPI Metric Mini Cards */
        .doc-stat-card {
            background: #ffffff;
            border: 1px solid var(--doc-border);
            border-radius: 14px;
            padding: 18px 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: 0 2px 10px rgba(15, 23, 42, 0.03);
            transition: all 0.25s ease;
            height: 100%;
        }

        .doc-stat-card:hover {
            transform: translateY(-2px);
            border-color: #cbd5e1;
            box-shadow: 0 8px 22px rgba(15, 23, 42, 0.08);
        }

        .doc-stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .doc-stat-info h3 {
            font-size: 24px;
            font-weight: 800;
            color: #0f172a;
            margin: 0;
            line-height: 1.1;
        }

        .doc-stat-info span {
            font-size: 12.5px;
            font-weight: 600;
            color: #64748b;
        }

        /* Alerts */
        .doc-alert-success {
            background: #ecfdf5;
            color: #065f46;
            border: 1px solid #a7f3d0;
            border-left: 4px solid #10b981;
            border-radius: 12px;
            padding: 12px 18px;
            font-weight: 600;
            font-size: 13.5px;
        }

        .doc-alert-danger {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
            border-left: 4px solid #ef4444;
            border-radius: 12px;
            padding: 12px 18px;
            font-weight: 600;
            font-size: 13.5px;
        }

        /* Responsive Mobile Drawer */
        @media (max-width: 991px) {
            .doctor-sidebar {
                transform: translateX(-100%);
            }
            .doctor-sidebar.show-mobile {
                transform: translateX(0);
            }
            .doctor-page-wrapper {
                margin-left: 0;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    @php
        $currentDoctor = Auth::guard('doctor')->user() ?? (\App\Models\Doctors::find(session('doctor_id')) ?? null);
        $activeTab = $activeTab ?? 'dashboard';
    @endphp

    <!-- 1. TOP HEADER NAVBAR -->
    <header class="doctor-top-header">
        <div class="d-flex align-items-center gap-3">
            <button class="sidebar-toggle-btn d-lg-none" type="button" onclick="toggleDoctorSidebar()">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Brand Logo -->
            <div class="header-brand-wrap">
                <a href="{{ route('doctor.dashboard') }}" class="d-flex align-items-center gap-2 text-decoration-none">
                    <img src="{{ URL::to('/') }}/img/logo2.png" alt="KK Patel Hospital" class="header-brand-logo">
                    <div class="header-brand-text d-none d-sm-block">
                        <div class="header-brand-title">KK PATEL HOSPITAL</div>
                        <div class="header-brand-badge"><i class="fa fa-user-md"></i> Doctor Portal</div>
                    </div>
                </a>
            </div>

            <!-- Doctor Status / Room Badge -->
            @if($currentDoctor)
                <div class="d-none d-md-flex align-items-center gap-2 pl-3 border-left">
                    <span class="badge badge-pill badge-light border text-primary" style="font-size: 11.5px; font-weight: 700; padding: 6px 12px;">
                        <i class="fa fa-hospital-o m-r-4"></i> {{ $currentDoctor->room_no ?: 'OPD Room #102' }}
                    </span>
                    <span class="badge badge-pill badge-light border text-secondary" style="font-size: 11.5px; font-weight: 700; padding: 6px 12px;">
                        <i class="fa fa-stethoscope m-r-4"></i> {{ $currentDoctor->departmentname ?: 'Specialist' }}
                    </span>
                </div>
            @endif
        </div>

        <div class="header-controls-right">
            <!-- Duty Status Quick Switcher -->
            @if($currentDoctor)
                @if($currentDoctor->is_available)
                    <a href="{{ route('doctor.schedule.toggle_duty') }}" class="duty-status-pill duty-status-available d-none d-sm-inline-flex" title="Click to toggle Off-Duty">
                        <span class="pulse-dot pulse-dot-green"></span>
                        <span>On Duty &bull; Available</span>
                    </a>
                @else
                    <a href="{{ route('doctor.schedule.toggle_duty') }}" class="duty-status-pill duty-status-off d-none d-sm-inline-flex" title="Click to toggle On-Duty">
                        <span class="pulse-dot pulse-dot-red"></span>
                        <span>Off Duty &bull; Out of Office</span>
                    </a>
                @endif
            @endif

            <!-- Quick Action: Manage Slots -->
            <a href="{{ route('doctor.time_slots') }}" class="btn-doc-light d-none d-md-inline-flex py-1 px-3" style="font-size: 12px;">
                <i class="fa fa-clock-o text-primary"></i> Manage Slots
            </a>

            <!-- Doctor Profile Dropdown -->
            @if($currentDoctor)
                <div class="dropdown">
                    <button class="doctor-profile-capsule dropdown-toggle border-0" type="button" id="docProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(!empty($currentDoctor->Avatar) && file_exists(public_path($currentDoctor->Avatar)))
                            <img src="{{ asset($currentDoctor->Avatar) }}" alt="{{ $currentDoctor->username }}" class="doc-avatar-img">
                        @else
                            <div class="doc-avatar-initial">
                                {{ strtoupper(substr($currentDoctor->username, 0, 1)) }}
                            </div>
                        @endif
                        <div class="text-left d-none d-md-block" style="line-height: 1.15; padding-right: 4px;">
                            <strong style="font-size: 13px; color: #0f172a; display: block;">{{ $currentDoctor->username }}</strong>
                            <small style="font-size: 10.5px; color: #64748b;">{{ $currentDoctor->departmentname }}</small>
                        </div>
                        <i class="fa fa-angle-down text-muted ml-1" style="font-size: 12px;"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-right shadow-lg border-0 py-2" aria-labelledby="docProfileDropdown" style="border-radius: 14px; min-width: 220px; font-size: 13px;">
                        <div class="px-3 py-2 border-bottom">
                            <strong class="d-block text-dark">{{ $currentDoctor->username }}</strong>
                            <small class="text-muted">{{ $currentDoctor->email }}</small>
                        </div>
                        <a class="dropdown-item py-2" href="{{ route('doctor.dashboard') }}">
                            <i class="fa fa-th-large text-primary m-r-8"></i> Dashboard
                        </a>
                        <a class="dropdown-item py-2" href="{{ route('doctor.appointments') }}">
                            <i class="fa fa-calendar-check-o text-success m-r-8"></i> My Appointments
                        </a>
                        <a class="dropdown-item py-2" href="{{ route('doctor.profile') }}">
                            <i class="fa fa-user-circle text-info m-r-8"></i> My Profile
                        </a>
                        <a class="dropdown-item py-2" href="{{ route('doctor.change_password') }}">
                            <i class="fa fa-key text-warning m-r-8"></i> Change Password
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item py-2 text-danger font-weight-bold" href="{{ route('doctor.logout') }}">
                            <i class="fa fa-sign-out text-danger m-r-8"></i> Logout
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </header>

    <!-- 2. DOCTOR PANEL SIDEBAR MENU (STRUCTURE AS REQUESTED BY USER) -->
    <aside class="doctor-sidebar" id="doctorSidebar">
        <div class="sidebar-inner">
            <span class="sidebar-section-title">DOCTOR DASHBOARD</span>

            <ul class="doc-nav-list">
                <!-- 1. Dashboard -->
                <li class="doc-nav-item">
                    <a href="{{ route('doctor.dashboard') }}" class="doc-nav-link {{ $activeTab === 'dashboard' ? 'active' : '' }}">
                        <i class="fa fa-th-large"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- 2. My Appointments -->
                <li class="doc-nav-item">
                    <a href="{{ route('doctor.appointments') }}" class="doc-nav-link {{ $activeTab === 'appointments' ? 'active' : '' }}">
                        <i class="fa fa-calendar-check-o"></i>
                        <span>My Appointments</span>
                        @php
                            $pendingNavCount = \App\Models\appointment::where('username', $currentDoctor->username ?? '')->where('Status', 'Pending')->count();
                        @endphp
                        @if($pendingNavCount > 0)
                            <span class="nav-counter-pill">{{ $pendingNavCount }}</span>
                        @endif
                    </a>
                </li>

                <!-- 3. Manage Time Slots(crud operation forms) -->
                <li class="doc-nav-item">
                    <a href="{{ route('doctor.time_slots') }}" class="doc-nav-link {{ $activeTab === 'time_slots' ? 'active' : '' }}">
                        <i class="fa fa-clock-o"></i>
                        <span>Manage Time Slots</span>
                    </a>
                </li>

                <!-- 4. My Schedule -->
                <li class="doc-nav-item">
                    <a href="{{ route('doctor.schedule') }}" class="doc-nav-link {{ $activeTab === 'schedule' ? 'active' : '' }}">
                        <i class="fa fa-calendar"></i>
                        <span>My Schedule</span>
                    </a>
                </li>

                <!-- 5. My Patients -->
                <li class="doc-nav-item">
                    <a href="{{ route('doctor.patients') }}" class="doc-nav-link {{ $activeTab === 'patients' ? 'active' : '' }}">
                        <i class="fa fa-users"></i>
                        <span>My Patients</span>
                    </a>
                </li>

                <!-- 6. My Profile -->
                <li class="doc-nav-item">
                    <a href="{{ route('doctor.profile') }}" class="doc-nav-link {{ $activeTab === 'profile' ? 'active' : '' }}">
                        <i class="fa fa-user-circle"></i>
                        <span>My Profile</span>
                    </a>
                </li>

                <!-- 7. Change Password -->
                <li class="doc-nav-item">
                    <a href="{{ route('doctor.change_password') }}" class="doc-nav-link {{ $activeTab === 'password' ? 'active' : '' }}">
                        <i class="fa fa-key"></i>
                        <span>Change Password</span>
                    </a>
                </li>

                <!-- 8. Logout -->
                <li class="doc-nav-item mt-3 pt-3 border-top" style="border-color: rgba(255, 255, 255, 0.08) !important;">
                    <a href="{{ route('doctor.logout') }}" class="doc-nav-link text-danger" onclick="return confirm('Are you sure you want to log out of the doctor panel?');">
                        <i class="fa fa-sign-out text-danger"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Sidebar Bottom Doctor Capsule -->
        @if($currentDoctor)
            <div class="sidebar-bottom-card">
                <div class="doc-mini-card">
                    @if(!empty($currentDoctor->Avatar) && file_exists(public_path($currentDoctor->Avatar)))
                        <img src="{{ asset($currentDoctor->Avatar) }}" alt="{{ $currentDoctor->username }}" class="doc-avatar-img">
                    @else
                        <div class="doc-avatar-initial" style="width: 38px; height: 38px;">
                            {{ strtoupper(substr($currentDoctor->username, 0, 1)) }}
                        </div>
                    @endif
                    <div class="doc-mini-text">
                        <h6>{{ $currentDoctor->username }}</h6>
                        <small>{{ $currentDoctor->departmentname }}</small>
                    </div>
                </div>
            </div>
        @endif
    </aside>

    <!-- 3. PAGE MAIN CONTENT WRAPPER -->
    <main class="doctor-page-wrapper">
        <div class="doctor-content-container">

            <!-- Flash Session Alerts -->
            @if(session('success'))
                <div class="doc-alert-success alert-dismissible fade show mb-4" role="alert">
                    <i class="fa fa-check-circle m-r-8"></i> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="background: none; border: none; font-size: 18px; color: #065f46; opacity: 0.7;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div class="doc-alert-danger alert-dismissible fade show mb-4" role="alert">
                    <i class="fa fa-exclamation-circle m-r-8"></i> {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="background: none; border: none; font-size: 18px; color: #991b1b; opacity: 0.7;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Main Page Content Section -->
            @yield('content')

        </div>
    </main>

    <!-- Scripts -->
    <script src="{{ URL::to('/') }}/assets/js/jquery-3.2.1.min.js"></script>
    <script src="{{ URL::to('/') }}/assets/js/popper.min.js"></script>
    <script src="{{ URL::to('/') }}/assets/js/bootstrap.min.js"></script>

    <script>
        function toggleDoctorSidebar() {
            const sidebar = document.getElementById('doctorSidebar');
            if (sidebar) {
                sidebar.classList.toggle('show-mobile');
            }
        }
    </script>

    @stack('scripts')
</body>

</html>

