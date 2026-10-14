@extends('layouts.app')

@section('title', 'Clinical Services & Consultation Fees - ZYMIKA HEALTH')

@section('content')
<!-- Premium Inner Hero Banner with Image -->
<section class="inner-hero-section">
    <div class="container">
        <div class="row align-items-center g-4 g-lg-5">
            <div class="col-lg-7" data-aos="fade-right">
                <div class="d-inline-flex align-items-center gap-2 mb-2">
                    <span class="badge badge-tga"><i class="bi bi-wallet2 me-1"></i> HONEST &amp; TRANSPARENT FEES</span>
                    <span class="badge bg-white text-brand-contrast border"><i class="bi bi-shield-check text-brand-sage me-1"></i> TGA SAS-B &amp; AP</span>
                </div>
                <h1 class="display-5 fw-bold text-brand-contrast mb-3">Clinical Telehealth Services &amp; Fees</h1>
                <p class="lead text-muted mb-4">
                    Clear, transparent Australian telehealth consultation pricing with no hidden lock-in contracts. Direct AHPRA-registered doctor consultations with instant digital e-prescriptions.
                </p>
                
                <div class="d-flex flex-wrap gap-3 mb-4">
                    <div class="d-flex align-items-center gap-2 small fw-semibold text-brand-contrast">
                        <i class="bi bi-check-circle-fill text-brand-primary fs-5"></i>
                        <span>No Hidden Lock-In Subscriptions</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 small fw-semibold text-brand-contrast">
                        <i class="bi bi-check-circle-fill text-brand-primary fs-5"></i>
                        <span>TGA SAS-B Approvals Included</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 small fw-semibold text-brand-contrast">
                        <i class="bi bi-check-circle-fill text-brand-primary fs-5"></i>
                        <span>Instant E-Script Delivery via SMS</span>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('booking.index') }}" class="btn btn-brand-primary btn-lg shadow-sm">
                        <i class="bi bi-calendar2-check me-2"></i> Book Doctor Consult ($79)
                    </a>
                    <a href="{{ route('eligibility.show') }}" class="btn btn-brand-outline btn-lg">
                        <i class="bi bi-ui-checks me-2"></i> Free Eligibility Check
                    </a>
                </div>
            </div>

            <div class="col-lg-5" data-aos="fade-left" data-aos-delay="150">
                <div class="inner-hero-img-wrap">
                    <img src="{{ asset('images/cond-pain.jpg') }}" alt="Clinical Telehealth Services" class="inner-hero-img">
                    <div class="inner-hero-floating-badge">
                        <div class="bg-success text-white rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                            <i class="bi bi-patch-check-fill fs-5"></i>
                        </div>
                        <div>
                            <div class="fw-bold text-brand-contrast small">Initial Consult $79 &bull; Follow-Up $49</div>
                            <div class="text-muted" style="font-size: 0.72rem;">Dedicated Australian Telehealth Doctor</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container py-5">
    <div class="text-center max-w-700 mx-auto mb-5" data-aos="fade-up">
        <span class="badge badge-tga mb-2">APPOINTMENT PACKAGES</span>
        <h2 class="display-6 fw-bold text-brand-contrast">Clear, Transparent Consultation Fees</h2>
        <p class="text-muted">Simple, upfront pricing for individualized plant medicine therapy and chronic condition telehealth.</p>
    </div>

    <!-- Luxury Pricing Services Cards matching Home Design -->
    <div class="row g-4 mb-5 justify-content-center">
        <!-- 1. Initial Telehealth Consultation (Featured) -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
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

        <!-- 2. Follow-Up & Dosage Review -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
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

        <!-- 3. Express Repeat Prescription -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
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

    <!-- Treatment Areas with Thumbnail Visuals -->
    <div class="mt-5 pt-5 border-top" data-aos="fade-up">
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="badge badge-tga mb-2">CLINICAL FOCUS</span>
            <h3 class="display-6 fw-bold text-brand-contrast">Primary Clinical Indications</h3>
            <p class="text-muted">Evidence-based plant medicine treatments tailored for severe and chronic indications.</p>
        </div>

        <div class="row g-4">
            <!-- Pain -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-white border rounded-3 h-100 shadow-sm d-flex gap-3 align-items-start card-zymika">
                    <div class="condition-thumb-wrap">
                        <img src="{{ asset('images/cond-pain.jpg') }}" alt="Chronic Pain" class="condition-thumb-img">
                    </div>
                    <div>
                        <h6 class="fw-bold text-brand-contrast mb-1">Chronic Pain Management</h6>
                        <p class="small text-muted mb-0">Musculoskeletal, neuropathic, back &amp; joint pain reduction protocols.</p>
                    </div>
                </div>
            </div>

            <!-- Sleep -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4 bg-white border rounded-3 h-100 shadow-sm d-flex gap-3 align-items-start card-zymika">
                    <div class="condition-thumb-wrap">
                        <img src="{{ asset('images/cond-sleep.jpg') }}" alt="Sleep Disorders" class="condition-thumb-img">
                    </div>
                    <div>
                        <h6 class="fw-bold text-brand-contrast mb-1">Sleep &amp; Insomnia Care</h6>
                        <p class="small text-muted mb-0">Restorative cannabinoid titration to improve sleep latency and quality.</p>
                    </div>
                </div>
            </div>

            <!-- Anxiety -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="p-4 bg-white border rounded-3 h-100 shadow-sm d-flex gap-3 align-items-start card-zymika">
                    <div class="condition-thumb-wrap">
                        <img src="{{ asset('images/cond-anxiety.jpg') }}" alt="Anxiety Disorders" class="condition-thumb-img">
                    </div>
                    <div>
                        <h6 class="fw-bold text-brand-contrast mb-1">Anxiety &amp; Mood Support</h6>
                        <p class="small text-muted mb-0">Gentle calming formulations for generalized anxiety and PTSD support.</p>
                    </div>
                </div>
            </div>

            <!-- Women's Health -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                <div class="p-4 bg-white border rounded-3 h-100 shadow-sm d-flex gap-3 align-items-start card-zymika">
                    <div class="condition-thumb-wrap">
                        <img src="{{ asset('images/cond-women.jpg') }}" alt="Women's Health" class="condition-thumb-img">
                    </div>
                    <div>
                        <h6 class="fw-bold text-brand-contrast mb-1">Women's Health &amp; Pelvic Pain</h6>
                        <p class="small text-muted mb-0">Targeted support for endometriosis symptoms and pelvic cramping.</p>
                    </div>
                </div>
            </div>

            <!-- Neurological -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
                <div class="p-4 bg-white border rounded-3 h-100 shadow-sm d-flex gap-3 align-items-start card-zymika">
                    <div class="condition-thumb-wrap">
                        <img src="{{ asset('images/cond-neuro.jpg') }}" alt="Neurological Conditions" class="condition-thumb-img">
                    </div>
                    <div>
                        <h6 class="fw-bold text-brand-contrast mb-1">Neurological &amp; Tremor Care</h6>
                        <p class="small text-muted mb-0">Supportive symptom management for chronic migraines and neuropathies.</p>
                    </div>
                </div>
            </div>

            <!-- Palliative -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="600">
                <div class="p-4 bg-white border rounded-3 h-100 shadow-sm d-flex gap-3 align-items-start card-zymika">
                    <div class="condition-thumb-wrap">
                        <img src="{{ asset('images/cond-palliative.jpg') }}" alt="Palliative Support" class="condition-thumb-img">
                    </div>
                    <div>
                        <h6 class="fw-bold text-brand-contrast mb-1">Integrative Palliative Care</h6>
                        <p class="small text-muted mb-0">Appetite stimulation, nausea mitigation and comfort-focused therapies.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection