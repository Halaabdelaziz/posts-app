<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
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


// dashboard route
Route::get('/dashboard',[PostController::Class,'getDashboard'])->name('dashboard')->middleware(['role:admin']);
// routes to register
Route::get('/',[AuthenticationController::class,'create']);
Route::post('/register',[AuthenticationController::class,'createAccount']);

// route to login
Route::get('/login',[AuthenticationController::class,'createSigninView']);  
Route::post('/signin',[AuthenticationController::class,'signin']);
Route::get('/logout',[AuthenticationController::class,'signout'])->name('logout');

// create post
Route::get('/create',[PostController::class,'create'])->name('create');
Route::post('/create',[PostController::class,'store']);

// route to get all posts of login user
Route::get('/posts', [PostController::class, 'index'])->name('posts')->middleware('auth');

// route to load view of post
Route::get('/posts/{id}/edit',[PostController::class, 'edit']);
Route::PATCH('/posts/{id}',[PostController::class, 'update']);

// route to show post by id
Route::get('/posts/{id}',[PostController::class, 'show']);

// route to delete post by id
Route::delete('/posts/{id}', [PostController::class, 'destroy']);
