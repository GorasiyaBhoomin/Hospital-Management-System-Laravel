<!-- Modern Light Hospital Footer with Rich Content, Trust Ribbons & Medical Animations -->
<footer class="modern-light-footer">
    <!-- 1. Clinical Assurances & Trust Ribbon -->
    <div class="footer-assurance-strip">
        <div class="container">
            <div class="row g-3">
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="assurance-card-item">
                        <div class="assurance-icon-box bg-rose-light text-danger">
                            <i class="fa fa-ambulance kk-anim-float-slow"></i>
                        </div>
                        <div class="assurance-info">
                            <h4>24/7 Emergency & ICU</h4>
                            <p>Trauma, Cardiac & Stroke Care</p>
                            <a href="tel:02832236000" class="assurance-link">Call: 02832 236000 &rarr;</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="assurance-card-item">
                        <div class="assurance-icon-box bg-purple-light text-primary-plum">
                            <i class="fa fa-user-md kk-anim-float-mid"></i>
                        </div>
                        <div class="assurance-info">
                            <h4>50+ Specialists</h4>
                            <p>Full-Time Super Speciality Faculty</p>
                            <a href="{{ url('Doctors') }}" class="assurance-link">View Specialists &rarr;</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="assurance-card-item">
                        <div class="assurance-icon-box bg-emerald-light text-success">
                            <i class="fa fa-shield kk-anim-float-slow"></i>
                        </div>
                        <div class="assurance-info">
                            <h4>NABH Quality Care</h4>
                            <p>Highest Patient Safety Standards</p>
                            <span class="assurance-pill-badge text-success">Verified Safety</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="assurance-card-item">
                        <div class="assurance-icon-box bg-cyan-light text-info">
                            <i class="fa fa-credit-card kk-anim-float-mid"></i>
                        </div>
                        <div class="assurance-info">
                            <h4>PMJAY & Cashless</h4>
                            <p>Ayushman Bharat & TPA Empanelled</p>
                            <a href="{{ url('appointment') }}" class="assurance-link">Book Cashless OPD &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. Main Footer Body with Rich Healthcare Content -->
    <div class="footer-main-body">
        <div class="container">
            <div class="row g-4">
                <!-- Col 1: Hospital Brand Identity & 24/7 Emergency Card -->
                <div class="col-xl-4 col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="footer-col-widget">
                        <div class="footer-brand-logo mb-3">
                            <a href="{{ url('/') }}" class="footer-logo-anchor">
                                <img src="{{ URL::to('/') }}/img/logo2.png" alt="KK Patel Super Speciality Hospital" height="56px" class="img-fluid footer-logo-img">
                            </a>
                        </div>
                        <p class="footer-desc">
                            Dedicated by Shree Kutchi Leva Patel Kanya Kelavani Mandal trust to bring world-class healthcare, advanced cardiac & oncology facilities, and compassionate healing directly to the citizens of Kutch and Gujarat.
                        </p>
                        
                        <!-- 24/7 Emergency Helpline Callout -->
                        <div class="footer-hotline-card mt-3">
                            <div class="hotline-icon">
                                <i class="fa fa-phone kk-phone-wiggle"></i>
                            </div>
                            <div class="hotline-details">
                                <span class="hotline-badge"><span class="hotline-live-dot"></span> 24/7 Emergency Helpline</span>
                                <strong><a href="tel:02832236000">02832 236000</a></strong>
                                <small class="text-muted d-block mt-1">Direct Ambulance & Trauma Unit Dispatch</small>
                            </div>
                        </div>

                        <!-- Social Media Handles -->
                        <div class="footer-social-strip mt-3">
                            <a href="https://www.facebook.com/kkpatelhospital/" target="_blank" rel="noopener" class="footer-soc-link" title="Facebook"><i class="ti-facebook"></i></a>
                            <a href="https://twitter.com/kkpatelhospital/" target="_blank" rel="noopener" class="footer-soc-link" title="Twitter / X"><i class="ti-twitter-alt"></i></a>
                            <a href="https://www.instagram.com/kkpatelhospital/" target="_blank" rel="noopener" class="footer-soc-link" title="Instagram"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Col 2: Super Speciality Departments with Icons -->
                <div class="col-xl-3 col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="footer-col-widget">
                        <h4 class="footer-heading">Super Specialities</h4>
                        <ul class="footer-links-list">
                            <li>
                                <a href="{{ url('Department') }}">
                                    <i class="fa fa-heartbeat text-danger"></i>
                                    <span>Cardiology & Cath Lab</span>
                                    <i class="ti-angle-right kk-arrow"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('Department') }}">
                                    <i class="fa fa-medkit text-primary-plum"></i>
                                    <span>Oncology & Surgical Cancer</span>
                                    <i class="ti-angle-right kk-arrow"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('Department') }}">
                                    <i class="fa fa-plus-square text-info"></i>
                                    <span>Orthopaedics & Joint Replacement</span>
                                    <i class="ti-angle-right kk-arrow"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('Department') }}">
                                    <i class="fa fa-tint text-primary"></i>
                                    <span>Nephrology & 24/7 Dialysis</span>
                                    <i class="ti-angle-right kk-arrow"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('Department') }}">
                                    <i class="fa fa-user-md text-success"></i>
                                    <span>Urology & Laser Surgery</span>
                                    <i class="ti-angle-right kk-arrow"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('Department') }}">
                                    <i class="fa fa-bolt text-warning"></i>
                                    <span>Neuro Sciences & Stroke Unit</span>
                                    <i class="ti-angle-right kk-arrow"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('Department') }}">
                                    <i class="fa fa-wheelchair text-secondary"></i>
                                    <span>Physiotherapy & Rehabilitation</span>
                                    <i class="ti-angle-right kk-arrow"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Col 3: Patient Care & Quick Services -->
                <div class="col-xl-2 col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <div class="footer-col-widget">
                        <h4 class="footer-heading">Patient Care</h4>
                        <ul class="footer-links-list">
                            <li>
                                <a href="{{ url('appointment') }}">
                                    <i class="ti-angle-right"></i> Book Appointment
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('Doctors') }}">
                                    <i class="ti-angle-right"></i> Find Specialist Doctor
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('about') }}">
                                    <i class="ti-angle-right"></i> About Hospital
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('Department') }}">
                                    <i class="ti-angle-right"></i> All Departments
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('Pressdesk') }}">
                                    <i class="ti-angle-right"></i> Press & Media Desk
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('gallery') }}">
                                    <i class="ti-angle-right"></i> Hospital Campus Tour
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('feedbackreview') }}">
                                    <i class="ti-angle-right"></i> Patient Feedback & Reviews
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('contacts') }}">
                                    <i class="ti-angle-right"></i> Contact & Helpdesk
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Col 4: Campus Location, OPD Timings & Govt Schemes -->
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="footer-col-widget">
                        <h4 class="footer-heading">Hospital Campus</h4>
                        <div class="footer-contact-block">
                            <div class="f-contact-row">
                                <i class="fa fa-map-marker text-danger"></i>
                                <span>Near Kutch University, Mundra Road, Bhuj, Kachchh, Gujarat - 370001</span>
                            </div>
                            <div class="f-contact-row">
                                <i class="fa fa-envelope text-primary"></i>
                                <a href="mailto:info@kkphospital.org">info@kkphospital.org</a>
                            </div>
                            
                            <!-- OPD Hours Card -->
                            <div class="footer-opd-card mt-2">
                                <div class="opd-card-header">
                                    <i class="fa fa-clock-o text-success"></i>
                                    <strong>OPD Consultation Timings</strong>
                                </div>
                                <div class="opd-card-body">
                                    <div class="opd-timing-row">
                                        <span>Mon - Sat:</span>
                                        <strong>9:00 AM - 6:00 PM</strong>
                                    </div>
                                    <div class="opd-timing-row text-danger">
                                        <span>Emergency & ICU:</span>
                                        <strong>Open 24 Hours / 365 Days</strong>
                                    </div>
                                </div>
                            </div>

                            <!-- Government Schemes & Badges -->
                            <div class="footer-schemes-ribbon mt-2">
                                <span class="scheme-pill"><i class="fa fa-check text-success"></i> PMJAY / Ayushman Bharat</span>
                                <span class="scheme-pill"><i class="fa fa-shield text-info"></i> 100% Cashless TPA Empanelled</span>
                            </div>

                            <div class="footer-badge-ribbon mt-2">
                                <span class="badge-tag">🏥 200+ Bed Multi-Speciality</span>
                                <span class="badge-tag">🌳 13-Acre Green Campus</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Bottom Copyright Bar -->
  

    <!-- Smooth Back To Top Floating Action Button -->
    <a href="javascript:void(0)" id="kkBackToTop" class="kk-back-to-top" title="Back to top">
        <i class="fa fa-chevron-up kk-up-arrow"></i>
    </a>
</footer>

<!-- Footer Specific Stylesheet: 100% Light, High-Readability & Micro-Animations -->
<style>
    .modern-light-footer {
        background: #f8fafc !important;
        border-top: 1px solid #e2e8f0 !important;
        color: #475569 !important;
        font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif !important;
        position: relative;
        overflow: hidden;
    }

    /* Forcefully wipe out any legacy dark styling */
    footer.footer,
    .footer {
        background: transparent !important;
        padding: 0 !important;
    }
    .footer .footer_top,
    footer .footer_top {
        display: none !important;
    }

    /* -----------------------------------------------------------------
       1. ASSURANCE STRIP
       ----------------------------------------------------------------- */
    .footer-assurance-strip {
        background: #ffffff !important;
        border-bottom: 1px solid #edf2f7 !important;
        padding: 32px 0 !important;
    }
    .assurance-card-item {
        display: flex;
        align-items: flex-start;
        gap: 14px;
        padding: 16px 18px;
        background: #f8fafc;
        border: 1px solid #eef2f6;
        border-radius: 14px;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        height: 100%;
    }
    .assurance-card-item:hover {
        transform: translateY(-4px);
        background: #ffffff;
        border-color: rgba(105, 39, 92, 0.2);
        box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.08);
    }
    .assurance-icon-box {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
        box-shadow: 0 4px 12px rgba(15, 23, 42, 0.04);
    }
    .bg-rose-light { background: #fff1f2; }
    .bg-purple-light { background: #fbf5fa; }
    .bg-emerald-light { background: #ecfdf5; }
    .bg-cyan-light { background: #f0f9ff; }
    .text-primary-plum { color: #69275c !important; }

    .kk-anim-float-slow {
        animation: kkIconFloat 3.5s ease-in-out infinite alternate;
    }
    .kk-anim-float-mid {
        animation: kkIconFloat 2.8s ease-in-out infinite alternate-reverse;
    }
    @keyframes kkIconFloat {
        0% { transform: translateY(0); }
        100% { transform: translateY(-4px); }
    }

    .assurance-info h4 {
        font-size: 15px;
        font-weight: 800;
        color: #0f172a;
        margin: 0 0 3px;
        line-height: 1.25;
    }
    .assurance-info p {
        font-size: 12px;
        color: #64748b !important;
        margin: 0 0 6px;
        line-height: 1.4;
    }
    .assurance-link {
        font-size: 11.5px;
        font-weight: 700;
        color: #69275c !important;
        text-decoration: none !important;
        display: inline-block;
        transition: transform 0.2s ease;
    }
    .assurance-link:hover {
        transform: translateX(3px);
        color: #0284c7 !important;
    }
    .assurance-pill-badge {
        font-size: 11px;
        font-weight: 700;
        background: #ecfdf5;
        padding: 2px 8px;
        border-radius: 50px;
        border: 1px solid #a7f3d0;
        display: inline-block;
    }

    /* -----------------------------------------------------------------
       2. MAIN FOOTER BODY
       ----------------------------------------------------------------- */
    .footer-main-body {
        padding: 60px 0 40px;
        background: #f8fafc;
    }
    .footer-col-widget {
        height: 100%;
    }
    .footer-logo-img {
        max-height: 54px;
        transition: transform 0.25s ease;
    }
    .footer-logo-img:hover {
        transform: scale(1.02);
    }
    .footer-desc {
        font-size: 13.5px;
        color: #64748b !important;
        line-height: 1.65;
        margin: 0 0 16px;
    }

    /* Hotline Card */
    .footer-hotline-card {
        background: #ffffff;
        border: 1.5px solid #fee2e2;
        border-radius: 14px;
        padding: 14px 18px;
        display: flex;
        align-items: flex-start;
        gap: 14px;
        box-shadow: 0 4px 16px rgba(220, 38, 38, 0.08);
        transition: all 0.25s ease;
    }
    .footer-hotline-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 22px rgba(220, 38, 38, 0.16);
        border-color: #fca5a5;
    }
    .footer-hotline-card .hotline-icon {
        width: 42px;
        height: 42px;
        background: #fee2e2;
        color: #dc2626;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
    }
    .kk-phone-wiggle {
        animation: kkRingPhone 4s ease-in-out infinite;
    }
    .hotline-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        color: #dc2626;
        letter-spacing: 0.3px;
        margin-bottom: 2px;
    }
    .hotline-live-dot {
        width: 6px;
        height: 6px;
        background: #dc2626;
        border-radius: 50%;
        animation: kkPulseBeacon 1.5s infinite;
    }
    .footer-hotline-card strong a {
        font-size: 18px;
        color: #0f172a !important;
        text-decoration: none;
        font-weight: 800;
        letter-spacing: 0.3px;
    }
    .footer-hotline-card strong a:hover {
        color: #dc2626 !important;
    }

    .footer-social-strip {
        display: flex;
        gap: 8px;
    }
    .footer-soc-link {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        color: #64748b !important;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        text-decoration: none !important;
    }
    .footer-soc-link:hover {
        background: #69275c;
        color: #ffffff !important;
        border-color: #69275c;
        transform: translateY(-3px) scale(1.1);
        box-shadow: 0 4px 12px rgba(105, 39, 92, 0.3);
    }

    .footer-heading {
        font-size: 16px;
        font-weight: 800;
        color: #0f172a;
        margin: 0 0 18px;
        position: relative;
        padding-bottom: 8px;
    }
    .footer-heading::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 34px;
        height: 2.5px;
        background: linear-gradient(90deg, #69275c, #0284c7);
        border-radius: 3px;
    }

    .footer-links-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .footer-links-list li {
        margin-bottom: 10px;
    }
    .footer-links-list li a {
        color: #475569 !important;
        font-size: 13.5px;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s ease;
    }
    .footer-links-list li a i {
        font-size: 13px;
        transition: transform 0.2s ease, color 0.2s ease;
    }
    .footer-links-list li a .kk-arrow {
        font-size: 10px;
        color: #cbd5e1;
        margin-left: 2px;
        transition: transform 0.2s ease;
    }
    .footer-links-list li a:hover {
        color: #69275c !important;
        padding-left: 4px;
    }
    .footer-links-list li a:hover .kk-arrow {
        color: #69275c;
        transform: translateX(4px);
    }

    /* Contact Details */
    .footer-contact-block {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    .f-contact-row {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        font-size: 13.5px;
        color: #475569;
        line-height: 1.5;
    }
    .f-contact-row i {
        margin-top: 3px;
        font-size: 15px;
        flex-shrink: 0;
    }
    .f-contact-row a {
        color: #475569 !important;
        text-decoration: none;
        transition: color 0.2s ease;
    }
    .f-contact-row a:hover {
        color: #69275c !important;
    }

    /* OPD Hours Card */
    .footer-opd-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 10px 14px;
    }
    .opd-card-header {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        margin-bottom: 6px;
        color: #0f172a;
    }
    .opd-timing-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 12px;
        padding: 2px 0;
    }

    .footer-schemes-ribbon {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }
    .scheme-pill {
        font-size: 11.5px;
        color: #334155;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .footer-badge-ribbon {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }
    .footer-badge-ribbon .badge-tag {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        color: #334155;
        font-size: 11.5px;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 6px;
    }

    /* -----------------------------------------------------------------
       3. BOTTOM COPYRIGHT ROW
       ----------------------------------------------------------------- */
    .footer-bottom-bar {
        background: #ffffff;
        border-top: 1px solid #e2e8f0;
        padding: 20px 0;
        font-size: 13px;
        color: #64748b;
    }
    .copyright-text {
        font-size: 13px;
        color: #64748b !important;
    }
    .copyright-text strong {
        color: #0f172a;
    }
    .footer-legal-links {
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .footer-legal-links a {
        color: #64748b !important;
        text-decoration: none;
        transition: color 0.2s ease;
    }
    .footer-legal-links a:hover {
        color: #69275c !important;
    }
    .footer-legal-links .sep {
        color: #cbd5e1;
    }

    /* -----------------------------------------------------------------
       4. BACK TO TOP BUTTON
       ----------------------------------------------------------------- */
    .kk-back-to-top {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: linear-gradient(135deg, #69275c 0%, #0284c7 100%);
        color: #ffffff !important;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        box-shadow: 0 4px 20px rgba(105, 39, 92, 0.35);
        z-index: 999;
        opacity: 0;
        visibility: hidden;
        transform: translateY(20px);
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        text-decoration: none !important;
    }
    .kk-back-to-top.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }
    .kk-back-to-top:hover {
        transform: translateY(-4px) scale(1.08);
        box-shadow: 0 8px 25px rgba(105, 39, 92, 0.45);
        color: #ffffff !important;
    }
    .kk-up-arrow {
        animation: kkBounceArrow 2s infinite;
    }
    @keyframes kkBounceArrow {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-3px); }
    }
</style>

<script>
    (function () {
        var backToTop = document.getElementById('kkBackToTop');
        if (backToTop) {
            window.addEventListener('scroll', function () {
                if (window.scrollY > 300) {
                    backToTop.classList.add('show');
                } else {
                    backToTop.classList.remove('show');
                }
            });
            backToTop.addEventListener('click', function (e) {
                e.preventDefault();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }
    })();
</script>
