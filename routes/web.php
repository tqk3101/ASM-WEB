<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
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

Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/home', 'App\Http\Controllers\HomeController@index');
Route::get('/about', 'App\Http\Controllers\HomeController@about');
Route::get('/collection', 'App\Http\Controllers\Client\ProductsController@index');
Route::get('/product/{id}', 'App\Http\Controllers\Client\ProductsController@showItem');
Route::get('/product-cat/{id}', 'App\Http\Controllers\Client\ProductsController@productCat');
Route::get('/posts', 'App\Http\Controllers\Client\BlogsController@index');
Route::get('/post/{id}', 'App\Http\Controllers\Client\BlogsController@showItem');
Route::get('/cart', 'App\Http\Controllers\Client\CartController@index');
Route::get('/add-to-cart/{id}', 'App\Http\Controllers\Client\CartController@addToCart');
Route::post('/update-cart', 'App\Http\Controllers\Client\CartController@update');
Route::delete('/remove-from-cart', 'App\Http\Controllers\Client\CartController@remove');
Route::get('/checkout', 'App\Http\Controllers\Client\CartController@checkout');
Route::get('/contact', 'App\Http\Controllers\Client\ContactController@index');
Route::post('/order', 'App\Http\Controllers\Client\CartController@payment');
Route::get('/return', 'App\Http\Controllers\Client\CartController@return');
Route::get('/user/profile/{id}', 'App\Http\Controllers\Client\AccountController@index');
Route::get('/user/profile/edit/{id}', 'App\Http\Controllers\Client\AccountController@edit');
Route::get('/user/profile/change-pass/{id}', 'App\Http\Controllers\Client\AccountController@change');
Route::post('/user/profile/update-pass/{id}', 'App\Http\Controllers\Client\AccountController@changePass');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/wishlist', 'App\Http\Controllers\Client\CartController@wishlist')->name('wishlist');
    Route::get('/wishlist-remove/{id}', 'App\Http\Controllers\Client\CartController@wishlistRemove')->name('wishlist.remove');
    Route::get('/wishlist/{id}', 'App\Http\Controllers\Client\CartController@addWishlist')->name('wishlist.add');
});


// ROUTE DASHBOARD
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\DashboardController@index');
});

// ROUTE ADMIN CATEGORIES
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/categories', 'App\Http\Controllers\Admin\CategoriesController@index');
});
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/categories/create', 'App\Http\Controllers\Admin\CategoriesController@create');
});
Route::group(['middleware' => ['admin']], function () {
    Route::post('/admin/categories/insert', 'App\Http\Controllers\Admin\CategoriesController@insert');
});
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/categories/edit/{id}', 'App\Http\Controllers\Admin\CategoriesController@edit');
});
Route::group(['middleware' => ['admin']], function () {
    Route::post('/admin/categories/update/{id}', 'App\Http\Controllers\Admin\CategoriesController@update');
});
Route::group(['middleware' => ['admin']], function () {
    Route::post('/admin/categories/delete', 'App\Http\Controllers\Admin\CategoriesController@delete');
});

// ROUTE ADMIN BLOGS
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/blogs', 'App\Http\Controllers\Admin\BlogsController@index');
});
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/blogs/create', 'App\Http\Controllers\Admin\BlogsController@create');
});
Route::group(['middleware' => ['admin']], function () {
    Route::post('/admin/blogs/insert', 'App\Http\Controllers\Admin\BlogsController@insert');
});
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/blogs/edit/{id}', 'App\Http\Controllers\Admin\BlogsController@edit');
});
Route::group(['middleware' => ['admin']], function () {
    Route::post('/admin/blogs/update/{id}', 'App\Http\Controllers\Admin\BlogsController@update');
});
Route::group(['middleware' => ['admin']], function () {
    Route::post('/admin/blogs/delete', 'App\Http\Controllers\Admin\BlogsController@delete');
});

// ROUTE ADMIN USERS
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/users', 'App\Http\Controllers\Admin\UsersController@index');
});
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/users/add', 'App\Http\Controllers\Admin\UsersController@add');
});
Route::group(['middleware' => ['admin']], function () {
    Route::post('/admin/users/insert', 'App\Http\Controllers\Admin\UsersController@insert');
});
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/users/edit/{id}', 'App\Http\Controllers\Admin\UsersController@edit');
});
Route::group(['middleware' => ['admin']], function () {
    Route::post('/admin/users/update/{id}', 'App\Http\Controllers\Admin\UsersController@update');
});
Route::group(['middleware' => ['admin']], function () {
    Route::post('/admin/users/delete', 'App\Http\Controllers\Admin\UsersController@delete');
});

// ROUTE ADMIN PRODUCTS
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/products', 'App\Http\Controllers\Admin\ProductsController@index');
});
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/products/add', 'App\Http\Controllers\Admin\ProductsController@add');
});
Route::group(['middleware' => ['admin']], function () {
    Route::post('/admin/products/insert', 'App\Http\Controllers\Admin\ProductsController@insert');
});
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/products/edit/{id}', 'App\Http\Controllers\Admin\ProductsController@edit');
});
Route::group(['middleware' => ['admin']], function () {
    Route::post('/admin/products/update/{id}', 'App\Http\Controllers\Admin\ProductsController@update');
});
Route::group(['middleware' => ['admin']], function () {
    Route::post('/admin/products/delete', 'App\Http\Controllers\Admin\ProductsController@delete');
});
// ROUTE ADMIN BILLS
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/bills', 'App\Http\Controllers\Admin\BillsController@index');
    Route::get('/admin/bills/edit/{id}', 'App\Http\Controllers\Admin\BillsController@edit');
    Route::post('/admin/bills/update/{id}', 'App\Http\Controllers\Admin\BillsController@update');
    Route::post('/admin/bills/delete', 'App\Http\Controllers\Admin\BillsController@delete');
});
