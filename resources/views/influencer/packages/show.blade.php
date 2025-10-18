@extends('layouts.admin')

@section('title', 'View Package')
@section('description', 'View package details')
@section('page-title', 'View Package')

@section('content')
<div class="fade-in">
    <!-- Header -->
    <div style="margin-bottom: 2rem;">
        <div style="display: flex; align-items: center; justify-content: space-between;">
            <div>
                <h1 style="font-size: 1.875rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.5rem;">
                    {{ $package->package_name }}
                </h1>
                <p style="color: var(--text-secondary);">Package details and information.</p>
            </div>
            
            <div style="display: flex; gap: 0.75rem;">
                <a href="{{ route('influencer.packages.edit', $package) }}" 
                   style="padding: 0.5rem 1rem; background: var(--primary-color); color: white; border-radius: 0.375rem; text-decoration: none; transition: all 0.2s;">
                    <i class="fas fa-edit" style="margin-right: 0.5rem;"></i>Edit
                </a>
                <a href="{{ route('influencer.packages.index') }}" 
                   style="padding: 0.5rem 1rem; border: 1px solid var(--border-color); border-radius: 0.375rem; color: var(--text-primary); text-decoration: none; transition: all 0.2s;">
                    <i class="fas fa-arrow-left" style="margin-right: 0.5rem;"></i>Back to Packages
                </a>
            </div>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
        <!-- Main Content -->
        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            <!-- Package Image -->
            @if($package->thumbnail_image)
                <div class="card">
                    <div style="height: 300px; background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); position: relative; overflow: hidden; border-radius: 0.5rem;">
                        <img src="{{ $package->thumbnail_url }}" alt="{{ $package->package_name }}" 
                             style="width: 100%; height: 100%; object-fit: cover;">
                        @if($package->is_featured)
                            <div style="position: absolute; top: 1rem; right: 1rem; background: var(--warning-color); color: white; padding: 0.5rem 0.75rem; border-radius: 0.375rem; font-size: 0.875rem; font-weight: 600;">
                                <i class="fas fa-star"></i> Featured
                            </div>
                        @endif
                        @if($package->is_custom)
                            <div style="position: absolute; top: 1rem; left: 1rem; background: var(--success-color); color: white; padding: 0.5rem 0.75rem; border-radius: 0.375rem; font-size: 0.875rem; font-weight: 600;">
                                <i class="fas fa-cog"></i> Custom
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Description -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Description</h3>
                </div>
                <div class="card-body">
                    <p style="color: var(--text-primary); line-height: 1.6;">{{ $package->description }}</p>
                </div>
            </div>

            <!-- Gallery Images -->
            @if($package->gallery_images && count($package->gallery_images) > 0)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Gallery</h3>
                    </div>
                    <div class="card-body">
                        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1rem;">
                            @foreach($package->gallery_urls as $imageUrl)
                                <div style="aspect-ratio: 1; border-radius: 0.375rem; overflow: hidden;">
                                    <img src="{{ $imageUrl }}" alt="Gallery image" 
                                         style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.2s; cursor: pointer;"
                                         onclick="openImageModal('{{ $imageUrl }}')">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            <!-- Package Details -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Package Details</h3>
                </div>
                <div class="card-body">
                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        <div>
                            <span style="font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 0.05em;">Type</span>
                            <p style="font-weight: 500; color: var(--text-primary); margin-top: 0.25rem;">{{ ucfirst($package->package_type) }}</p>
                        </div>

                        <div>
                            <span style="font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 0.05em;">Category</span>
                            <p style="font-weight: 500; color: var(--text-primary); margin-top: 0.25rem;">{{ ucfirst(str_replace('_', ' ', $package->category)) }}</p>
                        </div>

                        <div>
                            <span style="font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 0.05em;">Pricing Model</span>
                            <p style="font-weight: 500; color: var(--text-primary); margin-top: 0.25rem;">{{ ucfirst(str_replace('_', ' ', $package->pricing_model)) }}</p>
                        </div>

                        <div>
                            <span style="font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 0.05em;">Price</span>
                            <p style="font-weight: 500; color: var(--primary-color); margin-top: 0.25rem; font-size: 1.25rem;">{{ $package->formatted_price }}</p>
                        </div>

                        @if($package->duration_days)
                            <div>
                                <span style="font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 0.05em;">Duration</span>
                                <p style="font-weight: 500; color: var(--text-primary); margin-top: 0.25rem;">{{ $package->duration_days }} days</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Content Counts -->
            @if($package->post_count || $package->story_count || $package->reel_count)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Content Included</h3>
                    </div>
                    <div class="card-body">
                        <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                            @if($package->post_count)
                                <div style="display: flex; align-items: center; gap: 0.75rem;">
                                    <i class="fas fa-image" style="color: var(--primary-color); width: 1rem;"></i>
                                    <div>
                                        <span style="font-size: 0.75rem; color: var(--text-secondary);">Posts</span>
                                        <p style="font-weight: 500; color: var(--text-primary); margin: 0;">{{ $package->post_count }}</p>
                                    </div>
                                </div>
                            @endif

                            @if($package->story_count)
                                <div style="display: flex; align-items: center; gap: 0.75rem;">
                                    <i class="fas fa-book-open" style="color: var(--success-color); width: 1rem;"></i>
                                    <div>
                                        <span style="font-size: 0.75rem; color: var(--text-secondary);">Stories</span>
                                        <p style="font-weight: 500; color: var(--text-primary); margin: 0;">{{ $package->story_count }}</p>
                                    </div>
                                </div>
                            @endif

                            @if($package->reel_count)
                                <div style="display: flex; align-items: center; gap: 0.75rem;">
                                    <i class="fas fa-video" style="color: var(--info-color); width: 1rem;"></i>
                                    <div>
                                        <span style="font-size: 0.75rem; color: var(--text-secondary);">Reels</span>
                                        <p style="font-weight: 500; color: var(--text-primary); margin: 0;">{{ $package->reel_count }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <!-- Social Platforms -->
            @if($package->social_platforms && count($package->social_platforms) > 0)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Social Platforms</h3>
                    </div>
                    <div class="card-body">
                        <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
                            @foreach($package->social_platforms as $platform)
                                <span style="background: var(--content-bg); color: var(--text-primary); padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem; font-weight: 500;">
                                    {{ ucfirst($platform) }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Status -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Status</h3>
                </div>
                <div class="card-body">
                    <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            @if($package->is_active)
                                <i class="fas fa-check-circle" style="color: var(--success-color);"></i>
                                <span style="font-size: 0.875rem; color: var(--text-primary);">Active Package</span>
                            @else
                                <i class="fas fa-times-circle" style="color: var(--danger-color);"></i>
                                <span style="font-size: 0.875rem; color: var(--text-primary);">Inactive Package</span>
                            @endif
                        </div>

                        @if($package->is_featured)
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <i class="fas fa-star" style="color: var(--warning-color);"></i>
                                <span style="font-size: 0.875rem; color: var(--text-primary);">Featured Package</span>
                            </div>
                        @endif

                        @if($package->is_custom)
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <i class="fas fa-cog" style="color: var(--info-color);"></i>
                                <span style="font-size: 0.875rem; color: var(--text-primary);">Custom Package</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div id="imageModal" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.9);">
    <span style="position: absolute; top: 15px; right: 35px; color: #f1f1f1; font-size: 40px; font-weight: bold; cursor: pointer;" onclick="closeImageModal()">&times;</span>
    <img id="modalImage" style="margin: auto; display: block; width: 80%; max-width: 700px; margin-top: 5%;">
</div>

<script>
function openImageModal(imageSrc) {
    document.getElementById('imageModal').style.display = 'block';
    document.getElementById('modalImage').src = imageSrc;
}

function closeImageModal() {
    document.getElementById('imageModal').style.display = 'none';
}

// Close modal when clicking outside the image
document.getElementById('imageModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeImageModal();
    }
});
</script>
@endsection
