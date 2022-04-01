<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\API\RegisterController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//register user route
Route::post('/register',[RegisterController::class, 'createAccount']);

//login user route
Route::post('/login',[RegisterController::class,'signin']);

//using middleware 
Route::group(['middleware' => ['auth:sanctum']], function () {
    
    Route::post('/logout', [RegisterController::class, 'signout']);
    // get user info by id
    Route::get('/posts',[PostController::class,'index']);
});