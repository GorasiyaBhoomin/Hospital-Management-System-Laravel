<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Patient Feedback & Reviews | KK Patel Super Speciality Hospital</title>
    <meta name="description" content="Share your clinical experience and feedback regarding doctors, staff, and medical care at KK Patel Super Speciality Hospital, Bhuj.">
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

    <!-- Bright Modern Feedback Page Styles & Animations -->
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
            --shadow-card: 0 10px 30px -4px rgba(15, 23, 42, 0.06), 0 4px 10px -2px rgba(15, 23, 42, 0.02);
            --shadow-hover: 0 20px 40px -10px rgba(105, 39, 92, 0.15), 0 8px 16px -4px rgba(15, 23, 42, 0.04);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            color: #334155;
            background-color: #f8fafc;
            overflow-x: hidden;
        }

        /* -------------------------------------------------------------
           1. BRIGHT MODERN HERO SECTION (NO DARK SLATE!)
           ------------------------------------------------------------- */
        .feedback-bright-hero {
            position: relative;
            background: linear-gradient(135deg, #f0f7ff 0%, #ffffff 50%, #fbf5fa 100%);
            padding: 70px 0 80px;
            border-bottom: 1px solid #e2e8f0;
            overflow: hidden;
        }

        .hero-glow-orb {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            filter: blur(80px);
            z-index: 0;
            opacity: 0.6;
        }

        .hero-glow-1 {
            top: -40px;
            left: -40px;
            width: 420px;
            height: 420px;
            background: radial-gradient(circle, rgba(2, 132, 199, 0.12) 0%, rgba(2, 132, 199, 0) 70%);
            animation: heroFloat 8s ease-in-out infinite alternate;
        }

        .hero-glow-2 {
            bottom: -60px;
            right: -40px;
            width: 460px;
            height: 460px;
            background: radial-gradient(circle, rgba(105, 39, 92, 0.12) 0%, rgba(105, 39, 92, 0) 70%);
            animation: heroFloat 8s ease-in-out infinite alternate -4s;
        }

        @keyframes heroFloat {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(20px, -20px) scale(1.1); }
        }

        .hero-grid-pattern {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: 
                linear-gradient(rgba(2, 132, 199, 0.035) 1px, transparent 1px),
                linear-gradient(90deg, rgba(2, 132, 199, 0.035) 1px, transparent 1px);
            background-size: 32px 32px;
            pointer-events: none;
        }

        .hero-content-wrap {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 820px;
            margin: 0 auto;
        }

        .hero-trust-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.05);
            padding: 6px 18px;
            border-radius: 50px;
            font-size: 13.5px;
            font-weight: 700;
            color: #69275c;
            margin-bottom: 18px;
        }

        .hero-trust-badge .stars {
            color: #f59e0b;
        }

        .feedback-hero-title {
            font-size: 42px;
            font-weight: 800;
            line-height: 1.25;
            letter-spacing: -0.5px;
            color: #0f172a;
            margin-bottom: 14px;
        }

        .feedback-hero-title .text-brand-gradient {
            background: linear-gradient(135deg, #69275c 0%, #0284c7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .feedback-hero-desc {
            font-size: 16.5px;
            color: #475569;
            line-height: 1.6;
            margin: 0 auto 16px;
            max-width: 680px;
        }

        /* -------------------------------------------------------------
           2. INTERACTIVE SPLIT CARD (TRUST SHOWCASE + REVIEW FORM)
           ------------------------------------------------------------- */
        .feedback-main-wrapper {
            padding: 60px 0 80px;
        }

        .feedback-split-card {
            background: #ffffff;
            border-radius: var(--radius-lg);
            border: 1px solid #e2e8f0;
            box-shadow: var(--shadow-card);
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .feedback-split-card:hover {
            box-shadow: var(--shadow-hover);
        }

        /* Left Side: Clinical Trust Showcase */
        .trust-showcase-panel {
            background: linear-gradient(160deg, #fbf5fa 0%, #f0f7ff 100%);
            padding: 44px 38px;
            height: 100%;
            border-right: 1px solid #e2e8f0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .trust-rating-header {
            margin-bottom: 28px;
        }

        .big-rating-number {
            font-size: 48px;
            font-weight: 800;
            color: #0f172a;
            line-height: 1;
            display: flex;
            align-items: baseline;
            gap: 6px;
        }
        .big-rating-number span {
            font-size: 20px;
            color: #64748b;
            font-weight: 600;
        }

        .star-row {
            color: #f59e0b;
            font-size: 18px;
            margin: 8px 0 6px;
            letter-spacing: 2px;
        }

        .rating-subtext {
            font-size: 13.5px;
            color: #64748b;
            font-weight: 500;
        }

        /* Benchmark Metric Bars */
        .benchmark-list {
            margin-bottom: 30px;
        }
        .benchmark-item {
            margin-bottom: 14px;
        }
        .benchmark-label {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 5px;
        }
        .benchmark-bar-track {
            height: 7px;
            background: #e2e8f0;
            border-radius: 10px;
            overflow: hidden;
        }
        .benchmark-bar-fill {
            height: 100%;
            border-radius: 10px;
            transition: width 1s ease;
        }
        .fill-purple { background: linear-gradient(90deg, #69275c, #9333ea); }
        .fill-blue { background: linear-gradient(90deg, #0284c7, #38bdf8); }
        .fill-emerald { background: linear-gradient(90deg, #059669, #10b981); }

        /* Testimonial Quote Cards */
        .featured-patient-quotes {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: var(--radius-md);
            padding: 20px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.03);
            margin-bottom: 24px;
        }
        .quote-icon {
            color: #69275c;
            font-size: 22px;
            margin-bottom: 8px;
            opacity: 0.8;
        }
        .quote-text {
            font-size: 13.5px;
            line-height: 1.55;
            color: #334155;
            font-style: italic;
            margin-bottom: 12px;
        }
        .quote-author {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .author-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: #69275c;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 700;
        }
        .author-details h5 {
            font-size: 13px;
            font-weight: 700;
            color: #0f172a;
            margin: 0;
        }
        .author-details small {
            font-size: 11.5px;
            color: #64748b;
        }

        .trust-promise-chip {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 50px;
            padding: 8px 16px;
            font-size: 12px;
            font-weight: 600;
            color: #059669;
        }

        /* Right Side: Interactive Review Submission Form */
        .review-form-panel {
            padding: 44px 40px;
            background: #ffffff;
        }

        .form-header-block {
            margin-bottom: 24px;
        }
        .form-header-block h3 {
            font-size: 24px;
            font-weight: 800;
            color: #0f172a;
            margin: 0 0 6px;
        }
        .form-header-block p {
            font-size: 14px;
            color: #64748b;
            margin: 0;
        }

        /* Interactive Star Rating Selector */
        .rating-selection-block {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: var(--radius-md);
            padding: 16px 20px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }
        .rating-selection-label {
            font-size: 13.5px;
            font-weight: 700;
            color: #0f172a;
            margin: 0;
        }
        .star-rating-control {
            display: inline-flex;
            gap: 6px;
            font-size: 24px;
            color: #cbd5e1;
            cursor: pointer;
        }
        .star-rating-control .star-btn {
            transition: all 0.2s ease;
        }
        .star-rating-control .star-btn:hover,
        .star-rating-control .star-btn.active {
            color: #f59e0b;
            transform: scale(1.15);
        }
        .rating-status-text {
            font-size: 12.5px;
            font-weight: 600;
            color: #69275c;
            width: 100%;
            margin-top: 4px;
        }

        /* Category Selector Chips */
        .category-chips-wrap {
            margin-bottom: 20px;
        }
        .category-chips-label {
            font-size: 13px;
            font-weight: 600;
            color: #475569;
            margin-bottom: 8px;
            display: block;
        }
        .chips-container {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
        .category-chip {
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
            color: #475569;
            font-size: 12.5px;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.2s ease;
            user-select: none;
        }
        .category-chip:hover {
            background: #e2e8f0;
            color: #0f172a;
        }
        .category-chip.active {
            background: #69275c;
            border-color: #69275c;
            color: #ffffff;
            box-shadow: 0 4px 10px rgba(105, 39, 92, 0.2);
        }

        /* Form Inputs */
        .form-floating-group {
            position: relative;
            margin-bottom: 20px;
        }
        .form-floating-group label {
            display: block;
            font-size: 13.5px;
            font-weight: 700;
            color: #334155;
            margin-bottom: 6px;
        }
        .form-floating-group label .required-mark {
            color: #dc2626;
        }
        .input-icon-wrap {
            position: relative;
        }
        .input-icon-wrap i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 15px;
            pointer-events: none;
            transition: color 0.2s ease;
        }
        .input-icon-wrap.textarea-icon i {
            top: 18px;
            transform: none;
        }
        .modern-form-input {
            width: 100%;
            padding: 12px 16px 12px 44px;
            font-size: 14.5px;
            color: #0f172a;
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: var(--radius-sm);
            font-family: inherit;
            transition: all 0.2s ease;
        }
        .modern-form-input:focus {
            background: #ffffff;
            border-color: #69275c;
            box-shadow: 0 0 0 3px rgba(105, 39, 92, 0.1);
            outline: none;
        }
        .modern-form-input:focus + i,
        .input-icon-wrap:focus-within i {
            color: #69275c;
        }
        .modern-form-textarea {
            width: 100%;
            padding: 14px 16px 14px 44px;
            font-size: 14.5px;
            color: #0f172a;
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: var(--radius-sm);
            font-family: inherit;
            min-height: 120px;
            resize: vertical;
            transition: all 0.2s ease;
        }
        .modern-form-textarea:focus {
            background: #ffffff;
            border-color: #69275c;
            box-shadow: 0 0 0 3px rgba(105, 39, 92, 0.1);
            outline: none;
        }

        .field-hint-text {
            font-size: 12px;
            color: #64748b;
            margin-top: 4px;
            display: flex;
            justify-content: space-between;
        }

        /* Laravel Flash Alerts */
        .custom-alert-box {
            padding: 14px 18px;
            border-radius: var(--radius-sm);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 14px;
            animation: fadeInDown 0.3s ease;
        }
        .alert-success-box {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
        }
        .alert-error-box {
            background: #fff1f2;
            border: 1px solid #fecaca;
            color: #991b1b;
        }
        .alert-icon {
            font-size: 18px;
            flex-shrink: 0;
        }

        /* Submit Button */
        .btn-submit-feedback {
            width: 100%;
            padding: 14px 28px;
            font-family: inherit;
            font-size: 16px;
            font-weight: 700;
            color: #ffffff;
            background: linear-gradient(135deg, #69275c 0%, #8b1d6b 100%);
            border: none;
            border-radius: var(--radius-sm);
            box-shadow: 0 6px 20px rgba(105, 39, 92, 0.25);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .btn-submit-feedback:hover {
            background: linear-gradient(135deg, #571f4c 0%, #76165a 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(105, 39, 92, 0.35);
        }
        .btn-submit-feedback:active {
            transform: translateY(0);
        }

        /* -------------------------------------------------------------
           3. RECENT VERIFIED REVIEWS SHOWCASE (3-CARD GRID)
           ------------------------------------------------------------- */
        .verified-reviews-section {
            padding: 30px 0 70px;
        }
        .section-header-center {
            text-align: center;
            max-width: 600px;
            margin: 0 auto 40px;
        }
        .section-header-center h3 {
            font-size: 30px;
            font-weight: 800;
            color: #0f172a;
            margin: 0 0 8px;
        }
        .section-header-center p {
            font-size: 15px;
            color: #64748b;
            margin: 0;
        }

        .verified-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: var(--radius-md);
            padding: 24px;
            height: 100%;
            box-shadow: var(--shadow-card);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .verified-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-hover);
            border-color: #cbd5e1;
        }
        .verified-card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 14px;
        }
        .v-stars {
            color: #f59e0b;
            font-size: 14px;
        }
        .dept-tag {
            background: #fbf5fa;
            color: #69275c;
            border: 1px solid #f3e8f2;
            padding: 3px 10px;
            border-radius: 50px;
            font-size: 11.5px;
            font-weight: 700;
        }
        .v-quote {
            font-size: 14px;
            color: #334155;
            line-height: 1.6;
            margin-bottom: 16px;
        }
        .v-user {
            display: flex;
            align-items: center;
            gap: 10px;
            border-top: 1px solid #f1f5f9;
            padding-top: 12px;
        }
        .v-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #f0f7ff;
            color: #0284c7;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
        }
        .v-meta h6 {
            margin: 0;
            font-size: 13.5px;
            font-weight: 700;
            color: #0f172a;
        }
        .v-meta span {
            font-size: 11.5px;
            color: #64748b;
        }

        /* -------------------------------------------------------------
           4. BRIGHT MODERN CALLOUT BANNER (NO DARK BOXES!)
           ------------------------------------------------------------- */
        .bright-callout-section {
            padding: 20px 0 70px;
        }
        .bright-callout-card {
            border-radius: var(--radius-lg);
            padding: 36px 38px;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 220px;
            transition: all 0.3s ease;
        }
        .bright-callout-emergency {
            background: linear-gradient(135deg, #fff5f5 0%, #ffffff 100%);
            border: 1.5px solid #fecaca;
            box-shadow: 0 10px 30px rgba(239, 68, 68, 0.06);
        }
        .bright-callout-booking {
            background: linear-gradient(135deg, #f0f9ff 0%, #ffffff 100%);
            border: 1.5px solid #bae6fd;
            box-shadow: 0 10px 30px rgba(2, 132, 199, 0.06);
        }
        .bright-callout-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
        }
        .bright-callout-card h3 {
            font-size: 22px;
            font-weight: 800;
            margin: 0 0 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .bright-callout-emergency h3 { color: #991b1b; }
        .bright-callout-booking h3 { color: #0369a1; }
        
        .bright-callout-card p {
            font-size: 14.5px;
            color: #475569 !important;
            line-height: 1.6;
            margin-bottom: 22px;
        }

        .btn-callout-action {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 14px;
            text-decoration: none !important;
            transition: all 0.25s ease;
            width: fit-content;
        }
        .btn-callout-emergency {
            background: #dc2626;
            color: #ffffff !important;
            box-shadow: 0 4px 14px rgba(220, 38, 38, 0.25);
        }
        .btn-callout-emergency:hover {
            background: #b91c1c;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(220, 38, 38, 0.35);
        }
        .btn-callout-booking {
            background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
            color: #ffffff !important;
            box-shadow: 0 4px 14px rgba(2, 132, 199, 0.25);
        }
        .btn-callout-booking:hover {
            background: linear-gradient(135deg, #0369a1 0%, #075985 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(2, 132, 199, 0.35);
        }

        @media (max-width: 991px) {
            .feedback-hero-title { font-size: 32px; }
            .trust-showcase-panel { border-right: none; border-bottom: 1px solid #e2e8f0; }
            .bright-callout-card { margin-bottom: 20px; }
        }
    </style>
</head>

<body>
    <!-- Preloader -->
    <div id="preloader" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: #ffffff; z-index: 99999; display: flex; align-items: center; justify-content: center; transition: opacity 0.4s ease;">
        <div style="text-align: center;">
            <img src="{{ URL::to('/') }}/img/logo3.png" alt="Loading..." style="width: 70px; height: auto; animation: pulseLogo 1.5s infinite;">
        </div>
    </div>
    <style>
        @keyframes pulseLogo {
            0% { transform: scale(0.92); opacity: 0.8; }
            50% { transform: scale(1.08); opacity: 1; }
            100% { transform: scale(0.92); opacity: 0.8; }
        }
    </style>

    <!-- Header Navigation Partial -->
    @include('partials.header', ['active' => 'feedbackreview'])

    <div class="loaded" id="content">

        <!-- 1. Bright Modern Hero Banner -->
        <section class="feedback-bright-hero hero-animated-bg">
            @include('partials.hero_background')

            <div class="container">
                <div class="hero-content-wrap">
                    <div class="hero-trust-badge">
                        <span class="stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span>
                        <span>4.9 / 5.0 Rating • 12,400+ Patients Treated</span>
                    </div>

                    <h1 class="feedback-hero-title">
                        Your Care Experience <span class="text-brand-gradient">Shapes Our Excellence</span>
                    </h1>

                    <p class="feedback-hero-desc">
                        Every patient review is personally reviewed by our clinical board to enhance medical safety, doctor communication, and compassionate nursing care across Kutch.
                    </p>
                </div>
            </div>
        </section>

        <!-- 2. Master Split Feedback & Rating Experience -->
        <section class="feedback-main-wrapper">
            <div class="container">
                <div class="feedback-split-card">
                    <div class="row g-0">
                        <!-- Left Panel: Trust & Benchmark Statistics -->
                        <div class="col-lg-5">
                            <div class="trust-showcase-panel">
                                <div>
                                    <div class="trust-rating-header">
                                        <div class="big-rating-number">
                                            4.9 <span>/ 5.0</span>
                                        </div>
                                        <div class="star-row">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="rating-subtext">
                                            Verified Patient Satisfaction Score in Kutch & Gujarat
                                        </div>
                                    </div>

                                    <!-- Benchmark Metrics -->
                                    <div class="benchmark-list">
                                        <div class="benchmark-item">
                                            <div class="benchmark-label">
                                                <span>Doctor Expertise & Clarity</span>
                                                <strong>99.2%</strong>
                                            </div>
                                            <div class="benchmark-bar-track">
                                                <div class="benchmark-bar-fill fill-purple" style="width: 99%;"></div>
                                            </div>
                                        </div>
                                        <div class="benchmark-item">
                                            <div class="benchmark-label">
                                                <span>Nursing Care & Empathy</span>
                                                <strong>98.6%</strong>
                                            </div>
                                            <div class="benchmark-bar-track">
                                                <div class="benchmark-bar-fill fill-blue" style="width: 98%;"></div>
                                            </div>
                                        </div>
                                        <div class="benchmark-item">
                                            <div class="benchmark-label">
                                                <span>Cleanliness & Infection Safety</span>
                                                <strong>99.8%</strong>
                                            </div>
                                            <div class="benchmark-bar-track">
                                                <div class="benchmark-bar-fill fill-emerald" style="width: 99.8%;"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Featured Review Snippet -->
                                    <div class="featured-patient-quotes">
                                        <div class="quote-icon"><i class="fa fa-quote-left"></i></div>
                                        <p class="quote-text" id="cyclingQuoteText">
                                            "The doctors in cardiology were exceptionally gentle and thorough. The ICU nursing staff provided around-the-clock warmth and care."
                                        </p>
                                        <div class="quote-author">
                                            <div class="author-avatar" id="cyclingAvatar">RK</div>
                                            <div class="author-details">
                                                <h5 id="cyclingAuthorName">Ramesh K. Patel</h5>
                                                <small id="cyclingDept">Cardiology Inpatient • Bhuj</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="trust-promise-chip">
                                    <i class="fa fa-lock"></i>
                                    <span>100% Confidential • Directly sent to Medical Director</span>
                                </div>
                            </div>
                        </div>

                        <!-- Right Panel: Interactive Review Form -->
                        <div class="col-lg-7">
                            <div class="review-form-panel">
                                <div class="form-header-block">
                                    <h3>Write Your Review</h3>
                                    <p>Tell us about your consultation, hospital stay, or staff experience.</p>
                                </div>

                                <!-- Laravel Flash Alert Messages -->
                                @if (session('success'))
                                    <div class="custom-alert-box alert-success-box">
                                        <i class="fa fa-check-circle alert-icon"></i>
                                        <div>
                                            <strong>Thank you!</strong> {{ session('success') }}
                                        </div>
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="custom-alert-box alert-error-box">
                                        <i class="fa fa-exclamation-triangle alert-icon"></i>
                                        <div>
                                            <strong>Attention:</strong> {{ session('error') }}
                                        </div>
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="custom-alert-box alert-error-box">
                                        <i class="fa fa-times-circle alert-icon"></i>
                                        <div>
                                            <strong>Please check the following fields:</strong>
                                            <ul class="m-0 pl-3">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif

                                <!-- Interactive 5-Star Rating Selector -->
                                <div class="rating-selection-block">
                                    <div>
                                        <div class="rating-selection-label">Rate Overall Medical Care:</div>
                                        <div class="rating-status-text" id="ratingLabel">⭐️⭐️⭐️⭐️⭐️ - Outstanding Experience</div>
                                    </div>
                                    <div class="star-rating-control" id="starContainer">
                                        <span class="star-btn active" data-value="1"><i class="fa fa-star"></i></span>
                                        <span class="star-btn active" data-value="2"><i class="fa fa-star"></i></span>
                                        <span class="star-btn active" data-value="3"><i class="fa fa-star"></i></span>
                                        <span class="star-btn active" data-value="4"><i class="fa fa-star"></i></span>
                                        <span class="star-btn active" data-value="5"><i class="fa fa-star"></i></span>
                                    </div>
                                </div>

                                <!-- Experience Category Chips -->
                                <div class="category-chips-wrap">
                                    <label class="category-chips-label">Select Department / Service (Optional):</label>
                                    <div class="chips-container">
                                        <span class="category-chip" onclick="tagCategory('Cardiology & Cath Lab', this)">Cardiology</span>
                                        <span class="category-chip" onclick="tagCategory('Oncology & Cancer Surgery', this)">Oncology</span>
                                        <span class="category-chip" onclick="tagCategory('Orthopaedics & Joint Care', this)">Orthopaedics</span>
                                        <span class="category-chip" onclick="tagCategory('Nursing & Inpatient Ward', this)">Nursing Care</span>
                                        <span class="category-chip" onclick="tagCategory('Emergency & Trauma', this)">Emergency</span>
                                        <span class="category-chip" onclick="tagCategory('Hospital Ambience & Pharmacy', this)">Cleanliness</span>
                                    </div>
                                </div>

                                <!-- Main Form -->
                                <form action="{{ url('feedbackreview_validates') }}" method="POST" id="feedbackForm">
                                    @csrf

                                    <div class="row">
                                        <!-- Patient Name -->
                                        <div class="col-md-6">
                                            <div class="form-floating-group">
                                                <label for="feedbackName">
                                                    Your Full Name <span class="required-mark">*</span>
                                                </label>
                                                <div class="input-icon-wrap">
                                                    <input type="text" 
                                                           name="name" 
                                                           id="feedbackName" 
                                                           class="modern-form-input" 
                                                           placeholder="e.g. Ramesh" 
                                                           value="{{ old('name') }}" 
                                                           required 
                                                           minlength="3" 
                                                           maxlength="12">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <div class="field-hint-text">
                                                    <span>Letters only (3 to 12 chars)</span>
                                                </div>
                                                @error('name')
                                                    <small class="text-danger font-weight-bold">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Email Address -->
                                        <div class="col-md-6">
                                            <div class="form-floating-group">
                                                <label for="feedbackEmail">
                                                    Email Address <span class="required-mark">*</span>
                                                </label>
                                                <div class="input-icon-wrap">
                                                    <input type="email" 
                                                           name="email" 
                                                           id="feedbackEmail" 
                                                           class="modern-form-input" 
                                                           placeholder="e.g. name@gmail.com" 
                                                           value="{{ old('email') }}" 
                                                           required>
                                                    <i class="fa fa-envelope"></i>
                                                </div>
                                                <div class="field-hint-text">
                                                    <span>Valid email for verification</span>
                                                </div>
                                                @error('email')
                                                    <small class="text-danger font-weight-bold">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Message Content -->
                                        <div class="col-12">
                                            <div class="form-floating-group">
                                                <label for="feedbackMessage">
                                                    Your Detailed Review & Comments <span class="required-mark">*</span>
                                                </label>
                                                <div class="input-icon-wrap textarea-icon">
                                                    <textarea name="message" 
                                                              id="feedbackMessage" 
                                                              class="modern-form-textarea" 
                                                              placeholder="Please share details of your doctor consultation, nursing care, wait time, or amenities..." 
                                                              required>{{ old('message') }}</textarea>
                                                    <i class="fa fa-commenting"></i>
                                                </div>
                                                <div class="field-hint-text">
                                                    <span>Constructive clinical feedback helps our team</span>
                                                    <span id="charCounter">0 characters</span>
                                                </div>
                                                @error('message')
                                                    <small class="text-danger font-weight-bold">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="col-12 mt-2">
                                            <button type="submit" class="btn-submit-feedback">
                                                <i class="fa fa-paper-plane"></i>
                                                <span>Submit Patient Review</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. Recent Verified Patient Reviews Section -->
        <section class="verified-reviews-section">
            <div class="container">
                <div class="section-header-center">
                    <h3>Recent Patient Stories</h3>
                    <p>Real experiences shared by patients and families who received care at KK Patel Hospital.</p>
                </div>

                <div class="row g-4">
                    <!-- Review Card 1 -->
                    <div class="col-md-4 mb-4">
                        <div class="verified-card">
                            <div>
                                <div class="verified-card-top">
                                    <div class="v-stars">
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    </div>
                                    <span class="dept-tag">Cardiology</span>
                                </div>
                                <p class="v-quote">
                                    "When my father had severe chest pain, the 24/7 emergency and cath lab team performed an emergency angioplasty within 45 minutes. They gave him a second life."
                                </p>
                            </div>
                            <div class="v-user">
                                <div class="v-avatar">MK</div>
                                <div class="v-meta">
                                    <h6>Mukesh Kumar</h6>
                                    <span>Verified Family Member • Mundra</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Review Card 2 -->
                    <div class="col-md-4 mb-4">
                        <div class="verified-card">
                            <div>
                                <div class="verified-card-top">
                                    <div class="v-stars">
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    </div>
                                    <span class="dept-tag">Orthopaedics</span>
                                </div>
                                <p class="v-quote">
                                    "Both knee replacements done with advanced modular theatre protocols. The physiotherapy department guided my recovery every single day. Pain-free mobility!"
                                </p>
                            </div>
                            <div class="v-user">
                                <div class="v-avatar">SP</div>
                                <div class="v-meta">
                                    <h6>Shilpaben Patel</h6>
                                    <span>Joint Replacement • Bhuj</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Review Card 3 -->
                    <div class="col-md-4 mb-4">
                        <div class="verified-card">
                            <div>
                                <div class="verified-card-top">
                                    <div class="v-stars">
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    </div>
                                    <span class="dept-tag">Oncology</span>
                                </div>
                                <p class="v-quote">
                                    "Warm nurses, spotless hygiene, and very empathetic oncologists. You don't need to travel to Ahmedabad or Mumbai anymore. Exceptional facilities in Kutch."
                                </p>
                            </div>
                            <div class="v-user">
                                <div class="v-avatar">JJ</div>
                                <div class="v-meta">
                                    <h6>Jagdish Jadeja</h6>
                                    <span>Daycare Patient • Anjar</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. Modern Emergency & Appointment Banner -->
        @include('partials.emergency_banner')

    </div>

    <!-- Modern Light Footer Partial -->
    @include('partials.footer')

    <!-- Scripts -->
    <script src="{{ URL::to('/') }}/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{ URL::to('/') }}/js/popper.min.js"></script>
    <script src="{{ URL::to('/') }}/js/bootstrap.min.js"></script>
    <script src="{{ URL::to('/') }}/js/owl.carousel.min.js"></script>
    <script src="{{ URL::to('/') }}/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{ URL::to('/') }}/js/wow.min.js"></script>
    <script src="{{ URL::to('/') }}/js/jquery.slicknav.min.js"></script>
    <script src="{{ URL::to('/') }}/js/main.js"></script>

    <!-- Interactive Rating & Testimonial Cycling Scripts -->
    <script>
        // Preloader
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

        // Interactive Star Rating
        var ratingDescriptions = {
            1: "⭐️ - Needs Immediate Improvement",
            2: "⭐️⭐️ - Fair, Scope for Improvement",
            3: "⭐️⭐️⭐️ - Good Healthcare Experience",
            4: "⭐️⭐️⭐️⭐️ - Very Good, Highly Satisfied",
            5: "⭐️⭐️⭐️⭐️⭐️ - Outstanding Experience & Care"
        };
        var currentRating = 5;

        var starButtons = document.querySelectorAll('.star-rating-control .star-btn');
        var ratingLabel = document.getElementById('ratingLabel');

        starButtons.forEach(function(btn) {
            btn.addEventListener('click', function() {
                var val = parseInt(this.getAttribute('data-value'), 10);
                currentRating = val;
                updateStarDisplay(val);
                if (ratingLabel && ratingDescriptions[val]) {
                    ratingLabel.innerText = ratingDescriptions[val];
                }
            });
        });

        function updateStarDisplay(val) {
            starButtons.forEach(function(btn) {
                var btnVal = parseInt(btn.getAttribute('data-value'), 10);
                if (btnVal <= val) {
                    btn.classList.add('active');
                } else {
                    btn.classList.remove('active');
                }
            });
        }

        // Category Tagging Helper
        function tagCategory(categoryName, chipElement) {
            var textarea = document.getElementById('feedbackMessage');
            if (chipElement.classList.contains('active')) {
                chipElement.classList.remove('active');
                return;
            }
            // Toggle active chip
            document.querySelectorAll('.category-chip').forEach(function(c) {
                c.classList.remove('active');
            });
            chipElement.classList.add('active');

            if (textarea) {
                var tagPrefix = "[" + categoryName + "] ";
                if (!textarea.value.startsWith(tagPrefix)) {
                    textarea.value = tagPrefix + textarea.value;
                }
                textarea.focus();
                updateCharCount();
            }
        }

        // Character counter
        var msgTextarea = document.getElementById('feedbackMessage');
        var charCounter = document.getElementById('charCounter');

        function updateCharCount() {
            if (msgTextarea && charCounter) {
                var len = msgTextarea.value.length;
                charCounter.innerText = len + " characters";
            }
        }
        if (msgTextarea) {
            msgTextarea.addEventListener('input', updateCharCount);
            updateCharCount();
        }

        // Testimonial cycling in left card
        var rotatingQuotes = [
            {
                quote: "The doctors in cardiology were exceptionally gentle and thorough. The ICU nursing staff provided around-the-clock warmth and care.",
                author: "Ramesh K. Patel",
                dept: "Cardiology Inpatient • Bhuj",
                avatar: "RK"
            },
            {
                quote: "Underwent total knee replacement surgery here. Clean sterile modular OTs and the physiotherapy team got me walking comfortably in days.",
                author: "Meenaben Shah",
                dept: "Orthopaedics • Mandvi",
                avatar: "MS"
            },
            {
                quote: "Spotless cleanliness, transparent billing under PMJAY scheme, and very kind cancer care specialists. A blessing for all of Kutch.",
                author: "Jayeshbhai Jadeja",
                dept: "Oncology Care • Anjar",
                avatar: "JJ"
            }
        ];
        var quoteIdx = 0;
        setInterval(function() {
            quoteIdx = (quoteIdx + 1) % rotatingQuotes.length;
            var q = rotatingQuotes[quoteIdx];
            var qText = document.getElementById('cyclingQuoteText');
            var qAuthor = document.getElementById('cyclingAuthorName');
            var qDept = document.getElementById('cyclingDept');
            var qAvatar = document.getElementById('cyclingAvatar');

            if (qText && qAuthor && qDept && qAvatar) {
                qText.style.opacity = '0';
                setTimeout(function() {
                    qText.innerText = '"' + q.quote + '"';
                    qAuthor.innerText = q.author;
                    qDept.innerText = q.dept;
                    qAvatar.innerText = q.avatar;
                    qText.style.opacity = '1';
                }, 300);
            }
        }, 6000);
    </script>
</body>

</html>
