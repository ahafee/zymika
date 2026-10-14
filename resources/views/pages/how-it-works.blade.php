@extends('layouts.app')

@section('title', 'How It Works - ZYMIKA HEALTH Telehealth Process')

@section('content')
<!-- Premium Inner Hero Banner with Image -->
<section class="inner-hero-section">
    <div class="container">
        <div class="row align-items-center g-4 g-lg-5">
            <div class="col-lg-7" data-aos="fade-right">
                <div class="d-inline-flex align-items-center gap-2 mb-2">
                    <span class="badge badge-tga"><i class="bi bi-diagram-3-fill me-1"></i> 4-STEP CARE PATHWAY</span>
                    <span class="badge bg-white text-brand-contrast border"><i class="bi bi-clock-history text-brand-primary me-1"></i> 100% Online</span>
                </div>
                <h1 class="display-5 fw-bold text-brand-contrast mb-3">How Australian Telehealth Works</h1>
                <p class="lead text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                
                <div class="d-flex flex-wrap gap-3 mb-4">
                    <div class="d-flex align-items-center gap-2 small fw-semibold text-brand-contrast">
                        <i class="bi bi-check-circle-fill text-brand-primary fs-5"></i>
                        <span>No Referral Needed</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 small fw-semibold text-brand-contrast">
                        <i class="bi bi-shield-check text-brand-sage fs-5"></i>
                        <span>AHPRA Doctor Consult</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 small fw-semibold text-brand-contrast">
                        <i class="bi bi-truck text-brand-primary fs-5"></i>
                        <span>Discreet Nationwide Delivery</span>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('booking.index') }}" class="btn btn-brand-primary btn-lg shadow-sm">
                        <i class="bi bi-calendar2-check me-2"></i> Book Initial Consult ($79)
                    </a>
                    <a href="{{ route('eligibility.show') }}" class="btn btn-brand-outline btn-lg">
                        <i class="bi bi-ui-checks me-2"></i> Check Eligibility (60s)
                    </a>
                </div>
            </div>

            <div class="col-lg-5" data-aos="fade-left" data-aos-delay="150">
                <div class="inner-hero-img-wrap">
                    <img src="{{ asset('images/hero-telehealth.jpg') }}" alt="Telehealth Consultation" class="inner-hero-img">
                    <div class="inner-hero-floating-badge">
                        <div class="bg-brand-primary text-white rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                            <i class="bi bi-camera-video fs-5"></i>
                        </div>
                        <div>
                            <div class="fw-bold text-brand-contrast small">Encrypted Coviu Video</div>
                            <div class="text-muted" style="font-size: 0.72rem;">Direct MediRecords Integration</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Step by Step Journey Section -->
<div class="container py-5">
    <div class="text-center max-w-700 mx-auto mb-5" data-aos="fade-up">
        <span class="badge badge-tga mb-2">CLINICAL PROCESS</span>
        <h2 class="display-6 fw-bold text-brand-contrast">From Assessment to Treatment in 4 Simple Steps</h2>
        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt.</p>
    </div>

    <div class="row g-4 mb-5">
        <!-- Step 1 -->
        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
            <div class="card card-zymika h-100 p-4 border bg-white shadow-sm d-flex flex-column">
                <div class="inner-step-img-wrap">
                    <img src="{{ asset('images/step1-assessment.jpg') }}" alt="Step 1 Assessment" class="inner-step-img">
                </div>
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="badge bg-brand-primary text-white rounded-pill px-2.5 py-1">Step 01</span>
                    <span class="small text-muted fw-semibold">Intake Assessment</span>
                </div>
                <h5 class="fw-bold text-brand-contrast mb-2">Complete Health Intake</h5>
                <p class="small text-muted mb-3 flex-grow-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.</p>
                <a href="{{ route('eligibility.show') }}" class="btn btn-sm btn-brand-outline w-100 mt-auto">
                    Start Assessment <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

        <!-- Step 2 -->
        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
            <div class="card card-zymika h-100 p-4 border bg-white shadow-sm d-flex flex-column">
                <div class="inner-step-img-wrap">
                    <img src="{{ asset('images/step2-telehealth.jpg') }}" alt="Step 2 Telehealth" class="inner-step-img">
                </div>
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="badge bg-brand-contrast text-white rounded-pill px-2.5 py-1">Step 02</span>
                    <span class="small text-muted fw-semibold">Doctor Video Consult</span>
                </div>
                <h5 class="fw-bold text-brand-contrast mb-2">Telehealth Consultation</h5>
                <p class="small text-muted mb-3 flex-grow-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.</p>
                <a href="{{ route('booking.index') }}" class="btn btn-sm btn-brand-primary w-100 mt-auto">
                    Book Doctor ($79) <i class="bi bi-calendar-check ms-1"></i>
                </a>
            </div>
        </div>

        <!-- Step 3 -->
        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
            <div class="card card-zymika h-100 p-4 border bg-white shadow-sm d-flex flex-column">
                <div class="inner-step-img-wrap">
                    <img src="{{ asset('images/step3-prescription.jpg') }}" alt="Step 3 Prescription" class="inner-step-img">
                </div>
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="badge bg-brand-sage text-white rounded-pill px-2.5 py-1">Step 03</span>
                    <span class="small text-muted fw-semibold">TGA Approval</span>
                </div>
                <h5 class="fw-bold text-brand-contrast mb-2">E-Script & Care Plan</h5>
                <p class="small text-muted mb-3 flex-grow-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.</p>
                <span class="badge bg-light text-brand-sage border p-2 text-center w-100 mt-auto small">
                    <i class="bi bi-patch-check-fill me-1"></i> Instant Portal Delivery
                </span>
            </div>
        </div>

        <!-- Step 4 -->
        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
            <div class="card card-zymika h-100 p-4 border bg-white shadow-sm d-flex flex-column">
                <div class="inner-step-img-wrap">
                    <img src="{{ asset('images/step4-delivery.jpg') }}" alt="Step 4 Delivery" class="inner-step-img">
                </div>
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="badge bg-brand-primary text-white rounded-pill px-2.5 py-1">Step 04</span>
                    <span class="small text-muted fw-semibold">Discreet Dispatch</span>
                </div>
                <h5 class="fw-bold text-brand-contrast mb-2">Express Pharmacy Delivery</h5>
                <p class="small text-muted mb-3 flex-grow-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.</p>
                <span class="badge bg-light text-brand-contrast border p-2 text-center w-100 mt-auto small">
                    <i class="bi bi-truck me-1"></i> Australia Post Tracking
                </span>
            </div>
        </div>
    </div>

    <!-- Bottom Action Card -->
    <div class="card card-zymika p-4 p-md-5 bg-brand-soft border text-center" data-aos="fade-up">
        <h3 class="fw-bold text-brand-contrast mb-2">Ready to Start Your Health Journey?</h3>
        <p class="text-muted max-w-700 mx-auto mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <div class="d-flex justify-content-center flex-wrap gap-3">
            <a href="{{ route('booking.index') }}" class="btn btn-brand-primary btn-lg shadow-sm">
                <i class="bi bi-calendar2-check me-2"></i> Book Consultation ($79)
            </a>
            <a href="{{ route('contact') }}" class="btn btn-brand-outline btn-lg">
                <i class="bi bi-question-circle me-2"></i> Have Questions?
            </a>
        </div>
    </div>
</div>
@endsection