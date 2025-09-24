@extends('layouts.app')

@section('title', 'Our Services - SpacePepper Digital Solutions')
@section('description', 'Comprehensive digital services including web development, mobile apps, UI/UX design, and digital marketing to grow your business.')

@section('content')
<!-- Hero Section -->
<section class="py-20 bg-gradient-to-br from-blue-50 via-white to-purple-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Our <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Services</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We offer comprehensive digital solutions to help your business succeed in the modern world. From web development to digital marketing, we've got you covered.
            </p>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            @foreach($services as $index => $service)
            <div class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-blue-200">
                <div class="flex items-start mb-6">
                    @if($service['icon'] == 'code')
                        <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mr-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-code text-white text-2xl"></i>
                        </div>
                    @elseif($service['icon'] == 'mobile')
                        <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mr-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-mobile-alt text-white text-2xl"></i>
                        </div>
                    @elseif($service['icon'] == 'design')
                        <div class="w-16 h-16 bg-gradient-to-r from-pink-500 to-pink-600 rounded-2xl flex items-center justify-center mr-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-palette text-white text-2xl"></i>
                        </div>
                    @elseif($service['icon'] == 'marketing')
                        <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-green-600 rounded-2xl flex items-center justify-center mr-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-chart-line text-white text-2xl"></i>
                        </div>
                    @endif
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ $service['title'] }}</h3>
                        <p class="text-gray-600 mb-6">{{ $service['description'] }}</p>
                    </div>
                </div>
                
                <div class="space-y-3">
                    @foreach($service['features'] as $feature)
                    <div class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-3"></i>
                        <span class="text-gray-700">{{ $feature }}</span>
                    </div>
                    @endforeach
                </div>
                
                <div class="mt-8">
                    <a href="{{ route('contact') }}" class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-700 transition-colors">
                        Learn More
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Detailed Services -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Web Development Details -->
        <div class="mb-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Web Development</h2>
                    <p class="text-lg text-gray-600 mb-6">
                        We create modern, responsive websites and web applications that deliver exceptional user experiences and drive business results. Our development process focuses on performance, security, and scalability.
                    </p>
                    
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-semibold text-gray-900">Custom Web Applications</h4>
                                <p class="text-gray-600">Tailored solutions built with modern frameworks like Laravel, React, and Vue.js</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-semibold text-gray-900">E-Commerce Solutions</h4>
                                <p class="text-gray-600">Complete online stores with payment integration and inventory management</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-semibold text-gray-900">CMS Development</h4>
                                <p class="text-gray-600">Content management systems for easy website updates and maintenance</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=600&h=400&fit=crop" alt="Web Development" class="rounded-2xl shadow-2xl">
                </div>
            </div>
        </div>
        
        <!-- Mobile Development Details -->
        <div class="mb-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="order-2 lg:order-1 relative">
                    <img src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=600&h=400&fit=crop" alt="Mobile Development" class="rounded-2xl shadow-2xl">
                </div>
                <div class="order-1 lg:order-2">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Mobile Development</h2>
                    <p class="text-lg text-gray-600 mb-6">
                        Native and cross-platform mobile applications that provide seamless user experiences across all devices. We develop apps for iOS and Android using the latest technologies and best practices.
                    </p>
                    
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-semibold text-gray-900">Native iOS & Android Apps</h4>
                                <p class="text-gray-600">Platform-specific apps for optimal performance and user experience</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-semibold text-gray-900">Cross-Platform Solutions</h4>
                                <p class="text-gray-600">React Native and Flutter apps that work on multiple platforms</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-semibold text-gray-900">App Store Optimization</h4>
                                <p class="text-gray-600">Complete app store submission and optimization services</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- UI/UX Design Details -->
        <div class="mb-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">UI/UX Design</h2>
                    <p class="text-lg text-gray-600 mb-6">
                        Beautiful and intuitive designs that enhance user experience and drive engagement. Our design process is user-centered, focusing on creating interfaces that are both aesthetically pleasing and highly functional.
                    </p>
                    
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-semibold text-gray-900">User Research & Analysis</h4>
                                <p class="text-gray-600">In-depth research to understand your users and their needs</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-semibold text-gray-900">Wireframing & Prototyping</h4>
                                <p class="text-gray-600">Interactive prototypes to visualize and test design concepts</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-semibold text-gray-900">Design Systems</h4>
                                <p class="text-gray-600">Comprehensive design systems for consistent brand experience</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1561070791-2526d30994b5?w=600&h=400&fit=crop" alt="UI/UX Design" class="rounded-2xl shadow-2xl">
                </div>
            </div>
        </div>
        
        <!-- Digital Marketing Details -->
        <div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="order-2 lg:order-1 relative">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600&h=400&fit=crop" alt="Digital Marketing" class="rounded-2xl shadow-2xl">
                </div>
                <div class="order-1 lg:order-2">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Digital Marketing</h2>
                    <p class="text-lg text-gray-600 mb-6">
                        Comprehensive digital marketing strategies that increase your online visibility, drive traffic, and convert visitors into customers. We use data-driven approaches to maximize your ROI.
                    </p>
                    
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-semibold text-gray-900">SEO & SEM</h4>
                                <p class="text-gray-600">Search engine optimization and marketing to improve your rankings</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-semibold text-gray-900">Social Media Marketing</h4>
                                <p class="text-gray-600">Strategic social media campaigns across all major platforms</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-semibold text-gray-900">Content Strategy</h4>
                                <p class="text-gray-600">Engaging content that resonates with your target audience</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Process</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We follow a proven process to ensure successful project delivery and client satisfaction.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Step 1 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-white font-bold text-xl">1</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Discovery</h3>
                <p class="text-gray-600">
                    We start by understanding your business, goals, and requirements through detailed consultation.
                </p>
            </div>
            
            <!-- Step 2 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-white font-bold text-xl">2</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Planning</h3>
                <p class="text-gray-600">
                    We create a detailed project plan with timelines, milestones, and deliverables.
                </p>
            </div>
            
            <!-- Step 3 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-pink-500 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-white font-bold text-xl">3</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Development</h3>
                <p class="text-gray-600">
                    Our team brings your vision to life using the latest technologies and best practices.
                </p>
            </div>
            
            <!-- Step 4 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-white font-bold text-xl">4</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Launch</h3>
                <p class="text-gray-600">
                    We deploy your solution and provide ongoing support to ensure everything runs smoothly.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-600 to-purple-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
            Ready to Get Started?
        </h2>
        <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto">
            Let's discuss your project and see how our services can help you achieve your business goals.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="bg-white text-blue-600 px-8 py-4 rounded-full text-lg font-semibold hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                Start Your Project
            </a>
            <a href="{{ route('portfolio') }}" class="border-2 border-white text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-white hover:text-blue-600 transition-all duration-300">
                View Our Work
            </a>
        </div>
    </div>
</section>
@endsection