<?php

namespace App\Filament\AppP\Resources\AlumnoResource\Pages;

use App\Filament\AppA\Widgets\EvolucionCompetenciaLineChart;
use App\Filament\AppA\Widgets\EvolucionIkastenLineChart;
use App\Filament\AppA\Widgets\EvolucionElkarbizitzaLineChart;
use App\Filament\AppA\Widgets\EvolucionEkimenaLineChart;
use App\Filament\AppA\Widgets\EvolucionIzatenLineChart;
use App\Filament\AppA\Widgets\EvidenciasPorCompetenciaBarChart;
use App\Filament\AppA\Widgets\PuntuacionAcumuladaBarChart;
use App\Filament\AppP\Resources\AlumnoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Tables;
use Filament\Tables\Table;

class ViewAlumno extends ViewRecord
{
    protected static string $resource = AlumnoResource::class;

    public function getTitle(): string
    {
        return 'Alumno ' . $this->record->user->name;
    }

    protected function getHeaderWidgets(): array
    {
        return [
            EvidenciasPorCompetenciaBarChart::make(['alumno_id' => $this->record->id]),
            PuntuacionAcumuladaBarChart::make(['alumno_id' => $this->record->id]),
            EvolucionCompetenciaLineChart::make(['alumno_id' => $this->record->id]),
            EvolucionIkastenLineChart::make(['alumno_id' => $this->record->id]),
            EvolucionElkarbizitzaLineChart::make(['alumno_id' => $this->record->id]),
            EvolucionEkimenaLineChart::make(['alumno_id' => $this->record->id]),
            EvolucionIzatenLineChart::make(['alumno_id' => $this->record->id]),
        ];
    }

    public function getView(): string
    {
        return 'filament.app-p.resources.alumnos.view-alumno';
    }

}
