@extends('layouts.app')

@section('title', 'Video Production - Star JD')
@section('description', 'Professional video production services including corporate videos, commercials, event coverage, and post-production by Star JD.')

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
                    Professional Video Production Services
                </span>
            </div>

            <!-- Main Heading -->
            <div class="space-y-3 opacity-0 animate-fade-in" style="animation-delay: 0.4s; animation-fill-mode: forwards;">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-[1.1] tracking-tight">
                    <span class="block mb-1">Professional Video</span>
                    <span class="block mb-1">Production</span>
                    <span class="block">
                        <span class="relative inline-block">
                            <span class="relative z-10">Services</span>
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
                Transform your ideas into compelling visual stories with our comprehensive video production services. From concept to completion, we deliver exceptional results.
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3 pt-4 opacity-0 animate-fade-in" style="animation-delay: 0.8s; animation-fill-mode: forwards;">
                <a 
                    href="{{ route('contact') }}" 
                    class="group relative inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-gray-900 bg-white rounded-lg overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105 w-full sm:w-auto">
                    <span class="relative z-10 flex items-center">
                        Start Your Project
                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </span>
                </a>
                
                <a 
                    href="{{ route('Portfolio') }}" 
                    class="group inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-white bg-transparent rounded-lg border-2 border-white/50 backdrop-blur-sm hover:bg-white hover:text-gray-900 transition-all duration-300 hover:scale-105 w-full sm:w-auto">
                    <span class="flex items-center">
                        View Our Work
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
                    <span>100+ Projects Delivered</span>
                </div>
                <div class="hidden sm:block h-3 w-px bg-white/30"></div>
                <div class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>Trusted by Leading Brands</span>
                </div>
                <div class="hidden sm:block h-3 w-px bg-white/30"></div>
                <div class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                    </svg>
                    <span>Pan-India Coverage</span>
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

<!-- Animation Styles -->
<style>
    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fade-in {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    @keyframes pulse-subtle {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.8;
        }
    }

    @keyframes bounce-slow {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }

    .animate-fade-in-up {
        animation: fade-in-up 1s ease-out;
    }

    .animate-fade-in {
        animation: fade-in 1s ease-out;
    }

    .animate-pulse-subtle {
        animation: pulse-subtle 3s ease-in-out infinite;
    }

    .animate-bounce-slow {
        animation: bounce-slow 2s ease-in-out infinite;
    }
</style>

<!-- Video Production Services -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                Our Video Production Services
            </h2>
            <p class="text-lg text-gray-600 max-w-4xl mx-auto">
                We offer comprehensive video production services tailored to meet your business needs and exceed your expectations.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Corporate Videos -->
            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-building text-2xl text-blue-600"></i>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Corporate Videos</h3>
                <p class="text-gray-600 mb-6">
                    Professional corporate videos that showcase your company's values, culture, and achievements.
                </p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Company Introductions</li>
                    <li>• Training Videos</li>
                    <li>• Internal Communications</li>
                    <li>• Annual Reports</li>
                </ul>
            </div>
            
            <!-- Commercial Production -->
            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-16 h-16 bg-green-100 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-ad text-2xl text-green-600"></i>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Commercial Production</h3>
                <p class="text-gray-600 mb-6">
                    High-impact commercial videos that drive engagement and conversions for your brand.
                </p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• TV Commercials</li>
                    <li>• Social Media Ads</li>
                    <li>• Product Launches</li>
                    <li>• Brand Campaigns</li>
                </ul>
            </div>
            
            <!-- Event Coverage -->
            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-16 h-16 bg-purple-100 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-calendar-alt text-2xl text-purple-600"></i>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Event Coverage</h3>
                <p class="text-gray-600 mb-6">
                    Complete event documentation with professional videography and live streaming capabilities.
                </p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Conferences</li>
                    <li>• Product Launches</li>
                    <li>• Corporate Events</li>
                    <li>• Live Streaming</li>
                </ul>
            </div>
            
            <!-- Post-Production -->
            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-16 h-16 bg-orange-100 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-cut text-2xl text-orange-600"></i>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Post-Production</h3>
                <p class="text-gray-600 mb-6">
                    Professional editing, color grading, motion graphics, and sound design services.
                </p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Video Editing</li>
                    <li>• Color Grading</li>
                    <li>• Motion Graphics</li>
                    <li>• Sound Design</li>
                </ul>
            </div>
            
            <!-- Drone Services -->
            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-16 h-16 bg-teal-100 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-drone text-2xl text-teal-600"></i>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Drone Services</h3>
                <p class="text-gray-600 mb-6">
                    Aerial photography and videography with professional drone equipment and licensed pilots.
                </p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Aerial Photography</li>
                    <li>• Real Estate Videos</li>
                    <li>• Construction Progress</li>
                    <li>• Event Coverage</li>
                </ul>
            </div>
            
            <!-- Live Streaming -->
            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-16 h-16 bg-red-100 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-broadcast-tower text-2xl text-red-600"></i>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Live Streaming</h3>
                <p class="text-gray-600 mb-6">
                    Professional live streaming setup for events, webinars, and online broadcasts.
                </p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li>• Event Streaming</li>
                    <li>• Webinar Setup</li>
                    <li>• Multi-platform</li>
                    <li>• Interactive Features</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Our Process -->
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                Our Production Process
            </h2>
            <p class="text-lg text-gray-600 max-w-4xl mx-auto">
                We follow a structured approach to ensure every project meets your expectations and delivers exceptional results.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-gray-900 text-white rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-2xl font-bold">1</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Concept & Planning</h3>
                <p class="text-gray-600">
                    We start by understanding your vision, goals, and requirements to create a comprehensive production plan.
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-gray-900 text-white rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-2xl font-bold">2</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Pre-Production</h3>
                <p class="text-gray-600">
                    Script development, storyboarding, location scouting, and equipment preparation for smooth execution.
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-gray-900 text-white rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-2xl font-bold">3</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Production</h3>
                <p class="text-gray-600">
                    Professional filming with state-of-the-art equipment and experienced crew members.
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-gray-900 text-white rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-2xl font-bold">4</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Post-Production</h3>
                <p class="text-gray-600">
                    Editing, color grading, sound design, and final delivery in your preferred format.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Equipment & Technology -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                Professional Equipment & Technology
            </h2>
            <p class="text-lg text-gray-600 max-w-4xl mx-auto">
                We use cutting-edge technology and professional equipment to ensure the highest quality video production.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-video text-2xl text-gray-600"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">4K Cameras</h3>
                <p class="text-gray-600">
                    Professional 4K cameras for crystal-clear video quality and stunning visual detail.
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-lightbulb text-2xl text-gray-600"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Professional Lighting</h3>
                <p class="text-gray-600">
                    Studio-quality lighting equipment for perfect illumination and professional appearance.
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-microphone text-2xl text-gray-600"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Audio Equipment</h3>
                <p class="text-gray-600">
                    High-quality microphones and audio recording equipment for crystal-clear sound.
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-drone text-2xl text-gray-600"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Drone Technology</h3>
                <p class="text-gray-600">
                    Professional drones for aerial shots and unique perspectives on your projects.
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-desktop text-2xl text-gray-600"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Editing Software</h3>
                <p class="text-gray-600">
                    Industry-standard editing software for professional post-production and effects.
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-broadcast-tower text-2xl text-gray-600"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Live Streaming</h3>
                <p class="text-gray-600">
                    Professional live streaming equipment for real-time broadcasting and events.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gray-900 text-white">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">
            Ready to Create Amazing Video Content?
        </h2>
        <p class="text-lg text-gray-300 mb-12 max-w-4xl mx-auto">
            Let's discuss your project and bring your vision to life with our professional video production services.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="{{ route('contact') }}" class="bg-white text-gray-900 px-8 py-3 rounded text-base font-medium hover:bg-gray-100 transition-all duration-200">
                Start Your Project
            </a>
            <a href="{{ route('Portfolio') }}" class="border border-white text-white px-8 py-3 rounded text-base font-medium hover:bg-white hover:text-gray-900 transition-all duration-200">
                View Our Work
            </a>
        </div>
    </div>
</section>
@endsection
