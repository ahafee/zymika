<?php

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
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

// Redirect all other URLs and admin back to home page
Route::any('{any}', function () {
    return redirect()->route('home');
})->where('any', '.*');
