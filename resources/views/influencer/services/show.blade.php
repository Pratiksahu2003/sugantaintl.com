@extends('layouts.admin')

@section('title', 'View Service')
@section('description', 'View service details')
@section('page-title', 'View Service')

@section('content')
<div class="fade-in">
    <!-- Header -->
    <div style="margin-bottom: 2rem;">
        <div style="display: flex; align-items: center; justify-content: space-between;">
            <div>
                <h1 style="font-size: 1.875rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.5rem;">
                    {{ $service->service_name }}
                </h1>
                <p style="color: var(--text-secondary);">Service details and information.</p>
            </div>
            
            <div style="display: flex; gap: 0.75rem;">
                <a href="{{ route('influencer.services.edit', $service) }}" 
                   style="padding: 0.5rem 1rem; background: var(--primary-color); color: white; border-radius: 0.375rem; text-decoration: none; transition: all 0.2s;">
                    <i class="fas fa-edit" style="margin-right: 0.5rem;"></i>Edit
                </a>
                <a href="{{ route('influencer.services.index') }}" 
                   style="padding: 0.5rem 1rem; border: 1px solid var(--border-color); border-radius: 0.375rem; color: var(--text-primary); text-decoration: none; transition: all 0.2s;">
                    <i class="fas fa-arrow-left" style="margin-right: 0.5rem;"></i>Back to Services
                </a>
            </div>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
        <!-- Main Content -->
        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            <!-- Service Image -->
            @if($service->thumbnail_image)
                <div class="card">
                    <div style="height: 300px; background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); position: relative; overflow: hidden; border-radius: 0.5rem;">
                        <img src="{{ $service->thumbnail_url }}" alt="{{ $service->service_name }}" 
                             style="width: 100%; height: 100%; object-fit: cover;">
                        @if($service->is_featured)
                            <div style="position: absolute; top: 1rem; right: 1rem; background: var(--warning-color); color: white; padding: 0.5rem 0.75rem; border-radius: 0.375rem; font-size: 0.875rem; font-weight: 600;">
                                <i class="fas fa-star"></i> Featured
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Description -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Service Description</h3>
                </div>
                <div class="card-body">
                    <p style="color: var(--text-primary); line-height: 1.6;">{{ $service->description }}</p>
                </div>
            </div>

            <!-- Deliverables -->
            @if($service->deliverables && count($service->deliverables) > 0)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">What You'll Get</h3>
                    </div>
                    <div class="card-body">
                        <ul style="list-style: none; padding: 0;">
                            @foreach($service->deliverables as $deliverable)
                                <li style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
                                    <i class="fas fa-check-circle" style="color: var(--success-color);"></i>
                                    <span style="color: var(--text-primary);">{{ $deliverable }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <!-- Requirements -->
            @if($service->requirements && count($service->requirements) > 0)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Requirements</h3>
                    </div>
                    <div class="card-body">
                        <ul style="list-style: none; padding: 0;">
                            @foreach($service->requirements as $requirement)
                                <li style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
                                    <i class="fas fa-info-circle" style="color: var(--info-color);"></i>
                                    <span style="color: var(--text-primary);">{{ $requirement }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <!-- Gallery Images -->
            @if($service->gallery_images && count($service->gallery_images) > 0)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Portfolio</h3>
                    </div>
                    <div class="card-body">
                        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1rem;">
                            @foreach($service->gallery_urls as $imageUrl)
                                <div style="aspect-ratio: 1; border-radius: 0.375rem; overflow: hidden;">
                                    <img src="{{ $imageUrl }}" alt="Portfolio image" 
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
            <!-- Service Details -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Service Details</h3>
                </div>
                <div class="card-body">
                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        <div>
                            <span style="font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 0.05em;">Category</span>
                            <p style="font-weight: 500; color: var(--text-primary); margin-top: 0.25rem;">{{ ucfirst(str_replace('_', ' ', $service->category)) }}</p>
                        </div>

                        <div>
                            <span style="font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 0.05em;">Service Type</span>
                            <p style="font-weight: 500; color: var(--text-primary); margin-top: 0.25rem;">{{ ucfirst(str_replace('_', ' ', $service->service_type)) }}</p>
                        </div>

                        <div>
                            <span style="font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 0.05em;">Price</span>
                            <p style="font-weight: 500; color: var(--primary-color); margin-top: 0.25rem; font-size: 1.25rem;">{{ $service->formatted_price }}</p>
                        </div>

                        <div>
                            <span style="font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 0.05em;">Delivery Time</span>
                            <p style="font-weight: 500; color: var(--text-primary); margin-top: 0.25rem;">{{ $service->delivery_time_days }} days</p>
                        </div>

                        <div>
                            <span style="font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 0.05em;">Revisions</span>
                            <p style="font-weight: 500; color: var(--text-primary); margin-top: 0.25rem;">{{ $service->revision_limit }} included</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pricing Tiers -->
            @if($service->pricing_tiers && count($service->pricing_tiers) > 0)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pricing Tiers</h3>
                    </div>
                    <div class="card-body">
                        <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                            @foreach($service->pricing_tiers as $tier)
                                <div style="border: 1px solid var(--border-color); border-radius: 0.375rem; padding: 0.75rem;">
                                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                                        <span style="font-weight: 600; color: var(--text-primary);">{{ $tier['name'] ?? 'Tier' }}</span>
                                        <span style="font-weight: 700; color: var(--primary-color);">{{ $service->currency }} {{ number_format($tier['price'] ?? 0, 2) }}</span>
                                    </div>
                                    @if(isset($tier['description']))
                                        <p style="font-size: 0.875rem; color: var(--text-secondary); margin: 0;">{{ $tier['description'] }}</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Social Platforms -->
            @if($service->social_platforms && count($service->social_platforms) > 0)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Social Platforms</h3>
                    </div>
                    <div class="card-body">
                        <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
                            @foreach($service->social_platforms as $platform)
                                <span style="background: var(--content-bg); color: var(--text-primary); padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem; font-weight: 500;">
                                    {{ ucfirst($platform) }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Target Audience -->
            @if($service->target_audience && count($service->target_audience) > 0)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Target Audience</h3>
                    </div>
                    <div class="card-body">
                        <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
                            @foreach($service->target_audience as $audience)
                                <span style="background: var(--content-bg); color: var(--text-primary); padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem; font-weight: 500;">
                                    {{ ucfirst($audience) }}
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
                            @if($service->is_active)
                                <i class="fas fa-check-circle" style="color: var(--success-color);"></i>
                                <span style="font-size: 0.875rem; color: var(--text-primary);">Active Service</span>
                            @else
                                <i class="fas fa-times-circle" style="color: var(--danger-color);"></i>
                                <span style="font-size: 0.875rem; color: var(--text-primary);">Inactive Service</span>
                            @endif
                        </div>

                        @if($service->is_featured)
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <i class="fas fa-star" style="color: var(--warning-color);"></i>
                                <span style="font-size: 0.875rem; color: var(--text-primary);">Featured Service</span>
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
