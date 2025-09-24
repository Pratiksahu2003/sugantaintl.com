@extends('layouts.app')

@section('title', 'Portfolio - SpacePepper Digital Solutions')
@section('description', 'Explore our portfolio of successful web development, mobile app, and digital marketing projects. See how we help businesses grow.')

@section('content')
<!-- Hero Section -->
<section class="py-20 bg-gradient-to-br from-blue-50 via-white to-purple-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Our <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Portfolio</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Discover our latest projects and see how we've helped businesses transform their digital presence and achieve remarkable results.
            </p>
        </div>
        
        <!-- Filter Buttons -->
        <div class="flex flex-wrap justify-center gap-4 mb-12">
            <button class="filter-btn active bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-3 rounded-full font-semibold transition-all duration-300" data-filter="all">
                All Projects
            </button>
            <button class="filter-btn bg-white text-gray-700 border border-gray-300 px-6 py-3 rounded-full font-semibold hover:border-blue-600 hover:text-blue-600 transition-all duration-300" data-filter="web">
                Web Development
            </button>
            <button class="filter-btn bg-white text-gray-700 border border-gray-300 px-6 py-3 rounded-full font-semibold hover:border-blue-600 hover:text-blue-600 transition-all duration-300" data-filter="mobile">
                Mobile Development
            </button>
        </div>
    </div>
</section>

<!-- Portfolio Grid -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="portfolio-grid">
            @foreach($projects as $project)
            <div class="portfolio-item group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 {{ strtolower(str_replace(' ', '-', $project['category'])) }}" data-category="{{ strtolower(str_replace(' ', '-', $project['category'])) }}">
                <div class="relative overflow-hidden">
                    <img src="{{ $project['image'] }}" alt="{{ $project['title'] }}" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute bottom-4 left-4 right-4 transform translate-y-4 group-hover:translate-y-0 opacity-0 group-hover:opacity-100 transition-all duration-300">
                        <div class="flex space-x-2">
                            <a href="#" class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center text-white hover:bg-white/30 transition-colors">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center text-white hover:bg-white/30 transition-colors">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-sm font-semibold {{ $project['category'] == 'Web Development' ? 'text-blue-600' : 'text-purple-600' }}">
                            {{ $project['category'] }}
                        </span>
                        <div class="flex space-x-1">
                            @foreach($project['technologies'] as $tech)
                            <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">{{ $tech }}</span>
                            @endforeach
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">{{ $project['title'] }}</h3>
                    <p class="text-gray-600 mb-4">{{ $project['description'] }}</p>
                    <a href="#" class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-700 transition-colors">
                        View Project
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Load More Button -->
        <div class="text-center mt-12">
            <button class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                Load More Projects
            </button>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Project Statistics</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Numbers that showcase our commitment to delivering exceptional results for our clients.
            </p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-project-diagram text-white text-2xl"></i>
                </div>
                <div class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">150+</div>
                <div class="text-gray-600">Projects Completed</div>
            </div>
            
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-r from-purple-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <div class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">120+</div>
                <div class="text-gray-600">Happy Clients</div>
            </div>
            
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-r from-pink-500 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-award text-white text-2xl"></i>
                </div>
                <div class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">25+</div>
                <div class="text-gray-600">Awards Won</div>
            </div>
            
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-clock text-white text-2xl"></i>
                </div>
                <div class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">5+</div>
                <div class="text-gray-600">Years Experience</div>
            </div>
        </div>
    </div>
</section>

<!-- Technologies Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Technologies We Use</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We work with the latest technologies and frameworks to deliver cutting-edge solutions.
            </p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">
            <!-- Frontend -->
            <div class="text-center group">
                <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-blue-100 transition-colors">
                    <i class="fab fa-react text-2xl text-blue-500"></i>
                </div>
                <h4 class="font-semibold text-gray-900">React</h4>
            </div>
            
            <div class="text-center group">
                <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-green-100 transition-colors">
                    <i class="fab fa-vuejs text-2xl text-green-500"></i>
                </div>
                <h4 class="font-semibold text-gray-900">Vue.js</h4>
            </div>
            
            <div class="text-center group">
                <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-red-100 transition-colors">
                    <i class="fab fa-laravel text-2xl text-red-500"></i>
                </div>
                <h4 class="font-semibold text-gray-900">Laravel</h4>
            </div>
            
            <div class="text-center group">
                <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-green-100 transition-colors">
                    <i class="fab fa-node-js text-2xl text-green-600"></i>
                </div>
                <h4 class="font-semibold text-gray-900">Node.js</h4>
            </div>
            
            <div class="text-center group">
                <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-blue-100 transition-colors">
                    <i class="fab fa-python text-2xl text-blue-600"></i>
                </div>
                <h4 class="font-semibold text-gray-900">Python</h4>
            </div>
            
            <div class="text-center group">
                <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-purple-100 transition-colors">
                    <i class="fab fa-php text-2xl text-purple-600"></i>
                </div>
                <h4 class="font-semibold text-gray-900">PHP</h4>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">What Our Clients Say</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Don't just take our word for it. Here's what our clients have to say about working with us.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-white p-8 rounded-2xl shadow-lg">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <p class="text-gray-600 mb-6">
                    "SpacePepper delivered an exceptional e-commerce platform that exceeded our expectations. The team was professional, responsive, and delivered on time."
                </p>
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=50&h=50&fit=crop&crop=face" alt="Client" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h4 class="font-semibold text-gray-900">John Anderson</h4>
                        <p class="text-gray-600 text-sm">CEO, TechCorp</p>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial 2 -->
            <div class="bg-white p-8 rounded-2xl shadow-lg">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <p class="text-gray-600 mb-6">
                    "The mobile app they developed for us has been a game-changer. User engagement increased by 300% and our revenue grew significantly."
                </p>
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=50&h=50&fit=crop&crop=face" alt="Client" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h4 class="font-semibold text-gray-900">Sarah Wilson</h4>
                        <p class="text-gray-600 text-sm">Founder, StartupXYZ</p>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial 3 -->
            <div class="bg-white p-8 rounded-2xl shadow-lg">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <p class="text-gray-600 mb-6">
                    "Their digital marketing strategy helped us reach new customers and increase our online presence. Highly recommended!"
                </p>
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=50&h=50&fit=crop&crop=face" alt="Client" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h4 class="font-semibold text-gray-900">Mike Chen</h4>
                        <p class="text-gray-600 text-sm">Marketing Director, RetailCo</p>
                    </div>
                </div>
            </div>
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
            Let's create something amazing together. Contact us today to discuss your project requirements.
        </p>
        <a href="{{ route('contact') }}" class="bg-white text-blue-600 px-8 py-4 rounded-full text-lg font-semibold hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            Start Your Project
        </a>
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
                    b.classList.remove('active', 'bg-gradient-to-r', 'from-blue-600', 'to-purple-600', 'text-white');
                    b.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-300');
                });
                
                this.classList.add('active', 'bg-gradient-to-r', 'from-blue-600', 'to-purple-600', 'text-white');
                this.classList.remove('bg-white', 'text-gray-700', 'border', 'border-gray-300');
                
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