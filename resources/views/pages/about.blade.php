@extends('layouts.app')

@section('title', 'About Us - Zymika Health | Quality Healthcare, Right At Your Doorstep')

@section('content')
<!-- Page Header / Breadcrumb -->
<section class="py-5 text-white position-relative" style="background: linear-gradient(135deg, #0f2d59 0%, #163868 60%, #0a2142 100%);">
    <div class="container py-3" style="max-width: 1200px;">
        <div class="row align-items-center">
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-2 text-white-50 small">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">About Us</li>
                    </ol>
                </nav>
                <h1 class="display-5 fw-bold text-white mb-0">About Us</h1>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <a href="{{ route('booking.index') }}" class="btn px-4 py-2 rounded-pill fw-semibold text-white shadow-sm" style="background-color: #3aa3a2;">
                    Book Appointment
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Doctor Quote Highlight Section -->
<section class="py-5 bg-white border-bottom">
    <div class="container" style="max-width: 1140px;">
        <div class="row align-items-center g-4">
            <div class="col-lg-3 text-center" data-aos="fade-right">
                <img src="{{ asset('images/doctor-bazel.png') }}" alt="Dr Bazel Lodhi" class="img-fluid rounded-4 shadow-sm" style="max-height: 240px; object-fit: cover;">
            </div>
            <div class="col-lg-9" data-aos="fade-left">
                <h3 class="fw-bold text-brand-contrast mb-1">Dr Bazel Lodhi</h3>
                <div class="text-brand-primary fw-semibold small mb-3">General Practitioner</div>
                <blockquote class="fs-5 text-brand-contrast fst-italic lh-base mb-0 border-start border-4 ps-3" style="border-color: #3aa3a2 !important;">
                    “Committed to providing accessible, high-quality and patient-centred healthcare through convenient telehealth consultations.”
                </blockquote>
            </div>
        </div>
    </div>
</section>

<!-- WHO WE ARE Section -->
<section class="py-5" style="background-color: #f7fbfc;">
    <div class="container py-lg-4" style="max-width: 1200px;">
        <div class="row g-4 g-lg-5 align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(15, 45, 89, 0.08); color: #0f2d59;">
                    WHO WE ARE
                </span>
                <h2 class="display-6 fw-bold text-brand-contrast mb-3">Quality Healthcare, Right At Your Doorstep</h2>
                <p class="text-muted lead fs-6 mb-3 lh-base">
                    Zymika Healthcare helps you access healthcare wherever you are with Telehealth Doctor Australia. We ensure you get the right consultation at your home, whether you need an online GP Australia, a doctor video consultation Australia, or a convenient online medical consultation Australia. You can book a telehealth appointment online within a few clicks and get professional medical advice in the comfort of your home.
                </p>
                <p class="text-muted fs-6 mb-4 lh-base">
                    Our objective is to bring quality care in Australia by delivering exceptional healthcare services right into your home. Our telehealth platform gives reliable, fast, and patient-focused care, providing the medical support you need instantly.
                </p>

                <div class="row g-2 mb-4">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2 fw-semibold text-brand-contrast small">
                            <i class="bi bi-check-circle-fill text-brand-primary fs-5"></i>
                            <span>Online GP consultation</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2 fw-semibold text-brand-contrast small">
                            <i class="bi bi-check-circle-fill text-brand-primary fs-5"></i>
                            <span>Australian-registered doctors</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2 fw-semibold text-brand-contrast small">
                            <i class="bi bi-check-circle-fill text-brand-primary fs-5"></i>
                            <span>Flexible appointment timing</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-2 fw-semibold text-brand-contrast small">
                            <i class="bi bi-check-circle-fill text-brand-primary fs-5"></i>
                            <span>Adult and children’s care</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <img src="{{ asset('images/banner1.jpg') }}" alt="Quality Healthcare Right At Your Doorstep" class="img-fluid rounded-5 shadow-lg" onerror="this.src='{{ asset('images/step1-assessment.jpg') }}'">
            </div>
        </div>
    </div>
</section>

<!-- Our Mission Section -->
<section class="py-5 bg-white">
    <div class="container py-lg-4" style="max-width: 1200px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(58, 163, 162, 0.12); color: #1a9b8c;">
                Our Mission
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-2">Healthcare That You Can Rely On</h2>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 50px; height: 50px; background-color: #0f2d59;">
                        <i class="bi bi-shield-check fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Trusted Medical Services</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Our mission is to provide access to healthcare across Australia regardless of your location or schedule.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 50px; height: 50px; background-color: #3aa3a2;">
                        <i class="bi bi-lock-fill fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Convenient &amp; Secure</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Our secure healthcare platform to easily Book Telehealth Appointment Online.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 50px; height: 50px; background-color: #163868;">
                        <i class="bi bi-clipboard2-pulse fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Evidence-Based Care</h5>
                    <p class="text-muted small mb-0 lh-base">
                        We maintain the highest standards of patient safety and confidentiality, which saves time.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- OUR EXPERT DOCTOR Section -->
<section class="py-5" style="background-color: #f7fbfc;">
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
                <img src="{{ asset('images/doctor-bazel.png') }}" alt="Dr Bazel Lodhi" class="img-fluid rounded-5 shadow-lg" style="max-height: 420px; object-fit: cover;">
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <p class="text-muted lead fs-6 mb-3 lh-base">
                    Dr Bazel Lodhi is a highly experienced General Practitioner with over 25 years of clinical practice across diverse healthcare settings internationally. Currently consulting with Hola Health, he is committed to delivering accessible, high-quality medical care through telehealth to patients across Australia.
                </p>
                <p class="text-muted fs-6 mb-4 lh-base">
                    Holding multiple postgraduate qualifications, including Fellowship of the Australian College of Rural and Remote Medicine (FACRRM) and a Master of Public Health (MPH), Dr Lodhi brings a broad and comprehensive perspective to patient care. His experience spans preventive medicine, procedural skills, and long-term chronic disease management.
                </p>
                <a href="{{ route('booking.index') }}?doctor_id=6" class="btn px-4 py-3 rounded-pill fw-semibold text-white shadow-sm" style="background-color: #0f2d59;">
                    Book Appointment with Dr Lodhi
                </a>
            </div>
        </div>
    </div>
</section>

<!-- HOW IT WORKS Section -->
<section class="py-5 bg-white">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(15, 45, 89, 0.08); color: #0f2d59;">
                HOW IT WORKS
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-2">Simple, Secure, &amp; Quick Telehealth Access</h2>
            <p class="text-muted mx-auto lead fs-6" style="max-width: 680px;">
                With Zymika Health, you can connect with qualified doctors online through a secure and simple process.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <span class="fw-bold fs-3 text-brand-primary mb-3 d-block">01</span>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Book Appointment Online</h4>
                    <p class="text-muted small mb-0 lh-base">
                        Choose a favourable appointment time using our simple online booking system, making it quick and convenient to schedule your visit.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <span class="fw-bold fs-3 text-brand-primary mb-3 d-block">02</span>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Doctor Consultation</h4>
                    <p class="text-muted small mb-0 lh-base">
                        Join a doctor video consultation Australia and discuss your healthcare concerns with an experienced doctor.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <span class="fw-bold fs-3 text-brand-primary mb-3 d-block">03</span>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Medical Support</h4>
                    <p class="text-muted small mb-0 lh-base">
                        Our telehealth doctor Australia services manage your health with convenience and confidence.
                    </p>
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

<!-- Our Services Section -->
<section class="py-5" style="background-color: #f7fbfc;">
    <div class="container py-lg-4" style="max-width: 1200px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(58, 163, 162, 0.12); color: #1a9b8c;">
                Our Services
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-3">Our Online Healthcare Services</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="50">
                <div class="card h-100 border rounded-4 p-4 shadow-sm bg-white">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">General GP Consultations</h5>
                    <p class="text-muted small mb-3 lh-base">
                        Have a conversation with an online GP Australia for everyday illness, follow-up appointments, health concerns, medical advice, and preventive healthcare.
                    </p>
                    <a href="{{ route('services.gp') }}" class="mt-auto fw-semibold small text-decoration-none" style="color: #3aa3a2;">Read More →</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 border rounded-4 p-4 shadow-sm bg-white">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Medical Certificates</h5>
                    <p class="text-muted small mb-3 lh-base">
                        Do you need a Doctor’s Certificate for Work/Uni? Where clinically appropriate, Zymkia Health can issue you a same day medical certificate online following your consultation.
                    </p>
                    <a href="{{ route('services.prescriptions') }}" class="mt-auto fw-semibold small text-decoration-none" style="color: #3aa3a2;">Read More →</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
                <div class="card h-100 border rounded-4 p-4 shadow-sm bg-white">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Online Prescriptions</h5>
                    <p class="text-muted small mb-3 lh-base">
                        Receive a repeat or now clinically appropriate telehealth prescription service after an assessment with one of the specialised Australian doctors.
                    </p>
                    <a href="{{ route('services.prescriptions') }}" class="mt-auto fw-semibold small text-decoration-none" style="color: #3aa3a2;">Read More →</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="card h-100 border rounded-4 p-4 shadow-sm bg-white">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Medicinal Cannabis Consultations</h5>
                    <p class="text-muted small mb-3 lh-base">
                        In accordance with Australian prescribing guidelines, we offer eligible patients medicinal cannabis consultations through qualified, authorised prescribers.
                    </p>
                    <a href="{{ route('services.cannabis') }}" class="mt-auto fw-semibold small text-decoration-none" style="color: #3aa3a2;">Read More →</a>
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
