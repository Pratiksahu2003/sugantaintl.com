<?php

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
