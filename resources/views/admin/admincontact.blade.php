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
                            <i class="fa fa-envelope-open-o"></i>
                        </span>
                        Patient Inquiries & Contact Messages
                    </h2>
                    <p>Direct patient inquiries, emergency communications, appointment assistance, and general helpdesk tickets.</p>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <span class="badge badge-pill badge-primary" style="padding: 8px 16px; font-size: 13px; font-weight: 700;">
                        <i class="fa fa-inbox m-r-5"></i> Total Messages: {{ count($std1) }}
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

            <!-- Inquiries Data Table Container -->
            <div class="admin-table-wrapper">
                <div class="admin-table-header-bar">
                    <h4 style="font-size: 16px; font-weight: 800; color: #0f172a; margin: 0;">
                        <i class="fa fa-comments text-primary m-r-5"></i> Helpdesk & Inquiry Stream
                    </h4>
                    <span style="font-size: 13px; color: #64748b; font-weight: 600;">
                        Response SLA &lt; 2 Hours
                    </span>
                </div>

                <div class="table-responsive">
                    <table class="table admin-modern-table mb-0">
                        <thead>
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th>Sender</th>
                                <th>Contact Information</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th class="text-right" style="width: 110px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($std1 as $r1)
                                <tr>
                                    <td>
                                        <strong style="color: #64748b; font-weight: 700;">#{{ $r1['id'] }}</strong>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div style="width: 38px; height: 38px; border-radius: 50%; background: #e0f2fe; color: #0284c7; display: flex; align-items: center; justify-content: center; font-weight: 700; margin-right: 12px; flex-shrink: 0; border: 1px solid #bae6fd;">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <strong style="color: #0f172a; font-size: 14px;">{{ $r1['contactname'] }}</strong>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="font-size: 12.5px; line-height: 1.5;">
                                            <div><a href="mailto:{{ $r1['email'] }}" style="color: #0284c7; text-decoration: none;"><i class="fa fa-envelope-o text-muted m-r-5"></i> {{ $r1['email'] }}</a></div>
                                            <div><a href="tel:{{ $r1['phone'] }}" style="color: #475569; text-decoration: none;"><i class="fa fa-phone text-muted m-r-5"></i> {{ $r1['phone'] }}</a></div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-light" style="padding: 6px 12px; font-size: 12px; font-weight: 700; color: #1e293b; border: 1px solid #cbd5e1; border-radius: 6px;">
                                            {{ $r1['subject'] }}
                                        </span>
                                    </td>
                                    <td style="max-width: 280px; color: #64748b; font-size: 13px; line-height: 1.5;">
                                        {{ $r1['message'] }}
                                    </td>
                                    <td>
                                        @if(!empty($r1['replied']) && strtolower($r1['replied']) != 'no' && strtolower($r1['replied']) != 'pending')
                                            <span class="badge-status badge-status-approved">
                                                <i class="fa fa-check-circle"></i> Replied
                                            </span>
                                        @else
                                            <span class="badge-status badge-status-pending">
                                                <i class="fa fa-clock-o"></i> Unanswered
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ URL::to('/') }}/reply_contact/{{ $r1->email }}" class="action-btn-pill btn-pill-reply" title="Reply to Message">
                                            <i class="fa fa-reply"></i>
                                        </a>
                                        <a href="{{ URL::to('/') }}/delete_contact/{{ $r1->email }}" class="action-btn-pill btn-pill-delete"
                                           onclick="return confirm('Are you sure you want to delete this message from {{ $r1['contactname'] }}?');" title="Delete Message">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <div style="font-size: 40px; color: #cbd5e1; margin-bottom: 10px;"><i class="fa fa-inbox"></i></div>
                                        <h5 style="color: #64748b;">No Patient Contact Inquiries Found</h5>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</body>

</html>
