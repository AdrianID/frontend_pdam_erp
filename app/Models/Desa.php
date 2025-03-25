<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Desa extends Model
{
    use SoftDeletes;

    protected $table = 'desa';

    protected $fillable = [
        'kecamatan_id', 'nama_desa'
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }

    public function areaDistrik()
    {
        return $this->hasMany(AreaDistrik::class, 'desa_id');
    }

    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class, 'desa_id');
    }
}