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



Route::prefix('admin')->group(function() {
	//view user list
	Route::get('usermangement','AdminController@getUserlist')->name('get_user_list');
	//view add user page
	Route::get('adduser', 'AdminController@getViewAddUser')->name('get_add_user');
	//add new user
	Route::post('adduser','AdminController@addUser')->name('post_add_user');
	//delete user
	Route::get('deleteuser/{id}','AdminController@deleteUser')->name('delete_user');
	//View edit user page
	Route::get('edituser/{id}','AdminController@getEditUser')->name('get_edit_user');
	//Edit user
	Route::post('edituser/{id}','AdminController@postEditUser')->name('post_edit_user');
	//Reset pass
	Route::get('resetpass/{id}', 'AjaxController@resetPass')->name('reset_pass');


	//view news type
	Route::get('newstypelist', 'AdminController@getNewsTypeList')->name('get_news_type_list');
	//view add news type page
	Route::get('addnewstype', 'AdminController@getAddNewsType')->name('get_add_news_type');
	//add news type
	Route::post('addnewstype','AdminController@postAddNewsType')->name('post_add_news_type');
	//delete news type
	Route::get('deletetype/{id}','AdminController@deleteNewsType')->name('delete_news_type');
	// view Edit news type page
	Route::get('edittype/{id}','AdminController@getEditNewsType')->name('get_edit_news_type');
	//Edit news type page
	Route::post('edittype{id}','AdminController@postEditNewsType')->name('post_edit_news_type');


	//view news list
	Route::get('newslist', 'AdminController@getNewsList')->name('get_news_list');
	//View add news
	Route::get('addnews', 'AdminController@getAddNews')->name('get_add_news');
	//add news
	Route::post('addnews', 'AdminController@postAddNews')->name('post_add_news');
	//delete news type
	Route::get('deletenews/{id}','AdminController@deleteNews')->name('delete_news');
	// view Edit news type page
	Route::get('editnews/{id}','AdminController@getEditNews')->name('get_edit_news');
	//Edit news type page
	Route::post('editnews{id}','AdminController@postEditNews')->name('post_edit_news');
});
