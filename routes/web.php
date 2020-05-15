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
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth', 'CheckRol', 'verified');

Route::get('/Lobby/Specialist', 'EspecialistaController@index')->name('lobbyEspecialista')->middleware('auth', 'ValidateSpecialist', 'verified');

Route::get('/Lobby/Patient', 'PacienteController@index')->name('lobbyPaciente')->middleware('auth', 'ValidatePatient', 'verified');
