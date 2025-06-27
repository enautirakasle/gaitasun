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

        // Puedes crear más profesores de la misma manera
        $user2 = User::create([
            'name' => 'Profesor Dos',
            'email' => 'profesor2@example.com',
            'password' => Hash::make('password'),
        ]);
        Profesor::create([
            'user_id' => $user2->id,
            // agrega otros campos necesarios aquí
        ]);
        $user2->assignRole('profesor');
        // Y así sucesivamente para más profesores...
        $user3 = User::create([
            'name' => 'Profesor Tres',
            'email' => 'profesor3@example.com',
            'password' => Hash::make('password'),
        ]);
        Profesor::create([
            'user_id' => $user3->id,
            // agrega otros campos necesarios aquí
        ]);
        $user3->assignRole('profesor');

        $user4 = User::create([
            'name' => 'Profesor Cuatro',
            'email' => 'profesor4@example.com',
            'password' => Hash::make('password'),
        ]);
        Profesor::create([
            'user_id' => $user4->id,
            // agrega otros campos necesarios aquí
        ]);
        $user4->assignRole('profesor');

        $user5 = User::create([
            'name' => 'Profesor Cinco',
            'email' => 'profesor5@example.com',
            'password' => Hash::make('password'),
        ]);
        Profesor::create([
            'user_id' => $user5->id,
            // agrega otros campos necesarios aquí
        ]);
        $user5->assignRole('profesor');
        $user6 = User::create([
            'name' => 'Profesor Seis',
            'email' => 'profesor6@example.com',
            'password' => Hash::make('password'),
        ]);
        Profesor::create([
            'user_id' => $user6->id,
            // agrega otros campos necesarios aquí
        ]);
        $user6->assignRole('profesor');
    }
}
