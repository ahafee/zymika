@extends('layouts.app')

@section('title', 'General GP Consultations - Zymika Health | Online Doctor Australia')

@section('content')
<!-- Page Hero Banner -->
<section class="py-5 text-white position-relative" style="background: linear-gradient(135deg, #0f2d59 0%, #163868 60%, #0a2142 100%);">
    <div class="container py-lg-4" style="max-width: 1200px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2 text-white-50 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('services') }}" class="text-white text-decoration-none">Services</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">General GP Consultations</li>
            </ol>
        </nav>
        <div class="row align-items-center g-4">
            <div class="col-lg-8" data-aos="fade-right">
                <span class="badge px-3 py-2 rounded-pill fw-semibold mb-3 text-uppercase" style="background-color: rgba(58, 163, 162, 0.25); color: #72e3d8; font-size: 0.8rem;">
                    General GP Consultations
                </span>
                <h1 class="display-5 fw-bold text-white mb-3">Book an Online GP Consultation with an Australian Doctor</h1>
                <p class="lead text-white text-opacity-90 fs-6 mb-4 lh-base" style="max-width: 720px;">
                    Book an online GP consultation with an Australian doctor from the comfort of your lounge. Zymika Health makes it simple to access convenient online GP appointments, prescriptions, ongoing care, trusted telehealth consultations, and professional medical advice.
                </p>
                <div class="d-flex flex-wrap gap-3 small text-white text-opacity-90 mb-4">
                    <div>• Secure Consultation</div>
                    <div>• Simple online booking</div>
                    <div>• Patient-Focused Care</div>
                </div>
                <div>
                    <a href="{{ route('booking.index') }}?service_id=1" class="btn px-4 py-3 rounded-pill fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" style="background-color: #3aa3a2;">
                        <span>Book an Online GP Appointment</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center" data-aos="fade-left">
                <img src="{{ asset('images/step2-telehealth.jpg') }}" alt="General GP Consultations" class="img-fluid rounded-5 shadow-lg border" style="max-height: 320px; object-fit: cover;">
            </div>
        </div>
    </div>
</section>

<!-- Telehealth GP Services Section -->
<section class="py-5 bg-white">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(58, 163, 162, 0.12); color: #1a9b8c;">
                Telehealth GP Services
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-3">Expert GP Support for Common Healthcare Concerns</h2>
            <p class="text-muted mx-auto lead fs-6" style="max-width: 760px;">
                Discuss common health concerns by accessing convenient online GP care. Speak with an experienced Australian doctor for trusted medical care, personalised healthcare, and medical advice at your home.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 48px; height: 48px; background-color: #0f2d59;">
                        <i class="bi bi-laptop fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Online GP Care</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Get online GP care without travelling to a clinic and waiting in long queues.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 48px; height: 48px; background-color: #3aa3a2;">
                        <i class="bi bi-heart-pulse fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Support Common Health Problems</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Get guidance for a range of everyday common problems and minor illnesses.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 48px; height: 48px; background-color: #163868;">
                        <i class="bi bi-person-check fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Qualified Doctor Consultations</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Receive healthcare advice for individual needs by securing an online consultation with qualified doctors.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Common Health Problems Section -->
<section class="py-5" style="background-color: #f7fbfc;">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(15, 45, 89, 0.08); color: #0f2d59;">
                Common Health Problems
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-2">When to Book an Online GP Consultation?</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Common Illness</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Speak about your illness, symptoms, and minor health concerns.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Medical Support</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Discuss current medications, prescriptions, treatment plans, and medical-related questions.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Follow-Up &amp; Care</h5>
                    <p class="text-muted small mb-0 lh-base">
                        An online GP appointment to review your progress and discuss your online healthcare needs.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Personalised GP Advice</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Have questions about your health? An Australian GP will listen to your health concerns.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Process Section -->
<section class="py-5 bg-white">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(58, 163, 162, 0.12); color: #1a9b8c;">
                Our Process
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-2">GP Consultation in 3 Easy Steps</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-3 d-block">( 01 )</span>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Choose your GP Appointment</h4>
                    <p class="text-muted small mb-0 lh-base">
                        Our simple online appointment booking process helps you arrange a GP consultation without unnecessary travel or waiting.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-3 d-block">( 02 )</span>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Connect with an Australian Doctor</h4>
                    <p class="text-muted small mb-0 lh-base">
                        Attend an online GP consultation by phone or video and discuss your health concerns with an Australian doctor.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-3 d-block">( 03 )</span>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Get Medical Guidance</h4>
                    <p class="text-muted small mb-0 lh-base">
                        Assess concerns and get appropriate medical advice, prescriptions, and follow-up care.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- After Your Appointment Section -->
<section class="py-5" style="background-color: #f7fbfc;">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(15, 45, 89, 0.08); color: #0f2d59;">
                After Your Appointment
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-3">What Happens After Your Online GP Appointment?</h2>
            <p class="text-muted mx-auto lead fs-6" style="max-width: 680px;">
                Following your consultation, your GP will explain the next step based on your individual healthcare needs.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-2 d-block">01</span>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Treatment</h5>
                    <p class="text-muted small mb-0 lh-base">Receive practical medical guidance and recommendations for your symptoms.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-2 d-block">02</span>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Medical Certificates</h5>
                    <p class="text-muted small mb-0 lh-base">A medical certificate, depending on your clinical assessment.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-2 d-block">03</span>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Specialist referrals</h5>
                    <p class="text-muted small mb-0 lh-base">Recommended referrals to specialists or other healthcare professionals.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-2 d-block">04</span>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Healthcare guidance</h5>
                    <p class="text-muted small mb-0 lh-base">Process based on circumstances, individual symptoms, and healthcare needs.</p>
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
