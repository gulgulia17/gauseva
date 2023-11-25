<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CampaignController;
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
// for login
// Route::get('/login', [LoginController::class, 'view'])->name('login.view');
// Route::post('/login', [LoginController::class, 'loginAttempt'])->name('login');

Route::group(['as' => 'frontend.'], function () {
    Route::get('/', [HomeController::class, 'home'])->name('index');

    Route::get('/campaigns', [CampaignController::class, 'campaignListing'])->name('campaign.listing'); 
    Route::get('/campaign/detail/{id}', [CampaignController::class, 'campaignDetail'])->name('campaign.detail');  
   
});

// Route::group(['middleware' => 'auth', 'as' => 'frontend.'], function () {

// });
