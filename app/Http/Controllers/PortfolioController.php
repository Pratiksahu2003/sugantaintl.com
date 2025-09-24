<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = [
            [
                'title' => 'Swiggy Food Delivery',
                'category' => 'Mobile App Design',
                'image' => 'https://cdn.dribbble.com/userupload/4567890/file/original-swiggy-food-delivery-app.png?compress=1&resize=800x600',
                'description' => 'Complete redesign of food delivery app with enhanced user experience and modern interface'
            ],
            [
                'title' => 'Paytm Wallet Redesign',
                'category' => 'UI/UX Design',
                'image' => 'https://cdn.dribbble.com/userupload/4567891/file/original-paytm-wallet-redesign.png?compress=1&resize=800x600',
                'description' => 'Modern wallet app interface with simplified payment flows and better accessibility'
            ],
            [
                'title' => 'HDFC Banking Dashboard',
                'category' => 'Web Design',
                'image' => 'https://cdn.dribbble.com/userupload/4567892/file/original-hdfc-banking-dashboard.png?compress=1&resize=800x600',
                'description' => 'Clean and intuitive banking dashboard for comprehensive financial management'
            ],
            [
                'title' => 'Myntra Shopping App',
                'category' => 'Mobile Design',
                'image' => 'https://cdn.dribbble.com/userupload/4567893/file/original-myntra-shopping-app.png?compress=1&resize=800x600',
                'description' => 'Fashion e-commerce app with personalized shopping experience and AR try-on features'
            ],
            [
                'title' => 'Ola Cab Booking',
                'category' => 'Mobile Design',
                'image' => 'https://cdn.dribbble.com/userupload/4567894/file/original-ola-cab-booking.png?compress=1&resize=800x600',
                'description' => 'Ride booking app with real-time tracking and seamless payment integration'
            ],
            [
                'title' => 'Zerodha Trading Platform',
                'category' => 'Web Design',
                'image' => 'https://cdn.dribbble.com/userupload/4567895/file/original-zerodha-trading-platform.png?compress=1&resize=800x600',
                'description' => 'Professional trading platform with advanced charts and portfolio management'
            ],
            [
                'title' => 'Hotstar Streaming App',
                'category' => 'Mobile Design',
                'image' => 'https://cdn.dribbble.com/userupload/4567896/file/original-hotstar-streaming-app.png?compress=1&resize=800x600',
                'description' => 'Video streaming app with personalized content discovery and offline viewing'
            ],
            [
                'title' => 'BookMyShow Redesign',
                'category' => 'UI/UX Design',
                'image' => 'https://cdn.dribbble.com/userupload/4567897/file/original-bookmyshow-redesign.png?compress=1&resize=800x600',
                'description' => 'Movie and event booking platform with improved seat selection and payment flow'
            ],
            [
                'title' => 'Flipkart E-commerce',
                'category' => 'Brand Identity',
                'image' => 'https://cdn.dribbble.com/userupload/4567898/file/original-flipkart-ecommerce.png?compress=1&resize=800x600',
                'description' => 'Complete brand identity refresh for India\'s leading e-commerce platform'
            ]
        ];

        return view('work', compact('projects'));
    }
}