@extends('layouts.app')

@section('title', 'Patient & Practitioner Login - ZYMIKA HEALTH')

@section('content')
<div class="auth-wrapper">
    <!-- Ambient Floating Light Orbs -->
    <div class="auth-ambient-orb-1"></div>
    <div class="auth-ambient-orb-2"></div>

    <div class="container position-relative" style="z-index: 3;">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-11">
                <div class="auth-card">
                    <div class="row g-0">
                        <!-- Left Visual Brand Panel -->
                        <div class="col-lg-5 auth-visual-panel">
                            <div>
                                <div class="mb-4">
                                    <a href="{{ route('home') }}" class="d-inline-block text-decoration-none">
                                        <div class="d-flex align-items-center gap-2">
                                            <svg width="42" height="42" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
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

                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <span class="badge bg-white text-dark fw-bold px-3 py-2 rounded-pill shadow-sm" style="font-size: 0.78rem;">
                                        <span class="pulse-dot me-1"></span> Live AHPRA Practitioner Sync
                                    </span>
                                </div>

                                <h2 class="text-white fw-bold mb-3 font-heading" style="font-size: 1.95rem; line-height: 1.25; letter-spacing: -0.02em;">
                                    Personalised Plant Medicine & Telehealth Care
                                </h2>
                                <p class="text-light opacity-75 small mb-4" style="line-height: 1.6;">
                                    Access your encrypted patient charts, live video consultations, TGA approvals, and discreet express prescription fulfillment.
                                </p>

                                <div class="d-flex flex-column gap-2 pt-1 mb-4">
                                    <div class="auth-feature-item d-flex align-items-center gap-3">
                                        <div class="rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 38px; height: 38px; background: linear-gradient(135deg, #3aa3a2 0%, #1a9b8c 100%); flex-shrink: 0;">
                                            <i class="bi bi-arrow-repeat text-white fs-5"></i>
                                        </div>
                                        <span class="small text-white opacity-95">Direct <strong>MediRecords API</strong> EHR Synchronisation</span>
                                    </div>
                                    <div class="auth-feature-item d-flex align-items-center gap-3">
                                        <div class="rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 38px; height: 38px; background: linear-gradient(135deg, #3aa3a2 0%, #1a9b8c 100%); flex-shrink: 0;">
                                            <i class="bi bi-camera-video-fill text-white fs-5"></i>
                                        </div>
                                        <span class="small text-white opacity-95">HD End-to-End Encrypted Telehealth Consultations</span>
                                    </div>
                                    <div class="auth-feature-item d-flex align-items-center gap-3">
                                        <div class="rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 38px; height: 38px; background: linear-gradient(135deg, #3aa3a2 0%, #1a9b8c 100%); flex-shrink: 0;">
                                            <i class="bi bi-truck text-white fs-5"></i>
                                        </div>
                                        <span class="small text-white opacity-95">Express Australian Pharmacy Dispensary Delivery</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Doctor Frosted Glass Info Badge -->
                            <div class="auth-doctor-card mt-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-brand-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 46px; height: 46px; font-size: 1.1rem; flex-shrink: 0;">
                                        SB
                                    </div>
                                    <div class="flex-grow-1 min-w-0">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <span class="fw-bold text-white small">Dr. Suneetha Batthala</span>
                                            <span class="text-warning small" style="font-size: 0.75rem;"><i class="bi bi-star-fill"></i> 4.9/5</span>
                                        </div>
                                        <div class="text-white opacity-75 small" style="font-size: 0.76rem;">
                                            Clinical Lead & Authorised Prescriber • Surry Hills NSW
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Form Panel -->
                        <div class="col-lg-7 auth-form-panel">
                            <div class="mb-4">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <h3 class="fw-bold text-brand-contrast mb-0 font-heading">Secure Account Sign In</h3>
                                    <span class="badge bg-light text-muted border px-2 py-1 small" style="font-size: 0.7rem;">
                                        <i class="bi bi-shield-lock-fill text-success me-1"></i> 256-Bit SSL
                                    </span>
                                </div>
                                <p class="small text-muted mb-0">Enter your credentials to access your clinical dashboard or patient portal.</p>
                            </div>

                            <form action="{{ route('login.submit') }}" method="POST" id="loginForm">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label fw-semibold small text-brand-contrast mb-1">Email Address</label>
                                    <div class="auth-input-wrapper">
                                        <i class="bi bi-envelope auth-input-icon"></i>
                                        <input type="email" name="email" id="login_email" class="form-control auth-input-field" placeholder="name@example.com" value="{{ old('email') }}" required autofocus>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <label class="form-label fw-semibold small text-brand-contrast mb-0">Password</label>
                                        <a href="{{ route('password.request') }}" class="small text-brand-primary text-decoration-none fw-semibold">Forgot password?</a>
                                    </div>
                                    <div class="auth-input-wrapper">
                                        <i class="bi bi-lock auth-input-icon"></i>
                                        <input type="password" name="password" id="login_password" class="form-control auth-input-field pe-5" placeholder="••••••••" required>
                                        <button class="auth-eye-btn" type="button" onclick="togglePasswordVisibility()" id="btnTogglePass" title="Toggle password visibility" aria-label="Toggle password visibility">
                                            <i class="bi bi-eye" id="eyeIcon"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" checked>
                                        <label class="form-check-label small text-muted user-select-none" for="remember">Keep me signed in</label>
                                    </div>
                                </div>

                                <!-- Google reCAPTCHA Verification Box -->
                                @include('partials.recaptcha')

                                <button type="submit" class="btn btn-auth-submit w-100 py-3 mt-2 mb-3">
                                    Sign In to Portal <i class="bi bi-arrow-right-short fs-5 ms-1 align-middle"></i>
                                </button>
                            </form>

                            <div class="text-center pt-2 pb-3 border-bottom small text-muted">
                                Don't have an account yet? <a href="{{ route('register') }}" class="fw-bold text-brand-primary text-decoration-none">Create Patient Account</a>
                            </div>

                            <!-- One-Click Instant Demo Portals -->
                            <div class="mt-4">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="small fw-bold text-muted text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.05em;">Instant Demo Access</span>
                                    <span class="badge bg-light text-muted border">Click to auto-fill</span>
                                </div>
                                <div class="row g-2">
                                    <div class="col-sm-4">
                                        <div class="demo-pill" id="pill-patient" onclick="fillDemo('john.miller@example.com', 'password', this)">
                                            <div>
                                                <div class="fw-bold text-dark"><i class="bi bi-person-fill text-brand-primary me-1"></i> Patient</div>
                                                <div class="text-muted" style="font-size: 0.72rem;">John Miller</div>
                                            </div>
                                            <i class="bi bi-arrow-right-short fs-5 demo-arrow"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="demo-pill" id="pill-doctor" onclick="fillDemo('dr.batthala@zymikahealth.com.au', 'password', this)">
                                            <div>
                                                <div class="fw-bold text-dark"><i class="bi bi-heart-pulse-fill text-brand-sage me-1"></i> Doctor</div>
                                                <div class="text-muted" style="font-size: 0.72rem;">Dr. Suneetha</div>
                                            </div>
                                            <i class="bi bi-arrow-right-short fs-5 demo-arrow"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="demo-pill" id="pill-admin" onclick="fillDemo('admin@zymikahealth.com.au', 'password', this)">
                                            <div>
                                                <div class="fw-bold text-dark"><i class="bi bi-shield-lock-fill text-dark me-1"></i> Admin</div>
                                                <div class="text-muted" style="font-size: 0.72rem;">Practice Mgr</div>
                                            </div>
                                            <i class="bi bi-arrow-right-short fs-5 demo-arrow"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function fillDemo(email, pass, el) {
    document.getElementById('login_email').value = email;
    document.getElementById('login_password').value = pass;
    
    // Add visual feedback
    document.querySelectorAll('.demo-pill').forEach(pill => pill.classList.remove('active-pill'));
    if (el) {
        el.classList.add('active-pill');
    }
}

function togglePasswordVisibility() {
    const passInput = document.getElementById('login_password');
    const eyeIcon = document.getElementById('eyeIcon');
    if (passInput.type === 'password') {
        passInput.type = 'text';
        eyeIcon.classList.remove('bi-eye');
        eyeIcon.classList.add('bi-eye-slash');
    } else {
        passInput.type = 'password';
        eyeIcon.classList.remove('bi-eye-slash');
        eyeIcon.classList.add('bi-eye');
    }
}
</script>
@endsection