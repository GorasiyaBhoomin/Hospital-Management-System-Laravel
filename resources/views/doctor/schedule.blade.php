@extends('doctor.layout')

@section('title', 'My Schedule & Availability | ' . $doctor->username)

@php
    $activeTab = 'schedule';
@endphp

@push('styles')
<style>
    .schedule-day-card {
        background: #ffffff;
        border: 1.5px solid #e2e8f0;
        border-radius: 14px;
        padding: 18px 22px;
        margin-bottom: 14px;
        transition: all 0.2s ease;
    }

    .schedule-day-card:hover {
        border-color: #00a896;
        box-shadow: 0 4px 14px rgba(0, 168, 150, 0.08);
    }

    .schedule-day-card.day-off-card {
        background: #f8fafc;
        border-color: #cbd5e1;
        opacity: 0.85;
    }

    .day-badge {
        font-size: 15px;
        font-weight: 800;
        color: #0f172a;
        width: 140px;
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
                    <i class="fa fa-calendar"></i>
                </span>
                My Weekly Clinical Schedule & Availability
            </h2>
            <p class="doc-banner-subtitle">
                Set daily morning and evening OPD shift timings, assign routine rest days, and control clinical booking availability.
            </p>
        </div>

        <div class="d-flex align-items-center gap-2">
            @if($doctor->is_available)
                <a href="{{ route('doctor.schedule.toggle_duty') }}" class="btn btn-sm btn-success rounded-pill px-3 font-weight-bold">
                    <i class="fa fa-check-circle m-r-4"></i> Currently ON DUTY
                </a>
            @else
                <a href="{{ route('doctor.schedule.toggle_duty') }}" class="btn btn-sm btn-danger rounded-pill px-3 font-weight-bold">
                    <i class="fa fa-times-circle m-r-4"></i> Currently OFF DUTY
                </a>
            @endif
        </div>
    </div>

    <!-- Schedule Settings & Save Form -->
    <form action="{{ route('doctor.schedule.update') }}" method="POST">
        @csrf

        <!-- Top Configuration Bar (Room & Duty Status) -->
        <div class="doc-card p-4 mb-4">
            <h5 class="doc-card-title mb-3" style="font-size: 15px;">
                <i class="fa fa-sliders text-primary"></i> General Clinic Operations Settings
            </h5>
            <div class="row align-items-center">
                <div class="col-12 col-md-5 mb-3 mb-md-0">
                    <label class="font-weight-bold" style="font-size: 13px; color: #334155;">
                        <i class="fa fa-hospital-o text-muted m-r-4"></i> Assigned Consultation Room
                    </label>
                    <input type="text" name="room_no" class="form-control" value="{{ $doctor->room_no ?: 'OPD Room #102' }}" placeholder="e.g. OPD Room #104" style="border-radius: 10px; font-weight: 600;">
                </div>

                <div class="col-12 col-md-4 mb-3 mb-md-0">
                    <label class="font-weight-bold" style="font-size: 13px; color: #334155;">
                        <i class="fa fa-power-off text-muted m-r-4"></i> Availability Switch
                    </label>
                    <div class="custom-control custom-switch mt-1">
                        <input type="checkbox" class="custom-control-input" id="availSwitch" name="is_available" value="1" {{ $doctor->is_available ? 'checked' : '' }}>
                        <label class="custom-control-label font-weight-bold" for="availSwitch" style="font-size: 13px; color: #0f172a;">
                            Accept Online Appointments
                        </label>
                    </div>
                </div>

                <div class="col-12 col-md-3 text-md-right">
                    <button type="submit" class="btn-doc-primary py-2 px-4 w-100 justify-content-center">
                        <i class="fa fa-save"></i> Save All Changes
                    </button>
                </div>
            </div>
        </div>

        <!-- Weekly Days List -->
        <div class="mb-4">
            <h5 style="font-size: 16px; font-weight: 800; color: #0f172a; margin-bottom: 16px;">
                <i class="fa fa-clock-o text-primary m-r-4"></i> Weekly Shift Timings (Monday to Sunday)
            </h5>

            @foreach($schedules as $sched)
                <div class="schedule-day-card {{ $sched->is_day_off ? 'day-off-card' : '' }}" id="cardDay_{{ $sched->id }}">
                    <div class="row align-items-center">
                        
                        <!-- Day Name & Day-Off Toggle -->
                        <div class="col-12 col-lg-3 mb-3 mb-lg-0 d-flex align-items-center justify-content-between">
                            <div class="day-badge">
                                <i class="fa fa-calendar-check-o text-primary m-r-5"></i> {{ $sched->day_name }}
                            </div>
                            <div class="custom-control custom-checkbox ml-2">
                                <input type="checkbox" class="custom-control-input" id="dayOff_{{ $sched->id }}"
                                       name="days[{{ $sched->id }}][is_day_off]" value="1"
                                       {{ $sched->is_day_off ? 'checked' : '' }}
                                       onchange="toggleDayOffStyle('{{ $sched->id }}', this.checked)">
                                <label class="custom-control-label text-danger font-weight-bold" for="dayOff_{{ $sched->id }}" style="font-size: 12px; cursor: pointer;">
                                    Day Off
                                </label>
                            </div>
                        </div>

                        <!-- Morning Shift -->
                        <div class="col-12 col-sm-6 col-lg-3 mb-2 mb-sm-0">
                            <label style="font-size: 11px; font-weight: 800; color: #64748b; text-transform: uppercase;">
                                <i class="fa fa-sun-o text-warning m-r-4"></i> Morning Shift
                            </label>
                            <div class="d-flex align-items-center gap-1">
                                <input type="text" name="days[{{ $sched->id }}][morning_start]" class="form-control form-control-sm text-center"
                                       placeholder="09:00 AM" value="{{ $sched->morning_start }}" style="border-radius: 6px; font-size: 12px; font-weight: 600;">
                                <span class="text-muted font-weight-bold">&ndash;</span>
                                <input type="text" name="days[{{ $sched->id }}][morning_end]" class="form-control form-control-sm text-center"
                                       placeholder="01:00 PM" value="{{ $sched->morning_end }}" style="border-radius: 6px; font-size: 12px; font-weight: 600;">
                            </div>
                        </div>

                        <!-- Evening Shift -->
                        <div class="col-12 col-sm-6 col-lg-3 mb-2 mb-sm-0">
                            <label style="font-size: 11px; font-weight: 800; color: #64748b; text-transform: uppercase;">
                                <i class="fa fa-moon-o text-info m-r-4"></i> Evening Shift
                            </label>
                            <div class="d-flex align-items-center gap-1">
                                <input type="text" name="days[{{ $sched->id }}][evening_start]" class="form-control form-control-sm text-center"
                                       placeholder="04:00 PM" value="{{ $sched->evening_start }}" style="border-radius: 6px; font-size: 12px; font-weight: 600;">
                                <span class="text-muted font-weight-bold">&ndash;</span>
                                <input type="text" name="days[{{ $sched->id }}][evening_end]" class="form-control form-control-sm text-center"
                                       placeholder="07:30 PM" value="{{ $sched->evening_end }}" style="border-radius: 6px; font-size: 12px; font-weight: 600;">
                            </div>
                        </div>

                        <!-- Notes / Clinical Focus -->
                        <div class="col-12 col-lg-3 mt-2 mt-lg-0">
                            <label style="font-size: 11px; font-weight: 800; color: #64748b; text-transform: uppercase;">
                                <i class="fa fa-pencil text-muted m-r-4"></i> Clinical Notes
                            </label>
                            <input type="text" name="days[{{ $sched->id }}][notes]" class="form-control form-control-sm"
                                   placeholder="e.g. Regular OPD, OT Day" value="{{ $sched->notes }}" style="border-radius: 6px; font-size: 12px;">
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-right mb-5">
            <button type="submit" class="btn-doc-primary py-2 px-5 font-weight-bold" style="font-size: 14px;">
                <i class="fa fa-save"></i> Save All Clinical Schedule Changes
            </button>
        </div>
    </form>

    @push('scripts')
    <script>
        function toggleDayOffStyle(id, isChecked) {
            const card = document.getElementById('cardDay_' + id);
            if (card) {
                if (isChecked) {
                    card.classList.add('day-off-card');
                } else {
                    card.classList.remove('day-off-card');
                }
            }
        }
    </script>
    @endpush

@endsection

