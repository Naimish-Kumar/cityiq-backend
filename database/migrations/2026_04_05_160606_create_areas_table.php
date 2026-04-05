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
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('city');
            $table->string('state');
            $table->decimal('liveability_score', 5, 2)->default(0);
            $table->decimal('overall_score', 5, 2)->default(0);
            $table->decimal('safety_score', 5, 2)->default(0);
            $table->decimal('cost_score', 5, 2)->default(0);
            $table->decimal('commute_score', 5, 2)->default(0);
            $table->decimal('lifestyle_score', 5, 2)->default(0);
            $table->integer('review_count')->default(0);
            $table->boolean('is_trending')->default(false);
            $table->string('country')->default('IN');
            $table->text('description')->nullable();
            $table->json('cost_data')->nullable(); // Store detailed costs
            $table->json('amenities')->nullable(); // Store list of amenities
            $table->json('images')->nullable(); // Arrays of image paths
            $table->json('tags')->nullable(); // List of tags
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('last_update')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('areas');
    }
};
