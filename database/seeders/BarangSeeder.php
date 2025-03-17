<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class barangSeeder extends Seeder
{
    public function run(): void
    {
        $barang = [
            [
                'kode_barang' => 'LCDOP A1K',
                'nama_sparepart' => 'LCD OPPO A1K(CPH1923)/ REALMI C2(RMX1941)',
                'modal' => 83000,
                'harga_jual' => 120000,
                'stok' => 4
            ],
            [
                'kode_barang' => 'LCDOP A3S',
                'nama_sparepart' => 'LCD OPPO A3S/ REALME C1/ REALME 2',
                'modal' => 95000,
                'harga_jual' => 130000,
                'stok' => 4
            ],
            [
                'kode_barang' => 'LCDOP A5 2020',
                'nama_sparepart' => 'LCD OPPO A5 2020/ A9 2020/ A31/ REALME 5/ 5I/ C3',
                'modal' => 110000,
                'harga_jual' => 140000,
                'stok' => 5
            ],
            [
                'kode_barang' => 'LCDOP A5S',
                'nama_sparepart' => 'LCD OPPO A5S/ A7/ A11K/ A12',
                'modal' => 110000,
                'harga_jual' => 140000,
                'stok' => 3
            ],
            [
                'kode_barang' => 'LCDOP A16',
                'nama_sparepart' => 'LCD OPPO A16/C25/NARZO 50A CROWN',
                'modal' => 110000,
                'harga_jual' => 140000,
                'stok' => 4
            ],
            [
                'kode_barang' => 'LCDOP A17',
                'nama_sparepart' => 'LCD OPPO A17/ A57 2022/ A17K/ A77S/ A77 5G/ CPH2387',
                'modal' => 100500,
                'harga_jual' => 130000,
                'stok' => 2
            ],
            [
                'kode_barang' => 'LCDOP A33 W',
                'nama_sparepart' => 'LCD OPPO A33W/ NEO 7',
                'modal' => 90000,
                'harga_jual' => 150000,
                'stok' => 1
            ],
            [
                'kode_barang' => 'LCDOP A37',
                'nama_sparepart' => 'LCD OPPO A37/ NEO 9 INCELL BLACK',
                'modal' => 70000,
                'harga_jual' => 100000,
                'stok' => 4
            ],
            [
                'kode_barang' => 'LCDOP A39',
                'nama_sparepart' => 'LCD OPPO A39/ NEO11 INCELL BLACK/WHITE',
                'modal' => 86000,
                'harga_jual' => 120000,
                'stok' => 3
            ],
            [
                'kode_barang' => 'LCDOP A53 2020',
                'nama_sparepart' => 'LCD OPPO A53 2020/ C17/ 7i',
                'modal' => 120000,
                'harga_jual' => 150000,
                'stok' => 1
            ],
        ];

        // Insert ke database
        DB::table('barang')->insert($barang);
    }
}
