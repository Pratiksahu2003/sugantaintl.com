@extends('layouts.admin')

@section('title', 'Admin Dashboard - Star JD')
@section('description', 'Admin dashboard for Star JD management')
@section('page-title', 'Dashboard')

@section('content')
<div class="fade-in">
    <!-- Welcome Header -->
    <div style="margin-bottom: 2rem;">
        <h1 style="font-size: 1.875rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.5rem;">
            Welcome back, {{ Auth::user()->name }}!
        </h1>
        <p style="color: var(--text-secondary);">Here's what's happening with your Star JD platform today.</p>
    </div>

    <!-- Statistics Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon primary">
                    <i class="fas fa-users"></i>
                </div>
            </div>
            <div class="stat-value">{{ \App\Models\User::count() }}</div>
            <div class="stat-label">Total Users</div>
            <div class="stat-change positive">
                <i class="fas fa-arrow-up"></i>
                +{{ \App\Models\User::where('created_at', '>=', now()->subDays(7))->count() }} this week
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon success">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
            <div class="stat-value">{{ \App\Models\User::whereNotNull('email_verified_at')->count() }}</div>
            <div class="stat-label">Verified Users</div>
            <div class="stat-change positive">
                <i class="fas fa-arrow-up"></i>
                {{ round((\App\Models\User::whereNotNull('email_verified_at')->count() / max(\App\Models\User::count(), 1)) * 100) }}% verified
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon warning">
                    <i class="fas fa-clock"></i>
                </div>
            </div>
            <div class="stat-value">{{ \App\Models\User::whereNull('email_verified_at')->count() }}</div>
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
            <div class="stat-value">{{ \App\Models\User::where('created_at', '>=', now()->subDays(30))->count() }}</div>
            <div class="stat-label">New Users (30 days)</div>
            <div class="stat-change positive">
                <i class="fas fa-arrow-up"></i>
                Growing steadily
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
        <!-- Recent Users -->
        <div class="card">
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
                                <th>Status</th>
                                <th>Joined</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(\App\Models\User::latest()->take(5)->get() as $user)
                            <tr>
                                <td>
                                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                                        <div style="width: 32px; height: 32px; border-radius: 50%; background: var(--primary-color); display: flex; align-items: center; justify-content: center; color: white; font-weight: 600;">
                                            {{ substr($user->name, 0, 1) }}
                                        </div>
                                        <div>
                                            <div style="font-weight: 500;">{{ $user->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge {{ $user->email_verified_at ? 'badge-success' : 'badge-warning' }}">
                                        {{ $user->email_verified_at ? 'Verified' : 'Pending' }}
                                    </span>
                                </td>
                                <td>{{ $user->created_at->format('M d, Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" style="text-align: center; color: var(--text-secondary); padding: 2rem;">
                                    No users found.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div style="margin-top: 1rem; text-align: center;">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary">
                        <i class="fas fa-users"></i>
                        View All Users
                    </a>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Quick Actions</h3>
            </div>
            <div class="card-body">
                <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                        <i class="fas fa-user-plus"></i>
                        Add New User
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                        <i class="fas fa-users"></i>
                        Manage Users
                    </a>
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">
                        <i class="fas fa-user-tag"></i>
                        Manage Roles
                    </a>
                    <a href="{{ route('admin.settings') }}" class="btn btn-secondary">
                        <i class="fas fa-cog"></i>
                        System Settings
                    </a>
                    <a href="{{ route('profile.edit') }}" class="btn btn-secondary">
                        <i class="fas fa-user-edit"></i>
                        Edit Profile
                    </a>
                </div>
            </div>
        </div>

        <!-- Profile Management -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Profile Management</h3>
            </div>
            <div class="card-body">
                <p style="color: var(--text-secondary); margin-bottom: 1rem;">Manage user profiles and role-specific information.</p>
                <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary">
                        <i class="fas fa-users"></i>
                        Manage All Users
                    </a>
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">
                        <i class="fas fa-user-tag"></i>
                        Manage Roles
                    </a>
                    <a href="{{ route('profile.show') }}" class="btn btn-secondary">
                        <i class="fas fa-user"></i>
                        View My Profile
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- System Information -->
    <div class="card" style="margin-top: 2rem;">
        <div class="card-header">
            <h3 class="card-title">System Information</h3>
        </div>
        <div class="card-body">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">
                <div>
                    <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">Laravel Version</div>
                    <div style="font-weight: 500;">{{ app()->version() }}</div>
                </div>
                <div>
                    <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">PHP Version</div>
                    <div style="font-weight: 500;">{{ PHP_VERSION }}</div>
                </div>
                <div>
                    <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">Environment</div>
                    <div style="font-weight: 500;">{{ app()->environment() }}</div>
                </div>
                <div>
                    <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">Server Time</div>
                    <div style="font-weight: 500;">{{ now()->format('Y-m-d H:i:s') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection