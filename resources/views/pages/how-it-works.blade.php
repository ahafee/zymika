@extends('layouts.app')

@section('title', 'How It Works - Zymika Health | Fast and Convenient Online Healthcare')

@section('content')
<!-- Page Header / Hero -->
<section class="py-5 text-white position-relative" style="background: linear-gradient(135deg, #0f2d59 0%, #163868 60%, #0a2142 100%);">
    <div class="container py-lg-4" style="max-width: 1200px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2 text-white-50 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">How It Works</li>
            </ol>
        </nav>
        <div class="row align-items-center g-4">
            <div class="col-lg-8" data-aos="fade-right">
                <span class="badge px-3 py-2 rounded-pill fw-semibold mb-3 text-uppercase" style="background-color: rgba(58, 163, 162, 0.25); color: #72e3d8; font-size: 0.8rem;">
                    How It Works
                </span>
                <h1 class="display-5 fw-bold text-white mb-3">Fast and Convenient Online Healthcare</h1>
                <p class="lead text-white text-opacity-90 fs-6 mb-4 lh-base" style="max-width: 700px;">
                    Zymika Health offer convenient online medical consultation in Australia. We help you connect with qualified Australian doctors from the comfort of your home, providing healthcare without travel services. You can access all flexible telehealth appointments when clinically appropriate and in accordance with Australian healthcare guidelines.
                </p>
                <div class="d-flex flex-wrap align-items-center gap-3 mb-4">
                    <a href="{{ route('booking.index') }}" class="btn px-4 py-3 rounded-pill fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" style="background-color: #3aa3a2;">
                        <span>Book an Appointment</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                    <a href="{{ route('services') }}" class="btn btn-outline-light px-4 py-3 rounded-pill fw-semibold">
                        View Our Services
                    </a>
                </div>
                <div class="d-flex flex-wrap gap-3 small text-white text-opacity-85">
                    <div>✓ Secure Consultations</div>
                    <div>✓ Healthcare Professionals</div>
                    <div>✓ Patient-Focused Care</div>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end" data-aos="fade-left">
                <div class="p-4 rounded-4 bg-white text-brand-contrast shadow-lg text-start d-inline-block border" style="max-width: 340px;">
                    <div class="badge bg-success bg-opacity-10 text-success px-3 py-1 rounded-pill small mb-2">Live Availability</div>
                    <h5 class="fw-bold mb-1">Online Consultation</h5>
                    <div class="text-brand-primary fw-semibold small mb-2">Telehealth Appointment</div>
                    <p class="text-muted small mb-0">Connect securely by phone or video with an Australian-registered GP.</p>
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
            <h2 class="display-6 fw-bold text-brand-contrast mb-2">Simple Steps of Medical Care</h2>
            <p class="text-muted mx-auto lead fs-6" style="max-width: 680px;">
                Simple steps to connect you with the right support, built around your needs, goals and pace of life.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-light rounded-4 border h-100 position-relative">
                    <span class="fw-bold fs-3 text-brand-primary mb-3 d-block">01</span>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Book Appointment Online</h4>
                    <p class="text-muted small mb-0 lh-base">
                        Choose a favourable appointment time using our simple online booking system, making it quick and convenient to schedule your visit.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-light rounded-4 border h-100 position-relative">
                    <span class="fw-bold fs-3 text-brand-primary mb-3 d-block">02</span>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Meet Your Doctor</h4>
                    <p class="text-muted small mb-0 lh-base">
                        Securely connect with a professional Australian healthcare professional or get an online medical consultation Australia by phone or video.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-light rounded-4 border h-100 position-relative">
                    <span class="fw-bold fs-3 text-brand-primary mb-3 d-block">03</span>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Receive Your Care</h4>
                    <p class="text-muted small mb-0 lh-base">
                        Your doctor can provide prescriptions, referrals, mental health care plans, medical certificates, or ongoing treatment recommendations.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Prepare for Your Consultation Section -->
<section class="py-5" style="background-color: #f7fbfc;">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(15, 45, 89, 0.08); color: #0f2d59;">
                Prepare for Your Consultation
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-3">Your Guide for Telehealth Consultation</h2>
            <p class="text-muted mx-auto lead fs-6 mb-3" style="max-width: 740px;">
                Before your online consultation with Zymika Health, gather relevant medical information, medical history, and any questions to get appropriate care during your GP telehealth appointment.
            </p>
            <div class="badge bg-white text-brand-primary border px-3 py-2 rounded-pill shadow-sm small fw-semibold">
                ✓ Find a quiet and private space with a reliable internet connection and a suitable device for a better consultation.
            </div>
        </div>

        <h4 class="fw-bold text-center text-brand-contrast fs-5 mb-4">Prepare 4 Things Beforehand</h4>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-2 d-block">01</span>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Medical Care</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Make your Medicare card and relevant details available if you’re looking for an applicable Medicare rebate.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-2 d-block">02</span>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Current Medications</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Gather a list of your current medications, including dosages you take where possible.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-2 d-block">03</span>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Medical History</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Get ready to share relevant health conditions, allergies, previous treatments, and other important medical information.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-2 d-block">04</span>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Your Questions &amp; Concerns</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Collect your main symptoms, questions, and concerns so you can discuss them clearly with your doctor.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Your Appointment Section -->
<section class="py-5 bg-white">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(58, 163, 162, 0.12); color: #1a9b8c;">
                Your Appointment
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-3">How your TelehealthAppointment Works</h2>
            <p class="text-muted mx-auto lead fs-6" style="max-width: 740px;">
                Zymika telehealth connects you with a qualified doctor through a secure online GP consultation where you can discuss your health concerns, symptoms, and medical history from the comfort of your home.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 44px; height: 44px; background-color: #0f2d59;">
                        <i class="bi bi-chat-heart fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Treatment Advice</h5>
                    <p class="text-muted small mb-0 lh-base">Treatment options suited to your health concerns.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 44px; height: 44px; background-color: #3aa3a2;">
                        <i class="bi bi-capsule fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Prescriptions</h5>
                    <p class="text-muted small mb-0 lh-base">Clinically appropriate online prescriptions for your health.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 44px; height: 44px; background-color: #163868;">
                        <i class="bi bi-file-earmark-check fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Medical Certificates</h5>
                    <p class="text-muted small mb-0 lh-base">Medical certificates provided based on clinical circumstances.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 44px; height: 44px; background-color: #0f2d59;">
                        <i class="bi bi-box-arrow-up-right fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Referrals</h5>
                    <p class="text-muted small mb-0 lh-base">Referrals to specialists or healthcare professionals for further care.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- WHY CHOOSE ZYMIKA HEALTH Section -->
<section class="py-5" style="background-color: #f7fbfc;">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(15, 45, 89, 0.08); color: #0f2d59;">
                WHY CHOOSE ZYMIKA HEALTH
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-2">Experienced Healthcare without the Wait</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-white rounded-4 shadow-sm border h-100">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Convenient Access</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Connect with experienced healthcare professionals through online doctor consultations.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-white rounded-4 shadow-sm border h-100">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Simple Booking</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Schedule your virtual healthcare appointment and access expert medical care without long waiting times.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-white rounded-4 shadow-sm border h-100">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">For All Age Groups</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Zymika Health serves individuals and families across Australia, including children, adults, seniors, busy professionals, parents, students, and rural and remote communities.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQs Section -->
@include('partials.faqs')

<!-- CTA Section -->
@include('partials.cta-banner')

@endsection
