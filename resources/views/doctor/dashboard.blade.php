@extends('doctor.layout')

@section('title', 'Doctor Dashboard | ' . $doctor->username)

@php
    $activeTab = 'dashboard';
@endphp

@push('styles')
<style>
    .doc-hero-banner {
        background: linear-gradient(135deg, #091e3a 0%, #112d4e 60%, #00a896 100%);
        border-radius: 18px;
        padding: 26px 30px;
        color: #ffffff;
        margin-bottom: 26px;
        box-shadow: 0 10px 30px -4px rgba(9, 30, 58, 0.25);
        position: relative;
        overflow: hidden;
    }

    .doc-hero-banner::after {
        content: '';
        position: absolute;
        top: -40px;
        right: -40px;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.06);
        pointer-events: none;
    }

    .hero-badge-tag {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(255, 255, 255, 0.15);
        color: #ffffff;
        padding: 4px 12px;
        border-radius: 50px;
        font-size: 11.5px;
        font-weight: 700;
        margin-bottom: 8px;
        backdrop-filter: blur(4px);
    }

    .queue-table th {
        font-size: 11.5px;
        font-weight: 800;
        text-transform: uppercase;
        color: #64748b;
        background: #f8fafc;
        padding: 12px 16px;
        border: none;
        border-bottom: 1.5px solid #e2e8f0;
        white-space: nowrap;
    }

    .queue-table td {
        padding: 14px 16px;
        vertical-align: middle;
        border-top: none;
        border-bottom: 1px solid #f1f5f9;
        font-size: 13px;
    }

    .slot-mini-item {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 10px 14px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 8px;
        transition: all 0.2s ease;
    }

    .slot-mini-item:hover {
        background: #ffffff;
        border-color: #00a896;
        box-shadow: 0 2px 8px rgba(0, 168, 150, 0.1);
    }
</style>
@endpush

@section('content')

    <!-- 1. Doctor Welcome Hero Banner -->
    <div class="doc-hero-banner">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-7 mb-3 mb-md-0">
                <span class="hero-badge-tag">
                    <i class="fa fa-stethoscope"></i> {{ $doctor->departmentname }} &bull; {{ $doctor->room_no ?: 'OPD Room #102' }}
                </span>
                <h2 style="font-size: 26px; font-weight: 800; margin: 0 0 6px; letter-spacing: -0.3px;">
                    Welcome back, {{ $doctor->username }} 👋
                </h2>
                <p style="font-size: 13.5px; opacity: 0.9; margin: 0; line-height: 1.5;">
                    Central Outpatient Clinic Console. Manage your patient consultations, weekly availability, and custom OPD time slots.
                </p>
            </div>

            <div class="col-lg-4 col-md-5 text-md-right">
                <div class="d-inline-flex flex-column align-items-md-end gap-2">
                    <!-- Duty Status Button -->
                    @if($doctor->is_available)
                        <a href="{{ route('doctor.schedule.toggle_duty') }}" class="btn btn-sm rounded-pill font-weight-bold px-3 shadow-sm" style="background: #10b981; color: #ffffff; border: none; font-size: 12.5px;">
                            <span class="pulse-dot pulse-dot-green m-r-4"></span> On Duty (Accepting Bookings)
                        </a>
                    @else
                        <a href="{{ route('doctor.schedule.toggle_duty') }}" class="btn btn-sm rounded-pill font-weight-bold px-3 shadow-sm" style="background: #ef4444; color: #ffffff; border: none; font-size: 12.5px;">
                            <span class="pulse-dot pulse-dot-red m-r-4"></span> Off Duty (Out of Office)
                        </a>
                    @endif

                    <div style="font-size: 12px; opacity: 0.85; margin-top: 4px;">
                        <i class="fa fa-calendar m-r-4"></i> {{ date('l, d F Y') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. KPI Metric Cards Strip -->
    <div class="row mb-4">
        <!-- 1. Today's Appointments -->
        <div class="col-12 col-sm-6 col-xl-3 mb-3 mb-xl-0">
            <div class="doc-stat-card">
                <div class="doc-stat-icon" style="background: #e0f2fe; color: #0284c7;">
                    <i class="fa fa-calendar-check-o"></i>
                </div>
                <div class="doc-stat-info">
                    <h3>{{ $todayCount }}</h3>
                    <span>Today's Consultations</span>
                </div>
            </div>
        </div>

        <!-- 2. Pending Approvals -->
        <div class="col-12 col-sm-6 col-xl-3 mb-3 mb-xl-0">
            <div class="doc-stat-card">
                <div class="doc-stat-icon" style="background: #fef3c7; color: #d97706;">
                    <i class="fa fa-clock-o"></i>
                </div>
                <div class="doc-stat-info">
                    <h3>{{ $pendingCount }}</h3>
                    <span>Pending Verification</span>
                </div>
            </div>
        </div>

        <!-- 3. Total Patient Care -->
        <div class="col-12 col-sm-6 col-xl-3 mb-3 mb-xl-0">
            <div class="doc-stat-card">
                <div class="doc-stat-icon" style="background: #ecfdf5; color: #059669;">
                    <i class="fa fa-users"></i>
                </div>
                <div class="doc-stat-info">
                    <h3>{{ $uniquePatientsCount }}</h3>
                    <span>Registered Patients</span>
                </div>
            </div>
        </div>

        <!-- 4. Active Time Slots -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="doc-stat-card">
                <div class="doc-stat-icon" style="background: #f3e8ff; color: #9333ea;">
                    <i class="fa fa-hourglass-half"></i>
                </div>
                <div class="doc-stat-info">
                    <h3>{{ count($activeSlots) }}</h3>
                    <span>Active Time Slots</span>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Main Dashboard 2-Column Content Grid -->
    <div class="row">
        <!-- Left Column: Consultations & Queue (8 Cols) -->
        <div class="col-12 col-lg-8">
            
            <!-- Today's Patient Queue -->
            <div class="doc-card">
                <div class="doc-card-header">
                    <div>
                        <h4 class="doc-card-title">
                            <i class="fa fa-user-md text-primary"></i> Today's OPD Consultation Queue
                        </h4>
                        <small class="text-muted">Live patient roster scheduled for today ({{ date('d M Y') }})</small>
                    </div>
                    <a href="{{ route('doctor.appointments') }}" class="btn-doc-light py-1 px-3" style="font-size: 12px;">
                        View All ({{ count($docAppointments) }}) &rarr;
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table queue-table mb-0">
                        <thead>
                            <tr>
                                <th>Token #</th>
                                <th>Patient Name</th>
                                <th>Time Slot</th>
                                <th>Chief Complaint</th>
                                <th>Status</th>
                                <th class="text-right">Quick Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($todayQueue as $apt)
                                @php
                                    $st = strtolower(trim((string)$apt->Status));
                                    $tokenStr = '#KKP-' . str_pad($apt->id, 5, '0', STR_PAD_LEFT);
                                @endphp
                                <tr>
                                    <td>
                                        <strong style="color: #0284c7; font-family: monospace;">{{ $tokenStr }}</strong>
                                    </td>
                                    <td>
                                        <strong style="color: #0f172a; display: block;">{{ $apt->appointmentname }}</strong>
                                        <small class="text-muted"><i class="fa fa-phone"></i> {{ $apt->phone }}</small>
                                    </td>
                                    <td style="white-space: nowrap;">
                                        <span class="badge badge-light border" style="font-weight: 700; color: #0f172a;">
                                            <i class="fa fa-clock-o text-primary"></i> {{ $apt->time }}
                                        </span>
                                    </td>
                                    <td style="max-width: 180px;">
                                        <span class="text-truncate d-block" title="{{ $apt->message }}" style="color: #64748b; font-size: 12.5px;">
                                            {{ $apt->message ?: 'General Consultation' }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($st === 'approved')
                                            <span class="badge badge-pill badge-success" style="font-size: 11px;">Approved</span>
                                        @elseif($st === 'completed')
                                            <span class="badge badge-pill badge-primary" style="font-size: 11px; background: #0284c7;">Completed</span>
                                        @elseif($st === 'cancelled')
                                            <span class="badge badge-pill badge-danger" style="font-size: 11px;">Cancelled</span>
                                        @else
                                            <span class="badge badge-pill badge-warning" style="font-size: 11px; background: #f59e0b; color: #fff;">Pending</span>
                                        @endif
                                    </td>
                                    <td class="text-right" style="white-space: nowrap;">
                                        <form action="{{ route('doctor.appointment.status', $apt->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @if($st !== 'completed')
                                                <input type="hidden" name="status" value="Completed">
                                                <button type="submit" class="btn btn-sm btn-outline-success rounded-pill px-2 py-1 font-weight-bold" style="font-size: 11px;" title="Mark Completed">
                                                    <i class="fa fa-check"></i> Complete
                                                </button>
                                            @else
                                                <span class="text-success font-weight-bold" style="font-size: 11px;"><i class="fa fa-check-circle"></i> Done</span>
                                            @endif
                                        </form>

                                        <!-- Official Digital Slip Link -->
                                        <a href="{{ url('/user/appointment/' . $apt->id . '/slip') }}" target="_blank" class="btn btn-sm btn-light border rounded-pill px-2 py-1 ml-1" style="font-size: 11px;" title="View Slip">
                                            <i class="fa fa-file-text-o text-primary"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        <div style="font-size: 32px; color: #cbd5e1; margin-bottom: 6px;"><i class="fa fa-calendar-check-o"></i></div>
                                        <h6 style="color: #64748b; font-weight: 700; margin: 0;">No Appointments Scheduled for Today</h6>
                                        <small class="text-muted">Upcoming patients scheduled on other dates can be viewed under My Appointments.</small>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Recent Consultation History -->
            <div class="doc-card">
                <div class="doc-card-header">
                    <h4 class="doc-card-title">
                        <i class="fa fa-history text-secondary"></i> Recent Consultations & OPD Records
                    </h4>
                    <span class="badge badge-pill badge-light border text-muted" style="font-size: 11px;">
                        Latest Bookings
                    </span>
                </div>
                <div class="table-responsive">
                    <table class="table queue-table mb-0">
                        <thead>
                            <tr>
                                <th>Token</th>
                                <th>Patient Name</th>
                                <th>Schedule Date</th>
                                <th>Status</th>
                                <th class="text-right">Voucher Slip</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentAppointments as $recent)
                                @php
                                    $st = strtolower(trim((string)$recent->Status));
                                    $dTime = strtotime($recent->date);
                                    $fDate = $dTime ? date('d M Y', $dTime) : $recent->date;
                                @endphp
                                <tr>
                                    <td>
                                        <span style="font-family: monospace; font-weight: 700; color: #0284c7;">#KKP-{{ str_pad($recent->id, 5, '0', STR_PAD_LEFT) }}</span>
                                    </td>
                                    <td>
                                        <strong style="color: #0f172a;">{{ $recent->appointmentname }}</strong>
                                        <small class="text-muted d-block">{{ $recent->email }}</small>
                                    </td>
                                    <td>
                                        <span style="color: #334155; font-weight: 600;"><i class="fa fa-calendar-o text-muted m-r-4"></i> {{ $fDate }}</span>
                                        <small class="text-muted d-block">{{ $recent->time }}</small>
                                    </td>
                                    <td>
                                        @if($st === 'approved' || $st === 'completed')
                                            <span class="badge badge-pill badge-success" style="font-size: 11px;">{{ ucfirst($st) }}</span>
                                        @elseif($st === 'cancelled')
                                            <span class="badge badge-pill badge-danger" style="font-size: 11px;">Cancelled</span>
                                        @else
                                            <span class="badge badge-pill badge-warning" style="font-size: 11px; background: #f59e0b; color: #fff;">Pending</span>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ url('/user/appointment/' . $recent->id . '/slip') }}" target="_blank" class="btn btn-sm btn-light border rounded-pill px-3 py-1 font-weight-bold" style="font-size: 11px;">
                                            <i class="fa fa-external-link text-primary m-r-4"></i> View Slip
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">
                                        No recent consultations recorded.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <!-- Right Column: Doctor Profile & Schedule Widgets (4 Cols) -->
        <div class="col-12 col-lg-4">
            
            <!-- Doctor Mini Bio Card -->
            <div class="doc-card text-center p-4">
                <div style="position: relative; width: 90px; height: 90px; margin: 0 auto 14px;">
                    @if(!empty($doctor->Avatar) && file_exists(public_path($doctor->Avatar)))
                        <img src="{{ asset($doctor->Avatar) }}" alt="{{ $doctor->username }}" style="width: 90px; height: 90px; border-radius: 50%; object-fit: cover; border: 3px solid #ffffff; box-shadow: 0 4px 15px rgba(0, 168, 150, 0.25);">
                    @else
                        <div style="width: 90px; height: 90px; border-radius: 50%; background: linear-gradient(135deg, #00a896, #0284c7); color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 32px; font-weight: 800; margin: 0 auto; box-shadow: 0 4px 15px rgba(0, 168, 150, 0.25);">
                            {{ strtoupper(substr($doctor->username, 0, 1)) }}
                        </div>
                    @endif
                    <span style="position: absolute; bottom: 2px; right: 2px; width: 16px; height: 16px; border-radius: 50%; background: #10b981; border: 2.5px solid #ffffff;"></span>
                </div>

                <h4 style="font-size: 18px; font-weight: 800; color: #0f172a; margin: 0 0 4px;">
                    {{ $doctor->username }}
                </h4>
                <div style="margin-bottom: 12px;">
                    <span class="badge badge-pill badge-primary" style="background: #e0f2fe; color: #0284c7; border: 1px solid #bae6fd; font-size: 12px; font-weight: 700; padding: 4px 12px;">
                        <i class="fa fa-stethoscope m-r-4"></i> {{ $doctor->departmentname }}
                    </span>
                </div>

                <div style="font-size: 12.5px; color: #64748b; line-height: 1.6; text-align: left; background: #f8fafc; padding: 12px 14px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 16px;">
                    <div><strong class="text-dark">Qualification:</strong> {{ $doctor->qualification ?: 'MBBS, MD' }}</div>
                    <div><strong class="text-dark">Experience:</strong> {{ $doctor->experience ?: '8+ Years' }}</div>
                    <div><strong class="text-dark">OPD Room:</strong> {{ $doctor->room_no ?: 'Room #102' }}</div>
                    <div><strong class="text-dark">Consultation Fee:</strong> ₹{{ number_format($doctor->consultation_fee ?: 500, 2) }}</div>
                </div>

                <a href="{{ route('doctor.profile') }}" class="btn-doc-light w-100 justify-content-center py-2">
                    <i class="fa fa-user-circle text-primary"></i> Edit My Profile
                </a>
            </div>

            <!-- Active Time Slots Preview Widget -->
            <div class="doc-card">
                <div class="doc-card-header">
                    <h5 class="doc-card-title" style="font-size: 14.5px;">
                        <i class="fa fa-clock-o text-primary"></i> Active OPD Slots
                    </h5>
                    <a href="{{ route('doctor.time_slots') }}" class="text-primary font-weight-bold" style="font-size: 12px;">
                        Manage &rarr;
                    </a>
                </div>
                <div class="p-3">
                    @forelse($activeSlots->take(4) as $slot)
                        <div class="slot-mini-item d-flex align-items-center justify-content-between p-2 mb-2 rounded-3" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                            <div>
                                <strong style="font-size: 13px; color: #0f172a; display: block;">{{ $slot->slot_display }}</strong>
                                <small class="text-muted"><i class="fa fa-calendar-o"></i> {{ $slot->day_of_week }}</small>
                            </div>
                            <div class="text-right">
                                <span class="badge badge-pill {{ ($slot->remaining_today ?? $slot->max_patients) > 0 ? 'badge-success' : 'badge-danger' }}" style="font-size: 11px; font-weight: 700;">
                                    {{ $slot->remaining_today ?? $slot->max_patients }} Left
                                </span>
                                <small class="d-block text-muted" style="font-size: 10.5px;">{{ $slot->booked_today ?? 0 }} booked / {{ $slot->max_patients }} max</small>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-3 text-muted" style="font-size: 12.5px;">
                            No active slots created yet.
                        </div>
                    @endforelse

                    <a href="{{ route('doctor.time_slots') }}" class="btn-doc-primary w-100 justify-content-center mt-2 py-2">
                        <i class="fa fa-plus"></i> Configure Time Slots
                    </a>
                </div>
            </div>

            <!-- Today's Schedule Hours -->
            @if($todaySchedule)
                <div class="doc-card">
                    <div class="doc-card-header">
                        <h5 class="doc-card-title" style="font-size: 14.5px;">
                            <i class="fa fa-calendar-check-o text-success"></i> Today's Schedule ({{ date('l') }})
                        </h5>
                        <a href="{{ route('doctor.schedule') }}" class="text-primary font-weight-bold" style="font-size: 12px;">
                            Edit &rarr;
                        </a>
                    </div>
                    <div class="p-3" style="font-size: 13px;">
                        @if($todaySchedule->is_day_off)
                            <div class="alert alert-warning py-2 px-3 mb-0" style="font-size: 12.5px; border-radius: 8px;">
                                <i class="fa fa-bell m-r-4"></i> Today is marked as your <strong>Day Off</strong>.
                            </div>
                        @else
                            <div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
                                <span class="text-muted"><i class="fa fa-sun-o text-warning m-r-5"></i> Morning Shift:</span>
                                <strong style="color: #0f172a;">{{ $todaySchedule->morning_start }} - {{ $todaySchedule->morning_end }}</strong>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="text-muted"><i class="fa fa-moon-o text-info m-r-5"></i> Evening Shift:</span>
                                <strong style="color: #0f172a;">{{ $todaySchedule->evening_start }} - {{ $todaySchedule->evening_end }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

        </div>
    </div>

@endsection

