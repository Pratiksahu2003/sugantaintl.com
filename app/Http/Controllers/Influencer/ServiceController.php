<?php

namespace App\Http\Controllers\Influencer;

use App\Http\Controllers\Controller;
use App\Models\InfluencerService;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the user's services.
     */
    public function index(): View
    {
        $services = Auth::user()->influencerServices()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('influencer.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service.
     */
    public function create(): View
    {
        $categories = InfluencerService::getCategories();
        $serviceTypes = InfluencerService::getServiceTypes();
        
        return view('influencer.services.create', compact('categories', 'serviceTypes'));
    }

    /**
     * Store a newly created service.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'service_type' => 'required|string',
            'base_price' => 'required|numeric|min:0',
            'currency' => 'required|string|size:3',
            'delivery_time_days' => 'required|integer|min:1',
            'revision_limit' => 'required|integer|min:0',
            'tags' => 'nullable|array',
            'social_platforms' => 'nullable|array',
            'target_audience' => 'nullable|array',
            'deliverables' => 'nullable|array',
            'requirements' => 'nullable|array',
            'pricing_tiers' => 'nullable|array',
            'additional_info' => 'nullable|array',
            'thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['is_active'] = $request->has('is_active');
        $validated['is_featured'] = $request->has('is_featured');

        // Handle thumbnail image upload
        if ($request->hasFile('thumbnail_image')) {
            $validated['thumbnail_image'] = $request->file('thumbnail_image')->store('services/thumbnails', 'public');
        }

        // Handle gallery images upload
        if ($request->hasFile('gallery_images')) {
            $galleryImages = [];
            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $image->store('services/gallery', 'public');
            }
            $validated['gallery_images'] = $galleryImages;
        }

        $service = InfluencerService::create($validated);

        // Send notification
        NotificationService::serviceCreated(Auth::user(), $service);

        return redirect()->route('influencer.services.index')
            ->with('success', 'Service created successfully!');
    }

    /**
     * Display the specified service.
     */
    public function show(InfluencerService $service): View
    {
        // Ensure user can only view their own services
        if ($service->user_id !== Auth::id()) {
            abort(403, 'Access denied.');
        }

        return view('influencer.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified service.
     */
    public function edit(InfluencerService $service): View
    {
        // Ensure user can only edit their own services
        if ($service->user_id !== Auth::id()) {
            abort(403, 'Access denied.');
        }

        $categories = InfluencerService::getCategories();
        $serviceTypes = InfluencerService::getServiceTypes();

        return view('influencer.services.edit', compact('service', 'categories', 'serviceTypes'));
    }

    /**
     * Update the specified service.
     */
    public function update(Request $request, InfluencerService $service): RedirectResponse
    {
        // Ensure user can only update their own services
        if ($service->user_id !== Auth::id()) {
            abort(403, 'Access denied.');
        }

        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'service_type' => 'required|string',
            'base_price' => 'required|numeric|min:0',
            'currency' => 'required|string|size:3',
            'delivery_time_days' => 'required|integer|min:1',
            'revision_limit' => 'required|integer|min:0',
            'tags' => 'nullable|array',
            'social_platforms' => 'nullable|array',
            'target_audience' => 'nullable|array',
            'deliverables' => 'nullable|array',
            'requirements' => 'nullable|array',
            'pricing_tiers' => 'nullable|array',
            'additional_info' => 'nullable|array',
            'thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['is_featured'] = $request->has('is_featured');

        // Handle thumbnail image upload
        if ($request->hasFile('thumbnail_image')) {
            // Delete old thumbnail
            if ($service->thumbnail_image) {
                Storage::disk('public')->delete($service->thumbnail_image);
            }
            $validated['thumbnail_image'] = $request->file('thumbnail_image')->store('services/thumbnails', 'public');
        }

        // Handle gallery images upload
        if ($request->hasFile('gallery_images')) {
            // Delete old gallery images
            if ($service->gallery_images) {
                foreach ($service->gallery_images as $image) {
                    Storage::disk('public')->delete($image);
                }
            }
            $galleryImages = [];
            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $image->store('services/gallery', 'public');
            }
            $validated['gallery_images'] = $galleryImages;
        }

        $service->update($validated);

        // Send notification
        NotificationService::serviceUpdated(Auth::user(), $service);

        return redirect()->route('influencer.services.index')
            ->with('success', 'Service updated successfully!');
    }

    /**
     * Remove the specified service.
     */
    public function destroy(InfluencerService $service): RedirectResponse
    {
        // Ensure user can only delete their own services
        if ($service->user_id !== Auth::id()) {
            abort(403, 'Access denied.');
        }

        // Delete associated images
        if ($service->thumbnail_image) {
            Storage::disk('public')->delete($service->thumbnail_image);
        }
        if ($service->gallery_images) {
            foreach ($service->gallery_images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $serviceName = $service->service_name;
        $service->delete();

        // Send notification
        NotificationService::serviceDeleted(Auth::user(), $serviceName);

        return redirect()->route('influencer.services.index')
            ->with('success', 'Service deleted successfully!');
    }

    /**
     * Toggle service active status.
     */
    public function toggleActive(InfluencerService $service): RedirectResponse
    {
        // Ensure user can only toggle their own services
        if ($service->user_id !== Auth::id()) {
            abort(403, 'Access denied.');
        }

        $service->update(['is_active' => !$service->is_active]);

        $status = $service->is_active ? 'activated' : 'deactivated';
        return redirect()->back()
            ->with('success', "Service {$status} successfully!");
    }

    /**
     * Toggle service featured status.
     */
    public function toggleFeatured(InfluencerService $service): RedirectResponse
    {
        // Ensure user can only toggle their own services
        if ($service->user_id !== Auth::id()) {
            abort(403, 'Access denied.');
        }

        $service->update(['is_featured' => !$service->is_featured]);

        $status = $service->is_featured ? 'featured' : 'unfeatured';
        return redirect()->back()
            ->with('success', "Service {$status} successfully!");
    }
}