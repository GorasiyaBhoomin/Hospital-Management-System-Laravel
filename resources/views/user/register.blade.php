<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Patient Registration | KK Patel Super Speciality Hospital</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('/') }}/img/logo3.png">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- FontAwesome & Bootstrap Grid -->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/font-awesome.min.css">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #050b18;
            color: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
            overflow-y: auto;
            padding: 30px 15px;
        }

        /* -------------------------------------------------------------
           1. AMBIENT MEDICAL SCI-FI BACKGROUND ANIMATION (6 VIBRANT LAYERS)
           ------------------------------------------------------------- */
        .portal-bg-canvas {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
            background: radial-gradient(circle at 50% 20%, #0d1e44 0%, #060e22 50%, #030611 100%);
        }

        .portal-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(90px);
            pointer-events: none;
            opacity: 0.65;
            will-change: transform;
        }

        .blob-1 {
            top: -120px;
            left: -100px;
            width: 550px;
            height: 550px;
            background: radial-gradient(circle, rgba(225, 29, 72, 0.45) 0%, rgba(105, 39, 92, 0.4) 45%, transparent 70%);
            animation: morphBlob1 16s ease-in-out infinite alternate;
        }

        .blob-2 {
            bottom: -120px;
            right: -100px;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(2, 132, 199, 0.5) 0%, rgba(56, 189, 248, 0.25) 50%, transparent 75%);
            animation: morphBlob2 18s ease-in-out infinite alternate -4s;
        }

        .blob-3 {
            top: 40%;
            right: 15%;
            width: 440px;
            height: 440px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.35) 0%, rgba(0, 168, 150, 0.15) 55%, transparent 70%);
            animation: morphBlob3 20s ease-in-out infinite alternate -8s;
        }

        .blob-4 {
            bottom: 25%;
            left: 20%;
            width: 480px;
            height: 480px;
            background: radial-gradient(circle, rgba(139, 92, 246, 0.35) 0%, rgba(105, 39, 92, 0.2) 50%, transparent 70%);
            animation: morphBlob4 22s ease-in-out infinite alternate -12s;
        }

        @keyframes morphBlob1 {
            0% { transform: translate(0, 0) scale(1) rotate(0deg); border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%; }
            50% { transform: translate(60px, 40px) scale(1.15) rotate(90deg); border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
            100% { transform: translate(-30px, 60px) scale(0.95) rotate(180deg); border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%; }
        }

        @keyframes morphBlob2 {
            0% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(-60px, -40px) scale(1.12); }
            100% { transform: translate(40px, -30px) scale(0.92); }
        }

        @keyframes morphBlob3 {
            0% { transform: translate(0, 0) scale(0.9); opacity: 0.3; }
            50% { transform: translate(-50px, 40px) scale(1.2); opacity: 0.65; }
            100% { transform: translate(30px, -40px) scale(1); opacity: 0.4; }
        }

        @keyframes morphBlob4 {
            0% { transform: translate(0, 0) scale(1.1); }
            100% { transform: translate(50px, -60px) scale(0.9); }
        }

        .portal-grid-bg {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: 
                linear-gradient(rgba(2, 132, 199, 0.08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(2, 132, 199, 0.08) 1px, transparent 1px);
            background-size: 38px 38px;
            pointer-events: none;
        }

        .portal-laser-beam-1 {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent 0%, rgba(2, 132, 199, 0.8) 35%, rgba(225, 29, 72, 0.8) 65%, transparent 100%);
            box-shadow: 0 0 16px rgba(2, 132, 199, 0.8);
            animation: laserSweep 8s linear infinite;
        }

        .portal-laser-beam-2 {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent 0%, rgba(16, 185, 129, 0.8) 40%, rgba(105, 39, 92, 0.8) 70%, transparent 100%);
            box-shadow: 0 0 16px rgba(16, 185, 129, 0.7);
            animation: laserSweep 11s linear infinite reverse 3s;
        }

        @keyframes laserSweep {
            0% { top: -5%; opacity: 0; }
            15% { opacity: 0.9; }
            85% { opacity: 0.9; }
            100% { top: 105%; opacity: 0; }
        }

        .portal-float-particles {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            pointer-events: none;
            overflow: hidden;
        }

        .float-particle {
            position: absolute;
            user-select: none;
            pointer-events: none;
            animation: particleAscend linear infinite;
            filter: drop-shadow(0 0 8px currentColor);
        }

        .pt1 { left: 8%; bottom: -50px; font-size: 20px; color: rgba(2, 132, 199, 0.4); animation-duration: 16s; }
        .pt2 { left: 24%; bottom: -50px; font-size: 16px; color: rgba(225, 29, 72, 0.35); animation-duration: 20s; animation-delay: 2s; }
        .pt3 { left: 42%; bottom: -50px; font-size: 24px; color: rgba(16, 185, 129, 0.4); animation-duration: 18s; animation-delay: 6s; }
        .pt4 { left: 62%; bottom: -50px; font-size: 18px; color: rgba(105, 39, 92, 0.45); animation-duration: 22s; animation-delay: 1s; }
        .pt5 { left: 78%; bottom: -50px; font-size: 22px; color: rgba(2, 132, 199, 0.4); animation-duration: 17s; animation-delay: 4s; }
        .pt6 { left: 91%; bottom: -50px; font-size: 16px; color: rgba(245, 158, 11, 0.35); animation-duration: 19s; animation-delay: 8s; }

        @keyframes particleAscend {
            0% { transform: translateY(0) rotate(0deg) scale(0.85); opacity: 0; }
            15% { opacity: 0.8; }
            85% { opacity: 0.8; }
            100% { transform: translateY(-110vh) rotate(360deg) scale(1.15); opacity: 0; }
        }

        .portal-bottom-ecg {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 48px;
            pointer-events: none;
            opacity: 0.55;
            overflow: hidden;
            z-index: 1;
        }

        .bottom-ecg-svg {
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
           2. TOP FLOATING NAVIGATION
           ------------------------------------------------------------- */
        .portal-topbar {
            position: fixed;
            top: 20px;
            left: 0;
            right: 0;
            z-index: 100;
            padding: 0 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .topbar-brand {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            padding: 8px 18px;
            border-radius: 50px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
            text-decoration: none !important;
            color: #ffffff;
        }

        .topbar-brand img {
            height: 28px;
        }

        .topbar-brand span {
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.3px;
        }

        .topbar-back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 8px 18px;
            border-radius: 50px;
            color: #ffffff !important;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none !important;
            transition: all 0.25s ease;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.25);
        }

        .topbar-back-btn:hover {
            background: rgba(255, 255, 255, 0.22);
            border-color: #0284c7;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(2, 132, 199, 0.4);
        }

        /* -------------------------------------------------------------
           3. GLASSMORPHISM REGISTRATION CARD
           ------------------------------------------------------------- */
        .login-stage-container {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 520px;
            margin: 65px auto 30px;
        }

        .glass-card-glow-wrap {
            position: relative;
            border-radius: 28px;
            padding: 2px;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.7), rgba(2, 132, 199, 0.7), rgba(105, 39, 92, 0.8), rgba(225, 29, 72, 0.6));
            background-size: 300% 300%;
            animation: borderGradientShift 10s ease infinite;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5), 0 0 40px rgba(2, 132, 199, 0.25);
        }

        @keyframes borderGradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .glass-card-inner {
            background: rgba(11, 20, 44, 0.85);
            backdrop-filter: blur(28px) saturate(180%);
            -webkit-backdrop-filter: blur(28px) saturate(180%);
            border-radius: 26px;
            padding: 38px 34px 30px;
            position: relative;
            overflow: hidden;
        }

        .card-header-center {
            text-align: center;
            margin-bottom: 24px;
            position: relative;
            z-index: 2;
        }

        .brand-badge-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            padding: 5px 16px;
            border-radius: 50px;
            margin-bottom: 12px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.2);
        }

        .pulse-beacon {
            width: 8px;
            height: 8px;
            background: #10b981;
            border-radius: 50%;
            box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.8);
            animation: beaconPulse 1.8s infinite;
        }

        @keyframes beaconPulse {
            0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.8); }
            70% { box-shadow: 0 0 0 8px rgba(16, 185, 129, 0); }
            100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
        }

        .brand-badge-pill span {
            font-size: 11px;
            font-weight: 700;
            color: #93c5fd;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .card-header-center h2 {
            font-size: 25px;
            font-weight: 800;
            color: #ffffff;
            margin: 0 0 4px;
            letter-spacing: -0.4px;
        }

        .card-header-center p {
            font-size: 13px;
            color: #94a3b8;
            margin: 0;
        }

        .glass-field-group {
            margin-bottom: 16px;
            position: relative;
            z-index: 2;
        }

        .glass-field-label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            color: #cbd5e1;
            margin-bottom: 6px;
            letter-spacing: 0.2px;
        }

        .glass-input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .glass-input-icon {
            position: absolute;
            left: 16px;
            color: #64748b;
            font-size: 14px;
            transition: color 0.25s ease;
            pointer-events: none;
        }

        .glass-input {
            width: 100%;
            height: 48px;
            background: rgba(15, 23, 42, 0.6);
            border: 1.5px solid rgba(255, 255, 255, 0.12);
            border-radius: 12px;
            padding: 10px 16px 10px 44px;
            font-size: 13.5px;
            font-weight: 500;
            color: #ffffff;
            transition: all 0.25s ease;
        }

        .glass-input::placeholder {
            color: #64748b;
        }

        .glass-input:focus {
            outline: none;
            background: rgba(15, 23, 42, 0.9);
            border-color: #0284c7;
            box-shadow: 0 0 0 4px rgba(2, 132, 199, 0.25), 0 0 16px rgba(2, 132, 199, 0.3);
        }

        .glass-input-wrapper:focus-within .glass-input-icon {
            color: #38bdf8;
            filter: drop-shadow(0 0 6px rgba(56, 189, 248, 0.8));
        }

        .glass-eye-toggle {
            position: absolute;
            right: 14px;
            background: transparent;
            border: none;
            color: #64748b;
            font-size: 14px;
            cursor: pointer;
            padding: 4px;
            transition: color 0.2s ease;
        }

        .glass-eye-toggle:hover {
            color: #38bdf8;
        }

        .btn-glass-cta {
            position: relative;
            width: 100%;
            height: 50px;
            background: linear-gradient(135deg, #00a896 0%, #0284c7 50%, #69275c 100%);
            background-size: 200% auto;
            border: none;
            border-radius: 50px;
            color: #ffffff !important;
            font-size: 14.5px;
            font-weight: 800;
            letter-spacing: 0.4px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 8px 25px rgba(0, 168, 150, 0.4), 0 0 25px rgba(2, 132, 199, 0.3);
            cursor: pointer;
            overflow: hidden;
            text-decoration: none !important;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            margin-top: 10px;
        }

        .btn-glass-cta::before {
            content: '';
            position: absolute;
            top: 0;
            left: -120%;
            width: 60%;
            height: 100%;
            background: linear-gradient(90deg, transparent 0%, rgba(255, 255, 255, 0.45) 50%, transparent 100%);
            transform: skewX(-25deg);
            animation: btnSweep 3.2s cubic-bezier(0.4, 0, 0.2, 1) infinite;
            pointer-events: none;
        }

        @keyframes btnSweep {
            0% { left: -120%; }
            40%, 100% { left: 200%; }
        }

        .btn-glass-cta:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(0, 168, 150, 0.55), 0 0 30px rgba(2, 132, 199, 0.45);
            background-position: right center;
        }

        .btn-icon-hop {
            transition: transform 0.25s ease;
        }

        .btn-glass-cta:hover .btn-icon-hop {
            transform: translateX(4px);
        }

        .glass-switch-box {
            text-align: center;
            margin-top: 20px;
            padding-top: 16px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 13px;
            color: #94a3b8;
        }

        .glass-switch-link {
            color: #38bdf8;
            font-weight: 800;
            text-decoration: none;
            margin-left: 4px;
            transition: all 0.2s ease;
        }

        .glass-switch-link:hover {
            color: #ffffff;
            text-decoration: underline;
        }

        @media (max-width: 576px) {
            .glass-card-inner {
                padding: 28px 20px 24px;
            }
            .portal-topbar {
                padding: 0 15px;
            }
            .topbar-brand span {
                display: none;
            }
        }
    </style>
</head>

<body>

    <!-- Ambient Fullscreen Background Canvas -->
    <div class="portal-bg-canvas">
        <div class="portal-blob blob-1"></div>
        <div class="portal-blob blob-2"></div>
        <div class="portal-blob blob-3"></div>
        <div class="portal-blob blob-4"></div>
        <div class="portal-grid-bg"></div>
        <div class="portal-laser-beam-1"></div>
        <div class="portal-laser-beam-2"></div>

        <!-- Floating Medical Particles -->
        <div class="portal-float-particles">
            <div class="float-particle pt1"><i class="fa fa-plus"></i></div>
            <div class="float-particle pt2"><i class="fa fa-heartbeat"></i></div>
            <div class="float-particle pt3"><i class="fa fa-plus"></i></div>
            <div class="float-particle pt4"><i class="fa fa-stethoscope"></i></div>
            <div class="float-particle pt5"><i class="fa fa-shield"></i></div>
            <div class="float-particle pt6"><i class="fa fa-plus"></i></div>
        </div>

        <!-- Running Bottom Cardiogram Stream -->
        <div class="portal-bottom-ecg">
            <svg class="bottom-ecg-svg" viewBox="0 0 1200 40" fill="none">
                <path d="M0,20 L160,20 L175,5 L185,35 L195,10 L205,28 L215,20 L400,20 L415,5 L425,35 L435,10 L445,28 L455,20 L680,20 L695,5 L705,35 L715,10 L725,28 L735,20 L940,20 L955,5 L965,35 L975,10 L985,28 L995,20 L1200,20"
                      stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
    </div>

    <!-- Top Floating Navigation -->
    <div class="portal-topbar">
        <a href="{{ url('/') }}" class="topbar-brand" title="KK Patel Hospital">
            <img src="{{ URL::to('/') }}/img/logo3.png" alt="Hospital Logo">
            <span>KK Patel Super Speciality</span>
        </a>
        <a href="{{ url('/') }}" class="topbar-back-btn">
            <i class="fa fa-arrow-left"></i>
            <span>Return to Website</span>
        </a>
    </div>

    <!-- Main Glassmorphism Registration Card -->
    <div class="login-stage-container">
        <div class="glass-card-glow-wrap">
            <div class="glass-card-inner">

                <!-- Header -->
                <div class="card-header-center">
                    <div class="brand-badge-pill">
                        <span class="pulse-beacon"></span>
                        <span>Digital Patient Onboarding</span>
                    </div>
                    <h2>Create Patient Account</h2>
                    <p>Register once to book consultations, track OPD slips, and access care.</p>
                </div>

                <!-- Errors -->
                @if (isset($errors) && $errors->any())
                    <div class="alert alert-danger rounded-3 mb-3" style="background: rgba(225, 29, 72, 0.2); border: 1px solid rgba(225, 29, 72, 0.5); color: #fca5a5; font-size: 13px;">
                        <ul class="mb-0 pl-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Register Form -->
                <form action="{{ route('user.register.submit') }}" method="POST">
                    @csrf

                    <!-- Full Name -->
                    <div class="glass-field-group">
                        <label class="glass-field-label" for="regName">Full Patient Name</label>
                        <div class="glass-input-wrapper">
                            <i class="fa fa-user-o glass-input-icon"></i>
                            <input type="text" id="regName" name="name" class="glass-input" value="{{ old('name') }}"  placeholder="e.g. Rahul Patel" autofocus autocomplete="name">
                        </div>
                    </div>

                    <!-- Email Address -->
                    <div class="glass-field-group">
                        <label class="glass-field-label" for="regEmail">Email Address</label>
                        <div class="glass-input-wrapper">
                            <i class="fa fa-envelope-o glass-input-icon"></i>
                            <input type="email" id="regEmail" name="email" class="glass-input" value="{{ old('email') }}"  placeholder="your.email@example.com" autocomplete="email">
                        </div>
                    </div>

                    <!-- Mobile Number -->
                    <div class="glass-field-group">
                        <label class="glass-field-label" for="regPhone">Mobile Number (WhatsApp)</label>
                        <div class="glass-input-wrapper">
                            <i class="fa fa-phone glass-input-icon"></i>
                            <input type="tel" id="regPhone" name="phone_number" class="glass-input" value="{{ old('phone_number') }}"  placeholder="10-digit mobile number" autocomplete="tel">
                        </div>
                    </div>

                    <!-- Password and Confirmation -->
                    <div class="row">
                        <div class="col-12 col-sm-6 glass-field-group">
                            <label class="glass-field-label" for="regPass">Create Password</label>
                            <div class="glass-input-wrapper">
                                <i class="fa fa-lock glass-input-icon"></i>
                                <input type="password" id="regPass" name="password" class="glass-input"  placeholder="Min 6 chars" autocomplete="new-password">
                                <button type="button" class="glass-eye-toggle" onclick="togglePasswordVisibility('regPass', 'eyeIconRegPass')">
                                    <i class="fa fa-eye" id="eyeIconRegPass"></i>
                                </button>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 glass-field-group">
                            <label class="glass-field-label" for="regPassConfirm">Confirm Password</label>
                            <div class="glass-input-wrapper">
                                <i class="fa fa-shield glass-input-icon"></i>
                                <input type="password" id="regPassConfirm" name="password_confirmation" class="glass-input"  placeholder="Re-enter password" autocomplete="new-password">
                                <button type="button" class="glass-eye-toggle" onclick="togglePasswordVisibility('regPassConfirm', 'eyeIconRegConfirm')">
                                    <i class="fa fa-eye" id="eyeIconRegConfirm"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Animated CTA Button -->
                    <button type="submit" class="btn-glass-cta">
                        <span>Register & Create Account</span>
                        <i class="fa fa-arrow-right btn-icon-hop"></i>
                    </button>

                    <!-- Switch to Login -->
                    <div class="glass-switch-box">
                        Already registered with KK Patel Hospital? 
                        <a href="{{ route('user.login') }}" class="glass-switch-link">Sign In</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility(inputId, iconId) {
            var field = document.getElementById(inputId);
            var icon = document.getElementById(iconId);
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>
