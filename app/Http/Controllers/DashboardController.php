<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\InfluencerService;
use App\Models\InfluencerPackage;
use App\Models\InfluencerCollaboration;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the unified dashboard for all user types.
     */
    public function index()
    {
        $user = Auth::user();
        
        // Get data based on user role
        $data = $this->getRoleBasedData($user);
        
        return view('dashboard', compact('user', 'data'));
    }
    
    /**
     * Get data based on user role.
     */
    private function getRoleBasedData($user)
    {
        $data = [
            'user' => $user,
            'role' => $user->roles->first()?->name ?? 'user',
            'isAdmin' => $user->hasRole('admin'),
            'isInfluencer' => $user->hasRole('influencer'),
            'isCompany' => $user->hasRole('company'),
        ];
        
        // Admin data
        if ($data['isAdmin']) {
            $data['admin'] = [
                'totalUsers' => User::count(),
                'verifiedUsers' => User::whereNotNull('email_verified_at')->count(),
                'pendingVerification' => User::whereNull('email_verified_at')->count(),
                'newUsersThisWeek' => User::where('created_at', '>=', now()->subDays(7))->count(),
                'newUsersThisMonth' => User::where('created_at', '>=', now()->subDays(30))->count(),
                'recentUsers' => User::latest()->take(5)->get(),
                'totalRoles' => \App\Models\Role::count(),
                'totalInfluencers' => User::whereHas('roles', function($q) {
                    $q->where('name', 'influencer');
                })->count(),
                'totalCompanies' => User::whereHas('roles', function($q) {
                    $q->where('name', 'company');
                })->count(),
            ];
        }
        
        // Influencer data
        if ($data['isInfluencer']) {
            $data['influencer'] = [
                'totalServices' => InfluencerService::where('user_id', $user->id)->count(),
                'activeServices' => InfluencerService::where('user_id', $user->id)->where('is_active', true)->count(),
                'featuredServices' => InfluencerService::where('user_id', $user->id)->where('is_featured', true)->count(),
                'totalPackages' => InfluencerPackage::where('user_id', $user->id)->count(),
                'activePackages' => InfluencerPackage::where('user_id', $user->id)->where('is_active', true)->count(),
                'featuredPackages' => InfluencerPackage::where('user_id', $user->id)->where('is_featured', true)->count(),
                'totalCollaborations' => InfluencerCollaboration::where('user_id', $user->id)->count(),
                'openCollaborations' => InfluencerCollaboration::where('user_id', $user->id)->where('status', 'open')->count(),
                'inProgressCollaborations' => InfluencerCollaboration::where('user_id', $user->id)->where('status', 'in_progress')->count(),
                'completedCollaborations' => InfluencerCollaboration::where('user_id', $user->id)->where('status', 'completed')->count(),
                'recentServices' => InfluencerService::where('user_id', $user->id)->latest()->take(3)->get(),
                'recentPackages' => InfluencerPackage::where('user_id', $user->id)->latest()->take(3)->get(),
                'recentCollaborations' => InfluencerCollaboration::where('user_id', $user->id)->latest()->take(3)->get(),
            ];
        }
        
        // Company data
        if ($data['isCompany']) {
            $data['company'] = [
                'profileComplete' => $this->isProfileComplete($user),
                'profileCompletion' => $this->getProfileCompletion($user),
                'hasInfluencerProfile' => $user->influencerProfile()->exists(),
                'hasCompanyProfile' => $user->companyProfile()->exists(),
            ];
        }
        
        // General user data
        $data['general'] = [
            'profileComplete' => $this->isProfileComplete($user),
            'profileCompletion' => $this->getProfileCompletion($user),
            'lastLogin' => $user->last_login_at ?? $user->created_at,
            'accountAge' => $user->created_at->diffForHumans(),
            'emailVerified' => $user->email_verified_at !== null,
        ];
        
        return $data;
    }
    
    /**
     * Check if user profile is complete.
     */
    private function isProfileComplete($user)
    {
        $profile = $user->profile;
        if (!$profile) return false;
        
        $requiredFields = ['bio', 'phone', 'location'];
        foreach ($requiredFields as $field) {
            if (empty($profile->$field)) {
                return false;
            }
        }
        
        return true;
    }
    
    /**
     * Get profile completion percentage.
     */
    private function getProfileCompletion($user)
    {
        $profile = $user->profile;
        if (!$profile) return 0;
        
        $fields = [
            'bio', 'phone', 'location', 'website', 'social_links',
            'avatar', 'cover_image', 'skills', 'experience'
        ];
        
        $completed = 0;
        foreach ($fields as $field) {
            if (!empty($profile->$field)) {
                $completed++;
            }
        }
        
        return round(($completed / count($fields)) * 100);
    }
}
