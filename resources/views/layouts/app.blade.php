<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'SpacePepper - Digital Solutions')</title>
    <meta name="description" content="@yield('description', 'Professional web development, mobile apps, and digital marketing services')">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
</head>
<body class="font-inter antialiased bg-white">
    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-white/90 backdrop-blur-md border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <div class="w-8 h-8 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-rocket text-white text-sm"></i>
                        </div>
                        <span class="ml-2 text-xl font-bold text-gray-900">SpacePepper</span>
                    </a>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' }} px-3 py-2 text-sm font-medium transition-colors">
                            Home
                        </a>
                        <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' }} px-3 py-2 text-sm font-medium transition-colors">
                            About
                        </a>
                        <a href="{{ route('services') }}" class="nav-link {{ request()->routeIs('services') ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' }} px-3 py-2 text-sm font-medium transition-colors">
                            Services
                        </a>
                        <a href="{{ route('portfolio') }}" class="nav-link {{ request()->routeIs('portfolio') ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' }} px-3 py-2 text-sm font-medium transition-colors">
                            Portfolio
                        </a>
                        <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' }} px-3 py-2 text-sm font-medium transition-colors">
                            Contact
                        </a>
                    </div>
                </div>
                
                <!-- CTA Button -->
                <div class="hidden md:block">
                    <a href="{{ route('contact') }}" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-2 rounded-full text-sm font-medium hover:shadow-lg transition-all duration-300">
                        Get Started
                    </a>
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" class="mobile-menu-button text-gray-700 hover:text-blue-600 focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Navigation -->
        <div class="mobile-menu hidden md:hidden bg-white border-t border-gray-100">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}" class="block px-3 py-2 text-base font-medium {{ request()->routeIs('home') ? 'text-blue-600' : 'text-gray-700' }}">Home</a>
                <a href="{{ route('about') }}" class="block px-3 py-2 text-base font-medium {{ request()->routeIs('about') ? 'text-blue-600' : 'text-gray-700' }}">About</a>
                <a href="{{ route('services') }}" class="block px-3 py-2 text-base font-medium {{ request()->routeIs('services') ? 'text-blue-600' : 'text-gray-700' }}">Services</a>
                <a href="{{ route('portfolio') }}" class="block px-3 py-2 text-base font-medium {{ request()->routeIs('portfolio') ? 'text-blue-600' : 'text-gray-700' }}">Portfolio</a>
                <a href="{{ route('contact') }}" class="block px-3 py-2 text-base font-medium {{ request()->routeIs('contact') ? 'text-blue-600' : 'text-gray-700' }}">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-16">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center mb-4">
                        <div class="w-8 h-8 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-rocket text-white text-sm"></i>
                        </div>
                        <span class="ml-2 text-xl font-bold">SpacePepper</span>
                    </div>
                    <p class="text-gray-400 mb-4 max-w-md">
                        We create digital experiences that drive results. From web development to mobile apps and digital marketing, we help businesses thrive in the digital world.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition-colors">Home</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-white transition-colors">About</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-400 hover:text-white transition-colors">Services</a></li>
                        <li><a href="{{ route('portfolio') }}" class="text-gray-400 hover:text-white transition-colors">Portfolio</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Info</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2"></i>
                            hello@spacepepper.com
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-2"></i>
                            +1 (555) 123-4567
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            123 Business St, City, State 12345
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} SpacePepper. All rights reserved.</p>
            </div>
        </div>
    </footer>

    @stack('scripts')
    
    <script>
        // Mobile menu toggle
        document.querySelector('.mobile-menu-button').addEventListener('click', function() {
            document.querySelector('.mobile-menu').classList.toggle('hidden');
        });
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>