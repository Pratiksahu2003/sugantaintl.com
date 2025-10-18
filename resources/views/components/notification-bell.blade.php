<!-- Notification Bell Component -->
<div class="notification-bell" id="notificationBell">
    <button class="notification-toggle" id="notificationToggle">
        <i class="fas fa-bell"></i>
        <span class="notification-count" id="notificationCount">0</span>
    </button>
    
    <div class="notification-dropdown" id="notificationDropdown">
        <div class="notification-header">
            <h3>Notifications</h3>
            <div class="notification-actions">
                <button class="mark-all-read" id="markAllRead">Mark All Read</button>
                <button class="notification-close" id="notificationClose">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        
        <div class="notification-list" id="notificationList">
            <!-- Notifications will be loaded here -->
        </div>
        
        <div class="notification-footer">
            <a href="{{ route('notifications.index') }}" class="view-all-notifications">
                View All Notifications
            </a>
        </div>
    </div>
</div>

<style>
.notification-bell {
    position: relative;
    display: inline-block;
}

.notification-toggle {
    position: relative;
    background: none;
    border: none;
    color: var(--text-primary);
    font-size: 1.2rem;
    cursor: pointer;
    padding: 0.5rem;
    border-radius: 50%;
    transition: all 0.2s ease;
}

.notification-toggle:hover {
    background-color: var(--hover-bg);
    color: var(--primary-color);
}

.notification-count {
    position: absolute;
    top: -5px;
    right: -5px;
    background: var(--danger-color);
    color: white;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 20px;
}

.notification-count.hidden {
    display: none;
}

.notification-dropdown {
    position: absolute;
    top: 100%;
    right: 0;
    width: 350px;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 0.5rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    z-index: 1000;
    display: none;
    max-height: 500px;
    overflow: hidden;
}

.notification-dropdown.show {
    display: block;
}

.notification-header {
    padding: 1rem;
    border-bottom: 1px solid #e5e7eb;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #f8f9fa;
}

.notification-header h3 {
    margin: 0;
    font-size: 1rem;
    font-weight: 600;
    color: #1f2937;
}

.notification-actions {
    display: flex;
    gap: 0.5rem;
    align-items: center;
}

.mark-all-read {
    background: #3b82f6;
    color: white;
    border: none;
    padding: 0.25rem 0.75rem;
    border-radius: 0.25rem;
    font-size: 0.75rem;
    cursor: pointer;
    transition: background-color 0.2s ease;
}

.mark-all-read:hover {
    background: #2563eb;
}

.notification-close {
    background: none;
    border: none;
    color: #6b7280;
    cursor: pointer;
    padding: 0.25rem;
    border-radius: 0.25rem;
    transition: color 0.2s ease;
}

.notification-close:hover {
    color: #1f2937;
}

.notification-list {
    max-height: 300px;
    overflow-y: auto;
}

.notification-item {
    padding: 1rem;
    border-bottom: 1px solid #e5e7eb;
    cursor: pointer;
    transition: background-color 0.2s ease;
    position: relative;
    background: #ffffff;
}

.notification-item:hover {
    background-color: #f9fafb;
}

.notification-item.unread {
    background-color: #f0f9ff;
}

.notification-item.unread::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 3px;
    background: #3b82f6;
}

.notification-content {
    display: flex;
    gap: 0.75rem;
}

.notification-icon {
    flex-shrink: 0;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
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
    color: #1f2937;
    margin-bottom: 0.25rem;
    font-size: 0.875rem;
}

.notification-message {
    color: #6b7280;
    font-size: 0.8rem;
    line-height: 1.4;
    margin-bottom: 0.5rem;
}

.notification-time {
    color: #9ca3af;
    font-size: 0.75rem;
}

.notification-footer {
    padding: 1rem;
    border-top: 1px solid #e5e7eb;
    text-align: center;
    background: #f8f9fa;
}

.view-all-notifications {
    color: #3b82f6;
    text-decoration: none;
    font-weight: 500;
    font-size: 0.875rem;
    transition: color 0.2s ease;
}

.view-all-notifications:hover {
    color: #2563eb;
}

/* Empty state */
.notification-empty {
    padding: 2rem;
    text-align: center;
    color: #6b7280;
}

.notification-empty i {
    font-size: 2rem;
    margin-bottom: 0.5rem;
    color: #9ca3af;
}

.notification-empty p {
    margin: 0;
    font-size: 0.875rem;
}

/* Loading state */
.notification-loading {
    padding: 2rem;
    text-align: center;
    color: #6b7280;
}

.notification-loading i {
    animation: spin 1s linear infinite;
}

@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* Responsive */
@media (max-width: 768px) {
    .notification-dropdown {
        width: 300px;
        right: -50px;
    }
}

@media (max-width: 480px) {
    .notification-dropdown {
        width: 280px;
        right: -100px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const notificationToggle = document.getElementById('notificationToggle');
    const notificationDropdown = document.getElementById('notificationDropdown');
    const notificationClose = document.getElementById('notificationClose');
    const notificationCount = document.getElementById('notificationCount');
    const notificationList = document.getElementById('notificationList');
    const markAllRead = document.getElementById('markAllRead');

    // Toggle dropdown
    notificationToggle.addEventListener('click', function(e) {
        e.stopPropagation();
        notificationDropdown.classList.toggle('show');
        if (notificationDropdown.classList.contains('show')) {
            loadNotifications();
        }
    });

    // Close dropdown
    notificationClose.addEventListener('click', function() {
        notificationDropdown.classList.remove('show');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!notificationToggle.contains(e.target) && !notificationDropdown.contains(e.target)) {
            notificationDropdown.classList.remove('show');
        }
    });

    // Mark all as read
    markAllRead.addEventListener('click', function() {
        fetch('{{ route("notifications.mark-all-read") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                notificationCount.textContent = '0';
                notificationCount.classList.add('hidden');
                
                // Also update sidebar count
                const sidebarCount = document.getElementById('sidebarNotificationCount');
                if (sidebarCount) {
                    sidebarCount.style.display = 'none';
                }
                
                loadNotifications();
            }
        })
        .catch(error => console.error('Error:', error));
    });

    // Load notifications
    function loadNotifications() {
        notificationList.innerHTML = '<div class="notification-loading"><i class="fas fa-spinner"></i><p>Loading notifications...</p></div>';
        
        fetch('{{ route("notifications.recent") }}')
        .then(response => response.json())
        .then(data => {
            if (data.notifications && data.notifications.length > 0) {
                notificationList.innerHTML = data.notifications.map(notification => `
                    <div class="notification-item ${notification.is_read ? '' : 'unread'}" onclick="markAsRead(${notification.id})">
                        <div class="notification-content">
                            <div class="notification-icon ${notification.color}">
                                <i class="${notification.icon}"></i>
                            </div>
                            <div class="notification-details">
                                <div class="notification-title">${notification.title}</div>
                                <div class="notification-message">${notification.message}</div>
                                <div class="notification-time">${notification.time_ago}</div>
                            </div>
                        </div>
                    </div>
                `).join('');
            } else {
                notificationList.innerHTML = '<div class="notification-empty"><i class="fas fa-bell-slash"></i><p>No notifications yet</p></div>';
            }
        })
        .catch(error => {
            console.error('Error loading notifications:', error);
            notificationList.innerHTML = '<div class="notification-empty"><i class="fas fa-exclamation-triangle"></i><p>Error loading notifications</p></div>';
        });
    }

    // Mark notification as read
    window.markAsRead = function(notificationId) {
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
                // Update UI
                const notificationItem = document.querySelector(`[onclick="markAsRead(${notificationId})"]`);
                if (notificationItem) {
                    notificationItem.classList.remove('unread');
                }
                // Update count
                updateNotificationCount();
            }
        })
        .catch(error => console.error('Error:', error));
    };

    // Update notification count
    function updateNotificationCount() {
        fetch('{{ route("notifications.unread-count") }}')
        .then(response => response.json())
        .then(data => {
            if (data.count > 0) {
                notificationCount.textContent = data.count;
                notificationCount.classList.remove('hidden');
            } else {
                notificationCount.classList.add('hidden');
            }
            
            // Also update sidebar count if it exists
            const sidebarCount = document.getElementById('sidebarNotificationCount');
            if (sidebarCount) {
                if (data.count > 0) {
                    sidebarCount.textContent = data.count;
                    sidebarCount.style.display = 'flex';
                } else {
                    sidebarCount.style.display = 'none';
                }
            }
        })
        .catch(error => console.error('Error:', error));
    }

    // Load initial count
    updateNotificationCount();

    // Refresh count every 30 seconds
    setInterval(updateNotificationCount, 30000);
});
</script>
