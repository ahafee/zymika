@extends('layouts.app')

@section('title', 'Urgent & After Hours Care - Zymika Health | Online Doctor Consultations Australia')

@section('content')
<!-- Page Hero Banner -->
<section class="py-5 text-white position-relative" style="background: linear-gradient(135deg, #0f2d59 0%, #163868 60%, #0a2142 100%);">
    <div class="container py-lg-4" style="max-width: 1200px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2 text-white-50 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('services') }}" class="text-white text-decoration-none">Services</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">Urgent &amp; After Hours Care</li>
            </ol>
        </nav>
        <div class="row align-items-center g-4">
            <div class="col-lg-8" data-aos="fade-right">
                <span class="badge px-3 py-2 rounded-pill fw-semibold mb-3 text-uppercase" style="background-color: rgba(58, 163, 162, 0.25); color: #72e3d8; font-size: 0.8rem;">
                    Urgent &amp; After Hours Care
                </span>
                <h1 class="display-5 fw-bold text-white mb-3">Get Urgent Medical Care When You Need It</h1>
                <p class="lead text-white text-opacity-90 fs-6 mb-4 lh-base" style="max-width: 720px;">
                    Zymika Health provides after-hours and urgent medical treatment. Our telehealth service enables you to consult with an Australian healthcare provider about unexpected symptoms, illness, and other non-emergency issues when your general practitioner is unavailable.
                </p>
                <div class="d-flex flex-wrap gap-3 small text-white text-opacity-90 mb-4">
                    <div>• After-Hours Access</div>
                    <div>• Secure Telehealth</div>
                    <div>• Convenient Medical Support</div>
                </div>
                <div>
                    <a href="{{ route('booking.index') }}?service_id=1" class="btn px-4 py-3 rounded-pill fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" style="background-color: #3aa3a2;">
                        <span>Request Urgent Consultation</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center" data-aos="fade-left">
                <img src="{{ asset('images/step4-delivery.jpg') }}" alt="Get Urgent Medical Care When You Need It" class="img-fluid rounded-5 shadow-lg border" style="max-height: 320px; object-fit: cover;">
            </div>
        </div>
    </div>
</section>

<!-- Urgent & After-Hours Medical Care Section -->
<section class="py-5 bg-white">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(58, 163, 162, 0.12); color: #1a9b8c;">
                Urgent &amp; After-Hours Medical Care
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-3">Support for Health Concerns That Need Immediate Care</h2>
            <p class="text-muted mx-auto lead fs-6" style="max-width: 760px;">
                When you need medical guidance outside your usual GP’s opening hours, Zymika Health offers access to urgent and after-hours care online. You can speak with a specialist about your symptoms and receive guidance on the most appropriate next step for your care.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 48px; height: 48px; background-color: #0f2d59;">
                        <i class="bi bi-exclamation-triangle fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Urgent Health Concerns</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Speak about unexpected symptoms and sudden issues that require emergency medical attention.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 48px; height: 48px; background-color: #3aa3a2;">
                        <i class="bi bi-moon-stars fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">After Hours Medical Support</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Access healthcare outside standard GP hours when a doctor is unavailable and get professional guidance.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 48px; height: 48px; background-color: #163868;">
                        <i class="bi bi-clipboard-pulse fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Assessment &amp; Next Steps</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Address your concerns via telehealth and seek further medical attention if needed.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Common Urgent Health Concerns -->
<section class="py-5" style="background-color: #f7fbfc;">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(15, 45, 89, 0.08); color: #0f2d59;">
                Common Urgent Health Concerns
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-2">When Can You Access Urgent &amp; After-Hours Care?</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Sudden Illness &amp; Symptoms</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Discuss symptoms and illnesses that have recently developed and need timely care.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Minor Injuries &amp; Health Concerns</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Online assessment for minor injuries and other non-emergency concerns.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Symptoms outside GP Hours</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Medical support when your GP is unavailable, including evenings, weekends, and after-hours periods.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Urgent Medical Guidance</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Receive guidance based on concerns that cannot reasonably wait for the next routine appointment.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Urgent Process -->
<section class="py-5 bg-white">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(58, 163, 162, 0.12); color: #1a9b8c;">
                Our Urgent Process
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-2">Get Started in 3 Easy Steps</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-3 d-block">( 01 )</span>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Request an Online Consultation</h4>
                    <p class="text-muted small mb-0 lh-base">
                        Choose a suitable appointment time and provide details about your current symptoms and health concerns.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-3 d-block">( 02 )</span>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Connect With a Healthcare Professional</h4>
                    <p class="text-muted small mb-0 lh-base">
                        Speak securely by phone or video with professional healthcare professional about your symptoms.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-3 d-block">( 03 )</span>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Get Clear Guidance on Your Next Step</h4>
                    <p class="text-muted small mb-0 lh-base">
                        Follow-up care and advice for self-care, treatment recommendations, and medical care when required.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Following Your Consultation Section -->
<section class="py-5" style="background-color: #f7fbfc;">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(15, 45, 89, 0.08); color: #0f2d59;">
                Following Your Consultation
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-3">Clear Guidance for Your Next Steps</h2>
            <p class="text-muted mx-auto lead fs-6" style="max-width: 680px;">
                After your urgent or after-hours assessment, our healthcare professional will explain the next steps based on your symptoms and individual circumstances.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-2 d-block">01</span>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Immediate Medical Guidance</h5>
                    <p class="text-muted small mb-0 lh-base">Receive practical care based on your symptoms and assessment.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-2 d-block">02</span>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Treatment Recommendations</h5>
                    <p class="text-muted small mb-0 lh-base">Discuss your treatment options and symptoms with a healthcare professional.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-2 d-block">03</span>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Further Medical Care</h5>
                    <p class="text-muted small mb-0 lh-base">Get in-person examination, testing, or specialist attention based on your needs.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-2 d-block">04</span>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Ongoing Support</h5>
                    <p class="text-muted small mb-0 lh-base">Follow-up support to monitor your progress and address changing symptoms.</p>
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
