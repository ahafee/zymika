@extends('layouts.app')

@section('title', 'Health Cannabis Compounding - Zymika Health | Personalised Formulations Australia')

@section('content')
<!-- Page Hero Banner -->
<section class="py-5 text-white position-relative" style="background: linear-gradient(135deg, #0f2d59 0%, #163868 60%, #0a2142 100%);">
    <div class="container py-lg-4" style="max-width: 1200px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2 text-white-50 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('services') }}" class="text-white text-decoration-none">Services</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">Health Cannabis Compounding</li>
            </ol>
        </nav>
        <div class="row align-items-center g-4">
            <div class="col-lg-8" data-aos="fade-right">
                <span class="badge px-3 py-2 rounded-pill fw-semibold mb-3 text-uppercase" style="background-color: rgba(58, 163, 162, 0.25); color: #72e3d8; font-size: 0.8rem;">
                    Health Cannabis Compounding
                </span>
                <h1 class="display-5 fw-bold text-white mb-3">Cannabis Compounding Made Convenient With Zymika Health</h1>
                <p class="lead text-white text-opacity-90 fs-6 mb-4 lh-base" style="max-width: 720px;">
                    Zymika Health offers personalised cannabis compounding for patients across Australia. Patients are connected to medical cannabis options through this program, as we provide specialised cannabis medications and skilled assistance in the privacy and comfort of your own home.
                </p>
                <div class="d-flex flex-wrap gap-3 small text-white text-opacity-90 mb-4">
                    <div>• Telehealth support</div>
                    <div>• Personalised treatment</div>
                    <div>• Quality-focused compounding</div>
                </div>
                <div>
                    <a href="{{ route('booking.index') }}?service_id=1" class="btn px-4 py-3 rounded-pill fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" style="background-color: #3aa3a2;">
                        <span>Enquire About Compounding</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center" data-aos="fade-left">
                <img src="{{ asset('images/cond-neuro.jpg') }}" alt="Cannabis Compounding Made Convenient" class="img-fluid rounded-5 shadow-lg border" style="max-height: 320px; object-fit: cover;">
            </div>
        </div>
    </div>
</section>

<!-- Cannabis Medicine Compounding Section -->
<section class="py-5 bg-white">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(58, 163, 162, 0.12); color: #1a9b8c;">
                Cannabis Medicine Compounding
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-3">Customised Cannabis Designed Around Your Treatment</h2>
            <p class="text-muted mx-auto lead fs-6" style="max-width: 760px;">
                We customise cannabis medication compounding with personalised formulations, accessible telehealth, and professional guidance. Our team supports your individual treatments and healthcare needs, helping you navigate the journey with clarity and confidence.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 48px; height: 48px; background-color: #0f2d59;">
                        <i class="bi bi-bezier2 fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Cannabis Formulations</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Compounded cannabis formulations prepared to meet specific prescription and treatment requirements.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 48px; height: 48px; background-color: #3aa3a2;">
                        <i class="bi bi-chat-left-dots fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Cannabis Medicine Consultation</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Discuss your problems and learn whether compound cannabis medicine is appropriate for you.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 48px; height: 48px; background-color: #163868;">
                        <i class="bi bi-shield-heart fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Cannabis Treatment Support</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Continued professional support for your treatment, discuss progress, and address questions.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- When Can You Access Cannabis Compounding Services? -->
<section class="py-5" style="background-color: #f7fbfc;">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(15, 45, 89, 0.08); color: #0f2d59;">
                Cannabis Medical Solutions
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-2">When Can You Access Cannabis Compounding Services?</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Personalised Formulations</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Explore compounded cannabis formulations suitable for your prescription.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Cannabis Medicine Guidance</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Professional information about cannabis compounding and how they fit your treatment plan.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Prescription &amp; Treatment Support</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Discuss your prescribed medicine and formulation support with our healthcare professionals.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Ongoing Cannabis Care</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Review treatment experience, discuss concerns, and receive care throughout treatment.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Your Step-By-Step Cannabis Compounding Experience -->
<section class="py-5 bg-white">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(58, 163, 162, 0.12); color: #1a9b8c;">
                How Cannabis Compounding Works
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-2">Your Step-By-Step Cannabis Compounding Experience</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-3 d-block">( 01 )</span>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Book Your Consultation</h4>
                    <p class="text-muted small mb-0 lh-base">
                        Connect with a qualified healthcare professional to discuss your medical history and treatment plan.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-3 d-block">( 02 )</span>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Discuss Your Formulation</h4>
                    <p class="text-muted small mb-0 lh-base">
                        We review your requirements and determine the suitable cannabis medicine and formulation.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-3 d-block">( 03 )</span>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Receive Your Compounded Medicine</h4>
                    <p class="text-muted small mb-0 lh-base">
                        Prescribed by an appropriate pharmacy, your compounded cannabis medicine is provided along with guidance.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Compounding Care Aligned With Your Treatment -->
<section class="py-5" style="background-color: #f7fbfc;">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(15, 45, 89, 0.08); color: #0f2d59;">
                Your Next Step After Consultation
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-3">Compounding Care Aligned With Your Treatment</h2>
            <p class="text-muted mx-auto lead fs-6" style="max-width: 680px;">
                Zymika Health carefully reviews your assessment and helps you choose a prescribed formulation that aligns with your healthcare needs.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-2 d-block">01</span>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Compounding Consultation</h5>
                    <p class="text-muted small mb-0 lh-base">Discuss your treatment requirements and whether cannabis compounding is an appropriate treatment or not.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-2 d-block">02</span>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Formulation Assessment</h5>
                    <p class="text-muted small mb-0 lh-base">Review your prescription and formulation requirements with our healthcare professional.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-2 d-block">03</span>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Compounding &amp; Dispensing</h5>
                    <p class="text-muted small mb-0 lh-base">Where clinically appropriate, prescribed cannabis medicine can be prepared and dispensed.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-2 d-block">04</span>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Ongoing Treatment Support</h5>
                    <p class="text-muted small mb-0 lh-base">Continue to discuss your treatment, progress, and concerns through follow-up care.</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <span class="badge px-3 py-2 rounded-pill bg-white border shadow-sm text-brand-primary fw-bold">
                25+ Years of Experience In Trusted Healthcare Services
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
