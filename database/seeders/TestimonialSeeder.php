<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Andi Suryanto',
                'role' => 'Orang Tua Siswa',
                'photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&crop=faces&w=200&q=70',
                'message' => 'Saya sangat bersyukur anak saya bisa bersekolah di SMKN 5 Bantaeng. Pendidikan karakter dan keterampilan yang diberikan sangat membekali anak untuk masa depannya.',
                'rating' => 5,
            ],
            [
                'name' => 'Siti Nurhaliza',
                'role' => 'Alumni TKJ 2024',
                'photo' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?auto=format&fit=crop&crop=faces&w=200&q=70',
                'message' => 'Berkat ilmu jaringan yang saya dapatkan di SMKN 5 Bantaeng, saya sekarang bekerja sebagai teknisi jaringan di salah satu perusahaan telekomunikasi terkemuka.',
                'rating' => 5,
            ],
            [
                'name' => 'H. Muhammad Ramli',
                'role' => 'Ketua Komite Sekolah',
                'photo' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&crop=faces&w=200&q=70',
                'message' => 'SMKN 5 Bantaeng terus menunjukkan kemajuan yang signifikan dalam hal fasilitas dan kualitas pendidikan. Kami sebagai komite sangat mendukung penuh program-program sekolah.',
                'rating' => 4,
            ],
            [
                'name' => 'Risma Dewi',
                'role' => 'Siswa Kelas XII AP',
                'photo' => 'https://images.unsplash.com/photo-1531123897727-8f129e1688ce?auto=format&fit=crop&crop=faces&w=200&q=70',
                'message' => 'Saya senang belajar di jurusan Agribisnis Pertanian. Praktik di lahan pertanian sekolah sangat menyenangkan dan menambah wawasan kami tentang pertanian modern.',
                'rating' => 5,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
