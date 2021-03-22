<?php

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

/**
 *  Post Route
 */
Route::resource('post','App\Http\Controllers\PostController');

/**
 *  Category Route
 */
Route::resource('category','App\Http\Controllers\CategoryController');
