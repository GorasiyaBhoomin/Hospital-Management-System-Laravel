@extends('user.user_layout')

@section('title', 'My Appointments & OPD Slips | KK Patel Super Speciality Hospital')
@section('page_title', 'My Appointments')
@section('hero_title', 'My Appointment Records & Digital OPD Slips')
@section('hero_subtitle', 'Track consultation statuses, download official PDF token slips, or print digital appointment vouchers.')

@php
    $activePortalTab = 'history';
@endphp

@push('styles')
<!-- html2pdf.js for 1-click Client PDF Generation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<style>
    .filter-tab-bar {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 8px;
    }

    .status-tab-btn {
        background: #ffffff !important;
        color: #475569 !important;
        border: 1.5px solid #e2e8f0 !important;
        padding: 6px 16px !important;
        border-radius: 50px !important;
        font-size: 13px !important;
        font-weight: 700 !important;
        cursor: pointer !important;
        transition: all 0.2s ease !important;
        width: auto !important;
        height: auto !important;
        display: inline-flex !important;
        align-items: center !important;
        gap: 6px !important;
        text-transform: none !important;
        box-shadow: none !important;
    }

    .status-tab-btn:hover {
        background: #f8fafc !important;
        border-color: #69275c !important;
        color: #69275c !important;
    }

    .status-tab-btn.active {
        background: #69275c !important;
        color: #ffffff !important;
        border-color: #69275c !important;
        box-shadow: 0 4px 12px rgba(105, 39, 92, 0.25) !important;
    }

    .status-tab-btn.active .tab-count {
        background: rgba(255, 255, 255, 0.25);
        color: #ffffff;
    }

    .tab-count {
        background: #f1f5f9;
        color: #64748b;
        font-size: 11px;
        font-weight: 800;
        padding: 2px 7px;
        border-radius: 50px;
    }

    /* Action Buttons in Table */
    .btn-action-download-pdf {
        background: linear-gradient(135deg, #059669 0%, #10b981 100%) !important;
        color: #ffffff !important;
        border: none !important;
        font-size: 12px !important;
        font-weight: 700 !important;
        padding: 6px 14px !important;
        border-radius: 50px !important;
        display: inline-flex !important;
        align-items: center !important;
        gap: 6px !important;
        cursor: pointer !important;
        text-decoration: none !important;
        box-shadow: 0 2px 8px rgba(16, 185, 129, 0.25) !important;
        transition: all 0.18s ease !important;
        white-space: nowrap !important;
    }

    .btn-action-download-pdf:hover {
        transform: translateY(-1px) !important;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.35) !important;
        color: #ffffff !important;
    }

    .btn-action-view-slip {
        background: #fbf5fa !important;
        color: #69275c !important;
        border: 1.5px solid #ebdbe8 !important;
        font-size: 12px !important;
        font-weight: 700 !important;
        padding: 6px 14px !important;
        border-radius: 50px !important;
        display: inline-flex !important;
        align-items: center !important;
        gap: 5px !important;
        cursor: pointer !important;
        text-decoration: none !important;
        transition: all 0.18s ease !important;
        white-space: nowrap !important;
    }

    .btn-action-view-slip:hover {
        background: #69275c !important;
        color: #ffffff !important;
        border-color: #69275c !important;
    }

    .btn-action-cancel {
        background: #fef2f2 !important;
        color: #dc2626 !important;
        border: 1px solid #fecaca !important;
        font-size: 12px !important;
        font-weight: 700 !important;
        padding: 6px 10px !important;
        border-radius: 50px !important;
        display: inline-flex !important;
        align-items: center !important;
        gap: 4px !important;
        cursor: pointer !important;
        text-decoration: none !important;
        transition: all 0.18s ease !important;
    }

    .btn-action-cancel:hover {
        background: #dc2626 !important;
        color: #ffffff !important;
        border-color: #dc2626 !important;
    }

    .btn-action-ext {
        background: #f8fafc !important;
        color: #64748b !important;
        border: 1px solid #e2e8f0 !important;
        font-size: 12px !important;
        padding: 6px 10px !important;
        border-radius: 50px !important;
        display: inline-flex !important;
        align-items: center !important;
        text-decoration: none !important;
    }

    .btn-action-ext:hover {
        color: #0284c7 !important;
        border-color: #0284c7 !important;
    }

    /* Modal Max Height Fix so buttons NEVER get cut off */
    .opd-modal-dialog {
        max-width: 720px;
        margin: 1.5rem auto;
    }

    @media (max-height: 800px) {
        .opd-modal-dialog {
            margin: 0.5rem auto;
        }
    }
</style>
@endpush

@section('content')

    <!-- Appointments History Card -->
    <div class="site-card">
        <!-- Header -->
        <div class="site-card-header">
            <div>
                <h3 class="site-card-title">
                    <span class="card-icon" style="background: #fbf5fa; color: #69275c;">
                        <i class="fa fa-history"></i>
                    </span>
                    My Appointments & Consultation History
                </h3>
                <small class="text-muted" style="font-size: 13px;">
                    Filtered for account: <strong>{{ Auth::user()->email }}</strong>
                </small>
            </div>
            <div class="d-flex align-items-center gap-2">
                <span class="badge badge-pill badge-primary" style="padding: 7px 14px; font-size: 12.5px; font-weight: 700; background: #fbf5fa; color: #69275c; border: 1px solid #ebdbe8;">
                    Total Records: {{ count($appointments) }}
                </span>
                <a href="{{ url('/user/book-appointment') }}" class="btn btn-primary rounded-pill px-3 font-weight-bold" style="background: linear-gradient(135deg, #69275c, #8b1d6b); border: none; font-size: 13px;">
                    <i class="fa fa-calendar-plus-o"></i> Book OPD
                </a>
            </div>
        </div>

        <!-- Filter Status Toolbar -->
        <div class="px-4 py-3 bg-light border-bottom d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div class="d-flex align-items-center flex-wrap gap-2">
                <span style="font-size: 13px; font-weight: 700; color: #0f172a; margin-right: 6px;">Filter by Status:</span>
                <div class="filter-tab-bar">
                    <button type="button" class="status-tab-btn active" data-filter="all">
                        All <span class="tab-count">{{ count($appointments) }}</span>
                    </button>
                    <button type="button" class="status-tab-btn" data-filter="approved">
                        Confirmed <span class="tab-count">{{ $appointments->where('Status', 'Approved')->count() }}</span>
                    </button>
                    <button type="button" class="status-tab-btn" data-filter="pending">
                        Pending <span class="tab-count">{{ $appointments->where('Status', 'Pending')->count() }}</span>
                    </button>
                    <button type="button" class="status-tab-btn" data-filter="completed">
                        Completed <span class="tab-count">{{ $appointments->where('Status', 'Completed')->count() }}</span>
                    </button>
                    <button type="button" class="status-tab-btn" data-filter="cancelled">
                        Cancelled <span class="tab-count">{{ $appointments->where('Status', 'Cancelled')->count() + $appointments->where('Status', 'Rejected')->count() }}</span>
                    </button>
                </div>
            </div>
            <div class="text-muted" style="font-size: 12px;">
                <i class="fa fa-check-circle text-success"></i> Click <strong>Download PDF</strong> for instant voucher, or <strong>View Slip</strong> to inspect online.
            </div>
        </div>

        <!-- Table Body -->
        <div class="p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="appointmentsTable" style="font-size: 13.5px;">
                    <thead style="background: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                        <tr>
                            <th style="padding: 14px 20px; font-weight: 800; color: #0f172a; width: 140px;">OPD Token #</th>
                            <th style="padding: 14px 20px; font-weight: 800; color: #0f172a;">Doctor & Speciality</th>
                            <th style="padding: 14px 20px; font-weight: 800; color: #0f172a;">Allotted Date & Time</th>
                            <th style="padding: 14px 20px; font-weight: 800; color: #0f172a; width: 140px;">Status</th>
                            <th style="padding: 14px 20px; font-weight: 800; color: #0f172a; text-align: right; width: 280px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($appointments as $apt)
                            @php
                                $statusSlug = strtolower(trim($apt->Status ?? 'pending'));
                                if ($statusSlug == 'rejected') $statusSlug = 'cancelled';
                                $doctorName = $apt->username ?: ($apt->doctor ?: 'Senior Specialist');
                                $deptName = $apt->departmentname ?: ($apt->department ?: 'General Medicine');
                                $patientName = $apt->appointmentname ?: (Auth::user()->name ?? 'Patient');
                                $tokenRef = '#KKP-' . str_pad($apt->id, 5, '0', STR_PAD_LEFT);
                                $uhidRef = '#PAT-' . str_pad($apt->user_id ?: Auth::id(), 5, '0', STR_PAD_LEFT);
                                $formattedDate = date('l, d F Y', strtotime($apt->date));
                                $roomNo = 'Room #' . (($apt->id % 12) + 101);
                                $reasonText = $apt->message ?: ($apt->massage ?: 'Regular Clinical OPD Consultation and Physician Evaluation.');
                            @endphp
                            <tr class="appointment-row" data-status="{{ $statusSlug }}">
                                <td style="padding: 16px 20px; vertical-align: middle;">
                                    <strong style="color: #69275c; font-family: monospace; font-size: 14.5px;">{{ $tokenRef }}</strong>
                                    <small class="text-muted d-block" style="font-size: 11.5px;">{{ date('d M Y', strtotime($apt->created_at ?? now())) }}</small>
                                </td>

                                <td style="padding: 16px 20px; vertical-align: middle;">
                                    <strong style="color: #0f172a; display: block; font-size: 14.5px;">{{ $doctorName }}</strong>
                                    <span style="font-size: 12px; color: #64748b;">
                                        <i class="fa fa-stethoscope text-primary"></i> {{ $deptName }}
                                    </span>
                                </td>

                                <td style="padding: 16px 20px; vertical-align: middle;">
                                    <div style="font-weight: 700; color: #334155;"><i class="fa fa-calendar-o text-muted m-r-5"></i> {{ date('d M Y', strtotime($apt->date)) }}</div>
                                    <div style="font-size: 12px; color: #64748b;"><i class="fa fa-clock-o text-muted m-r-5"></i> {{ $apt->time }}</div>
                                </td>

                                <td style="padding: 16px 20px; vertical-align: middle;">
                                    @if($statusSlug == 'approved' || $statusSlug == 'confirmed')
                                        <span class="badge badge-pill" style="background: #ecfdf5; color: #059669; border: 1px solid #a7f3d0; padding: 5px 12px; font-size: 12px; font-weight: 700;">
                                            <i class="fa fa-check-circle"></i> Confirmed
                                        </span>
                                    @elseif($statusSlug == 'cancelled')
                                        <span class="badge badge-pill" style="background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; padding: 5px 12px; font-size: 12px; font-weight: 700;">
                                            <i class="fa fa-times-circle"></i> Cancelled
                                        </span>
                                    @elseif($statusSlug == 'completed')
                                        <span class="badge badge-pill" style="background: #f0f9ff; color: #0284c7; border: 1px solid #bae6fd; padding: 5px 12px; font-size: 12px; font-weight: 700;">
                                            <i class="fa fa-check"></i> Completed
                                        </span>
                                    @else
                                        <span class="badge badge-pill" style="background: #fffbeb; color: #d97706; border: 1px solid #fde68a; padding: 5px 12px; font-size: 12px; font-weight: 700;">
                                            <i class="fa fa-clock-o"></i> Pending
                                        </span>
                                    @endif
                                </td>

                                <td style="padding: 16px 20px; vertical-align: middle; text-align: right;">
                                    <div class="d-inline-flex align-items-center gap-2">
                                        <!-- 1-Click Direct Download PDF Button -->
                                        <button type="button" class="btn-action-download-pdf"
                                                data-id="{{ $apt->id }}"
                                                data-token="{{ $tokenRef }}"
                                                data-name="{{ $patientName }}"
                                                data-uhid="{{ $uhidRef }}"
                                                data-email="{{ $apt->email ?: Auth::user()->email }}"
                                                data-phone="{{ $apt->phone ?: (Auth::user()->phone ?: 'N/A') }}"
                                                data-gender="{{ ucfirst($apt->gender ?: 'N/A') }}"
                                                data-doctor="{{ $doctorName }}"
                                                data-dept="{{ $deptName }}"
                                                data-date="{{ $formattedDate }}"
                                                data-time="{{ $apt->time }}"
                                                data-room="{{ $roomNo }}"
                                                data-status="{{ $apt->Status ?: 'Pending' }}"
                                                data-reason="{{ $reasonText }}"
                                                data-slip-url="{{ url('/user/appointment/' . $apt->id . '/slip') }}"
                                                onclick="directDownloadRowPdf(this)"
                                                title="Instant 1-Click PDF Download">
                                            <i class="fa fa-download"></i> PDF
                                        </button>

                                        <!-- View Slip Modal Trigger Button -->
                                        <button type="button" class="btn-action-view-slip"
                                                data-id="{{ $apt->id }}"
                                                data-token="{{ $tokenRef }}"
                                                data-name="{{ $patientName }}"
                                                data-uhid="{{ $uhidRef }}"
                                                data-email="{{ $apt->email ?: Auth::user()->email }}"
                                                data-phone="{{ $apt->phone ?: (Auth::user()->phone ?: 'N/A') }}"
                                                data-gender="{{ ucfirst($apt->gender ?: 'N/A') }}"
                                                data-doctor="{{ $doctorName }}"
                                                data-dept="{{ $deptName }}"
                                                data-date="{{ $formattedDate }}"
                                                data-time="{{ $apt->time }}"
                                                data-room="{{ $roomNo }}"
                                                data-status="{{ $apt->Status ?: 'Pending' }}"
                                                data-reason="{{ $reasonText }}"
                                                data-slip-url="{{ url('/user/appointment/' . $apt->id . '/slip') }}"
                                                onclick="openSlipModal(this)"
                                                title="View Online Voucher">
                                            <i class="fa fa-eye"></i> View Slip
                                        </button>

                                        <!-- Standalone Full Slip Page -->
                                        <a href="{{ url('/user/appointment/' . $apt->id . '/slip') }}" target="_blank" class="btn-action-ext" title="Open Full Page Voucher in New Tab">
                                            <i class="fa fa-external-link"></i>
                                        </a>

                                        <!-- Cancel Action -->
                                        @if($statusSlug != 'cancelled' && $statusSlug != 'completed')
                                            <form action="{{ url('/user/appointment/' . $apt->id . '/cancel') }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to cancel this appointment?');">
                                                @csrf
                                                <button type="submit" class="btn-action-cancel" title="Cancel Appointment">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <div style="width: 60px; height: 60px; border-radius: 50%; background: #fbf5fa; color: #69275c; display: flex; align-items: center; justify-content: center; font-size: 26px; margin: 0 auto 12px;">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                    <h4 style="color: #0f172a; font-weight: 800; margin-bottom: 4px; font-size: 17px;">No Appointments Found</h4>
                                    <p style="color: #64748b; font-size: 13.5px; margin-bottom: 16px;">Schedule your first hospital OPD consultation.</p>
                                    <a href="{{ url('/user/book-appointment') }}" class="btn btn-primary rounded-pill px-4" style="background: linear-gradient(135deg, #69275c, #8b1d6b); border: none; font-size: 13px;">
                                        <i class="fa fa-calendar-plus-o"></i> Book OPD Consultation Now
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- ===================================================================
         DIGITAL OPD TOKEN SLIP MODAL (SCROLLABLE & NEVER CUT OFF)
         =================================================================== -->
    <div class="modal fade" id="slipModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable opd-modal-dialog" role="document">
            <div class="modal-content rounded-4 border-0 shadow-lg overflow-hidden">
                
                <!-- TOP HEADER WITH VISIBLE ACTION BUTTONS (ALWAYS VISIBLE AT EYE LEVEL) -->
                <div class="modal-header bg-white border-bottom py-2 px-3 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge badge-pill badge-primary" style="background: #fbf5fa; color: #69275c; border: 1px solid #ebdbe8; font-size: 12px; padding: 5px 12px;">
                            <i class="fa fa-file-text-o"></i> Digital OPD Token
                        </span>
                        <span id="topModalToken" style="font-family: monospace; font-weight: 800; color: #0f172a; font-size: 14px;">#KKP-00000</span>
                    </div>

                    <!-- Direct Action Buttons at Top -->
                    <div class="d-flex align-items-center gap-2">
                        <!-- Download PDF Button Top -->
                        <button type="button" class="btn btn-sm btn-success rounded-pill font-weight-bold px-3" id="topPdfBtn" onclick="downloadModalSlipPdf()" style="font-size: 12.5px; background: #059669; border: none;">
                            <i class="fa fa-download"></i> Download PDF
                        </button>

                        <!-- Print Button Top -->
                        <button type="button" class="btn btn-sm btn-light rounded-pill font-weight-bold px-3 border" onclick="printModalSlip()" style="font-size: 12.5px;">
                            <i class="fa fa-print"></i> Print
                        </button>

                        <!-- Close (X) -->
                        <button type="button" class="close ml-2" data-dismiss="modal" aria-label="Close" style="font-size: 24px; line-height: 1; outline: none;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>

                <!-- Printable Slip Document Scrollable Body Area -->
                <div class="modal-body p-0">
                    <div id="printableSlipArea">
                        <!-- Slip Header -->
                        <div style="background: linear-gradient(135deg, #69275c 0%, #4a1540 100%); color: #ffffff; padding: 20px 24px; border-bottom: 3px solid #00a896;">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h4 style="color: #ffffff; font-weight: 800; margin: 0; font-size: 17px; letter-spacing: 0.3px;">
                                        KK PATEL SUPER SPECIALITY HOSPITAL
                                    </h4>
                                    <span style="font-size: 11px; color: #e2e8f0; display: block; margin-top: 2px;">
                                        Managed by Shree Kutchi Leva Patel Kanya Kelavani Mandal
                                    </span>
                                    <small style="font-size: 10.5px; color: #cbd5e1; display: block; margin-top: 4px;">
                                        Bhuj - Mirzapar Highway, Bhuj, Kutch, Gujarat 370001 &bull; Helpline: 02832 232233
                                    </small>
                                </div>
                                <div class="text-right">
                                    <div style="background: #ffffff; padding: 4px 8px; border-radius: 6px; display: inline-block;">
                                        <img src="{{ URL::to('/') }}/img/logo2.png" alt="Hospital Logo" style="height: 28px;">
                                    </div>
                                    <span class="badge badge-pill badge-success d-block mt-1" style="font-size: 9.5px; font-weight: 800;">
                                        <i class="fa fa-shield"></i> NABH ACCREDITED
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Token Reference & Status Bar -->
                        <div style="background: #f8fafc; border-bottom: 1.5px dashed #cbd5e1; padding: 10px 24px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 8px;">
                            <div>
                                <span class="text-muted text-uppercase" style="font-size: 9.5px; font-weight: 800; display: block;">DIGITAL OPD TOKEN #</span>
                                <strong id="modalTokenRef" style="color: #69275c; font-family: monospace; font-size: 18px; letter-spacing: 0.5px;">#KKP-00000</strong>
                            </div>
                            <div class="text-center d-none d-sm-block">
                                <span class="text-muted text-uppercase" style="font-size: 9.5px; font-weight: 800; display: block;">AUTHENTICATION BARCODE</span>
                                <span style="font-family: monospace; font-size: 14px; letter-spacing: 4px; color: #334155; background: #e2e8f0; padding: 2px 8px; border-radius: 4px;">||| | || |||| | ||</span>
                            </div>
                            <div class="text-right">
                                <span class="text-muted text-uppercase" style="font-size: 9.5px; font-weight: 800; display: block;">STATUS</span>
                                <span id="modalStatusBadge" class="badge badge-pill badge-success" style="padding: 4px 10px; font-size: 11.5px; font-weight: 700;">
                                    CONFIRMED
                                </span>
                            </div>
                        </div>

                        <!-- Slip Body Details -->
                        <div style="padding: 20px 24px; background: #ffffff;">
                            
                            <!-- 1. Patient Details -->
                            <div class="mb-3">
                                <div class="text-uppercase font-weight-bold mb-2" style="font-size: 11px; color: #69275c; letter-spacing: 0.5px; border-bottom: 1px solid #f1f5f9; padding-bottom: 3px;">
                                    <i class="fa fa-user-circle text-primary"></i> 1. Patient Identification Details
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-4 mb-2">
                                        <small class="text-muted d-block text-uppercase" style="font-size: 10px; font-weight: 700;">Patient Name</small>
                                        <strong id="modalPatientName" style="font-size: 14px; color: #0f172a;">-</strong>
                                    </div>
                                    <div class="col-6 col-sm-4 mb-2">
                                        <small class="text-muted d-block text-uppercase" style="font-size: 10px; font-weight: 700;">Patient UHID</small>
                                        <strong id="modalPatientUhid" style="font-size: 13px; color: #0284c7; font-family: monospace;">-</strong>
                                    </div>
                                    <div class="col-6 col-sm-4 mb-2">
                                        <small class="text-muted d-block text-uppercase" style="font-size: 10px; font-weight: 700;">Mobile Number</small>
                                        <strong id="modalPatientPhone" style="font-size: 13px; color: #0f172a;">-</strong>
                                    </div>
                                    <div class="col-8 col-sm-6">
                                        <small class="text-muted d-block text-uppercase" style="font-size: 10px; font-weight: 700;">Registered Email</small>
                                        <span id="modalPatientEmail" style="font-size: 12px; color: #475569;">-</span>
                                    </div>
                                    <div class="col-4 col-sm-3">
                                        <small class="text-muted d-block text-uppercase" style="font-size: 10px; font-weight: 700;">Gender</small>
                                        <span id="modalPatientGender" style="font-size: 12.5px; font-weight: 700; color: #0f172a;">-</span>
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <small class="text-muted d-block text-uppercase" style="font-size: 10px; font-weight: 700;">Category</small>
                                        <span class="badge badge-pill badge-light text-success" style="font-size: 10.5px; font-weight: 700;">OPD Consultation</span>
                                    </div>
                                </div>
                            </div>

                            <!-- 2. Consultation Schedule -->
                            <div class="mb-3" style="background: #fbf5fa; border: 1px solid #ebdbe8; border-radius: 10px; padding: 14px 16px;">
                                <div class="row align-items-center">
                                    <div class="col-12 col-md-6 mb-2 mb-md-0 border-right">
                                        <small class="text-muted d-block text-uppercase" style="font-size: 10px; font-weight: 700;">Consultant Specialist Doctor</small>
                                        <h5 id="modalDoctorName" style="color: #69275c; font-weight: 800; font-size: 15px; margin: 2px 0 4px;">-</h5>
                                        <span id="modalDepartmentName" class="badge badge-pill badge-primary" style="background: #e0f2fe; color: #0284c7; border: 1px solid #bae6fd; font-size: 11px; font-weight: 700;">-</span>
                                        <span id="modalRoom" class="badge badge-pill badge-light ml-1" style="font-size: 10.5px; border: 1px solid #e2e8f0;">-</span>
                                    </div>
                                    <div class="col-12 col-md-6 pl-md-3">
                                        <div class="mb-1">
                                            <small class="text-muted d-block text-uppercase" style="font-size: 10px; font-weight: 700;">Allotted Date</small>
                                            <strong id="modalDate" style="color: #0f172a; font-size: 13.5px;">-</strong>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block text-uppercase" style="font-size: 10px; font-weight: 700;">OPD Time Slot</small>
                                            <strong id="modalTime" style="color: #059669; font-size: 13.5px;">-</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 3. Symptoms / Notes -->
                            <div class="mb-3">
                                <small class="text-muted d-block text-uppercase" style="font-size: 10px; font-weight: 700;">Clinical Symptoms / Reason for Visit</small>
                                <p id="modalReason" style="font-size: 12px; color: #334155; margin: 0; background: #fafafa; padding: 8px 12px; border-radius: 6px; border: 1px dashed #cbd5e1; line-height: 1.5;">-</p>
                            </div>

                            <!-- 4. Guidelines -->
                            <div style="background: #f8fafc; padding: 10px 14px; border-radius: 8px; border: 1px solid #e2e8f0; font-size: 11px; color: #64748b; line-height: 1.5;">
                                <strong>Instructions:</strong> Present this voucher at Central OPD 15 minutes prior to slot. Bring past medical files. PMJAY / Mediclaim cardholders report to Counter #4. Emergency Trauma: <strong>02832 236000</strong>.
                            </div>

                            <!-- 5. Seal & Verification Footer -->
                            <div class="d-flex align-items-center justify-content-between mt-3 pt-2 border-top">
                                <div style="font-size: 10px; color: #059669; font-weight: 800; border: 1.5px dashed #059669; padding: 3px 8px; border-radius: 6px; background: #ecfdf5;">
                                    <i class="fa fa-certificate"></i> VERIFIED DIGITAL OPD TOKEN
                                </div>
                                <div class="text-right">
                                    <small class="text-muted d-block" style="font-size: 9.5px;">Authorized Registrar</small>
                                    <strong style="font-size: 10.5px; color: #0f172a;">KK Patel Hospital, Bhuj</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Bottom Footer with Actions -->
                <div class="modal-footer bg-light border-top py-2 px-3 d-flex justify-content-between align-items-center">
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 font-weight-bold" data-dismiss="modal">
                        Close
                    </button>
                    
                    <div class="d-flex align-items-center gap-2">
                        <!-- Open Full Page Voucher in New Tab -->
                        <a href="#" id="modalSlipFullView" target="_blank" class="btn btn-sm btn-outline-info font-weight-bold rounded-pill px-3" style="font-size: 12px;">
                            <i class="fa fa-external-link"></i> Full Page Voucher
                        </a>

                        <!-- Download PDF Button Bottom -->
                        <button type="button" class="btn btn-sm btn-success font-weight-bold rounded-pill px-3" id="bottomPdfBtn" onclick="downloadModalSlipPdf()" style="font-size: 12.5px; background: #059669; border: none;">
                            <i class="fa fa-download"></i> Download PDF
                        </button>

                        <!-- Print Slip Button Bottom -->
                        <button type="button" class="btn btn-sm btn-primary font-weight-bold rounded-pill px-3" onclick="printModalSlip()" style="font-size: 12.5px; background: #69275c; border: none;">
                            <i class="fa fa-print"></i> Print Slip
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    // Status Filter Tabs
    document.querySelectorAll('.status-tab-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.status-tab-btn').forEach(function(b) {
                b.classList.remove('active');
            });
            this.classList.add('active');

            var filter = this.getAttribute('data-filter');
            var rows = document.querySelectorAll('.appointment-row');

            rows.forEach(function(row) {
                var status = row.getAttribute('data-status');
                if (filter === 'all' || status === filter) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });

    // Populate and Open Digital OPD Slip Modal with All Details
    function openSlipModal(btn) {
        populateModalData(btn);
        $('#slipModal').modal('show');
    }

    // Direct 1-Click PDF Download straight from table row (without needing to view modal!)
    function directDownloadRowPdf(btn) {
        populateModalData(btn);
        // Trigger download directly
        downloadModalSlipPdf();
    }

    // Populate data helper
    function populateModalData(btn) {
        var id = btn.getAttribute('data-id');
        var token = btn.getAttribute('data-token');
        var name = btn.getAttribute('data-name');
        var uhid = btn.getAttribute('data-uhid');
        var email = btn.getAttribute('data-email');
        var phone = btn.getAttribute('data-phone');
        var gender = btn.getAttribute('data-gender');
        var doctor = btn.getAttribute('data-doctor');
        var dept = btn.getAttribute('data-dept');
        var date = btn.getAttribute('data-date');
        var time = btn.getAttribute('data-time');
        var room = btn.getAttribute('data-room');
        var status = btn.getAttribute('data-status');
        var reason = btn.getAttribute('data-reason');
        var slipUrl = btn.getAttribute('data-slip-url');

        // Populate Modal Fields
        document.getElementById('topModalToken').innerText = token || ('#KKP-' + String(id).padStart(5, '0'));
        document.getElementById('modalTokenRef').innerText = token || ('#KKP-' + String(id).padStart(5, '0'));
        document.getElementById('modalPatientName').innerText = name || 'Patient';
        document.getElementById('modalPatientUhid').innerText = uhid || '#PAT-00000';
        document.getElementById('modalPatientEmail').innerText = email || 'N/A';
        document.getElementById('modalPatientPhone').innerText = phone || 'N/A';
        document.getElementById('modalPatientGender').innerText = gender || 'N/A';
        document.getElementById('modalDoctorName').innerText = doctor || 'Senior Medical Lead';
        document.getElementById('modalDepartmentName').innerText = dept || 'Clinical Speciality';
        document.getElementById('modalRoom').innerText = room || 'Room #101';
        document.getElementById('modalDate').innerText = date || '-';
        document.getElementById('modalTime').innerText = time || '-';
        document.getElementById('modalReason').innerText = reason || 'Regular Clinical OPD Consultation and Physician Evaluation.';
        document.getElementById('modalSlipFullView').href = slipUrl || ('/user/appointment/' + id + '/slip');

        // Status Badge Style
        var stBadge = document.getElementById('modalStatusBadge');
        var stLower = (status || 'pending').toLowerCase();
        stBadge.innerText = (status || 'CONFIRMED').toUpperCase();
        if (stLower === 'approved' || stLower === 'confirmed') {
            stBadge.className = 'badge badge-pill badge-success';
        } else if (stLower === 'completed') {
            stBadge.className = 'badge badge-pill badge-primary';
        } else if (stLower === 'cancelled' || stLower === 'rejected') {
            stBadge.className = 'badge badge-pill badge-danger';
        } else {
            stBadge.className = 'badge badge-pill badge-warning';
        }
    }

    // Download OPD Slip as high-resolution PDF
    function downloadModalSlipPdf() {
        var element = document.getElementById('printableSlipArea');
        var token = document.getElementById('modalTokenRef').innerText.replace(/[^A-Za-z0-9_-]/g, '');
        var patientName = document.getElementById('modalPatientName').innerText.replace(/[^A-Za-z0-9]/g, '_');

        var topBtn = document.getElementById('topPdfBtn');
        var bottomBtn = document.getElementById('bottomPdfBtn');
        var origTopHtml = topBtn ? topBtn.innerHTML : '';
        var origBtmHtml = bottomBtn ? bottomBtn.innerHTML : '';

        if (topBtn) { topBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Generating...'; topBtn.disabled = true; }
        if (bottomBtn) { bottomBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Generating...'; bottomBtn.disabled = true; }

        var opt = {
            margin:       [8, 8, 8, 8],
            filename:     'KKPatel_OPD_Slip_' + token + '_' + patientName + '.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2, useCORS: true, logging: false },
            jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
        };

        if (typeof html2pdf !== 'undefined') {
            html2pdf().set(opt).from(element).save().then(function() {
                if (topBtn) { topBtn.innerHTML = origTopHtml; topBtn.disabled = false; }
                if (bottomBtn) { bottomBtn.innerHTML = origBtmHtml; bottomBtn.disabled = false; }
            }).catch(function(err) {
                console.error('PDF error:', err);
                if (topBtn) { topBtn.innerHTML = origTopHtml; topBtn.disabled = false; }
                if (bottomBtn) { bottomBtn.innerHTML = origBtmHtml; bottomBtn.disabled = false; }
                printModalSlip();
            });
        } else {
            if (topBtn) { topBtn.innerHTML = origTopHtml; topBtn.disabled = false; }
            if (bottomBtn) { bottomBtn.innerHTML = origBtmHtml; bottomBtn.disabled = false; }
            printModalSlip();
        }
    }

    // Print Modal Slip cleanly via temporary print window
    function printModalSlip() {
        var element = document.getElementById('printableSlipArea');
        var printWin = window.open('', '_blank', 'width=850,height=900');
        printWin.document.write('<!DOCTYPE html><html><head><title>Print OPD Slip</title>');
        printWin.document.write('<link rel="stylesheet" href="{{ URL::to('/') }}/css/bootstrap.min.css">');
        printWin.document.write('<link rel="stylesheet" href="{{ URL::to('/') }}/css/font-awesome.min.css">');
        printWin.document.write('<style>body{padding:20px;font-family:sans-serif;} @media print{body{padding:0;} .no-print{display:none;}}</style>');
        printWin.document.write('</head><body>');
        printWin.document.write(element.innerHTML);
        printWin.document.write('</body></html>');
        printWin.document.close();
        printWin.focus();
        setTimeout(function() {
            printWin.print();
            printWin.close();
        }, 500);
    }
</script>
@endpush
