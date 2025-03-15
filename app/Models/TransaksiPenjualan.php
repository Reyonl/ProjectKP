<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class TransaksiPenjualan extends Model
{
    protected $table = 'transaksi_penjualan';
    use HasFactory;
    protected $fillable = ['kode_barang', 'jumlah', 'total', 'tanggal'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kode_barang');
    }
}

