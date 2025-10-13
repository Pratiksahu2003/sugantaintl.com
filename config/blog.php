<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Blog Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains the configuration for blog posts including
    | slug-to-filename mappings and blog settings.
    |
    */

    'posts' => [
        // Blog posts configuration
        // Format: 'slug' => 'filename'
        
        // Example posts - replace with your actual blog posts
        'getting-started-with-video-production' => 'getting-started-video-production',
        'best-practices-for-corporate-videos' => 'corporate-video-best-practices',
        'studio-rental-guide' => 'studio-rental-complete-guide',
        'podcast-production-tips' => 'podcast-production-tips',
        'video-marketing-strategies' => 'video-marketing-strategies',
        'equipment-rental-checklist' => 'equipment-rental-checklist',
        'live-streaming-setup' => 'live-streaming-setup-guide',
        'drone-videography-tips' => 'drone-videography-tips',
        'video-editing-workflow' => 'video-editing-workflow',
        'brand-storytelling-through-video' => 'brand-storytelling-video',
        'analytics-driven-marketing-decisions' => 'analytics-driven-marketing-decisions',
        'key-digital-marketing-kpis' => 'key-digital-marketing-kpis',
        'professional-photoshoots-boost-brand-image' => 'professional-photoshoots-boost-brand-image',
        'indias-b2b-digital-marketing-growth' => 'indias-b2b-digital-marketing-growth',
        'google-ads-vs-meta-ads-roi-comparison' => 'google-ads-vs-meta-ads-roi-comparison',
        'instagram-advertising-organic-growth-2025' => 'instagram-advertising-organic-growth-2025',
        'understanding-click-through-rate-ctr' => 'understanding-click-through-rate-ctr',
        'keyword-research-importance-guide' => 'keyword-research-importance-guide',
        'strong-brand-strategy-transform-online-presence' => 'strong-brand-strategy-transform-online-presence',
        'why-business-needs-digital-presence-2025' => 'why-business-needs-digital-presence-2025',
        'seo-mistakes-killing-your-rankings' => 'seo-mistakes-killing-your-rankings',
        'how-ai-reshaping-digital-marketing' => 'how-ai-reshaping-digital-marketing',
        'psychology-online-buying-what-makes-people-click' => 'psychology-online-buying-what-makes-people-click',
        'positioning-business-crowded-market' => 'positioning-business-crowded-market',
    ],

    'settings' => [
        // Blog general settings
        'posts_per_page' => 6,
        'featured_posts_count' => 3,
        'recent_posts_count' => 5,
        'enable_comments' => true,
        'enable_sharing' => true,
        'enable_search' => true,
        'meta_description' => 'SuGanta Internationals Blog - Expert insights on video production, studio rentals, podcast services, and digital marketing strategies.',
        'meta_keywords' => 'video production, studio rental, podcast services, digital marketing, video editing, drone videography',
    ],

    'categories' => [
        // Blog categories
        'video-production' => [
            'name' => 'Video Production',
            'description' => 'Tips, techniques, and insights for professional video production',
            'icon' => 'fas fa-video',
            'color' => '#f97316',
        ],
        'studio-rental' => [
            'name' => 'Studio Rental',
            'description' => 'Everything about studio rentals and equipment',
            'icon' => 'fas fa-building',
            'color' => '#3b82f6',
        ],
        'podcast-services' => [
            'name' => 'Podcast Services',
            'description' => 'Podcast production and audio services',
            'icon' => 'fas fa-microphone',
            'color' => '#10b981',
        ],
        'marketing' => [
            'name' => 'Marketing',
            'description' => 'Video marketing strategies and trends',
            'icon' => 'fas fa-chart-line',
            'color' => '#8b5cf6',
        ],
        'equipment' => [
            'name' => 'Equipment',
            'description' => 'Equipment reviews and recommendations',
            'icon' => 'fas fa-camera',
            'color' => '#ef4444',
        ],
    ],

    'tags' => [
        // Common blog tags
        'video-production',
        'studio-rental',
        'podcast',
        'marketing',
        'equipment',
        'tips',
        'tutorial',
        'guide',
        'strategy',
        'technology',
        'creativity',
        'business',
        'branding',
        'social-media',
        'content-creation',
    ],

    'routes' => [
        // Blog route configuration
        'blog_index' => 'blog',
        'blog_post' => 'blog/{slug}',
        'blog_category' => 'blog/category/{category}',
        'blog_tag' => 'blog/tag/{tag}',
        'blog_search' => 'blog/search',
    ],

    'seo' => [
        // SEO settings for blog
        'default_title' => 'Blog - SuGanta Internationals',
        'title_suffix' => ' | SuGanta Internationals Blog',
        'default_description' => 'Expert insights on video production, studio rentals, and digital marketing strategies.',
        'og_image' => 'images/blog-og-image.jpg',
        'twitter_card' => 'summary_large_image',
        'canonical_base' => 'https://sugantainternationals.com/blog',
    ],

    'pagination' => [
        // Pagination settings
        'posts_per_page' => 6,
        'show_pagination' => true,
        'pagination_style' => 'numbered', // 'numbered', 'simple', 'infinite'
    ],

    'social_sharing' => [
        // Social sharing configuration
        'enabled' => true,
        'platforms' => [
            'facebook' => true,
            'twitter' => true,
            'linkedin' => true,
            'whatsapp' => true,
            'telegram' => true,
        ],
        'show_counts' => false,
    ],

    'comments' => [
        // Comments configuration
        'enabled' => true,
        'moderation' => true,
        'max_length' => 1000,
        'allow_guest_comments' => true,
        'require_email' => true,
    ],

    'cache' => [
        // Cache settings for blog
        'enabled' => true,
        'duration' => 3600, // 1 hour in seconds
        'tags' => ['blog', 'posts'],
    ],
];
