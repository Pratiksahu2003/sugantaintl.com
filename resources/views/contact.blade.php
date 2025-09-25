@extends('layouts.app')

@section('title', 'Contact Us - SuGanta Internationals Video Production')
@section('description', 'Get in touch with SuGanta Internationals for your video production needs. We offer free consultations and personalized video production solutions.')

@section('content')
<!-- Hero Section -->
<section class="pt-20 pb-16 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-5xl md:text-7xl font-bold text-gray-900 mb-8 leading-tight">
                Get in Touch
                <br>
                <span class="text-gray-400">with SuGanta International</span>
            </h1>
            <p class="text-xl text-gray-600 mb-12 max-w-3xl mx-auto leading-relaxed">
                Ready to elevate your brand with professional video production? Contact SuGanta International today to discuss your ideas or discover more about our full range of creative services. Our experienced team is here to offer personalized advice and innovative solutions to help your project succeed.
            </p>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <!-- Contact Form -->
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Send Us a Message</h2>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    Fill out the form below and we'll get back to you within 24 hours. We offer free consultations for all new projects.
                </p>
                
                @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-lg mb-8">
                    {{ session('success') }}
                </div>
                @endif
                
                @if(session('error'))
                <div class="bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-lg mb-8">
                    {{ session('error') }}
                </div>
                @endif
                
                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                class="w-full px-4 py-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-colors @error('name') border-red-500 @enderror">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                class="w-full px-4 py-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-colors @error('email') border-red-500 @enderror">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Project Type *</label>
                        <select id="subject" name="subject" required
                            class="w-full px-4 py-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-colors @error('subject') border-red-500 @enderror">
                            <option value="">Select a service type</option>
                            <option value="Video Production" {{ old('subject') == 'Video Production' ? 'selected' : '' }}>Video Production</option>
                            <option value="Advertisement Production" {{ old('subject') == 'Advertisement Production' ? 'selected' : '' }}>Advertisement Production</option>
                            <option value="Studio Rental" {{ old('subject') == 'Studio Rental' ? 'selected' : '' }}>Studio Rental</option>
                            <option value="Podcast Services" {{ old('subject') == 'Podcast Services' ? 'selected' : '' }}>Podcast Services</option>
                            <option value="Live Streaming" {{ old('subject') == 'Live Streaming' ? 'selected' : '' }}>Live Streaming</option>
                            <option value="Photography" {{ old('subject') == 'Photography' ? 'selected' : '' }}>Photography</option>
                            <option value="Drone Services" {{ old('subject') == 'Drone Services' ? 'selected' : '' }}>Drone Services</option>
                            <option value="Video Editing" {{ old('subject') == 'Video Editing' ? 'selected' : '' }}>Video Editing</option>
                            <option value="Equipment Rental" {{ old('subject') == 'Equipment Rental' ? 'selected' : '' }}>Equipment Rental</option>
                            <option value="General Inquiry" {{ old('subject') == 'General Inquiry' ? 'selected' : '' }}>General Inquiry</option>
                        </select>
                        @error('subject')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Tell us about your project *</label>
                        <textarea id="message" name="message" rows="6" required
                            class="w-full px-4 py-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-colors @error('message') border-red-500 @enderror"
                            placeholder="Describe your project, goals, and any specific requirements...">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <button type="submit" class="w-full bg-gray-900 text-white px-8 py-4 rounded-lg text-lg font-medium hover:bg-gray-800 transition-all duration-300">
                        Send Message
                    </button>
                </form>
            </div>
            
            <!-- Contact Information -->
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Get in Touch</h2>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    We're here to help bring your creative vision to life. Reach out to us through any of the following channels.
                </p>
                
                <div class="space-y-8">
                    <!-- Email -->
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-envelope text-gray-600"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Email</h3>
                            <p class="text-gray-600">{{ config('company.contact.email') }}</p>
                        </div>
                    </div>
                    
                    <!-- Phone -->
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-phone text-gray-600"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Phone</h3>
                            <p class="text-gray-600">{{ config('company.contact.phone') }}</p>
                        </div>
                    </div>
                    
                    <!-- Address -->
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-gray-600"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Studio</h3>
                            <p class="text-gray-600">{{ config('company.contact.address') }}</p>
                        </div>
                    </div>
                    
                    <!-- Hours -->
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-clock text-gray-600"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Working Hours</h3>
                            <p class="text-gray-600">Monday - Friday: 10:00 AM - 7:00 PM</p>
                            <p class="text-gray-600">Saturday: 10:00 AM - 5:00 PM</p>
                            <p class="text-gray-600">Sunday: Closed</p>
                        </div>
                    </div>
                </div>
                
             
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Frequently Asked Questions
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Have questions about our process, pricing, or services? Here are some answers to common questions.
            </p>
        </div>
        
        <div class="max-w-4xl mx-auto">
            <div class="space-y-6">
                <!-- FAQ Item 1 -->
                <div class="bg-gray-50 rounded-2xl p-8">
                    <button class="faq-toggle w-full text-left flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">How long does a typical design project take?</h3>
                        <i class="fas fa-chevron-down text-gray-500 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden mt-6">
                        <p class="text-gray-600 leading-relaxed">Project timelines vary depending on scope and complexity. A logo design typically takes 1-2 weeks, while a complete brand identity can take 3-4 weeks. Website design projects usually range from 4-8 weeks. We'll provide a detailed timeline during our initial consultation.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 2 -->
                <div class="bg-gray-50 rounded-2xl p-8">
                    <button class="faq-toggle w-full text-left flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">What's included in your design packages?</h3>
                        <i class="fas fa-chevron-down text-gray-500 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden mt-6">
                        <p class="text-gray-600 leading-relaxed">Our packages include initial consultation, concept development, design iterations, final files in multiple formats, and brand guidelines. We also provide ongoing support and revisions as needed. Each package is customized based on your specific requirements.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 3 -->
                <div class="bg-gray-50 rounded-2xl p-8">
                    <button class="faq-toggle w-full text-left flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">Do you work with clients remotely?</h3>
                        <i class="fas fa-chevron-down text-gray-500 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden mt-6">
                        <p class="text-gray-600 leading-relaxed">Absolutely! We work with clients all over the world. Our process is designed to be collaborative and efficient, using video calls, shared documents, and project management tools to ensure smooth communication throughout the project.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 4 -->
                <div class="bg-gray-50 rounded-2xl p-8">
                    <button class="faq-toggle w-full text-left flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">What if I need revisions after the project is complete?</h3>
                        <i class="fas fa-chevron-down text-gray-500 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden mt-6">
                        <p class="text-gray-600 leading-relaxed">We include a certain number of revisions in each project package. After project completion, we offer ongoing support and additional revisions at our standard hourly rate. We want to ensure you're completely satisfied with the final result.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gray-900">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
            Ready to Start
            <br>
            Your Project?
        </h2>
        <p class="text-xl text-gray-300 mb-12 max-w-3xl mx-auto">
            Don't wait! Contact us today for a free consultation and let's discuss how we can bring your vision to life.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="tel:{{ config('company.contact.phone') }}" class="bg-white text-gray-900 px-8 py-4 rounded-full text-lg font-medium hover:bg-gray-100 transition-all duration-300">
                Call: {{ config('company.contact.phone') }}
            </a>
            <a href="mailto:{{ config('company.contact.email') }}" class="border-2 border-white text-white px-8 py-4 rounded-full text-lg font-medium hover:bg-white hover:text-gray-900 transition-all duration-300">
                Email Us
            </a>
        </div>
    </div>
</section>

@push('scripts')
<script>
    // FAQ Toggle
    document.addEventListener('DOMContentLoaded', function() {
        const faqToggles = document.querySelectorAll('.faq-toggle');
        
        faqToggles.forEach(toggle => {
            toggle.addEventListener('click', function() {
                const content = this.nextElementSibling;
                const icon = this.querySelector('i');
                
                if (content.classList.contains('hidden')) {
                    content.classList.remove('hidden');
                    icon.style.transform = 'rotate(180deg)';
                } else {
                    content.classList.add('hidden');
                    icon.style.transform = 'rotate(0deg)';
                }
            });
        });
    });
</script>
@endpush
@endsection