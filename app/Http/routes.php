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

    Route::get('event/{id}/register', ['uses' => 'Organizer\EventController@registerToEvent', 'as' => 'register_to_event']);

    Route::post('event/{id}/save_comment', ['uses' => 'CommentRatingController@save', 'as' => 'save_comment']);

    Route::group(['middleware' => 'organizer', 'namespace' => 'Organizer'], function(){
       Route::get('manage_event', ['uses' => 'EventController@manage', 'as' => 'organizer_manage_event']);
        Route::get('manage_event/add', ['uses' => 'EventController@indexAddEvent', 'as' => 'organizer_add_event']);
        Route::post('manage_event/save', ['uses' => 'EventController@addEvent', 'as' => 'organizer_save_new_event']);
        Route::get('manage_event/delete/{id}', ['uses' => 'EventController@deleteEvent', 'as' => 'organizer_delete_event']);

        Route::get('manage_event/event/{id}/add_rundown', ['uses' => 'EventController@indexAddRundown', 'as' => 'organizer_add_rundown_event']);
        Route::post('manage_event/event/{id}/save_rundown', ['uses' => 'EventController@inputEventRundown', 'as' => 'organizer_save_new_rundown_event']);

        Route::get('manage_event/event/{id}/add_winner', ['uses' => 'EventController@indexAddWinner', 'as' => 'organizer_add_winner_event']);
        Route::post('manage_event/event/{id}/save_winner', ['uses' => 'EventController@inputEventWinner', 'as' => 'organizer_save_new_winner_event']);
    });

    Route::group(['middleware' => 'team', 'namespace' => 'Team'], function(){
        Route::get('manage_team', ['uses' => 'TeamController@manage', 'as' => 'team_manage_team']);
        Route::get('manage_team/add', ['uses' => 'TeamController@indexAddTeam', 'as' => 'team_add_team']);
        Route::post('manage_team/save', ['uses' => 'TeamController@addTeam', 'as' => 'team_save_new_team']);
        Route::get('manage_team/delete/{id}', ['uses' => 'TeamController@deleteTeam', 'as' => 'team_delete_team']);

        Route::get('manage_team/team/{id}/edit', ['uses' => 'TeamController@indexEditTeam', 'as' => 'team_edit_team']);
        Route::post('manage_team/team/{id}/save', ['uses' => 'TeamController@editTeam', 'as' => 'team_save_edited_team']);
        Route::post('manage_team/team/{id}/save_athlete', ['uses' => 'TeamController@addPlayer', 'as' => 'team_save_player_to_team']);

        Route::get('manage_team/team/{id}/list_athlete', ['uses' => 'TeamController@manageAthlete', 'as' => 'team_manage_athlete']);
        Route::get('manage_team/team/athlete/{athlete_id}/delete', ['uses' => 'TeamController@deletePlayer', 'as' => 'team_delete_athlete']);
    });

    Route::get('u/{username}/attended_events', ['uses' => 'ScheduleController@getSchedule', 'as' => 'list_attended_event']);
});

Route::get('event/{id}/detail', ['uses' => 'Organizer\EventController@indexEventDetail', 'as' => 'event_detail']);

Route::get('/test', ['uses' => 'HomeController@events']);

