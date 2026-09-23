@extends('layouts.app')

@section('title', 'About Us - Zovi Health Pty Ltd / ZOVI LEAF')

@section('content')
<div class="py-5 bg-brand-light border-bottom" data-aos="fade-down">
    <div class="container text-center">
        <span class="badge badge-tga mb-2">Our Clinical Story</span>
        <h1 class="display-5 fw-bold text-brand-contrast">About ZOVI LEAF & Zovi Health</h1>
        <p class="lead text-muted max-w-700 mx-auto">Reimagining natural healthcare and plant-based therapeutics through compassionate telehealth and clinical excellence.</p>
    </div>
</div>

<div class="container py-5">
    <div class="row g-5 align-items-center mb-5">
        <div class="col-lg-6" data-aos="fade-right">
            <span class="text-brand-primary fw-bold text-uppercase small" style="letter-spacing: 1px;">Our Mission</span>
            <h2 class="fw-bold text-brand-contrast mb-3">Empowering Australian Patients with Evidence-Based Care</h2>
            <p class="text-muted">
                <strong>Zovi Health Pty Ltd (ZOVI LEAF)</strong> was founded with a singular purpose: to remove the friction, stigma, and confusion surrounding medicinal cannabis treatment in Australia.
            </p>
            <p class="text-muted">
                Headquartered at <strong>Level 1, 63-73 Ann street, Surry Hills NSW 2010</strong>, our clinic combines secure telehealth technology with rigorous Australian medical standards. We integrate directly with <strong>MediRecords EHR</strong> to ensure seamless continuity of care, automated electronic script transmission, and transparent patient communication.
            </p>
            <div class="p-3 bg-brand-sage-light rounded-3 border">
                <h6 class="fw-bold text-brand-contrast mb-1"><i class="bi bi-patch-check-fill text-brand-sage me-2"></i> TGA Compliance First</h6>
                <p class="small text-muted mb-0">Every treatment protocol strictly follows the Therapeutic Goods Administration (TGA) Authorised Prescriber and Special Access Scheme (SAS-B) guidelines.</p>
            </div>
        </div>

        <div class="col-lg-6" data-aos="fade-left" data-aos-delay="150">
            <div class="card card-zovi p-4 bg-white shadow-sm">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="bg-brand-primary text-white p-3 rounded-circle">
                        <i class="bi bi-person-fill fs-2"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold text-brand-contrast mb-0">Dr. Suneetha Batthala</h4>
                        <span class="text-brand-primary fw-semibold small">Lead Prescribing Medical Practitioner</span>
                    </div>
                </div>
                <p class="small text-muted">
                    Dr. Suneetha Batthala (AHPRA: MED0001928472) has dedicated her clinical career to holistic patient wellness and chronic symptom management. As an Authorised Prescriber of medicinal cannabis, Dr. Batthala evaluates each patient's individual history, concurrent medications, and therapeutic goals before creating a tailored cannabinoid titration regimen.
                </p>
                <div class="border-top pt-3 small text-muted">
                    <div class="row g-2">
                        <div class="col-6"><strong>Provider Number:</strong> 2938472B</div>
                        <div class="col-6"><strong>Location:</strong> Surry Hills NSW</div>
                        <div class="col-6"><strong>Consultation Mode:</strong> Video / Phone</div>
                        <div class="col-6"><strong>Phone:</strong> 02 5838 5365</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Values Grid -->
    <div class="row g-4 text-center mt-4">
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card card-zovi h-100 p-4 border">
                <i class="bi bi-heart-pulse-fill text-brand-primary fs-1 mb-3"></i>
                <h5 class="fw-bold text-brand-contrast">Patient-First Empathy</h5>
                <p class="small text-muted mb-0">We understand that patients arriving at our clinic often have endured months or years of untreated pain, anxiety, and sleeplessness.</p>
            </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card card-zovi h-100 p-4 border">
                <i class="bi bi-shield-check text-brand-sage fs-1 mb-3"></i>
                <h5 class="fw-bold text-brand-contrast">Clinical Rigor</h5>
                <p class="small text-muted mb-0">All formulations are sourced from GMP-certified Australian licensed compounding facilities meeting strict TGA quality and purity standards.</p>
            </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
            <div class="card card-zovi h-100 p-4 border">
                <i class="bi bi-lightning-charge-fill text-brand-primary fs-1 mb-3"></i>
                <h5 class="fw-bold text-brand-contrast">Seamless Telehealth</h5>
                <p class="small text-muted mb-0">No waiting rooms. Access expert healthcare from Sydney, Melbourne, Brisbane, regional towns, or anywhere in Australia.</p>
            </div>
        </div>
    </div>
</div>
@endsection