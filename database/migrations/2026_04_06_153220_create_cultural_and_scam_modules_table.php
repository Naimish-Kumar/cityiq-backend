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
        Schema::create('cultural_guides', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            
            $table->json('dress_norms')->nullable(); // Mosque/Beach rules, etc.
            $table->json('religious_customs')->nullable(); // Prayer times, taboos
            $table->json('food_laws')->nullable(); // No alcohol/halal/veg, etc.
            $table->json('legal_bans')->nullable(); // Photography rules, drugs
            
            $table->json('tipping_etiquette')->nullable(); // % Expected per venue
            $table->json('gestures_to_avoid')->nullable(); // Offensive body language
            $table->json('bargaining_rules')->nullable(); // Where to bargain, when not
            $table->json('business_tips')->nullable(); // Gifts, communication style
            
            $table->timestamps();
        });

        Schema::create('scam_alerts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            $table->foreignId('area_id')->nullable()->constrained()->onDelete('set null'); // Optional city/area
            
            $table->string('type'); // 'Taxi', 'ATM', 'Fake Police', 'Monument'
            $table->string('title');
            $table->text('description');
            $table->string('location_name')->nullable();
            
            $table->json('detection_tips')->nullable(); // How to spot and avoid
            
            $table->boolean('is_verified')->default(false);
            $table->integer('report_count')->default(1);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scam_alerts');
        Schema::dropIfExists('cultural_guides');
    }
};
