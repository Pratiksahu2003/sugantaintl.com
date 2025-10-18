<?php return array (
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'reverb' => 
      array (
        'driver' => 'reverb',
        'key' => NULL,
        'secret' => NULL,
        'app_id' => NULL,
        'options' => 
        array (
          'host' => NULL,
          'port' => 443,
          'scheme' => 'https',
          'useTLS' => true,
        ),
        'client_options' => 
        array (
        ),
      ),
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => NULL,
        'secret' => NULL,
        'app_id' => NULL,
        'options' => 
        array (
          'cluster' => NULL,
          'host' => 'api-mt1.pusher.com',
          'port' => 443,
          'scheme' => 'https',
          'encrypted' => true,
          'useTLS' => true,
        ),
        'client_options' => 
        array (
        ),
      ),
      'ably' => 
      array (
        'driver' => 'ably',
        'key' => NULL,
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cors' => 
  array (
    'paths' => 
    array (
      0 => 'api/*',
      1 => 'sanctum/csrf-cookie',
    ),
    'allowed_methods' => 
    array (
      0 => '*',
    ),
    'allowed_origins' => 
    array (
      0 => '*',
    ),
    'allowed_origins_patterns' => 
    array (
    ),
    'allowed_headers' => 
    array (
      0 => '*',
    ),
    'exposed_headers' => 
    array (
    ),
    'max_age' => 0,
    'supports_credentials' => false,
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => '12',
      'verify' => true,
      'limit' => NULL,
    ),
    'argon' => 
    array (
      'memory' => 65536,
      'threads' => 1,
      'time' => 4,
      'verify' => true,
    ),
    'rehash_on_login' => true,
  ),
  'concurrency' => 
  array (
    'default' => 'process',
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => '/var/www/starjd.com/resources/views',
    ),
    'compiled' => '/var/www/starjd.com/storage/framework/views',
  ),
  'app' => 
  array (
    'name' => 'Star JD',
    'env' => 'production',
    'debug' => true,
    'url' => 'https://www.starjd.com',
    'frontend_url' => 'http://localhost:3000',
    'asset_url' => NULL,
    'timezone' => 'UTC',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    'cipher' => 'AES-256-CBC',
    'key' => 'base64:QmFigLlUpFd7yeA+emS2+IjDXG7+m1zLht70XVa4BhA=',
    'previous_keys' => 
    array (
    ),
    'maintenance' => 
    array (
      'driver' => 'file',
      'store' => 'database',
    ),
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Concurrency\\ConcurrencyServiceProvider',
      6 => 'Illuminate\\Cookie\\CookieServiceProvider',
      7 => 'Illuminate\\Database\\DatabaseServiceProvider',
      8 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      9 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      10 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      11 => 'Illuminate\\Hashing\\HashServiceProvider',
      12 => 'Illuminate\\Mail\\MailServiceProvider',
      13 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      14 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      15 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      16 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      17 => 'Illuminate\\Queue\\QueueServiceProvider',
      18 => 'Illuminate\\Redis\\RedisServiceProvider',
      19 => 'Illuminate\\Session\\SessionServiceProvider',
      20 => 'Illuminate\\Translation\\TranslationServiceProvider',
      21 => 'Illuminate\\Validation\\ValidationServiceProvider',
      22 => 'Illuminate\\View\\ViewServiceProvider',
      23 => 'App\\Providers\\AppServiceProvider',
      24 => 'App\\Providers\\UrlServiceProvider',
      25 => 'App\\Providers\\AppServiceProvider',
      26 => 'App\\Providers\\UrlServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Arr' => 'Illuminate\\Support\\Arr',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Benchmark' => 'Illuminate\\Support\\Benchmark',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Concurrency' => 'Illuminate\\Support\\Facades\\Concurrency',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Context' => 'Illuminate\\Support\\Facades\\Context',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'Date' => 'Illuminate\\Support\\Facades\\Date',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Http' => 'Illuminate\\Support\\Facades\\Http',
      'Js' => 'Illuminate\\Support\\Js',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Number' => 'Illuminate\\Support\\Number',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Process' => 'Illuminate\\Support\\Facades\\Process',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'RateLimiter' => 'Illuminate\\Support\\Facades\\RateLimiter',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schedule' => 'Illuminate\\Support\\Facades\\Schedule',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'Str' => 'Illuminate\\Support\\Str',
      'Uri' => 'Illuminate\\Support\\Uri',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Vite' => 'Illuminate\\Support\\Facades\\Vite',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_reset_tokens',
        'expire' => 60,
        'throttle' => 60,
      ),
    ),
    'password_timeout' => 10800,
  ),
  'blog' => 
  array (
    'posts' => 
    array (
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
    ),
    'settings' => 
    array (
      'posts_per_page' => 6,
      'featured_posts_count' => 3,
      'recent_posts_count' => 5,
      'enable_comments' => true,
      'enable_sharing' => true,
      'enable_search' => true,
      'meta_description' => 'SuGanta Internationals Blog - Expert insights on video production, studio rentals, podcast services, and digital marketing strategies.',
      'meta_keywords' => 'video production, studio rental, podcast services, digital marketing, video editing, drone videography',
    ),
    'categories' => 
    array (
      'video-production' => 
      array (
        'name' => 'Video Production',
        'description' => 'Tips, techniques, and insights for professional video production',
        'icon' => 'fas fa-video',
        'color' => '#f97316',
      ),
      'studio-rental' => 
      array (
        'name' => 'Studio Rental',
        'description' => 'Everything about studio rentals and equipment',
        'icon' => 'fas fa-building',
        'color' => '#3b82f6',
      ),
      'podcast-services' => 
      array (
        'name' => 'Podcast Services',
        'description' => 'Podcast production and audio services',
        'icon' => 'fas fa-microphone',
        'color' => '#10b981',
      ),
      'marketing' => 
      array (
        'name' => 'Marketing',
        'description' => 'Video marketing strategies and trends',
        'icon' => 'fas fa-chart-line',
        'color' => '#8b5cf6',
      ),
      'equipment' => 
      array (
        'name' => 'Equipment',
        'description' => 'Equipment reviews and recommendations',
        'icon' => 'fas fa-camera',
        'color' => '#ef4444',
      ),
    ),
    'tags' => 
    array (
      0 => 'video-production',
      1 => 'studio-rental',
      2 => 'podcast',
      3 => 'marketing',
      4 => 'equipment',
      5 => 'tips',
      6 => 'tutorial',
      7 => 'guide',
      8 => 'strategy',
      9 => 'technology',
      10 => 'creativity',
      11 => 'business',
      12 => 'branding',
      13 => 'social-media',
      14 => 'content-creation',
    ),
    'routes' => 
    array (
      'blog_index' => 'blog',
      'blog_post' => 'blog/{slug}',
      'blog_category' => 'blog/category/{category}',
      'blog_tag' => 'blog/tag/{tag}',
      'blog_search' => 'blog/search',
    ),
    'seo' => 
    array (
      'default_title' => 'Blog - SuGanta Internationals',
      'title_suffix' => ' | SuGanta Internationals Blog',
      'default_description' => 'Expert insights on video production, studio rentals, and digital marketing strategies.',
      'og_image' => 'images/blog-og-image.jpg',
      'twitter_card' => 'summary_large_image',
      'canonical_base' => 'https://sugantainternationals.com/blog',
    ),
    'pagination' => 
    array (
      'posts_per_page' => 6,
      'show_pagination' => true,
      'pagination_style' => 'numbered',
    ),
    'social_sharing' => 
    array (
      'enabled' => true,
      'platforms' => 
      array (
        'facebook' => true,
        'twitter' => true,
        'linkedin' => true,
        'whatsapp' => true,
        'telegram' => true,
      ),
      'show_counts' => false,
    ),
    'comments' => 
    array (
      'enabled' => true,
      'moderation' => true,
      'max_length' => 1000,
      'allow_guest_comments' => true,
      'require_email' => true,
    ),
    'cache' => 
    array (
      'enabled' => true,
      'duration' => 3600,
      'tags' => 
      array (
        0 => 'blog',
        1 => 'posts',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'array' => 
      array (
        'driver' => 'array',
        'serialize' => false,
      ),
      'session' => 
      array (
        'driver' => 'session',
        'key' => '_cache',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'connection' => NULL,
        'table' => 'cache',
        'lock_connection' => NULL,
        'lock_table' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => '/var/www/starjd.com/storage/framework/cache/data',
        'lock_path' => '/var/www/starjd.com/storage/framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
        'lock_connection' => 'default',
      ),
      'dynamodb' => 
      array (
        'driver' => 'dynamodb',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'table' => 'cache',
        'endpoint' => NULL,
      ),
      'octane' => 
      array (
        'driver' => 'octane',
      ),
    ),
    'prefix' => 'star-jd-cache-',
  ),
  'company' => 
  array (
    'statistics' => 
    array (
      'total_videos' => '500+',
      'clients' => '20+',
      'cities' => '30+',
      'languages' => '4+',
    ),
    'contact' => 
    array (
      'phone' => '+91 9266389413',
      'email' => 'grow@starjd.com',
      'address' => 'SuGanta International, 4th Floor, 96A, Block- B, Pocket-10, Dwarka Sector -13, New Delhi 110075, Delhi, India',
    ),
    'company' => 
    array (
      'name' => 'Star JD',
      'tagline' => 'Professional Video Production Services',
      'description' => 'Leading video production company offering video shoots, ads production, studio rentals, and podcast services for businesses worldwide',
    ),
    'portfolio_videos' => 
    array (
      0 => 
      array (
        'title' => 'Corporate Video Production',
        'iframe' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/CaZxAzb7PPM?si=F1OzzVhyPCdn2Gu0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>',
        'description' => 'Professional corporate video showcasing our production capabilities',
      ),
      1 => 
      array (
        'title' => 'Commercial Advertisement',
        'iframe' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/K1ImD48UqNQ?si=K3tK_uu9JjsNM_vR" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>',
        'description' => 'Dynamic commercial advertisement featuring our creative expertise',
      ),
      2 => 
      array (
        'title' => 'Event Coverage',
        'iframe' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/c64h-K74bFI?si=bOyt2KPL8HSdl21n" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>',
        'description' => 'Comprehensive event coverage demonstrating our versatility',
      ),
    ),
    'team' => 
    array (
      0 => 
      array (
        'name' => 'Sushil Khatta',
        'position' => 'Production Manager',
        'description' => 'Oversees all aspects of video production, ensuring projects are delivered on time and to the highest quality standards.',
        'initials' => 'SK',
        'image' => '/team/sushil.jpg',
      ),
      1 => 
      array (
        'name' => 'Ankita Jha',
        'position' => 'Vice President - Content & Business Development',
        'description' => 'Drives content strategy and business development, building partnerships and expanding service offerings.',
        'initials' => 'AJ',
        'image' => '/team/ankita.jpg',
      ),
      2 => 
      array (
        'name' => 'Vidhu Slathia',
        'position' => 'Manager- Media/ PR & Anchor',
        'description' => 'Leads media relations, public relations, and ensures every campaign, communication, and event resonates strongly with audiences while building authentic connections for brands and individuals.',
        'initials' => 'VS',
        'image' => '/team/vidu.png',
      ),
      3 => 
      array (
        'name' => 'Shashank',
        'position' => 'Cinematographer & Senior Editor',
        'description' => 'Brings creative vision to life through expert cinematography and advanced editing, crafting visually compelling stories for every project.',
        'initials' => 'SH',
        'image' => '/team/shashak.jpg',
      ),
      4 => 
      array (
        'name' => 'Vishal Sharma ',
        'position' => 'Manger Contracting & HRD',
        'description' => 'Manages contracts, vendor relationships, and human resource development for smooth business operations.',
        'initials' => 'VS',
        'image' => '/team/vishal.jpg',
      ),
      5 => 
      array (
        'name' => 'Pratik Sahu',
        'position' => 'Manager - IT & Tech Management',
        'description' => 'Handles all IT infrastructure, technical support, and technology strategy for the company.',
        'initials' => 'PS',
        'image' => '/team/pratik.png',
      ),
    ),
    'featured_podcasts' => 
    array (
      0 => 
      array (
        'title' => 'Today\'s Guest MLA Vijaypur Surjit Singh Slathia',
        'iframe' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/N5aIojTWedo?si=av7Y2r6yjFPYPStA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>',
        'description' => 'Professional corporate video showcasing our production capabilities',
      ),
      1 => 
      array (
        'title' => 'Interaction with Dr Karan Singh ji Son of J&K\'s Last ruling King Maharaja Hari Singh ji',
        'iframe' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/3cZSC0iPvU4?si=gxfX_ihLa4dfFGkU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>',
        'description' => 'Dynamic commercial advertisement featuring our creative expertise',
      ),
      2 => 
      array (
        'title' => 'Talks at Topnotch Episode 2 with Mr India Bhanu Pratap Sharma',
        'iframe' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/qaKx8ib8rSM?si=KxIhttLKrBVqjQh8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>',
        'description' => 'Comprehensive event coverage demonstrating our versatility',
      ),
      3 => 
      array (
        'title' => 'Talks at Topnotch Episode 1 with Gurmeet Singh',
        'iframe' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/cLfEjaIABfM?si=KbuVIQzjpGcVmYnc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>',
        'description' => 'Professional corporate video showcasing our production capabilities',
      ),
      4 => 
      array (
        'title' => '"Dogri Bolo Dogri Suno" with Jammu’s renowned Dogri artist, Vasant Vyogi',
        'iframe' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/OIyBdsNDdW0?si=XzIC7d-WhLvigDWY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>',
        'description' => 'Dynamic commercial advertisement featuring our creative expertise',
      ),
      5 => 
      array (
        'title' => 'JAI DUGGAR JAI DOGRA JAI MAA DOGRI 🙏',
        'iframe' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/bRQzvh8uQZ4?si=0TmAI8ZFdY6nCYjU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>',
        'description' => 'Comprehensive event coverage demonstrating our versatility',
      ),
    ),
  ),
  'currencies' => 
  array (
    'currencies' => 
    array (
      'USD' => 
      array (
        'name' => 'US Dollar',
        'symbol' => '$',
        'code' => 'USD',
        'symbol_position' => 'before',
      ),
      'EUR' => 
      array (
        'name' => 'Euro',
        'symbol' => '€',
        'code' => 'EUR',
        'symbol_position' => 'before',
      ),
      'GBP' => 
      array (
        'name' => 'British Pound',
        'symbol' => '£',
        'code' => 'GBP',
        'symbol_position' => 'before',
      ),
      'INR' => 
      array (
        'name' => 'Indian Rupee',
        'symbol' => '₹',
        'code' => 'INR',
        'symbol_position' => 'before',
      ),
    ),
    'default' => 'USD',
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'url' => NULL,
        'database' => 'starjd',
        'prefix' => '',
        'foreign_key_constraints' => true,
        'busy_timeout' => NULL,
        'journal_mode' => NULL,
        'synchronous' => NULL,
        'transaction_mode' => 'DEFERRED',
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => '150.241.245.28',
        'port' => '3306',
        'database' => 'starjd',
        'username' => 'SugantaLive',
        'password' => 'Suganta@Production#real&1535*2025',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'mariadb' => 
      array (
        'driver' => 'mariadb',
        'url' => NULL,
        'host' => '150.241.245.28',
        'port' => '3306',
        'database' => 'starjd',
        'username' => 'SugantaLive',
        'password' => 'Suganta@Production#real&1535*2025',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'url' => NULL,
        'host' => '150.241.245.28',
        'port' => '3306',
        'database' => 'starjd',
        'username' => 'SugantaLive',
        'password' => 'Suganta@Production#real&1535*2025',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'search_path' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'url' => NULL,
        'host' => '150.241.245.28',
        'port' => '3306',
        'database' => 'starjd',
        'username' => 'SugantaLive',
        'password' => 'Suganta@Production#real&1535*2025',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
    ),
    'migrations' => 
    array (
      'table' => 'migrations',
      'update_date_on_publish' => true,
    ),
    'redis' => 
    array (
      'client' => 'phpredis',
      'options' => 
      array (
        'cluster' => 'redis',
        'prefix' => 'star-jd-database-',
        'persistent' => false,
      ),
      'default' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '0',
        'max_retries' => 3,
        'backoff_algorithm' => 'decorrelated_jitter',
        'backoff_base' => 100,
        'backoff_cap' => 1000,
      ),
      'cache' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '1',
        'max_retries' => 3,
        'backoff_algorithm' => 'decorrelated_jitter',
        'backoff_base' => 100,
        'backoff_cap' => 1000,
      ),
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/starjd.com/storage/app/private',
        'serve' => true,
        'throw' => false,
        'report' => false,
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/starjd.com/storage/app/public',
        'url' => 'https://www.starjd.com/storage',
        'visibility' => 'public',
        'throw' => false,
        'report' => false,
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'bucket' => '',
        'url' => NULL,
        'endpoint' => NULL,
        'use_path_style_endpoint' => false,
        'throw' => false,
        'report' => false,
      ),
    ),
    'links' => 
    array (
      '/var/www/starjd.com/public/storage' => '/var/www/starjd.com/storage/app/public',
    ),
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'deprecations' => 
    array (
      'channel' => NULL,
      'trace' => false,
    ),
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
        ),
        'ignore_exceptions' => false,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => '/var/www/starjd.com/storage/logs/laravel.log',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => '/var/www/starjd.com/storage/logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
        'replace_placeholders' => true,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
          'connectionString' => 'tls://:',
        ),
        'processors' => 
        array (
          0 => 'Monolog\\Processor\\PsrLogMessageProcessor',
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'handler_with' => 
        array (
          'stream' => 'php://stderr',
        ),
        'formatter' => NULL,
        'processors' => 
        array (
          0 => 'Monolog\\Processor\\PsrLogMessageProcessor',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
        'facility' => 8,
        'replace_placeholders' => true,
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'null' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
      'emergency' => 
      array (
        'path' => '/var/www/starjd.com/storage/logs/laravel.log',
      ),
    ),
  ),
  'mail' => 
  array (
    'default' => 'smtp',
    'mailers' => 
    array (
      'smtp' => 
      array (
        'transport' => 'smtp',
        'scheme' => NULL,
        'url' => NULL,
        'host' => 'smtpout.secureserver.net',
        'port' => '465',
        'username' => 'learn@suganta.com',
        'password' => 'Fare@3456789',
        'timeout' => NULL,
        'local_domain' => 'www.starjd.com',
      ),
      'ses' => 
      array (
        'transport' => 'ses',
      ),
      'postmark' => 
      array (
        'transport' => 'postmark',
      ),
      'resend' => 
      array (
        'transport' => 'resend',
      ),
      'sendmail' => 
      array (
        'transport' => 'sendmail',
        'path' => '/usr/sbin/sendmail -bs -i',
      ),
      'log' => 
      array (
        'transport' => 'log',
        'channel' => NULL,
      ),
      'array' => 
      array (
        'transport' => 'array',
      ),
      'failover' => 
      array (
        'transport' => 'failover',
        'mailers' => 
        array (
          0 => 'smtp',
          1 => 'log',
        ),
        'retry_after' => 60,
      ),
      'roundrobin' => 
      array (
        'transport' => 'roundrobin',
        'mailers' => 
        array (
          0 => 'ses',
          1 => 'postmark',
        ),
        'retry_after' => 60,
      ),
    ),
    'from' => 
    array (
      'address' => 'query@starjd.com',
      'name' => 'SuGanta international',
    ),
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => '/var/www/starjd.com/resources/views/vendor/mail',
      ),
    ),
  ),
  'queue' => 
  array (
    'default' => 'file',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'connection' => NULL,
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
        'after_commit' => false,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => 0,
        'after_commit' => false,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => '',
        'secret' => '',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'default',
        'suffix' => NULL,
        'region' => 'us-east-1',
        'after_commit' => false,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
        'after_commit' => false,
      ),
    ),
    'batching' => 
    array (
      'database' => 'mysql',
      'table' => 'job_batches',
    ),
    'failed' => 
    array (
      'driver' => 'database-uuids',
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'services' => 
  array (
    'postmark' => 
    array (
      'token' => NULL,
    ),
    'resend' => 
    array (
      'key' => NULL,
    ),
    'ses' => 
    array (
      'key' => '',
      'secret' => '',
      'region' => 'us-east-1',
    ),
    'slack' => 
    array (
      'notifications' => 
      array (
        'bot_user_oauth_token' => NULL,
        'channel' => NULL,
      ),
    ),
  ),
  'session' => 
  array (
    'driver' => 'database',
    'lifetime' => 120,
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => '/var/www/starjd.com/storage/framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'star-jd-session',
    'path' => '/',
    'domain' => NULL,
    'secure' => NULL,
    'http_only' => true,
    'same_site' => 'lax',
    'partitioned' => false,
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'alias' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
);
