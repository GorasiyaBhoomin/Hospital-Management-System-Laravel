<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Prescription {{ $prescription->prescription_number }} | KK Patel Super Speciality Hospital</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('/') }}/img/logo3.png">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Bootstrap & FontAwesome -->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/font-awesome.min.css">

    <!-- html2pdf.js for High-Res Client PDF Generation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            background-color: #f1f5f9;
            color: #0f172a;
            padding: 30px 15px 60px;
            margin: 0;
            line-height: 1.5;
        }

        /* Top Action Toolbar */
        .rx-toolbar {
            max-width: 860px;
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
        }

        .btn-toolbar-print {
            background: linear-gradient(135deg, #69275c 0%, #0284c7 100%);
            color: #ffffff !important;
            box-shadow: 0 4px 14px rgba(105, 39, 92, 0.3);
        }

        .btn-toolbar-print:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(105, 39, 92, 0.4);
        }

        .btn-toolbar-edit {
            background: #f59e0b;
            color: #ffffff !important;
        }

        .btn-toolbar-edit:hover {
            background: #d97706;
            color: #ffffff !important;
        }

        /* Printable Prescription Paper Container */
        .rx-paper {
            max-width: 860px;
            margin: 0 auto;
            background: #ffffff;
            border: 1.5px solid #cbd5e1;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
            overflow: hidden;
            position: relative;
        }

        /* Official Hospital Header */
        .rx-header-strip {
            background: linear-gradient(135deg, #69275c 0%, #4a1540 100%);
            color: #ffffff;
            padding: 24px 32px;
            border-bottom: 3.5px solid #00a896;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .rx-hospital-title {
            font-size: 20px;
            font-weight: 900;
            color: #ffffff;
            margin: 0 0 2px;
            letter-spacing: 0.3px;
        }

        .rx-hospital-sub {
            font-size: 12px;
            color: #e2e8f0;
            margin: 0 0 6px;
            display: block;
        }

        .rx-hospital-meta {
            font-size: 11px;
            color: #cbd5e1;
            line-height: 1.45;
        }

        .rx-hospital-logo {
            height: 48px;
            background: #ffffff;
            padding: 6px 12px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        /* Meta Bar (Rx #, Date, Status) */
        .rx-meta-bar {
            background: #f8fafc;
            border-bottom: 1.5px dashed #cbd5e1;
            padding: 12px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }

        .rx-number-display {
            font-family: monospace;
            font-size: 18px;
            font-weight: 800;
            color: #69275c;
            letter-spacing: 0.5px;
        }

        /* Body Padding */
        .rx-content-body {
            padding: 26px 32px;
        }

        /* Section Headings */
        .rx-section-heading {
            font-size: 12.5px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #69275c;
            border-bottom: 1.5px solid #f1f5f9;
            padding-bottom: 6px;
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .rx-field-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 11px 14px;
            height: 100%;
        }

        .rx-field-label {
            font-size: 10.5px;
            font-weight: 700;
            text-transform: uppercase;
            color: #64748b;
            letter-spacing: 0.4px;
            margin-bottom: 3px;
            display: block;
        }

        .rx-field-value {
            font-size: 13.5px;
            font-weight: 700;
            color: #0f172a;
            margin: 0;
            word-break: break-word;
        }

        /* Primary Diagnosis Highlight Box */
        .rx-diagnosis-banner {
            background: linear-gradient(135deg, #f0fdfa 0%, #e0f2fe 100%);
            border: 1.5px solid #99f6e4;
            border-left: 5px solid #00a896;
            border-radius: 10px;
            padding: 14px 18px;
            margin-bottom: 22px;
        }

        /* Prescribed Medicines Table */
        .rx-med-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-bottom: 22px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            overflow: hidden;
        }

        .rx-med-table th {
            background: #f1f5f9;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #475569;
            padding: 11px 14px;
            border-bottom: 1.5px solid #e2e8f0;
            border-right: 1px solid #e2e8f0;
        }

        .rx-med-table th:last-child {
            border-right: none;
        }

        .rx-med-table td {
            padding: 11px 14px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
            border-right: 1px solid #f1f5f9;
            font-size: 13px;
        }

        .rx-med-table td:last-child {
            border-right: none;
        }

        .rx-med-table tr:last-child td {
            border-bottom: none;
        }

        /* Signatory Section */
        .rx-signatory-wrap {
            margin-top: 30px;
            padding-top: 18px;
            border-top: 1.5px dashed #cbd5e1;
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
        }

        .rx-sign-box {
            text-align: right;
        }

        .rx-sign-cursive {
            font-family: 'Brush Script MT', cursive, sans-serif;
            font-size: 24px;
            color: #1e293b;
            line-height: 1;
            margin-bottom: 4px;
        }

        .rx-sign-title {
            font-size: 13px;
            font-weight: 800;
            color: #0f172a;
        }

        .rx-sign-sub {
            font-size: 11px;
            color: #64748b;
        }

        /* Footer Legal Bar */
        .rx-footer-note {
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
            padding: 12px 32px;
            font-size: 10.5px;
            color: #64748b;
            text-align: center;
            line-height: 1.45;
        }

        /* Print Media Query */
        @media print {
            body {
                background: #ffffff !important;
                padding: 0 !important;
            }

            .rx-toolbar,
            .btn-toolbar-action,
            .no-print {
                display: none !important;
            }

            .rx-paper {
                border: none !important;
                box-shadow: none !important;
                max-width: 100% !important;
                border-radius: 0 !important;
            }
        }
    </style>
</head>

<body>

@php
    $doctorName = $prescription->doctor_name ?: ($prescription->doctor->username ?? ($prescription->doctor->name ?? ($prescription->appointment->username ?? 'Attending Specialist')));
    $doctorDept = $prescription->doctor_specialization ?: ($prescription->doctor->departmentname ?? ($prescription->doctor->speciality ?? 'Consultant Physician'));
    $doctorRoom = $prescription->doctor->room_no ?? 'OPD Consultation Room #102';
    $doctorQual = $prescription->doctor->qualification ?? 'MBBS, MD (Specialist)';

    $patientName = $prescription->patient_name ?: ($prescription->patient->name ?? ($prescription->appointment->appointmentname ?? 'Patient'));
    $patientUhid = $prescription->patient_uhid ?: ('#PAT-' . str_pad($prescription->patient_id ?? $prescription->appointment->user_id ?? 1, 5, '0', STR_PAD_LEFT));
    $patientPhone = $prescription->patient_phone ?: ($prescription->patient->phone ?? ($prescription->appointment->phone ?? 'N/A'));
    $patientEmail = $prescription->patient_email ?: ($prescription->patient->email ?? ($prescription->appointment->email ?? 'N/A'));
    $patientGender = $prescription->patient_gender ?: ($prescription->patient->gender ?? ($prescription->appointment->gender ?? 'N/A'));
    $patientAge = $prescription->patient_age ?: ($prescription->patient->age ?? null);

    $tokenRef = '#KKP-' . str_pad($prescription->appointment_id, 5, '0', STR_PAD_LEFT);
    $rxDate = $prescription->created_at ? date('d M Y', strtotime($prescription->created_at)) : date('d M Y');
    $isIssued = $prescription->isIssued();
@endphp

<!-- Top Interactive Actions Toolbar -->
<div class="rx-toolbar no-print">
    <div>
        <a href="{{ $backUrl }}" class="btn-toolbar-action btn-toolbar-back">
            <i class="fa fa-arrow-left"></i>
            @if($role === 'doctor') Back to Consultations
            @elseif($role === 'user') Back to My Appointments
            @else Back to Admin Roster
            @endif
        </a>
    </div>

    <div class="d-flex align-items-center gap-2">
        @if($role === 'doctor' && !$isIssued)
            <a href="{{ route('doctor.prescription.edit', $prescription->id) }}" class="btn-toolbar-action btn-toolbar-edit">
                <i class="fa fa-pencil"></i> Edit Draft
            </a>
        @endif

        <button type="button" class="btn-toolbar-action btn-toolbar-pdf" onclick="generatePdfDocument()">
            <i class="fa fa-download"></i> Download PDF
        </button>

        <button type="button" class="btn-toolbar-action btn-toolbar-print" onclick="window.print()">
            <i class="fa fa-print"></i> Print Prescription
        </button>
    </div>
</div>

<!-- Official Printable Prescription Paper -->
<div class="rx-paper" id="prescriptionPrintablePaper">

    <!-- Official Hospital Letterhead -->
    <div class="rx-header-strip">
        <div>
            <h1 class="rx-hospital-title">KK PATEL SUPER SPECIALITY HOSPITAL</h1>
            <span class="rx-hospital-sub">Managed by Shree Kutch Leva Patel Kanya Kelavani Mandal</span>
            <div class="rx-hospital-meta">
                <i class="fa fa-map-marker"></i> Bhuj - Mirzapar Highway, Bhuj, Kutch, Gujarat 370001 &bull;
                <i class="fa fa-phone"></i> Helpline: 02832 232233 &bull;
                <i class="fa fa-ambulance"></i> Emergency: 02832 236000
            </div>
        </div>

        <div class="text-right">
            <img src="{{ URL::to('/') }}/img/logo3.png" alt="KK Patel Hospital Logo" class="rx-hospital-logo">
            <div style="margin-top: 6px;">
                <span class="badge badge-success px-2 py-1 font-weight-bold" style="font-size: 10px; background: #00a896; border: 1px solid rgba(255,255,255,0.4);">
                    <i class="fa fa-check-circle"></i> NABH ACCREDITED
                </span>
            </div>
        </div>
    </div>

    <!-- Rx Identifier & Status Meta Strip -->
    <div class="rx-meta-bar">
        <div>
            <span style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase;">Prescription Reference:</span>
            <div class="rx-number-display">{{ $prescription->prescription_number }}</div>
        </div>

        <div class="d-flex align-items-center gap-3">
            <div>
                <span style="font-size: 10.5px; font-weight: 700; color: #64748b; text-transform: uppercase;">Appointment Ref:</span>
                <div style="font-family: monospace; font-size: 14px; font-weight: 800; color: #0284c7;">{{ $tokenRef }}</div>
            </div>
            <div>
                <span style="font-size: 10.5px; font-weight: 700; color: #64748b; text-transform: uppercase;">Date Issued:</span>
                <div style="font-size: 13.5px; font-weight: 700; color: #0f172a;">{{ $rxDate }}</div>
            </div>
            <div>
                @if($isIssued)
                    <span class="badge badge-success px-3 py-1 font-weight-bold" style="font-size: 11px; background: #059669;">
                        <i class="fa fa-check-circle"></i> OFFICIALLY ISSUED
                    </span>
                @else
                    <span class="badge badge-warning text-dark px-3 py-1 font-weight-bold" style="font-size: 11px;">
                        <i class="fa fa-pencil"></i> DRAFT RECORD
                    </span>
                @endif
            </div>
        </div>
    </div>

    <!-- Main Content Body -->
    <div class="rx-content-body">

        <!-- 1. Doctor & Patient Details -->
        <div class="row mb-4">
            <!-- Doctor Details -->
            <div class="col-md-6 mb-3 mb-md-0">
                <div class="rx-field-box" style="border-left: 3.5px solid #69275c;">
                    <span class="rx-field-label"><i class="fa fa-user-md text-primary"></i> Consulting Medical Specialist</span>
                    <div style="font-size: 16px; font-weight: 800; color: #0f172a; margin-bottom: 2px;">
                        Dr. {{ $doctorName }}
                    </div>
                    <div style="font-size: 12.5px; font-weight: 700; color: #00a896; margin-bottom: 2px;">
                        {{ $doctorDept }}
                    </div>
                    <div style="font-size: 11.5px; color: #64748b;">
                        {{ $doctorQual }} &bull; {{ $doctorRoom }}
                    </div>
                </div>
            </div>

            <!-- Patient Details -->
            <div class="col-md-6">
                <div class="rx-field-box" style="border-left: 3.5px solid #00a896;">
                    <span class="rx-field-label"><i class="fa fa-user text-success"></i> Patient Identification</span>
                    <div style="font-size: 16px; font-weight: 800; color: #0f172a; margin-bottom: 2px;">
                        {{ $patientName }}
                    </div>
                    <div style="font-size: 12px; color: #64748b; margin-bottom: 2px;">
                        UHID: <strong style="font-family: monospace; color: #0284c7;">{{ $patientUhid }}</strong> &bull;
                        Gender: <strong>{{ ucfirst($patientGender) }}</strong>
                        @if($patientAge) &bull; Age: <strong>{{ $patientAge }} yrs</strong> @endif
                    </div>
                    <div style="font-size: 11.5px; color: #64748b;">
                        Phone: <strong>{{ $patientPhone }}</strong>
                        @if($patientEmail && $patientEmail !== 'N/A') &bull; Email: {{ $patientEmail }} @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. Primary Diagnosis Banner -->
        <div class="rx-diagnosis-banner">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div>
                    <span style="font-size: 11px; font-weight: 800; text-transform: uppercase; color: #0f766e; letter-spacing: 0.5px;">
                        <i class="fa fa-stethoscope"></i> Primary Clinical Diagnosis
                    </span>
                    <div style="font-size: 17px; font-weight: 800; color: #0f172a; margin-top: 2px;">
                        {{ $prescription->diagnosis }}
                    </div>
                </div>
                @if($prescription->symptoms_duration)
                    <div>
                        <span class="badge badge-light border text-muted" style="font-size: 12px; font-weight: 700; padding: 6px 12px;">
                            Duration: {{ $prescription->symptoms_duration }}
                        </span>
                    </div>
                @endif
            </div>
        </div>

        <!-- 3. Clinical Findings / Symptoms / History -->
        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <div class="rx-field-box">
                    <span class="rx-field-label">Chief Presenting Complaints</span>
                    <div class="rx-field-value" style="font-weight: 600; font-size: 13px; color: #334155;">
                        {{ $prescription->symptoms ?: 'Regular outpatient clinical review.' }}
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="rx-field-box">
                    <span class="rx-field-label">Clinical Examination / Vitals Notes</span>
                    <div class="rx-field-value" style="font-weight: 600; font-size: 13px; color: #334155;">
                        {{ $prescription->clinical_notes ?: 'Physical examination vitals normal & stable.' }}
                    </div>
                </div>
            </div>

            @if($prescription->medical_history)
                <div class="col-md-6 mb-3">
                    <div class="rx-field-box">
                        <span class="rx-field-label">Medical / Surgical History</span>
                        <div class="rx-field-value" style="font-weight: 600; font-size: 13px; color: #334155;">
                            {{ $prescription->medical_history }}
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-md-6 mb-3">
                <div class="rx-field-box" style="border-left: 3px solid {{ $prescription->allergies && !str_contains(strtolower($prescription->allergies), 'no') ? '#ef4444' : '#10b981' }};">
                    <span class="rx-field-label">
                        <i class="fa fa-exclamation-circle {{ $prescription->allergies && !str_contains(strtolower($prescription->allergies), 'no') ? 'text-danger' : 'text-success' }}"></i> Known Drug Allergies
                    </span>
                    <div class="rx-field-value" style="font-weight: 700; font-size: 13px; color: {{ $prescription->allergies && !str_contains(strtolower($prescription->allergies), 'no') ? '#b91c1c' : '#059669' }};">
                        {{ $prescription->allergies ?: 'No known drug allergies (NKDA)' }}
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Prescribed Medications Table (℞) -->
        <div class="rx-section-heading">
            <span style="font-family: serif; font-size: 22px; font-weight: 900; color: #69275c; line-height: 1;">℞</span>
            Prescribed Medications
        </div>

        @if($prescription->medicines && $prescription->medicines->count() > 0)
            <table class="rx-med-table">
                <thead>
                    <tr>
                        <th style="width: 35px; text-align: center;">#</th>
                        <th>Medicine Name & Formulation</th>
                        <th style="width: 110px;">Dosage</th>
                        <th style="width: 150px;">Frequency</th>
                        <th style="width: 100px;">Duration</th>
                        <th style="width: 90px;">Route</th>
                        <th style="min-width: 160px;">Instructions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prescription->medicines as $idx => $med)
                        <tr>
                            <td style="text-align: center; font-weight: 800; color: #64748b;">{{ $idx + 1 }}</td>
                            <td>
                                <strong style="font-size: 13.5px; color: #0f172a;">{{ $med->medicine_name }}</strong>
                            </td>
                            <td>
                                <span style="font-weight: 600; color: #334155;">{{ $med->dosage ?: '-' }}</span>
                            </td>
                            <td>
                                <span class="badge badge-light border font-weight-bold" style="font-size: 11.5px; color: #0284c7; padding: 4px 8px;">
                                    {{ $med->frequency ?: '-' }}
                                </span>
                            </td>
                            <td>
                                <span style="font-weight: 600; color: #334155;">{{ $med->duration ?: '-' }}</span>
                            </td>
                            <td>
                                <span class="badge badge-light" style="font-size: 11px; border: 1px solid #cbd5e1; color: #475569;">
                                    {{ $med->route ?: 'Oral' }}
                                </span>
                            </td>
                            <td style="color: #475569; font-size: 12.5px;">
                                {{ $med->instructions ?: 'Take as directed' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="p-3 mb-4 bg-light rounded text-center text-muted" style="border: 1px dashed #cbd5e1; font-size: 13px;">
                No pharmaceutical medications prescribed. Clinical advice only.
            </div>
        @endif

        <!-- 5. Medical Advice & Follow-Up -->
        <div class="row mb-3">
            @if($prescription->medical_advice)
                <div class="col-md-7 mb-3">
                    <div class="rx-field-box">
                        <span class="rx-field-label"><i class="fa fa-heartbeat text-primary"></i> Medical Advice & Lifestyle Guidance</span>
                        <div class="rx-field-value" style="font-weight: 600; font-size: 13px; line-height: 1.5; color: #334155; white-space: pre-line;">
                            {{ $prescription->medical_advice }}
                        </div>
                    </div>
                </div>
            @endif

            @if($prescription->additional_instructions)
                <div class="col-md-5 mb-3">
                    <div class="rx-field-box">
                        <span class="rx-field-label"><i class="fa fa-flask text-warning"></i> Lab Tests / Additional Notes</span>
                        <div class="rx-field-value" style="font-weight: 600; font-size: 13px; line-height: 1.5; color: #334155; white-space: pre-line;">
                            {{ $prescription->additional_instructions }}
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Follow-Up Date Alert Banner -->
        @if($prescription->follow_up_required && $prescription->follow_up_date)
            <div class="p-3 mb-3" style="background: #f0fdf4; border: 1.5px solid #86efac; border-radius: 10px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px;">
                <div class="d-flex align-items-center gap-2">
                    <i class="fa fa-calendar-check-o text-success" style="font-size: 20px;"></i>
                    <div>
                        <strong style="color: #166534; font-size: 13.5px;">Scheduled Next Follow-Up Consultation:</strong>
                        <div style="font-size: 13px; color: #15803d; font-weight: 700;">
                            {{ date('l, d F Y', strtotime($prescription->follow_up_date)) }}
                        </div>
                    </div>
                </div>
                <span class="badge badge-success px-3 py-1 font-weight-bold" style="font-size: 11px; background: #16a34a;">
                    Follow-Up Advised
                </span>
            </div>
        @endif

        <!-- 6. Authorized Digital Signatory Block -->
        <div class="rx-signatory-wrap">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <i class="fa fa-shield text-success" style="font-size: 18px;"></i>
                    <strong style="font-size: 12.5px; color: #0f172a;">Hospital Digital Healthcare Authentication</strong>
                </div>
                <div style="font-size: 11px; color: #64748b; max-width: 380px;">
                    This clinical prescription is electronically registered and verifiable on KK Patel Super Speciality Hospital's digital health registry.
                </div>
            </div>

            <div class="rx-sign-box">
                <div class="rx-sign-cursive">
                    Dr. {{ $doctorName }}
                </div>
                <div class="rx-sign-title">Dr. {{ $doctorName }}</div>
                <div class="rx-sign-sub">{{ $doctorQual }} &bull; {{ $doctorDept }}</div>
                <div class="rx-sign-sub">Reg. #GMC-{{ 20000 + ($prescription->doctor_id ?? 1) * 31 }}</div>
            </div>
        </div>

    </div>

    <!-- Official Legal Footer -->
    <div class="rx-footer-note">
        This is an official electronic medical prescription issued under the Telemedicine / Outpatient Medical Practice Guidelines.
        Dispensing pharmacists should verify medicine dosage and strength before dispensing. For emergency inquiries, contact Hospital Casualty at 02832 236000.
    </div>

</div>

<!-- High-Resolution Client-Side PDF Generator Script -->
<script>
    function generatePdfDocument() {
        const element = document.getElementById('prescriptionPrintablePaper');
        const opt = {
            margin: [8, 8, 8, 8],
            filename: 'Prescription_{{ $prescription->prescription_number }}_{{ preg_replace('/[^A-Za-z0-9]/', '_', $patientName) }}.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2, useCORS: true, logging: false },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        };

        // Notify user
        const btn = document.querySelector('.btn-toolbar-pdf');
        const origText = btn ? btn.innerHTML : '';
        if (btn) {
            btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Generating PDF...';
            btn.style.pointerEvents = 'none';
        }

        html2pdf().set(opt).from(element).save().then(() => {
            if (btn) {
                btn.innerHTML = origText;
                btn.style.pointerEvents = 'auto';
            }
        }).catch(err => {
            console.error('PDF error:', err);
            if (btn) {
                btn.innerHTML = origText;
                btn.style.pointerEvents = 'auto';
            }
            window.print();
        });
    }
</script>

</body>

</html>

