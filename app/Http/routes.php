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

//------------------Backend-----------------------------
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

        // User
        Route::resource('user', 'UserController');

        // Admin
        Route::resource('admins', 'AdminController', ['except' => ['show']]);
        
        // City
        Route::resource('city', 'CityController');

        // Category
        Route::resource('category', 'CategoryController');

        // County
        Route::resource('county', 'CountyController', ['except' => ['show']]);
    });
});

//------------------Frontend-----------------------------
Route::get('/', function () {
    return view('frontend.dashboard.index');
});

Route::group(['namespace' => 'Frontend'], function () {

    // Login user
    Route::get('login', ['as' => 'getlogin', 'uses' => 'AuthController@getLogin']);
    Route::post('login', ['as' => 'postlogin', 'uses' => 'AuthController@postLogin']);
    Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@getLogout']);

    // Register user
    Route::get('user/register', ['as' => 'user.get.register', 'uses' => 'AuthController@getRegister']);
    Route::post('user/register', ['as' => 'user.post.register', 'uses' => 'AuthController@postRegister']);

    // Forget password
    // Password reset link request routes...
    Route::get('password/email', ['as' => 'getemail', 'uses' => 'PasswordController@getEmail']);
    Route::post('password/email', ['as' => 'postemail', 'uses' => 'PasswordController@postEmail']);

    // Password reset routes...
    Route::get('password/reset/{token}', ['as' => 'getreset', 'uses' => 'PasswordController@getReset']);
    Route::post('password/reset', ['as' => 'postreset', 'uses' => 'PasswordController@postReset']);
});
