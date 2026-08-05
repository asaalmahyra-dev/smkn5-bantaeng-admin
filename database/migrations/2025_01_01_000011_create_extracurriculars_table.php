<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('extracurriculars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('short_name')->nullable();
            $table->string('slug')->unique();
            $table->string('category')->nullable();
            $table->foreignId('teacher_id')->nullable()->constrained()->nullOnDelete();
            $table->string('schedule')->nullable();
            $table->string('location')->nullable();
            $table->string('icon')->nullable();
            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();
            $table->string('color')->nullable();
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->json('highlights')->nullable();
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('extracurriculars');
    }
};

