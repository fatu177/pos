<?php

namespace Database\Seeders;

use App\Models\level;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // level::create([
        //     'nama_level' => 'Administrator',
        // ]);

        User::create([
            'nama_lengkap' => 'Admin',
            'id_level' => 1,
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
        ]);
    }
}