<?php

namespace App\Http\Controllers\Test;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostForumRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
                if(trim($testDetail[$i]->question->correct_answer) == trim($re->answer_for_question_[$i])){
                $totalMark += $markPerQuestion;
                $correct++;
                }
            }
        }
        $info = array('correct'=>$correct,'totalMark'=>$totalMark,'joindate'=>now(),'test'=>$test, 'min'=>($test->time - $re->minute - 1),'sec'=>(60 - $re->second));
        $result = new TestResult;
        $result->id_test = $idtest;
        if(Auth::check()){
            $result->id_user = Auth::user()->id;
        }else{
            $result->id_user = 10000;
        }
        $result->mark = $totalMark;
        $result->created_at = now();

        //save time joined
        $minute = $test->time - $re->minute;
        $second = 60 - $re->second;
        if($minute == 1){
            $result->joined_time = $second." giây";
        }else if($minute > 1){
            $result->joined_time = ($minute - 1)." phút ".$second." giây";
        }        
        $result->correct_number = $correct;
        $result->save();
        return view('pages.test.test_result',compact('testDetail','attemp','info'));   
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function FindTest(Request $request){
        $keyword = $request->keyword;
        return redirect()->route('find_test', ['keyword' => $keyword]);
    }
    public function FindTheTest($keyword) {


         //$tests = Tests::where('title','like',"%$keyword%")->orWhere('time','like',"%$keyword%")->orWhere('number_question','like',"%$keyword%")->having('status',0)->take(10)->paginate(5);
        $tests = Tests::where(function($query) use($keyword) {
            $query->where('title', 'LIKE', '%'.$keyword.'%')->orWhere('time', 'LIKE', '%' .$keyword. '%')
            ->orWhere('number_question', 'LIKE', '%' . $keyword . '%');
        })->where('status', 0)->take(20)->paginate(4);
        

        //$tests = DB::select('call findtest(?)', ["%$keyword%"]);
        //return $tests;
        return view('pages.test.test_find_result',compact('tests','keyword'));
    }
}
