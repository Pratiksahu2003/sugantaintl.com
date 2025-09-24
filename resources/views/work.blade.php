@extends('layouts.app')

@section('title', 'Our Work - SuGanta Internationals Video Production Portfolio')
@section('description', 'Explore our portfolio of video production projects including corporate videos, advertisements, live streaming, photography, and drone services.')

@section('content')
<!-- Hero Section -->
<section class="pt-20 pb-16 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-5xl md:text-7xl font-bold text-gray-900 mb-8 leading-tight">
                Our
                <br>
                <span class="text-gray-400">Work</span>
            </h1>
            <p class="text-xl text-gray-600 mb-12 max-w-3xl mx-auto leading-relaxed">
                A showcase of our video production projects that demonstrate our expertise in creating compelling visual content for businesses worldwide.
            </p>
        </div>
    </div>
</section>

<!-- Filter Buttons -->
<section class="pb-8 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center gap-4">
            <button class="filter-btn active bg-gray-900 text-white px-6 py-3 rounded-full font-medium transition-all duration-300" data-filter="all">
                All Projects
            </button>
            <button class="filter-btn bg-gray-100 text-gray-700 px-6 py-3 rounded-full font-medium hover:bg-gray-200 transition-all duration-300" data-filter="video-production">
                Video Production
            </button>
            <button class="filter-btn bg-gray-100 text-gray-700 px-6 py-3 rounded-full font-medium hover:bg-gray-200 transition-all duration-300" data-filter="advertisement">
                Advertisement
            </button>
            <button class="filter-btn bg-gray-100 text-gray-700 px-6 py-3 rounded-full font-medium hover:bg-gray-200 transition-all duration-300" data-filter="photography">
                Photography
            </button>
            <button class="filter-btn bg-gray-100 text-gray-700 px-6 py-3 rounded-full font-medium hover:bg-gray-200 transition-all duration-300" data-filter="drone">
                Drone Services
            </button>
            <button class="filter-btn bg-gray-100 text-gray-700 px-6 py-3 rounded-full font-medium hover:bg-gray-200 transition-all duration-300" data-filter="live-streaming">
                Live Streaming
            </button>
        </div>
    </div>
</section>

<!-- Portfolio Grid -->
<section class="pb-20 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="portfolio-grid">
            <!-- Project 1: Corporate Video -->
            <div class="portfolio-item group cursor-pointer" data-category="video-production">
                <div class="aspect-w-16 aspect-h-12 mb-6 overflow-hidden rounded-2xl">
                    <img src="https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?w=600&h=400&fit=crop" alt="Corporate Video Production" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="space-y-2">
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Video Production</p>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-gray-600 transition-colors">Tech Startup Brand Video</h3>
                    <p class="text-gray-600">Complete brand story video production with professional cinematography and post-production</p>
                </div>
            </div>
            
            <!-- Project 2: Advertisement -->
            <div class="portfolio-item group cursor-pointer" data-category="advertisement">
                <div class="aspect-w-16 aspect-h-12 mb-6 overflow-hidden rounded-2xl">
                    <img src="https://images.unsplash.com/photo-1598300042247-d088f8ab3a91?w=600&h=400&fit=crop" alt="Advertisement Production" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="space-y-2">
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Advertisement</p>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-gray-600 transition-colors">E-commerce Product Ads</h3>
                    <p class="text-gray-600">High-converting product advertisement videos with professional studio setup</p>
                </div>
            </div>
            
            <!-- Project 3: Photography -->
            <div class="portfolio-item group cursor-pointer" data-category="photography">
                <div class="aspect-w-16 aspect-h-12 mb-6 overflow-hidden rounded-2xl">
                    <img src="https://images.unsplash.com/photo-1606983340126-99ab4feaa64a?w=600&h=400&fit=crop" alt="Corporate Photography" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="space-y-2">
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Photography</p>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-gray-600 transition-colors">Corporate Event Photography</h3>
                    <p class="text-gray-600">Professional event documentation with high-end camera equipment and lighting</p>
                </div>
            </div>
            
            <!-- Project 4: Drone Services -->
            <div class="portfolio-item group cursor-pointer" data-category="drone">
                <div class="aspect-w-16 aspect-h-12 mb-6 overflow-hidden rounded-2xl">
                    <img src="https://images.unsplash.com/photo-1473968512647-3e447244af8f?w=600&h=400&fit=crop" alt="Drone Aerial Photography" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="space-y-2">
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Drone Services</p>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-gray-600 transition-colors">Real Estate Aerial Shots</h3>
                    <p class="text-gray-600">Stunning aerial photography and videography for real estate marketing</p>
                </div>
            </div>
            
            <!-- Project 5: Live Streaming -->
            <div class="portfolio-item group cursor-pointer" data-category="live-streaming">
                <div class="aspect-w-16 aspect-h-12 mb-6 overflow-hidden rounded-2xl">
                    <img src="https://images.unsplash.com/photo-1515187029135-18ee286d815b?w=600&h=400&fit=crop" alt="Live Streaming Setup" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="space-y-2">
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Live Streaming</p>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-gray-600 transition-colors">Corporate Webinar Production</h3>
                    <p class="text-gray-600">Professional live streaming setup for corporate events and webinars</p>
                </div>
            </div>
            
            <!-- Project 6: Video Production -->
            <div class="portfolio-item group cursor-pointer" data-category="video-production">
                <div class="aspect-w-16 aspect-h-12 mb-6 overflow-hidden rounded-2xl">
                    <img src="https://images.unsplash.com/photo-1492691527719-9d1e07e534b4?w=600&h=400&fit=crop" alt="Product Video" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500">
                                </div>
                <div class="space-y-2">
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Video Production</p>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-gray-600 transition-colors">Product Launch Video</h3>
                    <p class="text-gray-600">Dynamic product showcase video with motion graphics and professional editing</p>
                            </div>
                        </div>
            
            <!-- Project 7: Advertisement -->
            <div class="portfolio-item group cursor-pointer" data-category="advertisement">
                <div class="aspect-w-16 aspect-h-12 mb-6 overflow-hidden rounded-2xl">
                    <img src="https://images.unsplash.com/photo-1551650975-87deedd944c3?w=600&h=400&fit=crop" alt="Social Media Ad" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                <div class="space-y-2">
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Advertisement</p>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-gray-600 transition-colors">Social Media Campaign</h3>
                    <p class="text-gray-600">Engaging social media advertisement series with viral potential</p>
                    </div>
                </div>
            
            <!-- Project 8: Photography -->
            <div class="portfolio-item group cursor-pointer" data-category="photography">
                <div class="aspect-w-16 aspect-h-12 mb-6 overflow-hidden rounded-2xl">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&h=400&fit=crop" alt="Portrait Photography" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="space-y-2">
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Photography</p>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-gray-600 transition-colors">Executive Portraits</h3>
                    <p class="text-gray-600">Professional corporate headshots and executive portrait sessions</p>
            </div>
        </div>
        
            <!-- Project 9: Drone Services -->
            <div class="portfolio-item group cursor-pointer" data-category="drone">
                <div class="aspect-w-16 aspect-h-12 mb-6 overflow-hidden rounded-2xl">
                    <img src="https://images.unsplash.com/photo-1449824913935-59a10b8d2000?w=600&h=400&fit=crop" alt="Construction Drone" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="space-y-2">
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Drone Services</p>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-gray-600 transition-colors">Construction Documentation</h3>
                    <p class="text-gray-600">Aerial progress documentation for construction and development projects</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Our Impact
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Numbers that speak to our commitment to excellence and client satisfaction.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-gray-900 mb-2">500+</div>
                <p class="text-gray-600">Projects Completed</p>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-gray-900 mb-2">200+</div>
                <p class="text-gray-600">Happy Clients</p>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-gray-900 mb-2">50+</div>
                <p class="text-gray-600">Awards Won</p>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-gray-900 mb-2">5+</div>
                <p class="text-gray-600">Years Experience</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Client Testimonials
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                What our clients say about working with SuGanta Internationals.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-gray-50 p-8 rounded-2xl">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    "SuGanta Internationals delivered an exceptional corporate video that exceeded our expectations. The team was professional, responsive, and delivered on time."
                </p>
            <div>
                    <h4 class="font-semibold text-gray-900">Sarah Johnson</h4>
                    <p class="text-gray-500 text-sm">CEO, TechCorp</p>
                </div>
            </div>
            
            <div class="bg-gray-50 p-8 rounded-2xl">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </div>
            </div>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    "The drone footage they captured for our real estate project was absolutely stunning. Professional service from start to finish."
                </p>
            <div>
                    <h4 class="font-semibold text-gray-900">Michael Chen</h4>
                    <p class="text-gray-500 text-sm">Real Estate Developer</p>
                </div>
            </div>
            
            <div class="bg-gray-50 p-8 rounded-2xl">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </div>
            </div>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    "Their live streaming setup for our product launch was flawless. Great attention to detail and professional execution."
                </p>
            <div>
                    <h4 class="font-semibold text-gray-900">Emily Rodriguez</h4>
                    <p class="text-gray-500 text-sm">Marketing Director</p>
            </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gray-900">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
            Ready to Create Something Amazing?
        </h2>
        <p class="text-xl text-gray-300 mb-12 max-w-3xl mx-auto">
            Let's discuss your next video production project and bring your vision to life with our professional services.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="bg-white text-gray-900 px-8 py-4 rounded-full text-lg font-medium hover:bg-gray-100 transition-colors">
                Start Your Project
            </a>
            <a href="{{ route('services') }}" class="border-2 border-white text-white px-8 py-4 rounded-full text-lg font-medium hover:bg-white hover:text-gray-900 transition-colors">
                View Services
            </a>
        </div>
    </div>
</section>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Portfolio filtering functionality
    const filterButtons = document.querySelectorAll('.filter-btn');
        const portfolioItems = document.querySelectorAll('.portfolio-item');
        
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
                const filter = this.getAttribute('data-filter');
                
                // Update active button
            filterButtons.forEach(btn => {
                btn.classList.remove('active', 'bg-gray-900', 'text-white');
                btn.classList.add('bg-gray-100', 'text-gray-700');
            });
                this.classList.add('active', 'bg-gray-900', 'text-white');
                this.classList.remove('bg-gray-100', 'text-gray-700');
                
                // Filter portfolio items
                portfolioItems.forEach(item => {
                    if (filter === 'all' || item.getAttribute('data-category') === filter) {
                        item.style.display = 'block';
                    item.style.opacity = '0';
                        setTimeout(() => {
                            item.style.opacity = '1';
                        }, 100);
                    } else {
                        item.style.opacity = '0';
                        setTimeout(() => {
                            item.style.display = 'none';
                        }, 300);
                    }
                });
            });
        });
    });
</script>
@endpush
@endsection