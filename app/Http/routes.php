<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
    Route::get('/', "IndexController@welcome");
    Route::get('/logout', "IndexController@logout");
    Route::get('/feedback', "IndexController@feedback");
    Route::post('/feed-image-upload', "IndexController@imageUpload");
    Route::post('/savefeedback', "IndexController@saveFeedback");
    Route::get('/image-manager.json', "IndexController@imageManager");
    Route::get('/dashboard', "IndexController@dashboard");
    Route::get("/login/{username}/{password}", "IndexController@loginValidate");
});
