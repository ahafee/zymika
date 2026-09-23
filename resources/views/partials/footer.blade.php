<footer class="pt-5 pb-4 mt-5 text-white footer-zovi-wrapper">
    <div class="container">
        <!-- VIP Trust Badges Strip -->
        <div class="row g-3 pb-4 mb-5 border-bottom border-white border-opacity-10">
            <div class="col-6 col-lg-3">
                <div class="footer-trust-card">
                    <div class="footer-trust-icon footer-trust-ahpra">
                        <i class="bi bi-patch-check-fill"></i>
                    </div>
                    <div>
                        <div class="fw-bold small text-white">AHPRA Registered</div>
                        <div class="text-white-50" style="font-size: 0.75rem;">Accredited Australian Doctors</div>
                    </div>
                </div>
            </div>
            
            <div class="col-6 col-lg-3">
                <div class="footer-trust-card">
                    <div class="footer-trust-icon footer-trust-tga">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <div>
                        <div class="fw-bold small text-white">TGA SAS-B &amp; AP</div>
                        <div class="text-white-50" style="font-size: 0.75rem;">Direct Authorised Prescriber</div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="footer-trust-card">
                    <div class="footer-trust-icon footer-trust-medirecords">
                        <i class="bi bi-cloud-check-fill"></i>
                    </div>
                    <div>
                        <div class="fw-bold small text-white">MediRecords EHR</div>
                        <div class="text-white-50" style="font-size: 0.75rem;">Bank-Grade Cloud Encryption</div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="footer-trust-card">
                    <div class="footer-trust-icon footer-trust-auspost">
                        <i class="bi bi-truck"></i>
                    </div>
                    <div>
                        <div class="fw-bold small text-white">Express AusPost</div>
                        <div class="text-white-50" style="font-size: 0.75rem;">Discreet Nationwide Dispatch</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Footer Content Columns -->
        <div class="row g-4 mb-5">
            <!-- Brand & Clinic HQ -->
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center mb-3">
                    @include('partials.logo')
                </div>
                <p class="small text-light opacity-75 pe-lg-3 lh-base">
                    <strong>ZOVI LEAF / Zovi Health Pty Ltd</strong> is a physician-led Australian telehealth clinic dedicated to evidence-based plant medicine, chronic pain management, sleep restoration, and patient-centered integrative care.
                </p>
                <div class="small text-light opacity-85 mt-3">
                    <p class="mb-2 d-flex align-items-start gap-2">
                        <i class="bi bi-geo-alt-fill text-brand-primary mt-1"></i>
                        <span>Level 1, 63-73 Ann Street, Surry Hills NSW 2010</span>
                    </p>
                    <p class="mb-2 d-flex align-items-center gap-2">
                        <i class="bi bi-telephone-fill text-brand-primary"></i>
                        <a href="tel:0258385365" class="text-white text-decoration-none fw-semibold hover-primary">02 5838 5365</a>
                    </p>
                    <p class="mb-2 d-flex align-items-center gap-2">
                        <i class="bi bi-envelope-fill text-brand-primary"></i>
                        <a href="mailto:care@zovihealth.com.au" class="text-white text-decoration-none hover-primary">care@zovihealth.com.au</a>
                    </p>
                </div>
            </div>

            <!-- Quick Navigation -->
            <div class="col-lg-2 col-md-6 col-6">
                <h6 class="footer-col-title">Quick Links</h6>
                <ul class="list-unstyled footer-nav-list small">
                    <li><a href="{{ route('home') }}"><i class="bi bi-chevron-right me-1"></i> Home</a></li>
                    <li><a href="{{ route('about') }}"><i class="bi bi-chevron-right me-1"></i> About Us</a></li>
                    <li><a href="{{ route('how-it-works') }}"><i class="bi bi-chevron-right me-1"></i> How It Works</a></li>
                    <li><a href="{{ route('services') }}"><i class="bi bi-chevron-right me-1"></i> Services &amp; Fees</a></li>
                    <li><a href="{{ route('shop.index') }}"><i class="bi bi-chevron-right me-1"></i> Dispensary Catalog</a></li>
                    <li><a href="{{ route('contact') }}"><i class="bi bi-chevron-right me-1"></i> Contact</a></li>
                </ul>
            </div>

            <!-- Clinical Pathways -->
            <div class="col-lg-3 col-md-6 col-6">
                <h6 class="footer-col-title">Clinical Pathways</h6>
                <ul class="list-unstyled footer-pathway-list small">
                    <li class="footer-pathway-item mb-3">
                        <a href="{{ route('services') }}" class="d-flex align-items-center gap-2 text-decoration-none text-light opacity-90 hover-white">
                            <div class="footer-pathway-icon">
                                <i class="bi bi-capsule text-brand-primary"></i>
                            </div>
                            <span>Chronic Musculoskeletal Pain</span>
                        </a>
                    </li>
                    <li class="footer-pathway-item mb-3">
                        <a href="{{ route('services') }}" class="d-flex align-items-center gap-2 text-decoration-none text-light opacity-90 hover-white">
                            <div class="footer-pathway-icon">
                                <i class="bi bi-moon-stars-fill text-brand-sage"></i>
                            </div>
                            <span>Insomnia &amp; Sleep Therapy</span>
                        </a>
                    </li>
                    <li class="footer-pathway-item mb-3">
                        <a href="{{ route('services') }}" class="d-flex align-items-center gap-2 text-decoration-none text-light opacity-90 hover-white">
                            <div class="footer-pathway-icon">
                                <i class="bi bi-heart-pulse-fill text-brand-primary"></i>
                            </div>
                            <span>Anxiety &amp; Stress Management</span>
                        </a>
                    </li>
                    <li class="footer-pathway-item mb-3">
                        <a href="{{ route('services') }}" class="d-flex align-items-center gap-2 text-decoration-none text-light opacity-90 hover-white">
                            <div class="footer-pathway-icon">
                                <i class="bi bi-flower1 text-brand-sage"></i>
                            </div>
                            <span>Women's Pelvic &amp; Endo Care</span>
                        </a>
                    </li>
                    <li class="footer-pathway-item mb-3">
                        <a href="{{ route('services') }}" class="d-flex align-items-center gap-2 text-decoration-none text-light opacity-90 hover-white">
                            <div class="footer-pathway-icon">
                                <i class="bi bi-shield-plus text-brand-primary"></i>
                            </div>
                            <span>Palliative Supportive Care</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Patient Hub & Care -->
            <div class="col-lg-3 col-md-6">
                <h6 class="footer-col-title">Patient Portal &amp; Care</h6>
                <p class="small text-white-50 mb-3">Access your electronic prescriptions, repeats wallet, and clinical documents securely.</p>
                
                <div class="d-flex flex-column gap-2 mb-3">
                    @auth
                        <a href="{{ route('login') }}" class="btn btn-sm btn-brand-primary fw-semibold py-2">
                            <i class="bi bi-speedometer2 me-1"></i> My Patient Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-sm btn-brand-primary fw-semibold py-2">
                            <i class="bi bi-person-circle me-1"></i> Patient Login
                        </a>
                        <a href="{{ route('eligibility.show') }}" class="btn btn-sm btn-outline-light py-2">
                            <i class="bi bi-ui-checks me-1"></i> Free 60s Eligibility Quiz
                        </a>
                    @endauth
                </div>

                <!-- Emergency Support Notice Box -->
                <div class="footer-emergency-card">
                    <div class="d-flex align-items-center gap-2 mb-1.5">
                        <i class="bi bi-shield-exclamation text-danger fs-5"></i>
                        <strong class="text-white small">24/7 Crisis &amp; Emergency</strong>
                    </div>
                    <p class="text-white-50 mb-2.5" style="font-size: 0.76rem; line-height: 1.4;">
                        For acute medical emergencies, call <strong>000</strong>. For 24/7 mental health crisis support, connect with Lifeline.
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="tel:000" class="btn btn-danger btn-sm py-1 px-2.5 fw-bold" style="font-size: 0.75rem;">
                            <i class="bi bi-telephone-fill me-1"></i> Call 000
                        </a>
                        <a href="tel:131114" class="btn btn-outline-light btn-sm py-1 px-2.5" style="font-size: 0.75rem;">
                            <i class="bi bi-heart-pulse me-1"></i> Lifeline 13 11 14
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <hr class="border-white border-opacity-10 my-4">

        <!-- Statutory Notice & Copyright -->
        <div class="row g-3 align-items-center text-center">
            <div class="col-12 text-center small text-white-50">
                &copy; {{ date('Y') }} Zovi Health Pty Ltd (ZOVI LEAF). All rights reserved.
            </div>
        </div>
    </div>
</footer>