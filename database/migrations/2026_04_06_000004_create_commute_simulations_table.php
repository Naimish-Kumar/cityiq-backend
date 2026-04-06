<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commute_simulations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('area_id')->constrained()->onDelete('cascade');
            $table->string('work_location');
            $table->integer('peak_minutes')->default(0);
            $table->integer('off_peak_minutes')->default(0);
            $table->string('stress_level')->default('medium');
            $table->string('recommended_mode')->default('metro');
            $table->decimal('monthly_cost', 12, 2)->default(0);
            $table->json('alternative_routes')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commute_simulations');
    }
};
