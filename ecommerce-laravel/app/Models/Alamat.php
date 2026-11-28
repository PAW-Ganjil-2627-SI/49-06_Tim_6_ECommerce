<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    protected $table = 'alamats';

    protected $fillable = [
        'pelanggan_id',
        'tipe_alamat',
        'alamat',
        'kota',
        'kode_pos',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }
}