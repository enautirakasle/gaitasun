<?php

namespace App\Filament\AppA\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use App\Models\CompetenciaTransversal;
use Illuminate\Support\Facades\Auth;

class EvolucionIzatenLineChart extends ChartWidget
{
    protected static ?string $heading = 'Evolución de evidencias - Izaten...';

    protected function getData(): array
    {
        $competencia = CompetenciaTransversal::where('nombre', 'like', 'Izaten%')->first();

        if (!$competencia) {
            return [
                'datasets' => [
                    [
                        'label' => 'Puntuación acumulada',
                        'data' => [],
                        'borderColor' => 'rgba(255, 99, 132, 1)',
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'fill' => true,
                        'tension' => 0.3,
                    ],
                ],
                'labels' => [],
            ];
        }

        $rows = DB::table('evidencias')
            ->join('indicadors', 'evidencias.indicador_id', '=', 'indicadors.id')
            ->where('indicadors.competencia_transversal_id', $competencia->id)
            ->where('evidencias.alumno_id', Auth::user()->alumno->id)
            ->select(DB::raw('DATE(evidencias.fecha) as fecha'), DB::raw('CAST(indicadors.valor AS INTEGER) as valor'))
            ->orderBy('fecha')
            ->get();

        $cumulative = 0;
        $dates = [];
        $values = [];
        foreach ($rows as $row) {
            $cumulative += $row->valor;
            $dates[] = $row->fecha;
            $values[] = $cumulative;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Puntuación acumulada',
                    'data' => $values,
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'fill' => true,
                    'tension' => 0.3,
                ],
            ],
            'labels' => $dates,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    public static function canView(): bool
    {
        $user = Auth::user();
        return $user->hasRole('alumno');
    }
}
