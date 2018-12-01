<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostForumRequest;
use Illuminate\Support\Facades\Auth;
use App\News;
use App\Questions;
use App\Tests;
use App\TestDetail;
use App\NewsType;
use App\Subjects;
use App\Posts;
use App\Comments;
use Execption;

class QuizzController extends Controller
{
	public function getQuizzPage(){
		$tests = Tests::all();
        return view('pages.quizz.home',compact('tests'));
    }
    public function getQuiz(){
    	// $questions = Tests::find($id)->detail;
    	// $question_id=$questions->id_question;
    	// $questions = TestDetail::find($question_id)->question;
    	// return view('pages.quizz.doQuiz',compact('questions'));
    	// $questions = Questions::find($id);
    	return view('pages.quizz.doQuiz');
    }
  //   public function question($id){
		// // $tests = Tests::all();
  // //       return view('pages.quizz.home',compact('tests'));
  //   }
    public function getTestDetail($id){
    	// $tests = App\Tests::find($id)->question;
    	$testDetail = Tests::find($id)->detail;
        //$question_id= TestDetail::where('id_test',$id)->get();
        //return dd($testDetail);
    	return view('pages.quizz.doQuiz',compact('testDetail'));
    }
    public function getAllQuestionOfTest($id_test){
    	$testDetail = TestDetail::find($id_test);
    	return view('pages.quizz.startQuiz',compact('testDetail'));
    }
}
