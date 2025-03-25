<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            KecamatanSeeder::class,
            DesaSeeder::class,
            KategoriSeeder::class,
            AreaDistrikSeeder::class,
            SubAreaDistrikSeeder::class,
            PelangganSeeder::class,
            UserSeeder::class,
            SPKSSeeder::class,
            GelombangSPKSSeeder::class,
            PenggunaanAirSeeder::class,
        ]);
    }
}
