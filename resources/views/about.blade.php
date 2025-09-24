@extends('layouts.app')

@section('title', 'About Us - SuGanta Internationals Video Production')
@section('description', 'Learn about SuGanta Internationals team, our story, and how we help businesses with professional video production, studio rentals, and podcast services.')

@section('content')
<!-- Hero Section -->
<section class="pt-20 pb-16 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-5xl md:text-7xl font-bold text-gray-900 mb-8 leading-tight">
                About
                <br>
                <span class="text-gray-400">SuGanta Internationals</span>
            </h1>
            <p class="text-xl text-gray-600 mb-12 max-w-4xl mx-auto leading-relaxed">
                At SuGanta Internationals, we are redefining the landscape of video production in India. Established with a vision to deliver high-quality, scalable, and rapid video content solutions, we empower brands to tell their stories with impact and efficiency.
            </p>
        </div>
    </div>
</section>

<!-- Who We Are -->
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-8">
                    Who
                    <br>
                    We Are
                </h2>
                <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                    We are a dynamic team of creative professionals, strategists, and technologists committed to transforming your ideas into compelling visual narratives. Leveraging cutting-edge technology and a vast network of skilled creators, we produce a diverse range of video content tailored to meet the unique needs of our clients.
                </p>
                <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-gray-900">
                    <p class="text-gray-700 font-medium italic">
                        "We believe in delivering excellence with speed. Our streamlined processes ensure that what typically takes months is accomplished in weeks, without compromising on quality."
                    </p>
                </div>
            </div>
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=600&h=400&fit=crop" alt="Our Team" class="rounded-2xl shadow-2xl">
                <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-gray-900 rounded-2xl flex items-center justify-center">
                    <i class="fas fa-video text-white text-2xl"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Expertise -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Our Expertise
            </h2>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto">
                From corporate videos and commercial advertisements to event coverage and podcast production, we offer end-to-end video solutions that resonate with audiences across various platforms.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Corporate Video Production -->
            <div class="group bg-gradient-to-br from-gray-50 to-white p-8 rounded-2xl border border-gray-100 hover:shadow-xl transition-all duration-300">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-gray-900 rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-building text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Corporate Video Production</h3>
                </div>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Showcasing your brand's ethos and values through professional corporate videos that communicate your message effectively to stakeholders and customers.
                </p>
                <div class="flex items-center text-gray-500 text-sm">
                    <i class="fas fa-check-circle text-green-500 mr-2"></i>
                    <span>Brand storytelling & corporate communications</span>
                </div>
            </div>
            
            <!-- Commercial Advertisements -->
            <div class="group bg-gradient-to-br from-gray-50 to-white p-8 rounded-2xl border border-gray-100 hover:shadow-xl transition-all duration-300">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-gray-900 rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-ad text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Commercial Advertisements</h3>
                </div>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Crafting engaging ads that drive consumer action and create memorable brand experiences across all digital and traditional platforms.
                </p>
                <div class="flex items-center text-gray-500 text-sm">
                    <i class="fas fa-check-circle text-green-500 mr-2"></i>
                    <span>Multi-platform ad campaigns & brand awareness</span>
                </div>
            </div>
            
            <!-- Event Coverage -->
            <div class="group bg-gradient-to-br from-gray-50 to-white p-8 rounded-2xl border border-gray-100 hover:shadow-xl transition-all duration-300">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-gray-900 rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-calendar-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Event Coverage</h3>
                </div>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Capturing the essence of your events with precision, from corporate gatherings to product launches and special occasions.
                </p>
                <div class="flex items-center text-gray-500 text-sm">
                    <i class="fas fa-check-circle text-green-500 mr-2"></i>
                    <span>Live events & corporate gatherings</span>
                </div>
            </div>
            
            <!-- Podcast Production -->
            <div class="group bg-gradient-to-br from-gray-50 to-white p-8 rounded-2xl border border-gray-100 hover:shadow-xl transition-all duration-300">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-gray-900 rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-microphone text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Podcast Production</h3>
                </div>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Producing high-quality audio content for your brand, including podcast recording, editing, and distribution across platforms.
                </p>
                <div class="flex items-center text-gray-500 text-sm">
                    <i class="fas fa-check-circle text-green-500 mr-2"></i>
                    <span>Audio content & podcast distribution</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Approach -->
<section class="py-20 bg-gray-50 relative overflow-hidden">
    <!-- Background decorative elements -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-20 left-10 w-2 h-2 bg-gray-400 rounded-full"></div>
        <div class="absolute top-32 right-20 w-1 h-1 bg-gray-400 rounded-full"></div>
        <div class="absolute bottom-40 left-1/4 w-1.5 h-1.5 bg-gray-400 rounded-full"></div>
        <div class="absolute bottom-20 right-1/3 w-2 h-2 bg-gray-400 rounded-full"></div>
        <div class="absolute top-1/2 left-1/2 w-1 h-1 bg-gray-400 rounded-full"></div>
    </div>
    
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Our Approach
            </h2>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto">
                At SuGanta Internationals, we believe in delivering excellence with speed. Our streamlined processes ensure rapid turnaround without compromising on quality.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Speed -->
            <div class="text-center group">
                <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100">
                    <div class="w-16 h-16 bg-gray-100 rounded-xl flex items-center justify-center mx-auto mb-6 group-hover:bg-gray-200 transition-colors duration-300">
                        <i class="fas fa-tachometer-alt text-gray-600 text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Speed</h3>
                    <p class="text-gray-600 leading-relaxed">
                        What typically takes months is accomplished in weeks, ensuring your content reaches your audience when it matters most.
                    </p>
                </div>
            </div>
            
            <!-- Quality -->
            <div class="text-center group">
                <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100">
                    <div class="w-16 h-16 bg-gray-100 rounded-xl flex items-center justify-center mx-auto mb-6 group-hover:bg-gray-200 transition-colors duration-300">
                        <i class="fas fa-gem text-gray-600 text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Quality</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Upholding the highest standards in every project, ensuring your brand is represented with excellence and professionalism.
                    </p>
                </div>
            </div>
            
            <!-- Collaboration -->
            <div class="text-center group">
                <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100">
                    <div class="w-16 h-16 bg-gray-100 rounded-xl flex items-center justify-center mx-auto mb-6 group-hover:bg-gray-200 transition-colors duration-300">
                        <i class="fas fa-handshake text-gray-600 text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Collaboration</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Working together to achieve shared goals, ensuring your vision and objectives are at the center of every creative decision.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Trusted by Leading Brands -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Trusted by Leading Brands
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Our commitment to quality and professionalism has earned us the trust of numerous esteemed clients across India. We take pride in being a preferred partner for brands seeking impactful video content.
            </p>
        </div>
        
        <!-- Client Logos Section -->
        <div class="grid grid-cols-2 md:grid-cols-5 gap-6 items-center opacity-60">
            <div class="bg-white h-20 rounded-lg flex items-center justify-center p-4 shadow-sm hover:opacity-100 transition-opacity duration-300">
                <a href="https://groupsairfare.com/" target="_blank" rel="noopener noreferrer" class="block w-full h-full flex items-center justify-center">
                    <img src="{{ asset('customer/Airfare_logo.png') }}" alt="GroupsAirFare.com - Group Travel Booking" class="max-h-16 max-w-32 w-auto object-contain">
                </a>
            </div>
            <div class="bg-white h-20 rounded-lg flex items-center justify-center p-4 shadow-sm hover:opacity-100 transition-opacity duration-300">
                <a href="https://farehawker.com/" target="_blank" rel="noopener noreferrer" class="block w-full h-full flex items-center justify-center">
                    <img src="{{ asset('customer/farehawker-logo.png') }}" alt="FareHawker.com - Flight Booking Platform" class="max-h-16 max-w-32 w-auto object-contain">
                </a>
            </div>
            <div class="bg-white h-20 rounded-lg flex items-center justify-center p-4 shadow-sm hover:opacity-100 transition-opacity duration-300">
                <a href="https://suganta.com/" target="_blank" rel="noopener noreferrer" class="block w-full h-full flex items-center justify-center">
                    <img src="{{ asset('customer/Su250.png') }}" alt="SuGanta.com - Professional Services" class="max-h-16 max-w-32 w-auto object-contain">
                </a>
            </div>
            <div class="bg-white h-20 rounded-lg flex items-center justify-center p-4 shadow-sm hover:opacity-100 transition-opacity duration-300">
                <a href="https://tytil.com/" target="_blank" rel="noopener noreferrer" class="block w-full h-full flex items-center justify-center">
                    <img src="{{ asset('customer/tytil-new.png') }}" alt="tyTil.com - Technology Solutions" class="max-h-16 max-w-32 w-auto object-contain">
                </a>
            </div>
            <div class="bg-white h-20 rounded-lg flex items-center justify-center p-4 shadow-sm hover:opacity-100 transition-opacity duration-300">
                <a href="https://www.bunzo.co.in/" target="_blank" rel="noopener noreferrer" class="block w-full h-full flex items-center justify-center">
                    <img src="{{ asset('customer/bunzo-logo-img.png') }}" alt="BUNZO - Fresh Food & Beverages" class="max-h-16 max-w-32 w-auto object-contain">
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Our Values -->
<section class="py-20 bg-gray-50 relative overflow-hidden">
    <!-- Background decorative elements -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-16 left-16 w-1 h-1 bg-gray-400 rounded-full"></div>
        <div class="absolute top-24 right-24 w-1.5 h-1.5 bg-gray-400 rounded-full"></div>
        <div class="absolute bottom-32 left-1/3 w-1 h-1 bg-gray-400 rounded-full"></div>
        <div class="absolute bottom-16 right-1/4 w-1.5 h-1.5 bg-gray-400 rounded-full"></div>
        <div class="absolute top-1/3 left-1/2 w-1 h-1 bg-gray-400 rounded-full"></div>
        <div class="absolute bottom-1/3 right-1/2 w-1 h-1 bg-gray-400 rounded-full"></div>
    </div>
    
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Our Values
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                These core principles guide everything we do and shape how we approach every project and client relationship.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Innovation -->
            <div class="text-center group">
                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100">
                    <div class="w-16 h-16 bg-gray-100 rounded-xl flex items-center justify-center mx-auto mb-6 group-hover:bg-gray-200 transition-colors duration-300">
                        <i class="fas fa-lightbulb text-gray-600 text-2xl"></i>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4 mt-4">Innovation</h3>
                <p class="text-gray-600 leading-relaxed">
                    Continuously evolving to stay ahead in the industry and deliver cutting-edge video solutions.
                </p>
            </div>
            
            <!-- Quality -->
            <div class="text-center group">
                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100">
                    <div class="w-16 h-16 bg-gray-100 rounded-xl flex items-center justify-center mx-auto mb-6 group-hover:bg-gray-200 transition-colors duration-300">
                        <i class="fas fa-gem text-gray-600 text-2xl"></i>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4 mt-4">Quality</h3>
                <p class="text-gray-600 leading-relaxed">
                    Upholding the highest standards in every project, ensuring excellence in every frame.
                </p>
            </div>
            
            <!-- Collaboration -->
            <div class="text-center group">
                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100">
                    <div class="w-16 h-16 bg-gray-100 rounded-xl flex items-center justify-center mx-auto mb-6 group-hover:bg-gray-200 transition-colors duration-300">
                        <i class="fas fa-handshake text-gray-600 text-2xl"></i>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4 mt-4">Collaboration</h3>
                <p class="text-gray-600 leading-relaxed">
                    Working together to achieve shared goals and bring your vision to life.
                </p>
            </div>
            
            <!-- Integrity -->
            <div class="text-center group">
                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100">
                    <div class="w-16 h-16 bg-gray-100 rounded-xl flex items-center justify-center mx-auto mb-6 group-hover:bg-gray-200 transition-colors duration-300">
                        <i class="fas fa-heart text-gray-600 text-2xl"></i>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4 mt-4">Integrity</h3>
                <p class="text-gray-600 leading-relaxed">
                    Building trust through transparency and honesty in all our interactions.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Meet the Team
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Our talented team of creative professionals, strategists, and technologists who bring expertise and passion to every project.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach(config('company.team') as $member)
            <div class="text-center group">
                <div class="relative mb-6">
                    <div class="w-32 h-32 rounded-full mx-auto flex items-center justify-center shadow-lg overflow-hidden bg-gray-200 group-hover:shadow-xl transition-all duration-300">
                        @if(isset($member['image']) && $member['image'])
                            <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover rounded-full group-hover:scale-110 transition-transform duration-300">
                        @else
                            <span class="w-16 h-16 bg-gradient-to-r from-orange-500 to-red-600 rounded-full flex items-center justify-center text-black text-3xl font-bold">
                                {{ strtoupper(substr($member['initials'], 0, 1)) }}
                            </span>
                        @endif
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $member['name'] }}</h3>
                <p class="text-gray-600 font-medium mb-4">{{ $member['position'] }}</p>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    {{ $member['description'] }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gray-900">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
            Let's Create
            <br>
            <span class="text-green-400">Together</span>
        </h2>
        <p class="text-xl text-gray-300 mb-8 max-w-4xl mx-auto">
            Whether you're looking to supplement your agency's work with raw footage or launch a comprehensive pan-India video campaign, SuGanta Internationals is here to bring your vision to life.
        </p>
        <p class="text-lg text-gray-400 mb-12 max-w-3xl mx-auto">
            Connect with us today to embark on a creative journey that elevates your brand's storytelling.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="bg-white text-gray-900 px-8 py-4 rounded-full text-lg font-medium hover:bg-gray-100 transition-all duration-300">
                Let's Talk
            </a>
            <a href="{{ route('Portfolio') }}" class="border-2 border-white text-white px-8 py-4 rounded-full text-lg font-medium hover:bg-white hover:text-gray-900 transition-all duration-300">
                View Our Work
            </a>
        </div>
    </div>
</section>
@endsection