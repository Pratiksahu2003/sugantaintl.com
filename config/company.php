<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Company Statistics
    |--------------------------------------------------------------------------
    |
    | These values represent the company's key performance metrics
    | and achievements displayed throughout the website.
    |
    */
    'statistics' => [
        'total_videos' => '500+',
        'clients' => '20+',
        'cities' => '30+',
        'languages' => '6+',
    ],

    /*
    |--------------------------------------------------------------------------
    | Contact Information
    |--------------------------------------------------------------------------
    |
    | Primary contact details for the company
    |
    */
    'contact' => [
        'phone' => '+91 9266389413',
        'email' => 'reachus@sugantaintl.com',
        'address' => 'SuGanta International, 4th Floor, 96A, Block- B, Pocket-10, Dwarka Sector -13, New Delhi 110075, Delhi, India',
    ],

    /*
    |--------------------------------------------------------------------------
    | Company Information
    |--------------------------------------------------------------------------
    |
    | Basic company details
    |
    */
    'company' => [
        'name' => 'SuGanta Internationals',
        'tagline' => 'Professional Video Production Services',
        'description' => 'Leading video production company offering video shoots, ads production, studio rentals, and podcast services for businesses worldwide',
    ],

    /*
    |--------------------------------------------------------------------------
    | Portfolio Videos
    |--------------------------------------------------------------------------
    |
    | YouTube video embeds for showcasing our work
    |
    */
    'portfolio_videos' => [
        [
            'title' => 'Corporate Video Production',
            'iframe' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/CdH6HGEhx9s?si=CgXzHhgUA0APlkAx" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>',
            'description' => 'Professional corporate video showcasing our production capabilities'
        ],
        [
            'title' => 'Commercial Advertisement',
            'iframe' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/K1ImD48UqNQ?si=K3tK_uu9JjsNM_vR" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>',
            'description' => 'Dynamic commercial advertisement featuring our creative expertise'
        ],
        [
            'title' => 'Event Coverage',
            'iframe' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/5PsSi25OKJ8?si=-hMBaXe_2zttp4aO" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>',
            'description' => 'Comprehensive event coverage demonstrating our versatility'
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Team Members
    |--------------------------------------------------------------------------
    |
    | Company team members and their roles
    |
    */
    'team' => [
        [
            'name' => 'Sushil Khatta',
            'position' => 'Production Manager',
            'description' => 'Oversees all aspects of video production, ensuring projects are delivered on time and to the highest quality standards.',
            'initials' => 'SK',
            'image' => '/team/sushil.jpg'
        ],
        [
            'name' => 'Vidu Slathia',
            'position' => 'Manager- Media/ PR & Sales',
            'description' => 'Leads media relations, public relations, and sales initiatives to expand the company\'s reach and client base.',
            'initials' => 'VS',
            'image' => '/team/vidu.png'
        ],
        [
            'name' => 'Shashak',
            'position' => 'Video & Media Editor',
            'description' => 'Edits and enhances video content, ensuring a polished final product that meets client expectations.',
            'initials' => 'SH',
            'image' => '/team/shashak.jpg'
        ],
        [
            'name' => 'Vishal Sharma ',
            'position' => 'Manger Contracting & HRD',
            'description' => 'Manages contracts, vendor relationships, and human resource development for smooth business operations.',
            'initials' => 'VS',
            'image' => '/team/vishal.jpg'
        ],
        [
            'name' => 'Pratik Sahu',
            'position' => 'Manager - IT & Tech Management',
            'description' => 'Handles all IT infrastructure, technical support, and technology strategy for the company.',
            'initials' => 'PS',
            'image' => '/team/pratik.png'
        ],
        [
            'name' => 'Ankita Jha',
            'position' => 'Vice President - Content & Business Development',
            'description' => 'Drives content strategy and business development, building partnerships and expanding service offerings.',
            'initials' => 'AJ',
            'image' => '/team/ankita.jpg'
        ]
    ],
];
