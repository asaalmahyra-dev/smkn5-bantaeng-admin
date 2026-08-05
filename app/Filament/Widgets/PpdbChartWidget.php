<?php

namespace App\Filament\Widgets;

use App\Models\PpdbApplicant;
use App\Models\PpdbConfig;
use Filament\Widgets\ChartWidget;
use Illuminate\Database\Eloquent\Collection;

class PpdbChartWidget extends ChartWidget
{
    protected int | string | array $columnSpan = 'full';

    protected ?string $pollingInterval = null;

    protected ?string $heading = 'Pendaftar PPDB per Jalur';

    protected ?string $description = 'Distribusi pendaftar berdasarkan jalur pendaftaran PPDB aktif.';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $config = PpdbConfig::where('is_active', true)->first();

        if (! $config) {
            return $this->emptyData();
        }

        $applicants = PpdbApplicant::query()
            ->where('ppdb_config_id', $config->id)
            ->selectRaw('jalur, COUNT(*) as total')
            ->groupBy('jalur')
            ->pluck('total', 'jalur');

        $labels = [
            'zonasi' => 'Zonasi',
            'afirmasi' => 'Afirmasi',
            'perpindahan' => 'Perpindahan',
            'prestasi' => 'Prestasi',
        ];

        $colors = [
            'zonasi' => '#14b8a6',
            'afirmasi' => '#3b82f6',
            'perpindahan' => '#f59e0b',
            'prestasi' => '#ef4444',
        ];

        $data = [];
        $backgroundColors = [];

        foreach ($labels as $key => $label) {
            $data[] = (int) ($applicants->get($key) ?? 0);
            $backgroundColors[] = $colors[$key];
        }

        return [
            'datasets' => [
                [
                    'label' => 'Pendaftar',
                    'data' => $data,
                    'backgroundColor' => $backgroundColors,
                ],
            ],
            'labels' => array_values($labels),
        ];
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'position' => 'bottom',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    /**
     * @return array<string, mixed>
     */
    private function emptyData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Pendaftar',
                    'data' => [],
                    'backgroundColor' => [],
                ],
            ],
            'labels' => [],
        ];
    }
}

