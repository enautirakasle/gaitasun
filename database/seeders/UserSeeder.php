<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'alumno',
            'email' => 'alumno@example.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'profesor',
            'email' => 'profesor@example.com',
            'password' => bcrypt('password')
        ]);
    }
}
