@extends('layouts.app')

@section('title', 'SuGanta Internationals - Professional Video Production Services')
@section('description', 'SuGanta Internationals - Leading video production company offering video shoots, ads production, studio rentals, and podcast services for businesses worldwide.')

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
                It's time for your video campaigns to
                <span class="text-green-400">Evolve.</span>
            </h1>
        </div>

        <!-- Subtitle -->
        <p class="text-lg md:text-xl text-gray-300 mb-12 max-w-4xl mx-auto leading-relaxed font-normal">
            Experience professional video production at unprecedented speed and scale. Get months of video content delivered in weeks, through India's most advanced creative platform.
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
                    About SuGanta Internationals
                </h2>
                <p class="text-lg text-gray-600 mb-6">
                    We combine our powerful video production tech platform and a professional creator & crew network, to produce any kind of video your brand needs – in a fully scalable and flexible manner. And deliver in days or weeks, what would typically take months.
                </p>
                <p class="text-lg text-gray-600 mb-8">
                    So whether you need some raw footage to supplement your agency's work; or an event video; or a large, pan-India multi-channel video campaign – we can do it all.
                </p>
                <a href="{{ route('about') }}" class="text-gray-900 font-medium hover:text-gray-600 transition-colors">
                    Read More →
                </a>
            </div>
            <div class="relative">
                <img src="{{ asset('about/aboutus.jpg') }}" alt="SuGanta Internationals - Professional Video Production Studio" class="w-full h-96 object-cover rounded-lg shadow-lg">
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
            Get Professional Video Campaigns in Weeks.
        </h2>
        <p class="text-lg text-gray-300 mb-8 max-w-4xl mx-auto">
            Send your brief. Get your quote. Launch your campaign.
        </p>
        <p class="text-lg text-gray-300 mb-12 max-w-4xl mx-auto">
            No more waiting months for video content. Get agency-level creatives, and peak professionalism - at startup speed.
        </p>
        <a href="{{ route('contact') }}" class="bg-white text-gray-900 px-8 py-3 rounded text-base font-medium hover:bg-gray-100 transition-all duration-200 inline-block">
            Let's Go
        </a>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-16 text-center">
            Testimonials
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-gray-50 p-6 rounded-lg">
                <p class="text-gray-600 mb-4">
                    "The videos came out fantastic. It was a very quick, professionally planned and well-managed production."
                </p>
                <div class="font-semibold text-gray-900">Loveleen Kaur</div>
                <div class="text-sm text-gray-500">Creative Lead Philips</div>
            </div>
            <div class="bg-gray-50 p-6 rounded-lg">
                <p class="text-gray-600 mb-4">
                    "We needed a lot of very structured, professional, seamlessly-organized video production work. And well within our budget. SuGanta delivered!"
                </p>
                <div class="font-semibold text-gray-900">Amit Kumar Srivastava</div>
                <div class="text-sm text-gray-500">AVP Marketing</div>
            </div>
            <div class="bg-gray-50 p-6 rounded-lg">
                <p class="text-gray-600 mb-4">
                    "SuGanta streamlined our video production entirely. Their platform offers on-demand access and makes their team feel like a seamless internal extension."
                </p>
                <div class="font-semibold text-gray-900">Nanki Jassal</div>
                <div class="text-sm text-gray-500">Strategic Consultant</div>
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