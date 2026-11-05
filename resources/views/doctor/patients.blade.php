@extends('doctor.layout')

@section('title', 'My Patients | ' . $doctor->username)

@php
    $activeTab = 'patients';
@endphp

@push('styles')
<style>
    .patient-row-card {
        background: #ffffff;
        border: 1.5px solid #e2e8f0;
        border-radius: 14px;
        padding: 18px 22px;
        margin-bottom: 12px;
        transition: all 0.2s ease;
    }

    .patient-row-card:hover {
        border-color: #00a896;
        box-shadow: 0 4px 16px rgba(0, 168, 150, 0.08);
        transform: translateY(-1px);
    }

    .patient-avatar-circ {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: linear-gradient(135deg, #00a896 0%, #0284c7 100%);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 16px;
        flex-shrink: 0;
    }
</style>
@endpush

@section('content')

    <!-- Page Banner -->
    <div class="doc-page-banner">
        <div>
            <h2 class="doc-banner-title">
                <span class="doc-banner-icon">
                    <i class="fa fa-users"></i>
                </span>
                My Patients Directory
            </h2>
            <p class="doc-banner-subtitle">
                Directory of patients who have consulted with you. Review their appointment history, contact records, and past clinical complaints.
            </p>
        </div>

        <div class="d-flex align-items-center gap-2">
            <span class="badge badge-pill badge-light border text-primary" style="font-size: 12.5px; font-weight: 700; padding: 7px 16px;">
                <i class="fa fa-id-badge m-r-4"></i> {{ count($patients) }} Unique Patients
            </span>
        </div>
    </div>

    <!-- Search Toolbar Bar -->
    <div class="doc-card p-3 mb-4">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div style="font-size: 13px; font-weight: 700; color: #0f172a;">
                <i class="fa fa-filter text-primary m-r-4"></i> Filter Registered Patients:
            </div>
            <div style="min-width: 280px; position: relative;">
                <i class="fa fa-search" style="position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: #94a3b8; font-size: 13px;"></i>
                <input type="text" id="docPatientSearch" placeholder="Search patient name, email, phone, UHID..."
                       oninput="filterDocPatients()"
                       style="width: 100%; background: #f8fafc; border: 1.5px solid #e2e8f0; border-radius: 50px; padding: 7px 14px 7px 36px; font-size: 13px; font-weight: 600; outline: none;">
            </div>
        </div>
    </div>

    <!-- Patients List -->
    <div id="docPatientsList">
        @forelse($patients as $pKey => $p)
            @php
                $initial = strtoupper(substr($p['name'], 0, 1));
                $searchBlob = strtolower($p['name'] . ' ' . $p['email'] . ' ' . $p['phone'] . ' ' . $p['uhid']);
            @endphp
            <div class="patient-row-card doc-patient-item" data-search="{{ $searchBlob }}">
                <div class="row align-items-center">
                    
                    <!-- Avatar & Patient Details -->
                    <div class="col-12 col-md-4 mb-2 mb-md-0 d-flex align-items-center">
                        <div class="patient-avatar-circ m-r-12">
                            {{ $initial }}
                        </div>
                        <div style="line-height: 1.35;">
                            <div class="d-flex align-items-center gap-2">
                                <strong style="color: #0f172a; font-size: 15px;">{{ $p['name'] }}</strong>
                                <span class="badge badge-light border" style="font-size: 10px;">{{ $p['gender'] }}</span>
                            </div>
                            <small class="text-primary font-weight-bold" style="font-family: monospace;">{{ $p['uhid'] }}</small>
                            <div style="font-size: 12px; color: #64748b; margin-top: 2px;">
                                <a href="mailto:{{ $p['email'] }}" style="color: #0284c7; text-decoration: none;" class="m-r-6">
                                    <i class="fa fa-envelope-o"></i> {{ $p['email'] }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Contact & Visits Count -->
                    <div class="col-6 col-md-3 mb-2 mb-md-0">
                        <small class="text-muted text-uppercase d-block" style="font-size: 10.5px; font-weight: 800;">Contact Phone</small>
                        <strong style="color: #0f172a; font-size: 13.5px;"><i class="fa fa-phone text-muted m-r-4"></i> {{ $p['phone'] }}</strong>
                        <div style="margin-top: 3px;">
                            <span class="badge badge-pill badge-primary" style="background: #e0f2fe; color: #0284c7; border: 1px solid #bae6fd; font-size: 11px; font-weight: 700;">
                                {{ $p['total_visits'] }} Total Consultation{{ $p['total_visits'] > 1 ? 's' : '' }}
                            </span>
                        </div>
                    </div>

                    <!-- Last Symptoms / Reason -->
                    <div class="col-6 col-md-3 mb-2 mb-md-0">
                        <small class="text-muted text-uppercase d-block" style="font-size: 10.5px; font-weight: 800;">Latest Complaint / Date</small>
                        <span style="font-size: 12.5px; color: #334155; font-weight: 600; display: block;" class="text-truncate" title="{{ $p['last_symptoms'] }}">
                            {{ $p['last_symptoms'] }}
                        </span>
                        <small class="text-muted">
                            <i class="fa fa-calendar-o m-r-4"></i> {{ date('d M Y', strtotime($p['last_visit'])) }}
                        </small>
                    </div>

                    <!-- Actions / History Modal Trigger -->
                    <div class="col-12 col-md-2 text-md-right mt-2 mt-md-0">
                        <button type="button" class="btn btn-sm btn-doc-primary py-1 px-3" data-toggle="modal" data-target="#historyModal_{{ md5($pKey) }}" style="font-size: 12px;">
                            <i class="fa fa-history"></i> History ({{ count($p['appointments']) }})
                        </button>
                    </div>

                </div>
            </div>

            <!-- Modal: Patient's Complete Consultation History with this Doctor -->
            <div class="modal fade" id="historyModal_{{ md5($pKey) }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content rounded-4 border-0 shadow-lg overflow-hidden">
                        <div class="modal-header py-3 px-4 bg-light border-bottom d-flex align-items-center justify-content-between">
                            <h5 class="modal-title font-weight-bold" style="font-size: 16px; color: #0f172a;">
                                <i class="fa fa-user-circle text-primary m-r-5"></i> {{ $p['name'] }} &bull; Consultation History
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 22px; line-height: 1; outline: none;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body p-4">
                            <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                                <div>
                                    <strong style="font-size: 15px; color: #0f172a;">{{ $p['name'] }}</strong>
                                    <span class="badge badge-light border ml-1">{{ $p['uhid'] }}</span>
                                </div>
                                <div style="font-size: 12.5px; color: #64748b;">
                                    <i class="fa fa-phone m-r-4"></i> {{ $p['phone'] }} &bull; <i class="fa fa-envelope-o m-r-4"></i> {{ $p['email'] }}
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover mb-0" style="font-size: 13px;">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>Token</th>
                                            <th>Date & Slot</th>
                                            <th>Clinical Complaint</th>
                                            <th>Status</th>
                                            <th class="text-right">Digital Slip</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($p['appointments'] as $aptHistory)
                                            <tr>
                                                <td style="font-family: monospace; font-weight: 700; color: #00a896;">
                                                    #KKP-{{ str_pad($aptHistory->id, 5, '0', STR_PAD_LEFT) }}
                                                </td>
                                                <td>
                                                    <strong>{{ date('d M Y', strtotime($aptHistory->date)) }}</strong>
                                                    <small class="text-muted d-block">{{ $aptHistory->time }}</small>
                                                </td>
                                                <td style="max-width: 200px;">
                                                    {{ $aptHistory->message ?: 'Regular consultation' }}
                                                </td>
                                                <td>
                                                    <span class="badge badge-pill badge-light border" style="font-weight: 700;">
                                                        {{ $aptHistory->Status ?: 'Pending' }}
                                                    </span>
                                                </td>
                                                <td class="text-right">
                                                    <a href="{{ route('doctor.appointment.slip', $aptHistory->id) }}" target="_blank" class="btn btn-sm btn-light border rounded-pill px-2 py-1 font-weight-bold" style="font-size: 11px;">
                                                        <i class="fa fa-file-text-o text-primary"></i> View Slip
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer bg-light py-2 px-4 border-top">
                            <button type="button" class="btn btn-sm btn-light border rounded-pill px-3" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="doc-card text-center py-5">
                <div style="font-size: 42px; color: #cbd5e1; margin-bottom: 10px;"><i class="fa fa-users"></i></div>
                <h5 style="color: #64748b; font-weight: 700;">No Patient Records Found</h5>
                <p style="color: #94a3b8; font-size: 13px;">Patients who book OPD appointments with you will appear automatically in this directory.</p>
            </div>
        @endforelse

        <div id="noPatientMatch" class="doc-card text-center py-5" style="display: none;">
            <div style="font-size: 36px; color: #94a3b8; margin-bottom: 8px;"><i class="fa fa-search"></i></div>
            <h6 style="color: #475569; font-weight: 700;">No Matching Patients Found</h6>
            <p style="color: #94a3b8; font-size: 12.5px;">Try adjusting your search query.</p>
        </div>
    </div>

    @push('scripts')
    <script>
        function filterDocPatients() {
            const query = (document.getElementById('docPatientSearch').value || '').trim().toLowerCase();
            const items = document.querySelectorAll('.doc-patient-item');
            let visible = 0;

            items.forEach(item => {
                const search = (item.getAttribute('data-search') || '').toLowerCase();
                if (!query || search.includes(query)) {
                    item.style.display = '';
                    visible++;
                } else {
                    item.style.display = 'none';
                }
            });

            const noMatch = document.getElementById('noPatientMatch');
            if (noMatch) {
                noMatch.style.display = (visible === 0 && items.length > 0) ? '' : 'none';
            }
        }
    </script>
    @endpush

@endsection

