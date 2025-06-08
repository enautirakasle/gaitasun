<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Alumno;
use Illuminate\Support\Facades\Hash;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Alumno Uno',
            'email' => 'alumno1@example.com',
            'password' => Hash::make('password'),
        ]);

        Alumno::create([
            'user_id' => $user->id,
            // agrega otros campos necesarios aquí
        ]);

        // Asignar el rol de alumno (usando spatie/laravel-permission por ejemplo)
        $user->assignRole('alumno');
    }
}
