<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
})->name('welcome');

Auth::routes(['verify' => true]);

Route::get('/home', 'UserController@index')->name('home')->middleware('auth', 'verified');

Route::get('user/{id}', 'UserController@show')->middleware('auth', 'verified');

Route::post('user', 'UserController@store')->middleware('auth', 'verified');

Route::put('user/{id}', 'UserController@updateByApi')->middleware('auth', 'verified');

Route::delete('user/{id}', 'UserController@delete')->middleware('auth', 'verified');

Route::get('/Profile', 'ProfileController@index')->name('user_module')->middleware('auth', 'verified');

Route::get('/Profile/{id}', 'ProfileController@showProfile')->name('show_profile')->middleware('auth', 'verified');

Route::get('/Pets', 'PetsController@index')->name('pet_module')->middleware('auth', 'verified');

Route::put('/update/data/user', 'UserController@update')->name('updateUser')->middleware('auth', 'verified');

Route::get('/Table/Owner', 'ProfileController@showOwner')->name('owner_module')->middleware('auth', 'verified');
