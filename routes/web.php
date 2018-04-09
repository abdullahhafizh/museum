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

Route::get('/', 'HomeController@index')->name('home');
Route::get('cart', 'HomeController@cart')->name('cart');
Route::get('profile', 'Auth\AuthController@profile')->name('profile');
Route::get('{category}', 'HomeController@category')->name('category');
Route::get('{category}/{sub_category}', 'HomeController@sub_category')->name('sub_category');
Route::get('{category}/{sub_category}/{id}', 'HomeController@product')->name('product');

Route::post('search', 'HomeController@search')->name('search');
Route::post('update', 'Auth\AuthController@update')->name('update');

Route::get('auth/{provider}', 'Auth\SocialiteController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\SocialiteController@handleProviderCallback');
