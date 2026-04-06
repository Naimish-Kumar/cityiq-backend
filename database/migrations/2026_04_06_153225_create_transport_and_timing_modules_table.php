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
        Schema::create('transport_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            $table->foreignId('area_id')->nullable()->constrained()->onDelete('set null'); // Optional city-level transport
            
            $table->json('available_modes')->nullable(); // Metro, Bus, Tuk-Tuk, Grab/Uber
            $table->integer('safety_score')->default(0); 
            $table->integer('reliability_score')->default(0); 
            
            $table->json('pricing_data')->nullable(); // Standard vs. Tourist fares
            $table->text('practical_advice')->nullable(); // App names, payment methods
            
            $table->timestamps();
        });

        Schema::create('visit_timings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            
            $table->integer('month'); // 1 to 12
            $table->string('weather_type')->nullable(); // 'Sunny', 'Monsoon', 'Peak Summer'
            
            $table->decimal('avg_temp_low', 5, 2)->nullable();
            $table->decimal('avg_temp_high', 5, 2)->nullable();
            
            $table->integer('crowd_level')->default(0); // 0-100
            $table->decimal('hotel_price_index', 5, 2)->default(1.0); // 1.0 = base price
            
            $table->json('events_and_holidays')->nullable(); // Festivals, national holidays
            $table->text('recommendation_insight')->nullable(); // 'Excellent value', 'Avoid due to smog'
            
            $table->timestamps();
            
            $table->unique(['country_id', 'month']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visit_timings');
        Schema::dropIfExists('transport_infos');
    }
};
