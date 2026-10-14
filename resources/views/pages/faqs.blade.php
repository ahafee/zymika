@extends('layouts.app')

@section('title', 'Frequently Asked Questions (FAQs) - ZYMIKA HEALTH')

@section('content')
<div class="py-5 bg-brand-light border-bottom" data-aos="fade-down">
    <div class="container text-center">
        <span class="badge badge-tga mb-2">Help & Education</span>
        <h1 class="display-5 fw-bold text-brand-contrast">Frequently Asked Questions</h1>
        <p class="lead text-muted max-w-700 mx-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.</p>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="accordion" id="faqAccordion">
                
                <h5 class="fw-bold text-brand-contrast mb-3" data-aos="fade-up"><i class="bi bi-shield-fill text-brand-primary me-2"></i> Legality & TGA Regulations</h5>
                
                <div class="accordion-item mb-3 border rounded-3 shadow-sm" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="accordion-header">
                        <button class="accordion-button fw-bold text-brand-contrast" type="button" data-bs-toggle="collapse" data-bs-target="#f1">
                            Is medicinal cannabis legal in Australia?
                        </button>
                    </h2>
                    <div id="f1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted small">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </div>
                    </div>
                </div>

                <div class="accordion-item mb-3 border rounded-3 shadow-sm" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold text-brand-contrast" type="button" data-bs-toggle="collapse" data-bs-target="#f2">
                            Who qualifies for a medicinal cannabis prescription?
                        </button>
                    </h2>
                    <div id="f2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted small">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </div>
                    </div>
                </div>

                <h5 class="fw-bold text-brand-contrast mb-3 mt-4" data-aos="fade-up"><i class="bi bi-car-front-fill text-brand-primary me-2"></i> Driving & Safety Laws</h5>

                <div class="accordion-item mb-3 border rounded-3 shadow-sm" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold text-brand-contrast" type="button" data-bs-toggle="collapse" data-bs-target="#f3">
                            Can I drive while being prescribed medicinal cannabis?
                        </button>
                    </h2>
                    <div id="f3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted small">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </div>
                    </div>
                </div>

                <h5 class="fw-bold text-brand-contrast mb-3 mt-4" data-aos="fade-up"><i class="bi bi-box-seam-fill text-brand-primary me-2"></i> Dispensary, Prescriptions & Delivery</h5>

                <div class="accordion-item mb-3 border rounded-3 shadow-sm" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold text-brand-contrast" type="button" data-bs-toggle="collapse" data-bs-target="#f4">
                            How do repeat prescriptions work?
                        </button>
                    </h2>
                    <div id="f4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted small">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </div>
                    </div>
                </div>

                <div class="accordion-item mb-3 border rounded-3 shadow-sm" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold text-brand-contrast" type="button" data-bs-toggle="collapse" data-bs-target="#f5">
                            How are medications packaged and shipped?
                        </button>
                    </h2>
                    <div id="f5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted small">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection