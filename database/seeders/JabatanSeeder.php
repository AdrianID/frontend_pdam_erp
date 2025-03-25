<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class JabatanSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        $jabatan = [
            [
                'kelas_jabatan' => 'I-A',
                'nama_jabatan' => 'Direktur Utama',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kelas_jabatan' => 'I-B',
                'nama_jabatan' => 'Kepala Divisi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kelas_jabatan' => 'II-A',
                'nama_jabatan' => 'Supervisor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kelas_jabatan' => 'III-A',
                'nama_jabatan' => 'Staff',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        
        DB::table('jabatan')->insert($jabatan);
    }
} 