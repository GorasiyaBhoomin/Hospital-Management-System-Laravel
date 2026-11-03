<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Book An Appointment | KK Patel Hospital</title>
    <meta name="description" content="Book an appointment online with specialist doctors at KK Patel Hospital.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="img/logo3.png">

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

    <!-- Modern Appointment Page Custom Styles & Animations -->
    <style>
        /* -------------------------------------------------------------
           1. MODERN HERO SECTION WITH ANIMATED BACKGROUND (BRIGHT LIGHT THEME)
           ------------------------------------------------------------- */
        .appointment-hero-section {
            position: relative;
            padding: 85px 0 100px;
            overflow: hidden;
            color: #0f172a;
            border-bottom: 1px solid #e2e8f0;
        }

        .appointment-hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 820px;
            margin: 0 auto;
        }

        .appointment-hero-badge {
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

        .appointment-hero-title {
            font-size: 46px;
            font-weight: 800;
            line-height: 1.2;
            letter-spacing: -0.6px;
            color: #0f172a;
            margin-bottom: 16px;
        }

        .appointment-hero-title .text-gradient {
            background: linear-gradient(135deg, #69275c 0%, #0284c7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .appointment-hero-desc {
            font-size: 16.5px;
            color: #475569;
            line-height: 1.6;
            margin-bottom: 24px;
        }

        @media (max-width: 991px) {
            .appointment-hero-title { font-size: 34px; }
        }

        .appointment-section {
            position: relative;
            padding: 60px 0 90px;
            background: #f7f9fc;
            overflow: hidden;
        }

        /* Ambient Glowing Background Orbs */
        .ambient-glow {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            filter: blur(90px);
            z-index: 0;
            opacity: 0.6;
            animation: pulseGlow 10s ease-in-out infinite alternate;
        }

        .ambient-glow-1 {
            top: -60px;
            left: -60px;
            width: 480px;
            height: 480px;
            background: radial-gradient(circle, rgba(105, 39, 92, 0.18) 0%, rgba(105, 39, 92, 0) 70%);
        }

        .ambient-glow-2 {
            bottom: -60px;
            right: -60px;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(0, 168, 150, 0.15) 0%, rgba(0, 168, 150, 0) 70%);
            animation-delay: -5s;
        }

        @keyframes pulseGlow {
            0% { transform: scale(1) translate(0, 0); opacity: 0.5; }
            50% { transform: scale(1.12) translate(25px, -15px); opacity: 0.75; }
            100% { transform: scale(1) translate(0, 0); opacity: 0.5; }
        }

        /* Modern Elevated Glassmorphic Card */
        .appointment-card {
            position: relative;
            z-index: 2;
            background: #ffffff;
            border-radius: 22px;
            box-shadow: 0 20px 60px -15px rgba(20, 24, 48, 0.12), 0 0 1px 1px rgba(0, 0, 0, 0.04);
            border: 1px solid rgba(226, 232, 240, 0.9);
            overflow: hidden;
            animation: cardEntrance 0.75s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes cardEntrance {
            0% {
                opacity: 0;
                transform: translateY(30px) scale(0.99);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Top Animated Gradient Accent Bar */
        .appointment-card-accent {
            height: 5px;
            width: 100%;
            background: linear-gradient(90deg, #69275c 0%, #a2388c 30%, #00a896 70%, #69275c 100%);
            background-size: 200% 100%;
            animation: accentSlide 6s linear infinite;
        }

        @keyframes accentSlide {
            0% { background-position: 0% 50%; }
            100% { background-position: 200% 50%; }
        }

        .appointment-grid {
            display: flex;
            flex-wrap: wrap;
        }

        /* Left Side: Form Column */
        .appointment-form-col {
            flex: 0 0 58%;
            max-width: 58%;
            padding: 42px 45px 45px;
            background: #ffffff;
        }

        /* Right Side: Hospital Visual Showcase */
        .appointment-sidebar-col {
            flex: 0 0 42%;
            max-width: 42%;
            background: linear-gradient(180deg, #fdf8fb 0%, #f4f7fc 100%);
            border-left: 1px solid #edf2f7;
            padding: 40px 32px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* Pill Badge */
        .appointment-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(105, 39, 92, 0.08);
            color: #69275c;
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 12px;
            border: 1px solid rgba(105, 39, 92, 0.15);
        }

        .pulse-dot {
            width: 8px;
            height: 8px;
            background: #00a896;
            border-radius: 50%;
            box-shadow: 0 0 0 0 rgba(0, 168, 150, 0.7);
            animation: pulseDotAnim 1.8s infinite;
        }

        @keyframes pulseDotAnim {
            0% { box-shadow: 0 0 0 0 rgba(0, 168, 150, 0.7); }
            70% { box-shadow: 0 0 0 8px rgba(0, 168, 150, 0); }
            100% { box-shadow: 0 0 0 0 rgba(0, 168, 150, 0); }
        }

        .appointment-heading {
            font-size: 28px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 8px;
            letter-spacing: -0.3px;
        }

        .appointment-desc {
            font-size: 14px;
            color: #64748b;
            margin-bottom: 26px;
            line-height: 1.5;
        }

        /* Modern Alert Notifications */
        .custom-alert {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 22px;
            animation: alertSlideDown 0.4s ease-out;
        }

        @keyframes alertSlideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .alert-success-box {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
        }

        .alert-success-box .alert-icon {
            font-size: 20px;
            color: #16a34a;
            line-height: 1;
        }

        .alert-error-box {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
        }

        .alert-error-box .alert-icon {
            font-size: 20px;
            color: #dc2626;
            line-height: 1;
        }

        .alert-text-wrap strong {
            display: block;
            font-size: 13.5px;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .alert-text-wrap p {
            margin: 0;
            font-size: 13px;
            color: inherit;
        }

        /* Responsive Form Fields Grid */
        .form-grid-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            column-gap: 18px;
            row-gap: 16px;
        }

        .form-group-item {
            position: relative;
        }

        .form-group-full {
            grid-column: 1 / -1;
        }

        .field-label {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 6px;
        }

        .field-label i {
            color: #69275c;
            font-size: 13px;
        }

        .field-label .req {
            color: #e11d48;
        }

        /* Input Controls */
        .input-control-box {
            position: relative;
            display: flex;
            align-items: center;
        }

        .modern-field {
            width: 100%;
            height: 48px;
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px !important;
            padding: 10px 16px;
            font-size: 14px;
            color: #1e293b;
            outline: none !important;
            box-shadow: none;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            font-family: inherit;
            box-sizing: border-box;
        }

        .modern-field::placeholder {
            color: #94a3b8;
            font-size: 13.5px;
        }

        .modern-field:hover {
            background: #ffffff;
            border-color: #cbd5e1;
        }

        .modern-field:focus {
            background: #ffffff;
            border-color: #69275c !important;
            box-shadow: 0 0 0 4px rgba(105, 39, 92, 0.12) !important;
            transform: translateY(-1px);
        }

        .modern-field.is-invalid-field {
            border-color: #ef4444 !important;
            background: #fffafa;
        }

        /* Custom Dropdown Arrow */
        .select-picker-box {
            position: relative;
        }

        .select-picker-box::after {
            content: "\f107";
            font-family: "FontAwesome";
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #69275c;
            font-size: 15px;
            pointer-events: none;
            transition: transform 0.2s ease;
        }

        .select-picker-box:hover::after {
            transform: translateY(-50%) translateY(2px);
        }

        .modern-select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            padding-right: 38px;
            cursor: pointer;
        }

        .modern-textarea {
            height: auto;
            min-height: 82px;
            resize: vertical;
            padding: 12px 16px;
            line-height: 1.5;
        }

        /* Validation Error Feedback */
        .validation-error-msg {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 12px;
            color: #ef4444;
            margin-top: 5px;
            font-weight: 500;
            animation: shakeError 0.4s ease;
        }

        @keyframes shakeError {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-4px); }
            75% { transform: translateX(4px); }
        }

        /* Interactive Animated Submit Button */
        .submit-btn-wrap {
            margin-top: 8px;
        }

        .btn-modern-book {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            width: 100%;
            height: 52px;
            background: linear-gradient(135deg, #69275c 0%, #8c2e7b 100%);
            color: #ffffff !important;
            font-size: 15px;
            font-weight: 600;
            letter-spacing: 0.3px;
            border: none;
            border-radius: 12px !important;
            cursor: pointer;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 10px 25px -5px rgba(105, 39, 92, 0.38);
        }

        .btn-modern-book::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 60%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.28), transparent);
            transform: skewX(-20deg);
            animation: btnShine 4s infinite;
        }

        @keyframes btnShine {
            0% { left: -100%; }
            35%, 100% { left: 200%; }
        }

        .btn-modern-book:hover {
            background: linear-gradient(135deg, #581d4d 0%, #7b226a 100%);
            transform: translateY(-2px);
            box-shadow: 0 15px 30px -5px rgba(105, 39, 92, 0.5);
        }

        .btn-modern-book:active {
            transform: translateY(0);
        }

        .btn-modern-book .plane-icon {
            font-size: 16px;
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .btn-modern-book:hover .plane-icon {
            transform: translateX(6px) translateY(-3px) rotate(14deg);
        }

        /* Sidebar Showcase Visual */
        .sidebar-img-wrapper {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 12px 30px -10px rgba(0, 0, 0, 0.15);
            margin-bottom: 22px;
        }

        .sidebar-cover-img {
            width: 100%;
            height: 230px;
            object-fit: cover;
            display: block;
            transition: transform 0.6s ease;
        }

        .sidebar-img-wrapper:hover .sidebar-cover-img {
            transform: scale(1.05);
        }

        .sidebar-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(105, 39, 92, 0.1) 0%, rgba(20, 20, 40, 0.6) 100%);
        }

        /* Floating Badges */
        .float-badge {
            position: absolute;
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
            padding: 8px 12px;
            border-radius: 12px;
            box-shadow: 0 10px 22px rgba(0, 0, 0, 0.14);
            border: 1px solid rgba(255, 255, 255, 0.85);
            z-index: 3;
        }

        .badge-pos-top {
            top: 14px;
            left: 14px;
            animation: floatMove1 4.5s ease-in-out infinite alternate;
        }

        .badge-pos-bottom {
            bottom: 14px;
            right: 14px;
            animation: floatMove2 5s ease-in-out infinite alternate;
        }

        @keyframes floatMove1 {
            0% { transform: translateY(0px); }
            100% { transform: translateY(-7px); }
        }

        @keyframes floatMove2 {
            0% { transform: translateY(0px); }
            100% { transform: translateY(7px); }
        }

        .badge-icon-sq {
            width: 34px;
            height: 34px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            color: #fff;
            flex-shrink: 0;
        }

        .bg-gradient-purple {
            background: linear-gradient(135deg, #69275c, #9c3b88);
        }

        .bg-gradient-teal {
            background: linear-gradient(135deg, #00a896, #028090);
        }

        .badge-info-txt .primary-txt {
            font-size: 12px;
            font-weight: 700;
            color: #1e293b;
            line-height: 1.2;
        }

        .badge-info-txt .sub-txt {
            font-size: 10.5px;
            color: #64748b;
            line-height: 1.2;
        }

        /* Hospital Quality Highlights */
        .sidebar-perks {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 22px;
        }

        .perk-row {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            background: #ffffff;
            padding: 12px 14px;
            border-radius: 12px;
            border: 1px solid #edf2f7;
            transition: all 0.25s ease;
        }

        .perk-row:hover {
            transform: translateX(4px);
            border-color: #e2e8f0;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.04);
        }

        .perk-icon-wrap {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            flex-shrink: 0;
        }

        .perk-icon-1 {
            background: rgba(105, 39, 92, 0.08);
            color: #69275c;
        }

        .perk-icon-2 {
            background: rgba(0, 168, 150, 0.1);
            color: #00a896;
        }

        .perk-icon-3 {
            background: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
        }

        .perk-content h6 {
            font-size: 13px;
            font-weight: 700;
            color: #1e293b;
            margin: 0 0 2px;
        }

        .perk-content p {
            font-size: 11.5px;
            color: #64748b;
            margin: 0;
            line-height: 1.35;
        }

        /* Emergency Call Box */
        .emergency-call-card {
            display: flex;
            align-items: center;
            gap: 14px;
            background: linear-gradient(135deg, #ffffff 0%, #fdf5fc 100%);
            border: 1.5px dashed rgba(105, 39, 92, 0.3);
            padding: 12px 16px;
            border-radius: 14px;
            transition: border-color 0.2s;
        }

        .emergency-call-card:hover {
            border-color: #69275c;
        }

        .phone-pulse-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #69275c;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            flex-shrink: 0;
            box-shadow: 0 0 0 0 rgba(105, 39, 92, 0.4);
            animation: phoneRinging 2.5s infinite;
        }

        @keyframes phoneRinging {
            0% {
                box-shadow: 0 0 0 0 rgba(105, 39, 92, 0.4);
                transform: rotate(0);
            }
            10% { transform: rotate(14deg); }
            20% { transform: rotate(-14deg); }
            30% { transform: rotate(10deg); }
            40% { transform: rotate(-10deg); }
            50% {
                transform: rotate(0);
                box-shadow: 0 0 0 12px rgba(105, 39, 92, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(105, 39, 92, 0);
                transform: rotate(0);
            }
        }

        .emergency-meta span {
            display: block;
            font-size: 11px;
            color: #64748b;
            font-weight: 500;
        }

        .emergency-meta a {
            font-size: 16px;
            font-weight: 700;
            color: #69275c;
            text-decoration: none;
            transition: color 0.2s;
        }

        .emergency-meta a:hover {
            color: #8c2e7b;
            text-decoration: underline;
        }

        /* Responsive Breakpoints */
        @media (max-width: 991px) {
            .appointment-form-col {
                flex: 0 0 100%;
                max-width: 100%;
                padding: 32px 24px;
            }
            .appointment-sidebar-col {
                flex: 0 0 100%;
                max-width: 100%;
                border-left: none;
                border-top: 1px solid #edf2f7;
                padding: 32px 24px;
            }
        }

        @media (max-width: 640px) {
            .form-grid-layout {
                grid-template-columns: 1fr;
            }
            .appointment-heading {
                font-size: 23px;
            }
            .appointment-section {
                padding: 40px 0 60px;
            }
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    const targetId = this.getAttribute('href').substring(1);
                    if (!targetId) return;
                    const targetElement = document.getElementById(targetId);

                    if (targetElement) {
                        e.preventDefault();
                        window.scrollTo({
                            top: targetElement.offsetTop - 90,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>
</head>

<body>

    <!-- header-start -->
    @include('partials.header', ['active' => 'appointment'])
    <!-- header-end -->

    <!-- 1. Hero Showcase Section with Background Animation -->
    <section class="appointment-hero-section hero-animated-bg">
        @include('partials.hero_background')

        <div class="container">
            <div class="appointment-hero-content">
                <div class="appointment-hero-badge">
                    <span class="pulse-live-ring"></span>
                    <span>Instant Online OPD & Consultation Booking &bull; 24/7 Available</span>
                </div>
                <h1 class="appointment-hero-title">
                    Book An Appointment With <br>
                    <span class="text-gradient">Specialist Doctors</span>
                </h1>
                <p class="appointment-hero-desc">
                    Skip waiting queues. Schedule your consultation with board-certified super specialists, check doctor OPD timings, and receive instant confirmation.
                </p>
            </div>
        </div>
    </section>

    <!-- Appointment Section Start -->
    <section class="appointment-section">
        <!-- Ambient Glowing Orbs -->
        <div class="ambient-glow ambient-glow-1"></div>
        <div class="ambient-glow ambient-glow-2"></div>

        <div class="container">
            <div class="appointment-card">
                <!-- Top Color Accent Slider -->
                <div class="appointment-card-accent"></div>

                <div class="appointment-grid">
                    <!-- Left Column: Form -->
                    <div class="appointment-form-col">
                        <div class="appointment-badge">
                            <span class="pulse-dot"></span>
                            <span>Quick & Confidential Consultation</span>
                        </div>

                        <h2 class="appointment-heading">Schedule Your Appointment</h2>
                        <p class="appointment-desc">Select your medical department, choose a specialist, and book your visit in seconds.</p>

                        <!-- Success Alert -->
                        @if (session('success'))
                            <div class="custom-alert alert-success-box">
                                <div class="alert-icon"><i class="fa fa-check-circle"></i></div>
                                <div class="alert-text-wrap">
                                    <strong>Appointment Confirmed!</strong>
                                    <p>{{ session('success') }}</p>
                                </div>
                            </div>
                        @endif

                        <!-- Error Alert -->
                        @if (session('error'))
                            <div class="custom-alert alert-error-box">
                                <div class="alert-icon"><i class="fa fa-exclamation-circle"></i></div>
                                <div class="alert-text-wrap">
                                    <strong>Notice:</strong>
                                    <p>{{ session('error') }}</p>
                                </div>
                            </div>
                        @endif

                        @guest
                            <!-- Patient Login Required Banner -->
                            <div class="alert mb-4 d-flex align-items-center justify-content-between flex-wrap gap-2" style="background: #fdf2f8; border: 1.5px solid #fbcfe8; border-radius: 14px; padding: 14px 20px; color: #831843;">
                                <div class="d-flex align-items-center gap-3">
                                    <div style="width: 36px; height: 36px; border-radius: 50%; background: #fce7f3; color: #69275c; display: flex; align-items: center; justify-content: center; font-size: 16px;">
                                        <i class="fa fa-user-circle"></i>
                                    </div>
                                    <div>
                                        <strong style="font-size: 13.5px; display: block; color: #0f172a;">Patient Account Required</strong>
                                        <span style="font-size: 12.5px; color: #64748b;">Please login to confirm and book your OPD appointment.</span>
                                    </div>
                                </div>
                                <a href="{{ route('user.login') }}" class="btn btn-sm rounded-pill px-3 py-2 font-weight-bold" style="background: #69275c; color: #ffffff !important; text-decoration: none;">
                                    <i class="fa fa-sign-in"></i> Sign In / Register
                                </a>
                            </div>
                        @else
                            <!-- Active Patient Banner -->
                            <div class="alert mb-4 d-flex align-items-center justify-content-between flex-wrap gap-2" style="background: #ecfdf5; border: 1.5px solid #a7f3d0; border-radius: 14px; padding: 12px 20px; color: #065f46;">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa fa-check-circle text-success" style="font-size: 18px;"></i>
                                    <span style="font-size: 13px;">Logged in as <strong>{{ Auth::user()->name }}</strong> ({{ Auth::user()->email }})</span>
                                </div>
                                <a href="{{ url('/user/dashboard') }}" class="btn btn-sm btn-outline-success rounded-pill px-3 font-weight-bold" style="text-decoration: none;">
                                    My Portal &rarr;
                                </a>
                            </div>
                        @endguest

                        <form action="appointmentform_validates" method="post" id="appointmentForm">
                            @csrf
                            <div class="form-grid-layout">
                                <!-- Full Name -->
                                <div class="form-group-item">
                                    <label class="field-label" for="appointmentname">
                                        <i class="fa fa-user"></i> Full Name <span class="req">*</span>
                                    </label>
                                    <div class="input-control-box">
                                        <input type="text" id="appointmentname" name="appointmentname"
                                            class="modern-field @error('appointmentname') is-invalid-field @enderror"
                                            placeholder="Enter your name"
                                            value="{{ old('appointmentname') }}" >
                                    </div>
                                    @error('appointmentname')
                                        <div class="validation-error-msg"><i class="fa fa-exclamation-circle"></i> {{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Phone Number -->
                                <div class="form-group-item">
                                    <label class="field-label" for="phone">
                                        <i class="fa fa-phone"></i> Phone Number <span class="req">*</span>
                                    </label>
                                    <div class="input-control-box">
                                        <input type="number" id="phone" name="phone"
                                            class="modern-field @error('phone') is-invalid-field @enderror"
                                            placeholder="10-digit mobile number"
                                            value="{{ old('phone') }}" >
                                    </div>
                                    @error('phone')
                                        <div class="validation-error-msg"><i class="fa fa-exclamation-circle"></i> {{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="form-group-item">
                                    <label class="field-label" for="email">
                                        <i class="fa fa-envelope-o"></i> Email Address <span class="req">*</span>
                                    </label>
                                    <div class="input-control-box">
                                        <input type="email" id="email" name="email"
                                            class="modern-field @error('email') is-invalid-field @enderror"
                                            placeholder="example@mail.com"
                                            value="{{ old('email') }}" >
                                    </div>
                                    @error('email')
                                        <div class="validation-error-msg"><i class="fa fa-exclamation-circle"></i> {{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Gender -->
                                <div class="form-group-item">
                                    <label class="field-label" for="gender">
                                        <i class="fa fa-venus-mars"></i> Gender <span class="req">*</span>
                                    </label>
                                    <div class="input-control-box select-picker-box">
                                        <select id="gender" name="gender"
                                            class="modern-field modern-select @error('gender') is-invalid-field @enderror" >
                                            <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Select Gender</option>
                                            <option value="Male" @if (old('gender') == 'Male') selected @endif>Male</option>
                                            <option value="Female" @if (old('gender') == 'Female') selected @endif>Female</option>
                                        </select>
                                    </div>
                                    @error('gender')
                                        <div class="validation-error-msg"><i class="fa fa-exclamation-circle"></i> {{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Department -->
                                <div class="form-group-item">
                                    <label class="field-label" for="department">
                                        <i class="fa fa-stethoscope"></i> Department <span class="req">*</span>
                                    </label>
                                    <div class="input-control-box select-picker-box">
                                        <select id="department" name="departmentname" onchange="loadDepartmentDoctors(this.value)"
                                            class="modern-field modern-select @error('departmentname') is-invalid-field @enderror" >
                                            <option value="" disabled {{ old('departmentname', request('dept')) ? '' : 'selected' }}>Select Department</option>
                                            @foreach($departments as $list)
                                                <option value="{{$list->departmentname}}" @if (strtolower(trim(old('departmentname', request('dept')))) == strtolower(trim($list->departmentname))) selected @endif>
                                                    {{$list->departmentname}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('departmentname')
                                        <div class="validation-error-msg"><i class="fa fa-exclamation-circle"></i> {{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Doctor -->
                                <div class="form-group-item">
                                    <label class="field-label" for="doctors">
                                        <i class="fa fa-user-md"></i> Doctor <span class="req">*</span>
                                    </label>
                                    <div class="input-control-box select-picker-box">
                                        <select id="doctors" name="username" onfocus="checkAndLoadDoctors(this)"
                                            class="modern-field modern-select @error('username') is-invalid-field @enderror" >
                                            <option value="">Select Doctor (Choose Department First)</option>
                                        </select>
                                    </div>
                                    @error('username')
                                        <div class="validation-error-msg"><i class="fa fa-exclamation-circle"></i> {{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Date -->
                                <div class="form-group-item">
                                    <label class="field-label" for="date">
                                        <i class="fa fa-calendar"></i> Appointment Date <span class="req">*</span>
                                    </label>
                                    <div class="input-control-box">
                                        <input type="date" id="date" name="date"
                                            min="<?php echo date('Y-m-d'); ?>"
                                            class="modern-field @error('date') is-invalid-field @enderror"
                                            value="{{ old('date', date('Y-m-d')) }}" >
                                    </div>
                                    @error('date')
                                        <div class="validation-error-msg"><i class="fa fa-exclamation-circle"></i> {{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Time -->
                                <div class="form-group-item">
                                    <label class="field-label" for="time">
                                        <i class="fa fa-clock-o"></i> Preferred Time <span class="req">*</span>
                                    </label>
                                    <div class="input-control-box">
                                        <input type="time" id="time" name="time"
                                            class="modern-field @error('time') is-invalid-field @enderror"
                                            value="{{ old('time', '10:00') }}" >
                                    </div>
                                    @error('time')
                                        <div class="validation-error-msg"><i class="fa fa-exclamation-circle"></i> {{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Message / Problem Facing -->
                                <div class="form-group-item form-group-full">
                                    <label class="field-label" for="message">
                                        <i class="fa fa-commenting-o"></i> Problem / Health Symptoms <span class="req">*</span>
                                    </label>
                                    <div class="input-control-box">
                                        <textarea id="message" name="message" rows="3"
                                            class="modern-field modern-textarea @error('message') is-invalid-field @enderror"
                                            placeholder="Briefly describe what symptoms or problem you are facing..." >{{ old('message') }}</textarea>
                                    </div>
                                    @error('message')
                                        <div class="validation-error-msg"><i class="fa fa-exclamation-circle"></i> {{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Submit Button: If Guest, redirect to Login; If Logged In, Submit -->
                                <div class="form-group-item form-group-full submit-btn-wrap">
                                    @guest
                                        <a href="{{ route('user.login') }}" class="btn-modern-book text-center justify-content-center text-decoration-none" style="display: inline-flex !important;">
                                            <span>Confirm & Book Appointment</span>
                                            <i class="fa fa-sign-in plane-icon"></i>
                                        </a>
                                    @else
                                        <button type="submit" class="btn-modern-book">
                                            <span>Confirm & Book Appointment</span>
                                            <i class="fa fa-paper-plane-o plane-icon"></i>
                                        </button>
                                    @endguest
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Right Column: Visual Showcase & Trust Badges -->
                    <div class="appointment-sidebar-col">
                        <div>
                            <!-- Visual Doctor Card with Floating Badges -->
                            <div class="sidebar-img-wrapper">
                                <img src="img/doctors/appointment.jpg" alt="Doctor Consultation" class="sidebar-cover-img">
                                <div class="sidebar-overlay"></div>

                                <!-- Floating Badge Top Left -->
                                <div class="float-badge badge-pos-top">
                                    <div class="badge-icon-sq bg-gradient-purple">
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="badge-info-txt">
                                        <div class="primary-txt">4.9 / 5 Rating</div>
                                        <div class="sub-txt">10,000+ Happy Patients</div>
                                    </div>
                                </div>

                                <!-- fe Badge  Right -->
                                <div class="float-badge badge-pos-bottom">
                                    <div class="badge-icon-sq bg-gradient-teal">
                                        <i class="fa fa-user-md"></i>
                                    </div>
                                    <div class="badge-info-txt">
                                        <div class="primary-txt">50+ Specialists</div>
                                        <div class="sub-txt">Experienced & Certified</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Highlights List -->
                            <div class="sidebar-perks">
                                <div class="perk-row">
                                    <div class="perk-icon-wrap perk-icon-1">
                                        <i class="fa fa-bolt"></i>
                                    </div>
                                    <div class="perk-content">
                                        <h6>Instant Email Confirmation</h6>
                                        <p>Receive your appointment details directly in your inbox.</p>
                                    </div>
                                </div>

                                <div class="perk-row">
                                    <div class="perk-icon-wrap perk-icon-2">
                                        <i class="fa fa-shield"></i>
                                    </div>
                                    <div class="perk-content">
                                        <h6>Compassionate Medical Care</h6>
                                        <p>Modern hygiene standards and dedicated patient care.</p>
                                    </div>
                                </div>

                                <div class="perk-row">
                                    <div class="perk-icon-wrap perk-icon-3">
                                        <i class="fa fa-hospital-o"></i>
                                    </div>
                                    <div class="perk-content">
                                        <h6>Advanced Diagnostic Tech</h6>
                                        <p>Equipped with state-of-the-art medical technology.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 24/7 Emergency Assistance Callout -->
                        <div class="emergency-call-card">
                            <div class="phone-pulse-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="emergency-meta">
                                <span>Need Immediate Assistance?</span>
                                <a href="tel:02832236000">02832 236000</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Appointment Section End -->

    <!-- footer start -->
    @include('partials.footer')
    <!-- footer end  -->

    <!-- Primary Bulletproof Doctor Fetching Script -->
    <script>
        function loadDepartmentDoctors(departmentName, selectedDoctor) {
            var doctorSelect = document.getElementById('doctors');
            if (!doctorSelect) return;

            if (!departmentName) {
                doctorSelect.innerHTML = '<option value="">Select Doctor (Choose Department First)</option>';
                doctorSelect.disabled = false;
                return;
            }

            doctorSelect.innerHTML = '<option value="">⏳ Fetching specialists for ' + departmentName + '...</option>';
            doctorSelect.disabled = true;

            var tokenInput = document.querySelector('input[name="_token"]');
            var token = tokenInput ? tokenInput.value : '{{ csrf_token() }}';

            var formData = new FormData();
            formData.append('cid', departmentName);
            formData.append('_token', token);

            fetch('{{ url("getdoctor") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(function(res) {
                if (!res.ok) {
                    throw new Error('Network error status: ' + res.status);
                }
                return res.text();
            })
            .then(function(html) {
                doctorSelect.innerHTML = html;
                doctorSelect.disabled = false;
                if (selectedDoctor) {
                    doctorSelect.value = selectedDoctor;
                }
            })
            .catch(function(err) {
                console.warn('Fetch failed, trying XMLHttpRequest fallback:', err);
                try {
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '{{ url("getdoctor") }}', true);
                    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                    xhr.onload = function() {
                        if (xhr.status === 200 && xhr.responseText) {
                            doctorSelect.innerHTML = xhr.responseText;
                            doctorSelect.disabled = false;
                            if (selectedDoctor) {
                                doctorSelect.value = selectedDoctor;
                            }
                        } else {
                            doctorSelect.innerHTML = '<option value="">Unable to load doctors</option>';
                            doctorSelect.disabled = false;
                        }
                    };
                    xhr.onerror = function() {
                        doctorSelect.innerHTML = '<option value="">Unable to load doctors</option>';
                        doctorSelect.disabled = false;
                    };
                    xhr.send(formData);
                } catch(e) {
                    doctorSelect.innerHTML = '<option value="">Unable to load doctors</option>';
                    doctorSelect.disabled = false;
                }
            });
        }

        function checkAndLoadDoctors(elem) {
            var deptElem = document.getElementById('department');
            if (deptElem && deptElem.value && (!elem.options || elem.options.length <= 1)) {
                loadDepartmentDoctors(deptElem.value, elem.value);
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            var deptElem = document.getElementById('department');
            if (deptElem) {
                deptElem.addEventListener('change', function () {
                    loadDepartmentDoctors(this.value, null);
                });

                // Auto-load if department was already selected on page load
                if (deptElem.value) {
                    loadDepartmentDoctors(deptElem.value, "{{ old('username', request('doc')) }}");
                }
            }
        });
    </script>

    <!-- Theme Vendor Scripts -->
    <script src="{{ URL::to('/') }}/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{ URL::to('/') }}/js/owl.carousel.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ URL::to('/') }}/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{ URL::to('/') }}/js/wow.min.js"></script>
    <script src="{{ URL::to('/') }}/js/jquery.slicknav.min.js"></script>
    <script src="{{ URL::to('/') }}/js/main.js"></script>

    <script>
        // Guard against preloader
        var preloader = document.getElementById("preloader");
        if (preloader) {
            setTimeout(function () {
                preloader.style.display = "none";
            }, 500);
        }
    </script>
</body>

</html>