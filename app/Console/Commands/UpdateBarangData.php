<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Barang; // Tambahkan namespace model

class UpdateBarangData extends Command
{
    protected $signature = 'barang:update-data';
    protected $description = 'Update kategori dan brand berdasarkan nama barang';

    public function handle()
    {
        $kategoriMapping = config('barang.kategori');
        $brandMapping = config('barang.brand');

        $barangs = Barang::whereNull('kategori')->orWhereNull('brand')->get();

        foreach ($barangs as $barang) {
            $kategori = null;
            $brand = null;

            // Cek kategori berdasarkan nama_barang
            foreach ($kategoriMapping as $key => $value) {
                if (stripos($barang->nama_barang, $key) !== false) {
                    $kategori = $value;
                    break;
                }
            }

            // Cek brand berdasarkan nama_barang
            foreach ($brandMapping as $key => $value) {
                if (stripos($barang->nama_barang, $key) !== false) {
                    $brand = $value;
                    break;
                }
            }

            // Debug hasil kategori dan brand
            dd($barang->nama_barang, $kategori, $brand);

            // Jika ada yang cocok, update datanya
            if ($kategori || $brand) {
                $barang->update([
                    'kategori' => $kategori,
                    'brand' => $brand
                ]);
            }
        }

        $this->info('Barang data has been updated successfully.');
    }

}
