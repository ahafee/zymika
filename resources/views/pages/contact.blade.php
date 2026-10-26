@extends('layouts.app')

@section('title', 'Contact Us - Zymika Health | Have a Question? Get in Touch')

@section('content')
<!-- Page Header -->
<section class="py-5 text-white position-relative" style="background: linear-gradient(135deg, #0f2d59 0%, #163868 60%, #0a2142 100%);">
    <div class="container py-3" style="max-width: 1200px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2 text-white-50 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">Contact Us</li>
            </ol>
        </nav>
        <h1 class="display-5 fw-bold text-white mb-2">Contact Zymika Health</h1>
        <p class="lead text-white text-opacity-90 fs-6 mb-0" style="max-width: 680px;">
            Have a Question? Get in Touch. Whether you have a general enquiry, need assistance with your appointment, or would like more information about our telehealth services, send us a message and our team will get back to you.
        </p>
    </div>
</section>

<!-- Contact Form & Info Cards Section -->
<section class="py-5 bg-white">
    <div class="container py-lg-4" style="max-width: 1200px;">
        <div class="row g-4 g-lg-5">
            <!-- Contact Info Cards -->
            <div class="col-lg-5" data-aos="fade-right">
                <div class="d-flex flex-column gap-3 mb-4">
                    <div class="p-4 rounded-4 border bg-light">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 48px; height: 48px; background-color: #3aa3a2;">
                                <i class="bi bi-envelope-fill fs-5"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-brand-contrast mb-1">Email</h6>
                                <a href="mailto:info@zymikahealth.com.au" class="text-decoration-none fw-semibold" style="color: #3aa3a2;">info@zymikahealth.com.au</a>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 rounded-4 border bg-light">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 48px; height: 48px; background-color: #0f2d59;">
                                <i class="bi bi-telephone-fill fs-5"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-brand-contrast mb-1">Phone Number</h6>
                                <div class="d-flex flex-column">
                                    <a href="tel:0395469477" class="text-decoration-none text-brand-contrast fw-semibold small">(03) 9546 9477</a>
                                    <a href="tel:0411174173" class="text-decoration-none fw-semibold small" style="color: #3aa3a2;">0411174173</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 rounded-4 border bg-light">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 48px; height: 48px; background-color: #163868;">
                                <i class="bi bi-geo-alt-fill fs-5"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-brand-contrast mb-1">Location</h6>
                                <p class="small mb-1">
                                    <a href="https://maps.google.com/?q=1098+Heatherton+Rd+Noble+Park+VIC+3174" target="_blank" rel="noopener noreferrer" class="text-muted text-decoration-none hover-primary">
                                        <i class="bi bi-geo-alt text-brand-primary me-1"></i>1098 Heatherton Rd, Noble Park VIC 3174
                                    </a>
                                </p>
                                <p class="small mb-0">
                                    <a href="https://maps.google.com/?q=Berwick+VIC+3806+Australia" target="_blank" rel="noopener noreferrer" class="text-muted text-decoration-none hover-primary">
                                        <i class="bi bi-geo-alt text-brand-primary me-1"></i>Berwick, VIC 3806
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Assistance Card -->
                <div class="p-4 rounded-4 bg-white border shadow-sm">
                    <span class="badge px-3 py-1 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(15, 45, 89, 0.08); color: #0f2d59; font-size: 0.75rem;">
                        QUICK ASSISTANCE
                    </span>
                    <h5 class="fw-bold text-brand-contrast mb-3">How Can We Help?</h5>
                    <ul class="list-unstyled d-flex flex-column gap-3 mb-0">
                        <li>
                            <a href="{{ route('booking.index') }}" class="fw-bold text-brand-contrast text-decoration-none d-block">Book an Appointment</a>
                            <small class="text-muted">Ready to speak with an online doctor? Choose a convenient appointment time.</small>
                        </li>
                        <li>
                            <a href="{{ route('how-it-works') }}" class="fw-bold text-brand-contrast text-decoration-none d-block">How It Works</a>
                            <small class="text-muted">Learn how Zymika Health online consultations work from booking to consultation.</small>
                        </li>
                        <li>
                            <a href="{{ route('services') }}" class="fw-bold text-brand-contrast text-decoration-none d-block">Explore Our Services</a>
                            <small class="text-muted">Find the online healthcare service suitable for your needs.</small>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-7" data-aos="fade-left">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="card-header border-0 py-3 px-4 text-white" style="background-color: #0f2d59;">
                        <h5 class="mb-0 fw-semibold fs-5"><i class="bi bi-envelope-check me-2 text-brand-primary"></i> Send Us a Message</h5>
                    </div>
                    <div class="card-body p-4 p-md-5 bg-white">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-brand-contrast small mb-1">Your Name *</label>
                                    <input type="text" name="name" required class="form-control form-control-lg fs-6 rounded-3" placeholder="Enter your full name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-brand-contrast small mb-1">Your Email *</label>
                                    <input type="email" name="email" required class="form-control form-control-lg fs-6 rounded-3" placeholder="name@example.com">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold text-brand-contrast small mb-1">Subject *</label>
                                    <input type="text" name="subject" required class="form-control form-control-lg fs-6 rounded-3" placeholder="How can we help you?">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold text-brand-contrast small mb-1">Your Message</label>
                                    <textarea name="message" rows="4" class="form-control fs-6 rounded-3" placeholder="Write your message here..."></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="privacyConsent" required checked>
                                        <label class="form-check-label small text-muted" for="privacyConsent">
                                            I agree to the <a href="{{ route('home') }}#privacy" class="text-decoration-underline text-brand-primary">Privacy Policy</a> and consent to being contacted regarding my enquiry.
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-lg w-100 py-3 rounded-pill fw-semibold text-white shadow-sm d-flex align-items-center justify-content-center gap-2" style="background-color: #0f2d59;">
                                        <span>Send Message</span>
                                        <i class="bi bi-send-fill"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
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
