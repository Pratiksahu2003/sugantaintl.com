<!-- Influencer Profile Form -->
<div class="bg-white rounded-lg shadow-sm p-6">
    <h2 class="text-xl font-semibold text-gray-900 mb-6">Influencer Information</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="stage_name" class="block text-sm font-medium text-gray-700 mb-2">Stage Name</label>
            <input type="text" name="stage_name" id="stage_name" value="{{ old('stage_name', $user->influencerProfile?->stage_name) }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label for="niche" class="block text-sm font-medium text-gray-700 mb-2">Niche</label>
            <input type="text" name="niche" id="niche" value="{{ old('niche', $user->influencerProfile?->niche) }}" 
                   placeholder="e.g., Fashion, Beauty, Tech, Gaming" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label for="rate_per_post" class="block text-sm font-medium text-gray-700 mb-2">Rate per Post</label>
            <div class="flex">
                <select name="currency" class="px-3 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="USD" {{ old('currency', $user->influencerProfile?->currency) === 'USD' ? 'selected' : '' }}>USD</option>
                    <option value="EUR" {{ old('currency', $user->influencerProfile?->currency) === 'EUR' ? 'selected' : '' }}>EUR</option>
                    <option value="GBP" {{ old('currency', $user->influencerProfile?->currency) === 'GBP' ? 'selected' : '' }}>GBP</option>
                </select>
                <input type="number" name="rate_per_post" id="rate_per_post" step="0.01" min="0" 
                       value="{{ old('rate_per_post', $user->influencerProfile?->rate_per_post) }}" 
                       class="flex-1 px-3 py-2 border border-gray-300 rounded-r-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>

        <div>
            <label for="rate_per_story" class="block text-sm font-medium text-gray-700 mb-2">Rate per Story</label>
            <input type="number" name="rate_per_story" id="rate_per_story" step="0.01" min="0" 
                   value="{{ old('rate_per_story', $user->influencerProfile?->rate_per_story) }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label for="rate_per_video" class="block text-sm font-medium text-gray-700 mb-2">Rate per Video</label>
            <input type="number" name="rate_per_video" id="rate_per_video" step="0.01" min="0" 
                   value="{{ old('rate_per_video', $user->influencerProfile?->rate_per_video) }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
    </div>

    <div class="mt-6">
        <label for="about" class="block text-sm font-medium text-gray-700 mb-2">About</label>
        <textarea name="about" id="about" rows="4" 
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('about', $user->influencerProfile?->about) }}</textarea>
    </div>

    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="profile_image" class="block text-sm font-medium text-gray-700 mb-2">Profile Image</label>
            <input type="file" name="profile_image" id="profile_image" accept="image/*" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @if($user->influencerProfile?->profile_image)
                <p class="mt-1 text-sm text-gray-500">Current: {{ basename($user->influencerProfile->profile_image) }}</p>
            @endif
        </div>

        <div>
            <label for="cover_image" class="block text-sm font-medium text-gray-700 mb-2">Cover Image</label>
            <input type="file" name="cover_image" id="cover_image" accept="image/*" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @if($user->influencerProfile?->cover_image)
                <p class="mt-1 text-sm text-gray-500">Current: {{ basename($user->influencerProfile->cover_image) }}</p>
            @endif
        </div>
    </div>

    <div class="mt-6">
        <label class="flex items-center">
            <input type="checkbox" name="is_available_for_collaboration" value="1" {{ old('is_available_for_collaboration', $user->influencerProfile?->is_available_for_collaboration) ? 'checked' : '' }} 
                   class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
            <span class="ml-2 text-sm text-gray-700">Available for collaboration</span>
        </label>
    </div>

    <div class="mt-6">
        <label class="flex items-center">
            <input type="checkbox" name="is_verified" value="1" {{ old('is_verified', $user->influencerProfile?->is_verified) ? 'checked' : '' }} 
                   class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
            <span class="ml-2 text-sm text-gray-700">Verified influencer</span>
        </label>
    </div>
</div>
