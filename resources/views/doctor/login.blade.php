<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('/') }}/img/logo3.png">
    <title>Doctor Clinical Console Login | KK Patel Super Speciality Hospital</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/assets/css/font-awesome.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            background: linear-gradient(135deg, #091e3a 0%, #0f172a 45%, #06283d 100%);
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px 16px;
            position: relative;
            overflow-x: hidden;
            color: #334155;
        }

        /* Ambient Glowing Background Blobs */
        .ambient-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(90px);
            pointer-events: none;
            opacity: 0.45;
            z-index: 0;
        }

        .blob-1 {
            width: 480px;
            height: 480px;
            background: radial-gradient(circle, #00a896 0%, transparent 70%);
            top: -100px;
            left: -100px;
        }

        .blob-2 {
            width: 520px;
            height: 520px;
            background: radial-gradient(circle, #0284c7 0%, transparent 70%);
            bottom: -120px;
            right: -100px;
        }

        .login-card-container {
            width: 100%;
            max-width: 460px;
            background: #ffffff;
            border-radius: 22px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.4), 0 0 0 1px rgba(255, 255, 255, 0.1);
            overflow: hidden;
            position: relative;
            z-index: 2;
        }

        .login-header-banner {
            background: linear-gradient(135deg, #00a896 0%, #0284c7 100%);
            padding: 28px 30px;
            color: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .login-header-banner::after {
            content: '';
            position: absolute;
            bottom: -20px;
            right: -20px;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            pointer-events: none;
        }

        .hospital-logo-pill {
            background: #ffffff;
            padding: 6px 12px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
            margin-bottom: 12px;
        }

        .hospital-logo-pill img {
            height: 28px;
        }

        .login-body-form {
            padding: 30px 32px 34px;
        }

        .form-floating-label {
            font-size: 12.5px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .custom-input-group {
            position: relative;
            margin-bottom: 18px;
        }

        .custom-input-group .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 15px;
            pointer-events: none;
        }

        .custom-input-group input {
            width: 100%;
            height: 48px;
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            padding: 10px 16px 10px 44px;
            font-size: 14px;
            font-weight: 600;
            color: #0f172a;
            outline: none;
            transition: all 0.2s ease;
        }

        .custom-input-group input:focus {
            background: #ffffff;
            border-color: #00a896;
            box-shadow: 0 0 0 4px rgba(0, 168, 150, 0.12);
        }

        .btn-submit-doctor {
            width: 100%;
            height: 48px;
            background: linear-gradient(135deg, #00a896 0%, #0284c7 100%);
            color: #ffffff;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0, 168, 150, 0.35);
            transition: all 0.25s ease;
        }

        .btn-submit-doctor:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 22px rgba(0, 168, 150, 0.45);
        }

        /* Demo Doctor Fast-Login Chips */
        .demo-chip-box {
            background: #f8fafc;
            border: 1px dashed #cbd5e1;
            border-radius: 14px;
            padding: 14px 16px;
            margin-top: 22px;
        }

        .demo-chip-title {
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #64748b;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .quick-doctor-btn {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 50px;
            padding: 4px 10px;
            font-size: 11.5px;
            font-weight: 700;
            color: #0f172a;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            cursor: pointer;
            transition: all 0.18s ease;
            margin: 3px 2px;
            text-decoration: none !important;
        }

        .quick-doctor-btn:hover {
            background: #00a896;
            color: #ffffff;
            border-color: #00a896;
            transform: translateY(-1px);
        }
    </style>
</head>

<body>

    <div class="ambient-blob blob-1"></div>
    <div class="ambient-blob blob-2"></div>

    <div class="login-card-container">
        <!-- Header -->
        <div class="login-header-banner">
            <div class="hospital-logo-pill">
                <img src="{{ URL::to('/') }}/img/logo2.png" alt="KK Patel Hospital">
            </div>
            <h3 style="font-size: 20px; font-weight: 800; margin: 0 0 4px; letter-spacing: -0.3px;">
                Doctor Clinical Console
            </h3>
            <p style="font-size: 12.5px; margin: 0; opacity: 0.9;">
                Sign in to manage OPD schedules, appointments, and patient care.
            </p>
        </div>

        <!-- Form Body -->
        <div class="login-body-form">
            <!-- Flash Session Alerts -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 10px; font-size: 12.5px; font-weight: 600;">
                    <i class="fa fa-check-circle m-r-5"></i> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 10px; font-size: 12.5px; font-weight: 600;">
                    <i class="fa fa-exclamation-circle m-r-5"></i> {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif

            <form action="{{ route('doctor.login.submit') }}" method="POST">
                @csrf

                <!-- Doctor Email -->
                <div class="form-group mb-2">
                    <label class="form-floating-label" for="docEmail">
                        <span>Doctor Registered Email</span>
                    </label>
                    <div class="custom-input-group">
                        <i class="fa fa-envelope-o input-icon"></i>
                        <input type="email" id="docEmail" name="email" value="{{ old('email', 'meetthacker@gmail.com') }}"  placeholder="doctor@kkpatelhospital.com">
                    </div>
                </div>

                <!-- Password -->
                <div class="form-group mb-3">
                    <label class="form-floating-label" for="docPassword">
                        <span>Password</span>
                        <small class="text-muted">Default: doctor123</small>
                    </label>
                    <div class="custom-input-group">
                        <i class="fa fa-lock input-icon"></i>
                        <input type="password" id="docPassword" name="password" value="doctor123"  placeholder="Enter password">
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="d-flex align-items-center justify-content-between mb-4" style="font-size: 13px;">
                    <label class="d-flex align-items-center gap-2 mb-0" style="cursor: pointer;">
                        <input type="checkbox" name="remember" value="1" checked style="accent-color: #00a896; width: 16px; height: 16px;">
                        <span style="font-weight: 600; color: #475569;">Keep me signed in</span>
                    </label>
                    <span class="text-muted" style="font-size: 11.5px;">24/7 Clinical OPD</span>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-submit-doctor">
                    <i class="fa fa-sign-in"></i> Access Doctor Console
                </button>
            </form>

            <!-- Quick Auto-Fill Demo Doctor Buttons -->
            @if(isset($doctorsList) && count($doctorsList) > 0)
                <div class="demo-chip-box">
                    <div class="demo-chip-title">
                        <i class="fa fa-stethoscope text-primary"></i> 1-Click Fast Login for Doctors:
                    </div>
                    <div>
                        @foreach($doctorsList as $docItem)
                            <button type="button" class="quick-doctor-btn" onclick="fillDoctorCreds('{{ $docItem->email }}', 'doctor123')">
                                <i class="fa fa-user-md text-primary"></i> {{ $docItem->username }}
                            </button>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="text-center mt-3 pt-3 border-top" style="font-size: 12.5px;">
                <a href="{{ url('/') }}" class="text-muted text-decoration-none m-r-10">
                    <i class="fa fa-globe"></i> Main Hospital Site
                </a>
                <span class="text-muted">&bull;</span>
                <a href="{{ url('/user/login') }}" class="text-muted text-decoration-none m-l-10">
                    <i class="fa fa-user"></i> Patient Portal
                </a>
            </div>
        </div>
    </div>

    <script>
        function fillDoctorCreds(email, password) {
            document.getElementById('docEmail').value = email;
            document.getElementById('docPassword').value = password;
        }
    </script>

</body>

</html>
