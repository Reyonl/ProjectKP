<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{


    use HasFactory;

    protected $table = 'barang'; // <- pastikan singular!
    protected $primaryKey = 'kode_barang';
    public $incrementing = false; // <- karena primary key pakai string
    protected $keyType = 'string';

    protected $fillable = ['kode_barang', 'nama_sparepart', 'modal', 'harga_jual'];

    public function stok()
    {
        return $this->hasOne(Stok::class, 'kode_barang');
    }

    public function transaksiPenjualan()
    {
        return $this->hasMany(TransaksiPenjualan::class, 'kode_barang');
    }
}
