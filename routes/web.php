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



Auth::routes();


Route::get('/', 'LandingController@index');
Route::get('/reset-password', 'UsersController@resetPassword')->name('reset-password');
Route::get('/home', 'HomeController@index')->middleware(['web','auth']);
Route::get('/admin-panel', 'MovieController@index')->middleware(['web','auth']);


Route::get('/movies/create', 'MovieController@create')->middleware(['web','auth']);
Route::post('/movies/store', 'MovieController@store')->middleware(['web','auth']);
Route::get('/movies/list', 'MovieController@getMovies')->middleware(['web']);
Route::get('/movies/branches', 'MovieController@getBranches')->middleware(['web','auth']);
