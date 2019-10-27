<?php

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

Route::post('login', 'LoginController@login')->name('login');

Route::prefix('tasks')->group(function () {
    Route::get('/', 'TaskController@index')->name('tasks.index');
    Route::post('create', 'TaskController@create')->name('tasks.create');
    Route::post('update-order', 'TaskController@updateOrder')->name('tasks.update-order');
    Route::post('update-state', 'TaskController@updateState')->name('tasks.update-state');
});

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
