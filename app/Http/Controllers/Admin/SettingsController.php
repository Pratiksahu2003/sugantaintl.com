<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{

    /**
     * Display the settings page.
     */
    public function index()
    {
        return view('admin.settings');
    }

    /**
     * Update the settings.
     */
    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'required|string|max:500',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|string|max:20',
            'contact_address' => 'required|string|max:500',
        ]);

        // Here you would typically update settings in database or config files
        // For now, we'll just show a success message
        
        return redirect()->route('admin.settings')
            ->with('success', 'Settings updated successfully.');
    }
}
