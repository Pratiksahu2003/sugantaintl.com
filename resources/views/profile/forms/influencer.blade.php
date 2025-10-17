<!-- Influencer Profile Form -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Influencer Information</h3>
    </div>
    <div class="card-body">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div>
                <label for="stage_name" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Stage Name</label>
                <input type="text" name="stage_name" id="stage_name" value="{{ old('stage_name', $user->influencerProfile?->stage_name) }}" 
                       style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
            </div>

            <div>
                <label for="niche" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Niche</label>
                <input type="text" name="niche" id="niche" value="{{ old('niche', $user->influencerProfile?->niche) }}" 
                       placeholder="e.g., Fashion, Beauty, Tech, Gaming" 
                       style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
            </div>

            <div>
                <label for="rate_per_post" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Rate per Post</label>
                <div style="display: flex;">
                    <select name="currency" style="padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem 0 0 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                        <option value="USD" {{ old('currency', $user->influencerProfile?->currency) === 'USD' ? 'selected' : '' }}>USD</option>
                        <option value="EUR" {{ old('currency', $user->influencerProfile?->currency) === 'EUR' ? 'selected' : '' }}>EUR</option>
                        <option value="GBP" {{ old('currency', $user->influencerProfile?->currency) === 'GBP' ? 'selected' : '' }}>GBP</option>
                    </select>
                    <input type="number" name="rate_per_post" id="rate_per_post" step="0.01" min="0" 
                           value="{{ old('rate_per_post', $user->influencerProfile?->rate_per_post) }}" 
                           style="flex: 1; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0 0.375rem 0.375rem 0; background: var(--content-bg); color: var(--text-primary);">
                </div>
            </div>

            <div>
                <label for="rate_per_story" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Rate per Story</label>
                <input type="number" name="rate_per_story" id="rate_per_story" step="0.01" min="0" 
                       value="{{ old('rate_per_story', $user->influencerProfile?->rate_per_story) }}" 
                       style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
            </div>

            <div>
                <label for="rate_per_video" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Rate per Video</label>
                <input type="number" name="rate_per_video" id="rate_per_video" step="0.01" min="0" 
                       value="{{ old('rate_per_video', $user->influencerProfile?->rate_per_video) }}" 
                       style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
            </div>
        </div>

        <div style="margin-top: 1.5rem;">
            <label for="about" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">About</label>
            <textarea name="about" id="about" rows="4" 
                      style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">{{ old('about', $user->influencerProfile?->about) }}</textarea>
        </div>

        <div style="margin-top: 1.5rem; display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div>
                <label for="profile_image" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Profile Image</label>
                <input type="file" name="profile_image" id="profile_image" accept="image/*" 
                       style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                @if($user->influencerProfile?->profile_image)
                    <p style="margin-top: 0.25rem; font-size: 0.875rem; color: var(--text-secondary);">Current: {{ basename($user->influencerProfile->profile_image) }}</p>
                @endif
            </div>

            <div>
                <label for="cover_image" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Cover Image</label>
                <input type="file" name="cover_image" id="cover_image" accept="image/*" 
                       style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                @if($user->influencerProfile?->cover_image)
                    <p style="margin-top: 0.25rem; font-size: 0.875rem; color: var(--text-secondary);">Current: {{ basename($user->influencerProfile->cover_image) }}</p>
                @endif
            </div>
        </div>

        <div style="margin-top: 1.5rem;">
            <label style="display: flex; align-items: center;">
                <input type="checkbox" name="is_available_for_collaboration" value="1" {{ old('is_available_for_collaboration', $user->influencerProfile?->is_available_for_collaboration) ? 'checked' : '' }} 
                       style="margin-right: 0.5rem;">
                <span style="font-size: 0.875rem; color: var(--text-primary);">Available for collaboration</span>
            </label>
        </div>

        <div style="margin-top: 1.5rem;">
            <label style="display: flex; align-items: center;">
                <input type="checkbox" name="is_verified" value="1" {{ old('is_verified', $user->influencerProfile?->is_verified) ? 'checked' : '' }} 
                       style="margin-right: 0.5rem;">
                <span style="font-size: 0.875rem; color: var(--text-primary);">Verified influencer</span>
            </label>
        </div>
    </div>
</div>
