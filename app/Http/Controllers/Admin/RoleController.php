<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Only admins can manage roles
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Access denied. Admin role required to manage roles.');
        }

        $roles = Role::withCount('users')->get();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Only admins can create roles
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Access denied. Admin role required to create roles.');
        }

        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Only admins can create roles
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Access denied. Admin role required to create roles.');
        }

        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'description' => 'nullable|string|max:1000',
        ]);

        Role::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ]);

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        // Only admins can view role details
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Access denied. Admin role required to view role details.');
        }

        $role->load('users');
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        // Only admins can edit roles
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Access denied. Admin role required to edit roles.');
        }

        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        // Only admins can update roles
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Access denied. Admin role required to update roles.');
        }

        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'description' => 'nullable|string|max:1000',
        ]);

        $role->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ]);

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        // Only admins can delete roles
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Access denied. Admin role required to delete roles.');
        }

        // Check if role has users
        if ($role->users()->count() > 0) {
            return redirect()->route('admin.roles.index')
                ->with('error', 'Cannot delete role. It has assigned users.');
        }

        $role->delete();

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role deleted successfully.');
    }

    /**
     * Show users with a specific role
     */
    public function users(Role $role)
    {
        // Only admins can manage role users
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Access denied. Admin role required to manage role users.');
        }

        $users = $role->users()->paginate(10);
        return view('admin.roles.users', compact('role', 'users'));
    }

    /**
     * Assign role to user
     */
    public function assignUser(Request $request, Role $role)
    {
        // Only admins can assign roles to users
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Access denied. Admin role required to assign roles.');
        }

        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $user = User::findOrFail($request->user_id);
        
        if (!$user->hasRole($role->slug)) {
            $user->assignRole($role->slug);
            return redirect()->back()
                ->with('success', 'Role assigned to user successfully.');
        }

        return redirect()->back()
            ->with('error', 'User already has this role.');
    }

    /**
     * Remove role from user
     */
    public function removeUser(Role $role, User $user)
    {
        // Only admins can remove roles from users
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Access denied. Admin role required to remove roles.');
        }

        if ($user->hasRole($role->slug)) {
            $user->removeRole($role->slug);
            return redirect()->back()
                ->with('success', 'Role removed from user successfully.');
        }

        return redirect()->back()
            ->with('error', 'User does not have this role.');
    }
}
