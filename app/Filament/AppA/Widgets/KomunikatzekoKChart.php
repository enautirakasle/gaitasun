<?php

namespace App\Filament\AppA\Widgets;

use Filament\Widgets\ChartWidget;

class KomunikatzekoKChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'polarArea';
    }
}
