<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ManageContactController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\WorkController;
use Illuminate\Support\Facades\Route;

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/about', 'about')->name('about.index');
    Route::get('/global-impact', 'globalImpact')->name('global-impact');
    Route::get('/message-from-ceo', 'ceoProfile')->name('ceo-speech');
    Route::get('/case-studies', 'caseStudy')->name('case-studies');
    Route::get('/privacy-policy', 'policy')->name('privacy.policy');
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
])->prefix('admin')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    
    Route::resource('/users', UserController::class)->names('admin.users');
    Route::resource('/roles', RoleController::class)->names('admin.roles');
    
    Route::post('/contacts/{contact}/toggle-star', [ManageContactController::class, 'toggleStar'])->name('admin.contacts.toggleStar');
    Route::post('/contacts/{contact}/archive', [ManageContactController::class, 'archive'])->name('admin.contacts.archive');
    Route::post('/contacts/bulk-action', [ManageContactController::class, 'bulkAction'])->name('admin.contacts.bulkAction');
    Route::resource('/contacts', ManageContactController::class)->names('admin.contacts');
});

Route::controller(ProfileController::class)->prefix('account')->group(function () {
    Route::get('/change-password', 'updatePassword')->name('profile.password.update');
    Route::get('/two-factor-authentication', 'twoFactorAuthentication')->name('profile.two_factor_authentication');
    Route::get('/settings', 'profileSettings')->name('profile.settings');
});
