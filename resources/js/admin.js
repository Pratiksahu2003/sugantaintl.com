// Admin Dashboard JavaScript
import Swal from 'sweetalert2';

document.addEventListener('DOMContentLoaded', function() {
    // Initialize admin dashboard
    initAdminDashboard();
    
    // Initialize sidebar functionality
    initSidebar();
    
    // Initialize data tables
    initDataTables();
    
    // Initialize form validations
    initFormValidations();
    
    // Initialize notifications
    initNotifications();
});

// Admin Dashboard Initialization
function initAdminDashboard() {
    console.log('Admin Dashboard initialized');
    
    // Add loading states to buttons (but not submit buttons)
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            // Only add loading state to non-submit buttons
            if (this.type !== 'submit') {
                this.classList.add('loading');
                this.disabled = true;
                
                // Re-enable after 3 seconds (for demo purposes)
                setTimeout(() => {
                    this.classList.remove('loading');
                    this.disabled = false;
                }, 3000);
            }
        });
    });
}

// Sidebar Functionality
function initSidebar() {
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    
    if (sidebarToggle && sidebar) {
        // Toggle sidebar
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('open');
            updateSidebarState();
        });
        
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
                    sidebar.classList.remove('open');
                }
            }
        });
        
        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                sidebar.classList.remove('open');
            }
        });
        
        // Handle logout form submission
        const logoutForm = sidebar.querySelector('form[action*="logout"]');
        if (logoutForm) {
            logoutForm.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Logout Confirmation',
                    text: 'Are you sure you want to logout?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, logout!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });
        }
        
        // Initialize submenu functionality
        initSubmenus();
    }
}

// Submenu Functionality
function initSubmenus() {
    const submenuHeaders = document.querySelectorAll('.nav-submenu-header');
    
    submenuHeaders.forEach(header => {
        header.addEventListener('click', function() {
            const submenu = this.parentElement;
            const isActive = submenu.classList.contains('active');
            
            // Close all other submenus
            document.querySelectorAll('.nav-submenu').forEach(menu => {
                menu.classList.remove('active');
            });
            
            // Toggle current submenu
            if (!isActive) {
                submenu.classList.add('active');
            }
        });
    });
    
    // Auto-open submenu if current page is in submenu
    const activeSubmenuLink = document.querySelector('.nav-submenu-link.active');
    if (activeSubmenuLink) {
        const submenu = activeSubmenuLink.closest('.nav-submenu');
        if (submenu) {
            submenu.classList.add('active');
        }
    }
}

// Update sidebar state in localStorage
function updateSidebarState() {
    const sidebar = document.getElementById('sidebar');
    if (sidebar) {
        const isOpen = sidebar.classList.contains('open');
        localStorage.setItem('sidebarOpen', isOpen);
    }
}

// Data Tables Functionality
function initDataTables() {
    const tables = document.querySelectorAll('.table');
    
    tables.forEach(table => {
        // Add hover effects to table rows
        const rows = table.querySelectorAll('tbody tr');
        rows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.backgroundColor = 'var(--content-bg)';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.backgroundColor = '';
            });
        });
        
        // Add click handlers for action buttons
        const actionButtons = table.querySelectorAll('a[href*="edit"], a[href*="delete"], button[type="submit"]');
        actionButtons.forEach(button => {
            if (button.textContent.toLowerCase().includes('delete') || 
                button.getAttribute('onclick')?.includes('confirm')) {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Confirm Action',
                        text: 'Are you sure you want to perform this action?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, do it!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Remove the event listener temporarily to allow form submission
                            this.removeEventListener('click', arguments.callee);
                            this.click();
                        }
                    });
                });
            }
        });
    });
}

// Form Validations
function initFormValidations() {
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            // Skip validation for forms with no-validate class
            if (form.classList.contains('no-validate')) {
                return true;
            }
            
            // Skip validation for all admin forms
            if (form.action.includes('admin/') || 
                form.id.includes('admin') || 
                form.id.includes('user') ||
                form.id.includes('role')) {
                console.log('Skipping validation for admin form:', form.id || form.action);
                return true;
            }
            
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('error');
                    showFieldError(field, 'This field is required');
                } else {
                    field.classList.remove('error');
                    clearFieldError(field);
                }
            });
            
            // Email validation
            const emailFields = form.querySelectorAll('input[type="email"]');
            emailFields.forEach(field => {
                if (field.value && !isValidEmail(field.value)) {
                    isValid = false;
                    field.classList.add('error');
                    showFieldError(field, 'Please enter a valid email address');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                showNotification('Please fix the errors in the form', 'error');
            }
        });
    });
}

// Email validation helper
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Show field error
function showFieldError(field, message) {
    clearFieldError(field);
    
    const errorDiv = document.createElement('div');
    errorDiv.className = 'field-error';
    errorDiv.textContent = message;
    errorDiv.style.color = 'var(--danger-color)';
    errorDiv.style.fontSize = '0.75rem';
    errorDiv.style.marginTop = '0.25rem';
    
    field.parentNode.appendChild(errorDiv);
}

// Clear field error
function clearFieldError(field) {
    const existingError = field.parentNode.querySelector('.field-error');
    if (existingError) {
        existingError.remove();
    }
}

// Notifications System
function initNotifications() {
    // Auto-hide success/error messages after 5 seconds
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-20px)';
            setTimeout(() => {
                alert.remove();
            }, 300);
        }, 5000);
    });
}

// Show notification function
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `alert alert-${type} fade-in`;
    notification.innerHTML = `
        <i class="fas fa-${getNotificationIcon(type)} mr-2"></i>
        ${message}
    `;
    
    const content = document.querySelector('.content');
    if (content) {
        content.insertBefore(notification, content.firstChild);
        
        // Auto-hide after 5 seconds
        setTimeout(() => {
            notification.style.opacity = '0';
            notification.style.transform = 'translateY(-20px)';
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 5000);
    }
}

// Get notification icon based on type
function getNotificationIcon(type) {
    const icons = {
        success: 'check-circle',
        error: 'exclamation-circle',
        warning: 'exclamation-triangle',
        info: 'info-circle'
    };
    return icons[type] || 'info-circle';
}

// Utility Functions
function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric'
    });
}

function formatDateTime(dateString) {
    const date = new Date(dateString);
    return date.toLocaleString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    });
}

// Search functionality for tables
function initTableSearch() {
    const searchInputs = document.querySelectorAll('.table-search');
    
    searchInputs.forEach(input => {
        input.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const table = this.closest('.table-container').querySelector('.table');
            const rows = table.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
}

// Initialize table search if search inputs exist
document.addEventListener('DOMContentLoaded', function() {
    initTableSearch();
});

// Export functions for global use
window.AdminDashboard = {
    showNotification,
    formatDate,
    formatDateTime,
    isValidEmail
};
