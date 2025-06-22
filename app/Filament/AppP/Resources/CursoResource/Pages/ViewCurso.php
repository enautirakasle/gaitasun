<?php

namespace App\Filament\AppP\Resources\CursoResource\Pages;

use App\Filament\AppP\Resources\CursoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCurso extends ViewRecord
{
    protected static string $resource = CursoResource::class;

    public function getTitle(): string
    {
        return 'Grupos del curso ' . $this->record->nombre;
    }

    // Esto indica que debe mostrar los Relation Managers
    protected function hasRelationManagers(): bool
    {
        return true;
    }
}
