@extends('layouts.app')

@section('title', ucwords(str_replace('-', ' ', $slug)) . ' - ' . config('company.name'))
@section('description', 'Read our latest insights on ' . str_replace('-', ' ', $slug))

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Blog Post Header -->
    <section class="bg-white border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">
                    {{ ucwords(str_replace('-', ' ', $slug)) }}
                </h1>
                <div class="flex items-center justify-center space-x-4 text-gray-600">
                    <span><i class="fas fa-calendar mr-1"></i> {{ date('M d, Y') }}</span>
                    <span><i class="fas fa-user mr-1"></i> SuGanta Internationals</span>
                    <span><i class="fas fa-clock mr-1"></i> 5 min read</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Post Content -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-3">
                    <article class="prose prose-lg max-w-none">
                        @if(View::exists("blog.posts." . pathinfo($filename, PATHINFO_FILENAME)))
                            @include("blog.posts." . pathinfo($filename, PATHINFO_FILENAME))
                        @else
                            <!-- Fallback content if post file doesn't exist -->
                            <div class="bg-gray-100 rounded-lg p-8 text-center">
                                <i class="fas fa-file-alt text-6xl text-gray-400 mb-4"></i>
                                <h2 class="text-2xl font-bold text-gray-900 mb-4">
                                    {{ ucwords(str_replace('-', ' ', $slug)) }}
                                </h2>
                                <p class="text-gray-600 mb-6">
                                    This blog post is coming soon! We're working on creating amazing content for you.
                                </p>
                                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                                    <p class="text-blue-800 text-sm">
                                        <strong>Coming Soon:</strong> This post will be available shortly. 
                                        Check back soon for expert insights and practical tips!
                                    </p>
                                </div>
                            </div>
                        @endif
                    </article>

                    <!-- Social Sharing -->
                    @if(config('blog.social_sharing.enabled'))
                    <div class="mt-12 pt-8 border-t border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Share this post</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                                <i class="fab fa-facebook-f mr-2"></i>
                                Facebook
                            </a>
                            <a href="#" class="flex items-center px-4 py-2 bg-blue-400 text-white rounded-md hover:bg-blue-500 transition-colors">
                                <i class="fab fa-twitter mr-2"></i>
                                Twitter
                            </a>
                            <a href="#" class="flex items-center px-4 py-2 bg-blue-700 text-white rounded-md hover:bg-blue-800 transition-colors">
                                <i class="fab fa-linkedin-in mr-2"></i>
                                LinkedIn
                            </a>
                        </div>
                    </div>
                    @endif

                    <!-- Navigation -->
                    <div class="mt-12 pt-8 border-t border-gray-200">
                        <div class="flex justify-between">
                            @if($previousPost)
                            <a href="{{ route('blog.show', $previousPost['slug']) }}" class="flex items-center text-orange-600 hover:text-orange-700 transition-colors">
                                <i class="fas fa-arrow-left mr-2"></i>
                                <div>
                                    <div class="text-sm text-gray-500">Previous Post</div>
                                    <div class="font-medium">{{ $previousPost['title'] }}</div>
                                </div>
                            </a>
                            @endif

                            @if($nextPost)
                            <a href="{{ route('blog.show', $nextPost['slug']) }}" class="flex items-center text-orange-600 hover:text-orange-700 transition-colors">
                                <div class="text-right">
                                    <div class="text-sm text-gray-500">Next Post</div>
                                    <div class="font-medium">{{ $nextPost['title'] }}</div>
                                </div>
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Table of Contents -->
                    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Table of Contents</h3>
                        <ul class="space-y-2">
                            <li><a href="#introduction" class="text-sm text-gray-600 hover:text-orange-600">Introduction</a></li>
                            <li><a href="#main-content" class="text-sm text-gray-600 hover:text-orange-600">Main Content</a></li>
                            <li><a href="#conclusion" class="text-sm text-gray-600 hover:text-orange-600">Conclusion</a></li>
                        </ul>
                    </div>

                    <!-- Related Posts -->
                    @if(count($relatedPosts) > 0)
                    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Related Posts</h3>
                        <ul class="space-y-3">
                            @foreach($relatedPosts as $relatedPost)
                            <li>
                                <a href="{{ route('blog.show', $relatedPost['slug']) }}" class="text-sm text-gray-600 hover:text-orange-600 transition-colors">
                                    {{ $relatedPost['title'] }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Categories -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Categories</h3>
                        <ul class="space-y-2">
                            @foreach($categories as $categorySlug => $category)
                            <li>
                                <a href="{{ route('blog.category', $categorySlug) }}" class="flex items-center text-gray-600 hover:text-orange-600 transition-colors">
                                    <i class="{{ $category['icon'] }} mr-2 text-sm"></i>
                                    {{ $category['name'] }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-orange-600">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Ready to Get Started?</h2>
            <p class="text-xl text-orange-100 mb-8">
                Let's discuss your video production needs and create something amazing together.
            </p>
            <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-3 bg-white text-orange-600 font-semibold rounded-lg hover:bg-gray-100 transition-colors">
                Get a Quote
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </section>
</div>
@endsection
