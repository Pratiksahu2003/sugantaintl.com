@extends('layouts.admin')

@section('title', 'Role-Based Options Management')
@section('description', 'Manage role-based option visibility')
@section('page-title', 'Role-Based Options')

@section('content')
<div class="fade-in">
    <!-- Header -->
    <div style="margin-bottom: 2rem;">
        <h1 style="font-size: 1.875rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.5rem;">
            Role-Based Options Management
        </h1>
        <p style="color: var(--text-secondary);">View and manage which options are visible to different user roles.</p>
    </div>

    <!-- Role Selection -->
    <div class="card" style="margin-bottom: 2rem;">
        <div class="card-header">
            <h3 class="card-title">Select Role to Analyze</h3>
        </div>
        <div class="card-body">
            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                @foreach(\App\Services\RoleBasedOptionService::getAllRoles() as $roleKey => $role)
                    <button onclick="showRoleOptions('{{ $roleKey }}')" 
                            class="btn btn-outline-primary role-selector" 
                            data-role="{{ $roleKey }}"
                            style="padding: 0.75rem 1.5rem; border: 1px solid var(--primary-color); border-radius: 0.5rem; background: transparent; color: var(--primary-color); cursor: pointer; transition: all 0.2s;">
                        <i class="fas fa-user-tag" style="margin-right: 0.5rem;"></i>
                        {{ $role['name'] }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Current User Info -->
    <div class="card" style="margin-bottom: 2rem;">
        <div class="card-header">
            <h3 class="card-title">Current User Access</h3>
        </div>
        <div class="card-body">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                <div>
                    <h4 style="color: var(--text-primary); margin-bottom: 1rem;">Visible Options</h4>
                    <x-role-based-options :show-hidden="false" />
                </div>
                <div>
                    <h4 style="color: var(--text-primary); margin-bottom: 1rem;">Hidden Options</h4>
                    <x-role-based-options :show-hidden="true" />
                </div>
            </div>
        </div>
    </div>

    <!-- Role Analysis Sections -->
    <div id="role-analysis" style="display: none;">
        @foreach(\App\Services\RoleBasedOptionService::getAllRoles() as $roleKey => $role)
            <div id="role-{{ $roleKey }}" class="role-section" style="display: none;">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-user-tag" style="margin-right: 0.5rem;"></i>
                            {{ $role['name'] }} Role Analysis
                        </h3>
                        <p style="color: var(--text-secondary); margin: 0;">{{ $role['description'] }}</p>
                    </div>
                    <div class="card-body">
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                            <div>
                                <h4 style="color: var(--success-color); margin-bottom: 1rem;">
                                    <i class="fas fa-check-circle"></i>
                                    Visible Options
                                </h4>
                                <x-role-based-options :role="$roleKey" :show-hidden="false" />
                            </div>
                            <div>
                                <h4 style="color: var(--danger-color); margin-bottom: 1rem;">
                                    <i class="fas fa-times-circle"></i>
                                    Hidden Options
                                </h4>
                                <x-role-based-options :role="$roleKey" :show-hidden="true" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- All Options Overview -->
    <div class="card" style="margin-top: 2rem;">
        <div class="card-header">
            <h3 class="card-title">All System Options</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background: var(--content-bg);">
                            <th style="padding: 1rem; text-align: left; border-bottom: 1px solid var(--border-color);">Option</th>
                            <th style="padding: 1rem; text-align: left; border-bottom: 1px solid var(--border-color);">Route</th>
                            <th style="padding: 1rem; text-align: left; border-bottom: 1px solid var(--border-color);">Required Roles</th>
                            <th style="padding: 1rem; text-align: left; border-bottom: 1px solid var(--border-color);">Permission</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Services\RoleBasedOptionService::getAllOptions() as $key => $option)
                            <tr style="border-bottom: 1px solid var(--border-color);">
                                <td style="padding: 1rem;">
                                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                                        <i class="{{ $option['icon'] }}" style="color: var(--primary-color);"></i>
                                        <span style="font-weight: 500;">{{ $option['name'] }}</span>
                                    </div>
                                </td>
                                <td style="padding: 1rem;">
                                    <code style="background: var(--content-bg); padding: 0.25rem 0.5rem; border-radius: 0.25rem;">
                                        {{ $option['route'] ?? 'N/A' }}
                                    </code>
                                </td>
                                <td style="padding: 1rem;">
                                    <div style="display: flex; gap: 0.25rem; flex-wrap: wrap;">
                                        @foreach($option['required_roles'] as $role)
                                            <span class="badge badge-secondary" style="font-size: 0.75rem;">
                                                {{ ucfirst($role) }}
                                            </span>
                                        @endforeach
                                    </div>
                                </td>
                                <td style="padding: 1rem;">
                                    <span class="badge badge-info" style="font-size: 0.75rem;">
                                        {{ $option['permission'] ?? 'N/A' }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
function showRoleOptions(roleKey) {
    // Hide all role sections
    document.querySelectorAll('.role-section').forEach(section => {
        section.style.display = 'none';
    });
    
    // Remove active class from all buttons
    document.querySelectorAll('.role-selector').forEach(btn => {
        btn.style.background = 'transparent';
        btn.style.color = 'var(--primary-color)';
    });
    
    // Show selected role section
    const roleSection = document.getElementById('role-' + roleKey);
    if (roleSection) {
        roleSection.style.display = 'block';
    }
    
    // Add active class to selected button
    const selectedBtn = document.querySelector(`[data-role="${roleKey}"]`);
    if (selectedBtn) {
        selectedBtn.style.background = 'var(--primary-color)';
        selectedBtn.style.color = 'white';
    }
    
    // Show role analysis section
    document.getElementById('role-analysis').style.display = 'block';
    
    // Scroll to role analysis
    document.getElementById('role-analysis').scrollIntoView({ behavior: 'smooth' });
}
</script>

<style>
.role-selector:hover {
    background: var(--primary-color) !important;
    color: white !important;
}

.table-responsive {
    overflow-x: auto;
}

.badge {
    padding: 0.25rem 0.5rem;
    border-radius: 0.25rem;
    font-size: 0.75rem;
    font-weight: 500;
}

.badge-secondary {
    background: var(--secondary-color);
    color: white;
}

.badge-info {
    background: var(--info-color);
    color: white;
}

.badge-success {
    background: var(--success-color);
    color: white;
}

.badge-danger {
    background: var(--danger-color);
    color: white;
}
</style>
@endsection
