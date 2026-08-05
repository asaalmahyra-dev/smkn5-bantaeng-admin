<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    public function run(): void
    {
        $facilities = [
            [
                'name' => 'Laboratorium Teknik Laboratorium Medik',
                'slug' => 'laboratorium-teknik-laboratorium-medik',
                'description' => '<p>Laboratorium praktik bidang kesehatan yang dilengkapi mikroskop, peralatan hematologi dan kimia klinik, serta sarana penanganan spesimen untuk mendukung praktik program Teknik Laboratorium Medik.</p>',
                'category' => 'Laboratory',
                'location' => 'Gedung Praktik Kesehatan',
                'image' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1200&q=70',
                'featured' => true,
            ],
            [
                'name' => 'Bengkel Teknik Kendaraan Ringan',
                'slug' => 'bengkel-teknik-kendaraan-ringan',
                'description' => '<p>Bengkel praktik otomotif dengan car lift, engine stand, dan peralatan diagnostik untuk praktik perawatan mesin, kelistrikan, dan chassis kendaraan.</p>',
                'category' => 'Workshop',
                'location' => 'Gedung Praktik, Sayap Timur',
                'image' => 'https://images.unsplash.com/photo-1487754180451-c456f719a1fc?auto=format&fit=crop&w=1200&q=70',
                'featured' => true,
            ],
            [
                'name' => 'Bengkel Teknik Pemesinan',
                'slug' => 'bengkel-teknik-pemesinan',
                'description' => '<p>Bengkel praktik pemesinan yang dilengkapi mesin bubut, frais, gerinda, dan peralatan kerja bangku serta pengelasan untuk mendukung praktik program Teknik Pemesinan.</p>',
                'category' => 'Workshop',
                'location' => 'Gedung Praktik, Sayap Barat',
                'image' => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?auto=format&fit=crop&w=1200&q=70',
                'featured' => true,
            ],
            [
                'name' => 'Laboratorium Komputer',
                'slug' => 'laboratorium-komputer',
                'description' => '<p>Laboratorium komputer dengan perangkat jaringan dan koneksi internet untuk praktik instalasi jaringan, administrasi server, dan pemrograman program Teknik Komputer dan Jaringan.</p>',
                'category' => 'Computer Lab',
                'location' => 'Gedung A, Lantai 2',
                'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1200&q=70',
                'featured' => true,
            ],
            [
                'name' => 'Laboratorium DPIB',
                'slug' => 'laboratorium-dpib',
                'description' => '<p>Laboratorium desain yang dilengkapi komputer dan perangkat lunak CAD/BIM untuk praktik menggambar teknik dan pemodelan bangunan program Desain Pemodelan dan Informasi Bangunan.</p>',
                'category' => 'Computer Lab',
                'location' => 'Gedung B, Lantai 2',
                'image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=1200&q=70',
                'featured' => true,
            ],
            [
                'name' => 'Lahan Praktik Agribisnis Pertanian',
                'slug' => 'lahan-praktik-agribisnis-pertanian',
                'description' => '<p>Lahan praktik dan green house untuk budidaya tanaman pangan dan hortikultura, pembibitan, serta penerapan pertanian ramah lingkungan program Agribisnis Pertanian.</p>',
                'category' => 'Agriculture',
                'location' => 'Area Belakang Sekolah',
                'image' => 'https://images.unsplash.com/photo-1523348837708-15d4a09cfac2?auto=format&fit=crop&w=1200&q=70',
                'featured' => true,
            ],
            [
                'name' => 'Lapangan Olahraga',
                'slug' => 'lapangan-olahraga',
                'description' => '<p>Lapangan serbaguna untuk pembelajaran olahraga dan kegiatan ekstrakurikuler seperti voli, basket, dan futsal.</p>',
                'category' => 'Sports',
                'location' => 'Halaman Tengah Sekolah',
                'image' => 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?auto=format&fit=crop&w=1200&q=70',
                'featured' => false,
            ],
            [
                'name' => 'Perpustakaan',
                'slug' => 'perpustakaan',
                'description' => '<p>Perpustakaan dengan koleksi buku kejuruan dan umum serta ruang baca yang nyaman untuk mendukung literasi dan belajar mandiri siswa.</p>',
                'category' => 'Library',
                'location' => 'Gedung A, Lantai 1',
                'image' => 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&w=1200&q=70',
                'featured' => false,
            ],
            [
                'name' => 'Unit Kesehatan Sekolah (UKS)',
                'slug' => 'uks',
                'description' => '<p>Ruang layanan kesehatan sekolah untuk pertolongan pertama, pemeriksaan sederhana, dan pembinaan pola hidup sehat bagi warga sekolah.</p>',
                'category' => 'General',
                'location' => 'Gedung A, Lantai 1',
                'image' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&w=1200&q=70',
                'featured' => false,
            ],
            [
                'name' => 'Musala',
                'slug' => 'musala',
                'description' => '<p>Tempat ibadah di lingkungan sekolah untuk salat dan kegiatan keagamaan yang mendukung pembinaan karakter dan keimanan siswa.</p>',
                'category' => 'General',
                'location' => 'Area Tengah Sekolah',
                'image' => 'https://images.unsplash.com/photo-1584286595398-a59511e0668a?auto=format&fit=crop&w=1200&q=70',
                'featured' => false,
            ],
        ];

        foreach ($facilities as $facility) {
            Facility::create($facility);
        }
    }
}
