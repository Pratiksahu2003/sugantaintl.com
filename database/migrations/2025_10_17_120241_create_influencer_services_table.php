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
        Schema::create('influencer_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('service_name');
            $table->text('description');
            $table->string('category'); // e.g., 'content_creation', 'brand_promotion', 'social_media', 'photography', 'video_production'
            $table->string('service_type'); // e.g., 'post', 'story', 'reel', 'video', 'photo_shoot', 'event_appearance'
            $table->decimal('base_price', 10, 2);
            $table->string('currency', 3)->default('USD');
            $table->json('pricing_tiers')->nullable(); // Different pricing based on requirements
            $table->json('deliverables')->nullable(); // What the client will receive
            $table->json('requirements')->nullable(); // What the client needs to provide
            $table->integer('delivery_time_days')->default(7); // Days to deliver
            $table->integer('revision_limit')->default(2); // Number of revisions included
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->json('tags')->nullable(); // SEO and search tags
            $table->json('gallery_images')->nullable(); // Portfolio images
            $table->string('thumbnail_image')->nullable(); // Main service image
            $table->json('social_platforms')->nullable(); // Which platforms this service covers
            $table->json('target_audience')->nullable(); // Target audience demographics
            $table->json('additional_info')->nullable(); // Any additional service details
            $table->timestamps();
            
            $table->index(['user_id', 'is_active']);
            $table->index(['category', 'is_active']);
            $table->index(['service_type', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('influencer_services');
    }
};