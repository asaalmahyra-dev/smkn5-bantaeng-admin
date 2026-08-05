<?php

namespace App\Filament\Widgets;

use App\Models\Achievement;
use Filament\Widgets\ChartWidget;

class AchievementChartWidget extends ChartWidget
{
    protected int | string | array $columnSpan = 'full';

    protected ?string $pollingInterval = null;

    protected ?string $heading = 'Prestasi per Tahun';

    protected ?string $description = 'Jumlah prestasi yang berhasil diraih setiap tahun.';

    protected static ?int $sort = 4;

    protected function getData(): array
    {
        // Database-agnostic: gunakan get() lalu kelompokkan di PHP agar
        // kompatibel MySQL & SQLite (tanpa fungsi YEAR).
        $achievements = Achievement::query()
            ->whereNotNull('year')
            ->get(['year']);

        $yearlyCounts = [];

        foreach ($achievements as $achievement) {
            $year = (int) $achievement->year;
            $yearlyCounts[$year] = ($yearlyCounts[$year] ?? 0) + 1;
        }

        ksort($yearlyCounts);

        $labels = [];
        $data = [];

        foreach ($yearlyCounts as $year => $count) {
            $labels[] = (string) $year;
            $data[] = $count;
        }

        if (empty($labels)) {
            $labels = ['Belum ada data'];
            $data = [0];
        }

        return [
            'datasets' => [
                [
                    'label' => 'Prestasi',
                    'data' => $data,
                    'backgroundColor' => '#f59e0b',
                    'borderColor' => '#d97706',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'precision' => 0,
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}

