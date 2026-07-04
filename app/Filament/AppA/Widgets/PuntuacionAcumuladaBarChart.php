<?php

namespace App\Filament\AppA\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use App\Models\CompetenciaTransversal;
use Illuminate\Support\Facades\Auth;

class PuntuacionAcumuladaBarChart extends ChartWidget
{
    public $alumno_id = null;

    protected static ?string $heading = 'Puntuación acumulada actual por competencia';

    protected function getData(): array
    {
        $userId = $this->alumno_id ?? Auth::user()->alumno->id;

        $competenciaIds = CompetenciaTransversal::orderBy('id')->pluck('id', 'nombre');

        $data = DB::table('evidencias')
            ->join('indicadors', 'evidencias.indicador_id', '=', 'indicadors.id')
            ->join('competencia_transversals', 'indicadors.competencia_transversal_id', '=', 'competencia_transversals.id')
            ->select(
                'competencia_transversals.id as competencia_id',
                DB::raw('SUM(CAST(indicadors.valor AS INTEGER)) as puntuacion')
            )
            ->where('evidencias.alumno_id', $userId)
            ->groupBy('competencia_transversals.id')
            ->orderBy('competencia_transversals.id')
            ->pluck('puntuacion', 'competencia_id');

        $labels = $competenciaIds->keys()->map(function ($nombre) {
            return mb_substr($nombre, 0, 8) . '...';
        })->all();

        $values = $competenciaIds->keys()->map(function ($nombre) use ($competenciaIds, $data) {
            return $data->get($competenciaIds[$nombre], 0);
        })->all();

        return [
            'datasets' => [
                [
                    'label' => 'Puntuación acumulada',
                    'data' => $values,
                    'backgroundColor' => [
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                    ],
                    'borderColor' => [
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 99, 132, 1)',
                    ],
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    public static function canView(): bool
    {
        $user = Auth::user();
        return $user->hasRole(['alumno', 'profesor', 'admin']);
    }
}
