<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'SuGanta Internationals - Professional Video Production Services')</title>
    <meta name="description" content="@yield('description', 'SuGanta Internationals - Leading video production company offering video shoots, ads production, studio rentals, and podcast services for businesses worldwide')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Additional mobile navbar styles -->
    <style>
        /* Mobile navbar improvements */
        .mobile-menu {
            transition: all 0.3s ease-in-out;
        }
        
        .mobile-menu.hidden {
            opacity: 0;
            transform: translateY(-10px);
        }
        
        .mobile-menu:not(.hidden) {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Prevent body scroll when mobile menu is open */
        body.mobile-menu-open {
            overflow: hidden;
            position: fixed;
            width: 100%;
        }
        
        /* Smooth navbar transitions */
        nav {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }
        
        /* Mobile menu button animation */
        .mobile-menu-button svg {
            transition: transform 0.2s ease-in-out;
        }
        
        /* Better focus states for accessibility */
        .mobile-menu-button:focus {
            outline: 2px solid #f97316;
            outline-offset: 2px;
        }
        
        /* Mobile menu link hover effects */
        .mobile-menu a {
            position: relative;
            overflow: hidden;
        }
        
        .mobile-menu a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(249, 115, 22, 0.1), transparent);
            transition: left 0.5s;
        }
        
        .mobile-menu a:hover::before {
            left: 100%;
        }
    </style>

    @stack('styles')
</head>

<body class="font-inter antialiased bg-white text-gray-900">
    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-white border-b border-gray-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <img src="{{ asset('images/logo.png') }}" alt="SuGanta Internationals" class="w-30 h-12">
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex md:items-center md:space-x-8">
                    <a href="{{ route('video-production') }}" class="text-gray-900 hover:text-gray-600 px-3 py-2 text-sm font-medium transition-colors duration-200">
                        Video Production
                    </a>
                    <a href="{{ route('Portfolio') }}" class="text-gray-900 hover:text-gray-600 px-3 py-2 text-sm font-medium transition-colors duration-200">
                        Portfolio
                    </a>
                    <a href="{{ route('case-studies') }}" class="text-gray-900 hover:text-gray-600 px-3 py-2 text-sm font-medium transition-colors duration-200">
                        Case Studies
                    </a>
                    <a href="{{ route('Resources') }}" class="text-gray-900 hover:text-gray-600 px-3 py-2 text-sm font-medium transition-colors duration-200">
                        Resources
                    </a>
                    <a href="{{ route('about') }}" class="text-gray-900 hover:text-gray-600 px-3 py-2 text-sm font-medium transition-colors duration-200">
                        About
                    </a>
                    <a href="{{ route('contact') }}" class="text-gray-900 hover:text-gray-600 px-3 py-2 text-sm font-medium transition-colors duration-200">
                        Contact
                    </a>
                  
                </div>

                <!-- CTA Button -->
                <div class="hidden md:block">
                    <a href="{{ route('contact') }}" class="bg-orange-600 text-white px-4 py-2 rounded text-sm font-medium">
                        Get a Quote
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-orange-500 transition-colors duration-200" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <!-- Hamburger icon -->
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <!-- Close icon -->
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div class="mobile-menu hidden md:hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t border-gray-200 shadow-lg">
                    <a href="{{ route('video-production') }}" class="text-gray-900 hover:text-orange-600 hover:bg-gray-50 block px-3 py-2 text-base font-medium rounded-md transition-colors duration-200">
                        Video Production
                    </a>
                    <a href="{{ route('Portfolio') }}" class="text-gray-900 hover:text-orange-600 hover:bg-gray-50 block px-3 py-2 text-base font-medium rounded-md transition-colors duration-200">
                        Portfolio
                    </a>
                    <a href="{{ route('case-studies') }}" class="text-gray-900 hover:text-orange-600 hover:bg-gray-50 block px-3 py-2 text-base font-medium rounded-md transition-colors duration-200">
                        Case Studies
                    </a>
                    <a href="{{ route('Resources') }}" class="text-gray-900 hover:text-orange-600 hover:bg-gray-50 block px-3 py-2 text-base font-medium rounded-md transition-colors duration-200">
                        Resources
                    </a>
                    <a href="{{ route('about') }}" class="text-gray-900 hover:text-orange-600 hover:bg-gray-50 block px-3 py-2 text-base font-medium rounded-md transition-colors duration-200">
                        About
                    </a>
                    <a href="{{ route('contact') }}" class="text-gray-900 hover:text-orange-600 hover:bg-gray-50 block px-3 py-2 text-base font-medium rounded-md transition-colors duration-200">
                        Contact
                    </a>
                 
                    <div class="pt-4">
                        <a href="{{ route('contact') }}" class="bg-orange-600 text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-orange-700 transition-colors duration-200 text-center">
                            Get a Quote
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-50 border-t border-gray-200">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="col-span-1 md:col-span-2">
                    <div class="mb-6">
                        <img src="{{ asset('images/logo.png') }}" alt="SuGanta Internationals" class="h-16 w-auto">
                    </div>
                    <p class="text-gray-600 mb-6 max-w-md leading-relaxed">
                       SuGanta Internationals – Your trusted partner for top-tier video production, advertisement shoots, studio rentals, and podcast services across the globe. With a passion for creativity and quality, we bring your brand's vision to life through compelling storytelling. Our global reach and expertise ensure your content stands out, no matter where you are.
                    </p>
                   
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Links</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-900 transition-colors">Home</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-600 hover:text-gray-900 transition-colors">About</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-600 hover:text-gray-900 transition-colors">Services</a></li>
                        <li><a href="{{ route('work') }}" class="text-gray-600 hover:text-gray-900 transition-colors">Work</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-600 hover:text-gray-900 transition-colors">Contact</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Get in Touch</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-gray-400"></i>
                            {{ config('company.contact.email') }}
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-3 text-gray-400"></i>
                            {{ config('company.contact.phone') }}
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-3 text-gray-400"></i>
                            {{ config('company.contact.address') }}
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-200 mt-12 pt-8 text-center">
                <p class="text-gray-600">&copy; {{ date('Y') }} SuGanta Internationals. All rights reserved.</p>
            </div>
        </div>
    </footer>

    @stack('scripts')

    <script>
        // Enhanced JavaScript for mobile navigation
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu toggle with improved UX
            const mobileMenuButton = document.querySelector('.mobile-menu-button');
            const mobileMenu = document.querySelector('.mobile-menu');
            const hamburgerIcon = mobileMenuButton?.querySelector('svg:first-child');
            const closeIcon = mobileMenuButton?.querySelector('svg:last-child');

            if (mobileMenuButton && mobileMenu) {
                // Function to show mobile menu
                function showMobileMenu() {
                    mobileMenu.classList.remove('hidden');
                    hamburgerIcon?.classList.add('hidden');
                    closeIcon?.classList.remove('hidden');
                    mobileMenuButton.setAttribute('aria-expanded', 'true');
                    document.body.classList.add('mobile-menu-open'); // Prevent background scrolling
                }

                // Function to hide mobile menu
                function hideMobileMenu() {
                    mobileMenu.classList.add('hidden');
                    hamburgerIcon?.classList.remove('hidden');
                    closeIcon?.classList.add('hidden');
                    mobileMenuButton.setAttribute('aria-expanded', 'false');
                    document.body.classList.remove('mobile-menu-open'); // Restore scrolling
                }

                // Toggle mobile menu
                mobileMenuButton.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const isHidden = mobileMenu.classList.contains('hidden');
                    
                    if (isHidden) {
                        showMobileMenu();
                    } else {
                        hideMobileMenu();
                    }
                });

                // Close mobile menu when clicking outside
                document.addEventListener('click', function(event) {
                    if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                        hideMobileMenu();
                    }
                });

                // Close mobile menu on escape key
                document.addEventListener('keydown', function(event) {
                    if (event.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
                        hideMobileMenu();
                    }
                });

                // Close mobile menu when clicking on menu links
                const mobileMenuLinks = mobileMenu.querySelectorAll('a');
                mobileMenuLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        hideMobileMenu();
                    });
                });

                // Handle window resize
                window.addEventListener('resize', function() {
                    if (window.innerWidth >= 768) { // md breakpoint
                        hideMobileMenu();
                    }
                });
            }

            // Video background handling
            const video = document.querySelector('video');
            if (video) {
                // Smooth fade-in when video loads
                video.addEventListener('loadeddata', function() {
                    this.classList.add('loaded');
                    console.log('Video loaded successfully');
                });

                // Ensure video plays on mobile devices
                video.addEventListener('canplay', function() {
                    this.play().catch(function(error) {
                        console.log('Video autoplay failed:', error);
                        // Fallback: show a play button or handle gracefully
                    });
                });

                // Handle video loading errors
                video.addEventListener('error', function() {
                    console.log('Video failed to load');
                    // Show fallback background
                    const heroSection = document.querySelector('section');
                    if (heroSection) {
                        heroSection.classList.add('no-video-support');
                    }
                });

                // Pause video when page is not visible (performance optimization)
                document.addEventListener('visibilitychange', function() {
                    if (document.hidden) {
                        video.pause();
                    } else {
                        video.play().catch(function(error) {
                            console.log('Video resume failed:', error);
                        });
                    }
                });

                // Optimize video for mobile devices
                if (window.innerWidth <= 768) {
                    video.style.objectFit = 'cover';
                    // Reduce video quality on mobile for better performance
                    video.setAttribute('preload', 'metadata');
                } else {
                    video.setAttribute('preload', 'auto');
                }

                // Add intersection observer for video performance
                const videoObserver = new IntersectionObserver(function(entries) {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            video.play().catch(function(error) {
                                console.log('Video play failed:', error);
                            });
                        } else {
                            video.pause();
                        }
                    });
                }, { threshold: 0.5 });

                videoObserver.observe(video);
            }

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
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

            // Add scroll effect to navbar
            let lastScrollTop = 0;
            const navbar = document.querySelector('nav');
            
            window.addEventListener('scroll', function() {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                
                if (scrollTop > lastScrollTop && scrollTop > 100) {
                    // Scrolling down
                    navbar.style.transform = 'translateY(-100%)';
                } else {
                    // Scrolling up
                    navbar.style.transform = 'translateY(0)';
                }
                
                lastScrollTop = scrollTop;
            });
        });
    </script>
</body>

</html>