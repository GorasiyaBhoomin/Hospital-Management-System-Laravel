<!-- ===================================================================
     MODERN LIGHT PATIENT PORTAL FOOTER (resources/views/user/footer.blade.php)
     =================================================================== -->
<footer class="patient-portal-light-footer">
    
    <!-- 1. Clinical Assurances & Trust Ribbon -->
    <div class="user-footer-trust-strip">
        <div class="container">
            <div class="row g-3">
                <!-- Trust 1 -->
                <div class="col-12 col-sm-6 col-lg-3 mb-2 mb-lg-0">
                    <div class="user-trust-card">
                        <div class="user-trust-icon bg-rose-light text-danger">
                            <i class="fa fa-ambulance"></i>
                        </div>
                        <div class="user-trust-info">
                            <h5>24/7 Trauma Emergency</h5>
                            <p>Direct ICU & Stroke Response</p>
                            <a href="tel:02832236000" class="user-trust-link text-danger">
                                Call: 02832 236000 &rarr;
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Trust 2 -->
                <div class="col-12 col-sm-6 col-lg-3 mb-2 mb-lg-0">
                    <div class="user-trust-card">
                        <div class="user-trust-icon bg-emerald-light text-success">
                            <i class="fa fa-shield"></i>
                        </div>
                        <div class="user-trust-info">
                            <h5>NABH Accredited</h5>
                            <p>Highest Patient Safety Care</p>
                            <span class="user-trust-badge text-success">Verified Hospital</span>
                        </div>
                    </div>
                </div>

                <!-- Trust 3 -->
                <div class="col-12 col-sm-6 col-lg-3 mb-2 mb-sm-0">
                    <div class="user-trust-card">
                        <div class="user-trust-icon bg-cyan-light text-info">
                            <i class="fa fa-credit-card"></i>
                        </div>
                        <div class="user-trust-info">
                            <h5>PMJAY & Cashless</h5>
                            <p>Ayushman Bharat Empanelled</p>
                            <span class="user-trust-badge text-info">100% Cashless OPD</span>
                        </div>
                    </div>
                </div>

                <!-- Trust 4 -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="user-trust-card">
                        <div class="user-trust-icon bg-purple-light text-primary">
                            <i class="fa fa-file-text-o"></i>
                        </div>
                        <div class="user-trust-info">
                            <h5>Digital OPD Slips</h5>
                            <p>Instant Consultation Tokens</p>
                            <a href="{{ url('/user/appointment-history') }}" class="user-trust-link text-primary">
                                View My Slips &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. Main Footer Body -->
    <div class="user-footer-main-body py-4">
        <div class="container">
            <div class="row">
                <!-- Col 1: Hospital Brand & Mission -->
                <div class="col-12 col-lg-4 mb-4 mb-lg-0">
                    <div class="user-footer-brand mb-3">
                        <a href="{{ url('/user/dashboard') }}">
                            <img src="{{ URL::to('/') }}/img/logo2.png" alt="KK Patel Super Speciality Hospital" class="user-footer-logo">
                        </a>
                    </div>
                    <p class="user-footer-text">
                        K.K. Patel Super Speciality Hospital brings world-class cardiac, oncology, nephrology, and 24/7 critical trauma healing directly to the citizens of Kutch and Gujarat.
                    </p>
                    <div class="user-hotline-pill mt-3">
                        <div class="user-hotline-circle">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div>
                            <span class="user-hotline-label">OPD APPOINTMENTS HELPDESK</span>
                            <a href="tel:02832232233" class="user-hotline-phone">02832 232233 / 232244</a>
                        </div>
                    </div>
                </div>

                <!-- Col 2: Quick Patient Navigation -->
                <div class="col-12 col-sm-6 col-lg-4 mb-4 mb-sm-0">
                    <h5 class="user-footer-heading">
                        <i class="fa fa-th-large text-primary m-r-5"></i> Patient Portal Links
                    </h5>
                    <div class="row">
                        <div class="col-6">
                            <ul class="user-footer-links">
                                <li>
                                    <a href="{{ url('/user/dashboard') }}">
                                        <i class="fa fa-angle-right"></i> Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/user/book-appointment') }}">
                                        <i class="fa fa-angle-right"></i> Book OPD
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/user/appointment-history') }}">
                                        <i class="fa fa-angle-right"></i> My Slips
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="user-footer-links">
                                <li>
                                    <a href="{{ url('/user/doctors') }}">
                                        <i class="fa fa-angle-right"></i> Doctors
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/user/departments') }}">
                                        <i class="fa fa-angle-right"></i> Clinical Wings
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/user/profile') }}">
                                        <i class="fa fa-angle-right"></i> Profile
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    
                </div>

                <!-- Col 3: Hospital Campus & Emergency -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <h5 class="user-footer-heading">
                        <i class="fa fa-map-marker text-danger m-r-5"></i> Hospital Campus & Helpdesk
                    </h5>
                    <ul class="user-campus-info-list">
                        <li>
                            <i class="fa fa-ambulance text-danger"></i>
                            <div>
                                <strong>Emergency Ambulance:</strong>
                                <span class="text-danger font-weight-bold ml-1">Dial 108</span>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-hospital-o text-primary"></i>
                            <div>
                                <strong>Trauma Unit:</strong>
                                <a href="tel:02832236000" class="text-dark font-weight-bold ml-1">02832 236000</a>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-map-pin text-info"></i>
                            <div>
                                <span>Bhuj - Mirzapar Highway, Bhuj, Kutch, Gujarat 370001</span>
                            </div>
                        </li>
                    </ul>

                    <div class="d-flex align-items-center gap-2 mt-3">
                        <span class="user-trust-tag"><i class="fa fa-lock text-success"></i> 256-bit SSL</span>
                        <span class="user-trust-tag"><i class="fa fa-heartbeat text-danger"></i> NABH Certified</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Bottom Copyright Bar -->
    <div class="user-footer-bottom-bar py-3">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                <span class="user-copyright-text">
                                    <center>

                    &copy; {{ date('Y') }} <strong>KK Patel Super Speciality Hospital</strong>, Bhuj. Patient Medical Management Portal.
                                </center>

                </span>
                
            </div>
        </div>
    </div>
</footer>

<!-- Modern Light Footer Styling -->
<style>
    .patient-portal-light-footer {
        background: #ffffff !important;
        border-top: 1px solid #e2e8f0 !important;
        margin-top: auto;
        color: #475569 !important;
        font-family: inherit;
    }

    /* 1. Trust Ribbon */
    .user-footer-trust-strip {
        background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
        border-bottom: 1px solid #f1f5f9;
        padding: 24px 0;
    }

    .user-trust-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 14px 16px;
        display: flex;
        align-items: center;
        gap: 12px;
        height: 100%;
        transition: all 0.2s ease;
        box-shadow: 0 2px 8px rgba(15, 23, 42, 0.03);
    }

    .user-trust-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(15, 23, 42, 0.08);
        border-color: #cbd5e1;
    }

    .user-trust-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
    }

    .bg-rose-light    { background: #ffe4e6; }
    .bg-emerald-light { background: #d1fae5; }
    .bg-cyan-light    { background: #e0f2fe; }
    .bg-purple-light  { background: #f3e8ff; }

    .user-trust-info h5 {
        font-size: 13.5px;
        font-weight: 800;
        color: #0f172a;
        margin: 0 0 2px;
        line-height: 1.2;
    }

    .user-trust-info p {
        font-size: 11.5px;
        color: #64748b;
        margin: 0 0 3px;
        line-height: 1.2;
    }

    .user-trust-link {
        font-size: 11.5px;
        font-weight: 700;
        text-decoration: none !important;
    }

    .user-trust-link:hover {
        text-decoration: underline !important;
    }

    .user-trust-badge {
        font-size: 10.5px;
        font-weight: 800;
        background: #f1f5f9;
        padding: 2px 7px;
        border-radius: 50px;
        display: inline-block;
    }

    /* 2. Main Footer Body */
    .user-footer-main-body {
        background: #ffffff;
    }

    .user-footer-logo {
        height: 38px;
        width: auto;
    }

    .user-footer-text {
        font-size: 13px;
        color: #64748b;
        line-height: 1.6;
        margin-bottom: 0;
    }

    .user-hotline-pill {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        background: #fbf5fa;
        border: 1.5px solid #ebdbe8;
        padding: 10px 16px;
        border-radius: 12px;
    }

    .user-hotline-circle {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #69275c;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        flex-shrink: 0;
    }

    .user-hotline-label {
        font-size: 10px;
        font-weight: 800;
        color: #69275c;
        letter-spacing: 0.6px;
        display: block;
    }

    .user-hotline-phone {
        font-size: 14.5px;
        font-weight: 800;
        color: #0f172a;
        text-decoration: none !important;
    }

    .user-footer-heading {
        font-size: 15px;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 14px;
        display: flex;
        align-items: center;
    }

    .user-footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .user-footer-links li {
        margin-bottom: 8px;
    }

    .user-footer-links a {
        font-size: 13px;
        font-weight: 600;
        color: #475569;
        text-decoration: none !important;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .user-footer-links a:hover {
        color: #69275c;
        transform: translateX(3px);
    }

    .user-switch-site-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 12.5px;
        font-weight: 700;
        color: #69275c;
        text-decoration: none !important;
        transition: color 0.2s ease;
    }

    .user-switch-site-btn:hover {
        color: #8b1d6b;
        text-decoration: underline !important;
    }

    .user-campus-info-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .user-campus-info-list li {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 9px;
        font-size: 12.5px;
        color: #475569;
        line-height: 1.4;
    }

    .user-campus-info-list li i {
        margin-top: 3px;
        flex-shrink: 0;
    }

    .user-trust-tag {
        font-size: 11px;
        font-weight: 700;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        padding: 3px 10px;
        border-radius: 50px;
        color: #475569;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    /* 3. Bottom Bar */
    .user-footer-bottom-bar {
        background: #f8fafc;
        border-top: 1px solid #e2e8f0;
        font-size: 12px;
        color: #64748b;
    }

    .user-copyright-text {
        font-size: 12px;
        color: #64748b;
    }

    .user-copyright-text strong {
        color: #0f172a;
    }

    .user-footer-bottom-nav {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
    }

    .user-footer-bottom-nav a {
        color: #64748b;
        text-decoration: none !important;
        transition: color 0.18s ease;
    }

    .user-footer-bottom-nav a:hover {
        color: #69275c;
    }

    .user-footer-bottom-nav .sep {
        color: #cbd5e1;
    }
</style>
