<?php

namespace App\Filament\AppP\Resources\AlumnoResource\Pages;

use App\Filament\AppP\Resources\AlumnoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAlumno extends EditRecord
{
    protected static string $resource = AlumnoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
