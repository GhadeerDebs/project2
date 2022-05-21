<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\dealership_controller;
use App\Models\make;
use App\Models\make_years;
use App\Models\moodel;
use App\Models\dealership;

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
    return view('auth/register');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {


        if (Auth::user()->type === 'admin') {
            return view('Admin_Dashboard');
        } elseif (Auth::user()->type === 'employee') {
            return view('dashboard');
        } else {

            return redirect()->route('logout1');
        }
    })->name('dashboard');
});


//sancutm Authentication
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'isEmployee',
])->group(function () {


    Route::get('/order', function () {
        return view('Advertisement');
    })->name('order');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'isAdmin',
])->group(function () {

    Route::resource('dealership', dealership_controller::class);
    // Route::get('dealership/edit/{id}','App\Http\Controllers\dealership_controller@edit')->name('dealership.edit');

    //   Route::POST('dealership/destroy/{id}','App\Http\Controllers\dealership_controller@destroy')->name('dealership.destroy');
});

// $models=  make::find(1)->models()->unique('name');
// foreach($models as $m)
// echo $m;





////Route Of Users///


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'isAdmin',
])->group(function () {

    Route::resource('user', 'App\Http\Controllers\UserController')->except(['show']);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'isAdmin',
])->group(function () {

    Route::get('ads', 'App\Http\Controllers\AdvertiseController@index')->name('ads');
    Route::get('ads/create', 'App\Http\Controllers\AdvertiseController@create')->name('ads.create');
    Route::post('ads/store', 'App\Http\Controllers\AdvertiseController@store')->name('ads.store');
    Route::post('ads/update/{ads}', 'App\Http\Controllers\AdvertiseController@update')->name('ads.update');
    Route::get('ads/show/{ads}', 'App\Http\Controllers\AdvertiseController@show')->name('ads.show');
    Route::post('ads/destroy/{ads}', 'App\Http\Controllers\AdvertiseController@destroy')->name('ads.destroy');
    Route::get('ads/edit/{ads}', 'App\Http\Controllers\AdvertiseController@edit')->name('ads.edit');

    // Route::resource('ads', 'App\Http\Controllers\AdvertiseController');
});
