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
})->name('index');

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

    Route::group(['middleware' => ['auth']], function () {

        // Update profile user
        Route::get('user/profile/{profile}', ['as' => 'user.get.profile', 'uses' => 'UserController@getProfile']);
        Route::post('user/profile/{profile}', ['as' => 'user.post.profile', 'uses' => 'UserController@postProfile']);
    
        // Register business
        Route::get('business/register', function () {
            return view('frontend.business.register');
        })->name('business.get.register');
        
        // Show business
        Route::get('user/business/{id}', function ($id) {
            return view('frontend.business.show')->with('id', $id);
        })->name('business.get.show');
        
        // List rating
        Route::get('user/business/{id}/rating', function ($id) {
            return view('frontend.rating.list')->with('id', $id);
        })->name('get.rating');
        
        // API
        Route::group(['prefix' => 'api/v1'], function () {

            // Get cities
            Route::post('city', ['as' => 'get.ciy', 'uses' => 'CityController@getCity']);

            // Get counties
            Route::post('county', ['as' => 'get.county', 'uses' => 'CityController@getCounty']);

            // Post register business
            Route::post('business/register', ['as' => 'business.post.register', 'uses' => 'BusinessController@postRegister']);
        
            //API Show Business
            Route::post('user/business/{id}', ['as' => 'showBusiness', 'uses' => 'BusinessManagerController@showBusiness']);
        
            //API List Rating
            Route::post('user/business/{id}/rating', ['as' => 'list.Rating', 'uses' => 'RatingController@listRating']);
        });
    });

    // Show promotion
    Route::get('promotion/{id}', function ($id) {
        return view('frontend.promotion.show')->with('id', $id);
    })->name('promotion.get.show');
    
    // List promotions of category
    Route::get('category/{id}', function ($id) {
        return view('frontend.category.list_promotions')->with('id', $id);
    })->name('get.category');
    
    // Show promotion
    Route::get('business/{id}', function ($id) {
        return view('frontend.business.info')->with('id', $id);
    })->name('get.business');

    // Show page search
    Route::post('search', function (\Illuminate\Http\Request $request) {
        return view('frontend.layouts.search')->with('info', $request->info);
    })->name('post.search.show');

    Route::group(['prefix' => 'api/v1'], function () {
        // API List new promotion
        Route::post('promotion', ['as' => 'postpromotion', 'uses' =>'PromotionController@postPromotion']);

        // API List featured promotion
        Route::post('promotion/featured', ['as' => 'promotionfeatured', 'uses' => 'PromotionController@postRatingPromotion']);
        
        // API get list promotion of category
        Route::post('category/{id}', ['as' => 'post.category', 'uses' =>'CategoryController@postCategory']);

        // API List follow promotion
        Route::post('promotion/follow', ['as' => 'promotionfollow', 'uses' => 'PromotionController@postFollowPromotion']);

        // API get list promotion of category
        Route::post('business/{id}', ['as' => 'postbusiness', 'uses' =>'BusinessController@postShowBusinessPromotion']);

        // API post show promotion
        Route::post('promotion/{id}', ['as' => 'promotion.post.show', 'uses' => 'PromotionController@postShow']);

        // API search promotion
        Route::post('search/{info}', ['as' => 'post.search', 'uses' =>'PromotionController@postSearch']);
    });
});

//Category list all frontend
view()->composer('frontend.layouts.partials.side_bar', function ($view) {
    $categories = App\Models\Category::all();
    $view->with(['categories'=> $categories]);
});
