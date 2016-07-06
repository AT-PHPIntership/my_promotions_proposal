<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'admin'], function () {

    // login backend
    Route::get('login', 'Backend\AuthController@getLogin');
    Route::post('login', 'Backend\AuthController@postLogin');
    Route::get('logout', 'Backend\AuthController@getLogout');

    Route::group(['middleware' => 'auth:admin'], function () {
        
        // dashboard
        Route::get('dashboard', function () {
            return view('backend.dashboard.index');
        });
        
    });
});
