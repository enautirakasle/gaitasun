<?php

namespace App\Filament\AppA\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Evidencia;
use Illuminate\Support\Facades\Auth;

class KomunikatzekoKChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {

        $data = Evidencia::where('alumno_id', Auth::user()->alumno->id)
            ->get()
            ->groupBy('indicador_id')
            ->map(function ($evidencias) {
                return $evidencias->count();
            });

        // dd($data);
        return [
            'datasets' => [
                [
                    'label' => 'Komunikatzeko K',
                    'data' => $data->values()->all(),
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                    ],
                    'borderColor' => [
                        'rgba(255,99,132)',
                        'rgba(54,162,235)',
                        'rgba(255,206,86)',
                        'rgba(75,192,192)',
                        'rgba(153,102,255)',
                        'rgba(255,159,64)',
                    ],
                    'borderWidth' => 1,
                ],
            ],
            'labels' => ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        ];
    }

    protected function getType(): string
    {
        return 'polarArea';
    }
}
