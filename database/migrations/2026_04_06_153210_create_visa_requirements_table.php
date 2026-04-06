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
        Schema::create('visa_requirements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            $table->string('passport_country_code'); // Source passport
            
            $table->string('visa_type'); // 'Visa-Free', 'VOA', 'e-Visa', 'Required', 'ETA'
            $table->string('duration')->nullable(); 
            $table->string('processing_time')->nullable();
            
            $table->decimal('fee_amount', 10, 2)->nullable();
            $table->string('fee_currency')->nullable();
            
            $table->json('document_checklist')->nullable(); // Plain language guidance
            $table->json('rejection_reasons')->nullable(); // Known rejection reasons
            $table->json('tips')->nullable(); // Interview tips, etc.
            
            $table->text('application_link')->nullable(); // Direct application or embassy link
            
            $table->timestamps();
            
            $table->unique(['country_id', 'passport_country_code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visa_requirements');
    }
};
