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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'frontend\HomeController@index')->name('home');

Route::group(['prefix'=>'admin',  'middleware' => 'auth'], function(){
    
    Route::get('/','admin\AdminController@index')->name('index_login');  
    
    Route::get('/country','admin\CountryController@index')->name('country_index');  
    Route::get('/country/create','admin\CountryController@create')->name('create_country'); 
    Route::post('/country/store','admin\CountryController@store')->name('store_country');
    Route::get('/country/edit/{id}','admin\CountryController@edit')->name('edit_country');
    Route::post('/country/delete','admin\CountryController@destroy')->name('delete_country');
    
    
    Route::get('/city','admin\CityController@index')->name('city_index');  
    Route::get('/city/create','admin\CityController@create')->name('create_city'); 
    Route::post('/city/store','admin\CityController@store')->name('store_city');
    Route::get('/city/edit/{id}','admin\CityController@edit')->name('edit_city');
    Route::post('/city/delete','admin\CityController@destroy')->name('delete_city');

    Route::get('/post','admin\PostController@index')->name('post_index');  
    Route::get('/post/create','admin\PostController@create')->name('create_post'); 
    Route::post('/post/store','admin\PostController@store')->name('store_post');
    Route::get('/post/edit/{id}','admin\PostController@edit')->name('edit_post');
    Route::post('/post/delete','admin\PostController@destroy')->name('delete_post');
});