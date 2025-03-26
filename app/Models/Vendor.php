<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = 'vendor';
    
    protected $fillable = [
        'jenis_vendor',
        'nama_vendor',
        'alamat',
        'telepon',
        'email',
        'nomor_surat_perjanjian',
        'tanggal_surat_perjanjian',
        'file_surat_perjanjian',
        'status',
        'rating',
        'keterangan',
        'tanggal_bergabung',
        'user_id',
    ];

    protected $casts = [
        'tanggal_surat_perjanjian' => 'date',
        'tanggal_bergabung' => 'date',
        'rating' => 'integer'
    ];
}