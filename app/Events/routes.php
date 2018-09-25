<?php

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {
   return view('welcome');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');
});

Route::get('json/test', function () {
	return array(
		"staff" => array(
			0 => array("firstname" => "Natthasak","lastname" => "Vechprasit",),
			1 => array("firstname" => "Nut","lastname" => "Farality",)
		)
	);
});

Route::get('json/input/{data}', function () {
	$request = Request::all();
	var_dump($request);
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Admin'], function() {
        Route::group(['middleware' => 'web'], function () {
            Route::group(['middleware' => 'admin.authenticate'], function () {
                Route::get('/login', function () {
                    return view('admin/auth/login');
                });
            });
            Route::group(['middleware' => 'admin.authorize'], function () {
                Route::get('/', 'AdminController@index');
                Route::get('/users', 'AdminController@showAllUsers');
            });
            Route::post('/login', 'Auth\AuthController@login');
            Route::get('/logout', 'Auth\AuthController@logout');
        });
    });
});

Route::group(['middleware' => ['web']], function () {
    Route::group(['namespace' => 'Auth'], function() {
        Route::get('fb-redirect/{section}', 'SocialAuthController@redirect');
        Route::get('fb-callback', 'SocialAuthController@callback');
    });
    
	Route::group(['namespace' => 'Staff'], function() {
		Route::get('staff', function () {
			return redirect('fb-redirect/staff');
		});
		
		Route::group(['prefix' => 'staff'], function () {
	        Route::get('index', 'StaffController@unauthorized');
	        Route::get('register', 'StaffController@register');
	        Route::post('register', 'StaffController@store');
			
            Route::get('profile', 'StaffController@profile');
	    });
	});
});
Route::get('edit','StaffController@edit');