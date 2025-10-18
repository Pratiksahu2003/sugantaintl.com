@extends('layouts.admin')

@section('title', 'Edit Collaboration')
@section('description', 'Edit collaboration details')
@section('page-title', 'Edit Collaboration')

@section('content')
<div class="fade-in">
    <!-- Header -->
    <div style="margin-bottom: 2rem;">
        <div style="display: flex; align-items: center; justify-content: space-between;">
            <div>
                <h1 style="font-size: 1.875rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.5rem;">
                    Edit Collaboration
                </h1>
                <p style="color: var(--text-secondary);">Update collaboration details and information.</p>
            </div>
            
            <a href="{{ route('influencer.collaborations.show', $collaboration) }}" 
               style="padding: 0.5rem 1rem; border: 1px solid var(--border-color); border-radius: 0.375rem; color: var(--text-primary); text-decoration: none; transition: all 0.2s;">
                <i class="fas fa-arrow-left" style="margin-right: 0.5rem;"></i>Back to View
            </a>
        </div>
    </div>

    <form method="POST" action="{{ route('influencer.collaborations.update', $collaboration) }}" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 2rem;">
        @csrf
        @method('PUT')

        <!-- Basic Information -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Basic Information</h3>
            </div>
            <div class="card-body">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div>
                        <label for="collaboration_type_id" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Collaboration Type *</label>
                        <select id="collaboration_type_id" name="collaboration_type_id" required
                                style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                            <option value="">Select Collaboration Type</option>
                            @foreach($collaborationTypes as $type)
                                <option value="{{ $type->id }}" {{ old('collaboration_type_id', $collaboration->collaboration_type_id) == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                            @endforeach
                        </select>
                        @error('collaboration_type_id')
                            <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="title" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Collaboration Title *</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $collaboration->title) }}" required
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                        @error('title')
                            <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div style="margin-top: 1.5rem;">
                    <label for="description" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Description *</label>
                    <textarea id="description" name="description" rows="4" required
                              style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s; resize: vertical;">{{ old('description', $collaboration->description) }}</textarea>
                    @error('description')
                        <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                    @enderror
                </div>

                <div style="margin-top: 1.5rem;">
                    <label for="brief" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Brief</label>
                    <textarea id="brief" name="brief" rows="3"
                              style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s; resize: vertical;">{{ old('brief', $collaboration->brief) }}</textarea>
                    <p style="color: var(--text-secondary); font-size: 0.75rem; margin-top: 0.25rem;">Additional details about the collaboration</p>
                    @error('brief')
                        <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Collaboration Details -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Collaboration Details</h3>
            </div>
            <div class="card-body">
                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1.5rem;">
                    <div>
                        <label for="status" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Status *</label>
                        <select id="status" name="status" required
                                style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                            <option value="">Select Status</option>
                            @foreach($statuses as $key => $label)
                                <option value="{{ $key }}" {{ old('status', $collaboration->status) == $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('status')
                            <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="collaboration_mode" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Collaboration Mode *</label>
                        <select id="collaboration_mode" name="collaboration_mode" required
                                style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                            <option value="">Select Mode</option>
                            @foreach($modes as $key => $label)
                                <option value="{{ $key }}" {{ old('collaboration_mode', $collaboration->collaboration_mode) == $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('collaboration_mode')
                            <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="currency" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Currency *</label>
                        <select id="currency" name="currency" required
                                style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                            @foreach(\App\Services\CurrencyService::getCurrencies() as $code => $currency)
                                <option value="{{ $code }}" {{ old('currency', $collaboration->currency) == $code ? 'selected' : '' }}>
                                    {{ $code }} - {{ $currency['name'] }}
                                </option>
                            @endforeach
                        </select>
                        @error('currency')
                            <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-top: 1.5rem;">
                    <div>
                        <label for="budget_min" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Minimum Budget</label>
                        <input type="number" id="budget_min" name="budget_min" step="0.01" min="0" value="{{ old('budget_min', $collaboration->budget_min) }}"
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                        @error('budget_min')
                            <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="budget_max" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Maximum Budget</label>
                        <input type="number" id="budget_max" name="budget_max" step="0.01" min="0" value="{{ old('budget_max', $collaboration->budget_max) }}"
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                        @error('budget_max')
                            <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Timeline Information -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Timeline Information</h3>
            </div>
            <div class="card-body">
                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1.5rem;">
                    <div>
                        <label for="start_date" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Start Date</label>
                        <input type="date" id="start_date" name="start_date" value="{{ old('start_date', $collaboration->start_date?->format('Y-m-d')) }}"
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                        @error('start_date')
                            <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="end_date" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">End Date</label>
                        <input type="date" id="end_date" name="end_date" value="{{ old('end_date', $collaboration->end_date?->format('Y-m-d')) }}"
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                        @error('end_date')
                            <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="deadline" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Application Deadline</label>
                        <input type="date" id="deadline" name="deadline" value="{{ old('deadline', $collaboration->deadline?->format('Y-m-d')) }}"
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                        @error('deadline')
                            <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div style="margin-top: 1.5rem;">
                    <label for="duration_days" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Duration (Days)</label>
                    <input type="number" id="duration_days" name="duration_days" min="1" value="{{ old('duration_days', $collaboration->duration_days) }}"
                           style="width: 200px; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                    <p style="color: var(--text-secondary); font-size: 0.75rem; margin-top: 0.25rem;">Expected duration of the collaboration</p>
                    @error('duration_days')
                        <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                    @enderror
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
                    @foreach($platforms as $key => $label)
                        <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; padding: 0.5rem; border: 1px solid var(--border-color); border-radius: 0.375rem; transition: all 0.2s;">
                            <input type="checkbox" name="social_platforms[]" value="{{ $key }}" {{ in_array($key, old('social_platforms', $collaboration->social_platforms ?? [])) ? 'checked' : '' }}
                                   style="width: 1rem; height: 1rem;">
                            <span style="font-weight: 500; color: var(--text-primary);">{{ $label }}</span>
                        </label>
                    @endforeach
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
                <!-- Current Images -->
                @if($collaboration->thumbnail_image || ($collaboration->gallery_images && count($collaboration->gallery_images) > 0))
                    <div style="margin-bottom: 1.5rem;">
                        <h4 style="font-size: 1rem; font-weight: 600; color: var(--text-primary); margin-bottom: 1rem;">Current Images</h4>
                        
                        @if($collaboration->thumbnail_image)
                            <div style="margin-bottom: 1rem;">
                                <p style="font-size: 0.875rem; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Thumbnail:</p>
                                <img src="{{ $collaboration->thumbnail_url }}" alt="Current thumbnail" 
                                     style="width: 200px; height: 120px; object-fit: cover; border-radius: 0.375rem; border: 1px solid var(--border-color);">
                            </div>
                        @endif

                        @if($collaboration->gallery_images && count($collaboration->gallery_images) > 0)
                            <div>
                                <p style="font-size: 0.875rem; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Gallery:</p>
                                <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                                    @foreach($collaboration->gallery_urls as $imageUrl)
                                        <img src="{{ $imageUrl }}" alt="Gallery image" 
                                             style="width: 100px; height: 100px; object-fit: cover; border-radius: 0.375rem; border: 1px solid var(--border-color);">
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                @endif

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div>
                        <label for="thumbnail_image" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">New Thumbnail Image</label>
                        <input type="file" id="thumbnail_image" name="thumbnail_image" accept="image/*"
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                        <p style="color: var(--text-secondary); font-size: 0.75rem; margin-top: 0.25rem;">Replace thumbnail image (max 2MB)</p>
                        @error('thumbnail_image')
                            <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="gallery_images" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">New Gallery Images</label>
                        <input type="file" id="gallery_images" name="gallery_images[]" accept="image/*" multiple
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; font-size: 0.875rem; transition: all 0.2s;">
                        <p style="color: var(--text-secondary); font-size: 0.75rem; margin-top: 0.25rem;">Add more gallery images (max 5 images, 2MB each)</p>
                        @error('gallery_images.*')
                            <p style="color: var(--danger-color); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Collaboration Settings -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Collaboration Settings</h3>
            </div>
            <div class="card-body">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                    <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; padding: 0.5rem; border: 1px solid var(--border-color); border-radius: 0.375rem; transition: all 0.2s;">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $collaboration->is_featured) ? 'checked' : '' }}
                               style="width: 1rem; height: 1rem;">
                        <span style="font-weight: 500; color: var(--text-primary);">Featured Collaboration</span>
                    </label>
                    
                    <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; padding: 0.5rem; border: 1px solid var(--border-color); border-radius: 0.375rem; transition: all 0.2s;">
                        <input type="checkbox" name="is_urgent" value="1" {{ old('is_urgent', $collaboration->is_urgent) ? 'checked' : '' }}
                               style="width: 1rem; height: 1rem;">
                        <span style="font-weight: 500; color: var(--text-primary);">Urgent Collaboration</span>
                    </label>
                    
                    <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; padding: 0.5rem; border: 1px solid var(--border-color); border-radius: 0.375rem; transition: all 0.2s;">
                        <input type="checkbox" name="requires_approval" value="1" {{ old('requires_approval', $collaboration->requires_approval) ? 'checked' : '' }}
                               style="width: 1rem; height: 1rem;">
                        <span style="font-weight: 500; color: var(--text-primary);">Requires Approval</span>
                    </label>
                    
                    <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; padding: 0.5rem; border: 1px solid var(--border-color); border-radius: 0.375rem; transition: all 0.2s;">
                        <input type="checkbox" name="is_exclusive" value="1" {{ old('is_exclusive', $collaboration->is_exclusive) ? 'checked' : '' }}
                               style="width: 1rem; height: 1rem;">
                        <span style="font-weight: 500; color: var(--text-primary);">Exclusive Collaboration</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div style="display: flex; justify-content: flex-end; gap: 1rem;">
            <a href="{{ route('influencer.collaborations.show', $collaboration) }}" 
               style="padding: 0.75rem 1.5rem; border: 1px solid var(--border-color); border-radius: 0.5rem; color: var(--text-primary); text-decoration: none; transition: all 0.2s;">
                Cancel
            </a>
            <button type="submit" 
                    style="padding: 0.75rem 1.5rem; background: var(--primary-color); color: white; border: none; border-radius: 0.5rem; font-weight: 500; cursor: pointer; transition: all 0.2s;">
                <i class="fas fa-save" style="margin-right: 0.5rem;"></i>Update Collaboration
            </button>
        </div>
    </form>
</div>

<script>
// Auto-set end date when start date changes
document.getElementById('start_date').addEventListener('change', function() {
    const startDate = new Date(this.value);
    const endDateInput = document.getElementById('end_date');
    
    if (startDate && !endDateInput.value) {
        // Set end date to 30 days after start date
        const endDate = new Date(startDate);
        endDate.setDate(endDate.getDate() + 30);
        endDateInput.value = endDate.toISOString().split('T')[0];
    }
});

// Validate budget range
document.getElementById('budget_max').addEventListener('input', function() {
    const minBudget = parseFloat(document.getElementById('budget_min').value) || 0;
    const maxBudget = parseFloat(this.value) || 0;
    
    if (maxBudget > 0 && minBudget > 0 && maxBudget < minBudget) {
        this.setCustomValidity('Maximum budget must be greater than or equal to minimum budget');
    } else {
        this.setCustomValidity('');
    }
});

document.getElementById('budget_min').addEventListener('input', function() {
    const minBudget = parseFloat(this.value) || 0;
    const maxBudget = parseFloat(document.getElementById('budget_max').value) || 0;
    
    if (maxBudget > 0 && minBudget > 0 && maxBudget < minBudget) {
        document.getElementById('budget_max').setCustomValidity('Maximum budget must be greater than or equal to minimum budget');
    } else {
        document.getElementById('budget_max').setCustomValidity('');
    }
});
</script>
@endsection
