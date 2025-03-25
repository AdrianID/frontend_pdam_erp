<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        // Get all necessary IDs
        $subAreaDistriks = DB::table('sub_area_distrik')
            ->join('area_distrik', 'sub_area_distrik.area_distrik_id', '=', 'area_distrik.id')
            ->select('sub_area_distrik.id as sub_area_id', 'area_distrik.id as area_id', 
                    'area_distrik.kecamatan_id', 'area_distrik.desa_id')
            ->get();
        
        $kategoriIds = DB::table('kategori')->pluck('id')->toArray();
        
        // Create 5-10 pelanggan for each sub area
        foreach ($subAreaDistriks as $area) {
            $numberOfPelanggan = rand(5, 10);
            
            for ($i = 0; $i < $numberOfPelanggan; $i++) {
                $nomorPelanggan = 'PLG-' . str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT);
                $nomorMeteran = 'MTR-' . str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT);
                
                DB::table('pelanggan')->insert([
                    'kecamatan_id' => $area->kecamatan_id,
                    'desa_id' => $area->desa_id,
                    'kategori_id' => $faker->randomElement($kategoriIds),
                    'area_distrik_id' => $area->area_id,
                    'sub_area_distrik_id' => $area->sub_area_id,
                    'jenis_pelanggan' => $faker->randomElement(['Rumah Tangga', 'Bisnis', 'Industri']),
                    'nomor_pelanggan' => $nomorPelanggan,
                    'nomor_meteran' => $nomorMeteran,
                    'nomor_kk' => $faker->unique()->numerify('3######'),
                    'nomor_sertifikat' => $faker->boolean(70) ? $faker->numerify('SERT-####') : null,
                    'nomor_telp' => $faker->phoneNumber,
                    'nama' => $faker->name,
                    'nik' => $faker->unique()->numerify('3###############'),
                    'alamat' => $faker->address,
                    'rt' => str_pad(rand(1, 20), 3, '0', STR_PAD_LEFT),
                    'rw' => str_pad(rand(1, 10), 3, '0', STR_PAD_LEFT),
                    'nomor_rumah' => $faker->buildingNumber,
                    'gang' => $faker->boolean(60) ? 'Gang ' . $faker->streetName : null,
                    'blok' => $faker->boolean(40) ? 'Blok ' . $faker->randomLetter : null,
                    'luas_bangunan' => $faker->numberBetween(36, 500),
                    'jenis_hunian' => $faker->randomElement(['Rumah Pribadi', 'Ruko', 'Apartemen', 'Kios']),
                    'kebutuhan_air_awal' => $faker->numberBetween(100, 1000),
                    'kran_diminta' => $faker->numberBetween(1, 5),
                    'kwh_pln' => $faker->numerify('PLN-####-####'),
                    'status_kepemilikan' => $faker->randomElement(['Milik Sendiri', 'Sewa', 'Keluarga']),
                    'latitude' => $faker->latitude(-6.2, -6.1),
                    'longitude' => $faker->longitude(106.8, 106.9),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
