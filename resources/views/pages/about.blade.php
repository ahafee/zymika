@extends('layouts.app')

@section('title', 'About Us - Zovi Health Pty Ltd / ZOVI LEAF')

@section('content')
<!-- Premium Inner Hero Banner with Image -->
<section class="inner-hero-section">
    <div class="container">
        <div class="row align-items-center g-4 g-lg-5">
            <div class="col-lg-7" data-aos="fade-right">
                <div class="d-inline-flex align-items-center gap-2 mb-2">
                    <span class="badge badge-tga"><i class="bi bi-shield-check me-1"></i> AHPRA & TGA ACCREDITED</span>
                    <span class="badge bg-white text-brand-contrast border"><i class="bi bi-geo-alt-fill text-brand-primary me-1"></i> Surry Hills NSW</span>
                </div>
                <h1 class="display-5 fw-bold text-brand-contrast mb-3">About ZOVI LEAF &amp; Zovi Health</h1>
                <p class="lead text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                
                <div class="d-flex flex-wrap gap-3 mb-4">
                    <div class="d-flex align-items-center gap-2 small fw-semibold text-brand-contrast">
                        <i class="bi bi-patch-check-fill text-brand-primary fs-5"></i>
                        <span>Authorised Prescribers</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 small fw-semibold text-brand-contrast">
                        <i class="bi bi-cloud-check-fill text-brand-sage fs-5"></i>
                        <span>MediRecords Cloud EHR</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 small fw-semibold text-brand-contrast">
                        <i class="bi bi-camera-video-fill text-brand-primary fs-5"></i>
                        <span>100% Online Telehealth</span>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('booking.index') }}" class="btn btn-brand-primary btn-lg shadow-sm">
                        <i class="bi bi-calendar2-check me-2"></i> Book Consultation ($79)
                    </a>
                    <a href="{{ route('eligibility.show') }}" class="btn btn-brand-outline btn-lg">
                        <i class="bi bi-ui-checks me-2"></i> Free Eligibility Check
                    </a>
                </div>
            </div>

            <div class="col-lg-5" data-aos="fade-left" data-aos-delay="150">
                <div class="inner-hero-img-wrap">
                    <img src="{{ asset('images/banner1.jpg') }}" alt="ZOVI LEAF Australian Telehealth Clinic" class="inner-hero-img">
                    <div class="inner-hero-floating-badge">
                        <div class="bg-success text-white rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                            <i class="bi bi-hospital fs-5"></i>
                        </div>
                        <div>
                            <div class="fw-bold text-brand-contrast small">Physician-Led Care</div>
                            <div class="text-muted" style="font-size: 0.72rem;">Australian Telehealth Practice</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Strip -->
<div class="py-4 bg-white border-bottom">
    <div class="container">
        <div class="row g-3 text-center">
            <div class="col-6 col-md-3">
                <div class="fw-extrabold text-brand-contrast fs-2 num-font">100%</div>
                <div class="text-muted small">Online Video Telehealth</div>
            </div>
            <div class="col-6 col-md-3">
                <div class="fw-extrabold text-brand-primary fs-2 num-font">AHPRA</div>
                <div class="text-muted small">Registered Medical Doctors</div>
            </div>
            <div class="col-6 col-md-3">
                <div class="fw-extrabold text-brand-sage fs-2 num-font">60 Sec</div>
                <div class="text-muted small">Online Eligibility Check</div>
            </div>
            <div class="col-6 col-md-3">
                <div class="fw-extrabold text-brand-contrast fs-2 num-font">NSW</div>
                <div class="text-muted small">Surry Hills Clinical HQ</div>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <!-- Mission & Doctor Section -->
    <div class="row g-5 align-items-center mb-5">
        <div class="col-lg-6" data-aos="fade-right">
            <span class="text-brand-primary fw-bold text-uppercase small" style="letter-spacing: 1px;">Our Mission</span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-3">Empowering Australian Patients with Evidence-Based Care</h2>
            <p class="text-muted">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
            </p>
            <p class="text-muted">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
            <div class="p-3 bg-brand-sage-light rounded-3 border">
                <h6 class="fw-bold text-brand-contrast mb-1"><i class="bi bi-patch-check-fill text-brand-sage me-2"></i> TGA Compliance First</h6>
                <p class="small text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt.</p>
            </div>
        </div>

        <div class="col-lg-6" data-aos="fade-left" data-aos-delay="150">
            <div class="card card-zovi p-4 bg-white shadow-sm border">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <img src="{{ asset('images/doctor-suneetha.jpg') }}" alt="Dr. Suneetha Batthala" class="rounded-circle border" style="width: 75px; height: 75px; object-fit: cover;">
                    <div>
                        <div class="d-flex align-items-center gap-2">
                            <h4 class="fw-bold text-brand-contrast mb-0">Dr. Suneetha Batthala</h4>
                            <span class="badge bg-success bg-opacity-10 text-success border border-success" style="font-size: 0.7rem;">Active Doctor</span>
                        </div>
                        <span class="text-brand-primary fw-semibold small">Lead Prescribing Medical Practitioner</span>
                    </div>
                </div>
                <p class="small text-muted mb-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <div class="border-top pt-3 small text-muted">
                    <div class="row g-2">
                        <div class="col-6"><strong>Provider Number:</strong> 2938472B</div>
                        <div class="col-6"><strong>AHPRA:</strong> MED0001892041</div>
                        <div class="col-6"><strong>Location:</strong> Surry Hills NSW</div>
                        <div class="col-6"><strong>Consultation Mode:</strong> Video / Phone</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Values Grid -->
    <div class="pt-4 border-top">
        <div class="text-center max-w-700 mx-auto mb-5" data-aos="fade-up">
            <span class="badge badge-tga mb-2">OUR PRINCIPLES</span>
            <h2 class="display-6 fw-bold text-brand-contrast">Core Pillars of Clinical Care</h2>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt.</p>
        </div>

        <div class="row g-4 text-center">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card card-zovi h-100 p-4 border bg-white shadow-sm">
                    <div class="bg-brand-primary-light text-brand-primary rounded-circle mx-auto p-3 mb-3 d-flex align-items-center justify-content-center" style="width: 64px; height: 64px;">
                        <i class="bi bi-heart-pulse-fill fs-2"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast">Patient-First Empathy</h5>
                    <p class="small text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card card-zovi h-100 p-4 border bg-white shadow-sm">
                    <div class="bg-brand-sage-light text-brand-sage rounded-circle mx-auto p-3 mb-3 d-flex align-items-center justify-content-center" style="width: 64px; height: 64px;">
                        <i class="bi bi-shield-check fs-2"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast">Clinical Rigor</h5>
                    <p class="small text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card card-zovi h-100 p-4 border bg-white shadow-sm">
                    <div class="bg-brand-primary-light text-brand-primary rounded-circle mx-auto p-3 mb-3 d-flex align-items-center justify-content-center" style="width: 64px; height: 64px;">
                        <i class="bi bi-lightning-charge-fill fs-2"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast">Seamless Telehealth</h5>
                    <p class="small text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection