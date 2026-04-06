<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->string('title')->nullable()->after('area_id');
            $table->string('category')->default('general')->after('content');
            $table->integer('downvotes')->default(0)->after('likes');
            $table->string('moderation_status')->default('approved')->after('is_verified_local');
            $table->boolean('is_flagged')->default(false)->after('moderation_status');
            $table->timestamp('expires_at')->nullable()->after('is_flagged');
            $table->json('meta')->nullable()->after('expires_at');
        });
    }

    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn([
                'title',
                'category',
                'downvotes',
                'moderation_status',
                'is_flagged',
                'expires_at',
                'meta',
            ]);
        });
    }
};
