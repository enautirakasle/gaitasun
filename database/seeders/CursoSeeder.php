<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Uncomment if you want to use DB facade directly

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cursos')->insert([
            [
            'nombre' => '2024-2025',
            'fecha_inicio' => '2024-09-01',
            'fecha_fin' => '2025-06-30',
            ],
            [
            'nombre' => '2025-2026',
            'fecha_inicio' => '2025-09-01',
            'fecha_fin' => '2026-06-30',
            ],
            [
            'nombre' => '2026-2027',
            'fecha_inicio' => '2026-09-01',
            'fecha_fin' => '2027-06-30',
            ],
        ]);
    }
}
