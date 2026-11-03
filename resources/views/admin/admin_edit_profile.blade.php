<!DOCTYPE html>
<html lang="en">

@include('admin.adminnavbar_master')
@section('nav')
@endsection

<body>

    <div class="page-wrapper">
        <!-- Ambient Glowing Background Meshes -->
        <div class="admin-ambient-mesh admin-mesh-1"></div>
        <div class="admin-ambient-mesh admin-mesh-2"></div>
        <div class="admin-ambient-mesh admin-mesh-3"></div>

        <div class="content admin-ambient-wrapper">

            <!-- Page Header Bar -->
            <div class="admin-page-header">
                <div class="admin-page-title-wrap">
                    <h2>
                        <span class="title-icon-box" style="background: #e0f2fe; color: #0284c7;">
                            <i class="fa fa-pencil-square-o"></i>
                        </span>
                        Edit Administrator Profile
                    </h2>
                    <p>Update administrator contact details, hospital address, and profile photo.</p>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ url('admin_profile') }}" class="btn-admin-light">
                        <i class="fa fa-arrow-left"></i> Back to Profile
                    </a>
                </div>
            </div>

            <!-- Flash Alerts -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 14px; font-weight: 600; box-shadow: 0 4px 14px rgba(16, 185, 129, 0.15); border: 1px solid #a7f3d0; background: #ecfdf5; color: #065f46;">
                    <i class="fa fa-check-circle m-r-8"></i> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 14px; font-weight: 600; box-shadow: 0 4px 14px rgba(239, 68, 68, 0.15); border: 1px solid #fecaca; background: #fef2f2; color: #991b1b;">
                    <i class="fa fa-exclamation-circle m-r-8"></i> {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-12 col-lg-9">
                    @if(isset($std3))
                        @foreach ($std3 as $r1)
                            <div class="admin-form-container">
                                <form action="{{ URL::to('/') }}/update_admin_profile" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <!-- Section 1: Account Credentials -->
                                    <div class="form-section-title">
                                        <i class="fa fa-user text-primary"></i> Administrative Identity
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="admin-form-group">
                                                <label>Username / Administrator Name <span class="text-danger">*</span></label>
                                                <div class="admin-input-wrap">
                                                    <i class="fa fa-user input-icon"></i>
                                                    <input class="admin-form-control" type="text" name="name" value="{{ $r1->name }}" >
                                                </div>
                                                @error('name')
                                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="admin-form-group">
                                                <label>Official Email Address <span class="text-danger">*</span></label>
                                                <div class="admin-input-wrap">
                                                    <i class="fa fa-envelope-o input-icon"></i>
                                                    <input class="admin-form-control" type="email" name="email" value="{{ $r1->email }}" readonly style="background: #f1f5f9; cursor: not-allowed;">
                                                </div>
                                                @error('email')
                                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Section 2: Contact & Location -->
                                    <div class="form-section-title mt-3">
                                        <i class="fa fa-map-marker text-primary"></i> Contact & Location
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="admin-form-group">
                                                <label>Hospital / Campus Address</label>
                                                <div class="admin-input-wrap">
                                                    <i class="fa fa-building-o input-icon"></i>
                                                    <input type="text" class="admin-form-control" name="address" value="{{ $r1->address }}">
                                                </div>
                                                @error('address')
                                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="admin-form-group">
                                                <label>City <span class="text-danger">*</span></label>
                                                <div class="admin-input-wrap">
                                                    <i class="fa fa-map-pin input-icon"></i>
                                                    <input type="text" class="admin-form-control" name="city" value="{{ $r1->city }}" >
                                                </div>
                                                @error('city')
                                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="admin-form-group">
                                                <label>Postal Code <span class="text-danger">*</span></label>
                                                <div class="admin-input-wrap">
                                                    <i class="fa fa-envelope input-icon"></i>
                                                    <input type="text" class="admin-form-control" name="postal_code" value="{{ $r1->postal_code }}" >
                                                </div>
                                                @error('postal_code')
                                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="admin-form-group">
                                                <label>Contact Phone <span class="text-danger">*</span></label>
                                                <div class="admin-input-wrap">
                                                    <i class="fa fa-phone input-icon"></i>
                                                    <input class="admin-form-control" type="number" name="phone" value="{{ $r1->phone }}" >
                                                </div>
                                                @error('phone')
                                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Section 3: Avatar & Logo Photo -->
                                    <div class="form-section-title mt-3">
                                        <i class="fa fa-camera text-primary"></i> Administrator Avatar Photo
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-3 text-center mb-3 mb-md-0">
                                            <img src="{{ $r1->logo ? asset($r1->logo) : URL::to('/assets/img/user.jpg') }}"
                                                 alt="{{ $r1->name }}"
                                                 style="width: 90px; height: 90px; border-radius: 50%; object-fit: cover; border: 3px solid #0284c7; box-shadow: 0 4px 12px rgba(0,0,0,0.15);"
                                                 onerror="this.src='{{ URL::to('/assets/img/user.jpg') }}'">
                                        </div>
                                        <div class="col-md-9">
                                            <div class="admin-form-group mb-0">
                                                <label>Upload New Photo</label>
                                                <input type="file" class="admin-form-control no-icon" name="logo">
                                                <small style="color: #64748b; margin-top: 4px; display: block;">Supported formats: JPG, PNG, WEBP. Max size: 2MB.</small>
                                                @error('logo')
                                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Form Actions -->
                                    <div class="mt-5 pt-3 text-right" style="border-top: 1px solid var(--border-light); display: flex; justify-content: flex-end; gap: 12px;">
                                        <a href="{{ url('admin_profile') }}" class="btn-admin-light">Cancel</a>
                                        <button type="submit" class="btn-admin-primary">
                                            <i class="fa fa-check-circle"></i> Save Profile Changes
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

        </div>
    </div>

</body>

</html>
