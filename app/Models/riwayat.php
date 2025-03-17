<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    protected $table = 'riwayat_belanja';
    protected $fillable = ['kode_barang', 'jumlah', 'tanggal_belanja'];

    public function barang()
{
    return $this->belongsTo(Barang::class, 'kode_barang', 'kode_barang');
}

}
