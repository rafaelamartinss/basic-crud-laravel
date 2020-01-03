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

Route::prefix('categories')->group(function () {
    Route::get('', 'CategoryController@index')->name('categories.list');
    Route::post('', 'CategoryController@store')->name('categories.store');
    Route::get('create', 'CategoryController@create')->name('categories.create');
    Route::get('{id}', 'CategoryController@show')->name('categories.show');
    Route::get('{id}/edit', 'CategoryController@edit')->name('categories.edit');
    Route::put('{id}', 'CategoryController@update')->name('categories.update');
    Route::delete('{id}/delete', 'CategoryController@destroy')->name('categories.destroy');
});

Route::prefix('products')->group(function () {
    Route::get('', 'ProductController@index')->name('products.list');
    Route::post('', 'ProductController@store')->name('products.store');
    Route::get('create', 'ProductController@create')->name('products.create');
    Route::get('{id}', 'ProductController@show')->name('products.show');
    Route::get('{id}/edit', 'ProductController@edit')->name('products.edit');
    Route::put('{id}', 'ProductController@update')->name('products.update');
    Route::delete('{id}/delete', 'ProductController@destroy')->name('products.destroy');
});



