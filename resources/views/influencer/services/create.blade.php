@extends('layouts.admin')

@section('title', 'Create Service')
@section('description', 'Create a new influencer service')
@section('page-title', 'Create Service')

@section('content')
<div class="fade-in">
    <!-- Header -->
    <div style="margin-bottom: 2rem;">
        <div style="display: flex; align-items: center; justify-content: space-between;">
            <div>
                <h1 style="font-size: 1.875rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.5rem;">
                    Create New Service
                </h1>
                <p style="color: var(--text-secondary);">Add a new service to showcase your skills and attract clients.</p>
            </div>
            
            <a href="{{ route('influencer.services.index') }}" 
               style="padding: 0.5rem 1rem; border: 1px solid var(--border-color); border-radius: 0.375rem; color: var(--text-primary); text-decoration: none; transition: all 0.2s;">
                <i class="fas fa-arrow-left" style="margin-right: 0.5rem;"></i>Back to Services
            </a>
        </div>
    </div>

    <form method="POST" action="{{ route('influencer.services.store') }}" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 2rem;">
        @csrf

        <!-- Basic Information -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Basic Information</h3>
            </div>
            <div class="card-body">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div>
                        <label for="service_name" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Service Name *</label>
                        <input type="text" id="service_name" name="service_name" value="{{ old('service_name') }}" required
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                        @error('service_name')
                            <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                    
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
                </div>

                <div style="margin-top: 1.5rem;">
                    <label for="service_type" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Service Type *</label>
                    <select id="service_type" name="service_type" required
                            style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                        <option value="">Select Service Type</option>
                        @foreach($serviceTypes as $key => $label)
                            <option value="{{ $key }}" {{ old('service_type') == $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('service_type')
                        <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                    @enderror
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
                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1.5rem;">
                    <div>
                        <label for="base_price" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Base Price *</label>
                        <input type="number" id="base_price" name="base_price" step="0.01" min="0" value="{{ old('base_price') }}" required
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                        @error('base_price')
                            <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="currency" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Currency *</label>
                        <select id="currency" name="currency" required
                                style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                            @foreach(\App\Services\CurrencyService::getCurrencies() as $code => $currency)
                                <option value="{{ $code }}" {{ old('currency', 'USD') == $code ? 'selected' : '' }}>
                                    {{ $code }} - {{ $currency['name'] }}
                                </option>
                            @endforeach
                        </select>
                        @error('currency')
                            <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="delivery_time_days" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Delivery Time (Days) *</label>
                        <input type="number" id="delivery_time_days" name="delivery_time_days" min="1" value="{{ old('delivery_time_days', 7) }}" required
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                        @error('delivery_time_days')
                            <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div style="margin-top: 1.5rem;">
                    <label for="revision_limit" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Revision Limit</label>
                    <input type="number" id="revision_limit" name="revision_limit" min="0" value="{{ old('revision_limit', 2) }}"
                           style="width: 200px; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                    <p style="color: var(--text-secondary); font-size: 0.75rem; margin-top: 0.25rem;">Number of revisions included in the base price</p>
                    @error('revision_limit')
                        <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                    @enderror
                </div>
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
                        <p style="color: var(--text-secondary); font-size: 0.75rem; margin-top: 0.25rem;">Main image for your service (max 2MB)</p>
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

        <!-- Service Settings -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Service Settings</h3>
            </div>
            <div class="card-body">
                <div style="display: flex; gap: 2rem;">
                    <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                               style="width: 1rem; height: 1rem;">
                        <span style="font-weight: 500; color: var(--text-primary);">Active Service</span>
                    </label>
                    
                    <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                               style="width: 1rem; height: 1rem;">
                        <span style="font-weight: 500; color: var(--text-primary);">Featured Service</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div style="display: flex; justify-content: flex-end; gap: 1rem;">
            <a href="{{ route('influencer.services.index') }}" 
               style="padding: 0.75rem 1.5rem; border: 1px solid var(--border-color); border-radius: 0.5rem; color: var(--text-primary); text-decoration: none; transition: all 0.2s;">
                Cancel
            </a>
            <button type="submit" 
                    style="padding: 0.75rem 1.5rem; background: var(--primary-color); color: white; border: none; border-radius: 0.5rem; font-weight: 500; cursor: pointer; transition: all 0.2s;">
                <i class="fas fa-save" style="margin-right: 0.5rem;"></i>Create Service
            </button>
        </div>
    </form>
</div>
@endsection
