<?php

namespace App\Filament\AppA\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use App\Models\CompetenciaTransversal;
use Illuminate\Support\Facades\Auth;

class EvolucionIkastenLineChart extends ChartWidget
{
    protected static ?string $heading = 'Evolución de evidencias - Ikasten...';

    protected function getData(): array
    {
        $competencia = CompetenciaTransversal::where('nombre', 'like', 'Ikasten eta pentsatzen%')->first();

        if (!$competencia) {
            return [
                'datasets' => [
                    [
                        'label' => 'Evidencias',
                        'data' => [],
                        'borderColor' => 'rgba(75, 192, 192, 1)',
                        'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
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
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
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
