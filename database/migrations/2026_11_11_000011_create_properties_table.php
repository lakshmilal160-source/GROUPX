<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destination_id')->constrained('destinations')->cascadeOnDelete();
            $table->string('name');                                 // The Old Acre (hero title)
            $table->string('slug')->unique();
            $table->string('hero_image')->nullable();
            $table->string('location')->nullable();                 // Wayanad (falls back to destination place)
            $table->string('temperature')->nullable();              // 18° - 21°
            $table->string('altitude')->nullable();                 // 2100 meter above sea level
            $table->string('phone')->nullable();                    // phone icon
            $table->string('email')->nullable();                    // mail icon
            $table->string('chat_url')->nullable();                 // chat icon (WhatsApp etc.)
            $table->string('intro_label')->nullable();              // "Property"
            $table->string('intro_title')->nullable();              // "The Old Harbor Hotel"
            $table->string('intro_tagline')->nullable();            // "A Group XI Experience"
            $table->string('quote')->nullable();                    // "Crafted for Quiet Moments"
            $table->string('quote_subtitle')->nullable();           // "Celebrate the Soul of Wayanad"
            $table->text('description')->nullable();                // paragraphs, blank line = new paragraph
            $table->string('intro_image')->nullable();              // rounded photo beside the text
            $table->unsignedInteger('sort_order')->default(0);
            $table->string('status')->default('draft');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
