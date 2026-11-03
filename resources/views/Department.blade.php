<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Centres of Excellence & Departments | KK Patel Hospital</title>
    <meta name="description" content="Explore super speciality clinical departments at KK Patel Hospital: Cardiology, Oncology, Orthopaedics, Nephrology, Urology, and 24/7 Emergency.">
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

    <!-- Modern Department Page Styles & Animations -->
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
        .dept-hero-section {
            position: relative;
            background: linear-gradient(135deg, #f0f7ff 0%, #ffffff 50%, #fbf5fa 100%);
            padding: 75px 0 85px;
            border-bottom: 1px solid #e2e8f0;
            overflow: hidden;
            color: #0f172a;
        }

        .hero-glow-orb {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            filter: blur(85px);
            z-index: 0;
            opacity: 0.55;
            animation: heroGlowPulse 9s ease-in-out infinite alternate;
        }

        .hero-glow-1 {
            top: -60px;
            left: -40px;
            width: 480px;
            height: 480px;
            background: radial-gradient(circle, rgba(105, 39, 92, 0.12) 0%, rgba(105, 39, 92, 0) 70%);
        }

        .hero-glow-2 {
            bottom: -80px;
            right: -60px;
            width: 520px;
            height: 520px;
            background: radial-gradient(circle, rgba(0, 168, 150, 0.12) 0%, rgba(0, 168, 150, 0) 70%);
            animation-delay: -4.5s;
        }

        @keyframes heroGlowPulse {
            0% { transform: scale(1) translate(0, 0); opacity: 0.45; }
            50% { transform: scale(1.15) translate(25px, -15px); opacity: 0.7; }
            100% { transform: scale(1) translate(0, 0); opacity: 0.45; }
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

        .dept-hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 820px;
            margin: 0 auto;
        }

        .dept-hero-badge {
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

        .dept-hero-title {
            font-size: 46px;
            font-weight: 800;
            line-height: 1.2;
            letter-spacing: -0.6px;
            color: #0f172a;
            margin-bottom: 16px;
            animation: fadeInUp 0.7s ease-out;
        }

        .dept-hero-title .text-gradient {
            background: linear-gradient(135deg, #69275c 0%, #0284c7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .dept-hero-desc {
            font-size: 17px;
            color: #475569;
            line-height: 1.65;
            margin-bottom: 24px;
            animation: fadeInUp 0.8s ease-out;
        }

        .dept-search-wrapper {
            position: relative;
            max-width: 580px;
            margin: 0 auto;
            z-index: 3;
            animation: fadeInUp 0.9s ease-out;
        }

        .dept-search-box {
            position: relative;
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 50px;
            padding: 6px 8px 6px 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
            transition: all 0.3s ease;
        }

        .dept-search-box:focus-within {
            background: #ffffff;
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.35), 0 0 0 3px rgba(56, 189, 248, 0.4);
            transform: translateY(-2px);
        }

        .dept-search-box i {
            font-size: 18px;
            color: #69275c;
            margin-right: 12px;
        }

        .dept-search-input {
            flex: 1;
            border: none;
            outline: none;
            background: transparent;
            font-size: 15px;
            font-weight: 500;
            color: #0f172a;
            font-family: inherit;
        }

        /* -------------------------------------------------------------
           2. DEPARTMENTS GRID
           ------------------------------------------------------------- */
        .dept-grid-section {
            padding: 70px 0 90px;
        }

        .dept-counter-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 35px;
            padding-bottom: 18px;
            border-bottom: 1px solid #e2e8f0;
            flex-wrap: wrap;
            gap: 14px;
        }

        .dept-counter-text {
            font-size: 15px;
            font-weight: 600;
            color: #64748b;
            margin: 0;
        }

        .dept-counter-badge {
            background: #e0f2fe;
            color: #0369a1;
            padding: 4px 12px;
            border-radius: 50px;
            font-weight: 700;
        }

        .modern-dept-card {
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

        .modern-dept-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-hover);
            border-color: rgba(105, 39, 92, 0.35);
        }

        .dept-thumb-container {
            position: relative;
            height: 200px;
            overflow: hidden;
            background: #f1f5f9;
        }

        .dept-thumb-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .modern-dept-card:hover .dept-thumb-img {
            transform: scale(1.08);
        }

        .dept-badge-overlay {
            position: absolute;
            top: 14px;
            left: 14px;
            background: rgba(15, 23, 42, 0.75);
            backdrop-filter: blur(8px);
            color: #ffffff;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 11.5px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .dept-card-body {
            padding: 24px 22px 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .dept-title {
            font-size: 20px;
            font-weight: 800;
            color: #0f172a;
            margin: 0 0 8px;
            text-transform: capitalize;
            transition: color 0.2s ease;
        }

        .modern-dept-card:hover .dept-title {
            color: #69275c;
        }

        .dept-head-chip {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #f0fdf4;
            color: #15803d;
            border: 1px solid #bbf7d0;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 14px;
            width: fit-content;
        }

        .dept-desc-text {
            font-size: 13.5px;
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 20px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .dept-card-actions {
            margin-top: auto;
            display: flex;
            align-items: center;
            gap: 10px;
            padding-top: 14px;
            border-top: 1px solid #f1f5f9;
        }

        .btn-book-dept {
            flex: 1.3;
            background: linear-gradient(135deg, #69275c 0%, #a2388c 100%);
            color: #ffffff !important;
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

        .btn-book-dept:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(105, 39, 92, 0.45);
        }

        .btn-dept-docs {
            flex: 1;
            background: #ffffff;
            color: #334155;
            border: 1.5px solid #cbd5e1;
            padding: 10px 12px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none !important;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            transition: all 0.2s ease;
        }

        .btn-dept-docs:hover {
            background: #f1f5f9;
            color: #0f172a;
            border-color: #94a3b8;
        }

        .no-results-state {
            display: none;
            text-align: center;
            padding: 60px 20px;
            background: #ffffff;
            border-radius: var(--radius-lg);
            border: 1px dashed #cbd5e1;
            margin: 20px 0 40px;
        }

        /* -------------------------------------------------------------
           3. EMERGENCY & ONLINE BOOKING CALLOUT
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
            .dept-hero-title { font-size: 34px; }
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
    @include('partials.header', ['active' => 'department'])
    <!-- Header Navigation End -->

    <div class="loaded" id="content">

        <!-- 1. Hero Showcase Section -->
        <section class="dept-hero-section hero-animated-bg">
            @include('partials.hero_background')

            <div class="container">
                <div class="dept-hero-content">
                    <div class="dept-hero-badge">
                        <span class="pulse-live-ring"></span>
                        <span>Clinical Centres of Excellence &bull; KK Patel Hospital</span>
                    </div>
                    <h1 class="dept-hero-title">
                        Advanced Medical & <br>
                        <span class="text-gradient">Super Speciality Departments</span>
                    </h1>
                    <p class="dept-hero-desc">
                        Explore our comprehensive clinical departments led by senior medical consultants, board-certified surgeons, and equipped with next-generation medical technology.
                    </p>

                    <!-- Realtime Department Search -->
                   
                </div>
            </div>
        </section>

        <!-- 2. Departments Grid Section -->
        <section class="dept-grid-section">
            <div class="container">
                <div class="dept-counter-bar">
                    <p class="dept-counter-text">
                        Showing <span class="dept-counter-badge" id="deptCountDisplay">{{ count($std1) }}</span> active super-speciality departments
                    </p>
                    <div style="font-size: 13px; color: #10b981; font-weight: 600;">
                        <i class="fa fa-check-circle m-r-5"></i> 24/7 Outpatient & Inpatient Admissions
                    </div>
                </div>

                <!-- Empty State -->
                <div id="noDeptFound" class="no-results-state">
                    <i class="fa fa-hospital-o fa-3x text-muted mb-3" style="display: block;"></i>
                    <h4 style="font-weight: 700; color: #0f172a;">No Departments Found</h4>
                    <p style="color: #64748b; font-size: 14px;">Try searching with different keywords like Cardiology, Cancer, or Bones.</p>
                </div>

                <div class="row" id="deptGridRow">
                    @foreach($std1 as $dept)
                        @php
                            $deptImg = $dept->departmentimage ? asset($dept->departmentimage) : URL::to('/img/about/2.png');
                            $deptClean = strtolower(trim($dept->departmentname));
                            $descClean = strtolower(trim($dept->description));
                            $headClean = strtolower(trim($dept->departmenthead));
                        @endphp
                        <div class="col-12 col-md-6 col-lg-4 mb-4 dept-card-col"
                             data-dept="{{ $deptClean }}"
                             data-desc="{{ $descClean }}"
                             data-head="{{ $headClean }}">
                            <div class="modern-dept-card">
                                <div class="dept-thumb-container">
                                    <img src="{{ $deptImg }}" alt="{{ $dept->departmentname }}" class="dept-thumb-img" onerror="this.src='{{ URL::to('/') }}/img/about/2.png'">
                                    <div class="dept-badge-overlay">
                                        <i class="fa fa-star text-warning"></i> Centre of Excellence
                                    </div>
                                </div>
                                <div class="dept-card-body">
                                    <h4 class="dept-title">{{ $dept->departmentname }}</h4>
                                    
                                    <div class="dept-head-chip">
                                        <i class="fa fa-user-md"></i> Head: {{ $dept->departmenthead ? $dept->departmenthead : 'Specialist Consultant' }}
                                    </div>

                                    <p class="dept-desc-text">
                                        {{ $dept->description ? $dept->description : 'Providing dedicated tertiary clinical management, advanced diagnostics, and compassionate therapeutic rehabilitation.' }}
                                    </p>

                                    <div class="dept-card-actions">
                                        <a href="{{ url('appointment') }}?dept={{ urlencode($dept->departmentname) }}" class="btn-book-dept">
                                            <i class="fa fa-calendar-check-o"></i> Book in Dept
                                        </a>
                                        <a href="{{ url('Doctors') }}" class="btn-dept-docs">
                                            <i class="fa fa-stethoscope"></i> Doctors
                                        </a>
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

        // Instant Department Filter
        function filterDepartments() {
            var searchInput = document.getElementById('deptSearchInput');
            var query = searchInput ? searchInput.value.toLowerCase().trim() : '';
            var cards = document.querySelectorAll('.dept-card-col');
            var visibleCount = 0;

            cards.forEach(function(card) {
                var dept = card.getAttribute('data-dept') || '';
                var desc = card.getAttribute('data-desc') || '';
                var head = card.getAttribute('data-head') || '';

                var matches = (!query) || 
                              (dept.indexOf(query) !== -1) || 
                              (desc.indexOf(query) !== -1) || 
                              (head.indexOf(query) !== -1);

                if (matches) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            var countDisplay = document.getElementById('deptCountDisplay');
            if (countDisplay) {
                countDisplay.innerText = visibleCount;
            }

            var noResults = document.getElementById('noDeptFound');
            if (noResults) {
                noResults.style.display = (visibleCount === 0) ? 'block' : 'none';
            }
        }
    </script>
</body>

</html>
