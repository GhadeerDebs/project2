<?php

use Illuminate\Support\Facades\Route;
use  App\Models\make;
use App\Models\make_years;
use  App\Models\moodel;

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

     // $models=  make::find(1)->models()->unique('name');
     // foreach($models as $m)
     // echo $m;

        return view('dashboard');
    })->name('dashboard');
     Route::get('/order', function () {
        return view('Advertisement');
    })->name('order');
});
