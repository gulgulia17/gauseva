<?php

use App\Http\Controllers\Backend\Auth\AdminAuthController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CampaignController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', [AdminAuthController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/', [AdminAuthController::class, 'login'])->name('login');
Route::post('/password/request', [AdminAuthController::class, 'login'])->name('password.request');

Route::group(['middleware' => 'admin'], function () {

    Route::resource('user', UserController::class);
    Route::post('status/user/{user}', [UserController::class, 'status'])->name('user.status');

    Route::resource('contact', ContactController::class);

    Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/profile-update', [ProfileController::class, 'profileUpdate'])->name('profile.update');

    Route::get('settings', [SettingsController::class, 'view'])->name('settings');
    Route::post('settings-update', [SettingsController::class, 'update'])->name('settings.update');

    // for testimonial
    Route::resource('testimonial', TestimonialController::class);
    Route::post('/testimonial-status/{id}', [TestimonialController::class, 'changeStatus'])->name('testimonial.status');

    // for blogs
    Route::resource('news', BlogController::class);
    Route::post('/blog-status/{id}', [BlogController::class, 'changeStatus'])->name('blog.status');

    // for category
    Route::resource('category', CategoryController::class);
    Route::post('/category-status/{id}', [CategoryController::class, 'changeStatus'])->name('category.status');

    // for product
    Route::resource('product', ProductController::class);
    Route::post('/product-status/{id}', [ProductController::class, 'changeStatus'])->name('product.status');

    // for campaign
    Route::resource('campaign', CampaignController::class);
    Route::post('/campaign-status/{id}', [CampaignController::class, 'changeStatus'])->name('campaign.status');
});
