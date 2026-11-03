@yield('nav')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{URL::to('/')}}/img/logo3.png">
    <title>KK PATEL HOSPITAL | Admin Console</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/assets/css/modern-admin.css">

    <style>
        /* Mobile Sidebar & Header Precision */
        @media (max-width: 991.98px) {
            html, body {
                overflow-x: hidden !important;
                max-width: 100vw !important;
            }

            .header {
                padding: 0 12px !important;
                height: 56px !important;
                display: flex !important;
                align-items: center !important;
            }

            .header .header-left {
                width: auto !important;
                min-width: unset !important;
                padding: 0 !important;
                float: none !important;
            }

            .header-center-controls {
                padding-left: 10px !important;
            }

            #toggle_btn {
                width: 36px !important;
                height: 36px !important;
                border-radius: 10px !important;
                background: rgba(255, 255, 255, 0.12) !important;
                display: inline-flex !important;
                align-items: center !important;
                justify-content: center !important;
                color: #ffffff !important;
                text-decoration: none !important;
                font-size: 16px !important;
                cursor: pointer !important;
            }

            #toggle_btn:hover {
                background: rgba(255, 255, 255, 0.25) !important;
            }

            /* Hide any legacy mobile button */
            .mobile_btn, #mobile_btn {
                display: none !important;
                visibility: hidden !important;
                opacity: 0 !important;
                width: 0 !important;
                height: 0 !important;
            }

            .header-icon-btn.dropdown-toggle::after {
                display: none !important;
            }

            /* Responsive Notifications Dropdown */
            .notifications-box {
                z-index: 1060 !important;
            }

            @media (max-width: 575.98px) {
                .header-right-controls {
                    gap: 8px !important;
                }
                .header-icon-btn {
                    width: 34px !important;
                    height: 34px !important;
                    font-size: 14px !important;
                }
                .notifications-box {
                    position: absolute !important;
                    width: min(300px, calc(100vw - 20px)) !important;
                    right: -45px !important;
                    left: auto !important;
                    top: 100% !important;
                    margin-top: 8px !important;
                }
            }
            @media (max-width: 380px) {
                .notifications-box {
                    width: 270px !important;
                    right: -60px !important;
                }
            }

            /* Offcanvas Mobile Sidebar */
            .sidebar {
                position: fixed !important;
                top: 0 !important;
                bottom: 0 !important;
                left: -285px !important;
                width: 275px !important;
                z-index: 1055 !important;
                transition: left 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
                box-shadow: none !important;
            }

            body.slide-nav .sidebar,
            .main-wrapper.slide-nav .sidebar,
            .sidebar.opened {
                left: 0 !important;
                box-shadow: 0 0 50px rgba(0, 0, 0, 0.6) !important;
            }

            .sidebar-close-btn {
                position: absolute;
                top: 14px;
                right: 14px;
                width: 32px;
                height: 32px;
                border-radius: 8px;
                background: rgba(255, 255, 255, 0.12);
                color: #ffffff !important;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 16px;
                text-decoration: none !important;
                z-index: 1060;
                transition: all 0.2s ease;
            }

            .sidebar-close-btn:hover {
                background: rgba(239, 68, 68, 0.9);
                transform: rotate(90deg);
            }

            /* Backdrop Overlay */
            .sidebar-overlay {
                position: fixed !important;
                top: 0 !important;
                left: 0 !important;
                right: 0 !important;
                bottom: 0 !important;
                background: rgba(15, 23, 42, 0.65) !important;
                backdrop-filter: blur(2px) !important;
                z-index: 1050 !important;
                display: none;
                transition: opacity 0.25s ease !important;
            }

            .sidebar-overlay.opened,
            body.slide-nav .sidebar-overlay,
            .main-wrapper.slide-nav .sidebar-overlay {
                display: block !important;
            }

            .page-wrapper {
                margin-left: 0 !important;
                padding-top: 56px !important;
                left: 0 !important;
            }

            .page-wrapper > .content {
                padding: 14px 12px !important;
            }

            /* User Pill on mobile: clean icon with online dot */
            .user-pill-btn {
                padding: 4px !important;
                background: transparent !important;
                border: none !important;
                box-shadow: none !important;
            }
            .user-pill-btn .dropdown-arrow {
                display: none !important;
            }
            .mobile-user-menu {
                display: none !important;
            }

            /* Admin Page Header & Action Wrapping */
            .admin-page-header {
                padding: 16px 18px !important;
                margin-bottom: 18px !important;
            }
            .admin-page-title-wrap h2 {
                font-size: 19px !important;
            }
            .admin-page-title-wrap p {
                font-size: 12px !important;
            }
        }
    </style>

    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>

    <div class="main-wrapper">
        <!-- Top Navigation Header -->
        <div class="header">
            <!-- Left Branding -->
            <div class="header-left">
                <a href="{{ url('/admin/admindashboard') }}" class="logo">
                    <img src="{{URL::to('/')}}/img/logo3.png" width="36" height="36" alt="Logo" style="filter: drop-shadow(0 2px 4px rgba(0,0,0,0.25));">
                    <div class="logo-text-wrap">
                        <span class="logo-title">KK PATEL</span>
                        <span class="logo-sub">HOSPITAL</span>
                    </div>
                </a>
            </div>

            <!-- Center-Left Controls (Sidebar toggler & live badge) -->
            <div class="header-center-controls">
                <a id="toggle_btn" href="javascript:void(0);" title="Toggle Sidebar">
                    <i class="fa fa-bars"></i>
                </a>

                <div class="header-live-badge d-none d-md-inline-flex">
                    <span class="live-pulse-dot"></span>
                    <span>KK Patel Portal &bull; Live System</span>
                </div>
            </div>

            <!-- Right-Hand Header Controls (Strictly pushed to far right via margin-left: auto) -->
            <div class="header-right-controls">
                @php
                    try {
                        $recentAppts = \App\Models\appointment::latest()->take(4)->get();
                        $pendingApptsCount = \App\Models\appointment::where('Status', 'Pending')->orWhereNull('Status')->count();
                        $recentContacts = \App\Models\Contact::latest()->take(3)->get();
                        $unrepliedContactCount = \App\Models\Contact::where('replied', 0)->orWhereNull('replied')->count();
                        $totalBadgeCount = $pendingApptsCount > 0 ? $pendingApptsCount : ($recentAppts->count() > 0 ? $recentAppts->count() : 0);
                        $totalMessageCount = $unrepliedContactCount > 0 ? $unrepliedContactCount : ($recentContacts->count() > 0 ? $recentContacts->count() : 0);
                    } catch (\Exception $e) {
                        $recentAppts = collect();
                        $recentContacts = collect();
                        $totalBadgeCount = 1;
                        $totalMessageCount = 0;
                    }
                @endphp

                <!-- Notifications Dropdown (Workable on Mobile & Desktop) -->
                <div class="dropdown header-dropdown-wrap">
                    <a href="#" class="header-icon-btn dropdown-toggle" data-toggle="dropdown" aria-expanded="false" title="Notifications">
                        <i class="fa fa-bell-o"></i>
                        @if($totalBadgeCount > 0)
                            <span class="badge-count" style="background: #ef4444;">{{ $totalBadgeCount }}</span>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right notifications-box shadow-lg">
                        <div class="notifications-header">
                            <h6><i class="fa fa-bell text-primary m-r-5"></i> Notifications</h6>
                            <span class="badge badge-pill badge-primary" style="font-size: 11px;">{{ $totalBadgeCount }} Active</span>
                        </div>
                        <div class="notifications-body">
                            @forelse ($recentAppts as $appItem)
                                <a href="{{ url('adminappointments') }}" class="noti-item">
                                    <div class="noti-icon bg-blue">
                                        <i class="fa fa-calendar-check-o"></i>
                                    </div>
                                    <div class="noti-text">
                                        <strong>{{ $appItem->appointmentname ?: 'Patient Appointment' }}</strong>
                                        <small>{{ $appItem->departmentname ?: 'OPD Consultation' }} &bull; {{ $appItem->date }}</small>
                                    </div>
                                </a>
                            @empty
                                <div class="p-3 text-center text-muted" style="font-size: 13px;">
                                    <i class="fa fa-check-circle text-success m-r-5"></i> No pending notifications
                                </div>
                            @endforelse

                            @foreach ($recentContacts as $msgItem)
                                <a href="{{ url('admincontact') }}" class="noti-item">
                                    <div class="noti-icon bg-amber">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="noti-text">
                                        <strong>Inquiry: {{ $msgItem->contactname ?: 'Guest' }}</strong>
                                        <small>{{ Str::limit($msgItem->subject ?: $msgItem->message, 30) }}</small>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <div class="notifications-footer text-center py-2" style="background: #f8fafc; border-top: 1px solid #eef2f6;">
                            <a href="{{ url('adminappointments') }}" style="font-size: 12.5px; font-weight: 700; color: #0284c7; text-decoration: none;">View All Appointments &rarr;</a>
                        </div>
                    </div>
                </div>

                <!-- Messages / Contact Inbox Shortcut (Workable on Mobile & Desktop) -->
                <div class="header-dropdown-wrap">
                    <a href="{{ url('admincontact') }}" class="header-icon-btn" title="Patient Inquiries & Messages">
                        <i class="fa fa-comment-o"></i>
                        @if($totalMessageCount > 0)
                            <span class="badge-count" style="background: #0284c7;">{{ $totalMessageCount }}</span>
                        @endif
                    </a>
                </div>

                <!-- Admin Profile Dropdown Capsule -->
                <div class="dropdown header-dropdown-wrap">
                    <a href="#" class="user-pill-btn dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <div class="user-avatar-box">
                            <img class="avatar-circle" src="{{URL::to('/')}}/assets/img/user.jpg" alt="Admin">
                            <span class="online-indicator"></span>
                        </div>
                        <div class="user-meta-text d-none d-md-flex">
                            <span class="admin-name">Administrator</span>
                            <span class="admin-role">Super Admin</span>
                        </div>
                        <i class="fa fa-chevron-down dropdown-arrow"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dropdown-menu">
                        <div class="user-dropdown-header">
                            <img src="{{URL::to('/')}}/assets/img/user.jpg" class="dropdown-avatar" alt="Admin">
                            <div>
                                <strong>Hospital Admin</strong>
                                <small>admin@kkpatelhospital.com</small>
                            </div>
                        </div>
                        <div class="dropdown-divider my-2"></div>
                        <a class="dropdown-item" href="{{ url('admin_profile') }}">
                            <i class="fa fa-user-circle text-primary m-r-10"></i> My Profile
                        </a>
                        <a class="dropdown-item" href="{{ url('admin_change_password') }}">
                            <i class="fa fa-key text-warning m-r-10"></i> Change Password
                        </a>
                        <div class="dropdown-divider my-2"></div>
                        <a class="dropdown-item text-danger" href="{{ url('/logout') }}">
                            <i class="fa fa-sign-out text-danger m-r-10"></i> Sign Out
                        </a>
                    </div>
                </div>

                <!-- Mobile 3-dot dropdown menu -->
                <div class="dropdown mobile-user-menu d-block d-md-none">
                    <a href="#" class="header-icon-btn dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                    <div class="dropdown-menu dropdown-menu-right user-dropdown-menu">
                        <a class="dropdown-item" href="{{ url('admin_profile') }}"><i class="fa fa-user-circle text-primary m-r-5"></i> My Profile</a>
                        <a class="dropdown-item" href="{{ url('admin_change_password') }}"><i class="fa fa-key text-warning m-r-5"></i> Change Password</a>
                        <a class="dropdown-item text-danger" href="{{ url('/logout') }}"><i class="fa fa-sign-out text-danger m-r-5"></i> Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Left Sidebar Navigation -->
        <div class="sidebar" id="sidebar">
            <!-- Mobile Close Button -->
            <a href="javascript:void(0);" id="sidebar_close_btn" class="sidebar-close-btn d-flex d-lg-none" title="Close Sidebar">
                <i class="fa fa-times"></i>
            </a>

            <div class="sidebar-inner slimscroll">
                <!-- Mini Admin Profile Card -->
                <div class="sidebar-user-card">
                    <div class="user-avatar-wrap">
                        <img src="{{URL::to('/')}}/assets/img/user.jpg" alt="Admin Avatar" class="sidebar-user-img">
                        <span class="sidebar-status-dot"></span>
                    </div>
                    <div class="sidebar-user-info">
                        <h6>Administrator</h6>
                        <span class="role-badge"><i class="fa fa-shield"></i> Hospital Admin</span>
                    </div>
                </div>

                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <!-- Main Section -->
                        <li class="menu-title">Main Dashboard</li>
                        <li class="{{ Request::is('admin/admindashboard*') || Request::is('admindashboard*') ? 'active' : '' }}">
                            <a href="{{ url('/admin/admindashboard') }}">
                                <i class="fa fa-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <!-- Hospital Management Section -->
                        <li class="menu-title">Hospital Management</li>

                        <!-- Doctors -->
                        <li class="submenu {{ Request::is('admindoctors*') || Request::is('add_doctor*') || Request::is('edit_doctor*') ? 'active subdrop' : '' }}">
                            <a href="javascript:void(0);">
                                <i class="fa fa-user-md"></i>
                                <span> Doctors </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul style="{{ Request::is('admindoctors*') || Request::is('add_doctor*') || Request::is('edit_doctor*') ? 'display: block;' : 'display: none;' }}">
                                <li><a href="{{ url('admindoctors') }}" class="{{ Request::is('admindoctors*') ? 'active' : '' }}"><i class="fa fa-list m-r-5"></i> Doctors Directory</a></li>
                                <li><a href="{{ url('add_doctor') }}" class="{{ Request::is('add_doctor*') ? 'active' : '' }}"><i class="fa fa-user-plus m-r-5"></i> Add Doctor</a></li>
                                <li><a href="{{ url('/doctor/login') }}" target="_blank"><i class="fa fa-stethoscope m-r-5 text-info"></i> Doctor Portal Login</a></li>
                            </ul>
                        </li>

                        <!-- Departments -->
                        <li class="submenu {{ Request::is('admindepartments*') || Request::is('add_department*') || Request::is('edit_department*') ? 'active subdrop' : '' }}">
                            <a href="javascript:void(0);">
                                <i class="fa fa-hospital-o"></i>
                                <span> Departments </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul style="{{ Request::is('admindepartments*') || Request::is('add_department*') || Request::is('edit_department*') ? 'display: block;' : 'display: none;' }}">
                                <li><a href="{{ url('admindepartments') }}" class="{{ Request::is('admindepartments*') ? 'active' : '' }}"><i class="fa fa-th-large m-r-5"></i> Departments List</a></li>
                                <li><a href="{{ url('add_department') }}" class="{{ Request::is('add_department*') ? 'active' : '' }}"><i class="fa fa-plus-circle m-r-5"></i> Add Department</a></li>
                            </ul>
                        </li>

                        <!-- Appointments -->
                        <li class="submenu {{ Request::is('adminappointments*') || Request::is('add_appointment*') || Request::is('edit_appointment*') ? 'active subdrop' : '' }}">
                            <a href="javascript:void(0);">
                                <i class="fa fa-calendar-check-o"></i>
                                <span> Appointments </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul style="{{ Request::is('adminappointments*') || Request::is('add_appointment*') || Request::is('edit_appointment*') ? 'display: block;' : 'display: none;' }}">
                                <li><a href="{{ url('adminappointments') }}" class="{{ Request::is('adminappointments*') ? 'active' : '' }}"><i class="fa fa-calendar m-r-5"></i> Appointments List</a></li>
                                <li><a href="{{ url('add_appointment') }}" class="{{ Request::is('add_appointment*') ? 'active' : '' }}"><i class="fa fa-calendar-plus-o m-r-5"></i> Add Appointment</a></li>
                            </ul>
                        </li>

                        <!-- Communications Section -->
                        <li class="menu-title">Communications</li>
                        <li class="{{ Request::is('adminfeedback*') ? 'active' : '' }}">
                            <a href="{{ url('adminfeedback') }}">
                                <i class="fa fa-star"></i>
                                <span>Feedback & Review</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('adminpress*') || Request::is('add_press_desk*') || Request::is('edit_press_desk*') ? 'active' : '' }}">
                            <a href="{{ url('adminpress') }}">
                                <i class="fa fa-newspaper-o"></i>
                                <span>Press Desk</span>
                            </a>
                        </li>
                        <li class="submenu {{ Request::is('admincontact*') || Request::is('reply_contact*') ? 'active subdrop' : '' }}">
                            <a href="javascript:void(0);">
                                <i class="fa fa-phone-square"></i>
                                <span> Contact Inquiries </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul style="{{ Request::is('admincontact*') || Request::is('reply_contact*') ? 'display: block;' : 'display: none;' }}">
                                <li><a href="{{ url('admincontact') }}" class="{{ Request::is('admincontact*') ? 'active' : '' }}"><i class="fa fa-envelope-open-o m-r-5"></i> Inbox Messages</a></li>
                            </ul>
                        </li>

                        <!-- System Section -->
                        <li class="menu-title">System & Account</li>
                        <li class="submenu {{ Request::is('admin_profile*') || Request::is('admin_change_password*') ? 'active subdrop' : '' }}">
                            <a href="javascript:void(0);">
                                <i class="fa fa-cog"></i>
                                <span>Settings</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul style="{{ Request::is('admin_profile*') || Request::is('admin_change_password*') ? 'display: block;' : 'display: none;' }}">
                                <li><a href="{{ url('admin_profile') }}" class="{{ Request::is('admin_profile*') ? 'active' : '' }}"><i class="fa fa-user-circle m-r-5"></i> Admin Profile</a></li>
                                <li><a href="{{ url('admin_change_password') }}" class="{{ Request::is('admin_change_password*') ? 'active' : '' }}"><i class="fa fa-key m-r-5"></i> Change Password</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out m-r-5 text-danger"></i> Sign Out</a></li>
                            </ul>
                        </li>
                    </ul>

                    <!-- Emergency Helpline Widget at the bottom of sidebar -->
                    <div class="sidebar-bottom-callout">
                        <div class="callout-icon">
                            <i class="fa fa-ambulance"></i>
                        </div>
                        <div class="callout-info">
                            <small>24/7 Helpline</small>
                            <a href="tel:02832236000">02832 236000</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Universal Multi-Layer Futuristic Medical Background Architecture (Active on ALL Admin Pages) -->
        <div class="admin-global-bg-layers" aria-hidden="true">
            <!-- Layer 1: Animated Morphing 3D Mesh Gradient Blobs -->
            <div class="admin-blob admin-blob-1"></div>
            <div class="admin-blob admin-blob-2"></div>
            <div class="admin-blob admin-blob-3"></div>
            <div class="admin-blob admin-blob-4"></div>

            <!-- Layer 2: Precision Medical Telemetry Dot Matrix Grid -->
            <div class="admin-telemetry-grid"></div>

            <!-- Layer 3: Laser Top Scanline Beam -->
            <div class="admin-laser-scanline"></div>

            <!-- Layer 4: Running Animated ECG Heartbeat Pulse Stream -->
            <div class="admin-ambient-ecg-wrap">
                <svg class="admin-ambient-ecg-svg" viewBox="0 0 1200 60" preserveAspectRatio="none">
                    <path class="admin-ambient-ecg-path" d="M0,30 L160,30 L175,22 L185,38 L195,30 L240,30 L255,8 L270,52 L285,15 L298,36 L308,30 L460,30 L475,22 L485,38 L495,30 L540,30 L555,8 L570,52 L585,15 L598,36 L608,30 L760,30 L775,22 L785,38 L795,30 L840,30 L855,8 L870,52 L885,15 L898,36 L908,30 L1060,30 L1075,22 L1085,38 L1095,30 L1140,30 L1155,8 L1170,52 L1185,15 L1198,36 L1200,30" />
                </svg>
            </div>

            <!-- Layer 5: Ambient Floating Medical Geometric Crosses & Particles -->
            <div class="admin-floating-elements">
                <span class="admin-float-sym sym-1"><i class="fa fa-plus"></i></span>
                <span class="admin-float-sym sym-2"><i class="fa fa-stethoscope"></i></span>
                <span class="admin-float-sym sym-3"><i class="fa fa-heartbeat"></i></span>
                <span class="admin-float-sym sym-4"><i class="fa fa-plus"></i></span>
                <span class="admin-float-sym sym-5"><i class="fa fa-user-md"></i></span>
                <span class="admin-float-sym sym-6"><i class="fa fa-plus"></i></span>
            </div>
        </div>
    </div>

    <!-- Scripts and Slimscroll -->
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="{{URL::to('/')}}/assets/js/jquery-3.2.1.min.js"></script>
    <script src="{{URL::to('/')}}/assets/js/popper.min.js"></script>
    <script src="{{URL::to('/')}}/assets/js/bootstrap.min.js"></script>
    <script src="{{URL::to('/')}}/assets/js/jquery.slimscroll.js"></script>
    <script src="{{URL::to('/')}}/assets/js/Chart.bundle.js"></script>
    <script src="{{URL::to('/')}}/assets/js/chart.js"></script>
    <script src="{{URL::to('/')}}/assets/js/app.js"></script>

    <script>
        $(document).ready(function () {
            // Universal Single Sidebar Toggle Button
            $(document).off('click', '#toggle_btn').on('click', '#toggle_btn', function (e) {
                e.preventDefault();
                e.stopPropagation();

                if ($(window).width() < 992) {
                    // Mobile Viewport: Toggle slide-in drawer
                    var isOpened = $('#sidebar').hasClass('opened');
                    if (isOpened) {
                        $('#sidebar').removeClass('opened');
                        $('.sidebar-overlay').removeClass('opened');
                        $('body').removeClass('slide-nav');
                        $('.main-wrapper').removeClass('slide-nav');
                    } else {
                        $('#sidebar').addClass('opened');
                        $('.sidebar-overlay').addClass('opened');
                        $('body').addClass('slide-nav');
                        $('.main-wrapper').addClass('slide-nav');
                    }
                } else {
                    // Desktop Viewport: Toggle mini-sidebar
                    if ($('body').hasClass('mini-sidebar')) {
                        $('body').removeClass('mini-sidebar');
                        $('.subdrop + ul').slideDown();
                    } else {
                        $('body').addClass('mini-sidebar');
                        $('.subdrop + ul').slideUp();
                    }
                }
            });

            // Close Mobile Sidebar via Overlay or [×] Close Button
            $(document).on('click', '.sidebar-overlay, #sidebar_close_btn', function (e) {
                e.preventDefault();
                $('#sidebar').removeClass('opened');
                $('.sidebar-overlay').removeClass('opened');
                $('body').removeClass('slide-nav');
                $('.main-wrapper').removeClass('slide-nav');
            });

            // Close sidebar when clicking any direct link on mobile
            $('#sidebar-menu a').on('click', function () {
                if ($(window).width() < 992 && !$(this).parent().hasClass('submenu')) {
                    $('#sidebar').removeClass('opened');
                    $('.sidebar-overlay').removeClass('opened');
                    $('body').removeClass('slide-nav');
                    $('.main-wrapper').removeClass('slide-nav');
                }
            });
        });
    </script>

</body>

</html>