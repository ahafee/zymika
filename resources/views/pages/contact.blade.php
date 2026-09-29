@extends('layouts.app')

@section('title', 'Patient FAQs & Contact Us - ZOVI LEAF Australia')

@section('content')
<!-- Header Banner -->
<div class="py-5 bg-brand-light border-bottom" data-aos="fade-down">
    <div class="container text-center">
        <span class="badge badge-tga mb-2">Patient Support & Help Desk</span>
        <h1 class="display-5 fw-bold text-brand-contrast">Frequently Asked Questions & Contact</h1>
        <p class="lead text-muted max-w-700 mx-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.</p>
    </div>
</div>

<div class="container py-5">
    <!-- FAQs Section -->
    <div class="mb-5 pb-4 border-bottom">
        <div class="text-center max-w-700 mx-auto mb-4" data-aos="fade-up">
            <span class="badge bg-brand-primary-light text-brand-primary mb-2">QUICK ANSWERS</span>
            <h3 class="fw-bold text-brand-contrast">Common Patient Questions</h3>
            <p class="text-muted small">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.</p>
        </div>

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-10">
                <div class="accordion" id="faqAccordion">
                    <!-- FAQ 1 -->
                    <div class="accordion-item mb-3 border rounded-3 shadow-xs overflow-hidden">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-bold text-brand-contrast" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                <i class="bi bi-shield-check text-brand-primary me-2 fs-5"></i> Is medicinal cannabis legal in Australia?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted small lh-lg">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="accordion-item mb-3 border rounded-3 shadow-xs overflow-hidden">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold text-brand-contrast" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                <i class="bi bi-ui-checks text-brand-sage me-2 fs-5"></i> Who qualifies for a prescription under TGA guidelines?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted small lh-lg">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="accordion-item mb-3 border rounded-3 shadow-xs overflow-hidden">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold text-brand-contrast" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                <i class="bi bi-car-front-fill text-brand-primary me-2 fs-5"></i> Can I drive while being prescribed medicinal cannabis?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted small lh-lg">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="accordion-item mb-3 border rounded-3 shadow-xs overflow-hidden">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold text-brand-contrast" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                <i class="bi bi-repeat text-brand-sage me-2 fs-5"></i> How do repeats and repeat dispensing work?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted small lh-lg">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 5 -->
                    <div class="accordion-item mb-3 border rounded-3 shadow-xs overflow-hidden">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold text-brand-contrast" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                <i class="bi bi-truck text-brand-primary me-2 fs-5"></i> How are medications shipped and packaged?
                            </button>
                        </h2>
                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted small lh-lg">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact & Direct Assistance Section -->
    <div class="row g-5 align-items-start">
        <div class="col-lg-5" data-aos="fade-right">
            <div class="card card-zovi p-4 border bg-white mb-4 shadow-sm">
                <h4 class="fw-bold text-brand-contrast mb-3"><i class="bi bi-building text-brand-primary me-2"></i> Clinic Information</h4>
                
                <div class="d-flex gap-3 mb-3">
                    <i class="bi bi-geo-alt-fill text-brand-primary fs-4 mt-1"></i>
                    <div>
                        <strong>Physical Clinic Address</strong>
                        <p class="text-muted small mb-0">{{ $clinicInfo['address'] }}</p>
                    </div>
                </div>

                <div class="d-flex gap-3 mb-3">
                    <i class="bi bi-telephone-fill text-brand-primary fs-4 mt-1"></i>
                    <div>
                        <strong>Clinic Phone Hotline</strong>
                        <p class="text-muted small mb-0"><a href="tel:0258385365" class="text-brand-contrast fw-semibold text-decoration-none">{{ $clinicInfo['phone'] }}</a></p>
                    </div>
                </div>

                <div class="d-flex gap-3 mb-3">
                    <i class="bi bi-envelope-fill text-brand-primary fs-4 mt-1"></i>
                    <div>
                        <strong>Patient Support Email</strong>
                        <p class="text-muted small mb-0"><a href="mailto:{{ $clinicInfo['email'] }}" class="text-brand-contrast text-decoration-none">{{ $clinicInfo['email'] }}</a></p>
                    </div>
                </div>

                <div class="d-flex gap-3 mb-3">
                    <i class="bi bi-clock-fill text-brand-primary fs-4 mt-1"></i>
                    <div>
                        <strong>Telehealth Operating Hours</strong>
                        <p class="text-muted small mb-0">{{ $clinicInfo['hours'] }}</p>
                    </div>
                </div>

                <div class="d-flex gap-3">
                    <i class="bi bi-person-fill-check text-brand-primary fs-4 mt-1"></i>
                    <div>
                        <strong>Clinical Lead</strong>
                        <p class="text-muted small mb-0">{{ $clinicInfo['doctor'] }} (AHPRA Authorised Prescriber)</p>
                    </div>
                </div>
            </div>

            <div class="p-3 bg-brand-sage-light rounded-3 border">
                <p class="small text-muted mb-0">
                    <i class="bi bi-info-circle-fill text-brand-sage me-1"></i>
                    <strong>Emergency Note:</strong> If you are experiencing an acute medical emergency, please call <strong>000</strong> or visit your nearest hospital emergency department immediately.
                </p>
            </div>
        </div>

        <div class="col-lg-7" data-aos="fade-left">
            <div class="card card-zovi p-4 p-md-5 border bg-white shadow-sm">
                <h4 class="fw-bold text-brand-contrast mb-1">Send Us a Direct Message</h4>
                <p class="small text-muted mb-4">Have specific clinical, prescription, or delivery questions? Leave a message below and our team will get back to you promptly.</p>

                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">Your Name *</label>
                            <input type="text" name="name" class="form-control" placeholder="Jane Doe" required value="{{ old('name', Auth::user()?->name) }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">Email Address *</label>
                            <input type="email" name="email" class="form-control" placeholder="jane@example.com" required value="{{ old('email', Auth::user()?->email) }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">Phone Number</label>
                            <input type="text" name="phone" class="form-control" placeholder="0412 345 678" value="{{ old('phone', Auth::user()?->phone) }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">Subject *</label>
                            <select name="subject" class="form-select" required>
                                <option value="Eligibility Inquiry">Eligibility Inquiry</option>
                                <option value="Booking Assistance">Booking Assistance</option>
                                <option value="Dispensary & Prescriptions">Dispensary & Prescriptions</option>
                                <option value="MediRecords Integration">MediRecords Integration</option>
                                <option value="General Question">General Question</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold small text-brand-contrast">Message *</label>
                            <textarea name="message" class="form-control" rows="5" placeholder="How can our clinical team assist you today?" required></textarea>
                        </div>

                        <div class="col-12">
                            @include('partials.recaptcha')
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-brand-primary btn-lg w-100 fw-semibold">
                                Send Message <i class="bi bi-send-fill ms-1"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection