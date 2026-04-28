<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::view('/tentang', 'tentang');
Route::get('/hitung/{a}/{b}', function($a, $b) {
    $hasil = $a + $b;
    return "Hasil penjumlahan dari $a + $b adalah: " . $hasil;
});

