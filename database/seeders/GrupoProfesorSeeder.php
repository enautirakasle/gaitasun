<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import DB facade to use it directly

class GrupoProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($grupo_id = 1; $grupo_id <= 16; $grupo_id++) {
            // Cada grupo será asignado a 1 o 2 profesores aleatorios
            $profesores = collect(range(1, 6))->shuffle()->take(rand(1, 2));

            foreach ($profesores as $profesor_id) {
                DB::table('grupo_profesor')->insert([
                    'grupo_id' => $grupo_id,
                    'profesor_id' => $profesor_id,
                ]);
            }
        }
    }
}
