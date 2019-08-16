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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/master', function () {
    return view('layouts.master');
});

// Profile
Route::get('/profile', 'ProfileController@index')->name('profile.index');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

// Projects
Route::resource('/projects', 'ProjectsController');

// Projects
// Route::get('/projects','ProjectsController@index')->name('pojects.index');
// Route::get('/projects/create','ProjectsController@create')->name('projects.create');
// Route::post('/projects','ProjectsController@store')->name('projects.store');
// Route::get('/projects/{id}','ProjectsController@show')->name('projects.show');
// Route::get('/projects/{id}/edit','ProjectsController@edit')->name('projects.edit');
// Route::put('/projects/{id}','ProjectsController@update')->name('projects.update');
// Route::delete('/projects/{id}','ProjectsController@destroy')->name('projects.destroy');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
