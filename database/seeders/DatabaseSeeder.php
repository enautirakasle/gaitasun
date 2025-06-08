<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\Curso;
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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            RolesSeeder::class,
            UserSeeder::class,
            AlumnoSeeder::class,
            ProfesorSeeder::class,
            CompetenciaTransversalSeeder::class,
            IndicadorSeeder::class,
            CursoSeeder::class,
            GrupoSeeder::class,
            // PermissionsSeeder::class,
            // Add other seeders here as needed
        ]);

        User::factory()->count(40)->alumno()->create();
        User::factory()->count(5)->profesor()->create();

        // Alumno::factory(10)->create();
    }
}
