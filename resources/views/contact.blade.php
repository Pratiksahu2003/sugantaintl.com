@extends('layouts.app')

@section('title', 'Contact Us - SpacePepper Digital Solutions')
@section('description', 'Get in touch with SpacePepper for your digital project needs. We offer free consultations and competitive pricing.')

@section('content')
<!-- Hero Section -->
<section class="py-20 bg-gradient-to-br from-blue-50 via-white to-purple-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Get In <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Touch</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Ready to transform your digital presence? Let's discuss your project and see how we can help you achieve your goals.
            </p>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Send Us a Message</h2>
                <p class="text-gray-600 mb-8">
                    Fill out the form below and we'll get back to you within 24 hours. We offer free consultations for all new projects.
                </p>
                
                @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
                @endif
                
                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('name') border-red-500 @enderror">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('email') border-red-500 @enderror">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject *</label>
                        <select id="subject" name="subject" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('subject') border-red-500 @enderror">
                            <option value="">Select a subject</option>
                            <option value="Web Development" {{ old('subject') == 'Web Development' ? 'selected' : '' }}>Web Development</option>
                            <option value="Mobile Development" {{ old('subject') == 'Mobile Development' ? 'selected' : '' }}>Mobile Development</option>
                            <option value="UI/UX Design" {{ old('subject') == 'UI/UX Design' ? 'selected' : '' }}>UI/UX Design</option>
                            <option value="Digital Marketing" {{ old('subject') == 'Digital Marketing' ? 'selected' : '' }}>Digital Marketing</option>
                            <option value="General Inquiry" {{ old('subject') == 'General Inquiry' ? 'selected' : '' }}>General Inquiry</option>
                            <option value="Support" {{ old('subject') == 'Support' ? 'selected' : '' }}>Support</option>
                        </select>
                        @error('subject')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message *</label>
                        <textarea id="message" name="message" rows="6" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('message') border-red-500 @enderror"
                            placeholder="Tell us about your project...">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        Send Message
                    </button>
                </form>
            </div>
            
            <!-- Contact Information -->
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Contact Information</h2>
                <p class="text-gray-600 mb-8">
                    We're here to help! Reach out to us through any of the following channels and we'll respond as quickly as possible.
                </p>
                
                <div class="space-y-6">
                    <!-- Email -->
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-envelope text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">Email Us</h3>
                            <p class="text-gray-600">hello@spacepepper.com</p>
                            <p class="text-gray-600">support@spacepepper.com</p>
                        </div>
                    </div>
                    
                    <!-- Phone -->
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-phone text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">Call Us</h3>
                            <p class="text-gray-600">+1 (555) 123-4567</p>
                            <p class="text-gray-600">+1 (555) 987-6543</p>
                        </div>
                    </div>
                    
                    <!-- Address -->
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-gradient-to-r from-pink-500 to-pink-600 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">Visit Us</h3>
                            <p class="text-gray-600">123 Business Street<br>Suite 100<br>City, State 12345</p>
                        </div>
                    </div>
                    
                    <!-- Hours -->
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-clock text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">Business Hours</h3>
                            <p class="text-gray-600">Monday - Friday: 9:00 AM - 6:00 PM</p>
                            <p class="text-gray-600">Saturday: 10:00 AM - 4:00 PM</p>
                            <p class="text-gray-600">Sunday: Closed</p>
                        </div>
                    </div>
                </div>
                
                <!-- Social Media -->
                <div class="mt-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white hover:bg-blue-700 transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-blue-400 rounded-full flex items-center justify-center text-white hover:bg-blue-500 transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-blue-700 rounded-full flex items-center justify-center text-white hover:bg-blue-800 transition-colors">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-pink-600 rounded-full flex items-center justify-center text-white hover:bg-pink-700 transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Find Us</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Located in the heart of the business district, we're easily accessible by public transport and have parking available.
            </p>
        </div>
        
        <!-- Map Placeholder -->
        <div class="bg-gray-300 rounded-2xl h-96 flex items-center justify-center">
            <div class="text-center">
                <i class="fas fa-map-marked-alt text-4xl text-gray-500 mb-4"></i>
                <p class="text-gray-600">Interactive Map</p>
                <p class="text-sm text-gray-500">123 Business Street, City, State 12345</p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Have questions? We've got answers. Here are some of the most common questions we receive.
            </p>
        </div>
        
        <div class="max-w-4xl mx-auto">
            <div class="space-y-6">
                <!-- FAQ Item 1 -->
                <div class="bg-gray-50 rounded-2xl p-6">
                    <button class="faq-toggle w-full text-left flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">How long does a typical project take?</h3>
                        <i class="fas fa-chevron-down text-gray-500 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden mt-4">
                        <p class="text-gray-600">Project timelines vary depending on complexity and scope. A simple website typically takes 2-4 weeks, while complex web applications can take 2-6 months. We'll provide a detailed timeline during our initial consultation.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 2 -->
                <div class="bg-gray-50 rounded-2xl p-6">
                    <button class="faq-toggle w-full text-left flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">What is your pricing structure?</h3>
                        <i class="fas fa-chevron-down text-gray-500 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden mt-4">
                        <p class="text-gray-600">We offer competitive pricing based on project requirements. We provide detailed quotes after understanding your needs. Our pricing is transparent with no hidden costs, and we offer flexible payment plans.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 3 -->
                <div class="bg-gray-50 rounded-2xl p-6">
                    <button class="faq-toggle w-full text-left flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">Do you provide ongoing support?</h3>
                        <i class="fas fa-chevron-down text-gray-500 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden mt-4">
                        <p class="text-gray-600">Yes! We provide 24/7 support and maintenance services. This includes regular updates, security patches, performance monitoring, and technical support to ensure your digital solutions run smoothly.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 4 -->
                <div class="bg-gray-50 rounded-2xl p-6">
                    <button class="faq-toggle w-full text-left flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">Can you work with existing systems?</h3>
                        <i class="fas fa-chevron-down text-gray-500 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden mt-4">
                        <p class="text-gray-600">Absolutely! We can integrate with existing systems, migrate data, and enhance current platforms. We work with various technologies and can adapt to your current infrastructure.</p>
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
            Ready to Get Started?
        </h2>
        <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto">
            Don't wait! Contact us today for a free consultation and let's discuss how we can help transform your digital presence.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="tel:+15551234567" class="bg-white text-blue-600 px-8 py-4 rounded-full text-lg font-semibold hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                Call Now: (555) 123-4567
            </a>
            <a href="mailto:hello@spacepepper.com" class="border-2 border-white text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-white hover:text-blue-600 transition-all duration-300">
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