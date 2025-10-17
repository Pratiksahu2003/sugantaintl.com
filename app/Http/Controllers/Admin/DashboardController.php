<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function index()
    {
        $user = Auth::user();
        $totalUsers = User::count();
        $recentUsers = User::latest()->take(5)->get();
        
        return view('admin.dashboard', compact('user', 'totalUsers', 'recentUsers'));
    }
}
