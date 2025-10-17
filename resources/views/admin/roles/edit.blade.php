@extends('layouts.admin')

@section('title', 'Edit Role - Star JD')
@section('description', 'Edit user role information')
@section('page-title', 'Edit Role')

@section('content')
<div class="fade-in">
    <!-- Header -->
    <div style="margin-bottom: 2rem;">
        <h1 style="font-size: 1.875rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.5rem;">
            Edit Role: {{ $role->name }}
        </h1>
        <p style="color: var(--text-secondary);">Update role information and settings.</p>
    </div>

    <!-- Form -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Role Information</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div style="display: grid; gap: 1.5rem;">
                    <!-- Role Name -->
                    <div>
                        <label for="name" style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: var(--text-primary);">
                            Role Name <span style="color: var(--danger-color);">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            value="{{ old('name', $role->name) }}"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="e.g., Moderator, Editor, Manager"
                            required
                        >
                        @error('name')
                            <div style="color: var(--danger-color); font-size: 0.875rem; margin-top: 0.25rem;">
                                {{ $message }}
                            </div>
                        @enderror
                        <div style="color: var(--text-secondary); font-size: 0.875rem; margin-top: 0.25rem;">
                            A unique name for this role. The slug will be automatically updated.
                        </div>
                    </div>

                    <!-- Current Slug -->
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: var(--text-primary);">
                            Current Slug
                        </label>
                        <code style="background: var(--bg-secondary); padding: 0.5rem; border-radius: 0.25rem; font-size: 0.875rem; display: block;">
                            {{ $role->slug }}
                        </code>
                        <div style="color: var(--text-secondary); font-size: 0.875rem; margin-top: 0.25rem;">
                            This slug is used internally and will be updated when you change the role name.
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: var(--text-primary);">
                            Description
                        </label>
                        <textarea 
                            id="description" 
                            name="description" 
                            rows="4"
                            class="form-control @error('description') is-invalid @enderror"
                            placeholder="Describe what this role can do..."
                        >{{ old('description', $role->description) }}</textarea>
                        @error('description')
                            <div style="color: var(--danger-color); font-size: 0.875rem; margin-top: 0.25rem;">
                                {{ $message }}
                            </div>
                        @enderror
                        <div style="color: var(--text-secondary); font-size: 0.875rem; margin-top: 0.25rem;">
                            Optional description to explain the role's purpose and permissions.
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div style="display: flex; gap: 1rem; margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--border-color);">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Update Role
                    </button>
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i>
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Role Statistics -->
    <div class="card" style="margin-top: 2rem;">
        <div class="card-header">
            <h3 class="card-title">Role Statistics</h3>
        </div>
        <div class="card-body">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">
                <div>
                    <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">Users with this role</div>
                    <div style="font-size: 1.5rem; font-weight: 700; color: var(--primary-color);">
                        {{ $role->users()->count() }}
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
@endsection
