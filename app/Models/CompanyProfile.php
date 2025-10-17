<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanyProfile extends Model
{
    protected $fillable = [
        'user_id',
        'company_name',
        'legal_name',
        'registration_number',
        'tax_id',
        'description',
        'logo',
        'cover_image',
        'website',
        'industry',
        'company_size',
        'founded_year',
        'headquarters',
        'contact_info',
        'social_media',
        'brand_values',
        'target_audience',
        'marketing_preferences',
        'budget_range_min',
        'budget_range_max',
        'currency',
        'is_verified',
        'is_active',
    ];

    protected $casts = [
        'contact_info' => 'array',
        'social_media' => 'array',
        'brand_values' => 'array',
        'target_audience' => 'array',
        'marketing_preferences' => 'array',
        'budget_range_min' => 'decimal:2',
        'budget_range_max' => 'decimal:2',
        'is_verified' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getLogoUrlAttribute(): string
    {
        return $this->logo ? asset('storage/' . $this->logo) : asset('images/default-company.png');
    }

    public function getCoverImageUrlAttribute(): string
    {
        return $this->cover_image ? asset('storage/' . $this->cover_image) : asset('images/default-cover.jpg');
    }

    public function getDisplayNameAttribute(): string
    {
        return $this->company_name ?: $this->user->name;
    }
}
