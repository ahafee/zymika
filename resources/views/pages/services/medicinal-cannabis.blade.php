@extends('layouts.app')

@section('title', 'Medicinal Cannabis Consultations - Zymika Health | Online Telehealth Australia')

@section('content')
<!-- Page Hero Banner -->
<section class="py-5 text-white position-relative" style="background: linear-gradient(135deg, #0f2d59 0%, #163868 60%, #0a2142 100%);">
    <div class="container py-lg-4" style="max-width: 1200px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2 text-white-50 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('services') }}" class="text-white text-decoration-none">Services</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">Medicinal Cannabis Consultations</li>
            </ol>
        </nav>
        <div class="row align-items-center g-4">
            <div class="col-lg-8" data-aos="fade-right">
                <span class="badge px-3 py-2 rounded-pill fw-semibold mb-3 text-uppercase" style="background-color: rgba(58, 163, 162, 0.25); color: #72e3d8; font-size: 0.8rem;">
                    Medicinal Cannabis Consultations
                </span>
                <h1 class="display-5 fw-bold text-white mb-3">Online Medicinal Cannabis Consultations Australia</h1>
                <p class="lead text-white text-opacity-90 fs-6 mb-4 lh-base" style="max-width: 720px;">
                    Zymika Health helps you consult a doctor online regarding cannabis. Our qualified professionals will provide you with personalised advice and determine whether medicinal cannabis is a viable choice for you, at your convenience, from your own home.
                </p>
                <div class="d-flex flex-wrap gap-3 small text-white text-opacity-90 mb-4">
                    <div>• Medicinal Cannabis Consultations</div>
                    <div>• Personalised Treatment Assessment</div>
                    <div>• Professional Guidance</div>
                </div>
                <div>
                    <a href="{{ route('booking.index') }}?service_id=1" class="btn px-4 py-3 rounded-pill fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" style="background-color: #3aa3a2;">
                        <span>Book Cannabis Consultation</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center" data-aos="fade-left">
                <img src="{{ asset('images/cond-pain.jpg') }}" alt="Online Medicinal Cannabis Consultations Australia" class="img-fluid rounded-5 shadow-lg border" style="max-height: 320px; object-fit: cover;">
            </div>
        </div>
    </div>
</section>

<!-- Personalised Support Section -->
<section class="py-5 bg-white">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(58, 163, 162, 0.12); color: #1a9b8c;">
                Online Medicinal Cannabis Consultations
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-3">Personalised Support for Your Medicinal Cannabis Journey</h2>
            <p class="text-muted mx-auto lead fs-6" style="max-width: 760px;">
                With medical cannabis consultations you can discuss your medical history, symptoms, current treatments, and treatment goals with a qualified healthcare provider. Our team use this information to decide whether medicinal cannabis is appropriate for your health condition.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 48px; height: 48px; background-color: #0f2d59;">
                        <i class="bi bi-clipboard2-check fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">First consultation</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Access your medical history, symptoms, and healthcare needs with a qualified doctor for suitable medicinal cannabis.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 48px; height: 48px; background-color: #3aa3a2;">
                        <i class="bi bi-file-medical fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Treatment evaluation</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Get a personalised evaluation with treatment options, benefits, risks, and considerations.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 48px; height: 48px; background-color: #163868;">
                        <i class="bi bi-arrow-repeat fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Ongoing care</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Continue getting medical care through follow-ups, where your health progress and response to treatment are reviewed.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- When Can You Book a Medicinal Cannabis Consultation? -->
<section class="py-5" style="background-color: #f7fbfc;">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(15, 45, 89, 0.08); color: #0f2d59;">
                Medicinal Cannabis Treatment Considerations
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-2">When Can You Book a Medicinal Cannabis Consultation?</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Ongoing Health Conditions</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Discuss your health history with a qualified healthcare professional.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Previous Treatment Options</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Discuss previous treatments and other treatment options for your overall care.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Medication Review</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Provide current medicines and treatment details for potential cannabis care.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Treatment Support</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Discuss your progress and response to medicinal cannabis.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Medical Cannabis Treatment in 3 Steps -->
<section class="py-5 bg-white">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(58, 163, 162, 0.12); color: #1a9b8c;">
                Our Simple Process
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-2">Medical Cannabis Treatment in 3 Steps</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-3 d-block">( 01 )</span>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Book Your Consultation</h4>
                    <p class="text-muted small mb-0 lh-base">
                        Appointment and provide health information before your medicinal cannabis consultation.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-3 d-block">( 02 )</span>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Speak with a Professional</h4>
                    <p class="text-muted small mb-0 lh-base">
                        Speak with a qualified professional and discuss medical history, symptoms, and treatments.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-3 d-block">( 03 )</span>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Discuss Treatment Options</h4>
                    <p class="text-muted small mb-0 lh-base">
                        Access appropriate cannabis treatment options following your clinical assessment.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- After Your Consultation Section -->
<section class="py-5" style="background-color: #f7fbfc;">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(15, 45, 89, 0.08); color: #0f2d59;">
                After Your Consultation
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-3">Medicinal Cannabis Consultation and Prescriptions</h2>
            <p class="text-muted mx-auto lead fs-6" style="max-width: 680px;">
                Get your medicinal cannabis consultation and prescription for your healthcare needs after your consultation.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-2 d-block">01</span>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Treatment Assessment</h5>
                    <p class="text-muted small mb-0 lh-base">Personalised clinical guidance based on your health history.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-2 d-block">02</span>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Cannabis Treatment</h5>
                    <p class="text-muted small mb-0 lh-base">Discuss medicinal cannabis options with your doctor.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-2 d-block">03</span>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Clinician Guidance</h5>
                    <p class="text-muted small mb-0 lh-base">Clinician guidance to monitor your progress.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-2 d-block">04</span>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Follow-Up Consultation</h5>
                    <p class="text-muted small mb-0 lh-base">Continue medicinal cannabis care with follow-up consultations.</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <span class="badge px-3 py-2 rounded-pill bg-white border shadow-sm text-brand-primary fw-bold">
                25+ Years of Experience In Healthcare Services
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
