@extends('layouts.admin')

@section('title', 'Settings - Admin Dashboard')
@section('description', 'System settings for Star JD admin panel')
@section('page-title', 'Settings')

@section('content')
<div class="fade-in">
    <!-- Header -->
    <div style="margin-bottom: 2rem;">
        <h1 style="font-size: 1.875rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.5rem;">System Settings</h1>
        <p style="color: var(--text-secondary);">Configure platform settings and preferences.</p>
    </div>

    <!-- Settings Form -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Platform Configuration</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.settings.update') }}">
                @csrf
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                    <!-- Site Information -->
                    <div>
                        <h4 style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary); margin-bottom: 1rem;">Site Information</h4>
                        <div class="form-group">
                            <label for="site_name" class="form-label">Site Name</label>
                            <input type="text" name="site_name" id="site_name" value="{{ config('app.name') }}" class="form-input">
                        </div>
                        <div class="form-group">
                            <label for="site_description" class="form-label">Site Description</label>
                            <textarea name="site_description" id="site_description" rows="3" class="form-input" placeholder="Enter site description...">{{ config('app.description', 'Star JD - Professional Video Production Services') }}</textarea>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div>
                        <h4 style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary); margin-bottom: 1rem;">Contact Information</h4>
                        <div class="form-group">
                            <label for="contact_email" class="form-label">Contact Email</label>
                            <input type="email" name="contact_email" id="contact_email" value="{{ config('company.contact.email', 'contact@starjd.com') }}" class="form-input">
                        </div>
                        <div class="form-group">
                            <label for="contact_phone" class="form-label">Contact Phone</label>
                            <input type="tel" name="contact_phone" id="contact_phone" value="{{ config('company.contact.phone', '+91 9876543210') }}" class="form-input">
                        </div>
                        <div class="form-group">
                            <label for="contact_address" class="form-label">Contact Address</label>
                            <textarea name="contact_address" id="contact_address" rows="3" class="form-input" placeholder="Enter contact address...">{{ config('company.contact.address', 'New Delhi, India') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- System Settings -->
                <div style="margin-top: 2rem;">
                    <h4 style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary); margin-bottom: 1rem;">System Settings</h4>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                        <div class="form-group">
                            <label for="timezone" class="form-label">Timezone</label>
                            <select name="timezone" id="timezone" class="form-input">
                                <option value="Asia/Kolkata" selected>Asia/Kolkata (IST)</option>
                                <option value="UTC">UTC</option>
                                <option value="America/New_York">America/New_York (EST)</option>
                                <option value="Europe/London">Europe/London (GMT)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date_format" class="form-label">Date Format</label>
                            <select name="date_format" id="date_format" class="form-input">
                                <option value="Y-m-d" selected>YYYY-MM-DD</option>
                                <option value="d-m-Y">DD-MM-YYYY</option>
                                <option value="m/d/Y">MM/DD/YYYY</option>
                                <option value="d/m/Y">DD/MM/YYYY</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Security Settings -->
                <div style="margin-top: 2rem;">
                    <h4 style="font-size: 1.125rem; font-weight: 600; color: var(--text-primary); margin-bottom: 1rem;">Security Settings</h4>
                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <input type="checkbox" name="enable_registration" id="enable_registration" class="form-checkbox">
                            <label for="enable_registration" class="form-label" style="margin-bottom: 0;">Enable User Registration</label>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <input type="checkbox" name="require_email_verification" id="require_email_verification" class="form-checkbox">
                            <label for="require_email_verification" class="form-label" style="margin-bottom: 0;">Require Email Verification</label>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <input type="checkbox" name="enable_two_factor" id="enable_two_factor" class="form-checkbox">
                            <label for="enable_two_factor" class="form-label" style="margin-bottom: 0;">Enable Two-Factor Authentication</label>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div style="margin-top: 2rem; display: flex; justify-content: flex-end;">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Save Settings
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
