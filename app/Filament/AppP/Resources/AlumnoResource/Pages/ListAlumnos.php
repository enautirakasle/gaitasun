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

class ListAlumnos extends ListRecords
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
                    return $query->whereHas('grupos', function (Builder $q) use ($groupId) {
                        $q->where('grupos.id', $groupId);
                    });
                }
            )
            ->columns(AlumnoResource::table(new Table($this))->getColumns())
            ->actions([
                // Acciones personalizadas con acceso al groupId
                \Filament\Tables\Actions\ViewAction::make(),
                \Filament\Tables\Actions\EditAction::make(),
                
                Action::make('komunikazio')
                    ->label('Komunikazio')
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
                            ->required(),

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
                        Forms\Components\Select::make('indicador_id')
                            ->label('Indicador')
                            ->preload()
                            ->placeholder('Selecciona un indicador')
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
                            ->searchable(),
                            
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
}