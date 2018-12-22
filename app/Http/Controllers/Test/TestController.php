<?php

namespace App\Http\Controllers\Test;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostForumRequest;
use Illuminate\Support\Facades\Auth;
use App\News;
use App\Questions;
use App\Tests;
use App\TestDetail;
use App\TestResult;
use App\NewsType;
use App\Subjects;
use App\Posts;
use App\Comments;
use Execption;

class TestController extends Controller
{
	public function getTestList(){
        $tests = Tests::where('status',0)->paginate(6);
        return view('pages.test.testlist',compact('tests'));
    }
    public function getTestDemo($id){
        $test = Tests::find($id);
        //$test->participant_number++;
        $test->save();
        $detail = TestDetail::where('id_test',$id)->inRandomOrder()->take(5)->get();
        return view('pages.test.test_demo',compact('detail','test'));
    }

    public function getTestDetail($id, Request $re){
        $test = Tests::find($id);
        if(!is_null($re->pass)){
            if(trim($re->pass) == $test->password){
                $test->participant_number++;
                $test->save();
                $testDetail = TestDetail::where('id_test',$id)->get();
                return view('pages.test.detail',compact('testDetail','test'));
            }else{
                return redirect()->back()->with('error','Mật khẩu không đúng, vui lòng nhập lại');
            }
        }else{
            $test->participant_number++;
            $test->save();
            $testDetail = TestDetail::where('id_test',$id)->get();
            return view('pages.test.detail',compact('testDetail','test'));
        }
    }

    public function joinTestAgain($id){
        $test = Tests::find($id);
        $test->participant_number++;
        $test->save();
        $testDetail = TestDetail::where('id_test',$id)->get();
        return view('pages.test.detail',compact('testDetail','test'));
    }

    public function submitAttempt($idtest, Request $re){
        try {
        $attemp = $re;
        $test = Tests::find($idtest);
        $testDetail = $test->detail;
        $markPerQuestion = 100/count($testDetail);
        $totalMark = 0;
        $correct = 0;
        for($i = 0; $i < count($testDetail);$i++){
            if(empty($re->answer_for_question_[$i])){
                $totalMark+=0;
            }else {
                if($testDetail[$i]->question->correct_answer == $re->answer_for_question_[$i]){
                $totalMark += $markPerQuestion;
                $correct++;
                }
            }
        }
        $info = array('correct'=>$correct,'totalMark'=>$totalMark,'joindate'=>now(),'test'=>$test, 'min'=>$re->minute,'sec'=>$re->second);
        $result = new TestResult;
        $result->id_test = $idtest;
        $result->id_user = Auth::user()->id;
        $result->mark = $totalMark;
        $result->created_at = now();
        $result->joined_time = $re->minute." phút ".$re->second." giây";
        $result->correct_number = $correct;
        $result->save();
        return view('pages.test.test_result',compact('testDetail','attemp','info'));   
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
