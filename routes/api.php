<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('user', function () {
    return User::all();
});

Route::get('user/{id}', function ($id) {
    return User::find($id);
});

Route::post('user', function (Request $request) {
    return User::create($request->all);
});

Route::put('user/{id}', function (Request $request, $id) {
    $user = User::findOrFail($id);
    $user->update($request->all());

    return $user;
});

Route::delete('user/{id}', function ($id) {
    User::find($id)->delete();
    return 204;
});
