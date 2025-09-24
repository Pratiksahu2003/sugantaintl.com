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
            <p class="text-xl text-gray-600 mb-12 max-w-3xl mx-auto leading-relaxed">
                We are a professional video production company passionate about helping businesses create compelling visual content that drives engagement and results through our comprehensive video production services.
            </p>
        </div>
    </div>
</section>

<!-- Our Story -->
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-8">
                    Our
                    <br>
                    Story
                </h2>
                <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                    Founded in 2018, IndieVisual started as a passion project by a group of designers who believed that great design could transform businesses and create meaningful connections with audiences.
                </p>
                <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                    What began as a small studio has grown into a creative powerhouse, working with startups, established brands, and everything in between. We've had the privilege of helping over 100 businesses tell their stories through beautiful, functional design.
                </p>
                <p class="text-lg text-gray-600 leading-relaxed">
                    Today, we continue to push the boundaries of creativity while staying true to our core belief: that exceptional design is not just about how something looks, but how it makes people feel and how it drives real business results.
                </p>
            </div>
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=600&h=400&fit=crop" alt="Our Team" class="rounded-2xl shadow-2xl">
                <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-gray-900 rounded-2xl flex items-center justify-center">
                    <i class="fas fa-heart text-white text-2xl"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Mission & Vision -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Mission -->
            <div class="bg-gray-50 p-12 rounded-2xl">
                <div class="w-16 h-16 bg-gray-900 rounded-full flex items-center justify-center mb-8">
                    <i class="fas fa-bullseye text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Our Mission</h3>
                <p class="text-gray-600 leading-relaxed">
                    To create beautiful, functional designs that help businesses connect with their audiences and achieve their goals. We believe that great design is a powerful tool for communication and growth.
                </p>
            </div>
            
            <!-- Vision -->
            <div class="bg-gray-50 p-12 rounded-2xl">
                <div class="w-16 h-16 bg-gray-900 rounded-full flex items-center justify-center mb-8">
                    <i class="fas fa-eye text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Our Vision</h3>
                <p class="text-gray-600 leading-relaxed">
                    To be recognized as a leading creative studio that consistently delivers exceptional design solutions. We envision a world where every business has access to beautiful, thoughtful design.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Our Values -->
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Our Values
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                These core principles guide everything we do and shape how we approach every project and client relationship.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Creativity -->
            <div class="text-center">
                <div class="w-20 h-20 bg-gray-900 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-lightbulb text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Creativity</h3>
                <p class="text-gray-600 leading-relaxed">
                    We believe in pushing creative boundaries and exploring innovative solutions that make our clients stand out from the competition.
                </p>
            </div>
            
            <!-- Quality -->
            <div class="text-center">
                <div class="w-20 h-20 bg-gray-900 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-gem text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Quality</h3>
                <p class="text-gray-600 leading-relaxed">
                    Excellence is at the heart of everything we do. We maintain the highest standards in design, execution, and client service.
                </p>
            </div>
            
            <!-- Collaboration -->
            <div class="text-center">
                <div class="w-20 h-20 bg-gray-900 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-handshake text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Collaboration</h3>
                <p class="text-gray-600 leading-relaxed">
                    We work closely with our clients as partners, ensuring their vision and goals are at the center of every design decision.
                </p>
            </div>
            
            <!-- Authenticity -->
            <div class="text-center">
                <div class="w-20 h-20 bg-gray-900 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-heart text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Authenticity</h3>
                <p class="text-gray-600 leading-relaxed">
                    We help brands find and express their authentic voice through design that truly represents who they are and what they stand for.
                </p>
            </div>
            
            <!-- Innovation -->
            <div class="text-center">
                <div class="w-20 h-20 bg-gray-900 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-rocket text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Innovation</h3>
                <p class="text-gray-600 leading-relaxed">
                    We stay ahead of design trends and technology to ensure our clients always receive cutting-edge solutions.
                </p>
            </div>
            
            <!-- Impact -->
            <div class="text-center">
                <div class="w-20 h-20 bg-gray-900 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-target text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Impact</h3>
                <p class="text-gray-600 leading-relaxed">
                    Every design decision we make is driven by the goal of creating meaningful impact for our clients and their audiences.
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
                Our talented team of designers, developers, and strategists who bring creativity and expertise to every project.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach(config('company.team') as $member)
            <div class="text-center group">
                <div class="relative mb-6">
                    <div class="w-32 h-32 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full mx-auto flex items-center justify-center shadow-lg">
                        <span class=" w-16 h-16 bg-gradient-to-r from-orange-500 to-red-600 rounded-full flex items-center justify-center flex-shrink-0text-black text-3xl font-bold">{{ strtolower(substr($member['initials'], 0, 1)) }}</span>
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
            Ready to Work
            <br>
            Together?
        </h2>
        <p class="text-xl text-gray-300 mb-12 max-w-3xl mx-auto">
            We'd love to learn about your project and discuss how we can help bring your vision to life.
        </p>
        <a href="{{ route('contact') }}" class="bg-white text-gray-900 px-8 py-4 rounded-full text-lg font-medium hover:bg-gray-100 transition-all duration-300">
            Let's Talk
        </a>
    </div>
</section>
@endsection