<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('destination_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destination_id')->constrained('destinations')->cascadeOnDelete();
            $table->string('reviewer_name');                        // Aryan Singh
            $table->string('reviewer_role')->nullable();            // Local Guide / Designer
            $table->unsignedInteger('reviews_count')->nullable();   // 96
            $table->unsignedInteger('photos_count')->nullable();    // 105
            $table->unsignedTinyInteger('rating')->default(5);      // 1-5
            $table->date('reviewed_at')->nullable();                // shown as "4 months ago"
            $table->text('review_text');
            $table->string('review_url')->nullable();               // "Read More" link
            $table->string('avatar')->nullable();                   // empty = show first letter
            $table->unsignedInteger('sort_order')->default(0);
            $table->string('status')->default('published');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('destination_reviews');
    }
};
