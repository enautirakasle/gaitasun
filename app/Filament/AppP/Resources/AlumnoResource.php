<?php

namespace App\Filament\AppP\Resources;

use App\Filament\AppP\Resources\AlumnoResource\Pages;
use App\Filament\AppP\Resources\AlumnoResource\RelationManagers;
use App\Models\Alumno;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\Evidencia;

class AlumnoResource extends Resource
{
    protected static ?string $model = Alumno::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordUrl(null) // ← Agregar esta línea para deshabilitar el click en la fila
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),

                // Generar acciones dinámicamente desde CompetenciaTransversal
                //table ListAlumnosen definituta dagoenez hay ez da aplikatzen
                ...\App\Models\CompetenciaTransversal::all()->map(function ($competencia) {
                    return Action::make(substr($competencia->nombre, 0, 10))
                        ->label(substr($competencia->nombre, 0, 10))
                        ->form([
                            Forms\Components\Select::make('indicador_id')
                                ->label('Indicador')
                                ->placeholder('Selecciona un indicador')
                                ->options($competencia->indicadors()
                                    ->pluck('nombre', 'id') // o el campo que uses para el nombre
                                    ->toArray())
                                ->required()
                                ->searchable(), // Para que sea buscable si hay muchos indicadores
                            Forms\Components\Textarea::make('descripcion')
                                ->label('Descripción')
                                ->rows(4),
                            // más campos...
                        ])
                        // ->action(fn($record) => dd('hola'));
                        ->action(function (array $data, $record) {
                            // Procesar los datos del formulario
                            // $record->pentsatzekos()->create($data);
                        });
                })->all(),
                // Aquí puedes agregar acciones específicas para cada competencia transversal
                //   Action::make('pentsatzeko')
                //     ->label('Pentsatzeko')
                //     ->icon('heroicon-o-light-bulb')
                //     ->form([
                //         Forms\Components\Select::make('indicador_id')
                //             ->label('Indicador')
                //             ->placeholder('Selecciona un indicador')
                //             ->options(function () {
                //                 // Buscar la competencia transversal "Pentsatzeko"
                //                 $competencia = \App\Models\CompetenciaTransversal::where('nombre', 'Pentsatzeko')
                //                     ->orWhere('nombre', 'LIKE', '%pentsatzen%') // Por si tiene variaciones
                //                     ->first();

                //                 if (!$competencia) {
                //                     return [];
                //                 }

                //                 // Obtener los indicadores de esa competencia
                //                 return $competencia->indicadors()
                //                     ->pluck('nombre', 'id') // o el campo que uses para el nombre
                //                     ->toArray();
                //             })
                //             ->required()
                //             ->searchable(), // Para que sea buscable si hay muchos indicadores

                        // más campos...
                    // ])
                    // ->action(function (array $data, $record) {
                        // Procesar los datos del formulario
                        // $record->pentsatzekos()->create($data);
                    // }),
                //beste azpipage bat zabaltzeko aukera
                // Action::make('pentsatzeko')
                //     ->label('Pentsatzeko')
                //     ->icon('heroicon-o-light-bulb')
                //     ->url(fn($record) => AlumnoResource::getUrl('pentsatzeko', ['record' => $record->id])),
            ])->headerActions([
                Tables\Actions\CreateAction::make(),
            ])->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                //
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
            'index' => Pages\ListAlumnos::route('/grupo/{record?}'),
            'create' => Pages\CreateAlumno::route('/create'),
            'edit' => Pages\EditAlumno::route('/{record}/edit'),
            'view' => Pages\ViewAlumno::route('/{record}'),
        ];
    }


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        dd($data);

        return $data;
    }


    public static function canViewAny(): bool
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        return $user && $user->hasRole(['admin', 'profesor']);
    }

    public static function canEdit(Model $record): bool
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        return $user && $user->hasRole(['admin']) && $record->profesor_id === $user->id;
    }
}
