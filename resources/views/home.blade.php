@extends('layouts.app')

@section('title', 'SpacePepper - Digital Solutions & Web Development')
@section('description', 'Professional web development, mobile apps, and digital marketing services. Transform your business with cutting-edge digital solutions.')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-purple-50 overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-blue-400 to-purple-600 rounded-full opacity-10 animate-pulse"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-br from-purple-400 to-pink-600 rounded-full opacity-10 animate-pulse delay-1000"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                Transform Your Business with
                <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                    Digital Innovation
                </span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-600 mb-8 leading-relaxed">
                We create stunning websites, powerful mobile apps, and effective digital marketing strategies that drive real results for your business.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('portfolio') }}" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    View Our Work
                </a>
                <a href="{{ route('contact') }}" class="border-2 border-gray-300 text-gray-700 px-8 py-4 rounded-full text-lg font-semibold hover:border-blue-600 hover:text-blue-600 transition-all duration-300">
                    Get Started
                </a>
            </div>
        </div>
        
        <!-- Stats -->
        <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto">
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-blue-600 mb-2">150+</div>
                <div class="text-gray-600">Projects Completed</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-purple-600 mb-2">98%</div>
                <div class="text-gray-600">Client Satisfaction</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-blue-600 mb-2">5+</div>
                <div class="text-gray-600">Years Experience</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-purple-600 mb-2">24/7</div>
                <div class="text-gray-600">Support</div>
            </div>
        </div>
    </div>
</section>

<!-- Services Preview -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Our Services
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We offer comprehensive digital solutions to help your business succeed in the modern world
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Web Development -->
            <div class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-blue-200">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-code text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Web Development</h3>
                <p class="text-gray-600 mb-6">Custom websites and web applications built with modern technologies for optimal performance and user experience.</p>
                <ul class="space-y-2 text-gray-600">
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Responsive Design</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Modern Frameworks</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> SEO Optimized</li>
                </ul>
            </div>
            
            <!-- Mobile Development -->
            <div class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-purple-200">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-mobile-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Mobile Development</h3>
                <p class="text-gray-600 mb-6">Native and cross-platform mobile applications that deliver exceptional user experiences on all devices.</p>
                <ul class="space-y-2 text-gray-600">
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> iOS & Android</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Cross-Platform</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> App Store Ready</li>
                </ul>
            </div>
            
            <!-- Digital Marketing -->
            <div class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-pink-200">
                <div class="w-16 h-16 bg-gradient-to-r from-pink-500 to-pink-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-chart-line text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Digital Marketing</h3>
                <p class="text-gray-600 mb-6">Comprehensive digital marketing strategies to increase your online presence and drive more customers.</p>
                <ul class="space-y-2 text-gray-600">
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> SEO & SEM</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Social Media</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Content Strategy</li>
                </ul>
            </div>
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('services') }}" class="inline-flex items-center bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:shadow-xl transition-all duration-300">
                View All Services
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Portfolio Preview -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Recent Work
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Take a look at some of our recent projects and see how we've helped businesses achieve their goals
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Project 1 -->
            <div class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">
                <div class="aspect-w-16 aspect-h-10 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=600&h=400&fit=crop" alt="E-Commerce Platform" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-6">
                    <div class="text-sm text-blue-600 font-semibold mb-2">Web Development</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">E-Commerce Platform</h3>
                    <p class="text-gray-600">Modern e-commerce solution with advanced features and seamless user experience.</p>
                </div>
            </div>
            
            <!-- Project 2 -->
            <div class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">
                <div class="aspect-w-16 aspect-h-10 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=600&h=400&fit=crop" alt="Mobile Banking App" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-6">
                    <div class="text-sm text-purple-600 font-semibold mb-2">Mobile Development</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Mobile Banking App</h3>
                    <p class="text-gray-600">Secure and user-friendly mobile banking application with advanced security features.</p>
                </div>
            </div>
            
            <!-- Project 3 -->
            <div class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">
                <div class="aspect-w-16 aspect-h-10 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1f?w=600&h=400&fit=crop" alt="Healthcare Dashboard" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-6">
                    <div class="text-sm text-pink-600 font-semibold mb-2">Web Development</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Healthcare Dashboard</h3>
                    <p class="text-gray-600">Comprehensive healthcare management system with real-time analytics.</p>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('portfolio') }}" class="inline-flex items-center bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:shadow-xl transition-all duration-300">
                View All Projects
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-600 to-purple-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
            Ready to Start Your Project?
        </h2>
        <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto">
            Let's discuss your ideas and create something amazing together. Get in touch with us today for a free consultation.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="bg-white text-blue-600 px-8 py-4 rounded-full text-lg font-semibold hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                Get Free Consultation
            </a>
            <a href="{{ route('portfolio') }}" class="border-2 border-white text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-white hover:text-blue-600 transition-all duration-300">
                View Our Work
            </a>
        </div>
    </div>
</section>
@endsection