@extends('layouts.admin')

@section('title', 'View Collaboration')
@section('description', 'View collaboration details')
@section('page-title', 'View Collaboration')

@section('content')
<div class="fade-in">
    <!-- Header -->
    <div style="margin-bottom: 2rem;">
        <div style="display: flex; align-items: center; justify-content: space-between;">
            <div>
                <h1 style="font-size: 1.875rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.5rem;">
                    {{ $collaboration->title }}
                </h1>
                <p style="color: var(--text-secondary);">Collaboration details and information.</p>
            </div>
            
            <div style="display: flex; gap: 0.75rem;">
                <a href="{{ route('influencer.collaborations.edit', $collaboration) }}" 
                   style="padding: 0.5rem 1rem; background: var(--primary-color); color: white; border-radius: 0.375rem; text-decoration: none; transition: all 0.2s;">
                    <i class="fas fa-edit" style="margin-right: 0.5rem;"></i>Edit
                </a>
                <a href="{{ route('influencer.collaborations.index') }}" 
                   style="padding: 0.5rem 1rem; border: 1px solid var(--border-color); border-radius: 0.375rem; color: var(--text-primary); text-decoration: none; transition: all 0.2s;">
                    <i class="fas fa-arrow-left" style="margin-right: 0.5rem;"></i>Back to Collaborations
                </a>
            </div>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
        <!-- Main Content -->
        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            <!-- Collaboration Image -->
            @if($collaboration->thumbnail_image)
                <div class="card">
                    <div style="height: 300px; background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); position: relative; overflow: hidden; border-radius: 0.5rem;">
                        <img src="{{ $collaboration->thumbnail_url }}" alt="{{ $collaboration->title }}" 
                             style="width: 100%; height: 100%; object-fit: cover;">
                        @if($collaboration->is_featured)
                            <div style="position: absolute; top: 1rem; right: 1rem; background: var(--warning-color); color: white; padding: 0.5rem 0.75rem; border-radius: 0.375rem; font-size: 0.875rem; font-weight: 600;">
                                <i class="fas fa-star"></i> Featured
                            </div>
                        @endif
                        @if($collaboration->is_urgent)
                            <div style="position: absolute; top: 1rem; left: 1rem; background: var(--danger-color); color: white; padding: 0.5rem 0.75rem; border-radius: 0.375rem; font-size: 0.875rem; font-weight: 600;">
                                <i class="fas fa-exclamation"></i> Urgent
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
                    <p style="color: var(--text-primary); line-height: 1.6; margin-bottom: 1rem;">{{ $collaboration->description }}</p>
                    @if($collaboration->brief)
                        <div style="background: var(--content-bg); padding: 1rem; border-radius: 0.375rem; border-left: 4px solid var(--primary-color);">
                            <h4 style="font-size: 0.875rem; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">Brief</h4>
                            <p style="color: var(--text-secondary); font-size: 0.875rem; line-height: 1.5;">{{ $collaboration->brief }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Gallery Images -->
            @if($collaboration->gallery_images && count($collaboration->gallery_images) > 0)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Gallery</h3>
                    </div>
                    <div class="card-body">
                        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1rem;">
                            @foreach($collaboration->gallery_urls as $imageUrl)
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
            <!-- Collaboration Details -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Collaboration Details</h3>
                </div>
                <div class="card-body">
                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        <div>
                            <span style="font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 0.05em;">Type</span>
                            <p style="font-weight: 500; color: var(--text-primary); margin-top: 0.25rem;">
                                <i class="{{ $collaboration->collaborationType->icon ?? 'fas fa-handshake' }}" style="margin-right: 0.5rem; color: var(--primary-color);"></i>
                                {{ $collaboration->collaborationType->name }}
                            </p>
                        </div>

                        <div>
                            <span style="font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 0.05em;">Status</span>
                            <p style="font-weight: 500; color: var(--text-primary); margin-top: 0.25rem;">
                                <span style="background: var(--success-color); color: white; padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem; font-weight: 600;">
                                    {{ ucfirst($collaboration->status) }}
                                </span>
                            </p>
                        </div>

                        <div>
                            <span style="font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 0.05em;">Mode</span>
                            <p style="font-weight: 500; color: var(--text-primary); margin-top: 0.25rem;">{{ ucfirst($collaboration->collaboration_mode) }}</p>
                        </div>

                        <div>
                            <span style="font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 0.05em;">Budget</span>
                            <p style="font-weight: 500; color: var(--primary-color); margin-top: 0.25rem; font-size: 1.125rem;">{{ $collaboration->formatted_budget }}</p>
                        </div>

                        @if($collaboration->duration_days)
                            <div>
                                <span style="font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 0.05em;">Duration</span>
                                <p style="font-weight: 500; color: var(--text-primary); margin-top: 0.25rem;">{{ $collaboration->duration_days }} days</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Timeline -->
            @if($collaboration->start_date || $collaboration->end_date || $collaboration->deadline)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Timeline</h3>
                    </div>
                    <div class="card-body">
                        <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                            @if($collaboration->start_date)
                                <div style="display: flex; align-items: center; gap: 0.75rem;">
                                    <i class="fas fa-play" style="color: var(--success-color); width: 1rem;"></i>
                                    <div>
                                        <span style="font-size: 0.75rem; color: var(--text-secondary);">Start Date</span>
                                        <p style="font-weight: 500; color: var(--text-primary); margin: 0;">{{ $collaboration->start_date->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            @endif

                            @if($collaboration->end_date)
                                <div style="display: flex; align-items: center; gap: 0.75rem;">
                                    <i class="fas fa-stop" style="color: var(--danger-color); width: 1rem;"></i>
                                    <div>
                                        <span style="font-size: 0.75rem; color: var(--text-secondary);">End Date</span>
                                        <p style="font-weight: 500; color: var(--text-primary); margin: 0;">{{ $collaboration->end_date->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            @endif

                            @if($collaboration->deadline)
                                <div style="display: flex; align-items: center; gap: 0.75rem;">
                                    <i class="fas fa-clock" style="color: var(--warning-color); width: 1rem;"></i>
                                    <div>
                                        <span style="font-size: 0.75rem; color: var(--text-secondary);">Deadline</span>
                                        <p style="font-weight: 500; color: var(--text-primary); margin: 0;">{{ $collaboration->deadline->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <!-- Social Platforms -->
            @if($collaboration->social_platforms && count($collaboration->social_platforms) > 0)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Social Platforms</h3>
                    </div>
                    <div class="card-body">
                        <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
                            @foreach($collaboration->social_platforms as $platform)
                                <span style="background: var(--content-bg); color: var(--text-primary); padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem; font-weight: 500;">
                                    {{ ucfirst($platform) }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Settings -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Settings</h3>
                </div>
                <div class="card-body">
                    <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                        @if($collaboration->is_exclusive)
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <i class="fas fa-lock" style="color: var(--warning-color);"></i>
                                <span style="font-size: 0.875rem; color: var(--text-primary);">Exclusive Collaboration</span>
                            </div>
                        @endif

                        @if($collaboration->requires_approval)
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <i class="fas fa-check-circle" style="color: var(--info-color);"></i>
                                <span style="font-size: 0.875rem; color: var(--text-primary);">Requires Approval</span>
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
