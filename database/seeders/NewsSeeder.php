<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $news = [
            [
                'category_id' => 1, // Prestasi
                'title' => 'Siswa SMKN 5 Bantaeng Raih Juara LKS IT Networking Tingkat Provinsi 2026',
                'slug' => 'smkn-5-bantaeng-juara-lks-it-networking-2026',
                'excerpt' => 'Perwakilan program TKJ berhasil menyabet juara pertama Lomba Kompetensi Siswa bidang IT Networking tingkat Provinsi Sulawesi Selatan.',
                'content' => '<p>Prestasi membanggakan kembali diraih SMK Negeri 5 Bantaeng. Pada ajang Lomba Kompetensi Siswa (LKS) tingkat Provinsi Sulawesi Selatan 2026, siswa program Teknik Komputer dan Jaringan meraih juara pertama di bidang IT Networking. Kemenangan ini merupakan hasil pembinaan intensif serta dukungan fasilitas laboratorium jaringan yang memadai. Sekolah berharap capaian ini memotivasi siswa lain untuk terus berprestasi.</p>',
                'cover_image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1200&q=70',
                'author' => 'Humas SMKN 5 Bantaeng',
                'published_at' => '2026-05-18 08:00:00',
                'featured' => true,
                'status' => 'published',
                'tags' => ['LKS', 'TKJ', 'Prestasi', 'Jaringan'],
            ],
            [
                'category_id' => 2, // Kegiatan
                'title' => 'Program Agribisnis Pertanian Gelar Panen Perdana Sayuran',
                'slug' => 'panen-perdana-sayuran-program-agribisnis-pertanian',
                'excerpt' => 'Lahan praktik sekolah menghasilkan panen perdana sayuran yang dipasarkan ke masyarakat sekitar.',
                'content' => '<p>Program keahlian Agribisnis Pertanian (AP) SMK Negeri 5 Bantaeng melaksanakan panen perdana sayuran hasil praktik siswa di lahan praktik sekolah. Kegiatan ini menjadi bagian dari teaching factory yang menghubungkan pembelajaran dengan praktik usaha nyata. Hasil panen berupa selada dan pakcoy dipasarkan langsung kepada masyarakat sekitar sekolah.</p>',
                'cover_image' => 'https://images.unsplash.com/photo-1523348837708-15d4a09cfac2?auto=format&fit=crop&w=1200&q=70',
                'author' => 'Tim Agribisnis Pertanian',
                'published_at' => '2026-04-30 09:30:00',
                'featured' => true,
                'status' => 'published',
                'tags' => ['Agribisnis Pertanian', 'Teaching Factory', 'Panen'],
            ],
            [
                'category_id' => 4, // Kerja Sama
                'title' => 'SMKN 5 Bantaeng Jalin Kerja Sama Kelas Industri dengan Astra Honda',
                'slug' => 'penandatanganan-kerja-sama-astra-honda',
                'excerpt' => 'Program TKR resmi membuka kelas industri otomotif melalui penandatanganan nota kesepahaman dengan Astra Honda.',
                'content' => '<p>SMK Negeri 5 Bantaeng menandatangani nota kesepahaman dengan PT Astra International – Honda untuk membuka kelas industri pada program Teknik Kendaraan Ringan. Kerja sama ini mencakup penyelarasan kurikulum, pelatihan guru, praktik kerja lapangan, hingga peluang rekrutmen lulusan.</p>',
                'cover_image' => 'https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=1200&q=70',
                'author' => 'Humas SMKN 5 Bantaeng',
                'published_at' => '2026-03-12 10:00:00',
                'featured' => false,
                'status' => 'published',
                'tags' => ['TKR', 'Kelas Industri', 'Kerja Sama'],
            ],
            [
                'category_id' => 3, // Akademik
                'title' => 'Uji Kompetensi Keahlian 2026 Diikuti Seluruh Siswa Kelas XII',
                'slug' => 'pelaksanaan-uji-kompetensi-keahlian-2026',
                'excerpt' => 'Seluruh siswa kelas XII mengikuti Uji Kompetensi Keahlian bersama asesor dari dunia industri.',
                'content' => '<p>Sebanyak ratusan siswa kelas XII SMK Negeri 5 Bantaeng mengikuti Uji Kompetensi Keahlian (UKK) tahun 2026. Ujian menghadirkan asesor dari dunia usaha dan dunia industri untuk memastikan lulusan memiliki kompetensi sesuai standar kerja.</p>',
                'cover_image' => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=1200&q=70',
                'author' => 'Waka Kurikulum',
                'published_at' => '2026-02-20 08:30:00',
                'featured' => false,
                'status' => 'published',
                'tags' => ['UKK', 'Akademik', 'Kelas XII'],
            ],
            [
                'category_id' => 2, // Kegiatan
                'title' => 'Program TLM Gelar Pemeriksaan Kesehatan Gratis untuk Warga Sekitar',
                'slug' => 'bakti-sosial-pemeriksaan-kesehatan-program-tlm',
                'excerpt' => 'Sebagai bentuk pengabdian, program TLM menyelenggarakan pemeriksaan kesehatan dasar gratis bagi masyarakat sekitar sekolah.',
                'content' => '<p>Program keahlian Teknik Laboratorium Medik (TLM) SMK Negeri 5 Bantaeng menyelenggarakan kegiatan bakti sosial berupa pemeriksaan kesehatan dasar gratis bagi masyarakat di sekitar sekolah.</p>',
                'cover_image' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1200&q=70',
                'author' => 'Tim Teknik Laboratorium Medik',
                'published_at' => '2026-01-25 09:00:00',
                'featured' => false,
                'status' => 'published',
                'tags' => ['TLM', 'Bakti Sosial', 'Kesehatan'],
            ],
            [
                'category_id' => 2, // Kegiatan
                'title' => 'Semarak Peringatan Hari Guru Nasional 2025 di SMKN 5 Bantaeng',
                'slug' => 'peringatan-hari-guru-nasional-2025',
                'excerpt' => 'Peringatan Hari Guru Nasional diisi dengan upacara, penghargaan guru berprestasi, dan pentas seni siswa.',
                'content' => '<p>SMK Negeri 5 Bantaeng memperingati Hari Guru Nasional 2025 dengan menggelar upacara bendera dan pentas seni siswa.</p>',
                'cover_image' => 'https://images.unsplash.com/photo-1543269865-cbf427effbad?auto=format&fit=crop&w=1200&q=70',
                'author' => 'Humas SMKN 5 Bantaeng',
                'published_at' => '2025-11-25 11:00:00',
                'featured' => false,
                'status' => 'published',
                'tags' => ['Hari Guru', 'Kegiatan', 'Sekolah'],
            ],
        ];

        foreach ($news as $item) {
            News::create($item);
        }
    }
}
