<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $table = 'keuangan';

    use HasFactory;
    protected $fillable = ['tanggal', 'profit', 'fee_teknisi', 'fee_toko'];
}

