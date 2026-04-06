<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cost_calculations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('area_id')->constrained()->onDelete('cascade');
            $table->decimal('monthly_salary', 12, 2);
            $table->string('currency', 3)->default('INR');
            $table->string('lifestyle_tier')->default('moderate');
            $table->string('occupants')->default('solo');
            $table->string('work_location')->nullable();
            $table->json('inputs')->nullable();
            $table->json('output')->nullable();
            $table->decimal('estimated_total', 12, 2)->default(0);
            $table->decimal('estimated_savings', 12, 2)->default(0);
            $table->decimal('savings_percentage', 8, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cost_calculations');
    }
};
