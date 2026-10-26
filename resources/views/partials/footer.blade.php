<footer class="pt-5 pb-4 text-white footer-zymika-wrapper" style="background: linear-gradient(180deg, #0d223f 0%, #061324 100%); border-top: 3px solid #3aa3a2;">
    <div class="container" style="max-width: 1320px;">
        <div class="row g-4 mb-5 pb-3 border-bottom border-white border-opacity-10">
            <!-- Brand & Info Column -->
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center mb-3">
                    <a href="{{ route('home') }}" class="brand-logo-wrap d-inline-flex align-items-center text-decoration-none">
                        <img src="{{ asset('images/Final-File-white.png') }}" alt="ZYMIKA HEALTH" class="brand-logo-img" style="max-height: 48px; width: auto;" onerror="this.src='{{ asset('images/Final-File.png') }}'">
                    </a>
                </div>
                <p class="text-light opacity-75 small pe-lg-3 lh-base">
                    Zymika Health provides convenient telehealth consultations for patients seeking reliable online medical support, guidance, and patient centred care from home.
                </p>
                <div class="text-brand-primary fw-semibold small mb-3" style="color: #3aa3a2 !important;">
                    Supporting Your Health Journey
                </div>
                <!-- Social Media Links -->
                <div class="d-flex align-items-center gap-2 mt-3">
                    <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-light rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 38px; height: 38px;" title="LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-light rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 38px; height: 38px;" title="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://youtube.com" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-light rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 38px; height: 38px;" title="YouTube">
                        <i class="bi bi-youtube"></i>
                    </a>
                    <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-light rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 38px; height: 38px;" title="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                </div>
            </div>

            <!-- Company Column -->
            <div class="col-lg-2 col-md-6 col-6">
                <h6 class="text-white fw-bold mb-3 text-uppercase tracking-wider fs-6">Company</h6>
                <ul class="list-unstyled d-flex flex-column gap-2 small">
                    <li><a href="{{ route('about') }}" class="text-light opacity-75 text-decoration-none hover-primary">About Us</a></li>
                    <li><a href="{{ route('services') }}" class="text-light opacity-75 text-decoration-none hover-primary">Our Services</a></li>
                    <li><a href="{{ route('how-it-works') }}" class="text-light opacity-75 text-decoration-none hover-primary">How It Works</a></li>
                    <li><a href="{{ route('contact') }}" class="text-light opacity-75 text-decoration-none hover-primary">Contact Us</a></li>
                </ul>
            </div>

            <!-- Services Column -->
            <div class="col-lg-3 col-md-6 col-6">
                <h6 class="text-white fw-bold mb-3 text-uppercase tracking-wider fs-6">Services</h6>
                <ul class="list-unstyled d-flex flex-column gap-2 small">
                    <li><a href="{{ route('services.gp') }}" class="text-light opacity-75 text-decoration-none hover-primary">Men’s Health</a></li>
                    <li><a href="{{ route('services.mental-health') }}" class="text-light opacity-75 text-decoration-none hover-primary">Mental Health</a></li>
                    <li><a href="{{ route('services.gp') }}" class="text-light opacity-75 text-decoration-none hover-primary">Chronic Management</a></li>
                    <li><a href="{{ route('services.gp') }}" class="text-light opacity-75 text-decoration-none hover-primary">Medical Checkup</a></li>
                </ul>
            </div>

            <!-- Contact Info Column -->
            <div class="col-lg-3 col-md-6">
                <h6 class="text-white fw-bold mb-3 text-uppercase tracking-wider fs-6">Contact Info</h6>
                <div class="small text-light opacity-85 d-flex flex-column gap-2">
                    <div>
                        <div class="text-white fw-semibold">Monday - Friday:</div>
                        <div class="text-light opacity-75">9:00 AM - 5:00 PM</div>
                    </div>
                    <div>
                        <div class="text-white fw-semibold">Location:</div>
                        <div class="text-light opacity-75">Berwick, VIC 3806</div>
                    </div>
                    <div>
                        <div class="text-white fw-semibold">Phone No:</div>
                        <div><a href="tel:0411174173" class="text-decoration-none fw-semibold" style="color: #3aa3a2;">0411174173</a></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Copyright Bar -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 small text-light opacity-75">
            <div>
                &copy; 2026 Zymika Health. All Rights Reserved. | Website Designed by <a href="https://www.aussifywebdesign.com.au/" target="_blank" rel="noopener noreferrer" class="text-white text-decoration-underline hover-primary">Aussify Web Design</a>
            </div>
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('home') }}#terms" class="text-light opacity-75 text-decoration-none hover-primary">Terms &amp; Conditions</a>
                <span class="opacity-25">|</span>
                <a href="{{ route('home') }}#privacy" class="text-light opacity-75 text-decoration-none hover-primary">Privacy Policy</a>
                <span class="opacity-25">|</span>
                <a href="#" class="text-light opacity-75 text-decoration-none hover-primary d-inline-flex align-items-center gap-1" onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;">
                    <span>Back To Top</span> <i class="bi bi-arrow-up-circle"></i>
                </a>
            </div>
        </div>
    </div>
</footer>
