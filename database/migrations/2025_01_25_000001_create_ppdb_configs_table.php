<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ppdb_configs', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_ajaran');
            $table->string('gelombang')->default('Gelombang 1');
            $table->timestamp('pendaftaran_mulai')->nullable();
            $table->timestamp('pendaftaran_selesai')->nullable();
            $table->timestamp('pengumuman_mulai')->nullable();
            $table->timestamp('daftar_ulang_mulai')->nullable();
            $table->timestamp('daftar_ulang_selesai')->nullable();
            $table->integer('daya_tampung_total')->default(0);
            $table->decimal('persen_zonasi', 5, 2)->default(50);
            $table->decimal('persen_afirmasi', 5, 2)->default(15);
            $table->decimal('persen_perpindahan', 5, 2)->default(10);
            $table->decimal('persen_prestasi', 5, 2)->default(25);
            $table->integer('usia_maksimal_tahun')->default(21);
            $table->boolean('is_active')->default(false);
            $table->text('pengumuman')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ppdb_configs');
    }
};

