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
        Schema::table('influencer_profiles', function (Blueprint $table) {
            // Add only the fields that don't exist yet
            if (!Schema::hasColumn('influencer_profiles', 'target_audience')) {
                $table->json('target_audience')->nullable();
            }
            if (!Schema::hasColumn('influencer_profiles', 'audience_locations')) {
                $table->json('audience_locations')->nullable();
            }
            if (!Schema::hasColumn('influencer_profiles', 'business_email')) {
                $table->string('business_email')->nullable();
            }
            if (!Schema::hasColumn('influencer_profiles', 'business_phone')) {
                $table->string('business_phone')->nullable();
            }
            if (!Schema::hasColumn('influencer_profiles', 'manager_name')) {
                $table->string('manager_name')->nullable();
            }
            if (!Schema::hasColumn('influencer_profiles', 'manager_email')) {
                $table->string('manager_email')->nullable();
            }
            if (!Schema::hasColumn('influencer_profiles', 'manager_phone')) {
                $table->string('manager_phone')->nullable();
            }
            if (!Schema::hasColumn('influencer_profiles', 'agency_name')) {
                $table->string('agency_name')->nullable();
            }
            if (!Schema::hasColumn('influencer_profiles', 'agency_contact')) {
                $table->string('agency_contact')->nullable();
            }
            if (!Schema::hasColumn('influencer_profiles', 'has_manager')) {
                $table->boolean('has_manager')->default(false);
            }
            if (!Schema::hasColumn('influencer_profiles', 'has_agency')) {
                $table->boolean('has_agency')->default(false);
            }
            if (!Schema::hasColumn('influencer_profiles', 'rate_per_campaign')) {
                $table->decimal('rate_per_campaign', 10, 2)->nullable();
            }
            if (!Schema::hasColumn('influencer_profiles', 'payment_methods')) {
                $table->json('payment_methods')->nullable();
            }
            if (!Schema::hasColumn('influencer_profiles', 'portfolio_images')) {
                $table->json('portfolio_images')->nullable();
            }
            if (!Schema::hasColumn('influencer_profiles', 'portfolio_videos')) {
                $table->json('portfolio_videos')->nullable();
            }
            if (!Schema::hasColumn('influencer_profiles', 'case_studies')) {
                $table->json('case_studies')->nullable();
            }
            if (!Schema::hasColumn('influencer_profiles', 'testimonials')) {
                $table->json('testimonials')->nullable();
            }
            if (!Schema::hasColumn('influencer_profiles', 'media_kit')) {
                $table->json('media_kit')->nullable();
            }
            if (!Schema::hasColumn('influencer_profiles', 'verification_documents')) {
                $table->json('verification_documents')->nullable();
            }
            if (!Schema::hasColumn('influencer_profiles', 'social_proof')) {
                $table->json('social_proof')->nullable();
            }
            if (!Schema::hasColumn('influencer_profiles', 'trust_score')) {
                $table->integer('trust_score')->nullable();
            }
            if (!Schema::hasColumn('influencer_profiles', 'is_featured')) {
                $table->boolean('is_featured')->default(false);
            }
            if (!Schema::hasColumn('influencer_profiles', 'is_premium')) {
                $table->boolean('is_premium')->default(false);
            }
            if (!Schema::hasColumn('influencer_profiles', 'accepts_direct_messages')) {
                $table->boolean('accepts_direct_messages')->default(true);
            }
            if (!Schema::hasColumn('influencer_profiles', 'show_contact_info')) {
                $table->boolean('show_contact_info')->default(true);
            }
            if (!Schema::hasColumn('influencer_profiles', 'show_rates')) {
                $table->boolean('show_rates')->default(false);
            }
            if (!Schema::hasColumn('influencer_profiles', 'privacy_settings')) {
                $table->json('privacy_settings')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('influencer_profiles', function (Blueprint $table) {
            $table->dropColumn([
                'target_audience', 'audience_locations', 'business_email', 'business_phone',
                'manager_name', 'manager_email', 'manager_phone', 'agency_name', 'agency_contact',
                'has_manager', 'has_agency', 'rate_per_campaign', 'payment_methods',
                'portfolio_images', 'portfolio_videos', 'case_studies', 'testimonials',
                'media_kit', 'verification_documents', 'social_proof', 'trust_score',
                'is_featured', 'is_premium', 'accepts_direct_messages', 'show_contact_info',
                'show_rates', 'privacy_settings'
            ]);
        });
    }
};