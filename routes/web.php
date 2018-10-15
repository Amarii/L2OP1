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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/drawings', 'PagesController@drawings');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('store', 'AdminController');
//Route::resource('destroy', 'AdminController');

Route::resource('admin/drawings', 'AdminController');

Route::resource('drawings', 'DrawingController', ['except' => 'edit']);

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@Login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/create', 'AdminController@create');
    Route::get('/drawings', 'AdminController@drawings');

});

