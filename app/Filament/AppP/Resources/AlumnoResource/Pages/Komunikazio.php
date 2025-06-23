<?php

namespace App\Filament\AppP\Resources\AlumnoResource\Pages;

use App\Filament\AppP\Resources\AlumnoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class Komunikazio extends CreateRecord
{
    protected static string $resource = AlumnoResource::class;

    protected function getRedirectUrl(): string
    {
        return AlumnoResource::getUrl('index');
    }
    public function getTitle(): string
    {
        return 'Komunikazio berria';
    }
    
}
