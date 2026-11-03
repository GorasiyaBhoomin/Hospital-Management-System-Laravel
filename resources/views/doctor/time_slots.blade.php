@extends('doctor.layout')

@section('title', 'Manage Time Slots | ' . $doctor->username)

@php
    $activeTab = 'time_slots';
@endphp

@push('styles')
<style>
    .slot-card-item {
        background: #ffffff;
        border: 1.5px solid #e2e8f0;
        border-radius: 14px;
        padding: 18px 20px;
        transition: all 0.25s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
        overflow: hidden;
    }

    .slot-card-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 22px rgba(0, 168, 150, 0.12);
        border-color: #00a896;
    }

    .slot-card-active {
        border-left: 4px solid #00a896;
    }

    .slot-card-inactive {
        border-left: 4px solid #cbd5e1;
        opacity: 0.75;
        background: #fafafa;
    }

    .slot-time-title {
        font-size: 17px;
        font-weight: 800;
        color: #0f172a;
        margin: 0 0 4px;
        letter-spacing: -0.2px;
    }

    .slot-day-pill {
        background: #e0f2fe;
        color: #0284c7;
        font-size: 11px;
        font-weight: 700;
        padding: 3px 10px;
        border-radius: 50px;
        display: inline-block;
        margin-bottom: 8px;
    }

    .slot-meta-info {
        font-size: 12px;
        color: #64748b;
        margin-bottom: 14px;
    }
</style>
@endpush

@section('content')

    <!-- Page Banner -->
    <div class="doc-page-banner">
        <div>
            <h2 class="doc-banner-title">
                <span class="doc-banner-icon">
                    <i class="fa fa-clock-o"></i>
                </span>
                Manage OPD Consultation Time Slots
            </h2>
            <p class="doc-banner-subtitle">
                Configure patient consultation windows, limit maximum patient capacities per slot, and activate/deactivate time availability.
            </p>
        </div>

        <div>
            <button type="button" class="btn-doc-primary" data-toggle="modal" data-target="#createSlotModal">
                <i class="fa fa-plus-circle"></i> Create New Time Slot
            </button>
        </div>
    </div>

    <!-- Live Date Occupancy Filter Bar -->
    <div class="doc-card mb-4" style="background: #ffffff; border-radius: 14px; border: 1px solid #e2e8f0; padding: 16px 20px;">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
                <h5 style="font-size: 15px; font-weight: 800; color: #0f172a; margin: 0 0 4px;">
                    <i class="fa fa-calendar-check-o text-primary"></i> Live Slot Availability on:
                    <span class="text-primary">{{ date('l, d F Y', strtotime($selectedDate)) }}</span>
                    @if($selectedDate === date('Y-m-d'))
                        <span class="badge badge-success ml-2" style="font-size: 11px; vertical-align: middle;">TODAY</span>
                    @endif
                </h5>
                <small class="text-muted">
                    Slot remaining capacity decreases in real-time as patients book appointments for this date.
                </small>
            </div>

            <form action="{{ route('doctor.time_slots') }}" method="GET" class="d-flex align-items-center gap-2 flex-wrap mb-0">
                <div class="d-flex align-items-center gap-2">
                    <label class="mb-0 font-weight-bold" style="font-size: 12px; color: #475569;">Select Date:</label>
                    <input type="date" name="date" value="{{ $selectedDate }}" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+60 days')) }}" class="form-control form-control-sm" style="height: 38px; width: 165px; border-radius: 10px; font-size: 13px;" onchange="this.form.submit()">
                </div>
                <button type="submit" class="btn btn-sm btn-doc-primary" style="height: 38px; border-radius: 10px; padding: 0 16px;">
                    <i class="fa fa-refresh"></i> Check Date
                </button>
                @if($selectedDate !== date('Y-m-d'))
                    <a href="{{ route('doctor.time_slots', ['date' => date('Y-m-d')]) }}" class="btn btn-sm btn-light border rounded-pill px-3" style="height: 38px; line-height: 26px; font-size: 12px; font-weight: 600;">
                        <i class="fa fa-calendar-check-o text-success mr-1"></i> Today
                    </a>
                @endif
                @php
                    $tomorrow = date('Y-m-d', strtotime('+1 day'));
                @endphp
                @if($selectedDate !== $tomorrow)
                    <a href="{{ route('doctor.time_slots', ['date' => $tomorrow]) }}" class="btn btn-sm btn-light border rounded-pill px-3" style="height: 38px; line-height: 26px; font-size: 12px; font-weight: 600;">
                        Tomorrow ({{ date('D', strtotime($tomorrow)) }})
                    </a>
                @endif
                @if(!empty($upcomingDates))
                    @foreach($upcomingDates as $uDate)
                        @if($uDate !== $selectedDate && $uDate !== date('Y-m-d') && $uDate !== $tomorrow)
                            <a href="{{ route('doctor.time_slots', ['date' => $uDate]) }}" class="btn btn-sm btn-light border rounded-pill px-3" style="height: 38px; line-height: 26px; font-size: 12px; font-weight: 600;" title="View bookings on this date">
                                <i class="fa fa-calendar-o text-primary mr-1"></i> {{ date('d M (D)', strtotime($uDate)) }}
                            </a>
                        @endif
                    @endforeach
                @endif
            </form>
        </div>
    </div>

    <!-- Active Time Slots Grid Header -->
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 style="font-size: 16px; font-weight: 800; color: #0f172a; margin: 0;">
            <i class="fa fa-list-alt text-primary m-r-5"></i> Configured Time Slots ({{ count($timeSlots) }})
        </h4>
        <div style="font-size: 12px; color: #64748b;">
            <span class="badge badge-success badge-pill m-r-5">{{ $timeSlots->where('is_active', 1)->count() }} Active</span>
            <span class="badge badge-light border badge-pill">{{ $timeSlots->where('is_active', 0)->count() }} Inactive</span>
        </div>
    </div>

    <!-- Time Slots Grid Cards -->
    <div class="row mb-4">
        @forelse($timeSlots as $slot)
            <div class="col-12 col-md-6 col-xl-4 mb-3">
                <div class="slot-card-item {{ $slot->is_active ? 'slot-card-active' : 'slot-card-inactive' }}">
                    <div>
                        <!-- Day Pill & Status -->
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="slot-day-pill">
                                <i class="fa fa-calendar-o m-r-4"></i> {{ $slot->day_of_week }}
                            </span>
                            <div>
                                @if(!empty($slot->is_past))
                                    <span class="badge badge-pill badge-secondary" style="font-size: 10px; font-weight: 700; background: #94a3b8; color: #fff;">
                                        <i class="fa fa-history"></i> Time Passed
                                    </span>
                                @elseif($slot->is_active)
                                    <span class="badge badge-pill badge-success" style="font-size: 10.5px; font-weight: 700;">
                                        <i class="fa fa-check-circle"></i> Active
                                    </span>
                                @else
                                    <span class="badge badge-pill badge-secondary" style="font-size: 10.5px; font-weight: 700;">
                                        Inactive
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Time Title -->
                        <h4 class="slot-time-title mb-2">
                            <i class="fa fa-clock-o text-primary m-r-4"></i> {{ $slot->slot_display }}
                        </h4>

                        <!-- Live Remaining & Capacity Tracker -->
                        <div class="p-3 rounded-3 mb-2" style="background: {{ !empty($slot->is_past) ? '#f1f5f9' : '#f8fafc' }}; border: 1px solid #e2e8f0;">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <div>
                                    <span class="text-muted" style="font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; display: block;">Available Tokens</span>
                                    @if(!empty($slot->is_past))
                                        <div style="font-size: 15px; font-weight: 800; color: #64748b; line-height: 1.2;">
                                            Session Ended
                                            <small class="text-muted d-block" style="font-size: 11px; font-weight: 500;">(Slot time has passed)</small>
                                        </div>
                                    @else
                                        <div style="font-size: 18px; font-weight: 800; color: {{ $slot->remaining_for_date > 0 ? '#059669' : '#dc2626' }}; line-height: 1.2;">
                                            {{ $slot->remaining_for_date }} Left
                                            <small class="text-muted" style="font-size: 12px; font-weight: 500;">/ {{ $slot->max_patients }} Max</small>
                                        </div>
                                    @endif
                                </div>
                                <div class="text-right">
                                    <span class="badge {{ $slot->booked_for_date > 0 ? 'badge-primary' : 'badge-light border text-muted' }}" style="font-size: 12px; font-weight: 700; padding: 6px 12px; border-radius: 999px;">
                                        <i class="fa fa-users"></i> {{ $slot->booked_for_date }} Booked
                                    </span>
                                </div>
                            </div>

                            <!-- Decreasing Occupancy Bar -->
                            <div class="progress mt-2" style="height: 6px; border-radius: 999px; background: #e2e8f0; overflow: hidden;">
                                <div class="progress-bar {{ !empty($slot->is_past) ? 'bg-secondary' : ($slot->occupancy_percent >= 100 ? 'bg-danger' : ($slot->occupancy_percent > 60 ? 'bg-warning' : 'bg-success')) }}"
                                     role="progressbar" style="width: {{ $slot->occupancy_percent }}%; transition: width 0.4s ease;"
                                     aria-valuenow="{{ $slot->occupancy_percent }}" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-2 pt-2 border-top" style="font-size: 11px; color: #64748b;">
                                <span><i class="fa fa-calendar-check-o text-primary"></i> {{ date('d M Y (D)', strtotime($selectedDate)) }}</span>
                                @if($slot->booked_for_date > 0)
                                    <a href="{{ route('doctor.appointments') }}?search={{ urlencode($slot->slot_display) }}" class="text-primary font-weight-bold" style="text-decoration: underline;" title="View booked appointments for this slot">
                                        View {{ $slot->booked_for_date }} Patient(s) &rarr;
                                    </a>
                                @elseif(!empty($slot->is_past))
                                    <span class="text-muted"><i class="fa fa-lock"></i> Booking Closed</span>
                                @else
                                    <span class="text-success"><i class="fa fa-check-circle"></i> Capacity Open</span>
                                @endif
                            </div>
                        </div>

                        <!-- Meta Info -->
                        <div class="slot-meta-info" style="font-size: 12px; color: #64748b;">
                            <div><i class="fa fa-hospital-o text-muted m-r-4"></i> OPD Room: <strong>{{ $doctor->room_no ?: 'Room #102' }}</strong></div>
                            <div><i class="fa fa-calendar text-muted m-r-4"></i> Total Future Bookings: <strong>{{ $slot->total_active_bookings }}</strong></div>
                        </div>
                    </div>

                    <!-- Slot Action Buttons (CRUD) -->
                    <div class="pt-3 border-top d-flex align-items-center justify-content-between">
                        <!-- Toggle Active/Inactive -->
                        <a href="{{ route('doctor.time_slots.toggle', $slot->id) }}" class="btn btn-sm {{ $slot->is_active ? 'btn-outline-warning' : 'btn-outline-success' }} rounded-pill px-3 font-weight-bold" style="font-size: 11.5px;">
                            @if($slot->is_active)
                                <i class="fa fa-pause m-r-4"></i> Deactivate
                            @else
                                <i class="fa fa-play m-r-4"></i> Activate
                            @endif
                        </a>

                        <div class="d-flex align-items-center gap-1">
                            <!-- Edit Slot Button -->
                            <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 font-weight-bold" style="font-size: 11.5px;"
                                    onclick="openEditSlotModal('{{ $slot->id }}', '{{ $slot->day_of_week }}', '{{ $slot->start_time }}', '{{ $slot->end_time }}', '{{ $slot->max_patients }}', '{{ $slot->is_active }}')">
                                <i class="fa fa-pencil text-primary"></i> Edit
                            </button>

                            <!-- Delete Slot Button -->
                            <a href="{{ route('doctor.time_slots.delete', $slot->id) }}" class="btn btn-sm btn-light border rounded-pill px-2 text-danger" style="font-size: 11.5px;"
                               onclick="return confirm('Are you sure you want to delete the time slot {{ $slot->slot_display }}?');" title="Delete Slot">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <div style="font-size: 42px; color: #cbd5e1; margin-bottom: 12px;"><i class="fa fa-clock-o"></i></div>
                <h5 style="color: #64748b; font-weight: 700;">No Consultation Time Slots Found</h5>
                <p style="color: #94a3b8; font-size: 13px;">Create your first OPD time slot to allow patients to book appointments with you.</p>
                <button type="button" class="btn-doc-primary mt-2" data-toggle="modal" data-target="#createSlotModal">
                    <i class="fa fa-plus-circle"></i> Create First Slot
                </button>
            </div>
        @endforelse
    </div>

    <!-- ===================================================================
         MODAL 1: CREATE NEW TIME SLOT (FORM)
         =================================================================== -->
    <div class="modal fade" id="createSlotModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 520px;">
            <div class="modal-content rounded-4 border-0 shadow-lg overflow-hidden">
                <div class="modal-header py-3 px-4 bg-light border-bottom d-flex align-items-center justify-content-between">
                    <h5 class="modal-title font-weight-bold" style="font-size: 16px; color: #0f172a;">
                        <i class="fa fa-clock-o text-primary m-r-5"></i> Add New Consultation Slot
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 22px; line-height: 1; outline: none;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('doctor.time_slots.store') }}" method="POST">
                    @csrf
                    <div class="modal-body p-4">
                        <!-- Day of Week -->
                        <div class="form-group mb-3">
                            <label class="font-weight-bold" style="font-size: 13px; color: #334155;">
                                Applicable Day <span class="text-danger">*</span>
                            </label>
                            <select name="day_of_week" class="form-control"  style="border-radius: 10px; font-weight: 600;">
                                <option value="All Days" selected>All Days (Mon - Sat)</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </select>
                        </div>

                        <!-- Start and End Time -->
                        <div class="row mb-3">
                            <div class="col-6">
                                <label class="font-weight-bold" style="font-size: 13px; color: #334155;">
                                    Start Time <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="start_time" class="form-control"  placeholder="e.g. 09:00 AM" value="09:00 AM" style="border-radius: 10px;">
                            </div>
                            <div class="col-6">
                                <label class="font-weight-bold" style="font-size: 13px; color: #334155;">
                                    End Time <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="end_time" class="form-control"  placeholder="e.g. 10:00 AM" value="10:00 AM" style="border-radius: 10px;">
                            </div>
                        </div>

                        <!-- Maximum Patients -->
                        <div class="form-group mb-3">
                            <label class="font-weight-bold" style="font-size: 13px; color: #334155;">
                                Maximum Patient Tokens / Slot <span class="text-danger">*</span>
                            </label>
                            <input type="number" name="max_patients" class="form-control" min="1" max="50" value="8"  style="border-radius: 10px;">
                            <small class="text-muted">Maximum number of patients who can book this consultation window.</small>
                        </div>

                        <!-- Active State -->
                        <div class="custom-control custom-checkbox mt-3">
                            <input type="checkbox" class="custom-control-input" id="activeSlotCheck" name="is_active" value="1" checked>
                            <label class="custom-control-label font-weight-bold" for="activeSlotCheck" style="font-size: 13px;">
                                Immediately Activate This Time Slot
                            </label>
                        </div>
                    </div>

                    <div class="modal-footer bg-light py-2 px-4 border-top">
                        <button type="button" class="btn btn-sm btn-light border rounded-pill px-3" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn-doc-primary">
                            <i class="fa fa-check"></i> Save Time Slot
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ===================================================================
         MODAL 2: EDIT TIME SLOT (FORM)
         =================================================================== -->
    <div class="modal fade" id="editSlotModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 520px;">
            <div class="modal-content rounded-4 border-0 shadow-lg overflow-hidden">
                <div class="modal-header py-3 px-4 bg-light border-bottom d-flex align-items-center justify-content-between">
                    <h5 class="modal-title font-weight-bold" style="font-size: 16px; color: #0f172a;">
                        <i class="fa fa-pencil text-primary m-r-5"></i> Edit Consultation Time Slot
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 22px; line-height: 1; outline: none;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="editSlotForm" action="#" method="POST">
                    @csrf
                    <div class="modal-body p-4">
                        <!-- Day of Week -->
                        <div class="form-group mb-3">
                            <label class="font-weight-bold" style="font-size: 13px; color: #334155;">
                                Applicable Day <span class="text-danger">*</span>
                            </label>
                            <select id="editDayOfWeek" name="day_of_week" class="form-control"  style="border-radius: 10px; font-weight: 600;">
                                <option value="All Days">All Days (Mon - Sat)</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </select>
                        </div>

                        <!-- Start and End Time -->
                        <div class="row mb-3">
                            <div class="col-6">
                                <label class="font-weight-bold" style="font-size: 13px; color: #334155;">
                                    Start Time <span class="text-danger">*</span>
                                </label>
                                <input type="text" id="editStartTime" name="start_time" class="form-control"  style="border-radius: 10px;">
                            </div>
                            <div class="col-6">
                                <label class="font-weight-bold" style="font-size: 13px; color: #334155;">
                                    End Time <span class="text-danger">*</span>
                                </label>
                                <input type="text" id="editEndTime" name="end_time" class="form-control"  style="border-radius: 10px;">
                            </div>
                        </div>

                        <!-- Maximum Patients -->
                        <div class="form-group mb-3">
                            <label class="font-weight-bold" style="font-size: 13px; color: #334155;">
                                Maximum Patient Tokens / Slot <span class="text-danger">*</span>
                            </label>
                            <input type="number" id="editMaxPatients" name="max_patients" class="form-control" min="1" max="50"  style="border-radius: 10px;">
                        </div>

                        <!-- Active State -->
                        <div class="custom-control custom-checkbox mt-3">
                            <input type="checkbox" class="custom-control-input" id="editActiveSlotCheck" name="is_active" value="1">
                            <label class="custom-control-label font-weight-bold" for="editActiveSlotCheck" style="font-size: 13px;">
                                Active Time Slot
                            </label>
                        </div>
                    </div>

                    <div class="modal-footer bg-light py-2 px-4 border-top">
                        <button type="button" class="btn btn-sm btn-light border rounded-pill px-3" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn-doc-primary">
                            <i class="fa fa-save"></i> Update Time Slot
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function openEditSlotModal(id, day, start, end, max, active) {
            document.getElementById('editSlotForm').action = "{{ url('/doctor/time-slots') }}/" + id + "/update";
            document.getElementById('editDayOfWeek').value = day;
            document.getElementById('editStartTime').value = start;
            document.getElementById('editEndTime').value = end;
            document.getElementById('editMaxPatients').value = max;
            document.getElementById('editActiveSlotCheck').checked = (active == '1' || active === true);

            $('#editSlotModal').modal('show');
        }
    </script>
    @endpush

@endsection
