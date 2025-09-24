@extends('layouts.app')

@section('title', 'About Us - SpacePepper Digital Solutions')
@section('description', 'Learn about SpacePepper team, our mission, and how we help businesses succeed with innovative digital solutions.')

@section('content')
<!-- Hero Section -->
<section class="py-20 bg-gradient-to-br from-blue-50 via-white to-purple-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                About <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">SpacePepper</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We're a passionate team of digital innovators dedicated to transforming businesses through cutting-edge technology and creative solutions.
            </p>
        </div>
    </div>
</section>

<!-- Our Story -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Our Story</h2>
                <p class="text-lg text-gray-600 mb-6">
                    Founded in 2019, SpacePepper began as a small team of developers and designers with a big vision: to help businesses thrive in the digital age. What started as a passion project has grown into a full-service digital agency serving clients worldwide.
                </p>
                <p class="text-lg text-gray-600 mb-6">
                    We believe that great digital experiences are born from the perfect blend of creativity, technology, and strategy. Our team combines years of experience with fresh perspectives to deliver solutions that not only look amazing but drive real business results.
                </p>
                <p class="text-lg text-gray-600">
                    Today, we're proud to have helped over 150 businesses transform their digital presence and achieve their goals through innovative web development, mobile applications, and digital marketing strategies.
                </p>
            </div>
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=600&h=400&fit=crop" alt="Our Team" class="rounded-2xl shadow-2xl">
                <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl flex items-center justify-center">
                    <i class="fas fa-rocket text-white text-2xl"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Mission & Vision -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Mission -->
            <div class="bg-white p-8 rounded-2xl shadow-lg">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-bullseye text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Mission</h3>
                <p class="text-gray-600">
                    To empower businesses with innovative digital solutions that drive growth, enhance user experiences, and create lasting value. We're committed to delivering excellence in every project while building long-term partnerships with our clients.
                </p>
            </div>
            
            <!-- Vision -->
            <div class="bg-white p-8 rounded-2xl shadow-lg">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-eye text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Vision</h3>
                <p class="text-gray-600">
                    To be the leading digital agency that businesses trust for transformative solutions. We envision a future where technology seamlessly integrates with business goals to create meaningful impact and sustainable success.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Our Values -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Values</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                These core values guide everything we do and shape how we work with our clients and each other.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Innovation -->
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-lightbulb text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Innovation</h3>
                <p class="text-gray-600">
                    We constantly explore new technologies and creative approaches to solve complex challenges and deliver cutting-edge solutions.
                </p>
            </div>
            
            <!-- Quality -->
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-r from-purple-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-gem text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Quality</h3>
                <p class="text-gray-600">
                    Excellence is non-negotiable. We maintain the highest standards in every aspect of our work, from code quality to user experience.
                </p>
            </div>
            
            <!-- Collaboration -->
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-r from-pink-500 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-handshake text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Collaboration</h3>
                <p class="text-gray-600">
                    We believe in the power of teamwork and open communication, both within our team and with our valued clients.
                </p>
            </div>
            
            <!-- Integrity -->
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-shield-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Integrity</h3>
                <p class="text-gray-600">
                    Honesty and transparency are the foundation of our relationships. We always do what's right for our clients and their success.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Meet Our Team</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Our diverse team of experts brings together years of experience in technology, design, and digital marketing.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Team Member 1 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg text-center">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&h=200&fit=crop&crop=face" alt="John Smith" class="w-24 h-24 rounded-full mx-auto mb-6 object-cover">
                <h3 class="text-xl font-bold text-gray-900 mb-2">John Smith</h3>
                <p class="text-blue-600 font-semibold mb-4">CEO & Founder</p>
                <p class="text-gray-600 mb-6">
                    Visionary leader with 10+ years in tech industry. Passionate about innovation and building great teams.
                </p>
                <div class="flex justify-center space-x-4">
                    <a href="#" class="text-gray-400 hover:text-blue-600 transition-colors">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-600 transition-colors">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
            
            <!-- Team Member 2 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg text-center">
                <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=200&h=200&fit=crop&crop=face" alt="Sarah Johnson" class="w-24 h-24 rounded-full mx-auto mb-6 object-cover">
                <h3 class="text-xl font-bold text-gray-900 mb-2">Sarah Johnson</h3>
                <p class="text-purple-600 font-semibold mb-4">Lead Designer</p>
                <p class="text-gray-600 mb-6">
                    Creative designer with expertise in UI/UX design and brand identity. Loves creating beautiful experiences.
                </p>
                <div class="flex justify-center space-x-4">
                    <a href="#" class="text-gray-400 hover:text-purple-600 transition-colors">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-purple-600 transition-colors">
                        <i class="fab fa-dribbble"></i>
                    </a>
                </div>
            </div>
            
            <!-- Team Member 3 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg text-center">
                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=200&h=200&fit=crop&crop=face" alt="Mike Chen" class="w-24 h-24 rounded-full mx-auto mb-6 object-cover">
                <h3 class="text-xl font-bold text-gray-900 mb-2">Mike Chen</h3>
                <p class="text-pink-600 font-semibold mb-4">Lead Developer</p>
                <p class="text-gray-600 mb-6">
                    Full-stack developer with expertise in modern web technologies. Passionate about clean code and performance.
                </p>
                <div class="flex justify-center space-x-4">
                    <a href="#" class="text-gray-400 hover:text-pink-600 transition-colors">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-pink-600 transition-colors">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why Choose SpacePepper?</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We combine technical expertise with creative vision to deliver exceptional results for our clients.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Expertise -->
            <div class="flex items-start">
                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                    <i class="fas fa-star text-white"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Proven Expertise</h3>
                    <p class="text-gray-600">5+ years of experience delivering successful projects across various industries and technologies.</p>
                </div>
            </div>
            
            <!-- Custom Solutions -->
            <div class="flex items-start">
                <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                    <i class="fas fa-cogs text-white"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Custom Solutions</h3>
                    <p class="text-gray-600">Tailored solutions designed specifically for your business needs and objectives.</p>
                </div>
            </div>
            
            <!-- 24/7 Support -->
            <div class="flex items-start">
                <div class="w-12 h-12 bg-gradient-to-r from-pink-500 to-pink-600 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                    <i class="fas fa-headset text-white"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">24/7 Support</h3>
                    <p class="text-gray-600">Round-the-clock support to ensure your digital solutions run smoothly at all times.</p>
                </div>
            </div>
            
            <!-- Agile Process -->
            <div class="flex items-start">
                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                    <i class="fas fa-sync text-white"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Agile Process</h3>
                    <p class="text-gray-600">Flexible development process that adapts to changes and delivers results quickly.</p>
                </div>
            </div>
            
            <!-- Competitive Pricing -->
            <div class="flex items-start">
                <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                    <i class="fas fa-dollar-sign text-white"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Competitive Pricing</h3>
                    <p class="text-gray-600">Fair and transparent pricing with no hidden costs. Great value for high-quality work.</p>
                </div>
            </div>
            
            <!-- Long-term Partnership -->
            <div class="flex items-start">
                <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-indigo-600 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                    <i class="fas fa-handshake text-white"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Long-term Partnership</h3>
                    <p class="text-gray-600">We build lasting relationships and continue to support your growth beyond project completion.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-600 to-purple-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
            Ready to Work Together?
        </h2>
        <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto">
            Let's discuss your project and see how we can help you achieve your digital goals.
        </p>
        <a href="{{ route('contact') }}" class="bg-white text-blue-600 px-8 py-4 rounded-full text-lg font-semibold hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            Get In Touch
        </a>
    </div>
</section>
@endsection