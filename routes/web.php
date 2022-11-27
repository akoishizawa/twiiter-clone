<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'TimelineController@showTimelinePage')->name('timeline');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/timeline', 'TimelineController@showTimelinePage')->name('timeline');
Route::post('/timeline', 'TimelineController@postTweet')->name('timeline');

Route::get('/user', 'UserController@showUserPage')->name('user');
Route::get('/edituser', 'EditUserController@showEditUserPage')->name('edit');
Route::post('/editcomplete', 'EditUserController@editComplete')->name('editcomplete');
