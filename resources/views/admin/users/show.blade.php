@extends('layouts.admin')

@section('title', 'View User - Admin Dashboard')
@section('description', 'View user details for Star JD admin panel')
@section('page-title', 'View User')

@section('content')
<div class="fade-in">
    <!-- Header -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <div>
            <h1 style="font-size: 1.875rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.5rem;">User Details</h1>
            <p style="color: var(--text-secondary);">View user information and account details.</p>
        </div>
        <div style="display: flex; gap: 0.75rem;">
            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i>
                Edit User
            </a>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i>
                Back to Users
            </a>
        </div>
    </div>

    <!-- User Information -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
        <!-- User Details -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">User Information</h3>
            </div>
            <div class="card-body">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem;">
                    <div style="width: 64px; height: 64px; border-radius: 50%; background: var(--primary-color); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; font-weight: 600;">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                    <div>
                        <h2 style="font-size: 1.5rem; font-weight: 600; color: var(--text-primary); margin-bottom: 0.25rem;">{{ $user->name }}</h2>
                        <p style="color: var(--text-secondary);">{{ $user->email }}</p>
                    </div>
                </div>

                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span style="color: var(--text-secondary);">Email Address</span>
                        <span style="font-weight: 500;">{{ $user->email }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span style="color: var(--text-secondary);">Email Verified</span>
                        <span class="badge {{ $user->email_verified_at ? 'badge-success' : 'badge-warning' }}">
                            {{ $user->email_verified_at ? 'Verified' : 'Pending' }}
                        </span>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span style="color: var(--text-secondary);">Account Created</span>
                        <span style="font-weight: 500;">{{ $user->created_at->format('F j, Y g:i A') }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span style="color: var(--text-secondary);">Last Updated</span>
                        <span style="font-weight: 500;">{{ $user->updated_at->format('F j, Y g:i A') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Account Actions -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Account Actions</h3>
            </div>
            <div class="card-body">
                <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i>
                        Edit User Information
                    </a>
                    <a href="mailto:{{ $user->email }}" class="btn btn-secondary">
                        <i class="fas fa-envelope"></i>
                        Send Email
                    </a>
                    <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Are you sure you want to delete this user? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="width: 100%;">
                            <i class="fas fa-trash"></i>
                            Delete User
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Account Statistics -->
    <div class="card" style="margin-top: 2rem;">
        <div class="card-header">
            <h3 class="card-title">Account Statistics</h3>
        </div>
        <div class="card-body">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">
                <div style="text-align: center;">
                    <div style="font-size: 2rem; font-weight: 700; color: var(--primary-color); margin-bottom: 0.5rem;">{{ $user->created_at->diffInDays(now()) }}</div>
                    <div style="color: var(--text-secondary);">Days Active</div>
                </div>
                <div style="text-align: center;">
                    <div style="font-size: 2rem; font-weight: 700; color: var(--success-color); margin-bottom: 0.5rem;">{{ $user->email_verified_at ? '1' : '0' }}</div>
                    <div style="color: var(--text-secondary);">Verified Accounts</div>
                </div>
                <div style="text-align: center;">
                    <div style="font-size: 2rem; font-weight: 700; color: var(--warning-color); margin-bottom: 0.5rem;">0</div>
                    <div style="color: var(--text-secondary);">Total Logins</div>
                </div>
                <div style="text-align: center;">
                    <div style="font-size: 2rem; font-weight: 700; color: var(--danger-color); margin-bottom: 0.5rem;">0</div>
                    <div style="color: var(--text-secondary);">Failed Logins</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
