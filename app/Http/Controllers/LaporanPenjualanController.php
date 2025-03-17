<?php

namespace App\Http\Controllers;

use App\Models\LaporanPenjualan;
use Carbon\Carbon;

class LaporanPenjualanController extends Controller
{
    public function index()
    {
        $laporanPerBulan = LaporanPenjualan::selectRaw('YEAR(periode) as tahun, MONTH(periode) as bulan, SUM(total_penjualan) as total_penjualan, SUM(jumlah_barang_terjual) as total_barang')
            ->groupBy('tahun', 'bulan')
            ->get();

        $laporanPerTahun = LaporanPenjualan::selectRaw('YEAR(periode) as tahun, SUM(total_penjualan) as total_penjualan, SUM(jumlah_barang_terjual) as total_barang')
            ->groupBy('tahun')
            ->get();

        return view('laporan.index', compact('laporanPerBulan', 'laporanPerTahun'));
    }
}
