<!-- Company Profile Form -->
<div class="bg-white rounded-lg shadow-sm p-6">
    <h2 class="text-xl font-semibold text-gray-900 mb-6">Company Information</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="company_name" class="block text-sm font-medium text-gray-700 mb-2">Company Name *</label>
            <input type="text" name="company_name" id="company_name" value="{{ old('company_name', $user->companyProfile?->company_name) }}" required
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label for="legal_name" class="block text-sm font-medium text-gray-700 mb-2">Legal Name</label>
            <input type="text" name="legal_name" id="legal_name" value="{{ old('legal_name', $user->companyProfile?->legal_name) }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label for="industry" class="block text-sm font-medium text-gray-700 mb-2">Industry</label>
            <input type="text" name="industry" id="industry" value="{{ old('industry', $user->companyProfile?->industry) }}" 
                   placeholder="e.g., Technology, Fashion, Food & Beverage" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label for="company_size" class="block text-sm font-medium text-gray-700 mb-2">Company Size</label>
            <select name="company_size" id="company_size" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Select Company Size</option>
                <option value="Small (1-10)" {{ old('company_size', $user->companyProfile?->company_size) === 'Small (1-10)' ? 'selected' : '' }}>Small (1-10)</option>
                <option value="Medium (11-50)" {{ old('company_size', $user->companyProfile?->company_size) === 'Medium (11-50)' ? 'selected' : '' }}>Medium (11-50)</option>
                <option value="Large (51-200)" {{ old('company_size', $user->companyProfile?->company_size) === 'Large (51-200)' ? 'selected' : '' }}>Large (51-200)</option>
                <option value="Enterprise (200+)" {{ old('company_size', $user->companyProfile?->company_size) === 'Enterprise (200+)' ? 'selected' : '' }}>Enterprise (200+)</option>
            </select>
        </div>

        <div>
            <label for="founded_year" class="block text-sm font-medium text-gray-700 mb-2">Founded Year</label>
            <input type="number" name="founded_year" id="founded_year" min="1800" max="{{ date('Y') }}" 
                   value="{{ old('founded_year', $user->companyProfile?->founded_year) }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label for="headquarters" class="block text-sm font-medium text-gray-700 mb-2">Headquarters</label>
            <input type="text" name="headquarters" id="headquarters" value="{{ old('headquarters', $user->companyProfile?->headquarters) }}" 
                   placeholder="e.g., New York, NY" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label for="website" class="block text-sm font-medium text-gray-700 mb-2">Website</label>
            <input type="url" name="website" id="website" value="{{ old('website', $user->companyProfile?->website) }}" 
                   placeholder="https://example.com" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label for="registration_number" class="block text-sm font-medium text-gray-700 mb-2">Registration Number</label>
            <input type="text" name="registration_number" id="registration_number" value="{{ old('registration_number', $user->companyProfile?->registration_number) }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
    </div>

    <div class="mt-6">
        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Company Description</label>
        <textarea name="description" id="description" rows="4" 
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $user->companyProfile?->description) }}</textarea>
    </div>

    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="budget_range_min" class="block text-sm font-medium text-gray-700 mb-2">Budget Range (Min)</label>
            <div class="flex">
                <select name="currency" class="px-3 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="USD" {{ old('currency', $user->companyProfile?->currency) === 'USD' ? 'selected' : '' }}>USD</option>
                    <option value="EUR" {{ old('currency', $user->companyProfile?->currency) === 'EUR' ? 'selected' : '' }}>EUR</option>
                    <option value="GBP" {{ old('currency', $user->companyProfile?->currency) === 'GBP' ? 'selected' : '' }}>GBP</option>
                </select>
                <input type="number" name="budget_range_min" id="budget_range_min" step="0.01" min="0" 
                       value="{{ old('budget_range_min', $user->companyProfile?->budget_range_min) }}" 
                       class="flex-1 px-3 py-2 border border-gray-300 rounded-r-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>

        <div>
            <label for="budget_range_max" class="block text-sm font-medium text-gray-700 mb-2">Budget Range (Max)</label>
            <input type="number" name="budget_range_max" id="budget_range_max" step="0.01" min="0" 
                   value="{{ old('budget_range_max', $user->companyProfile?->budget_range_max) }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="logo" class="block text-sm font-medium text-gray-700 mb-2">Company Logo</label>
            <input type="file" name="logo" id="logo" accept="image/*" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @if($user->companyProfile?->logo)
                <p class="mt-1 text-sm text-gray-500">Current: {{ basename($user->companyProfile->logo) }}</p>
            @endif
        </div>

        <div>
            <label for="cover_image" class="block text-sm font-medium text-gray-700 mb-2">Cover Image</label>
            <input type="file" name="cover_image" id="cover_image" accept="image/*" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @if($user->companyProfile?->cover_image)
                <p class="mt-1 text-sm text-gray-500">Current: {{ basename($user->companyProfile->cover_image) }}</p>
            @endif
        </div>
    </div>

    <div class="mt-6">
        <label class="flex items-center">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $user->companyProfile?->is_active) ? 'checked' : '' }} 
                   class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
            <span class="ml-2 text-sm text-gray-700">Company is active</span>
        </label>
    </div>

    <div class="mt-6">
        <label class="flex items-center">
            <input type="checkbox" name="is_verified" value="1" {{ old('is_verified', $user->companyProfile?->is_verified) ? 'checked' : '' }} 
                   class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
            <span class="ml-2 text-sm text-gray-700">Verified company</span>
        </label>
    </div>
</div>
