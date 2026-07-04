<?php

namespace App\Filament\AppA\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Evidencia;
use Illuminate\Support\Facades\DB;
use App\Models\CompetenciaTransversal;
use Illuminate\Support\Facades\Auth;

class EvidenciasPorCompetenciaBarChart extends ChartWidget
{
    public $alumno_id = null;

    protected static ?string $heading = 'Evidencias por competencia (barras)';

    protected function getData(): array
    {
        $data = DB::table('evidencias')
            ->join('indicadors', 'evidencias.indicador_id', '=', 'indicadors.id')
            ->join('competencia_transversals', 'indicadors.competencia_transversal_id', '=', 'competencia_transversals.id')
            ->select(
                'competencia_transversals.id as competencia_id',
                DB::raw('COUNT(evidencias.id) as total_evidencias')
            )
            ->where('evidencias.alumno_id', $this->alumno_id ?? Auth::user()->alumno->id)
            ->groupBy('competencia_transversals.id')
            ->pluck('total_evidencias', 'competencia_id');

        $labels = CompetenciaTransversal::all()->pluck('nombre')->map(function ($nombre) {
            return mb_substr($nombre, 0, 8) . '...';
        })->all();

        return [
            'datasets' => [
                [
                    'label' => 'Evidencias',
                    'data' => $data->values()->all(),
                    'backgroundColor' => [
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                    ],
                    'borderColor' => [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
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
