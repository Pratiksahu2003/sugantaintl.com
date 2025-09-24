<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = [
            [
                'title' => 'Brand Identity',
                'description' => 'Creating memorable brand identities that resonate with your audience',
                'icon' => 'fas fa-palette'
            ],
            [
                'title' => 'Web Design',
                'description' => 'Beautiful, responsive websites that convert visitors into customers',
                'icon' => 'fas fa-laptop-code'
            ],
            [
                'title' => 'Digital Marketing',
                'description' => 'Strategic marketing campaigns that drive growth and engagement',
                'icon' => 'fas fa-chart-line'
            ],
            [
                'title' => 'UI/UX Design',
                'description' => 'User-centered design that creates exceptional digital experiences',
                'icon' => 'fas fa-mobile-alt'
            ]
        ];

        $testimonials = [
            [
                'name' => 'Sarah Johnson',
                'company' => 'TechStart Inc.',
                'text' => 'IndieVisual transformed our brand completely. Their creative approach and attention to detail exceeded our expectations.',
                'rating' => 5
            ],
            [
                'name' => 'Michael Chen',
                'company' => 'Digital Solutions',
                'text' => 'Working with IndieVisual was a game-changer for our business. They delivered exceptional results on time and within budget.',
                'rating' => 5
            ],
            [
                'name' => 'Emily Rodriguez',
                'company' => 'Creative Agency',
                'text' => 'The team at IndieVisual is incredibly talented and professional. They brought our vision to life perfectly.',
                'rating' => 5
            ]
        ];

        return view('home', compact('services', 'testimonials'));
    }
}