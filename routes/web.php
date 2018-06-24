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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/documents/{document}/{slug?}', 'DocumentController@show')->name('documents.show');

Route::group(['prefix' => '/admin', 'as' => 'admin.'], function () {
    Route::resource('projects', 'Admin\ProjectController');
    Route::group(['prefix' => '/projects/{project}', 'as' => 'projects.'], function () {
        Route::resource('documents', 'Admin\DocumentController');
        Route::get('/documents/{document}/up', 'Admin\DocumentController@up')->name('documents.up');
        Route::get('/documents/{document}/down', 'Admin\DocumentController@down')->name('documents.down');
    });

    Route::resource('users', 'Admin\UserController');
});
