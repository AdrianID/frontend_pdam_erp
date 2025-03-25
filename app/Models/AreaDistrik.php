<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AreaDistrik extends Model
{
    use SoftDeletes;

    protected $table = 'area_distrik';

    protected $fillable = [
        'kecamatan_id', 'desa_id', 'nama'
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function subAreaDistriks()
    {
        return $this->hasMany(SubAreaDistrik::class, 'area_distrik_id');
    }
    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class, 'area_distrik_id');
    }

}