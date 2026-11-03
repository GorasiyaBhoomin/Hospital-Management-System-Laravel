@extends('doctor.layout')

@section('title', 'My Profile | ' . $doctor->username)

@php
    $activeTab = 'profile';
@endphp

@section('content')

    <!-- Page Banner -->
    <div class="doc-page-banner">
        <div>
            <h2 class="doc-banner-title">
                <span class="doc-banner-icon">
                    <i class="fa fa-user-circle"></i>
                </span>
                Doctor Profile & Clinical Credentials
            </h2>
            <p class="doc-banner-subtitle">
                Manage your hospital biography, specialization details, consultation fees, contact info, and profile avatar.
            </p>
        </div>

        <div>
            <a href="{{ route('doctor.change_password') }}" class="btn-doc-light">
                <i class="fa fa-key text-warning"></i> Change Password
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Left Column: Profile Card & Picture -->
        <div class="col-12 col-lg-4 mb-4">
            <div class="doc-card text-center p-4">
                <div style="position: relative; width: 120px; height: 120px; margin: 0 auto 16px;">
                    @if(!empty($doctor->Avatar) && file_exists(public_path($doctor->Avatar)))
                        <img src="{{ asset($doctor->Avatar) }}" alt="{{ $doctor->username }}" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 4px solid #ffffff; box-shadow: 0 4px 18px rgba(0, 168, 150, 0.25);">
                    @else
                        <div style="width: 120px; height: 120px; border-radius: 50%; background: linear-gradient(135deg, #00a896, #0284c7); color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 42px; font-weight: 800; margin: 0 auto; box-shadow: 0 4px 18px rgba(0, 168, 150, 0.25);">
                            {{ strtoupper(substr($doctor->username, 0, 1)) }}
                        </div>
                    @endif
                    <span style="position: absolute; bottom: 4px; right: 4px; width: 20px; height: 20px; border-radius: 50%; background: #10b981; border: 3px solid #ffffff;"></span>
                </div>

                <h4 style="font-size: 20px; font-weight: 800; color: #0f172a; margin: 0 0 4px;">
                    {{ $doctor->username }}
                </h4>
                <div class="mb-3">
                    <span class="badge badge-pill badge-primary" style="background: #e0f2fe; color: #0284c7; border: 1px solid #bae6fd; font-size: 12px; font-weight: 700; padding: 5px 14px;">
                        <i class="fa fa-stethoscope m-r-4"></i> {{ $doctor->departmentname }}
                    </span>
                </div>

                <div style="font-size: 13px; color: #475569; text-align: left; background: #f8fafc; padding: 14px 16px; border-radius: 12px; border: 1px solid #e2e8f0; line-height: 1.6;">
                    <div><strong class="text-dark">Email:</strong> {{ $doctor->email }}</div>
                    <div><strong class="text-dark">Phone:</strong> {{ $doctor->phone }}</div>
                    <div><strong class="text-dark">Room:</strong> {{ $doctor->room_no ?: 'OPD Room #102' }}</div>
                    <div><strong class="text-dark">Fee:</strong> ₹{{ number_format($doctor->consultation_fee ?: 500, 2) }}</div>
                    <div><strong class="text-dark">City:</strong> {{ $doctor->city ?: 'Bhuj' }}</div>
                </div>
            </div>
        </div>

        <!-- Right Column: Profile Edit Form -->
        <div class="col-12 col-lg-8">
            <div class="doc-card">
                <div class="doc-card-header">
                    <h4 class="doc-card-title">
                        <i class="fa fa-edit text-primary"></i> Update Clinical Credentials & Profile
                    </h4>
                    <span class="text-muted" style="font-size: 12px;">*  fields</span>
                </div>

                <div class="p-4">
                    <form action="{{ route('doctor.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Row 1: Doctor Name and Registered Email -->
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label class="font-weight-bold" style="font-size: 13px; color: #334155;">
                                    Doctor Full Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="username" class="form-control" value="{{ old('username', $doctor->username) }}"  style="border-radius: 10px; font-weight: 600;">
                                @error('username')
                                    <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="font-weight-bold" style="font-size: 13px; color: #334155;">
                                    Registered Email (Account ID)
                                </label>
                                <input type="email" class="form-control bg-light" value="{{ $doctor->email }}" readonly style="border-radius: 10px; cursor: not-allowed;">
                            </div>
                        </div>

                        <!-- Row 2: Phone and Department -->
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label class="font-weight-bold" style="font-size: 13px; color: #334155;">
                                    Contact Phone Number <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone', $doctor->phone) }}"  style="border-radius: 10px;">
                                @error('phone')
                                    <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="font-weight-bold" style="font-size: 13px; color: #334155;">
                                    Clinical Department / Specialty <span class="text-danger">*</span>
                                </label>
                                <select name="departmentname" class="form-control"  style="border-radius: 10px; font-weight: 600;">
                                    @foreach($departments as $dept)
                                        <option value="{{ $dept->departmentname }}" {{ strcasecmp($doctor->departmentname, $dept->departmentname) === 0 ? 'selected' : '' }}>
                                            {{ $dept->departmentname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Row 3: Qualification, Experience, Room & Fee -->
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label class="font-weight-bold" style="font-size: 13px; color: #334155;">
                                    Medical Qualifications (Degrees)
                                </label>
                                <input type="text" name="qualification" class="form-control" value="{{ old('qualification', $doctor->qualification) }}" placeholder="e.g. MBBS, MD, DM (Cardiology)" style="border-radius: 10px;">
                            </div>

                            <div class="col-md-6">
                                <label class="font-weight-bold" style="font-size: 13px; color: #334155;">
                                    Clinical Experience
                                </label>
                                <input type="text" name="experience" class="form-control" value="{{ old('experience', $doctor->experience) }}" placeholder="e.g. 10+ Years" style="border-radius: 10px;">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label class="font-weight-bold" style="font-size: 13px; color: #334155;">
                                    Assigned OPD Room Number
                                </label>
                                <input type="text" name="room_no" class="form-control" value="{{ old('room_no', $doctor->room_no) }}" placeholder="e.g. Room #104" style="border-radius: 10px;">
                            </div>

                            <div class="col-md-6">
                                <label class="font-weight-bold" style="font-size: 13px; color: #334155;">
                                    Consultation Fee (₹ INR)
                                </label>
                                <input type="number" name="consultation_fee" class="form-control" value="{{ old('consultation_fee', $doctor->consultation_fee ?: 500) }}" min="0" step="50" style="border-radius: 10px;">
                            </div>
                        </div>

                        <!-- Row 4: City and Address -->
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label class="font-weight-bold" style="font-size: 13px; color: #334155;">
                                    City <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="city" class="form-control" value="{{ old('city', $doctor->city) }}"  style="border-radius: 10px;">
                            </div>

                            <div class="col-md-6">
                                <label class="font-weight-bold" style="font-size: 13px; color: #334155;">
                                    Postal / Pin Code
                                </label>
                                <input type="text" name="postal_code" class="form-control" value="{{ old('postal_code', $doctor->postal_code) }}" style="border-radius: 10px;">
                            </div>
                        </div>

                        <!-- Profile Avatar Image Upload -->
                        <div class="form-group mb-3">
                            <label class="font-weight-bold" style="font-size: 13px; color: #334155;">
                                Update Profile Photo / Avatar
                            </label>
                            <input type="file" name="Avatar" class="form-control-file" accept="image/*" style="font-size: 13px;">
                            <small class="text-muted">Recommended: Professional square portrait, max 4MB (JPG, PNG).</small>
                        </div>

                        <!-- Professional Biography -->
                        <div class="form-group mb-4">
                            <label class="font-weight-bold" style="font-size: 13px; color: #334155;">
                                Professional Bio & Clinical Summary
                            </label>
                            <textarea name="Bio" class="form-control" rows="4" style="border-radius: 10px;" placeholder="Write a summary of your medical career, specialities, and care philosophy...">{{ old('Bio', $doctor->Bio) }}</textarea>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn-doc-primary py-2 px-5 font-weight-bold" style="font-size: 14px;">
                                <i class="fa fa-save"></i> Save Profile Details
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
