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
       Schema::create('page_sections', function (Blueprint $table) {
            $table->id()->comment('Primary key');

            $table->foreignId('page_id')
                ->comment('Reference to the page')
                ->constrained('pages')
                ->cascadeOnDelete();

            $table->string('section_type')
                ->comment('Section component identifier');

            $table->string('title')
                ->nullable()
                ->comment('Section heading');

            $table->longText('content')
                ->nullable()
                ->comment('Section main content');

            $table->string('image')
                ->nullable()
                ->comment('Section image path');

            $table->json('settings')
                ->nullable()
                ->comment('Additional section configuration');

            $table->unsignedInteger('sort_order')
                ->default(0)
                ->comment('Section display order');

            $table->boolean('is_active')
                ->default(true)
                ->comment('Controls section visibility');

            $table->timestamps();

            $table->index(
                ['page_id', 'sort_order'],
                'page_sections_order_index'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_sections');
    }
};
