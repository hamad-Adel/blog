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
Route::group(['namespace'=>'Web'], function(){
	Route::get('pages', [
			'uses'=>'PagesController@index',
			'as'=>'index'
	]);
	Route::get('about', [
		'uses'=>'PagesController@about'
	]);
	Route::get('contact', [
		'uses'=>'PagesController@contact'
	]);
	Route::post('contact', [
		'uses'=>'PagesController@sendEmail',
		'as'=>'email.send'
	]);
});