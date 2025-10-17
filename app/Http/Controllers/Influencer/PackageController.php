<?php

namespace App\Http\Controllers\Influencer;

use App\Http\Controllers\Controller;
use App\Models\InfluencerPackage;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    /**
     * Display a listing of the user's packages.
     */
    public function index(): View
    {
        $packages = Auth::user()->influencerPackages()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('influencer.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new package.
     */
    public function create(): View
    {
        $packageTypes = InfluencerPackage::getPackageTypes();
        $categories = InfluencerPackage::getCategories();
        $pricingModels = InfluencerPackage::getPricingModels();
        
        return view('influencer.packages.create', compact('packageTypes', 'categories', 'pricingModels'));
    }

    /**
     * Store a newly created package.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'package_name' => 'required|string|max:255',
            'description' => 'required|string',
            'package_type' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|numeric|min:0',
            'currency' => 'required|string|size:3',
            'pricing_model' => 'required|string',
            'duration_days' => 'nullable|integer|min:1',
            'post_count' => 'nullable|integer|min:0',
            'story_count' => 'nullable|integer|min:0',
            'reel_count' => 'nullable|integer|min:0',
            'tags' => 'nullable|array',
            'social_platforms' => 'nullable|array',
            'target_audience' => 'nullable|array',
            'included_services' => 'nullable|array',
            'deliverables' => 'nullable|array',
            'requirements' => 'nullable|array',
            'add_ons' => 'nullable|array',
            'pricing_breakdown' => 'nullable|array',
            'testimonials' => 'nullable|array',
            'case_studies' => 'nullable|array',
            'additional_info' => 'nullable|array',
            'thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['is_active'] = $request->has('is_active');
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_custom'] = $request->has('is_custom');

        // Handle thumbnail image upload
        if ($request->hasFile('thumbnail_image')) {
            $validated['thumbnail_image'] = $request->file('thumbnail_image')->store('packages/thumbnails', 'public');
        }

        // Handle gallery images upload
        if ($request->hasFile('gallery_images')) {
            $galleryImages = [];
            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $image->store('packages/gallery', 'public');
            }
            $validated['gallery_images'] = $galleryImages;
        }

        InfluencerPackage::create($validated);

        return redirect()->route('influencer.packages.index')
            ->with('success', 'Package created successfully!');
    }

    /**
     * Display the specified package.
     */
    public function show(InfluencerPackage $package): View
    {
        // Ensure user can only view their own packages
        if ($package->user_id !== Auth::id()) {
            abort(403, 'Access denied.');
        }

        return view('influencer.packages.show', compact('package'));
    }

    /**
     * Show the form for editing the specified package.
     */
    public function edit(InfluencerPackage $package): View
    {
        // Ensure user can only edit their own packages
        if ($package->user_id !== Auth::id()) {
            abort(403, 'Access denied.');
        }

        $packageTypes = InfluencerPackage::getPackageTypes();
        $categories = InfluencerPackage::getCategories();
        $pricingModels = InfluencerPackage::getPricingModels();

        return view('influencer.packages.edit', compact('package', 'packageTypes', 'categories', 'pricingModels'));
    }

    /**
     * Update the specified package.
     */
    public function update(Request $request, InfluencerPackage $package): RedirectResponse
    {
        // Ensure user can only update their own packages
        if ($package->user_id !== Auth::id()) {
            abort(403, 'Access denied.');
        }

        $validated = $request->validate([
            'package_name' => 'required|string|max:255',
            'description' => 'required|string',
            'package_type' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|numeric|min:0',
            'currency' => 'required|string|size:3',
            'pricing_model' => 'required|string',
            'duration_days' => 'nullable|integer|min:1',
            'post_count' => 'nullable|integer|min:0',
            'story_count' => 'nullable|integer|min:0',
            'reel_count' => 'nullable|integer|min:0',
            'tags' => 'nullable|array',
            'social_platforms' => 'nullable|array',
            'target_audience' => 'nullable|array',
            'included_services' => 'nullable|array',
            'deliverables' => 'nullable|array',
            'requirements' => 'nullable|array',
            'add_ons' => 'nullable|array',
            'pricing_breakdown' => 'nullable|array',
            'testimonials' => 'nullable|array',
            'case_studies' => 'nullable|array',
            'additional_info' => 'nullable|array',
            'thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_custom'] = $request->has('is_custom');

        // Handle thumbnail image upload
        if ($request->hasFile('thumbnail_image')) {
            // Delete old thumbnail
            if ($package->thumbnail_image) {
                Storage::disk('public')->delete($package->thumbnail_image);
            }
            $validated['thumbnail_image'] = $request->file('thumbnail_image')->store('packages/thumbnails', 'public');
        }

        // Handle gallery images upload
        if ($request->hasFile('gallery_images')) {
            // Delete old gallery images
            if ($package->gallery_images) {
                foreach ($package->gallery_images as $image) {
                    Storage::disk('public')->delete($image);
                }
            }
            $galleryImages = [];
            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $image->store('packages/gallery', 'public');
            }
            $validated['gallery_images'] = $galleryImages;
        }

        $package->update($validated);

        return redirect()->route('influencer.packages.index')
            ->with('success', 'Package updated successfully!');
    }

    /**
     * Remove the specified package.
     */
    public function destroy(InfluencerPackage $package): RedirectResponse
    {
        // Ensure user can only delete their own packages
        if ($package->user_id !== Auth::id()) {
            abort(403, 'Access denied.');
        }

        // Delete associated images
        if ($package->thumbnail_image) {
            Storage::disk('public')->delete($package->thumbnail_image);
        }
        if ($package->gallery_images) {
            foreach ($package->gallery_images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $package->delete();

        return redirect()->route('influencer.packages.index')
            ->with('success', 'Package deleted successfully!');
    }

    /**
     * Toggle package active status.
     */
    public function toggleActive(InfluencerPackage $package): RedirectResponse
    {
        // Ensure user can only toggle their own packages
        if ($package->user_id !== Auth::id()) {
            abort(403, 'Access denied.');
        }

        $package->update(['is_active' => !$package->is_active]);

        $status = $package->is_active ? 'activated' : 'deactivated';
        return redirect()->back()
            ->with('success', "Package {$status} successfully!");
    }

    /**
     * Toggle package featured status.
     */
    public function toggleFeatured(InfluencerPackage $package): RedirectResponse
    {
        // Ensure user can only toggle their own packages
        if ($package->user_id !== Auth::id()) {
            abort(403, 'Access denied.');
        }

        $package->update(['is_featured' => !$package->is_featured]);

        $status = $package->is_featured ? 'featured' : 'unfeatured';
        return redirect()->back()
            ->with('success', "Package {$status} successfully!");
    }
}