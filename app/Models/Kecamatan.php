<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';

    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class);
    }
}