<!-- Company Profile Form -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Company Information</h3>
    </div>
    <div class="card-body">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div>
                <label for="company_name" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Company Name *</label>
                <input type="text" name="company_name" id="company_name" value="{{ old('company_name', $user->companyProfile?->company_name) }}" required
                       style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
            </div>

            <div>
                <label for="legal_name" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Legal Name</label>
                <input type="text" name="legal_name" id="legal_name" value="{{ old('legal_name', $user->companyProfile?->legal_name) }}" 
                       style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
            </div>

            <div>
                <label for="industry" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Industry</label>
                <input type="text" name="industry" id="industry" value="{{ old('industry', $user->companyProfile?->industry) }}" 
                       placeholder="e.g., Technology, Fashion, Food & Beverage" 
                       style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
            </div>

            <div>
                <label for="company_size" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Company Size</label>
                <select name="company_size" id="company_size" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                    <option value="">Select Company Size</option>
                    <option value="Small (1-10)" {{ old('company_size', $user->companyProfile?->company_size) === 'Small (1-10)' ? 'selected' : '' }}>Small (1-10)</option>
                    <option value="Medium (11-50)" {{ old('company_size', $user->companyProfile?->company_size) === 'Medium (11-50)' ? 'selected' : '' }}>Medium (11-50)</option>
                    <option value="Large (51-200)" {{ old('company_size', $user->companyProfile?->company_size) === 'Large (51-200)' ? 'selected' : '' }}>Large (51-200)</option>
                    <option value="Enterprise (200+)" {{ old('company_size', $user->companyProfile?->company_size) === 'Enterprise (200+)' ? 'selected' : '' }}>Enterprise (200+)</option>
                </select>
            </div>

            <div>
                <label for="founded_year" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Founded Year</label>
                <input type="number" name="founded_year" id="founded_year" min="1800" max="{{ date('Y') }}" 
                       value="{{ old('founded_year', $user->companyProfile?->founded_year) }}" 
                       style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
            </div>

            <div>
                <label for="headquarters" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Headquarters</label>
                <input type="text" name="headquarters" id="headquarters" value="{{ old('headquarters', $user->companyProfile?->headquarters) }}" 
                       placeholder="e.g., New York, NY" 
                       style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
            </div>

            <div>
                <label for="website" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Website</label>
                <input type="url" name="website" id="website" value="{{ old('website', $user->companyProfile?->website) }}" 
                       placeholder="https://example.com" 
                       style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
            </div>

            <div>
                <label for="registration_number" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Registration Number</label>
                <input type="text" name="registration_number" id="registration_number" value="{{ old('registration_number', $user->companyProfile?->registration_number) }}" 
                       style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
            </div>
        </div>

        <div style="margin-top: 1.5rem;">
            <label for="description" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Company Description</label>
            <textarea name="description" id="description" rows="4" 
                      style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">{{ old('description', $user->companyProfile?->description) }}</textarea>
        </div>

        <div style="margin-top: 1.5rem; display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div>
                <label for="budget_range_min" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Budget Range (Min)</label>
                <div style="display: flex;">
                    <select name="currency" style="padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem 0 0 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                        <option value="USD" {{ old('currency', $user->companyProfile?->currency) === 'USD' ? 'selected' : '' }}>USD</option>
                        <option value="EUR" {{ old('currency', $user->companyProfile?->currency) === 'EUR' ? 'selected' : '' }}>EUR</option>
                        <option value="GBP" {{ old('currency', $user->companyProfile?->currency) === 'GBP' ? 'selected' : '' }}>GBP</option>
                    </select>
                    <input type="number" name="budget_range_min" id="budget_range_min" step="0.01" min="0" 
                           value="{{ old('budget_range_min', $user->companyProfile?->budget_range_min) }}" 
                           style="flex: 1; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0 0.375rem 0.375rem 0; background: var(--content-bg); color: var(--text-primary);">
                </div>
            </div>

            <div>
                <label for="budget_range_max" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Budget Range (Max)</label>
                <input type="number" name="budget_range_max" id="budget_range_max" step="0.01" min="0" 
                       value="{{ old('budget_range_max', $user->companyProfile?->budget_range_max) }}" 
                       style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
            </div>
        </div>

        <div style="margin-top: 1.5rem; display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div>
                <label for="logo" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Company Logo</label>
                <input type="file" name="logo" id="logo" accept="image/*" 
                       style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                @if($user->companyProfile?->logo)
                    <p style="margin-top: 0.25rem; font-size: 0.875rem; color: var(--text-secondary);">Current: {{ basename($user->companyProfile->logo) }}</p>
                @endif
            </div>

            <div>
                <label for="cover_image" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Cover Image</label>
                <input type="file" name="cover_image" id="cover_image" accept="image/*" 
                       style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                @if($user->companyProfile?->cover_image)
                    <p style="margin-top: 0.25rem; font-size: 0.875rem; color: var(--text-secondary);">Current: {{ basename($user->companyProfile->cover_image) }}</p>
                @endif
            </div>
        </div>

        <div style="margin-top: 1.5rem;">
            <label style="display: flex; align-items: center;">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $user->companyProfile?->is_active) ? 'checked' : '' }} 
                       style="margin-right: 0.5rem;">
                <span style="font-size: 0.875rem; color: var(--text-primary);">Company is active</span>
            </label>
        </div>

        <div style="margin-top: 1.5rem;">
            <label style="display: flex; align-items: center;">
                <input type="checkbox" name="is_verified" value="1" {{ old('is_verified', $user->companyProfile?->is_verified) ? 'checked' : '' }} 
                       style="margin-right: 0.5rem;">
                <span style="font-size: 0.875rem; color: var(--text-primary);">Verified company</span>
            </label>
        </div>
    </div>
</div>
