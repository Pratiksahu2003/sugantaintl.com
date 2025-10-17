<!-- Company-Specific Content -->
<div class="bg-white rounded-lg shadow-sm p-6">
    <h2 class="text-xl font-semibold text-gray-900 mb-4">Company Information</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Company Details -->
        <div>
            <h3 class="text-lg font-medium text-gray-900 mb-3">Company Details</h3>
            <div class="space-y-2">
                @if($user->companyProfile?->legal_name)
                    <div class="flex justify-between">
                        <span class="text-gray-600">Legal Name:</span>
                        <span class="font-medium">{{ $user->companyProfile->legal_name }}</span>
                    </div>
                @endif
                @if($user->companyProfile?->company_size)
                    <div class="flex justify-between">
                        <span class="text-gray-600">Company Size:</span>
                        <span class="font-medium">{{ $user->companyProfile->company_size }}</span>
                    </div>
                @endif
                @if($user->companyProfile?->founded_year)
                    <div class="flex justify-between">
                        <span class="text-gray-600">Founded:</span>
                        <span class="font-medium">{{ $user->companyProfile->founded_year }}</span>
                    </div>
                @endif
                @if($user->companyProfile?->headquarters)
                    <div class="flex justify-between">
                        <span class="text-gray-600">Headquarters:</span>
                        <span class="font-medium">{{ $user->companyProfile->headquarters }}</span>
                    </div>
                @endif
            </div>
        </div>

        <!-- Budget Range -->
        <div>
            <h3 class="text-lg font-medium text-gray-900 mb-3">Budget Range</h3>
            <div class="space-y-2">
                @if($user->companyProfile?->budget_range_min && $user->companyProfile?->budget_range_max)
                    <div class="flex justify-between">
                        <span class="text-gray-600">Budget Range:</span>
                        <span class="font-medium">
                            {{ $user->companyProfile->currency }} {{ number_format($user->companyProfile->budget_range_min) }} - 
                            {{ number_format($user->companyProfile->budget_range_max) }}
                        </span>
                    </div>
                @endif
                @if($user->companyProfile?->website)
                    <div class="flex justify-between">
                        <span class="text-gray-600">Website:</span>
                        <a href="{{ $user->companyProfile->website }}" target="_blank" 
                           class="font-medium text-blue-600 hover:text-blue-800">{{ $user->companyProfile->website }}</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Brand Values -->
@if($user->companyProfile?->brand_values)
<div class="bg-white rounded-lg shadow-sm p-6">
    <h2 class="text-xl font-semibold text-gray-900 mb-4">Brand Values</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach($user->companyProfile->brand_values as $key => $value)
            <div>
                <h3 class="font-medium text-gray-900 mb-1">{{ ucfirst(str_replace('_', ' ', $key)) }}</h3>
                <p class="text-gray-600">{{ $value }}</p>
            </div>
        @endforeach
    </div>
</div>
@endif

<!-- Target Audience -->
@if($user->companyProfile?->target_audience)
<div class="bg-white rounded-lg shadow-sm p-6">
    <h2 class="text-xl font-semibold text-gray-900 mb-4">Target Audience</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach($user->companyProfile->target_audience as $key => $value)
            <div>
                <h3 class="font-medium text-gray-900 mb-1">{{ ucfirst(str_replace('_', ' ', $key)) }}</h3>
                <p class="text-gray-600">{{ is_array($value) ? implode(', ', $value) : $value }}</p>
            </div>
        @endforeach
    </div>
</div>
@endif

<!-- Marketing Preferences -->
@if($user->companyProfile?->marketing_preferences)
<div class="bg-white rounded-lg shadow-sm p-6">
    <h2 class="text-xl font-semibold text-gray-900 mb-4">Marketing Preferences</h2>
    <div class="space-y-3">
        @foreach($user->companyProfile->marketing_preferences as $key => $value)
            <div>
                <h3 class="font-medium text-gray-900 mb-1">{{ ucfirst(str_replace('_', ' ', $key)) }}</h3>
                <p class="text-gray-600">{{ is_array($value) ? implode(', ', $value) : $value }}</p>
            </div>
        @endforeach
    </div>
</div>
@endif

<!-- Company Social Media -->
@if($user->companyProfile?->social_media)
<div class="bg-white rounded-lg shadow-sm p-6">
    <h2 class="text-xl font-semibold text-gray-900 mb-4">Company Social Media</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($user->companyProfile->social_media as $platform => $data)
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
