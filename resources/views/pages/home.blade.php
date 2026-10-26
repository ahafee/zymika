@extends('layouts.app')

@section('title', 'Zymika Health | 24/7 Quality Healthcare Wherever You Are | Telehealth Australia')

@section('content')
<!-- Hero Section (NewDoc Style Reference - 100% No Inline CSS) -->
<section class="newdoc-hero-section">
    <div class="container newdoc-hero-container">
        <div class="row align-items-center g-4 g-lg-5">
            <!-- Left Text Content -->
            <div class="col-lg-6" data-aos="fade-right">
                
                <!-- Doctor Avatar Badge -->
                <div class="newdoc-avatar-badge">
                    <div class="newdoc-avatar-group">
                        <img src="{{ asset('images/doctor-bazel.png') }}" class="newdoc-avatar-img" alt="Dr Bazel Lodhi">
                        <img src="{{ asset('images/step2-telehealth.jpg') }}" class="newdoc-avatar-img" alt="Specialist GP">
                    </div>
                    <span class="newdoc-avatar-text">Australian-trained, specialist GPs</span>
                </div>

                <!-- Main Heading -->
                <h1 class="newdoc-hero-title">
                    Bulk Billed*<br>
                    Telehealth Consults
                </h1>

                <!-- Book A Consult Button (Opens Multi-Step Modal) -->
                <div>
                    <button type="button" class="newdoc-consult-btn" data-bs-toggle="modal" data-bs-target="#consultBookingModal">
                        <span>Book a consult</span>
                        <i class="bi bi-arrow-right btn-arrow-icon"></i>
                    </button>
                </div>

                <!-- Call Support Link -->
                <div class="newdoc-call-text">
                    Or call <a href="tel:0411174173">0411 174 173</a> to learn more
                </div>

                <!-- 2-Column Features Checklist -->
                <div class="newdoc-check-grid">
                    <div class="newdoc-check-item">
                        <span class="newdoc-check-icon">✓</span>
                        <span>Bulk billed telehealth</span>
                    </div>
                    <div class="newdoc-check-item">
                        <span class="newdoc-check-icon">✓</span>
                        <span>Mental health</span>
                    </div>
                    <div class="newdoc-check-item">
                        <span class="newdoc-check-icon">✓</span>
                        <span>Repeat scripts</span>
                    </div>
                    <div class="newdoc-check-item">
                        <span class="newdoc-check-icon">✓</span>
                        <span>Medical certificates</span>
                    </div>
                    <div class="newdoc-check-item">
                        <span class="newdoc-check-icon">✓</span>
                        <span>Sexual health</span>
                    </div>
                    <div class="newdoc-check-item">
                        <span class="newdoc-check-icon">✓</span>
                        <span>Specialist referrals</span>
                    </div>
                    <div class="newdoc-check-item">
                        <span class="newdoc-check-icon">✓</span>
                        <span>Blood test referrals</span>
                    </div>
                    <div class="newdoc-check-item">
                        <span class="newdoc-check-icon">✓</span>
                        <span>Imaging referrals</span>
                    </div>
                </div>

                <span class="newdoc-check-disclaimer">* If eligible under Medicare</span>
            </div>

            <!-- Right Hero Image Graphic with Layered Cards -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="newdoc-cards-stage">
                    <!-- Back Card: Doctor -->
                    <div class="newdoc-card-back">
                        <img src="{{ asset('images/doctor-bazel.png') }}" alt="Dr Bazel Lodhi Specialist General Practitioner">
                    </div>

                    <!-- Front Card: Patient with Speech Bubble -->
                    <div class="newdoc-card-front">
                        <div class="newdoc-card-front-inner">
                            <img src="{{ asset('images/hero-telehealth.jpg') }}" alt="Telehealth Consultation">
                        </div>
                        <div class="newdoc-speech-bubble">
                            <i class="bi bi-chat-square-quote-fill bubble-icon"></i>
                            <span>I'd like to renew my prescription!</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Trust Metrics Bar -->
<section class="newdoc-trust-strip">
    <div class="container newdoc-trust-container">
        <div class="newdoc-trust-item">
            <span>Specialist GPs</span>
        </div>
        <div class="newdoc-trust-item">
            <span class="star-icon">☆</span>
            <span>40,000+ consults</span>
        </div>
        <div class="newdoc-trust-item">
            <span class="star-icon">☆</span>
            <span>Same day availability</span>
        </div>
    </div>
</section>

<!-- Doctor Quote & 25+ Years Experience Section -->
<section class="py-5 bg-white">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="row align-items-center g-4 g-lg-5">
            <div class="col-lg-4 text-center" data-aos="fade-right">
                <div class="position-relative d-inline-block">
                    <img src="{{ asset('images/doctor-bazel.png') }}" alt="Dr Bazel Lodhi General Practitioner" class="img-fluid rounded-4 shadow-md" style="max-height: 320px; object-fit: cover;">
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
