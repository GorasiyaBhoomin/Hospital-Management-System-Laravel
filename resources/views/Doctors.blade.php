<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Specialist Doctors | KK Patel Super Speciality Hospital</title>
    <meta name="description" content="Meet our experienced specialist doctors and surgeons at KK Patel Super Speciality Hospital, Bhuj. Book your appointment online today.">
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

    <!-- Modern Doctors Page Custom Styles & Animations -->
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
            --brand-card-bg: #ffffff;
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
        }

        /* -------------------------------------------------------------
           1. MODERN HERO SECTION WITH FLOATING GLOWS (BRIGHT LIGHT THEME)
           ------------------------------------------------------------- */
        .doc-hero-section {
            position: relative;
            background: linear-gradient(135deg, #f0f7ff 0%, #ffffff 50%, #fbf5fa 100%);
            padding: 85px 0 105px;
            overflow: hidden;
            color: #0f172a;
            border-bottom: 1px solid #e2e8f0;
        }

        /* Ambient Glowing Background Orbs */
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

        /* Background Subtle Grid Pattern */
        .hero-grid-pattern {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                linear-gradient(rgba(105, 39, 92, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(105, 39, 92, 0.04) 1px, transparent 1px);
            background-size: 40px 40px;
            opacity: 0.6;
            pointer-events: none;
        }

        .doc-hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 820px;
            margin: 0 auto;
        }

        /* Breadcrumb / Top Pill */
        .doc-hero-badge {
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
            box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
            animation: pulseRingAnim 1.8s infinite;
        }

        @keyframes pulseRingAnim {
            0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.8); }
            70% { box-shadow: 0 0 0 8px rgba(16, 185, 129, 0); }
            100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
        }

        .doc-hero-title {
            font-size: 44px;
            font-weight: 800;
            line-height: 1.2;
            letter-spacing: -0.6px;
            color: #0f172a;
            margin-bottom: 16px;
            animation: fadeInUp 0.7s ease-out;
        }

        .doc-hero-title .text-gradient {
            background: linear-gradient(135deg, #69275c 0%, #0284c7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .doc-hero-desc {
            font-size: 16.5px;
            color: #475569;
            line-height: 1.6;
            margin-bottom: 34px;
            animation: fadeInUp 0.8s ease-out;
        }

        /* -------------------------------------------------------------
           2. INTERACTIVE SEARCH & CATEGORY FILTER BAR
           ------------------------------------------------------------- */
        .doc-search-wrapper {
            position: relative;
            max-width: 620px;
            margin: 0 auto 28px;
            z-index: 3;
            animation: fadeInUp 0.9s ease-out;
        }

        .doc-search-box {
            position: relative;
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 50px;
            padding: 6px 8px 6px 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25), 0 0 0 1px rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }

        .doc-search-box:focus-within {
            background: #ffffff;
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.35), 0 0 0 3px rgba(56, 189, 248, 0.4);
            transform: translateY(-2px);
        }

        .doc-search-box i.search-icon {
            font-size: 18px;
            color: #69275c;
            margin-right: 12px;
        }

        .doc-search-input {
            flex: 1;
            border: none;
            outline: none;
            background: transparent;
            font-size: 15px;
            font-weight: 500;
            color: #0f172a;
            font-family: inherit;
        }

        .doc-search-input::placeholder {
            color: #94a3b8;
            font-weight: 400;
        }

        .doc-search-btn {
            background: linear-gradient(135deg, #69275c 0%, #a2388c 100%);
            color: #ffffff;
            border: none;
            border-radius: 50px;
            padding: 10px 24px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: 0 4px 12px rgba(105, 39, 92, 0.35);
        }

        .doc-search-btn:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 18px rgba(105, 39, 92, 0.5);
        }

        /* Specialty Pills Horizontal Filter (Light Medical Theme) */
        .specialty-pills-row {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
            animation: fadeInUp 1s ease-out;
        }

        .specialty-pill {
            background: #ffffff;
            color: #475569;
            border: 1.5px solid #e2e8f0;
            border-radius: 50px;
            padding: 8px 20px;
            font-size: 13.5px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
            text-decoration: none !important;
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        .specialty-pill:hover {
            background: #fbf5fa;
            color: #69275c;
            border-color: rgba(105, 39, 92, 0.3);
            transform: translateY(-2px);
            box-shadow: 0 4px 14px rgba(105, 39, 92, 0.1);
        }

        .specialty-pill.active {
            background: linear-gradient(135deg, #69275c 0%, #8b1d6b 100%);
            color: #ffffff !important;
            border-color: #69275c;
            box-shadow: 0 4px 16px rgba(105, 39, 92, 0.35);
            transform: translateY(-2px);
        }

        /* -------------------------------------------------------------
           3. DOCTORS DIRECTORY MAIN SECTION
           ------------------------------------------------------------- */
        .doctors-directory-section {
            padding: 70px 0 90px;
            position: relative;
        }

        /* Header Results & Quick Summary Bar */
        .directory-header-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 35px;
            padding-bottom: 18px;
            border-bottom: 1px solid #e2e8f0;
            gap: 14px;
        }

        .directory-counter-text {
            font-size: 15px;
            font-weight: 600;
            color: #64748b;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .directory-counter-badge {
            background: #e0f2fe;
            color: #0369a1;
            padding: 4px 12px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 13.5px;
        }

        .directory-badge-guide {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #10b981;
            font-weight: 600;
            background: #ecfdf5;
            padding: 6px 14px;
            border-radius: 50px;
            border: 1px solid #a7f3d0;
        }

        /* -------------------------------------------------------------
           4. DOCTOR CARDS & ANIMATED HOVER EFFECTS
           ------------------------------------------------------------- */
        .doctor-card-wrapper {
            margin-bottom: 32px;
            transition: all 0.35s ease;
        }

        .modern-doctor-card {
            position: relative;
            background: #ffffff;
            border-radius: var(--radius-lg);
            border: 1px solid rgba(226, 232, 240, 0.85);
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

        .modern-doctor-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-hover);
            border-color: rgba(105, 39, 92, 0.35);
        }

        /* Top Colored Gradient Stripe */
        .card-top-accent {
            height: 5px;
            width: 100%;
            background: linear-gradient(90deg, #69275c 0%, #a2388c 40%, #00a896 100%);
            transition: height 0.25s ease;
        }

        .modern-doctor-card:hover .card-top-accent {
            height: 6px;
        }

        /* Card Header Badges */
        .card-badge-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 20px 0;
            z-index: 2;
        }

        .availability-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 11.5px;
            font-weight: 700;
            color: #15803d;
            background: #dcfce7;
            border: 1px solid #bbf7d0;
            padding: 3px 10px;
            border-radius: 50px;
        }

        .live-status-dot {
            width: 7px;
            height: 7px;
            background: #16a34a;
            border-radius: 50%;
            box-shadow: 0 0 0 0 rgba(22, 163, 74, 0.7);
            animation: liveStatusPulse 1.6s infinite;
        }

        @keyframes liveStatusPulse {
            0% { box-shadow: 0 0 0 0 rgba(22, 163, 74, 0.8); }
            70% { box-shadow: 0 0 0 6px rgba(22, 163, 74, 0); }
            100% { box-shadow: 0 0 0 0 rgba(22, 163, 74, 0); }
        }

        .dept-pill {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 12px;
            font-weight: 700;
            color: #69275c;
            background: rgba(105, 39, 92, 0.08);
            border: 1px solid rgba(105, 39, 92, 0.15);
            padding: 4px 12px;
            border-radius: 50px;
            text-transform: capitalize;
        }

        /* Doctor Avatar Section */
        .doc-avatar-container {
            position: relative;
            width: 124px;
            height: 124px;
            margin: 18px auto 14px;
        }

        .doc-avatar-ring {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            padding: 4px;
            background: linear-gradient(135deg, rgba(105, 39, 92, 0.3) 0%, rgba(0, 168, 150, 0.4) 100%);
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.1);
            transition: all 0.35s ease;
        }

        .modern-doctor-card:hover .doc-avatar-ring {
            transform: scale(1.06);
            background: linear-gradient(135deg, #69275c 0%, #00a896 100%);
            box-shadow: 0 12px 28px rgba(105, 39, 92, 0.25);
        }

        .doc-avatar-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #ffffff;
            background-color: #f1f5f9;
        }

        .verified-badge {
            position: absolute;
            bottom: 4px;
            right: 4px;
            width: 26px;
            height: 26px;
            background: #0284c7;
            color: #ffffff;
            border-radius: 50%;
            border: 2px solid #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        /* Card Content Details */
        .doc-card-body {
            padding: 0 22px 18px;
            text-align: center;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .doc-name {
            font-size: 19px;
            font-weight: 800;
            color: #0f172a;
            margin: 0 0 4px;
            line-height: 1.25;
            transition: color 0.25s ease;
        }

        .modern-doctor-card:hover .doc-name {
            color: #69275c;
        }

        .doc-designation {
            font-size: 12.5px;
            font-weight: 600;
            color: #0284c7;
            margin-bottom: 12px;
        }

        /* Meta Chips (Location & Hospital) */
        .doc-meta-chips {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 14px;
        }

        .meta-chip {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 11.5px;
            font-weight: 600;
            color: #475569;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 3px 10px;
            border-radius: 50px;
        }

        /* Bio Snippet */
        .doc-bio-excerpt {
            font-size: 12.5px;
            color: #64748b;
            line-height: 1.5;
            margin-bottom: 18px;
            background: #fdfafd;
            border-left: 3px solid #69275c;
            padding: 8px 12px;
            border-radius: 0 8px 8px 0;
            text-align: left;
            font-style: italic;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Action Buttons */
        .doc-card-actions {
            margin-top: auto;
            display: flex;
            gap: 10px;
        }

        .btn-doc-book {
            flex: 1.4;
            background: linear-gradient(135deg, #69275c 0%, #a2388c 100%);
            color: #ffffff !important;
            border: none;
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none !important;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            box-shadow: 0 4px 14px rgba(105, 39, 92, 0.3);
            transition: all 0.25s ease;
        }

        .btn-doc-book:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(105, 39, 92, 0.45);
            color: #ffffff;
        }

        .btn-doc-profile {
            flex: 1;
            background: #ffffff;
            color: #334155;
            border: 1.5px solid #cbd5e1;
            padding: 10px 12px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            transition: all 0.2s ease;
        }

        .btn-doc-profile:hover {
            background: #f1f5f9;
            color: #0f172a;
            border-color: #94a3b8;
        }

        /* Empty State */
        .no-results-state {
            display: none;
            text-align: center;
            padding: 60px 20px;
            background: #ffffff;
            border-radius: var(--radius-lg);
            border: 1px dashed #cbd5e1;
            margin: 20px 0 40px;
        }

        .no-results-state i {
            font-size: 48px;
            color: #94a3b8;
            margin-bottom: 16px;
        }

        .no-results-state h4 {
            font-size: 20px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .no-results-state p {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .btn-reset-filters {
            background: #69275c;
            color: #ffffff;
            border: none;
            padding: 9px 22px;
            border-radius: 50px;
            font-size: 13.5px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-reset-filters:hover {
            background: #501d46;
        }

        /* -------------------------------------------------------------
           5. CLINICAL EXCELLENCE & TRUST METRICS BAR
           ------------------------------------------------------------- */
        .doc-trust-section {
            background: #ffffff;
            border-top: 1px solid #e2e8f0;
            border-bottom: 1px solid #e2e8f0;
            padding: 55px 0;
            position: relative;
        }

        .trust-stat-card {
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 16px;
            border-radius: 16px;
            background: #f8fafc;
            border: 1px solid #edf2f7;
            transition: all 0.3s ease;
            height: 100%;
        }

        .trust-stat-card:hover {
            background: #ffffff;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
            transform: translateY(-4px);
            border-color: rgba(105, 39, 92, 0.2);
        }

        .trust-stat-icon {
            width: 54px;
            height: 54px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }

        .stat-icon-1 { background: rgba(105, 39, 92, 0.12); color: #69275c; }
        .stat-icon-2 { background: rgba(0, 168, 150, 0.12); color: #00a896; }
        .stat-icon-3 { background: rgba(2, 132, 199, 0.12); color: #0284c7; }
        .stat-icon-4 { background: rgba(245, 158, 11, 0.12); color: #f59e0b; }

        .trust-stat-info h3 {
            font-size: 24px;
            font-weight: 800;
            color: #0f172a;
            margin: 0;
            line-height: 1.1;
        }

        .trust-stat-info p {
            font-size: 13px;
            font-weight: 600;
            color: #64748b;
            margin: 4px 0 0;
        }

        /* -------------------------------------------------------------
           6. EMERGENCY & ONLINE BOOKING CARDS
           ------------------------------------------------------------- */
        .doc-emergency-wrap {
            padding: 80px 0;
            background: #f8fafc;
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

        /* -------------------------------------------------------------
           7. ACCESSIBLE DOCTOR PROFILE MODAL
           ------------------------------------------------------------- */
        .doc-modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(15, 23, 42, 0.65);
            backdrop-filter: blur(6px);
            z-index: 99999;
            align-items: center;
            justify-content: center;
            padding: 20px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .doc-modal-overlay.active {
            display: flex;
            opacity: 1;
        }

        .doc-modal-card {
            background: #ffffff;
            width: 100%;
            max-width: 620px;
            border-radius: 24px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
            transform: scale(0.92);
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            max-height: 90vh;
            display: flex;
            flex-direction: column;
        }

        .doc-modal-overlay.active .doc-modal-card {
            transform: scale(1);
        }

        .doc-modal-close-btn {
            position: absolute;
            top: 16px;
            right: 18px;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.08);
            border: none;
            color: #0f172a;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            transition: all 0.2s ease;
        }

        .doc-modal-close-btn:hover {
            background: #ef4444;
            color: #ffffff;
            transform: rotate(90deg);
        }

        .doc-modal-header-bg {
            background: linear-gradient(135deg, #69275c 0%, #1e1b4b 100%);
            padding: 28px 28px 24px;
            color: #ffffff;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .doc-modal-avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #ffffff;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.25);
            flex-shrink: 0;
            background: #ffffff;
        }

        .doc-modal-header-text h3 {
            font-size: 21px;
            font-weight: 800;
            color: #ffffff;
            margin: 0 0 4px;
        }

        .doc-modal-dept-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            color: #38bdf8;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
            border: 1px solid rgba(255, 255, 255, 0.25);
        }

        .doc-modal-body {
            padding: 24px 28px;
            overflow-y: auto;
            flex: 1;
        }

        .modal-section-title {
            font-size: 13.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            color: #94a3b8;
            margin: 18px 0 8px;
        }

        .modal-bio-text {
            font-size: 14px;
            color: #334155;
            line-height: 1.6;
            background: #f8fafc;
            padding: 12px 16px;
            border-radius: 12px;
            border: 1px solid #edf2f7;
            margin: 0;
        }

        .modal-info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-top: 10px;
        }

        .modal-info-item {
            background: #f8fafc;
            border: 1px solid #edf2f7;
            padding: 10px 14px;
            border-radius: 10px;
        }

        .modal-info-item small {
            display: block;
            color: #64748b;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .modal-info-item strong {
            display: block;
            color: #0f172a;
            font-size: 13.5px;
            margin-top: 2px;
        }

        .doc-modal-footer {
            padding: 16px 28px;
            border-top: 1px solid #e2e8f0;
            background: #f8fafc;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
        }

        .btn-modal-book {
            background: linear-gradient(135deg, #69275c 0%, #a2388c 100%);
            color: #ffffff !important;
            padding: 10px 24px;
            border-radius: 50px;
            font-size: 13.5px;
            font-weight: 700;
            text-decoration: none !important;
            box-shadow: 0 4px 14px rgba(105, 39, 92, 0.35);
            transition: all 0.2s ease;
        }

        .btn-modal-book:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(105, 39, 92, 0.5);
        }

        /* -------------------------------------------------------------
           8. RESPONSIVE DESIGN ADJUSTMENTS
           ------------------------------------------------------------- */
        @media (max-width: 991px) {
            .doc-hero-title {
                font-size: 34px;
            }
            .emergency-banner-box {
                margin-bottom: 24px;
            }
            .modal-info-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .doc-hero-section {
                padding: 60px 0 80px;
            }
            .doc-hero-title {
                font-size: 28px;
            }
            .doc-search-box {
                flex-direction: column;
                border-radius: 20px;
                padding: 12px;
                gap: 10px;
            }
            .doc-search-btn {
                width: 100%;
            }
            .specialty-pills-row {
                justify-content: flex-start;
                overflow-x: auto;
                padding-bottom: 8px;
                flex-wrap: nowrap;
            }
            .specialty-pill {
                white-space: nowrap;
                flex-shrink: 0;
            }
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
    @include('partials.header', ['active' => 'doctors'])
    <!-- Header Navigation End -->

    <div class="loaded" id="content">

        <!-- 1. Hero Area with Animated Ambient Glow & Live Search -->
        <section class="doc-hero-section hero-animated-bg">
            @include('partials.hero_background')

            <div class="container">
                <div class="doc-hero-content">
                    <!-- Live Status Badge -->
                    <div class="doc-hero-badge">
                        <span class="pulse-live-ring"></span>
                        <span>KK Patel Super Speciality Hospital &bull; Medical Directory</span>
                    </div>

                    <!-- Title & Tagline -->
                    <h1 class="doc-hero-title">
                        Meet Our Renowned <br><span class="text-gradient">Medical Specialists</span>
                    </h1>
                    <p class="doc-hero-desc">
                        Our distinguished team of board-certified consultants, surgeons, and physicians is dedicated to delivering compassionate, evidence-based medical care.
                    </p>

                    <!-- Realtime Search Input -->
                 

                    <!-- Specialty Pills Filtering -->
                 
                </div>
            </div>
        </section>

        <!-- 2. Doctors Directory Grid Section -->
        <section class="doctors-directory-section">
            <div class="container">
                <!-- Directory Control & Count Bar -->
                

                <!-- Empty State (Shown if no doctor matches filter) -->
                <div id="noDoctorsFound" class="no-results-state">
                    <i class="fa fa-user-md"></i>
                    <h4>No Specialist Doctors Found</h4>
                    <p>We couldn't find any doctors matching your search query. Try clearing the search or choosing another department.</p>
                    <button type="button" class="btn-reset-filters" onclick="resetDoctorFilters()">
                        <i class="fa fa-refresh m-r-5"></i> Reset All Filters
                    </button>
                </div>

                <!-- Doctor Cards Row -->
                <div class="row" id="doctorsGridRow">
                    @foreach($doctor_home as $doctors)
                        @php
                            $deptClean = strtolower(trim($doctors->departmentname));
                            $nameClean = strtolower(trim($doctors->username));
                            $cityClean = strtolower(trim($doctors->city));
                            $avatarUrl = $doctors->Avatar ? asset($doctors->Avatar) : URL::to('/assets/img/user.jpg');
                        @endphp
                        <div class="col-12 col-md-6 col-lg-4 doctor-card-wrapper"
                             data-name="{{ $nameClean }}"
                             data-dept="{{ $deptClean }}"
                             data-city="{{ $cityClean }}">
                            <div class="modern-doctor-card">
                                <!-- Top Accent Strip -->
                                <div class="card-top-accent"></div>

                                <!-- Header Pills -->
                                <div class="card-badge-header">
                                    <span class="availability-pill">
                                        <span class="live-status-dot"></span> Available
                                    </span>
                                    <span class="dept-pill">
                                        <i class="fa fa-stethoscope"></i> {{ $doctors->departmentname }}
                                    </span>
                                </div>

                                <!-- Doctor Avatar with Glowing Ring -->
                                <div class="doc-avatar-container">
                                    <div class="doc-avatar-ring">
                                        <img src="{{ $avatarUrl }}" alt="{{ $doctors->username }}" class="doc-avatar-img"
                                             onerror="this.src='{{ URL::to('/') }}/assets/img/user.jpg'">
                                    </div>
                                    <span class="verified-badge" title="Certified Specialist">
                                        <i class="fa fa-check"></i>
                                    </span>
                                </div>

                                <!-- Doctor Details -->
                                <div class="doc-card-body">
                                    <h4 class="doc-name">{{ $doctors->username }}</h4>
                                    <p class="doc-designation">{{ $doctors->departmentname }} Specialist</p>

                                    <!-- Meta Chips -->
                                    <div class="doc-meta-chips">
                                        <span class="meta-chip">
                                            <i class="fa fa-map-marker text-danger"></i> {{ $doctors->city ? $doctors->city : 'Bhuj' }}
                                        </span>
                                        <span class="meta-chip">
                                            <i class="fa fa-hospital-o text-primary"></i> KK Patel Hospital
                                        </span>
                                    </div>

                                    <!-- Bio Quote -->
                                    <div class="doc-bio-excerpt" title="{{ $doctors->Bio }}">
                                        "{{ $doctors->Bio ? Str::limit($doctors->Bio, 78) : 'Dedicated to advanced clinical care, accurate diagnostic evaluation, and compassionate healing.' }}"
                                    </div>

                                    <!-- Card Action Buttons -->
                                    <div class="doc-card-actions">
                                        <a href="{{ url('appointment') }}?dept={{ urlencode($doctors->departmentname) }}&doc={{ urlencode($doctors->username) }}" 
                                           class="btn-doc-book" title="Book Consultation with {{ $doctors->username }}">
                                            <i class="fa fa-calendar-check-o"></i> Book Now
                                        </a>
                                        <button type="button" class="btn-doc-profile" 
                                                onclick="openDoctorModal('docModal-{{ $doctors->id }}')" 
                                                title="View Full Profile">
                                            <i class="fa fa-user-md"></i> Profile
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Accessible Quick-View Modal for Doctor -->
                        <div id="docModal-{{ $doctors->id }}" class="doc-modal-overlay" onclick="handleBackdropClick(event, 'docModal-{{ $doctors->id }}')">
                            <div class="doc-modal-card">
                                <button type="button" class="doc-modal-close-btn" onclick="closeDoctorModal('docModal-{{ $doctors->id }}')" title="Close">
                                    <i class="fa fa-times"></i>
                                </button>
                                
                                <div class="doc-modal-header-bg">
                                    <img src="{{ $avatarUrl }}" alt="{{ $doctors->username }}" class="doc-modal-avatar"
                                         onerror="this.src='{{ URL::to('/') }}/assets/img/user.jpg'">
                                    <div class="doc-modal-header-text">
                                        <h3>{{ $doctors->username }}</h3>
                                        <span class="doc-modal-dept-badge">
                                            <i class="fa fa-stethoscope m-r-5"></i> {{ $doctors->departmentname }}
                                        </span>
                                    </div>
                                </div>

                                <div class="doc-modal-body">
                                    <div class="modal-section-title">Doctor Bio & Overview</div>
                                    <p class="modal-bio-text">
                                        {{ $doctors->Bio ? $doctors->Bio : 'Senior consultant with comprehensive clinical experience in specialized diagnosis, patient evaluation, and therapeutic treatment protocols at KK Patel Super Speciality Hospital.' }}
                                    </p>

                                    <div class="modal-section-title">Clinical Information</div>
                                    <div class="modal-info-grid">
                                        <div class="modal-info-item">
                                            <small><i class="fa fa-hospital-o text-primary"></i> Department</small>
                                            <strong>{{ $doctors->departmentname }}</strong>
                                        </div>
                                        <div class="modal-info-item">
                                            <small><i class="fa fa-map-marker text-danger"></i> Location / City</small>
                                            <strong>{{ $doctors->city ? $doctors->city : 'Bhuj, Gujarat' }}</strong>
                                        </div>
                                        @if(!empty($doctors->phone))
                                            <div class="modal-info-item">
                                                <small><i class="fa fa-phone text-success"></i> Clinic Helpline</small>
                                                <strong>{{ $doctors->phone }}</strong>
                                            </div>
                                        @endif
                                        @if(!empty($doctors->email))
                                            <div class="modal-info-item">
                                                <small><i class="fa fa-envelope-o text-info"></i> Direct Email</small>
                                                <strong>{{ $doctors->email }}</strong>
                                            </div>
                                        @endif
                                        <div class="modal-info-item">
                                            <small><i class="fa fa-clock-o text-warning"></i> OPD Hours</small>
                                            <strong>Mon - Sat (09:00 AM - 05:00 PM)</strong>
                                        </div>
                                        <div class="modal-info-item">
                                            <small><i class="fa fa-check-circle text-success"></i> Consultation Status</small>
                                            <strong style="color: #10b981;">Accepting Patients</strong>
                                        </div>
                                    </div>

                                    @if(!empty($doctors->address))
                                        <div class="modal-section-title">Hospital Address</div>
                                        <p style="font-size: 13px; color: #475569; margin: 0;">
                                            <i class="fa fa-building-o m-r-5 text-muted"></i> {{ $doctors->address }}, {{ $doctors->city }} - {{ $doctors->postal_code }}
                                        </p>
                                    @endif
                                </div>

                                <div class="doc-modal-footer">
                                    <button type="button" class="btn btn-light" style="border-radius: 50px; font-weight: 600;" onclick="closeDoctorModal('docModal-{{ $doctors->id }}')">
                                        Close
                                    </button>
                                    <a href="{{ url('appointment') }}?dept={{ urlencode($doctors->departmentname) }}&doc={{ urlencode($doctors->username) }}" class="btn-modal-book">
                                        <i class="fa fa-calendar-check-o m-r-5"></i> Book Appointment with Doctor
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- 3. Clinical Excellence Trust Statistics -->
        <section class="doc-trust-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="trust-stat-card">
                            <div class="trust-stat-icon stat-icon-1">
                                <i class="fa fa-user-md"></i>
                            </div>
                            <div class="trust-stat-info">
                                <h3>50+</h3>
                                <p>Specialist Doctors</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="trust-stat-card">
                            <div class="trust-stat-icon stat-icon-2">
                                <i class="fa fa-hospital-o"></i>
                            </div>
                            <div class="trust-stat-info">
                                <h3>20+</h3>
                                <p>Super Specialities</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="trust-stat-card">
                            <div class="trust-stat-icon stat-icon-3">
                                <i class="fa fa-smile-o"></i>
                            </div>
                            <div class="trust-stat-info">
                                <h3>99.4%</h3>
                                <p>Patient Satisfaction</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="trust-stat-card">
                            <div class="trust-stat-icon stat-icon-4">
                                <i class="fa fa-ambulance"></i>
                            </div>
                            <div class="trust-stat-info">
                                <h3>24/7</h3>
                                <p>Emergency & Trauma</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. Emergency & Direct Booking Callout -->
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

    <!-- Interactive Filtering & Modal Management Script -->
    <script>
        // Preloader Dismissal
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

        // Realtime Doctor Filtering Function
        var currentSelectedDept = 'all';

        function selectDeptFilter(deptSlug, btnElement) {
            currentSelectedDept = deptSlug;

            // Update active pill state
            var pills = document.querySelectorAll('.specialty-pill');
            pills.forEach(function(pill) {
                pill.classList.remove('active');
            });
            if (btnElement) {
                btnElement.classList.add('active');
            }

            filterDoctors();
        }

        function filterDoctors() {
            var searchInput = document.getElementById('doctorSearchInput');
            var query = searchInput ? searchInput.value.toLowerCase().trim() : '';
            var cards = document.querySelectorAll('.doctor-card-wrapper');
            var visibleCount = 0;

            cards.forEach(function(card) {
                var docName = card.getAttribute('data-name') || '';
                var docDept = card.getAttribute('data-dept') || '';
                var docCity = card.getAttribute('data-city') || '';

                var matchesDept = (currentSelectedDept === 'all') || (docDept === currentSelectedDept);
                var matchesQuery = (!query) || 
                                   (docName.indexOf(query) !== -1) || 
                                   (docDept.indexOf(query) !== -1) || 
                                   (docCity.indexOf(query) !== -1);

                if (matchesDept && matchesQuery) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Update count indicator
            var countDisplay = document.getElementById('doctorCountDisplay');
            if (countDisplay) {
                countDisplay.innerText = visibleCount;
            }

            // Show or hide empty state
            var noResults = document.getElementById('noDoctorsFound');
            if (noResults) {
                noResults.style.display = (visibleCount === 0) ? 'block' : 'none';
            }
        }

        function resetDoctorFilters() {
            var searchInput = document.getElementById('doctorSearchInput');
            if (searchInput) searchInput.value = '';

            var allPill = document.querySelector('.specialty-pill[data-dept="all"]');
            selectDeptFilter('all', allPill);
        }

        // Custom Modal Logic
        function openDoctorModal(modalId) {
            var modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeDoctorModal(modalId) {
            var modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        function handleBackdropClick(event, modalId) {
            if (event.target.id === modalId) {
                closeDoctorModal(modalId);
            }
        }

        // Close on ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                var activeModals = document.querySelectorAll('.doc-modal-overlay.active');
                activeModals.forEach(function(m) {
                    m.classList.remove('active');
                });
                document.body.style.overflow = '';
            }
        });
    </script>
</body>

</html>
