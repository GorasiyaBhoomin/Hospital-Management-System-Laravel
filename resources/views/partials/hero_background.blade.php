<!-- Hero Background Animation Suite -->
<style>
    /* 1. Base Animated Mesh Background */
    .hero-animated-bg {
        position: relative;
        background: linear-gradient(125deg, #f0f7ff 0%, #ffffff 32%, #fbf5fa 58%, #e0f2fe 82%, #ffffff 100%) !important;
        background-size: 250% 250% !important;
        animation: heroMeshGradientFlow 12s ease-in-out infinite alternate !important;
        overflow: hidden;
    }

    @keyframes heroMeshGradientFlow {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* 2. 3D Morphing Organic Light Blobs */
    .hero-morph-blob {
        position: absolute;
        pointer-events: none;
        filter: blur(80px);
        z-index: 0;
        opacity: 0.55;
    }

    .morph-blob-1 {
        top: -60px;
        left: -50px;
        width: 480px;
        height: 480px;
        background: radial-gradient(circle, rgba(105, 39, 92, 0.22) 0%, rgba(105, 39, 92, 0) 70%);
        border-radius: 42% 58% 70% 30% / 45% 45% 55% 55%;
        animation: morphAnim1 11s ease-in-out infinite alternate;
    }

    .morph-blob-2 {
        bottom: -70px;
        right: -50px;
        width: 520px;
        height: 520px;
        background: radial-gradient(circle, rgba(2, 132, 199, 0.22) 0%, rgba(2, 132, 199, 0) 70%);
        border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
        animation: morphAnim2 13s ease-in-out infinite alternate -4s;
    }

    .morph-blob-3 {
        top: 30%;
        left: 45%;
        width: 380px;
        height: 380px;
        background: radial-gradient(circle, rgba(0, 168, 150, 0.18) 0%, rgba(0, 168, 150, 0) 70%);
        border-radius: 50% 50% 40% 60% / 40% 60% 50% 50%;
        animation: morphAnim3 15s ease-in-out infinite alternate -8s;
    }

    @keyframes morphAnim1 {
        0% { transform: translate(0, 0) scale(1); border-radius: 42% 58% 70% 30% / 45% 45% 55% 55%; }
        50% { transform: translate(30px, 20px) scale(1.1); border-radius: 70% 30% 50% 50% / 30% 30% 70% 70%; }
        100% { transform: translate(-20px, 35px) scale(0.95); border-radius: 30% 70% 70% 30% / 50% 60% 40% 50%; }
    }

    @keyframes morphAnim2 {
        0% { transform: translate(0, 0) scale(1); border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
        50% { transform: translate(-30px, -20px) scale(1.12); border-radius: 40% 60% 70% 30% / 40% 40% 60% 60%; }
        100% { transform: translate(20px, -15px) scale(0.95); border-radius: 50% 50% 30% 70% / 50% 50% 70% 30%; }
    }

    @keyframes morphAnim3 {
        0% { transform: translate(0, 0) scale(0.92); opacity: 0.35; }
        50% { transform: translate(25px, -20px) scale(1.15); opacity: 0.65; }
        100% { transform: translate(-20px, 15px) scale(1); opacity: 0.45; }
    }

    /* 3. Subtle Medical Telemetry Grid */
    .hero-telemetry-grid {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background-image: 
            linear-gradient(rgba(105, 39, 92, 0.035) 1px, transparent 1px),
            linear-gradient(90deg, rgba(2, 132, 199, 0.035) 1px, transparent 1px);
        background-size: 38px 38px;
        pointer-events: none;
        z-index: 0;
        opacity: 0.75;
    }

    /* 4. Animated Laser Telemetry Scanline */
    .hero-telemetry-scanline {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, transparent 0%, rgba(2, 132, 199, 0.4) 30%, rgba(105, 39, 92, 0.5) 50%, rgba(0, 168, 150, 0.4) 70%, transparent 100%);
        box-shadow: 0 0 12px rgba(2, 132, 199, 0.5);
        pointer-events: none;
        z-index: 1;
        animation: telemetryScan 8s linear infinite;
    }

    @keyframes telemetryScan {
        0% { top: -5%; opacity: 0; }
        15% { opacity: 0.75; }
        85% { opacity: 0.75; }
        100% { top: 105%; opacity: 0; }
    }

    /* 5. Floating Ambient Medical Symbols */
    .hero-ambient-floaters {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        pointer-events: none;
        z-index: 1;
        overflow: hidden;
    }

    .hero-floater {
        position: absolute;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        user-select: none;
        animation: floaterDrift 7s ease-in-out infinite alternate;
    }

    .flt-1 { top: 22%; left: 8%; font-size: 22px; color: rgba(105, 39, 92, 0.18); animation-delay: 0s; }
    .flt-2 { top: 68%; left: 14%; font-size: 16px; color: rgba(2, 132, 199, 0.2); animation-delay: -2.5s; }
    .flt-3 { top: 28%; right: 9%; font-size: 24px; color: rgba(0, 168, 150, 0.2); animation-delay: -4s; }
    .flt-4 { top: 72%; right: 15%; font-size: 18px; color: rgba(105, 39, 92, 0.18); animation-delay: -5.5s; }

    @keyframes floaterDrift {
        0% { transform: translateY(0) rotate(0deg); opacity: 0.35; }
        50% { transform: translateY(-16px) rotate(18deg); opacity: 0.8; }
        100% { transform: translateY(8px) rotate(-12deg); opacity: 0.4; }
    }

    /* 6. Running ECG Heartbeat Waveform */
    .hero-ecg-line {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 38px;
        pointer-events: none;
        z-index: 1;
        opacity: 0.45;
    }
</style>

<!-- Ambient 3D Morphing Light Blobs -->
<div class="hero-morph-blob morph-blob-1"></div>
<div class="hero-morph-blob morph-blob-2"></div>
<div class="hero-morph-blob morph-blob-3"></div>

<!-- Medical Telemetry Grid -->
<div class="hero-telemetry-grid"></div>

<!-- Telemetry Scanning Laser Beam -->
<div class="hero-telemetry-scanline"></div>

<!-- Floating Ambient Medical Symbols -->
<div class="hero-ambient-floaters">
    <div class="hero-floater flt-1"><i class="fa fa-plus"></i></div>
    <div class="hero-floater flt-2"><i class="fa fa-heartbeat"></i></div>
    <div class="hero-floater flt-3"><i class="fa fa-plus"></i></div>
    <div class="hero-floater flt-4"><i class="fa fa-stethoscope"></i></div>
</div>

<!-- Running ECG Heartbeat Waveform -->
<div class="hero-ecg-line">
    <svg viewBox="0 0 1200 40" preserveAspectRatio="none" style="width: 100%; height: 100%;">
        <path d="M0,20 L280,20 L290,12 L298,30 L305,5 L312,32 L320,20 L580,20 L590,12 L598,30 L605,5 L612,32 L620,20 L880,20 L890,12 L898,30 L905,5 L912,32 L920,20 L1200,20" fill="none" stroke="rgba(105, 39, 92, 0.22)" stroke-width="2.2" stroke-linecap="round"/>
    </svg>
</div>

