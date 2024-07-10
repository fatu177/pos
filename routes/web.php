<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\laporanController;
use App\Http\Controllers\PenjualanController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'login'])->name('loginaction');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
Route::middleware(['auth', 'Admin'])->group(function () {

    Route::resource('level', LevelController::class);
    Route::resource('user', UserController::class);
    Route::resource('KategoriBarang', KategoriBarangController::class);
    Route::resource('barang', BarangController::class);
});
Route::middleware(['auth', 'Kasir'])->group(function () {
    Route::resource('transaksi', PenjualanController::class);
});
Route::middleware(['auth', 'Pimpinan'])->group(function () {
    Route::get('laporan', [laporanController::class,'index'])->name('laporan');
});
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});