<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PegawaiSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        $jabatanIds = DB::table('jabatan')->pluck('id')->toArray();
        $tempatIds = DB::table('tempat')->pluck('id')->toArray();
        
        for ($i = 0; $i < 20; $i++) {
            DB::table('pegawai')->insert([
                'jabatan_id' => $faker->randomElement($jabatanIds),
                'tempat_id' => $faker->randomElement($tempatIds),
                'nik' => $faker->unique()->numerify('3###############'),
                'nip' => $faker->unique()->numerify('19########' . $faker->numberBetween(1, 2) . '####'),
                'jabatan' => $faker->jobTitle,
                'periode_masuk' => $faker->dateTimeBetween('-10 years', 'now'),
                'tanggal_lahir' => $faker->dateTimeBetween('-50 years', '-20 years'),
                'alamat' => $faker->address,
                'nomor_tlp' => $faker->phoneNumber,
                'nomor_bpjs' => $faker->boolean(80) ? $faker->numerify('##########') : null,
                'nomor_npwp' => $faker->boolean(80) ? $faker->numerify('###.###.###.#-###.###') : null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
} 