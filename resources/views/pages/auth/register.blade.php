@extends('layouts.app')

@section('title', 'Patient Registration - ZOVI LEAF')

@section('content')
<div class="auth-wrapper">
    <!-- Ambient Floating Light Orbs -->
    <div class="auth-ambient-orb-1"></div>
    <div class="auth-ambient-orb-2"></div>

    <div class="container position-relative" style="z-index: 3;">
        <div class="row justify-content-center">
            <div class="col-xl-11">
                <div class="auth-card">
                    <div class="row g-0">
                        <!-- Left Visual Brand Panel -->
                        <div class="col-lg-4 auth-visual-panel">
                            <div>
                                <div class="mb-4">
                                    <a href="{{ route('home') }}" class="d-inline-block text-decoration-none">
                                        <div class="d-flex align-items-center gap-2">
                                            <svg width="40" height="40" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="100" height="100" rx="24" fill="#D16646"/>
                                                <path d="M50 20C40 38 32 46 22 54C34 54 44 48 50 38C56 48 66 54 78 54C68 46 60 38 50 20Z" fill="#FAF7F2"/>
                                                <path d="M50 38V80" stroke="#FAF7F2" stroke-width="6" stroke-linecap="round"/>
                                                <path d="M50 55C42 63 36 68 28 72" stroke="#FAF7F2" stroke-width="5" stroke-linecap="round"/>
                                                <path d="M50 55C58 63 64 68 72 72" stroke="#FAF7F2" stroke-width="5" stroke-linecap="round"/>
                                            </svg>
                                            <span class="fs-4 fw-extrabold text-white font-heading tracking-wide">ZOVI LEAF</span>
                                        </div>
                                    </a>
                                </div>

                                <span class="badge badge-tga mb-3 bg-white text-dark border-0">
                                    <i class="bi bi-shield-lock-fill text-brand-primary"></i> Encrypted Patient Portal
                                </span>

                                <h3 class="text-white fw-bold mb-3 font-heading">
                                    Begin Your Healthcare Journey
                                </h3>
                                <p class="text-light opacity-75 small mb-4">
                                    Register once to unlock continuous telehealth access, direct doctor messaging, automated SAS-B approval tracking, and dispensary dispatch.
                                </p>

                                <div class="d-flex flex-column gap-3">
                                    <div class="d-flex gap-3 text-light opacity-90 small">
                                        <i class="bi bi-person-badge text-brand-primary fs-5 mt-1"></i>
                                        <div>
                                            <strong>Verified Digital Record</strong>
                                            <div class="opacity-75">Instantly synced with MediRecords EHR database.</div>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3 text-light opacity-90 small">
                                        <i class="bi bi-shield-check text-brand-primary fs-5 mt-1"></i>
                                        <div>
                                            <strong>100% Confidential Care</strong>
                                            <div class="opacity-75">Australian Privacy Act & Health Records Act compliant.</div>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3 text-light opacity-90 small">
                                        <i class="bi bi-box2-heart text-brand-primary fs-5 mt-1"></i>
                                        <div>
                                            <strong>Express Dispensary</strong>
                                            <div class="opacity-75">Direct express courier with tracking to your doorstep.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-4 border-top border-secondary border-opacity-25 mt-4">
                                <p class="text-light opacity-75 small mb-0">
                                    <i class="bi bi-geo-alt-fill text-brand-primary me-1"></i> Surry Hills NSW 2010 • Telehealth Australia-wide
                                </p>
                            </div>
                        </div>

                        <!-- Right Form Panel -->
                        <div class="col-lg-8 auth-form-panel">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div>
                                    <h3 class="fw-bold text-brand-contrast mb-1 font-heading">Create Patient Account</h3>
                                    <p class="small text-muted mb-0">Please provide your details as they appear on your Medicare or Photo ID.</p>
                                </div>
                                <span class="badge bg-light text-brand-contrast border d-none d-md-inline-block px-3 py-2">
                                    <i class="bi bi-lock-fill text-success me-1"></i> SSL 256-Bit Secured
                                </span>
                            </div>

                            <form action="{{ route('register.submit') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold small text-brand-contrast">Full Legal Name *</label>
                                        <input type="text" name="name" class="form-control" placeholder="Jane Doe" value="{{ old('name') }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold small text-brand-contrast">Email Address *</label>
                                        <input type="email" name="email" class="form-control" placeholder="jane@example.com" value="{{ old('email') }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold small text-brand-contrast">Password *</label>
                                        <input type="password" name="password" class="form-control" placeholder="Min. 8 characters" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold small text-brand-contrast">Confirm Password *</label>
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Repeat password" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold small text-brand-contrast">Mobile Phone *</label>
                                        <input type="text" name="phone" class="form-control" placeholder="0412 345 678" value="{{ old('phone') }}" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label fw-semibold small text-brand-contrast">Date of Birth *</label>
                                        <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', '1990-01-01') }}" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label fw-semibold small text-brand-contrast">Gender *</label>
                                        <select name="gender" class="form-select" required>
                                            <option value="Female">Female</option>
                                            <option value="Male">Male</option>
                                            <option value="Non-binary">Non-binary</option>
                                            <option value="Prefer not to say">Prefer not to say</option>
                                        </select>
                                    </div>

                                    <!-- Medicare Section -->
                                    <div class="col-12 pt-2">
                                        <div class="fw-bold small text-brand-contrast border-bottom pb-1 mb-2">
                                            <i class="bi bi-card-heading text-brand-primary me-1"></i> Medicare Details (Optional for private telehealth)
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold small text-brand-contrast">Medicare Number</label>
                                        <input type="text" name="medicare_number" class="form-control" placeholder="2938 10293" value="{{ old('medicare_number') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label fw-semibold small text-brand-contrast">Ref No.</label>
                                        <input type="text" name="medicare_ref" class="form-control" placeholder="1" value="{{ old('medicare_ref', '1') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label fw-semibold small text-brand-contrast">Expiry (MM/YY)</label>
                                        <input type="text" name="medicare_expiry" class="form-control" placeholder="08/28" value="{{ old('medicare_expiry') }}">
                                    </div>

                                    <!-- Address Section -->
                                    <div class="col-12 pt-2">
                                        <div class="fw-bold small text-brand-contrast border-bottom pb-1 mb-2">
                                            <i class="bi bi-geo-alt text-brand-primary me-1"></i> Residential / Prescription Shipping Address
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-semibold small text-brand-contrast">Street Address *</label>
                                        <input type="text" name="address_line1" class="form-control" placeholder="Level 1, 63-73 Ann street" value="{{ old('address_line1') }}" required>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label fw-semibold small text-brand-contrast">City / Suburb *</label>
                                        <input type="text" name="city" class="form-control" placeholder="Surry Hills" value="{{ old('city') }}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-semibold small text-brand-contrast">State *</label>
                                        <select name="state" class="form-select" required>
                                            <option value="NSW" selected>NSW</option>
                                            <option value="VIC">VIC</option>
                                            <option value="QLD">QLD</option>
                                            <option value="WA">WA</option>
                                            <option value="SA">SA</option>
                                            <option value="TAS">TAS</option>
                                            <option value="ACT">ACT</option>
                                            <option value="NT">NT</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label fw-semibold small text-brand-contrast">Postcode *</label>
                                        <input type="text" name="postcode" class="form-control" placeholder="2010" value="{{ old('postcode') }}" required>
                                    </div>

                                    <!-- reCAPTCHA Verification -->
                                    <div class="col-12 mt-3">
                                        @include('partials.recaptcha')
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="terms" id="terms" required checked>
                                            <label class="form-check-label small text-muted" for="terms">
                                                I confirm I am over 18 years old, agree to the Terms of Service & Privacy Policy, and consent to healthcare records management via MediRecords.
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <button type="submit" class="btn btn-auth-submit w-100 py-3">
                                            Create My Patient Account <i class="bi bi-arrow-right-short fs-5 ms-1 align-middle"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div class="text-center mt-4 pt-3 border-top small text-muted">
                                Already have an account? <a href="{{ route('login') }}" class="fw-bold text-brand-primary text-decoration-none">Sign in to your portal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection