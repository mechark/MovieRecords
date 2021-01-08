<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Profile;
use App\Models\User;
use App\Http\Controllers\Header;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', [SiteController::class, 'index',]);
//Route::get('/{username}', [SiteController::class, 'profile']);
Route::get('/search', [SearchController::class, 'search']);
//Route::get('/{search}', [SiteController::class, 'search']);
//Route::get('/register', [SiteController::class, 'register']);
Route::get('/getmovie', [SiteController::class, 'getmovie']);
//Route::get('/{name}',[Profile::class, 'profile']);
Route::get('/movie/{url}', [SiteController::class, 'movie']);



