<header class="sticky-top shadow-sm header-zovi-wrapper">
    <!-- Top Announcement & Medical Hotline Bar -->
    <div class="top-notice-bar py-2">
        <div class="container-fluid px-3 px-lg-4 px-xxl-5 d-flex flex-wrap justify-content-between align-items-center gap-2" style="max-width: 1560px;">
            <div class="d-flex align-items-center flex-wrap gap-2 gap-md-3">
                <span class="d-inline-flex align-items-center gap-2 text-white">
                    <span class="small"><i class="bi bi-patch-check-fill text-brand-primary me-1"></i> AHPRA Accredited Telehealth Clinic</span>
                </span>
                <span class="d-none d-lg-inline opacity-25 text-white">|</span>
                <span class="d-none d-lg-inline text-light opacity-90 small">
                    <i class="bi bi-geo-alt-fill text-brand-primary me-1"></i> Level 1, 63-73 Ann St, Surry Hills NSW 2010
                </span>
            </div>
            
            <div class="d-flex align-items-center gap-2 gap-sm-3 ms-auto ms-sm-0"> 
                <a href="mailto:care@zovihealth.com.au" class="badge bg-white bg-opacity-10 text-white border border-white border-opacity-25 d-none d-sm-inline-flex align-items-center py-1 px-2 fw-semibold text-decoration-none" style="font-size: 0.76rem; letter-spacing: 0.02em;"> 
                    <i class="bi bi-envelope-fill text-brand-primary me-1 fs-6"></i> care@zovihealth.com.au
                </a> 

                <a href="tel:0258385365" class="top-phone-link text-white text-decoration-none fw-bold small d-inline-flex align-items-center gap-1.5 px-3 py-1 rounded-pill"> 
                    <i class="bi bi-telephone-fill text-brand-primary"></i> 02 5838 5365
                </a> 
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-zovi">
        <div class="container-fluid px-3 px-lg-4 px-xxl-5" style="max-width: 1560px;">
            <a class="navbar-brand d-flex align-items-center me-2 me-xl-4 py-1" href="{{ route('home') }}">
                @include('partials.logo')
            </a>
            
            <div class="d-flex align-items-center gap-2 d-lg-none">
                @php $cartCount = count(session('cart', [])); @endphp
                <a href="{{ route('shop.cart') }}" class="btn btn-sm btn-light position-relative border" title="Cart">
                    <i class="bi bi-bag text-brand-contrast"></i>
                    @if($cartCount > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-brand-primary">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>
                <button class="navbar-toggler border-0 shadow-none p-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvas" aria-controls="navbarOffcanvas" aria-label="Toggle navigation">
                    <i class="bi bi-list fs-1 text-brand-contrast"></i>
                </button>
            </div>

            <!-- Desktop Nav Links -->
            <div class="collapse navbar-collapse d-none d-lg-flex" id="navbarMain">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-1 gap-xl-2">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('how-it-works') ? 'active' : '' }}" href="{{ route('how-it-works') }}">How It Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">Services &amp; Fees</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('shop.*') ? 'active' : '' }}" href="{{ route('shop.index') }}">Dispensary</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') || request()->routeIs('faqs') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-1.5 gap-xl-2 ms-2">
                    <!-- Cart Indicator -->
                    <a href="{{ route('shop.cart') }}" class="btn btn-light position-relative border nav-cart-btn" title="Dispensary Cart">
                        <i class="bi bi-bag text-brand-contrast"></i>
                        @if($cartCount > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-brand-primary">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>

                    <!-- Eligibility CTA -->
                    <a href="{{ route('eligibility.show') }}" class="btn btn-brand-outline btn-nav-cta">
                        <i class="bi bi-ui-checks"></i> Check Eligibility
                    </a>
                    
                    @auth
                        <div class="dropdown">
                            <button class="btn btn-brand-contrast dropdown-toggle btn-nav-cta" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle me-1"></i> {{ Str::limit(Auth::user()->name, 12) }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 mt-2">
                                <li class="px-3 py-2 bg-light border-bottom mb-2">
                                    <div class="fw-bold text-brand-contrast small">{{ Auth::user()->name }}</div>
                                    <div class="text-muted" style="font-size: 0.75rem;">{{ Auth::user()->email }}</div>
                                </li>
                                @if(Auth::user()->isAdmin())
                                    <li><a class="dropdown-item py-2" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2 text-brand-primary me-2"></i> Admin Dashboard</a></li>
                                    <li><a class="dropdown-item py-2" href="{{ route('admin.medirecords') }}"><i class="bi bi-cloud-arrow-up text-brand-sage me-2"></i> MediRecords Hub</a></li>
                                @elseif(Auth::user()->isDoctor())
                                    <li><a class="dropdown-item py-2" href="{{ route('doctor.dashboard') }}"><i class="bi bi-heart-pulse text-brand-primary me-2"></i> Doctor Portal</a></li>
                                    <li><a class="dropdown-item py-2" href="{{ route('doctor.appointments') }}"><i class="bi bi-calendar2-week text-brand-sage me-2"></i> Daily Schedule</a></li>
                                @else
                                    <li><a class="dropdown-item py-2" href="{{ route('patient.dashboard') }}"><i class="bi bi-person-badge text-brand-primary me-2"></i> Patient Portal</a></li>
                                    <li><a class="dropdown-item py-2" href="{{ route('patient.prescriptions') }}"><i class="bi bi-capsule text-brand-sage me-2"></i> My Prescriptions</a></li>
                                    <li><a class="dropdown-item py-2" href="{{ route('patient.orders') }}"><i class="bi bi-box-seam text-brand-contrast me-2"></i> Order History</a></li>
                                    <li><a class="dropdown-item py-2" href="{{ route('patient.profile') }}"><i class="bi bi-gear text-muted me-2"></i> Medicare Profile</a></li>
                                @endif
                                <li><hr class="dropdown-divider my-1"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger py-2"><i class="bi bi-box-arrow-right me-2"></i> Log Out</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-nav-light btn-nav-cta">
                            <i class="bi bi-box-arrow-in-right"></i> Log In
                        </a>
                        <a href="{{ route('booking.index') }}" class="btn btn-brand-primary btn-nav-cta shadow-sm">
                            <i class="bi bi-calendar2-check"></i> Book Consult
                        </a>
                    @endauth
                </div>
            </div>

            <!-- Mobile Offcanvas Menu -->
            <div class="offcanvas offcanvas-end d-lg-none" tabindex="-1" id="navbarOffcanvas" aria-labelledby="navbarOffcanvasLabel">
                <div class="offcanvas-header border-bottom bg-brand-soft">
                    <h5 class="offcanvas-title" id="navbarOffcanvasLabel">
                        @include('partials.logo')
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body d-flex flex-column">
                    <ul class="nav flex-column mb-auto">
                        <li class="nav-item mb-1"><a class="nav-link fw-semibold {{ request()->routeIs('home') ? 'active text-brand-primary' : 'text-brand-contrast' }}" href="{{ route('home') }}"><i class="bi bi-house-door me-2"></i> Home</a></li>
                        <li class="nav-item mb-1"><a class="nav-link fw-semibold {{ request()->routeIs('about') ? 'active text-brand-primary' : 'text-brand-contrast' }}" href="{{ route('about') }}"><i class="bi bi-info-circle me-2"></i> About Us</a></li>
                        <li class="nav-item mb-1"><a class="nav-link fw-semibold {{ request()->routeIs('how-it-works') ? 'active text-brand-primary' : 'text-brand-contrast' }}" href="{{ route('how-it-works') }}"><i class="bi bi-cpu me-2"></i> How It Works</a></li>
                        <li class="nav-item mb-1"><a class="nav-link fw-semibold {{ request()->routeIs('services') ? 'active text-brand-primary' : 'text-brand-contrast' }}" href="{{ route('services') }}"><i class="bi bi-card-checklist me-2"></i> Services &amp; Fees</a></li>
                        <li class="nav-item mb-1"><a class="nav-link fw-semibold {{ request()->routeIs('shop.*') ? 'active text-brand-primary' : 'text-brand-contrast' }}" href="{{ route('shop.index') }}"><i class="bi bi-shop me-2"></i> Dispensary Catalog</a></li>
                        <li class="nav-item mb-1"><a class="nav-link fw-semibold {{ request()->routeIs('contact') || request()->routeIs('faqs') ? 'active text-brand-primary' : 'text-brand-contrast' }}" href="{{ route('contact') }}"><i class="bi bi-question-circle me-2"></i> Contact</a></li>
                    </ul>

                    <div class="pt-4 border-top mt-3">
                        <a href="tel:0258385365" class="btn btn-light border w-100 mb-2 fw-semibold text-brand-contrast">
                            <i class="bi bi-telephone-fill text-brand-primary me-2"></i> Call 02 5838 5365
                        </a>
                        <a href="{{ route('eligibility.show') }}" class="btn btn-brand-outline w-100 mb-2 fw-semibold">
                            <i class="bi bi-ui-checks me-1"></i> Check Eligibility (60s)
                        </a>
                        <a href="{{ route('booking.index') }}" class="btn btn-brand-primary w-100 mb-3 fw-semibold shadow-sm">
                            <i class="bi bi-calendar2-check me-1"></i> Book Telehealth ($79)
                        </a>
                        @auth
                            <div class="text-center bg-light p-2 rounded">
                                <a href="{{ route('login') }}" class="btn btn-sm btn-brand-contrast w-100 mb-1">Open My Portal</a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-link text-danger text-decoration-none p-0">Log Out</button>
                                </form>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-light border w-100 text-brand-contrast fw-semibold">Patient Login</a>
                        @endauth
                    </div>
                </div>
            </div>

        </div>
    </nav>
</header>