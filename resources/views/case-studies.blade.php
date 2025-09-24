@extends('layouts.app')

@section('title', 'Case Studies - SuGanta Internationals Video Production')
@section('description', 'Explore our successful video production case studies across various industries. See how we helped businesses achieve their goals through professional video content.')

@section('content')
<!-- Hero Section -->
<section class="py-20 bg-gray-900">
    <div class="max-w-6xl mx-auto py-20">
        <div class="text-center">
            <h1 class="text-5xl md:text-6xl font-bold text-white mb-6 leading-tight">
                Our <span class="text-green-400">Case Studies</span>
            </h1>
            <p class="text-xl text-gray-300 mb-12 max-w-4xl mx-auto leading-relaxed">
                Discover how we've helped businesses across various industries achieve their goals through professional video production. Real projects, real results.
            </p>
        </div>
    </div>
</section>

<!-- Filter Section -->
<section class="py-10 bg-white mb-10">
    <div class="max-w-6xl mx-auto px-6">
        <div class="flex flex-wrap justify-center gap-4">
            <button class="filter-btn active bg-gray-900 text-white px-6 py-3 rounded text-sm font-medium transition-colors duration-200" data-filter="all">
                All Industries
            </button>
            <button class="filter-btn bg-gray-100 text-gray-700 px-6 py-3 rounded text-sm font-medium hover:bg-gray-200 transition-colors duration-200" data-filter="technology">
                Technology
            </button>
            <button class="filter-btn bg-gray-100 text-gray-700 px-6 py-3 rounded text-sm font-medium hover:bg-gray-200 transition-colors duration-200" data-filter="fashion">
                Fashion & Retail
            </button>
            <button class="filter-btn bg-gray-100 text-gray-700 px-6 py-3 rounded text-sm font-medium hover:bg-gray-200 transition-colors duration-200" data-filter="healthcare">
                Healthcare
            </button>
            <button class="filter-btn bg-gray-100 text-gray-700 px-6 py-3 rounded text-sm font-medium hover:bg-gray-200 transition-colors duration-200" data-filter="real-estate">
                Real Estate
            </button>
            <button class="filter-btn bg-gray-100 text-gray-700 px-6 py-3 rounded text-sm font-medium hover:bg-gray-200 transition-colors duration-200" data-filter="education">
                Education
            </button>
        </div>
    </div>
</section>

<!-- Case Studies Grid -->
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-8" id="case-studies-grid">
            @foreach($caseStudies as $caseStudy)
            <div class="case-study-item bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 {{ strtolower(str_replace(' ', '-', $caseStudy['industry'])) }}" data-industry="{{ strtolower(str_replace(' ', '-', $caseStudy['industry'])) }}">
                <div class="relative">
                    <img src="{{ $caseStudy['image'] }}" alt="{{ $caseStudy['title'] }}" class="w-full h-48 object-cover">
                    <div class="absolute top-4 left-4">
                        <span class="bg-green-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                            {{ $caseStudy['project_type'] }}
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-sm font-medium text-gray-500">{{ $caseStudy['industry'] }}</span>
                        <span class="text-sm text-gray-500">{{ $caseStudy['duration'] }}</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $caseStudy['title'] }}</h3>
                    <p class="text-sm text-gray-600 mb-4 font-medium">Client: {{ $caseStudy['client'] }}</p>
                    
                    <div class="mb-4">
                        <h4 class="text-sm font-semibold text-gray-900 mb-2">Challenge:</h4>
                        <p class="text-sm text-gray-600 mb-3">{{ Str::limit($caseStudy['challenge'], 120) }}</p>
                    </div>
                    
                    <div class="mb-4">
                        <h4 class="text-sm font-semibold text-gray-900 mb-2">Results:</h4>
                        <p class="text-sm text-gray-600 mb-3">{{ Str::limit($caseStudy['results'], 120) }}</p>
                    </div>
                    
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach($caseStudy['tags'] as $tag)
                        <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">{{ $tag }}</span>
                        @endforeach
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">{{ $caseStudy['videos_produced'] }} videos produced</span>
                        <button class="text-gray-900 hover:text-green-600 font-medium transition-colors text-sm" onclick="openCaseStudyModal({{ $caseStudy['id'] }})">
                            View Details →
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Impact</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Numbers that showcase our commitment to delivering exceptional results for our clients.
            </p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div class="space-y-2">
                <div class="text-4xl md:text-5xl font-bold text-gray-900">15+</div>
                <div class="text-sm md:text-base text-gray-600 font-medium">Case Studies</div>
            </div>
            <div class="space-y-2">
                <div class="text-4xl md:text-5xl font-bold text-gray-900">{{ config('company.statistics.clients') }}</div>
                <div class="text-sm md:text-base text-gray-600 font-medium">Happy Clients</div>
            </div>
            <div class="space-y-2">
                <div class="text-4xl md:text-5xl font-bold text-gray-900">250+</div>
                <div class="text-sm md:text-base text-gray-600 font-medium">Videos Produced</div>
            </div>
            <div class="space-y-2">
                <div class="text-4xl md:text-5xl font-bold text-gray-900">12</div>
                <div class="text-sm md:text-base text-gray-600 font-medium">Industries</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gray-900">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
            Ready to Create Your Success Story?
        </h2>
        <p class="text-xl text-gray-300 mb-12 max-w-3xl mx-auto">
            Let's discuss your project and create a case study that showcases your success. Contact us today for a free consultation.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="bg-white text-gray-900 px-8 py-4 rounded text-lg font-medium hover:bg-gray-100 transition-all duration-200">
                Start Your Project
            </a>
            <a href="tel:{{ config('company.contact.phone') }}" class="border-2 border-white text-white px-8 py-4 rounded text-lg font-medium hover:bg-white hover:text-gray-900 transition-all duration-200">
                Call {{ config('company.contact.phone') }}
            </a>
        </div>
    </div>
</section>

<!-- Case Study Modal -->
<div id="caseStudyModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg max-w-4xl w-full max-h-[90vh] overflow-y-auto">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 id="modalTitle" class="text-2xl font-bold text-gray-900"></h3>
                <button onclick="closeCaseStudyModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            
            <div id="modalContent" class="space-y-6">
                <!-- Content will be populated by JavaScript -->
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    const caseStudies = @json($caseStudies);
    
    // Filter functionality
    document.addEventListener('DOMContentLoaded', function() {
        const filterBtns = document.querySelectorAll('.filter-btn');
        const caseStudyItems = document.querySelectorAll('.case-study-item');
        
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
                
                // Filter case study items
                caseStudyItems.forEach(item => {
                    if (filter === 'all' || item.getAttribute('data-industry') === filter) {
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
    
    function openCaseStudyModal(caseStudyId) {
        const caseStudy = caseStudies.find(cs => cs.id === caseStudyId);
        if (!caseStudy) return;
        
        document.getElementById('modalTitle').textContent = caseStudy.title;
        
        const modalContent = document.getElementById('modalContent');
        modalContent.innerHTML = `
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div>
                    <img src="${caseStudy.image}" alt="${caseStudy.title}" class="w-full h-64 object-cover rounded-lg">
                </div>
                <div class="space-y-4">
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-2">Client:</h4>
                        <p class="text-gray-600">${caseStudy.client}</p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-2">Industry:</h4>
                        <p class="text-gray-600">${caseStudy.industry}</p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-2">Project Type:</h4>
                        <p class="text-gray-600">${caseStudy.project_type}</p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-2">Duration:</h4>
                        <p class="text-gray-600">${caseStudy.duration}</p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-2">Videos Produced:</h4>
                        <p class="text-gray-600">${caseStudy.videos_produced}</p>
                    </div>
                </div>
            </div>
            
            <div class="space-y-6">
                <div>
                    <h4 class="text-lg font-semibold text-gray-900 mb-3">Challenge</h4>
                    <p class="text-gray-600">${caseStudy.challenge}</p>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold text-gray-900 mb-3">Solution</h4>
                    <p class="text-gray-600">${caseStudy.solution}</p>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold text-gray-900 mb-3">Results</h4>
                    <p class="text-gray-600">${caseStudy.results}</p>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold text-gray-900 mb-3">Tags</h4>
                    <div class="flex flex-wrap gap-2">
                        ${caseStudy.tags.map(tag => `<span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-sm">${tag}</span>`).join('')}
                    </div>
                </div>
                
                <div class="text-center">
                    <iframe width="100%" height="315" src="${caseStudy.video_url}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        `;
        
        document.getElementById('caseStudyModal').classList.remove('hidden');
    }
    
    function closeCaseStudyModal() {
        document.getElementById('caseStudyModal').classList.add('hidden');
    }
    
    // Close modal when clicking outside
    document.getElementById('caseStudyModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeCaseStudyModal();
        }
    });
</script>
@endpush
@endsection
