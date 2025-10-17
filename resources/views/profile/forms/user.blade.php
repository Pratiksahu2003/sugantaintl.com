<!-- Basic User Profile Form -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Personal Information</h3>
    </div>
    <div class="card-body">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div>
                <label for="first_name" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">First Name</label>
                <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $user->profile?->first_name) }}" 
                       style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
            </div>

            <div>
                <label for="last_name" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Last Name</label>
                <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $user->profile?->last_name) }}" 
                       style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
            </div>

            <div>
                <label for="phone" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Phone</label>
                <input type="tel" name="phone" id="phone" value="{{ old('phone', $user->profile?->phone) }}" 
                       style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
            </div>

            <div>
                <label for="date_of_birth" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Date of Birth</label>
                <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $user->profile?->date_of_birth?->format('Y-m-d')) }}" 
                       style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
            </div>

            <div>
                <label for="gender" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Gender</label>
                <select name="gender" id="gender" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                    <option value="">Select Gender</option>
                    <option value="male" {{ old('gender', $user->profile?->gender) === 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', $user->profile?->gender) === 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender', $user->profile?->gender) === 'other' ? 'selected' : '' }}>Other</option>
                    <option value="prefer_not_to_say" {{ old('gender', $user->profile?->gender) === 'prefer_not_to_say' ? 'selected' : '' }}>Prefer not to say</option>
                </select>
            </div>

            <div>
                <label for="location" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Location</label>
                <input type="text" name="location" id="location" value="{{ old('location', $user->profile?->location) }}" 
                       style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
            </div>
        </div>

        <div style="margin-top: 1.5rem;">
            <label for="bio" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Bio</label>
            <textarea name="bio" id="bio" rows="4" 
                      style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">{{ old('bio', $user->profile?->bio) }}</textarea>
        </div>

        <div style="margin-top: 1.5rem;">
            <label for="website" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Website</label>
            <input type="url" name="website" id="website" value="{{ old('website', $user->profile?->website) }}" 
                   style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
        </div>

        <div style="margin-top: 1.5rem;">
            <label for="avatar" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Profile Picture</label>
            <input type="file" name="avatar" id="avatar" accept="image/*" 
                   style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
            @if($user->profile?->avatar)
                <p style="margin-top: 0.25rem; font-size: 0.875rem; color: var(--text-secondary);">Current: {{ basename($user->profile->avatar) }}</p>
            @endif
        </div>

        <div style="margin-top: 1.5rem;">
            <label style="display: flex; align-items: center;">
                <input type="checkbox" name="is_public" value="1" {{ old('is_public', $user->profile?->is_public) ? 'checked' : '' }} 
                       style="margin-right: 0.5rem;">
                <span style="font-size: 0.875rem; color: var(--text-primary);">Make profile public</span>
            </label>
        </div>
    </div>
</div>
