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





// interview

/**
 *    LARAVEL API PART
 *    MY END POINTS : Remember to add /api/ if you want to test on postman Change the domain part to yours
 *    http://ohapi.local/api/users
 *    http://ohapi.local/api/add-user
 *    http://ohapi.local/api/delete-user/number
 *    http://ohapi.local/api/update-user/number
 *    http://ohapi.local/api/users
 *    http://ohapi.local/api/add-comment
 *
 *    php artisan migrate:fresh --seed
 *
 *
 *      REACT PART
 *      navigate to src-> Axios -> axiosInstance  to set uyour base url to match the end point above
 *      mine is http://ohapi.local/api
 *
 *
 */



Route::get('/', function (){
    return "Hello World";
});


Route::get('/v1/health-check', function (){
    return "Im ok now";
});

//users
Route::get('users', [DataController::class,'getUser']);
Route::get('user/{user}', [DataController::class,'getAUser']);
Route::post('add-user', [DataController::class,'addUser']);
Route::put('update-user/{user}', [DataController::class,'UpdateUser']);
Route::get('delete-user/{user}', [DataController::class,'deleteUser']);

//comments
Route::get('comments', [DataController::class,'getComments']);
Route::post('add-comment', [DataController::class,'addComment']);
