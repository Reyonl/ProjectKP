<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualan extends Model
{
    use HasFactory;

    protected $table = 'transaksi_penjualan'; // Nama tabel di database

    protected $fillable = [
        'kode_barang',
        'jumlah',
        'total',
        'tanggal',
    ];

    // Jika ingin menonaktifkan timestamp (created_at dan updated_at) jika tidak dipakai
    public $timestamps = true;
}
