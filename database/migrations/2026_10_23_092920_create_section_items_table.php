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
         Schema::create('section_items', function (Blueprint $table) {
            $table->id()->comment('Primary key');

            $table->foreignId('page_section_id')
                ->comment('Reference to the page section')
                ->constrained('page_sections')
                ->cascadeOnDelete();

            $table->string('title')
                ->comment('Item title');

            $table->text('description')
                ->nullable()
                ->comment('Item description');

            $table->string('image')
                ->nullable()
                ->comment('Item image path');

            $table->string('link')
                ->nullable()
                ->comment('Optional item destination URL');

            $table->unsignedInteger('sort_order')
                ->default(0)
                ->comment('Item display order');

            $table->json('settings')
                ->nullable()
                ->comment('Additional item configuration');

            $table->timestamps();

            $table->index(
                ['page_section_id', 'sort_order'],
                'section_items_order_index'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_items');
    }
};
