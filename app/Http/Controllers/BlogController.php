<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{
    /**
     * Display a listing of blog posts.
     */
    public function index(Request $request)
    {
        $posts = config('blog.posts');
        $settings = config('blog.settings');
        $categories = config('blog.categories');
        
        // Get paginated posts
        $postsPerPage = $settings['posts_per_page'];
        $currentPage = $request->get('page', 1);
        $offset = ($currentPage - 1) * $postsPerPage;
        
        $paginatedPosts = array_slice($posts, $offset, $postsPerPage, true);
        $totalPosts = count($posts);
        $totalPages = ceil($totalPosts / $postsPerPage);
        
        // Get featured posts
        $featuredPosts = array_slice($posts, 0, $settings['featured_posts_count'], true);
        
        // Get recent posts
        $recentPosts = array_slice($posts, 0, $settings['recent_posts_count'], true);
        
        return view('blog.index', compact(
            'paginatedPosts',
            'featuredPosts',
            'recentPosts',
            'categories',
            'settings',
            'currentPage',
            'totalPages',
            'totalPosts'
        ));
    }

    /**
     * Display the specified blog post.
     */
    public function show($slug)
    {
        $posts = config('blog.posts');
        $settings = config('blog.settings');
        $categories = config('blog.categories');
        
        // Check if post exists
        if (!array_key_exists($slug, $posts)) {
            abort(404, 'Blog post not found');
        }
        
        $filename = $posts[$slug];
        
        // Get all posts for navigation
        $allPosts = $posts;
        $postKeys = array_keys($allPosts);
        $currentIndex = array_search($slug, $postKeys);
        
        // Get previous and next posts
        $previousPost = null;
        $nextPost = null;
        
        if ($currentIndex > 0) {
            $previousSlug = $postKeys[$currentIndex - 1];
            $previousPost = [
                'slug' => $previousSlug,
                'title' => $this->getPostTitle($previousSlug),
                'filename' => $allPosts[$previousSlug]
            ];
        }
        
        if ($currentIndex < count($postKeys) - 1) {
            $nextSlug = $postKeys[$currentIndex + 1];
            $nextPost = [
                'slug' => $nextSlug,
                'title' => $this->getPostTitle($nextSlug),
                'filename' => $allPosts[$nextSlug]
            ];
        }
        
        // Get related posts (same category or random)
        $relatedPosts = $this->getRelatedPosts($slug, $allPosts);
        
        // Check if view file exists
        $viewPath = "blog.posts." . pathinfo($filename, PATHINFO_FILENAME);
      
        if (!view()->exists($viewPath)) {
            abort(404, 'Blog post view file not found');
        }
        
        return view('blog.show', compact(
            'slug',
            'filename',
            'previousPost',
            'nextPost',
            'relatedPosts',
            'categories',
            'settings',
            'viewPath'
        ));
    }

    /**
     * Display posts by category.
     */
    public function category($category)
    {
        $categories = config('blog.categories');
        
        if (!array_key_exists($category, $categories)) {
            abort(404, 'Category not found');
        }
        
        $posts = config('blog.posts');
        $settings = config('blog.settings');
        
        // Filter posts by category (you can extend this logic)
        $categoryPosts = $this->filterPostsByCategory($posts, $category);
        
        return view('blog.category', compact(
            'category',
            'categoryPosts',
            'categories',
            'settings'
        ));
    }

    /**
     * Display posts by tag.
     */
    public function tag($tag)
    {
        $tags = config('blog.tags');
        
        if (!in_array($tag, $tags)) {
            abort(404, 'Tag not found');
        }
        
        $posts = config('blog.posts');
        $settings = config('blog.settings');
        $categories = config('blog.categories');
        
        // Filter posts by tag (you can extend this logic)
        $tagPosts = $this->filterPostsByTag($posts, $tag);
        
        return view('blog.tag', compact(
            'tag',
            'tagPosts',
            'categories',
            'settings'
        ));
    }

    /**
     * Search blog posts.
     */
    public function search(Request $request)
    {
        $query = $request->get('q', '');
        $posts = config('blog.posts');
        $settings = config('blog.settings');
        $categories = config('blog.categories');
        
        $searchResults = [];
        
        if (!empty($query)) {
            $searchResults = $this->searchPosts($posts, $query);
        }
        
        return view('blog.search', compact(
            'query',
            'searchResults',
            'categories',
            'settings'
        ));
    }

    /**
     * Get post title from slug.
     */
    private function getPostTitle($slug)
    {
        return ucwords(str_replace('-', ' ', $slug));
    }

    /**
     * Get related posts.
     */
    private function getRelatedPosts($currentSlug, $allPosts)
    {
        $postKeys = array_keys($allPosts);
        $currentIndex = array_search($currentSlug, $postKeys);
        
        $relatedPosts = [];
        $relatedCount = 3;
        
        // Get posts around current post
        $start = max(0, $currentIndex - 1);
        $end = min(count($postKeys), $start + $relatedCount + 1);
        
        for ($i = $start; $i < $end; $i++) {
            if ($i != $currentIndex) {
                $slug = $postKeys[$i];
                $relatedPosts[] = [
                    'slug' => $slug,
                    'title' => $this->getPostTitle($slug),
                    'filename' => $allPosts[$slug]
                ];
            }
        }
        
        return array_slice($relatedPosts, 0, $relatedCount);
    }

    /**
     * Filter posts by category.
     */
    private function filterPostsByCategory($posts, $category)
    {
        // Define category mappings for posts
        $categoryMappings = [
            'video-production' => [
                'getting-started-with-video-production',
                'best-practices-for-corporate-videos',
                'video-marketing-strategies',
                'video-editing-workflow',
                'brand-storytelling-through-video'
            ],
            'studio-rental' => [
                'studio-rental-guide',
                'equipment-rental-checklist'
            ],
            'podcast-services' => [
                'podcast-production-tips'
            ],
            'marketing' => [
                'video-marketing-strategies',
                'brand-storytelling-through-video',
                'analytics-driven-marketing-decisions',
                'key-digital-marketing-kpis',
                'professional-photoshoots-boost-brand-image',
                'indias-b2b-digital-marketing-growth',
                'google-ads-vs-meta-ads-roi-comparison',
                'instagram-advertising-organic-growth-2025',
                'understanding-click-through-rate-ctr',
                'keyword-research-importance-guide',
                'strong-brand-strategy-transform-online-presence',
                'why-business-needs-digital-presence-2025'
            ],
            'equipment' => [
                'equipment-rental-checklist',
                'live-streaming-setup',
                'drone-videography-tips'
            ]
        ];
        
        $categoryPosts = [];
        
        if (isset($categoryMappings[$category])) {
            foreach ($categoryMappings[$category] as $postSlug) {
                if (isset($posts[$postSlug])) {
                    $categoryPosts[$postSlug] = $posts[$postSlug];
                }
            }
        }
        
        // If no specific mapping, return all posts
        return empty($categoryPosts) ? $posts : $categoryPosts;
    }

    /**
     * Filter posts by tag.
     */
    private function filterPostsByTag($posts, $tag)
    {
        // Define tag mappings for posts
        $tagMappings = [
            'video-production' => [
                'getting-started-with-video-production',
                'best-practices-for-corporate-videos',
                'video-editing-workflow'
            ],
            'studio-rental' => [
                'studio-rental-guide',
                'equipment-rental-checklist'
            ],
            'podcast' => [
                'podcast-production-tips'
            ],
            'marketing' => [
                'video-marketing-strategies',
                'brand-storytelling-through-video',
                'analytics-driven-marketing-decisions',
                'key-digital-marketing-kpis',
                'professional-photoshoots-boost-brand-image',
                'indias-b2b-digital-marketing-growth',
                'google-ads-vs-meta-ads-roi-comparison',
                'instagram-advertising-organic-growth-2025',
                'understanding-click-through-rate-ctr',
                'keyword-research-importance-guide',
                'strong-brand-strategy-transform-online-presence',
                'why-business-needs-digital-presence-2025'
            ],
            'equipment' => [
                'equipment-rental-checklist',
                'live-streaming-setup',
                'drone-videography-tips'
            ],
            'tips' => [
                'podcast-production-tips',
                'drone-videography-tips',
                'getting-started-with-video-production'
            ],
            'tutorial' => [
                'studio-rental-guide',
                'live-streaming-setup',
                'video-editing-workflow'
            ],
            'guide' => [
                'studio-rental-guide',
                'equipment-rental-checklist',
                'live-streaming-setup'
            ],
            'strategy' => [
                'video-marketing-strategies',
                'brand-storytelling-through-video'
            ],
            'technology' => [
                'live-streaming-setup',
                'drone-videography-tips',
                'video-editing-workflow'
            ],
            'creativity' => [
                'brand-storytelling-through-video',
                'drone-videography-tips'
            ],
            'business' => [
                'best-practices-for-corporate-videos',
                'video-marketing-strategies',
                'brand-storytelling-through-video'
            ],
            'branding' => [
                'brand-storytelling-through-video',
                'best-practices-for-corporate-videos'
            ],
            'social-media' => [
                'video-marketing-strategies',
                'live-streaming-setup'
            ],
            'content-creation' => [
                'podcast-production-tips',
                'video-editing-workflow',
                'brand-storytelling-through-video'
            ]
        ];
        
        $tagPosts = [];
        
        if (isset($tagMappings[$tag])) {
            foreach ($tagMappings[$tag] as $postSlug) {
                if (isset($posts[$postSlug])) {
                    $tagPosts[$postSlug] = $posts[$postSlug];
                }
            }
        }
        
        // If no specific mapping, return all posts
        return empty($tagPosts) ? $posts : $tagPosts;
    }

    /**
     * Search posts.
     */
    private function searchPosts($posts, $query)
    {
        $results = [];
        $query = strtolower($query);
        
        foreach ($posts as $slug => $filename) {
            $title = $this->getPostTitle($slug);
            if (strpos(strtolower($slug), $query) !== false || 
                strpos(strtolower($title), $query) !== false) {
                $results[$slug] = $filename;
            }
        }
        
        return $results;
    }

    /**
     * Get blog configuration.
     */
    public static function getConfig($key = null)
    {
        if ($key) {
            return config("blog.{$key}");
        }
        
        return config('blog');
    }

    /**
     * Get all blog posts.
     */
    public static function getAllPosts()
    {
        return config('blog.posts');
    }

    /**
     * Get blog post by slug.
     */
    public static function getPost($slug)
    {
        $posts = config('blog.posts');
        return $posts[$slug] ?? null;
    }

    /**
     * Check if blog post exists.
     */
    public static function postExists($slug)
    {
        $posts = config('blog.posts');
        return array_key_exists($slug, $posts);
    }
}
