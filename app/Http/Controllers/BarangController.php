<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    // Menampilkan daftar barang dengan fitur pencarian dan pagination


    public function index(Request $request) {

        $query = \DB::table('barang');
        $kategoriList = Barang::select('kategori')->distinct()->get();
        $brandList = Barang::select('brand')->distinct()->get();

        $barang = Barang::when($request->kategori, function ($query) use ($request) {
                        $query->where('kategori', $request->kategori);
                    })
                    ->when($request->brand, function ($query) use ($request) {
                        $query->where('brand', $request->brand);
                    })
                    ->when($request->search, function ($query) use ($request) {
                        $query->where('nama_sparepart', 'like', '%' . $request->search . '%');
                    })
                    ->paginate(10);

        return view('barang.index', compact('barang', 'kategoriList', 'brandList'));
    }



    public function destroy($kode_barang)
    {
        $barang = Barang::where('kode_barang', $kode_barang)->firstOrFail();
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }


    // // public function index(Request $request)
    // {
    //     $query = Barang::query();

    //     $filters = array_filter([
    //         'kategori' => $request->kategori,
    //         'brand' => $request->brand,
    //     ]);

    //     if ($request->filled('search')) {
    //         $query->where(function ($q) use ($request) {
    //             $q->where('nama_sparepart', 'like', "%{$request->search}%")
    //               ->orWhere('kode_barang', 'like', "%{$request->search}%");
    //         });
    //     }

    //     if (isset($filters['kategori'])) {
    //         $query->where('kategori', $filters['kategori']);
    //     }

    //     if (isset($filters['brand'])) {
    //         $query->where('brand', $filters['brand']);
    //     }




    //     return view('barang.index', compact('barang'));
    // }


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
            'modal'         => 'required|string',
            'harga_jual'    => 'required|string',
            'stok'          => 'required|integer|min:0'
        ]);

        Barang::create([
            'kode_barang'   => $request->kode_barang,
            'nama_sparepart' => $request->nama_sparepart,
            'modal'         => str_replace('.', '', $request->modal), // Hapus format ribuan
            'harga_jual'    => str_replace('.', '', $request->harga_jual), // Hapus format ribuan
            'stok'          => $request->stok,
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    // Menampilkan form edit barang
    public function edit($kode_barang)
    {
        $barang = Barang::where('kode_barang', $kode_barang)->firstOrFail();

        return view('barang.edit', compact('barang'));
    }

    // Update data barang
    public function update(Request $request, $kode_barang)
    {
        $barang = Barang::where('kode_barang', $kode_barang)->firstOrFail();

        $request->validate([
            'nama_sparepart' => 'required|max:100',
            'modal'          => 'required|numeric|min:0',
            'harga_jual'     => 'required|numeric|min:0',
            'stok'           => 'required|integer|min:0'
        ]);

        $barang->update($request->only(['nama_sparepart', 'modal', 'harga_jual', 'stok']));

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui!');
    }

    // Update stok barang dengan menambah stok lama
    public function updateStok(Request $request, $kode_barang)
    {
        $barang = Barang::where('kode_barang', $kode_barang)->firstOrFail();

        $request->validate([
            'stok' => 'required|integer|min:0',
        ]);

        $barang->increment('stok', $request->stok);

        return redirect()->route('barang.index')->with('success', 'Stok berhasil diperbarui!');
    }

    // Menampilkan form belanja barang
    public function formBelanja($kode_barang)
    {
        $barang = Barang::where('kode_barang', $kode_barang)->firstOrFail();

        return view('barang.belanja', compact('barang'));
    }

    // Proses belanja barang (stok berkurang)
    public function prosesbelanja(Request $request, $kode_barang)
    {
        $barang = Barang::where('kode_barang', $kode_barang)->first();

        $request->validate([
            'jumlah' => 'required|integer|min:1'
        ]);

        // Tambahkan stok (bukan mengurangi)
        $barang->increment('stok', $request->jumlah);

        return back()->with('success', 'Stok berhasil diperbarui.');
    }



    // Proses penjualan barang
    public function prosesPenjualan(Request $request, $kode_barang)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1'
        ]);

        $barang = Barang::where('kode_barang', $kode_barang)->firstOrFail();

        if ($barang->stok < $request->jumlah) {
            return redirect()->route('barang.index')->with('error', 'Stok tidak mencukupi!');
        }

        // **Kurangi stok barang**
        $barang->decrement('stok', $request->jumlah);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil terjual!');
    }
}
