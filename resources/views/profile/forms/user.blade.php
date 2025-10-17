<!-- Basic User Profile Form -->
<div class="bg-white rounded-lg shadow-sm p-6">
    <h2 class="text-xl font-semibold text-gray-900 mb-6">Personal Information</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
            <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $user->profile?->first_name) }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
            <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $user->profile?->last_name) }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
            <input type="tel" name="phone" id="phone" value="{{ old('phone', $user->profile?->phone) }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label for="date_of_birth" class="block text-sm font-medium text-gray-700 mb-2">Date of Birth</label>
            <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $user->profile?->date_of_birth?->format('Y-m-d')) }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label for="gender" class="block text-sm font-medium text-gray-700 mb-2">Gender</label>
            <select name="gender" id="gender" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Select Gender</option>
                <option value="male" {{ old('gender', $user->profile?->gender) === 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender', $user->profile?->gender) === 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ old('gender', $user->profile?->gender) === 'other' ? 'selected' : '' }}>Other</option>
                <option value="prefer_not_to_say" {{ old('gender', $user->profile?->gender) === 'prefer_not_to_say' ? 'selected' : '' }}>Prefer not to say</option>
            </select>
        </div>

        <div>
            <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Location</label>
            <input type="text" name="location" id="location" value="{{ old('location', $user->profile?->location) }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
    </div>

    <div class="mt-6">
        <label for="bio" class="block text-sm font-medium text-gray-700 mb-2">Bio</label>
        <textarea name="bio" id="bio" rows="4" 
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('bio', $user->profile?->bio) }}</textarea>
    </div>

    <div class="mt-6">
        <label for="website" class="block text-sm font-medium text-gray-700 mb-2">Website</label>
        <input type="url" name="website" id="website" value="{{ old('website', $user->profile?->website) }}" 
               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div class="mt-6">
        <label for="avatar" class="block text-sm font-medium text-gray-700 mb-2">Profile Picture</label>
        <input type="file" name="avatar" id="avatar" accept="image/*" 
               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        @if($user->profile?->avatar)
            <p class="mt-1 text-sm text-gray-500">Current: {{ basename($user->profile->avatar) }}</p>
        @endif
    </div>

    <div class="mt-6">
        <label class="flex items-center">
            <input type="checkbox" name="is_public" value="1" {{ old('is_public', $user->profile?->is_public) ? 'checked' : '' }} 
                   class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
            <span class="ml-2 text-sm text-gray-700">Make profile public</span>
        </label>
    </div>
</div>
