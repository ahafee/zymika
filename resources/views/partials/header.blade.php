<a href="#content" class="visually-hidden-focusable position-absolute top-0 start-0 m-3 btn btn-sm btn-brand-primary z-3">
    Skip to content
</a>

<header class="sticky-top shadow-sm header-zymika-wrapper bg-white" style="z-index: 1040;">
    <nav class="navbar navbar-expand-lg navbar-zymika py-2 py-lg-3">
        <div class="container" style="max-width: 1320px;">
            <!-- Brand Logo -->
            <a class="navbar-brand d-flex align-items-center py-1" href="{{ route('home') }}">
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
                        <a class="nav-link fw-semibold {{ request()->routeIs('home') ? 'active text-brand-primary' : 'text-brand-contrast' }}" href="{{ route('home') }}">Home</a>
                    </li>

                    <!-- Services Dropdown -->
                    <li class="nav-item dropdown dropdown-zymika">
                        <a class="nav-link dropdown-toggle fw-semibold {{ request()->is('clinic-services*') || request()->is('*-consultations*') || request()->is('*prescriptions*') || request()->is('*mental-health*') || request()->is('*urgent*') || request()->is('*compounding*') ? 'active text-brand-primary' : 'text-brand-contrast' }}" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu dropdown-menu-zymika shadow-lg" aria-labelledby="servicesDropdown">
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('services.gp') ? 'active' : '' }}" href="{{ route('services.gp') }}">
                                    <span class="dropdown-item-icon"><i class="bi bi-person-badge"></i></span>
                                    <span class="dropdown-item-text">General GP Consultations</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('services.prescriptions') ? 'active' : '' }}" href="{{ route('services.prescriptions') }}">
                                    <span class="dropdown-item-icon"><i class="bi bi-file-earmark-medical"></i></span>
                                    <span class="dropdown-item-text">Prescriptions & Medical</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('services.cannabis') ? 'active' : '' }}" href="{{ route('services.cannabis') }}">
                                    <span class="dropdown-item-icon"><i class="bi bi-flower1"></i></span>
                                    <span class="dropdown-item-text">Medicinal Cannabis Consultations</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('services.mental-health') ? 'active' : '' }}" href="{{ route('services.mental-health') }}">
                                    <span class="dropdown-item-icon"><i class="bi bi-heart-pulse"></i></span>
                                    <span class="dropdown-item-text">Mental Health & Wellbeing</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('services.urgent-care') ? 'active' : '' }}" href="{{ route('services.urgent-care') }}">
                                    <span class="dropdown-item-icon"><i class="bi bi-clock-history"></i></span>
                                    <span class="dropdown-item-text">Urgent & After Hours Care</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('services.compounding') ? 'active' : '' }}" href="{{ route('services.compounding') }}">
                                    <span class="dropdown-item-icon"><i class="bi bi-capsule"></i></span>
                                    <span class="dropdown-item-text">Health Cannabis Compounding</span>
                                </a>
                            </li>
                            <li><hr class="dropdown-divider my-2 opacity-10"></li>
                            <li>
                                <a class="dropdown-item dropdown-item-all d-flex align-items-center justify-content-between" href="{{ route('services') }}">
                                    <span>View All Services</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-semibold {{ request()->routeIs('about') ? 'active text-brand-primary' : 'text-brand-contrast' }}" href="{{ route('about') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold {{ request()->routeIs('how-it-works') ? 'active text-brand-primary' : 'text-brand-contrast' }}" href="{{ route('how-it-works') }}">How It Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold {{ request()->routeIs('doctors') ? 'active text-brand-primary' : 'text-brand-contrast' }}" href="{{ route('doctors') }}">Doctors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold {{ request()->routeIs('contact') ? 'active text-brand-primary' : 'text-brand-contrast' }}" href="{{ route('contact') }}">Contact Us</a>
                    </li>
                </ul>

                <!-- Header CTA Buttons (Book Appointment & Login) -->
                <div class="d-flex align-items-center gap-2 ms-2">
                    <button type="button" class="btn btn-nav-book shadow-sm" data-bs-toggle="modal" data-bs-target="#consultBookingModal">
                        Book Appointment
                    </button>
                    <a href="{{ route('login') }}" class="btn btn-nav-login shadow-sm">
                        Login
                    </a>
                </div>
            </div>

            <!-- Mobile Offcanvas Menu -->
            <div class="offcanvas offcanvas-end offcanvas-zymika-mobile d-lg-none" tabindex="-1" id="navbarOffcanvas" aria-labelledby="navbarOffcanvasLabel">
                <div class="offcanvas-header border-bottom py-3 px-4 bg-white">
                    <h5 class="offcanvas-title m-0" id="navbarOffcanvasLabel">
                        @include('partials.logo')
                    </h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body d-flex flex-column justify-content-between p-4 bg-white">
                    <ul class="nav flex-column gap-1 mb-4 mobile-nav-list">
                        <li class="nav-item">
                            <a class="nav-link mobile-nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                                <span class="mobile-nav-icon"><i class="bi bi-house-door"></i></span>
                                <span>Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mobile-nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#mobileServicesCollapse" role="button" aria-expanded="false">
                                <span class="d-flex align-items-center gap-2">
                                    <span class="mobile-nav-icon"><i class="bi bi-grid-fill"></i></span>
                                    <span>Services</span>
                                </span>
                                <i class="bi bi-chevron-down fs-6 opacity-75"></i>
                            </a>
                            <div class="collapse mobile-sub-collapse ps-3 pe-2 py-2 mt-1 rounded-3" id="mobileServicesCollapse">
                                <ul class="list-unstyled mb-0 d-flex flex-column gap-1">
                                    <li><a href="{{ route('services.gp') }}" class="mobile-sub-link">General GP Consultations</a></li>
                                    <li><a href="{{ route('services.prescriptions') }}" class="mobile-sub-link">Prescriptions & Medical</a></li>
                                    <li><a href="{{ route('services.cannabis') }}" class="mobile-sub-link">Medicinal Cannabis Consultations</a></li>
                                    <li><a href="{{ route('services.mental-health') }}" class="mobile-sub-link">Mental Health & Wellbeing</a></li>
                                    <li><a href="{{ route('services.urgent-care') }}" class="mobile-sub-link">Urgent & After Hours Care</a></li>
                                    <li><a href="{{ route('services.compounding') }}" class="mobile-sub-link">Health Cannabis Compounding</a></li>
                                    <li><a href="{{ route('services') }}" class="mobile-sub-link fw-bold text-brand-primary pt-1">All Services →</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mobile-nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                                <span class="mobile-nav-icon"><i class="bi bi-info-circle"></i></span>
                                <span>About Us</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mobile-nav-link {{ request()->routeIs('how-it-works') ? 'active' : '' }}" href="{{ route('how-it-works') }}">
                                <span class="mobile-nav-icon"><i class="bi bi-arrow-repeat"></i></span>
                                <span>How It Works</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mobile-nav-link {{ request()->routeIs('doctors') ? 'active' : '' }}" href="{{ route('doctors') }}">
                                <span class="mobile-nav-icon"><i class="bi bi-person-badge"></i></span>
                                <span>Doctors</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mobile-nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                                <span class="mobile-nav-icon"><i class="bi bi-envelope"></i></span>
                                <span>Contact Us</span>
                            </a>
                        </li>
                    </ul>

                    <div class="d-flex flex-column gap-2.5 pt-3 border-top mobile-cta-wrapper">
                        <button type="button" class="btn btn-mobile-book" data-bs-dismiss="offcanvas" data-bs-toggle="modal" data-bs-target="#consultBookingModal">
                            <i class="bi bi-calendar2-check"></i>
                            <span>Book Appointment</span>
                        </button>
                        <a href="{{ route('login') }}" class="btn btn-mobile-login">
                            <i class="bi bi-box-arrow-in-right"></i>
                            <span>Login to Portal</span>
                        </a>
                        <a href="tel:0411174173" class="btn btn-mobile-call">
                            <i class="bi bi-telephone-fill"></i>
                            <span>0411174173</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
