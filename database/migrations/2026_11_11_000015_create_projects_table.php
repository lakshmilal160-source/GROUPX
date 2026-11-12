<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_category_id')->constrained('project_categories')->restrictOnDelete();
            $table->string('title_part1');
            $table->string('title_part2')->nullable();
            $table->string('slug')->unique();
            $table->string('typology')->nullable();
            $table->string('size')->nullable();
            $table->string('location')->nullable();
            $table->string('architecture')->nullable();
            $table->text('description')->nullable();
            $table->string('layout_img')->nullable();
            $table->string('banner_img')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->string('status')->default('draft');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
