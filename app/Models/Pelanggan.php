<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelanggan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pelanggan';

    protected $fillable = [
        'kecamatan_id',
        'desa_id',
        'kategori_id',
        'area_distrik_id',
        'sub_area_distrik_id',
        'jenis_pelanggan',
        'nomor_pelanggan',
        'nomor_meteran',
        'nomor_kk',
        'nomor_sertifikat',
        'nomor_telp',
        'nama_pelanggan',
        'nik',
        'alamat',
        'rt',
        'rw',
        'nomor_rumah',
        'gang',
        'blok',
        'luas_bangunan',
        'jenis_hunian',
        'kebutuhan_air_awal',
        'kran_diminta',
        'kwh_pln',
        'status_kepemilikan',
        'file_sertifikat',
        'file_ktp',
        'file_kk',
        'latitude',
        'longitude',
        'data_geojson',
        'pekerjaan',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = [
        'luas_bangunan' => 'decimal:2',
        'kebutuhan_air_awal' => 'integer',
        'latitude' => 'decimal:10,8',
        'longitude' => 'decimal:11,8'
    ];

    public function areaDistrik()
    {
        return $this->belongsTo(AreaDistrik::class, 'area_distrik_id');
    }
    
    public function subAreaDistrik()
    {
        return $this->belongsTo(SubAreaDistrik::class, 'sub_area_distrik_id');
    }
    
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }
    
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}