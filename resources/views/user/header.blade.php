@php
    $portalUser = Auth::user();
    $portalUserId = Auth::id();
    $portalUserEmail = $portalUser->email ?? '';
    $portalAptCount = \App\Models\appointment::where(function($q) use ($portalUserId, $portalUserEmail) {
        $q->where('user_id', $portalUserId)->orWhere('email', $portalUserEmail);
    })->count();
@endphp

<!-- ===================================================================
     SLENDER, COMPACT & MODERN PATIENT PORTAL HEADER (No Multi-line Wrap)
     =================================================================== -->
<header class="patient-compact-navbar">
    <div class="container-fluid px-3 px-xl-5">
        <div class="d-flex align-items-center justify-content-between header-row-inner">
            
            <!-- 1. Left: Hospital Logo & Sleek Portal Chip -->
            <div class="d-flex align-items-center gap-2 flex-shrink-0">
                <a href="{{ url('/user/dashboard') }}" class="brand-link" title="KK Patel Patient Portal">
                    <img src="{{ URL::to('/') }}/img/logo2.png" alt="KK Patel Hospital" class="brand-logo-img">
                </a>
                <span class="portal-chip-badge d-none d-sm-inline-flex">
                    <i class="fa fa-heartbeat text-danger"></i> Portal
                </span>
            </div>

            <!-- 2. Center: Clean, Slender Single-Line Navigation -->
            <nav class="user-nav-bar d-none d-lg-flex align-items-center">
                <a href="{{ url('/user/dashboard') }}" class="user-nav-link {{ ($activePortalTab ?? '') === 'dashboard' ? 'active' : '' }}">
                    <i class="fa fa-th-large"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ url('/user/appointment-history') }}" class="user-nav-link {{ ($activePortalTab ?? '') === 'history' ? 'active' : '' }}">
                    <i class="fa fa-calendar-check-o"></i>
                    <span>Appointments</span>
                    @if($portalAptCount > 0)
                        <span class="user-counter-pill">{{ $portalAptCount }}</span>
                    @endif
                </a>

                <a href="{{ url('/user/doctors') }}" class="user-nav-link {{ ($activePortalTab ?? '') === 'doctors' ? 'active' : '' }}">
                    <i class="fa fa-user-md"></i>
                    <span>Doctors</span>
                </a>

                <a href="{{ url('/user/departments') }}" class="user-nav-link {{ ($activePortalTab ?? '') === 'departments' ? 'active' : '' }}">
                    <i class="fa fa-hospital-o"></i>
                    <span>Departments</span>
                </a>

                <a href="{{ url('/user/profile') }}" class="user-nav-link {{ ($activePortalTab ?? '') === 'profile' ? 'active' : '' }}">
                    <i class="fa fa-user-circle"></i>
                    <span>Profile</span>
                </a>
            </nav>

            <!-- 3. Right: Compact Book OPD CTA + Profile Dropdown -->
            <div class="d-flex align-items-center gap-2 flex-shrink-0">
                <!-- Compact Book OPD Button -->
                <a href="{{ url('/user/book-appointment') }}" class="btn-compact-book d-none d-sm-inline-flex">
                    <i class="fa fa-plus"></i>
                    <span>Book OPD</span>
                </a>

                <!-- Patient Profile Chip Dropdown -->
                <div class="dropdown user-account-dropdown">
                    <button class="user-avatar-pill dropdown-toggle" type="button" id="userCompactMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-avatar-circ">
                            @if(!empty($portalUser->logo) && file_exists(public_path($portalUser->logo)))
                                <img src="{{ asset($portalUser->logo) }}" alt="{{ $portalUser->name }}" class="user-avatar-pic">
                            @else
                                <span class="user-avatar-char">{{ strtoupper(substr($portalUser->name ?? 'P', 0, 1)) }}</span>
                            @endif
                            <span class="user-online-dot"></span>
                        </div>
                        <span class="user-pill-name d-none d-md-inline-block">
                            {{ Str::words($portalUser->name ?? 'Patient', 1, '') }}
                        </span>
                        <i class="fa fa-angle-down user-pill-arrow"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-right compact-dropdown-menu shadow-lg border-0" aria-labelledby="userCompactMenu">
                        <!-- User Card Head -->
                        <div class="compact-dropdown-user">
                            <strong class="d-block text-dark font-weight-bold" style="font-size: 13.5px; line-height: 1.2;">
                                {{ $portalUser->name }}
                            </strong>
                            <small class="text-muted d-block" style="font-size: 11.5px;">
                                {{ $portalUser->email }}
                            </small>
                            <div class="mt-2 d-flex align-items-center justify-content-between">
                                <span class="badge badge-pill badge-light text-primary" style="font-size: 10.5px; font-weight: 700; border: 1px solid #e2e8f0;">
                                    #PAT-{{ str_pad($portalUserId, 5, '0', STR_PAD_LEFT) }}
                                </span>
                                <span class="badge badge-pill badge-success" style="font-size: 10px;">
                                    Active Patient
                                </span>
                            </div>
                        </div>

                        <div class="dropdown-divider my-1"></div>

                        <!-- Dropdown Links -->
                        <a class="dropdown-item compact-drop-link" href="{{ url('/user/dashboard') }}">
                            <i class="fa fa-th-large text-primary"></i> Dashboard
                        </a>
                        <a class="dropdown-item compact-drop-link" href="{{ url('/user/book-appointment') }}">
                            <i class="fa fa-calendar-plus-o text-success"></i> Book OPD Consultation
                        </a>
                        <a class="dropdown-item compact-drop-link" href="{{ url('/user/appointment-history') }}">
                            <i class="fa fa-history text-info"></i> My Appointments
                        </a>
                        <a class="dropdown-item compact-drop-link" href="{{ url('/user/profile') }}">
                            <i class="fa fa-user-circle text-warning"></i> Profile & Security
                        </a>

                        <div class="dropdown-divider my-1"></div>

                        <a class="dropdown-item compact-drop-link" href="{{ url('/') }}">
                            <i class="fa fa-globe text-secondary"></i> Hospital Main Website
                        </a>

                        <div class="dropdown-divider my-1"></div>

                        <a class="dropdown-item compact-drop-link text-danger font-weight-bold" href="{{ url('/user/logout') }}" onclick="return confirm('Do you wish to log out?');">
                            <i class="fa fa-sign-out"></i> Log Out
                        </a>
                    </div>
                </div>

                <!-- Mobile Hamburger Button -->
                <button class="mobile-toggle-btn d-lg-none" type="button" data-toggle="collapse" data-target="#compactMobileNav" aria-controls="compactMobileNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Collapsible Menu -->
        <div class="collapse d-lg-none pb-3 border-top mt-1" id="compactMobileNav">
            <div class="pt-2">
                <div class="row">
                    <div class="col-6 mb-2">
                        <a href="{{ url('/user/dashboard') }}" class="mobile-nav-pill {{ ($activePortalTab ?? '') === 'dashboard' ? 'active' : '' }}">
                            <i class="fa fa-th-large text-primary"></i> Dashboard
                        </a>
                    </div>
                    <div class="col-6 mb-2">
                        <a href="{{ url('/user/book-appointment') }}" class="mobile-nav-pill {{ ($activePortalTab ?? '') === 'book' ? 'active' : '' }}">
                            <i class="fa fa-calendar-plus-o text-success"></i> Book OPD
                        </a>
                    </div>
                    <div class="col-6 mb-2">
                        <a href="{{ url('/user/appointment-history') }}" class="mobile-nav-pill {{ ($activePortalTab ?? '') === 'history' ? 'active' : '' }}">
                            <i class="fa fa-history text-info"></i> Appointments
                        </a>
                    </div>
                    <div class="col-6 mb-2">
                        <a href="{{ url('/user/doctors') }}" class="mobile-nav-pill {{ ($activePortalTab ?? '') === 'doctors' ? 'active' : '' }}">
                            <i class="fa fa-user-md text-teal"></i> Doctors
                        </a>
                    </div>
                    <div class="col-6 mb-2">
                        <a href="{{ url('/user/departments') }}" class="mobile-nav-pill {{ ($activePortalTab ?? '') === 'departments' ? 'active' : '' }}">
                            <i class="fa fa-hospital-o text-indigo"></i> Departments
                        </a>
                    </div>
                    <div class="col-6 mb-2">
                        <a href="{{ url('/user/profile') }}" class="mobile-nav-pill {{ ($activePortalTab ?? '') === 'profile' ? 'active' : '' }}">
                            <i class="fa fa-user-circle text-warning"></i> Profile
                        </a>
                    </div>
                    <div class="col-12 mt-1 pt-2 border-top d-flex justify-content-between align-items-center">
                        <a href="{{ url('/') }}" class="text-muted font-weight-bold" style="font-size: 12.5px;">
                            <i class="fa fa-globe"></i> Main Website
                        </a>
                        <a href="{{ url('/user/logout') }}" class="text-danger font-weight-bold" style="font-size: 12.5px;">
                            <i class="fa fa-sign-out"></i> Log Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Ultra-Compact, Clean & Anti-Wrap CSS -->
<style>
    /* Navbar Container */
    .patient-compact-navbar {
        background: #ffffff !important;
        border-bottom: 1.5px solid #e2e8f0 !important;
        box-shadow: 0 2px 12px rgba(15, 23, 42, 0.04) !important;
        position: sticky !important;
        top: 0 !important;
        z-index: 1040 !important;
        padding: 0 !important;
    }

    .header-row-inner {
        height: 62px;
    }

    /* Brand Logo & Chip */
    .brand-link {
        display: inline-flex;
        align-items: center;
        text-decoration: none !important;
    }

    .brand-logo-img {
        height: 36px;
        width: auto;
        display: block;
    }

    .portal-chip-badge {
        font-size: 11px;
        font-weight: 800;
        color: #69275c;
        background: #fbf5fa;
        border: 1px solid #ebdbe8;
        padding: 3px 9px;
        border-radius: 50px;
        letter-spacing: 0.3px;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        white-space: nowrap !important;
    }

    /* Slender Navigation Links - Single line guaranteed */
    .user-nav-bar {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .user-nav-link {
        display: inline-flex !important;
        align-items: center !important;
        gap: 6px !important;
        padding: 7px 14px !important;
        border-radius: 8px !important;
        font-size: 13.5px !important;
        font-weight: 600 !important;
        color: #475569 !important;
        text-decoration: none !important;
        white-space: nowrap !important; /* CRITICAL: Never wrap text to 2 lines */
        transition: all 0.18s ease !important;
        line-height: 1 !important;
    }

    .user-nav-link i {
        font-size: 13px;
        color: #94a3b8;
        transition: color 0.18s ease;
    }

    .user-nav-link:hover {
        background: #f8fafc !important;
        color: #69275c !important;
    }

    .user-nav-link:hover i {
        color: #69275c;
    }

    /* Active Nav Item - Clean and subtle, not a giant bloated bubble */
    .user-nav-link.active {
        background: #fbf5fa !important;
        color: #69275c !important;
        font-weight: 700 !important;
        box-shadow: inset 0 -2px 0 0 #69275c !important;
        border-radius: 8px 8px 0 0 !important;
    }

    .user-nav-link.active i {
        color: #69275c !important;
    }

    .user-counter-pill {
        background: #e2e8f0;
        color: #334155;
        font-size: 10.5px;
        font-weight: 800;
        padding: 2px 6px;
        border-radius: 50px;
        line-height: 1;
    }

    .user-nav-link.active .user-counter-pill {
        background: #69275c;
        color: #ffffff;
    }

    /* Compact Book OPD Button */
    .btn-compact-book {
        background: #69275c !important;
        color: #ffffff !important;
        padding: 7px 16px !important;
        border-radius: 50px !important;
        font-size: 12.5px !important;
        font-weight: 700 !important;
        display: inline-flex !important;
        align-items: center !important;
        gap: 6px !important;
        white-space: nowrap !important;
        text-decoration: none !important;
        box-shadow: 0 2px 8px rgba(105, 39, 92, 0.2) !important;
        transition: all 0.2s ease !important;
        border: none !important;
        line-height: 1.2 !important;
    }

    .btn-compact-book:hover {
        background: #8b1d6b !important;
        transform: translateY(-1px) !important;
        box-shadow: 0 4px 12px rgba(105, 39, 92, 0.3) !important;
        color: #ffffff !important;
    }

    /* Slender Profile Pill Button */
    .user-avatar-pill {
        display: inline-flex !important;
        align-items: center !important;
        gap: 7px !important;
        padding: 4px 12px 4px 5px !important;
        border-radius: 50px !important;
        background: #f8fafc !important;
        border: 1px solid #e2e8f0 !important;
        cursor: pointer !important;
        transition: all 0.18s ease !important;
        outline: none !important;
        white-space: nowrap !important;
        line-height: 1 !important;
    }

    .user-avatar-pill:hover, .user-avatar-pill[aria-expanded="true"] {
        background: #ffffff !important;
        border-color: #69275c !important;
        box-shadow: 0 2px 10px rgba(105, 39, 92, 0.12) !important;
    }

    .user-avatar-pill::after {
        display: none !important;
    }

    .user-avatar-circ {
        position: relative;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: linear-gradient(135deg, #69275c, #0284c7);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        font-weight: 800;
        font-size: 13px;
        flex-shrink: 0;
    }

    .user-avatar-pic {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
    }

    .user-online-dot {
        position: absolute;
        bottom: -1px;
        right: -1px;
        width: 8px;
        height: 8px;
        background: #10b981;
        border: 1.5px solid #ffffff;
        border-radius: 50%;
    }

    .user-pill-name {
        font-size: 13px;
        font-weight: 700;
        color: #0f172a;
    }

    .user-pill-arrow {
        font-size: 11px;
        color: #94a3b8;
        transition: transform 0.2s ease;
    }

    .user-avatar-pill[aria-expanded="true"] .user-pill-arrow {
        transform: rotate(180deg);
    }

    /* Dropdown Card */
    .compact-dropdown-menu {
        min-width: 230px !important;
        border-radius: 12px !important;
        padding: 6px !important;
        margin-top: 6px !important;
        border: 1px solid #e2e8f0 !important;
        box-shadow: 0 14px 30px -4px rgba(15, 23, 42, 0.14) !important;
        z-index: 9999 !important;
    }

    .compact-dropdown-user {
        padding: 10px 12px 8px;
    }

    .compact-drop-link {
        padding: 8px 12px !important;
        border-radius: 8px !important;
        font-size: 12.5px !important;
        font-weight: 600 !important;
        color: #334155 !important;
        display: flex !important;
        align-items: center !important;
        gap: 9px !important;
        transition: all 0.15s ease !important;
        white-space: nowrap !important;
    }

    .compact-drop-link:hover {
        background: #fbf5fa !important;
        color: #69275c !important;
    }

    .compact-drop-link i {
        font-size: 13px;
        width: 16px;
        text-align: center;
    }

    /* Mobile Hamburger */
    .mobile-toggle-btn {
        width: 34px;
        height: 34px;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        background: #ffffff;
        color: #0f172a;
        font-size: 15px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .mobile-nav-pill {
        display: flex;
        align-items: center;
        gap: 7px;
        padding: 8px 12px;
        border-radius: 8px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        font-size: 12.5px;
        font-weight: 700;
        color: #475569;
        text-decoration: none !important;
        white-space: nowrap !important;
    }

    .mobile-nav-pill.active {
        background: #69275c;
        color: #ffffff;
        border-color: #69275c;
    }

    .mobile-nav-pill.active i {
        color: #ffffff !important;
    }
</style>
