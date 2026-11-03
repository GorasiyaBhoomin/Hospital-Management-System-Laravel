@extends('user.user_layout')

@section('title', 'Specialist Doctors & Surgeons | KK Patel Super Speciality Hospital')
@section('page_title', 'Specialist Doctors')
@section('hero_title', 'Hospital Specialist Doctors')
@section('hero_subtitle', 'Consult with our leading surgeons, super-specialists, and department heads in Bhuj.')

@php
    $activePortalTab = 'doctors';
@endphp

@section('content')

    <!-- Specialist Doctors Toolbar Card -->
    <div class="site-card mb-4">
        <div class="site-card-header">
            <div>
                <h3 class="site-card-title">
                    <span class="card-icon" style="background: #e0f2fe; color: #0284c7;">
                        <i class="fa fa-user-md"></i>
                    </span>
                    Find a Medical Specialist
                </h3>
                <small class="text-muted" style="font-size: 13px;">Super-speciality clinical consultants on duty</small>
            </div>
            <div class="d-flex align-items-center gap-2">
                <span class="badge badge-pill badge-primary" style="padding: 7px 14px; font-size: 12.5px; font-weight: 700;">
                    Available Consultants: {{ count($doctors) }}
                </span>
                <a href="{{ url('/user/book-appointment') }}" class="btn btn-primary rounded-pill px-3 font-weight-bold" style="background: linear-gradient(135deg, #69275c, #8b1d6b); border: none; font-size: 13px;">
                    <i class="fa fa-calendar-plus-o"></i> Book Consultation
                </a>
            </div>
        </div>

        <!-- Department Filter Pills -->
        <div class="px-4 py-3 bg-light border-bottom d-flex align-items-center flex-wrap gap-2">
            <span style="font-size: 13px; font-weight: 700; color: #0f172a; margin-right: 6px;">Filter Speciality:</span>
            <a href="{{ url('/user/doctors') }}" class="badge badge-pill {{ empty($selectedDept) || $selectedDept == 'all' ? 'badge-primary' : 'badge-light' }}" style="padding: 8px 16px; font-size: 12.5px; text-decoration: none;">
                All Specialities ({{ count($doctors) }})
            </a>
            @foreach($departments as $dept)
                <a href="{{ url('/user/doctors?dept=' . urlencode($dept->departmentname)) }}"
                   class="badge badge-pill {{ (isset($selectedDept) && $selectedDept == $dept->departmentname) ? 'badge-primary' : 'badge-light' }}"
                   style="padding: 8px 16px; font-size: 12.5px; text-decoration: none;">
                    {{ $dept->departmentname }}
                </a>
            @endforeach
        </div>
    </div>

    <!-- Doctor Cards Grid -->
    <div class="row">
        @forelse ($doctors as $doc)
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="site-card h-100 d-flex flex-column justify-content-between" style="border-top: 4px solid #0284c7;">
                    <div class="site-card-body text-center pb-2">
                        <!-- Avatar -->
                        <div style="position: relative; width: 92px; height: 92px; margin: 0 auto 16px;">
                            <img alt="{{ $doc->username }}"
                                 src="{{ $doc->Avatar ? asset($doc->Avatar) : URL::to('/img/doctors/1.png') }}"
                                 style="width: 92px; height: 92px; border-radius: 50%; object-fit: cover; border: 3px solid #ffffff; box-shadow: 0 4px 14px rgba(2, 132, 199, 0.25);"
                                 onerror="this.src='{{ URL::to('/assets/img/user.jpg') }}'">
                            <span style="position: absolute; bottom: 4px; right: 4px; width: 15px; height: 15px; background: #10b981; border: 2.5px solid #ffffff; border-radius: 50%;" title="Available for OPD"></span>
                        </div>

                        <!-- Doctor Name -->
                        <h4 style="font-size: 17.5px; font-weight: 800; color: #0f172a; margin: 0 0 6px;">
                            {{ $doc->username }}
                        </h4>

                        <!-- Department Tag -->
                        <div class="mb-3">
                            <span class="badge badge-pill" style="background: #e0f2fe; color: #0284c7; border: 1px solid #bae6fd; padding: 5px 12px; font-size: 12px; font-weight: 700;">
                                <i class="fa fa-stethoscope"></i> {{ $doc->departmentname }}
                            </span>
                        </div>

                        <!-- Bio Snippet -->
                        <div style="font-size: 13px; color: #64748b; line-height: 1.5; margin-bottom: 16px; background: #f8fafc; padding: 12px 14px; border-radius: 10px; border: 1px solid #edf2f7; text-align: left; min-height: 58px;">
                            {{ Str::limit($doc->short_bio ? $doc->short_bio : $doc->Bio, 115, '...') }}
                        </div>

                        <!-- OPD Timings & Location -->
                        <div style="font-size: 12px; color: #64748b; text-align: left; margin-bottom: 14px;">
                            <div class="mb-1"><i class="fa fa-calendar-check-o text-muted m-r-5"></i> <strong>OPD:</strong> Mon - Sat (9:00 AM - 6:00 PM)</div>
                            <div><i class="fa fa-map-marker text-muted m-r-5"></i> <strong>Campus:</strong> Bhuj Facility</div>
                        </div>
                    </div>

                    <!-- Card Footer Button -->
                    <div class="p-3" style="border-top: 1px solid #f1f5f9; background: #fafbfc;">
                        <a href="{{ url('/user/book-appointment') }}?dept={{ urlencode($doc->departmentname) }}&doc={{ urlencode($doc->username) }}"
                           class="btn btn-primary btn-block rounded-pill py-2 font-weight-bold"
                           style="background: linear-gradient(135deg, #69275c, #0284c7); border: none; font-size: 13.5px; box-shadow: 0 4px 14px rgba(105, 39, 92, 0.25);">
                            <i class="fa fa-calendar-plus-o"></i> Book Consultation
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <div style="font-size: 40px; color: #cbd5e1; margin-bottom: 10px;"><i class="fa fa-user-md"></i></div>
                <h4 style="color: #64748b; font-weight: 700;">No doctors found</h4>
                <p style="color: #94a3b8; font-size: 13px;">No doctors matched the selected filter.</p>
                <a href="{{ url('/user/doctors') }}" class="btn btn-light rounded-pill px-4" style="border: 1px solid #cbd5e1;">View All Doctors</a>
            </div>
        @endforelse
    </div>

@endsection
