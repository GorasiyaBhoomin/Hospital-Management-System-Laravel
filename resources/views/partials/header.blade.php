<!-- Modern Light Hospital Topbar & Header Navigation with Ultra-Solid Styling & Smooth Sticky Transitions -->


    <!-- 2. Main Navigation Header (100% Solid & Bulletproof Sticky) -->
    <header class="kk-main-header">
        <div class="header-area">
            <div id="sticky-header" class="main-header-area kk-navbar-strip">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Brand Hospital Logo -->
                        <div class="col-xl-3 col-lg-3 col-8">
                            <div class="kk-brand-logo">
                                <a href="{{ url('/') }}" class="kk-logo-anchor">
                                    <img src="{{ URL::to('/') }}/img/logo2.png" alt="KK Patel Super Speciality Hospital"
                                        class="kk-hospital-logo">
                                </a>
                            </div>
                        </div>

                        <!-- Main Navigation Menu (Desktop) -->
                        <div class="col-xl-6 col-lg-6 d-none d-lg-block text-center">
                            <div class="kk-nav-container">
                                <nav>
                                    <ul id="navigation" class="kk-nav-list">
                                        <li class="kk-nav-item">
                                            <a class="kk-nav-link {{ ($active ?? '') === 'home' ? 'active' : '' }}"
                                                href="{{ url('/') }}">
                                                <span>Home</span>
                                                @if(($active ?? '') === 'home')
                                                    <span class="kk-active-dot"></span>
                                                @endif
                                            </a>
                                        </li>
                                        <li class="kk-nav-item">
                                            <a class="kk-nav-link {{ ($active ?? '') === 'about' ? 'active' : '' }}"
                                                href="{{ url('about') }}">
                                                <span>About</span>
                                                @if(($active ?? '') === 'about')
                                                    <span class="kk-active-dot"></span>
                                                @endif
                                            </a>
                                        </li>
                                        <li class="kk-nav-item">
                                            <a class="kk-nav-link {{ ($active ?? '') === 'doctors' ? 'active' : '' }}"
                                                href="{{ url('Doctors') }}">
                                                <span>Doctors</span>
                                                @if(($active ?? '') === 'doctors')
                                                    <span class="kk-active-dot"></span>
                                                @endif
                                            </a>
                                        </li>
                                        <li class="kk-nav-item">
                                            <a class="kk-nav-link {{ ($active ?? '') === 'department' ? 'active' : '' }}"
                                                href="{{ url('Department') }}">
                                                <span>Department</span>
                                                @if(($active ?? '') === 'department')
                                                    <span class="kk-active-dot"></span>
                                                @endif
                                            </a>
                                        </li>

                                        <!-- Pages Dropdown -->
                                        <li class="kk-nav-item kk-has-dropdown">
                                            <a class="kk-nav-link {{ in_array($active ?? '', ['pressdesk', 'gallery']) ? 'active' : '' }}"
                                                href="javascript:void(0)">
                                                <span>Pages</span>
                                                <i class="ti-angle-down kk-chevron-icon"></i>
                                            </a>
                                            <ul class="kk-dropdown-card">
                                                <li>
                                                    <a class="kk-dropdown-item {{ ($active ?? '') === 'pressdesk' ? 'sub-active' : '' }}"
                                                        href="{{ url('Pressdesk') }}">
                                                        <div class="kk-drop-icon bg-green-light">
                                                            <i class="fa fa-newspaper-o text-success"></i>
                                                        </div>
                                                        <div class="kk-drop-text">
                                                            <strong class="kk-drop-title">Press Desk</strong>
                                                            <small class="kk-drop-subtitle">Media & Hospital
                                                                News</small>
                                                        </div>
                                                        <i class="ti-angle-right kk-item-arrow"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="kk-dropdown-item {{ ($active ?? '') === 'gallery' ? 'sub-active' : '' }}"
                                                        href="{{ url('gallery') }}">
                                                        <div class="kk-drop-icon bg-blue-light">
                                                            <i class="fa fa-picture-o text-primary"></i>
                                                        </div>
                                                        <div class="kk-drop-text">
                                                            <strong class="kk-drop-title">Hospital Gallery</strong>
                                                            <small class="kk-drop-subtitle">Campus & Facilities
                                                                Tour</small>
                                                        </div>
                                                        <i class="ti-angle-right kk-item-arrow"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>

                                        <!-- Contact Us Dropdown -->
                                        <li class="kk-nav-item kk-has-dropdown">
                                            <a class="kk-nav-link {{ in_array($active ?? '', ['contacts', 'feedbackreview']) ? 'active' : '' }}"
                                                href="javascript:void(0)">
                                                <span>Contact</span>
                                                <i class="ti-angle-down kk-chevron-icon"></i>
                                            </a>
                                            <ul class="kk-dropdown-card">
                                                <li>
                                                    <a class="kk-dropdown-item {{ ($active ?? '') === 'contacts' ? 'sub-active' : '' }}"
                                                        href="{{ url('contacts') }}">
                                                        <div class="kk-drop-icon bg-pink-light">
                                                            <i class="fa fa-map-marker text-danger"></i>
                                                        </div>
                                                        <div class="kk-drop-text">
                                                            <strong class="kk-drop-title">Contact & Helpdesk</strong>
                                                            <small class="kk-drop-subtitle">Campus Address &
                                                                Query</small>
                                                        </div>
                                                        <i class="ti-angle-right kk-item-arrow"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="kk-dropdown-item {{ ($active ?? '') === 'feedbackreview' ? 'sub-active' : '' }}"
                                                        href="{{ url('feedbackreview') }}">
                                                        <div class="kk-drop-icon bg-amber-light">
                                                            <i class="fa fa-star text-warning"></i>
                                                        </div>
                                                        <div class="kk-drop-text">
                                                            <strong class="kk-drop-title">Feedback & Review</strong>
                                                            <small class="kk-drop-subtitle">Patient Experience
                                                                Ratings</small>
                                                        </div>
                                                        <i class="ti-angle-right kk-item-arrow"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>

                                        <!-- Patient Portal Nav Link (Visible on mobile/tablet) -->
                                        <li class="kk-nav-item d-lg-none">
                                            @if(Auth::check())
                                                <a class="kk-nav-link" href="{{ Auth::user()->is_admin ? url('/admin/admindashboard') : url('/user/dashboard') }}">
                                                    <span><i class="fa fa-user-circle text-primary"></i> Patient Portal</span>
                                                </a>
                                            @else
                                                <a class="kk-nav-link" href="{{ url('/user/login') }}">
                                                    <span><i class="fa fa-sign-in text-primary"></i> Patient Login / Register</span>
                                                </a>
                                            @endif
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <!-- Appointment Action Button & Patient Portal Pill -->
                        <div class="col-xl-3 col-lg-3 col-4">
                            <div class="kk-header-action text-right d-flex align-items-center justify-content-end" style="gap: 10px;">
                                @if(Auth::check())
                                    <div class="dropdown d-none d-md-inline-block">
                                        <button class="kk-btn-portal dropdown-toggle" type="button" id="patientPortalDrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer; border: 1.5px solid #ebdbe8; background: #fbf5fa; color: #69275c; padding: 8px 16px; border-radius: 50px; font-weight: 700; font-size: 13px; display: inline-flex; align-items: center; gap: 7px; text-decoration: none !important;">
                                            <i class="fa fa-user-circle" style="font-size: 15px;"></i>
                                            <span>{{ Str::words(Auth::user()->name, 1, '') }}</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right shadow-lg border-0 rounded-4 p-2 mt-2" aria-labelledby="patientPortalDrop" style="min-width: 220px; z-index: 9999; border-radius: 14px;">
                                            <div class="px-3 py-2 border-bottom">
                                                <strong class="d-block text-dark" style="font-size: 13.5px;">{{ Auth::user()->name }}</strong>
                                                <small class="text-muted" style="font-size: 11.5px;">{{ Auth::user()->email }}</small>
                                            </div>
                                            <a class="dropdown-item py-2 rounded-2 mt-1" href="{{ Auth::user()->is_admin ? url('/admin/admindashboard') : url('/user/dashboard') }}">
                                                <i class="fa fa-th-large text-primary m-r-5"></i> Dashboard
                                            </a>
                                            <a class="dropdown-item py-2 rounded-2" href="{{ url('/user/book-appointment') }}">
                                                <i class="fa fa-calendar-plus-o text-success m-r-5"></i> Book Appointment
                                            </a>
                                            <a class="dropdown-item py-2 rounded-2" href="{{ url('/user/appointment-history') }}">
                                                <i class="fa fa-history text-info m-r-5"></i> My Appointments
                                            </a>
                                            <a class="dropdown-item py-2 rounded-2" href="{{ url('/user/profile') }}">
                                                <i class="fa fa-user-circle text-warning m-r-5"></i> My Profile
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item py-2 rounded-2 text-danger" href="{{ url('/user/logout') }}">
                                                <i class="fa fa-sign-out m-r-5"></i> Logout
                                            </a>
                                        </div>
                                    </div>
                                @else
                                  
                                @endif

                                <a class="kk-btn-appointment" href="{{ url('appointment') }}">
                                    <span class="kk-btn-icon-wrap">
                                        <i class="fa fa-calendar-check-o"></i>
                                    </span>
                                    <span class="kk-btn-text">Make an Appointment</span>
                                </a>
                            </div>
                        </div>

                        <!-- Mobile Slicknav Target -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>

<!-- Scoped Header Stylesheet: 100% Solid, Bulletproof Sticky & Animations -->
<style>
    /* Header Parent Structure */
    .site-header-wrapper {
        position: relative;
        z-index: 1000;
        width: 100%;
        background: #ffffff;
    }

    /* -----------------------------------------------------------------
       1. TOPBAR STYLES & ANIMATIONS
       ----------------------------------------------------------------- */
    .kk-topbar {
        background: #ffffff !important;
        border-bottom: 1px solid #eef2f6 !important;
        padding: 9px 0 !important;
        font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif !important;
        font-size: 13px !important;
        color: #475569 !important;
        position: relative;
        z-index: 1001;
    }

    .kk-topbar-left {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
    }

    /* Emergency Hotline Pill */
    .kk-emergency-pill {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: linear-gradient(135deg, #fff1f2 0%, #fee2e2 100%);
        border: 1px solid #fecaca;
        color: #dc2626 !important;
        font-weight: 700;
        text-decoration: none !important;
        padding: 4px 12px;
        border-radius: 50px;
        box-shadow: 0 2px 8px rgba(220, 38, 38, 0.12);
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .kk-emergency-pill:hover {
        background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
        transform: translateY(-1px) scale(1.02);
        box-shadow: 0 4px 14px rgba(220, 38, 38, 0.22);
        color: #b91c1c !important;
    }

    /* Pulsing Beacon Dot */
    .kk-beacon-ring {
        position: relative;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 10px;
        height: 10px;
    }

    .kk-beacon-dot {
        width: 8px;
        height: 8px;
        background-color: #ef4444;
        border-radius: 50%;
        display: inline-block;
        box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.8);
        animation: kkPulseBeacon 1.6s infinite;
    }

    @keyframes kkPulseBeacon {
        0% {
            box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.8);
        }

        70% {
            box-shadow: 0 0 0 7px rgba(239, 68, 68, 0);
        }

        100% {
            box-shadow: 0 0 0 0 rgba(239, 68, 68, 0);
        }
    }

    /* Ringing Phone Icon Animation */
    .kk-phone-ringing {
        font-size: 13px;
        animation: kkRingPhone 4s ease-in-out infinite;
        transform-origin: center;
    }

    @keyframes kkRingPhone {

        0%,
        80%,
        100% {
            transform: rotate(0deg);
        }

        82% {
            transform: rotate(-15deg);
        }

        86% {
            transform: rotate(15deg);
        }

        90% {
            transform: rotate(-15deg);
        }

        94% {
            transform: rotate(15deg);
        }

        98% {
            transform: rotate(0deg);
        }
    }

    .kk-pill-label {
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .kk-pill-number {
        font-size: 13.5px;
        letter-spacing: 0.2px;
    }

    .kk-topbar-divider {
        color: #cbd5e1;
        font-size: 12px;
    }

    .kk-topbar-info {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-weight: 500;
        color: #475569;
    }

    /* Accreditations & Socials (Right Side) */
    .kk-topbar-right {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;
    }

    .kk-trust-badge {
        font-size: 12px;
        font-weight: 600;
        color: #334155;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        padding: 4px 10px;
        border-radius: 6px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s ease;
    }

    .kk-trust-badge:hover {
        background: #ffffff;
        box-shadow: 0 2px 6px rgba(15, 23, 42, 0.05);
        transform: translateY(-1px);
    }

    .kk-social-links {
        gap: 6px;
        margin-left: 6px;
    }

    .kk-soc-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        color: #64748b !important;
        font-size: 12px;
        transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        text-decoration: none !important;
    }

    .kk-soc-icon:hover {
        background: #69275c;
        color: #ffffff !important;
        border-color: #69275c;
        transform: translateY(-2px) scale(1.08);
        box-shadow: 0 4px 10px rgba(105, 39, 92, 0.25);
    }

    /* -----------------------------------------------------------------
       2. MAIN NAVBAR & BULLETPROOF STICKY OVERRIDES
       ----------------------------------------------------------------- */
    .kk-main-header {
        position: relative;
        z-index: 999;
        width: 100%;
        background: #ffffff !important;
    }

    .header-area {
        position: relative;
        width: 100%;
        background: #ffffff !important;
    }

    /* Normal Navbar Strip: 100% Solid White */
    .header-area .main-header-area.kk-navbar-strip,
    .kk-navbar-strip {
        background: #ffffff !important;
        border-bottom: 1px solid #edf2f7 !important;
        box-shadow: 0 4px 20px -2px rgba(15, 23, 42, 0.05) !important;
        padding: 12px 0 !important;
        transition: all 0.3s ease;
        position: relative;
        z-index: 999;
    }

    /* Bulletproof Sticky Navbar: Top 0, Transform None, 100% Opaque Solid White */
    .header-area .main-header-area.kk-navbar-strip.sticky,
    .header-area .main-header-area.sticky,
    #sticky-header.sticky,
    .kk-navbar-strip.sticky {
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        width: 100% !important;
        z-index: 999999 !important;
        background: #ffffff !important;
        box-shadow: 0 4px 25px rgba(15, 23, 42, 0.12) !important;
        border-bottom: 1px solid #e2e8f0 !important;
        padding: 9px 0 !important;
        transform: none !important;
        margin: 0 !important;
    }

    /* Logo Image */
    .kk-hospital-logo {
        max-height: 52px;
        width: auto;
        display: block;
        transition: transform 0.25s ease;
    }

    .kk-hospital-logo:hover {
        transform: scale(1.02);
    }

    /* Nav Links Container */
    .kk-nav-list {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .kk-nav-item {
        position: relative;
        margin: 0 4px;
    }

    /* Navigation Links */
    .kk-nav-link {
        font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif !important;
        font-size: 15px !important;
        font-weight: 600 !important;
        color: #334155 !important;
        padding: 8px 14px !important;
        border-radius: 10px;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        position: relative;
        transition: all 0.25s ease;
    }

    .kk-nav-link:hover {
        color: #69275c !important;
        background: #fbf5fa;
        transform: translateY(-1px);
    }

    /* Active Nav Link Styling */
    .kk-nav-link.active {
        color: #69275c !important;
        background: linear-gradient(135deg, rgba(105, 39, 92, 0.08), rgba(2, 132, 199, 0.06)) !important;
        font-weight: 700 !important;
        border: 1px solid rgba(105, 39, 92, 0.15);
    }

    .kk-active-dot {
        width: 5px;
        height: 5px;
        background: #69275c;
        border-radius: 50%;
        display: inline-block;
        animation: kkPulseActiveDot 2s infinite;
    }

    @keyframes kkPulseActiveDot {

        0%,
        100% {
            transform: scale(1);
            opacity: 1;
        }

        50% {
            transform: scale(1.5);
            opacity: 0.6;
        }
    }

    .kk-chevron-icon {
        font-size: 10px;
        color: #94a3b8;
        transition: transform 0.25s ease, color 0.25s ease;
    }

    .kk-has-dropdown:hover .kk-chevron-icon {
        transform: rotate(180deg);
        color: #69275c;
    }

    /* -----------------------------------------------------------------
       3. MODERN DROPDOWN MENUS (PAGES & CONTACT US)
       ----------------------------------------------------------------- */
    .kk-dropdown-card {
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translateX(-50%) translateY(14px);
        background: #ffffff !important;
        min-width: 250px;
        border-radius: 16px !important;
        box-shadow: 0 20px 45px -10px rgba(15, 23, 42, 0.15), 0 8px 16px -4px rgba(0, 0, 0, 0.04) !important;
        border: 1px solid #edf2f7 !important;
        padding: 8px !important;
        list-style: none;
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
        transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        z-index: 1050;
    }

    .kk-has-dropdown:hover .kk-dropdown-card {
        opacity: 1;
        visibility: visible;
        pointer-events: auto;
        transform: translateX(-50%) translateY(4px);
    }

    .kk-dropdown-item {
        display: flex !important;
        align-items: center;
        gap: 12px;
        padding: 10px 12px !important;
        border-radius: 10px;
        text-decoration: none !important;
        transition: all 0.2s ease;
        text-align: left;
    }

    .kk-dropdown-item:hover,
    .kk-dropdown-item.sub-active {
        background: #fbf5fa !important;
        transform: translateX(4px);
    }

    .kk-drop-icon {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        flex-shrink: 0;
        transition: transform 0.2s ease;
    }

    .kk-dropdown-item:hover .kk-drop-icon {
        transform: scale(1.1);
    }

    .bg-green-light {
        background: #f0fdf4;
    }

    .bg-blue-light {
        background: #eff6ff;
    }

    .bg-pink-light {
        background: #fdf2f8;
    }

    .bg-amber-light {
        background: #fefce8;
    }

    .kk-drop-text {
        flex: 1;
        line-height: 1.25;
    }

    .kk-drop-title {
        display: block;
        font-size: 14px;
        font-weight: 700;
        color: #0f172a;
    }

    .kk-dropdown-item:hover .kk-drop-title,
    .kk-dropdown-item.sub-active .kk-drop-title {
        color: #69275c !important;
    }

    .kk-drop-subtitle {
        display: block;
        font-size: 11.5px;
        color: #64748b;
        font-weight: 500;
        margin-top: 1px;
    }

    .kk-item-arrow {
        font-size: 11px;
        color: #cbd5e1;
        transition: transform 0.2s ease, color 0.2s ease;
    }

    .kk-dropdown-item:hover .kk-item-arrow {
        transform: translateX(3px);
        color: #69275c;
    }

    /* -----------------------------------------------------------------
       4. PATIENT PORTAL PILL & ANIMATED APPOINTMENT CTA BUTTON
       ----------------------------------------------------------------- */
    .kk-btn-portal {
        display: inline-flex !important;
        align-items: center;
        gap: 7px;
        background: #fbf5fa !important;
        color: #69275c !important;
        border: 1.5px solid #ebdbe8 !important;
        padding: 9px 16px !important;
        border-radius: 50px !important;
        font-family: 'Plus Jakarta Sans', sans-serif !important;
        font-size: 13px !important;
        font-weight: 700 !important;
        text-decoration: none !important;
        transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1) !important;
        box-shadow: 0 2px 8px rgba(105, 39, 92, 0.08) !important;
        white-space: nowrap;
    }
    .kk-btn-portal:hover {
        background: #69275c !important;
        color: #ffffff !important;
        border-color: #69275c !important;
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(105, 39, 92, 0.25) !important;
    }
    .kk-btn-portal i {
        font-size: 14px;
    }

    .kk-btn-appointment {
        display: inline-flex !important;
        align-items: center;
        gap: 9px;
        background: linear-gradient(135deg, #69275c 0%, #8b1d6b 50%, #0284c7 100%) !important;
        background-size: 200% auto !important;
        animation: kkBtnGradientShift 4s ease infinite;
        color: #ffffff !important;
        font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif !important;
        font-size: 14px !important;
        font-weight: 700 !important;
        padding: 10px 22px !important;
        border-radius: 50px !important;
        text-decoration: none !important;
        box-shadow: 0 4px 16px rgba(105, 39, 92, 0.28) !important;
        border: none !important;
        position: relative;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
        white-space: nowrap;
    }

    @keyframes kkBtnGradientShift {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    .kk-btn-appointment:hover {
        transform: translateY(-2px) scale(1.02);
        box-shadow: 0 8px 25px rgba(105, 39, 92, 0.42), 0 0 0 4px rgba(105, 39, 92, 0.15) !important;
        color: #ffffff !important;
    }

    .kk-btn-icon-wrap {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        transition: transform 0.25s ease;
    }

    .kk-btn-appointment:hover .kk-btn-icon-wrap {
        transform: rotate(-10deg) scale(1.15);
    }

    /* -----------------------------------------------------------------
       5. MOBILE SLICKNAV CLEAN LIGHT OVERRIDES
       ----------------------------------------------------------------- */
    .slicknav_menu {
        background: #ffffff !important;
        border-radius: 12px;
        margin-top: 10px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
        border: 1px solid #e2e8f0;
    }

    .slicknav_btn {
        background-color: #69275c !important;
        border-radius: 8px;
    }

    .slicknav_nav a {
        color: #334155 !important;
        font-weight: 600;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .slicknav_nav a:hover,
    .slicknav_nav .active>a {
        background: #fbf5fa !important;
        color: #69275c !important;
    }
</style>