<?php

use App\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Route;

Route::post('/webhooks/medirecords', [WebhookController::class, 'medirecords'])->name('api.webhooks.medirecords');
Route::post('/webhooks/snapforms', [WebhookController::class, 'snapforms'])->name('api.webhooks.snapforms');
