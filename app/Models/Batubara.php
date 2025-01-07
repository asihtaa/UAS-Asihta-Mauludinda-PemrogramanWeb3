<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batubara extends Model
{
    use HasFactory;
    protected $table = 'batubara';

    protected $fillable = [
        'HBA',
        'kalori',
        'harga_per_ton',
    ];
}