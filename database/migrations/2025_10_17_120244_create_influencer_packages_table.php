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
        Schema::create('influencer_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('package_name');
            $table->text('description');
            $table->string('package_type'); // e.g., 'basic', 'premium', 'enterprise', 'custom'
            $table->string('category'); // e.g., 'social_media', 'content_creation', 'brand_ambassador', 'event_promotion'
            $table->decimal('price', 10, 2);
            $table->string('currency', 3)->default('INR');
            $table->enum('pricing_model', ['fixed', 'per_post', 'per_month', 'per_campaign'])->default('fixed');
            $table->json('included_services')->nullable(); // Services included in this package
            $table->json('deliverables')->nullable(); // What the client will receive
            $table->integer('duration_days')->nullable(); // Package duration in days
            $table->integer('post_count')->nullable(); // Number of posts included
            $table->integer('story_count')->nullable(); // Number of stories included
            $table->integer('reel_count')->nullable(); // Number of reels included
            $table->json('social_platforms')->nullable(); // Platforms covered
            $table->json('target_audience')->nullable(); // Target audience demographics
            $table->json('requirements')->nullable(); // Client requirements
            $table->json('add_ons')->nullable(); // Additional services available
            $table->json('pricing_breakdown')->nullable(); // Detailed pricing breakdown
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_custom')->default(false); // Custom package option
            $table->json('tags')->nullable(); // SEO and search tags
            $table->json('gallery_images')->nullable(); // Portfolio images
            $table->string('thumbnail_image')->nullable(); // Main package image
            $table->json('testimonials')->nullable(); // Client testimonials
            $table->json('case_studies')->nullable(); // Success stories
            $table->json('additional_info')->nullable(); // Any additional package details
            $table->timestamps();
            
            $table->index(['user_id', 'is_active']);
            $table->index(['package_type', 'is_active']);
            $table->index(['category', 'is_active']);
            $table->index(['pricing_model', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('influencer_packages');
    }
};