<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tagihan extends Model
{
    use SoftDeletes;

    protected $table = 'tagihan';

    protected $fillable = [
        'pelanggan_id',
        'kategori_id',
        'nomor_tagihan',
        'total_tagihan',
        'status',
        'tanggal_tagihan',
        'tanggal_jatuh_tempo',
        'catatan'
    ];

    // app/Models/Tagihan.php
    protected $casts = [
        'total_tagihan' => 'float', // Cast ke float untuk handling decimal
        'tanggal_tagihan' => 'datetime',
        'tanggal_jatuh_tempo' => 'datetime'
    ];

    

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
