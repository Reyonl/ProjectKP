<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('laporan_penjualan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaksi_id');
            $table->integer('total_penjualan'); // Total pendapatan
            $table->integer('jumlah_barang_terjual'); // Jumlah barang yang terjual
            $table->date('periode'); // Untuk mencatat bulan dan tahun
            $table->timestamps();

            // Relasi ke tabel transaksi_penjualan
            $table->foreign('transaksi_id')->references('id')->on('transaksi_penjualan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_penjualan');
    }
};
