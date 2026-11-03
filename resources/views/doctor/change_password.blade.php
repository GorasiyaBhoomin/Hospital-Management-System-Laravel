@extends('doctor.layout')

@section('title', 'Change Password | ' . $doctor->username)

@php
    $activeTab = 'password';
@endphp

@section('content')

    <!-- Page Banner -->
    <div class="doc-page-banner">
        <div>
            <h2 class="doc-banner-title">
                <span class="doc-banner-icon">
                    <i class="fa fa-key"></i>
                </span>
                Doctor Console Security & Password
            </h2>
            <p class="doc-banner-subtitle">
                Ensure your doctor clinical account remains secure by maintaining a strong, unique password.
            </p>
        </div>

        <div>
            <a href="{{ route('doctor.dashboard') }}" class="btn-doc-light">
                <i class="fa fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="doc-card">
                <div class="doc-card-header">
                    <h4 class="doc-card-title">
                        <i class="fa fa-lock text-primary"></i> Change Account Password
                    </h4>
                    <span class="badge badge-pill badge-light border text-muted" style="font-size: 11px;">
                        Security Protection
                    </span>
                </div>

                <div class="p-4">
                    <form action="{{ route('doctor.password.update') }}" method="POST">
                        @csrf

                        <!-- Current Password -->
                        <div class="form-group mb-3">
                            <label class="font-weight-bold" style="font-size: 13px; color: #334155;">
                                Current Password <span class="text-danger">*</span>
                            </label>
                            <input type="password" name="current_password" class="form-control"  placeholder="Enter current password" style="border-radius: 10px;">
                            @error('current_password')
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- New Password -->
                        <div class="form-group mb-3">
                            <label class="font-weight-bold" style="font-size: 13px; color: #334155;">
                                New Password <span class="text-danger">*</span>
                            </label>
                            <input type="password" name="password" class="form-control"  minlength="6" placeholder="Enter new strong password" style="border-radius: 10px;">
                            <small class="text-muted">Must be at least 6 characters long.</small>
                            @error('password')
                                <small class="text-danger font-weight-bold d-block">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Confirm New Password -->
                        <div class="form-group mb-4">
                            <label class="font-weight-bold" style="font-size: 13px; color: #334155;">
                                Confirm New Password <span class="text-danger">*</span>
                            </label>
                            <input type="password" name="password_confirmation" class="form-control"  minlength="6" placeholder="Re-type new password" style="border-radius: 10px;">
                        </div>

                        <!-- Security Tips Box -->
                        <div class="alert alert-light border mb-4 p-3" style="font-size: 12px; color: #64748b; border-radius: 10px; line-height: 1.5;">
                            <strong class="text-dark"><i class="fa fa-shield text-success m-r-4"></i> Password Best Practices:</strong>
                            <ul class="mb-0 pl-3 mt-1">
                                <li>Use a combination of upper/lowercase letters, digits, and symbols.</li>
                                <li>Never share your clinical doctor login credentials with non-staff.</li>
                                <li>If you suspect unauthorized access, change your password immediately.</li>
                            </ul>
                        </div>

                        <button type="submit" class="btn-doc-primary w-100 justify-content-center py-2 font-weight-bold" style="font-size: 14px;">
                            <i class="fa fa-check"></i> Update Doctor Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
