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

        ];

        // Insert ke database
        DB::table('barang')->insert($barang);
    }
}
