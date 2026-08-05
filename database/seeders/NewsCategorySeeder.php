<?php

namespace Database\Seeders;

use App\Models\NewsCategory;
use Illuminate\Database\Seeder;

class NewsCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Prestasi', 'slug' => 'prestasi'],
            ['name' => 'Kegiatan', 'slug' => 'kegiatan'],
            ['name' => 'Akademik', 'slug' => 'akademik'],
            ['name' => 'Kerja Sama', 'slug' => 'kerja-sama'],
            ['name' => 'Pengumuman', 'slug' => 'pengumuman'],
        ];

        foreach ($categories as $category) {
            NewsCategory::create($category);
        }
    }
}
