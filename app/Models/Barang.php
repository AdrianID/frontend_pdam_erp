<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang'; // Nama tabel yang digunakan

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'deskripsi',
        'kategori',
        'satuan',
        'stok_minimal',
        'stok_tersedia',
        'harga_satuan'
    ]; // Kolom yang dapat diisi

    // Jika perlu, tambahkan cast atau relasi di sini
}