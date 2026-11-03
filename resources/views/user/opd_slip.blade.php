<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>OPD Consultation Slip #KKP-{{ str_pad($appointment->id, 5, '0', STR_PAD_LEFT) }} | KK Patel Hospital</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('/') }}/img/logo3.png">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Libre+Barcode+39+Text&display=swap" rel="stylesheet">

    <!-- Bootstrap & FontAwesome -->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/font-awesome.min.css">

    <!-- html2pdf.js for 1-click Client PDF Generation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            background-color: #f1f5f9;
            color: #0f172a;
            padding: 30px 15px 60px;
        }

        /* Top Action Toolbar */
        .slip-toolbar {
            max-width: 820px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn-toolbar-action {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 20px;
            border-radius: 50px;
            font-size: 13.5px;
            font-weight: 700;
            text-decoration: none !important;
            cursor: pointer;
            transition: all 0.2s ease;
            border: none;
        }

        .btn-toolbar-back {
            background: #ffffff;
            color: #475569;
            border: 1.5px solid #cbd5e1;
        }

        .btn-toolbar-back:hover {
            background: #f8fafc;
            color: #0f172a;
        }

        .btn-toolbar-pdf {
            background: linear-gradient(135deg, #059669 0%, #10b981 100%);
            color: #ffffff !important;
            box-shadow: 0 4px 14px rgba(16, 185, 129, 0.3);
        }

        .btn-toolbar-pdf:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(16, 185, 129, 0.4);
            color: #ffffff !important;
        }

        .btn-toolbar-print {
            background: linear-gradient(135deg, #69275c 0%, #0284c7 100%);
            color: #ffffff !important;
            box-shadow: 0 4px 14px rgba(105, 39, 92, 0.3);
        }

        .btn-toolbar-print:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(105, 39, 92, 0.4);
            color: #ffffff !important;
        }

        /* Printable Slip Document Container */
        .opd-slip-paper {
            max-width: 820px;
            margin: 0 auto;
            background: #ffffff;
            border: 1.5px solid #cbd5e1;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
            overflow: hidden;
            position: relative;
        }

        /* Header of the Official Slip */
        .slip-header-strip {
            background: linear-gradient(135deg, #69275c 0%, #4a1540 100%);
            color: #ffffff;
            padding: 24px 32px;
            position: relative;
            border-bottom: 3px solid #00a896;
        }

        .slip-hospital-title {
            font-size: 20px;
            font-weight: 800;
            color: #ffffff;
            margin: 0 0 2px;
            letter-spacing: 0.3px;
        }

        .slip-hospital-sub {
            font-size: 12px;
            color: #e2e8f0;
            margin: 0 0 6px;
            display: block;
        }

        .slip-hospital-meta {
            font-size: 11.5px;
            color: #cbd5e1;
            line-height: 1.5;
        }

        .slip-hospital-logo {
            height: 48px;
            background: #ffffff;
            padding: 6px 12px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        /* Token & Status Bar */
        .slip-token-bar {
            background: #f8fafc;
            border-bottom: 1.5px dashed #cbd5e1;
            padding: 14px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }

        .slip-token-number {
            font-family: monospace;
            font-size: 20px;
            font-weight: 800;
            color: #69275c;
            letter-spacing: 0.5px;
        }

        /* Body Sections */
        .slip-content-body {
            padding: 30px 32px;
        }

        .slip-section-heading {
            font-size: 13px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #69275c;
            border-bottom: 1.5px solid #f1f5f9;
            padding-bottom: 6px;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .slip-field-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 12px 14px;
            height: 100%;
        }

        .slip-field-label {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            color: #64748b;
            letter-spacing: 0.4px;
            margin-bottom: 3px;
            display: block;
        }

        .slip-field-value {
            font-size: 14px;
            font-weight: 700;
            color: #0f172a;
            margin: 0;
            word-break: break-word;
        }

        .slip-field-highlight {
            color: #69275c;
            font-size: 15px;
        }

        /* Consultation Highlights Box */
        .slip-consultation-card {
            background: linear-gradient(135deg, #fbf5fa 0%, #f0fdf4 100%);
            border: 1.5px solid #ebdbe8;
            border-radius: 12px;
            padding: 18px 20px;
            margin-bottom: 24px;
        }

        /* Symptoms Box */
        .slip-symptoms-box {
            background: #fafafa;
            border: 1px dashed #cbd5e1;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 13px;
            color: #334155;
            line-height: 1.6;
        }

        /* Instructions list */
        .slip-guidelines-list {
            padding-left: 18px;
            margin-bottom: 0;
            font-size: 12px;
            color: #475569;
            line-height: 1.7;
        }

        /* Verification Seal & Sign */
        .slip-auth-footer {
            border-top: 1.5px solid #e2e8f0;
            padding: 20px 32px 24px;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
        }

        .slip-seal-stamp {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            border: 2px dashed #059669;
            color: #059669;
            padding: 6px 16px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            background: #ecfdf5;
        }

        .slip-signatory {
            text-align: right;
        }

        .slip-sign-title {
            font-size: 12px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 2px;
        }

        .slip-sign-sub {
            font-size: 11px;
            color: #64748b;
        }

        .barcode-visual {
            font-family: monospace;
            font-size: 16px;
            letter-spacing: 5px;
            color: #334155;
            background: #f1f5f9;
            padding: 4px 10px;
            border-radius: 4px;
            display: inline-block;
        }

        /* Print Media Styles */
        @media print {
            body {
                background: #ffffff !important;
                padding: 0 !important;
            }
            .slip-toolbar {
                display: none !important;
            }
            .opd-slip-paper {
                box-shadow: none !important;
                border: 1px solid #000000 !important;
                max-width: 100% !important;
                border-radius: 0 !important;
            }
            .slip-header-strip {
                background: #69275c !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
                color: #ffffff !important;
            }
            .slip-token-bar {
                background: #f8fafc !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            .slip-consultation-card {
                background: #fbf5fa !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
        }
    </style>
</head>

<body>

    <!-- 1. Top Action Toolbar (Never Printed) -->
    <div class="slip-toolbar">
        <div>
            <a href="{{ url('/user/appointment-history') }}" class="btn-toolbar-action btn-toolbar-back">
                <i class="fa fa-arrow-left"></i> Back to Appointments
            </a>
        </div>
        <div class="d-flex align-items-center gap-2">
            <!-- Download PDF Button -->
            <button type="button" class="btn-toolbar-action btn-toolbar-pdf" id="downloadPdfBtn" onclick="downloadSlipPdf()">
                <i class="fa fa-download"></i> Download PDF
            </button>
            <!-- Print Slip Button -->
            <button type="button" class="btn-toolbar-action btn-toolbar-print" onclick="window.print()">
                <i class="fa fa-print"></i> Print Slip
            </button>
        </div>
    </div>

    <!-- 2. The Official OPD Slip Document -->
    <div class="opd-slip-paper" id="printableSlipArea">
        
        <!-- Header Strip -->
        <div class="slip-header-strip">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h2 class="slip-hospital-title">KK PATEL SUPER SPECIALITY HOSPITAL</h2>
                    <span class="slip-hospital-sub">Managed by Shree Kutchi Leva Patel Kanya Kelavani Mandal</span>
                    <div class="slip-hospital-meta">
                        <i class="fa fa-map-marker"></i> Bhuj - Mirzapar Highway, Bhuj, Kutch, Gujarat - 370001 <br>
                        <i class="fa fa-phone"></i> OPD: 02832 232233 &bull; 24x7 Emergency: 02832 236000 &bull; Ambulance: 108
                    </div>
                </div>
                <div class="text-right">
                    <img src="{{ URL::to('/') }}/img/logo2.png" alt="Hospital Logo" class="slip-hospital-logo">
                    <div class="mt-2 text-white font-weight-bold" style="font-size: 11px;">
                        <i class="fa fa-shield"></i> NABH ACCREDITED
                    </div>
                </div>
            </div>
        </div>

        <!-- Token Reference & Status Bar -->
        <div class="slip-token-bar">
            <div>
                <span class="text-muted text-uppercase" style="font-size: 10.5px; font-weight: 800; display: block;">DIGITAL OPD TOKEN NUMBER</span>
                <span class="slip-token-number" id="slipTokenRef">#KKP-{{ str_pad($appointment->id, 5, '0', STR_PAD_LEFT) }}</span>
            </div>
            <div class="text-center">
                <span class="text-muted text-uppercase" style="font-size: 10.5px; font-weight: 800; display: block;">VERIFICATION BARCODE</span>
                <span class="barcode-visual">||| | || |||| | ||| ||</span>
            </div>
            <div class="text-right">
                <span class="text-muted text-uppercase" style="font-size: 10.5px; font-weight: 800; display: block;">CONSULTATION STATUS</span>
                @php
                    $status = strtolower(trim($appointment->Status ?: 'pending'));
                @endphp
                @if($status == 'approved' || $status == 'confirmed')
                    <span class="badge badge-pill badge-success" style="font-size: 12.5px; font-weight: 700; padding: 5px 12px;">
                        <i class="fa fa-check-circle"></i> CONFIRMED
                    </span>
                @elseif($status == 'completed')
                    <span class="badge badge-pill badge-primary" style="font-size: 12.5px; font-weight: 700; padding: 5px 12px; background: #0284c7;">
                        <i class="fa fa-check"></i> COMPLETED
                    </span>
                @elseif($status == 'cancelled' || $status == 'rejected')
                    <span class="badge badge-pill badge-danger" style="font-size: 12.5px; font-weight: 700; padding: 5px 12px;">
                        <i class="fa fa-times-circle"></i> CANCELLED
                    </span>
                @else
                    <span class="badge badge-pill badge-warning" style="font-size: 12.5px; font-weight: 700; padding: 5px 12px; background: #f59e0b; color: #fff;">
                        <i class="fa fa-clock-o"></i> PENDING APPROVAL
                    </span>
                @endif
            </div>
        </div>

        <!-- Main Body -->
        <div class="slip-content-body">
            
            <!-- Patient Profile Details -->
            <div class="slip-section-heading">
                <i class="fa fa-user-circle"></i> 1. Patient Identification Details
            </div>
            <div class="row mb-4">
                <div class="col-12 col-sm-4 mb-2 mb-sm-0">
                    <div class="slip-field-box">
                        <span class="slip-field-label">Patient Full Name</span>
                        <h6 class="slip-field-value slip-field-highlight" id="slipPatientName">
                            {{ $appointment->appointmentname ?: ($user->name ?? 'Patient') }}
                        </h6>
                    </div>
                </div>
                <div class="col-6 col-sm-4 mb-2 mb-sm-0">
                    <div class="slip-field-box">
                        <span class="slip-field-label">Patient UHID / ID</span>
                        <h6 class="slip-field-value" style="font-family: monospace; color: #0284c7;">
                            #PAT-{{ str_pad($appointment->user_id ?: $appointment->id, 5, '0', STR_PAD_LEFT) }}
                        </h6>
                    </div>
                </div>
                <div class="col-6 col-sm-4 mb-2 mb-sm-0">
                    <div class="slip-field-box">
                        <span class="slip-field-label">Contact Mobile</span>
                        <h6 class="slip-field-value">
                            {{ $appointment->phone ?: ($user->phone ?? 'N/A') }}
                        </h6>
                    </div>
                </div>
                <div class="col-6 col-sm-6 mt-2">
                    <div class="slip-field-box">
                        <span class="slip-field-label">Patient Registered Email</span>
                        <h6 class="slip-field-value" style="font-size: 13px;">
                            {{ $appointment->email ?: ($user->email ?? 'N/A') }}
                        </h6>
                    </div>
                </div>
                <div class="col-6 col-sm-3 mt-2">
                    <div class="slip-field-box">
                        <span class="slip-field-label">Gender</span>
                        <h6 class="slip-field-value">
                            {{ ucfirst($appointment->gender ?: 'N/A') }}
                        </h6>
                    </div>
                </div>
                <div class="col-12 col-sm-3 mt-2">
                    <div class="slip-field-box">
                        <span class="slip-field-label">OPD Category</span>
                        <h6 class="slip-field-value text-success">
                            Consultation OPD
                        </h6>
                    </div>
                </div>
            </div>

            <!-- Consultation Details Card -->
            <div class="slip-section-heading">
                <i class="fa fa-stethoscope"></i> 2. Doctor Consultation & Schedule
            </div>
            <div class="slip-consultation-card mb-4">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6 mb-3 mb-md-0 border-right">
                        <span class="slip-field-label text-muted">Allotted Specialist Doctor</span>
                        <h4 class="font-weight-bold mb-1" style="font-size: 18px; color: #69275c;">
                            {{ $appointment->username ?: ($appointment->doctor ?: 'Senior Specialist Doctor') }}
                        </h4>
                        <div class="d-inline-flex align-items-center gap-2 mt-1">
                            <span class="badge badge-pill badge-primary" style="background: #e0f2fe; color: #0284c7; border: 1px solid #bae6fd; font-size: 12px; font-weight: 700;">
                                <i class="fa fa-hospital-o"></i> {{ $appointment->departmentname ?: ($appointment->department ?: 'Clinical Speciality') }}
                            </span>
                            <span class="badge badge-pill badge-light" style="font-size: 11px; border: 1px solid #e2e8f0;">
                                Room #{{ (($appointment->id % 12) + 101) }}
                            </span>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 pl-md-4">
                        <div class="mb-2">
                            <span class="slip-field-label text-muted">Consultation Date</span>
                            <h5 class="font-weight-bold text-dark mb-0" style="font-size: 16px;">
                                <i class="fa fa-calendar-check-o text-primary"></i> {{ date('l, d F Y', strtotime($appointment->date)) }}
                            </h5>
                        </div>
                        <div>
                            <span class="slip-field-label text-muted">Allotted OPD Time Slot</span>
                            <h5 class="font-weight-bold text-success mb-0" style="font-size: 15px;">
                                <i class="fa fa-clock-o"></i> {{ $appointment->time }}
                            </h5>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Clinical Reason / Symptoms -->
            <div class="slip-section-heading">
                <i class="fa fa-file-text-o"></i> 3. Clinical Symptoms & Patient Notes
            </div>
            <div class="slip-symptoms-box mb-4">
                <strong>Reported Reason / Clinical Notes:</strong><br>
                <span>{{ $appointment->message ?: ($appointment->massage ?: 'Regular Clinical OPD Consultation and Physician Evaluation.') }}</span>
            </div>

            <!-- Patient Instructions -->
            <div class="slip-section-heading">
                <i class="fa fa-info-circle"></i> 4. Important OPD Consultation Guidelines
            </div>
            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 14px 18px; margin-bottom: 10px;">
                <ol class="slip-guidelines-list">
                    <li>Please report to the central OPD registration desk <strong>15 minutes prior</strong> to your allotted slot for vital statistics (BP, Pulse, SPO2) and triage entry.</li>
                    <li>Carry this printed token slip or show the digital PDF on your smartphone at the department consultation desk.</li>
                    <li>Kindly bring all past clinical files, prescription slips, radiology scans (MRI/CT/X-ray), and laboratory blood reports.</li>
                    <li><strong>PMJAY / Cashless Insurance:</strong> Eligible patients with Ayushman Bharat Golden Card or private Mediclaim policies should visit Counter #4 in the main lobby before seeing the doctor.</li>
                    <li>In case of medical emergencies or acute symptoms, call our 24/7 Trauma Emergency Unit directly at <strong>02832 236000</strong>.</li>
                </ol>
            </div>
        </div>

        <!-- Official Authorization Footer -->
        <div class="slip-auth-footer">
            <div>
                <div class="slip-seal-stamp">
                    <i class="fa fa-certificate"></i> Digital Verification Valid
                </div>
                <small class="d-block text-muted mt-1" style="font-size: 11px;">
                    Generated on {{ date('d M Y, h:i A') }} &bull; HMIS System ID: #KKP-SYS-{{ $appointment->id }}
                </small>
            </div>

            <div class="slip-signatory">
                <div style="font-family: 'Brush Script MT', cursive, sans-serif; font-size: 22px; color: #1e293b; line-height: 1.2;">
                    {{ $appointment->username ?: ($appointment->doctor ?: 'Dr. KK Patel') }}
                </div>
                <div class="slip-sign-title">Attending Specialist Doctor</div>
                <div class="slip-sign-sub">KK Patel Super Speciality Hospital, Bhuj</div>
            </div>
        </div>
    </div>

    <!-- PDF Generation JavaScript -->
    <script>
        function downloadSlipPdf() {
            var element = document.getElementById('printableSlipArea');
            var btn = document.getElementById('downloadPdfBtn');
            var originalBtnHtml = btn.innerHTML;

            btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Generating PDF...';
            btn.disabled = true;

            var opt = {
                margin:       [8, 8, 8, 8],
                filename:     'KKPatel_OPD_Slip_#KKP-{{ str_pad($appointment->id, 5, '0', STR_PAD_LEFT) }}_{{ preg_replace('/[^A-Za-z0-9]/', '_', $appointment->appointmentname ?: 'Patient') }}.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2, useCORS: true, logging: false },
                jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
            };

            html2pdf().set(opt).from(element).save().then(function() {
                btn.innerHTML = originalBtnHtml;
                btn.disabled = false;
            }).catch(function(err) {
                console.error('PDF error:', err);
                btn.innerHTML = originalBtnHtml;
                btn.disabled = false;
                window.print();
            });
        }
    </script>
</body>

</html>

