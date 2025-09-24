<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = [
            [
                'title' => 'E-Commerce Platform',
                'description' => 'Modern e-commerce solution with advanced features',
                'image' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=600&h=400&fit=crop',
                'category' => 'Web Development',
                'technologies' => ['Laravel', 'Vue.js', 'MySQL']
            ],
            [
                'title' => 'Mobile Banking App',
                'description' => 'Secure and user-friendly mobile banking application',
                'image' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=600&h=400&fit=crop',
                'category' => 'Mobile Development',
                'technologies' => ['React Native', 'Node.js', 'MongoDB']
            ],
            [
                'title' => 'Healthcare Dashboard',
                'description' => 'Comprehensive healthcare management system',
                'image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1f?w=600&h=400&fit=crop',
                'category' => 'Web Development',
                'technologies' => ['React', 'Python', 'PostgreSQL']
            ],
            [
                'title' => 'Food Delivery App',
                'description' => 'Complete food delivery platform with real-time tracking',
                'image' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ca4b?w=600&h=400&fit=crop',
                'category' => 'Mobile Development',
                'technologies' => ['Flutter', 'Firebase', 'Google Maps API']
            ],
            [
                'title' => 'Corporate Website',
                'description' => 'Professional corporate website with CMS',
                'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600&h=400&fit=crop',
                'category' => 'Web Development',
                'technologies' => ['WordPress', 'PHP', 'MySQL']
            ],
            [
                'title' => 'Social Media App',
                'description' => 'Social networking platform with real-time messaging',
                'image' => 'https://images.unsplash.com/photo-1611224923853-80b023f02d71?w=600&h=400&fit=crop',
                'category' => 'Mobile Development',
                'technologies' => ['Swift', 'Kotlin', 'Socket.io']
            ]
        ];

        return view('portfolio', compact('projects'));
    }
}