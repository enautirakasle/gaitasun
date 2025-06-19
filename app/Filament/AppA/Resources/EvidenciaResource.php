<?php

namespace App\Filament\AppA\Resources;

use App\Filament\AppA\Resources\EvidenciaResource\Pages;
use App\Filament\AppA\Resources\EvidenciaResource\RelationManagers;
use App\Models\Evidencia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EvidenciaResource extends Resource
{
    protected static ?string $model = Evidencia::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // public static function form(Form $form): Form
    // {
    //     return $form
    //         ->schema([
    //             Forms\Components\TextInput::make('indicador_id')
    //                 ->required()
    //                 ->numeric(),
    //             Forms\Components\TextInput::make('alumno_id')
    //                 ->required()
    //                 ->numeric(),
    //             Forms\Components\TextInput::make('profesor_id')
    //                 ->required()
    //                 ->numeric(),
    //             Forms\Components\DatePicker::make('fecha')
    //                 ->required(),
    //             Forms\Components\TextInput::make('descripcion')
    //                 ->maxLength(255),
    //             Forms\Components\TextInput::make('grupo_id')
    //                 ->required()
    //                 ->numeric(),
    //         ]);
    // }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('indicador.nombre')
                    ->numeric()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('indicador.competenciaTransversal.nombre')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('alumno.user.name')
                    ->label('Alumno')
                    ->sortable(),
                Tables\Columns\TextColumn::make('profesor.user.name')
                    ->label('Profesor')
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('descripcion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('grupo.nombre')
                    ->label('Grupo')
                    ->sortable(),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvidencias::route('/'),
            // 'create' => Pages\CreateEvidencia::route('/create'),
            // 'edit' => Pages\EditEvidencia::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        if($user->hasAnyRole(['admin', 'profesor'])) {
            return parent::getEloquentQuery();

        }
        return parent::getEloquentQuery()->where('alumno_id', Auth::user()->alumno->id);
    }
}
