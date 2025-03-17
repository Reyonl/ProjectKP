<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang'; // Tetap pakai nama tabel jamak
    protected $primaryKey = 'kode_barang';
    public $incrementing = false; // Primary key bertipe string
    protected $keyType = 'string';

    // Jika tidak ada kolom created_at dan updated_at di tabel barang
    public $timestamps = false;

    protected $fillable = ['kode_barang', 'nama_sparepart', 'modal', 'harga_jual', 'stok'];

    /**
     * Relasi ke tabel stok (One-to-One)
     */
    public function stok()
    {
        return $this->hasOne(Stok::class, 'kode_barang', 'kode_barang');
    }

    /**
     * Relasi ke tabel transaksi_penjualan (One-to-Many)
     */
    public function transaksiPenjualan()
    {
        return $this->hasMany(TransaksiPenjualan::class, 'kode_barang', 'kode_barang');
    }

    /**
     * Relasi ke tabel pembelian (One-to-Many)
     */
    public function pembelian()
    {
        return $this->hasMany(Pembelian::class, 'kode_barang', 'kode_barang');
    }
}
