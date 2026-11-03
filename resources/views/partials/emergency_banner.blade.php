<!-- Modern Light Medical Emergency & Appointment Strip -->
<section class="kk-emergency-banner-section">
    <div class="container">
        <div class="row g-4">
            <!-- 1. Emergency Trauma Hotline Card -->
            <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                <div class="kk-emergency-card kk-emergency-red">
                    <div class="kk-card-glow-orb glow-red"></div>
                    <div class="kk-card-content">
                        <div class="kk-card-header-badge">
                            <span class="kk-pulse-red-ring"></span>
                            <span>Immediate Medical Response</span>
                        </div>
                        <h3 class="kk-card-heading">
                            <i class="fa fa-ambulance kk-bounce-icon text-danger"></i>
                            24/7 Emergency & Trauma
                        </h3>
                        <p class="kk-card-text">
                            Our emergency medical team is on active duty round-the-clock with advanced cardiac resuscitation, stroke intervention, and critical ICU trauma care.
                        </p>
                        <div class="kk-card-action">
                            <a href="tel:02832236000" class="kk-btn-emergency-call">
                                <span class="kk-call-icon"><i class="fa fa-phone kk-ring-anim"></i></span>
                                <span class="kk-call-text">
                                    <small>Emergency Hotline</small>
                                    <strong>02832 236000</strong>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. Instant Online OPD Booking Card -->
            <div class="col-12 col-lg-6">
                <div class="kk-emergency-card kk-emergency-blue">
                    <div class="kk-card-glow-orb glow-blue"></div>
                    <div class="kk-card-content">
                        <div class="kk-card-header-badge badge-blue">
                            <i class="fa fa-check-circle"></i>
                            <span>Zero Wait Consultation</span>
                        </div>
                        <h3 class="kk-card-heading">
                            <i class="fa fa-calendar-check-o text-primary"></i>
                            Instant Online Appointment
                        </h3>
                        <p class="kk-card-text">
                            Skip physical clinic queues. Select your preferred super specialist doctor and department to confirm your OPD consultation slot online in 60 seconds.
                        </p>
                        <div class="kk-card-action">
                            <a href="{{ url('appointment') }}" class="kk-btn-booking-action">
                                <span class="kk-book-icon"><i class="fa fa-calendar-plus-o"></i></span>
                                <span class="kk-book-text">Book Appointment Online</span>
                                <i class="ti-arrow-right kk-arrow-anim"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .kk-emergency-banner-section {
        padding: 50px 0 60px;
        background: #f8fafc;
        position: relative;
        z-index: 5;
    }

    .kk-emergency-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 34px 30px;
        position: relative;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        box-shadow: 0 10px 30px -5px rgba(15, 23, 42, 0.05);
        transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .kk-emergency-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 40px -10px rgba(15, 23, 42, 0.12);
    }

    .kk-emergency-red {
        border: 1.5px solid #fecaca;
        background: linear-gradient(135deg, #ffffff 0%, #fff5f5 100%);
    }
    .kk-emergency-red:hover {
        border-color: #f87171;
    }

    .kk-emergency-blue {
        border: 1.5px solid #bae6fd;
        background: linear-gradient(135deg, #ffffff 0%, #f0f9ff 100%);
    }
    .kk-emergency-blue:hover {
        border-color: #38bdf8;
    }

    /* Glow Orb in corner */
    .kk-card-glow-orb {
        position: absolute;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        top: -60px;
        right: -60px;
        pointer-events: none;
        filter: blur(50px);
        opacity: 0.5;
        transition: opacity 0.3s ease;
    }
    .kk-emergency-card:hover .kk-card-glow-orb {
        opacity: 0.85;
    }
    .glow-red { background: rgba(239, 68, 68, 0.3); }
    .glow-blue { background: rgba(2, 132, 199, 0.3); }

    .kk-card-content {
        position: relative;
        z-index: 2;
    }

    .kk-card-header-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        font-size: 12px;
        font-weight: 700;
        color: #dc2626;
        background: #fee2e2;
        padding: 4px 12px;
        border-radius: 50px;
        margin-bottom: 16px;
    }
    .kk-card-header-badge.badge-blue {
        color: #0284c7;
        background: #e0f2fe;
    }

    .kk-pulse-red-ring {
        width: 8px;
        height: 8px;
        background: #ef4444;
        border-radius: 50%;
        box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.8);
        animation: pulseRedDot 1.6s infinite;
    }

    .kk-card-heading {
        font-size: 24px;
        font-weight: 800;
        color: #0f172a;
        margin: 0 0 12px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .kk-bounce-icon {
        animation: ambulanceBounce 3s ease-in-out infinite;
    }
    @keyframes ambulanceBounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-3px); }
    }

    .kk-card-text {
        font-size: 14.5px;
        color: #475569;
        line-height: 1.65;
        margin: 0 0 24px;
    }

    /* Buttons */
    .kk-btn-emergency-call {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        color: #ffffff !important;
        text-decoration: none !important;
        padding: 10px 22px;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(220, 38, 38, 0.3);
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .kk-btn-emergency-call:hover {
        transform: translateY(-2px) scale(1.02);
        box-shadow: 0 10px 25px rgba(220, 38, 38, 0.45);
        color: #ffffff !important;
    }
    .kk-call-icon {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
    }
    .kk-ring-anim {
        animation: kkRingPhone 4s ease-in-out infinite;
    }
    .kk-call-text small {
        display: block;
        font-size: 11px;
        text-transform: uppercase;
        font-weight: 600;
        opacity: 0.9;
    }
    .kk-call-text strong {
        display: block;
        font-size: 16px;
        letter-spacing: 0.3px;
        line-height: 1.2;
    }

    .kk-btn-booking-action {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: linear-gradient(135deg, #69275c 0%, #8b1d6b 50%, #0284c7 100%);
        color: #ffffff !important;
        text-decoration: none !important;
        padding: 14px 26px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 15px;
        box-shadow: 0 6px 20px rgba(105, 39, 92, 0.25);
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .kk-btn-booking-action:hover {
        transform: translateY(-2px) scale(1.02);
        box-shadow: 0 10px 25px rgba(105, 39, 92, 0.4);
        color: #ffffff !important;
    }
    .kk-book-icon {
        font-size: 17px;
    }
    .kk-arrow-anim {
        font-size: 12px;
        transition: transform 0.2s ease;
    }
    .kk-btn-booking-action:hover .kk-arrow-anim {
        transform: translateX(4px);
    }
</style>

