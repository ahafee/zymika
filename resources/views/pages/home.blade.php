@extends('layouts.app')

@section('title', 'Zymika Health | Telehealth Doctor Australia | 24/7 Quality Healthcare')

@section('content')
<div id="content"></div>

<!-- ========================================================================= -->
<!-- 1. HERO SECTION                                                           -->
<!-- ========================================================================= -->
<section class="hero-gradient py-5 py-lg-6 position-relative overflow-hidden" id="home">
    <div class="container py-4 py-lg-5 position-relative z-1" style="max-width: 1320px;">
        <div class="row align-items-center g-5">
            <div class="col-lg-7" data-aos="fade-right" data-aos-duration="700">
                <!-- Badge -->
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1.5 rounded-pill badge-tga mb-3">
                    <span class="pulse-dot"></span>
                    <span class="fw-semibold small text-brand-primary">Telehealth doctor Australia</span>
                </div>

                <!-- Main Heading (White + Animated Flow Accent) -->
                <h1 class="display-4 fw-extrabold text-white mb-3 lh-tight hero-animated-heading">
                    <span class="d-inline-block">24/7 Quality Healthcare</span> <br class="d-none d-md-inline">
                    <span class="animated-gradient-brand d-inline-block">Wherever You Are</span>
                </h1>

                <!-- Subtext in White -->
                <p class="lead text-white opacity-90 mb-4 pe-lg-4 fs-5 lh-base">
                    Connect with qualified Australian doctors from the comfort of your home. Get secure online consultations, prescriptions, medical certificates, referrals and ongoing healthcare support.
                </p>

                <!-- 6 Specialty Tags in Crisp White -->
                <div class="row g-2 mb-4">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2 py-1 text-white">
                            <i class="bi bi-check-circle-fill text-brand-primary fs-5"></i>
                            <span class="fw-semibold">General GP Consultations</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2 py-1 text-white">
                            <i class="bi bi-check-circle-fill text-brand-primary fs-5"></i>
                            <span class="fw-semibold">Mental Health &amp; Wellbeing</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2 py-1 text-white">
                            <i class="bi bi-check-circle-fill text-brand-primary fs-5"></i>
                            <span class="fw-semibold">Health Cannabis Compounding</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2 py-1 text-white">
                            <i class="bi bi-check-circle-fill text-brand-primary fs-5"></i>
                            <span class="fw-semibold">Urgent &amp; After Hours Care</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2 py-1 text-white">
                            <i class="bi bi-check-circle-fill text-brand-primary fs-5"></i>
                            <span class="fw-semibold">Online Prescriptions</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2 py-1 text-white">
                            <i class="bi bi-check-circle-fill text-brand-primary fs-5"></i>
                            <span class="fw-semibold">Chronic Disease Support</span>
                        </div>
                    </div>
                </div>

                <!-- Call Us Button CTA -->
                <div class="d-flex flex-wrap gap-3 mb-2">
                    <a href="#" class="btn btn-brand-primary btn-lg px-4 py-3 rounded-pill fw-bold shadow-primary d-inline-flex align-items-center gap-2">
                        <i class="bi bi-telephone-fill"></i>
                        <span>Call Us</span>
                    </a>
                </div>
            </div>

            <!-- Hero Right: Visual Composite + Doctor Card -->
            <div class="col-lg-5" data-aos="fade-left" data-aos-duration="700" data-aos-delay="100">
                <!-- Hero Visual Composite Card -->
                <div class="hero-visual-card position-relative mb-3">
                    <img src="{{ asset('images/hero-telehealth.jpg') }}" 
                         alt="Australian Telehealth Consultation" 
                         class="hero-visual-img w-100"
                         style="border-radius: 20px 20px 0 0; object-fit: cover; max-height: 220px;"
                         onerror="this.src='{{ asset('images/logo.svg') }}'">
                </div>

                <!-- Doctor Card -->
                <div class="card card-zymika shadow-lg border-0 p-4 bg-white position-relative" style="border-radius: 0 0 20px 20px;">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="bg-brand-primary-light rounded-circle d-flex align-items-center justify-content-center text-brand-primary" style="width: 58px; height: 58px; min-width: 58px;">
                            <i class="bi bi-person-badge-fill fs-3"></i>
                        </div>
                        <div>
                            <span class="badge bg-brand-primary text-white rounded-pill px-2.5 py-1 mb-1 fw-normal" style="font-size: 0.75rem;">Featured Doctor</span>
                            <h5 class="fw-bold text-brand-contrast mb-0">Dr Bazel Lodhi</h5>
                            <div class="text-muted fw-semibold small">General Practitioner</div>
                        </div>
                    </div>

                    <div class="p-3 rounded-3 bg-brand-soft border-start border-3 border-brand-primary position-relative mb-3">
                        <p class="fst-italic text-brand-contrast mb-0 small lh-base">
                            “Committed to providing accessible, high-quality and patient-centred healthcare through convenient telehealth consultations.”
                        </p>
                    </div>

                    <div class="d-flex align-items-center justify-content-between pt-2 border-top">
                        <div class="d-flex align-items-center gap-1 text-warning small">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <span class="text-brand-contrast ms-1 fw-bold">5.0</span>
                        </div>
                        <span class="text-muted small"><i class="bi bi-shield-check text-success me-1"></i> Australian Registered Doctors</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================================================= -->
<!-- 2. STATS STRIP (Original VIP Theme Style)                                -->
<!-- ========================================================================= -->
<section class="py-4">
    <div class="container" style="max-width: 1320px;">
        <div class="row g-3" data-aos="fade-up" data-aos-delay="200">
            <div class="col-12">
                <div class="hero-stats-strip shadow-sm rounded-4 p-3 p-md-4 border">
                    <div class="row g-4 text-center text-md-start align-items-center justify-content-between">
                        <!-- Stat 1 -->
                        <div class="col-6 col-lg">
                            <div class="hero-stat-item justify-content-center justify-content-md-start">
                                <div class="hero-stat-icon bg-brand-primary-light text-brand-primary">
                                    <i class="bi bi-calendar2-check-fill"></i>
                                </div>
                                <div>
                                    <h4 class="fw-extrabold text-brand-contrast mb-0 num-font">40,000+</h4>
                                    <span class="small text-muted">Consultations</span>
                                </div>
                            </div>
                        </div>

                        <!-- Stat 2 -->
                        <div class="col-6 col-lg">
                            <div class="hero-stat-item justify-content-center justify-content-md-start">
                                <div class="hero-stat-icon bg-brand-sage-light text-brand-sage">
                                    <i class="bi bi-patch-check-fill"></i>
                                </div>
                                <div>
                                    <h4 class="fw-extrabold text-brand-contrast mb-0 num-font">100%</h4>
                                    <span class="small text-muted">Australian Registered Doctors</span>
                                </div>
                            </div>
                        </div>

                        <!-- Stat 3 -->
                        <div class="col-6 col-lg">
                            <div class="hero-stat-item justify-content-center justify-content-md-start">
                                <div class="hero-stat-icon bg-brand-primary-light text-brand-primary">
                                    <i class="bi bi-shield-lock-fill"></i>
                                </div>
                                <div>
                                    <h4 class="fw-extrabold text-brand-contrast mb-0 num-font">Private</h4>
                                    <span class="small text-muted">Secure &amp; Confidential Care</span>
                                </div>
                            </div>
                        </div>

                        <!-- Stat 4 -->
                        <div class="col-6 col-lg">
                            <div class="hero-stat-item justify-content-center justify-content-md-start">
                                <div class="hero-stat-icon bg-brand-gold-light text-warning">
                                    <i class="bi bi-clock-history"></i>
                                </div>
                                <div>
                                    <h4 class="fw-extrabold text-brand-contrast mb-0 num-font">Fast</h4>
                                    <span class="small text-muted">Same Day Availability</span>
                                </div>
                            </div>
                        </div>

                        <!-- Stat 5 -->
                        <div class="col-12 col-lg">
                            <div class="hero-stat-item justify-content-center justify-content-md-start">
                                <div class="hero-stat-icon bg-brand-primary-light text-brand-primary">
                                    <i class="bi bi-award-fill"></i>
                                </div>
                                <div>
                                    <h4 class="fw-extrabold text-brand-contrast mb-0 num-font">25+ Years</h4>
                                    <span class="small text-muted">of Experience In Healthcare Service</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================================================= -->
<!-- 3. ABOUT US SECTION                                                       -->
<!-- ========================================================================= -->
<section class="py-5 py-lg-6 bg-white" id="about">
    <div class="container py-4" style="max-width: 1320px;">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <span class="badge bg-brand-primary-light text-brand-primary px-3 py-1.5 rounded-pill fw-bold text-uppercase tracking-wider mb-3">About Us</span>
                <h2 class="display-5 fw-extrabold text-brand-contrast mb-4">
                    Accessible Online Healthcare across Australia
                </h2>
                <p class="text-muted fs-6 lh-lg mb-4">
                    Healthcare is one of the domains of daily life that should be reliable, accessible, and convenient. At Zymika Health, we help people receive quality medical care from an experienced telehealth doctor Australia, avoiding spending hours travelling or waiting for their number in busy clinics.
                </p>
                <div class="d-flex align-items-center gap-3 pt-2">
                    <a href="#services" class="btn btn-brand-primary px-4 py-2.5 rounded-pill fw-semibold shadow-sm">
                        Explore Our Services
                    </a>
                    <a href="#" class="btn btn-outline-secondary px-4 py-2.5 rounded-pill fw-semibold">
                        Call Us
                    </a>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left">
                <div class="row g-4">
                    <!-- Feature 1: Expert Doctor -->
                    <div class="col-12">
                        <div class="card card-zymika border-0 shadow-sm p-4 rounded-4 bg-white hover-shadow transition">
                            <div class="d-flex gap-4">
                                <div class="bg-brand-primary-light text-brand-primary rounded-4 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; min-width: 60px;">
                                    <i class="bi bi-heart-pulse-fill fs-3"></i>
                                </div>
                                <div>
                                    <h4 class="fw-bold text-brand-contrast mb-2">Expert Doctor</h4>
                                    <p class="text-muted mb-0 small lh-base">
                                        Our secure telehealth platform connects patients seeking GP consultations with experienced Australian doctors, offering personalised healthcare solutions through Virtual GP Appointment Australia.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 2: Advanced Technology -->
                    <div class="col-12">
                        <div class="card card-zymika border-0 shadow-sm p-4 rounded-4 bg-white hover-shadow transition">
                            <div class="d-flex gap-4">
                                <div class="bg-brand-primary-light text-brand-primary rounded-4 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; min-width: 60px;">
                                    <i class="bi bi-laptop-fill fs-3"></i>
                                </div>
                                <div>
                                    <h4 class="fw-bold text-brand-contrast mb-2">Advanced Technology</h4>
                                    <p class="text-muted mb-0 small lh-base">
                                        We manage all your medical appointments using advanced technology, offer same-day consultations, provide instant medications, and offer virtual GP appointment Australia.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================================================= -->
<!-- 4. OUR SERVICES SECTION                                                   -->
<!-- ========================================================================= -->
<section class="py-5 py-lg-6 primary1" style="background-color: var(--brand-bg-alt);" id="services">
    <div class="container py-4" style="max-width: 1320px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge bg-brand-primary-light text-brand-primary px-3 py-1.5 rounded-pill fw-bold text-uppercase tracking-wider mb-2">Our Services</span>
            <h2 class="display-5 fw-extrabold text-brand-contrast">
                Our Online Healthcare Services
            </h2>
        </div>

        <div class="row g-4 justify-content-center">
            <!-- Service 1 -->
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="card card-zymika border-0 shadow-sm p-4 rounded-4 text-center h-100 bg-white hover-shadow transition">
                    <div class="bg-brand-primary-light text-brand-primary rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                        <i class="bi bi-calendar2-check-fill fs-2"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast mb-3">Book a telehealth appointment</h5>
                    <p class="text-muted small mb-4">Fast and confidential consultations with qualified Australian GPs online.</p>
                    <div class="mt-auto">
                        <a href="#" class="btn btn-outline-primary btn-sm rounded-pill px-3 py-1.5 fw-semibold">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Service 2 -->
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="card card-zymika border-0 shadow-sm p-4 rounded-4 text-center h-100 bg-white hover-shadow transition">
                    <div class="bg-brand-primary-light text-brand-primary rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                        <i class="bi bi-file-earmark-medical-fill fs-2"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast mb-3">Request a medical certificate</h5>
                    <p class="text-muted small mb-4">Legitimate medical certificates for work or study issued directly to your email.</p>
                    <div class="mt-auto">
                        <a href="#" class="btn btn-outline-primary btn-sm rounded-pill px-3 py-1.5 fw-semibold">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Service 3 -->
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <div class="card card-zymika border-0 shadow-sm p-4 rounded-4 text-center h-100 bg-white hover-shadow transition">
                    <div class="bg-brand-primary-light text-brand-primary rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                        <i class="bi bi-capsule fs-2"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast mb-3">Instant Scripts</h5>
                    <p class="text-muted small mb-4">Get repeat or urgent eScript prescriptions sent straight to your mobile device.</p>
                    <div class="mt-auto">
                        <a href="#" class="btn btn-outline-primary btn-sm rounded-pill px-3 py-1.5 fw-semibold">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Service 4 -->
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                <div class="card card-zymika border-0 shadow-sm p-4 rounded-4 text-center h-100 bg-white hover-shadow transition">
                    <div class="bg-brand-primary-light text-brand-primary rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                        <i class="bi bi-person-check-fill fs-2"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast mb-3">
                        <a href="#" class="text-decoration-none text-brand-contrast hover-primary">General GP Consultations</a>
                    </h5>
                    <p class="text-muted small mb-4">Comprehensive medical diagnosis, treatment recommendations, and health plans.</p>
                    <div class="mt-auto">
                        <a href="#" class="btn btn-brand-primary btn-sm rounded-pill px-3 py-1.5 fw-semibold">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================================================= -->
<!-- 5. OUR PROCESS SECTION (Using process-card-vip)                            -->
<!-- ========================================================================= -->
<section class="py-5 py-lg-6 bg-white" id="how-it-works">
    <div class="container py-4" style="max-width: 1320px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge bg-brand-primary-light text-brand-primary px-3 py-1.5 rounded-pill fw-bold text-uppercase tracking-wider mb-2">Our Process</span>
            <h2 class="display-5 fw-extrabold text-brand-contrast">
                Simple Steps of Medical Care
            </h2>
        </div>

        <div class="row g-4">
            <!-- Step 01 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="process-card-vip h-100">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="display-5 fw-extrabold text-brand-primary">( 01 )</div>
                        <div class="hero-stat-icon bg-brand-primary-light text-brand-primary">
                            <i class="bi bi-calendar2-plus"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold text-brand-contrast mb-3">Book Appointment Online</h4>
                    <p class="text-muted mb-0 lh-base">
                        Choose a favourable appointment time by using a simple online booking system.
                    </p>
                </div>
            </div>

            <!-- Step 02 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="process-card-vip h-100">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="display-5 fw-extrabold text-brand-primary">( 02 )</div>
                        <div class="hero-stat-icon bg-brand-primary-light text-brand-primary">
                            <i class="bi bi-camera-video"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold text-brand-contrast mb-3">Meet Your Doctor</h4>
                    <p class="text-muted mb-0 lh-base">
                        Securely connect with a professional Australian healthcare professional or get online medical consultation Australia by phone or video.
                    </p>
                </div>
            </div>

            <!-- Step 03 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="process-card-vip h-100">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="display-5 fw-extrabold text-brand-primary">( 03 )</div>
                        <div class="hero-stat-icon bg-brand-primary-light text-brand-primary">
                            <i class="bi bi-heart-pulse"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold text-brand-contrast mb-3">Receive Your Care</h4>
                    <p class="text-muted mb-0 lh-base">
                        Your doctor can provide prescriptions, referrals, mental health care plans, medical certificates, or ongoing treatment recommendations.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================================================= -->
<!-- 6. BOOK TELEHEALTH APPOINTMENT ONLINE (FORM)                              -->
<!-- ========================================================================= -->
<section class="py-5 py-lg-6" style="background: linear-gradient(180deg, #fdfdfd 0%, #e7f9fb 100%);" id="booking">
    <div class="container py-4" style="max-width: 1000px;">
        <div class="card card-zymika border-0 shadow-lg rounded-5 overflow-hidden bg-white p-4 p-md-5" data-aos="zoom-in">
            <div class="text-center mb-4">
                <span class="badge bg-brand-primary-light text-brand-primary px-3 py-1.5 rounded-pill fw-bold text-uppercase tracking-wider mb-2">Easy Access</span>
                <h2 class="display-6 fw-extrabold text-brand-contrast mb-2">
                    Book Telehealth Appointment Online
                </h2>
                <p class="text-muted mx-auto" style="max-width: 650px;">
                    Book an online virtual doctor Australia with Zymika Health and get suitable healthcare support online from your home.
                </p>
            </div>

            <form action="{{ route('home.appointment') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-brand-contrast small">Full Name</label>
                        <input type="text" name="name" class="form-control form-control-lg rounded-3 fs-6" placeholder="Your full name" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-brand-contrast small">Email Address</label>
                        <input type="email" name="email" class="form-control form-control-lg rounded-3 fs-6" placeholder="name@example.com" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-brand-contrast small">Phone</label>
                        <input type="tel" name="phone" class="form-control form-control-lg rounded-3 fs-6" placeholder="0411 174 173" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-brand-contrast small">Reason for Consultation</label>
                        <select name="reason" class="form-select form-select-lg rounded-3 fs-6" required>
                            <option value="" selected disabled>Select reason</option>
                            <option value="General GP Consultations">General GP Consultations</option>
                            <option value="Mental Health & Wellbeing">Mental Health &amp; Wellbeing</option>
                            <option value="Health Cannabis Compounding">Health Cannabis Compounding</option>
                            <option value="Urgent & After Hours Care">Urgent &amp; After Hours Care</option>
                            <option value="Online Prescriptions">Online Prescriptions / Instant Scripts</option>
                            <option value="Chronic Disease Support">Chronic Disease Support</option>
                            <option value="Medical Certificate">Request a medical certificate</option>
                            <option value="Other">Other Healthcare Reason</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold text-brand-contrast small">Message</label>
                        <textarea name="message" class="form-control rounded-3 fs-6" rows="4" placeholder="Briefly describe your symptoms or medical requirement..." required></textarea>
                    </div>

                    <div class="col-12 text-center mt-4">
                        <button type="submit" class="btn btn-brand-primary btn-lg px-5 py-3 rounded-pill fw-bold shadow-primary">
                            <i class="bi bi-calendar-check me-2"></i> Book Appointment Online
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- ========================================================================= -->
<!-- 7. OUR EXPERT DOCTOR (Using main-team & doctor-portrait-frame)            -->
<!-- ========================================================================= -->
<section class="py-5 py-lg-6 bg-white main-team" id="doctors">
    <div class="container py-4" style="max-width: 1320px;">
        <div class="row align-items-center g-5">
            <div class="col-lg-5 text-center" data-aos="fade-right">
                <div class="doctor-portrait-frame position-relative mx-auto shadow-lg" style="max-width: 380px; border-radius: 24px; overflow: hidden; background: #071529;">
                    <div class="py-5 px-4 text-center">
                        <div class="bg-brand-primary-light text-brand-primary rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 140px; height: 140px;">
                            <i class="bi bi-person-badge-fill" style="font-size: 4.5rem;"></i>
                        </div>
                        <h3 class="fw-bold text-white mb-1">Dr Bazel Lodhi</h3>
                        <span class="badge bg-brand-primary text-white mb-2">General Practitioner</span>
                        <div class="text-light small font-monospace opacity-75">FACRRM &bull; MPH</div>
                    </div>
                    
                    <div class="doctor-ahpra-badge position-absolute top-0 start-50 translate-middle-x mt-3 px-3 py-1.5 rounded-pill shadow">
                        <i class="bi bi-check-circle-fill me-1 text-success"></i> AHPRA Verified GP
                    </div>
                </div>
                
                <div class="pill-live-status mt-3 shadow-sm d-inline-flex align-items-center gap-2 px-3 py-1.5 bg-white rounded-pill border">
                    <span class="pulse-dot"></span> <span class="small fw-semibold text-brand-contrast">Accepting Telehealth Consultations Today</span>
                </div>
            </div>

            <div class="col-lg-7" data-aos="fade-left" data-aos-delay="150">
                <span class="badge badge-tga mb-2">OUR EXPERT DOCTOR</span>
                <h2 class="display-6 fw-bold text-brand-contrast mt-1 mb-1">Dr Bazel Lodhi</h2>
                <h5 class="text-brand-primary fw-bold mb-4">General Practitioner</h5>

                <p class="text-brand-contrast opacity-90 mb-3 fs-6 lh-lg">
                    Dr Bazel Lodhi is a highly experienced General Practitioner with over 25 years of clinical practice across diverse healthcare settings internationally. Currently consulting with Hola Health, he is committed to delivering accessible, high-quality medical care through telehealth to patients across Australia.
                </p>
                <p class="text-brand-contrast opacity-90 mb-4 fs-6 lh-lg">
                    Holding multiple postgraduate qualifications, including Fellowship of the Australian College of Rural and Remote Medicine (FACRRM) and a Master of Public Health (MPH), Dr Lodhi brings a broad and comprehensive perspective to patient care. His experience spans preventive medicine, procedural skills, and long-term chronic disease management.
                </p>

                <div class="d-flex flex-wrap gap-3">
                    <a href="#booking" class="btn btn-brand-primary px-4 py-2.5 rounded-pill fw-semibold shadow-sm">
                        Book Consultation With Dr Lodhi
                    </a>
                    <a href="#" class="btn btn-outline-secondary px-4 py-2.5 rounded-pill fw-semibold">
                        Call Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================================================= -->
<!-- 8. WHY CHOOSE ZYMIKA HEALTH                                               -->
<!-- ========================================================================= -->
<section class="py-5 py-lg-6" style="background-color: var(--brand-bg-alt);">
    <div class="container py-4" style="max-width: 1320px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge bg-brand-primary-light text-brand-primary px-3 py-1.5 rounded-pill fw-bold text-uppercase tracking-wider mb-2">WHY CHOOSE ZYMIKA HEALTH</span>
            <h2 class="display-5 fw-extrabold text-brand-contrast">
                Reliable Telehealth Care You Can Trust
            </h2>
        </div>

        <div class="row g-4">
            <!-- Feature 1 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card card-zymika border-0 shadow-sm p-4 p-lg-5 rounded-4 h-100 bg-white hover-shadow transition text-center text-md-start">
                    <div class="bg-brand-primary-light text-brand-primary rounded-4 d-inline-flex align-items-center justify-content-center mb-4" style="width: 64px; height: 64px;">
                        <i class="bi bi-clock-fill fs-3"></i>
                    </div>
                    <h4 class="fw-bold text-brand-contrast mb-3">Convenient Access</h4>
                    <p class="text-muted mb-0 lh-base">
                        Connect with experienced healthcare professionals through online doctor consultations.
                    </p>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card card-zymika border-0 shadow-sm p-4 p-lg-5 rounded-4 h-100 bg-white hover-shadow transition text-center text-md-start">
                    <div class="bg-brand-primary-light text-brand-primary rounded-4 d-inline-flex align-items-center justify-content-center mb-4" style="width: 64px; height: 64px;">
                        <i class="bi bi-calendar-heart-fill fs-3"></i>
                    </div>
                    <h4 class="fw-bold text-brand-contrast mb-3">Simple Booking</h4>
                    <p class="text-muted mb-0 lh-base">
                        Schedule your virtual healthcare appointment and access expert medical care without long waiting times.
                    </p>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card card-zymika border-0 shadow-sm p-4 p-lg-5 rounded-4 h-100 bg-white hover-shadow transition text-center text-md-start">
                    <div class="bg-brand-primary-light text-brand-primary rounded-4 d-inline-flex align-items-center justify-content-center mb-4" style="width: 64px; height: 64px;">
                        <i class="bi bi-people-fill fs-3"></i>
                    </div>
                    <h4 class="fw-bold text-brand-contrast mb-3">For All Age Groups</h4>
                    <p class="text-muted mb-0 lh-base">
                        Zymika Health serves individuals and families across Australia, including children, adults, seniors, busy professionals, parents, students, and rural and remote communities.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================================================= -->
<!-- 9. OUR SATISFIED PATIENTS (TESTIMONIALS)                                  -->
<!-- ========================================================================= -->
<section class="py-5 py-lg-6 bg-white">
    <div class="container py-4" style="max-width: 1320px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge bg-brand-primary-light text-brand-primary px-3 py-1.5 rounded-pill fw-bold text-uppercase tracking-wider mb-2">Our Satisfied Patients</span>
            <h2 class="display-5 fw-extrabold text-brand-contrast mb-2">
                What Our Patients Say about Zymika Health?
            </h2>
            <p class="text-muted mx-auto" style="max-width: 650px;">
                Discover why patients across Australia trust Zymika Health for convenient and 24/7 Telehealth Australia services.
            </p>
        </div>

        <!-- Featured Doctor Testimonial -->
        <div class="card card-zymika border-0 shadow-sm rounded-4 p-4 p-lg-5 mb-5 bg-brand-soft border-start border-4 border-brand-primary" data-aos="fade-up">
            <div class="row align-items-center g-4">
                <div class="col-lg-12">
                    <div class="d-flex align-items-center gap-1 text-warning mb-3">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <blockquote class="fs-5 text-brand-contrast lh-lg mb-3 fst-italic">
                        “Dr Bazel Lodhi provided exceptional care and made me feel comfortable throughout my consultation. His professional approach, clear communication, and genuine concern for my health were outstanding. I appreciate the time he took to understand my needs and provide personalised advice.”
                    </blockquote>
                    <div class="fw-bold text-brand-primary text-uppercase tracking-wider small">Patient Review</div>
                </div>
            </div>
        </div>

        <!-- 3 Patient Review Cards -->
        <div class="row g-4">
            <!-- Review 1 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card card-zymika border-0 shadow-sm p-4 rounded-4 h-100 bg-white hover-shadow transition d-flex flex-column">
                    <div class="d-flex align-items-center gap-1 text-warning mb-3 small">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="text-muted flex-grow-1 lh-base fst-italic mb-4">
                        “Zymika Health made getting medical advice so much easier. I was able to connect with a healthcare professional from home without the stress of waiting rooms. Highly recommended.”
                    </p>
                    <div class="border-top pt-3 d-flex align-items-center gap-2">
                        <div class="bg-brand-primary-light text-brand-primary rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 40px; height: 40px;">
                            D
                        </div>
                        <div>
                            <div class="fw-bold text-brand-contrast">David R.</div>
                            <div class="text-muted small">Patient</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Review 2 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card card-zymika border-0 shadow-sm p-4 rounded-4 h-100 bg-white hover-shadow transition d-flex flex-column">
                    <div class="d-flex align-items-center gap-1 text-warning mb-3 small">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="text-muted flex-grow-1 lh-base fst-italic mb-4">
                        “The convenience of online consultations has completely changed how my family manages healthcare. Zymika Health is actually the best.”
                    </p>
                    <div class="border-top pt-3 d-flex align-items-center gap-2">
                        <div class="bg-brand-primary-light text-brand-primary rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 40px; height: 40px;">
                            E
                        </div>
                        <div>
                            <div class="fw-bold text-brand-contrast">Emily K.</div>
                            <div class="text-muted small">Patient</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Review 3 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card card-zymika border-0 shadow-sm p-4 rounded-4 h-100 bg-white hover-shadow transition d-flex flex-column">
                    <div class="d-flex align-items-center gap-1 text-warning mb-3 small">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="text-muted flex-grow-1 lh-base fst-italic mb-4">
                        “I appreciate how easy it is to book appointments and receive quality care through Zymika Health. Amazing platform. I am glad that now my health is in good hands.”
                    </p>
                    <div class="border-top pt-3 d-flex align-items-center gap-2">
                        <div class="bg-brand-primary-light text-brand-primary rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 40px; height: 40px;">
                            J
                        </div>
                        <div>
                            <div class="fw-bold text-brand-contrast">John G.</div>
                            <div class="text-muted small">Patient’s Parent</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================================================= -->
<!-- 10. FAQS / COMMON QUESTIONS                                               -->
<!-- ========================================================================= -->
<section class="py-5 py-lg-6" style="background-color: var(--brand-bg-alt);" id="contact">
    <div class="container py-4" style="max-width: 900px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge bg-brand-primary-light text-brand-primary px-3 py-1.5 rounded-pill fw-bold text-uppercase tracking-wider mb-2">Have More Questions?</span>
            <p class="text-muted small mb-2">Need help before booking your telehealth appointment? Contact Zymika Health and our team will guide you through the next steps.</p>
            <div class="text-uppercase tracking-wider fw-bold text-brand-primary small mb-1">Common Questions</div>
            <h2 class="display-6 fw-extrabold text-brand-contrast">
                Frequently Questions About Telehealth Services
            </h2>
        </div>

        <div class="accordion accordion-flush bg-white rounded-4 shadow-sm p-3 p-md-4" id="faqAccordion" data-aos="fade-up">
            <!-- Q1 -->
            <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden bg-light">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button fw-bold text-brand-contrast collapsed bg-light py-3 px-4 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        What is telehealth consultation?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body px-4 pb-4 pt-0 text-muted lh-base">
                        A telehealth consultation Australia is an appointment with a qualified healthcare professional conducted over the phone or video, allowing you to receive medical advice without visiting a clinic.
                    </div>
                </div>
            </div>

            <!-- Q2 -->
            <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden bg-light">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button fw-bold text-brand-contrast collapsed bg-light py-3 px-4 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Can I get a telehealth prescription online?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body px-4 pb-4 pt-0 text-muted lh-base">
                        Yes, our registered doctors can evaluate your condition and send digital prescriptions directly via SMS or email to your phone or your preferred pharmacy.
                    </div>
                </div>
            </div>

            <!-- Q3 -->
            <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden bg-light">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button fw-bold text-brand-contrast collapsed bg-light py-3 px-4 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Can I receive a medical certificate online?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                    <div class="accordion-body px-4 pb-4 pt-0 text-muted lh-base">
                        Yes, after evaluating your health condition, our doctors can provide legitimate medical certificates for work or study sent directly to your inbox.
                    </div>
                </div>
            </div>

            <!-- Q4 -->
            <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden bg-light">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button fw-bold text-brand-contrast collapsed bg-light py-3 px-4 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Can children use telehealth?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                    <div class="accordion-body px-4 pb-4 pt-0 text-muted lh-base">
                        Yes, children can consult with our doctors through telehealth accompanied by a parent or legal guardian.
                    </div>
                </div>
            </div>

            <!-- Q5 -->
            <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden bg-light">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button fw-bold text-brand-contrast collapsed bg-light py-3 px-4 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Can I get antibiotics online?
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                    <div class="accordion-body px-4 pb-4 pt-0 text-muted lh-base">
                        Where clinically indicated and safe to do so, our doctors can prescribe appropriate antibiotics following a telehealth assessment.
                    </div>
                </div>
            </div>

            <!-- Q6 -->
            <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden bg-light">
                <h2 class="accordion-header" id="headingSix">
                    <button class="accordion-button fw-bold text-brand-contrast collapsed bg-light py-3 px-4 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        How long does a consultation take?
                    </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                    <div class="accordion-body px-4 pb-4 pt-0 text-muted lh-base">
                        Standard telehealth consultations typically take 10 to 15 minutes, allowing adequate time to thoroughly discuss your health concerns.
                    </div>
                </div>
            </div>

            <!-- Q7 -->
            <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden bg-light">
                <h2 class="accordion-header" id="headingSeven">
                    <button class="accordion-button fw-bold text-brand-contrast collapsed bg-light py-3 px-4 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                        Are telehealth consultations confidential?
                    </button>
                </h2>
                <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#faqAccordion">
                    <div class="accordion-body px-4 pb-4 pt-0 text-muted lh-base">
                        Yes, all consultations and medical records are strictly confidential, private, and comply with Australian healthcare privacy regulations.
                    </div>
                </div>
            </div>

            <!-- Q8 -->
            <div class="accordion-item border-0 mb-1 rounded-3 overflow-hidden bg-light">
                <h2 class="accordion-header" id="headingEight">
                    <button class="accordion-button fw-bold text-brand-contrast collapsed bg-light py-3 px-4 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                        Does Medicare cover telehealth?
                    </button>
                </h2>
                <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#faqAccordion">
                    <div class="accordion-body px-4 pb-4 pt-0 text-muted lh-base">
                        Eligibility for Medicare rebates depends on current Australian Department of Health telehealth regulations. Private consultations are available for all patients across Australia.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================================================= -->
<!-- 11. PRE-FOOTER CALL TO ACTION (Original Healing Journey Glass Style)       -->
<!-- ========================================================================= -->
<section class="healing-journey-section py-5 py-lg-6" data-aos="fade-up">
    <div class="container py-3 py-lg-4">
        <div class="healing-journey-glass-card max-w-900 mx-auto text-center position-relative p-4 p-md-5">
            <h2 class="display-5 fw-extrabold text-white mb-3">
                Book Your Appointment With Medical Experts
            </h2>
            <p class="lead text-light opacity-90 max-w-700 mx-auto mb-3 fs-5">
                Take the first step toward convenient healthcare support. Book an online consultation with Zymika Health and speak with a GP from the comfort of your home.
            </p>
            <p class="text-white-50 small mb-4 mx-auto" style="max-width: 650px;">
                Zymika Health provides convenient telehealth consultations for patients seeking reliable online medical support, guidance, and patient centred care from home.
            </p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="#booking" class="btn btn-lg btn-brand-primary px-4 px-md-5 py-3 shadow fw-bold rounded-pill">
                    Book Telehealth Appointment
                </a>
                <a href="#" class="btn btn-lg btn-outline-light px-4 px-md-5 py-3 fw-bold rounded-pill">
                    <i class="bi bi-telephone-fill me-1"></i> Call Us
                </a>
            </div>
        </div>
    </div>
</section>
@endsection