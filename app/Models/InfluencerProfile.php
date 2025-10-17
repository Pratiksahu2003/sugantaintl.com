<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InfluencerProfile extends Model
{
    protected $fillable = [
        'user_id',
        'stage_name',
        'niche',
        'about',
        'profile_image',
        'cover_image',
        'social_platforms',
        'engagement_stats',
        'content_categories',
        'rate_per_post',
        'rate_per_story',
        'rate_per_video',
        'currency',
        'availability',
        'collaboration_preferences',
        'is_verified',
        'is_available_for_collaboration',
        
        // New comprehensive fields
        'primary_category_id',
        'secondary_categories',
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
    ];

    protected $casts = [
        'social_platforms' => 'array',
        'engagement_stats' => 'array',
        'content_categories' => 'array',
        'rate_per_post' => 'decimal:2',
        'rate_per_story' => 'decimal:2',
        'rate_per_video' => 'decimal:2',
        'rate_per_campaign' => 'decimal:2',
        'availability' => 'array',
        'collaboration_preferences' => 'array',
        'is_verified' => 'boolean',
        'is_available_for_collaboration' => 'boolean',
        
        // New comprehensive casts
        'secondary_categories' => 'array',
        'specializations' => 'array',
        'achievements' => 'array',
        'awards' => 'array',
        'certifications' => 'array',
        'education' => 'array',
        'work_experience' => 'array',
        'content_types' => 'array',
        'posting_schedule' => 'array',
        'average_engagement_rate' => 'decimal:2',
        'collaboration_types' => 'array',
        'brand_preferences' => 'array',
        'content_preferences' => 'array',
        'budget_range' => 'array',
        'accepts_gifted_collaborations' => 'boolean',
        'accepts_paid_collaborations' => 'boolean',
        'accepts_brand_ambassador' => 'boolean',
        'accepts_event_appearances' => 'boolean',
        'accepts_product_reviews' => 'boolean',
        'accepts_sponsored_content' => 'boolean',
        'languages' => 'array',
        'target_audience' => 'array',
        'audience_locations' => 'array',
        'has_manager' => 'boolean',
        'has_agency' => 'boolean',
        'payment_methods' => 'array',
        'portfolio_images' => 'array',
        'portfolio_videos' => 'array',
        'case_studies' => 'array',
        'testimonials' => 'array',
        'media_kit' => 'array',
        'verification_documents' => 'array',
        'social_proof' => 'array',
        'is_featured' => 'boolean',
        'is_premium' => 'boolean',
        'accepts_direct_messages' => 'boolean',
        'show_contact_info' => 'boolean',
        'show_rates' => 'boolean',
        'privacy_settings' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function primaryCategory(): BelongsTo
    {
        return $this->belongsTo(InfluencerCategory::class, 'primary_category_id');
    }

    public function services(): HasMany
    {
        return $this->hasMany(InfluencerService::class, 'user_id', 'user_id');
    }

    public function packages(): HasMany
    {
        return $this->hasMany(InfluencerPackage::class, 'user_id', 'user_id');
    }

    public function collaborations(): HasMany
    {
        return $this->hasMany(InfluencerCollaboration::class, 'user_id', 'user_id');
    }

    public function getProfileImageUrlAttribute(): string
    {
        return $this->profile_image ? asset('storage/' . $this->profile_image) : asset('images/default-influencer.png');
    }

    public function getCoverImageUrlAttribute(): string
    {
        return $this->cover_image ? asset('storage/' . $this->cover_image) : asset('images/default-cover.jpg');
    }

    public function getDisplayNameAttribute(): string
    {
        return $this->stage_name ?: $this->user->name;
    }

    /**
     * Get total followers across all platforms.
     */
    public function getTotalFollowersAttribute(): int
    {
        return ($this->instagram_followers ?? 0) +
               ($this->tiktok_followers ?? 0) +
               ($this->youtube_subscribers ?? 0) +
               ($this->twitter_followers ?? 0) +
               ($this->facebook_followers ?? 0) +
               ($this->linkedin_followers ?? 0) +
               ($this->snapchat_followers ?? 0) +
               ($this->pinterest_followers ?? 0) +
               ($this->twitch_followers ?? 0);
    }

    /**
     * Get formatted total followers.
     */
    public function getFormattedTotalFollowersAttribute(): string
    {
        $total = $this->total_followers;
        
        if ($total >= 1000000) {
            return round($total / 1000000, 1) . 'M';
        } elseif ($total >= 1000) {
            return round($total / 1000, 1) . 'K';
        }
        
        return number_format($total);
    }

    /**
     * Get social media links as array.
     */
    public function getSocialLinksAttribute(): array
    {
        $links = [];
        
        $platforms = [
            'instagram' => ['url' => $this->instagram_url, 'handle' => $this->instagram_handle, 'followers' => $this->instagram_followers],
            'tiktok' => ['url' => $this->tiktok_url, 'handle' => $this->tiktok_handle, 'followers' => $this->tiktok_followers],
            'youtube' => ['url' => $this->youtube_url, 'handle' => $this->youtube_handle, 'followers' => $this->youtube_subscribers],
            'twitter' => ['url' => $this->twitter_url, 'handle' => $this->twitter_handle, 'followers' => $this->twitter_followers],
            'facebook' => ['url' => $this->facebook_url, 'handle' => $this->facebook_handle, 'followers' => $this->facebook_followers],
            'linkedin' => ['url' => $this->linkedin_url, 'handle' => $this->linkedin_handle, 'followers' => $this->linkedin_followers],
            'snapchat' => ['url' => $this->snapchat_url, 'handle' => $this->snapchat_handle, 'followers' => $this->snapchat_followers],
            'pinterest' => ['url' => $this->pinterest_url, 'handle' => $this->pinterest_handle, 'followers' => $this->pinterest_followers],
            'twitch' => ['url' => $this->twitch_url, 'handle' => $this->twitch_handle, 'followers' => $this->twitch_followers],
        ];
        
        foreach ($platforms as $platform => $data) {
            if ($data['url'] || $data['handle']) {
                $links[$platform] = $data;
            }
        }
        
        return $links;
    }

    /**
     * Check if profile is complete.
     */
    public function getIsCompleteAttribute(): bool
    {
        $requiredFields = ['bio_extended', 'primary_category_id', 'instagram_handle'];
        
        foreach ($requiredFields as $field) {
            if (empty($this->$field)) {
                return false;
            }
        }
        
        return true;
    }

    /**
     * Get profile completion percentage.
     */
    public function getCompletionPercentageAttribute(): int
    {
        $fields = [
            'bio_extended', 'primary_category_id', 'instagram_handle', 'profession',
            'country', 'city', 'website_url', 'portfolio_images'
        ];
        
        $completed = 0;
        foreach ($fields as $field) {
            if (!empty($this->$field)) {
                $completed++;
            }
        }
        
        return round(($completed / count($fields)) * 100);
    }
}
