@extends('user.user_layout')

@section('title', 'Patient Profile & Security | KK Patel Super Speciality Hospital')
@section('page_title', 'Profile & Security')
@section('hero_title', 'Patient Profile & Account Security')
@section('hero_subtitle', 'Manage personal information, contact number, residential address, and update account password.')

@php
    $activePortalTab = 'profile';
@endphp

@section('content')

    <!-- 1. Personal & Contact Information Card -->
    <div class="site-card mb-4">
        <div class="site-card-header">
            <h3 class="site-card-title">
                <span class="card-icon bg-soft-purple">
                    <i class="fa fa-user-o"></i>
                </span>
                Personal Information & Contact Details
            </h3>
            <span class="badge badge-pill" style="background: #fbf5fa; color: #69275c; border: 1px solid #ebdbe8; padding: 6px 12px; font-size: 12px; font-weight: 700;">
                <i class="fa fa-shield"></i> Medical ID: #PAT-{{ str_pad($user->id, 5, '0', STR_PAD_LEFT) }}
            </span>
        </div>

        <div class="site-card-body">
            @if (isset($errors) && $errors->any())
                <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-4" role="alert" style="font-size: 13.5px;">
                    <strong><i class="fa fa-exclamation-triangle"></i> Form submission errors:</strong>
                    <ul class="mb-0 mt-2 pl-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Row 1: Name and Email -->
                <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label font-weight-bold" style="font-size: 13px; color: #0f172a;">Full Name <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0"><i class="fa fa-user-o text-muted"></i></span>
                            </div>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}"  style="height: 46px; font-size: 14px;">
                        </div>
                    </div>

                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label font-weight-bold" style="font-size: 13px; color: #0f172a;">Email Address</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0"><i class="fa fa-envelope-o text-muted"></i></span>
                            </div>
                            <input type="email" class="form-control" value="{{ $user->email }}" readonly style="height: 46px; font-size: 14px; background: #f8fafc;" title="Email address cannot be changed">
                        </div>
                        <small class="text-muted" style="font-size: 11.5px;">Your registered email is tied to hospital OPD token slips.</small>
                    </div>
                </div>

                <!-- Row 2: Phone and City -->
                <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label font-weight-bold" style="font-size: 13px; color: #0f172a;">Mobile / WhatsApp Number <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0"><i class="fa fa-phone text-muted"></i></span>
                            </div>
                            <input type="tel" name="phone" class="form-control" value="{{ old('phone', $user->phone ?: $user->phone_number) }}"  placeholder="10-digit mobile number" style="height: 46px; font-size: 14px;">
                        </div>
                    </div>

                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label font-weight-bold" style="font-size: 13px; color: #0f172a;">City / District</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0"><i class="fa fa-map-marker text-muted"></i></span>
                            </div>
                            <input type="text" name="city" class="form-control" value="{{ old('city', $user->city ?: 'Bhuj') }}" placeholder="City, State" style="height: 46px; font-size: 14px;">
                        </div>
                    </div>
                </div>

                <!-- Row 3: Address and Postal Code -->
                <div class="row">
                    <div class="col-12 col-md-8 mb-3">
                        <label class="form-label font-weight-bold" style="font-size: 13px; color: #0f172a;">Residential Address</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0"><i class="fa fa-home text-muted"></i></span>
                            </div>
                            <input type="text" name="address" class="form-control" value="{{ old('address', $user->address ?: 'Bhuj, Kutch') }}" placeholder="Street, landmark, town" style="height: 46px; font-size: 14px;">
                        </div>
                    </div>

                    <div class="col-12 col-md-4 mb-3">
                        <label class="form-label font-weight-bold" style="font-size: 13px; color: #0f172a;">PIN / Postal Code</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0"><i class="fa fa-map-pin text-muted"></i></span>
                            </div>
                            <input type="text" name="postal_code" class="form-control" value="{{ old('postal_code', $user->postal_code ?: '370001') }}" placeholder="e.g. 370001" style="height: 46px; font-size: 14px;">
                        </div>
                    </div>
                </div>

                <!-- Row 4: Profile Avatar -->
                <div class="row mb-4">
                    <div class="col-12">
                        <label class="form-label font-weight-bold" style="font-size: 13px; color: #0f172a;">Profile Picture / Avatar</label>
                        <div class="d-flex align-items-center gap-3">
                            <div style="width: 56px; height: 56px; border-radius: 50%; overflow: hidden; background: #fbf5fa; display: flex; align-items: center; justify-content: center; border: 2px solid #ebdbe8; flex-shrink: 0;">
                                @if(!empty($user->logo) && file_exists(public_path($user->logo)))
                                    <img src="{{ asset($user->logo) }}" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <span style="font-size: 22px; font-weight: 800; color: #69275c;">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                @endif
                            </div>
                            <div class="flex-grow-1">
                                <input type="file" name="logo" class="form-control-file" accept="image/*" style="font-size: 13px;">
                                <small class="text-muted d-block mt-1">Recommended: Square PNG or JPG under 2MB.</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-3" style="border-top: 1px solid #f1f5f9;">
                    <button type="submit" class="btn btn-portal-primary font-weight-bold">
                        <i class="fa fa-check"></i> Save Personal Details
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- 2. Security & Password Update Card -->
    <div class="site-card">
        <div class="site-card-header">
            <h3 class="site-card-title">
                <span class="card-icon bg-soft-red">
                    <i class="fa fa-lock"></i>
                </span>
                Account Security & Password
            </h3>
            <span class="text-muted" style="font-size: 13px;"><i class="fa fa-info-circle text-primary"></i> Last updated: {{ date('d M Y', strtotime($user->updated_at ?? now())) }}</span>
        </div>

        <div class="site-card-body">
            <form action="{{ route('user.password.change') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-12 col-md-4 mb-3">
                        <label class="form-label font-weight-bold" style="font-size: 13px; color: #0f172a;">Current Password <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="password" name="old_password" id="old_pwd" class="form-control"  placeholder="Enter current password" style="height: 46px; font-size: 14px;">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePwdVisibility('old_pwd')" style="border-color: #ced4da;">
                                    <i class="fa fa-eye" id="old_pwd_eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 mb-3">
                        <label class="form-label font-weight-bold" style="font-size: 13px; color: #0f172a;">New Password <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="password" name="password" id="new_pwd" class="form-control"  placeholder="Minimum 6 characters" style="height: 46px; font-size: 14px;">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePwdVisibility('new_pwd')" style="border-color: #ced4da;">
                                    <i class="fa fa-eye" id="new_pwd_eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 mb-3">
                        <label class="form-label font-weight-bold" style="font-size: 13px; color: #0f172a;">Confirm New Password <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="password" name="password_confirmation" id="conf_pwd" class="form-control"  placeholder="Re-type new password" style="height: 46px; font-size: 14px;">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePwdVisibility('conf_pwd')" style="border-color: #ced4da;">
                                    <i class="fa fa-eye" id="conf_pwd_eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-3" style="border-top: 1px solid #f1f5f9;">
                    <button type="submit" class="btn btn-portal-primary font-weight-bold">
                        <i class="fa fa-key"></i> Update Account Password
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    function togglePwdVisibility(id) {
        var input = document.getElementById(id);
        var eye = document.getElementById(id + '_eye');
        if (input.type === 'password') {
            input.type = 'text';
            eye.classList.remove('fa-eye');
            eye.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            eye.classList.remove('fa-eye-slash');
            eye.classList.add('fa-eye');
        }
    }
</script>
@endpush
