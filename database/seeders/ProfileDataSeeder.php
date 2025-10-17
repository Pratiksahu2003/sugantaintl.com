<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\InfluencerProfile;
use App\Models\CompanyProfile;

class ProfileDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get users by role
        $adminUser = User::whereHas('roles', function($query) {
            $query->where('slug', 'admin');
        })->first();

        $influencerUser = User::whereHas('roles', function($query) {
            $query->where('slug', 'influencer');
        })->first();

        $companyUser = User::whereHas('roles', function($query) {
            $query->where('slug', 'company');
        })->first();

        // Create basic user profile for admin
        if ($adminUser && !$adminUser->profile) {
            UserProfile::create([
                'user_id' => $adminUser->id,
                'first_name' => 'John',
                'last_name' => 'Admin',
                'phone' => '+1-555-0123',
                'date_of_birth' => '1985-06-15',
                'gender' => 'male',
                'bio' => 'System administrator with 10+ years of experience in web development and system management.',
                'website' => 'https://admin.example.com',
                'location' => 'San Francisco, CA',
                'social_links' => [
                    'twitter' => 'https://twitter.com/admin_user',
                    'linkedin' => 'https://linkedin.com/in/admin-user',
                    'github' => 'https://github.com/admin-user'
                ],
                'preferences' => [
                    'theme' => 'dark',
                    'notifications' => 'email',
                    'language' => 'en'
                ],
                'is_public' => true,
            ]);
        }

        // Create influencer profile
        if ($influencerUser && !$influencerUser->influencerProfile) {
            InfluencerProfile::create([
                'user_id' => $influencerUser->id,
                'stage_name' => 'Fashionista Sarah',
                'niche' => 'Fashion & Lifestyle',
                'about' => 'Fashion influencer with 500K+ followers across platforms. I love sharing style tips, beauty routines, and lifestyle content. Available for brand collaborations!',
                'social_platforms' => [
                    'instagram' => [
                        'username' => 'fashionista_sarah',
                        'followers' => 250000,
                        'engagement_rate' => 4.5
                    ],
                    'tiktok' => [
                        'username' => 'sarahfashion',
                        'followers' => 180000,
                        'engagement_rate' => 6.2
                    ],
                    'youtube' => [
                        'username' => 'SarahFashionTV',
                        'followers' => 75000,
                        'engagement_rate' => 3.8
                    ]
                ],
                'engagement_stats' => [
                    'average_engagement_rate' => 4.8,
                    'reach_rate' => 12.5,
                    'click_through_rate' => 2.3
                ],
                'content_categories' => ['Fashion', 'Beauty', 'Lifestyle', 'Travel'],
                'rate_per_post' => 2500.00,
                'rate_per_story' => 800.00,
                'rate_per_video' => 5000.00,
                'currency' => 'USD',
                'availability' => [
                    'timezone' => 'PST',
                    'working_hours' => '9 AM - 6 PM',
                    'response_time' => '24 hours'
                ],
                'collaboration_preferences' => [
                    'preferred_brands' => ['Fashion', 'Beauty', 'Lifestyle'],
                    'content_types' => ['Posts', 'Stories', 'Videos'],
                    'budget_range' => '1000-10000'
                ],
                'is_verified' => true,
                'is_available_for_collaboration' => true,
            ]);
        }

        // Create company profile
        if ($companyUser && !$companyUser->companyProfile) {
            CompanyProfile::create([
                'user_id' => $companyUser->id,
                'company_name' => 'EcoFashion Co.',
                'legal_name' => 'EcoFashion Company LLC',
                'registration_number' => 'ECO-2023-001',
                'tax_id' => '12-3456789',
                'description' => 'Sustainable fashion brand committed to eco-friendly clothing and ethical manufacturing. We create stylish, sustainable clothing for conscious consumers.',
                'website' => 'https://ecofashion.com',
                'industry' => 'Fashion & Apparel',
                'company_size' => 'Medium (11-50)',
                'founded_year' => '2020',
                'headquarters' => 'Los Angeles, CA',
                'contact_info' => [
                    'phone' => '+1-555-0199',
                    'email' => 'contact@ecofashion.com',
                    'address' => '123 Fashion Street, LA, CA 90210'
                ],
                'social_media' => [
                    'instagram' => [
                        'username' => 'ecofashion_co',
                        'followers' => 45000
                    ],
                    'facebook' => [
                        'username' => 'EcoFashionCompany',
                        'followers' => 32000
                    ],
                    'twitter' => [
                        'username' => 'EcoFashionCo',
                        'followers' => 18000
                    ]
                ],
                'brand_values' => [
                    'sustainability' => 'Committed to environmental responsibility',
                    'ethics' => 'Fair trade and ethical manufacturing',
                    'quality' => 'High-quality, durable products',
                    'innovation' => 'Leading sustainable fashion innovation'
                ],
                'target_audience' => [
                    'age_range' => '25-45',
                    'gender' => 'All',
                    'interests' => ['Sustainability', 'Fashion', 'Ethical Shopping'],
                    'income_level' => 'Middle to High',
                    'location' => 'Urban areas'
                ],
                'marketing_preferences' => [
                    'campaign_types' => ['Brand Awareness', 'Product Launch', 'Seasonal Campaigns'],
                    'content_preferences' => ['Educational', 'Inspirational', 'Behind-the-scenes'],
                    'collaboration_style' => 'Long-term partnerships',
                    'budget_allocation' => '70% Digital, 30% Traditional'
                ],
                'budget_range_min' => 5000.00,
                'budget_range_max' => 50000.00,
                'currency' => 'USD',
                'is_verified' => true,
                'is_active' => true,
            ]);
        }

        $this->command->info('Profile data seeded successfully!');
    }
}
