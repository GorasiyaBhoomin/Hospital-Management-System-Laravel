<!-- Modern Light Hospital Topbar & Header Navigation with Ultra-Solid Styling & Smooth Sticky Transitions -->


    <!-- 2. Main Navigation Header (100% Solid & Bulletproof Sticky) -->
    <header class="kk-main-header">
        <div class="header-area">
            <div id="sticky-header" class="main-header-area kk-navbar-strip">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Brand Hospital Logo -->
                        <div class="col-xl-3 col-lg-3 col-7 col-sm-6">
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

                        <!-- Appointment Action Button & Mobile Menu Toggle Container -->
                        <div class="col-xl-3 col-lg-3 col-5 col-sm-6">
                            <div class="kk-header-action d-flex align-items-center justify-content-end" style="gap: 8px;">
                                <!-- Desktop Full CTA Button -->
                                <a class="kk-btn-appointment d-none d-lg-inline-flex" href="{{ url('appointment') }}">
                                    <span class="kk-btn-icon-wrap">
                                        <i class="fa fa-calendar-check-o"></i>
                                    </span>
                                    <span class="kk-btn-text">Make an Appointment</span>
                                </a>

                                <!-- Mobile Compact Book Button -->
                                <a class="kk-mobile-book-btn d-inline-flex d-lg-none" href="{{ url('appointment') }}" title="Book Appointment">
                                    <i class="fa fa-calendar-check-o"></i>
                                    <span class="d-none d-sm-inline">Book</span>
                                </a>

                                <!-- Mobile Slicknav Trigger Target -->
                                <div class="mobile_menu d-inline-block d-lg-none"></div>
                            </div>
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
        z-index: 1030 !important;
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
       5. MOBILE RESPONSIVE HEADER & SLICKNAV NAVIGATION (PIXEL-PERFECT)
       ----------------------------------------------------------------- */
    .kk-mobile-book-btn {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: linear-gradient(135deg, #69275c 0%, #00a896 100%);
        color: #ffffff !important;
        font-family: 'Plus Jakarta Sans', sans-serif !important;
        font-size: 12.5px !important;
        font-weight: 700 !important;
        padding: 7px 13px !important;
        border-radius: 50px !important;
        text-decoration: none !important;
        box-shadow: 0 3px 10px rgba(105, 39, 92, 0.22);
        white-space: nowrap;
        transition: all 0.25s ease;
    }
    .kk-mobile-book-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 5px 14px rgba(105, 39, 92, 0.35);
        color: #ffffff !important;
    }

    /* Container for mobile menu target */
    .mobile_menu {
        position: static !important;
        width: auto !important;
        display: inline-flex !important;
        align-items: center !important;
    }

    .slicknav_menu {
        position: static !important;
        background: transparent !important;
        padding: 0 !important;
        margin: 0 !important;
        border: none !important;
        box-shadow: none !important;
    }

    /* Modern Hamburger Button */
    .slicknav_btn {
        position: static !important;
        top: 0 !important;
        right: 0 !important;
        margin: 0 !important;
        float: none !important;
        background: linear-gradient(135deg, #69275c 0%, #8b1d6b 100%) !important;
        border-radius: 10px !important;
        padding: 8px 10px !important;
        cursor: pointer !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        border: none !important;
        box-shadow: 0 2px 8px rgba(105, 39, 92, 0.28) !important;
        transition: all 0.25s ease !important;
        text-decoration: none !important;
    }
    .slicknav_btn:hover {
        background: #69275c !important;
        transform: scale(1.05);
    }
    .slicknav_btn .slicknav_icon {
        margin: 0 !important;
        top: 0 !important;
        right: 0 !important;
        width: 18px !important;
        height: 15px !important;
        display: block !important;
    }
    .slicknav_btn .slicknav_icon-bar {
        background-color: #ffffff !important;
        width: 18px !important;
        height: 2.5px !important;
        margin: 3px 0 !important;
        border-radius: 2px !important;
        display: block !important;
    }

    /* Full Width Dropdown Panel */
    .main-header-area.kk-navbar-strip {
        position: relative !important;
    }

    .slicknav_menu .slicknav_nav {
        position: absolute !important;
        top: 100% !important;
        left: 0 !important;
        right: 0 !important;
        width: 100% !important;
        background: #ffffff !important;
        box-shadow: 0 18px 40px rgba(15, 23, 42, 0.16) !important;
        border-top: 1px solid #eef2f6 !important;
        border-bottom: 3.5px solid #69275c !important;
        border-radius: 0 0 18px 18px !important;
        padding: 12px 18px 20px !important;
        margin: 0 !important;
        z-index: 99999 !important;
        max-height: 80vh !important;
        overflow-y: auto !important;
    }

    /* Mobile Nav Items */
    .slicknav_menu .slicknav_nav > li {
        border-bottom: 1px solid #f1f5f9 !important;
        margin: 0 !important;
        padding: 2px 0 !important;
    }
    .slicknav_menu .slicknav_nav > li:last-child {
        border-bottom: none !important;
    }

    .slicknav_menu .slicknav_nav a,
    .slicknav_menu .slicknav_nav .slicknav_row {
        color: #1e293b !important;
        font-family: 'Plus Jakarta Sans', sans-serif !important;
        font-size: 15px !important;
        font-weight: 700 !important;
        padding: 10px 14px !important;
        border-radius: 8px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        text-decoration: none !important;
        transition: all 0.2s ease !important;
    }

    .slicknav_menu .slicknav_nav a:hover,
    .slicknav_menu .slicknav_nav .slicknav_row:hover {
        background: #fbf5fa !important;
        color: #69275c !important;
    }

    .slicknav_menu .slicknav_nav .slicknav_row a {
        padding: 0 !important;
        margin: 0 !important;
        background: transparent !important;
        color: inherit !important;
    }

    .slicknav_menu .slicknav_arrow {
        float: none !important;
        margin-left: auto !important;
        font-size: 16px !important;
        font-weight: 800 !important;
        color: #69275c !important;
        position: static !important;
        top: auto !important;
        display: inline-block !important;
    }

    /* Submenus (Nested Accordion inside Pages & Contact) */
    .slicknav_nav .kk-dropdown-card,
    .slicknav_menu .slicknav_nav ul {
        position: static !important;
        transform: none !important;
        opacity: 1 !important;
        visibility: visible !important;
        pointer-events: auto !important;
        box-shadow: none !important;
        border: none !important;
        border-left: 3px solid #00a896 !important;
        background: #f8fafc !important;
        border-radius: 8px !important;
        padding: 6px 8px !important;
        margin: 4px 0 8px 12px !important;
        min-width: unset !important;
        width: auto !important;
        display: block !important;
    }

    .slicknav_nav .kk-dropdown-card li {
        border-bottom: 1px solid #edf2f7 !important;
        margin: 0 !important;
        padding: 0 !important;
    }
    .slicknav_nav .kk-dropdown-card li:last-child {
        border-bottom: none !important;
    }

    .slicknav_nav .kk-dropdown-item {
        display: flex !important;
        align-items: center !important;
        gap: 12px !important;
        padding: 8px 10px !important;
        border-radius: 6px !important;
        text-decoration: none !important;
        background: transparent !important;
    }
    .slicknav_nav .kk-dropdown-item:hover {
        background: #ffffff !important;
    }

    .slicknav_nav .kk-drop-icon {
        width: 32px !important;
        height: 32px !important;
        border-radius: 6px !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        flex-shrink: 0 !important;
        font-size: 13px !important;
    }

    .slicknav_nav .kk-drop-text {
        flex: 1 !important;
        line-height: 1.3 !important;
    }

    .slicknav_nav .kk-drop-title {
        font-size: 13px !important;
        font-weight: 700 !important;
        color: #0f172a !important;
        display: block !important;
    }

    .slicknav_nav .kk-drop-subtitle {
        font-size: 11px !important;
        color: #64748b !important;
        display: block !important;
    }

    .slicknav_nav .kk-item-arrow {
        display: none !important;
    }

    @media (max-width: 767px) {
        .kk-hospital-logo {
            max-height: 38px !important;
        }
        .main-header-area {
            padding: 10px 0 !important;
        }
    }
    @media (max-width: 420px) {
        .kk-hospital-logo {
            max-height: 32px !important;
        }
    }
</style>