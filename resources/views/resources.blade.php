@extends('layouts.app')

@section('title', 'Resources - SuGanta Internationals')
@section('description', 'Video production resources, guides, tips, and industry insights from SuGanta Internationals professional video production team.')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gray-900">
    <!-- Content -->
    <div class="relative z-20 max-w-6xl mx-auto px-6 text-center">
        <!-- Main Heading -->
        <div class="mb-8">
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-white leading-tight tracking-tight mb-6">
                Video Production
                <span class="text-green-400">Resources</span>
            </h1>
        </div>
        
        <!-- Subtitle -->
        <p class="text-lg md:text-xl text-gray-300 mb-12 max-w-4xl mx-auto leading-relaxed font-normal">
            Access our comprehensive collection of video production guides, industry insights, and professional tips to enhance your video content strategy.
        </p>
        
        <!-- CTA Button -->
        <div class="mb-16">
            <a href="{{ route('contact') }}" class="bg-white text-gray-900 px-8 py-3 rounded text-base font-medium hover:bg-gray-100 transition-all duration-200 inline-block">
                Get Expert Advice
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

<!-- Featured Resources -->
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                Featured Resources
            </h2>
            <p class="text-lg text-gray-600 max-w-4xl mx-auto">
                Discover our most popular and valuable video production resources.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Resource 1 -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-file-alt text-blue-600"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Complete Video Production Checklist</h3>
                <p class="text-gray-600 mb-4">
                    A comprehensive checklist covering every aspect of video production from pre-production to delivery.
                </p>
                <a href="#" class="text-blue-600 font-medium hover:text-blue-800">Read More →</a>
            </div>
            
            <!-- Resource 2 -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-video text-green-600"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">2024 Video Marketing Trends</h3>
                <p class="text-gray-600 mb-4">
                    Stay ahead with the latest video marketing trends and strategies for 2024.
                </p>
                <a href="#" class="text-green-600 font-medium hover:text-green-800">Read More →</a>
            </div>
            
            <!-- Resource 3 -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-lightbulb text-purple-600"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Creative Storytelling Techniques</h3>
                <p class="text-gray-600 mb-4">
                    Learn powerful storytelling techniques to create engaging and memorable video content.
                </p>
                <a href="#" class="text-purple-600 font-medium hover:text-purple-800">Read More →</a>
            </div>
            
            <!-- Resource 4 -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-tools text-orange-600"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Essential Video Production Equipment</h3>
                <p class="text-gray-600 mb-4">
                    A guide to essential equipment for professional video production on any budget.
                </p>
                <a href="#" class="text-orange-600 font-medium hover:text-orange-800">Read More →</a>
            </div>
            
            <!-- Resource 5 -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-chart-bar text-teal-600"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Video ROI Measurement Guide</h3>
                <p class="text-gray-600 mb-4">
                    Learn how to measure and optimize the return on investment for your video content.
                </p>
                <a href="#" class="text-teal-600 font-medium hover:text-teal-800">Read More →</a>
            </div>
            
            <!-- Resource 6 -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-mobile-alt text-red-600"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Mobile Video Production Tips</h3>
                <p class="text-gray-600 mb-4">
                    Professional tips for creating high-quality videos using mobile devices and apps.
                </p>
                <a href="#" class="text-red-600 font-medium hover:text-red-800">Read More →</a>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Signup -->
<section class="py-20 bg-gray-900 text-white">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">
            Stay Updated with Our Resources
        </h2>
        <p class="text-lg text-gray-300 mb-12 max-w-2xl mx-auto">
            Subscribe to our newsletter and get the latest video production resources, tips, and industry insights delivered to your inbox.
        </p>
        
        <div class="max-w-md mx-auto">
            <div class="flex flex-col sm:flex-row gap-4">
                <input type="email" placeholder="Enter your email address" class="flex-1 px-4 py-3 rounded text-gray-900 focus:outline-none focus:ring-2 focus:ring-white">
                <button class="bg-white text-gray-900 px-6 py-3 rounded font-medium hover:bg-gray-100 transition-colors">
                    Subscribe
                </button>
            </div>
            <p class="text-sm text-gray-400 mt-4">
                We respect your privacy. Unsubscribe at any time.
            </p>
        </div>
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
