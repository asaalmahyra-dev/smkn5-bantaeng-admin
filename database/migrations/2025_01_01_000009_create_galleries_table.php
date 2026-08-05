<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('category')->nullable();
            $table->enum('type', ['image', 'video'])->default('image');
            $table->string('image')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('video')->nullable();
            $table->text('description')->nullable();
            $table->boolean('featured')->default(false);
            $table->timestamp('taken_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};

