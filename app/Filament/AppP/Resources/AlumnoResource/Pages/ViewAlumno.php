<?php

namespace App\Filament\AppP\Resources\AlumnoResource\Pages;

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

//     public function getHeading(): string
// {
//     return 'Alumno: ' . $this->record->user->name;
// }
    public function getView(): string
    {
        return 'filament.app-p.resources.alumnos.view-alumno';
    }

}
