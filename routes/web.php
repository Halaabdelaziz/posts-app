<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PostController;
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

// routes to register
Route::get('/',[AuthenticationController::class,'create']);
Route::post('/register',[AuthenticationController::class,'createAccount']);

// route to login
Route::get('/login',[AuthenticationController::class,'createSigninView']);
Route::post('/login',[AuthenticationController::class,'signin']);
// sanctum middleware to issue token
Route::group(['middleware' => ['auth:sanctum']], function () {
    
    // route to logout
    Route::post('/logout',[AuthenticationController::class,'signout']);
    // Route::resource('posts', PostController::class);
});
// Route::view('/create', 'posts.create');
Route::get('/create',[PostController::class,'create'])->name('create');
Route::post('/create',[PostController::class,'store']);
// Route::get('/', function () {
//     return view('register');
// });

Route::get('/posts', [PostController::class, 'index'])->name('posts');

// Route::get('/create/post', [PostController::class, 'create']);
