@extends('layouts.admin')

@section('title', 'Dashboard - Star JD')
@section('description', 'Unified dashboard for all user types')
@section('page-title', 'Dashboard')

@section('content')
<div class="fade-in">
    <!-- Welcome Header -->
    <div style="margin-bottom: 2rem;">
        <h1 style="font-size: 1.875rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.5rem;">
            Welcome back, {{ $user->name }}!
        </h1>
        <p style="color: var(--text-secondary);">
            @if($data['isAdmin'])
                Here's what's happening with your Star JD platform today.
            @elseif($data['isInfluencer'])
                Manage your services, packages, and collaborations.
            @elseif($data['isCompany'])
                Manage your company profile and business information.
            @else
                Welcome to your Star JD dashboard.
            @endif
        </p>
        <div style="margin-top: 0.5rem;">
            <span class="badge badge-{{ $data['isAdmin'] ? 'danger' : ($data['isInfluencer'] ? 'primary' : ($data['isCompany'] ? 'success' : 'secondary')) }}">
                {{ ucfirst($data['role']) }}
            </span>
        </div>
    </div>

    <!-- Admin Dashboard Section -->
    @if($data['isAdmin'])
    <div class="admin-dashboard">
        <!-- Statistics Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon primary">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $data['admin']['totalUsers'] }}</div>
                <div class="stat-label">Total Users</div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i>
                    +{{ $data['admin']['newUsersThisWeek'] }} this week
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon success">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $data['admin']['verifiedUsers'] }}</div>
                <div class="stat-label">Verified Users</div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i>
                    {{ round(($data['admin']['verifiedUsers'] / max($data['admin']['totalUsers'], 1)) * 100) }}% verified
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon warning">
                    <i class="fas fa-clock"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $data['admin']['pendingVerification'] }}</div>
                <div class="stat-label">Pending Verification</div>
                <div class="stat-change negative">
                    <i class="fas fa-arrow-down"></i>
                    Needs attention
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon info">
                        <i class="fas fa-calendar"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $data['admin']['newUsersThisMonth'] }}</div>
                <div class="stat-label">New Users (30 days)</div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i>
                    Growing steadily
                </div>
            </div>
        </div>

        <!-- Admin Quick Actions -->
        <div class="card" style="margin-top: 2rem;">
            <div class="card-header">
                <h3 class="card-title">Admin Quick Actions</h3>
            </div>
            <div class="card-body">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary">
                        <i class="fas fa-users"></i>
                        Manage Users
                    </a>
                    <a href="{{ route('admin.users.create') }}" class="btn btn-success">
                        <i class="fas fa-user-plus"></i>
                        Add User
                    </a>
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-warning">
                        <i class="fas fa-user-tag"></i>
                        Manage Roles
                    </a>
                    <a href="{{ route('admin.settings') }}" class="btn btn-info">
                        <i class="fas fa-cog"></i>
                        Settings
                    </a>
                </div>
            </div>
        </div>

        <!-- Recent Users -->
        <div class="card" style="margin-top: 2rem;">
            <div class="card-header">
                <h3 class="card-title">Recent Users</h3>
            </div>
            <div class="card-body">
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Joined</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data['admin']['recentUsers'] as $recentUser)
                            <tr>
                                <td>
                                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                                        <div style="width: 32px; height: 32px; border-radius: 50%; background: var(--primary-color); display: flex; align-items: center; justify-content: center; color: white; font-weight: 600;">
                                            {{ substr($recentUser->name, 0, 1) }}
                                        </div>
                                        <div>
                                            <div style="font-weight: 500;">{{ $recentUser->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $recentUser->email }}</td>
                                <td>
                                    <span class="badge badge-secondary">
                                        {{ $recentUser->roles->first()?->name ?? 'User' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge {{ $recentUser->email_verified_at ? 'badge-success' : 'badge-warning' }}">
                                        {{ $recentUser->email_verified_at ? 'Verified' : 'Pending' }}
                                    </span>
                                </td>
                                <td>{{ $recentUser->created_at->format('M d, Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="text-align: center; color: var(--text-secondary); padding: 2rem;">
                                    No users found.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Influencer Dashboard Section -->
    @if($data['isInfluencer'])
    <div class="influencer-dashboard">
        <!-- Influencer Statistics -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon primary">
                        <i class="fas fa-cogs"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $data['influencer']['totalServices'] }}</div>
                <div class="stat-label">Total Services</div>
                <div class="stat-change positive">
                    <i class="fas fa-check"></i>
                    {{ $data['influencer']['activeServices'] }} active
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon success">
                        <i class="fas fa-box"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $data['influencer']['totalPackages'] }}</div>
                <div class="stat-label">Total Packages</div>
                <div class="stat-change positive">
                    <i class="fas fa-check"></i>
                    {{ $data['influencer']['activePackages'] }} active
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon warning">
                        <i class="fas fa-handshake"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $data['influencer']['totalCollaborations'] }}</div>
                <div class="stat-label">Collaborations</div>
                <div class="stat-change positive">
                    <i class="fas fa-clock"></i>
                    {{ $data['influencer']['openCollaborations'] }} open
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon info">
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $data['influencer']['featuredServices'] + $data['influencer']['featuredPackages'] }}</div>
                <div class="stat-label">Featured Items</div>
                <div class="stat-change positive">
                    <i class="fas fa-star"></i>
                    Highlighted content
                </div>
            </div>
        </div>

        <!-- Influencer Quick Actions -->
        <div class="card" style="margin-top: 2rem;">
            <div class="card-header">
                <h3 class="card-title">Influencer Quick Actions</h3>
            </div>
            <div class="card-body">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                    <a href="{{ route('influencer.services.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        Add Service
                    </a>
                    <a href="{{ route('influencer.packages.create') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i>
                        Add Package
                    </a>
                    <a href="{{ route('influencer.collaborations.create') }}" class="btn btn-warning">
                        <i class="fas fa-plus"></i>
                        Add Collaboration
                    </a>
                    <a href="{{ route('influencer.services.index') }}" class="btn btn-info">
                        <i class="fas fa-list"></i>
                        View All Services
                    </a>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-top: 2rem;">
            @if($data['influencer']['recentServices']->count() > 0)
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Services</h3>
                </div>
                <div class="card-body">
                    @foreach($data['influencer']['recentServices'] as $service)
                    <div style="padding: 0.75rem 0; border-bottom: 1px solid var(--border-color);">
                        <div style="font-weight: 500;">{{ $service->title }}</div>
                        <div style="color: var(--text-secondary); font-size: 0.875rem;">
                            {{ $service->is_active ? 'Active' : 'Inactive' }} • {{ $service->created_at->diffForHumans() }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            @if($data['influencer']['recentCollaborations']->count() > 0)
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Collaborations</h3>
                </div>
                <div class="card-body">
                    @foreach($data['influencer']['recentCollaborations'] as $collaboration)
                    <div style="padding: 0.75rem 0; border-bottom: 1px solid var(--border-color);">
                        <div style="font-weight: 500;">{{ $collaboration->title }}</div>
                        <div style="color: var(--text-secondary); font-size: 0.875rem;">
                            <span class="badge badge-{{ ['open' => 'info', 'in_progress' => 'primary', 'completed' => 'success', 'cancelled' => 'danger', 'paused' => 'warning'][$collaboration->status] ?? 'secondary' }}">
                                {{ ucfirst($collaboration->status) }}
                            </span> • {{ $collaboration->created_at->diffForHumans() }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
    @endif

    <!-- Company Dashboard Section -->
    @if($data['isCompany'])
    <div class="company-dashboard">
        <!-- Company Statistics -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon {{ $data['company']['profileComplete'] ? 'success' : 'warning' }}">
                        <i class="fas fa-building"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $data['company']['profileCompletion'] }}%</div>
                <div class="stat-label">Profile Complete</div>
                <div class="stat-change {{ $data['company']['profileComplete'] ? 'positive' : 'negative' }}">
                    <i class="fas fa-{{ $data['company']['profileComplete'] ? 'check' : 'exclamation' }}"></i>
                    {{ $data['company']['profileComplete'] ? 'Complete' : 'Needs attention' }}
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon {{ $data['company']['hasCompanyProfile'] ? 'success' : 'secondary' }}">
                        <i class="fas fa-info-circle"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $data['company']['hasCompanyProfile'] ? 'Yes' : 'No' }}</div>
                <div class="stat-label">Company Profile</div>
                <div class="stat-change {{ $data['company']['hasCompanyProfile'] ? 'positive' : 'negative' }}">
                    <i class="fas fa-{{ $data['company']['hasCompanyProfile'] ? 'check' : 'times' }}"></i>
                    {{ $data['company']['hasCompanyProfile'] ? 'Created' : 'Not created' }}
                </div>
            </div>
        </div>

        <!-- Company Quick Actions -->
        <div class="card" style="margin-top: 2rem;">
            <div class="card-header">
                <h3 class="card-title">Company Quick Actions</h3>
            </div>
            <div class="card-body">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i>
                        Edit Profile
                    </a>
                    <a href="{{ route('profile.show') }}" class="btn btn-secondary">
                        <i class="fas fa-eye"></i>
                        View Profile
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-info">
                        <i class="fas fa-external-link-alt"></i>
                        View Public Site
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- General User Dashboard Section -->
    <div class="general-dashboard">
        <!-- Profile Completion -->
        <div class="card" style="margin-top: 2rem;">
            <div class="card-header">
                <h3 class="card-title">Profile Status</h3>
            </div>
            <div class="card-body">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                    <div style="flex: 1;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                            <span>Profile Completion</span>
                            <span>{{ $data['general']['profileCompletion'] }}%</span>
                        </div>
                        <div style="background: var(--border-color); border-radius: 0.5rem; height: 8px;">
                            <div style="background: var(--primary-color); height: 100%; border-radius: 0.5rem; width: {{ $data['general']['profileCompletion'] }}%; transition: width 0.3s ease;"></div>
                        </div>
                    </div>
                </div>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                        <i class="fas fa-user-edit"></i>
                        Complete Profile
                    </a>
                    <a href="{{ route('profile.show') }}" class="btn btn-secondary">
                        <i class="fas fa-user"></i>
                        View Profile
                    </a>
                </div>
            </div>
        </div>

        <!-- Account Information -->
        <div class="card" style="margin-top: 2rem;">
            <div class="card-header">
                <h3 class="card-title">Account Information</h3>
            </div>
            <div class="card-body">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">
                    <div>
                        <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">Email Status</div>
                        <div style="font-weight: 500;">
                            <span class="badge {{ $data['general']['emailVerified'] ? 'badge-success' : 'badge-warning' }}">
                                {{ $data['general']['emailVerified'] ? 'Verified' : 'Pending Verification' }}
                            </span>
                        </div>
                    </div>
                    <div>
                        <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">Account Age</div>
                        <div style="font-weight: 500;">{{ $data['general']['accountAge'] }}</div>
                    </div>
                    <div>
                        <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">Last Login</div>
                        <div style="font-weight: 500;">{{ $data['general']['lastLogin']->diffForHumans() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Access Denied Messages -->
    @if(!$data['isAdmin'])
    <div class="card" style="margin-top: 2rem; border-left: 4px solid var(--warning-color);">
        <div class="card-header">
            <h3 class="card-title" style="color: var(--warning-color);">
                <i class="fas fa-lock"></i>
                Admin Features
            </h3>
        </div>
        <div class="card-body">
            <p style="color: var(--text-secondary);">
                You don't have permission to access admin features. Contact an administrator if you need admin access.
            </p>
        </div>
    </div>
    @endif

    @if(!$data['isInfluencer'])
    <div class="card" style="margin-top: 2rem; border-left: 4px solid var(--info-color);">
        <div class="card-header">
            <h3 class="card-title" style="color: var(--info-color);">
                <i class="fas fa-star"></i>
                Influencer Features
            </h3>
        </div>
        <div class="card-body">
            <p style="color: var(--text-secondary);">
                You don't have influencer permissions. Contact an administrator to get influencer access for services and collaborations.
            </p>
        </div>
    </div>
    @endif
</div>
@endsection
