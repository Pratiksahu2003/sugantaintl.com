<?php

namespace App\Helpers;

class BlogHelper
{
    /**
     * Get all blog posts from configuration.
     */
    public static function getAllPosts()
    {
        return config('blog.posts', []);
    }

    /**
     * Get a specific blog post by slug.
     */
    public static function getPost($slug)
    {
        $posts = self::getAllPosts();
        return $posts[$slug] ?? null;
    }

    /**
     * Check if a blog post exists.
     */
    public static function postExists($slug)
    {
        $posts = self::getAllPosts();
        return array_key_exists($slug, $posts);
    }

    /**
     * Get blog post title from slug.
     */
    public static function getPostTitle($slug)
    {
        return ucwords(str_replace('-', ' ', $slug));
    }

    /**
     * Get blog post excerpt.
     */
    public static function getPostExcerpt($slug, $length = 150)
    {
        $excerpts = [
            'getting-started-with-video-production' => 'Master the fundamentals of professional video production, from planning and pre-production to filming and post-production techniques.',
            'best-practices-for-corporate-videos' => 'Discover essential techniques for creating effective corporate video content that engages audiences and drives business results.',
            'studio-rental-guide' => 'Complete guide to renting professional studios for your video projects, including equipment, pricing, and best practices.',
            'podcast-production-tips' => 'Expert advice for creating high-quality podcast content, from audio setup to distribution and promotion strategies.',
            'video-marketing-strategies' => 'Proven strategies to leverage video for marketing success, including platform optimization and engagement techniques.',
            'equipment-rental-checklist' => 'Complete checklist for renting professional video equipment, ensuring you get the right gear for your project needs.',
            'live-streaming-setup' => 'Step-by-step guide to professional live streaming setup, from equipment selection to platform optimization.',
            'drone-videography-tips' => 'Professional tips for stunning aerial video footage, including flight techniques, camera settings, and safety guidelines.',
            'video-editing-workflow' => 'Streamline your video editing process with our comprehensive workflow guide for professional results.',
            'brand-storytelling-through-video' => 'Learn how to tell compelling brand stories through video that resonate with audiences and drive engagement.',
        ];
        
        $excerpt = $excerpts[$slug] ?? "Discover expert insights and practical tips for " . strtolower(self::getPostTitle($slug)) . ".";
        
        return strlen($excerpt) > $length ? substr($excerpt, 0, $length) . '...' : $excerpt;
    }

    /**
     * Get blog post URL.
     */
    public static function getPostUrl($slug)
    {
        return route('blog.show', $slug);
    }

    /**
     * Get featured posts.
     */
    public static function getFeaturedPosts($count = 3)
    {
        $posts = self::getAllPosts();
        return array_slice($posts, 0, $count, true);
    }

    /**
     * Get recent posts.
     */
    public static function getRecentPosts($count = 5)
    {
        $posts = self::getAllPosts();
        return array_slice($posts, 0, $count, true);
    }

    /**
     * Get posts by category.
     */
    public static function getPostsByCategory($category)
    {
        // This is a basic implementation
        // You can extend this to include category metadata
        return self::getAllPosts();
    }

    /**
     * Get posts by tag.
     */
    public static function getPostsByTag($tag)
    {
        // This is a basic implementation
        // You can extend this to include tag metadata
        return self::getAllPosts();
    }

    /**
     * Search posts.
     */
    public static function searchPosts($query)
    {
        $posts = self::getAllPosts();
        $results = [];
        
        $query = strtolower($query);
        
        foreach ($posts as $slug => $filename) {
            $title = self::getPostTitle($slug);
            if (strpos(strtolower($slug), $query) !== false || 
                strpos(strtolower($title), $query) !== false) {
                $results[$slug] = $filename;
            }
        }
        
        return $results;
    }

    /**
     * Get blog categories.
     */
    public static function getCategories()
    {
        return config('blog.categories', []);
    }

    /**
     * Get blog tags.
     */
    public static function getTags()
    {
        return config('blog.tags', []);
    }

    /**
     * Get blog settings.
     */
    public static function getSettings()
    {
        return config('blog.settings', []);
    }

    /**
     * Get paginated posts.
     */
    public static function getPaginatedPosts($page = 1, $perPage = 6)
    {
        $posts = self::getAllPosts();
        $total = count($posts);
        $offset = ($page - 1) * $perPage;
        
        $paginatedPosts = array_slice($posts, $offset, $perPage, true);
        
        return [
            'posts' => $paginatedPosts,
            'total' => $total,
            'per_page' => $perPage,
            'current_page' => $page,
            'total_pages' => ceil($total / $perPage),
            'has_next' => $page < ceil($total / $perPage),
            'has_prev' => $page > 1,
        ];
    }

    /**
     * Get related posts.
     */
    public static function getRelatedPosts($currentSlug, $count = 3)
    {
        $posts = self::getAllPosts();
        $postKeys = array_keys($posts);
        $currentIndex = array_search($currentSlug, $postKeys);
        
        $relatedPosts = [];
        
        if ($currentIndex !== false) {
            // Get posts around current post
            $start = max(0, $currentIndex - 1);
            $end = min(count($postKeys), $start + $count + 1);
            
            for ($i = $start; $i < $end; $i++) {
                if ($i != $currentIndex) {
                    $slug = $postKeys[$i];
                    $relatedPosts[] = [
                        'slug' => $slug,
                        'title' => self::getPostTitle($slug),
                        'filename' => $posts[$slug],
                        'url' => self::getPostUrl($slug),
                        'excerpt' => self::getPostExcerpt($slug),
                    ];
                }
            }
        }
        
        return array_slice($relatedPosts, 0, $count);
    }

    /**
     * Get next post.
     */
    public static function getNextPost($currentSlug)
    {
        $posts = self::getAllPosts();
        $postKeys = array_keys($posts);
        $currentIndex = array_search($currentSlug, $postKeys);
        
        if ($currentIndex !== false && $currentIndex < count($postKeys) - 1) {
            $nextSlug = $postKeys[$currentIndex + 1];
            return [
                'slug' => $nextSlug,
                'title' => self::getPostTitle($nextSlug),
                'filename' => $posts[$nextSlug],
                'url' => self::getPostUrl($nextSlug),
            ];
        }
        
        return null;
    }

    /**
     * Get previous post.
     */
    public static function getPreviousPost($currentSlug)
    {
        $posts = self::getAllPosts();
        $postKeys = array_keys($posts);
        $currentIndex = array_search($currentSlug, $postKeys);
        
        if ($currentIndex !== false && $currentIndex > 0) {
            $prevSlug = $postKeys[$currentIndex - 1];
            return [
                'slug' => $prevSlug,
                'title' => self::getPostTitle($prevSlug),
                'filename' => $posts[$prevSlug],
                'url' => self::getPostUrl($prevSlug),
            ];
        }
        
        return null;
    }

    /**
     * Generate breadcrumbs for blog post.
     */
    public static function getBreadcrumbs($slug = null)
    {
        $breadcrumbs = [
            ['title' => 'Home', 'url' => route('home')],
            ['title' => 'Blog', 'url' => route('blog.index')],
        ];
        
        if ($slug) {
            $breadcrumbs[] = [
                'title' => self::getPostTitle($slug),
                'url' => self::getPostUrl($slug),
            ];
        }
        
        return $breadcrumbs;
    }

    /**
     * Get blog post meta data.
     */
    public static function getPostMeta($slug)
    {
        return [
            'title' => self::getPostTitle($slug),
            'slug' => $slug,
            'url' => self::getPostUrl($slug),
            'excerpt' => self::getPostExcerpt($slug),
            'published_date' => date('Y-m-d'),
            'author' => 'SuGanta Internationals',
            'reading_time' => '5 min read',
        ];
    }
}
