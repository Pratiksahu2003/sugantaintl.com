<?php

namespace App\Http\Controllers\Influencer;

use App\Http\Controllers\Controller;
use App\Models\InfluencerCollaboration;
use App\Models\CollaborationType;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CollaborationController extends Controller
{
    /**
     * Display a listing of the user's collaborations.
     */
    public function index(): View
    {
        $collaborations = Auth::user()->influencerCollaborations()
            ->with('collaborationType')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('influencer.collaborations.index', compact('collaborations'));
    }

    /**
     * Show the form for creating a new collaboration.
     */
    public function create(): View
    {
        $collaborationTypes = CollaborationType::active()->ordered()->get();
        $modes = InfluencerCollaboration::getModes();
        $statuses = InfluencerCollaboration::getStatuses();
        $platforms = InfluencerCollaboration::getPlatforms();
        
        return view('influencer.collaborations.create', compact('collaborationTypes', 'modes', 'statuses', 'platforms'));
    }

    /**
     * Store a newly created collaboration.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'collaboration_type_id' => 'required|exists:collaboration_types,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'brief' => 'nullable|string',
            'status' => 'required|string',
            'collaboration_mode' => 'required|string',
            'budget_min' => 'nullable|numeric|min:0',
            'budget_max' => 'nullable|numeric|min:0|gte:budget_min',
            'currency' => 'required|string|size:3',
            'start_date' => 'nullable|date|after_or_equal:today',
            'end_date' => 'nullable|date|after:start_date',
            'deadline' => 'nullable|date|after_or_equal:today',
            'duration_days' => 'nullable|integer|min:1',
            'tags' => 'nullable|array',
            'social_platforms' => 'nullable|array',
            'target_audience' => 'nullable|array',
            'deliverables' => 'nullable|array',
            'requirements' => 'nullable|array',
            'timeline' => 'nullable|array',
            'content_guidelines' => 'nullable|array',
            'brand_guidelines' => 'nullable|array',
            'hashtags' => 'nullable|array',
            'mentions' => 'nullable|array',
            'exclusivity_terms' => 'nullable|array',
            'usage_rights' => 'nullable|array',
            'revision_policy' => 'nullable|array',
            'cancellation_policy' => 'nullable|array',
            'payment_terms' => 'nullable|array',
            'contract_terms' => 'nullable|array',
            'pricing_details' => 'nullable|array',
            'testimonials' => 'nullable|array',
            'case_studies' => 'nullable|array',
            'additional_info' => 'nullable|array',
            'thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_urgent'] = $request->has('is_urgent');
        $validated['requires_approval'] = $request->has('requires_approval');
        $validated['is_exclusive'] = $request->has('is_exclusive');

        // Handle thumbnail image upload
        if ($request->hasFile('thumbnail_image')) {
            $validated['thumbnail_image'] = $request->file('thumbnail_image')->store('collaborations/thumbnails', 'public');
        }

        // Handle gallery images upload
        if ($request->hasFile('gallery_images')) {
            $galleryImages = [];
            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $image->store('collaborations/gallery', 'public');
            }
            $validated['gallery_images'] = $galleryImages;
        }

        InfluencerCollaboration::create($validated);

        return redirect()->route('influencer.collaborations.index')
            ->with('success', 'Collaboration created successfully!');
    }

    /**
     * Display the specified collaboration.
     */
    public function show(InfluencerCollaboration $collaboration): View
    {
        // Ensure user can only view their own collaborations
        if ($collaboration->user_id !== Auth::id()) {
            abort(403, 'Access denied.');
        }

        $collaboration->load('collaborationType');

        return view('influencer.collaborations.show', compact('collaboration'));
    }

    /**
     * Show the form for editing the specified collaboration.
     */
    public function edit(InfluencerCollaboration $collaboration): View
    {
        // Ensure user can only edit their own collaborations
        if ($collaboration->user_id !== Auth::id()) {
            abort(403, 'Access denied.');
        }

        $collaborationTypes = CollaborationType::active()->ordered()->get();
        $modes = InfluencerCollaboration::getModes();
        $statuses = InfluencerCollaboration::getStatuses();
        $platforms = InfluencerCollaboration::getPlatforms();

        return view('influencer.collaborations.edit', compact('collaboration', 'collaborationTypes', 'modes', 'statuses', 'platforms'));
    }

    /**
     * Update the specified collaboration.
     */
    public function update(Request $request, InfluencerCollaboration $collaboration): RedirectResponse
    {
        // Ensure user can only update their own collaborations
        if ($collaboration->user_id !== Auth::id()) {
            abort(403, 'Access denied.');
        }

        $validated = $request->validate([
            'collaboration_type_id' => 'required|exists:collaboration_types,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'brief' => 'nullable|string',
            'status' => 'required|string',
            'collaboration_mode' => 'required|string',
            'budget_min' => 'nullable|numeric|min:0',
            'budget_max' => 'nullable|numeric|min:0|gte:budget_min',
            'currency' => 'required|string|size:3',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'deadline' => 'nullable|date',
            'duration_days' => 'nullable|integer|min:1',
            'tags' => 'nullable|array',
            'social_platforms' => 'nullable|array',
            'target_audience' => 'nullable|array',
            'deliverables' => 'nullable|array',
            'requirements' => 'nullable|array',
            'timeline' => 'nullable|array',
            'content_guidelines' => 'nullable|array',
            'brand_guidelines' => 'nullable|array',
            'hashtags' => 'nullable|array',
            'mentions' => 'nullable|array',
            'exclusivity_terms' => 'nullable|array',
            'usage_rights' => 'nullable|array',
            'revision_policy' => 'nullable|array',
            'cancellation_policy' => 'nullable|array',
            'payment_terms' => 'nullable|array',
            'contract_terms' => 'nullable|array',
            'pricing_details' => 'nullable|array',
            'testimonials' => 'nullable|array',
            'case_studies' => 'nullable|array',
            'additional_info' => 'nullable|array',
            'thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_urgent'] = $request->has('is_urgent');
        $validated['requires_approval'] = $request->has('requires_approval');
        $validated['is_exclusive'] = $request->has('is_exclusive');

        // Handle thumbnail image upload
        if ($request->hasFile('thumbnail_image')) {
            // Delete old thumbnail
            if ($collaboration->thumbnail_image) {
                Storage::disk('public')->delete($collaboration->thumbnail_image);
            }
            $validated['thumbnail_image'] = $request->file('thumbnail_image')->store('collaborations/thumbnails', 'public');
        }

        // Handle gallery images upload
        if ($request->hasFile('gallery_images')) {
            // Delete old gallery images
            if ($collaboration->gallery_images) {
                foreach ($collaboration->gallery_images as $image) {
                    Storage::disk('public')->delete($image);
                }
            }
            $galleryImages = [];
            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $image->store('collaborations/gallery', 'public');
            }
            $validated['gallery_images'] = $galleryImages;
        }

        $collaboration->update($validated);

        return redirect()->route('influencer.collaborations.index')
            ->with('success', 'Collaboration updated successfully!');
    }

    /**
     * Remove the specified collaboration.
     */
    public function destroy(InfluencerCollaboration $collaboration): RedirectResponse
    {
        // Ensure user can only delete their own collaborations
        if ($collaboration->user_id !== Auth::id()) {
            abort(403, 'Access denied.');
        }

        // Delete associated images
        if ($collaboration->thumbnail_image) {
            Storage::disk('public')->delete($collaboration->thumbnail_image);
        }
        if ($collaboration->gallery_images) {
            foreach ($collaboration->gallery_images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $collaboration->delete();

        return redirect()->route('influencer.collaborations.index')
            ->with('success', 'Collaboration deleted successfully!');
    }

    /**
     * Toggle collaboration featured status.
     */
    public function toggleFeatured(InfluencerCollaboration $collaboration): RedirectResponse
    {
        // Ensure user can only toggle their own collaborations
        if ($collaboration->user_id !== Auth::id()) {
            abort(403, 'Access denied.');
        }

        $collaboration->update(['is_featured' => !$collaboration->is_featured]);

        $status = $collaboration->is_featured ? 'featured' : 'unfeatured';
        return redirect()->back()
            ->with('success', "Collaboration {$status} successfully!");
    }

    /**
     * Toggle collaboration urgent status.
     */
    public function toggleUrgent(InfluencerCollaboration $collaboration): RedirectResponse
    {
        // Ensure user can only toggle their own collaborations
        if ($collaboration->user_id !== Auth::id()) {
            abort(403, 'Access denied.');
        }

        $collaboration->update(['is_urgent' => !$collaboration->is_urgent]);

        $status = $collaboration->is_urgent ? 'marked as urgent' : 'unmarked as urgent';
        return redirect()->back()
            ->with('success', "Collaboration {$status} successfully!");
    }

    /**
     * Update collaboration status.
     */
    public function updateStatus(Request $request, InfluencerCollaboration $collaboration): RedirectResponse
    {
        // Ensure user can only update their own collaborations
        if ($collaboration->user_id !== Auth::id()) {
            abort(403, 'Access denied.');
        }

        $validated = $request->validate([
            'status' => 'required|string|in:open,in_progress,completed,cancelled,paused',
        ]);

        $collaboration->update($validated);

        return redirect()->back()
            ->with('success', 'Collaboration status updated successfully!');
    }
}