<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CampaignController;

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
// for login
// Route::get('/login', [LoginController::class, 'view'])->name('login.view');
// Route::post('/login', [LoginController::class, 'loginAttempt'])->name('login');

Auth::routes();
Route::get('/', [HomeController::class, 'home'])->name('index');

Route::get('/campaigns', [CampaignController::class, 'campaignListing'])->name('campaign.listing');
Route::get('/campaign/detail/{campaign}', [CampaignController::class, 'campaignDetail'])->name('campaign.detail');
