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

class TestController extends Controller
{
	public function getTestList(){
        $tests = Tests::paginate(6);
        return view('pages.test.testlist',compact('tests'));
    }

    public function getTestDetail($id){
        $testDetail = Tests::find($id)->detail;
        return view('pages.test.detail',compact('testDetail'));
    }

    public function submitAttempt($idtest, Request $re){
        $attemp = $re;
        $test = Tests::find($idtest);
        $testDetail = $test->detail;
        $markPerQuestion = 100/count($testDetail);
        $totalMark = 0;
        for($i = 0; $i < count($testDetail);$i++){
            if(empty($re->answer_for_question_[$i])){
                $totalMark+=0;
            }else {
                if($testDetail[$i]->question->correct_answer == $re->answer_for_question_[$i]){
                $totalMark += $markPerQuestion;
                }
            }
        }
        return view('pages.test.test_result',compact('totalMark','testDetail','attemp'));
    }
}
