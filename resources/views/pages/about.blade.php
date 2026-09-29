@extends('layouts.app')

@section('title', 'About Us - Zovi Health Pty Ltd / ZOVI LEAF')

@section('content')
<div class="py-5 bg-brand-light border-bottom" data-aos="fade-down">
    <div class="container text-center">
        <span class="badge badge-tga mb-2">Our Clinical Story</span>
        <h1 class="display-5 fw-bold text-brand-contrast">About ZOVI LEAF & Zovi Health</h1>
        <p class="lead text-muted max-w-700 mx-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.</p>
    </div>
</div>

<div class="container py-5">
    <div class="row g-5 align-items-center mb-5">
        <div class="col-lg-6" data-aos="fade-right">
            <span class="text-brand-primary fw-bold text-uppercase small" style="letter-spacing: 1px;">Our Mission</span>
            <h2 class="fw-bold text-brand-contrast mb-3">Empowering Australian Patients with Evidence-Based Care</h2>
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
            <div class="card card-zovi p-4 bg-white shadow-sm">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="bg-brand-primary text-white p-3 rounded-circle">
                        <i class="bi bi-person-fill fs-2"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold text-brand-contrast mb-0">Dr. Suneetha Batthala</h4>
                        <span class="text-brand-primary fw-semibold small">Lead Prescribing Medical Practitioner</span>
                    </div>
                </div>
                <p class="small text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <div class="border-top pt-3 small text-muted">
                    <div class="row g-2">
                        <div class="col-6"><strong>Provider Number:</strong> 2938472B</div>
                        <div class="col-6"><strong>Location:</strong> Surry Hills NSW</div>
                        <div class="col-6"><strong>Consultation Mode:</strong> Video / Phone</div>
                        <div class="col-6"><strong>Phone:</strong> 02 5838 5365</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Values Grid -->
    <div class="row g-4 text-center mt-4">
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card card-zovi h-100 p-4 border">
                <i class="bi bi-heart-pulse-fill text-brand-primary fs-1 mb-3"></i>
                <h5 class="fw-bold text-brand-contrast">Patient-First Empathy</h5>
                <p class="small text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card card-zovi h-100 p-4 border">
                <i class="bi bi-shield-check text-brand-sage fs-1 mb-3"></i>
                <h5 class="fw-bold text-brand-contrast">Clinical Rigor</h5>
                <p class="small text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
            <div class="card card-zovi h-100 p-4 border">
                <i class="bi bi-lightning-charge-fill text-brand-primary fs-1 mb-3"></i>
                <h5 class="fw-bold text-brand-contrast">Seamless Telehealth</h5>
                <p class="small text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
    </div>
</div>
@endsection