<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\VideoProductionController;
use App\Http\Controllers\CaseStudiesController;
use App\Http\Controllers\ResourcesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Influencer\ServiceController;
use App\Http\Controllers\Influencer\PackageController;
use App\Http\Controllers\Influencer\CollaborationController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/aboutus', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/video-production', [VideoProductionController::class, 'index'])->name('video-production');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('Portfolio');
Route::get('/work', [PortfolioController::class, 'index'])->name('work');
Route::get('/case-studies', [CaseStudiesController::class, 'index'])->name('case-studies');
Route::get('/resources', [ResourcesController::class, 'index'])->name('Resources');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/modal-contact', [ContactController::class, 'storeModal'])->name('modal.contact.store');

// Blog routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/search', [BlogController::class, 'search'])->name('blog.search');
Route::get('/blog/category/{category}', [BlogController::class, 'category'])->name('blog.category');
Route::get('/blog/tag/{tag}', [BlogController::class, 'tag'])->name('blog.tag');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.user');
    Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->name('profile.user.edit');
    Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.user.update');
    
    // Influencer routes - Only accessible by users with influencer role
    Route::middleware('role:influencer')->prefix('influencer')->name('influencer.')->group(function () {
        // Services routes
        Route::resource('services', ServiceController::class);
        Route::post('services/{service}/toggle-active', [ServiceController::class, 'toggleActive'])->name('services.toggle-active');
        Route::post('services/{service}/toggle-featured', [ServiceController::class, 'toggleFeatured'])->name('services.toggle-featured');
        
        // Packages routes
        Route::resource('packages', PackageController::class);
        Route::post('packages/{package}/toggle-active', [PackageController::class, 'toggleActive'])->name('packages.toggle-active');
        Route::post('packages/{package}/toggle-featured', [PackageController::class, 'toggleFeatured'])->name('packages.toggle-featured');
        
        // Collaborations routes
        Route::resource('collaborations', CollaborationController::class);
        Route::post('collaborations/{collaboration}/toggle-featured', [CollaborationController::class, 'toggleFeatured'])->name('collaborations.toggle-featured');
        Route::post('collaborations/{collaboration}/toggle-urgent', [CollaborationController::class, 'toggleUrgent'])->name('collaborations.toggle-urgent');
        Route::post('collaborations/{collaboration}/update-status', [CollaborationController::class, 'updateStatus'])->name('collaborations.update-status');
    });
});

// Admin routes - Only accessible by users with admin role
Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::post('users/{user}/assign-role', [UserController::class, 'assignRole'])->name('users.assign-role');
    Route::delete('users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.remove-role');
    Route::resource('roles', RoleController::class);
    Route::get('roles/{role}/users', [RoleController::class, 'users'])->name('roles.users');
    Route::post('roles/{role}/assign-user', [RoleController::class, 'assignUser'])->name('roles.assign-user');
    Route::delete('roles/{role}/users/{user}', [RoleController::class, 'removeUser'])->name('roles.remove-user');
    Route::get('settings', [SettingsController::class, 'index'])->name('settings');
    Route::post('settings', [SettingsController::class, 'update'])->name('settings.update');
});

require __DIR__.'/auth.php';
