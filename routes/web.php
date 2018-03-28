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

                ######################
                    // User Routes
                ######################
Route::get('/', 'Pages\PageController@home')->name('home');
Route::get('/profile', 'Pages\PageController@profile')->name('profile');
Route::get('/profile/edit/{id}', 'Pages\PageController@profileEdit')->name('profile.edit');
Route::post('/profile/update/{id}', 'Pages\PageController@profileUpdate')->name('profile.update');
Route::get('/food/{food}', 'Pages\PageController@food')->name('food');
Route::get('/electronics/{electronics}', 'Pages\PageController@electronics')->name('electronics');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

// Posts routes...
Route::resource('posts', 'PostController');

// Comments Routes...
Route::resource('comments', 'CommentController');
