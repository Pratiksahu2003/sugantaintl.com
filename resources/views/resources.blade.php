@extends('layouts.app')

@section('title', 'Resources - SuGanta Internationals')
@section('description', 'Video production resources, guides, tips, and industry insights from SuGanta Internationals professional video production team.')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Video Background -->
    <video
        class="absolute inset-0 w-full h-full object-cover z-0"
        autoplay
        muted
        loop
        playsinline
        poster="">
        <source src="{{ asset('video/hero.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/50 z-10"></div>

    <!-- Content -->
    <div class="relative z-20 max-w-6xl mx-auto px-6 text-center">
        <!-- Main Heading -->
        <div class="mb-8">
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-white leading-tight tracking-tight mb-6">
                <span class="text-green-400">SuGanta Internationals</span> Resources
            </h1>
        </div>
        
        <!-- Subtitle -->
        <p class="text-lg md:text-xl text-gray-300 mb-12 max-w-4xl mx-auto leading-relaxed font-normal">
            Welcome to the official resource hub of <span class="text-white font-semibold">www.sugantaintl.com</span>.<br>
            Discover expert guides, actionable tips, and the latest industry insights curated by our professional video production team. Whether you’re a business, creator, or agency, empower your next project with knowledge from SuGanta Internationals.
        </p>
        
        <!-- CTA Button -->
        <div class="mb-16">
            <a href="{{ route('contact') }}" class="bg-white text-gray-900 px-8 py-3 rounded text-base font-medium hover:bg-gray-100 transition-all duration-200 inline-block">
                Connect With Our Experts
            </a>
        </div>
    </div>
</section>

<!-- Resource Categories -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                Resource Categories
            </h2>
            <p class="text-lg text-gray-600 max-w-4xl mx-auto">
                Explore our curated collection of video production resources organized by category.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Video Production Guides -->
            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-book text-2xl text-blue-600"></i>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Production Guides</h3>
                <p class="text-gray-600 mb-6">
                    Comprehensive guides covering all aspects of video production from planning to post-production.
                </p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Pre-Production Planning</li>
                    <li>• Camera Techniques</li>
                    <li>• Lighting Setup</li>
                    <li>• Audio Recording</li>
                    <li>• Post-Production Workflow</li>
                </ul>
            </div>
            
            <!-- Industry Insights -->
            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-16 h-16 bg-green-100 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-chart-line text-2xl text-green-600"></i>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Industry Insights</h3>
                <p class="text-gray-600 mb-6">
                    Stay updated with the latest trends, technologies, and best practices in video production.
                </p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Market Trends</li>
                    <li>• Technology Updates</li>
                    <li>• Industry News</li>
                    <li>• Best Practices</li>
                    <li>• Case Studies</li>
                </ul>
            </div>
            
            <!-- Technical Tips -->
            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-16 h-16 bg-purple-100 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-tools text-2xl text-purple-600"></i>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Technical Tips</h3>
                <p class="text-gray-600 mb-6">
                    Professional tips and tricks to improve your video production skills and workflow efficiency.
                </p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Equipment Reviews</li>
                    <li>• Software Tutorials</li>
                    <li>• Troubleshooting</li>
                    <li>• Optimization Tips</li>
                    <li>• Workflow Hacks</li>
                </ul>
            </div>
            
            <!-- Creative Inspiration -->
            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-16 h-16 bg-orange-100 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-lightbulb text-2xl text-orange-600"></i>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Creative Inspiration</h3>
                <p class="text-gray-600 mb-6">
                    Get inspired with creative ideas, storytelling techniques, and innovative approaches to video content.
                </p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Storytelling Techniques</li>
                    <li>• Creative Concepts</li>
                    <li>• Visual Styles</li>
                    <li>• Brand Storytelling</li>
                    <li>• Innovation Ideas</li>
                </ul>
            </div>
            
            <!-- Business Resources -->
            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-16 h-16 bg-teal-100 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-briefcase text-2xl text-teal-600"></i>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Business Resources</h3>
                <p class="text-gray-600 mb-6">
                    Business-focused resources for video production companies and content creators.
                </p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Pricing Strategies</li>
                    <li>• Client Management</li>
                    <li>• Project Planning</li>
                    <li>• Marketing Tips</li>
                    <li>• Business Growth</li>
                </ul>
            </div>
            
            <!-- Equipment Guides -->
            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-16 h-16 bg-red-100 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-camera text-2xl text-red-600"></i>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Equipment Guides</h3>
                <p class="text-gray-600 mb-6">
                    Detailed guides on video production equipment, gear reviews, and recommendations.
                </p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Camera Reviews</li>
                    <li>• Lighting Equipment</li>
                    <li>• Audio Gear</li>
                    <li>• Accessories</li>
                    <li>• Budget Options</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Featured Podcasts & Interviews -->
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                Featured Podcasts & Interviews
            </h2>
            <p class="text-lg text-gray-600 max-w-4xl mx-auto">
                Explore our latest podcasts and interviews with industry leaders, creators, and innovators.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach(config('company.featured_podcasts', []) as $podcast)
                <div class="bg-white p-6 rounded-lg shadow-sm flex flex-col h-full">
                    <div class="mb-4 w-full aspect-video overflow-hidden rounded-md bg-black flex items-center justify-center">
                        <div class="w-full h-full flex items-center justify-center">
                            {!! $podcast['iframe'] !!}
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $podcast['title'] }}</h3>
                    <p class="text-gray-600 mb-4 flex-1">
                        {{ $podcast['description'] }}
                    </p>
                    @php
                        $iframeSrc = '#';
                        if (preg_match('/src="([^"]+)"/', $podcast['iframe'], $matches)) {
                            $iframeSrc = $matches[1];
                        }
                    @endphp
                    <a href="{{ $iframeSrc }}" target="_blank" class="text-blue-600 font-medium hover:text-blue-800 mt-auto">
                        Watch on YouTube →
                    </a>
                </div>
            @endforeach
        </div>
        @if(config('company.featured_podcasts_list'))
            <div class="mt-12">
                <h3 class="text-2xl font-semibold text-gray-900 mb-4 text-center">Podcast & Interview List</h3>
                <ul class="list-disc list-inside text-gray-700 max-w-2xl mx-auto space-y-2">
                    @foreach(config('company.featured_podcasts_list', []) as $item)
                        <li>
                            @if(isset($item['url']))
                                <a href="{{ $item['url'] }}" target="_blank" class="text-blue-600 hover:text-blue-800 font-medium">
                                    {{ $item['title'] ?? $item['url'] }}
                                </a>
                            @else
                                {{ $item['title'] ?? $item }}
                            @endif
                            @if(isset($item['description']))
                                <span class="text-gray-500"> - {{ $item['description'] }}</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</section>



<!-- CTA Section -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
            Need Professional Video Production?
        </h2>
        <p class="text-lg text-gray-600 mb-12 max-w-4xl mx-auto">
            While our resources are valuable for learning, sometimes you need professional expertise. Let our team handle your video production needs.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="{{ route('contact') }}" class="bg-gray-900 text-white px-8 py-3 rounded text-base font-medium hover:bg-gray-800 transition-colors duration-200">
                Get Professional Help
            </a>
            <a href="{{ route('video-production') }}" class="border border-gray-900 text-gray-900 px-8 py-3 rounded text-base font-medium hover:bg-gray-900 hover:text-white transition-colors duration-200">
                View Our Services
            </a>
        </div>
    </div>
</section>
@endsection
