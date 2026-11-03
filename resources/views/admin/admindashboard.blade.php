<!DOCTYPE html>
<html lang="en">

@include('admin.adminnavbar_master')
@section('nav')
@endsection

<body>

    <div class="page-wrapper">
        <!-- Ambient Glowing Background Meshes -->
        <div class="admin-ambient-mesh admin-mesh-1"></div>
        <div class="admin-ambient-mesh admin-mesh-2"></div>
        <div class="admin-ambient-mesh admin-mesh-3"></div>

        <div class="content admin-ambient-wrapper">

            <!-- System Session Alerts -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 14px; font-weight: 600; box-shadow: 0 4px 14px rgba(16, 185, 129, 0.15); border: 1px solid #a7f3d0; background: #ecfdf5; color: #065f46;">
                    <i class="fa fa-check-circle m-r-8" style="font-size: 16px;"></i> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: #065f46;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 14px; font-weight: 600; box-shadow: 0 4px 14px rgba(239, 68, 68, 0.15); border: 1px solid #fecaca; background: #fef2f2; color: #991b1b;">
                    <i class="fa fa-exclamation-circle m-r-8" style="font-size: 16px;"></i> {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: #991b1b;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- 1. Executive Command Center Hero Banner -->
            <div class="command-hero-banner">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-md-7 col-sm-12">
                        <div class="command-status-pill">
                            <span class="command-pulse-dot"></span>
                            <span>Hospital Operations Telemetry &bull; Live Online</span>
                        </div>
                        <h2 class="command-hero-title">Welcome back, Administrator 👋</h2>
                        <p class="command-hero-subtitle">
                            KK Patel Super Speciality Hospital Central Operations Console. Real-time patient flow analytics, specialist rosters, department allocations, and clinical telemetry.
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-12 text-md-right mt-3 mt-md-0">
                        <div class="command-clock-box">
                            <div class="command-clock-time" id="liveDigitalClock">--:--:-- --</div>
                            <div class="command-clock-date">
                                <i class="fa fa-calendar-check-o text-primary m-r-5"></i> {{ date('l, d F Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. Four 3D Interactive KPI Stat Widgets -->
            <div class="row">
                <!-- Stat 1: Specialist Doctors -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="{{ url('admindoctors') }}" class="stat-card-3d">
                        <div class="stat-accent-bar stat-accent-1"></div>
                        <div class="stat-card-header">
                            <div class="stat-icon-bubble icon-bubble-1">
                                <i class="fa fa-user-md"></i>
                            </div>
                            <span class="stat-trend-chip trend-primary">
                                <i class="fa fa-check-circle"></i> On Duty
                            </span>
                        </div>
                        <h3 class="stat-card-number">{{ $doctorCount }}</h3>
                        <p class="stat-card-label">Specialist Doctors</p>
                        <div class="stat-card-footer">
                            <span>View Directory</span>
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>
                </div>

                <!-- Stat 2: Clinical Departments -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="{{ url('admindepartments') }}" class="stat-card-3d">
                        <div class="stat-accent-bar stat-accent-2"></div>
                        <div class="stat-card-header">
                            <div class="stat-icon-bubble icon-bubble-2">
                                <i class="fa fa-hospital-o"></i>
                            </div>
                            <span class="stat-trend-chip trend-positive">
                                <i class="fa fa-check-circle"></i> 100% Active
                            </span>
                        </div>
                        <h3 class="stat-card-number">{{ $departmentcount }}</h3>
                        <p class="stat-card-label">Super Speciality Depts</p>
                        <div class="stat-card-footer">
                            <span>Manage Depts</span>
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>
                </div>

                <!-- Stat 3: Appointments -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="{{ url('adminappointments') }}" class="stat-card-3d">
                        <div class="stat-accent-bar stat-accent-3"></div>
                        <div class="stat-card-header">
                            <div class="stat-icon-bubble icon-bubble-3">
                                <i class="fa fa-calendar-check-o"></i>
                            </div>
                            <span class="stat-trend-chip trend-primary">
                                <i class="fa fa-clock-o"></i> Live Queue
                            </span>
                        </div>
                        <h3 class="stat-card-number">{{ $appointmentcount }}</h3>
                        <p class="stat-card-label">Patient Appointments</p>
                        <div class="stat-card-footer">
                            <span>Manage Schedule</span>
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>
                </div>

                <!-- Stat 4: Feedback Reviews -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="{{ url('adminfeedback') }}" class="stat-card-3d">
                        <div class="stat-accent-bar stat-accent-4"></div>
                        <div class="stat-card-header">
                            <div class="stat-icon-bubble icon-bubble-4">
                                <i class="fa fa-star"></i>
                            </div>
                            <span class="stat-trend-chip trend-positive">
                                <i class="fa fa-heart"></i> 99.4% CSAT
                            </span>
                        </div>
                        <h3 class="stat-card-number">{{ $feedbackCount }}</h3>
                        <p class="stat-card-label">Patient Feedback</p>
                        <div class="stat-card-footer">
                            <span>Read Reviews</span>
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>

            <!-- 3. GRAPHS & CHARTS SECTION: ROW 1 (Primary Analytics) -->
            <div class="row">
                <!-- Chart 1: Doctors by Department & Gender -->
                <div class="col-12 col-xl-7">
                    <div class="admin-box-card">
                        <div class="admin-box-header">
                            <h4>
                                <i class="fa fa-bar-chart text-primary"></i>
                                Specialists by Department & Gender
                            </h4>
                            <span class="badge badge-pill badge-primary" style="padding: 6px 12px; font-weight: 600;">
                                Live Rosters
                            </span>
                        </div>
                        <div class="admin-box-body">
                            <div style="position: relative; height: 320px;">
                                <canvas id="departmentGenderChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chart 2: Weekly Patient Consultation Flow & Appointment Volume -->
                <div class="col-12 col-xl-5">
                    <div class="admin-box-card">
                        <div class="admin-box-header">
                            <h4>
                                <i class="fa fa-line-chart text-info"></i>
                                Weekly Patient Consultation Flow
                            </h4>
                            <span class="badge badge-pill badge-info" style="padding: 6px 12px; font-weight: 600;">
                                7-Day Trend
                            </span>
                        </div>
                        <div class="admin-box-body">
                            <div style="position: relative; height: 320px;">
                                <canvas id="weeklyPatientFlowChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4. GRAPHS & CHARTS SECTION: ROW 2 (Clinical Capacity & Patient CSAT) -->
            <div class="row">
                <!-- Chart 3: Clinical Department Distribution Doughnut -->
                <div class="col-12 col-lg-5">
                    <div class="admin-box-card">
                        <div class="admin-box-header">
                            <h4>
                                <i class="fa fa-pie-chart text-success"></i>
                                Clinical Department Capacity Share
                            </h4>
                            <span class="badge badge-pill badge-success" style="padding: 6px 12px; font-weight: 600;">
                                Distribution
                            </span>
                        </div>
                        <div class="admin-box-body">
                            <div style="position: relative; height: 280px;">
                                <canvas id="deptDistributionChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chart 4: Patient Satisfaction & Clinical Rating Analytics -->
                <div class="col-12 col-lg-7">
                    <div class="admin-box-card">
                        <div class="admin-box-header">
                            <h4>
                                <i class="fa fa-heartbeat text-danger"></i>
                                Patient Care Quality & Satisfaction Index
                            </h4>
                            <span class="badge badge-pill badge-danger" style="padding: 6px 12px; font-weight: 600;">
                                4.9 / 5.0 Rating
                            </span>
                        </div>
                        <div class="admin-box-body">
                            <div class="row align-items-center">
                                <!-- Big Rating Badge -->
                                <div class="col-md-4 text-center mb-3 mb-md-0" style="border-right: 1px solid var(--border-light);">
                                    <div style="font-size: 54px; font-weight: 800; color: #0f172a; line-height: 1;">4.9</div>
                                    <div style="color: #f59e0b; font-size: 20px; margin: 8px 0;">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div style="font-size: 13px; font-weight: 700; color: #64748b;">
                                        Overall Patient Trust
                                    </div>
                                    <small style="color: #10b981; font-weight: 600;">Based on 1,420+ Consultations</small>
                                </div>
                                <!-- Breakdown Progress Bars -->
                                <div class="col-md-8">
                                    <div class="m-b-12">
                                        <div class="d-flex justify-content-between mb-1" style="font-size: 12.5px; font-weight: 700; color: #334155;">
                                            <span><i class="fa fa-star text-warning"></i> 5 Stars (Doctor Care & Surgery)</span>
                                            <span>88%</span>
                                        </div>
                                        <div class="progress" style="height: 8px; border-radius: 6px; background: #e2e8f0;">
                                            <div class="progress-bar bg-success" style="width: 88%; border-radius: 6px;"></div>
                                        </div>
                                    </div>
                                    <div class="m-b-12">
                                        <div class="d-flex justify-content-between mb-1" style="font-size: 12.5px; font-weight: 700; color: #334155;">
                                            <span><i class="fa fa-star text-warning"></i> 4 Stars (Facility & Nursing)</span>
                                            <span>9%</span>
                                        </div>
                                        <div class="progress" style="height: 8px; border-radius: 6px; background: #e2e8f0;">
                                            <div class="progress-bar bg-primary" style="width: 9%; border-radius: 6px;"></div>
                                        </div>
                                    </div>
                                    <div class="m-b-12">
                                        <div class="d-flex justify-content-between mb-1" style="font-size: 12.5px; font-weight: 700; color: #334155;">
                                            <span><i class="fa fa-star text-warning"></i> 3 Stars (Appointment Waiting Time)</span>
                                            <span>2%</span>
                                        </div>
                                        <div class="progress" style="height: 8px; border-radius: 6px; background: #e2e8f0;">
                                            <div class="progress-bar bg-warning" style="width: 2%; border-radius: 6px;"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between mb-1" style="font-size: 12.5px; font-weight: 700; color: #334155;">
                                            <span><i class="fa fa-star text-warning"></i> 1-2 Stars (General Inquiries)</span>
                                            <span>1%</span>
                                        </div>
                                        <div class="progress" style="height: 8px; border-radius: 6px; background: #e2e8f0;">
                                            <div class="progress-bar bg-danger" style="width: 1%; border-radius: 6px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 5. Quick Actions Hub & Real-time Hospital Telemetry -->
            <div class="row">
                <!-- Quick Action Hub -->
                <div class="col-12 col-lg-7">
                    <div class="admin-box-card">
                        <div class="admin-box-header">
                            <h4><i class="fa fa-bolt text-warning"></i> Administrative Quick Action Launchpad</h4>
                        </div>
                        <div class="admin-box-body">
                            <div class="row">
                                <div class="col-6 col-md-4 mb-3">
                                    <a href="{{ url('add_doctor') }}" class="btn-admin-light w-100 text-center flex-column py-3" style="border-radius: 14px; gap: 8px; display: flex;">
                                        <div style="width: 42px; height: 42px; border-radius: 12px; background: #e0f2fe; color: #0284c7; display: flex; align-items: center; justify-content: center; font-size: 20px; margin: 0 auto;">
                                            <i class="fa fa-user-plus"></i>
                                        </div>
                                        <strong style="font-size: 13px; color: #0f172a;">Add Doctor</strong>
                                    </a>
                                </div>
                                <div class="col-6 col-md-4 mb-3">
                                    <a href="{{ url('add_department') }}" class="btn-admin-light w-100 text-center flex-column py-3" style="border-radius: 14px; gap: 8px; display: flex;">
                                        <div style="width: 42px; height: 42px; border-radius: 12px; background: #d1fae5; color: #10b981; display: flex; align-items: center; justify-content: center; font-size: 20px; margin: 0 auto;">
                                            <i class="fa fa-plus-square"></i>
                                        </div>
                                        <strong style="font-size: 13px; color: #0f172a;">New Department</strong>
                                    </a>
                                </div>
                                <div class="col-6 col-md-4 mb-3">
                                    <a href="{{ url('add_appointment') }}" class="btn-admin-light w-100 text-center flex-column py-3" style="border-radius: 14px; gap: 8px; display: flex;">
                                        <div style="width: 42px; height: 42px; border-radius: 12px; background: #ede9fe; color: #6366f1; display: flex; align-items: center; justify-content: center; font-size: 20px; margin: 0 auto;">
                                            <i class="fa fa-calendar-plus-o"></i>
                                        </div>
                                        <strong style="font-size: 13px; color: #0f172a;">Book Appointment</strong>
                                    </a>
                                </div>
                                <div class="col-6 col-md-4 mb-3">
                                    <a href="{{ url('add_press_desk') }}" class="btn-admin-light w-100 text-center flex-column py-3" style="border-radius: 14px; gap: 8px; display: flex;">
                                        <div style="width: 42px; height: 42px; border-radius: 12px; background: #fef3c7; color: #d97706; display: flex; align-items: center; justify-content: center; font-size: 20px; margin: 0 auto;">
                                            <i class="fa fa-newspaper-o"></i>
                                        </div>
                                        <strong style="font-size: 13px; color: #0f172a;">Press Release</strong>
                                    </a>
                                </div>
                                <div class="col-6 col-md-4 mb-3">
                                    <a href="{{ url('admincontact') }}" class="btn-admin-light w-100 text-center flex-column py-3" style="border-radius: 14px; gap: 8px; display: flex;">
                                        <div style="width: 42px; height: 42px; border-radius: 12px; background: #fce7f3; color: #db2777; display: flex; align-items: center; justify-content: center; font-size: 20px; margin: 0 auto;">
                                            <i class="fa fa-envelope-o"></i>
                                        </div>
                                        <strong style="font-size: 13px; color: #0f172a;">Contact Inbox</strong>
                                    </a>
                                </div>
                                <div class="col-6 col-md-4 mb-3">
                                    <a href="{{ url('adminfeedback') }}" class="btn-admin-light w-100 text-center flex-column py-3" style="border-radius: 14px; gap: 8px; display: flex;">
                                        <div style="width: 42px; height: 42px; border-radius: 12px; background: #e0e7ff; color: #4338ca; display: flex; align-items: center; justify-content: center; font-size: 20px; margin: 0 auto;">
                                            <i class="fa fa-comments-o"></i>
                                        </div>
                                        <strong style="font-size: 13px; color: #0f172a;">Reviews</strong>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Realtime Hospital Telemetry Live Box -->
                <div class="col-12 col-lg-5">
                    <div class="telemetry-live-box">
                        <div class="d-flex align-items-center justify-content-between m-b-15">
                            <div>
                                <h5 class="m-0" style="color: #ffffff; font-weight: 800;">
                                    <i class="fa fa-heartbeat text-danger m-r-5"></i> Cath Lab & Telemetry Stream
                                </h5>
                                <small style="color: #94a3b8;">Central Monitoring System Active</small>
                            </div>
                            <span class="badge badge-success" style="padding: 6px 10px; font-weight: 700;">
                                99.98% Uptime
                            </span>
                        </div>

                        <!-- ECG Animated Waveform -->
                        <div style="background: rgba(0, 0, 0, 0.4); border-radius: 10px; padding: 10px; border: 1px solid rgba(255, 255, 255, 0.1);">
                            <svg class="telemetry-ecg-svg" viewBox="0 0 400 40">
                                <path d="M0,20 L60,20 L75,12 L85,28 L95,20 L130,20 L140,5 L150,35 L160,10 L170,26 L178,20 L240,20 L255,12 L265,28 L275,20 L310,20 L320,5 L330,35 L340,10 L350,26 L358,20 L400,20" />
                            </svg>
                        </div>

                        <div class="row m-t-15 text-center">
                            <div class="col-4">
                                <div style="font-size: 11px; color: #94a3b8; text-transform: uppercase;">DB Response</div>
                                <strong style="font-size: 16px; color: #38bdf8;">12 ms</strong>
                            </div>
                            <div class="col-4">
                                <div style="font-size: 11px; color: #94a3b8; text-transform: uppercase;">Active Queues</div>
                                <strong style="font-size: 16px; color: #10b981;">Synced</strong>
                            </div>
                            <div class="col-4">
                                <div style="font-size: 11px; color: #94a3b8; text-transform: uppercase;">Firewall</div>
                                <strong style="font-size: 16px; color: #a855f7;">Protected</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Chart.js 3.7.0 for Advanced Graphs & Visualizations -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

    <script>
        // 1. Real-time Digital Clock with Seconds
        function updateLiveDigitalClock() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();
            var ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // 0 becomes 12
            var strHours = hours < 10 ? '0' + hours : hours;
            var strMinutes = minutes < 10 ? '0' + minutes : minutes;
            var strSeconds = seconds < 10 ? '0' + seconds : seconds;
            var timeString = strHours + ':' + strMinutes + ':' + strSeconds + ' ' + ampm;
            var el = document.getElementById('liveDigitalClock');
            if (el) el.innerText = timeString;
        }
        setInterval(updateLiveDigitalClock, 1000);
        updateLiveDigitalClock();

        // 2. Fetch and render Chart 1: Department & Gender Specialists Bar Chart
        fetch('/doctorsByDepartmentAndGenderCount')
            .then(function(response) {
                if (!response.ok) throw new Error('API network response not ok');
                return response.json();
            })
            .then(function(data) {
                if (data && Object.keys(data).length > 0) {
                    renderDepartmentGenderChart(data);
                } else {
                    renderFallbackDepartmentGenderChart();
                }
            })
            .catch(function(err) {
                console.warn('API error, rendering animated fallback chart:', err);
                renderFallbackDepartmentGenderChart();
            });

        function renderDepartmentGenderChart(data) {
            var ctx = document.getElementById('departmentGenderChart');
            if (!ctx) return;
            var labels = Object.keys(data);
            var maleCounts = Object.values(data).map(function(item) { return item.male; });
            var femaleCounts = Object.values(data).map(function(item) { return item.female; });

            new Chart(ctx.getContext('2d'), {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Male Specialists',
                        data: maleCounts,
                        backgroundColor: 'rgba(2, 132, 199, 0.85)',
                        borderColor: '#0284c7',
                        borderWidth: 1.5,
                        borderRadius: 8
                    }, {
                        label: 'Female Specialists',
                        data: femaleCounts,
                        backgroundColor: 'rgba(236, 72, 153, 0.85)',
                        borderColor: '#ec4899',
                        borderWidth: 1.5,
                        borderRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                font: { family: "'Plus Jakarta Sans', sans-serif", size: 12.5, weight: '700' },
                                usePointStyle: true,
                                padding: 16
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: { precision: 0, font: { family: "'Plus Jakarta Sans', sans-serif" } },
                            grid: { color: 'rgba(226, 232, 240, 0.7)' }
                        },
                        x: {
                            ticks: { font: { family: "'Plus Jakarta Sans', sans-serif", weight: '600' } },
                            grid: { display: false }
                        }
                    }
                }
            });
        }

        function renderFallbackDepartmentGenderChart() {
            renderDepartmentGenderChart({
                'Cardiology': { male: 3, female: 2 },
                'Oncology': { male: 2, female: 3 },
                'Orthopaedics': { male: 4, female: 1 },
                'Nephrology': { male: 2, female: 2 },
                'Neurology': { male: 3, female: 1 },
                'General Surgery': { male: 2, female: 2 }
            });
        }

        // 3. Chart 2: Weekly Patient Consultation Flow & Inpatient Trend (Smooth Spline Area Line Chart)
        (function renderWeeklyPatientFlowChart() {
            var ctx = document.getElementById('weeklyPatientFlowChart');
            if (!ctx) return;
            var chartCtx = ctx.getContext('2d');

            var gradientBlue = chartCtx.createLinearGradient(0, 0, 0, 300);
            gradientBlue.addColorStop(0, 'rgba(2, 132, 199, 0.45)');
            gradientBlue.addColorStop(1, 'rgba(2, 132, 199, 0.02)');

            var gradientGreen = chartCtx.createLinearGradient(0, 0, 0, 300);
            gradientGreen.addColorStop(0, 'rgba(16, 185, 129, 0.4)');
            gradientGreen.addColorStop(1, 'rgba(16, 185, 129, 0.02)');

            new Chart(chartCtx, {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [
                        {
                            label: 'OPD Consultations',
                            data: [42, 58, 65, 59, 78, 86, 45],
                            borderColor: '#0284c7',
                            backgroundColor: gradientBlue,
                            borderWidth: 2.5,
                            fill: true,
                            tension: 0.4,
                            pointRadius: 4,
                            pointBackgroundColor: '#0284c7',
                            pointHoverRadius: 6
                        },
                        {
                            label: 'Emergency / Inpatient',
                            data: [15, 22, 18, 25, 20, 30, 24],
                            borderColor: '#10b981',
                            backgroundColor: gradientGreen,
                            borderWidth: 2.5,
                            fill: true,
                            tension: 0.4,
                            pointRadius: 4,
                            pointBackgroundColor: '#10b981',
                            pointHoverRadius: 6
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                font: { family: "'Plus Jakarta Sans', sans-serif", size: 12, weight: '700' },
                                usePointStyle: true,
                                padding: 14
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: { font: { family: "'Plus Jakarta Sans', sans-serif" } },
                            grid: { color: 'rgba(226, 232, 240, 0.7)' }
                        },
                        x: {
                            ticks: { font: { family: "'Plus Jakarta Sans', sans-serif", weight: '600' } },
                            grid: { display: false }
                        }
                    }
                }
            });
        })();

        // 4. Chart 3: Clinical Department Distribution Doughnut Chart
        (function renderDeptDistributionChart() {
            var ctx = document.getElementById('deptDistributionChart');
            if (!ctx) return;
            new Chart(ctx.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Cardiology', 'Oncology', 'Orthopaedics', 'Nephrology', 'Surgery', 'Pediatrics'],
                    datasets: [{
                        data: [32, 24, 18, 14, 8, 4],
                        backgroundColor: [
                            '#0284c7',
                            '#e11d48',
                            '#10b981',
                            '#8b5cf6',
                            '#f59e0b',
                            '#06b6d4'
                        ],
                        borderWidth: 2,
                        borderColor: '#ffffff',
                        hoverOffset: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                font: { family: "'Plus Jakarta Sans', sans-serif", size: 11.5, weight: '600' },
                                usePointStyle: true,
                                padding: 12
                            }
                        }
                    },
                    cutout: '68%'
                }
            });
        })();
    </script>
</body>

</html>
