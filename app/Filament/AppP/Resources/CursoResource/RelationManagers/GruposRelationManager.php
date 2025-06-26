<?php

namespace App\Filament\AppP\Resources\CursoResource\RelationManagers;

use App\Filament\AppP\Resources\AlumnoResource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Grupo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GruposRelationManager extends RelationManager
{
    protected static string $relationship = 'grupos';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nombre')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nombre')
                ->label('Grupo')
                    ->sortable()
                    ->url(fn($record) => AlumnoResource::getUrl('index', ['record' => $record->id]))
            ])
            ->filters([
                //
            ])
            ->headerActions([
            ])
            ->actions([
                Tables\Actions\Action::make('alumnos')
                    ->label(fn($record) => 'Ikasleak (' . $record->alumnos()->count() . ')')
                    ->url(fn($record) => AlumnoResource::getUrl('index', ['record' => $record->id]))
                    ->color('primary'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
