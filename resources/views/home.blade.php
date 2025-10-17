@extends('layouts.home')

@section('title', 'Star JD - Professional Video Production Services')
@section('description', 'Star JD - Leading video production company offering video shoots, ads production, studio rentals, and podcast services for businesses worldwide.')

@section('content')
<!-- Hero Section -->
<section class="relative h-screen flex items-center justify-center overflow-hidden" role="banner" aria-label="Hero Section">
    <!-- Video Background -->
    <video
        class="absolute inset-0 w-full h-full object-cover z-0"
        autoplay
        muted
        loop
        playsinline
        preload="auto"
        poster="{{ asset('banner/banner.jpg') }}"
        aria-hidden="true">
        <source src="{{ asset('video/hero.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Enhanced Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-br from-black/60 via-black/50 to-black/70 z-10"></div>
    
    <!-- Subtle Pattern Overlay -->
    <div class="absolute inset-0 z-10 opacity-5" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

    <!-- Content Container -->
    <div class="relative z-20 max-w-6xl mx-auto px-6 sm:px-8 lg:px-12 text-center">
        <div class="space-y-6 animate-fade-in-up">
            
            <!-- Badge/Label -->
            <div class="inline-flex items-center justify-center mb-4 opacity-0 animate-fade-in" style="animation-delay: 0.2s; animation-fill-mode: forwards;">
                <span class="inline-flex items-center px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white text-sm font-medium">
                    <svg class="w-4 h-4 mr-2 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    India's Leading Video Production Platform
                </span>
            </div>

            <!-- Main Heading -->
            <div class="space-y-4 opacity-0 animate-fade-in" style="animation-delay: 0.4s; animation-fill-mode: forwards;">
                <h1 class="hero-title font-bold text-white leading-tight tracking-tight">
                    <span class="block mb-2">Take your video campaigns</span>
                    <span class="block mb-2">to the next level with</span>
                    <span class="block">
                        <span class="relative inline-block">
                            <span class="relative z-10">Star JD.</span>
                            <span class="absolute bottom-1 left-0 w-full h-3 bg-green-400/30 -rotate-1"></span>
                        </span>
                    </span>
                </h1>
                <div class="mt-4">
                    <span class="inline-block text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-green-400 animate-pulse-subtle tracking-wide">
                        Evolve.
                    </span>
                </div>
            </div>

            <!-- Subtitle -->
            <p class="text-base sm:text-lg md:text-xl text-gray-200 max-w-4xl mx-auto leading-relaxed font-light px-4 opacity-0 animate-fade-in" style="animation-delay: 0.6s; animation-fill-mode: forwards;">
                Unlock the power of high-impact video content—faster than ever before. With Star JD, transform your brand's story into stunning visuals, delivered at unmatched speed and scale across India's leading creative platform.
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-6 opacity-0 animate-fade-in" style="animation-delay: 0.8s; animation-fill-mode: forwards;">
                <a 
                    href="{{ route('contact') }}" 
                    class="group relative inline-flex items-center justify-center px-8 py-4 text-base font-semibold text-gray-900 bg-white rounded-lg overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105 w-full sm:w-auto btn-primary">
                    <span class="relative z-10 flex items-center">
                        Talk to an Expert
                        <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </span>
                </a>
                
                <a 
                    href="{{ route('Portfolio') }}" 
                    class="group inline-flex items-center justify-center px-8 py-4 text-base font-semibold text-white bg-transparent rounded-lg border-2 border-white/50 backdrop-blur-sm hover:bg-white hover:text-gray-900 transition-all duration-300 hover:scale-105 w-full sm:w-auto btn-secondary">
                    <span class="flex items-center">
                        View Our Work
                        <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </span>
                </a>
            </div>

            <!-- Trust Indicators -->
            <div class="trust-indicators pt-8 text-white/80 text-sm opacity-0 animate-fade-in" style="animation-delay: 1s; animation-fill-mode: forwards;">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <span>100+ Projects Delivered</span>
                </div>
                <div class="hidden sm:block h-4 w-px bg-white/30"></div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>Trusted by Leading Brands</span>
                </div>
                <div class="hidden sm:block h-4 w-px bg-white/30"></div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                    </svg>
                    <span>Pan-India Coverage</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 z-20 opacity-0 animate-fade-in animate-bounce-slow" style="animation-delay: 1.2s; animation-fill-mode: forwards;">
        <div class="flex flex-col items-center gap-2 text-white/70 hover:text-white transition-colors cursor-pointer">
            <span class="text-sm font-medium tracking-wider uppercase">Scroll to Explore</span>
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </div>
    </div>
</section>



<!-- Statistics Section -->
<section class="section-padding bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid-responsive text-center">
            <div class="space-y-3">
                <div class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900">{{ config('company.statistics.total_videos') }}</div>
                <div class="text-sm md:text-base text-gray-600 font-medium">Total Videos</div>
            </div>
            <div class="space-y-3">
                <div class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900">{{ config('company.statistics.clients') }}</div>
                <div class="text-sm md:text-base text-gray-600 font-medium">Clients</div>
            </div>
            <div class="space-y-3">
                <div class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900">{{ config('company.statistics.cities') }}</div>
                <div class="text-sm md:text-base text-gray-600 font-medium">Cities</div>
            </div>
            <div class="space-y-3">
                <div class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900">{{ config('company.statistics.languages') }}</div>
                <div class="text-sm md:text-base text-gray-600 font-medium">Languages</div>
            </div>
        </div>
    </div>
</section>

<!-- Trusted By Section -->
<section class="section-padding bg-gray-50">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-2xl md:text-3xl font-semibold text-gray-900 mb-12">
            Trusted by Well-Known Companies – Across India.
        </h2>
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4 md:gap-6 items-center opacity-60">
            <div class="bg-white h-16 md:h-20 rounded-lg flex items-center justify-center p-3 md:p-4 shadow-sm hover:opacity-100 transition-opacity duration-300 card-hover">
                <a href="https://groupsairfare.com/" target="_blank" rel="noopener noreferrer" class="block w-full h-full flex items-center justify-center">
                    <img src="{{ asset('customer/Airfare_logo.png') }}" alt="GroupsAirFare.com - Group Travel Booking" class="max-h-12 md:max-h-16 max-w-24 md:max-w-32 w-auto object-contain">
                </a>
            </div>
            <div class="bg-white h-16 md:h-20 rounded-lg flex items-center justify-center p-3 md:p-4 shadow-sm hover:opacity-100 transition-opacity duration-300 card-hover">
                <a href="https://farehawker.com/" target="_blank" rel="noopener noreferrer" class="block w-full h-full flex items-center justify-center">
                    <img src="{{ asset('customer/farehawker-logo.png') }}" alt="FareHawker.com - Flight Booking Platform" class="max-h-12 md:max-h-16 max-w-24 md:max-w-32 w-auto object-contain">
                </a>
            </div>
            <div class="bg-white h-16 md:h-20 rounded-lg flex items-center justify-center p-3 md:p-4 shadow-sm hover:opacity-100 transition-opacity duration-300 card-hover">
                <a href="https://suganta.com/" target="_blank" rel="noopener noreferrer" class="block w-full h-full flex items-center justify-center">
                    <img src="{{ asset('customer/Su250.png') }}" alt="SuGanta.com - Professional Services" class="max-h-12 md:max-h-16 max-w-24 md:max-w-32 w-auto object-contain">
                </a>
            </div>
            <div class="bg-white h-16 md:h-20 rounded-lg flex items-center justify-center p-3 md:p-4 shadow-sm hover:opacity-100 transition-opacity duration-300 card-hover">
                <a href="https://tytil.com/" target="_blank" rel="noopener noreferrer" class="block w-full h-full flex items-center justify-center">
                    <img src="{{ asset('customer/tytil-new.png') }}" alt="tyTil.com - Technology Solutions" class="max-h-12 md:max-h-16 max-w-24 md:max-w-32 w-auto object-contain">
                </a>
            </div>
            <div class="bg-white h-16 md:h-20 rounded-lg flex items-center justify-center p-3 md:p-4 shadow-sm hover:opacity-100 transition-opacity duration-300 card-hover">
                <a href="https://www.bunzo.co.in/" target="_blank" rel="noopener noreferrer" class="block w-full h-full flex items-center justify-center">
                    <img src="{{ asset('customer/bunzo-logo-img.png') }}" alt="BUNZO - Fresh Food & Beverages" class="max-h-12 md:max-h-16 max-w-24 md:max-w-32 w-auto object-contain">
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Videos Section -->
<section class="section-padding bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Any Video Your Business Needs
            </h2>
            <p class="text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto">
                From corporate videos to commercial ads, we create compelling visual content that drives results. See our work in action.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 md:gap-8">
            @foreach(config('company.portfolio_videos') as $video)
            <div class="bg-gray-50 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 card-hover">
                <div class="aspect-video">
                    {!! $video['iframe'] !!}
                </div>
                <div class="p-4 md:p-6">
                    <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-2">{{ $video['title'] }}</h3>
                    <p class="text-gray-600 text-sm md:text-base">{{ $video['description'] }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('Portfolio') }}" class="bg-gray-900 text-white px-6 md:px-8 py-3 rounded-lg text-base font-medium hover:bg-gray-800 transition-all duration-200 inline-block btn-primary">
                View More Projects
            </a>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="section-padding bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 items-center">
            <div>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    About Star JD
                </h2>
                <p class="text-base sm:text-lg text-gray-600 mb-6">
                    Star JD is your trusted partner for professional video production services, delivering high-impact content for brands and businesses of all sizes. With a robust network of experienced creators, state-of-the-art technology, and a commitment to quality, we bring your vision to life—on time and on budget.
                </p>
                <p class="text-base sm:text-lg text-gray-600 mb-8">
                    From corporate films and commercials to event coverage and multi-channel campaigns across India, we handle every aspect of video production with creativity and precision. No matter your industry or scale, we're ready to help you tell your story and achieve your goals.
                </p>
                <a href="{{ route('about') }}" class="text-gray-900 font-medium hover:text-gray-600 transition-colors">
                    Learn More →
                </a>
            </div>
            <div class="relative">
                <img src="{{ asset('about/aboutus.jpg') }}" alt="Star JD - Professional Video Production Studio" class="w-full h-80 md:h-96 object-cover rounded-lg shadow-lg">
            </div>
        </div>
    </div>
</section>



<!-- Our Work Section -->
<section class="section-padding bg-white">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-6">
            Our Work
        </h2>
        <div class="mb-10">
            <a href="{{ route('contact') }}" class="bg-gray-900 text-white px-6 md:px-8 py-3 rounded-lg text-base font-medium hover:bg-gray-800 transition-colors duration-200 inline-block mr-4 btn-primary">
                Get a Quote
            </a>
            <a href="{{ route('work') }}" class="border border-gray-900 text-gray-900 px-6 md:px-8 py-3 rounded-lg text-base font-medium hover:bg-gray-900 hover:text-white transition-colors duration-200 inline-block btn-secondary">
                See Our Portfolio
            </a>
        </div>
    </div>
</section>

<!-- Get Professional Video Campaigns Section -->
<section class="section-padding bg-gray-900 text-white">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-6">
            Launch Your Video Campaigns Faster with Star JD
        </h2>
        <p class="text-base sm:text-lg text-gray-300 mb-6 max-w-4xl mx-auto">
            Share your requirements, receive a tailored quote, and kickstart your project with ease.
        </p>
        <p class="text-base sm:text-lg text-gray-300 mb-10 max-w-4xl mx-auto">
            Experience high-quality, creative video production delivered in record time—no more long waits or complicated processes. Get the results you need, when you need them.
        </p>
        <a href="{{ route('contact') }}" class="bg-white text-gray-900 px-6 md:px-8 py-3 rounded-lg text-base font-medium hover:bg-gray-100 transition-all duration-200 inline-block btn-primary">
            Start Your Project
        </a>
    </div>
</section>

<!-- Testimonials Section -->
<section class="section-padding bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-12 text-center">
            What Our Clients Say
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            <div class="bg-gray-50 p-4 md:p-6 rounded-lg shadow-sm card-hover">
                <p class="text-gray-600 mb-4 text-sm md:text-base">
                    "Star JD delivered our project with exceptional quality and speed. The team was highly professional and made the entire process seamless from start to finish."
                </p>
                <div class="font-semibold text-gray-900">Loveleen Kaur</div>
            </div>
            <div class="bg-gray-50 p-4 md:p-6 rounded-lg shadow-sm card-hover">
                <p class="text-gray-600 mb-4 text-sm md:text-base">
                    "We required a series of structured, high-quality videos on a tight timeline and budget. Star JD exceeded our expectations with their expertise and organization."
                </p>
                <div class="font-semibold text-gray-900">Amit Kumar Srivastava</div>
            </div>
            <div class="bg-gray-50 p-4 md:p-6 rounded-lg shadow-sm card-hover">
                <p class="text-gray-600 mb-4 text-sm md:text-base">
                    "Star JD's on-demand video production platform made collaboration effortless. Their team felt like an extension of our own, always responsive and creative."
                </p>
                <div class="font-semibold text-gray-900">Nanki Jassal</div>
            </div>
            <div class="bg-gray-50 p-4 md:p-6 rounded-lg shadow-sm card-hover">
                <p class="text-gray-600 mb-4 text-sm md:text-base">
                    "The professionalism and creativity of Star JD truly set them apart. They understood our vision and brought it to life better than we imagined."
                </p>
                <div class="font-semibold text-gray-900">Rohit Sharma</div>
            </div>
            <div class="bg-gray-50 p-4 md:p-6 rounded-lg shadow-sm card-hover">
                <p class="text-gray-600 mb-4 text-sm md:text-base">
                    "From concept to final cut, the Star JD team was attentive, innovative, and always available for feedback. We look forward to working with them again."
                </p>
                <div class="font-semibold text-gray-900">Priya Mehra</div>
            </div>
            <div class="bg-gray-50 p-4 md:p-6 rounded-lg shadow-sm card-hover">
                <p class="text-gray-600 mb-4 text-sm md:text-base">
                    "Star JD made our product launch a huge success with their quick turnaround and high-quality video content. Highly recommended!"
                </p>
                <div class="font-semibold text-gray-900">Siddharth Jain</div>
            </div>
        </div>
    </div>
</section>

<!-- Ready to Launch Section -->
<section class="section-padding bg-gray-50">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-6">
            Ready to Launch Your Next Video Campaign?
        </h2>
        <a href="{{ route('contact') }}" class="bg-gray-900 text-white px-6 md:px-8 py-3 rounded-lg text-base font-medium hover:bg-gray-800 transition-colors duration-200 inline-block btn-primary">
            Let's Talk.
        </a>
    </div>
</section>
@endsection