<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrganisasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

// Route::middleware('auth')->resource('organisasi', OrganisasiController::class);

// Dashboard: Bisa diakses semua yang sudah login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grup Route yang butuh Login (Auth)
Route::middleware('auth')->group(function () {

    // Rute Profil User
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /* | Rute Khusus Admin (Ketua)
    | Menggunakan middleware 'cek_role' yang sudah didaftarkan di bootstrap/app.php
    */
    Route::middleware(['cek_role:admin'])->group(function () {
        // CRUD Organisasi (Hanya admin yang bisa tambah/hapus/edit organisasi lain)
        Route::resource('organisasi', OrganisasiController::class);
    });

    Route::middleware('auth')->group(function () {
        Route::get('/organisasi-search', [OrganisasiController::class, 'search'])->name('organisasi.search');
        Route::get('/preferences', [ProfileController::class, 'editPreferences'])->name('preferences.edit');
        Route::post('/save-preferences', [ProfileController::class, 'savePreferences'])->name('preferences.save');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/dashboard/reset-visit', [DashboardController::class, 'resetVisit'])->name('dashboard.reset_visit');
    });
});

// Mengambil rute bawaan Laravel Breeze (Login, Register, Logout, dll)
require __DIR__.'/auth.php';
