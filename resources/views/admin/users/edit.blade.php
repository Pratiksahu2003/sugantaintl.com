@extends('layouts.admin')

@section('title', 'Edit User - Admin Dashboard')
@section('description', 'Edit user information for Star JD admin panel')
@section('page-title', 'Edit User')

@section('content')
<div class="fade-in">
    <!-- Header -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <div>
            <h1 style="font-size: 1.875rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.5rem;">Edit User</h1>
            <p style="color: var(--text-secondary);">Update user information and account details.</p>
        </div>
        <div style="display: flex; gap: 0.75rem;">
            <a href="{{ route('admin.users.show', $user) }}" class="btn btn-secondary">
                <i class="fas fa-eye"></i>
                View User
            </a>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i>
                Back to Users
            </a>
        </div>
    </div>

    <!-- Edit User Form -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User Information</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.users.update', $user) }}">
                @csrf
                @method('PUT')
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                    <!-- Basic Information -->
                    <div>
                        <h4 style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary); margin-bottom: 1rem;">Basic Information</h4>
                        
                        <div class="form-group">
                            <label for="name" class="form-label">Full Name *</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-input @error('name') error @enderror" required>
                            @error('name')
                                <div class="field-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email Address *</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-input @error('email') error @enderror" required>
                            @error('email')
                                <div class="field-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Account Security -->
                    <div>
                        <h4 style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary); margin-bottom: 1rem;">Account Security</h4>
                        
                        <div class="form-group">
                            <label for="password" class="form-label">New Password (leave blank to keep current)</label>
                            <input type="password" name="password" id="password" class="form-input @error('password') error @enderror">
                            @error('password')
                                <div class="field-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-input">
                        </div>
                    </div>
                </div>

                <!-- Account Status -->
                <div style="margin-top: 2rem;">
                    <h4 style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary); margin-bottom: 1rem;">Account Status</h4>
                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                        <input type="checkbox" name="email_verified" id="email_verified" value="1" {{ old('email_verified', $user->email_verified_at ? '1' : '') ? 'checked' : '' }} class="form-checkbox">
                        <label for="email_verified" class="form-label" style="margin-bottom: 0;">Email verified</label>
                    </div>
                </div>

                <!-- Account Information -->
                <div style="margin-top: 2rem;">
                    <h4 style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary); margin-bottom: 1rem;">Account Information</h4>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                        <div>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                                <span style="color: var(--text-secondary);">Account Created</span>
                                <span style="font-weight: 500;">{{ $user->created_at->format('F j, Y g:i A') }}</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="color: var(--text-secondary);">Last Updated</span>
                                <span style="font-weight: 500;">{{ $user->updated_at->format('F j, Y g:i A') }}</span>
                            </div>
                        </div>
                        <div>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                                <span style="color: var(--text-secondary);">Email Status</span>
                                <span class="badge {{ $user->email_verified_at ? 'badge-success' : 'badge-warning' }}">
                                    {{ $user->email_verified_at ? 'Verified' : 'Pending' }}
                                </span>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="color: var(--text-secondary);">User ID</span>
                                <span style="font-weight: 500;">#{{ $user->id }}</span>
                            </div>
                        </div>
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
                        Update User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
