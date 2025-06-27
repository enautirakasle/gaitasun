<?php

namespace Database\Seeders;

use App\Models\Evidencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EvidenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //     for ($i = 0; $i < 200; $i++) {
        // DB::table('evidencias')->insert([
        //     'indicador_id' => rand(1, 60),
        //     'alumno_id' => rand(1, 100),
        //     'profesor_id' => rand(1, 6),
        //     'fecha' => Carbon::now()->subDays(rand(0, 60))->toDateString(),
        //     'descripcion' => rand(0, 1) ? 'Observación breve realizada en clase.' : null,
        //     'grupo_id' => rand(1, 10),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // }
    }
}
