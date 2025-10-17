<!-- Enhanced Influencer Profile Section -->
<div class="card" style="margin-bottom: 1.5rem;">
    <div class="card-header">
        <h3 class="card-title">Professional Information</h3>
    </div>
    <div class="card-body">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            @if($user->influencerProfile?->profession)
                <div>
                    <label style="font-weight: 500; color: var(--text-secondary);">Profession</label>
                    <p style="color: var(--text-primary); margin-top: 0.25rem;">{{ $user->influencerProfile->profession }}</p>
                </div>
            @endif

            @if($user->influencerProfile?->primaryCategory)
                <div>
                    <label style="font-weight: 500; color: var(--text-secondary);">Primary Category</label>
                    <p style="color: var(--text-primary); margin-top: 0.25rem;">
                        <span style="display: inline-flex; align-items: center; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.875rem; font-weight: 500; background: {{ $user->influencerProfile->primaryCategory->color }}20; color: {{ $user->influencerProfile->primaryCategory->color }};">
                            <i class="{{ $user->influencerProfile->primaryCategory->icon }}" style="margin-right: 0.25rem;"></i>
                            {{ $user->influencerProfile->primaryCategory->name }}
                        </span>
                    </p>
                </div>
            @endif

            @if($user->influencerProfile?->company_name)
                <div>
                    <label style="font-weight: 500; color: var(--text-secondary);">Company/Organization</label>
                    <p style="color: var(--text-primary); margin-top: 0.25rem;">{{ $user->influencerProfile->company_name }}</p>
                </div>
            @endif

            @if($user->influencerProfile?->company_position)
                <div>
                    <label style="font-weight: 500; color: var(--text-secondary);">Position</label>
                    <p style="color: var(--text-primary); margin-top: 0.25rem;">{{ $user->influencerProfile->company_position }}</p>
                </div>
            @endif
        </div>

        @if($user->influencerProfile?->bio_extended)
            <div style="margin-top: 1.5rem;">
                <label style="font-weight: 500; color: var(--text-secondary);">Extended Bio</label>
                <p style="color: var(--text-primary); margin-top: 0.25rem; line-height: 1.6;">{{ $user->influencerProfile->bio_extended }}</p>
            </div>
        @endif

        @if($user->influencerProfile?->mission_statement)
            <div style="margin-top: 1.5rem;">
                <label style="font-weight: 500; color: var(--text-secondary);">Mission Statement</label>
                <p style="color: var(--text-primary); margin-top: 0.25rem; line-height: 1.6; font-style: italic;">{{ $user->influencerProfile->mission_statement }}</p>
            </div>
        @endif
    </div>
</div>

<!-- Social Media Presence -->
<div class="card" style="margin-bottom: 1.5rem;">
    <div class="card-header">
        <h3 class="card-title">Social Media Presence</h3>
    </div>
    <div class="card-body">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1rem;">
            @if($user->influencerProfile?->instagram_url || $user->influencerProfile?->instagram_handle)
                <div style="border: 1px solid var(--border-color); border-radius: 0.5rem; padding: 1rem;">
                    <div style="display: flex; align-items: center; margin-bottom: 0.5rem;">
                        <i class="fab fa-instagram" style="color: #E4405F; font-size: 1.5rem; margin-right: 0.75rem;"></i>
                        <h4 style="font-weight: 600; color: var(--text-primary);">Instagram</h4>
                    </div>
                    @if($user->influencerProfile->instagram_handle)
                        <p style="color: var(--text-primary); margin-bottom: 0.25rem;">{{ $user->influencerProfile->instagram_handle }}</p>
                    @endif
                    @if($user->influencerProfile->instagram_followers)
                        <p style="color: var(--text-secondary); font-size: 0.875rem;">{{ number_format($user->influencerProfile->instagram_followers) }} followers</p>
                    @endif
                    @if($user->influencerProfile->instagram_url)
                        <a href="{{ $user->influencerProfile->instagram_url }}" target="_blank" style="color: var(--primary-color); text-decoration: none; font-size: 0.875rem;">Visit Profile</a>
                    @endif
                </div>
            @endif

            @if($user->influencerProfile?->tiktok_url || $user->influencerProfile?->tiktok_handle)
                <div style="border: 1px solid var(--border-color); border-radius: 0.5rem; padding: 1rem;">
                    <div style="display: flex; align-items: center; margin-bottom: 0.5rem;">
                        <i class="fab fa-tiktok" style="color: #000000; font-size: 1.5rem; margin-right: 0.75rem;"></i>
                        <h4 style="font-weight: 600; color: var(--text-primary);">TikTok</h4>
                    </div>
                    @if($user->influencerProfile->tiktok_handle)
                        <p style="color: var(--text-primary); margin-bottom: 0.25rem;">{{ $user->influencerProfile->tiktok_handle }}</p>
                    @endif
                    @if($user->influencerProfile->tiktok_followers)
                        <p style="color: var(--text-secondary); font-size: 0.875rem;">{{ number_format($user->influencerProfile->tiktok_followers) }} followers</p>
                    @endif
                    @if($user->influencerProfile->tiktok_url)
                        <a href="{{ $user->influencerProfile->tiktok_url }}" target="_blank" style="color: var(--primary-color); text-decoration: none; font-size: 0.875rem;">Visit Profile</a>
                    @endif
                </div>
            @endif

            @if($user->influencerProfile?->youtube_url || $user->influencerProfile?->youtube_handle)
                <div style="border: 1px solid var(--border-color); border-radius: 0.5rem; padding: 1rem;">
                    <div style="display: flex; align-items: center; margin-bottom: 0.5rem;">
                        <i class="fab fa-youtube" style="color: #FF0000; font-size: 1.5rem; margin-right: 0.75rem;"></i>
                        <h4 style="font-weight: 600; color: var(--text-primary);">YouTube</h4>
                    </div>
                    @if($user->influencerProfile->youtube_handle)
                        <p style="color: var(--text-primary); margin-bottom: 0.25rem;">{{ $user->influencerProfile->youtube_handle }}</p>
                    @endif
                    @if($user->influencerProfile->youtube_subscribers)
                        <p style="color: var(--text-secondary); font-size: 0.875rem;">{{ number_format($user->influencerProfile->youtube_subscribers) }} subscribers</p>
                    @endif
                    @if($user->influencerProfile->youtube_url)
                        <a href="{{ $user->influencerProfile->youtube_url }}" target="_blank" style="color: var(--primary-color); text-decoration: none; font-size: 0.875rem;">Visit Channel</a>
                    @endif
                </div>
            @endif

            @if($user->influencerProfile?->twitter_url || $user->influencerProfile?->twitter_handle)
                <div style="border: 1px solid var(--border-color); border-radius: 0.5rem; padding: 1rem;">
                    <div style="display: flex; align-items: center; margin-bottom: 0.5rem;">
                        <i class="fab fa-twitter" style="color: #1DA1F2; font-size: 1.5rem; margin-right: 0.75rem;"></i>
                        <h4 style="font-weight: 600; color: var(--text-primary);">Twitter/X</h4>
                    </div>
                    @if($user->influencerProfile->twitter_handle)
                        <p style="color: var(--text-primary); margin-bottom: 0.25rem;">{{ $user->influencerProfile->twitter_handle }}</p>
                    @endif
                    @if($user->influencerProfile->twitter_followers)
                        <p style="color: var(--text-secondary); font-size: 0.875rem;">{{ number_format($user->influencerProfile->twitter_followers) }} followers</p>
                    @endif
                    @if($user->influencerProfile->twitter_url)
                        <a href="{{ $user->influencerProfile->twitter_url }}" target="_blank" style="color: var(--primary-color); text-decoration: none; font-size: 0.875rem;">Visit Profile</a>
                    @endif
                </div>
            @endif

            @if($user->influencerProfile?->facebook_url || $user->influencerProfile?->facebook_handle)
                <div style="border: 1px solid var(--border-color); border-radius: 0.5rem; padding: 1rem;">
                    <div style="display: flex; align-items: center; margin-bottom: 0.5rem;">
                        <i class="fab fa-facebook" style="color: #1877F2; font-size: 1.5rem; margin-right: 0.75rem;"></i>
                        <h4 style="font-weight: 600; color: var(--text-primary);">Facebook</h4>
                    </div>
                    @if($user->influencerProfile->facebook_handle)
                        <p style="color: var(--text-primary); margin-bottom: 0.25rem;">{{ $user->influencerProfile->facebook_handle }}</p>
                    @endif
                    @if($user->influencerProfile->facebook_followers)
                        <p style="color: var(--text-secondary); font-size: 0.875rem;">{{ number_format($user->influencerProfile->facebook_followers) }} followers</p>
                    @endif
                    @if($user->influencerProfile->facebook_url)
                        <a href="{{ $user->influencerProfile->facebook_url }}" target="_blank" style="color: var(--primary-color); text-decoration: none; font-size: 0.875rem;">Visit Page</a>
                    @endif
                </div>
            @endif

            @if($user->influencerProfile?->linkedin_url || $user->influencerProfile?->linkedin_handle)
                <div style="border: 1px solid var(--border-color); border-radius: 0.5rem; padding: 1rem;">
                    <div style="display: flex; align-items: center; margin-bottom: 0.5rem;">
                        <i class="fab fa-linkedin" style="color: #0A66C2; font-size: 1.5rem; margin-right: 0.75rem;"></i>
                        <h4 style="font-weight: 600; color: var(--text-primary);">LinkedIn</h4>
                    </div>
                    @if($user->influencerProfile->linkedin_handle)
                        <p style="color: var(--text-primary); margin-bottom: 0.25rem;">{{ $user->influencerProfile->linkedin_handle }}</p>
                    @endif
                    @if($user->influencerProfile->linkedin_followers)
                        <p style="color: var(--text-secondary); font-size: 0.875rem;">{{ number_format($user->influencerProfile->linkedin_followers) }} followers</p>
                    @endif
                    @if($user->influencerProfile->linkedin_url)
                        <a href="{{ $user->influencerProfile->linkedin_url }}" target="_blank" style="color: var(--primary-color); text-decoration: none; font-size: 0.875rem;">Visit Profile</a>
                    @endif
                </div>
            @endif
        </div>

        <!-- Additional Platforms -->
        @php
            $additionalPlatforms = [
                'snapchat' => ['url' => 'snapchat_url', 'handle' => 'snapchat_handle', 'followers' => 'snapchat_followers', 'icon' => 'fab fa-snapchat', 'color' => '#FFFC00'],
                'pinterest' => ['url' => 'pinterest_url', 'handle' => 'pinterest_handle', 'followers' => 'pinterest_followers', 'icon' => 'fab fa-pinterest', 'color' => '#E60023'],
                'twitch' => ['url' => 'twitch_url', 'handle' => 'twitch_handle', 'followers' => 'twitch_followers', 'icon' => 'fab fa-twitch', 'color' => '#9146FF'],
                'website' => ['url' => 'website_url', 'handle' => null, 'followers' => null, 'icon' => 'fas fa-globe', 'color' => '#6B7280'],
                'blog' => ['url' => 'blog_url', 'handle' => null, 'followers' => null, 'icon' => 'fas fa-blog', 'color' => '#10B981'],
                'podcast' => ['url' => 'podcast_url', 'handle' => null, 'followers' => null, 'icon' => 'fas fa-podcast', 'color' => '#8B5CF6'],
            ];
        @endphp

        @foreach($additionalPlatforms as $platform => $config)
            @if($user->influencerProfile?->{$config['url']})
                <div style="display: inline-block; margin: 0.5rem 0.5rem 0.5rem 0; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.5rem; background: var(--content-bg);">
                    <div style="display: flex; align-items: center;">
                        <i class="{{ $config['icon'] }}" style="color: {{ $config['color'] }}; font-size: 1.25rem; margin-right: 0.5rem;"></i>
                        <span style="font-weight: 500; color: var(--text-primary); margin-right: 0.5rem;">{{ ucfirst($platform) }}</span>
                        <a href="{{ $user->influencerProfile->{$config['url']} }}" target="_blank" style="color: var(--primary-color); text-decoration: none; font-size: 0.875rem;">Visit</a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

<!-- Location & Demographics -->
@if($user->influencerProfile?->country || $user->influencerProfile?->state || $user->influencerProfile?->city || $user->influencerProfile?->timezone || $user->influencerProfile?->primary_language)
<div class="card" style="margin-bottom: 1.5rem;">
    <div class="card-header">
        <h3 class="card-title">Location & Demographics</h3>
    </div>
    <div class="card-body">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
            @if($user->influencerProfile?->country)
                <div>
                    <label style="font-weight: 500; color: var(--text-secondary);">Country</label>
                    <p style="color: var(--text-primary); margin-top: 0.25rem;">{{ $user->influencerProfile->country }}</p>
                </div>
            @endif

            @if($user->influencerProfile?->state)
                <div>
                    <label style="font-weight: 500; color: var(--text-secondary);">State/Province</label>
                    <p style="color: var(--text-primary); margin-top: 0.25rem;">{{ $user->influencerProfile->state }}</p>
                </div>
            @endif

            @if($user->influencerProfile?->city)
                <div>
                    <label style="font-weight: 500; color: var(--text-secondary);">City</label>
                    <p style="color: var(--text-primary); margin-top: 0.25rem;">{{ $user->influencerProfile->city }}</p>
                </div>
            @endif

            @if($user->influencerProfile?->timezone)
                <div>
                    <label style="font-weight: 500; color: var(--text-secondary);">Timezone</label>
                    <p style="color: var(--text-primary); margin-top: 0.25rem;">{{ $user->influencerProfile->timezone }}</p>
                </div>
            @endif

            @if($user->influencerProfile?->primary_language)
                <div>
                    <label style="font-weight: 500; color: var(--text-secondary);">Primary Language</label>
                    <p style="color: var(--text-primary); margin-top: 0.25rem;">{{ $user->influencerProfile->primary_language }}</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endif

<!-- Business Information -->
@if($user->influencerProfile?->business_email || $user->influencerProfile?->business_phone || $user->influencerProfile?->rate_per_campaign)
<div class="card" style="margin-bottom: 1.5rem;">
    <div class="card-header">
        <h3 class="card-title">Business Information</h3>
    </div>
    <div class="card-body">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
            @if($user->influencerProfile?->business_email)
                <div>
                    <label style="font-weight: 500; color: var(--text-secondary);">Business Email</label>
                    <p style="color: var(--text-primary); margin-top: 0.25rem;">
                        <a href="mailto:{{ $user->influencerProfile->business_email }}" style="color: var(--primary-color); text-decoration: none;">{{ $user->influencerProfile->business_email }}</a>
                    </p>
                </div>
            @endif

            @if($user->influencerProfile?->business_phone)
                <div>
                    <label style="font-weight: 500; color: var(--text-secondary);">Business Phone</label>
                    <p style="color: var(--text-primary); margin-top: 0.25rem;">
                        <a href="tel:{{ $user->influencerProfile->business_phone }}" style="color: var(--primary-color); text-decoration: none;">{{ $user->influencerProfile->business_phone }}</a>
                    </p>
                </div>
            @endif

            @if($user->influencerProfile?->rate_per_campaign)
                <div>
                    <label style="font-weight: 500; color: var(--text-secondary);">Rate per Campaign</label>
                    <p style="color: var(--text-primary); margin-top: 0.25rem; font-weight: 600;">
                        {{ $user->influencerProfile->currency }} {{ number_format($user->influencerProfile->rate_per_campaign, 2) }}
                    </p>
                </div>
            @endif
        </div>
    </div>
</div>
@endif

<!-- Collaboration Preferences -->
<div class="card" style="margin-bottom: 1.5rem;">
    <div class="card-header">
        <h3 class="card-title">Collaboration Preferences</h3>
    </div>
    <div class="card-body">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div>
                <h4 style="font-weight: 600; color: var(--text-primary); margin-bottom: 1rem;">Available For</h4>
                <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                    @if($user->influencerProfile?->accepts_gifted_collaborations)
                        <div style="display: flex; align-items: center;">
                            <i class="fas fa-check-circle" style="color: var(--success-color); margin-right: 0.5rem;"></i>
                            <span style="color: var(--text-primary);">Gifted Collaborations</span>
                        </div>
                    @endif
                    @if($user->influencerProfile?->accepts_paid_collaborations)
                        <div style="display: flex; align-items: center;">
                            <i class="fas fa-check-circle" style="color: var(--success-color); margin-right: 0.5rem;"></i>
                            <span style="color: var(--text-primary);">Paid Collaborations</span>
                        </div>
                    @endif
                    @if($user->influencerProfile?->accepts_brand_ambassador)
                        <div style="display: flex; align-items: center;">
                            <i class="fas fa-check-circle" style="color: var(--success-color); margin-right: 0.5rem;"></i>
                            <span style="color: var(--text-primary);">Brand Ambassador</span>
                        </div>
                    @endif
                    @if($user->influencerProfile?->accepts_event_appearances)
                        <div style="display: flex; align-items: center;">
                            <i class="fas fa-check-circle" style="color: var(--success-color); margin-right: 0.5rem;"></i>
                            <span style="color: var(--text-primary);">Event Appearances</span>
                        </div>
                    @endif
                    @if($user->influencerProfile?->accepts_product_reviews)
                        <div style="display: flex; align-items: center;">
                            <i class="fas fa-check-circle" style="color: var(--success-color); margin-right: 0.5rem;"></i>
                            <span style="color: var(--text-primary);">Product Reviews</span>
                        </div>
                    @endif
                    @if($user->influencerProfile?->accepts_sponsored_content)
                        <div style="display: flex; align-items: center;">
                            <i class="fas fa-check-circle" style="color: var(--success-color); margin-right: 0.5rem;"></i>
                            <span style="color: var(--text-primary);">Sponsored Content</span>
                        </div>
                    @endif
                </div>
            </div>

            <div>
                <h4 style="font-weight: 600; color: var(--text-primary); margin-bottom: 1rem;">Settings</h4>
                <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                    <div style="display: flex; align-items: center;">
                        <i class="fas fa-{{ $user->influencerProfile?->is_available_for_collaboration ? 'check-circle' : 'times-circle' }}" 
                           style="color: {{ $user->influencerProfile?->is_available_for_collaboration ? 'var(--success-color)' : 'var(--danger-color)' }}; margin-right: 0.5rem;"></i>
                        <span style="color: var(--text-primary);">Available for Collaboration</span>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <i class="fas fa-{{ $user->influencerProfile?->accepts_direct_messages ? 'check-circle' : 'times-circle' }}" 
                           style="color: {{ $user->influencerProfile?->accepts_direct_messages ? 'var(--success-color)' : 'var(--danger-color)' }}; margin-right: 0.5rem;"></i>
                        <span style="color: var(--text-primary);">Accepts Direct Messages</span>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <i class="fas fa-{{ $user->influencerProfile?->show_contact_info ? 'check-circle' : 'times-circle' }}" 
                           style="color: {{ $user->influencerProfile?->show_contact_info ? 'var(--success-color)' : 'var(--danger-color)' }}; margin-right: 0.5rem;"></i>
                        <span style="color: var(--text-primary);">Show Contact Information</span>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <i class="fas fa-{{ $user->influencerProfile?->show_rates ? 'check-circle' : 'times-circle' }}" 
                           style="color: {{ $user->influencerProfile?->show_rates ? 'var(--success-color)' : 'var(--danger-color)' }}; margin-right: 0.5rem;"></i>
                        <span style="color: var(--text-primary);">Show Rates Publicly</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Engagement Metrics -->
@if($user->influencerProfile?->average_engagement_rate || $user->influencerProfile?->average_likes_per_post || $user->influencerProfile?->average_comments_per_post || $user->influencerProfile?->average_shares_per_post || $user->influencerProfile?->average_video_views || $user->influencerProfile?->average_story_views)
<div class="card" style="margin-bottom: 1.5rem;">
    <div class="card-header">
        <h3 class="card-title">Engagement Metrics</h3>
    </div>
    <div class="card-body">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 1rem;">
            @if($user->influencerProfile?->average_engagement_rate)
                <div style="text-align: center; padding: 1rem; border: 1px solid var(--border-color); border-radius: 0.5rem;">
                    <div style="font-size: 1.5rem; font-weight: 700; color: var(--primary-color);">{{ number_format($user->influencerProfile->average_engagement_rate, 1) }}%</div>
                    <div style="font-size: 0.875rem; color: var(--text-secondary);">Engagement Rate</div>
                </div>
            @endif

            @if($user->influencerProfile?->average_likes_per_post)
                <div style="text-align: center; padding: 1rem; border: 1px solid var(--border-color); border-radius: 0.5rem;">
                    <div style="font-size: 1.5rem; font-weight: 700; color: var(--primary-color);">{{ number_format($user->influencerProfile->average_likes_per_post) }}</div>
                    <div style="font-size: 0.875rem; color: var(--text-secondary);">Avg Likes/Post</div>
                </div>
            @endif

            @if($user->influencerProfile?->average_comments_per_post)
                <div style="text-align: center; padding: 1rem; border: 1px solid var(--border-color); border-radius: 0.5rem;">
                    <div style="font-size: 1.5rem; font-weight: 700; color: var(--primary-color);">{{ number_format($user->influencerProfile->average_comments_per_post) }}</div>
                    <div style="font-size: 0.875rem; color: var(--text-secondary);">Avg Comments/Post</div>
                </div>
            @endif

            @if($user->influencerProfile?->average_shares_per_post)
                <div style="text-align: center; padding: 1rem; border: 1px solid var(--border-color); border-radius: 0.5rem;">
                    <div style="font-size: 1.5rem; font-weight: 700; color: var(--primary-color);">{{ number_format($user->influencerProfile->average_shares_per_post) }}</div>
                    <div style="font-size: 0.875rem; color: var(--text-secondary);">Avg Shares/Post</div>
                </div>
            @endif

            @if($user->influencerProfile?->average_video_views)
                <div style="text-align: center; padding: 1rem; border: 1px solid var(--border-color); border-radius: 0.5rem;">
                    <div style="font-size: 1.5rem; font-weight: 700; color: var(--primary-color);">{{ number_format($user->influencerProfile->average_video_views) }}</div>
                    <div style="font-size: 0.875rem; color: var(--text-secondary);">Avg Video Views</div>
                </div>
            @endif

            @if($user->influencerProfile?->average_story_views)
                <div style="text-align: center; padding: 1rem; border: 1px solid var(--border-color); border-radius: 0.5rem;">
                    <div style="font-size: 1.5rem; font-weight: 700; color: var(--primary-color);">{{ number_format($user->influencerProfile->average_story_views) }}</div>
                    <div style="font-size: 0.875rem; color: var(--text-secondary);">Avg Story Views</div>
                </div>
            @endif
        </div>
    </div>
</div>
@endif