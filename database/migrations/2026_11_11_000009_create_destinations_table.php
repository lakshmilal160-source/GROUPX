<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->nullable()->constrained('businesses')->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('place')->nullable();                 // e.g. Wayanad, Kerala
            $table->string('heading')->nullable();               // "Spend a week living in a peaceful nature's nest"
            $table->string('card_title')->nullable();            // "Explore Wayanad's Wildlife"
            $table->text('card_caption')->nullable();            // text under the card title
            $table->string('temperature')->nullable();           // "18° – 21°"
            $table->string('terrain')->nullable();               // "2100 metres above sea level"
            $table->string('explore_url')->nullable();           // "Explore" / "Explore Now" link
            $table->unsignedInteger('sort_order')->default(0);
            $table->string('status')->default('published');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};
