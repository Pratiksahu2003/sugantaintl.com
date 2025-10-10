import './bootstrap';

// Mobile menu functionality (handled in layout.blade.php)
document.addEventListener('DOMContentLoaded', function() {
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Navbar background on scroll
    const navbar = document.querySelector('nav');
    if (navbar) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('bg-white/95');
                navbar.classList.remove('bg-white/90');
            } else {
                navbar.classList.add('bg-white/90');
                navbar.classList.remove('bg-white/95');
            }
        });
    }
    
    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
            }
        });
    }, observerOptions);
    
    // Observe elements for animation
    document.querySelectorAll('.animate-on-scroll').forEach(el => {
        observer.observe(el);
    });
    
    // Hero video functionality with enhanced loading
    const heroVideo = document.querySelector('video');
    if (heroVideo) {
        // Smooth fade-in when video loads
        heroVideo.addEventListener('loadeddata', function() {
            this.classList.add('loaded');
        });
        
        // Ensure video plays on mobile devices
        heroVideo.addEventListener('canplay', function() {
            this.play().catch(function(error) {
                console.log('Video autoplay failed:', error);
                // Fallback: show a play button or handle gracefully
            });
        });
        
        // Handle video loading errors
        heroVideo.addEventListener('error', function() {
            console.log('Video failed to load');
            // Show fallback background
            const heroSection = document.querySelector('section');
            if (heroSection) {
                heroSection.classList.add('no-video-support');
            }
        });
        
        // Pause video when page is not visible (performance optimization)
        document.addEventListener('visibilitychange', function() {
            if (document.hidden) {
                heroVideo.pause();
            } else {
                heroVideo.play().catch(function(error) {
                    console.log('Video resume failed:', error);
                });
            }
        });
        
        // Optimize video for mobile devices
        if (window.innerWidth <= 768) {
            heroVideo.style.objectFit = 'cover';
            // Reduce video quality on mobile for better performance
            heroVideo.setAttribute('preload', 'metadata');
        } else {
            heroVideo.setAttribute('preload', 'auto');
        }
        
        // Add intersection observer for video performance
        const videoObserver = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    heroVideo.play().catch(function(error) {
                        console.log('Video play failed:', error);
                    });
                } else {
                    heroVideo.pause();
                }
            });
        }, { threshold: 0.5 });
        
        videoObserver.observe(heroVideo);
    }
});
