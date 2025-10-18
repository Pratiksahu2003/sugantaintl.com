@extends('layouts.admin')

@section('title', 'Create Package')
@section('description', 'Create a new influencer package')
@section('page-title', 'Create Package')

@section('content')
<div class="fade-in">
    <!-- Header -->
    <div style="margin-bottom: 2rem;">
        <div style="display: flex; align-items: center; justify-content: space-between;">
            <div>
                <h1 style="font-size: 1.875rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.5rem;">
                    Create New Package
                </h1>
                <p style="color: var(--text-secondary);">Add a new package to offer comprehensive promotional deals to clients.</p>
            </div>
            
            <a href="{{ route('influencer.packages.index') }}" 
               style="padding: 0.5rem 1rem; border: 1px solid var(--border-color); border-radius: 0.375rem; color: var(--text-primary); text-decoration: none; transition: all 0.2s;">
                <i class="fas fa-arrow-left" style="margin-right: 0.5rem;"></i>Back to Packages
            </a>
        </div>
    </div>

    <form method="POST" action="{{ route('influencer.packages.store') }}" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 2rem;">
        @csrf

        <!-- Basic Information -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Basic Information</h3>
            </div>
            <div class="card-body">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div>
                        <label for="package_name" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Package Name *</label>
                        <input type="text" id="package_name" name="package_name" value="{{ old('package_name') }}" required
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                        @error('package_name')
                            <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="package_type" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Package Type *</label>
                        <select id="package_type" name="package_type" required
                                style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                            <option value="">Select Package Type</option>
                            @foreach($packageTypes as $key => $label)
                                <option value="{{ $key }}" {{ old('package_type') == $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('package_type')
                            <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-top: 1.5rem;">
                    <div>
                        <label for="category" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Category *</label>
                        <select id="category" name="category" required
                                style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                            <option value="">Select Category</option>
                            @foreach($categories as $key => $label)
                                <option value="{{ $key }}" {{ old('category') == $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="pricing_model" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Pricing Model *</label>
                        <select id="pricing_model" name="pricing_model" required
                                style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                            <option value="">Select Pricing Model</option>
                            @foreach($pricingModels as $key => $label)
                                <option value="{{ $key }}" {{ old('pricing_model') == $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('pricing_model')
                            <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div style="margin-top: 1.5rem;">
                    <label for="description" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Description *</label>
                    <textarea id="description" name="description" rows="4" required
                              style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s; resize: vertical;">{{ old('description') }}</textarea>
                    @error('description')
                        <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Pricing Information -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pricing Information</h3>
            </div>
            <div class="card-body">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div>
                        <label for="price" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Price *</label>
                        <input type="number" id="price" name="price" step="0.01" min="0" value="{{ old('price') }}" required
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                        @error('price')
                            <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="currency" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Currency *</label>
                        <select id="currency" name="currency" required
                                style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                            <option value="USD" {{ old('currency', 'USD') == 'USD' ? 'selected' : '' }}>USD</option>
                            <option value="EUR" {{ old('currency') == 'EUR' ? 'selected' : '' }}>EUR</option>
                            <option value="GBP" {{ old('currency') == 'GBP' ? 'selected' : '' }}>GBP</option>
                            <option value="INR" {{ old('currency') == 'INR' ? 'selected' : '' }}>INR</option>
                        </select>
                        @error('currency')
                            <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div style="margin-top: 1.5rem;">
                    <label for="duration_days" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Duration (Days)</label>
                    <input type="number" id="duration_days" name="duration_days" min="1" value="{{ old('duration_days') }}"
                           style="width: 200px; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                    <p style="color: var(--text-secondary); font-size: 0.75rem; margin-top: 0.25rem;">Package duration in days</p>
                    @error('duration_days')
                        <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Content Counts -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Content Counts</h3>
            </div>
            <div class="card-body">
                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1.5rem;">
                    <div>
                        <label for="post_count" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Post Count</label>
                        <input type="number" id="post_count" name="post_count" min="0" value="{{ old('post_count') }}"
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                        <p style="color: var(--text-secondary); font-size: 0.75rem; margin-top: 0.25rem;">Number of posts included</p>
                        @error('post_count')
                            <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="story_count" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Story Count</label>
                        <input type="number" id="story_count" name="story_count" min="0" value="{{ old('story_count') }}"
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                        <p style="color: var(--text-secondary); font-size: 0.75rem; margin-top: 0.25rem;">Number of stories included</p>
                        @error('story_count')
                            <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="reel_count" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Reel Count</label>
                        <input type="number" id="reel_count" name="reel_count" min="0" value="{{ old('reel_count') }}"
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                        <p style="color: var(--text-secondary); font-size: 0.75rem; margin-top: 0.25rem;">Number of reels included</p>
                        @error('reel_count')
                            <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Social Platforms -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Social Platforms</h3>
            </div>
            <div class="card-body">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                    <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; padding: 0.5rem; border: 1px solid var(--border-color); border-radius: 0.375rem; transition: all 0.2s;">
                        <input type="checkbox" name="social_platforms[]" value="instagram" {{ in_array('instagram', old('social_platforms', [])) ? 'checked' : '' }}
                               style="width: 1rem; height: 1rem;">
                        <span style="font-weight: 500; color: var(--text-primary);">Instagram</span>
                    </label>
                    
                    <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; padding: 0.5rem; border: 1px solid var(--border-color); border-radius: 0.375rem; transition: all 0.2s;">
                        <input type="checkbox" name="social_platforms[]" value="facebook" {{ in_array('facebook', old('social_platforms', [])) ? 'checked' : '' }}
                               style="width: 1rem; height: 1rem;">
                        <span style="font-weight: 500; color: var(--text-primary);">Facebook</span>
                    </label>
                    
                    <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; padding: 0.5rem; border: 1px solid var(--border-color); border-radius: 0.375rem; transition: all 0.2s;">
                        <input type="checkbox" name="social_platforms[]" value="twitter" {{ in_array('twitter', old('social_platforms', [])) ? 'checked' : '' }}
                               style="width: 1rem; height: 1rem;">
                        <span style="font-weight: 500; color: var(--text-primary);">Twitter</span>
                    </label>
                    
                    <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; padding: 0.5rem; border: 1px solid var(--border-color); border-radius: 0.375rem; transition: all 0.2s;">
                        <input type="checkbox" name="social_platforms[]" value="tiktok" {{ in_array('tiktok', old('social_platforms', [])) ? 'checked' : '' }}
                               style="width: 1rem; height: 1rem;">
                        <span style="font-weight: 500; color: var(--text-primary);">TikTok</span>
                    </label>
                    
                    <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; padding: 0.5rem; border: 1px solid var(--border-color); border-radius: 0.375rem; transition: all 0.2s;">
                        <input type="checkbox" name="social_platforms[]" value="youtube" {{ in_array('youtube', old('social_platforms', [])) ? 'checked' : '' }}
                               style="width: 1rem; height: 1rem;">
                        <span style="font-weight: 500; color: var(--text-primary);">YouTube</span>
                    </label>
                    
                    <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; padding: 0.5rem; border: 1px solid var(--border-color); border-radius: 0.375rem; transition: all 0.2s;">
                        <input type="checkbox" name="social_platforms[]" value="linkedin" {{ in_array('linkedin', old('social_platforms', [])) ? 'checked' : '' }}
                               style="width: 1rem; height: 1rem;">
                        <span style="font-weight: 500; color: var(--text-primary);">LinkedIn</span>
                    </label>
                </div>
                @error('social_platforms')
                    <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.5rem;">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Media Upload -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Media Upload</h3>
            </div>
            <div class="card-body">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div>
                        <label for="thumbnail_image" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Thumbnail Image</label>
                        <input type="file" id="thumbnail_image" name="thumbnail_image" accept="image/*"
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                        <p style="color: var(--text-secondary); font-size: 0.75rem; margin-top: 0.25rem;">Main image for your package (max 2MB)</p>
                        @error('thumbnail_image')
                            <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="gallery_images" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Gallery Images</label>
                        <input type="file" id="gallery_images" name="gallery_images[]" accept="image/*" multiple
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                        <p style="color: var(--text-secondary); font-size: 0.75rem; margin-top: 0.25rem;">Portfolio images (max 5 images, 2MB each)</p>
                        @error('gallery_images.*')
                            <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Package Settings -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Package Settings</h3>
            </div>
            <div class="card-body">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                    <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; padding: 0.5rem; border: 1px solid var(--border-color); border-radius: 0.375rem; transition: all 0.2s;">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                               style="width: 1rem; height: 1rem;">
                        <span style="font-weight: 500; color: var(--text-primary);">Active Package</span>
                    </label>
                    
                    <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; padding: 0.5rem; border: 1px solid var(--border-color); border-radius: 0.375rem; transition: all 0.2s;">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                               style="width: 1rem; height: 1rem;">
                        <span style="font-weight: 500; color: var(--text-primary);">Featured Package</span>
                    </label>
                    
                    <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; padding: 0.5rem; border: 1px solid var(--border-color); border-radius: 0.375rem; transition: all 0.2s;">
                        <input type="checkbox" name="is_custom" value="1" {{ old('is_custom') ? 'checked' : '' }}
                               style="width: 1rem; height: 1rem;">
                        <span style="font-weight: 500; color: var(--text-primary);">Custom Package</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div style="display: flex; justify-content: flex-end; gap: 1rem;">
            <a href="{{ route('influencer.packages.index') }}" 
               style="padding: 0.75rem 1.5rem; border: 1px solid var(--border-color); border-radius: 0.5rem; color: var(--text-primary); text-decoration: none; transition: all 0.2s;">
                Cancel
            </a>
            <button type="submit" 
                    style="padding: 0.75rem 1.5rem; background: var(--primary-color); color: white; border: none; border-radius: 0.5rem; font-weight: 500; cursor: pointer; transition: all 0.2s;">
                <i class="fas fa-save" style="margin-right: 0.5rem;"></i>Create Package
            </button>
        </div>
    </form>
</div>
@endsection
