<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profesor;
use Illuminate\Support\Facades\Hash;

class ProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear el usuario
        $user = User::create([
            'name' => 'Profesor Uno',
            'email' => 'profesor1@example.com',
            'password' => Hash::make('password'),
        ]);

        // Crear el registro en la tabla profesor con el id del usuario
        Profesor::create([
            'user_id' => $user->id,
            // agrega otros campos necesarios aquí
        ]);

        // Asignar el rol de profesor (usando spatie/laravel-permission por ejemplo)
        $user->assignRole('profesor');
    }
}
