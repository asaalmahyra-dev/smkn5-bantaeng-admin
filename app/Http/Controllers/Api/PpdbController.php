<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PpdbApplicant;
use App\Models\PpdbConfig;
use App\Models\Department;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PpdbController extends Controller
{
    /**
     * Get active PPDB configuration (jadwal, kuota, dll).
     */
    public function config(): JsonResponse
    {
        $config = PpdbConfig::where('is_active', true)->first();

        if (! $config) {
            return response()->json([
                'success' => false,
                'message' => 'PPDB belum dibuka.',
            ], 404);
        }

        $jurusan = Department::where('is_active', true)
            ->orderBy('sort_order')
            ->get(['id', 'name', 'short_name', 'slug', 'description', 'headline', 'cover_image']);

        $dayaTampungPerJurusan = $config->daya_tampung_total > 0 && $jurusan->count() > 0
            ? (int) round($config->daya_tampung_total / $jurusan->count())
            : 0;

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $config->id,
                'tahun_ajaran' => $config->tahun_ajaran,
                'gelombang' => $config->gelombang,
                'jadwal' => [
                    'pendaftaran_mulai' => $config->pendaftaran_mulai,
                    'pendaftaran_selesai' => $config->pendaftaran_selesai,
                    'pengumuman_mulai' => $config->pengumuman_mulai,
                    'daftar_ulang_mulai' => $config->daftar_ulang_mulai,
                    'daftar_ulang_selesai' => $config->daftar_ulang_selesai,
                ],
                'daya_tampung' => [
                    'total' => $config->daya_tampung_total,
                    'per_jurusan' => $dayaTampungPerJurusan,
                    'zonasi' => $config->getKuotaZonasi(),
                    'afirmasi' => $config->getKuotaAfirmasi(),
                    'perpindahan' => $config->getKuotaPerpindahan(),
                    'prestasi' => $config->getKuotaPrestasi(),
                ],
                'persentase' => [
                    'zonasi' => (float) $config->persen_zonasi,
                    'afirmasi' => (float) $config->persen_afirmasi,
                    'perpindahan' => (float) $config->persen_perpindahan,
                    'prestasi' => (float) $config->persen_prestasi,
                ],
                'usia_maksimal' => $config->usia_maksimal_tahun,
                'pengumuman' => $config->pengumuman,
                'jurusan_tersedia' => $jurusan,
                'status_pendaftaran' => $this->getStatusPendaftaran($config),
            ],
        ]);
    }

    /**
     * Submit pendaftaran baru.
     */
    public function daftar(Request $request): JsonResponse
    {
        $config = PpdbConfig::where('is_active', true)->first();

        if (! $config) {
            return response()->json([
                'success' => false,
                'message' => 'PPDB sedang tidak aktif.',
            ], 400);
        }

        // Cek jadwal
        $now = now();
        if ($now->lt($config->pendaftaran_mulai)) {
            return response()->json([
                'success' => false,
                'message' => 'Pendaftaran belum dibuka. Pendaftaran dibuka mulai ' . $config->pendaftaran_mulai->format('d M Y H:i') . ' WITA.',
            ], 400);
        }
        if ($now->gt($config->pendaftaran_selesai)) {
            return response()->json([
                'success' => false,
                'message' => 'Pendaftaran sudah ditutup sejak ' . $config->pendaftaran_selesai->format('d M Y H:i') . ' WITA.',
            ], 400);
        }

        $validator = Validator::make($request->all(), [
            'nisn' => 'required|string|max:20|unique:ppdb_applicants,nisn',
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'nullable|string|max:50',
            'alamat' => 'required|string',
            'rt_rw' => 'nullable|string|max:20',
            'kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kode_pos' => 'nullable|string|max:10',
            'jalur' => 'required|in:zonasi,afirmasi,perpindahan,prestasi',
            'asal_sekolah' => 'required|string|max:255',
            'npsn_sekolah' => 'nullable|string|max:20',
            'rata_rata_rapor' => 'nullable|numeric|min:0|max:100',
            'prestasi' => 'nullable|array',
            'prestasi.*.nama' => 'required_with:prestasi|string',
            'prestasi.*.tingkat' => 'required_with:prestasi|string|in:sekolah,kecamatan,kota,provinsi,nasional,internasional',
            'prestasi.*.juara' => 'nullable|integer|min:1',
            'jurusan_1' => 'required|exists:departments,id',
            'jurusan_2' => 'nullable|exists:departments,id|different:jurusan_1',
            'jurusan_3' => 'nullable|exists:departments,id|different:jurusan_1|different:jurusan_2',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'nama_wali' => 'nullable|string|max:255',
            'pekerjaan_ortu' => 'nullable|string|max:255',
            'penghasilan_ortu' => 'nullable|numeric|min:0',
            'no_hp_ortu' => 'required|string|max:20',
        ], [
            'nisn.unique' => 'NISN sudah terdaftar.',
            'jurusan_1.required' => 'Pilihan jurusan 1 wajib diisi.',
            'jurusan_1.exists' => 'Jurusan pilihan 1 tidak valid.',
            'jurusan_2.different' => 'Pilihan jurusan 2 harus berbeda dari pilihan 1.',
            'jurusan_3.different' => 'Pilihan jurusan 3 harus berbeda dari pilihan 1 dan 2.',
            'jalur.in' => 'Jalur pendaftaran tidak valid.',
            '.*.required' => ':attribute wajib diisi.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();
        $data['ppdb_config_id'] = $config->id;
        $data['status'] = 'menunggu';

        // Cek usia
        $tanggalLahir = \Carbon\Carbon::parse($data['tanggal_lahir']);
        $usia = $tanggalLahir->age;
        if ($usia > $config->usia_maksimal_tahun) {
            return response()->json([
                'success' => false,
                'message' => "Maaf, usia Anda {$usia} tahun melebihi batas maksimal {$config->usia_maksimal_tahun} tahun.",
            ], 400);
        }

        $applicant = PpdbApplicant::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Pendaftaran berhasil!',
            'data' => [
                'id' => $applicant->id,
                'nisn' => $applicant->nisn,
                'nama_lengkap' => $applicant->nama_lengkap,
                'jalur' => $applicant->jalur,
                'status' => $applicant->status,
            ],
        ], 201);
    }

    /**
     * Cek status pendaftaran berdasarkan NISN.
     */
    public function cekStatus(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'nisn' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $applicant = PpdbApplicant::with(['ppdbConfig', 'jurusanPertama', 'jurusanKedua', 'jurusanKetiga'])
            ->where('nisn', $request->nisn)
            ->where('tanggal_lahir', $request->tanggal_lahir)
            ->first();

        if (! $applicant) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan. Periksa kembali NISN dan tanggal lahir.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $applicant->id,
                'nisn' => $applicant->nisn,
                'nama_lengkap' => $applicant->nama_lengkap,
                'jalur' => $applicant->jalur,
                'status' => $applicant->status,
                'status_label' => match ($applicant->status) {
                    'menunggu' => 'Menunggu Verifikasi',
                    'diterima' => 'Selamat! Anda Diterima',
                    'ditolak' => 'Mohon Maaf, Anda Belum Diterima',
                    'daftar_ulang' => 'Daftar Ulang',
                    'mengundurkan_diri' => 'Mengundurkan Diri',
                },
                'jurusan_1' => $applicant->jurusanPertama?->name,
                'jurusan_2' => $applicant->jurusanKedua?->name,
                'jurusan_3' => $applicant->jurusanKetiga?->name,
                'tahun_ajaran' => $applicant->ppdbConfig?->tahun_ajaran,
                'pengumuman_mulai' => $applicant->ppdbConfig?->pengumuman_mulai,
                'daftar_ulang_mulai' => $applicant->ppdbConfig?->daftar_ulang_mulai,
                'daftar_ulang_selesai' => $applicant->ppdbConfig?->daftar_ulang_selesai,
            ],
        ]);
    }

    /**
     * Daftar ulang (konfirmasi oleh siswa yang diterima).
     */
    public function daftarUlang(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'nisn' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $applicant = PpdbApplicant::with('ppdbConfig')
            ->where('nisn', $request->nisn)
            ->where('tanggal_lahir', $request->tanggal_lahir)
            ->first();

        if (! $applicant) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan.',
            ], 404);
        }

        if ($applicant->status !== 'diterima') {
            return response()->json([
                'success' => false,
                'message' => 'Status pendaftaran Anda saat ini: ' . match ($applicant->status) {
                    'menunggu' => 'Masih menunggu pengumuman.',
                    'ditolak' => 'Mohon maaf, Anda tidak diterima.',
                    'daftar_ulang' => 'Anda sudah melakukan daftar ulang.',
                    'mengundurkan_diri' => 'Anda sudah mengundurkan diri.',
                    default => 'Tidak dapat melakukan daftar ulang.',
                },
            ], 400);
        }

        // Cek jadwal daftar ulang
        $now = now();
        $config = $applicant->ppdbConfig;
        if ($config->daftar_ulang_mulai && $now->lt($config->daftar_ulang_mulai)) {
            return response()->json([
                'success' => false,
                'message' => 'Daftar ulang belum dibuka. Dibuka mulai ' . $config->daftar_ulang_mulai->format('d M Y H:i') . ' WITA.',
            ], 400);
        }
        if ($config->daftar_ulang_selesai && $now->gt($config->daftar_ulang_selesai)) {
            return response()->json([
                'success' => false,
                'message' => 'Daftar ulang sudah ditutup sejak ' . $config->daftar_ulang_selesai->format('d M Y H:i') . ' WITA.',
            ], 400);
        }

        $applicant->update(['status' => 'daftar_ulang']);

        return response()->json([
            'success' => true,
            'message' => 'Selamat! Anda telah berhasil melakukan daftar ulang.',
            'data' => [
                'nisn' => $applicant->nisn,
                'nama_lengkap' => $applicant->nama_lengkap,
                'status' => 'daftar_ulang',
            ],
        ]);
    }

    /**
     * Get statistik pendaftaran (untuk admin/dashboard).
     */
    public function statistik(): JsonResponse
    {
        $config = PpdbConfig::where('is_active', true)->first();

        if (! $config) {
            return response()->json([
                'success' => false,
                'message' => 'PPDB tidak aktif.',
            ], 404);
        }

        $total = PpdbApplicant::where('ppdb_config_id', $config->id)->count();
        $perJalur = [
            'zonasi' => PpdbApplicant::where('ppdb_config_id', $config->id)->byJalur('zonasi')->count(),
            'afirmasi' => PpdbApplicant::where('ppdb_config_id', $config->id)->byJalur('afirmasi')->count(),
            'perpindahan' => PpdbApplicant::where('ppdb_config_id', $config->id)->byJalur('perpindahan')->count(),
            'prestasi' => PpdbApplicant::where('ppdb_config_id', $config->id)->byJalur('prestasi')->count(),
        ];
        $perStatus = [
            'menunggu' => PpdbApplicant::where('ppdb_config_id', $config->id)->byStatus('menunggu')->count(),
            'diterima' => PpdbApplicant::where('ppdb_config_id', $config->id)->byStatus('diterima')->count(),
            'ditolak' => PpdbApplicant::where('ppdb_config_id', $config->id)->byStatus('ditolak')->count(),
            'daftar_ulang' => PpdbApplicant::where('ppdb_config_id', $config->id)->byStatus('daftar_ulang')->count(),
        ];

        return response()->json([
            'success' => true,
            'data' => [
                'total_pendaftar' => $total,
                'daya_tampung' => $config->daya_tampung_total,
                'per_jalur' => $perJalur,
                'per_status' => $perStatus,
                'sisa_kuota' => max(0, $config->daya_tampung_total - $total),
            ],
        ]);
    }

    /**
     * Menentukan status pendaftaran berdasarkan jadwal.
     */
    private function getStatusPendaftaran(PpdbConfig $config): string
    {
        $now = now();

        if ($now->lt($config->pendaftaran_mulai)) {
            return 'akan_datang';
        }

        if ($now->between($config->pendaftaran_mulai, $config->pendaftaran_selesai)) {
            return 'sedang_dibuka';
        }

        if ($config->pengumuman_mulai && $now->between($config->pendaftaran_selesai, $config->pengumuman_mulai)) {
            return 'verifikasi';
        }

        return 'ditutup';
    }
}

