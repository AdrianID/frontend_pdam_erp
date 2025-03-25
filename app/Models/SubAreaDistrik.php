<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubAreaDistrik extends Model
{
    use SoftDeletes;

    protected $table = 'sub_area_distrik';

    protected $fillable = [
        'area_distrik_id', 'nama'
    ];

    public function areaDistrik()
    {
        return $this->belongsTo(AreaDistrik::class, 'area_distrik_id');
    }

    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class, 'sub_area_distrik_id');
    }

    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class, 'sub_area_distrik_id');
    }
}