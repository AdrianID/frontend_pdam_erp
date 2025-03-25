<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'Administrator',
                'access_permission' => 'web',
                'description' => 'Super Admin dengan akses penuh',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'manager',
                'display_name' => 'Manager',
                'access_permission' => 'web',
                'description' => 'Manager dengan akses terbatas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'staff',
                'display_name' => 'Staff',
                'access_permission' => 'web',
                'description' => 'Staff dengan akses dasar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'pelanggan',
                'display_name' => 'Pelanggan',
                'access_permission' => 'android',
                'description' => 'Pelanggan dengan akses dasar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('roles')->insert($roles);
    }
}
