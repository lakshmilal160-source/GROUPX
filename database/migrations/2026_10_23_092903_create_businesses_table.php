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
       Schema::create('businesses', function (Blueprint $table) {
            $table->id()->comment('Primary key');

            $table->string('name')
                ->comment('Business name');

            $table->string('slug')->unique()
                ->comment('Unique business URL slug');

            $table->string('logo')->nullable()
                ->comment('Business logo image path');

            $table->string('tagline')->nullable()
                ->comment('Short business tagline');

            $table->text('description')->nullable()
                ->comment('Short business description');

            $table->string('domain')->nullable()->unique()
                ->comment('Business website domain name');

            $table->boolean('status')->default(true)
                ->comment('Business active status');

            $table->unsignedInteger('sort_order')->default(0)
                ->comment('Business display order');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
