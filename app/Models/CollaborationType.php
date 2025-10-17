<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CollaborationType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'color',
        'requirements',
        'deliverables',
        'pricing_models',
        'duration_options',
        'platforms',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'requirements' => 'array',
        'deliverables' => 'array',
        'pricing_models' => 'array',
        'duration_options' => 'array',
        'platforms' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Get the collaborations for this type.
     */
    public function collaborations(): HasMany
    {
        return $this->hasMany(InfluencerCollaboration::class);
    }

    /**
     * Get collaboration types.
     */
    public static function getTypes(): array
    {
        return [
            'sponsored_post' => 'Sponsored Post',
            'product_review' => 'Product Review',
            'brand_ambassador' => 'Brand Ambassador',
            'event_appearance' => 'Event Appearance',
            'content_creation' => 'Content Creation',
            'social_media_takeover' => 'Social Media Takeover',
            'influencer_collaboration' => 'Influencer Collaboration',
            'affiliate_marketing' => 'Affiliate Marketing',
            'gift_collaboration' => 'Gift Collaboration',
            'paid_partnership' => 'Paid Partnership',
            'brand_campaign' => 'Brand Campaign',
            'product_launch' => 'Product Launch',
            'seasonal_campaign' => 'Seasonal Campaign',
            'lifestyle_content' => 'Lifestyle Content',
            'educational_content' => 'Educational Content',
            'entertainment_content' => 'Entertainment Content',
        ];
    }

    /**
     * Get collaboration modes.
     */
    public static function getModes(): array
    {
        return [
            'paid' => 'Paid Collaboration',
            'gifted' => 'Gifted Product',
            'exchange' => 'Product Exchange',
            'free' => 'Free Collaboration',
        ];
    }

    /**
     * Get collaboration statuses.
     */
    public static function getStatuses(): array
    {
        return [
            'open' => 'Open for Applications',
            'in_progress' => 'In Progress',
            'completed' => 'Completed',
            'cancelled' => 'Cancelled',
            'paused' => 'Paused',
        ];
    }

    /**
     * Get pricing models.
     */
    public static function getPricingModels(): array
    {
        return [
            'fixed' => 'Fixed Price',
            'per_post' => 'Per Post',
            'per_month' => 'Per Month',
            'per_campaign' => 'Per Campaign',
            'per_week' => 'Per Week',
            'per_day' => 'Per Day',
            'hourly' => 'Hourly Rate',
            'commission' => 'Commission Based',
        ];
    }

    /**
     * Get duration options.
     */
    public static function getDurationOptions(): array
    {
        return [
            '1_day' => '1 Day',
            '3_days' => '3 Days',
            '1_week' => '1 Week',
            '2_weeks' => '2 Weeks',
            '1_month' => '1 Month',
            '2_months' => '2 Months',
            '3_months' => '3 Months',
            '6_months' => '6 Months',
            '1_year' => '1 Year',
            'ongoing' => 'Ongoing',
        ];
    }

    /**
     * Get social platforms.
     */
    public static function getPlatforms(): array
    {
        return [
            'instagram' => 'Instagram',
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            'tiktok' => 'TikTok',
            'youtube' => 'YouTube',
            'linkedin' => 'LinkedIn',
            'pinterest' => 'Pinterest',
            'snapchat' => 'Snapchat',
            'twitch' => 'Twitch',
            'blog' => 'Blog/Website',
        ];
    }

    /**
     * Scope for active types.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for ordered types.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }
}