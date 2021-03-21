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

Route::group(['middleware' => 'api'], function ($router) {
    Route::prefix('auth')->group(function($router) {
        Route::post('login', 'Auth\LoginController@login');
        Route::post('register', 'Auth\RegisterController@register');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');
    });
});

Route::middleware('auth:api')->group(function ($router) {
    Route::prefix('user')->group(function($router) {
        Route::post('bank\account', 'BankAccountController@store');
    });

    Route::prefix('banks')->group(function($router) {
        Route::get('list', 'BankController@index');
    });
});
