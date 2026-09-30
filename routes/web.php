<?php

use App\Http\Controllers\AdminPortalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DoctorPortalController;
use App\Http\Controllers\EligibilityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientPortalController;
use Illuminate\Support\Facades\Route;

// Public Core Website Pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/how-it-works', [HomeController::class, 'howItWorks'])->name('how-it-works');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/faqs', [HomeController::class, 'faqs'])->name('faqs');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'submitContact'])->name('contact.submit');

// Eligibility Form (Interactive Assessment)
Route::get('/eligibility', [EligibilityController::class, 'show'])->name('eligibility.show');
Route::post('/eligibility', [EligibilityController::class, 'submit'])->name('eligibility.submit');

// Appointment Booking Flow
Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
Route::get('/booking/slots', [BookingController::class, 'getSlots'])->name('booking.slots');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/confirmation/{appointment_number}', [BookingController::class, 'confirmation'])->name('booking.confirmation');

// E-Commerce Dispensary (Disabled - Redirect to Services)
Route::get('/shop', function () {
    return redirect()->route('services');
})->name('shop.index');
Route::get('/shop/{slug}', function () {
    return redirect()->route('services');
})->name('shop.show');
Route::get('/cart', function () {
    return redirect()->route('services');
})->name('shop.cart');
Route::get('/checkout', function () {
    return redirect()->route('services');
})->name('shop.checkout');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');

// Patient Portal Routes
Route::middleware(['auth', 'role:patient'])->prefix('patient')->name('patient.')->group(function () {
    Route::get('/dashboard', [PatientPortalController::class, 'dashboard'])->name('dashboard');
    Route::get('/appointments', [PatientPortalController::class, 'appointments'])->name('appointments');
    Route::get('/prescriptions', [PatientPortalController::class, 'prescriptions'])->name('prescriptions');
    Route::get('/orders', [PatientPortalController::class, 'orders'])->name('orders');
    Route::get('/snapform', [PatientPortalController::class, 'snapforms'])->name('snapform');
    Route::post('/snapform', [PatientPortalController::class, 'submitSnapform'])->name('snapform.submit');
    Route::get('/profile', [PatientPortalController::class, 'profile'])->name('profile');
    Route::post('/profile', [PatientPortalController::class, 'updateProfile'])->name('profile.update');
});

// Doctor Portal Routes
Route::middleware(['auth', 'role:doctor'])->prefix('doctor')->name('doctor.')->group(function () {
    Route::get('/dashboard', [DoctorPortalController::class, 'dashboard'])->name('dashboard');
    Route::get('/appointments', [DoctorPortalController::class, 'appointments'])->name('appointments');
    Route::get('/consultation/{id}', [DoctorPortalController::class, 'consultationRoom'])->name('consultation');
    Route::post('/consultation/{id}/notes', [DoctorPortalController::class, 'saveConsultationNotes'])->name('consultation.notes');
    Route::get('/patients', [DoctorPortalController::class, 'patients'])->name('patients');
    Route::get('/prescriptions', [DoctorPortalController::class, 'prescriptions'])->name('prescriptions');
    Route::post('/prescriptions', [DoctorPortalController::class, 'issuePrescription'])->name('prescriptions.issue');
    Route::post('/appointments/{id}/sync', [DoctorPortalController::class, 'syncMediRecords'])->name('appointments.sync');
});

// Admin Portal Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminPortalController::class, 'dashboard'])->name('dashboard');
    Route::get('/appointments', [AdminPortalController::class, 'appointments'])->name('appointments');
    Route::post('/appointments/{id}/status', [AdminPortalController::class, 'updateAppointmentStatus'])->name('appointments.status');
    Route::get('/orders', [AdminPortalController::class, 'orders'])->name('orders');
    Route::post('/orders/{id}/status', [AdminPortalController::class, 'updateOrderStatus'])->name('orders.status');
    Route::get('/products', [AdminPortalController::class, 'products'])->name('products');
    Route::post('/products', [AdminPortalController::class, 'saveProduct'])->name('products.save');
    Route::get('/medirecords', [AdminPortalController::class, 'medirecords'])->name('medirecords');
    Route::post('/medirecords/test', [AdminPortalController::class, 'testMediRecords'])->name('medirecords.test');
    Route::post('/medirecords/reconcile', [AdminPortalController::class, 'runReconciliation'])->name('medirecords.reconcile');
    Route::post('/medirecords/settings', [AdminPortalController::class, 'saveMediRecordsSettings'])->name('medirecords.settings');
    Route::get('/sync-logs', [AdminPortalController::class, 'syncLogs'])->name('sync-logs');
});
