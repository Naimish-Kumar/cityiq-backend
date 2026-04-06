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
        Schema::create('country_alerts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            
            $table->string('type'); // 'Emergency', 'Elevated Risk', 'Routine'
            $table->string('title');
            $table->text('content');
            
            $table->json('recommended_actions')->nullable(); // Evacuation route, embassy contacts
            
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });

        Schema::create('user_country_alerts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('country_alert_id')->constrained()->onDelete('cascade');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_country_alerts');
        Schema::dropIfExists('country_alerts');
    }
};
