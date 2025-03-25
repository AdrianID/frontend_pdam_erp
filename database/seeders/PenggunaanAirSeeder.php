<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class PenggunaanAirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        // Get all pelanggan IDs
        $pelangganIds = DB::table('pelanggan')->pluck('id')->toArray();
        
        // Create usage data for last 3 months for each pelanggan
        foreach ($pelangganIds as $pelangganId) {
            $meterAwal = rand(1000, 2000);
            
            for ($i = 2; $i >= 0; $i--) {
                $date = Carbon::now()->subMonths($i);
                $meterAkhir = $meterAwal + rand(10, 50);
                
                DB::table('penggunaan_air')->insert([
                    'pelanggan_id' => $pelangganId,
                    'periode' => $date->format('Y-m'),
                    'meter_awal' => $meterAwal,
                    'meter_akhir' => $meterAkhir,
                    'total_penggunaan' => $meterAkhir - $meterAwal,
                    'status' => $faker->randomElement(['Belum Dibayar', 'Sudah Dibayar', 'Terlambat']),
                    'keterangan' => $faker->boolean(30) ? $faker->sentence : null,
                    'created_at' => $date,
                    'updated_at' => $date,
                ]);
                
                $meterAwal = $meterAkhir;
            }
        }
    }
}
