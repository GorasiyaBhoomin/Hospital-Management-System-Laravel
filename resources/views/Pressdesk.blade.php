<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Press Desk & Media Coverage | KK Patel Hospital</title>
    <meta name="description" content="Read recent news releases, media reports, and healthcare milestones from KK Patel Super Speciality Hospital, Bhuj.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('/') }}/img/logo3.png">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS here -->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/nice-select.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/flaticon.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/gijgo.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/animate.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/slicknav.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/style.css">

    <!-- Modern Press Desk Styles & Animations -->
    <style>
        :root {
            --brand-primary: #69275c;
            --brand-primary-light: #fbf5fa;
            --brand-teal: #00a896;
            --brand-teal-light: #e6f7f5;
            --brand-blue: #0284c7;
            --brand-dark: #0f172a;
            --brand-gray: #475569;
            --brand-border: #e2e8f0;
            --radius-lg: 20px;
            --radius-md: 14px;
            --radius-sm: 8px;
            --shadow-card: 0 10px 30px -4px rgba(15, 23, 42, 0.08), 0 4px 10px -2px rgba(15, 23, 42, 0.03);
            --shadow-hover: 0 25px 50px -12px rgba(105, 39, 92, 0.22), 0 8px 20px -4px rgba(15, 23, 42, 0.06);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            color: #334155;
            background-color: #f8fafc;
            overflow-x: hidden;
        }

        /* -------------------------------------------------------------
           1. HERO SECTION WITH AMBIENT GLOWS (BRIGHT LIGHT THEME)
           ------------------------------------------------------------- */
        .press-hero-section {
            position: relative;
            background: linear-gradient(135deg, #f0f7ff 0%, #ffffff 50%, #fbf5fa 100%);
            padding: 85px 0 105px;
            overflow: hidden;
            color: #0f172a;
            border-bottom: 1px solid #e2e8f0;
        }

        .hero-glow-orb {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            filter: blur(85px);
            z-index: 0;
            opacity: 0.4;
            animation: heroGlowPulse 9s ease-in-out infinite alternate;
        }

        .hero-glow-1 {
            top: -60px;
            left: -40px;
            width: 480px;
            height: 480px;
            background: radial-gradient(circle, rgba(105, 39, 92, 0.25) 0%, rgba(105, 39, 92, 0) 70%);
        }

        .hero-glow-2 {
            bottom: -80px;
            right: -60px;
            width: 520px;
            height: 520px;
            background: radial-gradient(circle, rgba(2, 132, 199, 0.2) 0%, rgba(2, 132, 199, 0) 70%);
            animation-delay: -4.5s;
        }

        @keyframes heroGlowPulse {
            0% { transform: scale(1) translate(0, 0); opacity: 0.3; }
            50% { transform: scale(1.15) translate(25px, -15px); opacity: 0.6; }
            100% { transform: scale(1) translate(0, 0); opacity: 0.3; }
        }

        .hero-grid-pattern {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: 
                linear-gradient(rgba(105, 39, 92, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(105, 39, 92, 0.04) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
            opacity: 0.6;
        }

        .press-hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 820px;
            margin: 0 auto;
        }

        .press-hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.05);
            padding: 6px 18px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 700;
            color: #69275c;
            margin-bottom: 20px;
            letter-spacing: 0.3px;
            animation: fadeInDown 0.6s ease-out;
        }

        .pulse-live-ring {
            width: 8px;
            height: 8px;
            background: #10b981;
            border-radius: 50%;
            box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.8);
            animation: pulseRingAnim 1.8s infinite;
        }

        @keyframes pulseRingAnim {
            0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.8); }
            70% { box-shadow: 0 0 0 8px rgba(16, 185, 129, 0); }
            100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
        }

        .press-hero-title {
            font-size: 46px;
            font-weight: 800;
            line-height: 1.2;
            letter-spacing: -0.6px;
            color: #0f172a;
            margin-bottom: 16px;
            animation: fadeInUp 0.7s ease-out;
        }

        .press-hero-title .text-gradient {
            background: linear-gradient(135deg, #69275c 0%, #0284c7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .press-hero-desc {
            font-size: 16.5px;
            color: #475569;
            line-height: 1.6;
            margin-bottom: 24px;
            animation: fadeInUp 0.8s ease-out;
        }

        /* -------------------------------------------------------------
           2. PRESS RELEASES GRID
           ------------------------------------------------------------- */
        .press-grid-section {
            padding: 70px 0 90px;
        }

        .modern-press-card {
            background: #ffffff;
            border-radius: var(--radius-lg);
            border: 1px solid rgba(226, 232, 240, 0.9);
            box-shadow: var(--shadow-card);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 100%;
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            animation: cardEntrance 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes cardEntrance {
            0% { opacity: 0; transform: translateY(28px) scale(0.98); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }

        .modern-press-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-hover);
            border-color: rgba(105, 39, 92, 0.35);
        }

        .press-img-box {
            position: relative;
            height: 220px;
            overflow: hidden;
            background: #f1f5f9;
        }

        .press-img-main {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .modern-press-card:hover .press-img-main {
            transform: scale(1.08);
        }

        .press-tag-overlay {
            position: absolute;
            top: 14px;
            left: 14px;
            background: rgba(105, 39, 92, 0.85);
            backdrop-filter: blur(8px);
            color: #ffffff;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .press-card-body {
            padding: 24px 22px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .press-date-line {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            font-weight: 600;
            color: #94a3b8;
            margin-bottom: 10px;
        }

        .press-desc-text {
            font-size: 15px;
            font-weight: 700;
            color: #0f172a;
            line-height: 1.5;
            margin-bottom: 16px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .press-card-footer {
            padding-top: 14px;
            border-top: 1px solid #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .press-media-btn {
            font-size: 12.5px;
            font-weight: 700;
            color: #69275c;
            text-decoration: none !important;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: rgba(105, 39, 92, 0.08);
            padding: 6px 14px;
            border-radius: 50px;
            transition: all 0.2s ease;
        }

        .press-media-btn:hover {
            background: #69275c;
            color: #ffffff !important;
        }

        /* -------------------------------------------------------------
           3. EMERGENCY & APPOINTMENT CALLOUT
           ------------------------------------------------------------- */
        .emergency-banner-box {
            border-radius: var(--radius-lg);
            padding: 38px 40px;
            color: #ffffff;
            position: relative;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0 15px 35px rgba(15, 23, 42, 0.12);
            transition: all 0.3s ease;
        }

        .emergency-box-1 {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 60%, #b91c1c 100%);
        }

        .emergency-box-2 {
            background: linear-gradient(135deg, #69275c 0%, #831843 60%, #00a896 100%);
        }

        .btn-emergency-action {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #ffffff;
            color: #0f172a !important;
            padding: 12px 24px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 14px;
            text-decoration: none !important;
            width: fit-content;
            transition: all 0.25s ease;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 991px) {
            .press-hero-title { font-size: 34px; }
            .emergency-banner-box { margin-bottom: 24px; }
        }
    </style>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader" id="preloader">
        <div class="spinner">
            <img src="{{ URL::to('/') }}/img/logo3.png" alt="Loading...">
        </div>
    </div>

    <!-- Header Navigation Start -->
    @include('partials.header', ['active' => 'pressdesk'])
    <!-- Header Navigation End -->

    <div class="loaded" id="content">

        <!-- 1. Hero Showcase Section -->
        <section class="press-hero-section hero-animated-bg">
            @include('partials.hero_background')

            <div class="container">
                <div class="press-hero-content">
                    <div class="press-hero-badge">
                        <span class="pulse-live-ring"></span>
                        <span>Official Media Desk &bull; KK Patel Hospital</span>
                    </div>
                    <h1 class="press-hero-title">
                        Hospital News & <br>
                        <span class="text-gradient">Press Coverage</span>
                    </h1>
                    <p class="press-hero-desc">
                        Explore our latest medical breakthroughs, press bulletins, and official public updates covering clinical achievements at KK Patel Super Speciality Hospital.
                    </p>
                </div>
            </div>
        </section>

        <!-- 2. Press Releases Grid Section -->
        <section class="press-grid-section">
            <div class="container">
                <div class="row">
                    @foreach($pressData as $press)
                        @php
                            $pressImg = $press->pressimage ? asset($press->pressimage) : URL::to('/img/about/1.png');
                        @endphp
                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="modern-press-card">
                                <div class="press-img-box">
                                    <img src="{{ $pressImg }}" alt="Press release" class="press-img-main" onerror="this.src='{{ URL::to('/') }}/img/about/1.png'">
                                    <span class="press-tag-overlay">Press Release</span>
                                </div>
                                <div class="press-card-body">
                                    <div>
                                        <div class="press-date-line">
                                            <i class="fa fa-newspaper-o text-primary"></i> KK Patel Media Bureau &bull; Bhuj
                                        </div>
                                        <h4 class="press-desc-text">
                                            {{ $press->description }}
                                        </h4>
                                    </div>
                                    <div class="press-card-footer">
                                        <a href="{{ $pressImg }}" target="_blank" class="press-media-btn">
                                            <i class="fa fa-external-link"></i> View Full Clip
                                        </a>
                                        <span style="font-size: 11.5px; color: #94a3b8; font-weight: 600;">
                                            Official Release
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- 3. Emergency & Appointment Callout -->
        @include('partials.emergency_banner')

    </div>

    <!-- Footer Start -->
    @include('partials.footer')
    <!-- Footer End -->

    <!-- Core Scripts -->
    <script src="{{ URL::to('/') }}/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{ URL::to('/') }}/js/popper.min.js"></script>
    <script src="{{ URL::to('/') }}/js/bootstrap.min.js"></script>
    <script src="{{ URL::to('/') }}/js/owl.carousel.min.js"></script>
    <script src="{{ URL::to('/') }}/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{ URL::to('/') }}/js/wow.min.js"></script>
    <script src="{{ URL::to('/') }}/js/jquery.slicknav.min.js"></script>
    <script src="{{ URL::to('/') }}/js/main.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var preloader = document.getElementById("preloader");
            var content = document.getElementById("content");
            if (preloader) {
                setTimeout(function () {
                    preloader.style.opacity = '0';
                    setTimeout(function() {
                        preloader.style.display = 'none';
                        if (content) content.style.display = 'block';
                    }, 300);
                }, 400);
            }
        });
    </script>
</body>

</html>
