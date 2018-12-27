<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Excel;
use App\User;
use App\UserInfo;
use App\NewsType;
use App\News;
use App\QuestionsType;
use App\Questions;
use App\Tests;
use App\TestDetail;
use App\TestTopic;
use App\TestResult;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\AddNewsRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\AddNewQuestionRequest;
use App\Http\Requests\AddNewTestRequest;
use Exception;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Imports\ImportQuestion;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    //
     public function getAddNewTestFromBank(){
        $questions = Questions::where('status',0)->get();
        $topics = TestTopic::where('status',0)->get();
        return view('admin.test.add_new_test_from_question_bank',compact('questions','topics'));
    }
    public function getAddnewTest(){
        $topics = TestTopic::where('status',0)->get();
        return view('admin.test.add_new_test',compact('topics'));
    }
    public function getTestList(){
        $tests = Tests::where('status',0)->get();
        return view('admin.test.testlist',compact('tests'));
    }
    public function getEditTest($id){
        $oldTest = Tests::find($id);
        $detail = $oldTest->detail;
        $topics = TestTopic::where('status',0)->get();
        return view('admin.test.editTest',compact('oldTest', 'detail','topics'));
    }
    public function testResult($id){
        $test = Tests::find($id);
        $results = TestResult::where('id_test',$id)->get();
        return view('admin.test.test_result',compact('test','results'));
    }

    function PreviewTest($id){
        $test = Tests::find($id);
        $detail = $test->detail;
        return view('pages.user.preview_test',compact('test','detail'));
    }
    //INSERT

    public function postAddNewTestFromBank(Request $request){
        try {
            $test = new Tests;
            $test->title = $request->title;
            $test->time = $request->time;
            $test->number_question = $request->numberofquestion;
            $test->mark = 100;
            $test->owner = Auth::user()->id;
            $test->id_topic = $request->topic;
            if(is_null($request->pass) || $request->pass == ""){
                $test->password = '0';
            }else{
                $test->password = trim($request->pass);
            }
            $test->save();
            for($i = 0; $i< count($request->data);$i++){
                $detail = new TestDetail;
                $detail->id_test = $test->id;
                $detail->id_question = $request->data[$i][1];
                $detail->status = 0;
                $detail->save();
            }
            $result['success'] = true;
            return response()->json($result);
        } catch (Exception $e) {
            $result['success'] = false;
            $result['error'] = $e->getMessage();
            return response()->json($result);
        }
    }

    public function postAddNewTest(Request $re){
        try {
            DB::beginTransaction();
            $test = new Tests;
            $test->title = $re->title;
            $test->time = $re->time;
            $test->number_question = $re->numberofquestion;
            $test->mark = 100;
            $test->owner = Auth::user()->id;
            $test->id_topic = $re->topic;
            $test->status = 0;
            if(is_null($re->pass) || $re->pass == ""){
                $test->password = '0';
            }else{
                $test->password = trim($re->pass);
            }
            $test->save();
                //insert question into question table
            if($re->hasFile('file')){
                $file = $re->file('file');
                $duoi = $file->getClientOriginalExtension();
                if($duoi != 'xls' && $duoi != 'xlsx'){
                    return redirect()->back()->with('error','Vui lòng chọn đúng định dạng file');
                }

                $array = (new ImportQuestion)->toArray($file)[0];
                foreach ($array as $row) {
                    $question = New Questions;
                    if(!is_null($row['Content']) && !is_null($row['a']) && !is_null($row['b']) && !is_null($row['c']) && !is_null($row['d']) && !is_null($row['Correct'])){
                        $question->content = $row['Content'];
                        $question->a = trim($row['a']);
                        $question->b = trim($row['b']);
                        $question->c = trim($row['c']);
                        $question->d = trim($row['d']);
                        $question->correct_answer = trim($row['Correct']);
                        $question->status = 0;
                        $question->owner = Auth::user()->id;
                        $question->save();
                        //insert question into detail table
                        $detail = new TestDetail;
                        $detail->id_test = $test->id;
                        $detail->id_question = $question->id;
                        $detail->status = 0;
                        $detail->save();
                    }
                }
            }else{
                for ($i=1; $i <= $re->countquest ; $i++) {
                    $question = new Questions;
                    $question->content = $re->title_[$i];
                    $question->a = trim($re->a_[$i]);
                    $question->b = trim($re->b_[$i]);
                    $question->c = trim($re->c_[$i]);
                    $question->d = trim($re->d_[$i]);
                    if($re->check_[$i] == 'a_['.$i.']'){
                        $question->correct_answer = trim($re->a_[$i]);
                    } else if($re->check_[$i] == 'b_['.$i.']'){
                        $question->correct_answer = trim($re->b_[$i]);
                    } else if($re->check_[$i] == 'c_['.$i.']'){
                        $question->correct_answer = trim($re->c_[$i]);
                    } else if($re->check_[$i] == 'd_['.$i.']'){
                        $question->correct_answer = trim($re->d_[$i]);
                    }
                    $question->owner = Auth::user()->id;
                    $question->status = 1;
                    $question->save();
                    //insert question into detail table
                    $detail = new TestDetail;
                    $detail->id_test = $test->id;
                    $detail->id_question = $question->id;
                    $detail->status = 0;
                    $detail->save();
                }
            }
            DB::commit();
            return redirect()->back()->with('success','Tạo đề thi thành công');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    //UPDATE
    public function postEditTest($id, Request $request){
        try {
            DB::beginTransaction();
            $test = Tests::find($id);
            $test->title = $request->title;
            $test->time = $request->time;
            $test->number_question = $request->numberofquestion;
            $test->mark = 100;
            $test->updated_at=now()->timestamp;
            $test->editor = Auth::user()->id;
            $test->id_topic = $request->topic;
            $test->password = $request->pass;
            $test->status = 0;
            $test->save();
            for($i = 0; $i< $request->countquest;$i++){
                $question = Questions::find($request->id_[$i]);
                $question->content = $request->title_[$i];
                $question->a = trim($request->a_[$i]);
                $question->b = trim($request->b_[$i]);
                $question->c = trim($request->c_[$i]);
                $question->d = trim($request->d_[$i]);
                if($request->check_[$i] == 'a_['.$i.']'){
                    $question->correct_answer = trim($request->a_[$i]);
                }
                if($request->check_[$i] == 'b_['.$i.']'){
                    $question->correct_answer = trim($request->b_[$i]);
                }
                if($request->check_[$i] == 'c_['.$i.']'){
                    $question->correct_answer = trim($request->c_[$i]);
                }
                if($request->check_[$i] == 'd_['.$i.']'){
                    $question->correct_answer = trim($request->d_[$i]);
                }
                $question->save();
            }
            DB::commit();
            return redirect()->back()->with('success','Sửa đề thi thành công');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    //DELETE
    public function deleteTest($id){
        try{
            $test = Tests::find($id);
            $test->status = 1;
            $test->updated_at = now()->timestamp;
            $test->updated_by = Auth::user()->id;
            $test->save();
            return redirect()->back()->with('success','Xóa bài thi thành công'); 
        }catch(Exception $ex){
            return redirect()->back()->with('error','Xóa tin thất bại');
        }
    }
}
