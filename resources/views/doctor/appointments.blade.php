@extends('doctor.layout')

@section('title', 'My Appointments | ' . $doctor->username)

@php
    $activeTab = 'appointments';
@endphp

@push('styles')
<style>
    .filter-tab-pill {
        background: #ffffff;
        color: #475569;
        border: 1.5px solid #e2e8f0;
        border-radius: 50px;
        padding: 6px 16px;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s ease;
        text-decoration: none !important;
    }

    .filter-tab-pill:hover {
        background: #f8fafc;
        border-color: #00a896;
        color: #00a896;
    }

    .filter-tab-pill.active {
        background: #00a896;
        color: #ffffff;
        border-color: #00a896;
        box-shadow: 0 4px 12px rgba(0, 168, 150, 0.25);
    }

    .filter-tab-pill.active .tab-badge {
        background: rgba(255, 255, 255, 0.25);
        color: #ffffff;
    }

    .tab-badge {
        background: #f1f5f9;
        color: #64748b;
        font-size: 11px;
        font-weight: 800;
        padding: 2px 7px;
        border-radius: 50px;
    }

    .table-doc-appointments {
        width: 100%;
        min-width: 960px;
        border-collapse: separate;
        border-spacing: 0;
        margin: 0;
    }

    .table-doc-appointments thead th {
        background: #f8fafc;
        color: #334155;
        font-size: 11.5px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        padding: 14px 18px;
        border: none;
        border-bottom: 1.5px solid #e2e8f0;
        white-space: nowrap;
    }

    .table-doc-appointments tbody tr {
        transition: all 0.18s ease;
    }

    .table-doc-appointments tbody tr:hover {
        background-color: #f0fdfa !important;
    }

    .table-doc-appointments tbody td {
        padding: 15px 18px;
        vertical-align: middle;
        border-top: none;
        border-bottom: 1px solid #f1f5f9;
        font-size: 13.5px;
    }

    .patient-avatar-box {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: linear-gradient(135deg, #00a896 0%, #0284c7 100%);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 14px;
        flex-shrink: 0;
    }
</style>
@endpush

@section('content')

    <!-- Page Banner -->
    <div class="doc-page-banner">
        <div>
            <h2 class="doc-banner-title">
                <span class="doc-banner-icon">
                    <i class="fa fa-calendar-check-o"></i>
                </span>
                My Patient Consultations
            </h2>
            <p class="doc-banner-subtitle">
                Manage outpatient bookings assigned to you, update appointment progress, and review patient medical complaints.
            </p>
        </div>

        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('doctor.appointments') }}" class="btn-doc-light">
                <i class="fa fa-refresh"></i> Refresh
            </a>
            <a href="{{ route('doctor.time_slots') }}" class="btn-doc-primary">
                <i class="fa fa-clock-o"></i> Manage Slots
            </a>
        </div>
    </div>

    <!-- Filter & Search Toolbar Bar -->
    <div class="doc-card p-3 mb-4">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
            
            <!-- Status Filter Pills -->
            <div class="d-flex align-items-center flex-wrap gap-2">
                <button type="button" class="filter-tab-pill active" onclick="setDocStatusFilter('all', this)">
                    All Consultations <span class="tab-badge">{{ $tally['all'] }}</span>
                </button>
                <button type="button" class="filter-tab-pill" onclick="setDocStatusFilter('approved', this)">
                    <i class="fa fa-check text-success"></i> Approved <span class="tab-badge">{{ $tally['approved'] }}</span>
                </button>
                <button type="button" class="filter-tab-pill" onclick="setDocStatusFilter('pending', this)">
                    <i class="fa fa-clock-o text-warning"></i> Pending <span class="tab-badge">{{ $tally['pending'] }}</span>
                </button>
                <button type="button" class="filter-tab-pill" onclick="setDocStatusFilter('completed', this)">
                    <i class="fa fa-check-circle text-primary"></i> Completed <span class="tab-badge">{{ $tally['completed'] }}</span>
                </button>
                <button type="button" class="filter-tab-pill" onclick="setDocStatusFilter('cancelled', this)">
                    <i class="fa fa-times text-danger"></i> Cancelled <span class="tab-badge">{{ $tally['cancelled'] }}</span>
                </button>
            </div>

            <!-- Instant Search Input -->
            <div style="min-width: 260px; position: relative;">
                <i class="fa fa-search" style="position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: #94a3b8; font-size: 13px;"></i>
                <input type="text" id="docAppointmentSearch" placeholder="Search patient name, token, phone..."
                       oninput="filterDocAppointments()"
                       style="width: 100%; background: #f8fafc; border: 1.5px solid #e2e8f0; border-radius: 50px; padding: 7px 14px 7px 36px; font-size: 13px; font-weight: 600; outline: none;">
            </div>
        </div>
    </div>

    <!-- Master Appointments Table -->
    <div class="doc-card">
        <div class="doc-card-header">
            <h4 class="doc-card-title">
                <i class="fa fa-stethoscope text-primary"></i> Scheduled Consultations Roster
            </h4>
            <span class="badge badge-pill badge-light border text-primary" id="docVisibleCountBadge" style="font-size: 12px; font-weight: 700;">
                Showing {{ count($appointments) }} of {{ count($appointments) }}
            </span>
        </div>

        <div class="table-responsive">
            <table class="table table-doc-appointments mb-0" id="docAppointmentsTable">
                <thead>
                    <tr>
                        <th style="width: 120px;">Token #</th>
                        <th style="min-width: 240px;">Patient Profile</th>
                        <th style="min-width: 180px;">Schedule Date & Slot</th>
                        <th style="min-width: 200px;">Chief Complaint / Reason</th>
                        <th style="width: 135px; text-align: center;">Consultation Status</th>
                        <th style="min-width: 175px; text-align: center;">Prescription</th>
                        <th style="width: 125px; text-align: right;">OPD Slip & Call</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($appointments as $apt)
                        @php
                            $st = strtolower(trim((string)$apt->Status));
                            if ($st === 'rejected') $st = 'cancelled';
                            if (empty($st)) $st = 'pending';

                            $tokenStr = '#KKP-' . str_pad($apt->id, 5, '0', STR_PAD_LEFT);
                            $uhidStr = '#PAT-' . str_pad($apt->user_id ?? $apt->id, 5, '0', STR_PAD_LEFT);
                            $patientName = $apt->appointmentname ?: 'Patient';
                            $patientInitial = strtoupper(substr($patientName, 0, 1));
                            $complaint = $apt->message ?: ($apt->massage ?: 'Regular clinical consultation and evaluation.');

                            $dateTs = strtotime($apt->date);
                            $formattedDate = $dateTs ? date('d M Y', $dateTs) : $apt->date;
                            $dayName = $apt->day ? substr($apt->day, 0, 3) : ($dateTs ? date('D', $dateTs) : '');
                            $timeSlot = $apt->time ?: '10:00 AM - 11:00 AM';

                            $searchHaystack = strtolower($tokenStr . ' ' . $patientName . ' ' . $apt->email . ' ' . $apt->phone . ' ' . $complaint . ' ' . $uhidStr);
                        @endphp
                        <tr class="doc-appointment-row" data-status="{{ $st }}" data-search="{{ $searchHaystack }}">
                            <!-- 1. Token # -->
                            <td>
                                <strong style="font-family: monospace; font-size: 14px; color: #00a896;">{{ $tokenStr }}</strong>
                                <small class="text-muted d-block" style="font-size: 11px;">
                                    Booked: {{ date('d M Y', strtotime($apt->created_at ?? now())) }}
                                </small>
                            </td>

                            <!-- 2. Patient Profile -->
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="patient-avatar-box m-r-10">
                                        {{ $patientInitial }}
                                    </div>
                                    <div style="line-height: 1.35;">
                                        <div class="d-flex align-items-center gap-2">
                                            <strong style="color: #0f172a; font-size: 14px;">{{ $patientName }}</strong>
                                            <span class="badge badge-light" style="font-size: 10px; border: 1px solid #e2e8f0; color: #475569; padding: 2px 6px;">
                                                {{ $apt->gender ?: 'Patient' }}
                                            </span>
                                        </div>
                                        <div style="font-size: 12px; margin-top: 2px;">
                                            <a href="mailto:{{ $apt->email }}" style="color: #0284c7; text-decoration: none;">
                                                <i class="fa fa-envelope-o text-muted"></i> {{ $apt->email }}
                                            </a>
                                        </div>
                                        <div style="font-size: 11.5px; color: #64748b;">
                                            <a href="tel:{{ $apt->phone }}" style="color: #475569; text-decoration: none;">
                                                <i class="fa fa-phone text-muted"></i> {{ $apt->phone }}
                                            </a>
                                            <span class="text-muted mx-1">&bull;</span>
                                            <span style="font-family: monospace; font-size: 11px; color: #0284c7;">{{ $uhidStr }}</span>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <!-- 3. Schedule Date & Time Slot (Never Multi-Line Broken) -->
                            <td style="white-space: nowrap !important;">
                                <div class="d-inline-flex flex-column">
                                    <span class="badge badge-light border" style="font-size: 12.5px; font-weight: 700; color: #0f172a; padding: 5px 10px; border-radius: 6px;">
                                        <i class="fa fa-calendar-check-o text-primary m-r-4"></i> {{ $formattedDate }}
                                        @if($dayName)
                                            <span style="color: #64748b; font-weight: 500;">({{ $dayName }})</span>
                                        @endif
                                    </span>
                                    <div style="font-size: 12px; font-weight: 600; color: #00a896; margin-top: 4px;">
                                        <i class="fa fa-clock-o m-r-4"></i> {{ $timeSlot }}
                                    </div>
                                </div>
                            </td>

                            <!-- 4. Chief Complaint -->
                            <td>
                                <div style="max-width: 220px; font-size: 12.5px; color: #475569; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;" title="{{ $complaint }}">
                                    {{ $complaint }}
                                </div>
                            </td>

                            <!-- 5. Status with 1-Click Dropdown -->
                            <td class="text-center" style="white-space: nowrap !important;">
                                <div class="dropdown d-inline-block">
                                    @if($st === 'approved')
                                        <button class="btn btn-sm btn-outline-success rounded-pill px-3 py-1 font-weight-bold dropdown-toggle" type="button" data-toggle="dropdown" style="font-size: 12px;">
                                            <i class="fa fa-check-circle"></i> Approved
                                        </button>
                                    @elseif($st === 'completed')
                                        <button class="btn btn-sm rounded-pill px-3 py-1 font-weight-bold dropdown-toggle" type="button" data-toggle="dropdown" style="font-size: 12px; background: #0284c7; color: #fff;">
                                            <i class="fa fa-check"></i> Completed
                                        </button>
                                    @elseif($st === 'cancelled')
                                        <button class="btn btn-sm btn-outline-danger rounded-pill px-3 py-1 font-weight-bold dropdown-toggle" type="button" data-toggle="dropdown" style="font-size: 12px;">
                                            <i class="fa fa-times-circle"></i> Cancelled
                                        </button>
                                    @else
                                        <button class="btn btn-sm rounded-pill px-3 py-1 font-weight-bold dropdown-toggle" type="button" data-toggle="dropdown" style="font-size: 12px; background: #f59e0b; color: #fff;">
                                            <i class="fa fa-clock-o"></i> Pending
                                        </button>
                                    @endif

                                    <!-- Status Change Menu -->
                                    <div class="dropdown-menu dropdown-menu-right shadow-sm border-0 py-1" style="border-radius: 12px; font-size: 12.5px;">
                                        <h6 class="dropdown-header text-uppercase" style="font-size: 10px; font-weight: 800; color: #94a3b8;">Update Consultation</h6>
                                        
                                        <form action="{{ route('doctor.appointment.status', $apt->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="Approved">
                                            <button type="submit" class="dropdown-item text-success font-weight-bold py-2">
                                                <i class="fa fa-check-circle m-r-5"></i> Mark Approved
                                            </button>
                                        </form>

                                        <form action="{{ route('doctor.appointment.status', $apt->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="Completed">
                                            <button type="submit" class="dropdown-item text-primary font-weight-bold py-2">
                                                <i class="fa fa-check m-r-5"></i> Mark Completed
                                            </button>
                                        </form>

                                        <form action="{{ route('doctor.appointment.status', $apt->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="Pending">
                                            <button type="submit" class="dropdown-item text-warning font-weight-bold py-2">
                                                <i class="fa fa-clock-o m-r-5"></i> Mark Pending
                                            </button>
                                        </form>

                                        <div class="dropdown-divider my-1"></div>

                                        <form action="{{ route('doctor.appointment.status', $apt->id) }}" method="POST" onsubmit="return confirm('Cancel this consultation for {{ $patientName }}?');">
                                            @csrf
                                            <input type="hidden" name="status" value="Cancelled">
                                            <button type="submit" class="dropdown-item text-danger font-weight-bold py-2">
                                                <i class="fa fa-times-circle m-r-5"></i> Cancel Appointment
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>

                            <!-- 6. Prescription Management Column -->
                            <td class="text-center" style="white-space: nowrap !important;">
                                @if($apt->prescription)
                                    @if($apt->prescription->isIssued())
                                        <div class="d-inline-flex flex-column align-items-center gap-1">
                                            <span class="badge badge-success font-weight-bold px-2 py-1 mb-1" style="font-size: 10px; background: #00a896; border-radius: 4px;">
                                                <i class="fa fa-check-circle"></i> Issued
                                            </span>
                                            <a href="{{ route('doctor.prescription.view', $apt->prescription->id) }}" target="_blank" class="btn btn-sm text-white rounded-pill px-3 py-1 font-weight-bold" style="font-size: 11.5px; background: #0284c7; border: none; box-shadow: 0 2px 6px rgba(2,132,199,0.25);" title="View Finalized Prescription">
                                                <i class="fa fa-file-text-o m-r-3"></i> View Prescription
                                            </a>
                                        </div>
                                    @else
                                        <!-- Draft Prescription -->
                                        <div class="d-inline-flex flex-column align-items-center gap-1">
                                            <span class="badge badge-warning text-dark font-weight-bold px-2 py-1 mb-1" style="font-size: 10px; border-radius: 4px;">
                                                <i class="fa fa-pencil"></i> Draft
                                            </span>
                                            <div class="d-flex align-items-center gap-1">
                                                <a href="{{ route('doctor.prescription.edit', $apt->prescription->id) }}" class="btn btn-sm btn-outline-warning rounded-pill px-2 py-1 font-weight-bold" style="font-size: 11px;" title="Continue Editing Draft">
                                                    <i class="fa fa-edit"></i> Edit Draft
                                                </a>
                                                <a href="{{ route('doctor.prescription.view', $apt->prescription->id) }}" target="_blank" class="btn btn-sm btn-outline-secondary rounded-pill px-2 py-1 font-weight-bold" style="font-size: 11px;" title="Preview Draft">
                                                    <i class="fa fa-eye"></i> View
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    {{-- No prescription created yet --}}
                                    @if($st === 'completed')
                                        <!-- ONLY show Add Prescription when appointment status is completed -->
                                        <a href="{{ route('doctor.prescription.create', $apt->id) }}" class="btn btn-sm text-white rounded-pill px-3 py-1 font-weight-bold" style="font-size: 11.5px; background: #69275c; border: none; box-shadow: 0 2px 8px rgba(105,39,92,0.25);" title="Create Clinical Prescription">
                                            <i class="fa fa-plus-circle m-r-4"></i> Add Prescription
                                        </a>
                                    @else
                                        <!-- For pending, approved, cancelled, etc: do not display Add Prescription button -->
                                        <span class="text-muted" style="font-size: 11.5px; font-weight: 500;">
                                            <i class="fa fa-minus text-muted m-r-3"></i> No Prescription
                                        </span>
                                    @endif
                                @endif
                            </td>

                            <!-- 7. Actions -->
                            <td class="text-right" style="white-space: nowrap !important;">
                                <!-- Official Digital OPD Slip Voucher -->
                                <a href="{{ route('doctor.appointment.slip', $apt->id) }}" target="_blank" class="btn btn-sm btn-light border rounded-pill px-3 py-1 font-weight-bold" style="font-size: 12px; color: #69275c;" title="View & Print Official OPD Slip">
                                    <i class="fa fa-file-text-o m-r-4"></i> Slip
                                </a>

                                <!-- Call Patient -->
                                <a href="tel:{{ $apt->phone }}" class="btn btn-sm btn-light border rounded-pill px-2 py-1 ml-1" title="Call Patient">
                                    <i class="fa fa-phone text-success"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div style="font-size: 40px; color: #cbd5e1; margin-bottom: 8px;"><i class="fa fa-calendar-times-o"></i></div>
                                <h5 style="color: #64748b; font-weight: 700;">No Consultations Found</h5>
                                <p style="color: #94a3b8; font-size: 13px;">No patient appointments match the selected filter criteria.</p>
                            </td>
                        </tr>
                    @endforelse

                    <tr id="docNoMatchRow" style="display: none;">
                        <td colspan="7" class="text-center py-5">
                            <div style="font-size: 36px; color: #94a3b8; margin-bottom: 8px;"><i class="fa fa-search"></i></div>
                            <h6 style="color: #475569; font-weight: 700;">No Matching Consultations Found</h6>
                            <p style="color: #94a3b8; font-size: 12.5px;">Try clearing your search query or switching the status filter tab.</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Live Client Filtering Script -->
    @push('scripts')
    <script>
        let currentDocFilter = 'all';

        function setDocStatusFilter(status, element) {
            currentDocFilter = status.toLowerCase();

            document.querySelectorAll('.filter-tab-pill').forEach(btn => {
                btn.classList.remove('active');
            });
            if (element) {
                element.classList.add('active');
            }

            filterDocAppointments();
        }

        function filterDocAppointments() {
            const query = (document.getElementById('docAppointmentSearch').value || '').trim().toLowerCase();
            const rows = document.querySelectorAll('.doc-appointment-row');
            let visible = 0;

            rows.forEach(row => {
                const rowStatus = (row.getAttribute('data-status') || '').toLowerCase();
                const rowSearch = (row.getAttribute('data-search') || '').toLowerCase();

                const matchStatus = (currentDocFilter === 'all') || (rowStatus === currentDocFilter);
                const matchSearch = !query || rowSearch.includes(query);

                if (matchStatus && matchSearch) {
                    row.style.display = '';
                    visible++;
                } else {
                    row.style.display = 'none';
                }
            });

            const badge = document.getElementById('docVisibleCountBadge');
            if (badge) {
                badge.innerText = `Showing ${visible} of ${rows.length}`;
            }

            const noMatch = document.getElementById('docNoMatchRow');
            if (noMatch) {
                noMatch.style.display = (visible === 0 && rows.length > 0) ? '' : 'none';
            }
        }
    </script>
    @endpush

@endsection

