@extends('layouts.admin')

@section('title', 'My Services')
@section('description', 'Manage your influencer services')
@section('page-title', 'My Services')

@section('content')
<div class="fade-in">
    <!-- Header -->
    <div style="margin-bottom: 2rem;">
        <div style="display: flex; align-items: center; justify-content: space-between;">
            <div>
                <h1 style="font-size: 1.875rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.5rem;">
                    My Services
                </h1>
                <p style="color: var(--text-secondary);">Manage your influencer services and pricing.</p>
            </div>
            
            <div style="display: flex; gap: 0.75rem;">
                <a href="{{ route('influencer.services.create') }}" 
                   style="padding: 0.75rem 1.5rem; background: var(--primary-color); color: white; border-radius: 0.5rem; text-decoration: none; font-weight: 500; transition: all 0.2s;">
                    <i class="fas fa-plus" style="margin-right: 0.5rem;"></i>Add Service
                </a>
            </div>
        </div>
    </div>

    <!-- Services Grid -->
    @if($services->count() > 0)
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 1.5rem;">
            @foreach($services as $service)
                <div class="card" style="transition: all 0.2s; border: 1px solid var(--border-color);">
                    <!-- Service Thumbnail -->
                    @if($service->thumbnail_image)
                        <div style="height: 200px; background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); position: relative; overflow: hidden;">
                            <img src="{{ $service->thumbnail_url }}" alt="{{ $service->service_name }}" 
                                 style="width: 100%; height: 100%; object-fit: cover;">
                            @if($service->is_featured)
                                <div style="position: absolute; top: 0.75rem; right: 0.75rem; background: var(--warning-color); color: white; padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem; font-weight: 600;">
                                    <i class="fas fa-star"></i> Featured
                                </div>
                            @endif
                        </div>
                    @else
                        <div style="height: 200px; background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); display: flex; align-items: center; justify-content: center; color: white;">
                            <i class="fas fa-image" style="font-size: 3rem; opacity: 0.5;"></i>
                        </div>
                    @endif

                    <div class="card-body">
                        <!-- Service Info -->
                        <div style="margin-bottom: 1rem;">
                            <h3 style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                                {{ $service->service_name }}
                            </h3>
                            <p style="color: var(--text-secondary); font-size: 0.875rem; line-height: 1.5; margin-bottom: 0.75rem;">
                                {{ Str::limit($service->description, 100) }}
                            </p>
                            
                            <!-- Service Details -->
                            <div style="display: flex; flex-wrap: wrap; gap: 0.75rem; margin-bottom: 1rem;">
                                <span style="background: var(--content-bg); color: var(--text-primary); padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem; font-weight: 500;">
                                    {{ $service->category }}
                                </span>
                                <span style="background: var(--content-bg); color: var(--text-primary); padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem; font-weight: 500;">
                                    {{ $service->service_type }}
                                </span>
                            </div>

                            <!-- Pricing -->
                            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
                                <div>
                                    <span style="font-size: 1.25rem; font-weight: 700; color: var(--primary-color);">
                                        {{ $service->formatted_price }}
                                    </span>
                                    <span style="color: var(--text-secondary); font-size: 0.875rem; margin-left: 0.5rem;">
                                        {{ $service->delivery_time_days }} days delivery
                                    </span>
                                </div>
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    @if($service->is_active)
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
                        </div>

                        <!-- Actions -->
                        <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                            <a href="{{ route('influencer.services.show', $service) }}" 
                               style="flex: 1; padding: 0.5rem; background: var(--content-bg); color: var(--text-primary); border-radius: 0.375rem; text-decoration: none; text-align: center; font-size: 0.875rem; transition: all 0.2s;">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <a href="{{ route('influencer.services.edit', $service) }}" 
                               style="flex: 1; padding: 0.5rem; background: var(--primary-color); color: white; border-radius: 0.375rem; text-decoration: none; text-align: center; font-size: 0.875rem; transition: all 0.2s;">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form method="POST" action="{{ route('influencer.services.toggle-active', $service) }}" style="flex: 1;">
                                @csrf
                                <button type="submit" 
                                        style="width: 100%; padding: 0.5rem; background: {{ $service->is_active ? 'var(--warning-color)' : 'var(--success-color)' }}; color: white; border: none; border-radius: 0.375rem; font-size: 0.875rem; cursor: pointer; transition: all 0.2s;">
                                    <i class="fas {{ $service->is_active ? 'fa-pause' : 'fa-play' }}"></i> 
                                    {{ $service->is_active ? 'Deactivate' : 'Activate' }}
                                </button>
                            </form>
                            <form method="POST" action="{{ route('influencer.services.destroy', $service) }}" 
                                  onsubmit="return confirmDeleteService(event, '{{ $service->service_name }}')" style="flex: 1;">
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
            {{ $services->links() }}
        </div>
    @else
        <!-- Empty State -->
        <div class="card" style="text-align: center; padding: 3rem;">
            <div style="margin-bottom: 1.5rem;">
                <i class="fas fa-briefcase" style="font-size: 4rem; color: var(--secondary-color); opacity: 0.5;"></i>
            </div>
            <h3 style="font-size: 1.25rem; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                No Services Yet
            </h3>
            <p style="color: var(--text-secondary); margin-bottom: 2rem;">
                Start by creating your first service to showcase your skills and attract clients.
            </p>
            <a href="{{ route('influencer.services.create') }}" 
               style="padding: 0.75rem 1.5rem; background: var(--primary-color); color: white; border-radius: 0.5rem; text-decoration: none; font-weight: 500;">
                <i class="fas fa-plus" style="margin-right: 0.5rem;"></i>Create Your First Service
            </a>
        </div>
    @endif
</div>

<script>
function confirmDeleteService(event, serviceName) {
    event.preventDefault();
    Swal.fire({
        title: 'Delete Service',
        text: `Are you sure you want to delete "${serviceName}"? This action cannot be undone.`,
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
