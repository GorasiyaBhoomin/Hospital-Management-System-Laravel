@extends('doctor.layout')

@section('title', ($mode === 'edit' ? 'Edit Draft Prescription' : 'New Prescription') . ' | #KKP-' . str_pad($appointment->id, 5, '0', STR_PAD_LEFT))

@push('styles')
<style>
    .rx-form-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(15, 23, 42, 0.04);
        margin-bottom: 24px;
        overflow: hidden;
    }

    .rx-card-header {
        padding: 16px 24px;
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .rx-card-title {
        font-size: 15px;
        font-weight: 800;
        color: #0f172a;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
        letter-spacing: -0.2px;
    }

    .rx-card-body {
        padding: 24px;
    }

    /* Patient Overview Ribbon */
    .patient-summary-ribbon {
        background: linear-gradient(135deg, #69275c 0%, #4a1540 100%);
        color: #ffffff;
        border-radius: 16px;
        padding: 22px 26px;
        margin-bottom: 24px;
        box-shadow: 0 8px 24px rgba(105, 39, 92, 0.2);
    }

    .patient-summary-title {
        font-size: 20px;
        font-weight: 800;
        color: #ffffff;
        margin-bottom: 4px;
    }

    .patient-summary-sub {
        font-size: 12.5px;
        color: #e2e8f0;
    }

    .summary-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(4px);
        padding: 6px 14px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 600;
        color: #ffffff;
    }

    /* Form Inputs */
    .form-group label {
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #475569;
        margin-bottom: 6px;
    }

    .form-control-custom {
        border: 1.5px solid #cbd5e1;
        border-radius: 10px;
        padding: 10px 14px;
        font-size: 13.5px;
        color: #0f172a;
        background-color: #ffffff;
        transition: all 0.2s ease;
        width: 100%;
    }

    .form-control-custom:focus {
        border-color: #00a896;
        box-shadow: 0 0 0 3px rgba(0, 168, 150, 0.15);
        outline: none;
    }

    /* Medicine Table */
    .table-medicine th {
        background: #f1f5f9;
        font-size: 11.5px;
        font-weight: 800;
        text-transform: uppercase;
        color: #475569;
        letter-spacing: 0.5px;
        padding: 12px 10px;
        border: none;
        vertical-align: middle;
    }

    .table-medicine td {
        padding: 10px;
        vertical-align: middle;
        border-top: 1px solid #f1f5f9;
    }

    .btn-remove-med {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #fee2e2;
        color: #ef4444;
        border: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-remove-med:hover {
        background: #ef4444;
        color: #ffffff;
    }

    .btn-add-med {
        background: #f0fdfa;
        color: #00a896;
        border: 1.5px dashed #00a896;
        border-radius: 10px;
        padding: 8px 18px;
        font-size: 13px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-add-med:hover {
        background: #00a896;
        color: #ffffff;
    }

    /* Fixed Bottom Action Bar */
    .rx-sticky-footer {
        position: sticky;
        bottom: 0;
        background: #ffffff;
        border-top: 2px solid #e2e8f0;
        padding: 16px 24px;
        box-shadow: 0 -4px 15px rgba(0, 0, 0, 0.05);
        z-index: 100;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
        border-radius: 12px 12px 0 0;
        margin-top: 30px;
    }

    .btn-action-draft {
        background: #f8fafc;
        color: #334155;
        border: 1.5px solid #cbd5e1;
        font-weight: 700;
        font-size: 13.5px;
        padding: 10px 22px;
        border-radius: 50px;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-action-draft:hover {
        background: #e2e8f0;
        color: #0f172a;
    }

    .btn-action-preview {
        background: #f0f9ff;
        color: #0284c7;
        border: 1.5px solid #bae6fd;
        font-weight: 700;
        font-size: 13.5px;
        padding: 10px 22px;
        border-radius: 50px;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-action-preview:hover {
        background: #0284c7;
        color: #ffffff;
    }

    .btn-action-issue {
        background: linear-gradient(135deg, #059669 0%, #10b981 100%);
        color: #ffffff;
        border: none;
        font-weight: 800;
        font-size: 14px;
        padding: 11px 28px;
        border-radius: 50px;
        box-shadow: 0 4px 14px rgba(16, 185, 129, 0.3);
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-action-issue:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(16, 185, 129, 0.4);
        color: #ffffff;
    }
</style>
@endpush

@section('content')

@php
    $patientName = $appointment->appointmentname ?: ($patientUser->name ?? 'Patient');
    $tokenRef = '#KKP-' . str_pad($appointment->id, 5, '0', STR_PAD_LEFT);
    $uhidRef = $patientUser->patient_uhid ?? ('#PAT-' . str_pad($appointment->user_id ?? $appointment->id, 5, '0', STR_PAD_LEFT));
    $dateTs = strtotime($appointment->date);
    $formattedDate = $dateTs ? date('d M Y (D)', $dateTs) : $appointment->date;
    $timeSlot = $appointment->time ?: 'Scheduled Slot';
    $gender = $appointment->gender ?: ($patientUser->gender ?? 'N/A');
    $email = $appointment->email ?: ($patientUser->email ?? 'N/A');
    $phone = $appointment->phone ?: ($patientUser->phone ?? 'N/A');
    $age = $patientUser->age ?? '';

    $isEdit = ($mode === 'edit' && $prescription);
    $formActionUrl = $isEdit ? route('doctor.prescription.update', $prescription->id) : route('doctor.prescription.store', $appointment->id);
@endphp

<!-- Patient Overview Summary Ribbon -->
<div class="patient-summary-ribbon">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge badge-light" style="font-size: 11px; font-weight: 800; color: #69275c; text-transform: uppercase;">
                    <i class="fa fa-stethoscope"></i> OPD Consultation
                </span>
                <span style="font-family: monospace; font-size: 13px; font-weight: 700; color: #cbd5e1;">{{ $tokenRef }}</span>
            </div>
            <h2 class="patient-summary-title">{{ $patientName }}</h2>
            <div class="patient-summary-sub">
                UHID: <strong class="text-white">{{ $uhidRef }}</strong> &bull;
                Gender: <strong class="text-white">{{ ucfirst($gender) }}</strong>
                @if($age) &bull; Age: <strong class="text-white">{{ $age }} yrs</strong> @endif
                &bull; Phone: <strong class="text-white">{{ $phone }}</strong>
            </div>
        </div>

        <div class="d-flex flex-wrap gap-2">
            <div class="summary-pill">
                <i class="fa fa-calendar-check-o"></i> {{ $formattedDate }}
            </div>
            <div class="summary-pill">
                <i class="fa fa-clock-o"></i> {{ $timeSlot }}
            </div>
            <div class="summary-pill">
                <i class="fa fa-user-md"></i> Dr. {{ $doctor->username }}
            </div>
            <a href="{{ route('doctor.appointments') }}" class="btn btn-sm btn-light rounded-pill px-3 font-weight-bold" style="color: #69275c;">
                <i class="fa fa-arrow-left"></i> Consultations
            </a>
        </div>
    </div>
</div>

<!-- Main Prescription Form -->
<form id="prescriptionForm" action="{{ $formActionUrl }}" method="POST">
    @csrf
    <input type="hidden" name="action" id="prescriptionFormAction" value="draft">

    <!-- Card 1: Clinical Findings & Diagnosis -->
    <div class="rx-form-card">
        <div class="rx-card-header">
            <h3 class="rx-card-title">
                <i class="fa fa-stethoscope text-primary"></i> 1. Clinical Examination & Diagnosis
            </h3>
            <span class="badge badge-pill badge-primary" style="font-size: 11px;">Required</span>
        </div>
        <div class="rx-card-body">
            <div class="row">
                <!-- Symptoms -->
                <div class="col-md-8 mb-3">
                    <div class="form-group">
                        <label for="symptoms">Chief Complaints / Presenting Symptoms</label>
                        <textarea class="form-control form-control-custom" id="symptoms" name="symptoms" rows="2" placeholder="e.g. High fever, dry cough, throat irritation, body aches...">{{ old('symptoms', $isEdit ? $prescription->symptoms : ($appointment->message ?: $appointment->massage)) }}</textarea>
                    </div>
                </div>

                <!-- Symptoms Duration -->
                <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <label for="symptoms_duration">Symptoms Duration</label>
                        <input type="text" class="form-control form-control-custom" id="symptoms_duration" name="symptoms_duration" placeholder="e.g. 3 days, 1 week, 2 months" value="{{ old('symptoms_duration', $isEdit ? $prescription->symptoms_duration : '') }}">
                    </div>
                </div>

                <!-- Diagnosis (Mandatory) -->
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="diagnosis" class="text-danger">
                            Primary Clinical Diagnosis <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control form-control-custom" id="diagnosis" name="diagnosis" required placeholder="e.g. Acute Viral Upper Respiratory Tract Infection / Essential Hypertension" value="{{ old('diagnosis', $isEdit ? $prescription->diagnosis : '') }}" style="border-left: 4px solid #00a896; font-weight: 700; font-size: 14px;">
                        @error('diagnosis')
                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Clinical Notes -->
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="clinical_notes">Clinical Observations & Physical Examination Notes</label>
                        <textarea class="form-control form-control-custom" id="clinical_notes" name="clinical_notes" rows="2" placeholder="BP: 120/80 mmHg, Pulse: 76 bpm, Chest: Clear, SpO2: 99%...">{{ old('clinical_notes', $isEdit ? $prescription->clinical_notes : '') }}</textarea>
                    </div>
                </div>

                <!-- Medical History -->
                <div class="col-md-3 mb-3">
                    <div class="form-group">
                        <label for="medical_history">Medical / Surgical History</label>
                        <textarea class="form-control form-control-custom" id="medical_history" name="medical_history" rows="2" placeholder="e.g. Diabetic (Type 2, 5 yrs), Hypothyroid...">{{ old('medical_history', $isEdit ? $prescription->medical_history : '') }}</textarea>
                    </div>
                </div>

                <!-- Known Allergies -->
                <div class="col-md-3 mb-3">
                    <div class="form-group">
                        <label for="allergies" class="text-danger">
                            <i class="fa fa-exclamation-triangle"></i> Known Allergies
                        </label>
                        <textarea class="form-control form-control-custom" id="allergies" name="allergies" rows="2" placeholder="e.g. Penicillin, Sulfa drugs, No known drug allergies (NKDA)...">{{ old('allergies', $isEdit ? $prescription->allergies : 'No known drug allergies (NKDA)') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 2: Prescribed Medications (℞) -->
    <div class="rx-form-card">
        <div class="rx-card-header">
            <div>
                <h3 class="rx-card-title">
                    <span style="font-family: serif; font-size: 20px; font-weight: 900; color: #69275c;">℞</span>
                    2. Prescribed Medications
                </h3>
                <small class="text-muted">Add one or more medications with appropriate dosage, route, frequency and instructions.</small>
            </div>
            <button type="button" class="btn-add-med" onclick="addMedicineRow()">
                <i class="fa fa-plus-circle"></i> Add Another Medicine
            </button>
        </div>
        <div class="rx-card-body p-0">
            <div class="table-responsive">
                <table class="table table-medicine mb-0" id="medicinesTable">
                    <thead>
                        <tr>
                            <th style="width: 40px; text-align: center;">#</th>
                            <th style="min-width: 200px;">Medicine Name & Formulation <span class="text-danger">*</span></th>
                            <th style="width: 120px;">Dosage</th>
                            <th style="width: 150px;">Frequency</th>
                            <th style="width: 120px;">Duration</th>
                            <th style="width: 120px;">Route</th>
                            <th style="min-width: 180px;">Special Instructions</th>
                            <th style="width: 50px; text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="medicineTableBody">
                        @php
                            $existingMeds = $isEdit ? $prescription->medicines : collect([]);
                        @endphp

                        @if($existingMeds->count() > 0)
                            @foreach($existingMeds as $index => $med)
                                <tr class="med-row">
                                    <td class="text-center med-index font-weight-bold text-muted">{{ $index + 1 }}</td>
                                    <td>
                                        <input type="text" name="medicines[{{ $index }}][medicine_name]" class="form-control form-control-custom med-name" placeholder="e.g. Tab. Paracetamol 650mg" value="{{ $med->medicine_name }}" required>
                                    </td>
                                    <td>
                                        <input type="text" name="medicines[{{ $index }}][dosage]" class="form-control form-control-custom med-dosage" placeholder="1 Tab / 500mg" value="{{ $med->dosage }}">
                                    </td>
                                    <td>
                                        <select name="medicines[{{ $index }}][frequency]" class="form-control form-control-custom med-frequency">
                                            <option value="1-0-1 (After Meals)" {{ $med->frequency === '1-0-1 (After Meals)' ? 'selected' : '' }}>1-0-1 (Morning & Night)</option>
                                            <option value="1-0-0 (Morning)" {{ $med->frequency === '1-0-0 (Morning)' ? 'selected' : '' }}>1-0-0 (Once Morning)</option>
                                            <option value="0-0-1 (Night)" {{ $med->frequency === '0-0-1 (Night)' ? 'selected' : '' }}>0-0-1 (Once Night)</option>
                                            <option value="1-1-1 (TDS - Thrice Daily)" {{ $med->frequency === '1-1-1 (TDS - Thrice Daily)' ? 'selected' : '' }}>1-1-1 (Thrice Daily)</option>
                                            <option value="1-1-1-1 (QID - 4 times)" {{ $med->frequency === '1-1-1-1 (QID - 4 times)' ? 'selected' : '' }}>1-1-1-1 (4 times daily)</option>
                                            <option value="Once Daily (OD)" {{ $med->frequency === 'Once Daily (OD)' ? 'selected' : '' }}>Once Daily (OD)</option>
                                            <option value="SOS / When Required" {{ $med->frequency === 'SOS / When Required' ? 'selected' : '' }}>SOS / When Required</option>
                                            <option value="Twice a Week" {{ $med->frequency === 'Twice a Week' ? 'selected' : '' }}>Twice a Week</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="medicines[{{ $index }}][duration]" class="form-control form-control-custom med-duration" placeholder="5 Days" value="{{ $med->duration }}">
                                    </td>
                                    <td>
                                        <select name="medicines[{{ $index }}][route]" class="form-control form-control-custom med-route">
                                            <option value="Oral" {{ $med->route === 'Oral' ? 'selected' : '' }}>Oral</option>
                                            <option value="Topical" {{ $med->route === 'Topical' ? 'selected' : '' }}>Topical (Apply)</option>
                                            <option value="Inhalation" {{ $med->route === 'Inhalation' ? 'selected' : '' }}>Inhalation</option>
                                            <option value="IV" {{ $med->route === 'IV' ? 'selected' : '' }}>IV</option>
                                            <option value="IM" {{ $med->route === 'IM' ? 'selected' : '' }}>IM</option>
                                            <option value="Sublingual" {{ $med->route === 'Sublingual' ? 'selected' : '' }}>Sublingual</option>
                                            <option value="Eye Drops" {{ $med->route === 'Eye Drops' ? 'selected' : '' }}>Eye Drops</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="medicines[{{ $index }}][instructions]" class="form-control form-control-custom med-instructions" placeholder="Take after food with water" value="{{ $med->instructions }}">
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn-remove-med" onclick="removeMedicineRow(this)" title="Remove medicine">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <!-- Default 1st Blank Row -->
                            <tr class="med-row">
                                <td class="text-center med-index font-weight-bold text-muted">1</td>
                                <td>
                                    <input type="text" name="medicines[0][medicine_name]" class="form-control form-control-custom med-name" placeholder="e.g. Tab. Paracetamol 650mg" required>
                                </td>
                                <td>
                                    <input type="text" name="medicines[0][dosage]" class="form-control form-control-custom med-dosage" placeholder="1 Tab / 500mg" value="1 Tab">
                                </td>
                                <td>
                                    <select name="medicines[0][frequency]" class="form-control form-control-custom med-frequency">
                                        <option value="1-0-1 (After Meals)" selected>1-0-1 (Morning & Night)</option>
                                        <option value="1-0-0 (Morning)">1-0-0 (Once Morning)</option>
                                        <option value="0-0-1 (Night)">0-0-1 (Once Night)</option>
                                        <option value="1-1-1 (TDS - Thrice Daily)">1-1-1 (Thrice Daily)</option>
                                        <option value="1-1-1-1 (QID - 4 times)">1-1-1-1 (4 times daily)</option>
                                        <option value="Once Daily (OD)">Once Daily (OD)</option>
                                        <option value="SOS / When Required">SOS / When Required</option>
                                        <option value="Twice a Week">Twice a Week</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="medicines[0][duration]" class="form-control form-control-custom med-duration" placeholder="5 Days" value="5 Days">
                                </td>
                                <td>
                                    <select name="medicines[0][route]" class="form-control form-control-custom med-route">
                                        <option value="Oral" selected>Oral</option>
                                        <option value="Topical">Topical (Apply)</option>
                                        <option value="Inhalation">Inhalation</option>
                                        <option value="IV">IV</option>
                                        <option value="IM">IM</option>
                                        <option value="Sublingual">Sublingual</option>
                                        <option value="Eye Drops">Eye Drops</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="medicines[0][instructions]" class="form-control form-control-custom med-instructions" placeholder="Take after food with water" value="Take after food">
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn-remove-med" onclick="removeMedicineRow(this)" title="Remove medicine">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Quick Preset Helper Pill Buttons -->
            <div class="p-3 bg-light border-top d-flex align-items-center gap-2 flex-wrap">
                <span style="font-size: 11.5px; font-weight: 700; color: #64748b; text-transform: uppercase;">Quick Add Preset:</span>
                <button type="button" class="btn btn-xs btn-outline-secondary rounded-pill px-2 py-1" onclick="insertPresetMed('Tab. Paracetamol 650mg', '1 Tab', 'SOS / When Required', '3 Days', 'Oral', 'Take after food for fever')">+ Paracetamol 650</button>
                <button type="button" class="btn btn-xs btn-outline-secondary rounded-pill px-2 py-1" onclick="insertPresetMed('Cap. Amoxicillin 500mg', '1 Cap', '1-0-1 (After Meals)', '5 Days', 'Oral', 'Complete 5 days antibiotic course')">+ Amoxicillin 500</button>
                <button type="button" class="btn btn-xs btn-outline-secondary rounded-pill px-2 py-1" onclick="insertPresetMed('Tab. Pantoprazole 40mg', '1 Tab', '1-0-0 (Morning)', '7 Days', 'Oral', 'Take empty stomach 30 mins before breakfast')">+ Pantoprazole 40</button>
                <button type="button" class="btn btn-xs btn-outline-secondary rounded-pill px-2 py-1" onclick="insertPresetMed('Tab. Cetirizine 10mg', '1 Tab', '0-0-1 (Night)', '5 Days', 'Oral', 'Take before bedtime')">+ Cetirizine 10</button>
                <button type="button" class="btn btn-xs btn-outline-secondary rounded-pill px-2 py-1" onclick="insertPresetMed('Syr. Cough Relief (Dextromethorphan)', '10 ml', '1-1-1 (TDS - Thrice Daily)', '5 Days', 'Oral', 'Take after food')">+ Cough Syrup</button>
            </div>
        </div>
    </div>

    <!-- Card 3: Medical Advice, Lifestyle & Follow-Up -->
    <div class="rx-form-card">
        <div class="rx-card-header">
            <h3 class="rx-card-title">
                <i class="fa fa-heartbeat text-primary"></i> 3. Clinical Advice, Dietary Guidance & Follow-Up
            </h3>
        </div>
        <div class="rx-card-body">
            <div class="row">
                <!-- Medical Advice -->
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="medical_advice">Medical Advice & Dietary Recommendations</label>
                        <textarea class="form-control form-control-custom" id="medical_advice" name="medical_advice" rows="3" placeholder="e.g. Adequate hydration (3L water daily), light warm meals, salt restriction, rest for 3 days...">{{ old('medical_advice', $isEdit ? $prescription->medical_advice : '') }}</textarea>
                    </div>
                </div>

                <!-- Additional Instructions / Labs -->
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="additional_instructions">Recommended Investigations / Lab Tests / Additional Notes</label>
                        <textarea class="form-control form-control-custom" id="additional_instructions" name="additional_instructions" rows="3" placeholder="e.g. CBC, ESR, Chest X-Ray PA View if fever persists beyond 3 days...">{{ old('additional_instructions', $isEdit ? $prescription->additional_instructions : '') }}</textarea>
                    </div>
                </div>

                <!-- Follow-Up Required -->
                <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <label>Follow-Up Consultation Required?</label>
                        <div class="d-flex align-items-center gap-3 mt-1">
                            <label class="d-inline-flex align-items-center gap-2 cursor-pointer font-weight-bold" style="font-size: 13.5px; text-transform: none; color: #0f172a;">
                                <input type="radio" name="follow_up_required" value="1" id="followUpYes" {{ old('follow_up_required', $isEdit ? ($prescription->follow_up_required ? '1' : '0') : '1') == '1' ? 'checked' : '' }} onchange="toggleFollowUpDate(true)">
                                <span class="text-success"><i class="fa fa-check-circle"></i> Yes, Required</span>
                            </label>
                            <label class="d-inline-flex align-items-center gap-2 cursor-pointer font-weight-bold" style="font-size: 13.5px; text-transform: none; color: #64748b;">
                                <input type="radio" name="follow_up_required" value="0" id="followUpNo" {{ old('follow_up_required', $isEdit ? ($prescription->follow_up_required ? '1' : '0') : '1') == '0' ? 'checked' : '' }} onchange="toggleFollowUpDate(false)">
                                <span><i class="fa fa-times-circle"></i> No (SOS Only)</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Follow-Up Date -->
                <div class="col-md-4 mb-3" id="followUpDateWrapper">
                    <div class="form-group">
                        <label for="follow_up_date">Scheduled Follow-Up Date</label>
                        <input type="date" class="form-control form-control-custom" id="follow_up_date" name="follow_up_date" min="{{ date('Y-m-d', strtotime('+1 day')) }}" value="{{ old('follow_up_date', $isEdit && $prescription->follow_up_date ? date('Y-m-d', strtotime($prescription->follow_up_date)) : date('Y-m-d', strtotime('+5 days'))) }}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sticky Bottom Actions Toolbar -->
    <div class="rx-sticky-footer">
        <div>
            <a href="{{ route('doctor.appointments') }}" class="btn btn-outline-secondary rounded-pill px-3 font-weight-bold" style="font-size: 13px;">
                <i class="fa fa-arrow-left"></i> Cancel & Return
            </a>
        </div>

        <div class="d-flex align-items-center gap-2">
            <!-- 1. Live Preview Button -->
            <button type="button" class="btn-action-preview" onclick="openLivePreviewModal()">
                <i class="fa fa-eye"></i> Preview Prescription
            </button>

            <!-- 2. Save as Draft -->
            <button type="button" class="btn-action-draft" onclick="submitFormWithAction('draft')">
                <i class="fa fa-save text-warning"></i> Save Draft
            </button>

            <!-- 3. Finalize & Issue to Patient -->
            <button type="button" class="btn-action-issue" onclick="confirmIssuePrescription()">
                <i class="fa fa-paper-plane"></i> Finalize & Issue Prescription
            </button>
        </div>
    </div>
</form>

<!-- Modal: Live Prescription Preview -->
<div class="modal fade" id="rxPreviewModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" style="max-width: 850px;">
        <div class="modal-content" style="border-radius: 16px; border: none; overflow: hidden; box-shadow: 0 20px 50px rgba(0,0,0,0.25);">
            <div class="modal-header py-3 px-4" style="background: #69275c; color: #fff;">
                <h5 class="modal-title font-weight-bold" style="font-size: 16px;">
                    <i class="fa fa-stethoscope m-r-5"></i> Prescription Live Preview
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" style="opacity: 0.9;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4" id="previewModalBodyContent" style="background: #f8fafc; max-height: 75vh; overflow-y: auto;">
                <!-- Populated dynamically via JS -->
            </div>
            <div class="modal-footer py-2 px-4 bg-light">
                <button type="button" class="btn btn-light border rounded-pill px-3 font-weight-bold" data-dismiss="modal">Close Preview</button>
                <button type="button" class="btn btn-success rounded-pill px-4 font-weight-bold" onclick="$('#rxPreviewModal').modal('hide'); confirmIssuePrescription();">
                    <i class="fa fa-paper-plane"></i> Issue This Prescription
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    let medRowIndex = {{ $isEdit ? max(1, $prescription->medicines->count()) : 1 }};

    function addMedicineRow() {
        const tbody = document.getElementById('medicineTableBody');
        const tr = document.createElement('tr');
        tr.className = 'med-row';

        tr.innerHTML = `
            <td class="text-center med-index font-weight-bold text-muted">${tbody.children.length + 1}</td>
            <td>
                <input type="text" name="medicines[${medRowIndex}][medicine_name]" class="form-control form-control-custom med-name" placeholder="e.g. Tab. Paracetamol 650mg" required>
            </td>
            <td>
                <input type="text" name="medicines[${medRowIndex}][dosage]" class="form-control form-control-custom med-dosage" placeholder="1 Tab / 500mg" value="1 Tab">
            </td>
            <td>
                <select name="medicines[${medRowIndex}][frequency]" class="form-control form-control-custom med-frequency">
                    <option value="1-0-1 (After Meals)" selected>1-0-1 (Morning & Night)</option>
                    <option value="1-0-0 (Morning)">1-0-0 (Once Morning)</option>
                    <option value="0-0-1 (Night)">0-0-1 (Once Night)</option>
                    <option value="1-1-1 (TDS - Thrice Daily)">1-1-1 (Thrice Daily)</option>
                    <option value="1-1-1-1 (QID - 4 times)">1-1-1-1 (4 times daily)</option>
                    <option value="Once Daily (OD)">Once Daily (OD)</option>
                    <option value="SOS / When Required">SOS / When Required</option>
                    <option value="Twice a Week">Twice a Week</option>
                </select>
            </td>
            <td>
                <input type="text" name="medicines[${medRowIndex}][duration]" class="form-control form-control-custom med-duration" placeholder="5 Days" value="5 Days">
            </td>
            <td>
                <select name="medicines[${medRowIndex}][route]" class="form-control form-control-custom med-route">
                    <option value="Oral" selected>Oral</option>
                    <option value="Topical">Topical (Apply)</option>
                    <option value="Inhalation">Inhalation</option>
                    <option value="IV">IV</option>
                    <option value="IM">IM</option>
                    <option value="Sublingual">Sublingual</option>
                    <option value="Eye Drops">Eye Drops</option>
                </select>
            </td>
            <td>
                <input type="text" name="medicines[${medRowIndex}][instructions]" class="form-control form-control-custom med-instructions" placeholder="Take after food with water" value="Take after food">
            </td>
            <td class="text-center">
                <button type="button" class="btn-remove-med" onclick="removeMedicineRow(this)" title="Remove medicine">
                    <i class="fa fa-trash-o"></i>
                </button>
            </td>
        `;

        tbody.appendChild(tr);
        medRowIndex++;
        updateMedicineIndices();
    }

    function removeMedicineRow(btn) {
        const tbody = document.getElementById('medicineTableBody');
        if (tbody.children.length <= 1) {
            alert('At least one medicine row should be present.');
            return;
        }
        btn.closest('tr').remove();
        updateMedicineIndices();
    }

    function updateMedicineIndices() {
        const rows = document.querySelectorAll('#medicineTableBody tr');
        rows.forEach((row, i) => {
            const indexCell = row.querySelector('.med-index');
            if (indexCell) indexCell.innerText = i + 1;
        });
    }

    function insertPresetMed(name, dosage, freq, dur, route, instructions) {
        addMedicineRow();
        const tbody = document.getElementById('medicineTableBody');
        const lastRow = tbody.lastElementChild;
        if (lastRow) {
            lastRow.querySelector('.med-name').value = name;
            lastRow.querySelector('.med-dosage').value = dosage;
            lastRow.querySelector('.med-frequency').value = freq;
            lastRow.querySelector('.med-duration').value = dur;
            lastRow.querySelector('.med-route').value = route;
            lastRow.querySelector('.med-instructions').value = instructions;
        }
    }

    function toggleFollowUpDate(show) {
        const wrapper = document.getElementById('followUpDateWrapper');
        if (wrapper) {
            wrapper.style.display = show ? 'block' : 'none';
        }
    }

    function submitFormWithAction(action) {
        document.getElementById('prescriptionFormAction').value = action;
        const form = document.getElementById('prescriptionForm');
        
        // Check diagnosis validation
        const diagnosis = document.getElementById('diagnosis').value.trim();
        if (!diagnosis) {
            alert('Please provide a Primary Clinical Diagnosis before saving.');
            document.getElementById('diagnosis').focus();
            return;
        }

        form.submit();
    }

    function confirmIssuePrescription() {
        const diagnosis = document.getElementById('diagnosis').value.trim();
        if (!diagnosis) {
            alert('Please provide a Primary Clinical Diagnosis before issuing.');
            document.getElementById('diagnosis').focus();
            return;
        }

        // Validate that at least one medicine has a name
        let hasMedicine = false;
        document.querySelectorAll('.med-name').forEach(inp => {
            if (inp.value.trim().length > 0) hasMedicine = true;
        });

        if (!hasMedicine) {
            if (!confirm('No medicines have been entered in the prescription. Do you still want to issue advice-only prescription?')) {
                return;
            }
        }

        if (confirm('Are you sure you want to officially ISSUE this prescription?\n\nOnce issued, it will be finalized, published to the patient portal, and locked from further changes.')) {
            submitFormWithAction('issue');
        }
    }

    // Modal Live Preview Renderer
    function openLivePreviewModal() {
        const patientName = "{{ $patientName }}";
        const uhid = "{{ $uhidRef }}";
        const doctorName = "Dr. {{ $doctor->username }}";
        const doctorSpeciality = "{{ $doctor->departmentname ?: 'Consultant Specialist' }}";
        const appointmentRef = "{{ $tokenRef }}";
        const consultationDate = "{{ $formattedDate }}";

        const diagnosis = document.getElementById('diagnosis').value.trim() || 'Not specified';
        const symptoms = document.getElementById('symptoms').value.trim() || 'None recorded';
        const duration = document.getElementById('symptoms_duration').value.trim() || 'N/A';
        const notes = document.getElementById('clinical_notes').value.trim() || 'None';
        const allergies = document.getElementById('allergies').value.trim() || 'No known drug allergies';
        const advice = document.getElementById('medical_advice').value.trim() || 'Standard clinical rest & hydration.';
        const followUpReq = document.getElementById('followUpYes').checked;
        const followUpDate = document.getElementById('follow_up_date').value || 'N/A';

        // Collect Medicines
        let medRowsHtml = '';
        const rows = document.querySelectorAll('#medicineTableBody tr');
        let count = 0;
        rows.forEach((row, i) => {
            const name = row.querySelector('.med-name')?.value.trim();
            if (name) {
                count++;
                const dosage = row.querySelector('.med-dosage')?.value.trim() || '-';
                const freq = row.querySelector('.med-frequency')?.value || '-';
                const dur = row.querySelector('.med-duration')?.value.trim() || '-';
                const route = row.querySelector('.med-route')?.value || 'Oral';
                const inst = row.querySelector('.med-instructions')?.value.trim() || '-';
                medRowsHtml += `
                    <tr>
                        <td style="font-weight: 700; color: #64748b;">${count}</td>
                        <td style="font-weight: 800; color: #0f172a;">${name}</td>
                        <td>${dosage}</td>
                        <td><span class="badge badge-light border text-primary font-weight-bold">${freq}</span></td>
                        <td>${dur}</td>
                        <td>${route}</td>
                        <td style="color: #475569; font-size: 12.5px;">${inst}</td>
                    </tr>
                `;
            }
        });

        if (!medRowsHtml) {
            medRowsHtml = '<tr><td colspan="7" class="text-center text-muted py-3">No medications added yet.</td></tr>';
        }

        const html = `
            <div style="background: #ffffff; border: 1px solid #cbd5e1; border-radius: 12px; padding: 24px; font-family: 'Plus Jakarta Sans', sans-serif;">
                <!-- Hospital Letterhead -->
                <div style="border-bottom: 2px solid #69275c; padding-bottom: 14px; margin-bottom: 16px; display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <h4 style="font-weight: 800; color: #69275c; margin: 0; font-size: 18px;">KK PATEL SUPER SPECIALITY HOSPITAL</h4>
                        <small style="color: #64748b;">Bhuj - Mirzapar Highway, Bhuj, Kutch, Gujarat 370001 &bull; NABH Accredited</small>
                    </div>
                    <div style="text-align: right;">
                        <span class="badge badge-warning text-dark font-weight-bold" style="font-size: 11px;">PREVIEW ONLY</span>
                    </div>
                </div>

                <!-- Doctor & Patient Row -->
                <div class="row mb-3" style="font-size: 13px;">
                    <div class="col-6" style="border-right: 1px solid #e2e8f0;">
                        <span style="font-size: 10px; font-weight: 800; text-transform: uppercase; color: #64748b;">CONSULTANT SPECIALIST</span>
                        <div style="font-size: 15px; font-weight: 800; color: #0f172a;">${doctorName}</div>
                        <div style="color: #00a896; font-weight: 600;">${doctorSpeciality}</div>
                    </div>
                    <div class="col-6">
                        <span style="font-size: 10px; font-weight: 800; text-transform: uppercase; color: #64748b;">PATIENT DETAILS</span>
                        <div style="font-size: 15px; font-weight: 800; color: #0f172a;">${patientName}</div>
                        <div style="color: #64748b;">UHID: <strong>${uhid}</strong> &bull; Token: <strong>${appointmentRef}</strong></div>
                    </div>
                </div>

                <!-- Diagnosis & Symptoms -->
                <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px 16px; margin-bottom: 16px;">
                    <div style="margin-bottom: 6px;">
                        <strong style="color: #69275c; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px;">DIAGNOSIS:</strong>
                        <span style="font-weight: 800; font-size: 15px; color: #0f172a; margin-left: 8px;">${diagnosis}</span>
                    </div>
                    <div style="font-size: 12.5px; color: #475569;">
                        <strong>Symptoms:</strong> ${symptoms} (${duration}) &bull;
                        <strong class="text-danger">Allergies:</strong> ${allergies}
                    </div>
                </div>

                <!-- Medicines Table -->
                <div style="margin-bottom: 16px;">
                    <div style="font-size: 18px; font-weight: 900; color: #69275c; margin-bottom: 8px; font-family: serif;">℞ Prescribed Medications</div>
                    <table class="table table-bordered table-sm mb-0" style="font-size: 12.5px;">
                        <thead style="background: #f1f5f9;">
                            <tr>
                                <th>#</th>
                                <th>Medicine</th>
                                <th>Dosage</th>
                                <th>Frequency</th>
                                <th>Duration</th>
                                <th>Route</th>
                                <th>Instructions</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${medRowsHtml}
                        </tbody>
                    </table>
                </div>

                <!-- Advice & Followup -->
                <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px 16px; font-size: 13px;">
                    <div><strong>Medical Advice:</strong> ${advice}</div>
                    <div style="margin-top: 6px;">
                        <strong>Follow-up:</strong> ${followUpReq ? '<span class="text-success font-weight-bold">Scheduled on ' + followUpDate + '</span>' : '<span class="text-muted">As required (SOS)</span>'}
                    </div>
                </div>
            </div>
        `;

        document.getElementById('previewModalBodyContent').innerHTML = html;
        $('#rxPreviewModal').modal('show');
    }
</script>
@endpush

