<?php

namespace App\Filament\Resources\AlumnoResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EvidenciasRelationManager extends RelationManager
{
    protected static string $relationship = 'evidencias';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('fecha')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('fecha')
            ->columns([
                Tables\Columns\TextColumn::make('fecha'),
                Tables\Columns\TextColumn::make('indicador.nombre')
                    ->label('Indicador')
                    ->searchable()
                    ->sortable(),
            ])
            // Tables\Columns\TextColumn::make('descripcion'),
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
