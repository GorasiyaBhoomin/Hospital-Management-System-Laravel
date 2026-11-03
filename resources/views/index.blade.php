<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>KK Patel Super Speciality Hospital | Leading Healthcare in Kutch</title>
    <meta name="description" content="KK Patel Super Speciality Hospital in Bhuj, Kutch provides world-class cardiac, oncology, nephrology, orthopaedic, and 24/7 emergency healthcare.">
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

    <!-- Modern Index Page Styles & Animations -->
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
            background-color: #ffffff;
            overflow-x: hidden;
        }

        /* -------------------------------------------------------------
           1. MODERN HERO SECTION (BRIGHT LIGHT THEME + LIVELY HEART & DOCTOR ANIMATION)
           ------------------------------------------------------------- */
        .home-hero-section {
            position: relative;
            background: linear-gradient(125deg, #f0f7ff 0%, #ffffff 30%, #fbf5fa 55%, #e0f2fe 80%, #ffffff 100%);
            background-size: 250% 250%;
            animation: heroGradientFlow 14s ease-in-out infinite alternate;
            padding: 85px 0 115px;
            border-bottom: 1px solid #e2e8f0;
            overflow: hidden;
            color: #0f172a;
        }

        @keyframes heroGradientFlow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* 3D Morphing Organic Light Orbs */
        .hero-glow-orb {
            position: absolute;
            pointer-events: none;
            filter: blur(80px);
            z-index: 1;
            opacity: 0.65;
            transition: all 0.5s ease;
        }

        .hero-glow-1 {
            top: -60px;
            left: -60px;
            width: 520px;
            height: 520px;
            background: radial-gradient(circle, rgba(105, 39, 92, 0.16) 0%, rgba(105, 39, 92, 0) 70%);
            border-radius: 42% 58% 70% 30% / 45% 45% 55% 55%;
            animation: morphBlob1 12s ease-in-out infinite alternate;
        }

        .hero-glow-2 {
            bottom: -80px;
            right: -60px;
            width: 560px;
            height: 560px;
            background: radial-gradient(circle, rgba(2, 132, 199, 0.16) 0%, rgba(2, 132, 199, 0) 70%);
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            animation: morphBlob2 14s ease-in-out infinite alternate -4s;
        }

        .hero-glow-3 {
            top: 30%;
            left: 35%;
            width: 420px;
            height: 420px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.11) 0%, rgba(16, 185, 129, 0) 70%);
            border-radius: 50% 50% 40% 60% / 40% 60% 50% 50%;
            animation: morphBlob3 16s ease-in-out infinite alternate -8s;
        }

        @keyframes morphBlob1 {
            0% { transform: translate(0, 0) scale(1); border-radius: 42% 58% 70% 30% / 45% 45% 55% 55%; }
            50% { transform: translate(35px, 25px) scale(1.1); border-radius: 70% 30% 50% 50% / 30% 30% 70% 70%; }
            100% { transform: translate(-20px, 40px) scale(0.95); border-radius: 30% 70% 70% 30% / 50% 60% 40% 50%; }
        }

        @keyframes morphBlob2 {
            0% { transform: translate(0, 0) scale(1); border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
            50% { transform: translate(-35px, -25px) scale(1.12); border-radius: 40% 60% 70% 30% / 40% 40% 60% 60%; }
            100% { transform: translate(25px, -15px) scale(0.94); border-radius: 50% 50% 30% 70% / 50% 50% 70% 30%; }
        }

        @keyframes morphBlob3 {
            0% { transform: translate(0, 0) scale(0.9); opacity: 0.35; }
            50% { transform: translate(25px, -25px) scale(1.15); opacity: 0.65; }
            100% { transform: translate(-25px, 20px) scale(1); opacity: 0.45; }
        }

        /* Ambient Medical Grid Pattern with Subtle Shimmer */
        .hero-grid-pattern {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: 
                linear-gradient(rgba(2, 132, 199, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(2, 132, 199, 0.04) 1px, transparent 1px);
            background-size: 36px 36px;
            pointer-events: none;
            z-index: 1;
        }

        /* Animated Laser Scanning Line */
        .hero-scanline {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent 0%, rgba(2, 132, 199, 0.4) 30%, rgba(105, 39, 92, 0.5) 50%, rgba(16, 185, 129, 0.4) 70%, transparent 100%);
            box-shadow: 0 0 12px rgba(2, 132, 199, 0.5);
            pointer-events: none;
            z-index: 1;
            animation: scanLineAnim 9s linear infinite;
        }
        @keyframes scanLineAnim {
            0% { top: -5%; opacity: 0; }
            15% { opacity: 0.8; }
            85% { opacity: 0.8; }
            100% { top: 105%; opacity: 0; }
        }

        /* Floating Translucent Medical Crosses & Molecules */
        .hero-floating-elements {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            pointer-events: none;
            z-index: 1;
            overflow: hidden;
        }

        .hero-float-item {
            position: absolute;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            user-select: none;
            pointer-events: none;
            animation: floatDrift linear infinite;
        }

        .p1 { left: 8%; bottom: -40px; font-size: 18px; color: rgba(105, 39, 92, 0.22); animation-duration: 16s; animation-delay: 0s; }
        .p2 { left: 22%; bottom: -40px; font-size: 15px; color: rgba(225, 29, 72, 0.2); animation-duration: 20s; animation-delay: 3s; }
        .p3 { left: 38%; bottom: -40px; font-size: 20px; color: rgba(16, 185, 129, 0.24); animation-duration: 18s; animation-delay: 7s; }
        .p4 { left: 54%; bottom: -40px; font-size: 16px; color: rgba(2, 132, 199, 0.22); animation-duration: 22s; animation-delay: 1.5s; }
        .p5 { left: 68%; bottom: -40px; font-size: 19px; color: rgba(105, 39, 92, 0.2); animation-duration: 17s; animation-delay: 5s; }
        .p6 { left: 82%; bottom: -40px; font-size: 17px; color: rgba(2, 132, 199, 0.25); animation-duration: 19s; animation-delay: 9s; }
        .p7 { left: 92%; bottom: -40px; font-size: 15px; color: rgba(16, 185, 129, 0.22); animation-duration: 21s; animation-delay: 4s; }

        @keyframes floatDrift {
            0% {
                transform: translateY(0) rotate(0deg) scale(0.9);
                opacity: 0;
            }
            15% {
                opacity: 0.7;
            }
            85% {
                opacity: 0.7;
            }
            100% {
                transform: translateY(-680px) rotate(220deg) scale(1.15);
                opacity: 0;
            }
        }

        /* Full-Width Background Running ECG Pulse Wave at the Bottom */
        .hero-bg-ecg-stream {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 55px;
            pointer-events: none;
            z-index: 2;
            opacity: 0.4;
            overflow: hidden;
        }

        .bg-ecg-svg {
            width: 200%;
            height: 100%;
            display: block;
            animation: ecgTrackSlide 14s linear infinite;
        }
        @keyframes ecgTrackSlide {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        .bg-ecg-path {
            fill: none;
            stroke: url(#heroEcgGradient);
            stroke-width: 2.2;
            stroke-linecap: round;
            stroke-linejoin: round;
            filter: drop-shadow(0 0 5px rgba(2, 132, 199, 0.5));
        }

        .hero-content-col {
            position: relative;
            z-index: 3;
        }

        .hero-live-pill {
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
            margin-bottom: 22px;
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

        .hero-heading {
            font-size: 48px;
            font-weight: 800;
            line-height: 1.2;
            letter-spacing: -0.6px;
            color: #0f172a;
            margin-bottom: 18px;
            animation: fadeInUp 0.7s ease-out;
        }

        .hero-heading .text-gradient {
            background: linear-gradient(135deg, #69275c 0%, #0284c7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-description {
            font-size: 16.5px;
            color: #475569;
            line-height: 1.65;
            margin-bottom: 30px;
            max-width: 580px;
            animation: fadeInUp 0.8s ease-out;
        }

        .hero-cta-group {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 24px;
            animation: fadeInUp 0.9s ease-out;
        }

        .btn-hero-primary {
            background: linear-gradient(135deg, #69275c 0%, #8b1d6b 100%);
            color: #ffffff !important;
            padding: 14px 28px;
            border-radius: 50px;
            font-size: 14.5px;
            font-weight: 700;
            text-decoration: none !important;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 8px 24px rgba(105, 39, 92, 0.3);
            transition: all 0.25s ease;
        }

        .btn-hero-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(105, 39, 92, 0.45);
            background: linear-gradient(135deg, #571f4c 0%, #76165a 100%);
        }

        .btn-hero-secondary {
            background: #ffffff;
            color: #334155 !important;
            border: 1.5px solid #cbd5e1;
            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.05);
            padding: 13px 26px;
            border-radius: 50px;
            font-size: 14.5px;
            font-weight: 700;
            text-decoration: none !important;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.25s ease;
        }

        .btn-hero-secondary:hover {
            background: #f8fafc;
            border-color: #69275c;
            color: #69275c !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.08);
        }

        .hero-tel-link {
            color: #475569;
            font-size: 13.5px;
            font-weight: 600;
            text-decoration: none !important;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: color 0.2s ease;
        }
        .hero-tel-link:hover {
            color: #dc2626;
        }

        /* -------------------------------------------------------------
           DASHING & POWERFUL 3D ROTATING LIVE BEATING HEART CENTERPIECE
           ------------------------------------------------------------- */
        .hero-heart-stage-wrap {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 520px;
            perspective: 1200px;
        }

        /* 1. Backdrop Ambient Plasma Glow Field */
        .heart-plasma-aura {
            position: absolute;
            width: 480px;
            height: 480px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(225, 29, 72, 0.25) 0%, rgba(105, 39, 92, 0.2) 38%, rgba(2, 132, 199, 0.15) 62%, transparent 75%);
            filter: blur(55px);
            z-index: 1;
            pointer-events: none;
            animation: plasmaPulse 6s ease-in-out infinite alternate;
        }

        @keyframes plasmaPulse {
            0% { transform: scale(0.92); opacity: 0.6; }
            50% { transform: scale(1.18); opacity: 0.95; }
            100% { transform: scale(0.95); opacity: 0.6; }
        }

        /* 2. Concentric Arterial Pulse Shockwaves */
        .heart-shockwave {
            position: absolute;
            top: 50%;
            left: 50%;
            border-radius: 50%;
            border: 2px solid rgba(225, 29, 72, 0.6);
            pointer-events: none;
            z-index: 1;
            transform: translate(-50%, -50%);
            animation: arterialShockwave 2.2s cubic-bezier(0.1, 0.8, 0.3, 1) infinite;
        }

        .shockwave-1 { width: 150px; height: 150px; animation-delay: 0s; }
        .shockwave-2 { width: 150px; height: 150px; animation-delay: 0.75s; }
        .shockwave-3 { width: 150px; height: 150px; animation-delay: 1.5s; }

        @keyframes arterialShockwave {
            0% { transform: translate(-50%, -50%) scale(0.85); opacity: 0.95; border-color: rgba(225, 29, 72, 0.85); box-shadow: 0 0 15px rgba(225, 29, 72, 0.5); }
            50% { opacity: 0.65; }
            100% { transform: translate(-50%, -50%) scale(3.2); opacity: 0; border-color: rgba(2, 132, 199, 0); box-shadow: none; }
        }

        /* 3. 3D Holographic Gyroscope Orbit Rings */
        .gyro-ring {
            position: absolute;
            top: 50%;
            left: 50%;
            border-radius: 50%;
            pointer-events: none;
            z-index: 2;
            transform-style: preserve-3d;
        }

        .gyro-ring-1 {
            width: 390px;
            height: 390px;
            border: 2px dashed rgba(2, 132, 199, 0.4);
            transform: translate(-50%, -50%) rotateX(68deg) rotateY(18deg);
            animation: gyroSpin1 20s linear infinite;
        }

        .gyro-ring-2 {
            width: 350px;
            height: 350px;
            border: 2px solid rgba(225, 29, 72, 0.4);
            box-shadow: 0 0 15px rgba(225, 29, 72, 0.25);
            transform: translate(-50%, -50%) rotateX(25deg) rotateY(70deg);
            animation: gyroSpin2 16s linear infinite reverse;
        }

        .gyro-ring-3 {
            width: 440px;
            height: 440px;
            border: 1px dotted rgba(105, 39, 92, 0.3);
            transform: translate(-50%, -50%) rotateX(0deg);
            animation: gyroSpin3 30s linear infinite;
        }

        @keyframes gyroSpin1 {
            0% { transform: translate(-50%, -50%) rotateX(68deg) rotateY(18deg) rotateZ(0deg); }
            100% { transform: translate(-50%, -50%) rotateX(68deg) rotateY(18deg) rotateZ(360deg); }
        }

        @keyframes gyroSpin2 {
            0% { transform: translate(-50%, -50%) rotateX(25deg) rotateY(70deg) rotateZ(0deg); }
            100% { transform: translate(-50%, -50%) rotateX(25deg) rotateY(70deg) rotateZ(360deg); }
        }

        @keyframes gyroSpin3 {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }

        /* 4. THE 3D ROTATING & POWERFULLY BEATING HEART MODEL */
        .heart-3d-scene {
            position: relative;
            z-index: 3;
            width: 330px;
            height: 330px;
            display: flex;
            align-items: center;
            justify-content: center;
            transform-style: preserve-3d;
        }

        /* Continuous 3D Rotation Animation in Perspective Space */
        .heart-3d-rotator {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            transform-style: preserve-3d;
            animation: heartRotate3D 14s linear infinite;
        }

        @keyframes heartRotate3D {
            0% {
                transform: rotateY(0deg) rotateX(10deg);
            }
            25% {
                transform: rotateY(90deg) rotateX(4deg);
            }
            50% {
                transform: rotateY(180deg) rotateX(-10deg);
            }
            75% {
                transform: rotateY(270deg) rotateX(-4deg);
            }
            100% {
                transform: rotateY(360deg) rotateX(10deg);
            }
        }

        /* Inner Beating Core with Physiological Systolic/Diastolic "Lub-Dub" */
        .heart-beating-core {
            position: relative;
            width: 260px;
            height: 260px;
            display: flex;
            align-items: center;
            justify-content: center;
            transform-style: preserve-3d;
            animation: powerfulLubDubBeat 1.25s infinite cubic-bezier(0.215, 0.61, 0.355, 1);
        }

        @keyframes powerfulLubDubBeat {
            0% {
                transform: scale(1);
                filter: drop-shadow(0 0 20px rgba(225, 29, 72, 0.5)) drop-shadow(0 0 35px rgba(239, 68, 68, 0.3));
            }
            14% {
                transform: scale(1.22);
                filter: drop-shadow(0 0 50px rgba(225, 29, 72, 0.95)) drop-shadow(0 0 90px rgba(239, 68, 68, 0.8)) drop-shadow(0 0 130px rgba(105, 39, 92, 0.6));
            }
            28% {
                transform: scale(1.05);
                filter: drop-shadow(0 0 28px rgba(225, 29, 72, 0.6));
            }
            42% {
                transform: scale(1.14);
                filter: drop-shadow(0 0 40px rgba(225, 29, 72, 0.9)) drop-shadow(0 0 70px rgba(239, 68, 68, 0.65));
            }
            60% {
                transform: scale(1);
                filter: drop-shadow(0 0 20px rgba(225, 29, 72, 0.5));
            }
            100% {
                transform: scale(1);
                filter: drop-shadow(0 0 20px rgba(225, 29, 72, 0.5));
            }
        }

        /* Multi-Plane 3D Heart Faces (Front, Back & Glow Depth) */
        .heart-3d-face {
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            backface-visibility: visible;
        }

        .heart-face-front {
            transform: translateZ(16px);
        }

        .heart-face-back {
            transform: rotateY(180deg) translateZ(16px);
        }

        .heart-face-core {
            transform: translateZ(0px);
            filter: blur(8px);
            opacity: 0.7;
        }

        /* High-Definition Sculpted SVG Heart */
        .heart-sculpted-svg {
            width: 100%;
            height: 100%;
            filter: drop-shadow(0 15px 30px rgba(15, 23, 42, 0.15));
            transform-origin: center center;
        }

        /* 5. FLOATING LIVE VITALS HUD CARD (CATH LAB / CCU) */
        .cardiac-hud-card {
            position: absolute;
            top: 10px;
            left: -35px;
            z-index: 5;
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(16px);
            border: 2px solid rgba(254, 202, 202, 0.95);
            box-shadow: 0 20px 45px rgba(225, 29, 72, 0.16), 0 8px 24px rgba(15, 23, 42, 0.08);
            border-radius: 20px;
            padding: 14px 18px;
            min-width: 275px;
            animation: floatHud1 5s ease-in-out infinite alternate;
            transition: all 0.3s ease;
        }

        .cardiac-hud-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 25px 55px rgba(225, 29, 72, 0.24);
        }

        @keyframes floatHud1 {
            0% { transform: translateY(0); }
            100% { transform: translateY(-10px); }
        }

        .hud-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
            padding-bottom: 6px;
            border-bottom: 1px solid #fee2e2;
        }

        .hud-title {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            font-size: 11px;
            font-weight: 800;
            color: #dc2626;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .hud-live-beacon {
            width: 8px;
            height: 8px;
            background: #ef4444;
            border-radius: 50%;
            box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.8);
            animation: beaconPulse 1.4s infinite;
        }

        @keyframes beaconPulse {
            0% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.8); }
            70% { box-shadow: 0 0 0 9px rgba(239, 68, 68, 0); }
            100% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0); }
        }

        .hud-tag {
            font-size: 10.5px;
            font-weight: 700;
            color: #0284c7;
            background: #f0f9ff;
            padding: 2px 8px;
            border-radius: 50px;
            border: 1px solid #bae6fd;
        }

        .hud-main {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .hud-rate-box {
            display: flex;
            align-items: baseline;
            gap: 5px;
        }

        .hud-rate-num {
            font-size: 28px;
            font-weight: 800;
            color: #0f172a;
            line-height: 1;
        }

        .hud-rate-unit {
            font-size: 13px;
            font-weight: 800;
            color: #dc2626;
        }

        .hud-rhythm-badge {
            font-size: 11px;
            font-weight: 700;
            color: #059669;
            background: #ecfdf5;
            padding: 4px 10px;
            border-radius: 50px;
            border: 1px solid #a7f3d0;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .hud-rhythm-dot {
            width: 6px;
            height: 6px;
            background: #10b981;
            border-radius: 50%;
        }

        /* Cath Lab OLED Oscilloscope Monitor */
        .hud-ecg-screen {
            width: 100%;
            height: 44px;
            background: linear-gradient(180deg, #091322 0%, #030811 100%);
            border-radius: 10px;
            padding: 3px 6px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            box-shadow: inset 0 2px 8px rgba(0, 0, 0, 0.8), 0 0 0 1px rgba(16, 185, 129, 0.35);
        }

        .hud-ecg-grid {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: 
                linear-gradient(rgba(16, 185, 129, 0.12) 1px, transparent 1px),
                linear-gradient(90deg, rgba(16, 185, 129, 0.12) 1px, transparent 1px);
            background-size: 12px 12px;
            pointer-events: none;
        }

        .hud-ecg-svg {
            width: 100%;
            height: 100%;
            position: relative;
            z-index: 2;
        }

        .hud-ecg-path {
            fill: none;
            stroke: #10b981;
            stroke-width: 2.2;
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke-dasharray: 200;
            stroke-dashoffset: 200;
            animation: ecgDashSweep 2.2s linear infinite;
            filter: drop-shadow(0 0 4px #10b981) drop-shadow(0 0 8px rgba(16, 185, 129, 0.6));
        }

        @keyframes ecgDashSweep {
            0% { stroke-dashoffset: 200; }
            100% { stroke-dashoffset: 0; }
        }

        .hud-laser-bar {
            position: absolute;
            top: 0; bottom: 0;
            width: 8px;
            background: linear-gradient(90deg, transparent 0%, rgba(16, 185, 129, 0.9) 80%, #ffffff 100%);
            box-shadow: 0 0 10px #10b981;
            z-index: 3;
            animation: laserScanSweep 2.2s linear infinite;
            pointer-events: none;
        }

        @keyframes laserScanSweep {
            0% { left: -5%; }
            100% { left: 105%; }
        }

        .hud-metrics-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 10px;
            padding-top: 6px;
        }

        .hud-metric-item {
            font-size: 11px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            color: #334155;
        }
        .hud-metric-item.spo2 i { color: #0284c7; }
        .hud-metric-item.bp i { color: #10b981; }
        .hud-metric-item.temp i { color: #f59e0b; }

        /* 6. FLOATING BOTTOM BADGES (ACCREDITATION & SPECIALISTS) */
        .hud-spec-badge {
            position: absolute;
            bottom: 25px;
            right: -25px;
            z-index: 5;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(14px);
            border: 1.5px solid #bae6fd;
            border-radius: 18px;
            padding: 12px 18px;
            box-shadow: 0 15px 35px rgba(2, 132, 199, 0.16), 0 5px 15px rgba(15, 23, 42, 0.05);
            display: flex;
            align-items: center;
            gap: 12px;
            animation: floatSpecBadge 5.5s ease-in-out infinite alternate -2s;
            transition: all 0.3s ease;
        }

        .hud-spec-badge:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 20px 45px rgba(2, 132, 199, 0.25);
        }

        @keyframes floatSpecBadge {
            0% { transform: translateY(0); }
            100% { transform: translateY(-12px); }
        }

        .hud-spec-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            box-shadow: 0 6px 16px rgba(2, 132, 199, 0.35);
        }

        .hud-spec-info h5 {
            font-size: 14.5px;
            font-weight: 800;
            color: #0f172a;
            margin: 0 0 2px;
        }
        .hud-spec-info span {
            font-size: 11.5px;
            color: #64748b;
            font-weight: 600;
        }

        .hud-cath-pill {
            position: absolute;
            bottom: -15px;
            left: 20px;
            z-index: 5;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(14px);
            border: 1.5px solid #e2e8f0;
            border-radius: 50px;
            padding: 9px 20px;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.09);
            display: inline-flex;
            align-items: center;
            gap: 9px;
            animation: floatCathPill 4.5s ease-in-out infinite alternate -1s;
        }

        @keyframes floatCathPill {
            0% { transform: translateY(0); }
            100% { transform: translateY(-8px); }
        }

        .hud-cath-pill i {
            color: #e11d48;
            font-size: 15px;
        }
        .hud-cath-pill span {
            font-size: 12.5px;
            font-weight: 800;
            color: #0f172a;
        }

        /* -------------------------------------------------------------
           2. QUICK SERVICES / CLINICAL PILLARS (4 CARDS)
           ------------------------------------------------------------- */
        .home-pillars-section {
            position: relative;
            margin-top: -60px;
            z-index: 10;
            padding-bottom: 60px;
        }

        .pillar-card {
            background: #ffffff;
            border-radius: var(--radius-lg);
            padding: 28px 24px;
            border: 1px solid rgba(226, 232, 240, 0.9);
            box-shadow: var(--shadow-card);
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .pillar-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-hover);
            border-color: rgba(105, 39, 92, 0.35);
        }

        .pillar-icon-box {
            width: 58px;
            height: 58px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 18px;
            transition: transform 0.3s ease;
        }

        .pillar-card:hover .pillar-icon-box {
            transform: scale(1.1) rotate(4deg);
        }

        .p-icon-1 { background: rgba(105, 39, 92, 0.1); color: #69275c; }
        .p-icon-2 { background: rgba(0, 168, 150, 0.1); color: #00a896; }
        .p-icon-3 { background: rgba(2, 132, 199, 0.1); color: #0284c7; }
        .p-icon-4 { background: rgba(245, 158, 11, 0.1); color: #f59e0b; }

        .pillar-card h4 {
            font-size: 18px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .pillar-card p {
            font-size: 13.5px;
            color: #64748b;
            line-height: 1.6;
            margin: 0;
        }

        /* -------------------------------------------------------------
           3. ABOUT HOSPITAL SECTION
           ------------------------------------------------------------- */
        .home-about-section {
            padding: 60px 0 90px;
            background: #ffffff;
            position: relative;
        }

        .about-visual-wrap {
            position: relative;
            padding-right: 20px;
        }

        .about-img-main {
            border-radius: 24px;
            box-shadow: 0 20px 50px rgba(15, 23, 42, 0.12);
            width: 100%;
            height: auto;
            border: 4px solid #ffffff;
        }

        .about-exp-badge {
            position: absolute;
            bottom: -25px;
            right: 10px;
            background: linear-gradient(135deg, #69275c 0%, #00a896 100%);
            color: #ffffff;
            padding: 22px 26px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(105, 39, 92, 0.35);
            text-align: center;
        }

        .about-exp-badge h3 {
            font-size: 32px;
            font-weight: 800;
            color: #ffffff;
            margin: 0;
            line-height: 1;
        }

        .about-exp-badge span {
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            color: #e2e8f0;
        }

        .about-pill-label {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(105, 39, 92, 0.08);
            color: #69275c;
            border: 1px solid rgba(105, 39, 92, 0.15);
            padding: 5px 14px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 14px;
        }

        .about-heading {
            font-size: 38px;
            font-weight: 800;
            line-height: 1.25;
            color: #0f172a;
            margin-bottom: 18px;
        }

        .about-desc {
            font-size: 15.5px;
            color: #475569;
            line-height: 1.7;
            margin-bottom: 24px;
        }

        .about-feature-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
            margin-bottom: 30px;
        }

        .about-feat-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            font-weight: 600;
            color: #1e293b;
        }

        .about-feat-item i {
            color: #00a896;
            font-size: 16px;
        }

        /* -------------------------------------------------------------
           4. SUPER SPECIALITY DEPARTMENTS SHOWCASE
           ------------------------------------------------------------- */
        .home-dept-section {
            padding: 85px 0;
            background: #f8fafc;
        }

        .section-header-center {
            text-align: center;
            max-width: 680px;
            margin: 0 auto 50px;
        }

        .section-header-center h2 {
            font-size: 36px;
            font-weight: 800;
            color: #0f172a;
            margin: 10px 0 14px;
        }

        .section-header-center p {
            font-size: 15.5px;
            color: #64748b;
            line-height: 1.6;
        }

        .dept-showcase-card {
            background: #ffffff;
            border-radius: var(--radius-lg);
            border: 1px solid rgba(226, 232, 240, 0.85);
            box-shadow: var(--shadow-card);
            overflow: hidden;
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .dept-showcase-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-hover);
            border-color: rgba(105, 39, 92, 0.3);
        }

        .dept-card-top {
            padding: 24px 24px 16px;
        }

        .dept-icon-circle {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 16px;
            background: rgba(105, 39, 92, 0.08);
            color: #69275c;
            transition: transform 0.25s ease;
        }

        .dept-showcase-card:hover .dept-icon-circle {
            background: #69275c;
            color: #ffffff;
            transform: scale(1.08);
        }

        .dept-card-top h4 {
            font-size: 19px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .dept-card-top p {
            font-size: 13.5px;
            color: #64748b;
            line-height: 1.6;
            margin: 0;
        }

        .dept-card-footer {
            padding: 16px 24px 22px;
            border-top: 1px solid #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .dept-card-link {
            font-size: 13px;
            font-weight: 700;
            color: #69275c;
            text-decoration: none !important;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: gap 0.2s ease;
        }

        .dept-card-link:hover {
            gap: 9px;
            color: #00a896;
        }

        /* -------------------------------------------------------------
           5. TRUST & IMPACT METRICS STRIP
           ------------------------------------------------------------- */
        .home-trust-strip {
            background: linear-gradient(135deg, #091124 0%, #151d3b 60%, #2a1228 100%);
            color: #ffffff;
            padding: 60px 0;
            position: relative;
        }

        .metric-card {
            text-align: center;
            padding: 10px;
        }

        .metric-card h3 {
            font-size: 42px;
            font-weight: 800;
            color: #ffffff;
            margin: 0;
            line-height: 1.1;
        }

        .metric-card h3 span {
            color: #38bdf8;
        }

        .metric-card p {
            font-size: 14px;
            font-weight: 600;
            color: #94a3b8;
            margin: 6px 0 0;
        }

        /* -------------------------------------------------------------
           6. EMERGENCY & ONLINE BOOKING CALLOUT
           ------------------------------------------------------------- */
        .home-emergency-section {
            padding: 80px 0;
            background: #ffffff;
        }

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

        .emergency-banner-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 45px rgba(15, 23, 42, 0.18);
        }

        .emergency-box-1 {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 60%, #b91c1c 100%);
        }

        .emergency-box-2 {
            background: linear-gradient(135deg, #69275c 0%, #831843 60%, #00a896 100%);
        }

        .emergency-banner-box h3 {
            font-size: 24px;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 10px;
        }

        .emergency-banner-box p {
            font-size: 14.5px;
            color: #e2e8f0;
            line-height: 1.5;
            margin-bottom: 24px;
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

        .btn-emergency-action:hover {
            transform: scale(1.04);
            background: #f8fafc;
            color: #69275c !important;
        }

        @media (max-width: 991px) {
            .hero-heading { font-size: 38px; }
            .hero-heart-stage-wrap {
                margin-top: 45px;
                min-height: 440px;
            }
            .cardiac-hud-card {
                left: 0;
                top: 0;
                min-width: 250px;
            }
            .hud-spec-badge {
                right: 0;
                bottom: 10px;
            }
            .home-pillars-section { margin-top: 20px; }
            .about-visual-wrap { margin-bottom: 40px; }
            .emergency-banner-box { margin-bottom: 24px; }
        }

        @media (max-width: 576px) {
            .home-hero-section { padding: 60px 0 80px; }
            .hero-heading { font-size: 30px; }
            .hero-heart-stage-wrap {
                min-height: 380px;
                transform: scale(0.88);
            }
            .hero-cta-group { flex-direction: column; align-items: stretch; }
            .btn-hero-primary, .btn-hero-secondary { justify-content: center; }
            .about-feature-grid { grid-template-columns: 1fr; }
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
    @include('partials.header', ['active' => 'home'])
    <!-- Header Navigation End -->

    <div class="loaded" id="content">

        <!-- 1. Hero Showcase Section with Animated Medical Background -->
        <section class="home-hero-section">
            <!-- 3D Morphing Light Orbs -->
            <div class="hero-glow-orb hero-glow-1"></div>
            <div class="hero-glow-orb hero-glow-2"></div>
            <div class="hero-glow-orb hero-glow-3"></div>

            <!-- Ambient Grid Pattern & Scanning Laser Line -->
            <div class="hero-grid-pattern"></div>
            <div class="hero-scanline"></div>

            <!-- Floating Translucent Medical Crosses & Molecules -->
            <div class="hero-floating-elements">
                <span class="hero-float-item p1"><i class="fa fa-plus"></i></span>
                <span class="hero-float-item p2"><i class="fa fa-heart"></i></span>
                <span class="hero-float-item p3"><i class="fa fa-medkit"></i></span>
                <span class="hero-float-item p4"><i class="fa fa-plus"></i></span>
                <span class="hero-float-item p5"><i class="fa fa-shield"></i></span>
                <span class="hero-float-item p6"><i class="fa fa-plus"></i></span>
                <span class="hero-float-item p7"><i class="fa fa-heartbeat"></i></span>
            </div>

            <!-- Full-Width Background Running ECG Pulse Wave -->
            <div class="hero-bg-ecg-stream">
                <svg class="bg-ecg-svg" viewBox="0 0 1200 60" preserveAspectRatio="none">
                    <defs>
                        <linearGradient id="heroEcgGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                            <stop offset="0%" stop-color="#69275c" stop-opacity="0.3" />
                            <stop offset="25%" stop-color="#0284c7" stop-opacity="0.7" />
                            <stop offset="50%" stop-color="#10b981" stop-opacity="0.9" />
                            <stop offset="75%" stop-color="#0284c7" stop-opacity="0.7" />
                            <stop offset="100%" stop-color="#69275c" stop-opacity="0.3" />
                        </linearGradient>
                    </defs>
                    <path class="bg-ecg-path" d="M0,30 L160,30 L175,22 L185,38 L195,30 L240,30 L255,8 L270,52 L285,15 L298,36 L308,30 L460,30 L475,22 L485,38 L495,30 L540,30 L555,8 L570,52 L585,15 L598,36 L608,30 L760,30 L775,22 L785,38 L795,30 L840,30 L855,8 L870,52 L885,15 L898,36 L908,30 L1060,30 L1075,22 L1085,38 L1095,30 L1140,30 L1155,8 L1170,52 L1185,15 L1198,36 L1200,30" />
                </svg>
            </div>

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-7 hero-content-col">
                        <div class="hero-live-pill">
                            <span class="pulse-live-ring"></span>
                            <span>NABH Accredited &bull; 24/7 Super Speciality Hospital</span>
                        </div>
                        <h1 class="hero-heading">
                            Advanced Healthcare with <br>
                            <span class="text-gradient">Compassionate Care.</span>
                        </h1>
                        <p class="hero-description">
                            KK Patel Super Speciality Hospital brings world-class medical expertise, modern surgical infrastructure, and comprehensive diagnostic facilities directly to Bhuj, Kutch.
                        </p>
                        <div class="hero-cta-group">
                            <a href="{{ url('appointment') }}" class="btn-hero-primary">
                                <i class="fa fa-calendar-check-o"></i> Book Appointment
                            </a>
                            <a href="{{ url('Doctors') }}" class="btn-hero-secondary">
                                <i class="fa fa-user-md"></i> Find Specialist Doctor
                            </a>
                        </div>
                        <div>
                            <a href="tel:02832236000" class="hero-tel-link">
                                <i class="fa fa-phone text-danger"></i> 24/7 Emergency Helpline: <strong>02832 236000</strong>
                            </a>
                        </div>
                    </div>

                    <!-- Right Column: DASHING 3D ROTATING LIVE BEATING HEART CENTERPIECE (NO GIRL DOCTOR IMAGE) -->
                    <div class="col-12 col-lg-5 hero-heart-stage-wrap d-flex">
                        <!-- 1. Ambient Glowing Plasma Energy Field -->
                        <div class="heart-plasma-aura"></div>

                        <!-- 2. Concentric Arterial Pulse Shockwaves -->
                        <div class="heart-shockwave shockwave-1"></div>
                        <div class="heart-shockwave shockwave-2"></div>
                        <div class="heart-shockwave shockwave-3"></div>

                        <!-- 3. 3D Holographic Gyroscope Orbit Rings -->
                        <div class="gyro-ring gyro-ring-1"></div>
                        <div class="gyro-ring gyro-ring-2"></div>
                        <div class="gyro-ring gyro-ring-3"></div>

                        <!-- 4. GRAND 3D ROTATING & BEATING HEART SCENE -->
                        <div class="heart-3d-scene">
                            <!-- 3D Continuous Space Rotator -->
                            <div class="heart-3d-rotator">
                                <!-- Powerful Beating Core with Physiological Systolic/Diastolic Lub-Dub -->
                                <div class="heart-beating-core">

                                    <!-- Front 3D Anatomical Heart Face -->
                                    <div class="heart-3d-face heart-face-front">
                                        <svg class="heart-sculpted-svg" viewBox="0 0 100 100" fill="none">
                                            <defs>
                                                <!-- Ventricular Gradient Depth -->
                                                <radialGradient id="vMyoGradFront" cx="35%" cy="32%" r="68%">
                                                    <stop offset="0%" stop-color="#ff3366" />
                                                    <stop offset="30%" stop-color="#e11d48" />
                                                    <stop offset="70%" stop-color="#be123c" />
                                                    <stop offset="95%" stop-color="#881337" />
                                                    <stop offset="100%" stop-color="#4c0519" />
                                                </radialGradient>
                                                <!-- Aortic Arch Metallic Crimson -->
                                                <linearGradient id="aortaArchGradFront" x1="0%" y1="0%" x2="100%" y2="100%">
                                                    <stop offset="0%" stop-color="#fda4af" />
                                                    <stop offset="35%" stop-color="#e11d48" />
                                                    <stop offset="75%" stop-color="#9f1239" />
                                                    <stop offset="100%" stop-color="#4c0519" />
                                                </linearGradient>
                                                <!-- Pulmonary Trunk Cyan / Azure Hue -->
                                                <linearGradient id="pulmonaryGradFront" x1="0%" y1="0%" x2="100%" y2="100%">
                                                    <stop offset="0%" stop-color="#38bdf8" />
                                                    <stop offset="60%" stop-color="#0284c7" />
                                                    <stop offset="100%" stop-color="#0c4a6e" />
                                                </linearGradient>
                                                <!-- Specular Muscle Glint -->
                                                <linearGradient id="specularGlint" x1="0%" y1="0%" x2="80%" y2="80%">
                                                    <stop offset="0%" stop-color="#ffffff" stop-opacity="0.75" />
                                                    <stop offset="50%" stop-color="#ffffff" stop-opacity="0.1" />
                                                    <stop offset="100%" stop-color="#ffffff" stop-opacity="0" />
                                                </linearGradient>
                                            </defs>

                                            <!-- Superior Vena Cava & Aorta Branches -->
                                            <path d="M42 12 C42 6, 52 5, 52 14 L52 24 L42 24 Z" fill="url(#aortaArchGradFront)"/>
                                            <path d="M52 10 C56 5, 68 8, 64 16 L58 24 Z" fill="url(#aortaArchGradFront)"/>
                                            <!-- Pulmonary Artery Arch -->
                                            <path d="M34 16 C30 11, 38 7, 44 14 L42 25 L34 24 Z" fill="url(#pulmonaryGradFront)"/>
                                            <!-- Main Aorta Curve Arch -->
                                            <path d="M38 18 C38 10, 58 8, 60 22 C56 26, 44 26, 38 18 Z" fill="url(#aortaArchGradFront)"/>

                                            <!-- Main Anatomical Ventricles Muscle Body -->
                                            <path d="M50 88 C38 78, 14 62, 14 38 C14 23, 26 15, 39 19 C44 21, 48 24, 50 28 C52 24, 56 21, 61 19 C74 15, 86 23, 86 38 C86 62, 62 78, 50 88 Z" fill="url(#vMyoGradFront)"/>

                                            <!-- Muscle Specular Highlight Crest -->
                                            <path d="M28 22 C20 25, 18 34, 20 46 C22 36, 26 28, 36 24 C33 22, 30 22, 28 22 Z" fill="url(#specularGlint)"/>

                                            <!-- Glowing Coronary Artery Tree -->
                                            <path d="M48 26 Q46 44, 52 64" stroke="#fecdd3" stroke-width="2.5" stroke-linecap="round" fill="none" opacity="0.9" filter="drop-shadow(0 0 3px #fb7185)"/>
                                            <path d="M47 38 Q36 46, 32 58" stroke="#fecdd3" stroke-width="1.8" stroke-linecap="round" fill="none" opacity="0.85"/>
                                            <path d="M49 48 Q58 54, 64 62" stroke="#fecdd3" stroke-width="1.8" stroke-linecap="round" fill="none" opacity="0.85"/>
                                            <path d="M51 60 Q48 70, 50 78" stroke="#fda4af" stroke-width="1.4" stroke-linecap="round" fill="none" opacity="0.75"/>

                                            <!-- Cyan Deoxygenated Vascular Branch -->
                                            <path d="M52 30 Q62 36, 68 48" stroke="#38bdf8" stroke-width="1.6" stroke-linecap="round" fill="none" opacity="0.8" filter="drop-shadow(0 0 2px #0284c7)"/>

                                            <!-- Radiant Core Life Star -->
                                            <circle cx="48" cy="38" r="3" fill="#ffffff" filter="drop-shadow(0 0 8px #ffffff)"/>
                                        </svg>
                                    </div>

                                    <!-- Back 3D Anatomical Heart Face (Visible on 3D rotation) -->
                                    <div class="heart-3d-face heart-face-back">
                                        <svg class="heart-sculpted-svg" viewBox="0 0 100 100" fill="none">
                                            <defs>
                                                <radialGradient id="vMyoGradBack" cx="45%" cy="32%" r="68%">
                                                    <stop offset="0%" stop-color="#fb7185" />
                                                    <stop offset="35%" stop-color="#e11d48" />
                                                    <stop offset="75%" stop-color="#9f1239" />
                                                    <stop offset="100%" stop-color="#4c0519" />
                                                </radialGradient>
                                            </defs>
                                            <!-- Posterior Vena Cava -->
                                            <path d="M45 10 C42 5, 54 5, 52 14 L52 24 L45 24 Z" fill="#9f1239"/>
                                            <!-- Posterior Ventricle Body -->
                                            <path d="M50 88 C38 78, 14 62, 14 38 C14 23, 26 15, 39 19 C44 21, 48 24, 50 28 C52 24, 56 21, 61 19 C74 15, 86 23, 86 38 C86 62, 62 78, 50 88 Z" fill="url(#vMyoGradBack)"/>
                                            <!-- Posterior Sulcus & Vessels -->
                                            <path d="M50 28 Q52 50, 50 82" stroke="#fda4af" stroke-width="2" stroke-linecap="round" fill="none" opacity="0.8"/>
                                            <path d="M51 42 Q60 50, 66 60" stroke="#fda4af" stroke-width="1.5" stroke-linecap="round" fill="none" opacity="0.75"/>
                                            <path d="M49 54 Q40 60, 34 70" stroke="#fda4af" stroke-width="1.5" stroke-linecap="round" fill="none" opacity="0.75"/>
                                        </svg>
                                    </div>

                                    <!-- Deep Glow Core Layer -->
                                    <div class="heart-3d-face heart-face-core">
                                        <svg class="heart-sculpted-svg" viewBox="0 0 100 100" fill="none">
                                            <path d="M50 86 C38 76, 16 60, 16 38 C16 24, 28 16, 40 20 C45 22, 48 25, 50 28 C52 25, 55 22, 60 20 C72 16, 84 24, 84 38 C84 60, 62 76, 50 86 Z" fill="#ff0055"/>
                                        </svg>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- 5. FLOATING LIVE VITALS HUD CARD (CATH LAB / CCU) -->
             

                        <!-- 6. Floating Specialist Badge -->
                      

                        <!-- 7. Floating Cath Lab Pill -->
                        
                    </div>
                </div>
            </div>
        </section>

        <!-- 2. Four Clinical Pillars -->
        <section class="home-pillars-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="pillar-card">
                            <div>
                                <div class="pillar-icon-box p-icon-1">
                                    <i class="fa fa-ambulance"></i>
                                </div>
                                <h4>24/7 Emergency Care</h4>
                                <p>Rapid trauma resuscitation, acute cardiac care, and fully equipped intensive care ambulances available round the clock.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="pillar-card">
                            <div>
                                <div class="pillar-icon-box p-icon-2">
                                    <i class="fa fa-heartbeat"></i>
                                </div>
                                <h4>Advanced Cath Lab</h4>
                                <p>Precision interventional cardiology, coronary angioplasty, and pacemaker implantations performed by renowned cardiologists.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="pillar-card">
                            <div>
                                <div class="pillar-icon-box p-icon-3">
                                    <i class="fa fa-hospital-o"></i>
                                </div>
                                <h4>Modular OTs</h4>
                                <p>Ultra-sterile laminar airflow operating suites engineered for complex joint replacements, neurosurgery, and oncological resections.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="pillar-card">
                            <div>
                                <div class="pillar-icon-box p-icon-4">
                                    <i class="fa fa-eye"></i>
                                </div>
                                <h4>128-Slice Cardiac CT</h4>
                                <p>Next-generation non-invasive diagnostic imaging with AI motion-correction delivering crystal clear scans in seconds.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. About KK Patel Hospital Overview -->
        <section class="home-about-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-6 mb-5 mb-lg-0">
                        <div class="about-visual-wrap">
                            <img src="{{ URL::to('/') }}/img/about/2.png" alt="Hospital Campus" class="about-img-main">
                            <div class="about-exp-badge">
                                <h3>25+</h3>
                                <span>Years of Trust</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="about-pill-label">
                            <i class="fa fa-shield"></i> About KK Patel Hospital
                        </div>
                        <h2 class="about-heading">
                            Dedicated to Delivering the Highest Quality Medical Care
                        </h2>
                        <p class="about-desc">
                            Shree Kutchi Leva Patel Education and Medical Trust established KK Patel Super Speciality Hospital to fulfill the healthcare needs of Kutch with dignity, cutting-edge technology, and patient-first ethics.
                        </p>
                        <div class="about-feature-grid">
                            <div class="about-feat-item">
                                <i class="fa fa-check-circle"></i> 13-Acre Large Modern Campus
                            </div>
                            <div class="about-feat-item">
                                <i class="fa fa-check-circle"></i> 200+ Bedded Tertiary Hospital
                            </div>
                            <div class="about-feat-item">
                                <i class="fa fa-check-circle"></i> Linear Accelerator Radiation
                            </div>
                            <div class="about-feat-item">
                                <i class="fa fa-check-circle"></i> Round the Clock Pharmacy & Lab
                            </div>
                        </div>
                        <a href="{{ url('about') }}" class="btn-hero-primary" style="padding: 12px 28px;">
                            Learn More About Us &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. Key Departments Preview -->
        <section class="home-dept-section">
            <div class="container">
                <div class="section-header-center">
                    <div class="about-pill-label">
                        <i class="fa fa-stethoscope"></i> Clinical Specialties
                    </div>
                    <h2>World-Class Healthcare Departments</h2>
                    <p>Our super-speciality departments are headed by eminent specialists and equipped with advanced diagnostic and treatment modalities.</p>
                </div>

                <div class="row">
                    <!-- Cardiology -->
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="dept-showcase-card">
                            <div class="dept-card-top">
                                <div class="dept-icon-circle">
                                    <i class="fa fa-heartbeat"></i>
                                </div>
                                <h4>Cardiology & Cath Lab</h4>
                                <p>Comprehensive cardiac care including angioplasty, pacemaker implantation, echocardiography, and 24/7 acute coronary management.</p>
                            </div>
                            <div class="dept-card-footer">
                                <a href="{{ url('appointment') }}?dept=Cardiologist" class="dept-card-link">
                                    Book Consultation <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Oncology -->
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="dept-showcase-card">
                            <div class="dept-card-top">
                                <div class="dept-icon-circle">
                                    <i class="fa fa-shield"></i>
                                </div>
                                <h4>Oncology & Cancer Care</h4>
                                <p>Multidisciplinary cancer center offering medical oncology, surgical oncology, and advanced Linear Accelerator radiation therapy.</p>
                            </div>
                            <div class="dept-card-footer">
                                <a href="{{ url('appointment') }}?dept=oncology" class="dept-card-link">
                                    Book Consultation <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Orthopaedics -->
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="dept-showcase-card">
                            <div class="dept-card-top">
                                <div class="dept-icon-circle">
                                    <i class="fa fa-medkit"></i>
                                </div>
                                <h4>Orthopaedics & Joint Care</h4>
                                <p>High-precision total knee and hip replacements, arthroscopy, complex fracture management, and comprehensive spine surgery.</p>
                            </div>
                            <div class="dept-card-footer">
                                <a href="{{ url('appointment') }}?dept=orthopaedics" class="dept-card-link">
                                    Book Consultation <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Nephrology -->
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="dept-showcase-card">
                            <div class="dept-card-top">
                                <div class="dept-icon-circle">
                                    <i class="fa fa-tint"></i>
                                </div>
                                <h4>Nephrology & Dialysis</h4>
                                <p>State-of-the-art dialysis suites, acute kidney injury therapy, and dedicated management of chronic renal ailments.</p>
                            </div>
                            <div class="dept-card-footer">
                                <a href="{{ url('appointment') }}?dept=nephrology" class="dept-card-link">
                                    Book Consultation <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Neuro Sciences -->
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="dept-showcase-card">
                            <div class="dept-card-top">
                                <div class="dept-icon-circle">
                                    <i class="fa fa-user-md"></i>
                                </div>
                                <h4>Urology & Nephro Surgery</h4>
                                <p>Advanced minimally invasive laser stone management, prostate treatment, and reconstructive urological procedures.</p>
                            </div>
                            <div class="dept-card-footer">
                                <a href="{{ url('appointment') }}?dept=urology" class="dept-card-link">
                                    Book Consultation <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Physiotherapy -->
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="dept-showcase-card">
                            <div class="dept-card-top">
                                <div class="dept-icon-circle">
                                    <i class="fa fa-child"></i>
                                </div>
                                <h4>Physiotherapy & Rehab</h4>
                                <p>Comprehensive post-surgical rehabilitation, sports physiotherapy, neuro-rehab, and ergonomic spine health management.</p>
                            </div>
                            <div class="dept-card-footer">
                                <a href="{{ url('appointment') }}?dept=Physiotherapist" class="dept-card-link">
                                    Book Consultation <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-3">
                    <a href="{{ url('Department') }}" class="btn-hero-primary" style="padding: 12px 30px;">
                        View All Departments &rarr;
                    </a>
                </div>
            </div>
        </section>

        <!-- 5. Trust & Impact Strip -->
        <section class="home-trust-strip">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="metric-card">
                            <h3>50,000<span>+</span></h3>
                            <p>Patients Treated</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="metric-card">
                            <h3>50<span>+</span></h3>
                            <p>Specialist Doctors</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="metric-card">
                            <h3>200<span>+</span></h3>
                            <p>Hospital Beds</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="metric-card">
                            <h3>24/7<span></span></h3>
                            <p>Emergency Support</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 6. Emergency & Appointment Callout -->
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
