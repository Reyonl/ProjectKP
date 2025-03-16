<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riwayat;
use App\Exports\LaporanExport;
use PDF;
use Excel;

class LaporanController extends Controller
{
    // Menampilkan laporan belanja dengan filter dan paginasi
    public function index(Request $request)
    {
        $query = Riwayat::query()
            ->join('barang', 'riwayat_belanja.kode_barang', '=', 'barang.kode_barang')
            ->select('barang.nama_sparepart', 'riwayat_belanja.jumlah', 'riwayat_belanja.tanggal_belanja');

        // Filter nama barang
        if ($request->filled('search')) {
            $query->where('barang.nama_sparepart', 'like', '%' . $request->search . '%');
        }

        // Filter rentang tanggal
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('riwayat_belanja.tanggal_belanja', [$request->start_date, $request->end_date]);
        }

        $riwayat = $query->orderBy('riwayat_belanja.tanggal_belanja', 'desc')->paginate(10);
        $totalBelanja = $query->sum('jumlah');

        return view('laporan.index', compact('riwayat', 'totalBelanja'));
    }



}
