<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'ZYMIKA HEALTH | Telehealth & Medicinal Cannabis Australia') - Zymika Health</title>
    
    <!-- Favicon & Brand Icons -->
    <link rel="icon" type="image/png" href="{{ asset('images/Final-File.png') }}?v=3">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/Final-File.png') }}?v=3">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/Final-File.png') }}?v=3">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,600&family=Outfit:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
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
<body class="d-flex flex-column min-vh-100">

    @include('partials.header')

    <main class="flex-grow-1">
        @yield('content')
    </main>

    @include('partials.alerts')

    @include('partials.consultation-modal')

    @include('partials.footer')

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 750,
                    easing: 'ease-out-cubic',
                    once: true,
                    offset: 30
                });
            }
        });
    </script>
    @stack('scripts')
</body>
</html>