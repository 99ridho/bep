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

Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home']);

Route::get('/login', ['uses' => 'GuestController@login', 'as' => 'login']);
Route::get('/register', ['uses' => 'GuestController@register', 'as' => 'register']);

Route::post('auth/login', ['uses' => 'AuthController@login', 'as' => 'auth_login']);
Route::post('auth/register', ['uses' => 'AuthController@register', 'as' => 'auth_register']);
Route::get('auth/logout', ['uses' => 'AuthController@logout', 'as'=>'auth_logout']);

Route::get('u/{username}', ['uses' => 'ProfileController@index', 'as' => 'user_profile']);

Route::group(['middleware' => 'auth'], function(){
    Route::get('change_password', ['uses' => 'ProfileController@changePassword', 'as' => 'user_change_password']);
    Route::get('change_profile', ['uses' => 'ProfileController@changeProfile', 'as' => 'user_change_profile']);
    Route::post('save_profile', ['uses' => 'ProfileController@saveProfile', 'as' => 'user_save_profile']);
    Route::post('auth/change_password', ['uses' => 'AuthController@changePassword', 'as' => 'auth_change_password']);

    Route::group(['middleware' => 'organizer', 'namespace' => 'Organizer'], function(){
       Route::get('manage_event', ['uses' => 'EventController@manage', 'as' => 'organizer_manage_event']);
        Route::get('manage_event/add', ['uses' => 'EventController@indexAddEvent', 'as' => 'organizer_add_event']);
        Route::post('manage_event/save', ['uses' => 'EventController@addEvent', 'as' => 'organizer_save_new_event']);
        Route::get('manage_event/delete/{id}', ['uses' => 'EventController@deleteEvent', 'as' => 'organizer_delete_event']);

        Route::get('manage_event/event/{id}/add_rundown', ['uses' => 'EventController@indexAddRundown', 'as' => 'organizer_add_rundown_event']);
        Route::post('manage_event/event/{id}/save_rundown', ['uses' => 'EventController@inputEventRundown', 'as' => 'organizer_save_new_rundown_event']);
    });
});

