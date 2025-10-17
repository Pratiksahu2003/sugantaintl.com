<!-- Admin-Only Profile Management -->
<div class="card" style="border-left: 4px solid var(--danger-color);">
    <div class="card-header" style="display: flex; align-items: center;">
        <i class="fas fa-shield-alt" style="color: var(--danger-color); margin-right: 0.5rem;"></i>
        <h3 class="card-title">Admin Controls</h3>
    </div>
    <div class="card-body">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <!-- User Roles -->
            <div>
                <label style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.75rem;">User Roles</label>
                <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                    @foreach(\App\Models\Role::all() as $role)
                        <label style="display: flex; align-items: center;">
                            <input type="checkbox" name="roles[]" value="{{ $role->id }}" 
                                   {{ $user->hasRole($role->slug) ? 'checked' : '' }}
                                   style="margin-right: 0.5rem;">
                            <span style="font-size: 0.875rem; color: var(--text-primary);">
                                {{ $role->name }}
                                @if($role->description)
                                    <span style="color: var(--text-secondary);">({{ $role->description }})</span>
                                @endif
                            </span>
                        </label>
                    @endforeach
                </div>
            </div>

            <!-- Account Status -->
            <div>
                <label style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.75rem;">Account Status</label>
                <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                    <div style="display: flex; align-items: center;">
                        <input type="checkbox" name="email_verified" value="1" 
                               {{ $user->email_verified_at ? 'checked' : '' }}
                               style="margin-right: 0.5rem;">
                        <span style="font-size: 0.875rem; color: var(--text-primary);">Email Verified</span>
                    </div>
                    
                    @if($profileType === 'influencer')
                        <div style="display: flex; align-items: center;">
                            <input type="checkbox" name="is_verified" value="1" 
                                   {{ $user->influencerProfile?->is_verified ? 'checked' : '' }}
                                   style="margin-right: 0.5rem;">
                            <span style="font-size: 0.875rem; color: var(--text-primary);">Verified Influencer</span>
                        </div>
                    @elseif($profileType === 'company')
                        <div style="display: flex; align-items: center;">
                            <input type="checkbox" name="is_verified" value="1" 
                                   {{ $user->companyProfile?->is_verified ? 'checked' : '' }}
                                   style="margin-right: 0.5rem;">
                            <span style="font-size: 0.875rem; color: var(--text-primary);">Verified Company</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Admin Notes -->
        <div style="margin-top: 1.5rem;">
            <label for="admin_notes" style="display: block; font-weight: 500; color: var(--text-primary); margin-bottom: 0.5rem;">Admin Notes</label>
            <textarea name="admin_notes" id="admin_notes" rows="3" 
                      placeholder="Add any admin notes about this user..."
                      style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: var(--content-bg); color: var(--text-primary);"></textarea>
            <p style="margin-top: 0.25rem; font-size: 0.875rem; color: var(--text-secondary);">These notes are only visible to administrators.</p>
        </div>

        <!-- Account Actions -->
        <div style="margin-top: 1.5rem; padding: 1rem; background: var(--content-bg); border-radius: 0.375rem;">
            <h4 style="font-size: 0.875rem; font-weight: 500; color: var(--text-primary); margin-bottom: 0.75rem;">Account Actions</h4>
            <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
                <button type="button" onclick="resetPassword()" 
                        style="padding: 0.25rem 0.75rem; font-size: 0.75rem; background: #fef3c7; color: #92400e; border-radius: 0.25rem; border: none; cursor: pointer;">
                    <i class="fas fa-key" style="margin-right: 0.25rem;"></i>Reset Password
                </button>
                
                <button type="button" onclick="sendVerificationEmail()" 
                        style="padding: 0.25rem 0.75rem; font-size: 0.75rem; background: #dbeafe; color: #1e40af; border-radius: 0.25rem; border: none; cursor: pointer;">
                    <i class="fas fa-envelope" style="margin-right: 0.25rem;"></i>Send Verification Email
                </button>
                
                @if($user->id !== Auth::user()->id)
                    <button type="button" onclick="suspendAccount()" 
                            style="padding: 0.25rem 0.75rem; font-size: 0.75rem; background: #fee2e2; color: #dc2626; border-radius: 0.25rem; border: none; cursor: pointer;">
                        <i class="fas fa-ban" style="margin-right: 0.25rem;"></i>Suspend Account
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
function resetPassword() {
    Swal.fire({
        title: 'Reset Password',
        text: 'Are you sure you want to reset this user\'s password? They will receive an email with instructions.',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#f59e0b',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Yes, reset password!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // This would typically make an AJAX call to reset the password
            Swal.fire({
                title: 'Password Reset',
                text: 'Password reset functionality would be implemented here.',
                icon: 'info',
                confirmButtonText: 'OK'
            });
        }
    });
}

function sendVerificationEmail() {
    Swal.fire({
        title: 'Send Verification Email',
        text: 'Send verification email to this user?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3b82f6',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Yes, send email!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // This would typically make an AJAX call to send verification email
            Swal.fire({
                title: 'Email Sent',
                text: 'Verification email functionality would be implemented here.',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        }
    });
}

function suspendAccount() {
    Swal.fire({
        title: 'Suspend Account',
        text: 'Are you sure you want to suspend this account? This action can be reversed.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Yes, suspend!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // This would typically make an AJAX call to suspend the account
            Swal.fire({
                title: 'Account Suspended',
                text: 'Account suspension functionality would be implemented here.',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        }
    });
}
</script>
