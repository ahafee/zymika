@extends('layouts.app')

@section('title', 'Professional Care Services - Zymika Health Telehealth Australia')

@section('content')
<!-- Page Header -->
<section class="py-5 text-white position-relative" style="background: linear-gradient(135deg, #0f2d59 0%, #163868 60%, #0a2142 100%);">
    <div class="container py-3" style="max-width: 1200px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2 text-white-50 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">Services</li>
            </ol>
        </nav>
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div>
                <h1 class="display-5 fw-bold text-white mb-2">Professional care services</h1>
                <p class="lead text-white text-opacity-90 fs-6 mb-0" style="max-width: 720px;">
                    Choose a medical service, review assigned doctors, then continue to a guided booking flow with live availability and secure payments.
                </p>
            </div>
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-white text-brand-contrast px-3 py-2 rounded-pill fw-semibold shadow-sm">
                    6 Active Services
                </span>
                <span class="badge bg-white text-brand-contrast px-3 py-2 rounded-pill fw-semibold shadow-sm">
                    <span class="text-success me-1">●</span> 1 Active Doctors
                </span>
            </div>
        </div>
    </div>
</section>

<!-- Available Services Section -->
<section class="py-5 bg-white">
    <div class="container py-lg-4" style="max-width: 1200px;">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-5" data-aos="fade-up">
            <div>
                <h2 class="h3 fw-bold text-brand-contrast mb-1">Available Services</h2>
                <p class="text-muted small mb-0">Every card is powered by live service records, doctor assignments, pricing and duration settings.</p>
            </div>
            <div>
                <a href="{{ route('booking.index') }}" class="btn px-4 py-2 rounded-pill fw-semibold text-white shadow-sm" style="background-color: #0f2d59;">
                    Book Appointment
                </a>
            </div>
        </div>

        <div class="row g-4">
            <!-- Service 1: GP Online Consultation -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="50">
                <div class="card h-100 border rounded-4 p-4 shadow-sm d-flex flex-column" style="transition: transform 0.25s ease;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge bg-light text-brand-contrast border px-3 py-1 rounded-pill small">Service</span>
                        <span class="badge bg-light text-muted border px-2 py-1 rounded-pill small"><i class="bi bi-clock me-1"></i> 15 min</span>
                    </div>
                    <div class="display-6 fw-bold text-brand-contrast mb-2" style="font-size: 1.75rem; color: #0f2d59;">AUD 65.00</div>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">GP Online Consultation</h4>
                    <p class="text-muted small mb-3">Speak with a doctor online for a 15-minute consultation.</p>
                    <div class="d-flex align-items-center gap-2 mb-4 small text-muted">
                        <span class="badge rounded-circle bg-light text-brand-contrast border fw-bold d-inline-flex align-items-center justify-content-center" style="width: 24px; height: 24px;">D</span>
                        <span>1 doctor available</span>
                    </div>
                    <div class="d-flex gap-2 mt-auto">
                        <a href="{{ route('booking.index') }}?service_id=1" class="btn btn-sm text-white px-3 py-2 rounded-pill fw-semibold flex-grow-1" style="background-color: #0f2d59;">Book Service</a>
                        <a href="{{ route('services.gp') }}" class="btn btn-sm btn-outline-secondary px-3 py-2 rounded-pill fw-semibold">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Service 2: Cardiology Review -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 border rounded-4 p-4 shadow-sm d-flex flex-column" style="transition: transform 0.25s ease;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge bg-light text-brand-contrast border px-3 py-1 rounded-pill small">Service</span>
                        <span class="badge bg-light text-muted border px-2 py-1 rounded-pill small"><i class="bi bi-clock me-1"></i> 20 min</span>
                    </div>
                    <div class="display-6 fw-bold text-brand-contrast mb-2" style="font-size: 1.75rem; color: #0f2d59;">AUD 120.00</div>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Cardiology Review</h4>
                    <p class="text-muted small mb-3">Heart health consultation and follow-up review.</p>
                    <div class="d-flex align-items-center gap-2 mb-4 small text-muted">
                        <i class="bi bi-info-circle text-muted"></i>
                        <span>0 doctors available • No assigned doctors yet</span>
                    </div>
                    <div class="d-flex gap-2 mt-auto">
                        <a href="{{ route('booking.index') }}?service_id=2" class="btn btn-sm text-white px-3 py-2 rounded-pill fw-semibold w-100" style="background-color: #0f2d59;">Book Service</a>
                    </div>
                </div>
            </div>

            <!-- Service 3: Skin Treatment -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="150">
                <div class="card h-100 border rounded-4 p-4 shadow-sm d-flex flex-column" style="transition: transform 0.25s ease;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge bg-light text-brand-contrast border px-3 py-1 rounded-pill small">Service</span>
                        <span class="badge bg-light text-muted border px-2 py-1 rounded-pill small"><i class="bi bi-clock me-1"></i> 15 min</span>
                    </div>
                    <div class="display-6 fw-bold text-brand-contrast mb-2" style="font-size: 1.75rem; color: #0f2d59;">AUD 80.00</div>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Skin Treatment</h4>
                    <p class="text-muted small mb-3">Skin, acne, rash and allergy consultation.</p>
                    <div class="d-flex align-items-center gap-2 mb-4 small text-muted">
                        <i class="bi bi-info-circle text-muted"></i>
                        <span>0 doctors available • No assigned doctors yet</span>
                    </div>
                    <div class="d-flex gap-2 mt-auto">
                        <a href="{{ route('booking.index') }}?service_id=3" class="btn btn-sm text-white px-3 py-2 rounded-pill fw-semibold w-100" style="background-color: #0f2d59;">Book Service</a>
                    </div>
                </div>
            </div>

            <!-- Service 4: Pediatric Consultation -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card h-100 border rounded-4 p-4 shadow-sm d-flex flex-column" style="transition: transform 0.25s ease;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge bg-light text-brand-contrast border px-3 py-1 rounded-pill small">Service</span>
                        <span class="badge bg-light text-muted border px-2 py-1 rounded-pill small"><i class="bi bi-clock me-1"></i> 20 min</span>
                    </div>
                    <div class="display-6 fw-bold text-brand-contrast mb-2" style="font-size: 1.75rem; color: #0f2d59;">AUD 75.00</div>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Pediatric Consultation</h4>
                    <p class="text-muted small mb-3">Child health appointment with pediatric-focused care.</p>
                    <div class="d-flex align-items-center gap-2 mb-4 small text-muted">
                        <span class="badge rounded-circle bg-light text-brand-contrast border fw-bold d-inline-flex align-items-center justify-content-center" style="width: 24px; height: 24px;">D</span>
                        <span>1 doctor available</span>
                    </div>
                    <div class="d-flex gap-2 mt-auto">
                        <a href="{{ route('booking.index') }}?service_id=4" class="btn btn-sm text-white px-3 py-2 rounded-pill fw-semibold w-100" style="background-color: #0f2d59;">Book Service</a>
                    </div>
                </div>
            </div>

            <!-- Service 5: Dental Checkup -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="250">
                <div class="card h-100 border rounded-4 p-4 shadow-sm d-flex flex-column" style="transition: transform 0.25s ease;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge bg-light text-brand-contrast border px-3 py-1 rounded-pill small">Service</span>
                        <span class="badge bg-light text-muted border px-2 py-1 rounded-pill small"><i class="bi bi-clock me-1"></i> 30 min</span>
                    </div>
                    <div class="display-6 fw-bold text-brand-contrast mb-2" style="font-size: 1.75rem; color: #0f2d59;">AUD 95.00</div>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Dental Checkup</h4>
                    <p class="text-muted small mb-3">Dental checkup and care planning appointment.</p>
                    <div class="d-flex align-items-center gap-2 mb-4 small text-muted">
                        <i class="bi bi-info-circle text-muted"></i>
                        <span>0 doctors available • No assigned doctors yet</span>
                    </div>
                    <div class="d-flex gap-2 mt-auto">
                        <a href="{{ route('booking.index') }}?service_id=5" class="btn btn-sm text-white px-3 py-2 rounded-pill fw-semibold w-100" style="background-color: #0f2d59;">Book Service</a>
                    </div>
                </div>
            </div>

            <!-- Service 6: Repeat Prescription -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card h-100 border rounded-4 p-4 shadow-sm d-flex flex-column" style="transition: transform 0.25s ease;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge bg-light text-brand-contrast border px-3 py-1 rounded-pill small">Service</span>
                        <span class="badge bg-light text-muted border px-2 py-1 rounded-pill small"><i class="bi bi-clock me-1"></i> 10 min</span>
                    </div>
                    <div class="display-6 fw-bold text-brand-contrast mb-2" style="font-size: 1.75rem; color: #0f2d59;">AUD 35.00</div>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Repeat Prescription</h4>
                    <p class="text-muted small mb-3">Repeat script request and medication review.</p>
                    <div class="d-flex align-items-center gap-2 mb-4 small text-muted">
                        <span class="badge rounded-circle bg-light text-brand-contrast border fw-bold d-inline-flex align-items-center justify-content-center" style="width: 24px; height: 24px;">D</span>
                        <span>1 doctor available</span>
                    </div>
                    <div class="d-flex gap-2 mt-auto">
                        <a href="{{ route('booking.index') }}?service_id=6" class="btn btn-sm text-white px-3 py-2 rounded-pill fw-semibold flex-grow-1" style="background-color: #0f2d59;">Book Service</a>
                        <a href="{{ route('services.prescriptions') }}" class="btn btn-sm btn-outline-secondary px-3 py-2 rounded-pill fw-semibold">View Details</a>
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
