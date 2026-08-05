<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'category' => 'PPDB',
                'question' => 'Bagaimana cara mendaftar PPDB di SMKN 5 Bantaeng?',
                'answer' => 'Pendaftaran PPDB dilakukan secara online melalui portal resmi sekolah. Calon siswa dapat mengakses link pendaftaran yang akan diumumkan melalui website dan media sosial sekolah pada periode pendaftaran yang telah ditentukan.',
                'sort_order' => 1,
            ],
            [
                'category' => 'PPDB',
                'question' => 'Apa saja persyaratan mendaftar di SMKN 5 Bantaeng?',
                'answer' => 'Persyaratan utama meliputi: ijazah/SKL SMP/MTs, fotokopi rapor kelas 7-9, pas foto terbaru, kartu keluarga, dan akta kelahiran. Persyaratan lengkap dapat dilihat di halaman PPDB.',
                'sort_order' => 2,
            ],
            [
                'category' => 'Akademik',
                'question' => 'Berapa lama masa pendidikan di SMKN 5 Bantaeng?',
                'answer' => 'Masa pendidikan di SMKN 5 Bantaeng adalah 3 tahun (kelas X, XI, dan XII) dengan sistem pembelajaran yang mengintegrasikan teori dan praktik.',
                'sort_order' => 3,
            ],
            [
                'category' => 'Akademik',
                'question' => 'Apa saja program keahlian yang tersedia?',
                'answer' => 'SMK Negeri 5 Bantaeng memiliki 6 program keahlian: Teknik Kendaraan Ringan (TKR), Teknik Komputer dan Jaringan (TKJ), Agribisnis Pertanian (AP), Teknik Laboratorium Medik (TLM), Desain Pemodelan dan Informasi Bangunan (DPIB), dan Teknik Pemesinan (TP).',
                'sort_order' => 4,
            ],
            [
                'category' => 'Umum',
                'question' => 'Apakah SMKN 5 Bantaeng memiliki fasilitas asrama?',
                'answer' => 'Saat ini SMKN 5 Bantaeng belum memiliki fasilitas asrama. Namun, sekolah berada di lokasi yang strategis dan mudah dijangkau dengan transportasi umum.',
                'sort_order' => 5,
            ],
            [
                'category' => 'Umum',
                'question' => 'Bagaimana prospek kerja lulusan SMKN 5 Bantaeng?',
                'answer' => 'Lulusan SMKN 5 Bantaeng memiliki prospek kerja yang cerah. Dengan kompetensi yang dimiliki, lulusan dapat bekerja di industri sesuai bidang keahliannya, melanjutkan ke perguruan tinggi, atau berwirausaha. Sekolah juga memiliki mitra industri yang siap menyerap lulusan.',
                'sort_order' => 6,
            ],
            [
                'category' => 'Kesiswaan',
                'question' => 'Apa saja kegiatan ekstrakurikuler yang tersedia?',
                'answer' => 'Tersedia berbagai kegiatan ekstrakurikuler seperti OSIS, Pramuka, MPK, PIK-R, dan PMR. Setiap siswa dapat memilih kegiatan yang sesuai dengan minatnya.',
                'sort_order' => 7,
            ],
            [
                'category' => 'Kesiswaan',
                'question' => 'Apakah ada program beasiswa untuk siswa berprestasi?',
                'answer' => 'Ya, tersedia program beasiswa bagi siswa berprestasi, baik dari pemerintah maupun dari mitra industri. Informasi lebih lanjut dapat menghubungi bagian kesiswaan.',
                'sort_order' => 8,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
