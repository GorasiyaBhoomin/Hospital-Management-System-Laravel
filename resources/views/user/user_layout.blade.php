<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'Patient Portal | KK Patel Super Speciality Hospital')</title>
    <meta name="description" content="KK Patel Super Speciality Hospital Patient Portal. Manage OPD appointments, view doctors, and track consultations in Bhuj, Kutch.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('/') }}/img/logo3.png">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Website Standard CSS Libraries -->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/nice-select.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/animate.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/slicknav.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/style.css">

    <!-- Authentic Patient Portal Real Website Stylesheet -->
    <style>
        :root {
            --brand-primary: #69275c;
            --brand-primary-light: #fbf5fa;
            --brand-teal: #00a896;
            --brand-teal-light: #e6f7f5;
            --brand-blue: #0284c7;
            --brand-blue-light: #f0f9ff;
            --brand-dark: #0f172a;
            --brand-slate: #334155;
            --brand-muted: #64748b;
            --brand-border: #e2e8f0;
            --brand-card-bg: #ffffff;
            --radius-xl: 18px;
            --radius-lg: 14px;
            --radius-md: 10px;
            --radius-pill: 50px;
            --shadow-subtle: 0 4px 20px -2px rgba(15, 23, 42, 0.05), 0 2px 6px -1px rgba(15, 23, 42, 0.02);
            --shadow-elevated: 0 14px 30px -4px rgba(15, 23, 42, 0.08), 0 4px 12px -2px rgba(15, 23, 42, 0.03);
            --shadow-hover: 0 20px 40px -6px rgba(105, 39, 92, 0.15), 0 6px 14px -2px rgba(15, 23, 42, 0.04);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            color: var(--brand-slate);
            background-color: #f8fafc;
            overflow-x: hidden;
        }

        /* -------------------------------------------------------------
           1. COMPACT HERO SECTION (NO SECOND NAVBAR - SINGLE WEBSITE HERO)
           ------------------------------------------------------------- */
        .portal-hero-section {
            position: relative;
            background: linear-gradient(135deg, #f0f7ff 0%, #ffffff 50%, #fbf5fa 100%);
            border-bottom: 1px solid var(--brand-border);
            padding: 42px 0 38px;
            overflow: hidden;
        }

        .portal-breadcrumb {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            font-weight: 600;
            color: var(--brand-muted);
            margin-bottom: 8px;
        }

        .portal-breadcrumb a {
            color: var(--brand-primary);
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .portal-breadcrumb a:hover {
            color: #8b1d6b;
            text-decoration: underline;
        }

        .portal-breadcrumb .sep {
            color: #cbd5e1;
        }

        .portal-page-title {
            font-size: 30px;
            font-weight: 800;
            color: var(--brand-dark);
            letter-spacing: -0.5px;
            margin: 0 0 6px;
            line-height: 1.25;
        }

        .portal-page-title .text-accent {
            color: var(--brand-primary);
        }

        .portal-page-subtitle {
            font-size: 14.5px;
            color: var(--brand-muted);
            margin: 0;
            line-height: 1.5;
        }

        .portal-hero-action-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, var(--brand-primary) 0%, #8b1d6b 100%);
            color: #ffffff !important;
            padding: 10px 22px;
            border-radius: var(--radius-pill);
            font-size: 13.5px;
            font-weight: 700;
            text-decoration: none !important;
            box-shadow: 0 4px 14px rgba(105, 39, 92, 0.25);
            transition: all 0.25s ease;
            border: none;
        }

        .portal-hero-action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(105, 39, 92, 0.35);
            color: #ffffff !important;
        }

        /* -------------------------------------------------------------
           2. SITE CARDS & CONTENT ELEMENTS
           ------------------------------------------------------------- */
        .site-card {
            background: #ffffff;
            border: 1px solid var(--brand-border);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-subtle);
            overflow: hidden;
            margin-bottom: 24px;
            transition: all 0.25s ease;
        }

        .site-card:hover {
            box-shadow: var(--shadow-elevated);
        }

        .site-card-header {
            padding: 18px 24px;
            background: #ffffff;
            border-bottom: 1px solid #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }

        .site-card-title {
            font-size: 17.5px;
            font-weight: 800;
            color: var(--brand-dark);
            margin: 0;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .site-card-title .card-icon {
            width: 32px;
            height: 32px;
            border-radius: 9px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }

        .site-card-body {
            padding: 24px;
        }

        /* Clean Alert Styling */
        .portal-alert {
            border-radius: var(--radius-md);
            padding: 14px 18px;
            font-size: 13.5px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            border-left-width: 4px;
        }

        .portal-alert-success {
            background: #ecfdf5;
            color: #065f46;
            border-left-color: #10b981;
            border-top: 1px solid #d1fae5;
            border-right: 1px solid #d1fae5;
            border-bottom: 1px solid #d1fae5;
        }

        .portal-alert-danger {
            background: #fef2f2;
            color: #991b1b;
            border-left-color: #ef4444;
            border-top: 1px solid #fee2e2;
            border-right: 1px solid #fee2e2;
            border-bottom: 1px solid #fee2e2;
        }

        /* Global Button and Control Protections (Immune to external global CSS) */
        button, .btn {
            width: auto !important;
            height: auto !important;
            text-transform: none !important;
        }

        .btn-portal-primary {
            background: linear-gradient(135deg, var(--brand-primary) 0%, #8b1d6b 100%) !important;
            color: #ffffff !important;
            border: none !important;
            padding: 9px 20px !important;
            border-radius: var(--radius-pill) !important;
            font-size: 13.5px !important;
            font-weight: 700 !important;
            box-shadow: 0 4px 12px rgba(105, 39, 92, 0.22) !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 7px !important;
            cursor: pointer !important;
            transition: all 0.2s ease !important;
        }

        .btn-portal-primary:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 6px 18px rgba(105, 39, 92, 0.32) !important;
            color: #ffffff !important;
        }

        /* Mobile Viewport Tweaks */
        @media (max-width: 991px) {
            .patient-sidebar-card {
                position: relative;
                top: 0;
                margin-bottom: 24px;
            }
            .portal-page-title {
                font-size: 24px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    <!-- Dedicated Patient Portal Header Navigation (view/user/header.blade.php) -->
    @include('user.header')

    <!-- Single Authentic Website Hero Banner -->
    <section class="portal-hero-section">
        @include('partials.hero_background')

        <div class="container position-relative" style="z-index: 2;">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-7">
                    <!-- Clean Breadcrumbs -->
                    <div class="portal-breadcrumb">
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                        <span class="sep">&rsaquo;</span>
                        <a href="{{ url('/user/dashboard') }}">Patient Portal</a>
                        <span class="sep">&rsaquo;</span>
                        <span class="text-dark">@yield('page_title', 'Dashboard')</span>
                    </div>

                    <!-- Page Main Title -->
                    <h1 class="portal-page-title">
                        @yield('hero_title', 'Patient Command Dashboard')
                    </h1>

                    <!-- Page Subtitle -->
                    <p class="portal-page-subtitle">
                        @yield('hero_subtitle', 'Manage doctor consultations, track OPD token slips, and view clinical history.')
                    </p>
                </div>

                <div class="col-lg-4 col-md-5 text-md-right mt-3 mt-md-0">
                    @hasSection('hero_action')
                        @yield('hero_action')
                    @else
                        <div class="d-inline-flex flex-column align-items-md-end">
                            <span class="badge badge-pill mb-1" style="background: #ffffff; color: #69275c; border: 1.5px solid #ebdbe8; font-size: 12.5px; font-weight: 700; padding: 7px 16px; box-shadow: 0 2px 8px rgba(105, 39, 92, 0.08);">
                                <i class="fa fa-id-card-o text-primary"></i> UHID: #PAT-{{ str_pad(Auth::id(), 5, '0', STR_PAD_LEFT) }}
                            </span>
                            <small class="text-muted font-weight-bold" style="font-size: 11.5px;">
                                <span style="display: inline-block; width: 7px; height: 7px; border-radius: 50%; background: #10b981; margin-right: 4px;"></span> Verified Patient Profile
                            </small>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Main Body: 2-Column Authentic Portal Website Layout -->
    <main class="portal-body-wrapper py-4">
        <div class="container">
            <!-- Flash Session Alerts -->
            @if(session('success'))
                <div class="portal-alert portal-alert-success alert-dismissible fade show" role="alert">
                    <i class="fa fa-check-circle" style="font-size: 16px;"></i>
                    <div class="flex-grow-1">{{ session('success') }}</div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="background: none; border: none; font-size: 18px; line-height: 1; color: #065f46; opacity: 0.7; cursor: pointer;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div class="portal-alert portal-alert-danger alert-dismissible fade show" role="alert">
                    <i class="fa fa-exclamation-circle" style="font-size: 16px;"></i>
                    <div class="flex-grow-1">{{ session('error') }}</div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="background: none; border: none; font-size: 18px; line-height: 1; color: #991b1b; opacity: 0.7; cursor: pointer;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Main Portal Page Content (Clean Full-Width Layout) -->
            @yield('content')
        </div>
    </main>

    <!-- Dedicated Patient Portal Footer (view/user/footer.blade.php) -->
    @include('user.footer')

    <!-- JavaScript Core Libraries -->
    <script src="{{ URL::to('/') }}/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{ URL::to('/') }}/js/popper.min.js"></script>
    <script src="{{ URL::to('/') }}/js/bootstrap.min.js"></script>
    <script src="{{ URL::to('/') }}/js/owl.carousel.min.js"></script>
    <script src="{{ URL::to('/') }}/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{ URL::to('/') }}/js/wow.min.js"></script>
    <script src="{{ URL::to('/') }}/js/jquery.slicknav.min.js"></script>
    <script src="{{ URL::to('/') }}/js/main.js"></script>

    @stack('scripts')
</body>

</html>
