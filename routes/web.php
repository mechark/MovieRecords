<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Profile;
use App\Models\User;
use App\Http\Controllers\Header;
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

Route::get('/', [SiteController::class, 'index']);
Route::get('/{name}',[Profile::class, 'profile']);
Route::get('/movie/{url}', [SiteController::class, 'movie']);


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');



Auth::routes(['verify' => true]);
