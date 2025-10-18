<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InfluencerService extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_name',
        'description',
        'category',
        'service_type',
        'base_price',
        'currency',
        'pricing_tiers',
        'deliverables',
        'requirements',
        'delivery_time_days',
        'revision_limit',
        'is_active',
        'is_featured',
        'tags',
        'gallery_images',
        'thumbnail_image',
        'social_platforms',
        'target_audience',
        'additional_info',
    ];

    protected $casts = [
        'pricing_tiers' => 'array',
        'deliverables' => 'array',
        'requirements' => 'array',
        'tags' => 'array',
        'gallery_images' => 'array',
        'social_platforms' => 'array',
        'target_audience' => 'array',
        'additional_info' => 'array',
        'base_price' => 'decimal:2',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
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
     * Get the user that owns the service.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the influencer profile for this service.
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
        return $this->currency . ' ' . number_format($this->base_price, 2);
    }

    /**
     * Get service categories.
     */
    public static function getCategories(): array
    {
        return [
            'content_creation' => 'Content Creation',
            'brand_promotion' => 'Brand Promotion',
            'social_media' => 'Social Media Management',
            'photography' => 'Photography',
            'video_production' => 'Video Production',
            'event_appearance' => 'Event Appearance',
            'product_review' => 'Product Review',
            'lifestyle' => 'Lifestyle Content',
            'fashion' => 'Fashion & Beauty',
            'fitness' => 'Fitness & Wellness',
            'food' => 'Food & Cooking',
            'travel' => 'Travel & Adventure',
            'technology' => 'Technology',
            'gaming' => 'Gaming',
            'education' => 'Education & Learning',
        ];
    }

    /**
     * Get service types.
     */
    public static function getServiceTypes(): array
    {
        return [
            'post' => 'Social Media Post',
            'story' => 'Instagram/Facebook Story',
            'reel' => 'Instagram Reel',
            'video' => 'Video Content',
            'photo_shoot' => 'Photo Shoot',
            'event_appearance' => 'Event Appearance',
            'product_review' => 'Product Review',
            'unboxing' => 'Unboxing Video',
            'tutorial' => 'Tutorial Content',
            'live_stream' => 'Live Stream',
            'collaboration' => 'Collaboration',
            'sponsored_content' => 'Sponsored Content',
        ];
    }

    /**
     * Scope for active services.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for featured services.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope for services by category.
     */
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Scope for services by type.
     */
    public function scopeByType($query, $type)
    {
        return $query->where('service_type', $type);
    }
}