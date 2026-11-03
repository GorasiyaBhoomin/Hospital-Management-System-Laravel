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
                            <i class="fa fa-newspaper-o"></i>
                        </span>
                        Edit Press Release
                    </h2>
                    <p>Modify press release content, replace media image, and update public news publication.</p>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ url('adminpress') }}" class="btn-admin-light">
                        <i class="fa fa-arrow-left"></i> Back to Press Desk
                    </a>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    @if(isset($std2))
                        @foreach ($std2 as $r3)
                            <div class="admin-form-container">
                                <form action="{{ URL::to('/') }}/update_press_desk/{{ $r3->id }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $r3->id }}">

                                    <div class="form-section-title">
                                        <i class="fa fa-pencil text-primary"></i> Update Release Content
                                    </div>

                                    <div class="admin-form-group">
                                        <label>Press Image</label>
                                        <div class="d-flex align-items-center gap-3 mb-2">
                                            @if($r3->pressimage)
                                                <img alt="Press Image" src="{{ asset($r3->pressimage) }}"
                                                     style="width: 85px; height: 60px; border-radius: 8px; object-fit: cover; border: 1px solid #e2e8f0;">
                                            @endif
                                            <input type="file" name="pressimage" class="admin-form-control no-icon flex-grow-1">
                                        </div>
                                        <small style="color: #64748b; display: block;">Leave empty to keep current image</small>
                                        @error('pressimage')
                                            <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="admin-form-group">
                                        <label>Press Release Article / Description <span class="text-danger">*</span></label>
                                        <textarea cols="30" rows="6" name="description" class="admin-form-control admin-textarea" >{{ $r3->description }}</textarea>
                                        @error('description')
                                            <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Form Actions -->
                                    <div class="mt-4 pt-3 text-right" style="border-top: 1px solid var(--border-light); display: flex; justify-content: flex-end; gap: 12px;">
                                        <a href="{{ url('adminpress') }}" class="btn-admin-light">Cancel</a>
                                        <button type="submit" class="btn-admin-primary">
                                            <i class="fa fa-check-circle"></i> Save Press Changes
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
