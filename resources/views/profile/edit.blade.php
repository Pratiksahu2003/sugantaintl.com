@extends('layouts.admin')

@section('title', 'Edit Profile')
@section('description', 'Edit profile information')
@section('page-title', 'Edit Profile')

@section('content')
<div class="fade-in">
    <!-- Header -->
    <div style="margin-bottom: 2rem;">
        <div style="display: flex; align-items: center; justify-content: space-between;">
            <div>
                <h1 style="font-size: 1.875rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.5rem;">
                    @if($isAdmin && $user->id !== Auth::user()->id)
                        Edit {{ $user->name }}'s Profile
                    @else
                        Edit Profile
                    @endif
                </h1>
                <p style="color: var(--text-secondary);">Update profile information and preferences.</p>
            </div>
            
            @if($isAdmin)
                <div style="display: flex; gap: 0.75rem;">
                    <a href="{{ route('profile.show', $user) }}" 
                       style="padding: 0.5rem 1rem; border: 1px solid var(--border-color); border-radius: 0.375rem; color: var(--text-primary); text-decoration: none; transition: all 0.2s;">
                        <i class="fas fa-eye" style="margin-right: 0.5rem;"></i>View Profile
                    </a>
                    <a href="{{ route('admin.users.show', $user) }}" 
                       style="padding: 0.5rem 1rem; background: var(--primary-color); color: white; border-radius: 0.375rem; text-decoration: none; transition: all 0.2s;">
                        <i class="fas fa-cog" style="margin-right: 0.5rem;"></i>Admin Panel
                    </a>
                </div>
            @endif
        </div>
    </div>

    <form method="POST" action="{{ route('profile.update', $user) }}{{ $isAdmin && $user->id !== Auth::user()->id ? '?user_id=' . $user->id : '' }}" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 2rem;">
        @csrf
        @method('PUT')
        
        @if($isAdmin && $user->id !== Auth::user()->id)
            <input type="hidden" name="user_id" value="{{ $user->id }}">
        @endif

        <!-- Basic Information -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Basic Information</h3>
            </div>
            <div class="card-body">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div>
                        <label for="name" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Full Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" 
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                        @error('name')
                            <p style="margin-top: 0.25rem; font-size: 0.875rem; color: var(--danger-color);">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" 
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                        @error('email')
                            <p style="margin-top: 0.25rem; font-size: 0.875rem; color: var(--danger-color);">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

            <!-- Role-Specific Forms -->
            @if($profileType === 'influencer')
                @include('profile.forms.influencer')
            @elseif($profileType === 'company')
                @include('profile.forms.company')
            @else
                @include('profile.forms.user')
            @endif

            <!-- Admin Section -->
            @if($isAdmin)
                @include('profile.forms.admin')
            @endif

        <!-- Submit Buttons -->
        <div style="display: flex; justify-content: flex-end; gap: 1rem;">
            <a href="{{ route('profile.show', $user) }}" 
               style="padding: 0.75rem 1.5rem; border: 1px solid var(--border-color); border-radius: 0.375rem; color: var(--text-primary); text-decoration: none; transition: all 0.2s;">
                Cancel
            </a>
            <button type="submit" 
                    style="padding: 0.75rem 1.5rem; background: var(--primary-color); color: white; border: none; border-radius: 0.375rem; font-weight: 500; transition: all 0.2s;">
                Save Changes
            </button>
        </div>
    </form>
</div>
@endsection