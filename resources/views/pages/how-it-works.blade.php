@extends('layouts.app')

@section('title', 'How It Works - ZOVI LEAF Telehealth Process')

@section('content')
<div class="py-5 bg-brand-light border-bottom" data-aos="fade-down">
    <div class="container text-center">
        <span class="badge badge-tga mb-2">Step-by-Step Guide</span>
        <h1 class="display-5 fw-bold text-brand-contrast">How Telehealth Works</h1>
        <p class="lead text-muted max-w-700 mx-auto">A transparent, fully compliant pathway to access prescribed plant therapy in Australia.</p>
    </div>
</div>

<div class="container py-5">
    <div class="row g-5">
        <div class="col-lg-8 mx-auto">
            <!-- Step 1 -->
            <div class="d-flex gap-4 mb-5" data-aos="fade-up" data-aos-delay="100">
                <div class="flex-shrink-0">
                    <div class="bg-brand-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold fs-4" style="width: 50px; height: 50px;">
                        1
                    </div>
                </div>
                <div>
                    <h4 class="fw-bold text-brand-contrast mb-2">Complete Pre-Assessment & Snapform</h4>
                    <p class="text-muted">
                        Take our free 60-second eligibility assessment to ensure you meet TGA SAS-B guidelines. After scheduling, fill in our secure Snapforms intake with your current medications, medical history, and regular GP details.
                    </p>
                    <a href="{{ route('eligibility.show') }}" class="btn btn-sm btn-brand-primary">Check Eligibility Now</a>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="d-flex gap-4 mb-5" data-aos="fade-up" data-aos-delay="200">
                <div class="flex-shrink-0">
                    <div class="bg-brand-contrast text-white rounded-circle d-flex align-items-center justify-content-center fw-bold fs-4" style="width: 50px; height: 50px;">
                        2
                    </div>
                </div>
                <div>
                    <h4 class="fw-bold text-brand-contrast mb-2">Telehealth Consultation with Dr. Suneetha Batthala</h4>
                    <p class="text-muted">
                        Join your private video or phone call. Dr. Batthala will review your symptoms, assess prior treatment trials, discuss potential contraindications, and formulate a customized cannabinoid treatment plan (CBD/THC balance).
                    </p>
                    <span class="badge bg-light text-brand-contrast border">20 Mins Video Consult | $79</span>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="d-flex gap-4 mb-5" data-aos="fade-up" data-aos-delay="300">
                <div class="flex-shrink-0">
                    <div class="bg-brand-sage text-white rounded-circle d-flex align-items-center justify-content-center fw-bold fs-4" style="width: 50px; height: 50px;">
                        3
                    </div>
                </div>
                <div>
                    <h4 class="fw-bold text-brand-contrast mb-2">Electronic Script & TGA SAS-B Approval</h4>
                    <p class="text-muted">
                        As an Authorised Prescriber, Dr. Batthala issues your digital e-script instantly via MediRecords. Your prescription and titration dosage instructions appear directly in your ZOVI LEAF patient portal wallet.
                    </p>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="d-flex gap-4" data-aos="fade-up" data-aos-delay="400">
                <div class="flex-shrink-0">
                    <div class="bg-brand-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold fs-4" style="width: 50px; height: 50px;">
                        4
                    </div>
                </div>
                <div>
                    <h4 class="fw-bold text-brand-contrast mb-2">Compounding & Express Delivery</h4>
                    <p class="text-muted">
                        Order your prescribed medication with one click through our dispensary. Your order is prepared by our licensed pharmacy partner and dispatched in discreet, tamper-evident packaging with Australia Post Express signature-on-delivery.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection