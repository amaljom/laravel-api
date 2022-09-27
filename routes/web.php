<?php

use Illuminate\Support\Facades\Route;

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
    return view('guest.welcome');
});

Auth::routes();

Route::middleware('auth')
        ->namespace('admin')
        ->name('admin.')
        ->prefix('admin')
        ->group(function() {
            Route::get('/', 'HomeController@index')->name('home');
            // Route::get('/profile', 'HomeController@getProfile')->name('profile');
            Route::resource('/posts', 'PostController');
        });

Route::get("{any?}", function(){
    return view("quest.home");
})->where("any", ".*");