<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'service';

    use HasFactory;
    protected $fillable = [
        'tanggal_service', 'nomor_faktur', 'kode_teknisi', 'nama_pelanggan', 'type_barang',
        'jenis_service', 'biaya_service', 'biaya_sparepart', 'total', 'kode_toko', 'status_tebus'
    ];

    public function teknisi()
    {
        return $this->belongsTo(Teknisi::class, 'kode_teknisi');
    }

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'kode_toko');
    }
}

