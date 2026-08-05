<?php

namespace Database\Seeders;

use App\Models\PpdbConfig;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PpdbConfigSeeder extends Seeder
{
    public function run(): void
    {
        PpdbConfig::create([
            'tahun_ajaran' => '2025/2026',
            'gelombang' => 'Gelombang 1',
            'pendaftaran_mulai' => Carbon::create(2025, 3, 1, 8, 0, 0, 'Asia/Makassar'),
            'pendaftaran_selesai' => Carbon::create(2025, 4, 30, 23, 59, 0, 'Asia/Makassar'),
            'pengumuman_mulai' => Carbon::create(2025, 5, 15, 10, 0, 0, 'Asia/Makassar'),
            'daftar_ulang_mulai' => Carbon::create(2025, 5, 15, 10, 0, 0, 'Asia/Makassar'),
            'daftar_ulang_selesai' => Carbon::create(2025, 5, 30, 23, 59, 0, 'Asia/Makassar'),
            'daya_tampung_total' => 360,
            'persen_zonasi' => 50,
            'persen_afirmasi' => 15,
            'persen_perpindahan' => 5,
            'persen_prestasi' => 30,
            'usia_maksimal_tahun' => 21,
            'is_active' => false,
            'pengumuman' => '<p>Informasi PPDB SMKN 5 Bantaeng Tahun Ajaran 2025/2026 akan segera dibuka. Silakan persiapkan dokumen persyaratan Anda.</p>',
        ]);
    }
}

