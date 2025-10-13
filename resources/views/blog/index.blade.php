@extends('layouts.app')

@section('title', 'Blog - ' . config('app.name'))
@section('description', config('blog.seo.default_description'))

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Blog Header -->
    <section class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Our Blog</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Expert insights on video production, studio rentals, podcast services, and digital marketing strategies.
                </p>
            </div>
        </div>
    </section>

    <!-- Featured Posts -->
    @if(count($featuredPosts) > 0)
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Featured Posts</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($featuredPosts as $slug => $filename)
                        <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <div class="h-48 bg-gradient-to-r from-orange-500 to-red-500 flex items-center justify-center">
                                <i class="fas fa-video text-white text-4xl"></i>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-gray-900 mb-3">
                                    <a href="{{ route('blog.show', $slug) }}" class="hover:text-orange-600 transition-colors">
                                        {{ ucwords(str_replace('-', ' ', $slug)) }}
                                    </a>
                                </h3>
                                <p class="text-gray-600 mb-4">
                                    {{ \App\Helpers\BlogHelper::getPostExcerpt($slug, 120) }}
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
        </div>
    </section>
    @endif

    <!-- All Posts -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-3">
                    <h2 class="text-3xl font-bold text-gray-900 mb-8">All Posts</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($paginatedPosts as $slug => $filename)
                        <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <div class="h-40 bg-gradient-to-r from-blue-500 to-purple-500 flex items-center justify-center">
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

                    <!-- Pagination -->
                    @if($totalPages > 1)
                    <div class="mt-12 flex justify-center">
                        <nav class="flex items-center space-x-2">
                            @if($currentPage > 1)
                                <a href="{{ request()->url() }}?page={{ $currentPage - 1 }}" class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                                    Previous
                                </a>
                            @endif
                            
                            @for($i = 1; $i <= $totalPages; $i++)
                                @if($i == $currentPage)
                                    <span class="px-3 py-2 text-sm font-medium text-white bg-orange-600 border border-orange-600 rounded-md">
                                        {{ $i }}
                                    </span>
                                @else
                                    <a href="{{ request()->url() }}?page={{ $i }}" class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                                        {{ $i }}
                                    </a>
                                @endif
                            @endfor
                            
                            @if($currentPage < $totalPages)
                                <a href="{{ request()->url() }}?page={{ $currentPage + 1 }}" class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                                    Next
                                </a>
                            @endif
                        </nav>
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
                            @foreach($categories as $slug => $category)
                            <li>
                                <a href="{{ route('blog.category', $slug) }}" class="flex items-center text-gray-600 hover:text-orange-600 transition-colors">
                                    <i class="{{ $category['icon'] }} mr-2 text-sm"></i>
                                    {{ $category['name'] }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Recent Posts -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Posts</h3>
                        <ul class="space-y-3">
                            @foreach($recentPosts as $slug => $filename)
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
</div>
@endsection
