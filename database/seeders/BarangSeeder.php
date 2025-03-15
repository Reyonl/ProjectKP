<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run()
    {


        Barang::create([
            'kode_barang' => 'B002',
            'nama_sparepart' => 'Baterai Xiaomi Note 5',
            'modal' => 120000,
            'harga_jual' => 180000
        ]);
    }
}

