@extends('layouts.app')

@section('title', 'Zymika Health | 24/7 Quality Healthcare Wherever You Are | Telehealth Australia')

@section('content')
<!-- Hero Section (Matches Reference 100% with VIP Design - Zero Inline CSS) -->
<section class="newdoc-hero-section">
    <div class="container newdoc-hero-container">
        <div class="row align-items-center g-4 g-lg-5">
            <!-- Left Text Content -->
            <div class="col-lg-6" data-aos="fade-right">
                
                <!-- Top Status Pill -->
                <div class="newdoc-avatar-badge">
                    <span class="pulse-live-dot"></span>
                    <span class="newdoc-avatar-text text-uppercase">Telehealth doctor Australia</span>
                </div>

                <!-- Main Heading (2 Lines on Desktop) -->
                <h1 class="newdoc-hero-title">
                    24/7 Quality Healthcare<br class="d-none d-md-inline"> Wherever You Are
                </h1>

                <!-- Hero Subtitle Description -->
                <p class="newdoc-lead-desc">
                    Connect with qualified Australian doctors from the comfort of your home. Get secure online consultations, prescriptions, medical certificates, referrals and ongoing healthcare support.
                </p>

                <!-- 6 Service Pills Grid (2 Columns with Hover Effects) -->
                <div class="hero-service-pills-grid">
                    <a href="{{ route('services.gp') }}" class="hero-service-pill">
                        <span class="pill-arrow-wrap"><i class="bi bi-arrow-right"></i></span>
                        <span class="pill-text">General GP Consultations</span>
                    </a>
                    <a href="{{ route('services.mental-health') }}" class="hero-service-pill">
                        <span class="pill-arrow-wrap"><i class="bi bi-arrow-right"></i></span>
                        <span class="pill-text">Mental Health &amp; Wellbeing</span>
                    </a>
                    <a href="{{ route('services.compounding') }}" class="hero-service-pill">
                        <span class="pill-arrow-wrap"><i class="bi bi-arrow-right"></i></span>
                        <span class="pill-text">Health Cannabis Compounding</span>
                    </a>
                    <a href="{{ route('services.urgent-care') }}" class="hero-service-pill">
                        <span class="pill-arrow-wrap"><i class="bi bi-arrow-right"></i></span>
                        <span class="pill-text">Urgent &amp; After Hours Care</span>
                    </a>
                    <a href="{{ route('services.prescriptions') }}" class="hero-service-pill">
                        <span class="pill-arrow-wrap"><i class="bi bi-arrow-right"></i></span>
                        <span class="pill-text">Online Prescriptions</span>
                    </a>
                    <a href="{{ route('services.gp') }}" class="hero-service-pill">
                        <span class="pill-arrow-wrap"><i class="bi bi-arrow-right"></i></span>
                        <span class="pill-text">Chronic Disease Support</span>
                    </a>
                </div>

                <!-- Action CTAs (Book Appointment Modal Trigger & Call Us) -->
                <div class="d-flex flex-wrap align-items-center gap-3">
                    <button type="button" class="newdoc-consult-btn" data-bs-toggle="modal" data-bs-target="#consultBookingModal">
                        <span>Book Appointment</span>
                        <i class="bi bi-arrow-right btn-arrow-icon"></i>
                    </button>
                    <a href="tel:0411174173" class="hero-call-btn">
                        <i class="bi bi-telephone-fill"></i>
                        <span>Call Us</span>
                    </a>
                </div>
            </div>

            <!-- Right Hero Image Graphic (Using dCapture.png) -->
            <div class="col-lg-6 text-center" data-aos="fade-left">
                <div class="hero-dcapture-wrap">
                    <img src="{{ asset('images/dCapture.png') }}" alt="Telehealth Online Doctor Consultation Australia - Zymika Health" class="img-fluid hero-dcapture-img" onerror="this.src='{{ asset('images/hero-telehealth.jpg') }}'">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Trust Metrics Bar (40,000+ Consultations, Australian Registered Doctors, Secure & Confidential, Same Day Availability) -->
<section class="newdoc-trust-strip">
    <div class="container newdoc-trust-container">
        <div class="newdoc-trust-item">
            <span>40,000+ Consultations</span>
        </div>
        <div class="newdoc-trust-item">
            <span class="star-icon">|</span>
            <span>Australian Registered Doctors</span>
        </div>
        <div class="newdoc-trust-item">
            <span class="star-icon">|</span>
            <span>Secure &amp; Confidential Care</span>
        </div>
        <div class="newdoc-trust-item">
            <span class="star-icon">|</span>
            <span>Same Day Availability</span>
        </div>
    </div>
</section>

{{--
<!-- 25+ Years of Experience In Healthcare Service Section (Temporarily Commented Out) -->
<section class="partner-showcase-section">
    <div class="container">
        <h2 class="partner-showcase-title" data-aos="fade-up">
            25+ Years of Experience In Healthcare Service
        </h2>

        <!-- Partner Pharmacy & Health Platform Logos -->
        <div class="partner-logos-container" data-aos="fade-up" data-aos-delay="100">
            <!-- Direct Chemist Outlet -->
            <div class="partner-logo-pill">
                <div class="logo-dco-wrap">
                    <span class="logo-dco-star">Direct</span>
                    <span class="logo-dco-text">Chemist<br>Outlet</span>
                </div>
            </div>

            <!-- TerryWhite Chemmart -->
            <div class="partner-logo-pill">
                <div class="logo-terrywhite">
                    <span class="logo-terrywhite-box">+</span>
                    <span class="logo-terrywhite-text">TerryWhite<br>Chemmart</span>
                </div>
            </div>

            <!-- Symbion -->
            <div class="partner-logo-pill">
                <div class="logo-symbion">
                    <span>symbion</span>
                    <span class="logo-symbion-dot"></span>
                </div>
            </div>

            <!-- MedAdvisor -->
            <div class="partner-logo-pill">
                <div class="logo-medadvisor">
                    <i class="bi bi-file-medical-fill"></i>
                    <span>MedAdvisor</span>
                </div>
            </div>

            <!-- HotDoc -->
            <div class="partner-logo-pill">
                <div class="logo-hotdoc">
                    <i class="bi bi-plus-circle-fill"></i>
                    <span>HotDoc</span>
                </div>
            </div>

            <!-- HealthyLife -->
            <div class="partner-logo-pill">
                <div class="logo-healthylife">
                    <span>healthy<strong>life</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>
--}}

<!-- About Us: Accessible Online Healthcare across Australia (Matches Live Reference & Screenshot) -->
<section class="about-accessible-section" id="about">
    <div class="container" style="max-width: 1240px;">
        <div class="row align-items-center g-4 g-lg-5">
            <!-- Left Side: Doctor Video Consultation Photo with Dr Bazel Lodhi Quote Badge -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="about-media-stage">
                    <img src="{{ asset('images/step2-telehealth.jpg') }}" alt="Telehealth Doctor Video Consultation Australia" class="about-main-photo" onerror="this.src='{{ asset('images/banner1.jpg') }}'">
                    
                    <!-- Floating Doctor Quote Card -->
                    <div class="about-quote-box">
                        <div class="about-quote-header">
                            <img src="{{ asset('images/doctor-bazel.png') }}" alt="Dr Bazel Lodhi" class="about-quote-doc-img">
                            <div>
                                <h4 class="about-quote-doc-name">Dr Bazel Lodhi</h4>
                                <span class="about-quote-doc-title">General Practitioner</span>
                            </div>
                        </div>
                        <p class="about-quote-text">
                            “Committed to providing accessible, high-quality and patient-centred healthcare through convenient telehealth consultations.”
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right Side: Content & Key Pillars -->
            <div class="col-lg-6" data-aos="fade-left">
                <span class="about-badge-tag">ABOUT US</span>
                <h2 class="about-accessible-heading">Accessible Online Healthcare across Australia</h2>
                <p class="about-accessible-lead">
                    Healthcare is one of the domains of daily life that should be reliable, accessible, and convenient. At Zymika Health, we help people receive quality medical care from an experienced telehealth doctor Australia, avoiding spending hours travelling or waiting for their number in busy clinics.
                </p>

                <!-- Feature 1: Expert Doctor -->
                <div class="about-feature-card">
                    <div class="about-feature-icon-wrap">
                        <i class="bi bi-person-check-fill"></i>
                    </div>
                    <div>
                        <h3 class="about-feature-title">Expert Doctor</h3>
                        <p class="about-feature-desc">
                            Our secure telehealth platform connects patients seeking GP consultations with experienced Australian doctors, offering personalised healthcare solutions through Virtual GP Appointment Australia.
                        </p>
                    </div>
                </div>

                <!-- Feature 2: Advanced Technology -->
                <div class="about-feature-card">
                    <div class="about-feature-icon-wrap">
                        <i class="bi bi-laptop-fill"></i>
                    </div>
                    <div>
                        <h3 class="about-feature-title">Advanced Technology</h3>
                        <p class="about-feature-desc">
                            We manage all your medical appointments using advanced technology, offer same-day consultations, provide instant medications, and offer virtual GP appointment Australia.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Services Section -->
<section class="py-5 bg-white" id="services">
    <div class="container py-lg-4" style="max-width: 1200px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(58, 163, 162, 0.12); color: #1a9b8c;">
                Our Services
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-3">Our Online Healthcare Services</h2>
        </div>

        <div class="row g-4 justify-content-center">
            <!-- Service 1: Book a telehealth appointment -->
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="50">
                <div class="card h-100 border rounded-4 p-4 shadow-sm text-center card-hover-lift" style="transition: all 0.3s ease;">
                    <div class="mx-auto rounded-circle d-flex align-items-center justify-content-center text-white mb-3" style="width: 60px; height: 60px; background-color: #0f2d59;">
                        <i class="bi bi-calendar-event fs-4"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Book a telehealth appointment</h5>
                    <p class="text-muted small mb-3">Choose a convenient time to speak with an Australian doctor from home.</p>
                    <a href="{{ route('booking.index') }}" class="mt-auto fw-semibold small text-decoration-none" style="color: #3aa3a2;">Book Now →</a>
                </div>
            </div>

            <!-- Service 2: Request a medical certificate -->
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 border rounded-4 p-4 shadow-sm text-center card-hover-lift" style="transition: all 0.3s ease;">
                    <div class="mx-auto rounded-circle d-flex align-items-center justify-content-center text-white mb-3" style="width: 60px; height: 60px; background-color: #3aa3a2;">
                        <i class="bi bi-file-earmark-medical fs-4"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Request a medical certificate</h5>
                    <p class="text-muted small mb-3">Receive a same-day medical certificate for work or university when clinically suitable.</p>
                    <a href="{{ route('services.prescriptions') }}" class="mt-auto fw-semibold small text-decoration-none" style="color: #3aa3a2;">Learn More →</a>
                </div>
            </div>

            <!-- Service 3: Instant Scripts -->
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
                <div class="card h-100 border rounded-4 p-4 shadow-sm text-center card-hover-lift" style="transition: all 0.3s ease;">
                    <div class="mx-auto rounded-circle d-flex align-items-center justify-content-center text-white mb-3" style="width: 60px; height: 60px; background-color: #163868;">
                        <i class="bi bi-capsule-pill fs-4"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Instant Scripts</h5>
                    <p class="text-muted small mb-3">Fast repeat prescriptions and medication reviews through telehealth.</p>
                    <a href="{{ route('services.prescriptions') }}" class="mt-auto fw-semibold small text-decoration-none" style="color: #3aa3a2;">Request Script →</a>
                </div>
            </div>

            <!-- Service 4: General GP Consultations -->
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="card h-100 border rounded-4 p-4 shadow-sm text-center card-hover-lift" style="transition: all 0.3s ease;">
                    <div class="mx-auto rounded-circle d-flex align-items-center justify-content-center text-white mb-3" style="width: 60px; height: 60px; background-color: #0f2d59;">
                        <i class="bi bi-hospital fs-4"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">General GP Consultations</h5>
                    <p class="text-muted small mb-3">Professional consultations for common illnesses, follow-ups, and medical advice.</p>
                    <a href="{{ route('services.gp') }}" class="mt-auto fw-semibold small text-decoration-none" style="color: #3aa3a2;">View Details →</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Process Section -->
<section class="py-5" style="background-color: #f7fbfc;" id="how-it-works">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(15, 45, 89, 0.08); color: #0f2d59;">
                Our Process
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-2">Simple Steps of Medical Care</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-white rounded-4 shadow-sm border h-100 position-relative">
                    <span class="fw-bold fs-4 text-brand-primary mb-3 d-block">( 01 )</span>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Book Appointment Online</h4>
                    <p class="text-muted small mb-0 lh-base">
                        Choose a favourable appointment time by using a simple online booking system.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-white rounded-4 shadow-sm border h-100 position-relative">
                    <span class="fw-bold fs-4 text-brand-primary mb-3 d-block">( 02 )</span>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Meet Your Doctor</h4>
                    <p class="text-muted small mb-0 lh-base">
                        Securely connect with a professional Australian healthcare professional or get online medical consultation Australia by phone or video.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4 bg-white rounded-4 shadow-sm border h-100 position-relative">
                    <span class="fw-bold fs-4 text-brand-primary mb-3 d-block">( 03 )</span>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Receive Your Care</h4>
                    <p class="text-muted small mb-0 lh-base">
                        Your doctor can provide prescriptions, referrals, mental health care plans, medical certificates, or ongoing treatment recommendations.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Booking Form Section -->
@include('partials.booking-form')

<!-- Our Expert Doctor Section -->
<section class="py-5 bg-white" id="doctors">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(58, 163, 162, 0.12); color: #1a9b8c;">
                OUR EXPERT DOCTOR
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-2">Dr Bazel Lodhi</h2>
            <p class="text-muted fs-6">General Practitioner</p>
        </div>

        <div class="row align-items-center g-4 g-lg-5 justify-content-center">
            <div class="col-lg-5 text-center" data-aos="fade-right">
                <div class="position-relative d-inline-block">
                    <img src="{{ asset('images/doctor-bazel.png') }}" alt="Dr Bazel Lodhi General Practitioner" class="img-fluid rounded-5 shadow-lg" style="max-height: 420px; object-fit: cover;">
                    <div class="position-absolute bottom-0 end-0 bg-white p-3 rounded-4 shadow-sm border m-3 text-start">
                        <div class="fw-bold text-brand-contrast small">Dr Bazel Lodhi</div>
                        <div class="text-brand-primary small fw-semibold">FACRRM, MPH, MBBS, EMC, RPSGT</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <p class="text-muted lead fs-6 mb-3 lh-base">
                    Dr Bazel Lodhi is a highly experienced General Practitioner with over 25 years of clinical practice across diverse healthcare settings internationally. Currently consulting with Hola Health, he is committed to delivering accessible, high-quality medical care through telehealth to patients across Australia.
                </p>
                <p class="text-muted fs-6 mb-4 lh-base">
                    Holding multiple postgraduate qualifications, including Fellowship of the Australian College of Rural and Remote Medicine (FACRRM) and a Master of Public Health (MPH), Dr Lodhi brings a broad and comprehensive perspective to patient care. His experience spans preventive medicine, procedural skills, and long-term chronic disease management.
                </p>
                <div class="d-flex flex-wrap gap-2">
                    <span class="badge bg-light text-brand-contrast border px-3 py-2 rounded-pill">Preventive Medicine</span>
                    <span class="badge bg-light text-brand-contrast border px-3 py-2 rounded-pill">Chronic Disease Management</span>
                    <span class="badge bg-light text-brand-contrast border px-3 py-2 rounded-pill">Telehealth Specialist</span>
                    <span class="badge bg-light text-brand-contrast border px-3 py-2 rounded-pill">25+ Years Experience</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Zymika Health Section -->
<section class="py-5" style="background-color: #f7fbfc;">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(15, 45, 89, 0.08); color: #0f2d59;">
                WHY CHOOSE ZYMIKA HEALTH
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-2">Reliable Telehealth Care You Can Trust</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-white rounded-4 shadow-sm border h-100">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 50px; height: 50px; background-color: #0f2d59;">
                        <i class="bi bi-clock-history fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Convenient Access</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Connect with experienced healthcare professionals through online doctor consultations.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-white rounded-4 shadow-sm border h-100">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 50px; height: 50px; background-color: #3aa3a2;">
                        <i class="bi bi-calendar-check fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Simple Booking</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Schedule your virtual healthcare appointment and access expert medical care without long waiting times.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-white rounded-4 shadow-sm border h-100">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 50px; height: 50px; background-color: #163868;">
                        <i class="bi bi-people fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">For All Age Groups</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Zymika Health serves individuals and families across Australia, including children, adults, seniors, busy professionals, parents, students, and rural and remote communities.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Satisfied Patients Section (VIP Luxury Review Design - Zero Inline CSS) -->
<section class="reviews-section">
    <div class="container" style="max-width: 1200px;">
        <div class="text-center mb-4" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(58, 163, 162, 0.12); color: #1a9b8c;">
                Our Satisfied Patients
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-2">What Our Patients Say about Zymika Health?</h2>
            <p class="text-muted mx-auto lead fs-6 mb-3" style="max-width: 680px;">
                Discover why patients across Australia trust Zymika Health for convenient and 24/7 Telehealth Australia services.
            </p>

            <!-- Rating Trust Pill -->
            <div class="reviews-trust-pill">
                <div class="reviews-stars-wrap">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                </div>
                <span class="reviews-score-text">4.9 / 5.0 Star Patient Rating</span>
                <span class="reviews-ahpra-badge">
                    <i class="bi bi-patch-check-fill me-1"></i>AHPRA Verified Doctors
                </span>
            </div>
        </div>

        <!-- Featured Luxury Doctor Review -->
        <div class="review-featured-card" data-aos="fade-up">
            <span class="review-watermark-quote">“</span>
            
            <div class="review-featured-stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
            </div>
            
            <p class="review-featured-quote">
                “Dr Bazel Lodhi provided exceptional care and made me feel comfortable throughout my consultation. His professional approach, clear communication, and genuine concern for my health were outstanding. I appreciate the time he took to understand my needs and provide personalised advice.”
            </p>

            <div class="review-author-wrap">
                <div class="review-author-avatar">
                    <i class="bi bi-person-fill"></i>
                </div>
                <div>
                    <h4 class="review-author-name">
                        <span>Patient Review</span>
                        <i class="bi bi-patch-check-fill review-verified-tag"></i>
                    </h4>
                    <p class="review-author-badge">Dr Bazel Lodhi Consultation • Verified Australian Telehealth Patient</p>
                </div>
            </div>
        </div>

        <!-- Auto-Scrolling Infinite Patient Reviews Track -->
        <div class="reviews-autoscroll-wrapper" data-aos="fade-up">
            <div class="reviews-autoscroll-track">
                
                <!-- Review 1: David R. -->
                <div class="review-carousel-item">
                    <div class="review-card">
                        <div>
                            <div class="review-card-stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <p class="review-card-text">
                                “Zymika Health made getting medical advice so much easier. I was able to connect with a healthcare professional from home without the stress of waiting rooms. Highly recommended.”
                            </p>
                        </div>
                        <div class="review-card-footer">
                            <div class="review-card-author-avatar">DR</div>
                            <div>
                                <div class="review-card-author-name">
                                    <span>David R.</span>
                                    <i class="bi bi-patch-check-fill review-verified-tag"></i>
                                </div>
                                <div class="review-card-author-sub">General GP Patient • Melbourne, VIC</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review 2: Emily K. -->
                <div class="review-carousel-item">
                    <div class="review-card">
                        <div>
                            <div class="review-card-stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <p class="review-card-text">
                                “The convenience of online consultations has completely changed how my family manages healthcare. Zymika Health is actually the best.”
                            </p>
                        </div>
                        <div class="review-card-footer">
                            <div class="review-card-author-avatar">EK</div>
                            <div>
                                <div class="review-card-author-name">
                                    <span>Emily K.</span>
                                    <i class="bi bi-patch-check-fill review-verified-tag"></i>
                                </div>
                                <div class="review-card-author-sub">Family Telehealth • Sydney, NSW</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review 3: John G. -->
                <div class="review-carousel-item">
                    <div class="review-card">
                        <div>
                            <div class="review-card-stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <p class="review-card-text">
                                “I appreciate how easy it is to book appointments and receive quality care through Zymika Health. Amazing platform. I am glad that now my health is in good hands.”
                            </p>
                        </div>
                        <div class="review-card-footer">
                            <div class="review-card-author-avatar">JG</div>
                            <div>
                                <div class="review-card-author-name">
                                    <span>John G.</span>
                                    <i class="bi bi-patch-check-fill review-verified-tag"></i>
                                </div>
                                <div class="review-card-author-sub">Patient’s Parent • Brisbane, QLD</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review 4: Sarah M. -->
                <div class="review-carousel-item">
                    <div class="review-card">
                        <div>
                            <div class="review-card-stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <p class="review-card-text">
                                “Fast, seamless prescription renewal without taking half a day off work. The doctor was knowledgeable, patient, and very helpful.”
                            </p>
                        </div>
                        <div class="review-card-footer">
                            <div class="review-card-author-avatar">SM</div>
                            <div>
                                <div class="review-card-author-name">
                                    <span>Sarah M.</span>
                                    <i class="bi bi-patch-check-fill review-verified-tag"></i>
                                </div>
                                <div class="review-card-author-sub">Online Prescription • Perth, WA</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review 5: Michael T. -->
                <div class="review-carousel-item">
                    <div class="review-card">
                        <div>
                            <div class="review-card-stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <p class="review-card-text">
                                “Compassionate and discreet medical care. Being able to speak to a doctor privately from home has been wonderful for my wellbeing.”
                            </p>
                        </div>
                        <div class="review-card-footer">
                            <div class="review-card-author-avatar">MT</div>
                            <div>
                                <div class="review-card-author-name">
                                    <span>Michael T.</span>
                                    <i class="bi bi-patch-check-fill review-verified-tag"></i>
                                </div>
                                <div class="review-card-author-sub">Mental Health Care • Adelaide, SA</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- DUPLICATE SET FOR INFINITE SEAMLESS LOOPING -->
                <div class="review-carousel-item" aria-hidden="true">
                    <div class="review-card">
                        <div>
                            <div class="review-card-stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <p class="review-card-text">
                                “Zymika Health made getting medical advice so much easier. I was able to connect with a healthcare professional from home without the stress of waiting rooms. Highly recommended.”
                            </p>
                        </div>
                        <div class="review-card-footer">
                            <div class="review-card-author-avatar">DR</div>
                            <div>
                                <div class="review-card-author-name">
                                    <span>David R.</span>
                                    <i class="bi bi-patch-check-fill review-verified-tag"></i>
                                </div>
                                <div class="review-card-author-sub">General GP Patient • Melbourne, VIC</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="review-carousel-item" aria-hidden="true">
                    <div class="review-card">
                        <div>
                            <div class="review-card-stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <p class="review-card-text">
                                “The convenience of online consultations has completely changed how my family manages healthcare. Zymika Health is actually the best.”
                            </p>
                        </div>
                        <div class="review-card-footer">
                            <div class="review-card-author-avatar">EK</div>
                            <div>
                                <div class="review-card-author-name">
                                    <span>Emily K.</span>
                                    <i class="bi bi-patch-check-fill review-verified-tag"></i>
                                </div>
                                <div class="review-card-author-sub">Family Telehealth • Sydney, NSW</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="review-carousel-item" aria-hidden="true">
                    <div class="review-card">
                        <div>
                            <div class="review-card-stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <p class="review-card-text">
                                “I appreciate how easy it is to book appointments and receive quality care through Zymika Health. Amazing platform. I am glad that now my health is in good hands.”
                            </p>
                        </div>
                        <div class="review-card-footer">
                            <div class="review-card-author-avatar">JG</div>
                            <div>
                                <div class="review-card-author-name">
                                    <span>John G.</span>
                                    <i class="bi bi-patch-check-fill review-verified-tag"></i>
                                </div>
                                <div class="review-card-author-sub">Patient’s Parent • Brisbane, QLD</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="review-carousel-item" aria-hidden="true">
                    <div class="review-card">
                        <div>
                            <div class="review-card-stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <p class="review-card-text">
                                “Fast, seamless prescription renewal without taking half a day off work. The doctor was knowledgeable, patient, and very helpful.”
                            </p>
                        </div>
                        <div class="review-card-footer">
                            <div class="review-card-author-avatar">SM</div>
                            <div>
                                <div class="review-card-author-name">
                                    <span>Sarah M.</span>
                                    <i class="bi bi-patch-check-fill review-verified-tag"></i>
                                </div>
                                <div class="review-card-author-sub">Online Prescription • Perth, WA</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="review-carousel-item" aria-hidden="true">
                    <div class="review-card">
                        <div>
                            <div class="review-card-stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <p class="review-card-text">
                                “Compassionate and discreet medical care. Being able to speak to a doctor privately from home has been wonderful for my wellbeing.”
                            </p>
                        </div>
                        <div class="review-card-footer">
                            <div class="review-card-author-avatar">MT</div>
                            <div>
                                <div class="review-card-author-name">
                                    <span>Michael T.</span>
                                    <i class="bi bi-patch-check-fill review-verified-tag"></i>
                                </div>
                                <div class="review-card-author-sub">Mental Health Care • Adelaide, SA</div>
                            </div>
                        </div>
                    </div>
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
