<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AreaDistrikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        // Get all kecamatan and desa IDs
        $desas = DB::table('desa')->get();
        
        // Create 2-3 area distrik for each desa
        foreach ($desas as $desa) {
            $numberOfAreas = rand(2, 3);
            
            for ($i = 0; $i < $numberOfAreas; $i++) {
                DB::table('area_distrik')->insert([
                    'kecamatan_id' => $desa->kecamatan_id,
                    'desa_id' => $desa->id,
                    'nama' => 'Area ' . $faker->unique()->streetName,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
