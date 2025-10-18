<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'title',
        'message',
        'data',
        'action_url',
        'action_text',
        'is_read',
        'email_sent',
        'read_at',
        'email_sent_at',
    ];

    protected $casts = [
        'data' => 'array',
        'is_read' => 'boolean',
        'email_sent' => 'boolean',
        'read_at' => 'datetime',
        'email_sent_at' => 'datetime',
    ];

    /**
     * Get the user that owns the notification.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Mark notification as read.
     */
    public function markAsRead(): void
    {
        $this->update([
            'is_read' => true,
            'read_at' => now(),
        ]);
    }

    /**
     * Mark notification as unread.
     */
    public function markAsUnread(): void
    {
        $this->update([
            'is_read' => false,
            'read_at' => null,
        ]);
    }

    /**
     * Mark email as sent.
     */
    public function markEmailAsSent(): void
    {
        $this->update([
            'email_sent' => true,
            'email_sent_at' => now(),
        ]);
    }

    /**
     * Get formatted time ago.
     */
    public function getTimeAgoAttribute(): string
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * Get notification icon based on type.
     */
    public function getIconAttribute(): string
    {
        return match($this->type) {
            'service_created', 'service_updated' => 'fas fa-cogs',
            'package_created', 'package_updated' => 'fas fa-box',
            'collaboration_created', 'collaboration_updated' => 'fas fa-handshake',
            'user_created', 'user_updated' => 'fas fa-user',
            'role_assigned', 'role_removed' => 'fas fa-user-tag',
            'profile_updated' => 'fas fa-user-edit',
            'settings_updated' => 'fas fa-cog',
            'system_alert' => 'fas fa-exclamation-triangle',
            'success' => 'fas fa-check-circle',
            'warning' => 'fas fa-exclamation-circle',
            'error' => 'fas fa-times-circle',
            'info' => 'fas fa-info-circle',
            default => 'fas fa-bell',
        };
    }

    /**
     * Get notification color based on type.
     */
    public function getColorAttribute(): string
    {
        return match($this->type) {
            'service_created', 'package_created', 'collaboration_created', 'user_created', 'success' => 'success',
            'service_updated', 'package_updated', 'collaboration_updated', 'user_updated', 'profile_updated', 'settings_updated', 'info' => 'info',
            'role_assigned', 'role_removed', 'warning' => 'warning',
            'system_alert', 'error' => 'danger',
            default => 'primary',
        };
    }

    /**
     * Scope for unread notifications.
     */
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    /**
     * Scope for read notifications.
     */
    public function scopeRead($query)
    {
        return $query->where('is_read', true);
    }

    /**
     * Scope for notifications by type.
     */
    public function scopeOfType($query, string $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Scope for recent notifications.
     */
    public function scopeRecent($query, int $days = 7)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }
}