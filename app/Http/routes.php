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

Route::get('/', function () {
    return view('backend.layouts.master');
});
Route::resource('admin/city', 'Backend\CityController', ['only' => ['index']]);

Route::auth();

Route::get('/home', 'HomeController@index');
