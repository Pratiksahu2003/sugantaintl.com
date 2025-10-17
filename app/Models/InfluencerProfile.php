<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    ];

    protected $casts = [
        'social_platforms' => 'array',
        'engagement_stats' => 'array',
        'content_categories' => 'array',
        'rate_per_post' => 'decimal:2',
        'rate_per_story' => 'decimal:2',
        'rate_per_video' => 'decimal:2',
        'availability' => 'array',
        'collaboration_preferences' => 'array',
        'is_verified' => 'boolean',
        'is_available_for_collaboration' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
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
}
