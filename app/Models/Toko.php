<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    protected $table = 'toko';
    use HasFactory;
    protected $primaryKey = 'kode_toko';
    protected $fillable = ['kode_toko', 'nama_toko'];

    public function services()
    {
        return $this->hasMany(Service::class, 'kode_toko');
    }
}
