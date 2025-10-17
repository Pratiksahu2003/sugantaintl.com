@extends('layouts.admin')

@section('title', 'Create User - Admin Dashboard')
@section('description', 'Create new user for Star JD admin panel')
@section('page-title', 'Create User')

@section('content')
<div class="fade-in">
    <!-- Header -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <div>
            <h1 style="font-size: 1.875rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.5rem;">Create New User</h1>
            <p style="color: var(--text-secondary);">Add a new user to the system.</p>
        </div>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>
            Back to Users
        </a>
    </div>

    <!-- Create User Form -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User Information</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.users.store') }}">
                @csrf
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                    <!-- Basic Information -->
                    <div>
                        <h4 style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary); margin-bottom: 1rem;">Basic Information</h4>
                        
                        <div class="form-group">
                            <label for="name" class="form-label">Full Name *</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-input @error('name') error @enderror" required>
                            @error('name')
                                <div class="field-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email Address *</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-input @error('email') error @enderror" required>
                            @error('email')
                                <div class="field-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Account Security -->
                    <div>
                        <h4 style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary); margin-bottom: 1rem;">Account Security</h4>
                        
                        <div class="form-group">
                            <label for="password" class="form-label">Password *</label>
                            <input type="password" name="password" id="password" class="form-input @error('password') error @enderror" required>
                            @error('password')
                                <div class="field-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">Confirm Password *</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-input" required>
                        </div>
                    </div>
                </div>

                <!-- Account Status -->
                <div style="margin-top: 2rem;">
                    <h4 style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary); margin-bottom: 1rem;">Account Status</h4>
                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                        <input type="checkbox" name="email_verified" id="email_verified" value="1" {{ old('email_verified') ? 'checked' : '' }} class="form-checkbox">
                        <label for="email_verified" class="form-label" style="margin-bottom: 0;">Mark email as verified</label>
                    </div>
                </div>

                <!-- Role Assignment -->
                <div style="margin-top: 2rem;">
                    <h4 style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary); margin-bottom: 1rem;">Role Assignment</h4>
                    <div class="form-group">
                        <label class="form-label">Assign Roles</label>
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 0.75rem;">
                            @foreach($roles as $role)
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    <input type="checkbox" name="roles[]" id="role_{{ $role->id }}" value="{{ $role->id }}" {{ in_array($role->id, old('roles', [])) ? 'checked' : '' }} class="form-checkbox">
                                    <label for="role_{{ $role->id }}" class="form-label" style="margin-bottom: 0;">
                                        <span style="font-weight: 500;">{{ $role->name }}</span>
                                        @if($role->description)
                                            <br><span style="font-size: 0.875rem; color: var(--text-secondary);">{{ $role->description }}</span>
                                        @endif
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('roles')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                        @error('roles.*')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div style="margin-top: 2rem; display: flex; justify-content: flex-end; gap: 0.75rem;">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i>
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Create User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
