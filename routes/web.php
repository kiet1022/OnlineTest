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

Route::get('/','User\UserController@GetHomePage')->name('get_home_page');



Route::prefix('admin')->middleware('admin')->group(function() {
	Route::get('home', 'Admin\UserController@getAdminHomePage')->name('get_admin_home_page');
	Route::prefix('user')->group(function(){
		//view user list
		Route::get('usermangement','Admin\UserController@getUserlist')->name('get_user_list');
		//view add user page
		Route::get('adduser', 'Admin\UserController@getViewAddUser')->name('get_add_user');
		//add new user
		Route::post('adduser','Admin\UserController@addUser')->name('post_add_user');
		//add user by Excel
		Route::post('adduserbyfile','Admin\UserController@addUserByFile')->name('import_user_by_file');
		//delete user
		Route::get('deleteuser/{id}','Admin\UserController@deleteUser')->name('delete_user');
		//View edit user page
		Route::get('edituser/{id}','Admin\UserController@getEditUser')->name('get_edit_user');
		//Edit user
		Route::post('edituser/{id}','Admin\UserController@postEditUser')->name('post_edit_user');
		//Edit info for admin
		Route::get('editadmininfo/{id}','Admin\UserController@getEditAdminInfo')->name('get_edit_admin_info');
		Route::post('editadmininfo/{id}','Admin\UserController@postEditAdminInfo')->name('post_edit_admin_info');
		//Change pass for admin
		Route::post('changepass/{id}','Admin\UserController@ChangePass')->name('change_pass_admin');
		//Reset pass
		Route::get('resetpass/{id}', 'AjaxController@resetPass')->name('reset_pass');
	});
	Route::prefix('newstype')->group(function(){
		//view news type
		Route::get('newstypelist', 'Admin\NewsTypeController@getNewsTypeList')->name('get_news_type_list');
		//view add news type page
		Route::get('addnewstype', 'Admin\NewsTypeController@getAddNewsType')->name('get_add_news_type');
		//add news type
		Route::post('addnewstype','Admin\NewsTypeController@postAddNewsType')->name('post_add_news_type');
		//delete news type
		Route::get('deletetype/{id}','Admin\NewsTypeController@deleteNewsType')->name('delete_news_type');
		// view Edit news type page
		Route::get('edittype/{id}','Admin\NewsTypeController@getEditNewsType')->name('get_edit_news_type');
		//Edit news type page
		Route::post('edittype/{id}','Admin\NewsTypeController@postEditNewsType')->name('post_edit_news_type');
	});
	Route::prefix('news')->group(function(){
		//view news list
		Route::get('newslist', 'Admin\NewsController@getNewsList')->name('get_news_list');
		//View add news
		Route::get('addnews', 'Admin\NewsController@getAddNews')->name('get_add_news');
		//add news
		Route::post('addnews', 'Admin\NewsController@postAddNews')->name('post_add_news');
		//delete news type
		Route::get('deletenews/{id}','Admin\NewsController@deleteNews')->name('delete_news');
		// view Edit news type page
		Route::get('editnews/{id}','Admin\NewsController@getEditNews')->name('get_edit_news');
		//Edit news type page
		Route::post('editnews{id}','Admin\NewsController@postEditNews')->name('post_edit_news');
	});
	Route::prefix('questions-type')->group(function(){
		//Vieww questions types list
		Route::get('questiontypeslist','Admin\QuestionTypeController@getQuestionsTypesList')->name('get_questions_types_list');
		//View add question type
		Route::get('getaddnewquestiontype','Admin\QuestionTypeController@getAddNewQuestionType')->name('get_add_question_type');
		//Add new question type
		Route::post('postaddnewquestiontype', 'Admin\QuestionTypeController@postAddNewQuestionType')->name('post_add_new_question_type');
		// view Edit question type page
		Route::get('editquestiontype/{id}','Admin\QuestionTypeController@getEditQuestionType')->name('get_edit_question_type');
		//Edit question type
		Route::post('editquestiontype/{id}','Admin\QuestionTypeController@postEditQuestionType')->name('post_edit_question_type');
		//delete question type
		Route::get('deletequestiontype/{id}','Admin\QuestionTypeController@deleteQuestionType')->name('delete_question_type');
	});
	Route::prefix('questions')->group(function(){
		//view question list
		Route::get('questionlist', 'Admin\QuestionController@getQuestionList')->name('get_question_list');
		Route::get('getaddnewques', 'Admin\QuestionController@getAddNewQuestion')->name('get_add_new_question');
		Route::post('postaddnewquest','Admin\QuestionController@postAddNewQuestion')->name('post_add_new_question');
		Route::get('deletequestion/{id}','Admin\QuestionController@deleteQuestion')->name('delete_question');
		Route::get('geteditquestion/{id}', 'Admin\QuestionController@getEditQuestion')->name('get_edit_question');
		Route::post('posteditquestion/{id}','Admin\QuestionController@postEditQuestion')->name('post_edit_question');
		Route::post('importquestionbyfile','Admin\QuestionController@importQuestionByFile')->name('import_question_by_file');
	});
	Route::prefix('tests')->group(function(){
		//getaddtest
		Route::get('addtestfrombank', 'Admin\TestController@getAddNewTestFromBank')->name('get_add_new_test_from_bank');
		Route::post('addtestfrombank','Admin\TestController@postAddNewTestFromBank')->name('post_add_new_test_from_bank');
		Route::get('addnewtest','Admin\TestController@getAddnewTest')->name('get_add_new_test');
		Route::post('addnewtest','Admin\TestController@postAddNewTest')->name('post_add_new_test');
		Route::get('testlist','Admin\TestController@getTestList')->name('get_test_list');
		Route::get('edittest/{id}','Admin\TestController@getEditTest')->name('get_edit_test');
		Route::post('edittest/{id}','Admin\TestController@postEditTest')->name('post_edit_test');
		Route::get('deleteTest/{id}','Admin\TestController@deleteTest')->name('delete_test');
		Route::get('confirm/{id}','Admin\TestController@confirmTest')->name('confirm_test');
		Route::get('result/{id}', 'Admin\TestController@testResult')->name('get_test_result');
		Route::get('preview/{id}','Admin\TestController@PreviewTest')->name('preview_test_admin');
	});
	Route::prefix('statistic')->group(function(){
		Route::get('test','Admin\StatisticController@testStatistic')->name('get_test_statistic');
		Route::post('numberoftestbymonth','Admin\StatisticController@getNumberOfTestByMonth')->name('get_num_test_by_month');
		Route::post('numberofjoinedtestbyyear','Admin\StatisticController@getNumberOfJoinedTestByYear')->name('get_num_joined_test_by_year');
		Route::post('numberofjoinedtestbymonth','Admin\StatisticController@getNumberOfJoinedTestByMonth')->name('get_num_joined_test_by_month');
	});
});

Route::prefix('users')->middleware('user')->group(function(){
	Route::prefix('info')->group(function(){
		//View user info
		Route::get('{id}', 'User\InfoController@getInfoPage')->name('get_user_info_page');
		Route::post('edit/user-{id}/{idinfo}', 'User\InfoController@postEditInfo')->name('post_edit_userinfo');
		Route::post('changePass/{id}','User\UserController@changePass')->name('changePass');
	});
	Route::prefix('forum')->group(function(){
		//Forum
		Route::get('forum','User\ForumController@getForumPage')->name('get_forum_page');
		//Get topic detail
		Route::get('forum/detail/{id}','User\ForumController@getTopicDetail')->name('get_topic_detail');
		//Post
		Route::post('post-into-forum','User\ForumController@postToForum')->name('post_to_forum');
		//Comment
		Route::post('comment/{id_post}','User\ForumController@commentToPost')->name('comment');
		//Like
		Route::get('like','AjaxController@Like')->name('like');
		//Dislike
		Route::get('dislike','AjaxController@Dislike')->name('dislike');
	});
	Route::prefix('test')->group(function(){
		Route::get('result/{id}','User\TestController@getTestResult')->name('get_user_test_result');
		Route::get('addtest','User\TestController@getAddTest')->name('get_add_test_by_user');
		Route::post('addtest','User\TestController@postAddTest')->name('post_add_test_by_user');
		Route::get('testadded','User\TestController@getTestAdded')->name('get_test_added');
		Route::get('preview/{id}','User\TestController@getTestPreview')->name('get_test_preview');
	});
	
});

Route::prefix('user')->group(function(){
	//View register page
	Route::get('register', 'User\UserController@getRegisterPage')->name('get_register_page');
	//View Login page
	Route::get('login', 'User\UserController@getLoginPage')->name('get_login_page');
	//Register
	Route::post('register', 'User\UserController@postRegister')->name('post_register');
	//Login
	Route::post('login', 'User\UserController@PostLogin')->name('post_login');
	//Logout
	Route::get('logout', 'User\UserController@Logout')->name('logout');
});
Route::prefix('news')->group(function(){
	//View News Home page
	Route::get('news-home-page', 'User\NewsController@getNewsPage')->name('get_news_page');
	//View News detail
	Route::get('{tenkhongdau}/{id}.html', 'User\NewsController@getNewsDetail')->name('get_news_detail');
	//View News Type
	Route::get('type/{id}','User\NewsController@getNewsType')->name('get_news_type');
});
Route::prefix('test')->group(function(){
	//test list
	Route::get('test-list', 'Test\TestController@getTestList')->name('get_test_list_user');
	//test demo
	Route::get('demo/{id}','Test\TestController@getTestDemo')->name('get_test_demo');
	//test detail
	Route::post('test-detail/{id}','Test\TestController@getTestDetail')->name('get_test_detail');
	//Submit attemp
	Route::post('submittest/{idtest}','Test\TestController@submitAttempt')->name('submit_attempt');
	//Join test again
	Route::get('join-again/{id}','Test\TestController@joinTestAgain')->name('join_test_again');
	//Show test result
	//Route::get('result/{idtest}/{iduser}','TestController@getTestResult')->name('get_test_result');
	//Find test
	Route::get('findtest','Test\TestController@FindTest')->name('get_find_test');
	Route::get('findtest/{keyword}','Test\TestController@FindTheTest')->name('find_test');
});


//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
