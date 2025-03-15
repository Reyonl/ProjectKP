<?php
namespace Database\Seeders;
use App\Models\Toko;
use Illuminate\Database\Seeder;

class TokoSeeder extends Seeder
{
    public function run()
    {
        Toko::create([
            'kode_toko' => 'TK001',
            'nama_toko' => 'Enoni Cellular'
        ]);
    }
}

