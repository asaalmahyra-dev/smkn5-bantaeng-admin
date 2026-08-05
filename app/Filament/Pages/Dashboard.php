<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\AchievementChartWidget;
use App\Filament\Widgets\NewsChartWidget;
use App\Filament\Widgets\PpdbChartWidget;
use App\Filament\Widgets\StatsOverviewWidget;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $title = 'Dashboard';

    public function getWidgets(): array
    {
        return [
            StatsOverviewWidget::class,
            NewsChartWidget::class,
            PpdbChartWidget::class,
            AchievementChartWidget::class,
        ];
    }

    public function getColumns(): int | array
    {
        return 2;
    }
}

