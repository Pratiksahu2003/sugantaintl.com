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
    public function edit(User $user = null): View
    {
        // If no user specified, edit current user's profile
        if (!$user) {
            $user = Auth::user();
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
        // If no user specified, update current user's profile
        if (!$user) {
            $user = Auth::user();
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
            'stage_name', 'niche', 'about', 'rate_per_post', 'rate_per_story',
            'rate_per_video', 'currency', 'is_available_for_collaboration'
        ]);

        // Handle verification status (admin only)
        if (Auth::user()->hasRole('admin') && $request->has('is_verified')) {
            $profileData['is_verified'] = true;
        }

        // Handle JSON fields
        if ($request->has('social_platforms')) {
            $profileData['social_platforms'] = $request->input('social_platforms');
        }
        if ($request->has('engagement_stats')) {
            $profileData['engagement_stats'] = $request->input('engagement_stats');
        }
        if ($request->has('content_categories')) {
            $profileData['content_categories'] = $request->input('content_categories');
        }
        if ($request->has('availability')) {
            $profileData['availability'] = $request->input('availability');
        }
        if ($request->has('collaboration_preferences')) {
            $profileData['collaboration_preferences'] = $request->input('collaboration_preferences');
        }

        // Handle image uploads
        if ($request->hasFile('profile_image')) {
            $profileData['profile_image'] = $request->file('profile_image')->store('influencers', 'public');
        }
        if ($request->hasFile('cover_image')) {
            $profileData['cover_image'] = $request->file('cover_image')->store('influencers', 'public');
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
