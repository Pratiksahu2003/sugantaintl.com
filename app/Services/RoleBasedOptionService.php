<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RoleBasedOptionService
{
    /**
     * Get all available roles
     */
    public static function getAllRoles(): array
    {
        return [
            'admin' => [
                'name' => 'Admin',
                'description' => 'Administrator with full system access',
                'permissions' => ['all']
            ],
            'influencer' => [
                'name' => 'Influencer',
                'description' => 'Content creator and influencer',
                'permissions' => ['services', 'packages', 'collaborations', 'profile']
            ],
            'company' => [
                'name' => 'Company',
                'description' => 'Business or company account',
                'permissions' => ['profile', 'company_settings']
            ],
            'user' => [
                'name' => 'User',
                'description' => 'Regular user account',
                'permissions' => ['profile']
            ]
        ];
    }

    /**
     * Get options that should be visible for a specific role
     */
    public static function getVisibleOptionsForRole(string $role): array
    {
        $allOptions = self::getAllOptions();
        $rolePermissions = self::getRolePermissions($role);
        
        $visibleOptions = [];
        
        foreach ($allOptions as $key => $option) {
            if (self::shouldShowOption($option, $rolePermissions, $role)) {
                $visibleOptions[$key] = $option;
            }
        }
        
        return $visibleOptions;
    }

    /**
     * Get options that should be hidden for a specific role
     */
    public static function getHiddenOptionsForRole(string $role): array
    {
        $allOptions = self::getAllOptions();
        $rolePermissions = self::getRolePermissions($role);
        
        $hiddenOptions = [];
        
        foreach ($allOptions as $key => $option) {
            if (!self::shouldShowOption($option, $rolePermissions, $role)) {
                $hiddenOptions[$key] = $option;
            }
        }
        
        return $hiddenOptions;
    }

    /**
     * Get all available options in the system
     */
    public static function getAllOptions(): array
    {
        return [
            // Navigation Options
            'dashboard' => [
                'name' => 'Dashboard',
                'route' => 'admin.dashboard',
                'icon' => 'fas fa-tachometer-alt',
                'required_roles' => ['admin', 'influencer', 'company', 'user'],
                'permission' => 'dashboard'
            ],
            'profile' => [
                'name' => 'My Profile',
                'route' => 'profile.show',
                'icon' => 'fas fa-user',
                'required_roles' => ['admin', 'influencer', 'company', 'user'],
                'permission' => 'profile'
            ],
            
            // Influencer Options
            'services' => [
                'name' => 'My Services',
                'route' => 'influencer.services.index',
                'icon' => 'fas fa-cogs',
                'required_roles' => ['influencer'],
                'permission' => 'services'
            ],
            'add_service' => [
                'name' => 'Add Service',
                'route' => 'influencer.services.create',
                'icon' => 'fas fa-plus',
                'required_roles' => ['influencer'],
                'permission' => 'services'
            ],
            'packages' => [
                'name' => 'My Packages',
                'route' => 'influencer.packages.index',
                'icon' => 'fas fa-box',
                'required_roles' => ['influencer'],
                'permission' => 'packages'
            ],
            'add_package' => [
                'name' => 'Add Package',
                'route' => 'influencer.packages.create',
                'icon' => 'fas fa-plus',
                'required_roles' => ['influencer'],
                'permission' => 'packages'
            ],
            'collaborations' => [
                'name' => 'My Collaborations',
                'route' => 'influencer.collaborations.index',
                'icon' => 'fas fa-handshake',
                'required_roles' => ['influencer'],
                'permission' => 'collaborations'
            ],
            'add_collaboration' => [
                'name' => 'Add Collaboration',
                'route' => 'influencer.collaborations.create',
                'icon' => 'fas fa-plus',
                'required_roles' => ['influencer'],
                'permission' => 'collaborations'
            ],
            
            // Admin Options
            'all_users' => [
                'name' => 'All Users',
                'route' => 'admin.users.index',
                'icon' => 'fas fa-users',
                'required_roles' => ['admin'],
                'permission' => 'user_management'
            ],
            'add_user' => [
                'name' => 'Add User',
                'route' => 'admin.users.create',
                'icon' => 'fas fa-user-plus',
                'required_roles' => ['admin'],
                'permission' => 'user_management'
            ],
            'roles' => [
                'name' => 'Roles',
                'route' => 'admin.roles.index',
                'icon' => 'fas fa-user-tag',
                'required_roles' => ['admin'],
                'permission' => 'role_management'
            ],
            'settings' => [
                'name' => 'Settings',
                'route' => 'admin.settings',
                'icon' => 'fas fa-cog',
                'required_roles' => ['admin', 'company'],
                'permission' => 'settings'
            ],
            'view_site' => [
                'name' => 'View Site',
                'route' => 'home',
                'icon' => 'fas fa-external-link-alt',
                'required_roles' => ['admin', 'influencer', 'company', 'user'],
                'permission' => 'view_site'
            ],
            
            // Company Options
            'company_profile' => [
                'name' => 'Company Profile',
                'route' => 'profile.edit',
                'icon' => 'fas fa-building',
                'required_roles' => ['company'],
                'permission' => 'company_settings'
            ],
        ];
    }

    /**
     * Get permissions for a specific role
     */
    public static function getRolePermissions(string $role): array
    {
        $roles = self::getAllRoles();
        return $roles[$role]['permissions'] ?? [];
    }

    /**
     * Check if an option should be shown for a role
     */
    public static function shouldShowOption(array $option, array $rolePermissions, string $role): bool
    {
        // Check if role is in required roles
        if (!in_array($role, $option['required_roles'])) {
            return false;
        }

        // Check if user has the required permission
        if (isset($option['permission'])) {
            return in_array('all', $rolePermissions) || in_array($option['permission'], $rolePermissions);
        }

        return true;
    }

    /**
     * Get options visible to current user
     */
    public static function getCurrentUserVisibleOptions(): array
    {
        $user = Auth::user();
        if (!$user) {
            return [];
        }

        $userRoles = $user->roles->pluck('slug')->toArray();
        
        // If user has admin role, show all options
        if (in_array('admin', $userRoles)) {
            return self::getAllOptions();
        }

        $visibleOptions = [];
        $allOptions = self::getAllOptions();

        foreach ($allOptions as $key => $option) {
            foreach ($userRoles as $role) {
                if (self::shouldShowOption($option, self::getRolePermissions($role), $role)) {
                    $visibleOptions[$key] = $option;
                    break; // User has access through at least one role
                }
            }
        }

        return $visibleOptions;
    }

    /**
     * Get options hidden from current user
     */
    public static function getCurrentUserHiddenOptions(): array
    {
        $allOptions = self::getAllOptions();
        $visibleOptions = self::getCurrentUserVisibleOptions();
        
        return array_diff_key($allOptions, $visibleOptions);
    }

    /**
     * Check if current user can access a specific option
     */
    public static function canAccessOption(string $optionKey): bool
    {
        $visibleOptions = self::getCurrentUserVisibleOptions();
        return array_key_exists($optionKey, $visibleOptions);
    }

    /**
     * Get role-specific menu items for navigation
     */
    public static function getRoleBasedMenuItems(): array
    {
        $user = Auth::user();
        if (!$user) {
            return [];
        }

        $menuItems = [];
        $visibleOptions = self::getCurrentUserVisibleOptions();

        // Group options by category
        $categories = [
            'main' => ['dashboard', 'profile'],
            'influencer' => ['services', 'add_service', 'packages', 'add_package', 'collaborations', 'add_collaboration'],
            'admin' => ['all_users', 'add_user', 'roles'],
            'company' => ['company_profile'],
            'system' => ['settings', 'view_site']
        ];

        foreach ($categories as $category => $optionKeys) {
            $categoryItems = [];
            foreach ($optionKeys as $key) {
                if (isset($visibleOptions[$key])) {
                    $categoryItems[] = $visibleOptions[$key];
                }
            }
            
            if (!empty($categoryItems)) {
                $menuItems[$category] = $categoryItems;
            }
        }

        return $menuItems;
    }
}
