<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{

    protected $table = 'stok';

    use HasFactory;
    protected $fillable = ['kode_barang', 'stok_awal', 'stok_akhir', 'tanggal_pembelian'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kode_barang');
    }
}

