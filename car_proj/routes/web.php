<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use  App\Models\make;
use App\Models\make_years;
use  App\Models\moodel;
use  App\Models\dealership;

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

    $user = Auth::user();
    if($user->type()=='user'){

      Route::get('/dashboard', function () {

     // $models=  make::find(1)->models()->unique('name');
    // foreach($models as $m)
    // echo $m;
      
        return view('dashboard');
    })->name('dashboard');
    }
    
     Route::get('/order', function () {
        return view('Advertisement');
    })->name('order');
});
