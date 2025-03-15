<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Menampilkan daftar barang dengan fitur pencarian
    public function index(Request $request)
    {
        $query = Barang::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('nama_sparepart', 'like', "%{$search}%")
                  ->orWhere('kode_barang', 'like', "%{$search}%");
        }

        $barang = $query->get();

        // Jika data kosong, kirim notifikasi
        if ($barang->isEmpty() && $request->filled('search')) {
            session()->flash('error', 'Barang tidak ditemukan!');
        }

        return view('barang.index', compact('barang'));
    }


    // Menampilkan form tambah barang
    public function create()
    {
        return view('barang.create');
    }

    // Menyimpan data barang baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang'   => 'required|unique:barang,kode_barang|max:20',
            'nama_sparepart' => 'required|max:100',
            'modal'         => 'required|numeric|min:0',
            'harga_jual'    => 'required|numeric|min:0',
            'stok'          => 'required|integer|min:0'
        ]);

        Barang::create([
            'kode_barang'   => $request->kode_barang,
            'nama_sparepart' => $request->nama_sparepart,
            'modal'         => $request->modal,
            'harga_jual'    => $request->harga_jual,
            'stok'          => $request->stok,
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    // Update stok barang dengan menambah stok lama
    public function updateStok(Request $request, $kode_barang)
    {
        $barang = Barang::where('kode_barang', $kode_barang)->firstOrFail();

        $request->validate([
            'stok' => 'required|integer|min:0',
        ]);

        // Menambahkan stok baru ke stok lama
        $barang->increment('stok', $request->stok);

        return redirect()->route('barang.index')->with('success', 'Stok berhasil diperbarui!');
    }
}
