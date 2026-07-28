<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/contact', function () {
    return view('frontend.pages.contact');
})->name('contact.index');
Route::get('/about', function () {
    return view('frontend.pages.about');
})->name('about.index');
Route::get('/services', function () {
    return view('frontend.pages.service');
})->name('service.index');
Route::get('/service/{service}', function () {
    return view('frontend.pages.service-detail');
})->name('service.show');
Route::get('/global-impact', function () {
    return view('frontend.pages.global-impact');
})->name('global-impact');
Route::get('/message-from-ceo', function () {
    return view('frontend.pages.ceo-profile');
})->name('ceo-speech');
Route::get('/privacy-policy', function () {
    return view('frontend.pages.policy');
})->name('privacy.policy');
Route::get('/privacy-policy', function () {
    return view('frontend.pages.policy');
})->name('privacy.policy');
Route::get('/terms-and-conditions', function () {
    return view('frontend.pages.terms');
})->name('terms.conditions');
Route::get('/our-works', function () {
    return view('frontend.pages.work');
})->name('work.index');
Route::get('/work/{work}', function () {
    return view('frontend.pages.work-detail');
})->name('work.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
