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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', 'JobProfilesController@index')->name('profiles');
Route::get('/profiles/{category}', 'JobProfilesController@profileCategory')->name('profileCategory');
Route::get('/profile/{id}', 'JobProfilesController@profile')->name('profile');

Route::get('/user/{name}', 'UserProfileController@user')->name('user');
Route::put('/user/{id}', 'UserProfileController@update')->name('profile.update');

Route::resource('order', 'OrderController');

Route::get('/computers', 'myProductsController@index')->name('computers');
Route::resource('reviews', 'ReviewController');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
