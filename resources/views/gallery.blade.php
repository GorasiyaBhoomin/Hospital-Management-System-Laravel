<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hospital Photo Gallery | KK Patel Super Speciality Hospital</title>
    <meta name="description" content="View photo gallery of KK Patel Super Speciality Hospital campus, modular operation theatres, modern ICU, Cath Lab, and patient care facilities.">
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

    <!-- Modern Gallery Page Styles & Animations -->
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
        .gallery-hero-section {
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

        .gallery-hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 820px;
            margin: 0 auto;
        }

        .gallery-hero-badge {
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

        .gallery-hero-title {
            font-size: 46px;
            font-weight: 800;
            line-height: 1.2;
            letter-spacing: -0.6px;
            color: #0f172a;
            margin-bottom: 16px;
            animation: fadeInUp 0.7s ease-out;
        }

        .gallery-hero-title .text-gradient {
            background: linear-gradient(135deg, #69275c 0%, #0284c7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .gallery-hero-desc {
            font-size: 16.5px;
            color: #475569;
            line-height: 1.6;
            margin-bottom: 24px;
            animation: fadeInUp 0.8s ease-out;
        }

        /* -------------------------------------------------------------
           2. MODERN RESPONSIVE PHOTO GALLERY
           ------------------------------------------------------------- */
        .gallery-main-section {
            padding: 70px 0 90px;
        }

        .gallery-filter-bar {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 40px;
        }

        .gallery-filter-btn {
            background: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 50px;
            padding: 8px 20px;
            font-size: 13.5px;
            font-weight: 600;
            color: #475569;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .gallery-filter-btn:hover,
        .gallery-filter-btn.active {
            background: #69275c;
            color: #ffffff;
            border-color: #69275c;
            box-shadow: 0 4px 14px rgba(105, 39, 92, 0.35);
            transform: translateY(-2px);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 24px;
        }

        .gallery-item-card {
            background: #ffffff;
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-card);
            border: 1px solid rgba(226, 232, 240, 0.9);
            position: relative;
            cursor: pointer;
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            height: 250px;
        }

        .gallery-item-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-hover);
        }

        .gallery-item-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .gallery-item-card:hover img {
            transform: scale(1.08);
        }

        .gallery-overlay-badge {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 24px 20px 16px;
            background: linear-gradient(to top, rgba(15, 23, 42, 0.85) 0%, rgba(15, 23, 42, 0) 100%);
            color: #ffffff;
            transform: translateY(10px);
            opacity: 0.9;
            transition: all 0.3s ease;
        }

        .gallery-item-card:hover .gallery-overlay-badge {
            transform: translateY(0);
            opacity: 1;
        }

        .gallery-overlay-badge h5 {
            font-size: 15px;
            font-weight: 700;
            color: #ffffff;
            margin: 0;
        }

        .gallery-overlay-badge small {
            color: #38bdf8;
            font-weight: 600;
            font-size: 11.5px;
        }

        /* -------------------------------------------------------------
           3. LIGHTBOX PREVIEW MODAL
           ------------------------------------------------------------- */
        .lightbox-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(8px);
            z-index: 99999;
            align-items: center;
            justify-content: center;
            padding: 20px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .lightbox-modal.active {
            display: flex;
            opacity: 1;
        }

        .lightbox-img-box {
            max-width: 900px;
            max-height: 85vh;
            border-radius: 16px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.5);
            background: #000000;
        }

        .lightbox-img-box img {
            width: 100%;
            height: auto;
            max-height: 85vh;
            display: block;
            object-fit: contain;
        }

        .lightbox-close-btn {
            position: absolute;
            top: -45px;
            right: 0;
            background: transparent;
            border: none;
            color: #ffffff;
            font-size: 28px;
            cursor: pointer;
        }

        /* -------------------------------------------------------------
           4. EMERGENCY & APPOINTMENT CALLOUT
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
            .gallery-hero-title { font-size: 34px; }
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
    @include('partials.header', ['active' => 'gallery'])
    <!-- Header Navigation End -->

    <div class="loaded" id="content">

        <!-- 1. Hero Showcase Section -->
        <section class="gallery-hero-section hero-animated-bg">
            @include('partials.hero_background')

            <div class="container">
                <div class="gallery-hero-content">
                    <div class="gallery-hero-badge">
                        <span class="pulse-live-ring"></span>
                        <span>Campus & Clinical Facilities &bull; KK Patel Hospital</span>
                    </div>
                    <h1 class="gallery-hero-title">
                        Explore Our World-Class <br>
                        <span class="text-gradient">Hospital Photo Gallery</span>
                    </h1>
                    <p class="gallery-hero-desc">
                        Take a visual tour of our modern 13-acre medical campus, ultra-clean modular operating suites, specialized intensive care units, and clinical infrastructure in Bhuj.
                    </p>
                </div>
            </div>
        </section>

        <!-- 2. Photo Gallery Section -->
        <section class="gallery-main-section">
            <div class="container">
                <div class="gallery-grid">
                    <div class="gallery-item-card" onclick="openLightbox('{{ URL::to('/') }}/img/gallery/gallery10.jpg', 'Hospital Exterior & Reception')">
                        <img src="{{ URL::to('/') }}/img/gallery/gallery10.jpg" alt="Hospital Exterior">
                        <div class="gallery-overlay-badge">
                            <h5>Main Hospital Entrance</h5>
                            <small>Campus Architecture</small>
                        </div>
                    </div>

                    <div class="gallery-item-card" onclick="openLightbox('{{ URL::to('/') }}/img/gallery/gallery9.jpg', 'Advanced Cardiac Cath Lab')">
                        <img src="{{ URL::to('/') }}/img/gallery/gallery9.jpg" alt="Cath Lab">
                        <div class="gallery-overlay-badge">
                            <h5>Cardiac Cath Lab Suite</h5>
                            <small>Interventional Cardiology</small>
                        </div>
                    </div>

                    <div class="gallery-item-card" onclick="openLightbox('{{ URL::to('/') }}/img/gallery/gallery5.jpg', 'Modular Operation Theatre')">
                        <img src="{{ URL::to('/') }}/img/gallery/gallery5.jpg" alt="Modular OT">
                        <div class="gallery-overlay-badge">
                            <h5>Modular Operation Suite</h5>
                            <small>Laminar Airflow Theatre</small>
                        </div>
                    </div>

                    <div class="gallery-item-card" onclick="openLightbox('{{ URL::to('/') }}/img/gallery/gallery2.jpg', 'Intensive Care Unit (ICU)')">
                        <img src="{{ URL::to('/') }}/img/gallery/gallery2.jpg" alt="ICU">
                        <div class="gallery-overlay-badge">
                            <h5>Critical Care & ICU</h5>
                            <small>24/7 Patient Monitoring</small>
                        </div>
                    </div>

                    <div class="gallery-item-card" onclick="openLightbox('{{ URL::to('/') }}/img/gallery/gallery6.jpg', 'Diagnostic Imaging & CT Scan')">
                        <img src="{{ URL::to('/') }}/img/gallery/gallery6.jpg" alt="CT Scan">
                        <div class="gallery-overlay-badge">
                            <h5>128-Slice Cardiac CT</h5>
                            <small>Advanced Radiology</small>
                        </div>
                    </div>

                    <div class="gallery-item-card" onclick="openLightbox('{{ URL::to('/') }}/img/gallery/gallery4.jpg', 'Hospital Inpatient Deluxe Rooms')">
                        <img src="{{ URL::to('/') }}/img/gallery/gallery4.jpg" alt="Inpatient Rooms">
                        <div class="gallery-overlay-badge">
                            <h5>Deluxe Patient Suites</h5>
                            <small>Comfort & Healing</small>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Lightbox Modal -->
        <div id="lightboxModal" class="lightbox-modal" onclick="closeLightbox(event)">
            <div class="lightbox-img-box">
                <button type="button" class="lightbox-close-btn" onclick="forceCloseLightbox()">&times;</button>
                <img id="lightboxImg" src="" alt="Enlarged photo">
            </div>
        </div>

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

        function openLightbox(imgSrc, title) {
            var modal = document.getElementById('lightboxModal');
            var img = document.getElementById('lightboxImg');
            if (modal && img) {
                img.src = imgSrc;
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        }

        function forceCloseLightbox() {
            var modal = document.getElementById('lightboxModal');
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        function closeLightbox(event) {
            if (event.target.id === 'lightboxModal') {
                forceCloseLightbox();
            }
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                forceCloseLightbox();
            }
        });
    </script>
</body>

</html>
