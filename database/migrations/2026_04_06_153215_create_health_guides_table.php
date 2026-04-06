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
        Schema::create('health_guides', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            
            $table->json('disease_risks')->nullable(); // Malaria zones, Dengue, etc.
            $table->json('vaccinations_required')->nullable();
            $table->json('vaccinations_recommended')->nullable();
            
            $table->integer('water_safety_score')->default(0); // 0-100
            $table->string('tap_water_status')->nullable(); // 'Safe', 'Avoid', 'Boil'
            $table->integer('food_hygiene_score')->default(0); // 0-100
            
            $table->json('healthcare_facilities')->nullable(); // Hospital lists per city
            $table->json('emergency_contacts')->nullable(); // Local ambulance, fire, police
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_guides');
    }
};
