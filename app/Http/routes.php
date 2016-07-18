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



Route::group(['prefix' => 'admin', 'namespace' => 'Backend'], function () {

    // Login backend
    Route::get('login', 'AuthController@getLogin');
    Route::post('login', 'AuthController@postLogin');
    Route::get('logout', 'AuthController@getLogout');

    Route::group(['middleware' => 'auth:admin'], function () {

        // Dashboard
        Route::get('dashboard', function () {
            return view('backend.dashboard.index');
        })->name('dashboard');
        
        // Business
        Route::resource('business', 'BusinessController');

        // Admin
        Route::resource('admins', 'AdminController');
        
        // City
        Route::resource('city', 'CityController');

        // County
        Route::resource('county', 'CountyController');
    });
});
