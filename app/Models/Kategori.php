<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use SoftDeletes;

    protected $table = 'kategori';

    protected $fillable = [
        'nama_kategori', 'tarif_penggunaan', 'biaya_pasang', 'denda'
    ];

    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class, 'kategori_id');
    }
}