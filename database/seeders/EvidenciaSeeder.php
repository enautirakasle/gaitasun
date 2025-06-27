<?php

namespace Database\Seeders;

use App\Models\Evidencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EvidenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener relaciones de la base de datos
        $alumnoGrupos = DB::table('alumno_grupo')->get()->groupBy('alumno_id');
        $grupoProfesores = DB::table('grupo_profesor')->get()->groupBy('grupo_id');

        $evidenciasAGenerar = 200;

        for ($i = 0; $i < $evidenciasAGenerar; $i++) {
            // Seleccionar un alumno aleatorio del 1 al 10
            $alumno_id = rand(1, 10);

            // Verificar que el alumno tenga al menos un grupo
            if (!isset($alumnoGrupos[$alumno_id])) {
                continue;
            }

            // Seleccionar un grupo al que pertenezca este alumno
            $grupo = $alumnoGrupos[$alumno_id]->random();
            $grupo_id = $grupo->grupo_id;

            // Verificar que el grupo tenga profesores asignados
            if (!isset($grupoProfesores[$grupo_id])) {
                continue;
            }

            // Seleccionar un profesor del grupo
            $profesor = $grupoProfesores[$grupo_id]->random();
            $profesor_id = $profesor->profesor_id;

            // Crear evidencia con esos datos
            DB::table('evidencias')->insert([
                'indicador_id' => rand(1, 46),
                'alumno_id' => $alumno_id,
                'profesor_id' => $profesor_id,
                'grupo_id' => $grupo_id,
                'fecha' => Carbon::now()->subDays(rand(0, 60))->toDateString(),
                'descripcion' => rand(0, 1) ? 'Evidencia observada durante una actividad grupal.' : null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
