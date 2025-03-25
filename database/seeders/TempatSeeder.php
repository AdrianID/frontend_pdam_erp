<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TempatSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        for ($i = 0; $i < 5; $i++) {
            DB::table('tempat')->insert([
                'nama_tempat' => $faker->company,
                'alamat' => $faker->address,
                'status' => $faker->randomElement(['Aktif', 'Tidak Aktif']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
} 