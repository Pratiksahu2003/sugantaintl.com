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
        Schema::create('influencer_collaborations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('collaboration_type_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->text('brief')->nullable(); // Project brief or requirements
            $table->string('status')->default('open'); // open, in_progress, completed, cancelled, paused
            $table->enum('collaboration_mode', ['paid', 'gifted', 'exchange', 'free'])->default('paid');
            $table->decimal('budget_min', 10, 2)->nullable();
            $table->decimal('budget_max', 10, 2)->nullable();
            $table->string('currency', 3)->default('INR');
            $table->json('pricing_details')->nullable(); // Detailed pricing breakdown
            $table->json('deliverables')->nullable(); // What will be delivered
            $table->json('requirements')->nullable(); // What's required from client
            $table->json('timeline')->nullable(); // Project timeline and milestones
            $table->json('social_platforms')->nullable(); // Platforms for collaboration
            $table->json('target_audience')->nullable(); // Target audience details
            $table->json('content_guidelines')->nullable(); // Content creation guidelines
            $table->json('brand_guidelines')->nullable(); // Brand-specific guidelines
            $table->json('hashtags')->nullable(); // Required hashtags
            $table->json('mentions')->nullable(); // Required mentions/tags
            $table->json('exclusivity_terms')->nullable(); // Exclusivity requirements
            $table->json('usage_rights')->nullable(); // Rights for content usage
            $table->json('revision_policy')->nullable(); // Revision and feedback policy
            $table->json('cancellation_policy')->nullable(); // Cancellation terms
            $table->json('payment_terms')->nullable(); // Payment schedule and terms
            $table->json('contract_terms')->nullable(); // Additional contract terms
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->date('deadline')->nullable();
            $table->integer('duration_days')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_urgent')->default(false);
            $table->boolean('requires_approval')->default(true);
            $table->boolean('is_exclusive')->default(false);
            $table->json('tags')->nullable(); // SEO and search tags
            $table->json('gallery_images')->nullable(); // Portfolio images
            $table->string('thumbnail_image')->nullable(); // Main collaboration image
            $table->json('testimonials')->nullable(); // Client testimonials
            $table->json('case_studies')->nullable(); // Success stories
            $table->json('additional_info')->nullable(); // Any additional information
            $table->timestamps();
            
            $table->index(['user_id', 'status']);
            $table->index(['collaboration_type_id', 'status']);
            $table->index(['status', 'is_featured']);
            $table->index(['start_date', 'end_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('influencer_collaborations');
    }
};