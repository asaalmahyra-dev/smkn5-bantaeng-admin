<?php

namespace App\Filament\Widgets;

use App\Models\News;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class NewsChartWidget extends ChartWidget
{
    protected int | string | array $columnSpan = 'full';

    protected ?string $pollingInterval = null;

    protected ?string $heading = 'Berita per Bulan';

    protected ?string $description = 'Jumlah berita yang dipublikasikan setiap bulan pada tahun berjalan.';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        // Database-agnostic: ambil semua berita di tahun berjalan, lalu
        // kelompokkan per bulan di sisi PHP agar kompatibel MySQL & SQLite.
        $publishedNews = News::query()
            ->whereNotNull('published_at')
            ->whereBetween('created_at', [
                Carbon::now()->startOfYear()->toDateTimeString(),
                Carbon::now()->endOfYear()->toDateTimeString(),
            ])
            ->get();

        $monthlyCounts = array_fill(1, 12, 0);

        foreach ($publishedNews as $news) {
            $month = $news->created_at->month;
            $monthlyCounts[$month]++;
        }

        $labels = [];
        $data = [];

        for ($m = 1; $m <= 12; $m++) {
            $labels[] = Carbon::create()->month($m)->translatedFormat('M');
            $data[] = $monthlyCounts[$m];
        }

        return [
            'datasets' => [
                [
                    'label' => 'Berita',
                    'data' => $data,
                    'backgroundColor' => '#14b8a6',
                    'borderColor' => '#0d9488',
                    'fill' => false,
                    'tension' => 0.3,
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
        return 'line';
    }
}

