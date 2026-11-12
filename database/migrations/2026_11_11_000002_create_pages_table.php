<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->nullable()->constrained('businesses')->cascadeOnDelete();
            $table->string('title');
            $table->string('slug');
            $table->string('template')->default('default');
            $table->string('status')->default('draft');
            $table->timestamps();

            $table->index(['business_id', 'slug'], 'pages_business_slug_index');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
