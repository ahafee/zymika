@extends('layouts.app')

@section('title', 'Medicinal Cannabis Pre-Eligibility Assessment - ZYMIKA HEALTH')

@section('content')
<!-- Premium Inner Hero Banner with Image -->
<section class="inner-hero-section">
    <div class="container">
        <div class="row align-items-center g-4 g-lg-5">
            <div class="col-lg-7" data-aos="fade-right">
                <div class="d-inline-flex align-items-center gap-2 mb-2">
                    <span class="badge badge-tga"><i class="bi bi-shield-check me-1"></i> TGA SAS-B PRE-SCREENING</span>
                    <span class="badge bg-white text-brand-contrast border"><i class="bi bi-stopwatch text-brand-primary me-1"></i> 60 Seconds</span>
                </div>
                <h1 class="display-5 fw-bold text-brand-contrast mb-3">Medicinal Cannabis Eligibility Check</h1>
                <p class="lead text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                
                <div class="d-flex flex-wrap gap-3">
                    <div class="d-flex align-items-center gap-2 small fw-semibold text-brand-contrast">
                        <i class="bi bi-lock-fill text-brand-primary fs-5"></i>
                        <span>100% Confidential</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 small fw-semibold text-brand-contrast">
                        <i class="bi bi-file-earmark-check-fill text-brand-sage fs-5"></i>
                        <span>No GP Referral Required</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 small fw-semibold text-brand-contrast">
                        <i class="bi bi-lightning-charge-fill text-brand-primary fs-5"></i>
                        <span>Instant Preliminary Outcome</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-5" data-aos="fade-left" data-aos-delay="150">
                <div class="inner-hero-img-wrap">
                    <img src="{{ asset('images/step1-assessment.jpg') }}" alt="Eligibility Pre-Screening" class="inner-hero-img">
                    <div class="inner-hero-floating-badge">
                        <div class="bg-success text-white rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                            <i class="bi bi-ui-checks fs-5"></i>
                        </div>
                        <div>
                            <div class="fw-bold text-brand-contrast small">4 Quick Clinical Steps</div>
                            <div class="text-muted" style="font-size: 0.72rem;">Free &bull; No Obligation Assessment</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container py-5" x-data="eligibilityQuiz()">
    <div class="row justify-content-center">
        <div class="col-lg-8" data-aos="fade-up">
            <!-- Progress Bar -->
            <div class="mb-4">
                <div class="d-flex justify-content-between small fw-bold text-brand-contrast mb-2">
                    <span>Step <span x-text="step"></span> of 4</span>
                    <span x-text="stepTitles[step - 1]"></span>
                </div>
                <div class="progress" style="height: 8px;">
                    <div class="progress-bar bg-brand-primary" role="progressbar" :style="'width: ' + (step * 25) + '%'"></div>
                </div>
            </div>

            <!-- Quiz Card -->
            <div class="card card-zymika p-4 p-md-5 border bg-white shadow-sm">
                
                <!-- Step 1: Health Condition -->
                <div x-show="step === 1" x-transition>
                    <h4 class="fw-bold text-brand-contrast mb-1">1. What conditions are you seeking relief for?</h4>
                    <p class="text-muted small mb-4">Select all primary symptoms that apply to you.</p>

                    <div class="row g-3 mb-4">
                        <template x-for="c in conditionOptions" :key="c">
                            <div class="col-sm-6">
                                <label class="border rounded-3 p-3 w-100 d-flex align-items-center gap-3 cursor-pointer" 
                                       :class="formData.primary_conditions.includes(c) ? 'border-brand-primary bg-brand-light' : 'bg-white'"
                                       style="cursor: pointer;">
                                    <input type="checkbox" :value="c" x-model="formData.primary_conditions" class="form-check-input mt-0">
                                    <span class="fw-semibold text-brand-contrast small" x-text="c"></span>
                                </label>
                            </div>
                        </template>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold small text-brand-contrast">How long have you experienced these symptoms?</label>
                        <select class="form-select" x-model="formData.condition_duration">
                            <option value="Over 12 months">Over 12 months</option>
                            <option value="6 to 12 months">6 to 12 months</option>
                            <option value="3 to 6 months">3 to 6 months</option>
                            <option value="Less than 1 month">Less than 1 month</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" @click="nextStep()" :disabled="formData.primary_conditions.length === 0" class="btn btn-brand-primary px-4">
                            Next Step <i class="bi bi-arrow-right ms-1"></i>
                        </button>
                    </div>
                </div>

                <!-- Step 2: Prior Treatments -->
                <div x-show="step === 2" x-transition>
                    <h4 class="fw-bold text-brand-contrast mb-1">2. Previous Treatments & Trials</h4>
                    <p class="text-muted small mb-4">Under TGA SAS-B criteria, medicinal cannabis is considered when first-line therapies have had incomplete efficacy.</p>

                    <div class="mb-4">
                        <label class="form-label fw-semibold small text-brand-contrast">Have you previously trialed conventional medications or therapies for your condition? *</label>
                        <div class="d-flex gap-4 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" :value="true" x-model="formData.tried_standard_medications" id="tried_yes">
                                <label class="form-check-label fw-semibold small" for="tried_yes">Yes, trialed standard treatments</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" :value="false" x-model="formData.tried_standard_medications" id="tried_no">
                                <label class="form-check-label fw-semibold small" for="tried_no">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4" x-show="formData.tried_standard_medications">
                        <label class="form-label fw-semibold small text-brand-contrast">Select previous treatments trialed:</label>
                        <div class="row g-2">
                            <template x-for="t in treatmentOptions" :key="t">
                                <div class="col-sm-6">
                                    <label class="border rounded p-2 w-100 d-flex align-items-center gap-2 small cursor-pointer"
                                           :class="formData.previous_treatments.includes(t) ? 'border-brand-primary bg-brand-light' : 'bg-white'"
                                           style="cursor: pointer;">
                                        <input type="checkbox" :value="t" x-model="formData.previous_treatments" class="form-check-input mt-0">
                                        <span x-text="t"></span>
                                    </label>
                                </div>
                            </template>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="button" @click="prevStep()" class="btn btn-outline-secondary">Back</button>
                        <button type="button" @click="nextStep()" class="btn btn-brand-primary px-4">Next Step <i class="bi bi-arrow-right ms-1"></i></button>
                    </div>
                </div>

                <!-- Step 3: Medical Contraindications -->
                <div x-show="step === 3" x-transition>
                    <h4 class="fw-bold text-brand-contrast mb-1">3. Safety & Medical Safety Screen</h4>
                    <p class="text-muted small mb-4">Please answer honestly to assist Dr. Batthala in assessing clinical safety.</p>

                    <div class="mb-3 p-3 border rounded-3 bg-light">
                        <label class="form-label fw-semibold small text-brand-contrast d-block mb-2">Are you currently pregnant, planning pregnancy, or breastfeeding?</label>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" :value="false" x-model="formData.is_pregnant_or_breastfeeding" id="preg_no">
                                <label class="form-check-label small" for="preg_no">No</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" :value="true" x-model="formData.is_pregnant_or_breastfeeding" id="preg_yes">
                                <label class="form-check-label small" for="preg_yes">Yes</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 p-3 border rounded-3 bg-light">
                        <label class="form-label fw-semibold small text-brand-contrast d-block mb-2">Do you have a personal history of active psychosis or schizophrenia?</label>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" :value="false" x-model="formData.has_psychosis_history" id="psych_no">
                                <label class="form-check-label small" for="psych_no">No</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" :value="true" x-model="formData.has_psychosis_history" id="psych_yes">
                                <label class="form-check-label small" for="psych_yes">Yes</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 p-3 border rounded-3 bg-light">
                        <label class="form-label fw-semibold small text-brand-contrast d-block mb-2">Do you have severe, unstable cardiovascular disease?</label>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" :value="false" x-model="formData.has_cardiovascular_issues" id="cardio_no">
                                <label class="form-check-label small" for="cardio_no">No</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" :value="true" x-model="formData.has_cardiovascular_issues" id="cardio_yes">
                                <label class="form-check-label small" for="cardio_yes">Yes</label>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="button" @click="prevStep()" class="btn btn-outline-secondary">Back</button>
                        <button type="button" @click="nextStep()" class="btn btn-brand-primary px-4">Next Step <i class="bi bi-arrow-right ms-1"></i></button>
                    </div>
                </div>

                <!-- Step 4: Demographics & Submit -->
                <div x-show="step === 4" x-transition>
                    <h4 class="fw-bold text-brand-contrast mb-1">4. Where Should We Send Your Results?</h4>
                    <p class="text-muted small mb-4">Enter your details for instant eligibility analysis.</p>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">Full Name *</label>
                            <input type="text" class="form-control" x-model="formData.full_name" placeholder="Jane Doe" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">Email Address *</label>
                            <input type="email" class="form-control" x-model="formData.email" placeholder="jane@example.com" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">Mobile Phone *</label>
                            <input type="text" class="form-control" x-model="formData.phone" placeholder="0412 345 678" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">Age Group *</label>
                            <select class="form-select" x-model="formData.age_bracket">
                                <option value="18-24">18 - 24 years</option>
                                <option value="25-34">25 - 34 years</option>
                                <option value="35-44">35 - 44 years</option>
                                <option value="45-54">45 - 54 years</option>
                                <option value="55-64">55 - 64 years</option>
                                <option value="65+">65+ years</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <button type="button" @click="prevStep()" class="btn btn-outline-secondary">Back</button>
                        <button type="button" @click="submitQuiz()" :disabled="submitting" class="btn btn-brand-primary btn-lg px-4">
                            <span x-show="!submitting"><i class="bi bi-shield-check me-1"></i> Reveal My Pre-Qualification Result</span>
                            <span x-show="submitting"><span class="spinner-border spinner-border-sm me-1"></span> Analyzing Clinical Criteria...</span>
                        </button>
                    </div>
                </div>

                <!-- Result Screen -->
                <div x-show="step === 5" x-transition class="text-center py-3">
                    <template x-if="result.is_eligible">
                        <div>
                            <div class="rounded-circle bg-brand-sage-light text-brand-sage p-3 d-inline-flex mb-3">
                                <i class="bi bi-check-circle-fill display-4"></i>
                            </div>
                            <h3 class="fw-bold text-brand-contrast mb-2">You Are Pre-Qualified for Medicinal Cannabis!</h3>
                            <p class="text-muted max-w-600 mx-auto mb-4" x-text="result.rationale"></p>

                            <div class="p-4 bg-brand-light rounded-3 border mb-4 text-start">
                                <h6 class="fw-bold text-brand-contrast mb-2"><i class="bi bi-calendar-check text-brand-primary me-2"></i> Next Step: Telehealth Booking</h6>
                                <p class="small text-muted mb-0">Your answers have been securely attached to your file. Proceed to choose an appointment slot with <strong>Dr. Suneetha Batthala</strong>.</p>
                            </div>

                            <a :href="result.redirect_url" class="btn btn-brand-primary btn-lg px-5 fw-bold shadow">
                                Book Telehealth Consultation ($79) <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </template>

                    <template x-if="!result.is_eligible">
                        <div>
                            <div class="rounded-circle bg-danger bg-opacity-10 text-danger p-3 d-inline-flex mb-3">
                                <i class="bi bi-exclamation-triangle-fill display-4"></i>
                            </div>
                            <h3 class="fw-bold text-brand-contrast mb-2">Clinical Pre-Qualification Notice</h3>
                            <p class="text-muted max-w-600 mx-auto mb-4" x-text="result.rationale"></p>
                            
                            <div class="p-3 bg-light rounded-3 border mb-4 text-start small text-muted">
                                While you may not meet standard automatic SAS-B pre-screening criteria at this time, you may still contact our Surry Hills clinic directly at <a href="tel:0258385365" class="fw-bold text-brand-contrast">02 5838 5365</a> for individualized clinical advice.
                            </div>

                            <a href="{{ route('contact') }}" class="btn btn-brand-contrast">Contact Clinic Support</a>
                        </div>
                    </template>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
function eligibilityQuiz() {
    return {
        step: 1,
        submitting: false,
        stepTitles: ['Conditions', 'Previous Treatments', 'Safety Screen', 'Contact Details', 'Result'],
        conditionOptions: [
            'Chronic Lower Back / Neck Pain',
            'Arthritis & Joint Inflammation',
            'Insomnia & Nocturnal Awakenings',
            'Generalized Anxiety / Stress',
            'Fibromyalgia & Neuropathic Pain',
            'Endometriosis / Pelvic Pain',
            'Migraines & Chronic Headaches',
            'PTSD & Mood Support'
        ],
        treatmentOptions: [
            'NSAIDs (Ibuprofen / Naproxen / Meloxicam)',
            'Opioids / Pain Modulators (Codeine / Tramadol / Endone)',
            'SSRIs / SNRIs (Antidepressants)',
            'Benzodiazepines / Sleeping Tablets',
            'Physiotherapy / Chiropractic Care',
            'Psychology / Cognitive Behavioral Therapy'
        ],
        formData: {
            full_name: '{{ Auth::user()?->name ?? "" }}',
            email: '{{ Auth::user()?->email ?? "" }}',
            phone: '{{ Auth::user()?->phone ?? "" }}',
            age_bracket: '35-44',
            primary_conditions: [],
            condition_duration: 'Over 12 months',
            previous_treatments: [],
            tried_standard_medications: true,
            is_pregnant_or_breastfeeding: false,
            has_psychosis_history: false,
            has_cardiovascular_issues: false
        },
        result: {
            is_eligible: true,
            rationale: '',
            redirect_url: '{{ route("booking.index") }}'
        },
        nextStep() {
            if (this.step < 4) this.step++;
        },
        prevStep() {
            if (this.step > 1) this.step--;
        },
        async submitQuiz() {
            if (!this.formData.full_name || !this.formData.email || !this.formData.phone) {
                alert('Please fill in your name, email, and phone number.');
                return;
            }

            this.submitting = true;
            try {
                const res = await fetch('{{ route("eligibility.submit") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(this.formData)
                });
                const data = await res.json();
                this.result = data;
                this.step = 5;
            } catch (err) {
                alert('An error occurred. Please check your connection and try again.');
            } finally {
                this.submitting = false;
            }
        }
    }
}
</script>
@endsection