<?php

namespace App\Services;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class NotificationService
{
    /**
     * Create a new notification.
     */
    public static function create(
        User $user,
        string $type,
        string $title,
        string $message,
        array $data = [],
        ?string $actionUrl = null,
        ?string $actionText = null,
        bool $sendEmail = true
    ): Notification {
        $notification = Notification::create([
            'user_id' => $user->id,
            'type' => $type,
            'title' => $title,
            'message' => $message,
            'data' => $data,
            'action_url' => $actionUrl,
            'action_text' => $actionText,
        ]);

        // Send email notification if requested
        if ($sendEmail) {
            self::sendEmailNotification($notification);
        }

        return $notification;
    }

    /**
     * Send email notification.
     */
    public static function sendEmailNotification(Notification $notification): void
    {
        try {
            $user = $notification->user;
            
            // Check if user has email notifications enabled
            if (!$user->email_notifications_enabled ?? true) {
                return;
            }

            Mail::send('emails.notification', [
                'notification' => $notification,
                'user' => $user,
            ], function ($message) use ($user, $notification) {
                $message->to($user->email, $user->name)
                        ->subject($notification->title);
            });

            $notification->markEmailAsSent();
            
        } catch (\Exception $e) {
            Log::error('Failed to send email notification', [
                'notification_id' => $notification->id,
                'user_id' => $notification->user_id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Create service-related notifications.
     */
    public static function serviceCreated(User $user, $service): void
    {
        self::create(
            $user,
            'service_created',
            'Service Created Successfully',
            "Your service '{$service->service_name}' has been created and is now active.",
            ['service_id' => $service->id, 'service_name' => $service->service_name],
            route('influencer.services.show', $service),
            'View Service'
        );
    }

    public static function serviceUpdated(User $user, $service): void
    {
        self::create(
            $user,
            'service_updated',
            'Service Updated',
            "Your service '{$service->service_name}' has been updated successfully.",
            ['service_id' => $service->id, 'service_name' => $service->service_name],
            route('influencer.services.show', $service),
            'View Service'
        );
    }

    public static function serviceDeleted(User $user, string $serviceName): void
    {
        self::create(
            $user,
            'service_deleted',
            'Service Deleted',
            "Your service '{$serviceName}' has been deleted.",
            ['service_name' => $serviceName]
        );
    }

    /**
     * Create package-related notifications.
     */
    public static function packageCreated(User $user, $package): void
    {
        self::create(
            $user,
            'package_created',
            'Package Created Successfully',
            "Your package '{$package->package_name}' has been created and is now active.",
            ['package_id' => $package->id, 'package_name' => $package->package_name],
            route('influencer.packages.show', $package),
            'View Package'
        );
    }

    public static function packageUpdated(User $user, $package): void
    {
        self::create(
            $user,
            'package_updated',
            'Package Updated',
            "Your package '{$package->package_name}' has been updated successfully.",
            ['package_id' => $package->id, 'package_name' => $package->package_name],
            route('influencer.packages.show', $package),
            'View Package'
        );
    }

    public static function packageDeleted(User $user, string $packageName): void
    {
        self::create(
            $user,
            'package_deleted',
            'Package Deleted',
            "Your package '{$packageName}' has been deleted.",
            ['package_name' => $packageName]
        );
    }

    /**
     * Create collaboration-related notifications.
     */
    public static function collaborationCreated(User $user, $collaboration): void
    {
        self::create(
            $user,
            'collaboration_created',
            'Collaboration Created Successfully',
            "Your collaboration '{$collaboration->title}' has been created.",
            ['collaboration_id' => $collaboration->id, 'collaboration_title' => $collaboration->title],
            route('influencer.collaborations.show', $collaboration),
            'View Collaboration'
        );
    }

    public static function collaborationUpdated(User $user, $collaboration): void
    {
        self::create(
            $user,
            'collaboration_updated',
            'Collaboration Updated',
            "Your collaboration '{$collaboration->title}' has been updated.",
            ['collaboration_id' => $collaboration->id, 'collaboration_title' => $collaboration->title],
            route('influencer.collaborations.show', $collaboration),
            'View Collaboration'
        );
    }

    public static function collaborationDeleted(User $user, string $collaborationTitle): void
    {
        self::create(
            $user,
            'collaboration_deleted',
            'Collaboration Deleted',
            "Your collaboration '{$collaborationTitle}' has been deleted.",
            ['collaboration_title' => $collaborationTitle]
        );
    }

    /**
     * Create user-related notifications.
     */
    public static function userCreated(User $admin, User $newUser): void
    {
        self::create(
            $admin,
            'user_created',
            'New User Created',
            "A new user '{$newUser->name}' has been created successfully.",
            ['new_user_id' => $newUser->id, 'new_user_name' => $newUser->name],
            route('admin.users.show', $newUser),
            'View User'
        );
    }

    public static function userUpdated(User $admin, User $updatedUser): void
    {
        self::create(
            $admin,
            'user_updated',
            'User Updated',
            "User '{$updatedUser->name}' has been updated successfully.",
            ['user_id' => $updatedUser->id, 'user_name' => $updatedUser->name],
            route('admin.users.show', $updatedUser),
            'View User'
        );
    }

    public static function roleAssigned(User $admin, User $user, string $roleName): void
    {
        self::create(
            $admin,
            'role_assigned',
            'Role Assigned',
            "Role '{$roleName}' has been assigned to user '{$user->name}'.",
            ['user_id' => $user->id, 'user_name' => $user->name, 'role_name' => $roleName],
            route('admin.users.show', $user),
            'View User'
        );

        // Also notify the user
        self::create(
            $user,
            'role_assigned',
            'Role Assigned',
            "You have been assigned the '{$roleName}' role.",
            ['role_name' => $roleName],
            route('profile.show', $user),
            'View Profile',
            false // Don't send email to user about role assignment
        );
    }

    public static function roleRemoved(User $admin, User $user, string $roleName): void
    {
        self::create(
            $admin,
            'role_removed',
            'Role Removed',
            "Role '{$roleName}' has been removed from user '{$user->name}'.",
            ['user_id' => $user->id, 'user_name' => $user->name, 'role_name' => $roleName],
            route('admin.users.show', $user),
            'View User'
        );
    }

    /**
     * Create profile-related notifications.
     */
    public static function profileUpdated(User $user): void
    {
        self::create(
            $user,
            'profile_updated',
            'Profile Updated',
            'Your profile has been updated successfully.',
            [],
            route('profile.show', $user),
            'View Profile'
        );
    }

    /**
     * Create settings-related notifications.
     */
    public static function settingsUpdated(User $user): void
    {
        self::create(
            $user,
            'settings_updated',
            'Settings Updated',
            'Your settings have been updated successfully.',
            [],
            route('admin.settings'),
            'View Settings'
        );
    }

    /**
     * Create system notifications.
     */
    public static function systemAlert(User $user, string $title, string $message): void
    {
        self::create(
            $user,
            'system_alert',
            $title,
            $message,
            [],
            null,
            null,
            true // Always send email for system alerts
        );
    }

    public static function success(User $user, string $title, string $message, ?string $actionUrl = null, ?string $actionText = null): void
    {
        self::create(
            $user,
            'success',
            $title,
            $message,
            [],
            $actionUrl,
            $actionText
        );
    }

    public static function warning(User $user, string $title, string $message, ?string $actionUrl = null, ?string $actionText = null): void
    {
        self::create(
            $user,
            'warning',
            $title,
            $message,
            [],
            $actionUrl,
            $actionText
        );
    }

    public static function error(User $user, string $title, string $message, ?string $actionUrl = null, ?string $actionText = null): void
    {
        self::create(
            $user,
            'error',
            $title,
            $message,
            [],
            $actionUrl,
            $actionText
        );
    }

    /**
     * Get unread notifications count for user.
     */
    public static function getUnreadCount(User $user): int
    {
        return Notification::where('user_id', $user->id)
                          ->where('is_read', false)
                          ->count();
    }

    /**
     * Get recent notifications for user.
     */
    public static function getRecentNotifications(User $user, int $limit = 10): \Illuminate\Database\Eloquent\Collection
    {
        return Notification::where('user_id', $user->id)
                          ->orderBy('created_at', 'desc')
                          ->limit($limit)
                          ->get();
    }

    /**
     * Mark all notifications as read for user.
     */
    public static function markAllAsRead(User $user): void
    {
        Notification::where('user_id', $user->id)
                   ->where('is_read', false)
                   ->update([
                       'is_read' => true,
                       'read_at' => now(),
                   ]);
    }

    /**
     * Delete old notifications (older than specified days).
     */
    public static function cleanupOldNotifications(int $days = 30): int
    {
        return Notification::where('created_at', '<', now()->subDays($days))
                          ->delete();
    }
}
