@extends('layouts.portal')

@section('title', 'Pre-Consult Health Questionnaire - Snapforms')

@section('content')
<div class="mb-4">
    <span class="badge badge-tga mb-1">Pre-Consult Clinical Assessment</span>
    <h2 class="fw-bold text-brand-contrast mb-1">Patient Medical Intake Form</h2>
    <p class="text-muted small">Integrated with Snapforms & MediRecords EHR for Dr. Suneetha Batthala.</p>
</div>

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card card-zovi p-4 p-md-5 bg-white border">
            <form action="{{ route('patient.snapform.submit') }}" method="POST">
                @csrf
                @if($appointment)
                    <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                    <div class="alert alert-info small mb-4">
                        <i class="bi bi-info-circle me-1"></i> Completing pre-consult form for consultation on <strong>{{ $appointment->appointment_date->format('d M Y') }} at {{ date('h:i A', strtotime($appointment->start_time)) }}</strong>.
                    </div>
                @endif

                <h5 class="fw-bold text-brand-contrast mb-3 pb-2 border-bottom">1. Regular General Practitioner (GP)</h5>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-brand-contrast">Regular GP Doctor Name *</label>
                        <input type="text" name="regular_gp_name" class="form-control" placeholder="Dr. John Smith" value="{{ old('regular_gp_name', $existingForm?->regular_gp_name ?? 'Dr. Smith') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-brand-contrast">GP Practice / Medical Centre *</label>
                        <input type="text" name="regular_gp_clinic" class="form-control" placeholder="Surry Hills Medical Practice" value="{{ old('regular_gp_clinic', $existingForm?->regular_gp_clinic ?? 'Surry Hills Medical Practice') }}" required>
                    </div>
                </div>

                <h5 class="fw-bold text-brand-contrast mb-3 pb-2 border-bottom">2. Current Medications & Allergies</h5>
                <div class="row g-3 mb-4">
                    <div class="col-12">
                        <label class="form-label fw-semibold small text-brand-contrast">List all current prescription & over-the-counter medications *</label>
                        <textarea name="current_medications" class="form-control" rows="3" placeholder="e.g. Paracetamol 500mg as needed, Escitalopram 10mg daily..." required>{{ old('current_medications', $existingForm?->current_medications ?? 'None stated') }}</textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold small text-brand-contrast">Known Drug or Food Allergies *</label>
                        <textarea name="known_allergies" class="form-control" rows="2" placeholder="e.g. No known drug allergies (NKDA) or Penicillin (rash)" required>{{ old('known_allergies', $existingForm?->known_allergies ?? 'No known allergies') }}</textarea>
                    </div>
                </div>

                <h5 class="fw-bold text-brand-contrast mb-3 pb-2 border-bottom">3. Symptoms & Pain Severity</h5>
                <div class="row g-3 mb-4">
                    <div class="col-12">
                        <label class="form-label fw-semibold small text-brand-contrast">Comprehensive Medical History & Condition Details *</label>
                        <textarea name="medical_history" class="form-control" rows="4" placeholder="Describe your primary conditions, when they began, and how they impact daily living..." required>{{ old('medical_history', $existingForm?->medical_history ?? 'Chronic back pain for > 2 years following injury.') }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-brand-contrast">Current Pain Severity (0 = No Pain, 10 = Worst Imaginable) *</label>
                        <select name="pain_score" class="form-select" required>
                            @for($i = 0; $i <= 10; $i++)
                                <option value="{{ $i }}" {{ ($existingForm?->form_data['fields']['pain_score'] ?? 6) == $i ? 'selected' : '' }}>
                                    {{ $i }} - {{ $i < 3 ? 'Mild' : ($i < 7 ? 'Moderate' : 'Severe') }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-brand-contrast">Sleep Quality Rating *</label>
                        <select name="sleep_quality" class="form-select" required>
                            <option value="Poor - frequent waking">Poor - frequent waking</option>
                            <option value="Severe insomnia - difficulty falling asleep">Severe insomnia - difficulty falling asleep</option>
                            <option value="Fair">Fair</option>
                            <option value="Good">Good</option>
                        </select>
                    </div>
                </div>

                <h5 class="fw-bold text-brand-contrast mb-3 pb-2 border-bottom">4. Clinical & Legal Consent</h5>
                <div class="mb-3">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="consent_tga" id="ctga" required checked>
                        <label class="form-check-label small text-muted" for="ctga">
                            I consent to clinical review under the TGA Authorised Prescriber / SAS-B framework and understand that medicinal cannabis is an unapproved therapeutic good in Australia.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="consent_gp" id="cgp" required checked>
                        <label class="form-check-label small text-muted" for="cgp">
                            I authorize ZOVI LEAF to inform my regular GP of any prescribed medications for medical safety and records reconciliation.
                        </label>
                    </div>
                </div>

                <div class="mt-4 pt-3 border-top">
                    <button type="submit" class="btn btn-brand-primary btn-lg w-100 fw-bold">
                        Submit Pre-Consult Form & Sync with MediRecords <i class="bi bi-cloud-check-fill ms-1"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection