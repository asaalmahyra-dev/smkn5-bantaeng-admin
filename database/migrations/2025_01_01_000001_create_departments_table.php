<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('short_name')->nullable();
            $table->string('slug')->unique();
            $table->string('category')->nullable();
            $table->string('headline')->nullable();
            $table->text('description')->nullable();
            $table->text('vision')->nullable();
            $table->json('mission')->nullable();
            $table->json('competencies')->nullable();
            $table->json('career_paths')->nullable();
            $table->string('cover_image')->nullable();
            $table->json('gallery')->nullable();
            $table->boolean('featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};

