<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        // Get all kecamatan IDs
        $kecamatanIds = DB::table('kecamatan')->pluck('id')->toArray();
        
        // Create 3-5 desa for each kecamatan
        foreach ($kecamatanIds as $kecamatanId) {
            $numberOfDesa = rand(3, 5);
            
            for ($i = 0; $i < $numberOfDesa; $i++) {
                DB::table('desa')->insert([
                    'kecamatan_id' => $kecamatanId,
                    'nama_desa' => 'Desa ' . $faker->unique()->city,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
