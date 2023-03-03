<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Create a admin user and a normal user
        \App\Models\User::factory()->admin()->create([
            'name' => 'Admin ',
            'email' => 'admin@lphegibide.com',
            'password' => bcrypt('adminlph')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'User ',
            'email' => 'user@lphegibide.com',
            'password' => bcrypt('userlph')
        ]);
    }
}
