@extends('user.user_layout')

@section('title', 'Patient Dashboard | KK Patel Super Speciality Hospital')
@section('page_title', 'Dashboard')
@section('hero_title', 'Welcome, ' . (Auth::user()->name ?? 'Patient'))
@section('hero_subtitle', 'Here is your overall patient health overview, upcoming consultations, and clinical records.')

@php
    $activePortalTab = 'dashboard';
@endphp

@push('styles')
<style>
    .stat-metric-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: var(--radius-lg);
        padding: 22px 24px;
        box-shadow: var(--shadow-card);
        display: flex;
        align-items: center;
        gap: 18px;
        transition: all 0.25s ease;
        height: 100%;
    }
    .stat-metric-card:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-hover);
        border-color: #cbd5e1;
    }
    .stat-metric-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        flex-shrink: 0;
    }
    .stat-metric-info h3 {
        font-size: 26px;
        font-weight: 800;
        color: #0f172a;
        margin: 0 0 2px;
        line-height: 1;
    }
    .stat-metric-info span {
        font-size: 13px;
        font-weight: 600;
        color: #64748b;
    }

    .quick-action-pill-card {
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 14px;
        padding: 18px;
        display: flex;
        align-items: center;
        gap: 14px;
        text-decoration: none !important;
        transition: all 0.25s ease;
        height: 100%;
    }
    .quick-action-pill-card:hover {
        background: #ffffff;
        border-color: #69275c;
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(105, 39, 92, 0.12);
    }
    .quick-action-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        color: #ffffff;
        flex-shrink: 0;
    }
    .quick-action-text h5 {
        font-size: 15px;
        font-weight: 800;
        color: #0f172a;
        margin: 0 0 2px;
    }
    .quick-action-text span {
        font-size: 12px;
        color: #64748b;
    }
    .btn-slip-pill {
        background: #fbf5fa;
        color: #69275c !important;
        border: 1.5px solid #e9d5e5;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 700;
        padding: 6px 12px;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s ease;
        line-height: 1;
        white-space: nowrap;
    }
    .btn-slip-pill:hover {
        background: #69275c;
        color: #ffffff !important;
        border-color: #69275c;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(105, 39, 92, 0.25);
    }
    .btn-rx-pill {
        background: #ecfdf5;
        color: #059669 !important;
        border: 1.5px solid #a7f3d0;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 700;
        padding: 6px 12px;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s ease;
        line-height: 1;
        white-space: nowrap;
    }
    .btn-rx-pill:hover {
        background: #059669;
        color: #ffffff !important;
        border-color: #059669;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(5, 150, 105, 0.25);
    }
    .recent-opd-table tbody tr:hover {
        background-color: #fbf9fa !important;
    }
</style>
@endpush

@section('content')

    <!-- 1. Patient Key Metrics Row -->
    <div class="row mb-4">
        <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">
            <div class="stat-metric-card">
                <div class="stat-metric-icon" style="background: #e0f2fe; color: #0284c7;">
                    <i class="fa fa-calendar-check-o"></i>
                </div>
                <div class="stat-metric-info">
                    <h3>{{ $upcomingAppointments }}</h3>
                    <span>Upcoming Visits</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">
            <div class="stat-metric-card">
                <div class="stat-metric-icon" style="background: #ecfdf5; color: #10b981;">
                    <i class="fa fa-check-circle-o"></i>
                </div>
                <div class="stat-metric-info">
                    <h3>{{ $completedAppointments }}</h3>
                    <span>Completed Visits</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">
            <div class="stat-metric-card">
                <div class="stat-metric-icon" style="background: #fbf5fa; color: #69275c;">
                    <i class="fa fa-stethoscope"></i>
                </div>
                <div class="stat-metric-info">
                    <h3>{{ $totalAppointments }}</h3>
                    <span>Total Consultations</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3">
            <div class="stat-metric-card">
                <div class="stat-metric-icon" style="background: #fef3c7; color: #d97706;">
                    <i class="fa fa-shield"></i>
                </div>
                <div class="stat-metric-info">
                    <h3 style="font-size: 20px; color: #10b981;">Active</h3>
                    <span>Patient Profile</span>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. Quick Patient Actions Launchpad -->
    <div class="site-card mb-4">
        <div class="site-card-header">
            <h3 class="site-card-title">
                <span class="card-icon" style="background: #fbf5fa; color: #69275c;">
                    <i class="fa fa-bolt"></i>
                </span>
                Quick Actions
            </h3>
            <span class="text-muted" style="font-size: 13px;">Instant access to clinical services</span>
        </div>
        <div class="site-card-body">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3 mb-3 mb-md-0">
                    <a href="{{ url('/user/book-appointment') }}" class="quick-action-pill-card">
                        <div class="quick-action-icon" style="background: linear-gradient(135deg, #69275c, #8b1d6b);">
                            <i class="fa fa-calendar-plus-o"></i>
                        </div>
                        <div class="quick-action-text">
                            <h5>Book OPD</h5>
                            <span>Schedule doctor visit</span>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-sm-6 col-md-3 mb-3 mb-md-0">
                    <a href="{{ url('/user/appointment-history') }}" class="quick-action-pill-card">
                        <div class="quick-action-icon" style="background: linear-gradient(135deg, #0284c7, #0369a1);">
                            <i class="fa fa-history"></i>
                        </div>
                        <div class="quick-action-text">
                            <h5>My Bookings</h5>
                            <span>View & print slips</span>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-sm-6 col-md-3 mb-3 mb-sm-0">
                    <a href="{{ url('/user/doctors') }}" class="quick-action-pill-card">
                        <div class="quick-action-icon" style="background: linear-gradient(135deg, #00a896, #059669);">
                            <i class="fa fa-user-md"></i>
                        </div>
                        <div class="quick-action-text">
                            <h5>Specialists</h5>
                            <span>Find clinical leads</span>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <a href="{{ url('/user/profile') }}" class="quick-action-pill-card">
                        <div class="quick-action-icon" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                            <i class="fa fa-id-card-o"></i>
                        </div>
                        <div class="quick-action-text">
                            <h5>My Profile</h5>
                            <span>Update contact info</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Recent Consultations & Emergency Notice Row -->
    <div class="row">
        <!-- Recent Consultations Table -->
        <div class="col-12 col-lg-8 mb-4 mb-lg-0">
            <div class="site-card h-100" style="border: 1px solid #e2e8f0; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 16px rgba(15, 23, 42, 0.05); background: #ffffff;">
                <div class="site-card-header d-flex align-items-center justify-content-between flex-wrap" style="padding: 18px 22px; border-bottom: 1.5px solid #f1f5f9; background: #ffffff;">
                    <div class="d-flex align-items-center" style="gap: 12px;">
                        <div style="width: 40px; height: 40px; border-radius: 12px; background: linear-gradient(135deg, #fbf5fa, #f5e8f2); color: #69275c; display: flex; align-items: center; justify-content: center; font-size: 18px; border: 1px solid #ebd9e8;">
                            <i class="fa fa-calendar-check-o"></i>
                        </div>
                        <div>
                            <h3 class="site-card-title" style="margin: 0; font-size: 16px; font-weight: 800; color: #0f172a; line-height: 1.2;">Recent OPD Consultations</h3>
                            <span style="font-size: 12px; color: #64748b;">Your latest clinical appointments and medical records</span>
                        </div>
                    </div>
                    <a href="{{ url('/user/appointment-history') }}" class="btn btn-sm" style="font-size: 12px; font-weight: 700; color: #69275c; background: #fbf5fa; border: 1px solid #ebd9e8; border-radius: 8px; padding: 6px 14px; text-decoration: none; transition: all 0.2s ease;">
                        View All ({{ $totalAppointments }}) &rarr;
                    </a>
                </div>

                <div class="p-0">
                    <div class="table-responsive" style="overflow-x: auto;">
                        <table class="table recent-opd-table table-hover align-middle mb-0" style="min-width: 620px; font-size: 13.5px; width: 100%;">
                            <thead style="background: #f8fafc; border-bottom: 1.5px solid #e2e8f0;">
                                <tr>
                                    <th style="padding: 13px 20px; font-size: 11.5px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: #475569; border-top: none; white-space: nowrap;">Doctor & Speciality</th>
                                    <th style="padding: 13px 18px; font-size: 11.5px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: #475569; border-top: none; white-space: nowrap;">Date & Time Slot</th>
                                    <th style="padding: 13px 16px; font-size: 11.5px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: #475569; border-top: none; text-align: center; white-space: nowrap;">Status</th>
                                    <th style="padding: 13px 20px; font-size: 11.5px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: #475569; border-top: none; text-align: right; white-space: nowrap;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($recentAppointments as $apt)
                                    @php
                                        $doctorName = $apt->username ?: ($apt->doctor ?: 'Dr. Attending Specialist');
                                        $deptName = $apt->departmentname ?: ($apt->department ?: 'General Medicine');
                                        $st = strtolower($apt->Status ?? ($apt->status ?? 'pending'));
                                        $tokenRef = '#KKP-' . str_pad($apt->id, 5, '0', STR_PAD_LEFT);
                                        $hasIssuedRx = ($apt->prescription && method_exists($apt->prescription, 'isIssued') && $apt->prescription->isIssued()) || ($apt->prescription && strtolower($apt->prescription->status ?? '') === 'issued');
                                    @endphp
                                    <tr style="border-bottom: 1px solid #f1f5f9;">
                                        <!-- Doctor & Speciality -->
                                        <td style="padding: 15px 20px; vertical-align: middle;">
                                            <div class="d-flex align-items-center" style="gap: 12px;">
                                                <div style="width: 40px; height: 40px; border-radius: 12px; background: linear-gradient(135deg, #fbf5fa, #f3e8f2); color: #69275c; display: flex; align-items: center; justify-content: center; font-size: 17px; flex-shrink: 0; border: 1.5px solid #ebd9e8;">
                                                    <i class="fa fa-user-md"></i>
                                                </div>
                                                <div style="min-width: 0;">
                                                    <strong style="color: #0f172a; display: block; font-size: 14px; font-weight: 800; line-height: 1.25;">{{ $doctorName }}</strong>
                                                    <div class="d-flex align-items-center gap-2 mt-1" style="font-size: 12px;">
                                                        <span style="color: #69275c; font-weight: 600;">
                                                            <i class="fa fa-stethoscope text-primary"></i> {{ $deptName }}
                                                        </span>
                                                        <span style="color: #cbd5e1;">&bull;</span>
                                                        <span class="badge" style="background: #f1f5f9; color: #475569; font-size: 11px; font-weight: 700; padding: 2px 7px; border: 1px solid #e2e8f0; border-radius: 5px;">{{ $tokenRef }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Date & Time Slot (Never wraps) -->
                                        <td style="padding: 15px 18px; vertical-align: middle; white-space: nowrap;">
                                            <div style="font-weight: 700; color: #1e293b; font-size: 13.5px; line-height: 1.2;">
                                                <i class="fa fa-calendar-check-o" style="color: #69275c; margin-right: 5px;"></i> {{ \Carbon\Carbon::parse($apt->date)->format('D, d M Y') }}
                                            </div>
                                            <div style="font-size: 12px; color: #64748b; font-weight: 500; margin-top: 4px;">
                                                <i class="fa fa-clock-o text-muted" style="margin-right: 4px;"></i> {{ $apt->time }}
                                            </div>
                                        </td>

                                        <!-- Status Badge -->
                                        <td style="padding: 15px 16px; vertical-align: middle; text-align: center; white-space: nowrap;">
                                            @if($st == 'approved' || $st == 'confirmed')
                                                <span class="badge badge-pill" style="background: #eff6ff; color: #2563eb; border: 1px solid #bfdbfe; padding: 6px 14px; font-size: 11.5px; font-weight: 700; letter-spacing: 0.2px;">
                                                    <i class="fa fa-check mr-1"></i> Approved
                                                </span>
                                            @elseif($st == 'completed')
                                                <span class="badge badge-pill" style="background: #ecfdf5; color: #059669; border: 1px solid #a7f3d0; padding: 6px 14px; font-size: 11.5px; font-weight: 700; letter-spacing: 0.2px;">
                                                    <i class="fa fa-check-circle mr-1"></i> Completed
                                                </span>
                                            @elseif($st == 'cancelled')
                                                <span class="badge badge-pill" style="background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; padding: 6px 14px; font-size: 11.5px; font-weight: 700; letter-spacing: 0.2px;">
                                                    <i class="fa fa-times-circle mr-1"></i> Cancelled
                                                </span>
                                            @elseif($st == 'rejected')
                                                <span class="badge badge-pill" style="background: #fff1f2; color: #e11d48; border: 1px solid #fecdd3; padding: 6px 14px; font-size: 11.5px; font-weight: 700; letter-spacing: 0.2px;">
                                                    <i class="fa fa-ban mr-1"></i> Rejected
                                                </span>
                                            @else
                                                <span class="badge badge-pill" style="background: #fffbeb; color: #d97706; border: 1px solid #fde68a; padding: 6px 14px; font-size: 11.5px; font-weight: 700; letter-spacing: 0.2px;">
                                                    <i class="fa fa-clock-o mr-1"></i> Pending
                                                </span>
                                            @endif
                                        </td>

                                        <!-- Action Buttons -->
                                        <td style="padding: 15px 20px; vertical-align: middle; text-align: right; white-space: nowrap;">
                                            <div class="d-inline-flex align-items-center justify-content-end" style="gap: 8px;">
                                                <!-- View Official OPD Slip -->
                                                <a href="{{ url('/user/appointment/' . $apt->id . '/slip') }}" class="btn-slip-pill" title="View Official Digital OPD Voucher Slip">
                                                    <i class="fa fa-file-text-o"></i> View Slip
                                                </a>

                                                <!-- View Prescription if issued -->
                                                @if($hasIssuedRx)
                                                    <a href="{{ url('/user/prescription/' . $apt->prescription->id) }}" target="_blank" class="btn-rx-pill" title="View Official Medical Prescription">
                                                        <i class="fa fa-stethoscope"></i> View Rx
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-5">
                                            <div style="font-size: 38px; color: #cbd5e1; margin-bottom: 10px;"><i class="fa fa-calendar-o"></i></div>
                                            <h5 style="color: #475569; font-weight: 700; font-size: 15px; margin-bottom: 4px;">No appointments yet</h5>
                                            <p style="color: #94a3b8; font-size: 13px; margin-bottom: 14px;">Schedule your first consultation with our hospital specialists.</p>
                                            <a href="{{ url('/user/book-appointment') }}" class="btn btn-primary rounded-pill px-4" style="background: linear-gradient(135deg, #69275c, #8b1d6b); border: none; font-size: 13px; font-weight: 700; box-shadow: 0 4px 12px rgba(105, 39, 92, 0.25);">
                                                <i class="fa fa-calendar-plus-o mr-1"></i> Book OPD Consultation
                                            </a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Emergency & Support Info Side Card -->
        <div class="col-12 col-lg-4">
            <!-- 24/7 Emergency Assistance -->
            <div class="site-card mb-4" style="border-top: 4px solid #ef4444;">
                <div class="site-card-body">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div style="width: 44px; height: 44px; border-radius: 12px; background: #fee2e2; color: #dc2626; display: flex; align-items: center; justify-content: center; font-size: 20px;">
                            <i class="fa fa-ambulance"></i>
                        </div>
                        <div>
                            <h4 style="font-size: 16px; font-weight: 800; color: #0f172a; margin: 0 0 2px;">24/7 Emergency Trauma</h4>
                            <span style="font-size: 12px; color: #64748b;">Round-the-clock critical response</span>
                        </div>
                    </div>
                    <p style="font-size: 13px; color: #64748b; line-height: 1.5; margin-bottom: 16px;">
                        In case of acute cardiac distress, stroke symptoms, or severe trauma, call our emergency helpline immediately.
                    </p>
                    <a href="tel:02832236000" class="btn btn-danger btn-block rounded-pill py-2 font-weight-bold" style="font-size: 13.5px; box-shadow: 0 4px 14px rgba(220, 38, 38, 0.25);">
                        <i class="fa fa-phone"></i> 02832 236000
                    </a>
                </div>
            </div>

            <!-- PMJAY & Cashless Insurance Info -->
            <div class="site-card" style="border-top: 4px solid #10b981;">
                <div class="site-card-body">
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <div style="width: 40px; height: 40px; border-radius: 10px; background: #ecfdf5; color: #059669; display: flex; align-items: center; justify-content: center; font-size: 18px;">
                            <i class="fa fa-shield"></i>
                        </div>
                        <div>
                            <h4 style="font-size: 15.5px; font-weight: 800; color: #0f172a; margin: 0;">PMJAY & TPA Cashless</h4>
                            <span style="font-size: 12px; color: #10b981; font-weight: 700;">100% Empanelled</span>
                        </div>
                    </div>
                    <p style="font-size: 12.5px; color: #64748b; line-height: 1.5; margin-top: 10px; margin-bottom: 0;">
                        Bring your Ayushman Bharat Golden Card or private insurance policy during your consultation for swift cashless processing.
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
