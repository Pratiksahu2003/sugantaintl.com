<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * Display a listing of users.
     */
    public function index()
    {
        // Only admins can view all users
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Access denied. Admin role required to view all users.');
        }

        $users = User::with('roles')->latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        // Only admins can create users
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Access denied. Admin role required to create users.');
        }

        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created user.
     */
    public function store(Request $request)
    {
        // Only admins can create users
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Access denied. Admin role required to create users.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,id',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => $request->has('email_verified') ? now() : null,
        ]);

        // Assign roles if provided
        if ($request->has('roles')) {
            $user->roles()->sync($request->roles);
        }

        return redirect()->route('admin.users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified user.
     */
    public function show(User $user)
    {
        // Admins can view any user, others can only view themselves
        if (!Auth::user()->hasRole('admin') && Auth::user()->id !== $user->id) {
            abort(403, 'Access denied. You can only view your own profile.');
        }

        $user->load('roles');
        $roles = Role::all();
        return view('admin.users.show', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        // Admins can edit any user, others can only edit themselves
        if (!Auth::user()->hasRole('admin') && Auth::user()->id !== $user->id) {
            abort(403, 'Access denied. You can only edit your own profile.');
        }

        $user->load('roles');
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified user.
     */
    public function update(Request $request, User $user)
    {
        // Admins can update any user, others can only update themselves
        if (!Auth::user()->hasRole('admin') && Auth::user()->id !== $user->id) {
            abort(403, 'Access denied. You can only update your own profile.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'password_confirmation' => 'nullable|string|min:8|same:password',
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,id',
        ]);

        // Additional validation for password confirmation
        if ($request->filled('password') && $request->password !== $request->password_confirmation) {
            return redirect()->back()
                ->withErrors(['password_confirmation' => 'Password confirmation does not match.'])
                ->withInput();
        }

        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => $request->has('email_verified') ? now() : null,
        ];

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

        $user->update($updateData);

        // Only admins can update roles
        if (Auth::user()->hasRole('admin')) {
            if ($request->has('roles')) {
                $user->roles()->sync($request->roles);
            } else {
                $user->roles()->detach();
            }
        }

        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user.
     */
    public function destroy(User $user)
    {
        // Only admins can delete users
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Access denied. Admin role required to delete users.');
        }

        // Prevent admin from deleting themselves
        if (Auth::user()->id === $user->id) {
            return redirect()->route('admin.users.index')
                ->with('error', 'You cannot delete your own account.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully.');
    }

    /**
     * Assign role to user
     */
    public function assignRole(Request $request, User $user)
    {
        // Only admins can assign roles
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Access denied. Admin role required to assign roles.');
        }

        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $role = Role::findOrFail($request->role_id);
        
        if (!$user->hasRole($role->slug)) {
            $user->assignRole($role->slug);
            return redirect()->back()
                ->with('success', "Role '{$role->name}' assigned to user successfully.");
        }

        return redirect()->back()
            ->with('error', "User already has the '{$role->name}' role.");
    }

    /**
     * Remove role from user
     */
    public function removeRole(User $user, Role $role)
    {
        // Only admins can remove roles
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Access denied. Admin role required to remove roles.');
        }

        if ($user->hasRole($role->slug)) {
            $user->removeRole($role->slug);
            return redirect()->back()
                ->with('success', "Role '{$role->name}' removed from user successfully.");
        }

        return redirect()->back()
            ->with('error', "User does not have the '{$role->name}' role.");
    }
}
