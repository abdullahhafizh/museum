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

Route::get('products/create', 'HomeController@states');
Route::get('states/get/{id}', 'HomeController@getStates');

Route::post('add', 'HomeController@add')->name('add');
Route::post('edit', 'HomeController@edit')->name('edit');
Route::post('remove', 'HomeController@remove')->name('remove');
Route::post('search', 'HomeController@search')->name('search');
Route::post('update', 'Auth\AuthController@update')->name('update');

Route::get('/', 'HomeController@index')->name('home');
Route::get('cart', 'HomeController@cart')->name('cart');
Route::get('checkout', 'HomeController@checkout')->name('checkout');
Route::get('destroy', 'HomeController@destroy')->name('destroy');
Route::get('profile', 'Auth\AuthController@profile')->name('profile');

Route::get('auth/{provider}', 'Auth\SocialiteController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\SocialiteController@handleProviderCallback');

Route::get('{category}', 'HomeController@category')->name('category');
Route::get('{category}/{sub_category}', 'HomeController@sub_category')->name('sub_category');
Route::get('{category}/{sub_category}/{id}', 'HomeController@product')->name('product');
