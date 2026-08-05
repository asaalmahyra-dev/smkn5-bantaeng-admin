<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'department_id' => null,
                'title' => 'Upacara Bendera Hari Senin',
                'category' => 'Kegiatan Sekolah',
                'type' => 'image',
                'image' => 'https://images.unsplash.com/photo-1543269865-cbf427effbad?auto=format&fit=crop&w=1200&q=70',
                'description' => 'Suasana upacara bendera setiap hari Senin di SMKN 5 Bantaeng.',
                'taken_at' => '2026-01-15 07:30:00',
                'featured' => true,
            ],
            [
                'department_id' => null,
                'title' => 'Kegiatan Belajar Mengajar',
                'category' => 'Pembelajaran',
                'type' => 'image',
                'image' => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=1200&q=70',
                'description' => 'Suasana pembelajaran di kelas SMKN 5 Bantaeng.',
                'taken_at' => '2026-02-10 09:00:00',
                'featured' => false,
            ],
            [
                'department_id' => 2,
                'title' => 'Praktik Jaringan TKJ',
                'category' => 'Pembelajaran',
                'type' => 'image',
                'image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1200&q=70',
                'description' => 'Siswa TKJ sedang melakukan praktik konfigurasi jaringan.',
                'taken_at' => '2026-03-05 10:00:00',
                'featured' => true,
            ],
            [
                'department_id' => 1,
                'title' => 'Praktik Otomotif TKR',
                'category' => 'Pembelajaran',
                'type' => 'image',
                'image' => 'https://images.unsplash.com/photo-1487754180451-c456f719a1fc?auto=format&fit=crop&w=1200&q=70',
                'description' => 'Siswa TKR melakukan praktik perawatan mesin kendaraan.',
                'taken_at' => '2026-03-12 10:30:00',
                'featured' => false,
            ],
            [
                'department_id' => null,
                'title' => 'Profil Sekolah',
                'category' => 'Profil Sekolah',
                'type' => 'image',
                'image' => 'https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=1200&q=70',
                'description' => 'Gedung SMK Negeri 5 Bantaeng tampak depan.',
                'taken_at' => '2025-07-15 08:00:00',
                'featured' => true,
            ],
        ];

        foreach ($items as $item) {
            Gallery::create($item);
        }
    }
}
