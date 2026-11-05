<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('/') }}/img/logo3.png">
    <title>Patient Registration | KK Patel Super Speciality Hospital</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/assets/css/font-awesome.min.css">

    <!-- Advanced Animated Hospital Portal Styles (Matching kklogin123 design) -->
    <style>
        :root {
            --brand-primary: #69275c;
            --brand-primary-dark: #501d46;
            --brand-teal: #00a896;
            --brand-blue: #0284c7;
            --brand-dark: #0f172a;
            --brand-gray: #475569;
            --brand-border: #e2e8f0;
            --radius-lg: 22px;
            --radius-md: 14px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            color: #334155;
            min-height: 100vh;
            background: linear-gradient(130deg, #f0f7ff 0%, #ffffff 32%, #fcf7fc 58%, #e0f2fe 82%, #ffffff 100%);
            background-size: 250% 250%;
            animation: bgMeshGradientFlow 14s ease-in-out infinite alternate;
            overflow-x: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 30px 15px;
        }

        @keyframes bgMeshGradientFlow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* -------------------------------------------------------------
           BACKGROUND ANIMATIONS: 3D BLOBS, GRID, SCANLINE & FLOATERS
           ------------------------------------------------------------- */
        .login-bg-decorations {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
            z-index: 0;
        }

        /* 3D Morphing Organic Light Blobs */
        .login-morph-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(85px);
            opacity: 0.55;
            transition: all 0.5s ease;
        }

        .blob-1 {
            top: -60px;
            left: -60px;
            width: 520px;
            height: 520px;
            background: radial-gradient(circle, rgba(105, 39, 92, 0.22) 0%, rgba(105, 39, 92, 0) 70%);
            border-radius: 42% 58% 70% 30% / 45% 45% 55% 55%;
            animation: morphAnim1 12s ease-in-out infinite alternate;
        }

        .blob-2 {
            bottom: -80px;
            right: -60px;
            width: 560px;
            height: 560px;
            background: radial-gradient(circle, rgba(2, 132, 199, 0.22) 0%, rgba(2, 132, 199, 0) 70%);
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            animation: morphAnim2 14s ease-in-out infinite alternate -4s;
        }

        .blob-3 {
            top: 40%;
            left: 55%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(0, 168, 150, 0.16) 0%, rgba(0, 168, 150, 0) 70%);
            border-radius: 50% 50% 40% 60% / 40% 60% 50% 50%;
            animation: morphAnim3 15s ease-in-out infinite alternate -8s;
        }

        @keyframes morphAnim1 {
            0% { transform: translate(0, 0) scale(1); border-radius: 42% 58% 70% 30% / 45% 45% 55% 55%; }
            50% { transform: translate(35px, 25px) scale(1.1); border-radius: 70% 30% 50% 50% / 30% 30% 70% 70%; }
            100% { transform: translate(-20px, 35px) scale(0.95); border-radius: 30% 70% 70% 30% / 50% 60% 40% 50%; }
        }

        @keyframes morphAnim2 {
            0% { transform: translate(0, 0) scale(1); border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
            50% { transform: translate(-35px, -25px) scale(1.12); border-radius: 40% 60% 70% 30% / 40% 40% 60% 60%; }
            100% { transform: translate(20px, -15px) scale(0.95); border-radius: 50% 50% 30% 70% / 50% 50% 70% 30%; }
        }

        @keyframes morphAnim3 {
            0% { transform: translate(0, 0) scale(0.9); opacity: 0.35; }
            50% { transform: translate(25px, -20px) scale(1.15); opacity: 0.65; }
            100% { transform: translate(-20px, 20px) scale(1); opacity: 0.45; }
        }

        /* Subtle Medical Telemetry Grid */
        .login-grid-pattern {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: 
                linear-gradient(rgba(105, 39, 92, 0.035) 1px, transparent 1px),
                linear-gradient(90deg, rgba(2, 132, 199, 0.035) 1px, transparent 1px);
            background-size: 38px 38px;
            opacity: 0.75;
        }

        /* Animated Laser Scanning Line */
        .login-scanline {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent 0%, rgba(2, 132, 199, 0.4) 30%, rgba(105, 39, 92, 0.5) 50%, rgba(0, 168, 150, 0.4) 70%, transparent 100%);
            box-shadow: 0 0 12px rgba(2, 132, 199, 0.5);
            animation: laserScanDown 8s linear infinite;
        }

        @keyframes laserScanDown {
            0% { top: -5%; opacity: 0; }
            15% { opacity: 0.75; }
            85% { opacity: 0.75; }
            100% { top: 105%; opacity: 0; }
        }

        /* Floating Translucent Medical Symbols */
        .login-float-item {
            position: absolute;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            user-select: none;
            animation: floatDrift 8s ease-in-out infinite alternate;
        }

        .lf-1 { top: 15%; left: 10%; font-size: 26px; color: rgba(105, 39, 92, 0.18); animation-delay: 0s; }
        .lf-2 { top: 75%; left: 12%; font-size: 20px; color: rgba(2, 132, 199, 0.2); animation-delay: -2s; }
        .lf-3 { top: 20%; right: 12%; font-size: 24px; color: rgba(0, 168, 150, 0.2); animation-delay: -3.5s; }
        .lf-4 { top: 78%; right: 14%; font-size: 22px; color: rgba(225, 29, 72, 0.18); animation-delay: -5s; }

        @keyframes floatDrift {
            0% { transform: translateY(0) rotate(0deg); opacity: 0.35; }
            50% { transform: translateY(-18px) rotate(16deg); opacity: 0.8; }
            100% { transform: translateY(8px) rotate(-12deg); opacity: 0.4; }
        }

        /* Full-Width Running ECG Heartbeat Line along Bottom */
        .login-ecg-stream {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 48px;
            opacity: 0.4;
            overflow: hidden;
        }

        .login-ecg-svg {
            width: 200%;
            height: 100%;
            display: block;
            animation: ecgTrackSlide 14s linear infinite;
        }

        @keyframes ecgTrackSlide {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        /* -------------------------------------------------------------
           MODERN ELEVATED GLASSMORPHIC CARD
           ------------------------------------------------------------- */
        .login-page-container {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 540px;
            padding: 20px 15px;
            margin: auto;
        }

        .login-glass-card {
            position: relative;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: var(--radius-lg);
            border: 1.5px solid rgba(255, 255, 255, 0.95);
            box-shadow: 0 25px 65px -12px rgba(105, 39, 92, 0.2), 0 8px 24px -4px rgba(15, 23, 42, 0.08), 0 0 0 1px rgba(226, 232, 240, 0.8);
            overflow: hidden;
            animation: cardEntrance 0.75s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s ease;
        }

        .login-glass-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 35px 80px -15px rgba(105, 39, 92, 0.28), 0 12px 30px -4px rgba(15, 23, 42, 0.12);
        }

        @keyframes cardEntrance {
            0% {
                opacity: 0;
                transform: translateY(35px) scale(0.97);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Top Animated Color Slider Bar */
        .card-top-accent {
            height: 5px;
            width: 100%;
            background: linear-gradient(90deg, #69275c 0%, #0284c7 35%, #00a896 65%, #69275c 100%);
            background-size: 200% 100%;
            animation: accentSlider 6s linear infinite;
        }

        @keyframes accentSlider {
            0% { background-position: 0% 0%; }
            100% { background-position: 200% 0%; }
        }

        .card-body-content {
            padding: 38px 34px 34px;
        }

        /* Hospital Logo & Header */
        .login-brand-header {
            text-align: center;
            margin-bottom: 24px;
        }

        .login-brand-logo {
            display: inline-block;
            margin-bottom: 15px;
            transition: transform 0.35s ease;
        }

        .login-brand-logo:hover {
            transform: scale(1.05);
        }

        .login-brand-logo img {
            max-height: 58px;
            width: auto;
            display: block;
            margin: 0 auto;
            filter: drop-shadow(0 4px 10px rgba(15, 23, 42, 0.08));
        }

        .admin-secure-pill {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: rgba(105, 39, 92, 0.08);
            border: 1px solid rgba(105, 39, 92, 0.2);
            color: #69275c;
            padding: 5px 14px;
            border-radius: 50px;
            font-size: 11.5px;
            font-weight: 800;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .pulse-beacon-dot {
            width: 7px;
            height: 7px;
            background: #10b981;
            border-radius: 50%;
            box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.8);
            animation: pulseBeacon 1.8s infinite;
        }

        @keyframes pulseBeacon {
            0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.8); }
            70% { box-shadow: 0 0 0 8px rgba(16, 185, 129, 0); }
            100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
        }

        .login-brand-title {
            font-size: 24px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 4px;
            letter-spacing: -0.3px;
        }

        .login-brand-desc {
            font-size: 13.5px;
            color: #64748b;
            font-weight: 500;
        }

        /* -------------------------------------------------------------
           MODERN FORM CONTROLS & INPUT STYLING
           ------------------------------------------------------------- */
        .form-group-custom {
            margin-bottom: 18px;
            position: relative;
        }

        .form-label-custom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 13px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 7px;
        }

        .input-icon-wrap {
            position: relative;
        }

        .input-icon-wrap i.field-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 15px;
            transition: color 0.25s ease;
            pointer-events: none;
        }

        .form-control-custom {
            width: 100%;
            height: 48px;
            padding: 10px 16px 10px 46px;
            border-radius: var(--radius-md);
            border: 1.5px solid #e2e8f0;
            background: #f8fafc;
            color: #0f172a;
            font-size: 14px;
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            font-weight: 500;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            outline: none;
        }

        .form-control-custom:focus {
            background: #ffffff;
            border-color: #69275c;
            box-shadow: 0 0 0 4px rgba(105, 39, 92, 0.14);
        }

        .form-control-custom:focus + i.field-icon,
        .input-icon-wrap:focus-within i.field-icon {
            color: #69275c;
        }

        .toggle-password-btn {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #94a3b8;
            cursor: pointer;
            padding: 4px;
            font-size: 14px;
            transition: color 0.2s ease;
        }

        .toggle-password-btn:hover {
            color: #69275c;
        }

        .field-error-text {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #dc2626;
            margin-top: 5px;
        }

        /* -------------------------------------------------------------
           ANIMATED DASHING BUTTON
           ------------------------------------------------------------- */
        .btn-login-submit {
            position: relative;
            width: 100%;
            height: 52px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: linear-gradient(135deg, #69275c 0%, #8c2374 50%, #0284c7 100%);
            background-size: 200% 200%;
            color: #ffffff !important;
            border: none;
            border-radius: 50px;
            font-size: 15px;
            font-weight: 800;
            letter-spacing: 0.5px;
            cursor: pointer;
            text-decoration: none !important;
            overflow: hidden;
            box-shadow: 0 12px 28px -4px rgba(105, 39, 92, 0.42), 0 0 16px rgba(2, 132, 199, 0.22);
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            animation: gradientShift 6s ease infinite;
            margin-top: 8px;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Light Shimmer Beam */
        .btn-login-submit::before {
            content: '';
            position: absolute;
            top: 0;
            left: -150%;
            width: 60%;
            height: 100%;
            background: linear-gradient(90deg, transparent 0%, rgba(255, 255, 255, 0.45) 50%, transparent 100%);
            transform: skewX(-22deg);
            animation: btnLightSweep 3.2s cubic-bezier(0.4, 0, 0.2, 1) infinite;
            pointer-events: none;
        }

        @keyframes btnLightSweep {
            0% { left: -150%; }
            45%, 100% { left: 220%; }
        }

        .btn-login-submit:hover {
            transform: translateY(-3px) scale(1.015);
            box-shadow: 0 18px 36px -6px rgba(105, 39, 92, 0.52), 0 0 24px rgba(2, 132, 199, 0.35);
            color: #ffffff !important;
        }

        .btn-login-submit:active {
            transform: translateY(-1px) scale(0.99);
        }

        .btn-login-submit i.btn-arrow {
            transition: transform 0.25s ease;
        }

        .btn-login-submit:hover i.btn-arrow {
            transform: translateX(5px);
        }

        /* -------------------------------------------------------------
           FOOTER LINKS & SWITCH PROMPT
           ------------------------------------------------------------- */
        .login-card-footer {
            margin-top: 22px;
            padding-top: 18px;
            border-top: 1px solid #f1f5f9;
            text-align: center;
        }

        .switch-account-box {
            font-size: 13.5px;
            color: #64748b;
            font-weight: 500;
            margin-bottom: 12px;
        }

        .switch-account-link {
            color: #69275c;
            font-weight: 800;
            text-decoration: none;
            margin-left: 4px;
            transition: color 0.2s ease;
        }

        .switch-account-link:hover {
            color: #0284c7;
            text-decoration: underline;
        }

        .back-hospital-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: #64748b;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none !important;
            transition: all 0.2s ease;
        }

        .back-hospital-btn:hover {
            color: #0f172a;
            transform: translateX(-3px);
        }

        .security-badge-footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            font-weight: 600;
            color: #64748b;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .security-badge-footer i {
            color: #10b981;
        }

        /* Alerts */
        .alert-custom {
            border-radius: var(--radius-md);
            padding: 12px 16px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: fadeInDown 0.4s ease;
        }

        .alert-custom-success {
            background: #ecfdf5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        .alert-custom-error {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 576px) {
            .card-body-content {
                padding: 30px 20px 24px;
            }
            .login-brand-title {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>
    <!-- 1. Background Animation Elements -->
    <div class="login-bg-decorations">
        <!-- 3D Morphing Organic Light Blobs -->
        <div class="login-morph-blob blob-1"></div>
        <div class="login-morph-blob blob-2"></div>
        <div class="login-morph-blob blob-3"></div>

        <!-- Medical Grid Pattern -->
        <div class="login-grid-pattern"></div>

        <!-- Telemetry Laser Scanline -->
        <div class="login-scanline"></div>

        <!-- Floating Translucent Medical Symbols -->
        <div class="login-float-item lf-1"><i class="fa fa-plus"></i></div>
        <div class="login-float-item lf-2"><i class="fa fa-heartbeat"></i></div>
        <div class="login-float-item lf-3"><i class="fa fa-shield"></i></div>
        <div class="login-float-item lf-4"><i class="fa fa-stethoscope"></i></div>

        <!-- Running Bottom ECG Heartbeat Stream -->
        <div class="login-ecg-stream">
            <svg class="login-ecg-svg" viewBox="0 0 1200 48" preserveAspectRatio="none">
                <defs>
                    <linearGradient id="loginEcgGrad" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" stop-color="#69275c" stop-opacity="0.3" />
                        <stop offset="25%" stop-color="#0284c7" stop-opacity="0.7" />
                        <stop offset="50%" stop-color="#10b981" stop-opacity="0.9" />
                        <stop offset="75%" stop-color="#0284c7" stop-opacity="0.7" />
                        <stop offset="100%" stop-color="#69275c" stop-opacity="0.3" />
                    </linearGradient>
                </defs>
                <path d="M0,24 L160,24 L175,16 L185,32 L195,24 L240,24 L255,6 L270,42 L285,12 L298,30 L308,24 L460,24 L475,16 L485,32 L495,24 L540,24 L555,6 L570,42 L585,12 L598,30 L608,24 L760,24 L775,16 L785,32 L795,24 L840,24 L855,6 L870,42 L885,12 L898,30 L908,24 L1060,24 L1075,16 L1085,32 L1095,24 L1140,24 L1155,6 L1170,42 L1185,12 L1198,30 L1200,24" 
                      fill="none" stroke="url(#loginEcgGrad)" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
    </div>

    <!-- 2. Main Registration Form Card -->
    <div class="login-page-container">
        <div class="login-glass-card">
            <!-- Animated Gradient Accent Bar -->
            <div class="card-top-accent"></div>

            <div class="card-body-content">
                <!-- Brand Header -->
                <div class="login-brand-header">
                    <a href="{{ url('/') }}" class="login-brand-logo">
                        <img src="{{ URL::to('/') }}/img/experts/logo.png" alt="KK Patel Hospital" onerror="this.src='{{ URL::to('/') }}/img/logo3.png'">
                    </a>

                    <div>
                        <div class="admin-secure-pill">
                            <span class="pulse-beacon-dot"></span>
                            <span>Digital Patient Registration &bull; Secure</span>
                        </div>
                    </div>

                    <h1 class="login-brand-title">Create Patient Account</h1>
                    <p class="login-brand-desc">Register once to book OPD consultations &amp; access health records</p>
                </div>

                <!-- Session Flash Messages -->
                @if (session('success'))
                    <div class="alert-custom alert-custom-success">
                        <i class="fa fa-check-circle"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert-custom alert-custom-error">
                        <i class="fa fa-exclamation-triangle"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif
                @if (isset($errors) && $errors->any())
                    <div class="alert-custom alert-custom-error">
                        <i class="fa fa-exclamation-circle"></i>
                        <span>
                            @foreach ($errors->all() as $error)
                                {{ $error }}@if(!$loop->last) &bull; @endif
                            @endforeach
                        </span>
                    </div>
                @endif

                <!-- Register Form -->
                <form action="{{ route('user.register.submit') }}" method="POST" autocomplete="on">
                    @csrf

                    <!-- Full Name Field -->
                    <div class="form-group-custom">
                        <label class="form-label-custom" for="regName">Full Name</label>
                        <div class="input-icon-wrap">
                            <input type="text" id="regName" name="name" class="form-control-custom"
                                   placeholder="e.g. Rahul Sharma" value="{{ old('name') }}" required autofocus autocomplete="name">
                            <i class="fa fa-user-o field-icon"></i>
                        </div>
                        @error('name')
                            <span class="field-error-text"><i class="fa fa-times-circle m-r-5"></i>{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div class="form-group-custom">
                        <label class="form-label-custom" for="regEmail">Email Address</label>
                        <div class="input-icon-wrap">
                            <input type="email" id="regEmail" name="email" class="form-control-custom"
                                   placeholder="e.g. rahul@example.com" value="{{ old('email') }}" required autocomplete="email">
                            <i class="fa fa-envelope-o field-icon"></i>
                        </div>
                        @error('email')
                            <span class="field-error-text"><i class="fa fa-times-circle m-r-5"></i>{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Phone Number Field -->
                    <div class="form-group-custom">
                        <label class="form-label-custom" for="regPhone">Mobile Number (WhatsApp)</label>
                        <div class="input-icon-wrap">
                            <input type="tel" id="regPhone" name="phone" class="form-control-custom"
                                   placeholder="10-digit mobile number" value="{{ old('phone') }}" autocomplete="tel">
                            <i class="fa fa-phone field-icon"></i>
                        </div>
                        @error('phone')
                            <span class="field-error-text"><i class="fa fa-times-circle m-r-5"></i>{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password Fields (Row) -->
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group-custom">
                                <label class="form-label-custom" for="regPassword">Password</label>
                                <div class="input-icon-wrap">
                                    <input type="password" id="regPassword" name="password" class="form-control-custom"
                                           placeholder="Min 6 chars" required autocomplete="new-password">
                                    <i class="fa fa-lock field-icon"></i>
                                    <button type="button" class="toggle-password-btn" onclick="togglePasswordVisibility('regPassword', 'eyeIconPassword')" title="Show/Hide Password">
                                        <i class="fa fa-eye" id="eyeIconPassword"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <span class="field-error-text"><i class="fa fa-times-circle m-r-5"></i>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group-custom">
                                <label class="form-label-custom" for="regConfirmPassword">Confirm Password</label>
                                <div class="input-icon-wrap">
                                    <input type="password" id="regConfirmPassword" name="password_confirmation" class="form-control-custom"
                                           placeholder="Re-enter password" required autocomplete="new-password">
                                    <i class="fa fa-shield field-icon"></i>
                                    <button type="button" class="toggle-password-btn" onclick="togglePasswordVisibility('regConfirmPassword', 'eyeIconConfirm')" title="Show/Hide Password">
                                        <i class="fa fa-eye" id="eyeIconConfirm"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn-login-submit">
                        <i class="fa fa-user-plus"></i>
                        <span>Register &amp; Create Account</span>
                        <i class="fa fa-arrow-right btn-arrow"></i>
                    </button>

                    <!-- Card Footer Links -->
                    <div class="login-card-footer">
                        <div class="switch-account-box">
                            Already registered with KK Patel Hospital?
                            <a href="{{ route('user.login') }}" class="switch-account-link">Sign In</a>
                        </div>
                        <div>
                            <a href="{{ url('/') }}" class="back-hospital-btn">
                                <i class="fa fa-arrow-left"></i>
                                <span>Back to Hospital Homepage</span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Security Trust Assurance Footer -->
        <div class="security-badge-footer">
            <i class="fa fa-shield"></i>
            <span>256-Bit SSL Encrypted &bull; KK Patel Super Speciality Hospital</span>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ URL::to('/') }}/assets/js/jquery-3.2.1.min.js"></script>
    <script src="{{ URL::to('/') }}/assets/js/popper.min.js"></script>
    <script src="{{ URL::to('/') }}/assets/js/bootstrap.min.js"></script>

    <!-- Password Visibility Toggle Script -->
    <script>
        function togglePasswordVisibility(fieldId, iconId) {
            var passwordField = document.getElementById(fieldId);
            var toggleIcon = document.getElementById(iconId);

            if (passwordField && toggleIcon) {
                if (passwordField.type === "password") {
                    passwordField.type = "text";
                    toggleIcon.classList.remove("fa-eye");
                    toggleIcon.classList.add("fa-eye-slash");
                } else {
                    passwordField.type = "password";
                    toggleIcon.classList.remove("fa-eye-slash");
                    toggleIcon.classList.add("fa-eye");
                }
            }
        }
    </script>
</body>

</html>
