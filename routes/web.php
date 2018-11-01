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
    return view('pages.index');
});
Route::get('/about', function () {
    return view('pages.about');
});

// Resources
Route::resource('drawings', 'DrawingsController');
Route::post('drawings/search', 'DrawingsController@search');
Route::post('drawings', 'DrawingsController@filter');



Auth::routes();

Route::get('/my_favorites', 'UserController@myFavorites');
Route::get('/drawings', 'DrawingsController@index')->name('drawings');
Route::get('/home', 'UserController@index')->name('home');
Route::get('/my_info', 'UserController@myInfo');
Route::get('/edit_my_info', 'UserController@editMyInfo');
Route::post('/edit_my_info', 'UserController@editMyInfo');

Route::post('favorite/{drawing}', 'DrawingsController@favoriteDrawing');
Route::post('unfavorite/{drawing}', 'DrawingsController@unFavoriteDrawing');



Route::group(['middleware' => ['auth', 'admin']], function(){
    Route::post('/admin/create', 'DrawingsController@store');
    Route::get('/admin', 'AdminController@index')->name('admin_dashboard');
    Route::get('/admin/create', 'DrawingsController@create')->name('create');
    Route::any('isActive/{id}', [
        'uses' => 'DrawingsController@isActive'
      ]);

});