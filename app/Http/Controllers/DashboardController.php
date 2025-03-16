<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Teknisi;
use App\Models\TransaksiPenjualan;
use App\Models\Service;
use App\Models\Keuangan;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahBarang = Barang::count();
        $jumlahPenjualan = TransaksiPenjualan::count();
        $jumlahService = Service::count();
        $totalProfit = Keuangan::sum('profit');
        $jumlahTeknisi = Teknisi::count();


        return view('dashboard.index', compact('jumlahBarang', 'jumlahPenjualan', 'jumlahService', 'totalProfit', 'jumlahTeknisi'));
    }

    
}
