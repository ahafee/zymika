@extends('layouts.app')

@section('title', 'How It Works - ZOVI LEAF Telehealth Process')

@section('content')
<div class="py-5 bg-brand-light border-bottom" data-aos="fade-down">
    <div class="container text-center">
        <span class="badge badge-tga mb-2">Step-by-Step Guide</span>
        <h1 class="display-5 fw-bold text-brand-contrast">How Telehealth Works</h1>
        <p class="lead text-muted max-w-700 mx-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.</p>
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
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
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
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
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
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
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
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection