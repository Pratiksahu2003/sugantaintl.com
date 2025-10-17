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
        Schema::create('influencer_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('stage_name')->nullable();
            $table->string('niche')->nullable(); // Fashion, Beauty, Tech, Gaming, etc.
            $table->text('about')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('cover_image')->nullable();
            $table->json('social_platforms')->nullable(); // Platform-specific data
            $table->json('engagement_stats')->nullable(); // Followers, engagement rates
            $table->json('content_categories')->nullable(); // Types of content they create
            $table->decimal('rate_per_post', 10, 2)->nullable();
            $table->decimal('rate_per_story', 10, 2)->nullable();
            $table->decimal('rate_per_video', 10, 2)->nullable();
            $table->string('currency', 3)->default('USD');
            $table->json('availability')->nullable(); // Working hours, availability
            $table->json('collaboration_preferences')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_available_for_collaboration')->default(true);
            $table->timestamps();
            
            $table->unique('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('influencer_profiles');
    }
};
