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
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span style="color: var(--text-secondary);">Roles</span>
                        <div style="display: flex; flex-wrap: wrap; gap: 0.25rem;">
                            @if($user->roles->count() > 0)
                                @foreach($user->roles as $role)
                                    <span class="badge badge-primary">{{ $role->name }}</span>
                                @endforeach
                            @else
                                <span style="color: var(--text-secondary); font-size: 0.875rem;">No roles assigned</span>
                            @endif
                        </div>
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

    <!-- Role Management -->
    @if(Auth::user()->hasRole('admin'))
    <div class="card" style="margin-top: 2rem;">
        <div class="card-header">
            <h3 class="card-title">Role Management</h3>
        </div>
        <div class="card-body">
            <!-- Assign New Role -->
            <div style="margin-bottom: 2rem;">
                <h4 style="color: var(--text-primary); margin-bottom: 1rem;">Assign Role</h4>
                <form action="{{ route('admin.users.assign-role', $user) }}" method="POST" style="display: flex; gap: 1rem; align-items: end;">
                    @csrf
                    <div style="flex: 1;">
                        <select name="role_id" class="form-control" required>
                            <option value="">Select a role to assign...</option>
                            @foreach($roles->whereNotIn('id', $user->roles->pluck('id')) as $role)
                                <option value="{{ $role->id }}">{{ $role->name }} - {{ $role->description }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-user-plus"></i>
                        Assign Role
                    </button>
                </form>
            </div>

            <!-- Current Roles -->
            <div>
                <h4 style="color: var(--text-primary); margin-bottom: 1rem;">Current Roles</h4>
                @if($user->roles->count() > 0)
                    <div style="display: grid; gap: 1rem;">
                        @foreach($user->roles as $role)
                            <div style="display: flex; justify-content: space-between; align-items: center; padding: 1rem; background: var(--bg-secondary); border-radius: 0.5rem;">
                                <div>
                                    <div style="font-weight: 500; color: var(--text-primary);">{{ $role->name }}</div>
                                    @if($role->description)
                                        <div style="font-size: 0.875rem; color: var(--text-secondary);">{{ $role->description }}</div>
                                    @endif
                                </div>
                                <form action="{{ route('admin.users.remove-role', [$user, $role]) }}" method="POST" style="display: inline;" onsubmit="return confirm('Remove {{ $role->name }} role from {{ $user->name }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-user-minus"></i>
                                        Remove
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div style="text-align: center; color: var(--text-secondary); padding: 2rem;">
                        <i class="fas fa-user-tag" style="font-size: 2rem; margin-bottom: 1rem; opacity: 0.3;"></i>
                        <p>No roles assigned to this user.</p>
                        <p style="font-size: 0.875rem;">Use the form above to assign roles.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @endif

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
