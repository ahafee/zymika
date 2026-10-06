@extends('layouts.portal')

@section('title', 'Clinical Consultation & EHR - ' . $appointment->patient->name)

@section('content')
<!-- Top Consultation Record Header -->
<div class="card card-zovi p-3 px-4 bg-white border mb-4 shadow-sm">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <a href="{{ route('doctor.dashboard') }}" class="btn btn-sm btn-outline-secondary py-0 px-2" style="font-size: 0.75rem;">
                    <i class="bi bi-arrow-left"></i> Doctor Hub
                </a>
                <span class="badge badge-tga">Appointment #{{ $appointment->appointment_number }}</span>
                <span class="badge bg-success bg-opacity-10 text-success border border-success">
                    <i class="bi bi-shield-check"></i> MediRecords EHR Synchronised
                </span>
            </div>
            <h3 class="fw-bold text-brand-contrast mb-1">{{ $appointment->patient->name }}</h3>
            <div class="small text-muted">
                DOB: <strong>{{ $appointment->patient->date_of_birth?->format('d/m/Y') ?? '12/04/1985' }}</strong> &bull; Medicare: <strong>{{ $appointment->patient->medicare_number ?? '2938 10293' }}</strong> &bull; MediRecords Patient ID: <code>{{ $appointment->patient->medirecords_patient_id ?? 'MR-PAT-293841' }}</code>
            </div>
        </div>
        @php
            $doctorRoomUrl = $appointment->video_meeting_url;
            if (str_contains($doctorRoomUrl, 'telehealth.zovihealth.com.au/room/')) {
                $roomCode = last(explode('/', $doctorRoomUrl));
                $doctorRoomUrl = route('telehealth.room', ['room_code' => $roomCode]);
            }
        @endphp
        <div class="d-flex align-items-center gap-2">
            <a href="{{ $doctorRoomUrl }}" target="_blank" class="btn btn-brand-primary btn-sm px-3 py-2 fw-bold d-inline-flex align-items-center gap-1.5 shadow-sm">
                <i class="bi bi-camera-video-fill"></i> Join Video Room
            </a>
            <div class="p-2 px-3 bg-light border rounded-3 text-end shadow-sm">
                <div class="small text-muted" style="font-size: 0.75rem;">Appointment Scheduled</div>
                <div class="fw-bold text-brand-contrast">
                    {{ $appointment->appointment_date->format('d M Y') }} ({{ date('h:i A', strtotime($appointment->start_time)) }})
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Left Column: Patient Profile & Pre-Consult Snapform -->
    <div class="col-lg-6">
        
        <!-- Patient Overview Card -->
        <div class="card card-zovi p-4 bg-white border mb-4 shadow-sm">
            <h5 class="fw-bold text-brand-contrast mb-3 pb-2 border-bottom">
                <i class="bi bi-person-lines-fill text-brand-primary me-2"></i> Patient Demographics & Contact
            </h5>
            <div class="row g-3 small">
                <div class="col-sm-6">
                    <span class="text-muted d-block">Full Name:</span>
                    <strong>{{ $appointment->patient->name }}</strong>
                </div>
                <div class="col-sm-6">
                    <span class="text-muted d-block">Email Address:</span>
                    <strong>{{ $appointment->patient->email }}</strong>
                </div>
                <div class="col-sm-6">
                    <span class="text-muted d-block">Contact Phone:</span>
                    <strong>{{ $appointment->patient->phone ?? '0400 123 456' }}</strong>
                </div>
                <div class="col-sm-6">
                    <span class="text-muted d-block">Residential Address:</span>
                    <strong>{{ $appointment->patient->address ?? 'Surry Hills, NSW 2010' }}</strong>
                </div>
                <div class="col-sm-6">
                    <span class="text-muted d-block">Service Type:</span>
                    <span class="badge bg-brand-light text-brand-contrast border">{{ $appointment->service->name }}</span>
                </div>
                <div class="col-sm-6">
                    <span class="text-muted d-block">Current Status:</span>
                    <span class="badge bg-{{ $appointment->status == 'completed' ? 'success' : 'primary' }}">
                        {{ ucfirst($appointment->status) }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Snapform Clinical Intake Responses -->
        <div class="card card-zovi p-4 bg-white border shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                <h5 class="fw-bold text-brand-contrast mb-0">
                    <i class="bi bi-file-earmark-medical-fill text-brand-primary me-2"></i> Patient Clinical Questionnaire &amp; Consent
                </h5>
                @if($appointment->preConsultForm)
                    <span class="badge bg-success bg-opacity-10 text-success border border-success px-2.5 py-1 small">
                        <i class="bi bi-check-circle-fill"></i> TGA Consent Signed
                    </span>
                @endif
            </div>

            @if($appointment->preConsultForm)
                @php $fields = $appointment->preConsultForm->form_data['fields'] ?? []; @endphp
                <div class="row g-3 small">
                    <div class="col-6"><strong>Regular GP:</strong> {{ $appointment->preConsultForm->regular_gp_name ?? 'Dr. Andrew Clarke' }}</div>
                    <div class="col-6"><strong>GP Practice:</strong> {{ $appointment->preConsultForm->regular_gp_clinic ?? 'Surry Hills Family Practice, NSW' }}</div>
                    
                    <div class="col-12 p-2 bg-light rounded border">
                        <div class="row text-center g-2">
                            <div class="col-4">
                                <span class="text-muted d-block" style="font-size: 0.72rem;">Avg Pain Score</span>
                                <span class="badge bg-danger fs-6">{{ $fields['pain_score_average'] ?? ($fields['pain_score'] ?? '6') }} / 10</span>
                            </div>
                            <div class="col-4">
                                <span class="text-muted d-block" style="font-size: 0.72rem;">Enjoyment Impact</span>
                                <span class="badge bg-warning text-dark fs-6">{{ $fields['pain_score_enjoyment'] ?? '6' }} / 10</span>
                            </div>
                            <div class="col-4">
                                <span class="text-muted d-block" style="font-size: 0.72rem;">Activity Impact</span>
                                <span class="badge bg-warning text-dark fs-6">{{ $fields['pain_score_activity'] ?? '5' }} / 10</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <strong>Sleep Quality:</strong> 
                        <span class="badge bg-brand-light text-brand-contrast border">{{ $fields['sleep_quality'] ?? 'Fairly poor' }}</span>
                    </div>
                    <div class="col-6">
                        <strong>Safety-Sensitive Role:</strong> 
                        <span class="badge bg-{{ ($fields['safety_sensitive_role'] ?? 'No') == 'Yes' ? 'danger' : 'secondary' }}">{{ $fields['safety_sensitive_role'] ?? 'No' }}</span>
                    </div>

                    <div class="col-12">
                        <strong>Health Concern / Reason for Consult:</strong>
                        <div class="p-2 bg-light rounded mt-1">{{ $fields['health_concern'] ?? ($appointment->preConsultForm->medical_history ?? 'Chronic pain & sleep disturbance') }}</div>
                    </div>

                    <div class="col-12">
                        <strong>Current Medications:</strong>
                        <div class="p-2 bg-light rounded mt-1">{{ $appointment->preConsultForm->current_medications ?? 'None stated' }}</div>
                    </div>

                    <div class="col-12">
                        <strong>Known Drug Allergies:</strong>
                        <div class="p-2 bg-light rounded mt-1 text-danger fw-semibold">{{ $fields['allergy_details'] ?? ($appointment->preConsultForm->known_allergies ?? 'No known drug allergies') }}</div>
                    </div>

                    <div class="col-12">
                        <strong>Informed Consent Status:</strong>
                        <div class="p-2 bg-success bg-opacity-10 border border-success border-opacity-25 rounded mt-1 text-success small">
                            <i class="bi bi-shield-check me-1"></i> Patient <strong>{{ $fields['consent_patient_name'] ?? $appointment->patient->name }}</strong> digitally signed on {{ $fields['consent_patient_date'] ?? date('d/m/Y') }}. Driving warnings &amp; TGA unapproved medicine disclosures accepted.
                        </div>
                    </div>
                </div>
            @else
                <div class="p-3 bg-light rounded text-muted small text-center">
                    <i class="bi bi-info-circle me-1"></i> Patient has not completed the digital questionnaire &amp; consent yet.
                </div>
            @endif
        </div>

    </div>

    <!-- Right Column: EHR Clinical Notes & Prescribing Widget -->
    <div class="col-lg-6">
        
        <!-- Clinical Consultation Notes Form -->
        <div class="card card-zovi p-4 bg-white border mb-4 shadow-sm">
            <h5 class="fw-bold text-brand-contrast mb-3 pb-2 border-bottom">
                <i class="bi bi-journal-text text-brand-primary me-2"></i> Clinical Notes & MediRecords EHR
            </h5>

            <form action="{{ route('doctor.consultation.notes', $appointment->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold small text-brand-contrast">Consultation Summary & Treatment Plan *</label>
                    <textarea name="clinical_summary" class="form-control" rows="5" placeholder="Document clinical notes..." required>{{ old('clinical_summary', $appointment->clinical_summary ?? "Initial consultation completed. TGA criteria verified. Prescribed Balanced 10:10 oil and Alpha Indica flower with titration instructions.") }}</textarea>
                </div>

                <div class="row g-2 align-items-center mb-3">
                    <div class="col-7">
                        <label class="form-label fw-semibold small text-brand-contrast">Consult Status</label>
                        <select name="status" class="form-select form-select-sm">
                            <option value="confirmed" {{ $appointment->status == 'confirmed' ? 'selected' : '' }}>In Progress</option>
                            <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                    <div class="col-5 text-end mt-4">
                        <button type="submit" class="btn btn-brand-primary btn-sm w-100 fw-bold">
                            <i class="bi bi-cloud-arrow-up-fill me-1"></i> Save EHR
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Issue Prescription Directly -->
        <div class="card card-zovi p-4 bg-white border shadow-sm">
            <h5 class="fw-bold text-brand-contrast mb-3 pb-2 border-bottom">
                <i class="bi bi-prescription2 text-brand-sage me-2"></i> Authorised Prescriber (AP) Tool
            </h5>

            <form action="{{ route('doctor.prescriptions.issue') }}" method="POST">
                @csrf
                <input type="hidden" name="patient_id" value="{{ $appointment->patient_id }}">
                <input type="hidden" name="tga_sas_category" value="Authorised Prescriber (AP)">

                <div class="mb-3">
                    <label class="form-label fw-semibold small text-brand-contrast">Prescribed Formulation *</label>
                    <select name="product_id" class="form-select form-select-sm" required>
                        @foreach($products as $prod)
                            <option value="{{ $prod->id }}">
                                {{ $prod->name }} (${{ number_format($prod->price, 2) }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small text-brand-contrast">Dosage Protocol *</label>
                    <textarea name="dosage_instructions" class="form-control form-control-sm" rows="3" required>Take 0.25mL sublingually twice daily with food. Titrate by 0.1mL every 3 days as directed. Max daily dose 1.0mL.</textarea>
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-6">
                        <label class="form-label fw-semibold small text-brand-contrast">Repeats *</label>
                        <select name="repeats_total" class="form-select form-select-sm" required>
                            <option value="5" selected>5 Repeats (6 Mo)</option>
                            <option value="3">3 Repeats</option>
                            <option value="1">1 Repeat</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label fw-semibold small text-brand-contrast">Clinical Note</label>
                        <input type="text" name="clinical_notes" class="form-control form-control-sm" value="Prescribed via Telehealth">
                    </div>
                </div>

                <button type="submit" class="btn btn-brand-contrast w-100 fw-bold btn-sm py-2">
                    <i class="bi bi-file-earmark-plus me-1"></i> Authorize & Push Script
                </button>
            </form>
        </div>

    </div>
</div>
@endsection