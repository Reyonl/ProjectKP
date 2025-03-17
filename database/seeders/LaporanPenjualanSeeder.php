<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LaporanPenjualan;

class LaporanPenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'transaksi_id' => 1,
                'total_penjualan' => 450000,
                'jumlah_barang_terjual' => 3,
                'periode' => '2025-03-01',
            ],
            [
                'transaksi_id' => 2,
                'total_penjualan' => 240000,
                'jumlah_barang_terjual' => 2,
                'periode' => '2025-03-02',
            ],
            [
                'transaksi_id' => 3,
                'total_penjualan' => 200000,
                'jumlah_barang_terjual' => 1,
                'periode' => '2025-03-03',
            ],
            [
                'transaksi_id' => 4,
                'total_penjualan' => 520000,
                'jumlah_barang_terjual' => 4,
                'periode' => '2025-03-04',
            ],
            [
                'transaksi_id' => 5,
                'total_penjualan' => 500000,
                'jumlah_barang_terjual' => 1,
                'periode' => '2025-03-05',
            ],
            [
                'transaksi_id' => 6,
                'total_penjualan' => 200000,
                'jumlah_barang_terjual' => 2,
                'periode' => '2025-03-06',
            ],
            [
                'transaksi_id' => 7,
                'total_penjualan' => 250000,
                'jumlah_barang_terjual' => 5,
                'periode' => '2025-03-07',
            ],
            [
                'transaksi_id' => 8,
                'total_penjualan' => 150000,
                'jumlah_barang_terjual' => 1,
                'periode' => '2025-03-08',
            ],
            [
                'transaksi_id' => 9,
                'total_penjualan' => 330000,
                'jumlah_barang_terjual' => 3,
                'periode' => '2025-03-09',
            ],
            [
                'transaksi_id' => 10,
                'total_penjualan' => 600000,
                'jumlah_barang_terjual' => 2,
                'periode' => '2025-03-10',
            ],
        ];

        foreach ($data as $item) {
            LaporanPenjualan::create($item);
        }
    }
}
