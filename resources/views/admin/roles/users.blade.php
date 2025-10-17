@extends('layouts.admin')

@section('title', 'Manage Role Users - Star JD')
@section('description', 'Manage users assigned to this role')
@section('page-title', 'Manage Users: ' . $role->name)

@section('content')
<div class="fade-in">
    <!-- Header -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <div>
            <h1 style="font-size: 1.875rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.5rem;">
                Manage Users: {{ $role->name }}
            </h1>
            <p style="color: var(--text-secondary);">Assign and remove users from this role.</p>
        </div>
        <div style="display: flex; gap: 0.75rem;">
            <a href="{{ route('admin.roles.show', $role) }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i>
                Back to Role
            </a>
        </div>
    </div>

    <!-- Assign New User -->
    <div class="card" style="margin-bottom: 2rem;">
        <div class="card-header">
            <h3 class="card-title">Assign User to Role</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.roles.assign-user', $role) }}" method="POST">
                @csrf
                <div style="display: flex; gap: 1rem; align-items: end;">
                    <div style="flex: 1;">
                        <label for="user_id" style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: var(--text-primary);">
                            Select User
                        </label>
                        <select 
                            id="user_id" 
                            name="user_id" 
                            class="form-control @error('user_id') is-invalid @enderror"
                            required
                        >
                            <option value="">Choose a user...</option>
                            @foreach(\App\Models\User::whereDoesntHave('roles', function($query) use ($role) {
                                $query->where('roles.id', $role->id);
                            })->get() as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <div style="color: var(--danger-color); font-size: 0.875rem; margin-top: 0.25rem;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-user-plus"></i>
                        Assign Role
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Users Table -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Users with {{ $role->name }} Role ({{ $users->total() }})</h3>
        </div>
        <div class="card-body">
            @if($users->count() > 0)
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Email</th>
                                <th>Other Roles</th>
                                <th>Joined</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                                        <div style="width: 40px; height: 40px; border-radius: 50%; background: var(--primary-color); display: flex; align-items: center; justify-content: center; color: white; font-weight: 600;">
                                            {{ substr($user->name, 0, 1) }}
                                        </div>
                                        <div>
                                            <div style="font-weight: 500;">{{ $user->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->roles->where('id', '!=', $role->id)->count() > 0)
                                        <div style="display: flex; flex-wrap: wrap; gap: 0.25rem;">
                                            @foreach($user->roles->where('id', '!=', $role->id) as $otherRole)
                                                <span class="badge badge-secondary">{{ $otherRole->name }}</span>
                                            @endforeach
                                        </div>
                                    @else
                                        <span style="color: var(--text-secondary); font-size: 0.875rem;">No other roles</span>
                                    @endif
                                </td>
                                <td>{{ $user->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div style="display: flex; gap: 0.5rem;">
                                        <a href="{{ route('admin.users.show', $user) }}" class="btn btn-sm btn-secondary" title="View User">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <form action="{{ route('admin.roles.remove-user', [$role, $user]) }}" method="POST" style="display: inline;" onsubmit="return confirmRemoveUserFromRole(event, '{{ $user->name }}', '{{ $role->name }}')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Remove Role">
                                                <i class="fas fa-user-minus"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($users->hasPages())
                    <div style="margin-top: 1.5rem;">
                        {{ $users->links() }}
                    </div>
                @endif
            @else
                <div style="text-align: center; color: var(--text-secondary); padding: 2rem;">
                    <i class="fas fa-users" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.3;"></i>
                    <p>No users assigned to this role yet.</p>
                    <p style="font-size: 0.875rem;">Use the form above to assign users to this role.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Role Information -->
    <div class="card" style="margin-top: 2rem;">
        <div class="card-header">
            <h3 class="card-title">Role Information</h3>
        </div>
        <div class="card-body">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">
                <div>
                    <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">Role Name</div>
                    <div style="font-weight: 500;">{{ $role->name }}</div>
                </div>
                <div>
                    <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">Slug</div>
                    <code style="background: var(--bg-secondary); padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.875rem;">
                        {{ $role->slug }}
                    </code>
                </div>
                <div>
                    <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">Total Users</div>
                    <div style="font-size: 1.25rem; font-weight: 700; color: var(--primary-color);">
                        {{ $users->total() }}
                    </div>
                </div>
                @if($role->description)
                <div style="grid-column: 1 / -1;">
                    <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">Description</div>
                    <div>{{ $role->description }}</div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

<script>
function confirmRemoveUserFromRole(event, userName, roleName) {
    event.preventDefault();
    
    Swal.fire({
        title: 'Remove User from Role',
        text: `Remove ${userName} from the ${roleName} role?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Yes, remove!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            event.target.submit();
        }
    });
    
    return false;
}
</script>
