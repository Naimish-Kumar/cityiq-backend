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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('code')->unique(); // ISO 3166-1 alpha-2, e.g., 'IN', 'TH'
            $table->string('region')->nullable(); // e.g., 'Southeast Asia', 'Middle East'
            
            // 8 Core Intelligence Dimensions
            $table->integer('safety_score')->default(0);
            $table->integer('cost_score')->default(0);
            $table->integer('health_score')->default(0);
            $table->integer('visa_score')->default(0);
            $table->integer('infrastructure_score')->default(0);
            $table->integer('cultural_welcome_score')->default(0);
            $table->integer('digital_connectivity_score')->default(0);
            $table->integer('environmental_score')->default(0);
            
            // Key Insights (JSON for storing insights for each dimension)
            $table->json('insights')->nullable(); 
            
            // Budget data (JSON for storing the 3-tier daily budget)
            $table->json('budgets')->nullable(); 
            
            // General Info
            $table->text('description')->nullable();
            $table->string('currency_code')->nullable(); // e.g., 'INR', 'THB'
            $table->string('currency_symbol')->nullable(); // e.g., '₹', '฿'
            $table->decimal('exchange_rate_to_inr', 15, 6)->nullable(); // Baseline exchange rate
            
            $table->json('images')->nullable(); // URL strings for flags/landscapes
            
            $table->string('last_update')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
