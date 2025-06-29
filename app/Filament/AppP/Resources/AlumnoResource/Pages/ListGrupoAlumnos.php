<?php

namespace App\Filament\AppP\Resources\AlumnoResource\Pages;

use App\Filament\AppP\Resources\AlumnoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Forms;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use App\Models\Evidencia;
use App\Models\Grupo;

class ListGrupoAlumnos extends ListRecords
{
     protected static string $resource = AlumnoResource::class;

    public int|null $groupId = null;

    public function mount(?string $record = null): void
    {
        parent::mount();
        if ($record) {
            $this->groupId = $record;
        }
    }

    public function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(
                function (Builder $query) {
                    $groupId = $this->groupId;

                    // Join with evidencias and count incidencias por alumno
                    $query->whereHas('grupos', function (Builder $q) use ($groupId) {
                        $q->where('grupos.id', $groupId);
                    })
                    ->withCount(['evidencias as incidencias_count' => function ($q) {
                        // Puedes filtrar por tipo de incidencia si lo necesitas
                    }])
                    ->orderBy('incidencias_count');

                    return $query;
                }
            )
            ->columns(AlumnoResource::table(new Table($this))->getColumns())
            ->actions([
                // Acciones personalizadas con acceso al groupId
                \Filament\Tables\Actions\ViewAction::make(),
                \Filament\Tables\Actions\EditAction::make(),

                Action::make('komunikazio')
                    ->label('Komunikatzeko')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->form([
                        Forms\Components\Radio::make('indicador_id')
                            ->label('Indicador')
                            ->options(function () {
                                $competencia = \App\Models\CompetenciaTransversal::where('nombre', 'Komunikatzeko')
                                    ->orWhere('nombre', 'LIKE', '%komunikatzeko%')
                                    ->first();
                                if (!$competencia) {
                                    return [];
                                }
                                return $competencia->indicadors()
                                    ->pluck('nombre', 'id')
                                    ->toArray();
                            })
                            ->required()
                            ->inline(), // Puedes quitar esto si prefieres que se muestren verticalmente

                        Forms\Components\Textarea::make('descripcion')
                            ->label('Descripción')
                            ->rows(2),
                    ])
                    ->action(function (array $data, $record) {
                        Evidencia::create([
                            'indicador_id' => $data['indicador_id'],
                            'alumno_id' => $record->id,
                            'profesor_id' => Auth::user()->profesor->id ?? null,
                            'fecha' => now()->toDateString(),
                            'descripcion' => $data['descripcion'] ?? null,
                            'grupo_id' => $this->groupId, // Aquí usas el groupId de la página
                        ]);

                        \Filament\Notifications\Notification::make()
                            ->title('Evidencia guardada correctamente')
                            ->success()
                            ->send();
                    }),

                Action::make('pentsatzeko')
                    ->label('Pentsatzeko')
                    ->icon('heroicon-o-light-bulb')
                    ->form([
                        Forms\Components\Radio::make('indicador_id')
                            ->label('Indicador')
                            ->options(function () {
                                $competencia = \App\Models\CompetenciaTransversal::where('nombre', 'Pentsatzeko')
                                    ->orWhere('nombre', 'LIKE', '%pentsatzen%')
                                    ->first();

                                if (!$competencia) {
                                    return [];
                                }

                                return $competencia->indicadors()
                                    ->pluck('nombre', 'id')
                                    ->toArray();
                            })
                            ->required()
                            ->inline(), // Puedes quitar esto si prefieres que se muestren verticalmente



                        Forms\Components\Textarea::make('descripcion')
                            ->label('Descripción')
                            ->rows(2),
                    ])
                    ->action(function (array $data, $record) {
                        Evidencia::create([
                            'indicador_id' => $data['indicador_id'],
                            'alumno_id' => $record->id,
                            'profesor_id' => Auth::user()->profesor->id ?? null,
                            'fecha' => now()->toDateString(),
                            'descripcion' => $data['descripcion'] ?? null,
                            'grupo_id' => $this->groupId, // Aquí también usas el groupId
                        ]);

                        \Filament\Notifications\Notification::make()
                            ->title('Evidencia guardada correctamente')
                            ->success()
                            ->send();
                    }),





                Action::make('elkarbizitzarako')
                    ->label('Elkarbizitzarako')
                    ->icon('heroicon-o-users')
                    ->form([
                        Forms\Components\Radio::make('indicador_id')
                            ->label('Indicador')
                            ->options(function () {
                                $competencia = \App\Models\CompetenciaTransversal::where('nombre', 'Elkarbizitzarako')
                                    ->orWhere('nombre', 'LIKE', '%elkarbizitzarako%')
                                    ->first();

                                if (!$competencia) {
                                    return [];
                                }

                                return $competencia->indicadors()
                                    ->pluck('nombre', 'id')
                                    ->toArray();
                            })
                            ->required()
                            ->inline(), // Opcional: para mostrar en línea


                        Forms\Components\Textarea::make('descripcion')
                            ->label('Descripción')
                            ->rows(2),
                    ])
                    ->action(function (array $data, $record) {
                        Evidencia::create([
                            'indicador_id' => $data['indicador_id'],
                            'alumno_id' => $record->id,
                            'profesor_id' => Auth::user()->profesor->id ?? null,
                            'fecha' => now()->toDateString(),
                            'descripcion' => $data['descripcion'] ?? null,
                            'grupo_id' => $this->groupId, // Aquí también usas el groupId
                        ]);

                        \Filament\Notifications\Notification::make()
                            ->title('Evidencia guardada correctamente')
                            ->success()
                            ->send();
                    }),

                Action::make('ekimenerako')
                    ->label('Ekimenerako')
                    ->icon('heroicon-o-rocket-launch')
                    ->form([
                        Forms\Components\Radio::make('indicador_id')
                            ->label('Indicador')
                            ->options(function () {
                                $competencia = \App\Models\CompetenciaTransversal::where('nombre', 'Ekimenerako')
                                    ->orWhere('nombre', 'LIKE', '%ekimenerako%')
                                    ->first();

                                if (!$competencia) {
                                    return [];
                                }

                                return $competencia->indicadors()
                                    ->pluck('nombre', 'id')
                                    ->toArray();
                            })
                            ->required()
                            ->inline(), // Opcional: puedes quitar esto si prefieres vertical


                        Forms\Components\Textarea::make('descripcion')
                            ->label('Descripción')
                            ->rows(2),
                    ])
                    ->action(function (array $data, $record) {
                        Evidencia::create([
                            'indicador_id' => $data['indicador_id'],
                            'alumno_id' => $record->id,
                            'profesor_id' => Auth::user()->profesor->id ?? null,
                            'fecha' => now()->toDateString(),
                            'descripcion' => $data['descripcion'] ?? null,
                            'grupo_id' => $this->groupId, // Aquí también usas el groupId
                        ]);

                        \Filament\Notifications\Notification::make()
                            ->title('Evidencia guardada correctamente')
                            ->success()
                            ->send();
                    }),


                Action::make('izateko')
                    ->label('Izateko')
                    ->icon('heroicon-o-user')
                    ->form([

                        Forms\Components\Radio::make('indicador_id')
                            ->label('Indicador')
                            ->options(function () {
                                $competencia = \App\Models\CompetenciaTransversal::where('nombre', 'Izateko')
                                    ->orWhere('nombre', 'LIKE', '%izaten%')
                                    ->first();

                                if (!$competencia) {
                                    return [];
                                }

                                return $competencia->indicadors()
                                    ->pluck('nombre', 'id')
                                    ->toArray();
                            })
                            ->required()
                            ->inline(),

                        Forms\Components\Textarea::make('descripcion')
                            ->label('Descripción')
                            ->rows(2),
                    ])
                    ->action(function (array $data, $record) {
                        Evidencia::create([
                            'indicador_id' => $data['indicador_id'],
                            'alumno_id' => $record->id,
                            'profesor_id' => Auth::user()->profesor->id ?? null,
                            'fecha' => now()->toDateString(),
                            'descripcion' => $data['descripcion'] ?? null,
                            'grupo_id' => $this->groupId, // Aquí también usas el groupId
                        ]);

                        \Filament\Notifications\Notification::make()
                            ->title('Evidencia guardada correctamente')
                            ->success()
                            ->send();
                    }),
            ]);
    }

     public function getTitle(): string
    {
        $grupo = Grupo::with('curso')->find($this->groupId);

        if (!$grupo) {
            return 'Grupo no encontrado';
        }

        $cursoNombre = $grupo->curso->nombre ?? '';
        return 'Alumnos de ' . $grupo->nombre . ' (' . $cursoNombre . ')';
    }
}

