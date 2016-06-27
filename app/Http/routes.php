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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::auth();

Route::get('/home', 'HomeController@index');

/*-------------------Frontend------------------------*/
Route::get('/', function () {
   return view('frontend.dashboard.index'); 
});
Route::get('details', function() {
    return view('frontend.dashboard.detailsPromotion');
});
Route::get('login', function() {
    return view('frontend.auth.login');
});
Route::get('register', function() {
    return view('frontend.auth.register');
});
Route::get('user/registerbusiness', function() {
    return view('frontend.business.register');
});
Route::get('list', function() {
    return view('frontend.dashboard.listPromotion');
});
Route::get('sale', function() {
    return view('frontend.dashboard.listPromotion');
});
Route::get('business', function() {
    return view('frontend.business.index');
});
Route::get('business/add_promotion', function() {
    return view('frontend.business.promotion');
});
Route::get('business/follower', function() {
    return view('frontend.business.follower');
});