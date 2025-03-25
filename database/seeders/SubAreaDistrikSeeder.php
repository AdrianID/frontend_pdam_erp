<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SubAreaDistrikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        // Get all area_distrik IDs
        $areaDistriks = DB::table('area_distrik')->get();
        
        // Create 2-4 sub areas for each area_distrik
        foreach ($areaDistriks as $areaDistrik) {
            $numberOfSubAreas = rand(2, 4);
            
            for ($i = 0; $i < $numberOfSubAreas; $i++) {
                DB::table('sub_area_distrik')->insert([
                    'area_distrik_id' => $areaDistrik->id,
                    'nama' => 'Sub Area ' . $faker->unique()->streetName,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
