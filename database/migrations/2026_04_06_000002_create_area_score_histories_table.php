<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('area_score_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('area_id')->constrained()->onDelete('cascade');
            $table->decimal('liveability_score', 5, 2);
            $table->decimal('safety_score', 5, 2)->default(0);
            $table->decimal('cost_score', 5, 2)->default(0);
            $table->decimal('commute_score', 5, 2)->default(0);
            $table->decimal('lifestyle_score', 5, 2)->default(0);
            $table->string('source')->default('system');
            $table->json('breakdown')->nullable();
            $table->timestamp('captured_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('area_score_histories');
    }
};
