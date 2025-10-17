<!-- Admin-Only Profile Management -->
<div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-red-500">
    <div class="flex items-center mb-4">
        <i class="fas fa-shield-alt text-red-500 mr-2"></i>
        <h2 class="text-xl font-semibold text-gray-900">Admin Controls</h2>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- User Roles -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-3">User Roles</label>
            <div class="space-y-2">
                @foreach(\App\Models\Role::all() as $role)
                    <label class="flex items-center">
                        <input type="checkbox" name="roles[]" value="{{ $role->id }}" 
                               {{ $user->hasRole($role->slug) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-700">
                            {{ $role->name }}
                            @if($role->description)
                                <span class="text-gray-500">({{ $role->description }})</span>
                            @endif
                        </span>
                    </label>
                @endforeach
            </div>
        </div>

        <!-- Account Status -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-3">Account Status</label>
            <div class="space-y-3">
                <div class="flex items-center">
                    <input type="checkbox" name="email_verified" value="1" 
                           {{ $user->email_verified_at ? 'checked' : '' }}
                           class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <span class="ml-2 text-sm text-gray-700">Email Verified</span>
                </div>
                
                @if($profileType === 'influencer')
                    <div class="flex items-center">
                        <input type="checkbox" name="is_verified" value="1" 
                               {{ $user->influencerProfile?->is_verified ? 'checked' : '' }}
                               class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-700">Verified Influencer</span>
                    </div>
                @elseif($profileType === 'company')
                    <div class="flex items-center">
                        <input type="checkbox" name="is_verified" value="1" 
                               {{ $user->companyProfile?->is_verified ? 'checked' : '' }}
                               class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-700">Verified Company</span>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Admin Notes -->
    <div class="mt-6">
        <label for="admin_notes" class="block text-sm font-medium text-gray-700 mb-2">Admin Notes</label>
        <textarea name="admin_notes" id="admin_notes" rows="3" 
                  placeholder="Add any admin notes about this user..."
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        <p class="mt-1 text-sm text-gray-500">These notes are only visible to administrators.</p>
    </div>

    <!-- Account Actions -->
    <div class="mt-6 p-4 bg-gray-50 rounded-lg">
        <h3 class="text-sm font-medium text-gray-900 mb-3">Account Actions</h3>
        <div class="flex flex-wrap gap-2">
            <button type="button" onclick="resetPassword()" 
                    class="px-3 py-1 text-sm bg-yellow-100 text-yellow-800 rounded hover:bg-yellow-200">
                <i class="fas fa-key mr-1"></i>Reset Password
            </button>
            
            <button type="button" onclick="sendVerificationEmail()" 
                    class="px-3 py-1 text-sm bg-blue-100 text-blue-800 rounded hover:bg-blue-200">
                <i class="fas fa-envelope mr-1"></i>Send Verification Email
            </button>
            
            @if($user->id !== Auth::user()->id)
                <button type="button" onclick="suspendAccount()" 
                        class="px-3 py-1 text-sm bg-red-100 text-red-800 rounded hover:bg-red-200">
                    <i class="fas fa-ban mr-1"></i>Suspend Account
                </button>
            @endif
        </div>
    </div>
</div>

<script>
function resetPassword() {
    if (confirm('Are you sure you want to reset this user\'s password? They will receive an email with instructions.')) {
        // This would typically make an AJAX call to reset the password
        alert('Password reset functionality would be implemented here.');
    }
}

function sendVerificationEmail() {
    if (confirm('Send verification email to this user?')) {
        // This would typically make an AJAX call to send verification email
        alert('Verification email functionality would be implemented here.');
    }
}

function suspendAccount() {
    if (confirm('Are you sure you want to suspend this account? This action can be reversed.')) {
        // This would typically make an AJAX call to suspend the account
        alert('Account suspension functionality would be implemented here.');
    }
}
</script>
