<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratJalan extends Model
{
    use HasFactory;
    protected $table = 'surat_jalan';
    protected $fillable = [
        'nomor_surat',
        'tanggal_surat',
        'id_pelanggan',
        'id_jenis_batu_bara',
        'id_gudang',
        'Jumlah_ton',
        'harga_per_ton',
        'total_harga',
        'status',
        'id_role'
    ];

    public function roles()
    {
        return $this->belongsTo(Roles::class, 'id_role');
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'id_kendaraan');
    }

    public function gudang()
    {
        return $this->belongsTo(Gudang::class, 'id_gudang');
    }
    public function pelanggan()
    {
        return $this->belongsTo(Gudang::class, 'id_pelanggan');
    }

    public function batubara()
    {
        return $this->belongsTo(Batubara::class, 'id_jenis_batu_bara');
    }
}