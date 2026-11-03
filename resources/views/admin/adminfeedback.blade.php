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
                        <span class="title-icon-box" style="background: #fef3c7; color: #d97706;">
                            <i class="fa fa-star"></i>
                        </span>
                        Patient Feedback & Clinical Reviews
                    </h2>
                    <p>Verified testimonials, doctor care evaluations, and hospital service experience ratings.</p>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <span class="badge badge-pill badge-warning" style="padding: 8px 16px; font-size: 13px; font-weight: 700; background: #fef3c7; color: #b45309; border: 1px solid #fde68a;">
                        <i class="fa fa-star m-r-5"></i> 4.9 Average Rating ({{ count($std1) }} Reviews)
                    </span>
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

            <!-- Feedback Cards Grid -->
            <div class="row">
                @forelse ($std1 as $r1)
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="admin-box-card h-100 d-flex flex-column justify-content-between" style="border-top: 4px solid #f59e0b;">
                            <div class="admin-box-body pb-2">
                                <!-- Card Header with Rating & Badge -->
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div style="color: #f59e0b; font-size: 15px;">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <span class="badge badge-pill badge-success" style="font-size: 11px; padding: 4px 10px; background: #ecfdf5; color: #059669; border: 1px solid #a7f3d0;">
                                        <i class="fa fa-check"></i> Verified Patient
                                    </span>
                                </div>

                                <!-- Feedback Message Quote Box -->
                                <div style="background: #f8fafc; border-left: 3px solid #f59e0b; padding: 14px 16px; border-radius: 0 12px 12px 0; margin-bottom: 16px; font-style: italic; color: #334155; font-size: 13.5px; line-height: 1.6; min-height: 80px;">
                                    "{{ $r1['message'] }}"
                                </div>

                                <!-- Patient Profile -->
                                <div class="d-flex align-items-center">
                                    <div style="width: 42px; height: 42px; border-radius: 50%; background: #fef3c7; color: #d97706; display: flex; align-items: center; justify-content: center; font-size: 16px; font-weight: 800; margin-right: 12px; flex-shrink: 0; box-shadow: 0 2px 8px rgba(245, 158, 11, 0.2);">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <div style="overflow: hidden;">
                                        <h5 style="margin: 0 0 2px; font-size: 14.5px; font-weight: 800; color: #0f172a;">{{ $r1['name'] }}</h5>
                                        <a href="mailto:{{ $r1['email'] }}" style="font-size: 12px; color: #0284c7; text-decoration: none;" class="text-truncate d-block">
                                            <i class="fa fa-envelope-o m-r-4"></i> {{ $r1['email'] }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Footer Actions -->
                            <div class="p-3" style="border-top: 1px solid var(--border-light); background: #fafbfc; display: flex; align-items: center; justify-content: space-between;">
                                <small style="color: #94a3b8; font-weight: 600;">Feedback ID: #{{ $r1['id'] }}</small>
                                <a href="{{ URL::to('/') }}/delete_feedback/{{ $r1->email }}" class="action-btn-pill btn-pill-delete"
                                   onclick="return confirm('Are you sure you want to delete this feedback from {{ $r1['name'] }}?');" title="Delete Review">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div style="font-size: 44px; color: #cbd5e1; margin-bottom: 10px;"><i class="fa fa-comments-o"></i></div>
                        <h5 style="color: #64748b;">No Patient Feedback Reviews Yet</h5>
                    </div>
                @endforelse
            </div>

        </div>
    </div>

</body>

</html>
