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
Route::get('/dashboard',[DashboardController::Class,'index']);
// routes to register
Route::get('/',[AuthenticationController::class,'create']);
Route::post('/register',[AuthenticationController::class,'createAccount']);

// route to login
Route::get('/login',[AuthenticationController::class,'createSigninView']);  
Route::post('/signin',[AuthenticationController::class,'signin']);

Route::post('/logout',[AuthenticationController::class,'signout']);

// Route::view('/create', 'posts.create');
Route::get('/create',[PostController::class,'create'])->name('create')->middleware('auth');
Route::post('/create',[PostController::class,'store'])->middleware('auth');


Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::delete('/posts', [PostController::class, 'destroy']);
// Route::get('/create/post', [PostController::class, 'create']);
