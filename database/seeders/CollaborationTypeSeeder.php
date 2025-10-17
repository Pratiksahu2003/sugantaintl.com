<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CollaborationType;

class CollaborationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collaborationTypes = [
            [
                'name' => 'Sponsored Post',
                'slug' => 'sponsored_post',
                'description' => 'Create sponsored content posts for brands on social media platforms.',
                'icon' => 'fas fa-bullhorn',
                'color' => '#3B82F6',
                'requirements' => ['High-quality content', 'Brand guidelines compliance', 'Engagement metrics'],
                'deliverables' => ['Social media posts', 'Content images/videos', 'Engagement report'],
                'pricing_models' => ['fixed', 'per_post'],
                'duration_options' => ['1_day', '3_days', '1_week'],
                'platforms' => ['instagram', 'facebook', 'twitter', 'tiktok'],
                'sort_order' => 1,
            ],
            [
                'name' => 'Product Review',
                'slug' => 'product_review',
                'description' => 'Review and promote products with honest feedback and recommendations.',
                'icon' => 'fas fa-star',
                'color' => '#F59E0B',
                'requirements' => ['Product testing', 'Honest feedback', 'High-quality photos/videos'],
                'deliverables' => ['Review posts', 'Product photos', 'Video reviews', 'Testimonial'],
                'pricing_models' => ['fixed', 'gifted'],
                'duration_options' => ['1_week', '2_weeks', '1_month'],
                'platforms' => ['instagram', 'youtube', 'blog', 'tiktok'],
                'sort_order' => 2,
            ],
            [
                'name' => 'Brand Ambassador',
                'slug' => 'brand_ambassador',
                'description' => 'Long-term partnership to represent and promote a brand consistently.',
                'icon' => 'fas fa-handshake',
                'color' => '#10B981',
                'requirements' => ['Long-term commitment', 'Brand alignment', 'Regular content creation'],
                'deliverables' => ['Regular posts', 'Brand representation', 'Event appearances', 'Content creation'],
                'pricing_models' => ['per_month', 'fixed'],
                'duration_options' => ['3_months', '6_months', '1_year', 'ongoing'],
                'platforms' => ['instagram', 'facebook', 'twitter', 'youtube', 'tiktok'],
                'sort_order' => 3,
            ],
            [
                'name' => 'Event Appearance',
                'slug' => 'event_appearance',
                'description' => 'Attend and promote events, launches, or brand activations.',
                'icon' => 'fas fa-calendar-alt',
                'color' => '#EF4444',
                'requirements' => ['Event attendance', 'Live coverage', 'Social media promotion'],
                'deliverables' => ['Event coverage', 'Live posts', 'Event photos/videos', 'Social media promotion'],
                'pricing_models' => ['fixed', 'per_day'],
                'duration_options' => ['1_day', '3_days', '1_week'],
                'platforms' => ['instagram', 'facebook', 'twitter', 'tiktok', 'youtube'],
                'sort_order' => 4,
            ],
            [
                'name' => 'Content Creation',
                'slug' => 'content_creation',
                'description' => 'Create custom content including photos, videos, and written content.',
                'icon' => 'fas fa-camera',
                'color' => '#8B5CF6',
                'requirements' => ['Creative skills', 'High-quality production', 'Brand compliance'],
                'deliverables' => ['Custom content', 'Photos/videos', 'Written content', 'Creative assets'],
                'pricing_models' => ['fixed', 'per_post', 'hourly'],
                'duration_options' => ['1_week', '2_weeks', '1_month'],
                'platforms' => ['instagram', 'youtube', 'tiktok', 'blog'],
                'sort_order' => 5,
            ],
            [
                'name' => 'Social Media Takeover',
                'slug' => 'social_media_takeover',
                'description' => 'Take over brand social media accounts for a specific period.',
                'icon' => 'fas fa-share-alt',
                'color' => '#06B6D4',
                'requirements' => ['Social media expertise', 'Brand voice understanding', 'Engagement skills'],
                'deliverables' => ['Account management', 'Content creation', 'Community engagement', 'Analytics report'],
                'pricing_models' => ['per_day', 'fixed'],
                'duration_options' => ['1_day', '3_days', '1_week'],
                'platforms' => ['instagram', 'facebook', 'twitter', 'tiktok'],
                'sort_order' => 6,
            ],
            [
                'name' => 'Influencer Collaboration',
                'slug' => 'influencer_collaboration',
                'description' => 'Collaborate with other influencers for joint content creation.',
                'icon' => 'fas fa-users',
                'color' => '#84CC16',
                'requirements' => ['Collaboration skills', 'Content coordination', 'Cross-promotion'],
                'deliverables' => ['Joint content', 'Cross-promotion', 'Collaborative posts', 'Shared audience reach'],
                'pricing_models' => ['fixed', 'exchange'],
                'duration_options' => ['1_week', '2_weeks', '1_month'],
                'platforms' => ['instagram', 'youtube', 'tiktok', 'twitter'],
                'sort_order' => 7,
            ],
            [
                'name' => 'Affiliate Marketing',
                'slug' => 'affiliate_marketing',
                'description' => 'Promote products/services through affiliate links and earn commissions.',
                'icon' => 'fas fa-link',
                'color' => '#F97316',
                'requirements' => ['Audience trust', 'Honest recommendations', 'Link tracking'],
                'deliverables' => ['Affiliate posts', 'Product promotion', 'Sales tracking', 'Commission reports'],
                'pricing_models' => ['commission'],
                'duration_options' => ['ongoing', '1_month', '3_months'],
                'platforms' => ['instagram', 'youtube', 'blog', 'tiktok'],
                'sort_order' => 8,
            ],
            [
                'name' => 'Gift Collaboration',
                'slug' => 'gift_collaboration',
                'description' => 'Receive products as gifts in exchange for honest reviews and promotion.',
                'icon' => 'fas fa-gift',
                'color' => '#EC4899',
                'requirements' => ['Honest reviews', 'Product promotion', 'Gift acknowledgment'],
                'deliverables' => ['Product reviews', 'Gift posts', 'Honest feedback', 'Product promotion'],
                'pricing_models' => ['gifted'],
                'duration_options' => ['1_week', '2_weeks', '1_month'],
                'platforms' => ['instagram', 'youtube', 'tiktok', 'blog'],
                'sort_order' => 9,
            ],
            [
                'name' => 'Paid Partnership',
                'slug' => 'paid_partnership',
                'description' => 'Official paid partnership with brands for promotional content.',
                'icon' => 'fas fa-hand-holding-usd',
                'color' => '#14B8A6',
                'requirements' => ['Partnership disclosure', 'Brand compliance', 'Quality content'],
                'deliverables' => ['Partnership posts', 'Brand promotion', 'Compliance reports', 'Performance metrics'],
                'pricing_models' => ['fixed', 'per_post'],
                'duration_options' => ['1_week', '2_weeks', '1_month'],
                'platforms' => ['instagram', 'facebook', 'twitter', 'youtube'],
                'sort_order' => 10,
            ],
        ];

        foreach ($collaborationTypes as $type) {
            CollaborationType::create($type);
        }
    }
}