<!-- Enhanced Influencer Profile Form -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Influencer Information</h3>
    </div>
    <div class="card-body">
        <!-- Basic Information -->
        <div style="margin-bottom: 2rem;">
            <h4 style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary); margin-bottom: 1rem; border-bottom: 2px solid var(--primary-color); padding-bottom: 0.5rem;">Basic Information</h4>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                <div>
                    <label for="stage_name" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Stage Name *</label>
                    <input type="text" name="stage_name" id="stage_name" value="{{ old('stage_name', $user->influencerProfile?->stage_name) }}" 
                           style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);" required>
                    @error('stage_name')
                        <p style="margin-top: 0.25rem; font-size: 0.875rem; color: var(--danger-color);">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="profession" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Profession</label>
                    <input type="text" name="profession" id="profession" value="{{ old('profession', $user->influencerProfile?->profession) }}" 
                           placeholder="e.g., Content Creator, Digital Marketer, YouTuber" 
                           style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                </div>

                <div>
                    <label for="primary_category_id" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Primary Category *</label>
                    <select name="primary_category_id" id="primary_category_id" 
                            style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);" required>
                        <option value="">Select Category</option>
                        @foreach(\App\Models\InfluencerCategory::where('is_active', true)->orderBy('sort_order')->get() as $category)
                            <option value="{{ $category->id }}" {{ old('primary_category_id', $user->influencerProfile?->primary_category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('primary_category_id')
                        <p style="margin-top: 0.25rem; font-size: 0.875rem; color: var(--danger-color);">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="company_name" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Company/Organization</label>
                    <input type="text" name="company_name" id="company_name" value="{{ old('company_name', $user->influencerProfile?->company_name) }}" 
                           style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                </div>
            </div>

            <div style="margin-top: 1.5rem;">
                <label for="about" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">About</label>
                <textarea name="about" id="about" rows="3" 
                          style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">{{ old('about', $user->influencerProfile?->about) }}</textarea>
            </div>

            <div style="margin-top: 1.5rem;">
                <label for="bio_extended" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Extended Bio</label>
                <textarea name="bio_extended" id="bio_extended" rows="4" 
                          style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">{{ old('bio_extended', $user->influencerProfile?->bio_extended) }}</textarea>
            </div>
        </div>

        <!-- Social Media Links -->
        <div style="margin-bottom: 2rem;">
            <h4 style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary); margin-bottom: 1rem; border-bottom: 2px solid var(--primary-color); padding-bottom: 0.5rem;">Social Media Presence</h4>
            
            <!-- Major Platforms -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label for="instagram_url" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Instagram URL</label>
                    <input type="url" name="instagram_url" id="instagram_url" value="{{ old('instagram_url', $user->influencerProfile?->instagram_url) }}" 
                           placeholder="https://instagram.com/yourusername" 
                           style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                </div>

                <div>
                    <label for="instagram_handle" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Instagram Handle</label>
                    <input type="text" name="instagram_handle" id="instagram_handle" value="{{ old('instagram_handle', $user->influencerProfile?->instagram_handle) }}" 
                           placeholder="@yourusername" 
                           style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                </div>

                <div>
                    <label for="instagram_followers" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Instagram Followers</label>
                    <input type="number" name="instagram_followers" id="instagram_followers" value="{{ old('instagram_followers', $user->influencerProfile?->instagram_followers) }}" 
                           min="0" 
                           style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                </div>

                <div>
                    <label for="tiktok_url" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">TikTok URL</label>
                    <input type="url" name="tiktok_url" id="tiktok_url" value="{{ old('tiktok_url', $user->influencerProfile?->tiktok_url) }}" 
                           placeholder="https://tiktok.com/@yourusername" 
                           style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                </div>

                <div>
                    <label for="tiktok_handle" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">TikTok Handle</label>
                    <input type="text" name="tiktok_handle" id="tiktok_handle" value="{{ old('tiktok_handle', $user->influencerProfile?->tiktok_handle) }}" 
                           placeholder="@yourusername" 
                           style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                </div>

                <div>
                    <label for="tiktok_followers" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">TikTok Followers</label>
                    <input type="number" name="tiktok_followers" id="tiktok_followers" value="{{ old('tiktok_followers', $user->influencerProfile?->tiktok_followers) }}" 
                           min="0" 
                           style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                </div>

                <div>
                    <label for="youtube_url" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">YouTube URL</label>
                    <input type="url" name="youtube_url" id="youtube_url" value="{{ old('youtube_url', $user->influencerProfile?->youtube_url) }}" 
                           placeholder="https://youtube.com/@yourusername" 
                           style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                </div>

                <div>
                    <label for="youtube_handle" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">YouTube Handle</label>
                    <input type="text" name="youtube_handle" id="youtube_handle" value="{{ old('youtube_handle', $user->influencerProfile?->youtube_handle) }}" 
                           placeholder="@yourusername" 
                           style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                </div>

                <div>
                    <label for="youtube_subscribers" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">YouTube Subscribers</label>
                    <input type="number" name="youtube_subscribers" id="youtube_subscribers" value="{{ old('youtube_subscribers', $user->influencerProfile?->youtube_subscribers) }}" 
                           min="0" 
                           style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                </div>

                <div>
                    <label for="twitter_url" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Twitter/X URL</label>
                    <input type="url" name="twitter_url" id="twitter_url" value="{{ old('twitter_url', $user->influencerProfile?->twitter_url) }}" 
                           placeholder="https://twitter.com/yourusername" 
                           style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                </div>
            </div>

            <!-- Additional Platforms -->
            <div style="margin-top: 1rem;">
                <h5 style="font-size: 1rem; font-weight: 600; color: var(--text-primary); margin-bottom: 1rem;">Additional Platforms</h5>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1rem;">
                    <div>
                        <label for="facebook_url" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Facebook</label>
                        <input type="url" name="facebook_url" id="facebook_url" value="{{ old('facebook_url', $user->influencerProfile?->facebook_url) }}" 
                               style="width: 100%; padding: 0.5rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                    </div>

                    <div>
                        <label for="linkedin_url" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">LinkedIn</label>
                        <input type="url" name="linkedin_url" id="linkedin_url" value="{{ old('linkedin_url', $user->influencerProfile?->linkedin_url) }}" 
                               style="width: 100%; padding: 0.5rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                    </div>

                    <div>
                        <label for="snapchat_url" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Snapchat</label>
                        <input type="url" name="snapchat_url" id="snapchat_url" value="{{ old('snapchat_url', $user->influencerProfile?->snapchat_url) }}" 
                               style="width: 100%; padding: 0.5rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                    </div>

                    <div>
                        <label for="pinterest_url" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Pinterest</label>
                        <input type="url" name="pinterest_url" id="pinterest_url" value="{{ old('pinterest_url', $user->influencerProfile?->pinterest_url) }}" 
                               style="width: 100%; padding: 0.5rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                    </div>

                    <div>
                        <label for="twitch_url" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Twitch</label>
                        <input type="url" name="twitch_url" id="twitch_url" value="{{ old('twitch_url', $user->influencerProfile?->twitch_url) }}" 
                               style="width: 100%; padding: 0.5rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                    </div>

                    <div>
                        <label for="website_url" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Website</label>
                        <input type="url" name="website_url" id="website_url" value="{{ old('website_url', $user->influencerProfile?->website_url) }}" 
                               style="width: 100%; padding: 0.5rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                    </div>
                </div>
            </div>
        </div>

        <!-- Professional Information -->
        <div style="margin-bottom: 2rem;">
            <h4 style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary); margin-bottom: 1rem; border-bottom: 2px solid var(--primary-color); padding-bottom: 0.5rem;">Professional Information</h4>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                <div>
                    <label for="company_position" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Position/Title</label>
                    <input type="text" name="company_position" id="company_position" value="{{ old('company_position', $user->influencerProfile?->company_position) }}" 
                           style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                </div>

                <div>
                    <label for="business_email" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Business Email</label>
                    <input type="email" name="business_email" id="business_email" value="{{ old('business_email', $user->influencerProfile?->business_email) }}" 
                           style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                </div>

                <div>
                    <label for="business_phone" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Business Phone</label>
                    <input type="tel" name="business_phone" id="business_phone" value="{{ old('business_phone', $user->influencerProfile?->business_phone) }}" 
                           style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                </div>

                <div>
                    <label for="rate_per_campaign" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Rate per Campaign</label>
                    <div style="display: flex;">
                        <select name="currency" style="padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem 0 0 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                            <option value="USD" {{ old('currency', $user->influencerProfile?->currency) === 'USD' ? 'selected' : '' }}>USD</option>
                            <option value="EUR" {{ old('currency', $user->influencerProfile?->currency) === 'EUR' ? 'selected' : '' }}>EUR</option>
                            <option value="GBP" {{ old('currency', $user->influencerProfile?->currency) === 'GBP' ? 'selected' : '' }}>GBP</option>
                        </select>
                        <input type="number" name="rate_per_campaign" id="rate_per_campaign" step="0.01" min="0" 
                               value="{{ old('rate_per_campaign', $user->influencerProfile?->rate_per_campaign) }}" 
                               style="flex: 1; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0 0.375rem 0.375rem 0; background: var(--content-bg); color: var(--text-primary);">
                    </div>
                </div>
            </div>

            <div style="margin-top: 1.5rem;">
                <label for="mission_statement" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Mission Statement</label>
                <textarea name="mission_statement" id="mission_statement" rows="3" 
                          style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">{{ old('mission_statement', $user->influencerProfile?->mission_statement) }}</textarea>
            </div>
        </div>

        <!-- Location & Demographics -->
        <div style="margin-bottom: 2rem;">
            <h4 style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary); margin-bottom: 1rem; border-bottom: 2px solid var(--primary-color); padding-bottom: 0.5rem;">Location & Demographics</h4>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1.5rem;">
                <div>
                    <label for="country" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Country</label>
                    <input type="text" name="country" id="country" value="{{ old('country', $user->influencerProfile?->country) }}" 
                           style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                </div>

                <div>
                    <label for="state" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">State/Province</label>
                    <input type="text" name="state" id="state" value="{{ old('state', $user->influencerProfile?->state) }}" 
                           style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                </div>

                <div>
                    <label for="city" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">City</label>
                    <input type="text" name="city" id="city" value="{{ old('city', $user->influencerProfile?->city) }}" 
                           style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                </div>

                <div>
                    <label for="timezone" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Timezone</label>
                    <select name="timezone" id="timezone" 
                            style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                        <option value="">Select Timezone</option>
                        <option value="UTC" {{ old('timezone', $user->influencerProfile?->timezone) === 'UTC' ? 'selected' : '' }}>UTC</option>
                        <option value="America/New_York" {{ old('timezone', $user->influencerProfile?->timezone) === 'America/New_York' ? 'selected' : '' }}>Eastern Time</option>
                        <option value="America/Chicago" {{ old('timezone', $user->influencerProfile?->timezone) === 'America/Chicago' ? 'selected' : '' }}>Central Time</option>
                        <option value="America/Denver" {{ old('timezone', $user->influencerProfile?->timezone) === 'America/Denver' ? 'selected' : '' }}>Mountain Time</option>
                        <option value="America/Los_Angeles" {{ old('timezone', $user->influencerProfile?->timezone) === 'America/Los_Angeles' ? 'selected' : '' }}>Pacific Time</option>
                        <option value="Europe/London" {{ old('timezone', $user->influencerProfile?->timezone) === 'Europe/London' ? 'selected' : '' }}>London</option>
                        <option value="Europe/Paris" {{ old('timezone', $user->influencerProfile?->timezone) === 'Europe/Paris' ? 'selected' : '' }}>Paris</option>
                        <option value="Asia/Tokyo" {{ old('timezone', $user->influencerProfile?->timezone) === 'Asia/Tokyo' ? 'selected' : '' }}>Tokyo</option>
                    </select>
                </div>

                <div>
                    <label for="primary_language" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Primary Language</label>
                    <select name="primary_language" id="primary_language" 
                            style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);">
                        <option value="">Select Language</option>
                        <option value="English" {{ old('primary_language', $user->influencerProfile?->primary_language) === 'English' ? 'selected' : '' }}>English</option>
                        <option value="Spanish" {{ old('primary_language', $user->influencerProfile?->primary_language) === 'Spanish' ? 'selected' : '' }}>Spanish</option>
                        <option value="French" {{ old('primary_language', $user->influencerProfile?->primary_language) === 'French' ? 'selected' : '' }}>French</option>
                        <option value="German" {{ old('primary_language', $user->influencerProfile?->primary_language) === 'German' ? 'selected' : '' }}>German</option>
                        <option value="Italian" {{ old('primary_language', $user->influencerProfile?->primary_language) === 'Italian' ? 'selected' : '' }}>Italian</option>
                        <option value="Portuguese" {{ old('primary_language', $user->influencerProfile?->primary_language) === 'Portuguese' ? 'selected' : '' }}>Portuguese</option>
                        <option value="Chinese" {{ old('primary_language', $user->influencerProfile?->primary_language) === 'Chinese' ? 'selected' : '' }}>Chinese</option>
                        <option value="Japanese" {{ old('primary_language', $user->influencerProfile?->primary_language) === 'Japanese' ? 'selected' : '' }}>Japanese</option>
                        <option value="Korean" {{ old('primary_language', $user->influencerProfile?->primary_language) === 'Korean' ? 'selected' : '' }}>Korean</option>
                        <option value="Arabic" {{ old('primary_language', $user->influencerProfile?->primary_language) === 'Arabic' ? 'selected' : '' }}>Arabic</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Collaboration Preferences -->
        <div style="margin-bottom: 2rem;">
            <h4 style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary); margin-bottom: 1rem; border-bottom: 2px solid var(--primary-color); padding-bottom: 0.5rem;">Collaboration Preferences</h4>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                <div>
                    <label style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Collaboration Types</label>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.5rem;">
                        <label style="display: flex; align-items: center; font-size: 0.875rem;">
                            <input type="checkbox" name="accepts_gifted_collaborations" value="1" {{ old('accepts_gifted_collaborations', $user->influencerProfile?->accepts_gifted_collaborations) ? 'checked' : '' }} style="margin-right: 0.5rem;">
                            Gifted Collaborations
                        </label>
                        <label style="display: flex; align-items: center; font-size: 0.875rem;">
                            <input type="checkbox" name="accepts_paid_collaborations" value="1" {{ old('accepts_paid_collaborations', $user->influencerProfile?->accepts_paid_collaborations) ? 'checked' : '' }} style="margin-right: 0.5rem;">
                            Paid Collaborations
                        </label>
                        <label style="display: flex; align-items: center; font-size: 0.875rem;">
                            <input type="checkbox" name="accepts_brand_ambassador" value="1" {{ old('accepts_brand_ambassador', $user->influencerProfile?->accepts_brand_ambassador) ? 'checked' : '' }} style="margin-right: 0.5rem;">
                            Brand Ambassador
                        </label>
                        <label style="display: flex; align-items: center; font-size: 0.875rem;">
                            <input type="checkbox" name="accepts_event_appearances" value="1" {{ old('accepts_event_appearances', $user->influencerProfile?->accepts_event_appearances) ? 'checked' : '' }} style="margin-right: 0.5rem;">
                            Event Appearances
                        </label>
                        <label style="display: flex; align-items: center; font-size: 0.875rem;">
                            <input type="checkbox" name="accepts_product_reviews" value="1" {{ old('accepts_product_reviews', $user->influencerProfile?->accepts_product_reviews) ? 'checked' : '' }} style="margin-right: 0.5rem;">
                            Product Reviews
                        </label>
                        <label style="display: flex; align-items: center; font-size: 0.875rem;">
                            <input type="checkbox" name="accepts_sponsored_content" value="1" {{ old('accepts_sponsored_content', $user->influencerProfile?->accepts_sponsored_content) ? 'checked' : '' }} style="margin-right: 0.5rem;">
                            Sponsored Content
                        </label>
                    </div>
                </div>

                <div>
                    <label style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Settings</label>
                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                        <label style="display: flex; align-items: center; font-size: 0.875rem;">
                            <input type="checkbox" name="is_available_for_collaboration" value="1" {{ old('is_available_for_collaboration', $user->influencerProfile?->is_available_for_collaboration) ? 'checked' : '' }} style="margin-right: 0.5rem;">
                            Available for Collaboration
                        </label>
                        <label style="display: flex; align-items: center; font-size: 0.875rem;">
                            <input type="checkbox" name="is_verified" value="1" {{ old('is_verified', $user->influencerProfile?->is_verified) ? 'checked' : '' }} style="margin-right: 0.5rem;">
                            Verified Influencer
                        </label>
                        <label style="display: flex; align-items: center; font-size: 0.875rem;">
                            <input type="checkbox" name="accepts_direct_messages" value="1" {{ old('accepts_direct_messages', $user->influencerProfile?->accepts_direct_messages) ? 'checked' : '' }} style="margin-right: 0.5rem;">
                            Accept Direct Messages
                        </label>
                        <label style="display: flex; align-items: center; font-size: 0.875rem;">
                            <input type="checkbox" name="show_contact_info" value="1" {{ old('show_contact_info', $user->influencerProfile?->show_contact_info) ? 'checked' : '' }} style="margin-right: 0.5rem;">
                            Show Contact Information
                        </label>
                        <label style="display: flex; align-items: center; font-size: 0.875rem;">
                            <input type="checkbox" name="show_rates" value="1" {{ old('show_rates', $user->influencerProfile?->show_rates) ? 'checked' : '' }} style="margin-right: 0.5rem;">
                            Show Rates Publicly
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Media Uploads -->
        <div style="margin-bottom: 2rem;">
            <h4 style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary); margin-bottom: 1rem; border-bottom: 2px solid var(--primary-color); padding-bottom: 0.5rem;">Media & Images</h4>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
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
        </div>
    </div>
</div>