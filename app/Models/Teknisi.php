<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teknisi extends Model
{
    protected $table = 'teknisi';
    use HasFactory;
    protected $primaryKey = 'kode_teknisi';
    protected $fillable = ['kode_teknisi', 'nama_teknisi'];

    public function services()
    {
        return $this->hasMany(Service::class, 'kode_teknisi');
    }
}

