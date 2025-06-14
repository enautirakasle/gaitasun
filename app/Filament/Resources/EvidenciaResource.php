<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EvidenciaResource\Pages;
use App\Filament\Resources\EvidenciaResource\RelationManagers;
use App\Models\Evidencia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Illuminate\Support\Collection;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;
use App\Models\Alumno;
use App\Models\Grupo;

class EvidenciaResource extends Resource
{
    protected static ?string $model = Evidencia::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('indicador_id')
                    ->relationship('indicador', 'nombre')
                    ->required()
                    ->searchable()
                    ->preload(),
                Forms\Components\DatePicker::make('fecha')
                    ->required(),
                Forms\Components\TextInput::make('descripcion')
                    ->maxLength(255),
                Select::make('curso_filtro') // este campo no existe en DB
                    ->label('Curso')
                    ->options(\App\Models\Curso::pluck('nombre', 'id'))
                    ->live(), // importante para reactividad
                Select::make('grupo_id')
                    ->label('Grupo')
                    ->options(
                        fn(Get $get) =>
                        \App\Models\Grupo::where('curso_id', $get('curso_filtro'))
                            ->whereHas('alumnos') // opcional
                            ->whereHas('profesores') // opcional
                            ->pluck('nombre', 'id')
                    )
                    ->searchable()
                    ->required(),
                Select::make('alumno_id')
                    ->label('Alumno')
                    ->options(function (Get $get): Collection {
                        $grupoId = $get('grupo_id');

                        if (!$grupoId) {
                            return collect();
                        }

                        return Alumno::whereHas(
                            'grupos',
                            fn($query) =>
                            $query->where('grupos.id', $grupoId)
                        )
                            ->with('user')
                            ->get()
                            ->mapWithKeys(fn($alumno) => [
                                $alumno->id => $alumno->user->name,
                            ]);
                    })
                    ->searchable()
                    ->required(),
                Select::make('profesor_id')
                    ->label('Profesor')
                    ->options(function (Get $get): Collection {
                        $grupoId = $get('grupo_id');

                        if (!$grupoId) {
                            return collect();
                        }

                        return \App\Models\Profesor::whereHas(
                            'grupos',
                            fn($query) =>
                            $query->where('grupos.id', $grupoId)
                        )
                            ->with('user')
                            ->get()
                            ->mapWithKeys(fn($profesor) => [
                                $profesor->id => $profesor->user->name,
                            ]);
                    })
                    ->searchable()
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('indicador.nombre')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('alumno.user.name')
                    ->sortable()
                    ->label('Alumno'),
                Tables\Columns\TextColumn::make('profesor.user.name')
                    ->sortable()
                    ->label('Profesor'),
                Tables\Columns\TextColumn::make('fecha')
                    ->date('d/m/Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('descripcion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('grupo.nombre')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // SelectFilter::make('aluumno_id')
                //     ->relationship('alumno', 'id')
                //     ->getOptionLabelFromRecordUsing(fn($record) => $record->user->name)
                //     ->searchable()
                //     ->preload(),
                SelectFilter::make('alumno_id')
                    ->label('Alumno con evidencias')
                    ->options(function () {
                        return Alumno::has('evidencias')
                            ->with('user')
                            ->get()
                            ->mapWithKeys(fn($alumno) => [
                                $alumno->id => $alumno->user->name,
                            ])
                            ->toArray();
                    })
                    ->searchable(),
                SelectFilter::make('grupo_id')
                    ->label('Grupos')
                    ->options(function () {
                        return Grupo::whereHas('alumnos') // Solo grupos con alumnos
                            ->get()
                            ->mapWithKeys(fn($grupo) => [
                                $grupo->id => $grupo->nombre,
                            ])
                            ->toArray();
                    })
                    ->searchable()
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'create' => Pages\CreateEvidencia::route('/create'),
            'edit' => Pages\EditEvidencia::route('/{record}/edit'),
        ];
    }
}
