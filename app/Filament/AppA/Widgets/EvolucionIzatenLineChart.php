<?php

namespace App\Filament\AppA\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use App\Models\CompetenciaTransversal;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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

        $query = DB::table('evidencias')
            ->join('indicadors', 'evidencias.indicador_id', '=', 'indicadors.id')
            ->where('indicadors.competencia_transversal_id', $competencia->id)
            ->where('evidencias.alumno_id', Auth::user()->alumno->id)
            ->select(DB::raw('DATE(evidencias.fecha) as fecha'), DB::raw('CAST(indicadors.valor AS INTEGER) as valor'));

        if ($this->filter) {
            $days = match ($this->filter) {
                '7' => 7,
                '30' => 30,
                '90' => 90,
                default => null,
            };
            if ($days) {
                $query->where('evidencias.fecha', '>=', Carbon::today()->subDays($days));
            }
        }

        $rows = $query->orderBy('fecha')->get();

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

    protected function getFilters(): ?array
    {
        return [
            'all' => 'Todo',
            '7' => 'Últimos 7 días',
            '30' => 'Últimos 30 días',
            '90' => 'Últimos 90 días',
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
