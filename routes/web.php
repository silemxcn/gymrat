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

Route::get('/', 'PostsController@index')->name('home');
Route::get('/home', 'PostsController@index')->name('home');
// only authenticated users
Route::group( ['middleware' => 'auth'], function() {
    Route::resource('user', 'UserController');

});


Route::get('/about', function () {
    return view('about');
});
Route::get('/muscle-chart', function () {
    return view('muscle-chart');
});
Route::resource('posts','PostsController');
Route::resource('exercises','ExercisesController');
Route::resource('routines','RoutinesController');
Route::resource('user','UserController');

Route::get('achievements/submission','AchievementsController@submission');
Route::get('achievements/showsub','AchievementsController@show_submission');
Route::resource('achievements','AchievementsController');
Route::post('achievements/submit', 'AchievementsController@submit');
Route::post('achievements/vote', 'AchievementsController@vote');

Route::post('routines/post', 'RoutinesController@store');
Route::post('ajaxPost', 'ajaxController@ajaxRequestPost');
Auth::routes();


