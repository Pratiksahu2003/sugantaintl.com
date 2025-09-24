<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $services = [
            [
                'title' => 'Web Development',
                'description' => 'Custom web applications built with modern technologies',
                'icon' => 'code',
                'features' => ['Responsive Design', 'Modern Frameworks', 'Performance Optimized']
            ],
            [
                'title' => 'Mobile Development',
                'description' => 'Native and cross-platform mobile applications',
                'icon' => 'mobile',
                'features' => ['iOS & Android', 'React Native', 'Flutter']
            ],
            [
                'title' => 'UI/UX Design',
                'description' => 'Beautiful and intuitive user interface designs',
                'icon' => 'design',
                'features' => ['User Research', 'Prototyping', 'Design Systems']
            ],
            [
                'title' => 'Digital Marketing',
                'description' => 'Comprehensive digital marketing strategies',
                'icon' => 'marketing',
                'features' => ['SEO Optimization', 'Social Media', 'Content Strategy']
            ]
        ];

        return view('services', compact('services'));
    }
}