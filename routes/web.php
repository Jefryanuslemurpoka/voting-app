<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\UserController; // ✅ tambahkan import ini
use App\Models\Candidate;

// Root → redirect ke login
Route::redirect('/', '/login')->name('home');

// Dashboard untuk Admin (hanya role admin)
Route::middleware(['auth', 'verified', 'isAdmin'])->group(function () {
    Route::view('/admin/dashboard', 'dashboard.admin')->name('admin.dashboard');

    // 🔹 List Calon
    Route::get('/admin/candidates', [CandidateController::class, 'index'])->name('admin.candidates.index');

    // 🔹 Tambah Calon (form input calon)
    Route::view('/admin/candidates/create', 'dashboard.candidate.create')->name('admin.candidates.create');

    // 🔹 Simpan data calon (post)
    Route::post('/admin/candidates', [CandidateController::class, 'store'])->name('admin.candidates.store');

    // 🔹 Alias tambahan supaya bisa dipanggil dengan route('candidates.store')
    Route::post('/candidates', [CandidateController::class, 'store'])->name('candidates.store');

    // 🔹 Edit Calon
    Route::get('/candidates/{id}/edit', [CandidateController::class, 'edit'])->name('candidates.edit');
    Route::put('/candidates/{id}', [CandidateController::class, 'update'])->name('candidates.update');

    // 🔹 Hapus Calon
    Route::delete('/candidates/{id}', [CandidateController::class, 'destroy'])->name('candidates.destroy');

    // 🔹 Daftar User (tanpa admin)
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');

    // 🔹 Reset Vote User
    Route::patch('/admin/users/{id}/reset-vote', [UserController::class, 'resetVote'])
        ->name('admin.users.resetVote');

    Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('/admin/votes', [VoteController::class, 'index'])->name('admin.votes.index');

});

// Dashboard untuk User (hanya role user)
Route::middleware(['auth', 'verified', 'isUser'])->group(function () {
    // User Dashboard
    Route::get('/user/dashboard', function () {
        $candidates = Candidate::all(); // ambil semua calon
        return view('dashboard.user', compact('candidates'));
    })->name('user.dashboard');

    // Route untuk vote
    Route::post('/vote/{candidate}', [VoteController::class, 'store'])->name('user.vote');
});

// 🔹 Alias untuk dashboard biar tidak error
Route::get('/dashboard', function () {
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('user.dashboard');
})->middleware('auth')->name('dashboard');

// Settings hanya bisa diakses user yang login
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

// Auth routes (bawaan Breeze/Fortify)
require __DIR__ . '/auth.php';
