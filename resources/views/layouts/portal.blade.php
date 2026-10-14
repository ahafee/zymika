<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Portal') - ZYMIKA HEALTH Telehealth</title>
    
    <!-- Favicon & Brand Icons -->
    <link rel="icon" type="image/png" href="{{ asset('images/Final-File.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/Final-File.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,600&family=Outfit:wght@500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5.3 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Custom Theme Styling -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    
    <!-- AOS (Animate On Scroll) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.3/dist/cdn.min.js"></script>

    @stack('styles')
</head>
<body class="bg-light">

    <!-- Portal Top Bar (Static, non-sticky) -->
    <header class="bg-white border-bottom py-2 px-3 px-md-4 shadow-sm" style="background-color: #FFFFFF !important;">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <!-- Mobile Sidebar Toggle -->
                <button class="btn btn-sm btn-light border d-md-none rounded-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#portalSidebarOffcanvas">
                    <i class="bi bi-list fs-5"></i>
                </button>

                <a href="{{ route('home') }}" class="d-flex align-items-center text-decoration-none">
                    @include('partials.logo')
                </a>
                
                <span class="badge badge-tga px-3 py-1 small rounded-pill d-none d-sm-inline-flex align-items-center">
                    <i class="bi bi-shield-check text-success me-1"></i>
                    @if(Auth::user()->isAdmin()) Admin Hub @elseif(Auth::user()->isDoctor()) Doctor Hub @else Patient Hub @endif
                </span>
            </div>

            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('home') }}" class="btn btn-sm btn-vip-action d-none d-md-inline-flex">
                    <i class="bi bi-box-arrow-up-right text-brand-primary"></i> Public Website
                </a>
                
                <div class="dropdown">
                    <button class="btn btn-sm bg-light border dropdown-toggle d-flex align-items-center gap-2 py-1 px-2 rounded-pill shadow-xs" type="button" data-bs-toggle="dropdown">
                        <div class="avatar-vip" style="width: 28px; height: 28px; font-size: 0.75rem;">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <span class="d-none d-sm-inline fw-semibold small text-brand-contrast pe-1">{{ Auth::user()->name }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 mt-2" style="min-width: 220px;">
                        <li class="px-3 py-2 border-bottom bg-light bg-opacity-50">
                            <div class="fw-bold small text-brand-contrast">{{ Auth::user()->name }}</div>
                            <div class="text-muted" style="font-size: 0.75rem;">{{ Auth::user()->email }}</div>
                            <span class="badge bg-brand-primary text-white mt-1" style="font-size: 0.65rem;">{{ strtoupper(Auth::user()->role) }}</span>
                        </li>
                        @if(Auth::user()->isPatient())
                            <li><a class="dropdown-item py-2" href="{{ route('patient.profile') }}"><i class="bi bi-person-gear me-2 text-brand-primary"></i> Profile & Medicare</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('patient.prescriptions') }}"><i class="bi bi-capsule me-2 text-brand-sage"></i> Prescriptions</a></li>
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
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <!-- Desktop VIP Sidebar -->
            <nav class="col-md-3 col-lg-2 d-none d-md-block portal-sidebar p-3">
                <div class="position-sticky pt-2">
                    <!-- User Profile & Status Card -->
                    <div class="p-3 mb-4 rounded-3 border border-secondary border-opacity-25" style="background: rgba(255, 255, 255, 0.04);">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="pulse-dot"></span>
                            <span class="badge bg-success bg-opacity-25 text-success border border-success" style="font-size: 0.68rem;">EHR Live Gateway</span>
                        </div>
                        <div class="fw-bold text-white fs-6">{{ Auth::user()->name }}</div>
                        <div class="text-white-50 small" style="font-size: 0.75rem;">{{ Str::limit(Auth::user()->email, 22) }}</div>
                    </div>

                    <ul class="nav flex-column">
                        @if(Auth::user()->isPatient())
                            <div class="small text-uppercase fw-bold text-white-50 px-3 mb-2" style="font-size: 0.68rem; letter-spacing: 0.08em;">Patient Area</div>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('patient.dashboard') ? 'active' : '' }}" href="{{ route('patient.dashboard') }}">
                                    <i class="bi bi-speedometer2"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('patient.appointments') ? 'active' : '' }}" href="{{ route('patient.appointments') }}">
                                    <i class="bi bi-calendar-event"></i> Consultations
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('patient.prescriptions') ? 'active' : '' }}" href="{{ route('patient.prescriptions') }}">
                                    <i class="bi bi-capsule"></i> Prescriptions
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('patient.snapform') ? 'active' : '' }}" href="{{ route('patient.snapform') }}">
                                    <i class="bi bi-file-earmark-medical"></i> Pre-Consult Form
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('patient.profile') ? 'active' : '' }}" href="{{ route('patient.profile') }}">
                                    <i class="bi bi-person-badge"></i> Profile & Medicare
                                </a>
                            </li>
                            <li class="nav-item mt-4 pt-3 border-top border-secondary border-opacity-25">
                                <a class="btn btn-brand-primary w-100 btn-sm mb-2 fw-semibold" href="{{ route('booking.index') }}">
                                    <i class="bi bi-plus-circle"></i> Book New Consult
                                </a>
                            </li>
                        @elseif(Auth::user()->isDoctor())
                            <div class="small text-uppercase fw-bold text-white-50 px-3 mb-2" style="font-size: 0.68rem; letter-spacing: 0.08em;">Clinical Practice</div>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('doctor.dashboard') ? 'active' : '' }}" href="{{ route('doctor.dashboard') }}">
                                    <i class="bi bi-speedometer2"></i> Doctor Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('doctor.appointments') ? 'active' : '' }}" href="{{ route('doctor.appointments') }}">
                                    <i class="bi bi-calendar2-week"></i> Daily Schedule
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('doctor.patients') ? 'active' : '' }}" href="{{ route('doctor.patients') }}">
                                    <i class="bi bi-people"></i> Patient Records (EHR)
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('doctor.prescriptions') ? 'active' : '' }}" href="{{ route('doctor.prescriptions') }}">
                                    <i class="bi bi-prescription2"></i> Issue Prescriptions
                                </a>
                            </li>
                        @elseif(Auth::user()->isAdmin())
                            <div class="small text-uppercase fw-bold text-white-50 px-3 mb-2" style="font-size: 0.68rem; letter-spacing: 0.08em;">Practice Operations</div>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                                    <i class="bi bi-speedometer2"></i> Executive Overview
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.appointments') ? 'active' : '' }}" href="{{ route('admin.appointments') }}">
                                    <i class="bi bi-calendar2-check"></i> Consultations
                                </a>
                            </li>
                            <div class="small text-uppercase fw-bold text-white-50 px-3 mt-3 mb-2" style="font-size: 0.68rem; letter-spacing: 0.08em;">Integrations & Health</div>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.medirecords') ? 'active' : '' }}" href="{{ route('admin.medirecords') }}">
                                    <i class="bi bi-cloud-arrow-up"></i> MediRecords Hub
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.sync-logs') ? 'active' : '' }}" href="{{ route('admin.sync-logs') }}">
                                    <i class="bi bi-journal-code"></i> Integration Logs
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>

            <!-- Mobile Sidebar Offcanvas -->
            <div class="offcanvas offcanvas-start d-md-none portal-sidebar text-white" tabindex="-1" id="portalSidebarOffcanvas">
                <div class="offcanvas-header border-bottom border-secondary border-opacity-25">
                    <h5 class="offcanvas-title fw-bold">Menu Navigation</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body p-3">
                    <div class="p-3 mb-4 rounded-3 border border-secondary border-opacity-25" style="background: rgba(255, 255, 255, 0.04);">
                        <div class="fw-bold">{{ Auth::user()->name }}</div>
                        <div class="text-white-50 small">{{ Auth::user()->email }}</div>
                    </div>
                    <ul class="nav flex-column">
                        @if(Auth::user()->isPatient())
                            <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('patient.dashboard') }}"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a></li>
                            <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('patient.appointments') }}"><i class="bi bi-calendar-event me-2"></i> Consultations</a></li>
                            <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('patient.prescriptions') }}"><i class="bi bi-capsule me-2"></i> Prescriptions</a></li>
                            <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('patient.snapform') }}"><i class="bi bi-file-earmark-medical me-2"></i> Pre-Consult Form</a></li>
                            <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('patient.profile') }}"><i class="bi bi-person-badge me-2"></i> Profile & Medicare</a></li>
                        @elseif(Auth::user()->isDoctor())
                            <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('doctor.dashboard') }}"><i class="bi bi-speedometer2 me-2"></i> Doctor Dashboard</a></li>
                            <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('doctor.appointments') }}"><i class="bi bi-calendar2-week me-2"></i> Daily Schedule</a></li>
                            <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('doctor.patients') }}"><i class="bi bi-people me-2"></i> Patient Records</a></li>
                            <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('doctor.prescriptions') }}"><i class="bi bi-prescription2 me-2"></i> Issue Prescriptions</a></li>
                        @elseif(Auth::user()->isAdmin())
                            <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2 me-2"></i> Practice Overview</a></li>
                            <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('admin.appointments') }}"><i class="bi bi-calendar2-check me-2"></i> Consultations</a></li>
                            <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('admin.medirecords') }}"><i class="bi bi-cloud-arrow-up me-2"></i> MediRecords Hub</a></li>
                            <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('admin.sync-logs') }}"><i class="bi bi-journal-code me-2"></i> Integration Logs</a></li>
                        @endif
                    </ul>
                </div>
            </div>

            <!-- Main Content Area -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                @include('partials.alerts')
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 650,
                    easing: 'ease-out-cubic',
                    once: true,
                    offset: 20
                });
            }
        });
    </script>
    @stack('scripts')
</body>
</html>