<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->nullable()->constrained('projects')->cascadeOnDelete();
            $table->foreignId('destination_id')->nullable()->constrained('destinations')->cascadeOnDelete();
            $table->foreignId('property_id')->nullable()->constrained('properties')->cascadeOnDelete();
            $table->string('image');
            $table->string('alt_text')->nullable();
            $table->boolean('is_banner')->default(false);
            $table->boolean('is_card')->default(false);          // photo used on the destination slide card
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->index(['project_id', 'sort_order']);
            $table->index(['destination_id', 'sort_order']);
            $table->index(['property_id', 'sort_order']);
        });

        // Each image belongs to exactly one owner: a project, a destination OR a property
        DB::statement('ALTER TABLE galleries ADD CONSTRAINT galleries_one_owner CHECK (
            (CASE WHEN project_id     IS NULL THEN 0 ELSE 1 END) +
            (CASE WHEN destination_id IS NULL THEN 0 ELSE 1 END) +
            (CASE WHEN property_id    IS NULL THEN 0 ELSE 1 END) = 1)');
    }

    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
