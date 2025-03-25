<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            [
                'nama_kategori' => 'Rumah Tangga A',
                'tarif_penggunaan' => 2500,
                'biaya_pasang' => 1500000,
                'denda' => 25000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Rumah Tangga B',
                'tarif_penggunaan' => 3500,
                'biaya_pasang' => 2000000,
                'denda' => 35000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Bisnis Kecil',
                'tarif_penggunaan' => 4500,
                'biaya_pasang' => 3000000,
                'denda' => 45000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Bisnis Besar',
                'tarif_penggunaan' => 6000,
                'biaya_pasang' => 5000000,
                'denda' => 60000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('kategori')->insert($kategori);
    }
}
