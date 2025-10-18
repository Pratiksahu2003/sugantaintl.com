@extends('layouts.admin')

@section('title', 'Notifications')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Notifications</h1>
        <p>Stay updated with all your dashboard activities</p>
    </div>
    <div class="page-header-actions">
        <button class="btn btn-primary" onclick="markAllAsRead()">
            <i class="fas fa-check-double"></i>
            Mark All Read
        </button>
        <button class="btn btn-secondary" onclick="deleteReadNotifications()">
            <i class="fas fa-trash"></i>
            Delete Read
        </button>
    </div>
</div>

<div class="notification-filters">
    <div class="filter-tabs">
        <button class="filter-tab active" data-filter="all">All</button>
        <button class="filter-tab" data-filter="unread">Unread</button>
        <button class="filter-tab" data-filter="service">Services</button>
        <button class="filter-tab" data-filter="package">Packages</button>
        <button class="filter-tab" data-filter="collaboration">Collaborations</button>
        <button class="filter-tab" data-filter="user">Users</button>
        <button class="filter-tab" data-filter="system">System</button>
    </div>
</div>

<div class="notifications-container">
    @if($notifications->count() > 0)
        <div class="notifications-list">
            @foreach($notifications as $notification)
                <div class="notification-item {{ $notification->is_read ? '' : 'unread' }}" 
                     data-type="{{ $notification->type }}">
                    <div class="notification-content">
                        <div class="notification-icon {{ $notification->color }}">
                            <i class="{{ $notification->icon }}"></i>
                        </div>
                        <div class="notification-details">
                            <div class="notification-title">{{ $notification->title }}</div>
                            <div class="notification-message">{{ $notification->message }}</div>
                            <div class="notification-meta">
                                <span class="notification-time">{{ $notification->time_ago }}</span>
                                @if($notification->action_url && $notification->action_text)
                                    <a href="{{ $notification->action_url }}" class="notification-action">
                                        {{ $notification->action_text }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="notification-actions">
                            @if(!$notification->is_read)
                                <button class="btn btn-sm btn-outline-primary" 
                                        onclick="markAsRead({{ $notification->id }})">
                                    <i class="fas fa-check"></i>
                                </button>
                            @endif
                            <button class="btn btn-sm btn-outline-danger" 
                                    onclick="deleteNotification({{ $notification->id }})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="pagination-container">
            {{ $notifications->links() }}
        </div>
    @else
        <div class="empty-state">
            <div class="empty-state-icon">
                <i class="fas fa-bell-slash"></i>
            </div>
            <h3>No Notifications</h3>
            <p>You don't have any notifications yet. When you perform actions in the dashboard, notifications will appear here.</p>
        </div>
    @endif
</div>

<style>
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid var(--border-color);
}

.page-header-content h1 {
    margin: 0;
    font-size: 1.875rem;
    font-weight: 700;
    color: var(--text-primary);
}

.page-header-content p {
    margin: 0.5rem 0 0 0;
    color: var(--text-secondary);
}

.page-header-actions {
    display: flex;
    gap: 0.75rem;
}

.notification-filters {
    margin-bottom: 2rem;
}

.filter-tabs {
    display: flex;
    gap: 0.5rem;
    border-bottom: 1px solid var(--border-color);
}

.filter-tab {
    background: none;
    border: none;
    padding: 0.75rem 1rem;
    color: var(--text-secondary);
    cursor: pointer;
    border-bottom: 2px solid transparent;
    transition: all 0.2s ease;
    font-weight: 500;
}

.filter-tab:hover {
    color: var(--text-primary);
}

.filter-tab.active {
    color: var(--primary-color);
    border-bottom-color: var(--primary-color);
}

.notifications-container {
    background: var(--content-bg);
    border-radius: 0.5rem;
    border: 1px solid var(--border-color);
    overflow: hidden;
}

.notifications-list {
    max-height: 600px;
    overflow-y: auto;
}

.notification-item {
    padding: 1.5rem;
    border-bottom: 1px solid var(--border-color);
    transition: all 0.2s ease;
    position: relative;
}

.notification-item:last-child {
    border-bottom: none;
}

.notification-item:hover {
    background-color: var(--hover-bg);
}

.notification-item.unread {
    background-color: var(--unread-bg, #f8f9ff);
}

.notification-item.unread::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 4px;
    background: var(--primary-color);
}

.notification-content {
    display: flex;
    gap: 1rem;
    align-items: flex-start;
}

.notification-icon {
    flex-shrink: 0;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
}

.notification-icon.success {
    background: var(--success-light, #d4edda);
    color: var(--success-color);
}

.notification-icon.info {
    background: var(--info-light, #d1ecf1);
    color: var(--info-color);
}

.notification-icon.warning {
    background: var(--warning-light, #fff3cd);
    color: var(--warning-color);
}

.notification-icon.danger {
    background: var(--danger-light, #f8d7da);
    color: var(--danger-color);
}

.notification-icon.primary {
    background: var(--primary-light, #e3f2fd);
    color: var(--primary-color);
}

.notification-details {
    flex: 1;
    min-width: 0;
}

.notification-title {
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
    font-size: 1rem;
}

.notification-message {
    color: var(--text-secondary);
    font-size: 0.875rem;
    line-height: 1.5;
    margin-bottom: 0.75rem;
}

.notification-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 1rem;
}

.notification-time {
    color: var(--text-muted);
    font-size: 0.75rem;
}

.notification-action {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 500;
    font-size: 0.875rem;
    transition: color 0.2s ease;
}

.notification-action:hover {
    color: var(--primary-hover);
}

.notification-actions {
    display: flex;
    gap: 0.5rem;
    flex-shrink: 0;
}

.pagination-container {
    padding: 1.5rem;
    border-top: 1px solid var(--border-color);
    background: var(--sidebar-bg);
}

.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    color: var(--text-secondary);
}

.empty-state-icon {
    font-size: 4rem;
    margin-bottom: 1rem;
    color: var(--text-muted);
}

.empty-state h3 {
    margin: 0 0 1rem 0;
    color: var(--text-primary);
    font-size: 1.5rem;
}

.empty-state p {
    margin: 0;
    font-size: 1rem;
    line-height: 1.6;
}

/* Responsive */
@media (max-width: 768px) {
    .page-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }
    
    .page-header-actions {
        width: 100%;
        justify-content: flex-end;
    }
    
    .filter-tabs {
        flex-wrap: wrap;
    }
    
    .notification-content {
        flex-direction: column;
        gap: 0.75rem;
    }
    
    .notification-meta {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }
    
    .notification-actions {
        align-self: flex-end;
    }
}
</style>

<script>
function markAsRead(notificationId) {
    fetch(`/notifications/${notificationId}/mark-read`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const notificationItem = document.querySelector(`[onclick="markAsRead(${notificationId})"]`).closest('.notification-item');
            notificationItem.classList.remove('unread');
            notificationItem.querySelector('.notification-actions').innerHTML = `
                <button class="btn btn-sm btn-outline-danger" onclick="deleteNotification(${notificationId})">
                    <i class="fas fa-trash"></i>
                </button>
            `;
        }
    })
    .catch(error => console.error('Error:', error));
}

function markAllAsRead() {
    fetch('/notifications/mark-all-read', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.querySelectorAll('.notification-item.unread').forEach(item => {
                item.classList.remove('unread');
            });
            document.querySelectorAll('.notification-item .notification-actions').forEach(actions => {
                const notificationId = actions.closest('.notification-item').querySelector('[onclick*="markAsRead"]')?.onclick.toString().match(/\d+/)?.[0];
                if (notificationId) {
                    actions.innerHTML = `
                        <button class="btn btn-sm btn-outline-danger" onclick="deleteNotification(${notificationId})">
                            <i class="fas fa-trash"></i>
                        </button>
                    `;
                }
            });
        }
    })
    .catch(error => console.error('Error:', error));
}

function deleteNotification(notificationId) {
    if (confirm('Are you sure you want to delete this notification?')) {
        fetch(`/notifications/${notificationId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.querySelector(`[onclick="deleteNotification(${notificationId})"]`).closest('.notification-item').remove();
            }
        })
        .catch(error => console.error('Error:', error));
    }
}

function deleteReadNotifications() {
    if (confirm('Are you sure you want to delete all read notifications?')) {
        fetch('/notifications/delete-read', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.querySelectorAll('.notification-item:not(.unread)').forEach(item => {
                    item.remove();
                });
            }
        })
        .catch(error => console.error('Error:', error));
    }
}

// Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const filterTabs = document.querySelectorAll('.filter-tab');
    
    filterTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active tab
            filterTabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            
            // Filter notifications
            const notifications = document.querySelectorAll('.notification-item');
            notifications.forEach(notification => {
                if (filter === 'all') {
                    notification.style.display = 'block';
                } else if (filter === 'unread') {
                    notification.style.display = notification.classList.contains('unread') ? 'block' : 'none';
                } else {
                    const notificationType = notification.getAttribute('data-type');
                    notification.style.display = notificationType.includes(filter) ? 'block' : 'none';
                }
            });
        });
    });
});
</script>
@endsection
