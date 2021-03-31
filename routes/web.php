<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
 * Admin template Load
 */
// show admin login page route
Route::get('admin/login',[App\Http\Controllers\AdminController::class, 'showAdminLoginForm']) ->name('admin.login');
// show admin register page route
Route::get('admin/register',[App\Http\Controllers\AdminController::class, 'showAdminRegisterForm']) ->name('admin.register');
// admin dashboard route
Route::get('admin/dashboard',[App\Http\Controllers\AdminController::class, 'showAdminDashboard']) ->name('admin.dashboard');

// Login korer jonno
Route::post('admin/login',[App\Http\Controllers\Auth\LoginController::class, 'login']) ->name('admin.login');
// Logout korer jonno
Route::post('admin/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout']) ->name('admin.logout');
// Registration korer jonno
Route::post('admin/register',[App\Http\Controllers\Auth\RegisterController::class, 'register']) ->name('admin.register');

// post route
Route::resource('post','App\Http\Controllers\PostController');

// Post Category Route
Route::resource('category','App\Http\Controllers\CategoryController');
// Post Category Status inactive route
Route::get('category/status-inactive/{id}','App\Http\Controllers\CategoryController@statusUpdateInactive');
// Post Category Status Active route
Route::get('category/status-active/{id}','App\Http\Controllers\CategoryController@statusUpdateActive');

// Post Tag routes
Route::resource('tag','App\Http\Controllers\TagController');
// Post Tag Status inactive route
Route::get('tag/status-inactive/{id}','App\Http\Controllers\TagController@statusUpdateInactive');
// Post Tag Status Active route
Route::get('tag/status-active/{id}','App\Http\Controllers\TagController@statusUpdateActive');
