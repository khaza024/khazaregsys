<?php

namespace App\Filament\Resources\CpdResource\Widgets;

use DateTime;
use Carbon\Carbon;
use App\Models\Cpd;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;
use Filament\Forms\Components\Select;

class CpdChart extends ChartWidget
{
    protected static ?string $heading = 'CPD Chart';

    protected function getFormSchema(): array
    {
        return [
            Select::make('school_year')
                ->options($this->getSchoolYears())
                ->label('Select School Year')
                ->default($this->getCurrentSchoolYear())
                ->reactive()
                ->afterStateUpdated(fn () => $this->refresh()),
        ];
    }

    protected function getSchoolYears(): array
    {
        // Assuming school years are in the format "2023-2024", "2022-2023", etc.
        return [
            '2023-2024' => '2023-2024',
            '2022-2023' => '2022-2023',
            '2021-2022' => '2021-2022',
        ];
    }

    protected function getCurrentSchoolYear(): string
    {
        $currentYear = now()->year;
        $startYear = now()->month >= 8 ? $currentYear : $currentYear - 1;
        $endYear = $startYear + 1;

        return "$startYear-$endYear";
    }

    protected function getData(): array
    {
        $schoolYear = $this->filterFormData['school_year'] ?? $this->getCurrentSchoolYear();
        [$startYear, $endYear] = explode('-', $schoolYear);

        $start = new DateTime("$startYear-08-01");
        $end = new DateTime("$endYear-07-31");

        $data = Trend::model(Cpd::class)
            ->between(start: $start, end: $end)
            ->perMonth()
            ->dateColumn('created_at')
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Cpd Registration',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate)->toArray(),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => (new DateTime($value->date))->format('M Y'))->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
