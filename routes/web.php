<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LaporanController;

// Route Welcome Page
Route::get('/', function () {
    return view('welcome');
});

// Route Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route Barang
Route::prefix('barang')->group(function () {
    Route::get('/', [BarangController::class, 'index'])->name('barang.index');
    Route::get('/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/', [BarangController::class, 'store'])->name('barang.store');
    Route::patch('/{kode_barang}/update-stok', [BarangController::class, 'updateStok'])->name('barang.update-stok');

    // Route Belanja Barang
    Route::post('/belanja/{kode_barang}', [BarangController::class, 'prosesBelanja'])->name('barang.belanja');

    // Route Penjualan Barang
    Route::post('/jual/{kode_barang}', [BarangController::class, 'prosesPenjualan'])->name('barang.jual');
});

// Route Laporan
Route::prefix('laporan')->group(function () {
    Route::get('/belanja', [LaporanController::class, 'index'])->name('laporan.belanja');
    Route::get('/', [LaporanController::class, 'index'])->name('laporan.index');
});
