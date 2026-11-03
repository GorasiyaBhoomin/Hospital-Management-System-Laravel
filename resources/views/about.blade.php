<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>About Us | KK Patel Super Speciality Hospital</title>
    <meta name="description" content="Learn about KK Patel Super Speciality Hospital, our vision, mission, state-of-the-art 13-acre campus, and healthcare services in Bhuj, Kutch.">
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

    <!-- Premium About Page Styles & Dynamic Animations -->
    <style>
        :root {
            --abt-primary: #69275c;
            --abt-primary-dark: #501d46;
            --abt-primary-light: #fbf5fa;
            --abt-teal: #00a896;
            --abt-teal-light: #e6f7f5;
            --abt-blue: #0284c7;
            --abt-blue-light: #e0f2fe;
            --abt-emerald: #10b981;
            --abt-amber: #f59e0b;
            --abt-dark: #0f172a;
            --abt-gray: #475569;
            --abt-light-bg: #f8fafc;
            --abt-border: #e2e8f0;
            --abt-radius-xl: 26px;
            --abt-radius-lg: 18px;
            --abt-radius-md: 12px;
            --abt-shadow-soft: 0 10px 30px -4px rgba(15, 23, 42, 0.06), 0 4px 10px -2px rgba(15, 23, 42, 0.03);
            --abt-shadow-card: 0 18px 40px -8px rgba(105, 39, 92, 0.12), 0 6px 16px -4px rgba(15, 23, 42, 0.04);
            --abt-shadow-hover: 0 25px 50px -12px rgba(105, 39, 92, 0.22), 0 10px 24px -6px rgba(15, 23, 42, 0.08);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            color: #334155;
            background-color: #ffffff;
            overflow-x: hidden;
        }

        /* -------------------------------------------------------------
           1. MODERN AIRY HERO BANNER (100% LIGHT MEDICAL THEME)
           ------------------------------------------------------------- */
        .about-hero-section {
            position: relative;
            background: linear-gradient(135deg, #f0f7ff 0%, #ffffff 45%, #fbf5fa 100%);
            padding: 85px 0 95px;
            overflow: hidden;
            border-bottom: 1px solid #e2e8f0;
        }

        .hero-mesh-blob {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            filter: blur(80px);
            z-index: 0;
            opacity: 0.55;
            animation: heroBlobMotion 12s ease-in-out infinite alternate;
        }

        .hero-mesh-1 {
            top: -60px;
            left: -40px;
            width: 480px;
            height: 480px;
            background: radial-gradient(circle, rgba(105, 39, 92, 0.2) 0%, rgba(105, 39, 92, 0) 70%);
        }

        .hero-mesh-2 {
            bottom: -70px;
            right: -50px;
            width: 520px;
            height: 520px;
            background: radial-gradient(circle, rgba(2, 132, 199, 0.22) 0%, rgba(2, 132, 199, 0) 70%);
            animation-delay: -6s;
        }

        .hero-mesh-3 {
            top: 40%;
            left: 50%;
            width: 320px;
            height: 320px;
            background: radial-gradient(circle, rgba(0, 168, 150, 0.16) 0%, rgba(0, 168, 150, 0) 70%);
            transform: translate(-50%, -50%);
            animation-delay: -3s;
        }

        @keyframes heroBlobMotion {
            0% { transform: scale(1) translate(0, 0); }
            50% { transform: scale(1.12) translate(20px, -15px); }
            100% { transform: scale(0.95) translate(-15px, 20px); }
        }

        /* Ambient floating medical symbols */
        .ambient-cross {
            position: absolute;
            font-size: 20px;
            color: rgba(105, 39, 92, 0.15);
            font-weight: 800;
            pointer-events: none;
            user-select: none;
            animation: crossFloat 7s ease-in-out infinite alternate;
        }
        .cross-1 { top: 20%; left: 8%; animation-delay: 0s; font-size: 26px; }
        .cross-2 { top: 65%; left: 12%; animation-delay: -2s; font-size: 18px; color: rgba(2, 132, 199, 0.18); }
        .cross-3 { top: 25%; right: 10%; animation-delay: -3.5s; font-size: 24px; color: rgba(0, 168, 150, 0.18); }
        .cross-4 { top: 70%; right: 15%; animation-delay: -5s; font-size: 22px; color: rgba(105, 39, 92, 0.15); }

        @keyframes crossFloat {
            0% { transform: translateY(0) rotate(0deg); opacity: 0.3; }
            50% { transform: translateY(-16px) rotate(15deg); opacity: 0.75; }
            100% { transform: translateY(6px) rotate(-10deg); opacity: 0.3; }
        }

        .hero-pattern-grid {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: 
                linear-gradient(rgba(105, 39, 92, 0.035) 1px, transparent 1px),
                linear-gradient(90deg, rgba(105, 39, 92, 0.035) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
            opacity: 0.7;
        }

        .about-hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 860px;
            margin: 0 auto;
        }

        .about-hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            background: #ffffff;
            border: 1px solid rgba(105, 39, 92, 0.18);
            box-shadow: 0 4px 18px rgba(105, 39, 92, 0.07);
            padding: 7px 20px;
            border-radius: 50px;
            font-size: 13.5px;
            font-weight: 700;
            color: #69275c;
            margin-bottom: 22px;
            letter-spacing: 0.3px;
        }

        .pulse-beacon-dot {
            width: 9px;
            height: 9px;
            background: #10b981;
            border-radius: 50%;
            box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.8);
            animation: pulseBeacon 1.8s infinite;
        }

        @keyframes pulseBeacon {
            0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.8); }
            70% { box-shadow: 0 0 0 9px rgba(16, 185, 129, 0); }
            100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
        }

        .about-hero-title {
            font-size: 46px;
            font-weight: 800;
            line-height: 1.22;
            letter-spacing: -0.6px;
            color: #0f172a;
            margin-bottom: 18px;
        }

        .about-hero-title .brand-gradient-text {
            background: linear-gradient(135deg, #69275c 0%, #a22987 50%, #0284c7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .about-hero-desc {
            font-size: 17px;
            color: #475569;
            line-height: 1.68;
            margin-bottom: 28px;
            max-width: 740px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-breadcrumb-nav {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.85);
            padding: 6px 18px;
            border-radius: 50px;
            border: 1px solid #e2e8f0;
            font-size: 13px;
            font-weight: 600;
            color: #64748b;
        }

        .hero-breadcrumb-nav a {
            color: #69275c;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .hero-breadcrumb-nav a:hover {
            color: #0284c7;
        }

        /* -------------------------------------------------------------
           2. STORY & FOUNDING VISION SECTION (THE HIGHLIGHT SECTION)
           ------------------------------------------------------------- */
        .story-section {
            padding: 100px 0 95px;
            background: #ffffff;
            position: relative;
            overflow: hidden;
        }

        /* PHOTO STACK WITH MODERN ANIMATIONS */
        .photo-stack-wrapper {
            position: relative;
            padding: 20px 25px 35px 15px;
        }

        /* Ambient rotating medical ring behind photo */
        .photo-decor-ring {
            position: absolute;
            top: -20px;
            left: -20px;
            width: 280px;
            height: 280px;
            border: 2px dashed rgba(105, 39, 92, 0.2);
            border-radius: 50%;
            pointer-events: none;
            animation: rotateDecorRing 30s linear infinite;
            z-index: 1;
        }

        @keyframes rotateDecorRing {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Pulsing ambient halo */
        .photo-ambient-halo {
            position: absolute;
            top: 20%;
            left: 10%;
            width: 380px;
            height: 380px;
            background: radial-gradient(circle, rgba(105, 39, 92, 0.16) 0%, rgba(2, 132, 199, 0.12) 50%, rgba(255, 255, 255, 0) 75%);
            border-radius: 50%;
            filter: blur(40px);
            z-index: 1;
            pointer-events: none;
            animation: haloBreathe 6s ease-in-out infinite alternate;
        }

        @keyframes haloBreathe {
            0% { transform: scale(0.95); opacity: 0.6; }
            100% { transform: scale(1.15); opacity: 1; }
        }

        /* Main Photo Container */
        .main-photo-frame {
            position: relative;
            z-index: 2;
            border-radius: var(--abt-radius-xl);
            background: linear-gradient(135deg, rgba(105, 39, 92, 0.25) 0%, rgba(0, 168, 150, 0.25) 50%, rgba(2, 132, 199, 0.3) 100%);
            padding: 6px;
            box-shadow: 0 25px 60px -12px rgba(105, 39, 92, 0.22), 0 8px 24px -4px rgba(15, 23, 42, 0.08);
            animation: photoFloatGentle 6.5s ease-in-out infinite alternate;
            transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.5s ease;
        }

        .main-photo-frame:hover {
            transform: translateY(-8px) scale(1.015);
            box-shadow: 0 35px 70px -15px rgba(105, 39, 92, 0.32), 0 12px 30px -4px rgba(15, 23, 42, 0.12);
        }

        @keyframes photoFloatGentle {
            0% { transform: translateY(0); }
            100% { transform: translateY(-12px); }
        }

        .main-photo-inner {
            position: relative;
            border-radius: 22px;
            overflow: hidden;
            background: #f8fafc;
        }

        .main-photo-inner img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 22px;
            transition: transform 0.65s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .main-photo-frame:hover .main-photo-inner img {
            transform: scale(1.04);
        }

        /* Shimmer glare sweep on hover */
        .main-photo-inner::after {
            content: '';
            position: absolute;
            top: 0;
            left: -120%;
            width: 60%;
            height: 100%;
            background: linear-gradient(90deg, transparent 0%, rgba(255, 255, 255, 0.45) 50%, transparent 100%);
            transform: skewX(-25deg);
            transition: left 0.85s ease;
            pointer-events: none;
        }

        .main-photo-frame:hover .main-photo-inner::after {
            left: 180%;
        }

        /* FLOATING BADGE 1: Experience & Trust (Top Right) */
        .floating-badge-exp {
            position: absolute;
            top: 25px;
            right: -10px;
            z-index: 4;
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(14px);
            border-radius: 16px;
            padding: 14px 20px;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.14), 0 0 0 1px rgba(226, 232, 240, 0.8);
            display: flex;
            align-items: center;
            gap: 13px;
            animation: badgeBob1 5s ease-in-out infinite alternate;
            transition: transform 0.3s ease;
        }

        .floating-badge-exp:hover {
            transform: translateY(-6px) scale(1.04);
        }

        @keyframes badgeBob1 {
            0% { transform: translateY(0); }
            100% { transform: translateY(-10px); }
        }

        .exp-icon-box {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            box-shadow: 0 6px 16px rgba(245, 158, 11, 0.35);
        }

        .floating-badge-exp strong {
            display: block;
            font-size: 15.5px;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.2;
        }

        .floating-badge-exp span {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #64748b;
        }

        /* FLOATING BADGE 2: 13-Acre Campus & 200+ Beds (Bottom Left) */
        .floating-badge-campus {
            position: absolute;
            bottom: -15px;
            left: 0px;
            z-index: 4;
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(16px);
            border-radius: 18px;
            padding: 16px 22px;
            box-shadow: 0 20px 45px rgba(15, 23, 42, 0.16), 0 0 0 1px rgba(226, 232, 240, 0.9);
            display: flex;
            align-items: center;
            gap: 14px;
            animation: badgeBob2 5.8s ease-in-out infinite alternate-reverse;
            transition: transform 0.3s ease;
        }

        .floating-badge-campus:hover {
            transform: translateY(-6px) scale(1.03);
        }

        @keyframes badgeBob2 {
            0% { transform: translateY(0); }
            100% { transform: translateY(-12px); }
        }

        .campus-icon-box {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: linear-gradient(135deg, #00a896 0%, #059669 100%);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            box-shadow: 0 8px 18px rgba(0, 168, 150, 0.32);
        }

        .floating-badge-campus strong {
            display: block;
            font-size: 15px;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.25;
        }

        .floating-badge-campus span {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #64748b;
        }

        /* FLOATING PILL: Live Emergency Coverage */
        .floating-status-pill {
            position: absolute;
            bottom: 60px;
            right: -15px;
            z-index: 4;
            background: #ffffff;
            border: 1px solid rgba(239, 68, 68, 0.25);
            border-radius: 50px;
            padding: 8px 16px;
            box-shadow: 0 12px 28px rgba(239, 68, 68, 0.12);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 12.5px;
            font-weight: 700;
            color: #b91c1c;
            animation: badgeBob3 6.2s ease-in-out infinite alternate;
        }

        @keyframes badgeBob3 {
            0% { transform: translateY(0); }
            100% { transform: translateY(-8px); }
        }

        .red-dot-live {
            width: 8px;
            height: 8px;
            background: #ef4444;
            border-radius: 50%;
            box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7);
            animation: redPulse 1.6s infinite;
        }

        @keyframes redPulse {
            0% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7); }
            70% { box-shadow: 0 0 0 8px rgba(239, 68, 68, 0); }
            100% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0); }
        }

        /* CONTENT COLUMN STYLES */
        .story-content-col {
            padding-left: 20px;
        }

        .section-pill-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(105, 39, 92, 0.08);
            color: #69275c;
            border: 1px solid rgba(105, 39, 92, 0.18);
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 18px;
            letter-spacing: 0.3px;
        }

        .story-heading {
            font-size: 38px;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.25;
            letter-spacing: -0.5px;
            margin-bottom: 20px;
        }

        .story-heading .brand-highlight {
            background: linear-gradient(135deg, #69275c 0%, #0284c7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .story-lead-text {
            font-size: 16px;
            color: #475569;
            line-height: 1.7;
            margin-bottom: 18px;
        }

        /* 4-Card Clinical Feature Grid in Story Section */
        .about-features-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
            margin: 24px 0 32px;
        }

        .about-feature-item {
            background: #f8fafc;
            border: 1px solid #edf2f7;
            border-radius: var(--abt-radius-md);
            padding: 14px 16px;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .about-feature-item:hover {
            background: #ffffff;
            border-color: rgba(105, 39, 92, 0.28);
            box-shadow: 0 10px 24px -4px rgba(105, 39, 92, 0.1);
            transform: translateY(-3px);
        }

        .feat-icon-badge {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
            transition: transform 0.3s ease;
        }

        .about-feature-item:hover .feat-icon-badge {
            transform: scale(1.12);
        }

        .fb-1 { background: rgba(105, 39, 92, 0.12); color: #69275c; }
        .fb-2 { background: rgba(0, 168, 150, 0.12); color: #00a896; }
        .fb-3 { background: rgba(2, 132, 199, 0.12); color: #0284c7; }
        .fb-4 { background: rgba(245, 158, 11, 0.12); color: #d97706; }

        .about-feature-item strong {
            display: block;
            font-size: 13.5px;
            font-weight: 700;
            color: #0f172a;
            line-height: 1.3;
            margin-bottom: 2px;
        }

        .about-feature-item span {
            display: block;
            font-size: 11.5px;
            color: #64748b;
            line-height: 1.4;
        }

        /* -------------------------------------------------------------
           BUTTONS WITH WORLD-CLASS ANIMATIONS (THE CORE REQUEST)
           ------------------------------------------------------------- */
        .story-action-group {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
        }

        /* 1. PRIMARY ANIMATED CTA BUTTON */
        .btn-medical-primary {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            background: linear-gradient(135deg, #69275c 0%, #8c2374 50%, #0284c7 100%);
            background-size: 200% 200%;
            color: #ffffff !important;
            font-size: 14.5px;
            font-weight: 800;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            padding: 14px 32px;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            text-decoration: none !important;
            overflow: hidden;
            box-shadow: 0 12px 28px -4px rgba(105, 39, 92, 0.45), 0 0 18px rgba(2, 132, 199, 0.25);
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            animation: gradientShift 6s ease infinite;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Infinite light shimmer sweep */
        .btn-medical-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -150%;
            width: 60%;
            height: 100%;
            background: linear-gradient(90deg, transparent 0%, rgba(255, 255, 255, 0.4) 50%, transparent 100%);
            transform: skewX(-22deg);
            animation: btnLightSweep 3.2s cubic-bezier(0.4, 0, 0.2, 1) infinite;
            pointer-events: none;
        }

        @keyframes btnLightSweep {
            0% { left: -150%; }
            45%, 100% { left: 220%; }
        }

        .btn-medical-primary:hover {
            transform: translateY(-4px) scale(1.025);
            box-shadow: 0 20px 40px -6px rgba(105, 39, 92, 0.55), 0 0 28px rgba(2, 132, 199, 0.4);
            color: #ffffff !important;
        }

        .btn-medical-primary:active {
            transform: translateY(-1px) scale(0.99);
        }

        /* Bouncing calendar icon inside button */
        .btn-icon-hop {
            font-size: 16px;
            animation: iconHopAnim 2.2s ease-in-out infinite;
        }

        @keyframes iconHopAnim {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-3px); }
        }

        /* Arrow slide on hover */
        .btn-arrow-slide {
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            font-size: 14px;
        }

        .btn-medical-primary:hover .btn-arrow-slide {
            transform: translateX(5px);
        }

        /* 2. SECONDARY CALL BUTTON (HELPLINE) */
        .btn-medical-helpline {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #ffffff;
            color: #0f172a !important;
            border: 1.5px solid #e2e8f0;
            padding: 13px 26px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none !important;
            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.05);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .btn-medical-helpline:hover {
            border-color: #69275c;
            color: #69275c !important;
            transform: translateY(-3px);
            box-shadow: 0 10px 24px rgba(105, 39, 92, 0.12);
        }

        .phone-shake-icon {
            color: #b91c1c;
            animation: phoneShake 2.4s ease-in-out infinite;
        }

        @keyframes phoneShake {
            0%, 100% { transform: rotate(0deg); }
            10%, 30% { transform: rotate(-14deg); }
            20%, 40% { transform: rotate(14deg); }
            50% { transform: rotate(0deg); }
        }

        /* -------------------------------------------------------------
           3. CORE INSTITUTIONAL VALUES (4 CARDS WITH HOVER ANIMATION)
           ------------------------------------------------------------- */
        .values-section {
            padding: 90px 0 95px;
            background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
            border-top: 1px solid #edf2f7;
            border-bottom: 1px solid #edf2f7;
        }

        .value-card-v2 {
            position: relative;
            background: #ffffff;
            border-radius: var(--abt-radius-lg);
            padding: 34px 28px 30px;
            border: 1px solid rgba(226, 232, 240, 0.9);
            box-shadow: var(--abt-shadow-soft);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            height: 100%;
            overflow: hidden;
        }

        /* Animated top color accent bar */
        .value-card-v2::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0%;
            height: 4px;
            transition: width 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .val-card-1::before { background: linear-gradient(90deg, #69275c, #a22987); }
        .val-card-2::before { background: linear-gradient(90deg, #00a896, #10b981); }
        .val-card-3::before { background: linear-gradient(90deg, #0284c7, #38bdf8); }
        .val-card-4::before { background: linear-gradient(90deg, #f59e0b, #d97706); }

        .value-card-v2:hover::before {
            width: 100%;
        }

        .value-card-v2:hover {
            transform: translateY(-9px);
            box-shadow: var(--abt-shadow-hover);
            border-color: rgba(105, 39, 92, 0.3);
        }

        .val-icon-bubble {
            width: 62px;
            height: 62px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            margin-bottom: 22px;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .value-card-v2:hover .val-icon-bubble {
            transform: scale(1.15) rotate(6deg);
        }

        .vi-1 { background: rgba(105, 39, 92, 0.1); color: #69275c; }
        .vi-2 { background: rgba(0, 168, 150, 0.1); color: #00a896; }
        .vi-3 { background: rgba(2, 132, 199, 0.1); color: #0284c7; }
        .vi-4 { background: rgba(245, 158, 11, 0.1); color: #d97706; }

        .value-card-v2 h4 {
            font-size: 19px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 12px;
            line-height: 1.3;
        }

        .value-card-v2 p {
            font-size: 14px;
            color: #64748b;
            line-height: 1.65;
            margin: 0;
        }

        /* -------------------------------------------------------------
           4. INFRASTRUCTURE & AMENITIES GRID (BRIGHT & INTERACTIVE)
           ------------------------------------------------------------- */
        .infra-section {
            padding: 95px 0 100px;
            background: #ffffff;
        }

        .infra-grid-v2 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
            margin-top: 45px;
        }

        .infra-card {
            background: #f8fafc;
            border-radius: var(--abt-radius-md);
            border: 1px solid #edf2f7;
            padding: 24px;
            display: flex;
            align-items: flex-start;
            gap: 16px;
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
        }

        .infra-card:hover {
            background: #ffffff;
            border-color: rgba(105, 39, 92, 0.25);
            box-shadow: 0 14px 30px -6px rgba(105, 39, 92, 0.12);
            transform: translateY(-4px);
        }

        .infra-card-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            color: #69275c;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.05);
            transition: all 0.3s ease;
        }

        .infra-card:hover .infra-card-icon {
            background: #69275c;
            color: #ffffff;
            transform: scale(1.1);
        }

        .infra-card h5 {
            font-size: 16px;
            font-weight: 800;
            color: #0f172a;
            margin: 0 0 6px;
            line-height: 1.3;
        }

        .infra-card p {
            font-size: 13.5px;
            color: #64748b;
            line-height: 1.55;
            margin: 0;
        }

        /* -------------------------------------------------------------
           5. TRUST METRICS SECTION (100% LIGHT, CLEAN & BRIGHT THEME)
           ------------------------------------------------------------- */
        .about-stats-light {
            background: linear-gradient(135deg, #f8faff 0%, #ffffff 50%, #fbf5fa 100%);
            border-top: 1px solid #e2e8f0;
            border-bottom: 1px solid #e2e8f0;
            padding: 70px 0;
            position: relative;
        }

        .stat-light-box {
            text-align: center;
            padding: 20px 15px;
            position: relative;
            transition: transform 0.3s ease;
        }

        .stat-light-box:hover {
            transform: translateY(-5px);
        }

        .stat-num-highlight {
            font-size: 44px;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 6px;
            background: linear-gradient(135deg, #69275c 0%, #0284c7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .stat-light-box h6 {
            font-size: 14.5px;
            font-weight: 700;
            color: #0f172a;
            margin: 0 0 4px;
        }

        .stat-light-box p {
            font-size: 12.5px;
            color: #64748b;
            margin: 0;
        }

        /* Responsive Tweaks */
        @media (max-width: 1199px) {
            .infra-grid-v2 { grid-template-columns: repeat(2, 1fr); }
            .story-heading { font-size: 34px; }
        }

        @media (max-width: 991px) {
            .about-hero-title { font-size: 36px; }
            .photo-stack-wrapper { margin-bottom: 60px; padding: 10px; }
            .story-content-col { padding-left: 0; }
            .infra-grid-v2 { grid-template-columns: 1fr; }
            .about-features-grid { grid-template-columns: 1fr; }
            .floating-badge-exp { right: 0; top: 10px; }
            .floating-badge-campus { left: 0; bottom: -20px; }
        }

        @media (max-width: 575px) {
            .about-hero-title { font-size: 30px; }
            .story-heading { font-size: 28px; }
            .floating-badge-exp, .floating-badge-campus { position: static; margin-top: 15px; }
            .floating-status-pill { display: none; }
            .story-action-group { flex-direction: column; align-items: stretch; }
            .btn-medical-primary, .btn-medical-helpline { width: 100%; text-align: center; }
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
    @include('partials.header', ['active' => 'about'])
    <!-- Header Navigation End -->

    <div class="loaded" id="content">

        <!-- 1. Hero Showcase Section (Bright, Light & Animated) -->
        <section class="about-hero-section hero-animated-bg">
            @include('partials.hero_background')

            <div class="container">
                <div class="about-hero-content">
                    <div class="about-hero-badge">
                        <span class="pulse-beacon-dot"></span>
                        <span>Shree Kutchi Leva Patel Trust &bull; Dedicated Healthcare Mission</span>
                    </div>
                    <h1 class="about-hero-title">
                        Empowering Health & Healing <br>
                        <span class="brand-gradient-text">Across Kutch & Beyond</span>
                    </h1>
                    <p class="about-hero-desc">
                        Established with a profound commitment to human dignity, clinical innovation, and compassionate patient care, KK Patel Super Speciality Hospital is the vanguard of advanced medicine in Bhuj.
                    </p>
                    <div>
                        <div class="hero-breadcrumb-nav">
                            <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                            <span>&bull;</span>
                            <span>About Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 2. Story & Founding Vision Section (With Best Photo & Button Animations) -->
        <section class="story-section">
            <div class="container">
                <div class="row align-items-center">
                    
                    <!-- LEFT COLUMN: Animated Layered Photo Stack -->
                    <div class="col-12 col-lg-6 mb-5 mb-lg-0">
                        <div class="photo-stack-wrapper">
                            
                            <!-- Animated Concentric Dotted Ring -->
                            <div class="photo-decor-ring"></div>
                            
                            <!-- Ambient Pulsing Glow Halo -->
                            <div class="photo-ambient-halo"></div>

                            <!-- Floating Badge 1 (Top Right): 25+ Years Experience & Trust -->
                            <div class="floating-badge-exp">
                                <div class="exp-icon-box">
                                    <i class="fa fa-star"></i>
                                </div>
                                <div>
                                    <strong>25+ Years</strong>
                                    <span>Community Trust & Healing</span>
                                </div>
                            </div>

                            <!-- Floating Badge 2 (Bottom Left): 13-Acre Campus & 200+ Beds -->
                            <div class="floating-badge-campus">
                                <div class="campus-icon-box">
                                    <i class="fa fa-hospital-o"></i>
                                </div>
                                <div>
                                    <strong>13-Acre Green Campus</strong>
                                    <span>200+ Bedded Tertiary Hospital</span>
                                </div>
                            </div>

                            <!-- Floating Live Status Pill (Middle Right) -->
                            <div class="floating-status-pill">
                                <span class="red-dot-live"></span>
                                <span>24/7 Critical Trauma Active</span>
                            </div>

                            <!-- Main Photo Frame with Gentle Float and 3D Hover -->
                            <div class="main-photo-frame">
                                <div class="main-photo-inner">
                                    <img src="{{ URL::to('/') }}/img/about/1.png" alt="KK Patel Hospital Specialist Doctor" class="img-fluid">
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- RIGHT COLUMN: Narrative Content, Feature Grid & Dynamic Buttons -->
                    <div class="col-12 col-lg-6">
                        <div class="story-content-col">
                            <div class="section-pill-tag">
                                <i class="fa fa-heartbeat"></i> Our Vision & Mission
                            </div>
                            <h2 class="story-heading">
                                Best Care for Your Health, <br>
                                <span class="brand-highlight">Backed by Decades of Dedication</span>
                            </h2>
                            <p class="story-lead-text">
                                Shree Kutchi Leva Patel Education and Medical Trust operates with the singular goal of societal upliftment in healthcare and education. KK Patel Super Speciality Hospital is a landmark initiative designed to dramatically enhance tertiary medical availability for families throughout Kutch.
                            </p>
                            <p class="story-lead-text">
                                From cutting-edge cardiology and oncology to minimally invasive orthopaedics and 24/7 trauma management, our multidisciplinary clinical teams prioritize patient comfort, safety, and rapid recovery.
                            </p>

                            <!-- Interactive 4-Card Clinical Feature Grid -->
                            <div class="about-features-grid">
                                <div class="about-feature-item">
                                    <div class="feat-icon-badge fb-1">
                                        <i class="fa fa-ambulance"></i>
                                    </div>
                                    <div>
                                        <strong>24/7 Trauma Care</strong>
                                        <span>Rapid triage & emergency</span>
                                    </div>
                                </div>

                                <div class="about-feature-item">
                                    <div class="feat-icon-badge fb-2">
                                        <i class="fa fa-heartbeat"></i>
                                    </div>
                                    <div>
                                        <strong>Advanced Cath Lab</strong>
                                        <span>Primary angioplasty & cardiac</span>
                                    </div>
                                </div>

                                <div class="about-feature-item">
                                    <div class="feat-icon-badge fb-3">
                                        <i class="fa fa-shield"></i>
                                    </div>
                                    <div>
                                        <strong>NABH & PMJAY</strong>
                                        <span>100% Cashless treatment</span>
                                    </div>
                                </div>

                                <div class="about-feature-item">
                                    <div class="feat-icon-badge fb-4">
                                        <i class="fa fa-stethoscope"></i>
                                    </div>
                                    <div>
                                        <strong>50+ Specialists</strong>
                                        <span>Super-speciality consultations</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Animated Buttons Action Group -->
                            <div class="story-action-group">
                                <!-- High-Contrast Animated Primary CTA Button -->
                                <a href="{{ url('appointment') }}" class="btn-medical-primary">
                                    <i class="fa fa-calendar-check-o btn-icon-hop"></i>
                                    <span>Book A Consultation</span>
                                    <i class="fa fa-arrow-right btn-arrow-slide"></i>
                                </a>

                                <!-- Emergency Fast Helpline Button -->
                                <a href="tel:02832236000" class="btn-medical-helpline">
                                    <i class="fa fa-phone phone-shake-icon"></i>
                                    <span>02832 236000</span>
                                </a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- 3. Four Core Institutional Values (Interactive Cards) -->
        <section class="values-section">
            <div class="container">
                <div class="text-center" style="max-width: 680px; margin: 0 auto 55px;">
                    <div class="section-pill-tag">
                        <i class="fa fa-star"></i> Guiding Principles
                    </div>
                    <h2 style="font-size: 36px; font-weight: 800; color: #0f172a; margin-top: 10px; line-height: 1.25;">
                        The Pillars of Our Healthcare Delivery
                    </h2>
                    <p style="color: #64748b; font-size: 15.5px; line-height: 1.6; margin-top: 8px;">
                        Every diagnosis, surgical intervention, and patient interaction is grounded in these foundational standards.
                    </p>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="value-card-v2 val-card-1">
                            <div class="val-icon-bubble vi-1">
                                <i class="fa fa-heart"></i>
                            </div>
                            <h4>Compassionate Care</h4>
                            <p>Treating every patient and relative with warmth, empathy, dignity, and personalized clinical attention.</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="value-card-v2 val-card-2">
                            <div class="val-icon-bubble vi-2">
                                <i class="fa fa-user-md"></i>
                            </div>
                            <h4>Clinical Excellence</h4>
                            <p>Distinguished medical specialists and board-certified surgeons practicing evidence-based healing protocols.</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="value-card-v2 val-card-3">
                            <div class="val-icon-bubble vi-3">
                                <i class="fa fa-shield"></i>
                            </div>
                            <h4>Patient Safety</h4>
                            <p>Strict NABH infection control measures, laminar airflow theatres, and 24/7 critical patient monitoring.</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="value-card-v2 val-card-4">
                            <div class="val-icon-bubble vi-4">
                                <i class="fa fa-check-circle"></i>
                            </div>
                            <h4>Affordable Access</h4>
                            <p>Transparent pricing, government health scheme integrations, and subsidized care for underserved communities.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. World-Class Infrastructure & Technology Highlights -->
        <section class="infra-section">
            <div class="container">
                <div class="text-center" style="max-width: 680px; margin: 0 auto 20px;">
                    <div class="section-pill-tag">
                        <i class="fa fa-building-o"></i> Infrastructure
                    </div>
                    <h2 style="font-size: 36px; font-weight: 800; color: #0f172a; margin-top: 10px; line-height: 1.25;">
                        Built for Modern Medical Advances
                    </h2>
                    <p style="color: #64748b; font-size: 15.5px; line-height: 1.6; margin-top: 8px;">
                        Equipped with precision technology to manage high-complexity medical, critical, and surgical cases.
                    </p>
                </div>

                <div class="infra-grid-v2">
                    <div class="infra-card">
                        <div class="infra-card-icon"><i class="fa fa-map-marker"></i></div>
                        <div>
                            <h5>13-Acre Eco Campus</h5>
                            <p>Serene, spacious, and patient-centered environment designed to foster peaceful recovery.</p>
                        </div>
                    </div>
                    <div class="infra-card">
                        <div class="infra-card-icon"><i class="fa fa-bed"></i></div>
                        <div>
                            <h5>200+ Inpatient Beds</h5>
                            <p>Specialized Intensive Care Units (ICU), ICCU, and comfortable private patient suites.</p>
                        </div>
                    </div>
                    <div class="infra-card">
                        <div class="infra-card-icon"><i class="fa fa-medkit"></i></div>
                        <div>
                            <h5>Modular Operation Suites</h5>
                            <p>Laminar airflow surgical theaters engineered for high-end joint replacements & neurosurgery.</p>
                        </div>
                    </div>
                    <div class="infra-card">
                        <div class="infra-card-icon"><i class="fa fa-heartbeat"></i></div>
                        <div>
                            <h5>High-Tech Cath Lab</h5>
                            <p>Advanced interventional cardiology suite for immediate angioplasty and cardiac interventions.</p>
                        </div>
                    </div>
                    <div class="infra-card">
                        <div class="infra-card-icon"><i class="fa fa-flash"></i></div>
                        <div>
                            <h5>Linear Accelerator Radiation</h5>
                            <p>Next-gen radiation oncology delivery for precise targeted cancer treatments with minimal side effects.</p>
                        </div>
                    </div>
                    <div class="infra-card">
                        <div class="infra-card-icon"><i class="fa fa-eye"></i></div>
                        <div>
                            <h5>128-Slice Cardiac CT with AI</h5>
                            <p>Ultra-fast non-invasive vascular, coronary, and neurological imaging for rapid diagnostic precision.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. Trust Metrics Strip (100% LIGHT, CLEAN & BRIGHT THEME) -->
        <section class="about-stats-light">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="stat-light-box">
                            <div class="stat-num-highlight">25+</div>
                            <h6>Years of Service</h6>
                            <p>Community Trust & Dedication</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="stat-light-box">
                            <div class="stat-num-highlight">50,000+</div>
                            <h6>Patients Treated</h6>
                            <p>Successful Recoveries Across Kutch</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="stat-light-box">
                            <div class="stat-num-highlight">50+</div>
                            <h6>Specialist Doctors</h6>
                            <p>Super-Speciality Consultations</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="stat-light-box">
                            <div class="stat-num-highlight">24/7</div>
                            <h6>Emergency Medical Care</h6>
                            <p>Always Ready Critical Response</p>
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
                }, 300);
            }
        });
    </script>
</body>

</html>
