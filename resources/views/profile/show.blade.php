@extends('layouts.app')

@section('title', $user->name . ' - Profile')
@section('description', 'View ' . $user->name . '\'s profile')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Profile Header -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <!-- Cover Image -->
            <div class="h-48 bg-gradient-to-r from-blue-500 to-purple-600 relative">
                @if($profileType === 'influencer' && $user->influencerProfile?->cover_image)
                    <img src="{{ asset('storage/' . $user->influencerProfile->cover_image) }}" 
                         alt="Cover" class="w-full h-full object-cover">
                @elseif($profileType === 'company' && $user->companyProfile?->cover_image)
                    <img src="{{ asset('storage/' . $user->companyProfile->cover_image) }}" 
                         alt="Cover" class="w-full h-full object-cover">
                @endif
                
                <!-- Profile Actions -->
                <div class="absolute top-4 right-4 flex space-x-2">
                    @if(Auth::user()->hasRole('admin') || Auth::user()->id === $user->id)
                        <a href="{{ route('profile.edit', $user) }}" 
                           class="bg-white bg-opacity-90 hover:bg-opacity-100 text-gray-700 px-4 py-2 rounded-lg font-medium transition-all duration-200">
                            <i class="fas fa-edit mr-2"></i>Edit Profile
                        </a>
                    @endif
                    
                    @if(Auth::user()->hasRole('admin'))
                        <a href="{{ route('admin.users.show', $user) }}" 
                           class="bg-blue-500 bg-opacity-90 hover:bg-opacity-100 text-white px-4 py-2 rounded-lg font-medium transition-all duration-200">
                            <i class="fas fa-cog mr-2"></i>Admin Panel
                        </a>
                    @endif
                </div>
            </div>

            <!-- Profile Info -->
            <div class="px-6 pb-6">
                <div class="flex flex-col md:flex-row items-start md:items-end -mt-16 relative z-10">
                    <!-- Avatar -->
                    <div class="flex-shrink-0">
                        <div class="w-32 h-32 rounded-full border-4 border-white shadow-lg overflow-hidden">
                            @if($profileType === 'influencer' && $user->influencerProfile?->profile_image)
                                <img src="{{ asset('storage/' . $user->influencerProfile->profile_image) }}" 
                                     alt="{{ $user->name }}" class="w-full h-full object-cover">
                            @elseif($profileType === 'company' && $user->companyProfile?->logo)
                                <img src="{{ asset('storage/' . $user->companyProfile->logo) }}" 
                                     alt="{{ $user->name }}" class="w-full h-full object-cover">
                            @elseif($user->profile?->avatar)
                                <img src="{{ asset('storage/' . $user->profile->avatar) }}" 
                                     alt="{{ $user->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gray-300 flex items-center justify-center">
                                    <i class="fas fa-user text-gray-500 text-4xl"></i>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Basic Info -->
                    <div class="ml-0 md:ml-6 mt-4 md:mt-0 flex-1">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900">
                                    @if($profileType === 'influencer' && $user->influencerProfile?->stage_name)
                                        {{ $user->influencerProfile->stage_name }}
                                    @elseif($profileType === 'company' && $user->companyProfile?->company_name)
                                        {{ $user->companyProfile->company_name }}
                                    @else
                                        {{ $user->name }}
                                    @endif
                                </h1>
                                
                                @if($profileType === 'influencer' && $user->influencerProfile?->niche)
                                    <p class="text-lg text-gray-600 mt-1">{{ $user->influencerProfile->niche }} Influencer</p>
                                @elseif($profileType === 'company' && $user->companyProfile?->industry)
                                    <p class="text-lg text-gray-600 mt-1">{{ $user->companyProfile->industry }} Company</p>
                                @endif

                                <!-- Role Badges -->
                                <div class="flex flex-wrap gap-2 mt-2">
                                    @foreach($user->roles as $role)
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                            @if($role->slug === 'admin') bg-red-100 text-red-800
                                            @elseif($role->slug === 'influencer') bg-pink-100 text-pink-800
                                            @elseif($role->slug === 'company') bg-blue-100 text-blue-800
                                            @else bg-gray-100 text-gray-800 @endif">
                                            {{ $role->name }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Verification Badge -->
                            @if(($profileType === 'influencer' && $user->influencerProfile?->is_verified) || 
                                ($profileType === 'company' && $user->companyProfile?->is_verified))
                                <div class="mt-4 md:mt-0">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                        <i class="fas fa-check-circle mr-1"></i>Verified
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Content -->
        <div class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                
                <!-- About Section -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">About</h2>
                    <div class="prose max-w-none">
                        @if($profileType === 'influencer' && $user->influencerProfile?->about)
                            <p class="text-gray-700">{{ $user->influencerProfile->about }}</p>
                        @elseif($profileType === 'company' && $user->companyProfile?->description)
                            <p class="text-gray-700">{{ $user->companyProfile->description }}</p>
                        @elseif($user->profile?->bio)
                            <p class="text-gray-700">{{ $user->profile->bio }}</p>
                        @else
                            <p class="text-gray-500 italic">No bio available</p>
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
            <div class="space-y-6">
                
                <!-- Contact Information -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Contact Information</h3>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-gray-400 mr-3"></i>
                            <span class="text-gray-700">{{ $user->email }}</span>
                        </div>
                        
                        @if($user->profile?->phone)
                            <div class="flex items-center">
                                <i class="fas fa-phone text-gray-400 mr-3"></i>
                                <span class="text-gray-700">{{ $user->profile->phone }}</span>
                            </div>
                        @endif
                        
                        @if($user->profile?->website)
                            <div class="flex items-center">
                                <i class="fas fa-globe text-gray-400 mr-3"></i>
                                <a href="{{ $user->profile->website }}" target="_blank" 
                                   class="text-blue-600 hover:text-blue-800">{{ $user->profile->website }}</a>
                            </div>
                        @endif
                        
                        @if($user->profile?->location)
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt text-gray-400 mr-3"></i>
                                <span class="text-gray-700">{{ $user->profile->location }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Social Links -->
                @if($user->profile?->social_links)
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Social Media</h3>
                        <div class="space-y-3">
                            @foreach($user->profile->social_links as $platform => $url)
                                @if($url)
                                    <div class="flex items-center">
                                        <i class="fab fa-{{ strtolower($platform) }} text-gray-400 mr-3"></i>
                                        <a href="{{ $url }}" target="_blank" 
                                           class="text-blue-600 hover:text-blue-800">{{ ucfirst($platform) }}</a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Account Stats -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Account Information</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Member since</span>
                            <span class="text-gray-900">{{ $user->created_at->format('M Y') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Last updated</span>
                            <span class="text-gray-900">{{ $user->updated_at->format('M d, Y') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Email verified</span>
                            <span class="text-gray-900">
                                @if($user->email_verified_at)
                                    <i class="fas fa-check-circle text-green-500"></i> Yes
                                @else
                                    <i class="fas fa-times-circle text-red-500"></i> No
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
