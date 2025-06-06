<?php

namespace Database\Seeders;

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
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
            RolesSeeder::class,
            CompetenciaTransversalSeeder::class,
            IndicadorSeeder::class,
            CursoSeeder::class,
            GrupoSeeder::class,
            // PermissionsSeeder::class,
            // Add other seeders here as needed
        ]);
    }
}
