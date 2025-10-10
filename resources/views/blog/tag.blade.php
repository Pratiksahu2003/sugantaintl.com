@extends('layouts.app')

@section('title', ucwords(str_replace('-', ' ', $tag)) . ' Tag - ' . config('company.name'))
@section('description', 'Browse posts tagged with ' . ucwords(str_replace('-', ' ', $tag)))

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Tag Header -->
    <section class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">
                    Posts Tagged: {{ ucwords(str_replace('-', ' ', $tag)) }}
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Explore posts related to {{ ucwords(str_replace('-', ' ', $tag)) }}
                </p>
            </div>
        </div>
    </section>

    <!-- Tag Posts -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-3">
                    <div class="mb-8">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-tag text-orange-600 text-2xl mr-3"></i>
                            <h2 class="text-2xl font-bold text-gray-900">
                                Posts Tagged: {{ ucwords(str_replace('-', ' ', $tag)) }}
                            </h2>
                        </div>
                        <p class="text-gray-600">
                            {{ count($tagPosts) }} {{ count($tagPosts) === 1 ? 'post' : 'posts' }} found
                        </p>
                    </div>

                    @if(count($tagPosts) > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($tagPosts as $slug => $filename)
                        <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <div class="h-40 bg-gradient-to-r from-green-500 to-blue-500 flex items-center justify-center">
                                <i class="fas fa-file-alt text-white text-3xl"></i>
                            </div>
                            <div class="p-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                                    <a href="{{ route('blog.show', $slug) }}" class="hover:text-orange-600 transition-colors">
                                        {{ ucwords(str_replace('-', ' ', $slug)) }}
                                    </a>
                                </h3>
                                <p class="text-gray-600 text-sm mb-4">
                                    {{ \App\Helpers\BlogHelper::getPostExcerpt($slug, 100) }}
                                </p>
                                <div class="flex items-center justify-between">
                                    <a href="{{ route('blog.show', $slug) }}" class="text-orange-600 font-medium hover:text-orange-700 text-sm">
                                        Read More
                                    </a>
                                    <span class="text-xs text-gray-500">
                                        {{ date('M d, Y') }}
                                    </span>
                                </div>
                            </div>
                        </article>
                        @endforeach
                    </div>
                    @else
                    <div class="bg-white rounded-lg shadow-md p-8 text-center">
                        <i class="fas fa-tag text-6xl text-gray-400 mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">No Posts Found</h3>
                        <p class="text-gray-600 mb-6">
                            There are no posts with this tag yet. Check back soon for new content!
                        </p>
                        <a href="{{ route('blog.index') }}" class="inline-flex items-center px-4 py-2 bg-orange-600 text-white font-semibold rounded-md hover:bg-orange-700 transition-colors">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Back to All Posts
                        </a>
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Search -->
                    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Search Posts</h3>
                        <form action="{{ route('blog.search') }}" method="GET" class="flex">
                            <input type="text" name="q" placeholder="Search posts..." class="flex-1 px-3 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                            <button type="submit" class="px-4 py-2 bg-orange-600 text-white rounded-r-md hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>

                    <!-- Categories -->
                    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Categories</h3>
                        <ul class="space-y-2">
                            @foreach($categories as $catSlug => $catData)
                            <li>
                                <a href="{{ route('blog.category', $catSlug) }}" class="flex items-center text-gray-600 hover:text-orange-600 transition-colors">
                                    <i class="{{ $catData['icon'] }} mr-2 text-sm"></i>
                                    {{ $catData['name'] }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Popular Tags -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Popular Tags</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach(config('blog.tags') as $tagSlug)
                            <a href="{{ route('blog.tag', $tagSlug) }}" class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full hover:bg-orange-100 hover:text-orange-700 transition-colors {{ $tagSlug === $tag ? 'bg-orange-100 text-orange-700' : '' }}">
                                {{ ucwords(str_replace('-', ' ', $tagSlug)) }}
                            </a>
                            @endforeach
                        </div>
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
                Let's discuss your project needs and create something amazing together.
            </p>
            <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-3 bg-white text-orange-600 font-semibold rounded-lg hover:bg-gray-100 transition-colors">
                Get a Quote
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </section>
</div>
@endsection
