<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Seed teachers table.
     * Department IDs: 1=TKR, 2=TKJ, 3=AP, 4=TLM, 5=DPIB, 6=TP
     */
    public function run(): void
    {
        $teachers = [
            [
                'department_id' => 1, // TKR
                'name' => 'Hasan Basri, S.Pd.',
                'position' => 'Ketua Program Keahlian TKR',
                'photo' => 'https://images.unsplash.com/photo-1607013251379-e6eecfffe234?auto=format&fit=crop&crop=faces&w=400&q=70',
                'bio' => '<p>Instruktur otomotif bersertifikat kompetensi, membina kelas industri bekerja sama dengan bengkel resmi.</p>',
                'email' => 'hasan.basri@smkn5bantaeng.sch.id',
                'phone' => '0813-5500-1006',
                'education' => 'S1 Pendidikan Teknik Otomotif, Universitas Negeri Makassar',
                'specialization' => 'Sistem Mesin & Kelistrikan Kendaraan',
                'featured' => true,
            ],
            [
                'department_id' => 1, // TKR
                'name' => 'Rahmat Hidayat, S.T.',
                'position' => 'Guru Produktif TKR',
                'photo' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&crop=faces&w=400&q=70',
                'bio' => '<p>Fokus pada praktik chassis dan pemindah tenaga, aktif mendampingi uji kompetensi keahlian.</p>',
                'email' => 'rahmat.hidayat@smkn5bantaeng.sch.id',
                'phone' => '0852-7800-1007',
                'education' => 'S1 Teknik Mesin, Universitas Muslim Indonesia',
                'specialization' => 'Chassis & Pemindah Tenaga',
                'featured' => false,
            ],
            [
                'department_id' => 2, // TKJ
                'name' => 'Andi Rahmawati, S.Kom.',
                'position' => 'Ketua Program Keahlian TKJ',
                'photo' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&crop=faces&w=400&q=70',
                'bio' => '<p>Guru produktif jaringan komputer yang aktif membina tim lomba kompetensi siswa bidang IT Networking.</p>',
                'email' => 'andi.rahmawati@smkn5bantaeng.sch.id',
                'phone' => '0852-4200-1002',
                'education' => 'S1 Teknik Informatika, STMIK Dipanegara Makassar',
                'specialization' => 'Jaringan Komputer & Administrasi Server',
                'featured' => true,
            ],
            [
                'department_id' => 2, // TKJ
                'name' => 'Muh. Fadli, S.T.',
                'position' => 'Guru Produktif TKJ',
                'photo' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&crop=faces&w=400&q=70',
                'bio' => '<p>Mengampu pemrograman dasar dan pemeliharaan perangkat keras, membimbing proyek teknologi sederhana siswa.</p>',
                'email' => 'muh.fadli@smkn5bantaeng.sch.id',
                'phone' => '0853-9600-1003',
                'education' => 'S1 Teknik Elektro, Universitas Hasanuddin',
                'specialization' => 'Perangkat Keras & Sistem Tertanam',
                'featured' => false,
            ],
            [
                'department_id' => 3, // AP
                'name' => 'Ir. Sitti Aminah, M.P.',
                'position' => 'Ketua Program Keahlian Agribisnis Pertanian',
                'photo' => 'https://images.unsplash.com/photo-1531123897727-8f129e1688ce?auto=format&fit=crop&crop=faces&w=400&q=70',
                'bio' => '<p>Ahli budidaya hortikultura yang mengembangkan lahan praktik dan program pertanian ramah lingkungan sekolah.</p>',
                'email' => 'sitti.aminah@smkn5bantaeng.sch.id',
                'phone' => '0812-4100-1004',
                'education' => 'S2 Agronomi, Universitas Hasanuddin',
                'specialization' => 'Budidaya Tanaman Hortikultura',
                'featured' => true,
            ],
            [
                'department_id' => 3, // AP
                'name' => 'Abdul Rasyid, S.P.',
                'position' => 'Guru Produktif Agribisnis Pertanian',
                'photo' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&crop=faces&w=400&q=70',
                'bio' => '<p>Membimbing praktik pembibitan dan pengendalian hama terpadu di lahan praktik sekolah.</p>',
                'email' => 'abdul.rasyid@smkn5bantaeng.sch.id',
                'phone' => '0821-9000-1005',
                'education' => 'S1 Agroteknologi, Universitas Muhammadiyah Makassar',
                'specialization' => 'Pembibitan & Proteksi Tanaman',
                'featured' => false,
            ],
            [
                'department_id' => 4, // TLM
                'name' => 'Andi Tenri Abeng, S.ST., M.Kes.',
                'position' => 'Ketua Program Keahlian TLM',
                'photo' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?auto=format&fit=crop&crop=faces&w=400&q=70',
                'bio' => '<p>Mengembangkan laboratorium medik sekolah dan membimbing praktik pemeriksaan laboratorium sesuai standar prosedur.</p>',
                'email' => 'andi.tenri@smkn5bantaeng.sch.id',
                'phone' => '0823-4300-1008',
                'education' => 'S2 Kesehatan Masyarakat, Universitas Hasanuddin',
                'specialization' => 'Teknologi Laboratorium Medik',
                'featured' => true,
            ],
            [
                'department_id' => 4, // TLM
                'name' => 'Rostina, S.Tr.Kes.',
                'position' => 'Guru Produktif TLM',
                'photo' => 'https://images.unsplash.com/photo-1594824476967-48c8b964273f?auto=format&fit=crop&crop=faces&w=400&q=70',
                'bio' => '<p>Mengampu praktik hematologi dan kimia klinik serta penanganan spesimen dan keselamatan kerja laboratorium.</p>',
                'email' => 'rostina@smkn5bantaeng.sch.id',
                'phone' => '0851-0200-1009',
                'education' => 'S1 Terapan Teknologi Laboratorium Medik, Poltekkes Makassar',
                'specialization' => 'Hematologi & Kimia Klinik',
                'featured' => false,
            ],
            [
                'department_id' => 5, // DPIB
                'name' => 'Baharuddin, S.T.',
                'position' => 'Ketua Program Keahlian DPIB',
                'photo' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&crop=faces&w=400&q=70',
                'bio' => '<p>Membimbing praktik menggambar teknik bangunan dan pemodelan berbasis CAD/BIM di studio DPIB sekolah.</p>',
                'email' => 'baharuddin@smkn5bantaeng.sch.id',
                'phone' => '0813-4200-1010',
                'education' => 'S1 Teknik Sipil, Universitas Hasanuddin',
                'specialization' => 'Perancangan & Pemodelan Bangunan',
                'featured' => true,
            ],
            [
                'department_id' => 5, // DPIB
                'name' => 'Irwan Setiawan, S.Pd.',
                'position' => 'Guru Produktif DPIB',
                'photo' => 'https://images.unsplash.com/photo-1519345182560-3f2917c472ef?auto=format&fit=crop&crop=faces&w=400&q=70',
                'bio' => '<p>Mengampu menggambar konstruksi dan estimasi biaya bangunan menggunakan perangkat lunak desain terkini.</p>',
                'email' => 'irwan.setiawan@smkn5bantaeng.sch.id',
                'phone' => '0852-4100-1011',
                'education' => 'S1 Pendidikan Teknik Bangunan, Universitas Negeri Makassar',
                'specialization' => 'AutoCAD & BIM',
                'featured' => false,
            ],
            [
                'department_id' => 6, // TP
                'name' => 'Muhammad Arifin, S.Pd., M.T.',
                'position' => 'Ketua Program Keahlian TP',
                'photo' => 'https://images.unsplash.com/photo-1568602471122-7832951cc4c5?auto=format&fit=crop&crop=faces&w=400&q=70',
                'bio' => '<p>Instruktur pemesinan yang membimbing praktik pengoperasian mesin bubut, frais, dan pengelasan sesuai standar industri.</p>',
                'email' => 'muhammad.arifin@smkn5bantaeng.sch.id',
                'phone' => '0813-4400-1012',
                'education' => 'S2 Teknik Mesin, Universitas Negeri Makassar',
                'specialization' => 'Teknik Pemesinan & Pengelasan',
                'featured' => true,
            ],
            [
                'department_id' => 6, // TP
                'name' => 'Saharuddin, S.Pd.',
                'position' => 'Guru Produktif TP',
                'photo' => 'https://images.unsplash.com/photo-1552058544-f2b08422138a?auto=format&fit=crop&crop=faces&w=400&q=70',
                'bio' => '<p>Mengampu praktik kerja bangku dan pembacaan gambar teknik mesin dengan penekanan pada ketelitian dan K3.</p>',
                'email' => 'saharuddin@smkn5bantaeng.sch.id',
                'phone' => '0852-4200-1013',
                'education' => 'S1 Pendidikan Teknik Mesin, Universitas Negeri Makassar',
                'specialization' => 'Kerja Bangku & Gambar Teknik',
                'featured' => false,
            ],
            [
                'department_id' => 2, // TKJ (Kepala Sekolah)
                'name' => 'Drs. H. Muhammad Yusuf, M.Pd.',
                'position' => 'Kepala Sekolah',
                'photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&crop=faces&w=400&q=70',
                'bio' => '<p>Memimpin SMK Negeri 5 Bantaeng dengan fokus pada penguatan budaya kerja industri dan digitalisasi sekolah.</p>',
                'email' => 'kepsek@smkn5bantaeng.sch.id',
                'phone' => '0813-4400-1001',
                'education' => 'S2 Manajemen Pendidikan, Universitas Negeri Makassar',
                'specialization' => 'Manajemen Pendidikan Kejuruan',
                'featured' => true,
            ],
        ];

        foreach ($teachers as $teacher) {
            Teacher::create($teacher);
        }
    }
}
