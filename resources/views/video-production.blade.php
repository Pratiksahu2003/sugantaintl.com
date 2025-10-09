@extends('layouts.app')

@section('title', 'Video Production - Star JD')
@section('description', 'Professional video production services including corporate videos, commercials, event coverage, and post-production by Star JD.')

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

    <!-- Video Overlay -->
    <div class="absolute inset-0 bg-black/40 z-10"></div>

    <!-- Content -->
    <div class="relative z-20 max-w-6xl mx-auto px-6 text-center">
        <!-- Main Heading -->
        <div class="mb-8">
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-white leading-tight tracking-tight mb-6">
                Professional Video Production
                <span class="text-green-400">Services</span>
            </h1>
        </div>
        
        <!-- Subtitle -->
        <p class="text-lg md:text-xl text-gray-300 mb-12 max-w-4xl mx-auto leading-relaxed font-normal">
            Transform your ideas into compelling visual stories with our comprehensive video production services. From concept to completion, we deliver exceptional results.
        </p>
        
        <!-- CTA Button -->
        <div class="mb-16">
            <a href="{{ route('contact') }}" class="bg-white text-gray-900 px-8 py-3 rounded text-base font-medium hover:bg-gray-100 transition-all duration-200 inline-block">
                Start Your Project
            </a>
        </div>
    </div>
</section>

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
