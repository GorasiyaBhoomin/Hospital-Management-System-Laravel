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
            <div class="site-card h-100">
                <div class="site-card-header">
                    <h3 class="site-card-title">
                        <span class="card-icon" style="background: #e0f2fe; color: #0284c7;">
                            <i class="fa fa-calendar-check-o"></i>
                        </span>
                        Recent OPD Consultations
                    </h3>
                    <a href="{{ url('/user/appointment-history') }}" style="font-size: 13px; font-weight: 700; color: #69275c; text-decoration: none;">
                        View All ({{ $totalAppointments }}) &rarr;
                    </a>
                </div>

                <div class="p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" style="font-size: 13.5px;">
                            <thead style="background: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                                <tr>
                                    <th style="padding: 14px 20px; font-weight: 800; color: #0f172a;">Doctor / Speciality</th>
                                    <th style="padding: 14px 20px; font-weight: 800; color: #0f172a;">Date & Time</th>
                                    <th style="padding: 14px 20px; font-weight: 800; color: #0f172a;">Status</th>
                                    <th style="padding: 14px 20px; font-weight: 800; color: #0f172a; text-align: right;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($recentAppointments as $apt)
                                    <tr>
                                        <td style="padding: 16px 20px; vertical-align: middle;">
                                            <strong style="color: #0f172a; display: block; font-size: 14px;">{{ $apt->doctor ?: 'Senior Specialist' }}</strong>
                                            <span style="font-size: 12px; color: #64748b;">
                                                <i class="fa fa-stethoscope text-primary"></i> {{ $apt->department }}
                                            </span>
                                        </td>
                                        <td style="padding: 16px 20px; vertical-align: middle;">
                                            <strong style="color: #334155; display: block;">{{ $apt->date }}</strong>
                                            <span style="font-size: 12px; color: #64748b;"><i class="fa fa-clock-o text-muted"></i> {{ $apt->time }}</span>
                                        </td>
                                        <td style="padding: 16px 20px; vertical-align: middle;">
                                            @php
                                                $st = strtolower($apt->status ?? 'pending');
                                            @endphp
                                            @if($st == 'approved')
                                                <span class="badge badge-pill" style="background: #ecfdf5; color: #059669; border: 1px solid #a7f3d0; padding: 5px 12px; font-size: 12px; font-weight: 700;">
                                                    <i class="fa fa-check-circle"></i> Confirmed
                                                </span>
                                            @elseif($st == 'cancelled')
                                                <span class="badge badge-pill" style="background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; padding: 5px 12px; font-size: 12px; font-weight: 700;">
                                                    <i class="fa fa-times-circle"></i> Cancelled
                                                </span>
                                            @elseif($st == 'completed')
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
                                            <a href="{{ url('/user/appointment-history') }}" class="btn btn-sm btn-light rounded-pill px-3" style="font-weight: 700; color: #69275c; border: 1px solid #e2e8f0; font-size: 12.5px;">
                                                Details
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-5">
                                            <div style="font-size: 34px; color: #cbd5e1; margin-bottom: 8px;"><i class="fa fa-calendar-o"></i></div>
                                            <h5 style="color: #64748b; font-weight: 700; font-size: 15px;">No appointments yet</h5>
                                            <p style="color: #94a3b8; font-size: 13px; margin-bottom: 12px;">Schedule your first consultation with our hospital specialists.</p>
                                            <a href="{{ url('/user/book-appointment') }}" class="btn btn-primary rounded-pill px-4" style="background: linear-gradient(135deg, #69275c, #8b1d6b); border: none; font-size: 13px;">
                                                <i class="fa fa-calendar-plus-o"></i> Book OPD Consultation
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
