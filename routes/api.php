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

Route::controller(App\Http\Controllers\userController::class)->prefix('user')->group(function(){
    Route::post('register','store');
    Route::post('login','show');
});
Route::controller(App\Http\Controllers\gameController::class)->prefix('game')->group(function(){
    Route::post('add','store');
    Route::get('games','index');
    Route::get('show','show');
});