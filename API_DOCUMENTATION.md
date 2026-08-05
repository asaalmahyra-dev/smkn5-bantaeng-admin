# Dokumentasi API Portal SMKN 5 Bantaeng

**Base URL:** `https://domain-anda.com/api/v1`

**Content-Type:** `application/json`

**Response Format:** Semua response mengembalikan JSON dengan struktur berikut:

```json
{
  "success": true | false,
  "data": { ... },
  "message": "...",
  "errors": { ... },
  "meta": { ... }
}
```

---

## Daftar Isi

1. [Departments / Program Keahlian](#1-departments--program-keahlian)
2. [Teachers / Guru & Staff](#2-teachers--guru--staff)
3. [Facilities / Fasilitas Sekolah](#3-facilities--fasilitas-sekolah)
4. [Partners / Mitra Industri (DUDI)](#4-partners--mitra-industri-dudi)
5. [News / Berita](#5-news--berita)
6. [Gallery / Galeri](#6-gallery--galeri)
7. [Achievements / Prestasi](#7-achievements--prestasi)
8. [Extracurriculars / Ekstrakurikuler](#8-extracurriculars--ekstrakurikuler)
9. [Testimonials / Testimoni](#9-testimonials--testimoni)
10. [FAQs / Pertanyaan Umum](#10-faqs--pertanyaan-umum)
11. [PPDB / Penerimaan Peserta Didik Baru](#11-ppdb--penerimaan-peserta-didik-baru)
12. [Tabel Relasi Database](#12-tabel-relasi-database)

---

## 1. Departments / Program Keahlian

### GET /departments
Mendapatkan daftar semua jurusan aktif.

**Response:**
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "slug": "teknik-kendaraan-ringan",
      "name": "Teknik Kendaraan Ringan",
      "shortName": "TKR",
      "category": "teknologi & rekayasa",
      "headline": "Bidang Otomotif",
      "description": "<p>Deskripsi lengkap...</p>",
      "vision": "<p>Visi jurusan...</p>",
      "mission": ["Misi 1", "Misi 2"],
      "competencies": ["Kompetensi 1", "Kompetensi 2"],
      "careerPaths": ["Prospek karir 1", "Prospek karir 2"],
      "coverImage": "/storage/departments/cover.jpg",
      "gallery": ["/storage/departments/photo1.jpg"],
      "featured": true,
      "teachers": [1, 2, 3],
      "facilities": [1, 2],
      "industryPartners": [1, 3]
    }
  ]
}
```

**Field Descriptions:**
| Field | Tipe | Keterangan |
|-------|------|------------|
| `id` | integer | ID jurusan |
| `slug` | string | Slug untuk URL (unique) |
| `name` | string | Nama lengkap jurusan |
| `shortName` | string | Singkatan/nama pendek |
| `category` | string | Kategori (teknologi, kesehatan, dll) |
| `headline` | string | Tagline/judul pendek |
| `description` | string (HTML) | Deskripsi lengkap |
| `vision` | string (HTML) | Visi jurusan |
| `mission` | array[string] | Misi-misi jurusan |
| `competencies` | array[string] | Kompetensi yang dipelajari |
| `careerPaths` | array[string] | Prospek karir lulusan |
| `coverImage` | string|null | URL gambar cover |
| `gallery` | array[string] | Koleksi gambar galeri |
| `featured` | boolean | Apakah jurusan unggulan |
| `teachers` | array[integer] | ID guru terkait |
| `facilities` | array[integer] | ID fasilitas terkait |
| `industryPartners` | array[integer] | ID mitra terkait |

### GET /departments/{slug}
Detail lengkap jurusan berdasarkan slug.

**Response:** Sama seperti di atas, ditambah field berikut:

| Field | Tipe | Keterangan |
|-------|------|------------|
| `teacherDetails` | array[object] | Data lengkap guru di jurusan ini |
| `facilityDetails` | array[object] | Data lengkap fasilitas di jurusan ini |
| `partnerDetails` | array[object] | Data lengkap mitra di jurusan ini |

---

## 2. Teachers / Guru & Staff

### GET /teachers
Mendapatkan daftar semua guru dan staff.

**Response:**
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "name": "Budi Santoso, S.Pd.",
      "position": "Kepala Program TKR",
      "departmentId": 1,
      "photo": "/storage/teachers/photo.jpg",
      "bio": "<p>Biografi...</p>",
      "email": "budi@smkn5bantaeng.sch.id",
      "phone": "081234567890",
      "education": "S1 Pendidikan Teknik Mesin",
      "specialization": "Otomotif"
    }
  ]
}
```

**Field Descriptions:**
| Field | Tipe | Keterangan |
|-------|------|------------|
| `id` | integer | ID guru |
| `name` | string | Nama lengkap dengan gelar |
| `position` | string|null | Jabatan/posisi |
| `departmentId` | integer|null | ID jurusan (jika ada) |
| `photo` | string|null | URL foto |
| `bio` | string (HTML)|null | Biografi |
| `email` | string|null | Email |
| `phone` | string|null | Nomor telepon |
| `education` | string|null | Riwayat pendidikan |
| `specialization` | string|null | Spesialisasi/bidang keahlian |

### GET /teachers/{id}
Detail guru berdasarkan ID.

**Response:** Sama seperti di atas.

---

## 3. Facilities / Fasilitas Sekolah

### GET /facilities
Mendapatkan daftar semua fasilitas.

**Response:**
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "slug": "laboratorium-teknik-laboratorium-medik",
      "name": "Laboratorium Teknik Laboratorium Medik",
      "description": "<p>Deskripsi...</p>",
      "category": "laboratorium",
      "location": "Gedung Praktik Kesehatan",
      "image": "/storage/facilities/lab.jpg",
      "featured": true
    }
  ]
}
```

**Field Descriptions:**
| Field | Tipe | Keterangan |
|-------|------|------------|
| `id` | integer | ID fasilitas |
| `slug` | string | Slug untuk URL (unique) |
| `name` | string | Nama fasilitas |
| `description` | string (HTML)|null | Deskripsi |
| `category` | string|null | Kategori (laboratorium, kelas, dll) |
| `location` | string|null | Lokasi/gedung |
| `image` | string|null | URL gambar |
| `featured` | boolean | Apakah fasilitas unggulan |

### GET /facilities/{slug}
Detail fasilitas berdasarkan slug.

**Response:** Sama seperti di atas.

---

## 4. Partners / Mitra Industri (DUDI)

### GET /partners
Mendapatkan daftar semua mitra industri (Dunia Usaha/Dunia Industri).

**Response:**
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "name": "PT Astra Daihatsu Motor",
      "logo": "/storage/partners/logo.png",
      "industry": "Otomotif",
      "description": "Deskripsi kerjasama...",
      "website": "https://www.daihatsu.co.id",
      "collaborationType": "magang",
      "featured": true
    }
  ]
}
```

**Field Descriptions:**
| Field | Tipe | Keterangan |
|-------|------|------------|
| `id` | integer | ID mitra |
| `name` | string | Nama perusahaan/industri |
| `logo` | string|null | URL logo |
| `industry` | string|null | Bidang industri |
| `description` | string (HTML)|null | Deskripsi kerjasama |
| `website` | string|null | URL website |
| `collaborationType` | string|null | Jenis kerjasama (magang, dll) |
| `featured` | boolean | Apakah mitra utama |

### GET /partners/{id}
Detail mitra berdasarkan ID.

**Response:** Sama seperti di atas.

---

## 5. News / Berita

### GET /news
Mendapatkan daftar berita yang sudah terbit (published) dengan pagination.

**Query Parameters:**
| Parameter | Tipe | Required | Keterangan |
|-----------|------|----------|------------|
| `category` | string | No | Filter berdasarkan slug kategori |
| `featured` | boolean | No | Filter berita unggulan (true/false) |
| `per_page` | integer | No | Jumlah item per halaman (default: 12) |

**Response:**
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "slug": "siswa-tkr-juara-lomba-otomotif",
      "title": "Siswa TKR Juara Lomba Otomotif",
      "excerpt": "Ringkasan berita...",
      "coverImage": "/storage/news/cover.jpg",
      "category": "Prestasi",
      "author": "Admin",
      "publishedAt": "2025-01-15T08:00:00+08:00",
      "featured": true,
      "tags": ["prestasi", "tkr"]
    }
  ],
  "meta": {
    "current_page": 1,
    "last_page": 5,
    "per_page": 12,
    "total": 60
  }
}
```

**Field Descriptions:**
| Field | Tipe | Keterangan |
|-------|------|------------|
| `id` | integer | ID berita |
| `slug` | string | Slug untuk URL (unique) |
| `title` | string | Judul berita |
| `excerpt` | string|null | Ringkasan/abstrak |
| `coverImage` | string|null | URL gambar cover |
| `category` | string|null | Nama kategori (dari relasi) |
| `author` | string|null | Penulis |
| `publishedAt` | string (ISO 8601)|null | Waktu publikasi |
| `featured` | boolean | Apakah berita unggulan |
| `tags` | array[string] | Tag/label |

### GET /news/{slug}
Detail berita berdasarkan slug.

**Response:** Sama seperti di atas, ditambah field:

| Field | Tipe | Keterangan |
|-------|------|------------|
| `content` | string (HTML) | Konten lengkap berita |

---

## 6. Gallery / Galeri

### GET /gallery
Mendapatkan daftar semua item galeri.

**Query Parameters:**
| Parameter | Tipe | Required | Keterangan |
|-----------|------|----------|------------|
| `category` | string | No | Filter kategori |

**Response:**
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "title": "Kegiatan Class Meeting",
      "category": "kegiatan",
      "image": "/storage/gallery/photo.jpg",
      "description": "Deskripsi foto...",
      "takenAt": "2025-01-10T10:00:00+08:00",
      "featured": false
    }
  ]
}
```

**Field Descriptions:**
| Field | Tipe | Keterangan |
|-------|------|------------|
| `id` | integer | ID galeri |
| `title` | string | Judul |
| `category` | string|null | Kategori |
| `image` | string|null | URL gambar |
| `description` | string (HTML)|null | Deskripsi |
| `takenAt` | string (ISO 8601)|null | Waktu pengambilan |
| `featured` | boolean | Apakah unggulan |

### GET /gallery/{id}
Detail item galeri berdasarkan ID.

**Response:** Sama seperti di atas.

---

## 7. Achievements / Prestasi

### GET /achievements
Mendapatkan daftar semua prestasi.

**Query Parameters:**
| Parameter | Tipe | Required | Keterangan |
|-----------|------|----------|------------|
| `level` | string | No | Tingkat prestasi |
| `year` | integer | No | Filter tahun |
| `category` | string | No | Kategori prestasi |

**Nilai `level` yang valid:**
- `sekolah`
- `kecamatan`
- `kota`
- `provinsi`
- `nasional`
- `internasional`

**Response:**
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "title": "Juara 1 Lomba Robotik",
      "category": "akademik",
      "description": "Deskripsi prestasi...",
      "year": 2025,
      "image": "/storage/achievements/photo.jpg",
      "participants": ["Budi", "Ani"],
      "level": "provinsi"
    }
  ]
}
```

**Field Descriptions:**
| Field | Tipe | Keterangan |
|-------|------|------------|
| `id` | integer | ID prestasi |
| `title` | string | Judul prestasi |
| `category` | string|null | Kategori (akademik/non-akademik) |
| `description` | string (HTML)|null | Deskripsi |
| `year` | integer|null | Tahun pencapaian |
| `image` | string|null | URL foto/dokumentasi |
| `participants` | array[string] | Nama peserta/siswa |
| `level` | string|null | Tingkat perlombaan |

### GET /achievements/{id}
Detail prestasi berdasarkan ID.

**Response:** Sama seperti di atas.

---

## 8. Extracurriculars / Ekstrakurikuler

### GET /extracurriculars
Mendapatkan daftar semua ekstrakurikuler.

**Response:**
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "slug": "pramuka",
      "name": "Pramuka",
      "shortName": "Pramuka",
      "shortDescription": "Deskripsi singkat...",
      "description": "<p>Deskripsi lengkap...</p>",
      "category": "Karakter & Keterampilan",
      "coach": "Drs. Ahmad Yani",
      "schedule": "Jumat, 15:30 - 17:30",
      "location": "Lapangan Sekolah",
      "icon": "compass",
      "image": "/storage/extracurriculars/pramuka.jpg",
      "imageAlt": "Kegiatan Pramuka",
      "color": "brand",
      "featured": true,
      "highlights": ["Kegiatan 1", "Kegiatan 2"],
      "createdAt": "2025-01-01T00:00:00+08:00",
      "updatedAt": "2025-01-15T10:00:00+08:00"
    }
  ]
}
```

**Field Descriptions:**
| Field | Tipe | Keterangan |
|-------|------|------------|
| `id` | integer | ID ekskul |
| `slug` | string | Slug untuk URL (unique) |
| `name` | string | Nama lengkap |
| `shortName` | string|null | Nama singkatan |
| `shortDescription` | string|null | Deskripsi singkat |
| `description` | string (HTML)|null | Deskripsi lengkap |
| `category` | string|null | Kategori |
| `coach` | string|null | Nama pembina (dari relasi teacher) |
| `schedule` | string|null | Jadwal kegiatan |
| `location` | string|null | Lokasi kegiatan |
| `icon` | string|null | Nama icon |
| `image` | string|null | URL gambar |
| `imageAlt` | string|null | Alt text gambar |
| `color` | string|null | Warna tema (CSS color) |
| `featured` | boolean | Apakah unggulan |
| `highlights` | array[string] | Poin-poin kegiatan unggulan |
| `createdAt` | string (ISO 8601) | Waktu dibuat |
| `updatedAt` | string (ISO 8601) | Waktu diupdate |

### GET /extracurriculars/{slug}
Detail ekstrakurikuler berdasarkan slug.

**Response:** Sama seperti di atas.

---

## 9. Testimonials / Testimoni

### GET /testimonials
Mendapatkan daftar semua testimoni (alumni, siswa, dll).

**Response:**
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "name": "Siti Nurhaliza",
      "photo": "/storage/testimonials/photo.jpg",
      "role": "Alumni TKR 2024",
      "message": "Terima kasih SMKN 5 Bantaeng...",
      "rating": 5
    }
  ]
}
```

**Field Descriptions:**
| Field | Tipe | Keterangan |
|-------|------|------------|
| `id` | integer | ID testimoni |
| `name` | string | Nama pemberi testimoni |
| `photo` | string|null | URL foto |
| `role` | string|null | Peran/status (alumni, siswa, dll) |
| `message` | string (HTML)|null | Isi pesan testimoni |
| `rating` | integer | Rating bintang (1-5, default: 5) |

---

## 10. FAQs / Pertanyaan Umum

### GET /faqs
Mendapatkan daftar semua FAQ.

**Query Parameters:**
| Parameter | Tipe | Required | Keterangan |
|-----------|------|----------|------------|
| `category` | string | No | Filter berdasarkan kategori FAQ |

**Response:**
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "question": "Bagaimana cara daftar PPDB?",
      "answer": "Calon siswa dapat mendaftar secara online...",
      "category": "ppdb",
      "order": 1
    }
  ]
}
```

**Field Descriptions:**
| Field | Tipe | Keterangan |
|-------|------|------------|
| `id` | integer | ID FAQ |
| `question` | string | Pertanyaan |
| `answer` | string (HTML) | Jawaban |
| `category` | string|null | Kategori (ppdb, akademik, dll) |
| `order` | integer | Urutan tampilan |

---

## 11. PPDB / Penerimaan Peserta Didik Baru

### GET /ppdb/config
Mendapatkan konfigurasi PPDB yang aktif.

**Response:**
```json
{
  "success": true,
  "data": {
    "id": 1,
    "tahun_ajaran": "2025/2026",
    "gelombang": "1",
    "jadwal": {
      "pendaftaran_mulai": "2025-03-01T08:00:00+08:00",
      "pendaftaran_selesai": "2025-04-30T23:59:00+08:00",
      "pengumuman_mulai": "2025-05-15T10:00:00+08:00",
      "daftar_ulang_mulai": "2025-05-15T10:00:00+08:00",
      "daftar_ulang_selesai": "2025-05-30T23:59:00+08:00"
    },
    "daya_tampung": {
      "total": 360,
      "per_jurusan": 60,
      "zonasi": 180,
      "afirmasi": 54,
      "perpindahan": 18,
      "prestasi": 108
    },
    "persentase": {
      "zonasi": 50,
      "afirmasi": 15,
      "perpindahan": 5,
      "prestasi": 30
    },
    "usia_maksimal": 21,
    "pengumuman": "<p>Informasi PPDB...</p>",
    "jurusan_tersedia": [
      {
        "id": 1,
        "name": "Teknik Kendaraan Ringan",
        "short_name": "TKR",
        "slug": "teknik-kendaraan-ringan",
        "description": "...",
        "headline": "...",
        "cover_image": "..."
      }
    ],
    "status_pendaftaran": "sedang_dibuka"
  }
}
```

**Status Pendaftaran:**
| Status | Arti | Keterangan |
|--------|------|------------|
| `akan_datang` | Akan datang | Pendaftaran belum dibuka |
| `sedang_dibuka` | Sedang dibuka | Pendaftaran sedang berlangsung |
| `verifikasi` | Verifikasi | Masa verifikasi setelah tutup |
| `ditutup` | Ditutup | PPDB selesai |

### POST /ppdb/daftar
Mendaftarkan calon siswa baru.

**Request Body (JSON):**
```json
{
  "nisn": "1234567890",
  "nama_lengkap": "Ahmad Fauzi",
  "tempat_lahir": "Bantaeng",
  "tanggal_lahir": "2008-05-15",
  "jenis_kelamin": "L",
  "agama": "Islam",
  "alamat": "Jl. Poros Bantaeng No. 10",
  "rt_rw": "001/002",
  "kelurahan": "Kelurahan Bantaeng",
  "kecamatan": "Kecamatan Bantaeng",
  "kota": "Kabupaten Bantaeng",
  "provinsi": "Sulawesi Selatan",
  "kode_pos": "92411",
  "jalur": "zonasi",
  "asal_sekolah": "SMP Negeri 1 Bantaeng",
  "npsn_sekolah": "40300101",
  "rata_rata_rapor": 88.5,
  "prestasi": [
    {
      "nama": "Juara 1 Lomba Matematika",
      "tingkat": "kota",
      "juara": 1
    }
  ],
  "jurusan_1": 1,
  "jurusan_2": 2,
  "jurusan_3": 3,
  "nama_ayah": "Budi Santoso",
  "nama_ibu": "Siti Aminah",
  "nama_wali": "",
  "pekerjaan_ortu": "Petani",
  "penghasilan_ortu": 2000000,
  "no_hp_ortu": "081234567890"
}
```

**Aturan Validasi per Field:**
| Field | Aturan |
|-------|--------|
| `nisn` | **Wajib**, string, max 20 karakter, **unik** |
| `nama_lengkap` | **Wajib**, string, max 255 |
| `tempat_lahir` | **Wajib**, string, max 255 |
| `tanggal_lahir` | **Wajib**, format date (Y-m-d), usia ≤ maksimal config |
| `jenis_kelamin` | **Wajib**, enum: `L` atau `P` |
| `agama` | Optional, string, max 50 |
| `alamat` | **Wajib**, string |
| `rt_rw` | Optional, string, max 20 |
| `kelurahan` | **Wajib**, string, max 255 |
| `kecamatan` | **Wajib**, string, max 255 |
| `kota` | **Wajib**, string, max 255 |
| `provinsi` | **Wajib**, string, max 255 |
| `kode_pos` | Optional, string, max 10 |
| `jalur` | **Wajib**, enum: `zonasi`, `afirmasi`, `perpindahan`, `prestasi` |
| `asal_sekolah` | **Wajib**, string, max 255 |
| `npsn_sekolah` | Optional, string, max 20 |
| `rata_rata_rapor` | Optional, numeric, min 0, max 100 |
| `prestasi` | Optional, array |
| `prestasi.*.nama` | **Wajib** jika prestasi diisi, string |
| `prestasi.*.tingkat` | **Wajib** jika prestasi diisi, enum: sekolah/kecamatan/kota/provinsi/nasional/internasional |
| `prestasi.*.juara` | Optional, integer, min 1 |
| `jurusan_1` | **Wajib**, integer, **harus ID jurusan yang valid** (exists di departments) |
| `jurusan_2` | Optional, integer, **harus berbeda** dari `jurusan_1` |
| `jurusan_3` | Optional, integer, **harus berbeda** dari `jurusan_1` dan `jurusan_2` |
| `nama_ayah` | **Wajib**, string, max 255 |
| `nama_ibu` | **Wajib**, string, max 255 |
| `nama_wali` | Optional, string, max 255 |
| `pekerjaan_ortu` | Optional, string, max 255 |
| `penghasilan_ortu` | Optional, numeric, min 0 |
| `no_hp_ortu` | **Wajib**, string, max 20 |

**Response Sukses (201 Created):**
```json
{
  "success": true,
  "message": "Pendaftaran berhasil!",
  "data": {
    "id": 1,
    "nisn": "1234567890",
    "nama_lengkap": "Ahmad Fauzi",
    "jalur": "zonasi",
    "status": "menunggu"
  }
}
```

**Response Error Validasi (422 Unprocessable Entity):**
```json
{
  "success": false,
  "message": "Validasi gagal.",
  "errors": {
    "nisn": ["NISN sudah terdaftar."],
    "jurusan_1": ["Pilihan jurusan 1 wajib diisi."]
  }
}
```

**Response PPDB Tidak Aktif (400 Bad Request):**
```json
{
  "success": false,
  "message": "PPDB sedang tidak aktif."
}
```

**Response Usia Melebihi Batas (400 Bad Request):**
```json
{
  "success": false,
  "message": "Maaf, usia Anda 22 tahun melebihi batas maksimal 21 tahun."
}
```

### POST /ppdb/cek-status
Cek status pendaftaran berdasarkan NISN dan tanggal lahir.

**Request Body:**
```json
{
  "nisn": "1234567890",
  "tanggal_lahir": "2008-05-15"
}
```

**Response:**
```json
{
  "success": true,
  "data": {
    "id": 1,
    "nisn": "1234567890",
    "nama_lengkap": "Ahmad Fauzi",
    "jalur": "zonasi",
    "status": "diterima",
    "status_label": "Selamat! Anda Diterima",
    "jurusan_1": "Teknik Kendaraan Ringan",
    "jurusan_2": "Teknik Pemesinan",
    "jurusan_3": null,
    "tahun_ajaran": "2025/2026",
    "pengumuman_mulai": "2025-05-15T10:00:00+08:00",
    "daftar_ulang_mulai": "2025-05-15T10:00:00+08:00",
    "daftar_ulang_selesai": "2025-05-30T23:59:00+08:00"
  }
}
```

**Status & Label:**
| Status | Label |
|--------|-------|
| `menunggu` | Menunggu Verifikasi |
| `diterima` | Selamat! Anda Diterima |
| `ditolak` | Mohon Maaf, Anda Belum Diterima |
| `daftar_ulang` | Daftar Ulang |
| `mengundurkan_diri` | Mengundurkan Diri |

### POST /ppdb/daftar-ulang
Konfirmasi daftar ulang oleh siswa yang statusnya `diterima`.

**Request Body:**
```json
{
  "nisn": "1234567890",
  "tanggal_lahir": "2008-05-15"
}
```

**Response Sukses:**
```json
{
  "success": true,
  "message": "Selamat! Anda telah berhasil melakukan daftar ulang.",
  "data": {
    "nisn": "1234567890",
    "nama_lengkap": "Ahmad Fauzi",
    "status": "daftar_ulang"
  }
}
```

**Response Error:**
```json
{
  "success": false,
  "message": "Status pendaftaran Anda saat ini: Masih menunggu pengumuman."
}
```

**Kondisi Error yang Mungkin:**
- NISN/tanggal lahir tidak ditemukan → 404
- Status bukan `diterima` → 400
- Belum jadwal daftar ulang → 400
- Sudah lewat jadwal daftar ulang → 400

### GET /ppdb/statistik
Mendapatkan statistik pendaftaran (untuk ditampilkan di portal publik).

**Response:**
```json
{
  "success": true,
  "data": {
    "total_pendaftar": 150,
    "daya_tampung": 360,
    "per_jalur": {
      "zonasi": 80,
      "afirmasi": 20,
      "perpindahan": 10,
      "prestasi": 40
    },
    "per_status": {
      "menunggu": 100,
      "diterima": 30,
      "ditolak": 20,
      "daftar_ulang": 15
    },
    "sisa_kuota": 210
  }
}
```

---

## 12. Tabel Relasi Database

### Entity Relationship Summary

```
Department
  ├── hasMany → Teacher
  ├── belongsToMany → Facility (via department_facility)
  └── belongsToMany → Partner (via department_partner)

News
  └── belongsTo → NewsCategory

Extracurricular
  └── belongsTo → Teacher (pembina)

PpdbApplicant
  ├── belongsTo → PpdbConfig
  ├── belongsTo → Department (jurusan_1)
  ├── belongsTo → Department (jurusan_2)
  └── belongsTo → Department (jurusan_3)

Gallery, Achievement, Facility, Partner, Testimonial, Faq
  └── Standalone tables (no foreign key dependencies)
```

### Struktur Tabel Lengkap

<details>
<summary><b>departments</b> — Jurusan/Program Keahlian</summary>

| Column | Type | Keterangan |
|--------|------|------------|
| id | bigint (PK) | Auto increment |
| name | string(255) | Nama jurusan |
| short_name | string(255) | Singkatan |
| slug | string(255) | Unique, untuk URL |
| category | string(255) | Kategori |
| headline | text | Tagline |
| description | longtext | Deskripsi (HTML) |
| vision | text | Visi (HTML) |
| mission | json | Array misi |
| competencies | json | Array kompetensi |
| career_paths | json | Array prospek karir |
| cover_image | string(255) | URL cover |
| gallery | json | Array gambar |
| featured | boolean | Unggulan? |
| is_active | boolean | Aktif? |
| sort_order | integer | Urutan |
| created_at | timestamp | |
| updated_at | timestamp | |
</details>

<details>
<summary><b>teachers</b> — Guru & Staff</summary>

| Column | Type | Keterangan |
|--------|------|------------|
| id | bigint (PK) | |
| department_id | bigint (FK) | Nullable → departments |
| name | string(255) | Nama lengkap |
| position | string(255) | Jabatan |
| photo | string(255) | URL foto |
| bio | text | Biografi (HTML) |
| email | string(255) | |
| phone | string(255) | |
| education | string(255) | Pendidikan |
| specialization | string(255) | Spesialisasi |
| featured | boolean | |
| created_at | timestamp | |
| updated_at | timestamp | |
</details>

<details>
<summary><b>facilities</b> — Fasilitas Sekolah</summary>

| Column | Type | Keterangan |
|--------|------|------------|
| id | bigint (PK) | |
| name | string(255) | |
| slug | string(255) | Unique |
| description | text | HTML |
| category | string(255) | |
| location | string(255) | |
| image | string(255) | |
| featured | boolean | |
| created_at | timestamp | |
| updated_at | timestamp | |
</details>

<details>
<summary><b>partners</b> — Mitra Industri</summary>

| Column | Type | Keterangan |
|--------|------|------------|
| id | bigint (PK) | |
| name | string(255) | |
| logo | string(255) | |
| industry | string(255) | Bidang industri |
| description | text | |
| website | string(255) | |
| collaboration_type | string(255) | Jenis kerjasama |
| featured | boolean | |
| created_at | timestamp | |
| updated_at | timestamp | |
</details>

<details>
<summary><b>news</b> — Berita</summary>

| Column | Type | Keterangan |
|--------|------|------------|
| id | bigint (PK) | |
| category_id | bigint (FK) | Nullable → news_categories |
| title | string(255) | |
| slug | string(255) | Unique |
| excerpt | text | Ringkasan |
| content | longtext | Konten lengkap (HTML) |
| cover_image | string(255) | |
| author | string(255) | |
| status | string(255) | draft/published |
| tags | json | Array tag |
| featured | boolean | |
| published_at | timestamp | |
| created_at | timestamp | |
| updated_at | timestamp | |
</details>

<details>
<summary><b>galleries</b> — Galeri Foto</summary>

| Column | Type | Keterangan |
|--------|------|------------|
| id | bigint (PK) | |
| title | string(255) | |
| category | string(255) | |
| image | string(255) | |
| description | text | |
| featured | boolean | |
| taken_at | timestamp | Waktu pengambilan |
| created_at | timestamp | |
| updated_at | timestamp | |
</details>

<details>
<summary><b>achievements</b> — Prestasi</summary>

| Column | Type | Keterangan |
|--------|------|------------|
| id | bigint (PK) | |
| title | string(255) | |
| category | string(255) | |
| description | text | |
| year | integer | |
| image | string(255) | |
| participants | json | Array nama peserta |
| level | string(255) | sekolah/kecamatan/dll |
| created_at | timestamp | |
| updated_at | timestamp | |
</details>

<details>
<summary><b>extracurriculars</b> — Ekstrakurikuler</summary>

| Column | Type | Keterangan |
|--------|------|------------|
| id | bigint (PK) | |
| name | string(255) | |
| short_name | string(255) | |
| slug | string(255) | Unique |
| category | string(255) | |
| teacher_id | bigint (FK) | Nullable → teachers (pembina) |
| schedule | string(255) | Jadwal |
| location | string(255) | |
| icon | string(255) | |
| image | string(255) | |
| image_alt | string(255) | |
| color | string(255) | Warna tema |
| description | text | (HTML) |
| short_description | text | |
| highlights | json | Array kegiatan |
| featured | boolean | |
| created_at | timestamp | |
| updated_at | timestamp | |
</details>

<details>
<summary><b>testimonials</b> — Testimoni</summary>

| Column | Type | Keterangan |
|--------|------|------------|
| id | bigint (PK) | |
| name | string(255) | |
| photo | string(255) | |
| role | string(255) | |
| message | text | |
| rating | tinyint | 1-5 |
| created_at | timestamp | |
| updated_at | timestamp | |
</details>

<details>
<summary><b>faqs</b> — Pertanyaan Umum</summary>

| Column | Type | Keterangan |
|--------|------|------------|
| id | bigint (PK) | |
| question | string(255) | |
| answer | text | (HTML) |
| category | string(255) | |
| sort_order | integer | Urutan |
| created_at | timestamp | |
| updated_at | timestamp | |
</details>

<details>
<summary><b>ppdb_configs</b> — Konfigurasi PPDB</summary>

| Column | Type | Keterangan |
|--------|------|------------|
| id | bigint (PK) | |
| tahun_ajaran | string(255) | Contoh: "2025/2026" |
| gelombang | string(255) | Gelombang ke- |
| pendaftaran_mulai | datetime | |
| pendaftaran_selesai | datetime | |
| pengumuman_mulai | datetime | |
| daftar_ulang_mulai | datetime | |
| daftar_ulang_selesai | datetime | |
| daya_tampung_total | integer | |
| persen_zonasi | decimal(5,2) | |
| persen_afirmasi | decimal(5,2) | |
| persen_perpindahan | decimal(5,2) | |
| persen_prestasi | decimal(5,2) | |
| usia_maksimal_tahun | integer | |
| is_active | boolean | |
| pengumuman | text | Informasi pengumuman (HTML) |
| created_at | timestamp | |
| updated_at | timestamp | |
</details>

<details>
<summary><b>ppdb_applicants</b> — Pendaftar PPDB</summary>

| Column | Type | Keterangan |
|--------|------|------------|
| id | bigint (PK) | |
| ppdb_config_id | bigint (FK) | → ppdb_configs |
| nisn | string(20) | Unique |
| nama_lengkap | string(255) | |
| tempat_lahir | string(255) | |
| tanggal_lahir | date | |
| jenis_kelamin | enum('L','P') | |
| agama | string(50) | |
| alamat | text | |
| rt_rw | string(20) | |
| kelurahan | string(255) | |
| kecamatan | string(255) | |
| kota | string(255) | |
| provinsi | string(255) | |
| kode_pos | string(10) | |
| jalur | enum('zonasi','afirmasi','perpindahan','prestasi') | |
| asal_sekolah | string(255) | |
| npsn_sekolah | string(20) | |
| rata_rata_rapor | decimal(5,2) | |
| prestasi | json | Array prestasi |
| jurusan_1 | bigint (FK) | → departments |
| jurusan_2 | bigint (FK) | Nullable → departments |
| jurusan_3 | bigint (FK) | Nullable → departments |
| nama_ayah | string(255) | |
| nama_ibu | string(255) | |
| nama_wali | string(255) | |
| pekerjaan_ortu | string(255) | |
| penghasilan_ortu | decimal(15,2) | |
| no_hp_ortu | string(20) | |
| status | enum('menunggu','diterima','ditolak','daftar_ulang','mengundurkan_diri') | |
| catatan | text | |
| created_at | timestamp | |
| updated_at | timestamp | |
</details>

<details>
<summary><b>Pivot Tables</b></summary>

**department_facility** — Relasi many-to-many jurusan & fasilitas
| Column | Type |
|--------|------|
| department_id | bigint (FK) |
| facility_id | bigint (FK) |

**department_partner** — Relasi many-to-many jurusan & mitra
| Column | Type |
|--------|------|
| department_id | bigint (FK) |
| partner_id | bigint (FK) |

**news_categories** — Kategori berita
| Column | Type |
|--------|------|
| id | bigint (PK) |
| name | string(255) |
| slug | string(255) |
| created_at | timestamp |
| updated_at | timestamp |
</details>

---

## Ringkasan Semua Endpoint

| Method | Endpoint | Keterangan | Filter/Pagination |
|--------|----------|------------|-------------------|
| `GET` | `/departments` | Semua jurusan aktif | - |
| `GET` | `/departments/{slug}` | Detail jurusan | - |
| `GET` | `/teachers` | Semua guru | - |
| `GET` | `/teachers/{id}` | Detail guru | - |
| `GET` | `/facilities` | Semua fasilitas | - |
| `GET` | `/facilities/{slug}` | Detail fasilitas | - |
| `GET` | `/partners` | Semua mitra | - |
| `GET` | `/partners/{id}` | Detail mitra | - |
| `GET` | `/news` | Berita | `?category=&featured=&per_page=` |
| `GET` | `/news/{slug}` | Detail berita | - |
| `GET` | `/gallery` | Galeri | `?category=` |
| `GET` | `/gallery/{id}` | Detail galeri | - |
| `GET` | `/achievements` | Prestasi | `?level=&year=&category=` |
| `GET` | `/achievements/{id}` | Detail prestasi | - |
| `GET` | `/extracurriculars` | Semua ekskul | - |
| `GET` | `/extracurriculars/{slug}` | Detail ekskul | - |
| `GET` | `/testimonials` | Semua testimoni | - |
| `GET` | `/faqs` | FAQ | `?category=` |
| `GET` | `/ppdb/config` | Konfigurasi PPDB aktif | - |
| `POST` | `/ppdb/daftar` | Daftar PPDB baru | Body: JSON |
| `POST` | `/ppdb/cek-status` | Cek status pendaftaran | Body: JSON |
| `POST` | `/ppdb/daftar-ulang` | Konfirmasi daftar ulang | Body: JSON |
| `GET` | `/ppdb/statistik` | Statistik pendaftaran | - |

---

## HTTP Status Codes

| Code | Keterangan |
|------|------------|
| `200` | ✅ Sukses (GET request) |
| `201` | ✅ Berhasil dibuat (POST request) |
| `400` | ❌ Bad request (contoh: PPDB belum dibuka, usia melebihi batas) |
| `404` | ❌ Data tidak ditemukan |
| `422` | ❌ Validasi gagal (errors akan berisi detail field yang error) |

## Catatan Penting untuk Frontend Developer

1. **Prefix URL**: Semua endpoint menggunakan prefix `/api/v1/`
2. **Image/File Storage**: URL gambar menggunakan path relatif seperti `/storage/...`. Pastikan frontend mengonfigurasi base URL storage yang benar.
3. **HTML Content**: Beberapa field seperti `description`, `content`, `bio`, `answer` mengandung HTML. Render dengan `dangerouslySetInnerHTML` (React) atau `v-html` (Vue).
4. **Pagination**: Hanya endpoint `/news` yang menggunakan pagination. Gunakan `meta` object untuk navigasi halaman.
5. **Filtering**: Endpoint yang mendukung filter menggunakan query parameters.
6. **PPDB Flow**: Urutan alur PPDB:
   - Dapatkan config → Tampilkan jadwal & jurusan
   - Submit pendaftaran (`/ppdb/daftar`)
   - Cek status (`/ppdb/cek-status`)
   - Daftar ulang (`/ppdb/daftar-ulang`) jika status = `diterima`
7. **Error Handling**: Semua error response memiliki format yang konsisten: `{ success: false, message: "...", errors: {} }`
8. **CORS**: Pastikan backend sudah mengizinkan CORS untuk domain frontend.

