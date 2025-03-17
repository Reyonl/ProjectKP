<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'riwayat_belanja'; // Sesuaikan dengan nama tabel

    protected $fillable = [
        'nama_sparepart',
        'jumlah',
        'tanggal_belanja',
    ];

    public $timestamps = true;

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
