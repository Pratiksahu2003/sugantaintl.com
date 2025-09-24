@extends('layouts.app')

@section('title', 'Our Services - SuGanta Internationals Video Production')
@section('description', 'Professional video production services including video shoots, ads production, studio rentals, podcast services, live streaming, photography, drone services, and equipment rental.')

@section('content')
<!-- Hero Section -->
<section class="pt-20 pb-16 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-5xl md:text-7xl font-bold text-gray-900 mb-8 leading-tight">
                Our
                <br>
                <span class="text-gray-400">Services</span>
            </h1>
            <p class="text-xl text-gray-600 mb-12 max-w-3xl mx-auto leading-relaxed">
                We offer comprehensive video production and media services to help your business create compelling visual content that drives engagement and results.
            </p>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Video Production -->
            <div class="group bg-white p-8 rounded-2xl hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-6 group-hover:bg-gray-900 transition-colors duration-300">
                    <i class="fas fa-video text-gray-600 text-2xl group-hover:text-white transition-colors duration-300"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Video Production</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Professional video production services for corporate, commercial, and creative projects with full production support and post-production.
                </p>
                <ul class="space-y-2 text-gray-600 text-sm">
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Corporate Video Production
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Commercial Video Shoots
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Event Documentation
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Training Videos
                    </li>
                </ul>
            </div>
            
            <!-- Advertisement Production -->
            <div class="group bg-white p-8 rounded-2xl hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-6 group-hover:bg-gray-900 transition-colors duration-300">
                    <i class="fas fa-bullhorn text-gray-600 text-2xl group-hover:text-white transition-colors duration-300"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Advertisement Production</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    High-impact advertisement videos that drive engagement and conversions for your brand across all platforms.
                </p>
                <ul class="space-y-2 text-gray-600 text-sm">
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        TV Commercial Production
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Social Media Ads
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Product Advertisement Videos
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Brand Campaign Videos
                    </li>
                </ul>
            </div>
            
            <!-- Studio Rental -->
            <div class="group bg-white p-8 rounded-2xl hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-6 group-hover:bg-gray-900 transition-colors duration-300">
                    <i class="fas fa-building text-gray-600 text-2xl group-hover:text-white transition-colors duration-300"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Studio Rental</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    State-of-the-art studio spaces equipped with professional lighting, sound, and equipment for all your production needs.
                </p>
                <ul class="space-y-2 text-gray-600 text-sm">
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Professional Lighting Setup
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        High-Quality Sound Equipment
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Green Screen Studios
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Flexible Space Configurations
                    </li>
                </ul>
            </div>
            
            <!-- Podcast Services -->
            <div class="group bg-white p-8 rounded-2xl hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-6 group-hover:bg-gray-900 transition-colors duration-300">
                    <i class="fas fa-microphone text-gray-600 text-2xl group-hover:text-white transition-colors duration-300"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Podcast Services</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Complete podcast production including recording, editing, and distribution services to help you reach your audience.
                </p>
                <ul class="space-y-2 text-gray-600 text-sm">
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Professional Recording Setup
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Audio Editing & Mixing
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Podcast Distribution
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Show Notes & SEO
                    </li>
                </ul>
            </div>
            
            <!-- Live Streaming -->
            <div class="group bg-white p-8 rounded-2xl hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-6 group-hover:bg-gray-900 transition-colors duration-300">
                    <i class="fas fa-broadcast-tower text-gray-600 text-2xl group-hover:text-white transition-colors duration-300"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Live Streaming</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Professional live streaming setup for events, webinars, and online broadcasts with multi-platform support.
                </p>
                <ul class="space-y-2 text-gray-600 text-sm">
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Event Live Streaming
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Webinar Production
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Multi-Platform Broadcasting
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Interactive Streaming
                    </li>
                </ul>
            </div>
            
            <!-- Photography -->
            <div class="group bg-white p-8 rounded-2xl hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-6 group-hover:bg-gray-900 transition-colors duration-300">
                    <i class="fas fa-camera text-gray-600 text-2xl group-hover:text-white transition-colors duration-300"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Photography</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Professional photography services for events, portraits, products, and corporate needs with high-end equipment.
                </p>
                <ul class="space-y-2 text-gray-600 text-sm">
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Event Photography
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Corporate Portraits
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Product Photography
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Lifestyle Photography
                    </li>
                </ul>
            </div>
            
            <!-- Drone Services -->
            <div class="group bg-white p-8 rounded-2xl hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-6 group-hover:bg-gray-900 transition-colors duration-300">
                    <i class="fas fa-drone text-gray-600 text-2xl group-hover:text-white transition-colors duration-300"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Drone Services</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Aerial photography and videography with professional drone equipment and licensed pilots for stunning perspectives.
                </p>
                <ul class="space-y-2 text-gray-600 text-sm">
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Aerial Photography
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Drone Videography
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Real Estate Photography
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Construction Documentation
                    </li>
                </ul>
            </div>
            
            <!-- Video Editing -->
            <div class="group bg-white p-8 rounded-2xl hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-6 group-hover:bg-gray-900 transition-colors duration-300">
                    <i class="fas fa-cut text-gray-600 text-2xl group-hover:text-white transition-colors duration-300"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Video Editing</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Professional post-production services including editing, color grading, and motion graphics for polished results.
                </p>
                <ul class="space-y-2 text-gray-600 text-sm">
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Professional Video Editing
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Color Grading & Correction
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Motion Graphics & Animation
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Sound Design & Mixing
                    </li>
                </ul>
            </div>
            
            <!-- Equipment Rental -->
            <div class="group bg-white p-8 rounded-2xl hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-6 group-hover:bg-gray-900 transition-colors duration-300">
                    <i class="fas fa-tools text-gray-600 text-2xl group-hover:text-white transition-colors duration-300"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Equipment Rental</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Professional camera, lighting, and audio equipment rental for your production needs with technical support.
                </p>
                <ul class="space-y-2 text-gray-600 text-sm">
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Professional Cameras
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Lighting Equipment
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Audio Recording Gear
                    </li>
                    <li class="flex items-center">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                        Technical Support
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Our Process
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We follow a proven process to ensure your video production project is delivered on time and exceeds expectations.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Step 1 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-gray-900 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-6">1</div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Consultation</h3>
                <p class="text-gray-600">We discuss your vision, goals, and requirements to understand your project needs.</p>
            </div>
            
            <!-- Step 2 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-gray-900 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-6">2</div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Planning</h3>
                <p class="text-gray-600">We create a detailed production plan including timeline, budget, and creative direction.</p>
            </div>
            
            <!-- Step 3 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-gray-900 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-6">3</div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Production</h3>
                <p class="text-gray-600">Professional filming with our experienced crew and state-of-the-art equipment.</p>
            </div>
            
            <!-- Step 4 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-gray-900 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-6">4</div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Delivery</h3>
                <p class="text-gray-600">Final editing, color correction, and delivery of your completed video project.</p>
            </div>
        </div>
    </div>
</section>

<!-- Equipment Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Professional Equipment
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We use only the latest professional equipment to ensure the highest quality results for your projects.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Cameras -->
            <div class="bg-white p-8 rounded-2xl text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-video text-gray-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Professional Cameras</h3>
                <p class="text-gray-600">RED, ARRI, Sony FX series, Canon C series, and more for cinematic quality.</p>
            </div>
            
            <!-- Lighting -->
            <div class="bg-white p-8 rounded-2xl text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-lightbulb text-gray-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Lighting Equipment</h3>
                <p class="text-gray-600">Professional LED panels, tungsten lights, and modifiers for perfect illumination.</p>
            </div>
            
            <!-- Audio -->
            <div class="bg-white p-8 rounded-2xl text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-microphone text-gray-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Audio Equipment</h3>
                <p class="text-gray-600">Professional microphones, recorders, and mixing consoles for crystal clear sound.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gray-900">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
            Ready to Start Your Project?
        </h2>
        <p class="text-xl text-gray-300 mb-12 max-w-3xl mx-auto">
            Let's discuss your video production needs and create something amazing together. Contact us for a free consultation.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="bg-white text-gray-900 px-8 py-4 rounded-full text-lg font-medium hover:bg-gray-100 transition-colors">
                Get Started
            </a>
            <a href="tel:+1234567890" class="border-2 border-white text-white px-8 py-4 rounded-full text-lg font-medium hover:bg-white hover:text-gray-900 transition-colors">
                Call Now
            </a>
        </div>
    </div>
</section>
@endsection