@extends('layouts.app')

@section('title', 'Resources - Star JD')
@section('description', 'Video production resources, guides, tips, and industry insights from Star JD professional video production team.')

@section('content')
<!-- Hero Section -->
<section class="relative h-[85vh] flex items-center justify-center overflow-hidden" role="banner" aria-label="Hero Section">
    <!-- Video Background -->
    <video
        class="absolute inset-0 w-full h-full object-cover z-0 scale-105"
        autoplay
        muted
        loop
        playsinline
        preload="auto"
        poster="{{ asset('banner/banner.jpg') }}"
        aria-hidden="true">
        <source src="{{ asset('video/hero.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Enhanced Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-br from-black/60 via-black/50 to-black/70 z-10"></div>
    
    <!-- Subtle Pattern Overlay -->
    <div class="absolute inset-0 z-10 opacity-5" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

    <!-- Content Container -->
    <div class="relative z-20 max-w-6xl mx-auto px-6 sm:px-8 lg:px-12 text-center">
        <div class="space-y-4 animate-fade-in-up">
            
            <!-- Badge/Label -->
            <div class="inline-flex items-center justify-center mb-2 opacity-0 animate-fade-in" style="animation-delay: 0.2s; animation-fill-mode: forwards;">
                <span class="inline-flex items-center px-3 py-1.5 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white text-xs font-medium">
                    <svg class="w-3 h-3 mr-1.5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Star JD Resource Hub
                </span>
            </div>

            <!-- Main Heading -->
            <div class="space-y-3 opacity-0 animate-fade-in" style="animation-delay: 0.4s; animation-fill-mode: forwards;">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-[1.1] tracking-tight">
                    <span class="block mb-1">Star JD</span>
                    <span class="block">
                        <span class="relative inline-block">
                            <span class="relative z-10">Resources</span>
                            <span class="absolute bottom-1 left-0 w-full h-2 bg-green-400/30 -rotate-1"></span>
                        </span>
                    </span>
                </h1>
                <div class="mt-2">
                    <span class="inline-block text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-green-400 animate-pulse-subtle tracking-wide">
                        Evolve.
                    </span>
                </div>
            </div>

            <!-- Subtitle -->
            <p class="text-sm sm:text-base md:text-lg text-gray-200 max-w-3xl mx-auto leading-relaxed font-light px-4 opacity-0 animate-fade-in" style="animation-delay: 0.6s; animation-fill-mode: forwards;">
                Welcome to the official resource hub of <span class="text-white font-semibold">www.starjd.com</span>. Discover expert guides, actionable tips, and the latest industry insights curated by our professional video production team.
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3 pt-4 opacity-0 animate-fade-in" style="animation-delay: 0.8s; animation-fill-mode: forwards;">
                <a 
                    href="{{ route('contact') }}" 
                    class="group relative inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-gray-900 bg-white rounded-lg overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105 w-full sm:w-auto">
                    <span class="relative z-10 flex items-center">
                        Connect With Our Experts
                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </span>
                </a>
                
                <a 
                    href="{{ route('video-production') }}" 
                    class="group inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-white bg-transparent rounded-lg border-2 border-white/50 backdrop-blur-sm hover:bg-white hover:text-gray-900 transition-all duration-300 hover:scale-105 w-full sm:w-auto">
                    <span class="flex items-center">
                        View Our Services
                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </span>
                </a>
            </div>

            <!-- Trust Indicators -->
            <div class="flex flex-wrap items-center justify-center gap-4 sm:gap-6 pt-6 text-white/80 text-xs opacity-0 animate-fade-in" style="animation-delay: 1s; animation-fill-mode: forwards;">
                <div class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <span>Expert Resources</span>
                </div>
                <div class="hidden sm:block h-3 w-px bg-white/30"></div>
                <div class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>Industry Insights</span>
                </div>
                <div class="hidden sm:block h-3 w-px bg-white/30"></div>
                <div class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                    </svg>
                    <span>Professional Guides</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 z-20 opacity-0 animate-fade-in animate-bounce-slow" style="animation-delay: 1.2s; animation-fill-mode: forwards;">
        <div class="flex flex-col items-center gap-1 text-white/70 hover:text-white transition-colors cursor-pointer">
            <span class="text-xs font-medium tracking-wider uppercase">Scroll to Explore</span>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
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
