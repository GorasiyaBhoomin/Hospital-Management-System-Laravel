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
                        <span class="title-icon-box" style="background: #d1fae5; color: #059669;">
                            <i class="fa fa-reply"></i>
                        </span>
                        Reply to Patient Inquiry
                    </h2>
                    <p>Compose an official response to patient query and update inquiry resolution status.</p>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ url('admincontact') }}" class="btn-admin-light">
                        <i class="fa fa-arrow-left"></i> Back to Inquiries
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
                <div class="col-12 col-md-10 col-lg-8">
                    @if(isset($std1))
                        @foreach($std1 as $contact)
                            <div class="admin-form-container">
                                <form action="{{ url('update_contact') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <!-- Section 1: Patient Context -->
                                    <div class="form-section-title">
                                        <i class="fa fa-user-circle text-primary"></i> Patient Inquiry Details
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="admin-form-group">
                                                <label>Patient Name</label>
                                                <div class="admin-input-wrap">
                                                    <i class="fa fa-user input-icon"></i>
                                                    <input class="admin-form-control" type="text" name="contactname" value="{{ $contact->contactname }}" readonly style="background: #f1f5f9;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="admin-form-group">
                                                <label>Recipient Email</label>
                                                <div class="admin-input-wrap">
                                                    <i class="fa fa-envelope-o input-icon"></i>
                                                    <input class="admin-form-control" type="email" name="email" value="{{ $contact->email }}" readonly style="background: #f1f5f9;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="admin-form-group">
                                                <label>Original Patient Inquiry / Question</label>
                                                <div style="background: #f8fafc; border-left: 3px solid #0284c7; padding: 14px 16px; border-radius: 0 10px 10px 0; font-size: 13.5px; color: #334155; line-height: 1.6; border: 1px solid #e2e8f0; border-left: 3px solid #0284c7;">
                                                    "{{ $contact->message }}"
                                                </div>
                                                <input type="hidden" name="message" value="{{ $contact->message }}">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Section 2: Response Composition -->
                                    <div class="form-section-title mt-4">
                                        <i class="fa fa-pencil text-primary"></i> Official Hospital Response
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="admin-form-group">
                                                <label>Reply Message <span class="text-danger">*</span></label>
                                                <textarea class="admin-form-control admin-textarea" rows="6" name="replied" placeholder="Write comprehensive medical response or contact clarification..." >{{ $contact->replied }}</textarea>
                                                @error('replied')
                                                    <span style="color: #dc2626; font-size: 12px; font-weight: 600;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Form Actions -->
                                    <div class="mt-4 pt-3 text-right" style="border-top: 1px solid var(--border-light); display: flex; justify-content: flex-end; gap: 12px;">
                                        <a href="{{ url('admincontact') }}" class="btn-admin-light">Cancel</a>
                                        <button type="submit" class="btn-admin-primary">
                                            <i class="fa fa-paper-plane"></i> Send Official Reply
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
