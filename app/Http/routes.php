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

Route::get('/', 'PagesController@index');

Route::get('home', 'PagesController@index');
Route::get('root', 'PagesController@show');
Route::get('jstest', 'PagesController@jstest');
Route::get('log', 'PagesController@log');
Route::get('admin', 'PagesController@admin');
Route::get('admin/skill/{id}', 'PagesController@affSkill');
Route::get('admin/exp/{id}', 'PagesController@affExp');
Route::get('admin/educ/{id}', 'PagesController@affEduc');
Route::get('admin/project/{id}', 'PagesController@affProject');
Route::get('delete/skill/{id}', 'PagesController@deleteSkill');
Route::get('delete/project/{id}', 'PagesController@deleteProject');
Route::get('delete/exp/{id}', 'PagesController@deleteExp');
Route::get('delete/educ/{id}', 'PagesController@deleteEduc');
Route::get('admin/user', 'PagesController@userPannel');
Route::get('admin/skill', 'PagesController@skillPannel');
Route::get('admin/exp', 'PagesController@expPannel');
Route::get('admin/educ', 'PagesController@educPannel');
Route::get('admin/project', 'PagesController@projectPannel');
Route::post('up/user', 'PagesController@updateUser');
Route::post('up/skill/{id}', 'PagesController@updateSkill');
Route::post('up/exp/{id}', 'PagesController@updateExp');
Route::post('up/educ/{id}', 'PagesController@updateEduc');
Route::post('up/project/{id}', 'PagesController@updateProject');
Route::post('add/skill', 'PagesController@addSkill');
Route::post('add/exp', 'PagesController@addExp');
Route::post('add/educ', 'PagesController@addEduc');
Route::post('add/project', 'PagesController@addProject');
Route::post('send', 'PagesController@send');
Route::post('auth', 'PagesController@auth');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

