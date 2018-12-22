<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\UserInfo;
use App\Tests;
use App\TestTopic;
use App\TestResult;
use App\TestDetail;
use App\Questions;
use Execption;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Imports\ImportQuestion;
class TestController extends Controller
{
	function getTestResult($iduser){
		$result = TestResult::where('id_user',$iduser)->get();
		$user = User::find($iduser);
		$check_page = 'result';
		return view('pages.user.user_test_result',compact('result','user','check_page'));
	}

	function getAddTest(){
		$user = Auth::user();
		$check_page = 'addtest';
		$topics = TestTopic::where('status',0)->get();
		return view('pages.user.add_test',compact('user','check_page','topics'));
	}

	function postAddTest(Request $re){
		try {
			//DB::beginTransaction();
			if($re->topic == 0){
				$topic = new TestTopic;
				$topic->title = $re->topic_name;
				$topic->created_by = Auth::user()->id;
				$topic->status = 1;
				$topic->save();
				$test = new Tests;
				$test->title = $re->title;
				$test->time = $re->time;
				$test->number_question = $re->num_question;
				$test->mark = 100;
				$test->owner = Auth::user()->id;
				$test->id_topic = $topic->id;
				$test->status = 1;
				$test->save();
				//insert question into question table
				if($re->hasFile('file')){
					$file = $re->file('file');
					$duoi = $file->getClientOriginalExtension();
					if($duoi != 'xls' && $duoi != 'xlsx'){
						return redirect()->back()->with('error','Vui lòng chọn đúng định dạng file');
					}

					$array = (new ImportQuestion)->toArray($file)[0];
                	//return $array;
					foreach ($array as $row) {
						$question = New Questions;
						if(!is_null($row['Content']) && !is_null($row['a']) && !is_null($row['b']) && !is_null($row['c']) && !is_null($row['d']) && !is_null($row['Correct'])){
							$question->content = $row['Content'];
							$question->a = trim($row['a']);
							$question->b = trim($row['b']);
							$question->c = trim($row['c']);
							$question->d = trim($row['d']);
							$question->correct_answer = trim($row['Correct']);
							$question->status = 1;
							$question->owner = Auth::user()->id;
							$question->save();
							//insert question into detail table
							$detail = new TestDetail;
							$detail->id_test = $test->id;
							$detail->id_question = $question->id;
							$detail->status = 1;
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
						$detail->status = 1;
						$detail->save();
					}
				}
			}else{
				$test = new Tests;
				$test->title = $re->title;
				$test->time = $re->time;
				$test->number_question = $re->num_question;
				$test->mark = 100;
				$test->owner = Auth::user()->id;
				$test->id_topic = $re->topic;
				$test->status = 1;
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
								$question->status = 1;
								$question->owner = Auth::user()->id;
								$question->save();
								//insert question into detail table
								$detail = new TestDetail;
								$detail->id_test = $test->id;
								$detail->id_question = $question->id;
								$detail->status = 1;
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
						$detail->status = 1;
						$detail->save();
					}
				}
			}
			DB::commit();
			return redirect()->back()->with('success','Thêm đề thi thành công');
		} catch (Exception $e) {
			return redirect()->back()->with('error','Thêm đề thi thất bại');
		}		
	}

	function getTestAdded(){
		$user = Auth::user();
		$tests = Tests::where('owner',$user->id)->get();
		$user = Auth::user();
		$check_page = 'testadded';
		return view('pages.user.test_added',compact('tests','user','check_page'));
	}

	function getTestPreview($id){
		$test = Tests::find($id);
		$detail = $test->detail;
		return view('pages.user.preview_test',compact('test','detail'));
	}

}

