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
Route::get('/', function() {
  return redirect()->route('home', 'all');
});
Route::get('/{location}/home', 'Pages\PageController@home')->name('home');
Route::match(['get', 'post'], '/search-results', 'Pages\PageController@searchResults')->name('search-results');
Route::get('/profile', 'Pages\PageController@profile')->name('profile');
Route::get('/profile/edit/{id}', 'Pages\PageController@profileEdit')->name('profile.edit');
Route::post('/profile/update/{id}', 'Pages\PageController@profileUpdate')->name('profile.update');
Route::get('/food/{food}', 'Pages\PageController@food')->name('food');
Route::get('/electronics/{electronics}', 'Pages\PageController@electronics')->name('electronics');
Route::get('/contact', 'Pages\PageController@contact')->name('contact');
Route::post('/sendmail', 'Pages\PageController@sendMail')->name('sendMail');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

// Posts routes...
Route::resource('posts', 'PostController', [
  'except' => [
    'edit',
    'update',
    'destroy'
  ]
]);
Route::post('post/update', 'PostController@update')->name('posts.update');
Route::get('post/edit/{id}', 'PostController@edit')->name('posts.edit');
Route::get('post/delete/{post}', 'PostController@destroy')->name('posts.destroy');
Route::post('post/subcategories', 'PostController@getSubCat')->name('posts.getSubCat');

// Comments Routes...
Route::resource('comments', 'CommentController', ['except' => [
  'destroy',
  'update'
]]);
Route::get('comments/delete/{comment}', 'CommentController@destroy')->name('comments.destroy');
Route::post('comments/update', 'CommentController@update')->name('comments.update');

// Shop search routes...
Route::post('shop/search', 'Pages\PageController@shopSearch')->name('shops.search');
Route::get('shop/{shop}', 'Pages\PageController@shopIndex')->name('shops.index');
Route::get('items/reviews/{item}/{shop}', 'Pages\PageController@itemReviews')->name('items.review');

                  ######################
                      // Admin Routes
                  ######################
//This route is used to show admin login form
Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
//This is route is used to process login info
Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
//This route is used to show top items to admin
Route::get('admin', 'Admin\AdminController@index')->name('admin.top-items');
Route::get('admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

// Admin pages routes...
Route::get('admin/users', 'Admin\AdminController@users')->name('admin.users');
Route::get('admin/foods', 'Admin\AdminController@foods')->name('admin.foods');
Route::get('admin/electronics', 'Admin\AdminController@electronics')->name('admin.electronics');

// Admin routes to manage food subcategories...
Route::resource('admin/foods', 'Admin\FoodsController', ['except' => [
    'index', 'create', 'update', 'destroy', 'show'
]]);
Route::get('admin/foods/delete/{subcat}', 'Admin\FoodsController@destroy')->name('foods.destroy');

// Admin routes to manage electronics sub catergories...
Route::resource('admin/electronics', 'Admin\ElectronicsController', ['except' => [
    'index', 'create', 'edit', 'update', 'destroy', 'show'
]]);
Route::get('admin/electronics/delete/{subcat}', 'Admin\ElectronicsController@destroy')->name('electronics.destroy');
