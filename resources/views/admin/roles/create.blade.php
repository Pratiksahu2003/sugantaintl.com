@extends('layouts.admin')

@section('title', 'Create Role - Star JD')
@section('description', 'Create a new user role')
@section('page-title', 'Create Role')

@section('content')
<div class="fade-in">
    <!-- Header -->
    <div style="margin-bottom: 2rem;">
        <h1 style="font-size: 1.875rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.5rem;">
            Create New Role
        </h1>
        <p style="color: var(--text-secondary);">Add a new role to your system.</p>
    </div>

    <!-- Form -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Role Information</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.roles.store') }}" method="POST">
                @csrf
                
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
                            value="{{ old('name') }}"
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
                            A unique name for this role. The slug will be automatically generated.
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
                        >{{ old('description') }}</textarea>
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
                        Create Role
                    </button>
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i>
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Help Section -->
    <div class="card" style="margin-top: 2rem;">
        <div class="card-header">
            <h3 class="card-title">Role Guidelines</h3>
        </div>
        <div class="card-body">
            <div style="display: grid; gap: 1rem;">
                <div>
                    <h4 style="color: var(--text-primary); margin-bottom: 0.5rem;">Role Naming</h4>
                    <ul style="color: var(--text-secondary); margin: 0; padding-left: 1.5rem;">
                        <li>Use clear, descriptive names (e.g., "Content Manager", "Customer Support")</li>
                        <li>Avoid generic terms like "User" or "Member"</li>
                        <li>Consider your organization's hierarchy and responsibilities</li>
                    </ul>
                </div>
                <div>
                    <h4 style="color: var(--text-primary); margin-bottom: 0.5rem;">Best Practices</h4>
                    <ul style="color: var(--text-secondary); margin: 0; padding-left: 1.5rem;">
                        <li>Keep role names consistent with your business structure</li>
                        <li>Write detailed descriptions to help users understand permissions</li>
                        <li>Start with basic roles and add more specific ones as needed</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
