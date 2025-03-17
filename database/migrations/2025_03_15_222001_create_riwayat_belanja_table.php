<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('riwayat_belanja', function (Blueprint $table) {
        $table->id();
        $table->string('kode_barang'); // Menggunakan kode_barang sebagai relasi
        $table->integer('jumlah');
        $table->date('tanggal_belanja');
        $table->timestamps();

        $table->foreign('kode_barang')->references('kode_barang')->on('barang')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_belanja');
    }
};
