@extends('layouts.app')

@section('title', 'ZYMIKA HEALTH | Australian Telehealth & Medicinal Cannabis Clinic - Zymika Health')

@section('content')
<!-- Hero Section -->
<section class="hero-gradient py-5 py-lg-6 position-relative overflow-hidden">
    <div class="container py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-7" data-aos="fade-right" data-aos-duration="800">
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill badge-tga mb-3">
                    <span class="pulse-dot"></span>
                    <span>TGA SAS-B &amp; Authorised Prescriber Telehealth Clinic</span>
                </div>
                <h1 class="display-4 fw-extrabold text-brand-contrast mb-3 lh-tight hero-animated-heading">
                    <span class="d-inline-block">Compassionate, Physician-Led</span> <br class="d-none d-md-inline">
                    <span class="animated-gradient-brand d-inline-block">Medicinal Cannabis</span> <span>Care</span>
                </h1>
                <p class="lead text-brand-contrast opacity-90 mb-4 pe-lg-4 fs-5">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
                </p>

                <!-- Action CTAs -->
                <div class="d-flex flex-wrap gap-3 mb-4">
                    <a href="{{ route('eligibility.show') }}" class="btn btn-brand-primary btn-lg shadow-primary">
                        <i class="bi bi-ui-checks fs-5"></i>
                        <span>Check Eligibility in 60s</span>
                    </a>
                    <a href="{{ route('booking.index') }}" class="btn btn-brand-contrast btn-lg">
                        <i class="bi bi-calendar2-plus fs-5"></i>
                        <span>Book Telehealth ($79)</span>
                    </a>
                </div>
            </div>

            <div class="col-lg-5" data-aos="fade-left" data-aos-duration="800" data-aos-delay="150">
                <!-- Hero Visual Composite Card -->
                <div class="hero-visual-card position-relative mb-4">
                    <img src="{{ asset('images/hero-telehealth.jpg') }}" 
                         alt="Australian Telehealth Consultation" 
                         class="hero-visual-img"
                         onerror="this.src='{{ asset('images/logo.svg') }}'">
                </div>

                <!-- Interactive Quick Eligibility Card -->
                <div class="card card-zymika p-4 p-md-4 shadow-lg border-0 bg-white position-relative">
                    <h5 class="fw-bold text-brand-contrast mb-1">Check Your Eligibility</h5>
                    <p class="text-muted small mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt.</p>

                    <form action="{{ route('eligibility.show') }}" method="GET">
                        <div class="mb-3">
                            <label class="form-label fw-bold small text-brand-contrast mb-1.5 d-flex align-items-center gap-1.5">
                                <i class="bi bi-heart-pulse text-brand-primary"></i> What condition are you seeking care for?
                            </label>
                            <div class="position-relative">
                                <select class="form-select form-select-vip" name="condition" aria-label="Select therapy condition">
                                    <option value="" selected>Select your condition</option>
                                    <option value="pain">Chronic Pain (Back, Joints, Fibromyalgia)</option>
                                    <option value="sleep">Insomnia &amp; Sleep Maintenance</option>
                                    <option value="anxiety">Generalized Anxiety &amp; Stress</option>
                                    <option value="neurological">Migraines &amp; Neuropathic Pain</option>
                                    <option value="women">Endometriosis &amp; Pelvic Pain</option>
                                    <option value="other">Other Chronic Condition (&gt; 3 months)</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold small text-brand-contrast">Have you tried conventional medications?</label>
                            <div class="d-flex gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="prior_treatment" id="prior_yes" value="yes" checked>
                                    <label class="form-check-label small fw-semibold" for="prior_yes">Yes, tried first-line meds</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="prior_treatment" id="prior_no" value="no">
                                    <label class="form-check-label small" for="prior_no">No</label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-brand-primary w-100 py-2 fw-bold shadow-sm">
                            Proceed to Clinical Assessment <i class="bi bi-arrow-right ms-1"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Strip -->
<section class="py-4">
    <div class="container">
        <div class="row g-3" data-aos="fade-up" data-aos-delay="200">
            <div class="col-12">
                <div class="hero-stats-strip">
                    <div class="row g-4 text-center text-md-start align-items-center">
                        <div class="col-6 col-md-3">
                            <div class="hero-stat-item justify-content-center justify-content-md-start">
                                <div class="hero-stat-icon bg-brand-primary-light text-brand-primary">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                                <div>
                                    <h4 class="fw-extrabold text-brand-contrast mb-0 num-font">10,000+</h4>
                                    <span class="small text-muted">Aussie Patients Assessed</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <div class="hero-stat-item justify-content-center justify-content-md-start">
                                <div class="hero-stat-icon bg-brand-sage-light text-brand-sage">
                                    <i class="bi bi-award-fill"></i>
                                </div>
                                <div>
                                    <h4 class="fw-extrabold text-brand-contrast mb-0 num-font">100%</h4>
                                    <span class="small text-muted">AHPRA Accredited Doctor</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <div class="hero-stat-item justify-content-center justify-content-md-start">
                                <div class="hero-stat-icon bg-light text-brand-contrast border">
                                    <i class="bi bi-shield-shaded"></i>
                                </div>
                                <div>
                                    <h4 class="fw-extrabold text-brand-contrast mb-0 num-font">TGA SAS-B</h4>
                                    <span class="small text-muted">Authorised Prescriptions</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <div class="hero-stat-item justify-content-center justify-content-md-start">
                                <div class="hero-stat-icon bg-brand-primary-light text-brand-primary">
                                    <i class="bi bi-lightning-charge-fill"></i>
                                </div>
                                <div>
                                    <h4 class="fw-extrabold text-brand-contrast mb-0 num-font">1-2 Days</h4>
                                    <span class="small text-muted">Express AusPost Dispatch</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Simple 4-Step Process Section -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-4">
        <div class="text-center max-w-700 mx-auto mb-5" data-aos="fade-up">
            <span class="badge badge-tga mb-2">STREAMLINED TELEHEALTH PROCESS</span>
            <h2 class="display-6 fw-bold text-brand-contrast mt-1">How Telehealth Works at ZYMIKA HEALTH</h2>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore.</p>
        </div>

        <div class="row g-4">
            <!-- Step 1 -->
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="process-card-vip">
                    <img src="{{ asset('images/step1-assessment.jpg') }}" 
                         alt="Step 1 Pre-Assessment" 
                         class="process-card-img"
                         onerror="this.style.display='none'">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="process-num-badge bg-brand-primary text-white">01</div>
                    </div>
                    <h5 class="fw-bold text-brand-contrast mb-2">60s Pre-Assessment</h5>
                    <p class="text-muted small mb-3 flex-grow-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt.</p>
                    <div class="pt-3 border-top mt-auto">
                        <span class="small text-brand-primary fw-semibold"><i class="bi bi-check2-circle me-1"></i> Instant Pre-Qualification</span>
                    </div>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="process-card-vip">
                    <img src="{{ asset('images/step2-telehealth.jpg') }}" 
                         alt="Step 2 Doctor Telehealth" 
                         class="process-card-img"
                         onerror="this.style.display='none'">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="process-num-badge bg-brand-contrast text-white">02</div>
                    </div>
                    <h5 class="fw-bold text-brand-contrast mb-2">Doctor Telehealth</h5>
                    <p class="text-muted small mb-3 flex-grow-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt.</p>
                    <div class="pt-3 border-top mt-auto">
                        <span class="small text-brand-contrast fw-semibold"><i class="bi bi-camera-video me-1"></i> Encrypted Video Consult</span>
                    </div>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <div class="process-card-vip">
                    <img src="{{ asset('images/step3-prescription.jpg') }}" 
                         alt="Step 3 TGA Script Issuance" 
                         class="process-card-img"
                         onerror="this.style.display='none'">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="process-num-badge bg-brand-sage text-white">03</div>
                    </div>
                    <h5 class="fw-bold text-brand-contrast mb-2">TGA &amp; Script Issuance</h5>
                    <p class="text-muted small mb-3 flex-grow-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt.</p>
                    <div class="pt-3 border-top mt-auto">
                        <span class="small text-brand-sage fw-semibold"><i class="bi bi-file-earmark-medical me-1"></i> Digital E-Script Sync</span>
                    </div>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                <div class="process-card-vip">
                    <img src="{{ asset('images/step4-delivery.jpg') }}" 
                         alt="Step 4 Express Delivery" 
                         class="process-card-img"
                         onerror="this.style.display='none'">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="process-num-badge bg-brand-primary text-white">04</div>
                    </div>
                    <h5 class="fw-bold text-brand-contrast mb-2">Express Home Delivery</h5>
                    <p class="text-muted small mb-3 flex-grow-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt.</p>
                    <div class="pt-3 border-top mt-auto">
                        <span class="small text-brand-primary fw-semibold"><i class="bi bi-truck me-1"></i> Nationwide Express Tracking</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('booking.index') }}" class="btn btn-brand-primary btn-lg px-5 shadow">
                Book Initial Consultation ($79) <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Clinical Indications & Treatment Areas -->
<section class="py-5 py-lg-6 primary1" style="background-color: var(--brand-bg-alt);">
    <div class="container py-4">
        <div class="text-center max-w-700 mx-auto mb-5" data-aos="fade-up">
            <span class="badge badge-tga mb-2">EVIDENCE-BASED CARE</span>
            <h2 class="display-6 fw-bold text-brand-contrast mt-1">Primary Clinical Indications Treated</h2>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.</p>
        </div>

        <div class="row g-4">
            <!-- 1. Chronic Pain -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="condition-card-vip">
                    <div class="condition-thumb-wrap">
                        <img src="{{ asset('images/cond-pain.jpg') }}" 
                             alt="Chronic Pain Relief" 
                             class="condition-thumb-img"
                             onerror="this.src='{{ asset('images/logo.svg') }}'">
                        <div class="condition-floating-icon text-brand-primary">
                            <i class="bi bi-capsule"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold text-brand-contrast mb-2">Chronic Musculoskeletal &amp; Nerve Pain</h5>
                    <p class="small text-muted mb-3 flex-grow-1">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <div class="d-flex flex-wrap gap-1 mt-auto pt-2.5 border-top">
                        <span class="badge bg-light text-brand-contrast border small">Sciatica</span>
                        <span class="badge bg-light text-brand-contrast border small">Arthritis</span>
                        <span class="badge bg-light text-brand-contrast border small">Fibromyalgia</span>
                    </div>
                </div>
            </div>

            <!-- 2. Insomnia -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="150">
                <div class="condition-card-vip">
                    <div class="condition-thumb-wrap">
                        <img src="{{ asset('images/cond-sleep.jpg') }}" 
                             alt="Insomnia &amp; Sleep Architecture" 
                             class="condition-thumb-img"
                             onerror="this.src='{{ asset('images/logo.svg') }}'">
                        <div class="condition-floating-icon text-brand-sage">
                            <i class="bi bi-moon-stars-fill"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold text-brand-contrast mb-2">Insomnia &amp; Sleep Architecture</h5>
                    <p class="small text-muted mb-3 flex-grow-1">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <div class="d-flex flex-wrap gap-1 mt-auto pt-2.5 border-top">
                        <span class="badge bg-light text-brand-sage border small">Sleep Onset</span>
                        <span class="badge bg-light text-brand-sage border small">Sleep Maintenance</span>
                    </div>
                </div>
            </div>

            <!-- 3. Anxiety -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="condition-card-vip">
                    <div class="condition-thumb-wrap">
                        <img src="{{ asset('images/cond-anxiety.jpg') }}" 
                             alt="Anxiety &amp; Stress Management" 
                             class="condition-thumb-img"
                             onerror="this.src='{{ asset('images/logo.svg') }}'">
                        <div class="condition-floating-icon text-brand-contrast">
                            <i class="bi bi-heart-pulse-fill"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold text-brand-contrast mb-2">Anxiety &amp; Mood Deregulation</h5>
                    <p class="small text-muted mb-3 flex-grow-1">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <div class="d-flex flex-wrap gap-1 mt-auto pt-2.5 border-top">
                        <span class="badge bg-light text-brand-contrast border small">General Anxiety</span>
                        <span class="badge bg-light text-brand-contrast border small">PTSD</span>
                        <span class="badge bg-light text-brand-contrast border small">Work Stress</span>
                    </div>
                </div>
            </div>

            <!-- 4. Women's Health -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="250">
                <div class="condition-card-vip">
                    <div class="condition-thumb-wrap">
                        <img src="{{ asset('images/cond-women.jpg') }}" 
                             alt="Women's Health &amp; Pelvic Pain" 
                             class="condition-thumb-img"
                             onerror="this.src='{{ asset('images/logo.svg') }}'">
                        <div class="condition-floating-icon text-brand-primary">
                            <i class="bi bi-flower1"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold text-brand-contrast mb-2">Women's Health &amp; Pelvic Pain</h5>
                    <p class="small text-muted mb-3 flex-grow-1">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <div class="d-flex flex-wrap gap-1 mt-auto pt-2.5 border-top">
                        <span class="badge bg-light text-brand-contrast border small">Endometriosis</span>
                        <span class="badge bg-light text-brand-contrast border small">Pelvic Spasms</span>
                    </div>
                </div>
            </div>

            <!-- 5. Neurological Migraines -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="condition-card-vip">
                    <div class="condition-thumb-wrap">
                        <img src="{{ asset('images/cond-neuro.jpg') }}" 
                             alt="Neurological Migraines &amp; Headaches" 
                             class="condition-thumb-img"
                             onerror="this.src='{{ asset('images/logo.svg') }}'">
                        <div class="condition-floating-icon text-brand-sage">
                            <i class="bi bi-activity"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold text-brand-contrast mb-2">Neurological Migraines &amp; Headaches</h5>
                    <p class="small text-muted mb-3 flex-grow-1">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <div class="d-flex flex-wrap gap-1 mt-auto pt-2.5 border-top">
                        <span class="badge bg-light text-brand-sage border small">Cluster Migraines</span>
                        <span class="badge bg-light text-brand-sage border small">Tension Headaches</span>
                    </div>
                </div>
            </div>

            <!-- 6. Palliative Care -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="350">
                <div class="condition-card-vip">
                    <div class="condition-thumb-wrap">
                        <img src="{{ asset('images/cond-palliative.jpg') }}" 
                             alt="Palliative &amp; Oncology Support" 
                             class="condition-thumb-img"
                             onerror="this.src='{{ asset('images/logo.svg') }}'">
                        <div class="condition-floating-icon text-brand-contrast">
                            <i class="bi bi-shield-plus"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold text-brand-contrast mb-2">Palliative &amp; Oncology Support</h5>
                    <p class="small text-muted mb-3 flex-grow-1">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <div class="d-flex flex-wrap gap-1 mt-auto pt-2.5 border-top">
                        <span class="badge bg-light text-brand-contrast border small">Appetite Loss</span>
                        <span class="badge bg-light text-brand-contrast border small">Nausea</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Doctor Spotlight Section -->
<section class="py-5 py-lg-6 bg-white main-team">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-5 text-center" data-aos="fade-right">
                <div class="doctor-portrait-frame position-relative mx-auto" style="max-width: 380px;">
                    <img src="{{ asset('images/doctor-suneetha.jpg') }}" 
                         alt="Dr. Suneetha Batthala" 
                         class="doctor-portrait-img"
                         onerror="this.src='{{ asset('images/logo.svg') }}'">
                    
                    <div class="doctor-ahpra-badge position-absolute start-50 translate-middle-x px-3 py-1.5 rounded-pill shadow">
                        <i class="bi bi-check-circle-fill me-1"></i> AHPRA Verified Prescriber
                    </div>

                    <div class="position-absolute bottom-0 start-0 end-0 p-3" style="background: linear-gradient(180deg, transparent 0%, rgba(24, 28, 19, 0.95) 100%);">
                        <h4 class="fw-bold text-white mb-1">Dr. Suneetha Batthala</h4>
                        <span class="badge bg-brand-primary text-white mb-1">Lead Prescribing Medical Practitioner</span>
                        <div class="text-light small font-monospace" style="font-size: 0.78rem;">AHPRA: MED0001928472 &bull; Provider: 2938472B</div>
                    </div>
                </div>
                
                <div class="pill-live-status mt-3 shadow-sm">
                    <span class="pulse-dot"></span> Accepting Telehealth Consultations Today
                </div>
            </div>

            <div class="col-lg-7" data-aos="fade-left" data-aos-delay="150">
                <span class="badge badge-tga mb-2">CLINICAL LEADERSHIP</span>
                <h2 class="display-6 fw-bold text-brand-contrast mt-1 mb-3">Meet Your Doctor: Dr. Suneetha Batthala</h2>
                <p class="text-brand-contrast opacity-90 mb-4 fs-6">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
                </p>
                <div class="row g-3 mb-4">
                    <div class="col-sm-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="d-flex align-items-start gap-3 p-3 bg-brand-light rounded-3 h-100">
                            <i class="bi bi-patch-check-fill text-brand-primary fs-4 mt-1"></i>
                            <div>
                                <strong>Authorised Prescriber (AP)</strong>
                                <p class="small text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6" data-aos="fade-up" data-aos-delay="250">
                        <div class="d-flex align-items-start gap-3 p-3 bg-brand-light rounded-3 h-100">
                            <i class="bi bi-sliders text-brand-sage fs-4 mt-1"></i>
                            <div>
                                <strong>Individualized Titration</strong>
                                <p class="small text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="d-flex align-items-start gap-3 p-3 bg-brand-light rounded-3 h-100">
                            <i class="bi bi-geo-alt-fill text-brand-contrast fs-4 mt-1"></i>
                            <div>
                                <strong>Surry Hills Clinic HQ</strong>
                                <p class="small text-muted mb-0">Level 1, 63-73 Ann St, Surry Hills NSW 2010.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6" data-aos="fade-up" data-aos-delay="350">
                        <div class="d-flex align-items-start gap-3 p-3 bg-brand-light rounded-3 h-100">
                            <i class="bi bi-cloud-check-fill text-brand-primary fs-4 mt-1"></i>
                            <div>
                                <strong>MediRecords Integration</strong>
                                <p class="small text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('booking.index') }}" class="btn btn-brand-primary btn-lg px-4 shadow">
                        Schedule Consult with Dr. Batthala
                    </a>
                    <a href="{{ route('about') }}" class="btn btn-outline-secondary btn-lg px-4">
                        Learn More About Our Clinic
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose ZYMIKA HEALTH vs Traditional Clinics -->
<section class="py-4 py-lg-5 position-relative overflow-hidden" style="background: linear-gradient(180deg, #fdfdfd 0%, #e7f9fb 100%);">
    <div class="container py-3">
        <div class="text-center max-w-700 mx-auto mb-4" data-aos="fade-up">
            <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill badge-tga mb-2">
                <span class="pulse-dot"></span>
                <span>THE ZYMIKA HEALTH CLINICAL ADVANTAGE</span>
            </div>
            <h2 class="display-6 fw-bold text-brand-contrast mt-1">Why Choose ZYMIKA HEALTH Telehealth?</h2>
            <p class="text-muted fs-6 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.</p>
        </div>

        <!-- Animated Side-by-Side Comparison Dual Cards -->
        <div class="row g-3 g-lg-4 align-items-stretch mb-4 mb-lg-5">
            <!-- Left Card: ZYMIKA HEALTH VIP Card -->
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="800">
                <div class="zymika-winner-card h-100 d-flex flex-column position-relative">
                    <div class="p-3.5 p-lg-4 d-flex flex-column flex-grow-1">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="comp-header-logo bg-brand-primary text-white">
                                <i class="bi bi-shield-check fs-4"></i>
                            </div>
                            <div>
                                <h3 class="h4 fw-extrabold text-white mb-1">ZYMIKA HEALTH Digital Clinic</h3>
                                <span class="text-brand-primary fw-semibold small">Compassionate &middot; AHPRA Registered &middot; 100% Online</span>
                            </div>
                        </div>

                        <div class="comparison-features-list flex-grow-1">
                            <div class="comp-feature-item zymika-feature" data-aos="fade-up" data-aos-delay="100">
                                <div class="comp-icon-box bg-brand-primary text-white">
                                    <i class="bi bi-lightning-charge-fill"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-white mb-1">Same-Day / Next-Day Consultations</h6>
                                    <p class="small text-light opacity-75 mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit sed.</p>
                                </div>
                            </div>

                            <div class="comp-feature-item zymika-feature" data-aos="fade-up" data-aos-delay="150">
                                <div class="comp-icon-box bg-brand-sage text-white">
                                    <i class="bi bi-house-door-fill"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-white mb-1">100% Home Video &amp; Phone Consults</h6>
                                    <p class="small text-light opacity-75 mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit sed.</p>
                                </div>
                            </div>

                            <div class="comp-feature-item zymika-feature" data-aos="fade-up" data-aos-delay="200">
                                <div class="comp-icon-box bg-brand-primary text-white">
                                    <i class="bi bi-award-fill"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-white mb-1">Direct TGA Authorised Prescriber (AP)</h6>
                                    <p class="small text-light opacity-75 mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit sed.</p>
                                </div>
                            </div>

                            <div class="comp-feature-item zymika-feature" data-aos="fade-up" data-aos-delay="250">
                                <div class="comp-icon-box bg-brand-sage text-white">
                                    <i class="bi bi-truck"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-white mb-1">AusPost Express Discreet Delivery</h6>
                                    <p class="small text-light opacity-75 mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit sed.</p>
                                </div>
                            </div>

                            <div class="comp-feature-item zymika-feature" data-aos="fade-up" data-aos-delay="300">
                                <div class="comp-icon-box bg-brand-primary text-white">
                                    <i class="bi bi-arrow-repeat"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-white mb-1">1-Click Digital Repeat Script Portal</h6>
                                    <p class="small text-light opacity-75 mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit sed.</p>
                                </div>
                            </div>

                            <div class="comp-feature-item zymika-feature" data-aos="fade-up" data-aos-delay="350">
                                <div class="comp-icon-box bg-brand-sage text-white">
                                    <i class="bi bi-cloud-check-fill"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-white mb-1">MediRecords EHR Cloud Integration</h6>
                                    <p class="small text-light opacity-75 mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit sed.</p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-3 mt-3 border-top border-secondary border-opacity-25">
                            <a href="{{ route('eligibility.show') }}" class="btn btn-brand-primary w-100 py-2.5 fw-bold shadow">
                                <i class="bi bi-ui-checks me-2"></i> Check Your Eligibility (Free 60s)
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Card: Traditional Clinic Friction -->
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="800" data-aos-delay="150">
                <div class="traditional-clinic-card h-100 d-flex flex-column">
                    <div class="p-3.5 p-lg-4 d-flex flex-column flex-grow-1">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div>
                                <h3 class="h4 fw-bold text-brand-contrast mb-1">Traditional In-Person Clinics</h3>
                                <span class="text-muted small">Legacy Model &middot; Physical Waiting Rooms &middot; Paper Records</span>
                            </div>
                        </div>

                        <div class="comparison-features-list flex-grow-1">
                            <div class="comp-feature-item trad-feature">
                                <div class="comp-icon-box bg-danger bg-opacity-10 text-danger">
                                    <i class="bi bi-x-lg"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-brand-contrast mb-1">2 to 4 Weeks Appointment Wait</h6>
                                    <p class="small text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit sed.</p>
                                </div>
                            </div>

                            <div class="comp-feature-item trad-feature">
                                <div class="comp-icon-box bg-danger bg-opacity-10 text-danger">
                                    <i class="bi bi-x-lg"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-brand-contrast mb-1">Physical Travel &amp; Crowded Waiting Rooms</h6>
                                    <p class="small text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit sed.</p>
                                </div>
                            </div>

                            <div class="comp-feature-item trad-feature">
                                <div class="comp-icon-box bg-danger bg-opacity-10 text-danger">
                                    <i class="bi bi-x-lg"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-brand-contrast mb-1">Complex Multi-Step Referrals</h6>
                                    <p class="small text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit sed.</p>
                                </div>
                            </div>

                            <div class="comp-feature-item trad-feature">
                                <div class="comp-icon-box bg-danger bg-opacity-10 text-danger">
                                    <i class="bi bi-x-lg"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-brand-contrast mb-1">Pharmacy Stock Outages &amp; Manual Pickup</h6>
                                    <p class="small text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit sed.</p>
                                </div>
                            </div>

                            <div class="comp-feature-item trad-feature">
                                <div class="comp-icon-box bg-danger bg-opacity-10 text-danger">
                                    <i class="bi bi-x-lg"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-brand-contrast mb-1">Full Consult Fee Charged for Repeat Scripts</h6>
                                    <p class="small text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit sed.</p>
                                </div>
                            </div>

                            <div class="comp-feature-item trad-feature">
                                <div class="comp-icon-box bg-danger bg-opacity-10 text-danger">
                                    <i class="bi bi-x-lg"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-brand-contrast mb-1">Fragmented Paper &amp; Legacy Systems</h6>
                                    <p class="small text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit sed.</p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-3 mt-3 border-top">
                            <a href="{{ route('booking.index') }}" class="btn btn-outline-secondary w-100 py-2.5 fw-semibold">
                                <i class="bi bi-calendar2-check me-2"></i> Book Doctor Consultation ($79)
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Verified Patient Testimonials Slider -->
<section class="py-5 py-lg-6 bg-white overflow-hidden">
    <div class="container py-4">
        <div class="d-flex flex-wrap justify-content-between align-items-end mb-4" data-aos="fade-up">
            <div>
                <span class="badge badge-tga mb-2">VERIFIED PATIENT STORIES</span>
                <h2 class="display-6 fw-bold text-brand-contrast mt-1 mb-1">Transforming Lives Across Australia</h2>
                <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.</p>
            </div>
            
            <!-- Carousel Control Buttons -->
            <div class="d-flex gap-2 mt-3 mt-md-0">
                <button class="testimonial-carousel-btn" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev" aria-label="Previous story">
                    <i class="bi bi-arrow-left"></i>
                </button>
                <button class="testimonial-carousel-btn" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next" aria-label="Next story">
                    <i class="bi bi-arrow-right"></i>
                </button>
            </div>
        </div>

        <!-- Interactive Bootstrap 5 Carousel -->
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000" data-aos="fade-up" data-aos-delay="100">
            <div class="carousel-inner pb-4">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6">
                            <div class="testimonial-card-vip">
                                <i class="bi bi-quote testimonial-quote-icon"></i>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="text-warning small">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    </div>
                                    <span class="badge badge-verified"><i class="bi bi-patch-check-fill me-1"></i> Verified Patient</span>
                                </div>
                                <p class="text-brand-contrast small mb-4 flex-grow-1 lh-base">
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris."
                                </p>
                                <div class="d-flex align-items-center gap-3 mt-auto pt-3 border-top">
                                    <div class="avatar-vip" style="width: 42px; height: 42px; font-size: 0.95rem;">JM</div>
                                    <div>
                                        <div class="fw-bold text-brand-contrast">John M.</div>
                                        <div class="text-muted small" style="font-size: 0.78rem;">Surry Hills, NSW &bull; Chronic Nerve Pain</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="testimonial-card-vip">
                                <i class="bi bi-quote testimonial-quote-icon"></i>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="text-warning small">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    </div>
                                    <span class="badge badge-verified"><i class="bi bi-patch-check-fill me-1"></i> Verified Patient</span>
                                </div>
                                <p class="text-brand-contrast small mb-4 flex-grow-1 lh-base">
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris."
                                </p>
                                <div class="d-flex align-items-center gap-3 mt-auto pt-3 border-top">
                                    <div class="avatar-vip" style="width: 42px; height: 42px; font-size: 0.95rem; background: linear-gradient(135deg, var(--brand-sage) 0%, var(--brand-contrast) 100%);">SJ</div>
                                    <div>
                                        <div class="fw-bold text-brand-contrast">Sarah J.</div>
                                        <div class="text-muted small" style="font-size: 0.78rem;">Bondi Beach, NSW &bull; Severe Insomnia</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-none d-lg-block">
                            <div class="testimonial-card-vip">
                                <i class="bi bi-quote testimonial-quote-icon"></i>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="text-warning small">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    </div>
                                    <span class="badge badge-verified"><i class="bi bi-patch-check-fill me-1"></i> Verified Patient</span>
                                </div>
                                <p class="text-brand-contrast small mb-4 flex-grow-1 lh-base">
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris."
                                </p>
                                <div class="d-flex align-items-center gap-3 mt-auto pt-3 border-top">
                                    <div class="avatar-vip" style="width: 42px; height: 42px; font-size: 0.95rem; background: linear-gradient(135deg, var(--brand-contrast) 0%, #151810 100%);">DW</div>
                                    <div>
                                        <div class="fw-bold text-brand-contrast">David W.</div>
                                        <div class="text-muted small" style="font-size: 0.78rem;">Paddington, NSW &bull; Osteoarthritis</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6">
                            <div class="testimonial-card-vip">
                                <i class="bi bi-quote testimonial-quote-icon"></i>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="text-warning small">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    </div>
                                    <span class="badge badge-verified"><i class="bi bi-patch-check-fill me-1"></i> Verified Patient</span>
                                </div>
                                <p class="text-brand-contrast small mb-4 flex-grow-1 lh-base">
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris."
                                </p>
                                <div class="d-flex align-items-center gap-3 mt-auto pt-3 border-top">
                                    <div class="avatar-vip" style="width: 42px; height: 42px; font-size: 0.95rem;">ER</div>
                                    <div>
                                        <div class="fw-bold text-brand-contrast">Elena R.</div>
                                        <div class="text-muted small" style="font-size: 0.78rem;">Melbourne, VIC &bull; Endometriosis &amp; Pelvic Pain</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="testimonial-card-vip">
                                <i class="bi bi-quote testimonial-quote-icon"></i>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="text-warning small">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    </div>
                                    <span class="badge badge-verified"><i class="bi bi-patch-check-fill me-1"></i> Verified Patient</span>
                                </div>
                                <p class="text-brand-contrast small mb-4 flex-grow-1 lh-base">
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris."
                                </p>
                                <div class="d-flex align-items-center gap-3 mt-auto pt-3 border-top">
                                    <div class="avatar-vip" style="width: 42px; height: 42px; font-size: 0.95rem; background: linear-gradient(135deg, var(--brand-sage) 0%, var(--brand-contrast) 100%);">MT</div>
                                    <div>
                                        <div class="fw-bold text-brand-contrast">Michael T.</div>
                                        <div class="text-muted small" style="font-size: 0.78rem;">Brisbane, QLD &bull; Anxiety &amp; Stress Care</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-none d-lg-block">
                            <div class="testimonial-card-vip">
                                <i class="bi bi-quote testimonial-quote-icon"></i>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="text-warning small">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    </div>
                                    <span class="badge badge-verified"><i class="bi bi-patch-check-fill me-1"></i> Verified Patient</span>
                                </div>
                                <p class="text-brand-contrast small mb-4 flex-grow-1 lh-base">
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris."
                                </p>
                                <div class="d-flex align-items-center gap-3 mt-auto pt-3 border-top">
                                    <div class="avatar-vip" style="width: 42px; height: 42px; font-size: 0.95rem; background: linear-gradient(135deg, var(--brand-primary) 0%, var(--brand-gold) 100%);">KB</div>
                                    <div>
                                        <div class="fw-bold text-brand-contrast">Karen B.</div>
                                        <div class="text-muted small" style="font-size: 0.78rem;">Perth, WA &bull; Neuropathic Symptom Relief</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide Indicators -->
            <div class="carousel-indicators testimonial-indicators-vip justify-content-center mt-3">
                <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
        </div>
    </div>
</section>

<!-- Transparent Pricing Section -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-4">
        <div class="text-center max-w-700 mx-auto mb-5" data-aos="fade-up">
            <span class="badge badge-tga mb-2">HONEST HEALTHCARE</span>
            <h2 class="display-6 fw-bold text-brand-contrast mt-1">Clear, Transparent Consultation Fees</h2>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt.</p>
        </div>

        <div class="row g-4 justify-content-center">
            <!-- Initial Consult (Featured) -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="150">
                <div class="pricing-card-vip pricing-card-featured">
                    <div class="pricing-badge-popular">
                        <i class="bi bi-star-fill text-warning me-1"></i> Recommended for New Patients
                    </div>
                    
                    <h4 class="fw-bold text-brand-contrast mb-1">Initial Telehealth Consultation</h4>
                    <p class="small text-muted mb-0">Comprehensive health intake, medical history review &amp; initial care plan.</p>
                    
                    <div class="pricing-amount-box">
                        <span class="pricing-currency">$</span>
                        <span class="pricing-value">79</span>
                        <span class="pricing-duration">/ 20 min session</span>
                    </div>
                    
                    <ul class="pricing-features-list flex-grow-1">
                        <li class="pricing-feature-item">
                            <span class="pricing-check-icon"><i class="bi bi-check2"></i></span>
                            <span>Dedicated video consult with AHPRA registered doctor</span>
                        </li>
                        <li class="pricing-feature-item">
                            <span class="pricing-check-icon"><i class="bi bi-check2"></i></span>
                            <span>TGA SAS-B &amp; AP documentation included</span>
                        </li>
                        <li class="pricing-feature-item">
                            <span class="pricing-check-icon"><i class="bi bi-check2"></i></span>
                            <span>MediRecords real-time EHR record sync</span>
                        </li>
                        <li class="pricing-feature-item">
                            <span class="pricing-check-icon"><i class="bi bi-check2"></i></span>
                            <span>Digital e-script to patient portal</span>
                        </li>
                    </ul>

                    <a href="{{ route('booking.index', ['service_id' => 1]) }}" class="btn btn-brand-primary w-100 py-3 fw-bold shadow">
                        Book Initial Consult ($79) <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            <!-- Follow-Up -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="pricing-card-vip">
                    <h4 class="fw-bold text-brand-contrast mb-1">Follow-Up &amp; Dosage Review</h4>
                    <p class="small text-muted mb-0">Clinical monitoring, dosage titration &amp; ongoing care plan optimization.</p>
                    
                    <div class="pricing-amount-box">
                        <span class="pricing-currency">$</span>
                        <span class="pricing-value">49</span>
                        <span class="pricing-duration">/ 15 min session</span>
                    </div>
                    
                    <ul class="pricing-features-list flex-grow-1">
                        <li class="pricing-feature-item">
                            <span class="pricing-check-icon"><i class="bi bi-check2"></i></span>
                            <span>Dedicated review with your treating doctor</span>
                        </li>
                        <li class="pricing-feature-item">
                            <span class="pricing-check-icon"><i class="bi bi-check2"></i></span>
                            <span>Dosage adjustments &amp; clinical efficacy assessment</span>
                        </li>
                        <li class="pricing-feature-item">
                            <span class="pricing-check-icon"><i class="bi bi-check2"></i></span>
                            <span>Updated digital e-scripts &amp; repeat management</span>
                        </li>
                        <li class="pricing-feature-item">
                            <span class="pricing-check-icon"><i class="bi bi-check2"></i></span>
                            <span>Direct MediRecords clinical notes update</span>
                        </li>
                    </ul>

                    <a href="{{ route('booking.index', ['service_id' => 2]) }}" class="btn btn-brand-outline w-100 py-3 fw-bold">
                        Book Follow-Up ($49) <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            <!-- Express Repeat -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="450">
                <div class="pricing-card-vip">
                    <h4 class="fw-bold text-brand-contrast mb-1">Express Repeat Prescription</h4>
                    <p class="small text-muted mb-0">Fast script replenishment for stable, existing regular patients.</p>
                    
                    <div class="pricing-amount-box">
                        <span class="pricing-currency">$</span>
                        <span class="pricing-value">39</span>
                        <span class="pricing-duration">/ 10 min session</span>
                    </div>
                    
                    <ul class="pricing-features-list flex-grow-1">
                        <li class="pricing-feature-item">
                            <span class="pricing-check-icon"><i class="bi bi-check2"></i></span>
                            <span>Quick script verification for stable treatment plans</span>
                        </li>
                        <li class="pricing-feature-item">
                            <span class="pricing-check-icon"><i class="bi bi-check2"></i></span>
                            <span>Immediate e-script dispatch to patient wallet</span>
                        </li>
                        <li class="pricing-feature-item">
                            <span class="pricing-check-icon"><i class="bi bi-check2"></i></span>
                            <span>Direct pharmacy transmission for express delivery</span>
                        </li>
                        <li class="pricing-feature-item">
                            <span class="pricing-check-icon"><i class="bi bi-check2"></i></span>
                            <span>Full compliance with TGA repeat guidelines</span>
                        </li>
                    </ul>

                    <a href="{{ route('booking.index', ['service_id' => 3]) }}" class="btn btn-brand-outline w-100 py-3 fw-bold">
                        Book Express Repeat ($39) <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Final Heavy CTA Banner -->
<section class="healing-journey-section py-5 py-lg-6" data-aos="fade-up">
    <div class="container py-3 py-lg-4">
        <div class="healing-journey-glass-card max-w-900 mx-auto text-center position-relative">
            <span class="badge bg-white text-dark px-3 py-1.5 rounded-pill fw-bold mb-3 shadow-sm" style="font-size: 0.78rem; letter-spacing: 0.04em;">
                <i class="bi bi-stars text-brand-primary me-1"></i> START YOUR JOURNEY TODAY
            </span>
            <h2 class="display-5 fw-extrabold text-white mb-3">Begin Your Healing Journey with ZYMIKA HEALTH</h2>
            <p class="lead text-light opacity-90 max-w-700 mx-auto mb-4 fs-5">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.
            </p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="{{ route('eligibility.show') }}" class="btn btn-lg btn-brand-primary px-4 px-md-5 py-3 shadow fw-bold">
                    <i class="bi bi-ui-checks me-1"></i> Take 60s Free Assessment
                </a>
                <a href="{{ route('booking.index') }}" class="btn btn-lg btn-outline-light px-4 px-md-5 py-3 fw-bold">
                    <i class="bi bi-calendar2-plus me-1"></i> Book Telehealth Consult ($79)
                </a>
            </div>
        </div>
    </div>
</section>
@endsection