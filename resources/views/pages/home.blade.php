@extends('layouts.app')

@section('title', 'Zymika Health | 24/7 Quality Healthcare Wherever You Are | Telehealth Australia')

@section('content')
<!-- Hero Section (Matches Reference 100%) -->
<section class="position-relative overflow-hidden py-5" style="background: linear-gradient(135deg, #f0fafb 0%, #e7f9fb 45%, #f4fbfc 100%); min-height: 85vh; display: flex; align-items: center;">
    <div class="container py-lg-4" style="max-width: 1320px;">
        <div class="row align-items-center g-4 g-lg-5">
            <!-- Left Text Content -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="text-uppercase fw-bold mb-2 tracking-wider small" style="color: #3aa3a2; letter-spacing: 0.1em; font-size: 0.85rem;">
                    TELEHEALTH DOCTOR AUSTRALIA
                </div>
                <h1 class="display-4 fw-extrabold text-brand-contrast mb-3 lh-sm" style="font-size: calc(2rem + 1.8vw);">
                    24/7 Quality Healthcare Wherever You Are
                </h1>
                <p class="lead text-muted mb-4 fs-6" style="line-height: 1.7; max-width: 580px;">
                    Connect with qualified Australian doctors from the comfort of your home. Get secure online consultations, prescriptions, medical certificates, referrals and ongoing healthcare support.
                </p>

                <!-- Bullet Points Grid (2 Columns) -->
                <div class="row g-2 mb-4 pb-2" style="max-width: 540px;">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2 text-brand-contrast fw-medium small">
                            <i class="bi bi-arrow-right text-brand-primary"></i>
                            <a href="{{ route('services.gp') }}" class="text-decoration-none text-brand-contrast hover-primary">General GP Consultations</a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2 text-brand-contrast fw-medium small">
                            <i class="bi bi-arrow-right text-brand-primary"></i>
                            <a href="{{ route('services.urgent-care') }}" class="text-decoration-none text-brand-contrast hover-primary">Urgent &amp; After Hours Care</a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2 text-brand-contrast fw-medium small">
                            <i class="bi bi-arrow-right text-brand-primary"></i>
                            <a href="{{ route('services.mental-health') }}" class="text-decoration-none text-brand-contrast hover-primary">Mental Health &amp; Wellbeing</a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2 text-brand-contrast fw-medium small">
                            <i class="bi bi-arrow-right text-brand-primary"></i>
                            <a href="{{ route('services.prescriptions') }}" class="text-decoration-none text-brand-contrast hover-primary">Online Prescriptions</a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2 text-brand-contrast fw-medium small">
                            <i class="bi bi-arrow-right text-brand-primary"></i>
                            <a href="{{ route('services.compounding') }}" class="text-decoration-none text-brand-contrast hover-primary">Health Cannabis Compounding</a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2 text-brand-contrast fw-medium small">
                            <i class="bi bi-arrow-right text-brand-primary"></i>
                            <a href="{{ route('services.gp') }}" class="text-decoration-none text-brand-contrast hover-primary">Chronic Disease Support</a>
                        </div>
                    </div>
                </div>

                <!-- Action CTAs -->
                <div class="d-flex flex-wrap align-items-center gap-3">
                    <a href="{{ route('booking.index') }}" class="btn px-4 py-3 rounded-pill fw-semibold shadow text-white d-inline-flex align-items-center gap-2" style="background-color: #0f2d59; font-size: 1rem; transition: transform 0.25s ease;">
                        <span>Book Appointment</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                    <a href="tel:0411174173" class="btn px-4 py-3 rounded-pill fw-semibold d-inline-flex align-items-center gap-2 text-brand-contrast bg-white border shadow-sm">
                        <i class="bi bi-telephone-fill text-brand-primary"></i>
                        <span>Call Us</span>
                    </a>
                </div>
            </div>

            <!-- Right Hero Image Graphic -->
            <div class="col-lg-6 text-center position-relative" data-aos="fade-left">
                <div class="position-relative d-inline-block p-2">
                    <div class="position-absolute top-50 start-50 translate-middle rounded-circle" style="width: 440px; height: 440px; background: radial-gradient(circle, rgba(58, 163, 162, 0.2) 0%, transparent 70%); z-index: 0;"></div>
                    <img src="{{ asset('images/hero-telehealth.jpg') }}" alt="Telehealth Doctor Video Consultation Australia" class="img-fluid rounded-5 shadow-lg position-relative" style="max-height: 480px; width: 100%; object-fit: cover; z-index: 1;" onerror="this.src='{{ asset('images/doctor-suneetha.jpg') }}'">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Trust Metrics Bar -->
<section class="py-3 text-white" style="background-color: #0f2d59;">
    <div class="container" style="max-width: 1320px;">
        <div class="row g-3 text-center align-items-center justify-content-center">
            <div class="col-6 col-md-3 border-end border-white border-opacity-10 py-2">
                <div class="fw-bold fs-6">40,000+ Consultations</div>
            </div>
            <div class="col-6 col-md-3 border-end border-white border-opacity-10 py-2">
                <div class="fw-bold fs-6">Australian Registered Doctors</div>
            </div>
            <div class="col-6 col-md-3 border-end border-white border-opacity-10 py-2">
                <div class="fw-bold fs-6">Secure &amp; Confidential Care</div>
            </div>
            <div class="col-6 col-md-3 py-2">
                <div class="fw-bold fs-6">Same Day Availability</div>
            </div>
        </div>
    </div>
</section>

<!-- Doctor Quote & 25+ Years Experience Section -->
<section class="py-5 bg-white">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="row align-items-center g-4 g-lg-5">
            <div class="col-lg-4 text-center" data-aos="fade-right">
                <div class="position-relative d-inline-block">
                    <img src="{{ asset('images/doctor-suneetha.jpg') }}" alt="Dr Bazel Lodhi General Practitioner" class="img-fluid rounded-4 shadow-md" style="max-height: 320px; object-fit: cover;">
                    <div class="position-absolute bottom-0 start-50 translate-middle-x mb-n2 bg-white px-3 py-1 rounded-pill shadow-sm border small fw-bold text-brand-primary text-nowrap">
                        25+ Years of Experience In Healthcare Service
                    </div>
                </div>
            </div>
            <div class="col-lg-8" data-aos="fade-left">
                <div class="ps-lg-3">
                    <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2" style="background-color: rgba(58, 163, 162, 0.12); color: #1a9b8c;">
                        CLINICAL EXCELLENCE
                    </span>
                    <h3 class="display-6 fw-bold text-brand-contrast mb-1">Dr Bazel Lodhi</h3>
                    <h5 class="fw-semibold text-muted mb-3">General Practitioner</h5>
                    <blockquote class="blockquote border-start border-4 ps-3 py-1 my-3" style="border-color: #3aa3a2 !important;">
                        <p class="fs-5 text-brand-contrast fst-italic mb-0">
                            “Committed to providing accessible, high-quality and patient-centred healthcare through convenient telehealth consultations.”
                        </p>
                    </blockquote>
                    <p class="text-muted small lh-base mb-0">
                        Holding multiple postgraduate qualifications, including Fellowship of the Australian College of Rural and Remote Medicine (FACRRM) and a Master of Public Health (MPH), Dr Lodhi brings a broad and comprehensive perspective to patient care.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Us Section -->
<section class="py-5" style="background-color: #f7fbfc;" id="about">
    <div class="container py-lg-4" style="max-width: 1200px;">
        <div class="row g-4 g-lg-5 align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(15, 45, 89, 0.08); color: #0f2d59;">
                    About Us
                </span>
                <h2 class="display-6 fw-bold text-brand-contrast mb-3">Accessible Online Healthcare across Australia</h2>
                <p class="text-muted lead fs-6 mb-4" style="line-height: 1.8;">
                    Healthcare is one of the domains of daily life that should be reliable, accessible, and convenient. At Zymika Health, we help people receive quality medical care from an experienced telehealth doctor Australia, avoiding spending hours travelling or waiting for their number in busy clinics.
                </p>

                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="p-4 bg-white rounded-4 shadow-sm border h-100">
                            <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 48px; height: 48px; background-color: #0f2d59;">
                                <i class="bi bi-person-check fs-5"></i>
                            </div>
                            <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Expert Doctor</h5>
                            <p class="text-muted small mb-0 lh-base">
                                Our secure telehealth platform connects patients seeking GP consultations with experienced Australian doctors, offering personalised healthcare solutions through Virtual GP Appointment Australia.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-4 bg-white rounded-4 shadow-sm border h-100">
                            <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 48px; height: 48px; background-color: #3aa3a2;">
                                <i class="bi bi-laptop fs-5"></i>
                            </div>
                            <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Advanced Technology</h5>
                            <p class="text-muted small mb-0 lh-base">
                                We manage all your medical appointments using advanced technology, offer same-day consultations, provide instant medications, and offer virtual GP appointment Australia.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center" data-aos="fade-left">
                <img src="{{ asset('images/step2-telehealth.jpg') }}" alt="Accessible Online Healthcare across Australia" class="img-fluid rounded-5 shadow-lg" onerror="this.src='{{ asset('images/banner1.jpg') }}'">
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
                    <img src="{{ asset('images/doctor-suneetha.jpg') }}" alt="Dr Bazel Lodhi General Practitioner" class="img-fluid rounded-5 shadow-lg" style="max-height: 420px; object-fit: cover;">
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

<!-- Our Satisfied Patients Section -->
<section class="py-5 bg-white">
    <div class="container py-lg-4" style="max-width: 1200px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(58, 163, 162, 0.12); color: #1a9b8c;">
                Our Satisfied Patients
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-2">What Our Patients Say about Zymika Health?</h2>
            <p class="text-muted mx-auto lead fs-6" style="max-width: 680px;">
                Discover why patients across Australia trust Zymika Health for convenient and 24/7 Telehealth Australia services.
            </p>
        </div>

        <!-- Featured Doctor Review -->
        <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 mb-4 text-center" style="background: linear-gradient(135deg, #f0fafb 0%, #e7f9fb 100%);" data-aos="fade-up">
            <div class="text-warning fs-5 mb-3">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            </div>
            <p class="fs-5 text-brand-contrast fst-italic mb-3 mx-auto" style="max-width: 840px; line-height: 1.8;">
                “Dr Bazel Lodhi provided exceptional care and made me feel comfortable throughout my consultation. His professional approach, clear communication, and genuine concern for my health were outstanding. I appreciate the time he took to understand my needs and provide personalised advice.”
            </p>
            <div class="fw-bold text-brand-contrast">Patient Review</div>
        </div>

        <!-- 3 Patient Testimonial Cards -->
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="50">
                <div class="card h-100 border rounded-4 p-4 shadow-sm">
                    <div class="text-warning small mb-2"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                    <p class="text-muted small fst-italic mb-3 lh-base">
                        “Zymika Health made getting medical advice so much easier. I was able to connect with a healthcare professional from home without the stress of waiting rooms. Highly recommended.”
                    </p>
                    <div class="mt-auto pt-2 border-top">
                        <div class="fw-bold text-brand-contrast small">David R.</div>
                        <small class="text-muted">Patient</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 border rounded-4 p-4 shadow-sm">
                    <div class="text-warning small mb-2"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                    <p class="text-muted small fst-italic mb-3 lh-base">
                        “The convenience of online consultations has completely changed how my family manages healthcare. Zymika Health is actually the best.”
                    </p>
                    <div class="mt-auto pt-2 border-top">
                        <div class="fw-bold text-brand-contrast small">Emily K.</div>
                        <small class="text-muted">Patient</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                <div class="card h-100 border rounded-4 p-4 shadow-sm">
                    <div class="text-warning small mb-2"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                    <p class="text-muted small fst-italic mb-3 lh-base">
                        “I appreciate how easy it is to book appointments and receive quality care through Zymika Health. Amazing platform. I am glad that now my health is in good hands.”
                    </p>
                    <div class="mt-auto pt-2 border-top">
                        <div class="fw-bold text-brand-contrast small">John G.</div>
                        <small class="text-muted">Patient’s Parent</small>
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
