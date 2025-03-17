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
    Schema::table('barang', function (Blueprint $table) {
        $table->string('kategori')->nullable()->after('nama_sparepart'); // Tambahkan setelah kolom 'nama'
        $table->string('brand')->nullable()->after('kategori'); // Tambahkan setelah kolom 'kategori'
    });
}

public function down()
{
    Schema::table('barang', function (Blueprint $table) {
        $table->dropColumn('kategori');
        $table->dropColumn('brand');
    });
}
};
