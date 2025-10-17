@extends('layouts.app')

@section('title', 'Edit Profile')
@section('description', 'Edit your profile information')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">
                        @if($isAdmin && $user->id !== Auth::user()->id)
                            Edit {{ $user->name }}'s Profile
                        @else
                            Edit Profile
                        @endif
                    </h1>
                    <p class="mt-2 text-gray-600">Update profile information and preferences.</p>
                </div>
                
                @if($isAdmin)
                    <div class="flex space-x-3">
                        <a href="{{ route('profile.show', $user) }}" 
                           class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <i class="fas fa-eye mr-2"></i>View Profile
                        </a>
                        <a href="{{ route('admin.users.show', $user) }}" 
                           class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <i class="fas fa-cog mr-2"></i>Admin Panel
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <form method="POST" action="{{ route('profile.update', $user) }}" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('PUT')

            <!-- Basic Information -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Basic Information</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
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
            <div class="flex justify-end space-x-4">
                <a href="{{ route('profile.show', $user) }}" 
                   class="px-6 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection