<?php

namespace App\Filament\Widgets;

use App\Models\Achievement;
use App\Models\Department;
use App\Models\Facility;
use App\Models\News;
use App\Models\Partner;
use App\Models\PpdbApplicant;
use App\Models\PpdbConfig;
use App\Models\Teacher;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

class StatsOverviewWidget extends BaseWidget
{
    protected int | array | null $columns = 4;

    protected ?string $pollingInterval = '30s';

    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $stats = [];

        // 1. PPDB Aktif / Tidak Aktif — status utama
        $ppdbAktif = Schema::hasTable('ppdb_configs')
            && PpdbConfig::where('is_active', true)->exists();
        $tahunAjaran = $ppdbAktif
            ? PpdbConfig::where('is_active', true)->first()?->tahun_ajaran ?? '-'
            : '-';

        $stats[] = Stat::make('Status PPDB', $ppdbAktif ? 'Aktif' : 'Nonaktif')
            ->description($ppdbAktif ? "Tahun Ajaran {$tahunAjaran}" : 'Pendaftaran ditutup')
            ->descriptionIcon($ppdbAktif ? 'heroicon-o-check-circle' : 'heroicon-o-x-circle')
            ->color($ppdbAktif ? 'success' : 'danger');

        // 2. Total Pendaftar PPDB — dipantau saat musim pendaftaran
        if (Schema::hasTable('ppdb_applicants')) {
            $stats[] = Stat::make('Pendaftar PPDB', PpdbApplicant::count())
                ->description('Total pendaftar masuk')
                ->descriptionIcon('heroicon-o-clipboard-document-list')
                ->chart($this->getPpdbTrend())
                ->chartColor('primary')
                ->color('primary');
        }

        // 3. Total Jurusan
        $stats[] = Stat::make('Program Keahlian', Department::count())
            ->description('Jurusan aktif')
            ->descriptionIcon('heroicon-o-building-office')
            ->color('info');

        // 4. Total Guru
        $stats[] = Stat::make('Guru', Teacher::count())
            ->description('Tenaga pendidik')
            ->descriptionIcon('heroicon-o-users')
            ->color('success');

        // 5. Total Berita
        $stats[] = Stat::make('Berita', News::count())
            ->description('Publikasi berita')
            ->descriptionIcon('heroicon-o-newspaper')
            ->chart($this->getNewsTrend())
            ->chartColor('info')
            ->color('info');

        // 6. Total Prestasi
        $stats[] = Stat::make('Prestasi', Achievement::count())
            ->description('Capaian siswa')
            ->descriptionIcon('heroicon-o-trophy')
            ->chart($this->getAchievementTrend())
            ->chartColor('warning')
            ->color('warning');

        // 7. Total Mitra
        $stats[] = Stat::make('Mitra', Partner::count())
            ->description('Kerja sama industri')
            ->descriptionIcon('heroicon-o-handshake')
            ->color('gray');

        // 8. Total Fasilitas
        $stats[] = Stat::make('Fasilitas', Facility::count())
            ->description('Sarana & prasarana')
            ->descriptionIcon('heroicon-o-building-library')
            ->color('gray');

        return $stats;
    }

    /**
     * Tren pendaftar PPDB dalam 7 periode terakhir.
     *
     * @return array<float>
     */
    private function getPpdbTrend(): array
    {
        if (! Schema::hasTable('ppdb_applicants')) {
            return [];
        }

        $trend = [];
        $today = Carbon::today();

        for ($i = 6; $i >= 0; $i--) {
            $day = $today->copy()->subDays($i);
            $count = PpdbApplicant::whereDate('created_at', $day)->count();
            $trend[] = (float) $count;
        }

        return $trend;
    }

    /**
     * Tren berita per bulan (12 bulan terakhir).
     *
     * @return array<float>
     */
    private function getNewsTrend(): array
    {
        $trend = [];
        $now = Carbon::now();

        for ($i = 11; $i >= 0; $i--) {
            $month = $now->copy()->subMonths($i);
            $count = News::whereBetween('created_at', [
                $month->copy()->startOfMonth()->toDateTimeString(),
                $month->copy()->endOfMonth()->toDateTimeString(),
            ])->count();
            $trend[] = (float) $count;
        }

        return $trend;
    }

    /**
     * Tren prestasi per tahun.
     *
     * @return array<float>
     */
    private function getAchievementTrend(): array
    {
        $achievements = Achievement::query()
            ->whereNotNull('year')
            ->orderBy('year')
            ->get(['year']);

        $yearlyCounts = [];

        foreach ($achievements as $achievement) {
            $year = (int) $achievement->year;
            $yearlyCounts[$year] = ($yearlyCounts[$year] ?? 0) + 1;
        }

        ksort($yearlyCounts);

        $trend = array_values(array_map(
            fn (int $count): float => (float) $count,
            $yearlyCounts,
        ));

        return $trend ?: [0];
    }
}

