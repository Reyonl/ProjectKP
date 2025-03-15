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
        Schema::create('service', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_service');
            $table->string('nomor_faktur')->unique();
            $table->string('kode_teknisi')->nullable();
            $table->string('nama_pelanggan');
            $table->string('type_barang');
            $table->string('jenis_service');
            $table->decimal('biaya_service', 10, 2);
            $table->decimal('biaya_sparepart', 10, 2);
            $table->decimal('total', 10, 2);
            $table->string('kode_toko')->nullable();
            $table->enum('status_tebus', ['Lunas', 'Belum Lunas']);
            $table->foreign('kode_teknisi')->references('kode_teknisi')->on('teknisi')->onDelete('set null');
            $table->foreign('kode_toko')->references('kode_toko')->on('toko')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
