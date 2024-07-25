<?php

namespace App\Filament\Resources\CpdResource\Widgets;

use App\Models\Cpd;
// use Filament\Widgets\ChartWidget;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CpdStatsWidget extends BaseWidget
{
    // protected static ?string $heading = 'Chart';

    // protected function getData(): array
    // {
    //     return [
    //         //
    //     ];
    // }

    // protected function getType(): string
    // {
    //     return 'bar';
    // }

    protected function getStats(): array
    {
        return [
            Stat::make('Total CPD yang Daftar', Cpd::count()),
            Stat::make('Total CPD Laki-laki', Cpd::where('gender', 'Laki-laki')->count()),
            Stat::make('Total CPD Perempuan', Cpd::where('gender', 'Perempuan')->count()),
        ];
    }
}
