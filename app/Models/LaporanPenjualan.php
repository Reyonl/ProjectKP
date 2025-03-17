<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPenjualan extends Model
{
    use HasFactory;

    protected $table = 'laporan_penjualan'; // Nama tabel di database

    protected $fillable = [
        'transaksi_id',
        'total_penjualan',
        'jumlah_barang_terjual',
        'periode',
    ];

    // Relasi ke model TransaksiPenjualan
    public function transaksi()
    {
        return $this->belongsTo(TransaksiPenjualan::class, 'transaksi_id');
    }

    // Scope untuk laporan bulanan
    public function scopeLaporanPerBulan($query)
    {
        return $query->selectRaw('YEAR(periode) as tahun, MONTH(periode) as bulan, SUM(total_penjualan) as total_penjualan, SUM(jumlah_barang_terjual) as total_barang')
            ->groupBy('tahun', 'bulan')
            ->orderBy('tahun', 'desc')
            ->orderBy('bulan', 'desc');
    }

    // Scope untuk laporan tahunan
    public function scopeLaporanPerTahun($query)
    {
        return $query->selectRaw('YEAR(periode) as tahun, SUM(total_penjualan) as total_penjualan, SUM(jumlah_barang_terjual) as total_barang')
            ->groupBy('tahun')
            ->orderBy('tahun', 'desc');
    }
}
