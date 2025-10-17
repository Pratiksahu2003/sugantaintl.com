@extends('layouts.admin')

@section('title', 'View Role - Star JD')
@section('description', 'View role details and assigned users')
@section('page-title', 'View Role')

@section('content')
<div class="fade-in">
    <!-- Header -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <div>
            <h1 style="font-size: 1.875rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.5rem;">
                {{ $role->name }}
            </h1>
            <p style="color: var(--text-secondary);">Role details and assigned users.</p>
        </div>
        <div style="display: flex; gap: 0.75rem;">
            <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i>
                Edit Role
            </a>
            <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i>
                Back to Roles
            </a>
        </div>
    </div>

    <!-- Role Information -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Role Information</h3>
        </div>
        <div class="card-body">
            <div style="display: grid; gap: 1.5rem;">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <div style="width: 60px; height: 60px; border-radius: 50%; background: var(--primary-color); display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 1.5rem;">
                        {{ substr($role->name, 0, 1) }}
                    </div>
                    <div>
                        <h2 style="margin: 0; color: var(--text-primary);">{{ $role->name }}</h2>
                        <code style="background: var(--bg-secondary); padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.875rem;">
                            {{ $role->slug }}
                        </code>
                    </div>
                </div>
                
                @if($role->description)
                <div>
                    <h4 style="color: var(--text-primary); margin-bottom: 0.5rem;">Description</h4>
                    <p style="color: var(--text-secondary); margin: 0;">{{ $role->description }}</p>
                </div>
                @endif

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">
                    <div>
                        <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">Users with this role</div>
                        <div style="font-size: 1.5rem; font-weight: 700; color: var(--primary-color);">
                            {{ $role->users->count() }}
                        </div>
                    </div>
                    <div>
                        <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">Created</div>
                        <div style="font-weight: 500;">{{ $role->created_at->format('M d, Y') }}</div>
                    </div>
                    <div>
                        <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">Last Updated</div>
                        <div style="font-weight: 500;">{{ $role->updated_at->format('M d, Y') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Assigned Users -->
    <div class="card" style="margin-top: 2rem;">
        <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
            <h3 class="card-title">Assigned Users ({{ $role->users->count() }})</h3>
            <a href="{{ route('admin.roles.users', $role) }}" class="btn btn-primary btn-sm">
                <i class="fas fa-users"></i>
                Manage Users
            </a>
        </div>
        <div class="card-body">
            @if($role->users->count() > 0)
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Email</th>
                                <th>Joined</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($role->users->take(10) as $user)
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
                                <td>{{ $user->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div style="display: flex; gap: 0.5rem;">
                                        <a href="{{ route('admin.users.show', $user) }}" class="btn btn-sm btn-secondary" title="View User">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <form action="{{ route('admin.roles.remove-user', [$role, $user]) }}" method="POST" style="display: inline;" onsubmit="return confirm('Remove this user from the {{ $role->name }} role?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Remove Role">
                                                <i class="fas fa-user-minus"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if($role->users->count() > 10)
                    <div style="margin-top: 1rem; text-align: center;">
                        <a href="{{ route('admin.roles.users', $role) }}" class="btn btn-primary">
                            <i class="fas fa-users"></i>
                            View All {{ $role->users->count() }} Users
                        </a>
                    </div>
                @endif
            @else
                <div style="text-align: center; color: var(--text-secondary); padding: 2rem;">
                    <i class="fas fa-users" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.3;"></i>
                    <p>No users assigned to this role yet.</p>
                    <a href="{{ route('admin.roles.users', $role) }}" class="btn btn-primary">
                        <i class="fas fa-user-plus"></i>
                        Assign Users
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
