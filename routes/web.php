<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LaporanPenjualanController;

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
    Route::get('/barang/{kode_barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/barang/{kode_barang}', [BarangController::class, 'update'])->name('barang.update');

    // Route Belanja Barang
    Route::post('/belanja/{kode_barang}', [BarangController::class, 'prosesBelanja'])->name('barang.belanja');

    // Route Penjualan Barang
    Route::post('/jual/{kode_barang}', [BarangController::class, 'prosesPenjualan'])->name('barang.jual');
});

// Route Laporan
Route::prefix('laporan')->group(function () {
    Route::get('/', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/belanja', [LaporanController::class, 'belanja'])->name('laporan.belanja');
    Route::get('/{id}/edit', [LaporanController::class, 'edit'])->name('laporan.edit');
    Route::put('/{id}', [LaporanController::class, 'update'])->name('laporan.update');
    Route::delete('/{id}', [LaporanController::class, 'destroy'])->name('laporan.destroy');
});

// Route Riwayat Belanja
Route::resource('riwayat-belanja', LaporanController::class)
    ->except(['create', 'edit', 'update', 'destroy']);
Route::delete('riwayat-belanja/{id}', [LaporanController::class, 'destroy'])->name('riwayat_belanja.destroy');
use App\Http\Controllers\RiwayatBelanjaController;

Route::put('/riwayat-belanja/{id}', [RiwayatBelanjaController::class, 'update'])->name('riwayat_belanja.update');

// Route Laporan Penjualan (pastikan controller diimport)
Route::get('/laporan-penjualan', [LaporanPenjualanController::class, 'index'])->name('laporan-penjualan.index');
