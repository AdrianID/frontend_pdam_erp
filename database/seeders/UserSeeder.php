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
        
        // Create admin user
        DB::table('users')->insert([
            'username' => 'admin',
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123', ['memory' => 65536, 'time' => 4, 'threads' => 3]),
            'role_id' => 1, // admin role
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create 5 random users
        for ($i = 0; $i < 5; $i++) {
            DB::table('users')->insert([
                'username' => $faker->unique()->userName,
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password123', ['memory' => 65536, 'time' => 4, 'threads' => 3]),
                'role_id' => $faker->randomElement([2, 3]), // manager or staff
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
