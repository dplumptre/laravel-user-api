<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware(['api'])->prefix('auth')->group(function () {
    // api/auth
    Route::post('login', [AuthController::class,'login']);
    Route::post('register', [AuthController::class,'register']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::get('user-profile', [AuthController::class,'userProfile']);
    Route::post('change-password/{user}', [AuthController::class,'changePassword'])->middleware('jwt.auth');

    
});

Route::get('users', [DataController::class,'getUser']);
Route::post('add-user', [DataController::class,'addUser']);




Route::post('add-account', [AccountController::class,'addAccount']);

Route::get('get-accounts', [AccountController::class,'getAccount']);

Route::post('get-status-by-post', [AccountController::class,'getStatusByPost']);

Route::middleware(['jwt.auth','api'])->group(function () {
    // api/
  //  Route::get('products', [ProductController::class,'getProducts']);
});