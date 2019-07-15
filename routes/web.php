<?php

Route::get('/', 'frontend\PagesController@index')->name('index');
Route::get('/products', 'frontend\PagesController@products')->name('products');
Route::group(['prefix' => 'search'], function(){
  Route::POST('/product', 'frontend\PagesController@search')->name('search.product');
});
Route::get('/category/{category_id}', 'frontend\PagesController@productsByCategory')->name('productsByCategory');
Route::get('/product/{id}', 'frontend\PagesController@single_product')->name('single_product');
Route::get('/contract', 'frontend\PagesController@contract')->name('contract');

Route::get('/blogs', 'frontend\PagesController@blogs')->name('blogs');
Route::get('/blog-details', 'frontend\PagesController@blog_details')->name('blog_details');


Route::group(['prefix' => 'user'], function(){
  Route::get('/token/{token}', 'frontend\VerificationController@verify')->name('user.verification');
  Route::get('/dashboard', 'frontend\UsersController@dashboard')->name('user.dashboard');
  Route::get('/profile', 'frontend\UsersController@profile')->name('user.profile');
  Route::post('/profile/update', 'frontend\UsersController@profileUpdate')->name('user.profile.update');
});


Route::group(['prefix' => 'cards'], function(){
  Route::get('/', 'frontend\CartsController@index')->name('carts');
  Route::post('/store', 'frontend\CartsController@store')->name('cards.store');
  Route::post('/update/{id}', 'frontend\CartsController@update')->name('carts.update');
  Route::post('/delete/{id}', 'frontend\CartsController@delete')->name('carts.delete');
  Route::post('/delete/{id}', 'frontend\CartsController@delete')->name('carts.delete');
});





Route::group(['prefix' => 'checkout'], function(){
  Route::get('/', 'frontend\CheckoutsController@index')->name('checkout');
  Route::post('/store', 'frontend\CheckoutsController@store')->name('checkouts.store');
});


// admin routes start here
Route::group(['prefix' => 'admin'],function(){
  //admin login
  Route::get('/login', 'Auth\admin\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login/submit', 'Auth\admin\LoginController@login')->name('admin.login.submit');
  
  Route::get('/', 'backend\PagesController@index')->name('admin.index');

  Route::post('/logout/submit', 'Auth\admin\LoginController@logout')->name('admin.logout.submit');

  // Orders route
  Route::group(['prefix' => '/orders'],function(){
    Route::get('/', 'backend\OrdersController@manage')->name('admin.orders.manage');
    Route::get('/details/{id}', 'backend\OrdersController@details')->name('admin.orders.details');
    Route::post('/seen_by_admin/{id}', 'backend\OrdersController@seen_by_admin')->name('admin.orders.seen_by_admin');
    Route::post('/delete/{id}', 'backend\OrdersController@delete')->name('admin.orders.delete');
  });

  // category route
  Route::group(['prefix' => '/category'],function(){
    Route::get('/', 'backend\CategoryController@manage')->name('admin.category.manage');
    Route::get('/create', 'backend\CategoryController@create')->name('admin.category.create');
    Route::post('/store', 'backend\CategoryController@store')->name('admin.category.store');

    Route::get('/edit/{id}', 'backend\CategoryController@edit')->name('admin.category.edit');
    Route::post('/update/{id}', 'backend\CategoryController@update')->name('admin.category.update');
    Route::post('/delete/{id}', 'backend\CategoryController@delete')->name('admin.category.delete');
  });

  //Admin Product route
  Route::group(['prefix' => '/product'],function(){
    Route::get('/', 'backend\ProductController@manage')->name('admin.product.manage');
    Route::get('/create', 'backend\ProductController@create')->name('admin.product.create');
    Route::post('/store', 'backend\ProductController@store')->name('admin.product.store');

    Route::get('/edit/{id}', 'backend\ProductController@edit')->name('admin.product.edit');
    Route::post('/update/{id}', 'backend\ProductController@update')->name('admin.product.update');
    Route::post('/delete/{id}', 'backend\ProductController@delete')->name('admin.product.delete');
  });

  // division route
  Route::group(['prefix' => '/division'],function(){
    Route::get('/', 'backend\DivisionController@manage')->name('admin.division.manage');
    Route::get('/create', 'backend\DivisionController@create')->name('admin.division.create');
    Route::post('/store', 'backend\DivisionController@store')->name('admin.division.store');

    Route::get('/edit/{id}', 'backend\DivisionController@edit')->name('admin.division.edit');
    Route::post('/update/{id}', 'backend\DivisionController@update')->name('admin.division.update');
    Route::post('/delete/{id}', 'backend\DivisionController@delete')->name('admin.division.delete');
  });

  // District route
  Route::group(['prefix' => '/district'],function(){
    Route::get('/', 'backend\DistrictController@manage')->name('admin.district.manage');
    Route::get('/create', 'backend\DistrictController@create')->name('admin.district.create');
    Route::post('/store', 'backend\DistrictController@store')->name('admin.district.store');

    Route::get('/edit/{id}', 'backend\DistrictController@edit')->name('admin.district.edit');
    Route::post('/update/{id}', 'backend\DistrictController@update')->name('admin.district.update');
    Route::post('/delete/{id}', 'backend\DistrictController@delete')->name('admin.district.delete');
  });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
