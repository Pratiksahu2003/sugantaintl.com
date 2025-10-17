@extends('layouts.admin')

@section('title', 'Role Management - Star JD')
@section('description', 'Manage user roles and permissions')
@section('page-title', 'Role Management')

@section('content')
<div class="fade-in">
    <!-- Header -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <div>
            <h1 style="font-size: 1.875rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.5rem;">
                Role Management
            </h1>
            <p style="color: var(--text-secondary);">Manage user roles and permissions for your platform.</p>
        </div>
        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Create New Role
        </a>
    </div>

    <!-- Roles Table -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Roles</h3>
        </div>
        <div class="card-body">
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Role Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Users Count</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($roles as $role)
                        <tr>
                            <td>
                                <div style="display: flex; align-items: center; gap: 0.75rem;">
                                    <div style="width: 40px; height: 40px; border-radius: 50%; background: var(--primary-color); display: flex; align-items: center; justify-content: center; color: white; font-weight: 600;">
                                        {{ substr($role->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <div style="font-weight: 500;">{{ $role->name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <code style="background: var(--bg-secondary); padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.875rem;">
                                    {{ $role->slug }}
                                </code>
                            </td>
                            <td>{{ $role->description ?? 'No description' }}</td>
                            <td>
                                <span class="badge badge-primary">{{ $role->users_count }} users</span>
                            </td>
                            <td>{{ $role->created_at->format('M d, Y') }}</td>
                            <td>
                                <div style="display: flex; gap: 0.5rem;">
                                    <a href="{{ route('admin.roles.show', $role) }}" class="btn btn-sm btn-secondary" title="View Role">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.roles.users', $role) }}" class="btn btn-sm btn-info" title="View Users">
                                        <i class="fas fa-users"></i>
                                    </a>
                                    <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-sm btn-warning" title="Edit Role">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this role?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete Role">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" style="text-align: center; color: var(--text-secondary); padding: 2rem;">
                                No roles found. <a href="{{ route('admin.roles.create') }}">Create your first role</a>.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Role Statistics -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; margin-top: 2rem;">
        <div class="card">
            <div class="card-body" style="text-align: center;">
                <div style="font-size: 2rem; font-weight: 700; color: var(--primary-color); margin-bottom: 0.5rem;">
                    {{ $roles->count() }}
                </div>
                <div style="color: var(--text-secondary);">Total Roles</div>
            </div>
        </div>
        <div class="card">
            <div class="card-body" style="text-align: center;">
                <div style="font-size: 2rem; font-weight: 700; color: var(--success-color); margin-bottom: 0.5rem;">
                    {{ $roles->sum('users_count') }}
                </div>
                <div style="color: var(--text-secondary);">Total Role Assignments</div>
            </div>
        </div>
    </div>
</div>
@endsection
