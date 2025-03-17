<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TransaksiPenjualan;

class TransaksiPenjualanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_barang' => 'B001',
                'jumlah' => 2,
                'total' => 500000.00,
                'tanggal' => now()->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_barang' => 'B002',
                'jumlah' => 3,
                'total' => 750000.00,
                'tanggal' => now()->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_barang' => 'B004',
                'jumlah' => 1,
                'total' => 250000.00,
                'tanggal' => now()->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($data as $item) {
            TransaksiPenjualan::create($item);
        }
    }
}
