<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        // Create 5 kecamatan
        for ($i = 0; $i < 5; $i++) {
            DB::table('kecamatan')->insert([
                'nama_kecamatan' => $faker->unique()->city . ' ' . $faker->randomElement(['Utara', 'Selatan', 'Timur', 'Barat', 'Tengah']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
