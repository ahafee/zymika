@extends('layouts.portal')

@section('title', 'Pre-Consultation Questionnaire & Informed Consent - ZYMIKA HEALTH')

@push('styles')
<style>
.clinical-card {
    background: #FFFFFF;
    border-radius: var(--radius-lg);
    border: 1px solid rgba(15, 45, 89, 0.12);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
    padding: 2rem;
    margin-bottom: 2rem;
    transition: all 0.25s ease;
}
.clinical-card:hover {
    border-color: rgba(58, 163, 162, 0.3);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
}
.clinical-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-bottom: 1.25rem;
    margin-bottom: 1.75rem;
    border-bottom: 1px solid rgba(15, 45, 89, 0.08);
}
.clinical-sec-num {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    background: var(--brand-contrast);
    color: #ffffff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-weight: 800;
    font-size: 1.05rem;
}
.choice-pill {
    cursor: pointer;
    border: 1px solid rgba(15, 45, 89, 0.2);
    border-radius: 12px;
    padding: 0.65rem 1rem;
    background: #fdfdfd;
    color: var(--brand-contrast);
    font-weight: 500;
    font-size: 0.9rem;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    user-select: none;
}
.choice-pill:hover {
    border-color: var(--brand-primary);
    background: #FFFFFF;
}
.choice-pill input[type="checkbox"],
.choice-pill input[type="radio"] {
    accent-color: var(--brand-primary);
    width: 17px;
    height: 17px;
    margin-top: 0;
}
.choice-pill.active {
    background: #FFFFFF;
    border-color: var(--brand-primary);
    box-shadow: 0 0 0 2px rgba(58, 163, 162, 0.2);
}
.pain-score-pill {
    width: 44px;
    height: 44px;
    border-radius: 10px;
    border: 1px solid rgba(15, 45, 89, 0.2);
    background: #fdfdfd;
    color: var(--brand-contrast);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.2s ease;
}
.pain-score-pill:hover {
    background: #FFFFFF;
    border-color: var(--brand-primary);
}
.pain-score-pill.active {
    background: var(--brand-primary);
    color: #FFFFFF;
    border-color: var(--brand-primary);
    box-shadow: 0 4px 12px rgba(58, 163, 162, 0.35);
}
.consent-item-card {
    background: #f8fbfb;
    border: 1px solid rgba(15, 45, 89, 0.1);
    border-radius: 12px;
    padding: 1rem 1.25rem;
    margin-bottom: 0.75rem;
    transition: all 0.2s ease;
}
.consent-item-card:hover {
    background: #FFFFFF;
    border-color: rgba(58, 163, 162, 0.3);
}
.crisis-alert-box {
    background: #FFF5F5;
    border: 1px solid #FEB2B2;
    border-radius: 14px;
    padding: 1.25rem;
    color: #9B1C1C;
}
</style>
@endpush

@section('content')
<div class="snapform-wrapper pb-5" x-data="snapformApp()">
    
    <!-- Top Header Banner -->
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill bg-brand-light border text-brand-contrast small fw-semibold mb-2">
                <i class="bi bi-file-earmark-medical-fill text-brand-primary"></i> ZYMIKA HEALTH Clinical Intake &amp; Consent
            </div>
            <h2 class="fw-extrabold text-brand-contrast mb-1" style="font-size: 1.75rem; letter-spacing: -0.02em;">
                Pre-Consultation Health Questionnaire &amp; Informed Consent
            </h2>
            <p class="text-muted small mb-0">
                Authorized Prescriber Telehealth Intake for <strong>Dr. Suneetha Batthala</strong> &bull; Level 1, 63-73 Ann St, Surry Hills NSW 2010
            </p>
        </div>

        <div class="d-flex align-items-center gap-2">
            <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-2 rounded-pill small">
                <i class="bi bi-shield-lock-fill me-1"></i> 256-bit Encrypted EHR
            </span>
        </div>
    </div>

    <!-- Active Appointment Banner -->
    @if($appointment)
        <div class="p-3.5 mb-4 rounded-3 border d-flex align-items-center justify-content-between flex-wrap gap-3" style="background: linear-gradient(135deg, rgba(58, 163, 162, 0.08) 0%, rgba(26, 155, 140, 0.05) 100%); border-color: rgba(58, 163, 162, 0.3) !important;">
            <div class="d-flex align-items-center gap-3">
                <div class="footer-trust-icon footer-trust-ahpra" style="width: 44px; height: 44px; font-size: 1.25rem;">
                    <i class="bi bi-calendar-check-fill"></i>
                </div>
                <div>
                    <div class="fw-bold text-brand-contrast small">Scheduled Consultation Session:</div>
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

    <!-- Step Navigation Pills -->
    <div class="d-flex gap-2 mb-4 p-1.5 bg-white rounded-3 border shadow-xs">
        <button type="button" class="btn flex-grow-1 py-2.5 fw-bold text-center rounded-2 transition"
                :class="currentTab === 'questionnaire' ? 'btn-brand-primary' : 'btn-light text-brand-contrast'"
                @click="currentTab = 'questionnaire'">
            <i class="bi bi-list-check me-1.5"></i> Part 1: Health Questionnaire (55 Questions)
        </button>
        <button type="button" class="btn flex-grow-1 py-2.5 fw-bold text-center rounded-2 transition"
                :class="currentTab === 'consent' ? 'btn-brand-primary' : 'btn-light text-brand-contrast'"
                @click="currentTab = 'consent'">
            <i class="bi bi-pen-fill me-1.5"></i> Part 2: Informed Consent (Medicinal Cannabis)
        </button>
    </div>

    <form action="{{ route('patient.snapform.submit') }}" method="POST" id="snapformMain">
        @csrf
        @if($appointment)
            <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
        @endif

        <!-- ========================================================================= -->
        <!-- PART 1: PRE-CONSULTATION HEALTH QUESTIONNAIRE (8 SECTIONS, 55 QUESTIONS) -->
        <!-- ========================================================================= -->
        <div x-show="currentTab === 'questionnaire'" x-transition>
            
            <!-- Section 1: Your Details -->
            <div class="clinical-card">
                <div class="clinical-card-header">
                    <div class="d-flex align-items-center gap-3">
                        <span class="clinical-sec-num">1</span>
                        <div>
                            <h4 class="fw-bold text-brand-contrast mb-0 fs-5">1. Your Details</h4>
                            <span class="small text-muted">Personal demographics and clinical chart identifiers</span>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-brand-contrast">1. Full Name *</label>
                        <input type="text" name="full_name" class="form-control" value="{{ old('full_name', $user->name) }}" required placeholder="e.g. John Miller">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold small text-brand-contrast">2. Date of Birth *</label>
                        <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', $user->date_of_birth?->format('Y-m-d') ?? '1990-05-15') }}" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold small text-brand-contrast">3. Sex at Birth *</label>
                        <select name="sex_at_birth" class="form-select" required>
                            <option value="Female" {{ ($user->gender == 'Female') ? 'selected' : '' }}>Female</option>
                            <option value="Male" {{ ($user->gender == 'Male') ? 'selected' : '' }}>Male</option>
                            <option value="Intersex">Intersex</option>
                            <option value="Prefer not to say">Prefer not to say</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-brand-contrast">4. Mobile Phone *</label>
                        <input type="text" name="mobile" class="form-control" value="{{ old('mobile', $user->phone ?? '0400 000 000') }}" required placeholder="0400 000 000">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-brand-contrast">5. Email Address *</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required placeholder="patient@example.com.au">
                    </div>
                    <div class="col-md-8">
                        <label class="form-label fw-semibold small text-brand-contrast">6. Residential Address *</label>
                        <input type="text" name="residential_address" class="form-control" value="{{ old('residential_address', $user->address_line1 ?? 'Level 1, 63-73 Ann street, Surry Hills NSW 2010') }}" required placeholder="Street address, Suburb, State, Postcode">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold small text-brand-contrast">7. Medicare No. &amp; Ref (Optional)</label>
                        <input type="text" name="medicare_number" class="form-control" value="{{ old('medicare_number', $user->medicare_number ?? '2938 10293 1') }}" placeholder="10 digits + Ref">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-brand-contrast">8. Emergency Contact Name, Relationship &amp; Phone *</label>
                        <input type="text" name="emergency_contact" class="form-control" value="{{ old('emergency_contact', $existingForm?->form_data['fields']['emergency_contact'] ?? 'Sarah Miller (Spouse) - 0411 222 333') }}" required placeholder="e.g. Sarah Miller (Spouse) - 0411 222 333">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label fw-semibold small text-brand-contrast">9. Height (cm) *</label>
                        <input type="number" name="height_cm" class="form-control" value="{{ old('height_cm', $existingForm?->form_data['fields']['height_cm'] ?? 175) }}" required placeholder="175">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label fw-semibold small text-brand-contrast">10. Weight (kg) *</label>
                        <input type="number" name="weight_kg" class="form-control" value="{{ old('weight_kg', $existingForm?->form_data['fields']['weight_kg'] ?? 78) }}" required placeholder="78">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label fw-semibold small text-brand-contrast">11. Occupation *</label>
                        <input type="text" name="occupation" class="form-control" value="{{ old('occupation', $existingForm?->form_data['fields']['occupation'] ?? 'Software Engineer') }}" required placeholder="Occupation">
                    </div>
                </div>
            </div>

            <!-- Section 2: Your Health Concern -->
            <div class="clinical-card">
                <div class="clinical-card-header">
                    <div class="d-flex align-items-center gap-3">
                        <span class="clinical-sec-num">2</span>
                        <div>
                            <h4 class="fw-bold text-brand-contrast mb-0 fs-5">2. Your Health Concern</h4>
                            <span class="small text-muted">Primary medical conditions and symptom severity scoring</span>
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-12">
                        <label class="form-label fw-semibold small text-brand-contrast">12. What would you like to discuss with the doctor? *</label>
                        <textarea name="health_concern" class="form-control" rows="3" required placeholder="Describe your main symptoms (e.g. chronic lower back pain, severe insomnia, generalized anxiety)...">{{ old('health_concern', $existingForm?->form_data['fields']['health_concern'] ?? 'Chronic lower back pain and severe insomnia for over 2 years.') }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-brand-contrast d-block">13. How long have you had this concern? *</label>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach(['Less than 3 months', '3–6 months', '6–12 months', '1–5 years', 'More than 5 years'] as $dur)
                                <label class="choice-pill">
                                    <input type="radio" name="concern_duration" value="{{ $dur }}" {{ ($existingForm?->form_data['fields']['concern_duration'] ?? '1–5 years') == $dur ? 'checked' : '' }}>
                                    <span>{{ $dur }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-brand-contrast d-block">14. Has it been diagnosed? *</label>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach(['Yes, by a GP', 'Yes, by a specialist', 'Yes, in hospital', 'No formal diagnosis'] as $diag)
                                <label class="choice-pill">
                                    <input type="radio" name="diagnosed_by" value="{{ $diag }}" {{ ($existingForm?->form_data['fields']['diagnosed_by'] ?? 'Yes, by a GP') == $diag ? 'checked' : '' }}>
                                    <span>{{ $diag }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold small text-brand-contrast">15. Are you currently seeing a specialist for it?</label>
                        <div class="row g-2 align-items-center">
                            <div class="col-sm-3">
                                <select name="seeing_specialist" class="form-select">
                                    <option value="No">No</option>
                                    <option value="Yes">Yes</option>
                                </select>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="specialist_details" class="form-control" placeholder="If yes, name and specialty (e.g. Dr. Roberts - Orthopaedic Surgeon)" value="{{ old('specialist_details', $existingForm?->form_data['fields']['specialist_details'] ?? '') }}">
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold small text-brand-contrast d-block">16. Which areas of your life does it affect? (Select all that apply) *</label>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach(['Sleep', 'Work or study', 'Exercise', 'Mood', 'Relationships', 'Household tasks', 'Self-care', 'Social life', 'None'] as $area)
                                <label class="choice-pill">
                                    <input type="checkbox" name="life_impact[]" value="{{ $area }}" checked>
                                    <span>{{ $area }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- 17. Pain Severity 0-10 Scales -->
                    <div class="col-12 p-3.5 bg-light rounded-3 border" style="background-color: #FAF8F4 !important;">
                        <h6 class="fw-bold text-brand-contrast mb-3">
                            <i class="bi bi-activity text-brand-primary me-1"></i> 17. Pain Assessment &amp; Interference Scales (0 = None, 10 = Worst Imaginable)
                        </h6>
                        
                        <!-- a. Average Pain -->
                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-brand-contrast d-block">
                                a. What number best describes your pain on average over the past week? (0–10) *
                            </label>
                            <div class="d-flex flex-wrap gap-1.5 align-items-center">
                                <template x-for="n in 11" :key="n-1">
                                    <div class="pain-score-pill" :class="painAvg == (n-1) ? 'active' : ''" @click="painAvg = (n-1)">
                                        <span x-text="n-1"></span>
                                    </div>
                                </template>
                                <input type="hidden" name="pain_score_average" :value="painAvg">
                            </div>
                        </div>

                        <!-- b. Pain Enjoyment Interference -->
                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-brand-contrast d-block">
                                b. How much has pain interfered with your enjoyment of life over the past week? (0–10) *
                            </label>
                            <div class="d-flex flex-wrap gap-1.5 align-items-center">
                                <template x-for="n in 11" :key="n-1">
                                    <div class="pain-score-pill" :class="painEnjoy == (n-1) ? 'active' : ''" @click="painEnjoy = (n-1)">
                                        <span x-text="n-1"></span>
                                    </div>
                                </template>
                                <input type="hidden" name="pain_score_enjoyment" :value="painEnjoy">
                            </div>
                        </div>

                        <!-- c. Pain General Activity Interference -->
                        <div>
                            <label class="form-label small fw-semibold text-brand-contrast d-block">
                                c. How much has pain interfered with your general activity over the past week? (0–10) *
                            </label>
                            <div class="d-flex flex-wrap gap-1.5 align-items-center">
                                <template x-for="n in 11" :key="n-1">
                                    <div class="pain-score-pill" :class="painAct == (n-1) ? 'active' : ''" @click="painAct = (n-1)">
                                        <span x-text="n-1"></span>
                                    </div>
                                </template>
                                <input type="hidden" name="pain_score_activity" :value="painAct">
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold small text-brand-contrast">18. What treatments have you tried for this concern? *</label>
                        <textarea name="treatments_tried" class="form-control" rows="3" required placeholder="Treatment, duration, and outcome (helped / partly helped / didn't help / side effects)...">{{ old('treatments_tried', $existingForm?->form_data['fields']['treatments_tried'] ?? 'Physiotherapy (6 months - partly helped), Ibuprofen 400mg (side effects / stomach irritation), Melatonin 5mg (did not help).') }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-brand-contrast">19. Upcoming procedures, referrals or treatment changes planned?</label>
                        <div class="row g-2">
                            <div class="col-sm-4">
                                <select name="upcoming_procedures" class="form-select">
                                    <option value="No">No</option>
                                    <option value="Yes">Yes</option>
                                </select>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="upcoming_procedures_details" class="form-control" placeholder="If yes, please describe">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-brand-contrast">20. Supporting records &amp; pathology notes (Optional)</label>
                        <input type="text" name="supporting_records_notes" class="form-control" placeholder="e.g. MRI Lumbar spine attached at GP practice">
                    </div>
                </div>
            </div>

            <!-- Section 3: Medical History -->
            <div class="clinical-card">
                <div class="clinical-card-header">
                    <div class="d-flex align-items-center gap-3">
                        <span class="clinical-sec-num">3</span>
                        <div>
                            <h4 class="fw-bold text-brand-contrast mb-0 fs-5">3. Medical History &amp; Pharmacology</h4>
                            <span class="small text-muted">Past medical diagnoses, current prescription medications &amp; allergies</span>
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-12">
                        <label class="form-label fw-semibold small text-brand-contrast d-block">21. Do you have, or have you had, any of the following? (Select all that apply) *</label>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach([
                                'Heart disease, heart attack or angina',
                                'Heart rhythm problems',
                                'Stroke or TIA',
                                'High blood pressure',
                                'Low blood pressure or fainting',
                                'Liver disease',
                                'Kidney disease',
                                'Asthma, COPD or other lung disease',
                                'Diabetes',
                                'Epilepsy or seizures',
                                'Cancer (current or past)',
                                'Glaucoma',
                                'Sleep apnoea',
                                'Memory problems or dementia',
                                'None of the above'
                            ] as $cond)
                                <label class="choice-pill">
                                    <input type="checkbox" name="medical_conditions[]" value="{{ $cond }}" {{ $cond === 'None of the above' ? 'checked' : '' }}>
                                    <span>{{ $cond }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold small text-brand-contrast">22. Please list any other medical conditions or past surgeries</label>
                        <input type="text" name="other_conditions_surgeries" class="form-control" placeholder="e.g. Appendectomy in 2018, Knee arthroscopy in 2022" value="{{ old('other_conditions_surgeries', $existingForm?->form_data['fields']['other_conditions_surgeries'] ?? 'None') }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold small text-brand-contrast">23. Have you had a fall in the last 12 months? *</label>
                        <select name="fall_last_12m" class="form-select" required>
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold small text-brand-contrast">24. When was your blood pressure last checked? *</label>
                        <select name="bp_last_checked" class="form-select" required>
                            <option value="Within 3 months" selected>Within 3 months</option>
                            <option value="3–12 months">3–12 months</option>
                            <option value="Over 12 months">Over 12 months</option>
                            <option value="Never">Never</option>
                            <option value="Not sure">Not sure</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold small text-brand-contrast">25. If known, what was the reading?</label>
                        <input type="text" name="bp_reading" class="form-control" placeholder="e.g. 120/80 mmHg" value="120/80">
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold small text-brand-contrast">26. Are you currently pregnant, breastfeeding or planning a pregnancy in the next 12 months? *</label>
                        <select name="pregnancy_status" class="form-select" required>
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                            <option value="Not applicable">Not applicable</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold small text-brand-contrast">27. Please list ALL current medications (Name, dose, frequency - prescription, OTC, supplements) *</label>
                        <textarea name="current_medications" class="form-control" rows="3" required placeholder="e.g. Paracetamol 500mg prn, Meloxicam 7.5mg daily, Vitamin D3 1000IU...">{{ old('current_medications', $existingForm?->current_medications ?? 'Paracetamol 500mg prn, Meloxicam 7.5mg daily') }}</textarea>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold small text-brand-contrast">28. Do you have any allergies or adverse reactions to medicine? *</label>
                        <div class="row g-2">
                            <div class="col-sm-3">
                                <select name="known_allergies" class="form-select" required>
                                    <option value="No Known Allergies (NKDA)">No (NKDA)</option>
                                    <option value="Yes (Allergies present)" selected>Yes</option>
                                </select>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="allergy_details" class="form-control" placeholder="If yes, what were you allergic to and what happened? (e.g. Penicillin - mild rash)" value="{{ old('allergy_details', $existingForm?->known_allergies ?? 'Penicillin (mild rash)') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 4: Mental Health -->
            <div class="clinical-card">
                <div class="clinical-card-header">
                    <div class="d-flex align-items-center gap-3">
                        <span class="clinical-sec-num">4</span>
                        <div>
                            <h4 class="fw-bold text-brand-contrast mb-0 fs-5">4. Mental Health &amp; Wellbeing</h4>
                            <span class="small text-muted">Psychiatric screening, GAD/PHQ anxiety &amp; depression scales</span>
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-12">
                        <label class="form-label fw-semibold small text-brand-contrast d-block">29. Have you ever been diagnosed with any of the following? (Select all that apply) *</label>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach(['Depression', 'Anxiety', 'PTSD', 'ADHD', 'OCD', 'Bipolar disorder', 'Schizophrenia or psychosis', 'Eating disorder', 'Personality disorder', 'Other', 'None'] as $mh)
                                <label class="choice-pill">
                                    <input type="checkbox" name="mental_health_diagnoses[]" value="{{ $mh }}" {{ $mh === 'Anxiety' ? 'checked' : '' }}>
                                    <span>{{ $mh }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-brand-contrast">30. Have you ever been hospitalised for your mental health? *</label>
                        <select name="mental_health_hospitalised" class="form-select" required>
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-brand-contrast">31. Are you currently seeing a psychologist, psychiatrist or counsellor? *</label>
                        <select name="seeing_mental_health_pro" class="form-select" required>
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>

                    <!-- GAD-2 & PHQ-2 Screening Matrix -->
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle small bg-light rounded">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Over the last 2 weeks, how often have you been bothered by:</th>
                                        <th class="text-center">Not at all</th>
                                        <th class="text-center">Several days</th>
                                        <th class="text-center">More than half</th>
                                        <th class="text-center">Nearly every day</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>32. Feeling nervous, anxious or on edge</strong></td>
                                        <td class="text-center"><input type="radio" name="anxiety_nervous_freq" value="Not at all"></td>
                                        <td class="text-center"><input type="radio" name="anxiety_nervous_freq" value="Several days" checked></td>
                                        <td class="text-center"><input type="radio" name="anxiety_nervous_freq" value="More than half the days"></td>
                                        <td class="text-center"><input type="radio" name="anxiety_nervous_freq" value="Nearly every day"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>33. Not being able to stop or control worrying</strong></td>
                                        <td class="text-center"><input type="radio" name="anxiety_worry_freq" value="Not at all"></td>
                                        <td class="text-center"><input type="radio" name="anxiety_worry_freq" value="Several days" checked></td>
                                        <td class="text-center"><input type="radio" name="anxiety_worry_freq" value="More than half the days"></td>
                                        <td class="text-center"><input type="radio" name="anxiety_worry_freq" value="Nearly every day"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>34. Little interest or pleasure in doing things</strong></td>
                                        <td class="text-center"><input type="radio" name="depression_interest_freq" value="Not at all" checked></td>
                                        <td class="text-center"><input type="radio" name="depression_interest_freq" value="Several days"></td>
                                        <td class="text-center"><input type="radio" name="depression_interest_freq" value="More than half the days"></td>
                                        <td class="text-center"><input type="radio" name="depression_interest_freq" value="Nearly every day"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>35. Feeling down, depressed or hopeless</strong></td>
                                        <td class="text-center"><input type="radio" name="depression_hopeless_freq" value="Not at all" checked></td>
                                        <td class="text-center"><input type="radio" name="depression_hopeless_freq" value="Several days"></td>
                                        <td class="text-center"><input type="radio" name="depression_hopeless_freq" value="More than half the days"></td>
                                        <td class="text-center"><input type="radio" name="depression_hopeless_freq" value="Nearly every day"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- 36. Crisis Alert Screening -->
                    <div class="col-12">
                        <div class="crisis-alert-box mb-2">
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-2">
                                <strong class="fs-6">36. Are you currently having thoughts of harming yourself or ending your life? *</strong>
                                <div class="d-flex gap-3">
                                    <label class="form-check-label"><input type="radio" name="self_harm_thoughts" value="No" checked class="form-check-input me-1"> No</label>
                                    <label class="form-check-label"><input type="radio" name="self_harm_thoughts" value="Yes" class="form-check-input me-1"> Yes</label>
                                </div>
                            </div>
                            <div class="small opacity-90">
                                <i class="bi bi-info-circle-fill me-1"></i> If you’re in immediate danger, call <strong>000</strong>. For urgent support 24/7, call Lifeline on <strong>13 11 14</strong>. If you answer yes, a clinical team member will contact you today.
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold small text-brand-contrast d-block">37. How would you rate your sleep over the past month? *</label>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach(['Very good', 'Fairly good', 'Fairly poor', 'Very poor'] as $slp)
                                <label class="choice-pill">
                                    <input type="radio" name="sleep_quality" value="{{ $slp }}" {{ ($existingForm?->form_data['fields']['sleep_quality'] ?? 'Fairly poor') == $slp ? 'checked' : '' }} required>
                                    <span>{{ $slp }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 5: Family History -->
            <div class="clinical-card">
                <div class="clinical-card-header">
                    <div class="d-flex align-items-center gap-3">
                        <span class="clinical-sec-num">5</span>
                        <div>
                            <h4 class="fw-bold text-brand-contrast mb-0 fs-5">5. Family History</h4>
                            <span class="small text-muted">Genetic predispositions in parents, siblings or children</span>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label fw-semibold small text-brand-contrast d-block">38. Has a parent, brother, sister or child been diagnosed with any of the following? (Select all that apply) *</label>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach(['Heart disease', 'Stroke', 'Diabetes', 'Cancer', 'Depression or anxiety', 'Bipolar disorder', 'Schizophrenia or psychosis', 'Substance dependence', 'None', 'Unsure'] as $fam)
                                <label class="choice-pill">
                                    <input type="checkbox" name="family_history[]" value="{{ $fam }}" {{ $fam === 'None' ? 'checked' : '' }}>
                                    <span>{{ $fam }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 6: Lifestyle -->
            <div class="clinical-card">
                <div class="clinical-card-header">
                    <div class="d-flex align-items-center gap-3">
                        <span class="clinical-sec-num">6</span>
                        <div>
                            <h4 class="fw-bold text-brand-contrast mb-0 fs-5">6. Lifestyle &amp; Substance History</h4>
                            <span class="small text-muted">Exercise, smoking, alcohol (AUDIT-C screening) &amp; substance history</span>
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-brand-contrast d-block">39. How many hours of exercise do you do per week? *</label>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach(['Less than 2.5', '2.5–5', '5–7.5', 'More than 7.5'] as $ex)
                                <label class="choice-pill">
                                    <input type="radio" name="exercise_hours" value="{{ $ex }}" {{ $ex === '2.5–5' ? 'checked' : '' }}>
                                    <span>{{ $ex }} hrs</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-brand-contrast d-block">40. Do you smoke or vape? (Select all that apply) *</label>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach(['Tobacco', 'Nicotine vapes', 'Other', 'None', 'Ex-smoker'] as $smk)
                                <label class="choice-pill">
                                    <input type="checkbox" name="smoking_vaping[]" value="{{ $smk }}" {{ $smk === 'None' ? 'checked' : '' }}>
                                    <span>{{ $smk }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold small text-brand-contrast">41. How often do you drink alcohol? *</label>
                        <select name="alcohol_freq" class="form-select" required>
                            <option value="Never">Never</option>
                            <option value="Monthly or less" selected>Monthly or less</option>
                            <option value="2–4 times a month">2–4 times a month</option>
                            <option value="2–3 times a week">2–3 times a week</option>
                            <option value="4 or more times a week">4 or more times a week</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold small text-brand-contrast">42. Standard drinks on a typical day? *</label>
                        <select name="alcohol_drinks_day" class="form-select" required>
                            <option value="1–2" selected>1–2 drinks</option>
                            <option value="3–4">3–4 drinks</option>
                            <option value="5–6">5–6 drinks</option>
                            <option value="7–9">7–9 drinks</option>
                            <option value="10 or more">10 or more</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold small text-brand-contrast">43. 6+ drinks on one occasion? *</label>
                        <select name="alcohol_binge_freq" class="form-select" required>
                            <option value="Never" selected>Never</option>
                            <option value="Less than monthly">Less than monthly</option>
                            <option value="Monthly">Monthly</option>
                            <option value="Weekly">Weekly</option>
                            <option value="Daily or almost daily">Daily or almost daily</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold small text-brand-contrast d-block">44. Have you used any of the following in the last 12 months? (Select all that apply) *</label>
                        <div class="d-flex flex-wrap gap-2 mb-2">
                            @foreach(['Cannabis', 'Cocaine', 'Methamphetamine or speed', 'MDMA', 'Ketamine', 'GHB', 'Amyl nitrite', 'Psychedelics', 'Prescription medicine not prescribed to you', 'Other', 'None'] as $sub)
                                <label class="choice-pill">
                                    <input type="checkbox" name="substance_use_12m[]" value="{{ $sub }}" {{ $sub === 'None' ? 'checked' : '' }}>
                                    <span>{{ $sub }}</span>
                                </label>
                            @endforeach
                        </div>
                        <input type="text" name="substance_use_details" class="form-control form-control-sm" placeholder="If any, how often and when did you last use?">
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold small text-brand-contrast">45. Have you ever had a drug or alcohol dependence, or been treated for one? *</label>
                        <select name="substance_dependence_history" class="form-select" required>
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Section 7: Work and Safety -->
            <div class="clinical-card">
                <div class="clinical-card-header">
                    <div class="d-flex align-items-center gap-3">
                        <span class="clinical-sec-num">7</span>
                        <div>
                            <h4 class="fw-bold text-brand-contrast mb-0 fs-5">7. Work and Safety</h4>
                            <span class="small text-muted">Driving status, safety-critical employment &amp; household situation</span>
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-12">
                        <label class="form-label fw-semibold small text-brand-contrast d-block">46. What type of driver’s licence do you hold? (Select all that apply) *</label>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach(['Car', 'Motorbike', 'Heavy vehicle', 'Commercial or passenger', 'None'] as $lic)
                                <label class="choice-pill">
                                    <input type="checkbox" name="driver_licence_types[]" value="{{ $lic }}" {{ $lic === 'Car' ? 'checked' : '' }}>
                                    <span>{{ $lic }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-brand-contrast">47. Do you work in a safety-sensitive role (mining, transport, aviation, construction, healthcare)? *</label>
                        <select name="safety_sensitive_role" class="form-select" required>
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-brand-contrast">48. Are you subject to workplace or sport drug testing? *</label>
                        <select name="drug_testing_subject" class="form-select" required>
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                            <option value="Unsure">Unsure</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-brand-contrast">49. Do you live alone? *</label>
                        <select name="live_alone" class="form-select" required>
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-brand-contrast">50. Are there children under 18 living in your home? *</label>
                        <select name="children_under_18" class="form-select" required>
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Section 8: Your Care Team and Consent -->
            <div class="clinical-card">
                <div class="clinical-card-header">
                    <div class="d-flex align-items-center gap-3">
                        <span class="clinical-sec-num">8</span>
                        <div>
                            <h4 class="fw-bold text-brand-contrast mb-0 fs-5">8. Your Care Team &amp; Questionnaire Declaration</h4>
                            <span class="small text-muted">Primary GP coordination, My Health Record consent &amp; accuracy declaration</span>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold small text-brand-contrast">51. Do you have a regular GP? *</label>
                        <select name="has_regular_gp" class="form-select" required>
                            <option value="Yes" selected>Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold small text-brand-contrast">GP Doctor Name *</label>
                        <input type="text" name="regular_gp_name" class="form-control" value="{{ old('regular_gp_name', $existingForm?->regular_gp_name ?? 'Dr. Andrew Clarke') }}" required placeholder="Dr. Andrew Clarke">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold small text-brand-contrast">GP Practice / Medical Centre *</label>
                        <input type="text" name="regular_gp_clinic" class="form-control" value="{{ old('regular_gp_clinic', $existingForm?->regular_gp_clinic ?? 'Surry Hills Family Practice, NSW') }}" required placeholder="Clinic Name & Suburb">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-brand-contrast">52. Would you like us to keep your GP informed of your care? *</label>
                        <select name="keep_gp_informed" class="form-select" required>
                            <option value="Yes" selected>Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-brand-contrast">53. Consent to doctor viewing My Health Record? *</label>
                        <select name="my_health_record_consent" class="form-select" required>
                            <option value="Yes" selected>Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold small text-brand-contrast">54. Is there anything else you’d like the doctor to know before your appointment?</label>
                        <textarea name="extra_doctor_notes" class="form-control" rows="2" placeholder="Any additional notes or questions for Dr. Batthala...">{{ old('extra_doctor_notes', $existingForm?->form_data['fields']['extra_doctor_notes'] ?? '') }}</textarea>
                    </div>

                    <!-- 55. Declaration -->
                    <div class="col-12 p-3 bg-light rounded-3 border mt-3" style="background-color: #FAF8F4 !important;">
                        <div class="form-check mb-3">
                            <input type="checkbox" name="declaration_confirmed" id="decl_check" class="form-check-input" required checked>
                            <label class="form-check-label fw-bold text-brand-contrast small" for="decl_check">
                                55. Declaration: I confirm the information I’ve provided is true, accurate and complete to the best of my knowledge, and I’ll let the clinic know if anything changes before my appointment. *
                            </label>
                        </div>
                        <div class="row g-2">
                            <div class="col-md-5">
                                <label class="form-label small text-muted">Full Name:</label>
                                <input type="text" name="declaration_name" class="form-control bg-white" value="{{ old('declaration_name', $user->name) }}" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small text-muted">Digital Signature (Type Name):</label>
                                <input type="text" name="declaration_signature" class="form-control bg-white font-monospace" value="{{ old('declaration_signature', $user->name) }}" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small text-muted">Date:</label>
                                <input type="text" name="declaration_date" class="form-control bg-white" value="{{ date('d/m/Y') }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4 pt-3 border-top text-end">
                    <button type="button" class="btn btn-brand-primary btn-lg px-4 py-2.5 fw-bold shadow-sm" @click="currentTab = 'consent'; window.scrollTo({top: 0, behavior: 'smooth'})">
                        Continue to Part 2: Informed Consent &rarr;
                    </button>
                </div>
            </div>

        </div>

        <!-- ========================================================================= -->
        <!-- PART 2: INFORMED CONSENT - MEDICINAL CANNABIS TREATMENT -->
        <!-- ========================================================================= -->
        <div x-show="currentTab === 'consent'" x-transition>
            
            <div class="clinical-card">
                <div class="clinical-card-header">
                    <div class="d-flex align-items-center gap-3">
                        <span class="clinical-sec-num"><i class="bi bi-shield-check"></i></span>
                        <div>
                            <h4 class="fw-bold text-brand-contrast mb-0 fs-5">Informed Consent: Medicinal Cannabis Treatment</h4>
                            <span class="small text-muted">ZYMIKA HEALTH &bull; TGA Special Access Scheme (SAS-B) / Authorised Prescriber Framework</span>
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary" @click="selectAllConsent()">
                        <i class="bi bi-check-all me-1"></i> Tick All Statements
                    </button>
                </div>

                <!-- Patient & Doctor Header Info -->
                <div class="p-3 bg-light rounded-3 border mb-4" style="background-color: #FAF8F4 !important;">
                    <div class="row g-2 small">
                        <div class="col-md-4">
                            <span class="text-muted d-block">Patient Name:</span>
                            <strong>{{ $user->name }}</strong>
                        </div>
                        <div class="col-md-4">
                            <span class="text-muted d-block">Date of Birth:</span>
                            <strong>{{ $user->date_of_birth?->format('d/m/Y') ?? '12/04/1985' }}</strong>
                        </div>
                        <div class="col-md-4">
                            <span class="text-muted d-block">Prescribing Doctor:</span>
                            <strong class="text-brand-primary">Dr. Suneetha Batthala (AHPRA AP)</strong>
                        </div>
                    </div>
                </div>

                <p class="small text-muted mb-4">
                    Please read each statement and tick to confirm you understand. If anything is unclear, ask your doctor before signing.
                </p>

                <!-- 1. About your treatment -->
                <h6 class="fw-bold text-brand-contrast mb-2.5">
                    <i class="bi bi-capsule text-brand-primary me-1.5"></i> About your treatment
                </h6>
                <div class="consent-item-card">
                    <div class="form-check">
                        <input type="checkbox" name="consent_treatment_1" id="ct1" class="form-check-input consent-cb" required checked>
                        <label class="form-check-label small" for="ct1">
                            My doctor has explained why medicinal cannabis is being prescribed for my condition, the expected benefits, and how we’ll measure whether it’s working.
                        </label>
                    </div>
                </div>
                <div class="consent-item-card">
                    <div class="form-check">
                        <input type="checkbox" name="consent_treatment_2" id="ct2" class="form-check-input consent-cb" required checked>
                        <label class="form-check-label small" for="ct2">
                            My doctor has discussed other treatment options with me, including continuing my current treatment or no treatment.
                        </label>
                    </div>
                </div>
                <div class="consent-item-card">
                    <div class="form-check">
                        <input type="checkbox" name="consent_treatment_3" id="ct3" class="form-check-input consent-cb" required checked>
                        <label class="form-check-label small" for="ct3">
                            I understand most medicinal cannabis products are unapproved medicines in Australia. Their quality, safety and effectiveness have not been assessed by the Therapeutic Goods Administration (TGA).
                        </label>
                    </div>
                </div>
                <div class="consent-item-card">
                    <div class="form-check">
                        <input type="checkbox" name="consent_treatment_4" id="ct4" class="form-check-input consent-cb" required checked>
                        <label class="form-check-label small" for="ct4">
                            I understand the evidence for medicinal cannabis is still developing, and its long-term effects are not fully known.
                        </label>
                    </div>
                </div>
                <div class="consent-item-card mb-4">
                    <div class="form-check">
                        <input type="checkbox" name="consent_treatment_5" id="ct5" class="form-check-input consent-cb" required checked>
                        <label class="form-check-label small" for="ct5">
                            I understand treatment may not work for me, and my doctor may adjust or stop it if it isn’t helping or causes problems.
                        </label>
                    </div>
                </div>

                <!-- 2. Risks and side effects -->
                <h6 class="fw-bold text-brand-contrast mb-2.5">
                    <i class="bi bi-exclamation-triangle text-brand-sage me-1.5"></i> Risks and side effects
                </h6>
                <div class="consent-item-card">
                    <div class="form-check">
                        <input type="checkbox" name="consent_risks_1" id="cr1" class="form-check-input consent-cb" required checked>
                        <label class="form-check-label small" for="cr1">
                            I understand common side effects include drowsiness, dizziness, fatigue, dry mouth, nausea, changes in appetite, and problems with concentration or memory.
                        </label>
                    </div>
                </div>
                <div class="consent-item-card">
                    <div class="form-check">
                        <input type="checkbox" name="consent_risks_2" id="cr2" class="form-check-input consent-cb" required checked>
                        <label class="form-check-label small" for="cr2">
                            I understand less common but serious effects can include anxiety, paranoia, hallucinations, psychosis, fast heart rate, low blood pressure, fainting, falls, and severe cyclical vomiting.
                        </label>
                    </div>
                </div>
                <div class="consent-item-card">
                    <div class="form-check">
                        <input type="checkbox" name="consent_risks_3" id="cr3" class="form-check-input consent-cb" required checked>
                        <label class="form-check-label small" for="cr3">
                            I understand medicinal cannabis can interact with other medicines, alcohol and other substances, and doses of my other medicines may need to change.
                        </label>
                    </div>
                </div>
                <div class="consent-item-card">
                    <div class="form-check">
                        <input type="checkbox" name="consent_risks_4" id="cr4" class="form-check-input consent-cb" required checked>
                        <label class="form-check-label small" for="cr4">
                            I understand regular use can lead to dependence, and stopping suddenly may cause withdrawal symptoms such as irritability, poor sleep and low mood.
                        </label>
                    </div>
                </div>
                <div class="consent-item-card mb-4">
                    <div class="form-check">
                        <input type="checkbox" name="consent_risks_5" id="cr5" class="form-check-input consent-cb" required checked>
                        <label class="form-check-label small" for="cr5">
                            I understand medicinal cannabis should not be used during pregnancy or breastfeeding. I’ll tell my doctor straight away if I become pregnant or plan to.
                        </label>
                    </div>
                </div>

                <!-- 3. Driving, work and safety -->
                <div class="p-3 bg-danger bg-opacity-10 border border-danger border-opacity-25 rounded-3 mb-3">
                    <h6 class="fw-bold text-danger mb-1">
                        <i class="bi bi-car-front-fill me-1.5"></i> Driving, work and safety (Strict Australian Legal Notice)
                    </h6>
                    <span class="small text-muted">In all Australian States and Territories, presence of THC while driving carries strict zero-tolerance penalties.</span>
                </div>
                <div class="consent-item-card">
                    <div class="form-check">
                        <input type="checkbox" name="consent_safety_1" id="cs1" class="form-check-input consent-cb" required checked>
                        <label class="form-check-label small fw-semibold text-danger" for="cs1">
                            I understand it is illegal to drive with THC in my system in Australia, and a valid prescription is not a defence.
                        </label>
                    </div>
                </div>
                <div class="consent-item-card">
                    <div class="form-check">
                        <input type="checkbox" name="consent_safety_2" id="cs2" class="form-check-input consent-cb" required checked>
                        <label class="form-check-label small" for="cs2">
                            I understand some products described as CBD-only may contain trace THC, and I’ll follow my doctor’s advice about driving.
                        </label>
                    </div>
                </div>
                <div class="consent-item-card">
                    <div class="form-check">
                        <input type="checkbox" name="consent_safety_3" id="cs3" class="form-check-input consent-cb" required checked>
                        <label class="form-check-label small" for="cs3">
                            I won’t operate heavy machinery or do safety-critical work while affected.
                        </label>
                    </div>
                </div>
                <div class="consent-item-card">
                    <div class="form-check">
                        <input type="checkbox" name="consent_safety_4" id="cs4" class="form-check-input consent-cb" required checked>
                        <label class="form-check-label small" for="cs4">
                            I understand THC may be detected in workplace or sport drug testing, and it is my responsibility to check my obligations.
                        </label>
                    </div>
                </div>
                <div class="consent-item-card mb-4">
                    <div class="form-check">
                        <input type="checkbox" name="consent_safety_5" id="cs5" class="form-check-input consent-cb" required checked>
                        <label class="form-check-label small" for="cs5">
                            I understand medicinal cannabis may be illegal to carry into some countries, and I’ll check before travelling.
                        </label>
                    </div>
                </div>

                <!-- 4. My responsibilities -->
                <h6 class="fw-bold text-brand-contrast mb-2.5">
                    <i class="bi bi-shield-lock text-brand-primary me-1.5"></i> My responsibilities
                </h6>
                <div class="consent-item-card"><div class="form-check"><input type="checkbox" name="consent_resp_1" id="crsp1" class="form-check-input consent-cb" required checked><label class="form-check-label small" for="crsp1">I’ll take my medicine only as prescribed and won’t change my dose without speaking to my doctor.</label></div></div>
                <div class="consent-item-card"><div class="form-check"><input type="checkbox" name="consent_resp_2" id="crsp2" class="form-check-input consent-cb" required checked><label class="form-check-label small" for="crsp2">My medicine is for my use only. I won’t share, sell or give it to anyone else.</label></div></div>
                <div class="consent-item-card"><div class="form-check"><input type="checkbox" name="consent_resp_3" id="crsp3" class="form-check-input consent-cb" required checked><label class="form-check-label small" for="crsp3">I’ll store it securely, out of reach of children and others.</label></div></div>
                <div class="consent-item-card"><div class="form-check"><input type="checkbox" name="consent_resp_4" id="crsp4" class="form-check-input consent-cb" required checked><label class="form-check-label small" for="crsp4">I won’t use any other cannabis products, including illicit cannabis, during treatment.</label></div></div>
                <div class="consent-item-card"><div class="form-check"><input type="checkbox" name="consent_resp_5" id="crsp5" class="form-check-input consent-cb" required checked><label class="form-check-label small" for="crsp5">I’ll tell my doctor about any side effects, and about any changes to my health or medicines.</label></div></div>
                <div class="consent-item-card"><div class="form-check"><input type="checkbox" name="consent_resp_6" id="crsp6" class="form-check-input consent-cb" required checked><label class="form-check-label small" for="crsp6">I’ll attend follow-up appointments as directed by my doctor.</label></div></div>
                <div class="consent-item-card mb-4"><div class="form-check"><input type="checkbox" name="consent_resp_7" id="crsp7" class="form-check-input consent-cb" required checked><label class="form-check-label small" for="crsp7">I understand the cost of the medicine and consultations is my responsibility and is generally not covered by the PBS or Medicare.</label></div></div>

                <!-- 5. Privacy and reporting -->
                <h6 class="fw-bold text-brand-contrast mb-2.5">
                    <i class="bi bi-file-earmark-lock text-brand-sage me-1.5"></i> Privacy and reporting
                </h6>
                <div class="consent-item-card"><div class="form-check"><input type="checkbox" name="consent_privacy_1" id="cp1" class="form-check-input consent-cb" required checked><label class="form-check-label small" for="cp1">I understand my doctor may need to provide information to the TGA, such as prescribing details and any serious side effects, as required by law.</label></div></div>
                <div class="consent-item-card mb-4"><div class="form-check"><input type="checkbox" name="consent_privacy_2" id="cp2" class="form-check-input consent-cb" required checked><label class="form-check-label small" for="cp2">I understand my information will be handled in line with the clinic’s privacy policy.</label></div></div>

                <!-- Optional -->
                <h6 class="fw-bold text-brand-contrast mb-2.5">Optional (does not affect your treatment)</h6>
                <div class="consent-item-card"><div class="form-check"><input type="checkbox" name="consent_opt_research" id="co1" class="form-check-input" checked><label class="form-check-label small" for="co1">I agree to the clinic sharing de-identified information about my treatment outcomes for research and quality improvement.</label></div></div>
                <div class="consent-item-card mb-4"><div class="form-check"><input type="checkbox" name="consent_opt_gp" id="co2" class="form-check-input" checked><label class="form-check-label small" for="co2">I agree to the clinic informing my regular GP about this treatment.</label></div></div>

                <!-- Right to withdraw -->
                <div class="consent-item-card mb-4 border-success">
                    <div class="form-check">
                        <input type="checkbox" name="consent_withdraw" id="cw1" class="form-check-input consent-cb" required checked>
                        <label class="form-check-label small fw-bold text-brand-contrast" for="cw1">
                            Your right to withdraw: I understand I can stop treatment or withdraw this consent at any time by telling my doctor, and this won’t affect my access to other care. *
                        </label>
                    </div>
                </div>

                <!-- Patient Declaration -->
                <div class="p-4 bg-light rounded-3 border mb-4" style="background-color: #FAF8F4 !important;">
                    <h6 class="fw-bold text-brand-contrast mb-2">Patient Digital Declaration &amp; Consent</h6>
                    <p class="small text-muted mb-3">
                        I have read and understood this form, or it has been explained to me. I’ve had the chance to ask questions and they’ve been answered to my satisfaction. I consent to treatment.
                    </p>

                    <div class="row g-3">
                        <div class="col-md-5">
                            <label class="form-label small fw-semibold text-brand-contrast">Patient Full Name *</label>
                            <input type="text" name="consent_patient_name" class="form-control bg-white" value="{{ old('consent_patient_name', $user->name) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold text-brand-contrast">Digital Signature (Type Name) *</label>
                            <input type="text" name="consent_patient_sig" class="form-control bg-white font-monospace" value="{{ old('consent_patient_sig', $user->name) }}" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small fw-semibold text-brand-contrast">Date *</label>
                            <input type="text" name="consent_patient_date" class="form-control bg-white" value="{{ date('d/m/Y') }}" readonly>
                        </div>

                        <div class="col-12 mt-2">
                            <label class="form-label small fw-semibold text-brand-contrast">Was an interpreter used?</label>
                            <div class="row g-2 align-items-center">
                                <div class="col-sm-3">
                                    <select name="consent_interpreter_used" class="form-select form-select-sm">
                                        <option value="No" selected>No</option>
                                        <option value="Yes">Yes</option>
                                    </select>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="consent_interpreter_details" class="form-control form-control-sm bg-white" placeholder="If yes, interpreter name/ID">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Prescriber Declaration -->
                <div class="p-3 bg-brand-light rounded-3 border mb-4">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <div>
                            <div class="fw-bold text-brand-contrast small"><i class="bi bi-patch-check-fill text-brand-primary me-1"></i> Prescriber Declaration</div>
                            <div class="text-muted" style="font-size: 0.78rem;">
                                I have explained the nature, expected benefits, risks and alternatives of this treatment to the patient, and I believe they understand the information.
                            </div>
                        </div>
                        <div class="text-end">
                            <div class="fw-bold text-brand-contrast small">Dr. Suneetha Batthala</div>
                            <div class="text-muted" style="font-size: 0.72rem;">AHPRA Authorised Prescriber &bull; Verified</div>
                        </div>
                    </div>
                </div>

                <!-- Submission Actions -->
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 pt-3 border-top">
                    <button type="button" class="btn btn-outline-secondary" @click="currentTab = 'questionnaire'; window.scrollTo({top: 0, behavior: 'smooth'})">
                        &larr; Back to Questionnaire
                    </button>
                    <button type="submit" class="btn btn-brand-primary btn-lg px-5 py-3 fw-bold shadow">
                        <i class="bi bi-cloud-arrow-up-fill me-1.5"></i> Submit Health Intake &amp; Consent to Dr. Batthala
                    </button>
                </div>

            </div>

        </div>

    </form>
</div>

@push('scripts')
<script>
function snapformApp() {
    return {
        currentTab: 'questionnaire',
        painAvg: {{ $existingForm?->form_data['fields']['pain_score_average'] ?? ($existingForm?->form_data['fields']['pain_score'] ?? 6) }},
        painEnjoy: {{ $existingForm?->form_data['fields']['pain_score_enjoyment'] ?? 6 }},
        painAct: {{ $existingForm?->form_data['fields']['pain_score_activity'] ?? 5 }},
        selectAllConsent() {
            document.querySelectorAll('.consent-cb').forEach(cb => cb.checked = true);
        }
    }
}
</script>
@endpush
@endsection