<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import DB facade to use it directly

class GrupoAlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($alumno_id = 1; $alumno_id <= 100; $alumno_id++) {
            // Cada alumno se asignará de 1 a 2 grupos aleatorios
            $grupos = collect(range(1, 16))->shuffle()->take(rand(1, 2));

            foreach ($grupos as $grupo_id) {
                DB::table('alumno_grupo')->insert([
                    'alumno_id' => $alumno_id,
                    'grupo_id' => $grupo_id,
                ]);
            }
        }
    }
}
