@extends('layouts.app')

@section('title', 'Clinical Services & Consultation Fees - ZOVI LEAF')

@section('content')
<div class="py-5 bg-brand-light border-bottom" data-aos="fade-down">
    <div class="container text-center">
        <span class="badge badge-tga mb-2">Medical Services</span>
        <h1 class="display-5 fw-bold text-brand-contrast">Clinical Telehealth Services</h1>
        <p class="lead text-muted max-w-700 mx-auto">Specialized plant medicine consultations provided by Dr. Suneetha Batthala from Surry Hills NSW.</p>
    </div>
</div>

<div class="container py-5">
    <div class="row g-4 mb-5">
        @foreach($services as $index => $srv)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 * ($index + 1) }}">
                <div class="card card-zovi h-100 p-4 border {{ $srv->type === 'initial' ? 'card-zovi-featured shadow-sm' : '' }} position-relative">
                    @if($srv->type === 'initial')
                        <div class="badge bg-brand-primary text-white w-fit mb-2"><i class="bi bi-star-fill me-1"></i> Recommended for New Patients</div>
                    @endif
                    <h4 class="fw-bold text-brand-contrast mb-2">{{ $srv->name }}</h4>
                    <div class="display-5 fw-extrabold text-brand-primary mb-3">
                        ${{ number_format($srv->price, 0) }}
                        <span class="fs-6 text-muted fw-normal">/ {{ $srv->duration_minutes }} mins</span>
                    </div>
                    <p class="small text-muted mb-4">{{ $srv->description }}</p>
                    
                    <ul class="list-unstyled small mb-4">
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-brand-primary me-2"></i> Comprehensive medical history review</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-brand-primary me-2"></i> TGA SAS-B / Authorised Prescriber submission</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-brand-primary me-2"></i> MediRecords EHR integration & notes</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-brand-primary me-2"></i> E-script delivery to patient portal</li>
                    </ul>

                    <a href="{{ route('booking.index', ['service_id' => $srv->id]) }}" class="btn {{ $srv->type === 'initial' ? 'btn-brand-primary' : 'btn-brand-outline' }} w-100 mt-auto fw-semibold">
                        Book Consultation
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Treatment Areas -->
    <div class="mt-5 pt-4 border-top" data-aos="fade-up">
        <h3 class="fw-bold text-brand-contrast text-center mb-4">Primary Clinical Indications</h3>
        <div class="row g-4">
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-white border rounded-3 h-100 shadow-sm">
                    <h5 class="fw-bold text-brand-contrast"><i class="bi bi-capsule text-brand-primary me-2"></i> Chronic Musculoskeletal & Nerve Pain</h5>
                    <p class="small text-muted mb-0">Targeting inflammatory pathways via cannabinoid receptors (CB1 & CB2) to modulate pain signaling, reduce opioid dependence, and restore joint mobility.</p>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4 bg-white border rounded-3 h-100 shadow-sm">
                    <h5 class="fw-bold text-brand-contrast"><i class="bi bi-moon-stars text-brand-primary me-2"></i> Sleep Maintenance & Latency Disorders</h5>
                    <p class="small text-muted mb-0">Utilizing nighttime terpene-rich (Myrcene/Linalool) formulations to decrease sleep onset latency and enhance REM architecture.</p>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="p-4 bg-white border rounded-3 h-100 shadow-sm">
                    <h5 class="fw-bold text-brand-contrast"><i class="bi bi-shield-heart text-brand-primary me-2"></i> Anxiety & Mood Deregulation</h5>
                    <p class="small text-muted mb-0">Full-spectrum CBD isolates and balanced tinctures promoting 5-HT1A serotonin receptor activation for non-intoxicating calming effects.</p>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="p-4 bg-white border rounded-3 h-100 shadow-sm">
                    <h5 class="fw-bold text-brand-contrast"><i class="bi bi-flower1 text-brand-primary me-2"></i> Women's Health & Pelvic Pain</h5>
                    <p class="small text-muted mb-0">Targeted support for severe endometriosis pain, menstrual dysmenorrhea, and menopausal sleep disturbances.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection