@extends('layouts.admin')

@section('title', 'My Packages')
@section('description', 'Manage your influencer packages')
@section('page-title', 'My Packages')

@section('content')
<div class="fade-in">
    <!-- Header -->
    <div style="margin-bottom: 2rem;">
        <div style="display: flex; align-items: center; justify-content: space-between;">
            <div>
                <h1 style="font-size: 1.875rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.5rem;">
                    My Packages
                </h1>
                <p style="color: var(--text-secondary);">Manage your influencer packages and promotional deals.</p>
            </div>
            
            <div style="display: flex; gap: 0.75rem;">
                <a href="{{ route('influencer.packages.create') }}" 
                   style="padding: 0.75rem 1.5rem; background: var(--primary-color); color: white; border-radius: 0.5rem; text-decoration: none; font-weight: 500; transition: all 0.2s;">
                    <i class="fas fa-plus" style="margin-right: 0.5rem;"></i>Add Package
                </a>
            </div>
        </div>
    </div>

    <!-- Packages Grid -->
    @if($packages->count() > 0)
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 1.5rem;">
            @foreach($packages as $package)
                <div class="card" style="transition: all 0.2s; border: 1px solid var(--border-color);">
                    <!-- Package Thumbnail -->
                    @if($package->thumbnail_image)
                        <div style="height: 200px; background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); position: relative; overflow: hidden;">
                            <img src="{{ $package->thumbnail_url }}" alt="{{ $package->package_name }}" 
                                 style="width: 100%; height: 100%; object-fit: cover;">
                            @if($package->is_featured)
                                <div style="position: absolute; top: 0.75rem; right: 0.75rem; background: var(--warning-color); color: white; padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem; font-weight: 600;">
                                    <i class="fas fa-star"></i> Featured
                                </div>
                            @endif
                            @if($package->is_custom)
                                <div style="position: absolute; top: 0.75rem; left: 0.75rem; background: var(--success-color); color: white; padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem; font-weight: 600;">
                                    <i class="fas fa-cog"></i> Custom
                                </div>
                            @endif
                        </div>
                    @else
                        <div style="height: 200px; background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); display: flex; align-items: center; justify-content: center; color: white;">
                            <i class="fas fa-box" style="font-size: 3rem; opacity: 0.5;"></i>
                        </div>
                    @endif

                    <div class="card-body">
                        <!-- Package Info -->
                        <div style="margin-bottom: 1rem;">
                            <h3 style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                                {{ $package->package_name }}
                            </h3>
                            <p style="color: var(--text-secondary); font-size: 0.875rem; line-height: 1.5; margin-bottom: 0.75rem;">
                                {{ Str::limit($package->description, 100) }}
                            </p>
                            
                            <!-- Package Details -->
                            <div style="display: flex; flex-wrap: wrap; gap: 0.75rem; margin-bottom: 1rem;">
                                <span style="background: var(--content-bg); color: var(--text-primary); padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem; font-weight: 500;">
                                    {{ $package->package_type }}
                                </span>
                                <span style="background: var(--content-bg); color: var(--text-primary); padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem; font-weight: 500;">
                                    {{ $package->category }}
                                </span>
                                <span style="background: var(--content-bg); color: var(--text-primary); padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem; font-weight: 500;">
                                    {{ $package->pricing_model }}
                                </span>
                            </div>

                            <!-- Pricing -->
                            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
                                <div>
                                    <span style="font-size: 1.25rem; font-weight: 700; color: var(--primary-color);">
                                        {{ $package->formatted_price }}
                                    </span>
                                    @if($package->duration_days)
                                        <span style="color: var(--text-secondary); font-size: 0.875rem; margin-left: 0.5rem;">
                                            {{ $package->duration_days }} days
                                        </span>
                                    @endif
                                </div>
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    @if($package->is_active)
                                        <span style="background: var(--success-color); color: white; padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem; font-weight: 500;">
                                            <i class="fas fa-check"></i> Active
                                        </span>
                                    @else
                                        <span style="background: var(--secondary-color); color: white; padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem; font-weight: 500;">
                                            <i class="fas fa-pause"></i> Inactive
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Package Stats -->
                            @if($package->post_count || $package->story_count || $package->reel_count)
                                <div style="display: flex; gap: 1rem; margin-bottom: 1rem; font-size: 0.75rem; color: var(--text-secondary);">
                                    @if($package->post_count)
                                        <span><i class="fas fa-image"></i> {{ $package->post_count }} Posts</span>
                                    @endif
                                    @if($package->story_count)
                                        <span><i class="fas fa-book-open"></i> {{ $package->story_count }} Stories</span>
                                    @endif
                                    @if($package->reel_count)
                                        <span><i class="fas fa-video"></i> {{ $package->reel_count }} Reels</span>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <!-- Actions -->
                        <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                            <a href="{{ route('influencer.packages.show', $package) }}" 
                               style="flex: 1; padding: 0.5rem; background: var(--content-bg); color: var(--text-primary); border-radius: 0.375rem; text-decoration: none; text-align: center; font-size: 0.875rem; transition: all 0.2s;">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <a href="{{ route('influencer.packages.edit', $package) }}" 
                               style="flex: 1; padding: 0.5rem; background: var(--primary-color); color: white; border-radius: 0.375rem; text-decoration: none; text-align: center; font-size: 0.875rem; transition: all 0.2s;">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form method="POST" action="{{ route('influencer.packages.toggle-active', $package) }}" style="flex: 1;">
                                @csrf
                                <button type="submit" 
                                        style="width: 100%; padding: 0.5rem; background: {{ $package->is_active ? 'var(--warning-color)' : 'var(--success-color)' }}; color: white; border: none; border-radius: 0.375rem; font-size: 0.875rem; cursor: pointer; transition: all 0.2s;">
                                    <i class="fas {{ $package->is_active ? 'fa-pause' : 'fa-play' }}"></i> 
                                    {{ $package->is_active ? 'Deactivate' : 'Activate' }}
                                </button>
                            </form>
                            <form method="POST" action="{{ route('influencer.packages.destroy', $package) }}" 
                                  onsubmit="return confirmDeletePackage(event, '{{ $package->package_name }}')" style="flex: 1;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        style="width: 100%; padding: 0.5rem; background: var(--danger-color); color: white; border: none; border-radius: 0.375rem; font-size: 0.875rem; cursor: pointer; transition: all 0.2s;">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div style="margin-top: 2rem;">
            {{ $packages->links() }}
        </div>
    @else
        <!-- Empty State -->
        <div class="card" style="text-align: center; padding: 3rem;">
            <div style="margin-bottom: 1.5rem;">
                <i class="fas fa-box" style="font-size: 4rem; color: var(--secondary-color); opacity: 0.5;"></i>
            </div>
            <h3 style="font-size: 1.25rem; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                No Packages Yet
            </h3>
            <p style="color: var(--text-secondary); margin-bottom: 2rem;">
                Create your first package to offer comprehensive promotional deals to clients.
            </p>
            <a href="{{ route('influencer.packages.create') }}" 
               style="padding: 0.75rem 1.5rem; background: var(--primary-color); color: white; border-radius: 0.5rem; text-decoration: none; font-weight: 500;">
                <i class="fas fa-plus" style="margin-right: 0.5rem;"></i>Create Your First Package
            </a>
        </div>
    @endif
</div>

<script>
function confirmDeletePackage(event, packageName) {
    event.preventDefault();
    Swal.fire({
        title: 'Delete Package',
        text: `Are you sure you want to delete "${packageName}"? This action cannot be undone.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            event.target.submit();
        }
    });
}
</script>
@endsection
