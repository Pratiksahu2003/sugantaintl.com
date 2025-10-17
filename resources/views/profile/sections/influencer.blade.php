<!-- Influencer-Specific Content -->
<div class="bg-white rounded-lg shadow-sm p-6">
    <h2 class="text-xl font-semibold text-gray-900 mb-4">Influencer Details</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Rates -->
        <div>
            <h3 class="text-lg font-medium text-gray-900 mb-3">Rates</h3>
            <div class="space-y-2">
                @if($user->influencerProfile?->rate_per_post)
                    <div class="flex justify-between">
                        <span class="text-gray-600">Post Rate:</span>
                        <span class="font-medium">{{ $user->influencerProfile->currency }} {{ number_format($user->influencerProfile->rate_per_post, 2) }}</span>
                    </div>
                @endif
                @if($user->influencerProfile?->rate_per_story)
                    <div class="flex justify-between">
                        <span class="text-gray-600">Story Rate:</span>
                        <span class="font-medium">{{ $user->influencerProfile->currency }} {{ number_format($user->influencerProfile->rate_per_story, 2) }}</span>
                    </div>
                @endif
                @if($user->influencerProfile?->rate_per_video)
                    <div class="flex justify-between">
                        <span class="text-gray-600">Video Rate:</span>
                        <span class="font-medium">{{ $user->influencerProfile->currency }} {{ number_format($user->influencerProfile->rate_per_video, 2) }}</span>
                    </div>
                @endif
            </div>
        </div>

        <!-- Availability -->
        <div>
            <h3 class="text-lg font-medium text-gray-900 mb-3">Availability</h3>
            <div class="space-y-2">
                <div class="flex items-center">
                    <span class="text-gray-600 mr-2">Status:</span>
                    @if($user->influencerProfile?->is_available_for_collaboration)
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            <i class="fas fa-check-circle mr-1"></i>Available
                        </span>
                    @else
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                            <i class="fas fa-times-circle mr-1"></i>Not Available
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Social Platforms -->
@if($user->influencerProfile?->social_platforms)
<div class="bg-white rounded-lg shadow-sm p-6">
    <h2 class="text-xl font-semibold text-gray-900 mb-4">Social Platforms</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($user->influencerProfile->social_platforms as $platform => $data)
            @if($data && isset($data['username']))
                <div class="border rounded-lg p-4">
                    <div class="flex items-center mb-2">
                        <i class="fab fa-{{ strtolower($platform) }} text-2xl mr-3"></i>
                        <h3 class="font-medium text-gray-900">{{ ucfirst($platform) }}</h3>
                    </div>
                    <p class="text-sm text-gray-600 mb-1">@{{ $data['username'] }}</p>
                    @if(isset($data['followers']))
                        <p class="text-sm text-gray-500">{{ number_format($data['followers']) }} followers</p>
                    @endif
                </div>
            @endif
        @endforeach
    </div>
</div>
@endif

<!-- Content Categories -->
@if($user->influencerProfile?->content_categories)
<div class="bg-white rounded-lg shadow-sm p-6">
    <h2 class="text-xl font-semibold text-gray-900 mb-4">Content Categories</h2>
    <div class="flex flex-wrap gap-2">
        @foreach($user->influencerProfile->content_categories as $category)
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
                {{ $category }}
            </span>
        @endforeach
    </div>
</div>
@endif

<!-- Engagement Stats -->
@if($user->influencerProfile?->engagement_stats)
<div class="bg-white rounded-lg shadow-sm p-6">
    <h2 class="text-xl font-semibold text-gray-900 mb-4">Engagement Statistics</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach($user->influencerProfile->engagement_stats as $stat => $value)
            <div class="text-center">
                <div class="text-2xl font-bold text-gray-900">{{ $value }}%</div>
                <div class="text-sm text-gray-600">{{ ucfirst(str_replace('_', ' ', $stat)) }}</div>
            </div>
        @endforeach
    </div>
</div>
@endif
