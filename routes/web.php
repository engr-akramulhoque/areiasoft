<?php

use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\WorkController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/about', [FrontendController::class, 'about'])->name('about.index');
Route::get('/services', [ServiceController::class, 'index'])->name('service.index');
Route::get('/service/{service}', [ServiceController::class, 'show'])->name('service.show');
Route::get('/global-impact', [FrontendController::class, 'globalImpact'])->name('global-impact');
Route::get('/message-from-ceo', [FrontendController::class, 'ceoProfile'])->name('ceo-speech');
Route::get('/privacy-policy', [FrontendController::class, 'policy'])->name('privacy.policy');
Route::get('/terms-and-conditions', [FrontendController::class, 'terms'])->name('terms.conditions');
Route::get('/our-works', [WorkController::class, 'index'])->name('work.index');
Route::get('/work/{work}', [WorkController::class, 'show'])->name('work.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
});
