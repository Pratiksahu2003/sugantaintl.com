<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class NotificationController extends Controller
{
    /**
     * Display a listing of notifications.
     */
    public function index(Request $request): View
    {
        $user = $request->user();
        
        $notifications = Notification::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('notifications.index', compact('notifications'));
    }

    /**
     * Get recent notifications for the notification bell.
     */
    public function recent(Request $request): JsonResponse
    {
        $user = $request->user();
        $notifications = NotificationService::getRecentNotifications($user, 10);
        
        return response()->json([
            'notifications' => $notifications->map(function ($notification) {
                return [
                    'id' => $notification->id,
                    'title' => $notification->title,
                    'message' => $notification->message,
                    'type' => $notification->type,
                    'icon' => $notification->icon,
                    'color' => $notification->color,
                    'is_read' => $notification->is_read,
                    'time_ago' => $notification->time_ago,
                    'action_url' => $notification->action_url,
                    'action_text' => $notification->action_text,
                ];
            })
        ]);
    }

    /**
     * Get unread notifications count.
     */
    public function unreadCount(Request $request): JsonResponse
    {
        $user = $request->user();
        $count = NotificationService::getUnreadCount($user);
        
        return response()->json(['count' => $count]);
    }

    /**
     * Mark a specific notification as read.
     */
    public function markAsRead(Request $request, Notification $notification): JsonResponse
    {
        $user = $request->user();
        
        // Ensure the notification belongs to the user
        if ($notification->user_id !== $user->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $notification->markAsRead();
        
        return response()->json(['success' => true]);
    }

    /**
     * Mark all notifications as read for the user.
     */
    public function markAllAsRead(Request $request): JsonResponse
    {
        $user = $request->user();
        NotificationService::markAllAsRead($user);
        
        return response()->json(['success' => true]);
    }

    /**
     * Mark a notification as unread.
     */
    public function markAsUnread(Request $request, Notification $notification): JsonResponse
    {
        $user = $request->user();
        
        // Ensure the notification belongs to the user
        if ($notification->user_id !== $user->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $notification->markAsUnread();
        
        return response()->json(['success' => true]);
    }

    /**
     * Delete a notification.
     */
    public function destroy(Request $request, Notification $notification): JsonResponse
    {
        $user = $request->user();
        
        // Ensure the notification belongs to the user
        if ($notification->user_id !== $user->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $notification->delete();
        
        return response()->json(['success' => true]);
    }

    /**
     * Delete all read notifications for the user.
     */
    public function deleteRead(Request $request): JsonResponse
    {
        $user = $request->user();
        
        Notification::where('user_id', $user->id)
                   ->where('is_read', true)
                   ->delete();
        
        return response()->json(['success' => true]);
    }

    /**
     * Get notifications by type.
     */
    public function byType(Request $request, string $type): JsonResponse
    {
        $user = $request->user();
        
        $notifications = Notification::where('user_id', $user->id)
            ->where('type', $type)
            ->orderBy('created_at', 'desc')
            ->get();
        
        return response()->json([
            'notifications' => $notifications->map(function ($notification) {
                return [
                    'id' => $notification->id,
                    'title' => $notification->title,
                    'message' => $notification->message,
                    'type' => $notification->type,
                    'icon' => $notification->icon,
                    'color' => $notification->color,
                    'is_read' => $notification->is_read,
                    'time_ago' => $notification->time_ago,
                    'action_url' => $notification->action_url,
                    'action_text' => $notification->action_text,
                    'created_at' => $notification->created_at->format('Y-m-d H:i:s'),
                ];
            })
        ]);
    }

    /**
     * Show a specific notification.
     */
    public function show(Request $request, Notification $notification): View
    {
        $user = $request->user();
        
        // Ensure the notification belongs to the user
        if ($notification->user_id !== $user->id) {
            abort(403);
        }

        // Mark as read when viewed
        if (!$notification->is_read) {
            $notification->markAsRead();
        }

        return view('notifications.show', compact('notification'));
    }
}