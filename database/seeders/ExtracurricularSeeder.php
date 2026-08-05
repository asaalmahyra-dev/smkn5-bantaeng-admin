<?php

namespace Database\Seeders;

use App\Models\Extracurricular;
use Illuminate\Database\Seeder;

class ExtracurricularSeeder extends Seeder
{
    public function run(): void
    {
        $extracurriculars = [
            [
                'name' => 'Organisasi Siswa Intra Sekolah',
                'slug' => 'osis',
                'short_name' => 'OSIS',
                'category' => 'Organisasi & Kepemimpinan',
                'teacher_id' => null,
                'schedule' => 'Jumat, 14.00-16.00 WITA',
                'location' => 'Ruang OSIS dan aula sekolah',
                'icon' => 'users',
                'image' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=1200&q=70',
                'image_alt' => 'Sekelompok siswa berdiskusi dalam kegiatan organisasi',
                'color' => 'brand',
                'description' => '<p>OSIS menjadi ruang bagi siswa untuk mengembangkan kepemimpinan, tanggung jawab, dan kemampuan mengelola program secara terstruktur. Anggota terlibat dalam penyusunan agenda kesiswaan, koordinasi kegiatan sekolah, serta penyampaian aspirasi siswa dengan bimbingan pembina.</p>',
                'short_description' => 'Wadah utama siswa untuk belajar memimpin, berorganisasi, dan menggerakkan program sekolah.',
                'highlights' => [
                    'Latihan dasar kepemimpinan dan manajemen organisasi',
                    'Penyusunan serta evaluasi program kerja kesiswaan',
                    'Koordinasi kegiatan sekolah dan peringatan hari besar',
                    'Penyaluran aspirasi siswa secara tertib dan bertanggung jawab',
                ],
                'featured' => true,
            ],
            [
                'name' => 'Pramuka',
                'slug' => 'pramuka',
                'short_name' => 'Pramuka',
                'category' => 'Karakter & Keterampilan',
                'teacher_id' => null,
                'schedule' => 'Sabtu, 15.00-17.00 WITA',
                'location' => 'Lapangan sekolah dan area kegiatan luar ruang',
                'icon' => 'compass',
                'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1200&q=70',
                'image_alt' => 'Kegiatan luar ruang untuk melatih kemandirian dan kerja sama',
                'color' => 'yellow',
                'description' => '<p>Pramuka membentuk siswa yang mandiri, disiplin, tangguh, dan peduli terhadap lingkungan serta masyarakat.</p>',
                'short_description' => 'Pembinaan karakter melalui kegiatan lapangan, keterampilan hidup, kedisiplinan, dan kerja sama regu.',
                'highlights' => [
                    'Latihan baris-berbaris, tali-temali, dan pionering',
                    'Penjelajahan serta orientasi medan dasar',
                    'Perkemahan dan kegiatan kerja sama regu',
                    'Bakti sosial dan kepedulian terhadap lingkungan',
                ],
                'featured' => true,
            ],
            [
                'name' => 'Majelis Perwakilan Kelas',
                'slug' => 'mpk',
                'short_name' => 'MPK',
                'category' => 'Organisasi & Kepemimpinan',
                'teacher_id' => null,
                'schedule' => 'Rabu, 14.00-15.30 WITA',
                'location' => 'Ruang rapat siswa',
                'icon' => 'landmark',
                'image' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=1200&q=70',
                'image_alt' => 'Siswa bermusyawarah dalam sebuah pertemuan perwakilan kelas',
                'color' => 'blue',
                'description' => '<p>MPK mempertemukan perwakilan setiap kelas untuk membahas aspirasi, kebutuhan, dan evaluasi kegiatan kesiswaan.</p>',
                'short_description' => 'Forum perwakilan kelas yang mengawal aspirasi siswa dan mendukung tata kelola organisasi kesiswaan.',
                'highlights' => [
                    'Forum penyampaian dan pengelolaan aspirasi kelas',
                    'Musyawarah perwakilan siswa secara berkala',
                    'Evaluasi program kerja organisasi kesiswaan',
                    'Pelatihan komunikasi, argumentasi, dan pengambilan keputusan',
                ],
                'featured' => false,
            ],
            [
                'name' => 'Pusat Informasi dan Konseling Remaja',
                'slug' => 'pik-r',
                'short_name' => 'PIK-R',
                'category' => 'Pengembangan Diri',
                'teacher_id' => null,
                'schedule' => 'Kamis, 14.00-15.30 WITA',
                'location' => 'Ruang Bimbingan Konseling',
                'icon' => 'heart-handshake',
                'image' => 'https://images.unsplash.com/photo-1542810634-71277d95dcbb?auto=format&fit=crop&w=1200&q=70',
                'image_alt' => 'Remaja mengikuti kegiatan edukasi dan pendampingan kelompok',
                'color' => 'brand',
                'description' => '<p>PIK-R menyediakan ruang belajar yang aman bagi siswa untuk memperoleh informasi kesehatan remaja, perencanaan masa depan, dan keterampilan hidup.</p>',
                'short_description' => 'Ruang edukasi dan pendampingan teman sebaya untuk mendukung remaja yang sehat, terencana, dan berdaya.',
                'highlights' => [
                    'Pelatihan pendidik dan konselor sebaya',
                    'Edukasi kesehatan serta perencanaan kehidupan remaja',
                    'Diskusi keterampilan hidup dan pengembangan diri',
                    'Kampanye lingkungan sekolah yang sehat dan suportif',
                ],
                'featured' => false,
            ],
            [
                'name' => 'Palang Merah Remaja',
                'slug' => 'pmr',
                'short_name' => 'PMR',
                'category' => 'Kesehatan & Kemanusiaan',
                'teacher_id' => null,
                'schedule' => 'Jumat, 15.30-17.00 WITA',
                'location' => 'Ruang UKS dan lapangan sekolah',
                'icon' => 'heart-pulse',
                'image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=1200&q=70',
                'image_alt' => 'Pelatihan dasar kesehatan dan pertolongan pertama',
                'color' => 'red',
                'description' => '<p>PMR membekali siswa dengan pengetahuan dasar kesehatan, pertolongan pertama, kesiapsiagaan, dan pelayanan kemanusiaan.</p>',
                'short_description' => 'Pembinaan kepedulian kemanusiaan, hidup sehat, dan keterampilan pertolongan pertama bagi siswa.',
                'highlights' => [
                    'Pelatihan pertolongan pertama dan penanganan cedera ringan',
                    'Edukasi perilaku hidup bersih dan sehat',
                    'Simulasi kesiapsiagaan dalam situasi darurat',
                    'Dukungan layanan kesehatan pada kegiatan sekolah',
                ],
                'featured' => false,
            ],
        ];

        foreach ($extracurriculars as $extracurricular) {
            Extracurricular::create($extracurricular);
        }
    }
}
