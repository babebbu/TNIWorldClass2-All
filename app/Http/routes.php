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
    return view('public/main');
});

Route::get('/qualified', function () {
    return view('public/qualified');
});

Route::post('/check-qualify', 'Registration\RegistrationController@checkQualify');

Route::get('registration/test', 'Registration\RegistrationController@test');
Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('registration', 'Registration\RegistrationController@index');
Route::post('registration/authen', 'Registration\RegistrationController@authen');
Route::post('registration/school', 'Registration\RegistrationController@checkSchool');
//Route::post('registration/update/{id}/{step}', 'Registration\RegistrationController@update');
Route::post('registration/update', 'Registration\RegistrationController@update');
Route::post('registration/update/profile', 'Registration\RegistrationController@updateProfile');
Route::post('registration/update/contact', 'Registration\RegistrationController@updateContact');
Route::post('registration/update/medical', 'Registration\RegistrationController@updateMedical');
Route::post('registration/update/sakura','Registration\RegistrationController@updateSakura');
Route::post('registration/getFacultyQuiz','Registration\RegistrationController@getFacultyQuiz');
Route::get('registration/getProvince','Registration\RegistrationController@getProvince');
Route::get('registration/getQuestion','Registration\RegistrationController@getQuestion');
Route::post('registration/checkAll','Registration\RegistrationController@checkAll');
Route::post('registration/MTQuest','Registration\RegistrationController@MTQuest');
Route::post('registration/confirm','Registration\RegistrationController@confirm');
Route::post('registration/checkPicture','Registration\RegistrationController@checkUploadPicture');
Route::get('csrf', function () {
    return csrf_token();
});

Route::post('registration/authen', 'Registration\RegistrationController@authen');
Route::post('registration/uploadprofilepic', 'Registration\RegistrationController@uploadProfilePic');
Route::get('registration/profilepic/{id}/{facebook_id}', 'Registration\RegistrationController@getProfilePicture');
Route::post('registration/uploadQuestionMT','Registration\RegistrationController@uploadQuestionMT');

Route::get('registration/question/{id}/{facebook_id}', 'Registration\RegistrationController@getQuestionPicture');


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
    /*
    |--------------------------------------------------------------------------
    | Namespace 'App\Http\Controllers\Admin'
    |--------------------------------------------------------------------------
    */
    Route::group(['namespace' => 'Admin'], function() {
        /*
        |--------------------------------------------------------------------------
        | Middleware : Web
        |--------------------------------------------------------------------------
        */
        Route::group(['middleware' => 'web'], function () {
            /*
            |--------------------------------------------------------------------------
            | Not Logged in
            |--------------------------------------------------------------------------
            */
            Route::group(['middleware' => 'admin.authenticate'], function () {
                Route::get('/login', function () {
                    return view('admin/auth/login');
                });
            });
            /*
            |--------------------------------------------------------------------------
            | Logged in
            |--------------------------------------------------------------------------
            */
            Route::group(['middleware' => 'admin.authorize'], function () {

                Route::get('/registrants/callback', 'RegistrantAJAXController@index');
                Route::get('/registrants/callback-post', function () {
                    return view('admin.testpost');
                });

                Route::get('/', 'AdminController@index');
                Route::get('/users', 'AdminController@showAllUsers');

                Route::get('registrants/facebook-gallery', 'RegistrantController@facebookGallery');
                Route::get('registrants/jubjub', 'RegistrantController@jubjub');

                Route::get('registrants/grade/emo', 'RegistrantController@gradeRegistrantByEmoIndex');
                Route::get('registrants/grade/emo/{registrant_id}', 'RegistrantController@gradeRegistrantByEmoProfile');

                Route::get('registrants/grade/faculty', 'RegistrantController@gradeRegistrantByFacultyIndex');
                Route::get('registrants/grade/faculty/{registrant_id}/getMTFile/{filename}', 'RegistrantController@getMTFile');
                Route::get('registrants/grade/faculty/{registrant_id}', 'RegistrantController@gradeRegistrantByFacultyProfile');

                Route::get('registrants/grade/sakura-it', 'RegistrantController@showSakuraIT');
                Route::post('registrants/grade/update/{id}', 'RegistrantController@updateSakuraIT');

                Route::post('qualifies/confirm/{id}', 'QualifiedController@setConfirm');
                Route::resource('qualifies', 'QualifiedController');

                Route::post('registrants/grade/{where}/{registrant_id}/judge/score', 'RegistrantController@updateScore');
                Route::resource('registrants', 'RegistrantController');

                Route::get('staffs/department', 'StaffController@chooseViewDepartment');
                Route::get('staffs/department/{dept}', 'StaffController@listStaffInDepartment');
                
                Route::resource('staffs', 'StaffController');

                Route::get('/registrants/profilepic/{img}', 'RegistrantController@showRegistrantProfilePicture');
            });

            Route::post('/login', 'Auth\AuthController@login');
            Route::get('/logout', 'Auth\AuthController@logout');
        });
    });
});


Route::post('admin/registrants/callback-post', 'Admin\RegistrantAJAXController@wtf');

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
            Route::post('edit','StaffController@edit');
        });
    });
});