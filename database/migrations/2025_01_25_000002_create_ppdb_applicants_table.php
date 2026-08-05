<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ppdb_applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ppdb_config_id')->constrained()->cascadeOnDelete();
            $table->string('nisn', 20)->unique();
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('agama', 50)->nullable();
            $table->text('alamat');
            $table->string('rt_rw', 20)->nullable();
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('kode_pos', 10)->nullable();
            $table->enum('jalur', ['zonasi', 'afirmasi', 'perpindahan', 'prestasi']);
            $table->string('asal_sekolah');
            $table->string('npsn_sekolah', 20)->nullable();
            $table->decimal('rata_rata_rapor', 5, 2)->nullable();
            $table->json('prestasi')->nullable();
            $table->foreignId('jurusan_1')->constrained('departments');
            $table->foreignId('jurusan_2')->nullable()->constrained('departments');
            $table->foreignId('jurusan_3')->nullable()->constrained('departments');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('nama_wali')->nullable();
            $table->string('pekerjaan_ortu')->nullable();
            $table->decimal('penghasilan_ortu', 12, 2)->nullable();
            $table->string('no_hp_ortu', 20);
            $table->enum('status', ['menunggu', 'diterima', 'ditolak', 'daftar_ulang', 'mengundurkan_diri'])->default('menunggu');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ppdb_applicants');
    }
};

