<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    protected $table = 'kendaraan';

    protected $fillable = [
        'id',
        'nomor_polisi',
        'jenis_kendaraan',
        'nama_supir',
        'telepon_supir'
    ];
}
