<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// ✅ Route untuk guest (belum login)
Route::middleware('guest')->group(function () {
    Volt::route('login', 'auth.login')->name('login');
    Volt::route('forgot-password', 'auth.forgot-password')->name('password.request');
    Volt::route('reset-password/{token}', 'auth.reset-password')->name('password.reset');
});

// ✅ Route untuk admin (hanya admin yang login bisa akses register)
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Volt::route('register', 'auth.register')->name('register');
});

// ✅ Route untuk user yang sudah login
Route::middleware('auth')->group(function () {
    Volt::route('verify-email', 'auth.verify-email')->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Volt::route('confirm-password', 'auth.confirm-password')->name('password.confirm');
});

// ✅ Logout route
Route::post('logout', App\Livewire\Actions\Logout::class)->name('logout');
