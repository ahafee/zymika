@extends('layouts.app')

@section('title', 'Doctors - Find a Specialist | Zymika Health Telehealth Australia')

@section('content')
<!-- Page Header -->
<section class="py-5 text-white position-relative" style="background: linear-gradient(135deg, #0f2d59 0%, #163868 60%, #0a2142 100%);">
    <div class="container py-3" style="max-width: 1200px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2 text-white-50 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">Doctors</li>
            </ol>
        </nav>
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div>
                <h1 class="display-5 fw-bold text-white mb-2">Doctors - Find a specialist</h1>
                <p class="lead text-white text-opacity-90 fs-6 mb-0">
                    View available doctors and start a booking with a clean patient intake workflow.
                </p>
            </div>
            <div>
                <span class="badge bg-white text-brand-contrast px-3 py-2 rounded-pill fw-semibold shadow-sm">
                    <span class="text-success me-1">●</span> 1 Doctors Live Slots
                </span>
            </div>
        </div>
    </div>
</section>

<!-- Doctor Listing Section -->
<section class="py-5 bg-white">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="row justify-content-center">
            <div class="col-lg-10" data-aos="fade-up">
                <div class="card border rounded-4 shadow-sm overflow-hidden p-4 p-md-5">
                    <div class="row align-items-center g-4">
                        <div class="col-md-4 text-center">
                            <div class="position-relative d-inline-block">
                                <img src="{{ asset('images/doctor-suneetha.jpg') }}" alt="Dr Bazel Lodhi" class="img-fluid rounded-4 shadow-sm" style="max-height: 280px; width: 100%; object-fit: cover;">
                                <div class="position-absolute top-0 start-0 m-2 badge bg-success text-white px-2 py-1 rounded-pill small">
                                    Available Online
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span class="badge rounded-circle bg-light text-brand-contrast border fw-bold d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">D</span>
                                <span class="badge bg-light text-brand-primary border px-3 py-1 rounded-pill small fw-semibold">General Practitioner</span>
                            </div>
                            <h2 class="h3 fw-bold text-brand-contrast mb-1">Dr Bazel Lodhi</h2>
                            <p class="text-brand-primary fw-semibold small mb-3">
                                FACRRM, MPH, MBBS, EMC, RPSGT • 25+ Years of Experience
                            </p>
                            <p class="text-muted small lh-base mb-3">
                                Dr Bazel Lodhi is a highly experienced General Practitioner with over 25 years of clinical practice across diverse healthcare settings internationally. Currently consulting with Hola Health, he is committed to delivering accessible, high-quality medical care through telehealth to patients across Australia.
                            </p>
                            <p class="text-muted small lh-base mb-4">
                                Holding multiple postgraduate qualifications, including Fellowship of the Australian College of Rural and Remote Medicine (FACRRM) and a Master of Public Health (MPH), Dr Lodhi brings a broad and comprehensive perspective to patient care. His experience spans preventive medicine, procedural skills, and long-term chronic disease management.
                            </p>
                            <div class="d-flex flex-wrap align-items-center gap-3">
                                <a href="{{ route('booking.index') }}?doctor_id=6" class="btn px-4 py-2 rounded-pill fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" style="background-color: #0f2d59;">
                                    <span>Book Appointment</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                                <a href="tel:0411174173" class="btn btn-outline-secondary px-4 py-2 rounded-pill fw-semibold small">
                                    <i class="bi bi-telephone-fill me-1"></i> Call 0411174173
                                </a>
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
