<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPerintahKerja extends Model
{
    use HasFactory;

    protected $table = 'surat_perintah_kerja';
    protected $fillable = [
        'nomor_surat',
        'tanggal_surat',
        'vendor_id',
        'alamat_vendor',
        'perihal',
        'permohonan_id',
        'nama_pemohon',
        'alamat_pemohon',
        'nomor_telp_pemohon',
        'titik_koordinat',
        'waktu_kerja',
        'masa_kerja',
        'keterangan',
        'status'
    ];

    protected $casts = [
        'tanggal_surat' => 'date',
        'masa_kerja' => 'date',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function permohonan()
    {
        return $this->belongsTo(Permohonan::class);
    }
}