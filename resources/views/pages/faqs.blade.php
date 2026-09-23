@extends('layouts.app')

@section('title', 'Frequently Asked Questions (FAQs) - ZOVI LEAF')

@section('content')
<div class="py-5 bg-brand-light border-bottom" data-aos="fade-down">
    <div class="container text-center">
        <span class="badge badge-tga mb-2">Help & Education</span>
        <h1 class="display-5 fw-bold text-brand-contrast">Frequently Asked Questions</h1>
        <p class="lead text-muted max-w-700 mx-auto">Everything you need to know about medicinal cannabis, TGA guidelines, telehealth, and delivery in Australia.</p>
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
                            Yes. In Australia, medicinal cannabis is legal under Commonwealth and State legislation when prescribed by an authorised medical practitioner registered with AHPRA. Prescriptions are processed under the Therapeutic Goods Administration (TGA) Authorised Prescriber scheme or Special Access Scheme (SAS-B).
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
                            Under TGA clinical guidelines, patients who have suffered from a chronic condition lasting longer than 3 months, and who have tried first-line conventional medications or therapies without satisfactory relief, may be considered clinically eligible.
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
                            In most Australian states (NSW, QLD, VIC, WA, SA, ACT, NT), it is illegal to drive with any detectable amount of THC in your oral fluid or blood. Even with a valid medical prescription, THC presence is an offence. However, <strong>CBD-only (broad-spectrum or isolate) medications containing 0.0% THC are legal to drive on</strong>, provided you are not impaired. Dr. Batthala can advise on non-THC regimens if daily driving is essential.
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
                            Prescriptions issued by Dr. Batthala typically come with authorized repeats (usually valid for 6 months). You can log into your patient portal at any time and order your next repeat with a single click. When repeats run out, an Express Repeat Review consultation ($39) is booked to renew your approval.
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
                            All orders are dispensed through licensed Australian compounding pharmacies in plain, unbranded, tamper-proof packaging. Deliveries are dispatched nationwide via Australia Post Express with full tracking and mandatory signature upon delivery.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection