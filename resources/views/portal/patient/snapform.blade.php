@extends('layouts.portal')

@section('title', 'Pre-Consult Health Questionnaire - Snapforms | ZOVI LEAF')

@section('content')
<div class="snapform-wrapper pb-5">
    <!-- Top Header Banner -->
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill bg-brand-light border text-brand-contrast small fw-semibold mb-2">
                <i class="bi bi-patch-check-fill text-brand-primary"></i> Pre-Consult Clinical Intake
            </div>
            <h2 class="fw-extrabold text-brand-contrast mb-1" style="font-size: 1.65rem; letter-spacing: -0.02em;">
                Patient Medical History Questionnaire
            </h2>
            <p class="text-muted small mb-0">
                Integrated with Snapforms &amp; MediRecords Cloud EHR for <strong>Dr. Suneetha Batthala</strong>.
            </p>
        </div>

        <div class="d-flex align-items-center gap-2">
            <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-2 rounded-pill small">
                <i class="bi bi-shield-lock-fill me-1"></i> 256-bit Encrypted EHR
            </span>
        </div>
    </div>

    <!-- Active Appointment Alert if present -->
    @if($appointment)
        <div class="p-3.5 mb-4 rounded-3 border d-flex align-items-center justify-content-between flex-wrap gap-3" style="background: linear-gradient(135deg, rgba(209, 102, 70, 0.08) 0%, rgba(91, 104, 70, 0.05) 100%); border-color: rgba(209, 102, 70, 0.3) !important;">
            <div class="d-flex align-items-center gap-3">
                <div class="footer-trust-icon footer-trust-ahpra" style="width: 44px; height: 44px; font-size: 1.25rem;">
                    <i class="bi bi-calendar-check-fill"></i>
                </div>
                <div>
                    <div class="fw-bold text-brand-contrast small">Scheduled Consultation:</div>
                    <div class="text-brand-primary fw-extrabold fs-6">
                        {{ $appointment->appointment_date->format('l, d F Y') }} at {{ date('h:i A', strtotime($appointment->start_time)) }}
                    </div>
                </div>
            </div>
            <span class="badge bg-white text-brand-contrast border px-3 py-2 small fw-semibold">
                <i class="bi bi-person-fill text-brand-sage me-1"></i> {{ $appointment->doctor->full_name }}
            </span>
        </div>
    @endif

    <form action="{{ route('patient.snapform.submit') }}" method="POST" x-data="{ painScore: {{ $existingForm?->form_data['fields']['pain_score'] ?? 6 }} }">
        @csrf
        @if($appointment)
            <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
        @endif

        <!-- Section 1: Regular GP -->
        <div class="snapform-section-card">
            <div class="snapform-sec-header">
                <div class="snapform-sec-title">
                    <span class="snapform-sec-badge">1</span>
                    <span>Regular General Practitioner (GP)</span>
                </div>
                <span class="text-muted small"><i class="bi bi-hospital text-brand-sage me-1"></i> Primary Care</span>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold small text-brand-contrast">Regular GP Doctor Name *</label>
                    <div class="booking-input-wrap">
                        <i class="bi bi-person-badge booking-input-icon"></i>
                        <input type="text" name="regular_gp_name" class="form-control" placeholder="Dr. Andrew Clarke" value="{{ old('regular_gp_name', $existingForm?->regular_gp_name ?? 'Dr. Andrew Clarke') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold small text-brand-contrast">GP Practice / Medical Centre *</label>
                    <div class="booking-input-wrap">
                        <i class="bi bi-geo-alt booking-input-icon"></i>
                        <input type="text" name="regular_gp_clinic" class="form-control" placeholder="Surry Hills Family Practice, NSW" value="{{ old('regular_gp_clinic', $existingForm?->regular_gp_clinic ?? 'Surry Hills Family Practice, NSW') }}" required>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 2: Current Medications & Allergies -->
        <div class="snapform-section-card">
            <div class="snapform-sec-header">
                <div class="snapform-sec-title">
                    <span class="snapform-sec-badge">2</span>
                    <span>Current Medications &amp; Allergies</span>
                </div>
                <span class="text-muted small"><i class="bi bi-capsule text-brand-primary me-1"></i> Pharmacology</span>
            </div>

            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label fw-semibold small text-brand-contrast">List all current prescription &amp; over-the-counter medications *</label>
                    <textarea name="current_medications" class="form-control" rows="3" placeholder="e.g. Paracetamol 500mg prn, Meloxicam 7.5mg daily, Escitalopram 10mg..." style="border-radius: 12px; font-size: 0.94rem;" required>{{ old('current_medications', $existingForm?->current_medications ?? 'Paracetamol 500mg prn, Meloxicam 7.5mg') }}</textarea>
                    <div class="form-text text-muted small">Please include prescription drugs, vitamins, and regular supplements.</div>
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold small text-brand-contrast">Known Drug or Food Allergies *</label>
                    <textarea name="known_allergies" class="form-control" rows="2" placeholder="e.g. Penicillin (mild rash) or No Known Drug Allergies (NKDA)" style="border-radius: 12px; font-size: 0.94rem;" required>{{ old('known_allergies', $existingForm?->known_allergies ?? 'Penicillin (mild rash)') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Section 3: Symptoms, Pain & Sleep Severity -->
        <div class="snapform-section-card">
            <div class="snapform-sec-header">
                <div class="snapform-sec-title">
                    <span class="snapform-sec-badge">3</span>
                    <span>Clinical Symptoms &amp; Severity Profile</span>
                </div>
                <span class="text-muted small"><i class="bi bi-activity text-brand-primary me-1"></i> Diagnostic Data</span>
            </div>

            <div class="row g-4">
                <div class="col-12">
                    <label class="form-label fw-semibold small text-brand-contrast">Comprehensive Medical History &amp; Condition Details *</label>
                    <textarea name="medical_history" class="form-control" rows="4" placeholder="Describe your primary conditions, duration, previous therapies tried, and impact on daily activities..." style="border-radius: 12px; font-size: 0.94rem;" required>{{ old('medical_history', $existingForm?->medical_history ?? 'Lumbar spine disc protrusion L4-L5 since 2021. Managed with physical therapy and anti-inflammatories with limited relief.') }}</textarea>
                </div>

                <!-- Interactive Visual Pain Rating Scale -->
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label fw-semibold small text-brand-contrast mb-0">
                            Current Pain Severity Rating (0 = No Pain, 10 = Worst Imaginable) *
                        </label>
                        <span class="badge px-2.5 py-1 rounded-pill small fw-bold"
                              :class="painScore < 4 ? 'bg-success text-white' : (painScore < 7 ? 'bg-warning text-dark' : 'bg-danger text-white')">
                            Score: <span x-text="painScore"></span> / 10 (<span x-text="painScore === 0 ? 'No Pain' : (painScore < 4 ? 'Mild' : (painScore < 7 ? 'Moderate' : 'Severe'))"></span>)
                        </span>
                    </div>

                    <input type="hidden" name="pain_score" :value="painScore">
                    <div class="pain-rating-grid">
                        <template x-for="val in [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]" :key="val">
                            <div class="pain-rating-btn"
                                 :class="painScore == val ? 'active-pain' : ''"
                                 @click="painScore = val">
                                <span class="fw-bold" x-text="val"></span>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Sleep Quality Rating -->
                <div class="col-12">
                    <label class="form-label fw-semibold small text-brand-contrast">Sleep Quality &amp; Insomnia Rating *</label>
                    <div class="booking-input-wrap">
                        <i class="bi bi-moon-stars booking-input-icon"></i>
                        <select name="sleep_quality" class="form-select" required>
                            <option value="Poor - frequent waking (3+ times per night)" selected>Poor - frequent waking (3+ times per night)</option>
                            <option value="Severe insomnia - difficulty falling asleep (>90 mins)">Severe insomnia - difficulty falling asleep (>90 mins)</option>
                            <option value="Fair - occasional restless sleep">Fair - occasional restless sleep</option>
                            <option value="Good - restful 7+ hours">Good - restful 7+ hours</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 4: Clinical & Legal Consent -->
        <div class="snapform-section-card">
            <div class="snapform-sec-header">
                <div class="snapform-sec-title">
                    <span class="snapform-sec-badge">4</span>
                    <span>Clinical Governance &amp; Legal Consent</span>
                </div>
                <span class="text-muted small"><i class="bi bi-shield-check text-success me-1"></i> TGA SAS-B</span>
            </div>

            <div class="p-3 bg-light rounded-3 border mb-3" style="background-color: #FAF8F4 !important;">
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="consent_tga" id="ctga" required checked>
                    <label class="form-check-label small text-muted" for="ctga" style="line-height: 1.45;">
                        I consent to clinical review under the <strong>TGA Authorised Prescriber / SAS-B framework</strong> and understand that medicinal cannabis products are unapproved therapeutic goods in Australia.
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="consent_gp" id="cgp" required checked>
                    <label class="form-check-label small text-muted" for="cgp" style="line-height: 1.45;">
                        I authorize ZOVI LEAF clinicians to inform my regular GP of any prescribed medications for medical safety and records reconciliation in <strong>MediRecords EHR</strong>.
                    </label>
                </div>
            </div>

            <button type="submit" class="btn-booking-confirm shadow-sm mt-3">
                <span>Submit Intake Form &amp; Sync with Doctor</span>
                <i class="bi bi-cloud-arrow-up-fill fs-5"></i>
            </button>

            <div class="text-center mt-2.5 small text-muted">
                <i class="bi bi-lock-fill text-brand-sage me-1"></i> Stored securely in compliance with Australian Privacy Principles (APPs).
            </div>
        </div>
    </form>
</div>
@endsection