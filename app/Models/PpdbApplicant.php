<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PpdbApplicant extends Model
{
    protected $fillable = [
        'ppdb_config_id',
        'nisn',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'rt_rw',
        'kelurahan',
        'kecamatan',
        'kota',
        'provinsi',
        'kode_pos',
        'jalur',
        'asal_sekolah',
        'npsn_sekolah',
        'rata_rata_rapor',
        'prestasi',
        'jurusan_1',
        'jurusan_2',
        'jurusan_3',
        'nama_ayah',
        'nama_ibu',
        'nama_wali',
        'pekerjaan_ortu',
        'penghasilan_ortu',
        'no_hp_ortu',
        'status',
        'catatan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_lahir' => 'date',
            'prestasi' => 'array',
            'penghasilan_ortu' => 'decimal:2',
            'rata_rata_rapor' => 'decimal:2',
        ];
    }

    public function ppdbConfig(): BelongsTo
    {
        return $this->belongsTo(PpdbConfig::class);
    }

    public function jurusanPertama(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'jurusan_1');
    }

    public function jurusanKedua(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'jurusan_2');
    }

    public function jurusanKetiga(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'jurusan_3');
    }

    public function scopeByJalur($query, string $jalur)
    {
        return $query->where('jalur', $jalur);
    }

    public function scopeByStatus($query, string $status)
    {
        return $query->where('status', $status);
    }

    public function scopeDiterima($query)
    {
        return $query->whereIn('status', ['diterima', 'daftar_ulang']);
    }

    public function getUsiaAttribute(): int
    {
        return $this->tanggal_lahir->age;
    }
}

