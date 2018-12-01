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
	return view('pages.home');
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
	Route::post('edittype/{id}','AdminController@postEditNewsType')->name('post_edit_news_type');


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

	//Vieww questions types list
	Route::get('questiontypeslist','AdminController@getQuestionsTypesList')->name('get_questions_types_list');
	//View add question type
	Route::get('getaddnewquestiontype','AdminController@getAddNewQuestionType')->name('get_add_question_type');
	//Add new question type
	Route::post('postaddnewquestiontype', 'AdminController@postAddNewQuestionType')->name('post_add_new_question_type');
	// view Edit question type page
	Route::get('editquestiontype/{id}','AdminController@getEditQuestionType')->name('get_edit_question_type');
	//Edit question type
	Route::post('editquestiontype/{id}','AdminController@postEditQuestionType')->name('post_edit_question_type');
	//delete question type
	Route::get('deletequestiontype/{id}','AdminController@deleteQuestionType')->name('delete_question_type');


	//view question list
	Route::get('questionlist', 'AdminController@getQuestionList')->name('get_question_list');
	Route::get('getaddnewques', 'AdminController@getAddNewQuestion')->name('get_add_new_question');
	Route::post('postaddnewquest','AdminController@postAddNewQuestion')->name('post_add_new_question');
	Route::get('deletequestion/{id}','AdminController@deleteQuestion')->name('delete_question');
	Route::get('geteditquestion/{id}', 'AdminController@getEditQuestion')->name('get_edit_question');
	Route::post('posteditquestion/{id}','AdminController@postEditQuestion')->name('post_edit_question');
	Route::post('importquestionbyfile','AdminController@importQuestionByFile')->name('import_question_by_file');

	//getaddtest
	Route::get('addtest', 'AdminController@getAddNewTest')->name('get_add_new_test');
	Route::post('addtest','AdminController@postAddNewTest')->name('post_add_new_test');
});

Route::prefix('pages')->group(function(){
	//View home page
	Route::get('home', 'PageController@getHomePage')->name('get_home_page');
	//View News Home page
	Route::get('newshome', 'PageController@getNewsPage')->name('get_news_page');
	//View News detail
	Route::get('{tenkhongdau}/{id}.html', 'PageController@getNewsDetail')->name('get_news_detail');
	//View News Type
	Route::get('type/{id}','PageController@getNewsType')->name('get_news_type');
	//View register page
	Route::get('register', 'UserController@getRegisterPage')->name('get_register_page');
	//View Login page
	Route::get('login', 'UserController@getLoginPage')->name('get_login_page');
	//Register
	Route::post('register', 'UserController@postRegister')->name('post_register');
	//Login
	Route::post('login', 'UserController@PostLogin')->name('post_login');
	//Forum
	Route::get('forum','PageController@getForumPage')->name('get_forum_page');
	//Get topic detail
	Route::get('forum/detail/{id}','PageController@getTopicDetail')->name('get_topic_detail');
	//Post
	Route::post('postintoforum','PageController@postToForum')->name('post_to_forum');
	//Comment
	Route::post('comment/{id_post}','PageController@commentToPost')->name('comment');
	//Like
	Route::get('like','AjaxController@Like')->name('like');
	//Dislike
	Route::get('dislike','AjaxController@Dislike')->name('dislike');
	
});


Route::prefix('user')->group(function(){
	//Logout
	Route::get('logout', 'UserController@Logout')->name('logout');
	//View user info
	Route::get('info/{id}', 'UserController@getInfoPage')->name('get_user_info_page');
});

