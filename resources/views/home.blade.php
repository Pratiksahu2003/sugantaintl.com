@extends('layouts.app')

@section('title', 'Star JD - Professional Video Production Services')
@section('description', 'Star JD - Leading video production company offering video shoots, ads production, studio rentals, and podcast services for businesses worldwide.')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Video Background -->
    <video
        class="absolute inset-0 w-full h-full object-cover z-0"
        autoplay
        muted
        loop
        playsinline
        poster="">
        <source src="{{ asset('video/hero.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Video Overlay -->
    <div class="absolute inset-0 bg-black/40 z-10"></div>

    <!-- Content -->
    <div class="relative z-20 max-w-6xl mx-auto px-6 text-center">
        <!-- Main Heading -->
        <div class="mb-8">
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-white leading-tight tracking-tight mb-6">
                Take your video campaigns to the next level with SuGanta Intl.
                <span class="text-green-400">Evolve.</span>
            </h1>
        </div>

        <!-- Subtitle -->
        <p class="text-lg md:text-xl text-gray-300 mb-12 max-w-4xl mx-auto leading-relaxed font-normal">
            Unlock the power of high-impact video content—faster than ever before. With Star JD, transform your brand’s story into stunning visuals, delivered at unmatched speed and scale across India’s leading creative platform.
        </p>

        <!-- CTA Button -->
        <div class="mb-16">
            <a href="{{ route('contact') }}" class="bg-white text-gray-900 px-8 py-3 rounded text-base font-medium hover:bg-gray-100 transition-all duration-200 inline-block">
                Talk to an Expert
            </a>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div class="space-y-2">
                <div class="text-4xl md:text-5xl font-bold text-gray-900">{{ config('company.statistics.total_videos') }}</div>
                <div class="text-sm md:text-base text-gray-600 font-medium">Total Videos</div>
            </div>
            <div class="space-y-2">
                <div class="text-4xl md:text-5xl font-bold text-gray-900">{{ config('company.statistics.clients') }}</div>
                <div class="text-sm md:text-base text-gray-600 font-medium">Clients</div>
            </div>
            <div class="space-y-2">
                <div class="text-4xl md:text-5xl font-bold text-gray-900">{{ config('company.statistics.cities') }}</div>
                <div class="text-sm md:text-base text-gray-600 font-medium">Cities</div>
            </div>
            <div class="space-y-2">
                <div class="text-4xl md:text-5xl font-bold text-gray-900">{{ config('company.statistics.languages') }}</div>
                <div class="text-sm md:text-base text-gray-600 font-medium">Languages</div>
            </div>
        </div>
    </div>
</section>

<!-- Trusted By Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-2xl md:text-3xl font-semibold text-gray-900 mb-16">
            Trusted by Well-Known Companies – Across India.
        </h2>
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

<!-- Portfolio Videos Section -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Any Video Your Business Needs
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                From corporate videos to commercial ads, we create compelling visual content that drives results. See our work in action.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            @foreach(config('company.portfolio_videos') as $video)
            <div class="bg-gray-50 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="aspect-video">
                    {!! $video['iframe'] !!}
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $video['title'] }}</h3>
                    <p class="text-gray-600">{{ $video['description'] }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('Portfolio') }}" class="bg-gray-900 text-white px-8 py-3 rounded text-base font-medium hover:bg-gray-800 transition-all duration-200 inline-block">
                View More Projects
            </a>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    About Star JD
                </h2>
                <p class="text-lg text-gray-600 mb-6">
                    Star JD is your trusted partner for professional video production services, delivering high-impact content for brands and businesses of all sizes. With a robust network of experienced creators, state-of-the-art technology, and a commitment to quality, we bring your vision to life—on time and on budget.
                </p>
                <p class="text-lg text-gray-600 mb-8">
                    From corporate films and commercials to event coverage and multi-channel campaigns across India, we handle every aspect of video production with creativity and precision. No matter your industry or scale, we’re ready to help you tell your story and achieve your goals.
                </p>
                <a href="{{ route('about') }}" class="text-gray-900 font-medium hover:text-gray-600 transition-colors">
                    Learn More →
                </a>
            </div>
            <div class="relative">
                <img src="{{ asset('about/aboutus.jpg') }}" alt="Star JD - Professional Video Production Studio" class="w-full h-96 object-cover rounded-lg shadow-lg">
            </div>
        </div>
    </div>
</section>



<!-- Our Work Section -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
            Our Work
        </h2>
        <div class="mb-12">
            <a href="{{ route('contact') }}" class="bg-gray-900 text-white px-6 py-3 rounded text-base font-medium hover:bg-gray-800 transition-colors duration-200 inline-block mr-4">
                Get a Quote
            </a>
            <a href="{{ route('work') }}" class="border border-gray-900 text-gray-900 px-6 py-3 rounded text-base font-medium hover:bg-gray-900 hover:text-white transition-colors duration-200 inline-block">
                See Our Portfolio
            </a>
        </div>
    </div>
</section>

<!-- Get Professional Video Campaigns Section -->
<section class="py-20 bg-gray-900 text-white">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">
            Launch Your Video Campaigns Faster with Star JD
        </h2>
        <p class="text-lg text-gray-300 mb-8 max-w-4xl mx-auto">
            Share your requirements, receive a tailored quote, and kickstart your project with ease.
        </p>
        <p class="text-lg text-gray-300 mb-12 max-w-4xl mx-auto">
            Experience high-quality, creative video production delivered in record time—no more long waits or complicated processes. Get the results you need, when you need them.
        </p>
        <a href="{{ route('contact') }}" class="bg-white text-gray-900 px-8 py-3 rounded text-base font-medium hover:bg-gray-100 transition-all duration-200 inline-block">
            Start Your Project
        </a>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-16 text-center">
            What Our Clients Say
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                <p class="text-gray-600 mb-4">
                    “Star JD delivered our project with exceptional quality and speed. The team was highly professional and made the entire process seamless from start to finish.”
                </p>
                <div class="font-semibold text-gray-900">Loveleen Kaur</div>
            </div>
            <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                <p class="text-gray-600 mb-4">
                    “We required a series of structured, high-quality videos on a tight timeline and budget. SuGanta exceeded our expectations with their expertise and organization.”
                </p>
                <div class="font-semibold text-gray-900">Amit Kumar Srivastava</div>
            </div>
            <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                <p class="text-gray-600 mb-4">
                    “SuGanta’s on-demand video production platform made collaboration effortless. Their team felt like an extension of our own, always responsive and creative.”
                </p>
                <div class="font-semibold text-gray-900">Nanki Jassal</div>
            </div>
            <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                <p class="text-gray-600 mb-4">
                    “The professionalism and creativity of Star JD truly set them apart. They understood our vision and brought it to life better than we imagined.”
                </p>
                <div class="font-semibold text-gray-900">Rohit Sharma</div>
            </div>
            <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                <p class="text-gray-600 mb-4">
                    “From concept to final cut, the SuGanta team was attentive, innovative, and always available for feedback. We look forward to working with them again.”
                </p>
                <div class="font-semibold text-gray-900">Priya Mehra</div>
            </div>
            <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                <p class="text-gray-600 mb-4">
                    “Star JD made our product launch a huge success with their quick turnaround and high-quality video content. Highly recommended!”
                </p>
                <div class="font-semibold text-gray-900">Siddharth Jain</div>
            </div>
        </div>
    </div>
</section>

<!-- Ready to Launch Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
            Ready to Launch Your Next Video Campaign?
        </h2>
        <a href="{{ route('contact') }}" class="bg-gray-900 text-white px-8 py-3 rounded text-base font-medium hover:bg-gray-800 transition-colors duration-200 inline-block">
            Let's Talk.
        </a>
    </div>
</section>
@endsection