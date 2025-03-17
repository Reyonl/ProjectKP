<?php

namespace App\Http\Controllers;

use App\Models\RiwayatBelanja;
use App\Models\Barang;
use Illuminate\Http\Request;

class RiwayatBelanjaController extends Controller
{
    // Menampilkan data riwayat belanja
    public function index()
    {
        // Mengambil data riwayat belanja dengan relasi ke barang
        $riwayat = RiwayatBelanja::with('barang')->get();

        return view('riwayat_belanja.index', compact('riwayat'));
    }

    // Menyimpan data riwayat belanja baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|exists:barang,kode_barang',
            'jumlah' => 'required|integer|min:1',
            'total_harga' => 'required|numeric|min:0'
        ]);

        RiwayatBelanja::create([
            'kode_barang' => $request->kode_barang,
            'jumlah' => $request->jumlah,
            'total_harga' => $request->total_harga,
        ]);

        return redirect()->route('riwayat_belanja.index')->with('success', 'Riwayat belanja berhasil ditambahkan.');
    }

    // Menghapus riwayat belanja
    public function destroy($id)
    {
        $riwayat = RiwayatBelanja::findOrFail($id);
        $riwayat->delete();

        return redirect()->route('riwayat_belanja.index')->with('success', 'Riwayat belanja berhasil dihapus.');
    }

    // app/Http/Controllers/RiwayatBelanjaController.php

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_barang' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
        ]);

        $riwayat = RiwayatBelanja::findOrFail($id);

        // Update data riwayat belanja
        $riwayat->barang->kode_barang = $request->kode_barang;
        $riwayat->jumlah = $request->jumlah;

        // Hitung ulang total harga (modal * jumlah)
        $riwayat->total_harga = $riwayat->barang->modal * $request->jumlah;

        $riwayat->save();

        return redirect()->route('riwayat_belanja.index')->with('success', 'Data berhasil diupdate!');
    }




}
