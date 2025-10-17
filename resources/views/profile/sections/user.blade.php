<!-- Basic User Content -->
<div class="bg-white rounded-lg shadow-sm p-6">
    <h2 class="text-xl font-semibold text-gray-900 mb-4">Personal Information</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Personal Details -->
        <div>
            <h3 class="text-lg font-medium text-gray-900 mb-3">Personal Details</h3>
            <div class="space-y-2">
                @if($user->profile?->first_name || $user->profile?->last_name)
                    <div class="flex justify-between">
                        <span class="text-gray-600">Full Name:</span>
                        <span class="font-medium">{{ $user->profile->full_name }}</span>
                    </div>
                @endif
                @if($user->profile?->date_of_birth)
                    <div class="flex justify-between">
                        <span class="text-gray-600">Date of Birth:</span>
                        <span class="font-medium">{{ $user->profile->date_of_birth->format('M d, Y') }}</span>
                    </div>
                @endif
                @if($user->profile?->gender)
                    <div class="flex justify-between">
                        <span class="text-gray-600">Gender:</span>
                        <span class="font-medium">{{ ucfirst($user->profile->gender) }}</span>
                    </div>
                @endif
                @if($user->profile?->location)
                    <div class="flex justify-between">
                        <span class="text-gray-600">Location:</span>
                        <span class="font-medium">{{ $user->profile->location }}</span>
                    </div>
                @endif
            </div>
        </div>

        <!-- Account Settings -->
        <div>
            <h3 class="text-lg font-medium text-gray-900 mb-3">Account Settings</h3>
            <div class="space-y-2">
                <div class="flex justify-between">
                    <span class="text-gray-600">Profile Visibility:</span>
                    <span class="font-medium">
                        @if($user->profile?->is_public)
                            <span class="text-green-600">Public</span>
                        @else
                            <span class="text-gray-600">Private</span>
                        @endif
                    </span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Email Verified:</span>
                    <span class="font-medium">
                        @if($user->email_verified_at)
                            <span class="text-green-600">Yes</span>
                        @else
                            <span class="text-red-600">No</span>
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Preferences -->
@if($user->profile?->preferences)
<div class="bg-white rounded-lg shadow-sm p-6">
    <h2 class="text-xl font-semibold text-gray-900 mb-4">Preferences</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach($user->profile->preferences as $key => $value)
            <div>
                <h3 class="font-medium text-gray-900 mb-1">{{ ucfirst(str_replace('_', ' ', $key)) }}</h3>
                <p class="text-gray-600">{{ is_array($value) ? implode(', ', $value) : $value }}</p>
            </div>
        @endforeach
    </div>
</div>
@endif
