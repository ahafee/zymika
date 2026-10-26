@extends('layouts.app')

@section('title', 'Prescriptions & Medical - Zymika Health | Online Doctor Prescriptions Australia')

@section('content')
<!-- Page Hero Banner -->
<section class="py-5 text-white position-relative" style="background: linear-gradient(135deg, #0f2d59 0%, #163868 60%, #0a2142 100%);">
    <div class="container py-lg-4" style="max-width: 1200px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2 text-white-50 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('services') }}" class="text-white text-decoration-none">Services</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">Prescriptions &amp; Medical</li>
            </ol>
        </nav>
        <div class="row align-items-center g-4">
            <div class="col-lg-8" data-aos="fade-right">
                <span class="badge px-3 py-2 rounded-pill fw-semibold mb-3 text-uppercase" style="background-color: rgba(58, 163, 162, 0.25); color: #72e3d8; font-size: 0.8rem;">
                    Prescriptions &amp; Medical
                </span>
                <h1 class="display-5 fw-bold text-white mb-3">Get Online Prescriptions and Medical Advice at Your Home</h1>
                <p class="lead text-white text-opacity-90 fs-6 mb-4 lh-base" style="max-width: 720px;">
                    These days, healthcare does not always require a clinic or hospital. You can connect with an Australian GP through a secure online consultation and discuss your symptoms and illness. With Zymika Health, get online prescriptions, treatment recommendations, and medical advice from home without waiting in long clinic lines.
                </p>
                <div class="d-flex flex-wrap gap-3 small text-white text-opacity-90 mb-4">
                    <div>• Online Prescriptions</div>
                    <div>• Medical Certificates</div>
                    <div>• Medical Advice &amp; Support</div>
                </div>
                <div>
                    <a href="{{ route('booking.index') }}?service_id=6" class="btn px-4 py-3 rounded-pill fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" style="background-color: #3aa3a2;">
                        <span>Request Online Prescription</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center" data-aos="fade-left">
                <img src="{{ asset('images/step3-prescription.jpg') }}" alt="Online Prescriptions and Medical Advice" class="img-fluid rounded-5 shadow-lg border" style="max-height: 320px; object-fit: cover;">
            </div>
        </div>
    </div>
</section>

<!-- Online Prescription & Medical Care Section -->
<section class="py-5 bg-white">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(58, 163, 162, 0.12); color: #1a9b8c;">
                Online Prescription &amp; Medical Care
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-3">Online Prescriptions from Qualified Telehealth Professionals</h2>
            <p class="text-muted mx-auto lead fs-6" style="max-width: 760px;">
                Get convenient access to healthcare, medical online support, and prescription treatment from qualified professionals. Tell us about your health needs, and our professionals will provide you with the right information and recommend medications where clinically suitable.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 48px; height: 48px; background-color: #0f2d59;">
                        <i class="bi bi-capsule fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Online Prescription Services</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Secure clinical and prescription treatments by experts.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 48px; height: 48px; background-color: #3aa3a2;">
                        <i class="bi bi-heart-pulse fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Online Medical Care</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Receive easy medical support for your everyday health concerns.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 48px; height: 48px; background-color: #163868;">
                        <i class="bi bi-shield-check fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Safe, Convenient Healthcare</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Access professional healthcare without the hassle of visiting a clinic.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- When Do You Need Prescription and Medical Services? -->
<section class="py-5" style="background-color: #f7fbfc;">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(15, 45, 89, 0.08); color: #0f2d59;">
                Most Common Reasons
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-2">When Do You Need Prescription and Medical Services?</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Common health conditions</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Receive appropriate clinical guidance and treatment based on your individual needs.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Medication &amp; Treatment Support</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Discuss current medication and, where clinically appropriate, your treatment may be adjusted or a prescription issued.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Ongoing &amp; Follow-Up Care</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Get continued support for existing health concerns, previous treatments, and ongoing symptoms.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Professional Medical Advice</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Receive personalised medical guidance based on the healthcare and information you provide.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Get Started in 3 Easy Steps -->
<section class="py-5 bg-white">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(58, 163, 162, 0.12); color: #1a9b8c;">
                Simple Process
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-2">Get Started in 3 Easy Steps</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-3 d-block">( 01 )</span>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Complete Your Online Assessment</h4>
                    <p class="text-muted small mb-0 lh-base">
                        Provide the information needed for a qualified healthcare professional to review your request.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-3 d-block">( 02 )</span>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Get Your Medical Prescription</h4>
                    <p class="text-muted small mb-0 lh-base">
                        Receive medical advice, guidance, or treatment recommendations on the next step for your care.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-3 d-block">( 03 )</span>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Receive Your Treatment</h4>
                    <p class="text-muted small mb-0 lh-base">
                        Depending on your needs, you may receive follow-up advice or further medical care when required.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- After Your Assessment Section -->
<section class="py-5" style="background-color: #f7fbfc;">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(15, 45, 89, 0.08); color: #0f2d59;">
                After Your Assessment
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-3">Personalised Medical Care When You Need It</h2>
            <p class="text-muted mx-auto lead fs-6" style="max-width: 680px;">
                Following your medical treatment, a qualified healthcare professional will recommend the appropriate treatment to you.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-2 d-block">01</span>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Personalised Plan</h5>
                    <p class="text-muted small mb-0 lh-base">Receive clear guidance and health recommendations.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-2 d-block">02</span>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Prescription Support</h5>
                    <p class="text-muted small mb-0 lh-base">A suitable treatment issued for professional assessment.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-2 d-block">03</span>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Medical Guidance</h5>
                    <p class="text-muted small mb-0 lh-base">Get practical advice for your condition, symptoms, and medication.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-2 d-block">04</span>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Ongoing Healthcare</h5>
                    <p class="text-muted small mb-0 lh-base">Follow-up care and recommendations for additional medical support.</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <span class="badge px-3 py-2 rounded-pill bg-white border shadow-sm text-brand-primary fw-bold">
                25+ Years of Experience in Trusted Healthcare Services
            </span>
        </div>
    </div>
</section>

<!-- Booking Form Section -->
@include('partials.booking-form')

<!-- FAQs Section -->
@include('partials.faqs')

<!-- CTA Section -->
@include('partials.cta-banner')

@endsection
