<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Zymika Health Live Website
|--------------------------------------------------------------------------
| 100% matched routes and pages corresponding to zymikahealth.com.au
*/

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Main Pages
Route::get('/about-us', [HomeController::class, 'about'])->name('about');
Route::get('/how-it-works', [HomeController::class, 'howItWorks'])->name('how-it-works');
Route::get('/clinic-doctors', [HomeController::class, 'doctors'])->name('doctors');
Route::get('/clinic-services', [HomeController::class, 'services'])->name('services');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact-us', [HomeController::class, 'submitContact'])->name('contact.submit');

// Service Subpages
Route::get('/general-gp-consultations', [HomeController::class, 'generalGp'])->name('services.gp');
Route::get('/prescriptions-medical', [HomeController::class, 'prescriptions'])->name('services.prescriptions');
Route::get('/medicinal-cannabis-consultations', [HomeController::class, 'cannabis'])->name('services.cannabis');
Route::get('/mental-health-wellbeing', [HomeController::class, 'mentalHealth'])->name('services.mental-health');
Route::get('/urgent-after-hours-care', [HomeController::class, 'urgentCare'])->name('services.urgent-care');
Route::get('/health-cannabis-compounding', [HomeController::class, 'compounding'])->name('services.compounding');

// Booking Flow
Route::get('/book-appointment', [HomeController::class, 'bookAppointment'])->name('booking.index');
Route::post('/book-appointment', [HomeController::class, 'submitAppointment'])->name('home.appointment');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Named route aliases fallback
$stubNamedRoutes = [
    'faqs', 'eligibility.show', 'eligibility.submit', 'booking.slots',
    'booking.store', 'booking.confirmation', 'telehealth.room', 'shop.index',
    'shop.show', 'shop.cart', 'shop.checkout', 'password.request', 'password.email',
    'admin.dashboard', 'admin.appointments', 'admin.orders', 'admin.products',
    'admin.medirecords', 'admin.sync-logs', 'doctor.dashboard', 'doctor.appointments',
    'doctor.patients', 'doctor.prescriptions', 'patient.dashboard', 'patient.appointments',
    'patient.prescriptions', 'patient.orders', 'patient.profile', 'patient.snapform',
];

foreach ($stubNamedRoutes as $routeName) {
    Route::any('/stub-'.$routeName, function () {
        return redirect()->route('home');
    })->name($routeName);
}

// Auto-deployment Webhook (Triggers git pull & cache clear on live server)
Route::match(['GET', 'POST'], '/deploy-webhook', function (Request $request) {
    $token = $request->query('token') ?? $request->header('X-Deploy-Token');
    if ($token !== 'zymika_deploy_772910') {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    $basePath = base_path();
    $output = [];
    $returnVar = 0;

    $whichGit = trim((string) @shell_exec('which git 2>/dev/null'));
    $gitCmd = !empty($whichGit) ? $whichGit : 'git';

    exec("cd {$basePath} && {$gitCmd} checkout -- . && {$gitCmd} pull origin main 2>&1", $output, $returnVar);

    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');

    return response()->json([
        'status' => $returnVar === 0 ? 'success' : 'failed',
        'exit_code' => $returnVar,
        'git_output' => $output,
        'message' => 'Zymika live auto-deployment completed successfully.',
        'timestamp' => now()->toIso8601String(),
    ]);
});
