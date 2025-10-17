<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InfluencerCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'color',
        'keywords',
        'subcategories',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'keywords' => 'array',
        'subcategories' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Get the influencer profiles for this category.
     */
    public function influencerProfiles(): HasMany
    {
        return $this->hasMany(InfluencerProfile::class, 'primary_category_id');
    }

    /**
     * Scope a query to only include active categories.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to order by sort order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}