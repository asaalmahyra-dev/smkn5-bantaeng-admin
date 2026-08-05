<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Seed the departments table with all 6 program keahlian.
     * 
     * IDs will be auto-incremented:
     *   1 => TKR, 2 => TKJ, 3 => AP, 4 => TLM, 5 => DPIB, 6 => TP
     */
    public function run(): void
    {
        $departments = [
            [
                'name' => 'Teknik Kendaraan Ringan',
                'short_name' => 'TKR',
                'slug' => 'teknik-kendaraan-ringan',
                'category' => 'Teknologi & Rekayasa',
                'headline' => 'Menguasai mesin, menggerakkan karier.',
                'description' => '<p>Program keahlian yang membekali siswa dengan kompetensi perawatan dan perbaikan mesin, kelistrikan, serta chassis kendaraan ringan sesuai standar industri otomotif.</p>',
                'vision' => '<p>Menghasilkan teknisi otomotif profesional yang siap kerja dan berdaya saing.</p>',
                'mission' => [
                    'Melaksanakan praktik berbasis standar bengkel industri.',
                    'Mengembangkan kelas industri bersama mitra otomotif.',
                    'Membudayakan keselamatan dan kualitas kerja.',
                ],
                'competencies' => [
                    'Perawatan berkala mesin kendaraan',
                    'Perbaikan sistem kelistrikan otomotif',
                    'Perawatan chassis dan pemindah tenaga',
                    'Diagnosis kerusakan kendaraan',
                ],
                'career_paths' => [
                    'Teknisi Bengkel Resmi',
                    'Mekanik Otomotif',
                    'Service Advisor',
                    'Wirausaha Bengkel',
                ],
                'cover_image' => 'https://images.unsplash.com/photo-1487754180451-c456f719a1fc?auto=format&fit=crop&w=1200&q=70',
                'featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Teknik Komputer dan Jaringan',
                'short_name' => 'TKJ',
                'slug' => 'teknik-komputer-dan-jaringan',
                'category' => 'Teknologi & Rekayasa',
                'headline' => 'Membangun jaringan, merakit masa depan digital.',
                'description' => '<p>Program keahlian yang membekali siswa dengan kemampuan merancang, membangun, dan mengelola jaringan komputer, administrasi server, serta pemrograman dasar sesuai kebutuhan industri teknologi informasi.</p>',
                'vision' => '<p>Menghasilkan teknisi jaringan dan teknologi informasi yang kompeten dan adaptif terhadap perkembangan teknologi.</p>',
                'mission' => [
                    'Melaksanakan pembelajaran berbasis proyek dan sertifikasi industri.',
                    'Mengembangkan kompetensi jaringan, server, dan keamanan dasar.',
                    'Menjalin kerja sama dengan industri teknologi informasi.',
                ],
                'competencies' => [
                    'Instalasi dan konfigurasi jaringan LAN/WAN',
                    'Administrasi server dan sistem operasi jaringan',
                    'Pemrograman dasar dan pengembangan web',
                    'Perawatan dan perbaikan perangkat keras komputer',
                ],
                'career_paths' => [
                    'Teknisi Jaringan',
                    'Administrator Server',
                    'IT Support',
                    'Web Developer Junior',
                ],
                'cover_image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1200&q=70',
                'featured' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Agribisnis Pertanian',
                'short_name' => 'AP',
                'slug' => 'agribisnis-pertanian',
                'category' => 'Agribisnis & Agroteknologi',
                'headline' => 'Menumbuhkan pangan, memanen keberlanjutan.',
                'description' => '<p>Program keahlian yang mengembangkan kompetensi budidaya tanaman pangan dan hortikultura secara modern serta pengelolaan usaha agribisnis, dari pembibitan hingga pascapanen dan pemasaran hasil pertanian.</p>',
                'vision' => '<p>Mencetak wirausahawan dan tenaga terampil agribisnis yang inovatif dan berwawasan lingkungan.</p>',
                'mission' => [
                    'Menyelenggarakan praktik budidaya berbasis teaching factory.',
                    'Menerapkan teknologi pertanian ramah lingkungan.',
                    'Mengembangkan jiwa kewirausahaan agribisnis.',
                ],
                'competencies' => [
                    'Pembibitan dan pembenihan tanaman',
                    'Budidaya tanaman pangan dan hortikultura',
                    'Pengendalian hama dan penyakit terpadu',
                    'Penanganan pascapanen dan pemasaran hasil',
                ],
                'career_paths' => [
                    'Teknisi Budidaya Tanaman',
                    'Wirausaha Agribisnis',
                    'Penyuluh Pertanian Lapangan',
                    'Operator Green House',
                ],
                'cover_image' => 'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?auto=format&fit=crop&w=1200&q=70',
                'featured' => true,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Teknik Laboratorium Medik',
                'short_name' => 'TLM',
                'slug' => 'teknik-laboratorium-medik',
                'category' => 'Kesehatan & Pekerjaan Sosial',
                'headline' => 'Menganalisis dengan teliti, melayani dengan hati.',
                'description' => '<p>Program keahlian bidang kesehatan yang membekali siswa dengan kompetensi pemeriksaan laboratorium medik — hematologi, kimia klinik, dan mikrobiologi dasar — serta penanganan spesimen sesuai prosedur dan standar keselamatan kerja.</p>',
                'vision' => '<p>Menghasilkan tenaga laboratorium medik yang teliti, jujur, dan kompeten untuk mendukung pelayanan kesehatan.</p>',
                'mission' => [
                    'Menyelenggarakan praktik laboratorium sesuai standar prosedur operasional.',
                    'Menanamkan ketelitian, kejujuran, dan etika pelayanan kesehatan.',
                    'Menjalin kerja sama dengan fasilitas kesehatan dan laboratorium klinik.',
                ],
                'competencies' => [
                    'Pengambilan dan penanganan spesimen (flebotomi)',
                    'Pemeriksaan hematologi dan kimia klinik',
                    'Mikrobiologi dan parasitologi dasar',
                    'Penerapan keselamatan kerja laboratorium (K3)',
                ],
                'career_paths' => [
                    'Asisten Analis Laboratorium',
                    'Tenaga Laboratorium Klinik',
                    'Petugas Flebotomi',
                    'Staf Laboratorium Rumah Sakit',
                ],
                'cover_image' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1200&q=70',
                'featured' => true,
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Desain Pemodelan dan Informasi Bangunan',
                'short_name' => 'DPIB',
                'slug' => 'desain-pemodelan-dan-informasi-bangunan',
                'category' => 'Teknologi & Rekayasa',
                'headline' => 'Merancang ruang, memodelkan bangunan.',
                'description' => '<p>Program keahlian yang membekali siswa dengan kompetensi menggambar teknik bangunan, perancangan dengan perangkat lunak CAD/BIM, estimasi biaya, serta pemodelan informasi bangunan sesuai kebutuhan industri konstruksi.</p>',
                'vision' => '<p>Menghasilkan juru gambar dan drafter bangunan yang kreatif, teliti, dan menguasai teknologi desain terkini.</p>',
                'mission' => [
                    'Melaksanakan pembelajaran berbasis proyek desain dan pemodelan bangunan.',
                    'Mengembangkan kompetensi perangkat lunak CAD dan BIM.',
                    'Menjalin kerja sama dengan dunia usaha bidang konstruksi.',
                ],
                'competencies' => [
                    'Menggambar konstruksi bangunan dengan AutoCAD',
                    'Pemodelan bangunan berbasis BIM (SketchUp/Revit)',
                    'Estimasi biaya dan rencana anggaran bangunan',
                    'Perancangan gambar kerja dan denah',
                ],
                'career_paths' => [
                    'Drafter/Juru Gambar Bangunan',
                    'Operator CAD/BIM',
                    'Estimator Konstruksi',
                    'Asisten Perencana Bangunan',
                ],
                'cover_image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=1200&q=70',
                'featured' => false,
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Teknik Pemesinan',
                'short_name' => 'TP',
                'slug' => 'teknik-pemesinan',
                'category' => 'Teknologi & Rekayasa',
                'headline' => 'Membentuk logam, membentuk presisi.',
                'description' => '<p>Program keahlian yang membekali siswa dengan kompetensi pengerjaan logam menggunakan mesin bubut, frais, gerinda, serta pengelasan dan pembacaan gambar teknik sesuai standar industri manufaktur.</p>',
                'vision' => '<p>Menghasilkan teknisi pemesinan yang presisi, disiplin, dan siap bekerja di industri manufaktur.</p>',
                'mission' => [
                    'Melaksanakan praktik pemesinan berbasis standar bengkel industri.',
                    'Mengembangkan kompetensi pengelasan dan pembacaan gambar teknik.',
                    'Menanamkan budaya keselamatan dan mutu kerja (K3).',
                ],
                'competencies' => [
                    'Pengoperasian mesin bubut dan frais',
                    'Pengerjaan gerinda dan kerja bangku',
                    'Pengelasan dasar (SMAW)',
                    'Membaca dan membuat gambar teknik mesin',
                ],
                'career_paths' => [
                    'Operator Mesin Bubut/Frais',
                    'Teknisi Manufaktur',
                    'Welder',
                    'Quality Control Manufaktur',
                ],
                'cover_image' => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?auto=format&fit=crop&w=1200&q=70',
                'featured' => true,
                'is_active' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($departments as $dept) {
            Department::create($dept);
        }
    }
}
