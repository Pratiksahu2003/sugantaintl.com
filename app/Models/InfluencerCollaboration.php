<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InfluencerCollaboration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'collaboration_type_id',
        'title',
        'description',
        'brief',
        'status',
        'collaboration_mode',
        'budget_min',
        'budget_max',
        'currency',
        'pricing_details',
        'deliverables',
        'requirements',
        'timeline',
        'social_platforms',
        'target_audience',
        'content_guidelines',
        'brand_guidelines',
        'hashtags',
        'mentions',
        'exclusivity_terms',
        'usage_rights',
        'revision_policy',
        'cancellation_policy',
        'payment_terms',
        'contract_terms',
        'start_date',
        'end_date',
        'deadline',
        'duration_days',
        'is_featured',
        'is_urgent',
        'requires_approval',
        'is_exclusive',
        'tags',
        'gallery_images',
        'thumbnail_image',
        'testimonials',
        'case_studies',
        'additional_info',
    ];

    protected $casts = [
        'pricing_details' => 'array',
        'deliverables' => 'array',
        'requirements' => 'array',
        'timeline' => 'array',
        'social_platforms' => 'array',
        'target_audience' => 'array',
        'content_guidelines' => 'array',
        'brand_guidelines' => 'array',
        'hashtags' => 'array',
        'mentions' => 'array',
        'exclusivity_terms' => 'array',
        'usage_rights' => 'array',
        'revision_policy' => 'array',
        'cancellation_policy' => 'array',
        'payment_terms' => 'array',
        'contract_terms' => 'array',
        'tags' => 'array',
        'gallery_images' => 'array',
        'testimonials' => 'array',
        'case_studies' => 'array',
        'additional_info' => 'array',
        'budget_min' => 'decimal:2',
        'budget_max' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_urgent' => 'boolean',
        'requires_approval' => 'boolean',
        'is_exclusive' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
        'deadline' => 'date',
    ];

    /**
     * Get the user that owns the collaboration.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the collaboration type.
     */
    public function collaborationType(): BelongsTo
    {
        return $this->belongsTo(CollaborationType::class);
    }

    /**
     * Get the influencer profile for this collaboration.
     */
    public function influencerProfile(): BelongsTo
    {
        return $this->belongsTo(InfluencerProfile::class, 'user_id', 'user_id');
    }

    /**
     * Get the thumbnail image URL.
     */
    public function getThumbnailUrlAttribute(): ?string
    {
        if ($this->thumbnail_image) {
            return asset('storage/' . $this->thumbnail_image);
        }
        return null;
    }

    /**
     * Get the gallery images URLs.
     */
    public function getGalleryUrlsAttribute(): array
    {
        if ($this->gallery_images) {
            return array_map(function ($image) {
                return asset('storage/' . $image);
            }, $this->gallery_images);
        }
        return [];
    }

    /**
     * Get formatted budget range.
     */
    public function getFormattedBudgetAttribute(): string
    {
        if ($this->budget_min && $this->budget_max) {
            return $this->currency . ' ' . number_format($this->budget_min, 0) . ' - ' . number_format($this->budget_max, 0);
        } elseif ($this->budget_min) {
            return $this->currency . ' ' . number_format($this->budget_min, 0) . '+';
        } elseif ($this->budget_max) {
            return 'Up to ' . $this->currency . ' ' . number_format($this->budget_max, 0);
        }
        return 'Budget not specified';
    }

    /**
     * Get collaboration modes.
     */
    public static function getModes(): array
    {
        return CollaborationType::getModes();
    }

    /**
     * Get collaboration statuses.
     */
    public static function getStatuses(): array
    {
        return CollaborationType::getStatuses();
    }

    /**
     * Get social platforms.
     */
    public static function getPlatforms(): array
    {
        return CollaborationType::getPlatforms();
    }

    /**
     * Scope for open collaborations.
     */
    public function scopeOpen($query)
    {
        return $query->where('status', 'open');
    }

    /**
     * Scope for featured collaborations.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope for urgent collaborations.
     */
    public function scopeUrgent($query)
    {
        return $query->where('is_urgent', true);
    }

    /**
     * Scope for collaborations by type.
     */
    public function scopeByType($query, $typeId)
    {
        return $query->where('collaboration_type_id', $typeId);
    }

    /**
     * Scope for collaborations by mode.
     */
    public function scopeByMode($query, $mode)
    {
        return $query->where('collaboration_mode', $mode);
    }

    /**
     * Scope for collaborations by status.
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope for collaborations within budget range.
     */
    public function scopeWithinBudget($query, $minBudget, $maxBudget = null)
    {
        if ($maxBudget) {
            return $query->where(function ($q) use ($minBudget, $maxBudget) {
                $q->whereBetween('budget_min', [$minBudget, $maxBudget])
                  ->orWhereBetween('budget_max', [$minBudget, $maxBudget])
                  ->orWhere(function ($subQ) use ($minBudget, $maxBudget) {
                      $subQ->where('budget_min', '<=', $minBudget)
                           ->where('budget_max', '>=', $maxBudget);
                  });
            });
        } else {
            return $query->where('budget_max', '>=', $minBudget);
        }
    }
}