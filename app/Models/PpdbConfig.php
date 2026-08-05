<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PpdbConfig extends Model
{
    protected $fillable = [
        'tahun_ajaran',
        'gelombang',
        'pendaftaran_mulai',
        'pendaftaran_selesai',
        'pengumuman_mulai',
        'daftar_ulang_mulai',
        'daftar_ulang_selesai',
        'daya_tampung_total',
        'persen_zonasi',
        'persen_afirmasi',
        'persen_perpindahan',
        'persen_prestasi',
        'usia_maksimal_tahun',
        'is_active',
        'pengumuman',
    ];

    protected function casts(): array
    {
        return [
            'pendaftaran_mulai' => 'datetime',
            'pendaftaran_selesai' => 'datetime',
            'pengumuman_mulai' => 'datetime',
            'daftar_ulang_mulai' => 'datetime',
            'daftar_ulang_selesai' => 'datetime',
            'is_active' => 'boolean',
        ];
    }

    public function applicants(): HasMany
    {
        return $this->hasMany(PpdbApplicant::class, 'ppdb_config_id');
    }

    public function getDayaTampungPerJurusan(): int
    {
        return (int) round($this->daya_tampung_total / max(\App\Models\Department::where('is_active', true)->count(), 1));
    }

    public function getKuotaZonasi(): int
    {
        return (int) round($this->daya_tampung_total * $this->persen_zonasi / 100);
    }

    public function getKuotaAfirmasi(): int
    {
        return (int) round($this->daya_tampung_total * $this->persen_afirmasi / 100);
    }

    public function getKuotaPerpindahan(): int
    {
        return (int) round($this->daya_tampung_total * $this->persen_perpindahan / 100);
    }

    public function getKuotaPrestasi(): int
    {
        return (int) round($this->daya_tampung_total * $this->persen_prestasi / 100);
    }
}

