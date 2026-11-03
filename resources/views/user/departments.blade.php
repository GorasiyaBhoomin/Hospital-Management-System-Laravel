@extends('user.user_layout')

@section('title', 'Clinical Departments & Centers of Excellence | KK Patel Hospital')
@section('page_title', 'Clinical Wings')
@section('hero_title', 'Clinical Departments & Wings')
@section('hero_subtitle', 'Explore specialized tertiary wings, advanced diagnostic facilities, and dedicated operative units.')

@php
    $activePortalTab = 'departments';
@endphp

@section('content')

    <!-- Clinical Wings Toolbar Card -->
    <div class="site-card mb-4">
        <div class="site-card-header">
            <div>
                <h3 class="site-card-title">
                    <span class="card-icon" style="background: #e6f7f5; color: #00a896;">
                        <i class="fa fa-hospital-o"></i>
                    </span>
                    Clinical Wings & Specialities
                </h3>
                <small class="text-muted" style="font-size: 13px;">Tertiary medical departments & modular operating units</small>
            </div>
            <div class="d-flex align-items-center gap-2">
                <span class="badge badge-pill badge-primary" style="padding: 7px 14px; font-size: 12.5px; font-weight: 700;">
                    Total Wings: {{ count($departments) }}
                </span>
                <a href="{{ url('/user/book-appointment') }}" class="btn btn-primary rounded-pill px-3 font-weight-bold" style="background: linear-gradient(135deg, #69275c, #8b1d6b); border: none; font-size: 13px;">
                    <i class="fa fa-calendar-plus-o"></i> Book OPD Consultation
                </a>
            </div>
        </div>
    </div>

    <!-- Clinical Wings Grid -->
    <div class="row">
        @forelse ($departments as $dept)
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="site-card h-100 d-flex flex-column justify-content-between" style="border-top: 4px solid #00a896; overflow: hidden;">
                    <div>
                        <!-- Department Thumbnail Banner -->
                        <div style="position: relative; height: 160px; overflow: hidden; background: linear-gradient(135deg, #0f172a, #334155);">
                            @if($dept->departmentimage)
                                <img src="{{ asset($dept->departmentimage) }}"
                                     alt="{{ $dept->departmentname }}"
                                     style="width: 100%; height: 100%; object-fit: cover; opacity: 0.9; transition: transform 0.4s ease;"
                                     onmouseover="this.style.transform='scale(1.08)'"
                                     onmouseout="this.style.transform='scale(1)'"
                                     onerror="this.src='{{ URL::to('/') }}/img/department/1.png'">
                            @else
                                <div class="d-flex align-items-center justify-content-center h-100" style="background: linear-gradient(135deg, #00a896, #0284c7); color: #ffffff; font-size: 42px;">
                                    <i class="fa fa-hospital-o"></i>
                                </div>
                            @endif
                            <span style="position: absolute; top: 12px; right: 12px; background: rgba(255,255,255,0.95); backdrop-filter: blur(8px); padding: 4px 12px; border-radius: 50px; font-size: 11px; font-weight: 800; color: #00a896; box-shadow: 0 4px 10px rgba(0,0,0,0.15);">
                                <i class="fa fa-shield"></i> NABH Accredited
                            </span>
                        </div>

                        <div class="site-card-body pb-2">
                            <!-- Department Name -->
                            <h4 style="font-size: 18.5px; font-weight: 800; color: #0f172a; margin: 4px 0 10px;">
                                {{ $dept->departmentname }}
                            </h4>

                            <!-- Head of Department Pill -->
                            <div class="mb-3 d-flex align-items-center gap-2" style="background: #f0fdfa; padding: 8px 12px; border-radius: 10px; border: 1px solid #ccfbf1;">
                                <div style="width: 28px; height: 28px; border-radius: 50%; background: #00a896; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 12px;">
                                    <i class="fa fa-user-md"></i>
                                </div>
                                <div style="font-size: 12px; line-height: 1.2;">
                                    <span style="color: #64748b; font-size: 11px; display: block;">Head of Department</span>
                                    <strong style="color: #0f172a;">{{ $dept->departmenthead ?: 'Senior Clinical Lead' }}</strong>
                                </div>
                            </div>

                            <!-- Description -->
                            <p style="font-size: 13px; color: #64748b; line-height: 1.6; margin-bottom: 14px;">
                                {{ Str::limit($dept->Description ?: 'Specialized tertiary care wing equipped with modern modular operative units, advanced diagnostic equipment, and 24/7 dedicated medical faculty.', 125, '...') }}
                            </p>

                            <!-- Facility Badges -->
                            <div class="d-flex flex-wrap gap-2 mb-2" style="font-size: 11.5px; color: #475569;">
                                <span class="badge badge-light" style="padding: 5px 10px; border: 1px solid #e2e8f0;"><i class="fa fa-clock-o text-success m-r-5"></i> 24/7 Emergency</span>
                                <span class="badge badge-light" style="padding: 5px 10px; border: 1px solid #e2e8f0;"><i class="fa fa-check text-primary m-r-5"></i> OPD & IPD</span>
                            </div>
                        </div>
                    </div>

                    <!-- Card Footer Actions -->
                    <div class="p-3" style="border-top: 1px solid #f1f5f9; background: #fafbfc;">
                        <div class="d-flex align-items-center gap-2">
                            <a href="{{ url('/user/doctors?dept=' . urlencode($dept->departmentname)) }}"
                               class="btn btn-light flex-grow-1 text-center font-weight-bold"
                               style="font-size: 12.5px; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 50px; color: #475569;">
                                <i class="fa fa-users"></i> Doctors
                            </a>
                            <a href="{{ url('/user/book-appointment?dept=' . urlencode($dept->departmentname)) }}"
                               class="btn btn-primary flex-grow-1 text-center font-weight-bold"
                               style="font-size: 12.5px; padding: 8px 12px; border-radius: 50px; background: linear-gradient(135deg, #00a896, #0284c7); border: none; color: #ffffff;">
                                <i class="fa fa-calendar-plus-o"></i> Book OPD
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <div style="font-size: 40px; color: #cbd5e1; margin-bottom: 10px;"><i class="fa fa-hospital-o"></i></div>
                <h4 style="color: #64748b; font-weight: 700;">No departments found</h4>
                <p style="color: #94a3b8; font-size: 13px;">Clinical wings will appear here.</p>
            </div>
        @endforelse
    </div>

@endsection
