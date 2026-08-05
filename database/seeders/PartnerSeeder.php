<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $partners = [
            [
                'name' => 'PT Telkom Indonesia',
                'logo' => null,
                'industry' => 'Telekomunikasi',
                'description' => 'Menyediakan tempat praktik kerja lapangan dan pelatihan jaringan bagi siswa program Teknik Komputer dan Jaringan.',
                'website' => 'https://telkom.co.id',
                'collaboration_type' => 'Internship',
                'featured' => true,
            ],
            [
                'name' => 'Dinas Kominfo Kabupaten Bantaeng',
                'logo' => null,
                'industry' => 'Pemerintahan & Teknologi Informasi',
                'description' => 'Bermitra dalam penyelarasan kurikulum TKJ serta program magang di bidang infrastruktur teknologi informasi daerah.',
                'website' => 'https://bantaengkab.go.id',
                'collaboration_type' => 'Curriculum Development',
                'featured' => false,
            ],
            [
                'name' => 'PT Astra International – Honda',
                'logo' => null,
                'industry' => 'Otomotif',
                'description' => 'Mitra kelas industri otomotif yang menyediakan pelatihan teknisi dan peluang rekrutmen bagi lulusan TKR.',
                'website' => 'https://astra.co.id',
                'collaboration_type' => 'Recruitment',
                'featured' => true,
            ],
            [
                'name' => 'Industri Manufaktur & Pengelasan (DUDI Mitra)',
                'logo' => null,
                'industry' => 'Manufaktur & Pengelasan',
                'description' => 'Menyediakan praktik kerja lapangan pengerjaan logam, pemesinan, dan pengelasan bagi siswa program Teknik Pemesinan.',
                'website' => null,
                'collaboration_type' => 'Internship',
                'featured' => true,
            ],
            [
                'name' => 'Laboratorium Klinik & Fasilitas Kesehatan Mitra',
                'logo' => null,
                'industry' => 'Kesehatan',
                'description' => 'Menyediakan tempat praktik kerja lapangan pemeriksaan laboratorium dan penanganan spesimen bagi siswa program Teknik Laboratorium Medik.',
                'website' => null,
                'collaboration_type' => 'Internship',
                'featured' => true,
            ],
            [
                'name' => 'Konsultan Perencana & Konstruksi (DUDI Mitra)',
                'logo' => null,
                'industry' => 'Konstruksi & Perencanaan',
                'description' => 'Mendukung praktik menggambar teknik, pemodelan bangunan, dan estimasi biaya bagi siswa program Desain Pemodelan dan Informasi Bangunan.',
                'website' => null,
                'collaboration_type' => 'Internship',
                'featured' => false,
            ],
            [
                'name' => 'PT Pertani (Persero)',
                'logo' => null,
                'industry' => 'Agribisnis',
                'description' => 'Menghadirkan praktisi sebagai guru tamu dan mendukung praktik agribisnis tanaman pangan dan hortikultura.',
                'website' => 'https://pertani.co.id',
                'collaboration_type' => 'Guest Lecturer',
                'featured' => false,
            ],
        ];

        foreach ($partners as $partner) {
            Partner::create($partner);
        }
    }
}
