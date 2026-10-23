<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('pages', function (Blueprint $table) {
            $table->id()->comment('Primary key');

            $table->foreignId('business_id')
                ->nullable()
                ->comment('Business reference; null for main Group XI pages')
                ->constrained('businesses')
                ->cascadeOnDelete();

            $table->string('title')
                ->comment('Page title');

            $table->string('slug')
                ->comment('Page URL slug');

            $table->string('template')
                ->default('default')
                ->comment('Blade template identifier');

            $table->string('status')
                ->default('draft')
                ->comment('Page publication status');

            $table->timestamps();

            $table->index(
                ['business_id', 'slug'],
                'pages_business_slug_index'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
