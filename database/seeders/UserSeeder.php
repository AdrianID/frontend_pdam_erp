<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        // Argon2id options
        $hashOptions = [
            'memory' => 65536,    // 64MB
            'threads' => 4,       // 4 threads
            'time' => 4          // 4 iterations
        ];
        
        // Create admin user
        DB::table('users')->insert([
            'username' => 'admin',
            'pelanggan_id' => null,
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123', $hashOptions),
            'role_id' => 1, // admin role
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create 5 random staff/manager users
        for ($i = 0; $i < 5; $i++) {
            DB::table('users')->insert([
                'username' => $faker->unique()->userName,
                'pelanggan_id' => null,
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password123', $hashOptions),
                'role_id' => $faker->randomElement([2, 3]), // manager or staff
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Get 30% of random active pelanggan to create user accounts
        $pelanggan = DB::table('pelanggan')
            ->where('status', 'active')
            ->inRandomOrder()
            ->take(DB::table('pelanggan')->where('status', 'active')->count() * 0.3)
            ->get();

        // Create user accounts for selected pelanggan
        foreach ($pelanggan as $p) {
            // Generate username from nomor_pelanggan
            $username = strtolower(str_replace('-', '', $p->nomor_pelanggan));
            
            DB::table('users')->insert([
                'username' => $username,
                'pelanggan_id' => $p->id,
                'name' => $p->nama_pelanggan,
                'email' => $faker->unique()->safeEmail, // atau bisa dibuat dari nomor_pelanggan
                'password' => Hash::make('password123', $hashOptions),
                'role_id' => 4, // pelanggan role
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
