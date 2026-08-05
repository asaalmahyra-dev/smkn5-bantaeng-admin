<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    public function run(): void
    {
        $achievements = [
            [
                'title' => 'Juara 1 LKS IT Networking Tingkat Provinsi',
                'category' => 'Competition',
                'description' => 'Meraih juara pertama bidang IT Networking pada Lomba Kompetensi Siswa tingkat Provinsi Sulawesi Selatan.',
                'image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1000&q=70',
                'year' => 2026,
                'level' => 'Province',
                'participants' => ['Rizky Ramadhan'],
            ],
            [
                'title' => 'Juara 2 Lomba Debat Bahasa Indonesia',
                'category' => 'Academic',
                'description' => 'Tim debat sekolah meraih juara kedua pada lomba debat bahasa Indonesia tingkat kabupaten.',
                'image' => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=1000&q=70',
                'year' => 2025,
                'level' => 'District',
                'participants' => ['Nur Aisyah', 'Fadhil Akbar'],
            ],
            [
                'title' => 'Juara 1 LKS Pengelasan Tingkat Kabupaten',
                'category' => 'Competition',
                'description' => 'Siswa program Teknik Pemesinan meraih juara pertama bidang pengelasan pada Lomba Kompetensi Siswa tingkat kabupaten Bantaeng.',
                'image' => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?auto=format&fit=crop&w=1000&q=70',
                'year' => 2025,
                'level' => 'District',
                'participants' => ['Tim TP SMKN 5 Bantaeng'],
            ],
            [
                'title' => 'Finalis Lomba Otomotif Tingkat Nasional',
                'category' => 'Competition',
                'description' => 'Siswa program TKR lolos hingga babak final lomba keterampilan otomotif tingkat nasional.',
                'image' => 'https://images.unsplash.com/photo-1625246333195-78d9c38ad449?auto=format&fit=crop&w=1000&q=70',
                'year' => 2025,
                'level' => 'National',
                'participants' => ['Muh. Ilham'],
            ],
            [
                'title' => 'Juara 3 Lomba Kewirausahaan Agribisnis',
                'category' => 'Non-academic',
                'description' => 'Produk olahan hasil pertanian siswa Agribisnis Pertanian meraih juara ketiga lomba kewirausahaan tingkat provinsi.',
                'image' => 'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?auto=format&fit=crop&w=1000&q=70',
                'year' => 2024,
                'level' => 'Province',
                'participants' => ['Kelompok Wirausaha AP'],
            ],
            [
                'title' => 'Penghargaan Sekolah Adiwiyata Tingkat Kabupaten',
                'category' => 'Award',
                'description' => 'SMK Negeri 5 Bantaeng menerima penghargaan Adiwiyata atas komitmen terhadap lingkungan sekolah yang hijau dan sehat.',
                'image' => 'https://images.unsplash.com/photo-1519452575417-564c1401ecc0?auto=format&fit=crop&w=1000&q=70',
                'year' => 2024,
                'level' => 'District',
                'participants' => ['SMK Negeri 5 Bantaeng'],
            ],
        ];

        foreach ($achievements as $achievement) {
            Achievement::create($achievement);
        }
    }
}
