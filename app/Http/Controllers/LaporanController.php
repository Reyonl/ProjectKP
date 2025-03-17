<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPenjualan;
use App\Models\Pembelian;
use App\Models\RiwayatBelanja;
use App\Models\Barang;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index()
    {
        // Mengambil data riwayat belanja dengan join ke tabel barang dan pagination
        $riwayat = RiwayatBelanja::select(
                'riwayat_belanja.*',
                'barang.nama_sparepart',
                'barang.modal',
                'barang.harga_jual' // Ambil harga jual dari barang
            )
            ->join('barang', 'riwayat_belanja.kode_barang', '=', 'barang.kode_barang')
            ->orderBy('riwayat_belanja.created_at', 'desc')
            ->paginate(10); // Tambahkan pagination di sini

        // Mengambil data riwayat terjual dengan pagination
        $riwayatTerjual = TransaksiPenjualan::select(
                'transaksi_penjualan.*',
                'barang.nama_sparepart',
                'barang.harga_jual'
            )
            ->join('barang', 'transaksi_penjualan.kode_barang', '=', 'barang.kode_barang')
            ->orderBy('transaksi_penjualan.tanggal', 'desc')
            ->paginate(10); // Tambahkan pagination di sini

        // Total penjualan berdasarkan bulan
        $totalPenjualanBulanan = TransaksiPenjualan::selectRaw('
                SUM(total) as total,
                MONTH(tanggal) as bulan,
                YEAR(tanggal) as tahun
            ')
            ->groupByRaw('MONTH(tanggal), YEAR(tanggal)')
            ->orderByRaw('YEAR(tanggal) DESC, MONTH(tanggal) DESC')
            ->get();

        return view('laporan.index', compact('riwayat', 'riwayatTerjual', 'totalPenjualanBulanan'));
    }

    public function destroy($id)
    {
        $riwayat = Pembelian::findOrFail($id);
        $riwayat->delete();

        return redirect()->route('riwayat_belanja.index')->with('success', 'Data berhasil dihapus.');
    }
}
