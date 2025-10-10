@extends('layouts.app')

@section('title', 'Search Results - ' . config('company.name'))
@section('description', 'Search results for: ' . $query)

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Search Header -->
    <section class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Search Results</h1>
                @if(!empty($query))
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Results for: <span class="font-semibold text-orange-600">"{{ $query }}"</span>
                    </p>
                @else
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Enter a search term to find relevant posts
                    </p>
                @endif
            </div>
        </div>
    </section>

    <!-- Search Form -->
    <section class="py-8 bg-gray-100">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="{{ route('blog.search') }}" method="GET" class="flex">
                <input type="text" name="q" value="{{ $query }}" placeholder="Search posts..." class="flex-1 px-4 py-3 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-lg">
                <button type="submit" class="px-6 py-3 bg-orange-600 text-white rounded-r-lg hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500 text-lg">
                    <i class="fas fa-search mr-2"></i>
                    Search
                </button>
            </form>
        </div>
    </section>

    <!-- Search Results -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-3">
                    @if(!empty($query))
                        <div class="mb-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-2">Search Results</h2>
                            <p class="text-gray-600">
                                {{ count($searchResults) }} {{ count($searchResults) === 1 ? 'result' : 'results' }} found for "{{ $query }}"
                            </p>
                        </div>

                        @if(count($searchResults) > 0)
                        <div class="space-y-6">
                            @foreach($searchResults as $slug => $filename)
                            <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-gray-900 mb-3">
                                        <a href="{{ route('blog.show', $slug) }}" class="hover:text-orange-600 transition-colors">
                                            {{ ucwords(str_replace('-', ' ', $slug)) }}
                                        </a>
                                    </h3>
                                    <p class="text-gray-600 mb-4">
                                        {{ \App\Helpers\BlogHelper::getPostExcerpt($slug, 150) }}
                                    </p>
                                    <div class="flex items-center justify-between">
                                        <a href="{{ route('blog.show', $slug) }}" class="text-orange-600 font-medium hover:text-orange-700">
                                            Read More <i class="fas fa-arrow-right ml-1"></i>
                                        </a>
                                        <span class="text-sm text-gray-500">
                                            <i class="fas fa-calendar mr-1"></i>
                                            {{ date('M d, Y') }}
                                        </span>
                                    </div>
                                </div>
                            </article>
                            @endforeach
                        </div>
                        @else
                        <div class="bg-white rounded-lg shadow-md p-8 text-center">
                            <i class="fas fa-search text-6xl text-gray-400 mb-4"></i>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">No Results Found</h3>
                            <p class="text-gray-600 mb-6">
                                Sorry, we couldn't find any posts matching "{{ $query }}". Try different keywords or browse our categories.
                            </p>
                            <div class="space-x-4">
                                <a href="{{ route('blog.index') }}" class="inline-flex items-center px-4 py-2 bg-orange-600 text-white font-semibold rounded-md hover:bg-orange-700 transition-colors">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    Back to All Posts
                                </a>
                                <button onclick="document.querySelector('input[name=q]').focus()" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white font-semibold rounded-md hover:bg-gray-700 transition-colors">
                                    <i class="fas fa-search mr-2"></i>
                                    Try Again
                                </button>
                            </div>
                        </div>
                        @endif
                    @else
                    <div class="bg-white rounded-lg shadow-md p-8 text-center">
                        <i class="fas fa-search text-6xl text-gray-400 mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Search Our Blog</h3>
                        <p class="text-gray-600 mb-6">
                            Use the search form above to find posts about video production, studio rentals, podcast services, and more.
                        </p>
                        <a href="{{ route('blog.index') }}" class="inline-flex items-center px-4 py-2 bg-orange-600 text-white font-semibold rounded-md hover:bg-orange-700 transition-colors">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Browse All Posts
                        </a>
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
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
                    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Popular Tags</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach(config('blog.tags') as $tagSlug)
                            <a href="{{ route('blog.tag', $tagSlug) }}" class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full hover:bg-orange-100 hover:text-orange-700 transition-colors">
                                {{ ucwords(str_replace('-', ' ', $tagSlug)) }}
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Recent Posts -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Posts</h3>
                        <ul class="space-y-3">
                            @foreach(array_slice(config('blog.posts'), 0, 5, true) as $slug => $filename)
                            <li>
                                <a href="{{ route('blog.show', $slug) }}" class="text-sm text-gray-600 hover:text-orange-600 transition-colors">
                                    {{ ucwords(str_replace('-', ' ', $slug)) }}
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
