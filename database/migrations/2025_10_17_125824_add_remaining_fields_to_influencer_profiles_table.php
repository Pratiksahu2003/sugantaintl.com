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
            // Add remaining fields that weren't added in the previous migration
            $table->json('specializations')->nullable(); // Array of specializations
            
            // Social media links - comprehensive list
            $table->string('instagram_url')->nullable();
            $table->string('instagram_handle')->nullable();
            $table->integer('instagram_followers')->nullable();
            $table->string('tiktok_url')->nullable();
            $table->string('tiktok_handle')->nullable();
            $table->integer('tiktok_followers')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('youtube_handle')->nullable();
            $table->integer('youtube_subscribers')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('twitter_handle')->nullable();
            $table->integer('twitter_followers')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('facebook_handle')->nullable();
            $table->integer('facebook_followers')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('linkedin_handle')->nullable();
            $table->integer('linkedin_followers')->nullable();
            $table->string('snapchat_url')->nullable();
            $table->string('snapchat_handle')->nullable();
            $table->integer('snapchat_followers')->nullable();
            $table->string('pinterest_url')->nullable();
            $table->string('pinterest_handle')->nullable();
            $table->integer('pinterest_followers')->nullable();
            $table->string('twitch_url')->nullable();
            $table->string('twitch_handle')->nullable();
            $table->integer('twitch_followers')->nullable();
            $table->string('discord_url')->nullable();
            $table->string('discord_handle')->nullable();
            $table->string('telegram_url')->nullable();
            $table->string('telegram_handle')->nullable();
            $table->string('reddit_url')->nullable();
            $table->string('reddit_handle')->nullable();
            $table->string('clubhouse_url')->nullable();
            $table->string('clubhouse_handle')->nullable();
            $table->string('spotify_url')->nullable();
            $table->string('spotify_handle')->nullable();
            $table->string('soundcloud_url')->nullable();
            $table->string('soundcloud_handle')->nullable();
            $table->string('behance_url')->nullable();
            $table->string('behance_handle')->nullable();
            $table->string('dribbble_url')->nullable();
            $table->string('dribbble_handle')->nullable();
            $table->string('github_url')->nullable();
            $table->string('github_handle')->nullable();
            $table->string('medium_url')->nullable();
            $table->string('medium_handle')->nullable();
            $table->string('substack_url')->nullable();
            $table->string('substack_handle')->nullable();
            $table->string('patreon_url')->nullable();
            $table->string('patreon_handle')->nullable();
            $table->string('onlyfans_url')->nullable();
            $table->string('onlyfans_handle')->nullable();
            $table->string('website_url')->nullable();
            $table->string('blog_url')->nullable();
            $table->string('podcast_url')->nullable();
            $table->string('newsletter_url')->nullable();
            
            // Professional information
            $table->string('profession')->nullable(); // e.g., "Content Creator", "Digital Marketer"
            $table->string('company_name')->nullable();
            $table->string('company_position')->nullable();
            $table->text('bio_extended')->nullable(); // Longer bio
            $table->text('mission_statement')->nullable();
            $table->text('values')->nullable();
            $table->json('achievements')->nullable(); // Array of achievements
            $table->json('awards')->nullable(); // Array of awards
            $table->json('certifications')->nullable(); // Array of certifications
            $table->json('education')->nullable(); // Array of education
            $table->json('work_experience')->nullable(); // Array of work experience
            
            // Content and engagement metrics
            $table->json('content_types')->nullable(); // e.g., ['photos', 'videos', 'stories', 'reels']
            $table->json('posting_schedule')->nullable(); // Posting frequency and times
            $table->decimal('average_engagement_rate', 5, 2)->nullable(); // Percentage
            $table->integer('average_likes_per_post')->nullable();
            $table->integer('average_comments_per_post')->nullable();
            $table->integer('average_shares_per_post')->nullable();
            $table->decimal('average_video_views', 10, 0)->nullable();
            $table->decimal('average_story_views', 10, 0)->nullable();
            
            // Collaboration preferences
            $table->json('collaboration_types')->nullable(); // Types of collaborations interested in
            $table->json('brand_preferences')->nullable(); // Preferred brand types
            $table->json('content_preferences')->nullable(); // Content creation preferences
            $table->json('budget_range')->nullable(); // Budget range for collaborations
            $table->boolean('accepts_gifted_collaborations')->default(true);
            $table->boolean('accepts_paid_collaborations')->default(true);
            $table->boolean('accepts_brand_ambassador')->default(false);
            $table->boolean('accepts_event_appearances')->default(false);
            $table->boolean('accepts_product_reviews')->default(true);
            $table->boolean('accepts_sponsored_content')->default(true);
            
            // Geographic and demographic information
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('timezone')->nullable();
            $table->json('languages')->nullable(); // Array of languages spoken
            $table->string('primary_language')->nullable();
            $table->json('target_audience')->nullable(); // Demographics of audience
            $table->json('audience_locations')->nullable(); // Geographic distribution of audience
            
            // Contact and business information
            $table->string('business_email')->nullable();
            $table->string('business_phone')->nullable();
            $table->string('manager_name')->nullable();
            $table->string('manager_email')->nullable();
            $table->string('manager_phone')->nullable();
            $table->string('agency_name')->nullable();
            $table->string('agency_contact')->nullable();
            $table->boolean('has_manager')->default(false);
            $table->boolean('has_agency')->default(false);
            
            // Availability and rates
            $table->decimal('rate_per_campaign', 10, 2)->nullable();
            $table->json('payment_methods')->nullable(); // Accepted payment methods
            
            // Portfolio and media
            $table->json('portfolio_images')->nullable(); // Array of portfolio image paths
            $table->json('portfolio_videos')->nullable(); // Array of portfolio video paths
            $table->json('case_studies')->nullable(); // Array of case study data
            $table->json('testimonials')->nullable(); // Array of client testimonials
            $table->json('media_kit')->nullable(); // Media kit information
            
            // Verification and credibility
            $table->json('verification_documents')->nullable(); // Verification documents
            $table->json('social_proof')->nullable(); // Social proof elements
            $table->integer('trust_score')->nullable(); // Trust score out of 100
            
            // Additional settings
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_premium')->default(false);
            $table->boolean('accepts_direct_messages')->default(true);
            $table->boolean('show_contact_info')->default(true);
            $table->boolean('show_rates')->default(false);
            $table->json('privacy_settings')->nullable(); // Privacy preferences
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('influencer_profiles', function (Blueprint $table) {
            $table->dropColumn([
                'specializations',
                'instagram_url', 'instagram_handle', 'instagram_followers',
                'tiktok_url', 'tiktok_handle', 'tiktok_followers',
                'youtube_url', 'youtube_handle', 'youtube_subscribers',
                'twitter_url', 'twitter_handle', 'twitter_followers',
                'facebook_url', 'facebook_handle', 'facebook_followers',
                'linkedin_url', 'linkedin_handle', 'linkedin_followers',
                'snapchat_url', 'snapchat_handle', 'snapchat_followers',
                'pinterest_url', 'pinterest_handle', 'pinterest_followers',
                'twitch_url', 'twitch_handle', 'twitch_followers',
                'discord_url', 'discord_handle', 'telegram_url', 'telegram_handle',
                'reddit_url', 'reddit_handle', 'clubhouse_url', 'clubhouse_handle',
                'spotify_url', 'spotify_handle', 'soundcloud_url', 'soundcloud_handle',
                'behance_url', 'behance_handle', 'dribbble_url', 'dribbble_handle',
                'github_url', 'github_handle', 'medium_url', 'medium_handle',
                'substack_url', 'substack_handle', 'patreon_url', 'patreon_handle',
                'onlyfans_url', 'onlyfans_handle', 'website_url', 'blog_url',
                'podcast_url', 'newsletter_url', 'profession', 'company_name', 'company_position',
                'bio_extended', 'mission_statement', 'values', 'achievements', 'awards',
                'certifications', 'education', 'work_experience', 'content_types',
                'posting_schedule', 'average_engagement_rate', 'average_likes_per_post',
                'average_comments_per_post', 'average_shares_per_post', 'average_video_views',
                'average_story_views', 'collaboration_types', 'brand_preferences',
                'content_preferences', 'budget_range', 'accepts_gifted_collaborations',
                'accepts_paid_collaborations', 'accepts_brand_ambassador', 'accepts_event_appearances',
                'accepts_product_reviews', 'accepts_sponsored_content', 'country', 'state',
                'city', 'timezone', 'languages', 'primary_language', 'target_audience',
                'audience_locations', 'business_email', 'business_phone', 'manager_name',
                'manager_email', 'manager_phone', 'agency_name', 'agency_contact',
                'has_manager', 'has_agency', 'rate_per_campaign', 'payment_methods',
                'portfolio_images', 'portfolio_videos', 'case_studies', 'testimonials',
                'media_kit', 'verification_documents', 'social_proof',
                'trust_score', 'is_featured', 'is_premium', 'accepts_direct_messages',
                'show_contact_info', 'show_rates', 'privacy_settings'
            ]);
        });
    }
};