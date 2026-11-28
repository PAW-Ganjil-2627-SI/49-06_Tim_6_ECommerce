<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekspedisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kurir',
        'layanan',
        'zonasi',
        'estimasi',
        'tarif',
        'status',
        'keterangan',
    ];
}
