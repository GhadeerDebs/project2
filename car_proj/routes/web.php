<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Statecitydropdown;
use App\Http\Controllers\dealership_controller;
use App\Models\make;
use App\Models\make_years;
use App\Models\moodel;
use App\Models\dealership;
use League\CommonMark\Node\Query\OrExpr;

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

$canlog = 'isAdmin';
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
    'isEmployeeOrAdmin',
])->group(function () {

    Route::get('ads', 'App\Http\Controllers\AdvertiseController@index')->name('ads');
    Route::get('ads/create', 'App\Http\Controllers\AdvertiseController@create')->name('ads.create');
    Route::post('ads/store', 'App\Http\Controllers\AdvertiseController@store')->name('ads.store');
    Route::put('ads/update/{ads}', 'App\Http\Controllers\AdvertiseController@update')->name('ads.update');
    Route::get('ads/show/{ads}', 'App\Http\Controllers\AdvertiseController@show')->name('ads.show');
    // Route::post('ads/destroy/{ads}', 'App\Http\Controllers\AdvertiseController@destroy')->name('ads.destroy');
    Route::get('ads/edit/{ads}', 'App\Http\Controllers\AdvertiseController@edit')->name('ads.edit');
    Route::get('ads/deleteimage/{id}', 'App\Http\Controllers\AdvertiseController@deleteimage')->name('deleteimage');
    // Route::resource('ads', 'App\Http\Controllers\AdvertiseController');
    Route::get('ads/delete/{id}', 'App\Http\Controllers\AdvertiseController@destroy')->name('ads.destroy');


    // Route::get('dealership/destroy/{id}', 'App\Http\Controllers\dealership_controller@destroy')->name('dealership.destroy');


    // Route::put('/update/{id}',[PostController::class,'update']);
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'isAdmin',
])->group(function () {

    Route::get('employee', 'App\Http\Controllers\EmployeeController@index_e')->name('Employee');
    Route::get('admin', 'App\Http\Controllers\EmployeeController@index_a')->name('Admin');
    Route::get('employee/create', 'App\Http\Controllers\EmployeeController@create_e')->name('Employee.create');
    Route::get('admin/create', 'App\Http\Controllers\EmployeeController@create_a')->name('Admin.create');
    Route::post('employee/store', 'App\Http\Controllers\EmployeeController@store_e')->name('Employee.store');
    Route::post('admin/store', 'App\Http\Controllers\EmployeeController@store_a')->name('Admin.store');
    // Route::Post('employee/destroy/{user}', 'App\Http\Controllers\EmployeeController@destroy')->name('Employee.destroy');
    Route::get('employee/destroy/{id}', 'App\Http\Controllers\EmployeeController@destroy')->name('Employee.destroy');
    Route::get('employee/edit/{user}', 'App\Http\Controllers\EmployeeController@edit')->name('Employee.edit');
    Route::put('employee/update/{user}', 'App\Http\Controllers\PostController@update')->name('Employee.update');

    // Route::resource('ads', 'App\Http\Controllers\AdvertiseController');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'isAdmin',
])->group(function () {

    Route::get('dealership', 'App\Http\Controllers\dealership_controller@index')->name('dealership');
    Route::get('dealership/create', 'App\Http\Controllers\dealership_controller@create')->name('dealership.create');
    Route::post('dealership/store', 'App\Http\Controllers\dealership_controller@store')->name('dealership.store');
    // Route::Post('employee/destroy/{user}', 'App\Http\Controllers\EmployeeController@destroy')->name('Employee.destroy');
    Route::get('dealership/destroy/{id}', 'App\Http\Controllers\dealership_controller@destroy')->name('dealership.destroy');
    Route::get('dealership/edit/{dealership}', 'App\Http\Controllers\dealership_controller@edit')->name('dealership.edit');
    Route::put('dealership/update/{dealership}', 'App\Http\Controllers\dealership_controller@update')->name('dealership.update');

    // Route::resource('ads', 'App\Http\Controllers\AdvertiseController');
});
Route::get('dropdown', MakeMakeyearsModelDropdown::class);
