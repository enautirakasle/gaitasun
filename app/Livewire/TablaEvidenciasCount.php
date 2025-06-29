<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Evidencia;

class TablaEvidenciasCount extends Component
{
    public int $alumnoId; // ← Esta propiedad recibirá el ID del alumno

    public function render()
    {
        // $conteo = Evidencia::where('alumno_id', $this->alumnoId)->count();
        $evidencias = Evidencia::where('alumno_id', $this->alumnoId)->get()->sortByDesc('fecha');

        return view('livewire.tabla-evidencias-count', [
            // 'conteo' => $conteo,
            'evidencias' => $evidencias,
        ]);
    }
}
