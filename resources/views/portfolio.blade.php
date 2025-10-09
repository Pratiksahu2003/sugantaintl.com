@extends('layouts.app')

@section('title', 'Portfolio - Star JD Video Production')
@section('description', 'Explore our portfolio of professional video production projects including corporate videos, commercials, event coverage, and more.')

@section('content')
<!-- Hero Section -->
<section class="py-20 bg-gray-900">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center">
            <h1 class="text-5xl md:text-6xl font-bold text-white mb-6 leading-tight">
                Our <span class="text-green-400">Our Works</span>
            </h1>
            <p class="text-xl text-gray-300 mb-12 max-w-4xl mx-auto leading-relaxed">
                Discover our latest video production projects and see how we've helped businesses create compelling visual content that drives results.
            </p>
        </div>
    </div>
</section>

<!-- Filter Section -->
<section class="py-12 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="flex flex-wrap justify-center gap-4">
            <button class="filter-btn active bg-gray-900 text-white px-6 py-3 rounded text-sm font-medium transition-colors duration-200" data-filter="all">
                All Projects
            </button>
            <button class="filter-btn bg-gray-100 text-gray-700 px-6 py-3 rounded text-sm font-medium hover:bg-gray-200 transition-colors duration-200" data-filter="corporate">
                Corporate Videos
            </button>
            <button class="filter-btn bg-gray-100 text-gray-700 px-6 py-3 rounded text-sm font-medium hover:bg-gray-200 transition-colors duration-200" data-filter="commercial">
                Commercial Ads
            </button>
            <button class="filter-btn bg-gray-100 text-gray-700 px-6 py-3 rounded text-sm font-medium hover:bg-gray-200 transition-colors duration-200" data-filter="event">
                Event Coverage
            </button>
            <button class="filter-btn bg-gray-100 text-gray-700 px-6 py-3 rounded text-sm font-medium hover:bg-gray-200 transition-colors duration-200" data-filter="drone">
                Drone Videos
            </button>
        </div>
    </div>
</section>

<!-- Portfolio Grid -->
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="portfolio-grid">
            <!-- Project 1 - Corporate Video -->
            <div class="portfolio-item bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 corporate" data-category="corporate">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=500&h=300&fit=crop" alt="Corporate Video Production" class="w-full h-48 object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-30 transition-all duration-300 flex items-center justify-center">
                        <button class="play-btn opacity-0 hover:opacity-100 transition-opacity duration-300 bg-white bg-opacity-90 rounded-full w-16 h-16 flex items-center justify-center">
                            <i class="fas fa-play text-gray-900 text-xl ml-1"></i>
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-sm font-medium text-green-600 bg-green-100 px-3 py-1 rounded-full">Corporate Video</span>
                        <span class="text-sm text-gray-500">2024</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">TechCorp Company Profile</h3>
                    <p class="text-gray-600 mb-4">Professional corporate video showcasing company culture, values, and achievements for internal and external communications.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">Duration: 3 minutes</span>
                        <a href="#" class="text-gray-900 hover:text-green-600 font-medium transition-colors">View Project →</a>
                    </div>
                </div>
            </div>

            <!-- Project 2 - Commercial Ad -->
            <div class="portfolio-item bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 commercial" data-category="commercial">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1573164713714-d95e436ab8d6?w=500&h=300&fit=crop" alt="Commercial Advertisement" class="w-full h-48 object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-30 transition-all duration-300 flex items-center justify-center">
                        <button class="play-btn opacity-0 hover:opacity-100 transition-opacity duration-300 bg-white bg-opacity-90 rounded-full w-16 h-16 flex items-center justify-center">
                            <i class="fas fa-play text-gray-900 text-xl ml-1"></i>
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-sm font-medium text-blue-600 bg-blue-100 px-3 py-1 rounded-full">Commercial Ad</span>
                        <span class="text-sm text-gray-500">2024</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Fashion Brand Campaign</h3>
                    <p class="text-gray-600 mb-4">Dynamic commercial advertisement featuring lifestyle shots, product showcases, and brand storytelling for social media and TV.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">Duration: 30 seconds</span>
                        <a href="#" class="text-gray-900 hover:text-green-600 font-medium transition-colors">View Project →</a>
                    </div>
                </div>
            </div>

            <!-- Project 3 - Event Coverage -->
            <div class="portfolio-item bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 event" data-category="event">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?w=500&h=300&fit=crop" alt="Event Coverage" class="w-full h-48 object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-30 transition-all duration-300 flex items-center justify-center">
                        <button class="play-btn opacity-0 hover:opacity-100 transition-opacity duration-300 bg-white bg-opacity-90 rounded-full w-16 h-16 flex items-center justify-center">
                            <i class="fas fa-play text-gray-900 text-xl ml-1"></i>
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-sm font-medium text-purple-600 bg-purple-100 px-3 py-1 rounded-full">Event Coverage</span>
                        <span class="text-sm text-gray-500">2024</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Annual Conference Highlights</h3>
                    <p class="text-gray-600 mb-4">Comprehensive event coverage including keynote speeches, networking sessions, and behind-the-scenes moments.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">Duration: 5 minutes</span>
                        <a href="#" class="text-gray-900 hover:text-green-600 font-medium transition-colors">View Project →</a>
                    </div>
                </div>
            </div>

            <!-- Project 4 - Drone Video -->
            <div class="portfolio-item bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 drone" data-category="drone">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=500&h=300&fit=crop" alt="Drone Video Production" class="w-full h-48 object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-30 transition-all duration-300 flex items-center justify-center">
                        <button class="play-btn opacity-0 hover:opacity-100 transition-opacity duration-300 bg-white bg-opacity-90 rounded-full w-16 h-16 flex items-center justify-center">
                            <i class="fas fa-play text-gray-900 text-xl ml-1"></i>
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-sm font-medium text-orange-600 bg-orange-100 px-3 py-1 rounded-full">Drone Video</span>
                        <span class="text-sm text-gray-500">2024</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Real Estate Aerial Tour</h3>
                    <p class="text-gray-600 mb-4">Stunning aerial footage showcasing luxury properties with cinematic drone movements and professional color grading.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">Duration: 2 minutes</span>
                        <a href="#" class="text-gray-900 hover:text-green-600 font-medium transition-colors">View Project →</a>
                    </div>
                </div>
            </div>

            <!-- Project 5 - Corporate Training -->
            <div class="portfolio-item bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 corporate" data-category="corporate">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=500&h=300&fit=crop" alt="Training Video" class="w-full h-48 object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-30 transition-all duration-300 flex items-center justify-center">
                        <button class="play-btn opacity-0 hover:opacity-100 transition-opacity duration-300 bg-white bg-opacity-90 rounded-full w-16 h-16 flex items-center justify-center">
                            <i class="fas fa-play text-gray-900 text-xl ml-1"></i>
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-sm font-medium text-green-600 bg-green-100 px-3 py-1 rounded-full">Corporate Video</span>
                        <span class="text-sm text-gray-500">2024</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Employee Training Series</h3>
                    <p class="text-gray-600 mb-4">Interactive training videos with animations, graphics, and professional narration for corporate learning programs.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">Duration: 8 episodes</span>
                        <a href="#" class="text-gray-900 hover:text-green-600 font-medium transition-colors">View Project →</a>
                    </div>
                </div>
            </div>

            <!-- Project 6 - Product Demo -->
            <div class="portfolio-item bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 commercial" data-category="commercial">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=500&h=300&fit=crop" alt="Product Demo Video" class="w-full h-48 object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-30 transition-all duration-300 flex items-center justify-center">
                        <button class="play-btn opacity-0 hover:opacity-100 transition-opacity duration-300 bg-white bg-opacity-90 rounded-full w-16 h-16 flex items-center justify-center">
                            <i class="fas fa-play text-gray-900 text-xl ml-1"></i>
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-sm font-medium text-blue-600 bg-blue-100 px-3 py-1 rounded-full">Commercial Ad</span>
                        <span class="text-sm text-gray-500">2024</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Tech Product Launch</h3>
                    <p class="text-gray-600 mb-4">High-energy product demonstration video featuring close-ups, slow-motion effects, and dynamic transitions.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">Duration: 1 minute</span>
                        <a href="#" class="text-gray-900 hover:text-green-600 font-medium transition-colors">View Project →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Achievements</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Numbers that reflect our commitment to delivering exceptional video production services.
            </p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div class="space-y-2">
                <div class="text-4xl md:text-5xl font-bold text-gray-900">{{ config('company.statistics.total_videos') }}</div>
                <div class="text-sm md:text-base text-gray-600 font-medium">Videos Produced</div>
            </div>
            <div class="space-y-2">
                <div class="text-4xl md:text-5xl font-bold text-gray-900">{{ config('company.statistics.clients') }}</div>
                <div class="text-sm md:text-base text-gray-600 font-medium">Happy Clients</div>
            </div>
            <div class="space-y-2">
                <div class="text-4xl md:text-5xl font-bold text-gray-900">{{ config('company.statistics.cities') }}</div>
                <div class="text-sm md:text-base text-gray-600 font-medium">Cities Covered</div>
            </div>
            <div class="space-y-2">
                <div class="text-4xl md:text-5xl font-bold text-gray-900">{{ config('company.statistics.languages') }}</div>
                <div class="text-sm md:text-base text-gray-600 font-medium">Languages</div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Video Production Services</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                From concept to completion, we offer comprehensive video production solutions for every need.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-video text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Corporate Videos</h3>
                <p class="text-gray-600">Professional videos for internal communications, training, and brand storytelling.</p>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-tv text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Commercial Ads</h3>
                <p class="text-gray-600">Eye-catching advertisements for TV, social media, and digital platforms.</p>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-calendar-alt text-purple-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Event Coverage</h3>
                <p class="text-gray-600">Complete event documentation from conferences to product launches.</p>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-drone text-orange-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Drone Videos</h3>
                <p class="text-gray-600">Stunning aerial footage for real estate, tourism, and marketing purposes.</p>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-microphone text-red-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Podcast Production</h3>
                <p class="text-gray-600">Professional podcast recording and post-production services.</p>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-building text-indigo-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Studio Rental</h3>
                <p class="text-gray-600">State-of-the-art studio spaces for your video production needs.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gray-900">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
            Ready to Create Your Next Video?
        </h2>
        <p class="text-xl text-gray-300 mb-12 max-w-3xl mx-auto">
            Let's discuss your project and create something amazing together. Contact us today for a free consultation.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="bg-white text-gray-900 px-8 py-4 rounded text-lg font-medium hover:bg-gray-100 transition-all duration-200">
                Get Started Today
            </a>
            <a href="tel:{{ config('company.contact.phone') }}" class="border-2 border-white text-white px-8 py-4 rounded text-lg font-medium hover:bg-white hover:text-gray-900 transition-all duration-200">
                Call {{ config('company.contact.phone') }}
            </a>
        </div>
    </div>
</section>

@push('scripts')
<script>
    // Portfolio filtering
    document.addEventListener('DOMContentLoaded', function() {
        const filterBtns = document.querySelectorAll('.filter-btn');
        const portfolioItems = document.querySelectorAll('.portfolio-item');
        
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const filter = this.getAttribute('data-filter');
                
                // Update active button
                filterBtns.forEach(b => {
                    b.classList.remove('active', 'bg-gray-900', 'text-white');
                    b.classList.add('bg-gray-100', 'text-gray-700');
                });
                
                this.classList.add('active', 'bg-gray-900', 'text-white');
                this.classList.remove('bg-gray-100', 'text-gray-700');
                
                // Filter portfolio items
                portfolioItems.forEach(item => {
                    if (filter === 'all' || item.getAttribute('data-category') === filter) {
                        item.style.display = 'block';
                        setTimeout(() => {
                            item.style.opacity = '1';
                            item.style.transform = 'scale(1)';
                        }, 100);
                    } else {
                        item.style.opacity = '0';
                        item.style.transform = 'scale(0.8)';
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