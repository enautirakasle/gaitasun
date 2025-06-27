<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB; // Import DB facade to use it directly

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('grupos')->insert([
            [
                'nombre' => 'DBH1 A',
                'curso_id' => 1, // Assuming the first course exists
            ],
            [
                'nombre' => 'DBH1 B',
                'curso_id' => 1, // Assuming the first course exists
            ],
            [
                'nombre' => 'DBH2 A',
                'curso_id' => 1, // Assuming the second course exists
            ],
             [
                'nombre' => 'DBH1 A',
                'curso_id' => 2, // Assuming the first course exists
            ],
            [
                'nombre' => 'DBH1 B',
                'curso_id' => 2, // Assuming the first course exists
            ],
            [
                'nombre' => 'DBH2 A',
                'curso_id' => 2, // Assuming the second course exists
            ],

            [
                'nombre' => 'DBH2 B',
                'curso_id' => 1,
            ],
            [
                'nombre' => 'DBH3 A',
                'curso_id' => 1,
            ],
            [
                'nombre' => 'DBH3 B',
                'curso_id' => 1,
            ],
            [
                'nombre' => 'DBH4 A',
                'curso_id' => 1,
            ],
            [
                'nombre' => 'DBH4 B',
                'curso_id' => 1,
            ],
            [
                'nombre' => 'DBH2 B',
                'curso_id' => 2,
            ],
            [
                'nombre' => 'DBH3 A',
                'curso_id' => 2,
            ],
            [
                'nombre' => 'DBH3 B',
                'curso_id' => 2,
            ],
            [
                'nombre' => 'DBH4 A',
                'curso_id' => 2,
            ],
            [
                'nombre' => 'DBH4 B',
                'curso_id' => 2,
            ],
        ]);
    }
}
