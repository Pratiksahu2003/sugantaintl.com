<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use App\Models\InfluencerProfile;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    /**
     * Display the user's profile based on their role.
     */
    public function show(User $user = null): View
    {
        // If no user specified, show current user's profile
        if (!$user) {
            $user = Auth::user();
        }

        // Load all related data
        $user->load(['profile', 'influencerProfile', 'companyProfile', 'roles']);

        // Determine the profile type based on user's roles
        $profileType = $this->getProfileType($user);
        
        return view('profile.show', compact('user', 'profileType'));
    }

    /**
     * Show the form for editing the user's profile.
     */
    public function edit(Request $request, User $user = null): View
    {
        // If no user specified, check for query parameter or use current user
        if (!$user) {
            // Check if user ID is provided as query parameter
            if ($request->has('user_id')) {
                $userId = $request->input('user_id');
                $user = User::find($userId);
                
                if (!$user) {
                    abort(404, 'User not found.');
                }
            } else {
                $user = Auth::user();
            }
        }

        // Check permissions - admins can edit any profile, others can only edit their own
        if (!Auth::user()->hasRole('admin') && Auth::user()->id !== $user->id) {
            abort(403, 'Access denied. You can only edit your own profile.');
        }

        $user->load(['profile', 'influencerProfile', 'companyProfile', 'roles']);
        $profileType = $this->getProfileType($user);
        $isAdmin = Auth::user()->hasRole('admin');
        
        return view('profile.edit', compact('user', 'profileType', 'isAdmin'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, User $user = null): RedirectResponse
    {
        // If no user specified, check for query parameter or use current user
        if (!$user) {
            // Check if user ID is provided as query parameter
            if ($request->has('user_id')) {
                $userId = $request->input('user_id');
                $user = User::find($userId);
                
                if (!$user) {
                    abort(404, 'User not found.');
                }
            } else {
                $user = Auth::user();
            }
        }

        // Check permissions
        if (!Auth::user()->hasRole('admin') && Auth::user()->id !== $user->id) {
            abort(403, 'Access denied. You can only update your own profile.');
        }

        $profileType = $this->getProfileType($user);

        // Update basic user information
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'email_verified_at' => $request->has('email_verified') ? now() : null,
        ]);

        // Handle admin-specific updates
        if (Auth::user()->hasRole('admin')) {
            // Update user roles
            if ($request->has('roles')) {
                $user->roles()->sync($request->input('roles'));
            } else {
                $user->roles()->detach();
            }
        }

        // Update role-specific profile
        switch ($profileType) {
            case 'influencer':
                $this->updateInfluencerProfile($request, $user);
                break;
            case 'company':
                $this->updateCompanyProfile($request, $user);
                break;
            default:
                $this->updateUserProfile($request, $user);
                break;
        }

        return redirect()->route('profile.show', $user)
            ->with('success', 'Profile updated successfully.');
    }

    /**
     * Determine the profile type based on user's roles.
     */
    private function getProfileType(User $user): string
    {
        if ($user->hasRole('influencer')) {
            return 'influencer';
        } elseif ($user->hasRole('company')) {
            return 'company';
        } else {
            return 'user';
        }
    }

    /**
     * Update user profile (basic profile).
     */
    private function updateUserProfile(Request $request, User $user): void
    {
        $profileData = $request->only([
            'first_name', 'last_name', 'phone', 'date_of_birth',
            'gender', 'bio', 'website', 'location', 'is_public'
        ]);

        // Handle social links
        if ($request->has('social_links')) {
            $profileData['social_links'] = $request->input('social_links');
        }

        // Handle preferences
        if ($request->has('preferences')) {
            $profileData['preferences'] = $request->input('preferences');
        }

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            $profileData['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->profile()->updateOrCreate(['user_id' => $user->id], $profileData);
    }

    /**
     * Update influencer profile.
     */
    private function updateInfluencerProfile(Request $request, User $user): void
    {
        $profileData = $request->only([
            'stage_name', 'profession', 'primary_category_id', 'company_name', 'company_position',
            'about', 'bio_extended', 'mission_statement', 'values',
            'instagram_url', 'instagram_handle', 'instagram_followers',
            'tiktok_url', 'tiktok_handle', 'tiktok_followers',
            'youtube_url', 'youtube_handle', 'youtube_subscribers',
            'twitter_url', 'twitter_handle', 'twitter_followers',
            'facebook_url', 'facebook_handle', 'facebook_followers',
            'linkedin_url', 'linkedin_handle', 'linkedin_followers',
            'snapchat_url', 'snapchat_handle', 'snapchat_followers',
            'pinterest_url', 'pinterest_handle', 'pinterest_followers',
            'twitch_url', 'twitch_handle', 'twitch_followers',
            'discord_url', 'discord_handle', 'telegram_url', 'telegram_handle',
            'reddit_url', 'reddit_handle', 'clubhouse_url', 'clubhouse_handle',
            'spotify_url', 'spotify_handle', 'soundcloud_url', 'soundcloud_handle',
            'behance_url', 'behance_handle', 'dribbble_url', 'dribbble_handle',
            'github_url', 'github_handle', 'medium_url', 'medium_handle',
            'substack_url', 'substack_handle', 'patreon_url', 'patreon_handle',
            'onlyfans_url', 'onlyfans_handle', 'website_url', 'blog_url',
            'podcast_url', 'newsletter_url', 'business_email', 'business_phone',
            'manager_name', 'manager_email', 'manager_phone', 'agency_name', 'agency_contact',
            'rate_per_campaign', 'currency', 'country', 'state', 'city', 'timezone', 'primary_language',
            'average_engagement_rate', 'average_likes_per_post', 'average_comments_per_post',
            'average_shares_per_post', 'average_video_views', 'average_story_views',
            'trust_score'
        ]);

        // Handle boolean fields
        $booleanFields = [
            'has_manager', 'has_agency', 'accepts_gifted_collaborations', 'accepts_paid_collaborations',
            'accepts_brand_ambassador', 'accepts_event_appearances', 'accepts_product_reviews',
            'accepts_sponsored_content', 'is_featured', 'is_premium', 'accepts_direct_messages',
            'show_contact_info', 'show_rates', 'is_verified', 'is_available_for_collaboration'
        ];

        foreach ($booleanFields as $field) {
            $profileData[$field] = $request->has($field) ? true : false;
        }

        // Handle JSON fields
        $jsonFields = [
            'secondary_categories', 'specializations', 'languages', 'target_audience',
            'audience_locations', 'content_types', 'posting_schedule', 'collaboration_types',
            'brand_preferences', 'content_preferences', 'budget_range', 'payment_methods',
            'portfolio_images', 'portfolio_videos', 'case_studies', 'testimonials',
            'media_kit', 'verification_documents', 'social_proof', 'privacy_settings',
            'achievements', 'awards', 'certifications', 'education', 'work_experience'
        ];

        foreach ($jsonFields as $field) {
            if ($request->has($field)) {
                $value = $request->input($field);
                if (is_string($value) && !empty($value)) {
                    // Convert comma-separated string to array
                    $profileData[$field] = array_map('trim', explode(',', $value));
                } elseif (is_array($value)) {
                    $profileData[$field] = $value;
                } else {
                    $profileData[$field] = null;
                }
            }
        }

        // Handle file uploads
        if ($request->hasFile('profile_image')) {
            $profileData['profile_image'] = $request->file('profile_image')->store('influencer-profiles', 'public');
        }

        if ($request->hasFile('cover_image')) {
            $profileData['cover_image'] = $request->file('cover_image')->store('influencer-covers', 'public');
        }

        $user->influencerProfile()->updateOrCreate(['user_id' => $user->id], $profileData);
    }

    /**
     * Update company profile.
     */
    private function updateCompanyProfile(Request $request, User $user): void
    {
        $profileData = $request->only([
            'company_name', 'legal_name', 'registration_number', 'tax_id',
            'description', 'website', 'industry', 'company_size', 'founded_year',
            'headquarters', 'budget_range_min', 'budget_range_max', 'currency',
            'is_active'
        ]);

        // Handle verification status (admin only)
        if (Auth::user()->hasRole('admin') && $request->has('is_verified')) {
            $profileData['is_verified'] = true;
        }

        // Handle JSON fields
        if ($request->has('contact_info')) {
            $profileData['contact_info'] = $request->input('contact_info');
        }
        if ($request->has('social_media')) {
            $profileData['social_media'] = $request->input('social_media');
        }
        if ($request->has('brand_values')) {
            $profileData['brand_values'] = $request->input('brand_values');
        }
        if ($request->has('target_audience')) {
            $profileData['target_audience'] = $request->input('target_audience');
        }
        if ($request->has('marketing_preferences')) {
            $profileData['marketing_preferences'] = $request->input('marketing_preferences');
        }

        // Handle image uploads
        if ($request->hasFile('logo')) {
            $profileData['logo'] = $request->file('logo')->store('companies', 'public');
        }
        if ($request->hasFile('cover_image')) {
            $profileData['cover_image'] = $request->file('cover_image')->store('companies', 'public');
        }

        $user->companyProfile()->updateOrCreate(['user_id' => $user->id], $profileData);
    }
}
