<a href="#content" class="visually-hidden-focusable position-absolute top-0 start-0 m-3 btn btn-sm btn-brand-primary z-3">
    Skip to content
</a>

<header class="sticky-top shadow-sm header-zymika-wrapper bg-white">
    <nav class="navbar navbar-expand-lg navbar-zymika py-2 py-lg-3">
        <div class="container" style="max-width: 1320px;">
            <!-- Brand Logo -->
            <a class="navbar-brand d-flex align-items-center py-1" href="#">
                @include('partials.logo')
            </a>

            <!-- Mobile Menu Toggle Button -->
            <button class="navbar-toggler border-0 shadow-none p-1 d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvas" aria-controls="navbarOffcanvas" aria-label="Toggle navigation">
                <i class="bi bi-list fs-1 text-brand-contrast"></i>
            </button>

            <!-- Desktop Nav Links -->
            <div class="collapse navbar-collapse d-none d-lg-flex" id="navbarMain">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-1 gap-xl-3 align-items-center">
                    <li class="nav-item">
                        <a class="nav-link fw-semibold text-brand-contrast active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold text-brand-contrast" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold text-brand-contrast" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold text-brand-contrast" href="#how-it-works">How It Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold text-brand-contrast" href="#doctors">Doctors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold text-brand-contrast" href="#contact">Contact Us</a>
                    </li>
                </ul>

                <!-- Header CTA Button -->
                <div class="d-flex align-items-center gap-2 ms-2">
                    <a href="#" class="btn btn-brand-primary px-4 py-2 rounded-pill fw-semibold shadow-sm d-inline-flex align-items-center gap-2">
                        <i class="bi bi-telephone-fill"></i>
                        <span>Call Us</span>
                    </a>
                </div>
            </div>

            <!-- Mobile Offcanvas Menu -->
            <div class="offcanvas offcanvas-end d-lg-none" tabindex="-1" id="navbarOffcanvas" aria-labelledby="navbarOffcanvasLabel">
                <div class="offcanvas-header border-bottom bg-light">
                    <h5 class="offcanvas-title" id="navbarOffcanvasLabel">
                        @include('partials.logo')
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body d-flex flex-column justify-content-between p-4">
                    <ul class="nav flex-column gap-2 mb-4">
                        <li class="nav-item">
                            <a class="nav-link fw-semibold fs-5 text-brand-contrast py-2" href="#" data-bs-dismiss="offcanvas">
                                <i class="bi bi-house-door me-2 text-brand-primary"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold fs-5 text-brand-contrast py-2" href="#services" data-bs-dismiss="offcanvas">
                                <i class="bi bi-grid-fill me-2 text-brand-primary"></i> Services
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold fs-5 text-brand-contrast py-2" href="#about" data-bs-dismiss="offcanvas">
                                <i class="bi bi-info-circle-fill me-2 text-brand-primary"></i> About Us
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold fs-5 text-brand-contrast py-2" href="#how-it-works" data-bs-dismiss="offcanvas">
                                <i class="bi bi-arrow-repeat me-2 text-brand-primary"></i> How It Works
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold fs-5 text-brand-contrast py-2" href="#doctors" data-bs-dismiss="offcanvas">
                                <i class="bi bi-person-badge-fill me-2 text-brand-primary"></i> Doctors
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold fs-5 text-brand-contrast py-2" href="#contact" data-bs-dismiss="offcanvas">
                                <i class="bi bi-envelope-fill me-2 text-brand-primary"></i> Contact Us
                            </a>
                        </li>
                    </ul>

                    <div class="pt-3 border-top">
                        <a href="#" class="btn btn-brand-primary w-100 py-3 rounded-pill fw-semibold shadow-sm d-flex align-items-center justify-content-center gap-2" data-bs-dismiss="offcanvas">
                            <i class="bi bi-telephone-fill"></i>
                            <span>Call Us</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </nav>
</header>