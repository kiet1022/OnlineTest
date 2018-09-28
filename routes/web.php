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



Route::group(['prefix' => 'admin'], function() {
	Route::get('usermangement', function() {
		return view('admin.user.member');
	});
	Route::get('adduser', function() {
		return view('admin.user.adduser');
	});
	Route::get('newstypelist', function() {
		return view('admin.news.newstypelist');
	});
	Route::get('addnewstype', function() {
		return view('admin.news.addnewstype');
	});
	Route::get('newslist', function() {
		return view('admin.news.newslist');
	});
	Route::get('addnews', function() {
		return view('admin.news.addnews');
	});
	Route::get('test','AdminController@test');
});
