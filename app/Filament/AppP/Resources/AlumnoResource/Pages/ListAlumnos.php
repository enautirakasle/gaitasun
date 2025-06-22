<?php

namespace App\Filament\AppP\Resources\AlumnoResource\Pages;

use App\Filament\AppP\Resources\AlumnoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAlumnos extends ListRecords
{
    protected static string $resource = AlumnoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
