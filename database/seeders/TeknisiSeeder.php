<?php

namespace Database\Seeders;

use App\Models\Teknisi;
use Illuminate\Database\Seeder;

class TeknisiSeeder extends Seeder
{
    public function run()
    {
        Teknisi::create([
            'kode_teknisi' => 'T001',
            'nama_teknisi' => 'Rinus'
        ]);
    }
}
