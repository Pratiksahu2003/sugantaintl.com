@props([
    'showHidden' => false, // If true, shows options that are hidden from current user
    'role' => null, // Specific role to check against (if null, uses current user)
    'category' => null, // Specific category to show
])

@php
    use App\Services\RoleBasedOptionService;
    
    $user = Auth::user();
    $targetRole = $role ?: ($user ? $user->roles->first()?->slug : 'user');
    
    if ($showHidden) {
        $options = RoleBasedOptionService::getHiddenOptionsForRole($targetRole);
    } else {
        $options = RoleBasedOptionService::getVisibleOptionsForRole($targetRole);
    }
    
    // Filter by category if specified
    if ($category) {
        $categories = [
            'main' => ['dashboard', 'profile'],
            'influencer' => ['services', 'add_service', 'packages', 'add_package', 'collaborations', 'add_collaboration'],
            'admin' => ['all_users', 'add_user', 'roles'],
            'company' => ['company_profile'],
            'system' => ['settings', 'view_site']
        ];
        
        $categoryKeys = $categories[$category] ?? [];
        $options = array_intersect_key($options, array_flip($categoryKeys));
    }
@endphp

@if(!empty($options))
    <div {{ $attributes->merge(['class' => 'role-based-options']) }}>
        @if($showHidden)
            <div class="alert alert-warning" style="margin-bottom: 1rem;">
                <i class="fas fa-eye-slash"></i>
                <strong>Hidden Options for {{ ucfirst($targetRole) }} Role:</strong>
                These options are not visible to users with the {{ $targetRole }} role.
            </div>
        @endif
        
        <div class="options-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 1rem;">
            @foreach($options as $key => $option)
                <div class="option-card" style="border: 1px solid var(--border-color); border-radius: 0.5rem; padding: 1rem; background: var(--card-bg); transition: all 0.2s;">
                    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.5rem;">
                        <i class="{{ $option['icon'] }}" style="color: var(--primary-color); font-size: 1.25rem;"></i>
                        <div>
                            <h4 style="font-size: 1rem; font-weight: 600; color: var(--text-primary); margin: 0;">
                                {{ $option['name'] }}
                            </h4>
                            @if(isset($option['required_roles']))
                                <div style="display: flex; gap: 0.25rem; margin-top: 0.25rem;">
                                    @foreach($option['required_roles'] as $role)
                                        <span class="badge badge-secondary" style="font-size: 0.75rem;">
                                            {{ ucfirst($role) }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    @if(isset($option['route']))
                        <a href="{{ route($option['route']) }}" 
                           class="btn btn-primary btn-sm" 
                           style="width: 100%; padding: 0.5rem; text-align: center; text-decoration: none;">
                            <i class="fas fa-arrow-right"></i>
                            Access
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@else
    <div class="alert alert-info">
        <i class="fas fa-info-circle"></i>
        @if($showHidden)
            No hidden options found for {{ ucfirst($targetRole) }} role.
        @else
            No visible options found for {{ ucfirst($targetRole) }} role.
        @endif
    </div>
@endif
