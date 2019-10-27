<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $user = \App\Eloquent\UserStat::query()->find(1);

    dd(
        \Illuminate\Support\Carbon::createFromFormat('YYYY-mm-dd', 'hh:MM:ss', $user->date),
        $user->date,
        \Illuminate\Support\Carbon::yesterday()->timestamp
    );

    return view('welcome');
});
