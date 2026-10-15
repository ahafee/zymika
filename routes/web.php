<?php

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Zymika Health
|--------------------------------------------------------------------------
| Only Home Page is enabled. All other pages, portals, and admin routes
| are locked and redirect back to the home page.
*/

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Appointment Request Handler (Returns to home page with success notification)
Route::post('/book-appointment', function (Request $request) {
    return redirect('/#booking')->with('success', 'Thank you! Your telehealth appointment request has been received. Our team will contact you shortly.');
})->name('home.appointment');

// Named route aliases redirecting to home to ensure no RouteNotFoundException
$stubNamedRoutes = [
    'about', 'how-it-works', 'services', 'faqs', 'contact', 'contact.submit',
    'eligibility.show', 'eligibility.submit', 'booking.index', 'booking.slots',
    'booking.store', 'booking.confirmation', 'telehealth.room', 'shop.index',
    'shop.show', 'shop.cart', 'shop.checkout', 'login', 'login.submit', 'register',
    'register.submit', 'logout', 'password.request', 'password.email',
    'admin.dashboard', 'admin.appointments', 'admin.orders', 'admin.products',
    'admin.medirecords', 'admin.sync-logs', 'doctor.dashboard', 'doctor.appointments',
    'doctor.patients', 'doctor.prescriptions', 'patient.dashboard', 'patient.appointments',
    'patient.prescriptions', 'patient.orders', 'patient.profile', 'patient.snapform'
];

foreach ($stubNamedRoutes as $routeName) {
    Route::any('/stub-'.$routeName, function () {
        return redirect()->route('home');
    })->name($routeName);
}

// Redirect all other URLs and admin back to home page
Route::any('{any}', function () {
    return redirect()->route('home');
})->where('any', '.*');
