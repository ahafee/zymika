@extends('layouts.app')

@section('title', 'Reset Password - ZYMIKA HEALTH')

@section('content')
<div class="auth-wrapper">
    <!-- Ambient Floating Light Orbs -->
    <div class="auth-ambient-orb-1"></div>
    <div class="auth-ambient-orb-2"></div>

    <div class="container position-relative" style="z-index: 3;">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-10">
                <div class="auth-card">
                    <div class="row g-0">
                        <!-- Left Visual Brand Panel -->
                        <div class="col-lg-5 auth-visual-panel">
                            <div>
                                <div class="mb-4">
                                    <a href="{{ route('home') }}" class="d-inline-block text-decoration-none">
                                        <div class="d-flex align-items-center gap-2">
                                            <svg width="40" height="40" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="100" height="100" rx="24" fill="#3aa3a2"/>
                                                <path d="M50 20C40 38 32 46 22 54C34 54 44 48 50 38C56 48 66 54 78 54C68 46 60 38 50 20Z" fill="#ffffff"/>
                                                <path d="M50 38V80" stroke="#ffffff" stroke-width="6" stroke-linecap="round"/>
                                                <path d="M50 55C42 63 36 68 28 72" stroke="#ffffff" stroke-width="5" stroke-linecap="round"/>
                                                <path d="M50 55C58 63 64 68 72 72" stroke="#ffffff" stroke-width="5" stroke-linecap="round"/>
                                            </svg>
                                            <span class="fs-4 fw-extrabold text-white font-heading tracking-wide">ZYMIKA HEALTH</span>
                                        </div>
                                    </a>
                                </div>

                                <span class="badge badge-tga mb-3 bg-white text-dark border-0">
                                    <i class="bi bi-key-fill text-brand-primary"></i> Account Recovery
                                </span>

                                <h3 class="text-white fw-bold mb-3 font-heading">
                                    Secure Password Retrieval
                                </h3>
                                <p class="text-light opacity-75 small mb-4">
                                    For your medical privacy and security, we send temporary encrypted reset tokens directly to your registered email address.
                                </p>
                            </div>

                            <div class="pt-4 border-top border-secondary border-opacity-25 mt-4">
                                <p class="text-light opacity-75 small mb-0">
                                    Need direct clinic help? <a href="{{ route('contact') }}" class="text-white fw-bold text-decoration-underline">Contact Practice Support</a>
                                </p>
                            </div>
                        </div>

                        <!-- Right Form Panel -->
                        <div class="col-lg-7 auth-form-panel">
                            <div class="mb-4">
                                <h3 class="fw-bold text-brand-contrast mb-1 font-heading">Reset Your Password</h3>
                                <p class="small text-muted mb-0">Enter your registered email address to receive password reset instructions.</p>
                            </div>

                            @if (session('status'))
                                <div class="alert alert-success small mb-4 border-0 bg-success bg-opacity-10 text-success fw-semibold">
                                    <i class="bi bi-check-circle-fill me-1"></i> {{ session('status') }}
                                </div>
                            @endif

                            <form action="{{ route('password.email') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label fw-semibold small text-brand-contrast mb-1">Email Address</label>
                                    <div class="auth-input-wrapper">
                                        <i class="bi bi-envelope auth-input-icon"></i>
                                        <input type="email" name="email" class="form-control auth-input-field" placeholder="name@example.com" value="{{ old('email') }}" required autofocus>
                                    </div>
                                </div>

                                <!-- reCAPTCHA -->
                                @include('partials.recaptcha')

                                <button type="submit" class="btn btn-auth-submit w-100 py-3 mt-2 mb-3">
                                    Send Password Reset Link <i class="bi bi-envelope-arrow-up-fill ms-1"></i>
                                </button>

                                <div class="text-center pt-2">
                                    <a href="{{ route('login') }}" class="small text-brand-contrast text-decoration-none fw-semibold">
                                        <i class="bi bi-arrow-left me-1"></i> Return to Login
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection