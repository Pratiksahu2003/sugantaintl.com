@extends('layouts.admin')

@section('title', $user->name . ' - Profile')
@section('description', 'View ' . $user->name . '\'s profile')
@section('page-title', 'Profile: ' . $user->name)

@section('content')
<div class="fade-in">
    <!-- Profile Header -->
    <div class="card" style="margin-bottom: 2rem;">
        <!-- Cover Image -->
        <div style="height: 12rem; background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); position: relative; overflow: hidden;">
            @if($profileType === 'influencer' && $user->influencerProfile?->cover_image)
                <img src="{{ asset('storage/' . $user->influencerProfile->cover_image) }}" 
                     alt="Cover" style="width: 100%; height: 100%; object-fit: cover;">
            @elseif($profileType === 'company' && $user->companyProfile?->cover_image)
                <img src="{{ asset('storage/' . $user->companyProfile->cover_image) }}" 
                     alt="Cover" style="width: 100%; height: 100%; object-fit: cover;">
            @endif
            
            <!-- Profile Actions -->
            <div style="position: absolute; top: 1rem; right: 1rem; display: flex; gap: 0.5rem;">
                @if(Auth::user()->hasRole('admin') || Auth::user()->id === $user->id)
                    <a href="{{ route('profile.edit', $user) }}" 
                       style="background: rgba(255, 255, 255, 0.9); color: var(--text-primary); padding: 0.5rem 1rem; border-radius: 0.5rem; font-weight: 500; transition: all 0.2s; text-decoration: none;">
                        <i class="fas fa-edit" style="margin-right: 0.5rem;"></i>Edit Profile
                    </a>
                @endif
                
                @if(Auth::user()->hasRole('admin'))
                    <a href="{{ route('admin.users.show', $user) }}" 
                       style="background: var(--primary-color); color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; font-weight: 500; transition: all 0.2s; text-decoration: none;">
                        <i class="fas fa-cog" style="margin-right: 0.5rem;"></i>Admin Panel
                    </a>
                @endif
            </div>
        </div>

        <!-- Profile Info -->
        <div style="padding: 1.5rem;">
            <div style="display: flex; flex-direction: column; align-items: flex-start; margin-top: -4rem; position: relative; z-index: 10;">
                <!-- Avatar -->
                <div style="flex-shrink: 0;">
                    <div style="width: 8rem; height: 8rem; border-radius: 50%; border: 4px solid white; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); overflow: hidden;">
                        @if($profileType === 'influencer' && $user->influencerProfile?->profile_image)
                            <img src="{{ asset('storage/' . $user->influencerProfile->profile_image) }}" 
                                 alt="{{ $user->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @elseif($profileType === 'company' && $user->companyProfile?->logo)
                            <img src="{{ asset('storage/' . $user->companyProfile->logo) }}" 
                                 alt="{{ $user->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @elseif($user->profile?->avatar)
                            <img src="{{ asset('storage/' . $user->profile->avatar) }}" 
                                 alt="{{ $user->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <div style="width: 100%; height: 100%; background: var(--content-bg); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-user" style="color: var(--text-secondary); font-size: 2rem;"></i>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Basic Info -->
                <div style="margin-left: 0; margin-top: 1rem; flex: 1;">
                    <div style="display: flex; flex-direction: column; align-items: flex-start; justify-content: space-between;">
                        <div>
                            <h1 style="font-size: 1.875rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.25rem;">
                                @if($profileType === 'influencer' && $user->influencerProfile?->stage_name)
                                    {{ $user->influencerProfile->stage_name }}
                                @elseif($profileType === 'company' && $user->companyProfile?->company_name)
                                    {{ $user->companyProfile->company_name }}
                                @else
                                    {{ $user->name }}
                                @endif
                            </h1>
                            
                            @if($profileType === 'influencer' && $user->influencerProfile?->niche)
                                <p style="font-size: 1.125rem; color: var(--text-secondary); margin-bottom: 0.5rem;">{{ $user->influencerProfile->niche }} Influencer</p>
                            @elseif($profileType === 'company' && $user->companyProfile?->industry)
                                <p style="font-size: 1.125rem; color: var(--text-secondary); margin-bottom: 0.5rem;">{{ $user->companyProfile->industry }} Company</p>
                            @endif

                            <!-- Role Badges -->
                            <div style="display: flex; flex-wrap: wrap; gap: 0.5rem; margin-bottom: 1rem;">
                                @foreach($user->roles as $role)
                                    <span style="display: inline-flex; align-items: center; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.875rem; font-weight: 500;
                                        @if($role->slug === 'admin') background: #fef2f2; color: #dc2626;
                                        @elseif($role->slug === 'influencer') background: #fdf2f8; color: #be185d;
                                        @elseif($role->slug === 'company') background: #eff6ff; color: #2563eb;
                                        @else background: #f3f4f6; color: #374151; @endif">
                                        {{ $role->name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        <!-- Verification Badge -->
                        @if(($profileType === 'influencer' && $user->influencerProfile?->is_verified) || 
                            ($profileType === 'company' && $user->companyProfile?->is_verified))
                            <div style="margin-top: 1rem;">
                                <span style="display: inline-flex; align-items: center; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.875rem; font-weight: 500; background: #f0fdf4; color: #166534;">
                                    <i class="fas fa-check-circle" style="margin-right: 0.25rem;"></i>Verified
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Content -->
    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
        <!-- Main Content -->
        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            
            <!-- About Section -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">About</h3>
                </div>
                <div class="card-body">
                    @if($profileType === 'influencer' && $user->influencerProfile?->about)
                        <p style="color: var(--text-primary);">{{ $user->influencerProfile->about }}</p>
                    @elseif($profileType === 'company' && $user->companyProfile?->description)
                        <p style="color: var(--text-primary);">{{ $user->companyProfile->description }}</p>
                    @elseif($user->profile?->bio)
                        <p style="color: var(--text-primary);">{{ $user->profile->bio }}</p>
                    @else
                        <p style="color: var(--text-secondary); font-style: italic;">No bio available</p>
                    @endif
                </div>
            </div>

                <!-- Role-Specific Content -->
                @if($profileType === 'influencer')
                    @include('profile.sections.influencer')
                @elseif($profileType === 'company')
                    @include('profile.sections.company')
                @else
                    @include('profile.sections.user')
                @endif

            </div>

        <!-- Sidebar -->
        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            
            <!-- Contact Information -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Contact Information</h3>
                </div>
                <div class="card-body">
                    <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                        <div style="display: flex; align-items: center;">
                            <i class="fas fa-envelope" style="color: var(--text-secondary); margin-right: 0.75rem;"></i>
                            <span style="color: var(--text-primary);">{{ $user->email }}</span>
                        </div>
                        
                        @if($user->profile?->phone)
                            <div style="display: flex; align-items: center;">
                                <i class="fas fa-phone" style="color: var(--text-secondary); margin-right: 0.75rem;"></i>
                                <span style="color: var(--text-primary);">{{ $user->profile->phone }}</span>
                            </div>
                        @endif
                        
                        @if($user->profile?->website)
                            <div style="display: flex; align-items: center;">
                                <i class="fas fa-globe" style="color: var(--text-secondary); margin-right: 0.75rem;"></i>
                                <a href="{{ $user->profile->website }}" target="_blank" 
                                   style="color: var(--primary-color); text-decoration: none;">{{ $user->profile->website }}</a>
                            </div>
                        @endif
                        
                        @if($user->profile?->location)
                            <div style="display: flex; align-items: center;">
                                <i class="fas fa-map-marker-alt" style="color: var(--text-secondary); margin-right: 0.75rem;"></i>
                                <span style="color: var(--text-primary);">{{ $user->profile->location }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Social Links -->
            @if($user->profile?->social_links)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Social Media</h3>
                    </div>
                    <div class="card-body">
                        <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                            @foreach($user->profile->social_links as $platform => $url)
                                @if($url)
                                    <div style="display: flex; align-items: center;">
                                        <i class="fab fa-{{ strtolower($platform) }}" style="color: var(--text-secondary); margin-right: 0.75rem;"></i>
                                        <a href="{{ $url }}" target="_blank" 
                                           style="color: var(--primary-color); text-decoration: none;">{{ ucfirst($platform) }}</a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Account Stats -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Account Information</h3>
                </div>
                <div class="card-body">
                    <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                        <div style="display: flex; justify-content: space-between;">
                            <span style="color: var(--text-secondary);">Member since</span>
                            <span style="color: var(--text-primary); font-weight: 500;">{{ $user->created_at->format('M Y') }}</span>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <span style="color: var(--text-secondary);">Last updated</span>
                            <span style="color: var(--text-primary); font-weight: 500;">{{ $user->updated_at->format('M d, Y') }}</span>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <span style="color: var(--text-secondary);">Email verified</span>
                            <span style="color: var(--text-primary); font-weight: 500;">
                                @if($user->email_verified_at)
                                    <i class="fas fa-check-circle" style="color: var(--success-color);"></i> Yes
                                @else
                                    <i class="fas fa-times-circle" style="color: var(--danger-color);"></i> No
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
