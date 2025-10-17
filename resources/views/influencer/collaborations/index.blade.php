@extends('layouts.admin')

@section('title', 'My Collaborations')
@section('description', 'Manage your influencer collaborations')
@section('page-title', 'My Collaborations')

@section('content')
<div class="fade-in">
    <!-- Header -->
    <div style="margin-bottom: 2rem;">
        <div style="display: flex; align-items: center; justify-content: space-between;">
            <div>
                <h1 style="font-size: 1.875rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.5rem;">
                    My Collaborations
                </h1>
                <p style="color: var(--text-secondary);">Manage your influencer collaborations and partnership opportunities.</p>
            </div>
            
            <div style="display: flex; gap: 0.75rem;">
                <a href="{{ route('influencer.collaborations.create') }}" 
                   style="padding: 0.75rem 1.5rem; background: var(--primary-color); color: white; border-radius: 0.5rem; text-decoration: none; font-weight: 500; transition: all 0.2s;">
                    <i class="fas fa-plus" style="margin-right: 0.5rem;"></i>Add Collaboration
                </a>
            </div>
        </div>
    </div>

    <!-- Collaborations Grid -->
    @if($collaborations->count() > 0)
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 1.5rem;">
            @foreach($collaborations as $collaboration)
                <div class="card" style="transition: all 0.2s; border: 1px solid var(--border-color);">
                    <!-- Collaboration Thumbnail -->
                    @if($collaboration->thumbnail_image)
                        <div style="height: 200px; background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); position: relative; overflow: hidden;">
                            <img src="{{ $collaboration->thumbnail_url }}" alt="{{ $collaboration->title }}" 
                                 style="width: 100%; height: 100%; object-fit: cover;">
                            @if($collaboration->is_featured)
                                <div style="position: absolute; top: 0.75rem; right: 0.75rem; background: var(--warning-color); color: white; padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem; font-weight: 600;">
                                    <i class="fas fa-star"></i> Featured
                                </div>
                            @endif
                            @if($collaboration->is_urgent)
                                <div style="position: absolute; top: 0.75rem; left: 0.75rem; background: var(--danger-color); color: white; padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem; font-weight: 600;">
                                    <i class="fas fa-exclamation"></i> Urgent
                                </div>
                            @endif
                        </div>
                    @else
                        <div style="height: 200px; background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); display: flex; align-items: center; justify-content: center; color: white;">
                            <i class="fas fa-handshake" style="font-size: 3rem; opacity: 0.5;"></i>
                        </div>
                    @endif

                    <div class="card-body">
                        <!-- Collaboration Info -->
                        <div style="margin-bottom: 1rem;">
                            <h3 style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                                {{ $collaboration->title }}
                            </h3>
                            <p style="color: var(--text-secondary); font-size: 0.875rem; line-height: 1.5; margin-bottom: 0.75rem;">
                                {{ Str::limit($collaboration->description, 100) }}
                            </p>
                            
                            <!-- Collaboration Details -->
                            <div style="display: flex; flex-wrap: wrap; gap: 0.75rem; margin-bottom: 1rem;">
                                <span style="background: var(--content-bg); color: var(--text-primary); padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem; font-weight: 500;">
                                    <i class="{{ $collaboration->collaborationType->icon ?? 'fas fa-handshake' }}" style="margin-right: 0.25rem;"></i>
                                    {{ $collaboration->collaborationType->name }}
                                </span>
                                <span style="background: var(--content-bg); color: var(--text-primary); padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem; font-weight: 500;">
                                    {{ ucfirst($collaboration->collaboration_mode) }}
                                </span>
                                <span style="background: var(--content-bg); color: var(--text-primary); padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem; font-weight: 500;">
                                    {{ ucfirst($collaboration->status) }}
                                </span>
                            </div>

                            <!-- Budget -->
                            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
                                <div>
                                    <span style="font-size: 1.125rem; font-weight: 700; color: var(--primary-color);">
                                        {{ $collaboration->formatted_budget }}
                                    </span>
                                    @if($collaboration->deadline)
                                        <span style="color: var(--text-secondary); font-size: 0.875rem; margin-left: 0.5rem;">
                                            Due: {{ $collaboration->deadline->format('M d, Y') }}
                                        </span>
                                    @endif
                                </div>
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    @if($collaboration->is_exclusive)
                                        <span style="background: var(--success-color); color: white; padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem; font-weight: 500;">
                                            <i class="fas fa-lock"></i> Exclusive
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Timeline -->
                            @if($collaboration->start_date || $collaboration->end_date)
                                <div style="display: flex; gap: 1rem; margin-bottom: 1rem; font-size: 0.75rem; color: var(--text-secondary);">
                                    @if($collaboration->start_date)
                                        <span><i class="fas fa-play"></i> {{ $collaboration->start_date->format('M d') }}</span>
                                    @endif
                                    @if($collaboration->end_date)
                                        <span><i class="fas fa-stop"></i> {{ $collaboration->end_date->format('M d') }}</span>
                                    @endif
                                    @if($collaboration->duration_days)
                                        <span><i class="fas fa-clock"></i> {{ $collaboration->duration_days }} days</span>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <!-- Actions -->
                        <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                            <a href="{{ route('influencer.collaborations.show', $collaboration) }}" 
                               style="flex: 1; padding: 0.5rem; background: var(--content-bg); color: var(--text-primary); border-radius: 0.375rem; text-decoration: none; text-align: center; font-size: 0.875rem; transition: all 0.2s;">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <a href="{{ route('influencer.collaborations.edit', $collaboration) }}" 
                               style="flex: 1; padding: 0.5rem; background: var(--primary-color); color: white; border-radius: 0.375rem; text-decoration: none; text-align: center; font-size: 0.875rem; transition: all 0.2s;">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form method="POST" action="{{ route('influencer.collaborations.toggle-featured', $collaboration) }}" style="flex: 1;">
                                @csrf
                                <button type="submit" 
                                        style="width: 100%; padding: 0.5rem; background: {{ $collaboration->is_featured ? 'var(--warning-color)' : 'var(--success-color)' }}; color: white; border: none; border-radius: 0.375rem; font-size: 0.875rem; cursor: pointer; transition: all 0.2s;">
                                    <i class="fas {{ $collaboration->is_featured ? 'fa-star' : 'fa-star-o' }}"></i> 
                                    {{ $collaboration->is_featured ? 'Unfeature' : 'Feature' }}
                                </button>
                            </form>
                            <form method="POST" action="{{ route('influencer.collaborations.destroy', $collaboration) }}" 
                                  onsubmit="return confirmDeleteCollaboration(event, '{{ $collaboration->title }}')" style="flex: 1;">
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
            {{ $collaborations->links() }}
        </div>
    @else
        <!-- Empty State -->
        <div class="card" style="text-align: center; padding: 3rem;">
            <div style="margin-bottom: 1.5rem;">
                <i class="fas fa-handshake" style="font-size: 4rem; color: var(--secondary-color); opacity: 0.5;"></i>
            </div>
            <h3 style="font-size: 1.25rem; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                No Collaborations Yet
            </h3>
            <p style="color: var(--text-secondary); margin-bottom: 2rem;">
                Create your first collaboration to showcase partnership opportunities and attract brands.
            </p>
            <a href="{{ route('influencer.collaborations.create') }}" 
               style="padding: 0.75rem 1.5rem; background: var(--primary-color); color: white; border-radius: 0.5rem; text-decoration: none; font-weight: 500;">
                <i class="fas fa-plus" style="margin-right: 0.5rem;"></i>Create Your First Collaboration
            </a>
        </div>
    @endif
</div>

<script>
function confirmDeleteCollaboration(event, collaborationTitle) {
    event.preventDefault();
    Swal.fire({
        title: 'Delete Collaboration',
        text: `Are you sure you want to delete "${collaborationTitle}"? This action cannot be undone.`,
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
