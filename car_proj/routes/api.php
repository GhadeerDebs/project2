<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AdvetiseController;
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


Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'isUser',
])->group(function () {

       Route::get('/profile', [App\Http\Controllers\API\AuthController::class, 'profile']);
       Route::post('/profile/updatepassword', [App\Http\Controllers\API\AuthController::class, 'updatepassword']);
       Route::post('/profile/update', [App\Http\Controllers\API\AuthController::class, 'updateProfile']);
       Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);


});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'isUser',
])->group(function () {

    Route::post('/add2favorite', [App\Http\Controllers\API\FavoriteController::class, 'addAd2Favorite']);
    Route::post('/removeFromfavorite/{uid}/{adid}', [App\Http\Controllers\API\FavoriteController::class, 'removeAdfromFavorite']);
    Route::get('/favorite/{id}', [App\Http\Controllers\API\FavoriteController::class, 'userFavoriteAds']);

    Route::get('/ads', [App\Http\Controllers\API\AdvetiseController::class, 'index']);
    Route::get('/ads/{id}', [App\Http\Controllers\API\AdvetiseController::class, 'show']);
    Route::get('/dealerships', [App\Http\Controllers\API\DealershipController::class, 'index']);
    Route::get('/dealerships/{id}', [App\Http\Controllers\API\DealershipController::class, 'show']);

    Route::post('/appointment', [App\Http\Controllers\API\HoursController::class, 'index']);
    Route::post('/book', [App\Http\Controllers\API\HoursController::class, 'book']);
});
