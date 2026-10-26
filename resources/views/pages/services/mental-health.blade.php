@extends('layouts.app')

@section('title', 'Mental Health & Wellbeing - Zymika Health | Online Support Australia')

@section('content')
<!-- Page Hero Banner -->
<section class="py-5 text-white position-relative" style="background: linear-gradient(135deg, #0f2d59 0%, #163868 60%, #0a2142 100%);">
    <div class="container py-lg-4" style="max-width: 1200px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2 text-white-50 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('services') }}" class="text-white text-decoration-none">Services</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">Mental Health &amp; Wellbeing</li>
            </ol>
        </nav>
        <div class="row align-items-center g-4">
            <div class="col-lg-8" data-aos="fade-right">
                <span class="badge px-3 py-2 rounded-pill fw-semibold mb-3 text-uppercase" style="background-color: rgba(58, 163, 162, 0.25); color: #72e3d8; font-size: 0.8rem;">
                    Mental Health &amp; Wellbeing
                </span>
                <h1 class="display-5 fw-bold text-white mb-3">Get Professional Mental Health Support Online</h1>
                <p class="lead text-white text-opacity-90 fs-6 mb-4 lh-base" style="max-width: 720px;">
                    With Zymika Health, get professional help for your mental health and wellbeing. Discuss the mental health issues that bother you, like anxiety, stress, and emotional health, with a trained healthcare provider.
                </p>
                <div class="d-flex flex-wrap gap-3 small text-white text-opacity-90 mb-4">
                    <div>• Confidential Support</div>
                    <div>• Online Access</div>
                    <div>• Personalised Care</div>
                </div>
                <div>
                    <a href="{{ route('booking.index') }}?service_id=1" class="btn px-4 py-3 rounded-pill fw-semibold text-white shadow-sm d-inline-flex align-items-center gap-2" style="background-color: #3aa3a2;">
                        <span>Book Mental Health Support</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center" data-aos="fade-left">
                <img src="{{ asset('images/cond-anxiety.jpg') }}" alt="Professional Mental Health Support Online" class="img-fluid rounded-5 shadow-lg border" style="max-height: 320px; object-fit: cover;">
            </div>
        </div>
    </div>
</section>

<!-- Mental Health Support Section -->
<section class="py-5 bg-white">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(58, 163, 162, 0.12); color: #1a9b8c;">
                Mental Health Support
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-3">Professional Mental Health Support For Healthier Life</h2>
            <p class="text-muted mx-auto lead fs-6" style="max-width: 760px;">
                Mental health immensely affects how we think, feel, and cope with our everyday life. Zymika Health offers convenient mental health and well-being support, allowing you to discuss your concerns with a qualified healthcare professional in a confidential and comfortable setting.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 48px; height: 48px; background-color: #0f2d59;">
                        <i class="bi bi-heart fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Anxiety &amp; Stress Support</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Receive professional guidance for your anxiety, worry, stress, or overwhelming emotions.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 48px; height: 48px; background-color: #3aa3a2;">
                        <i class="bi bi-emoji-smile fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Low Mood &amp; Emotional Wellbeing</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Explore different ways to support your mental health by sharing your mood, motivation, and confidence.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center text-white mb-3" style="width: 48px; height: 48px; background-color: #163868;">
                        <i class="bi bi-shield-heart fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Ongoing Mental Health Support</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Review your progress and access continued support for ongoing mental health concerns.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Understand Your Mental Health Section -->
<section class="py-5" style="background-color: #f7fbfc;">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(15, 45, 89, 0.08); color: #0f2d59;">
                Understand Your Mental Health
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-2">When Is It Time to Seek Mental Health Support</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Anxiety &amp; Worry</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Share ongoing worry, anxiety, or panic attacks affecting your life.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Stress &amp; Feeling Overwhelmed</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Receive guidance for ongoing stress and emotional pressure.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Low Mood &amp; Emotional Changes</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Discuss low mood, reduced motivation, and irritability to manage everyday activities.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Sleep &amp; Wellbeing Concerns</h5>
                    <p class="text-muted small mb-0 lh-base">
                        Get help for sleep difficulties, routine changes, and other concerns affecting mental health.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Wellbeing Process -->
<section class="py-5 bg-white">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(58, 163, 162, 0.12); color: #1a9b8c;">
                Our Wellbeing Process
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-2">Get Started in 3 Easy Steps</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-3 d-block">( 01 )</span>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Secure Online Assessment</h4>
                    <p class="text-muted small mb-0 lh-base">
                        A secure online assessment about your current wellbeing, symptoms, and concerns.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-3 d-block">( 02 )</span>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Have a Confidential Conversation</h4>
                    <p class="text-muted small mb-0 lh-base">
                        Have a private conversation with a qualified healthcare professional about your feelings and challenges.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-light rounded-4 border h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-3 d-block">( 03 )</span>
                    <h4 class="fw-bold text-brand-contrast fs-5 mb-2">Explore Your Next Steps</h4>
                    <p class="text-muted small mb-0 lh-base">
                        Receive Personalised Guidance For Individual Needs, Recommendations, And Ongoing Care.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Next Step in Mental Health Care Section -->
<section class="py-5" style="background-color: #f7fbfc;">
    <div class="container py-lg-4" style="max-width: 1140px;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 text-uppercase" style="background-color: rgba(15, 45, 89, 0.08); color: #0f2d59;">
                Next Step in Mental Health Care
            </span>
            <h2 class="display-6 fw-bold text-brand-contrast mb-3">Support Tailored To Your Mental Health Needs</h2>
            <p class="text-muted mx-auto lead fs-6" style="max-width: 680px;">
                Following your assessment, your GP will discuss the most appropriate course of action for your healthcare needs.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="50">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-2 d-block">01</span>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Mental Health Guidance</h5>
                    <p class="text-muted small mb-0 lh-base">Professional guidance on emotional wellbeing &amp; individual mental health needs.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-2 d-block">02</span>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Support &amp; Treatment Options</h5>
                    <p class="text-muted small mb-0 lh-base">Treatment and support options for low mood, anxiety, and stress.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-2 d-block">03</span>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Specialist Referrals</h5>
                    <p class="text-muted small mb-0 lh-base">Additional support from psychologist, psychiatrist or other mental health professional.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                    <span class="fw-bold fs-4 text-brand-primary mb-2 d-block">04</span>
                    <h5 class="fw-bold text-brand-contrast fs-6 mb-2">Wellbeing Support</h5>
                    <p class="text-muted small mb-0 lh-base">Follow-up care reviewing progress and discussing your ongoing support needs.</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <span class="badge px-3 py-2 rounded-pill bg-white border shadow-sm text-brand-primary fw-bold">
                25+ Years of Experience In Healthcare Services
            </span>
        </div>
    </div>
</section>

<!-- Booking Form Section -->
@include('partials.booking-form')

<!-- FAQs Section -->
@include('partials.faqs')

<!-- CTA Section -->
@include('partials.cta-banner')

@endsection
