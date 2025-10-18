<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InfluencerPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'package_name',
        'description',
        'package_type',
        'category',
        'price',
        'currency',
        'pricing_model',
        'included_services',
        'deliverables',
        'duration_days',
        'post_count',
        'story_count',
        'reel_count',
        'social_platforms',
        'target_audience',
        'requirements',
        'add_ons',
        'pricing_breakdown',
        'is_active',
        'is_featured',
        'is_custom',
        'tags',
        'gallery_images',
        'thumbnail_image',
        'testimonials',
        'case_studies',
        'additional_info',
    ];

    protected $casts = [
        'included_services' => 'array',
        'deliverables' => 'array',
        'social_platforms' => 'array',
        'target_audience' => 'array',
        'requirements' => 'array',
        'add_ons' => 'array',
        'pricing_breakdown' => 'array',
        'tags' => 'array',
        'gallery_images' => 'array',
        'testimonials' => 'array',
        'case_studies' => 'array',
        'additional_info' => 'array',
        'price' => 'decimal:2',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'is_custom' => 'boolean',
    ];

    /**
     * Get the thumbnail image URL.
     */
    public function getThumbnailUrlAttribute(): ?string
    {
        return $this->thumbnail_image ? asset('storage/' . $this->thumbnail_image) : null;
    }

    /**
     * Get the gallery image URLs.
     */
    public function getGalleryUrlsAttribute(): array
    {
        if (!$this->gallery_images) {
            return [];
        }

        return array_map(function ($image) {
            return asset('storage/' . $image);
        }, $this->gallery_images);
    }

    /**
     * Get the user that owns the package.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the influencer profile for this package.
     */
    public function influencerProfile(): BelongsTo
    {
        return $this->belongsTo(InfluencerProfile::class, 'user_id', 'user_id');
    }

    /**
     * Get formatted price with currency.
     */
    public function getFormattedPriceAttribute(): string
    {
        return $this->currency . ' ' . number_format($this->price, 2);
    }

    /**
     * Get package types.
     */
    public static function getPackageTypes(): array
    {
        return [
            'basic' => 'Basic Package',
            'premium' => 'Premium Package',
            'enterprise' => 'Enterprise Package',
            'custom' => 'Custom Package',
            'starter' => 'Starter Package',
            'professional' => 'Professional Package',
            'vip' => 'VIP Package',
        ];
    }

    /**
     * Get package categories.
     */
    public static function getCategories(): array
    {
        return [
            'social_media' => 'Social Media Marketing',
            'content_creation' => 'Content Creation',
            'brand_ambassador' => 'Brand Ambassador',
            'event_promotion' => 'Event Promotion',
            'product_launch' => 'Product Launch',
            'seasonal_campaign' => 'Seasonal Campaign',
            'influencer_collaboration' => 'Influencer Collaboration',
            'lifestyle_branding' => 'Lifestyle Branding',
            'fashion_campaign' => 'Fashion Campaign',
            'fitness_wellness' => 'Fitness & Wellness',
            'food_beverage' => 'Food & Beverage',
            'travel_tourism' => 'Travel & Tourism',
            'technology' => 'Technology',
            'gaming' => 'Gaming',
            'education' => 'Education',
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
        ];
    }

    /**
     * Scope for active packages.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for featured packages.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope for custom packages.
     */
    public function scopeCustom($query)
    {
        return $query->where('is_custom', true);
    }

    /**
     * Scope for packages by type.
     */
    public function scopeByType($query, $type)
    {
        return $query->where('package_type', $type);
    }

    /**
     * Scope for packages by category.
     */
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Scope for packages by pricing model.
     */
    public function scopeByPricingModel($query, $model)
    {
        return $query->where('pricing_model', $model);
    }
}