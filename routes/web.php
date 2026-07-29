<?php

use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\WorkController;
use Illuminate\Support\Facades\Route;

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/about', 'about')->name('about.index');
    Route::get('/global-impact', 'globalImpact')->name('global-impact');
    Route::get('/message-from-ceo', 'ceoProfile')->name('ceo-speech');
    Route::get('/privacy-policy', 'policy')->name('privacy.policy');
    Route::get('/case-studies', 'caseStudy')->name('case-studies');
    Route::get('/terms-and-conditions', 'terms')->name('terms.conditions');
});

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/submission-successfull', [ContactController::class, 'success'])->name('contact.success');
Route::get('/services', [ServiceController::class, 'index'])->name('service.index');
Route::get('/service/{service}', [ServiceController::class, 'show'])->name('service.show');
Route::get('/our-works', [WorkController::class, 'index'])->name('work.index');
Route::get('/work/{work}', [WorkController::class, 'show'])->name('work.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
});
