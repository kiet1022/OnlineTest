<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Excel;
use App\User;
use App\UserInfo;
use App\NewsType;
use App\News;
use App\QuestionsType;
use App\Questions;
use App\Tests;
use App\TestDetail;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\AddNewsRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\AddNewQuestionRequest;
use App\Http\Requests\AddNewTestRequest;
use Exception;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Imports\ImportQuestion;
use App\Http\Controllers\Controller;

class QuestionTypeController extends Controller
{
    //
	public function getQuestionsTypesList(){
		$types = QuestionsType::where('status',0)->get();
		return view('admin.questions.questions_types_list',compact('types'));
	}

	public function getAddNewQuestionType(){
		return view('admin.questions.add_question_type');
	}

	public function postAddNewQuestionType(Request $request){
		try{
			$questype = new QuestionsType;
			$questype->name = $request->typename;
			$questype->title = changeTitle($request->typename);
			$questype->updated_by = Auth::user()->id;
			$questype->save();
			return redirect()->back()->with('success','Thêm câu hỏi thành công');
		}catch(Exception $ex){
			return redirect()->back()->with('error',$ex->getMessage());
		}
	}

	public function getEditQuestionType($id){
		$type = QuestionsType::find($id);
		return view('admin.questions.edit_questions_type',compact('type'));
	}

	public function postEditQuestionType($id, Request $request){
		try{
			$questiontype = QuestionsType::find($id);
			$questiontype->name = $request->typename;
			$questiontype->title = changeTitle($request->typename);
			$questiontype->save();
			return redirect()->back()->with('success','Sửa thông tin thành công');
		}catch(Exception $ex){
			return redirect()->back()->with('error',$ex->getMessage());
		}
	}

	public function deleteQuestionType($id){
		try{
			$questions = Questions::where('id_type',$id)->get();
            // $questions->delete();
            // return $questions;
			foreach ($questions as $question) {
				$question->status=1;
				$question->updated_at=now();
				$question->save();
			}

			$questionstype = QuestionsType::find($id);
			$questionstype->status=1;
			$questionstype->updated_at=now();
			$questionstype->updated_by = Auth::user()->id;
			$questionstype->save();
            // $questionstype->delete();
			return redirect()->back()->with('success','Xóa thành công');
		}catch(Exception $ex){
			return redirect()->back()->with('error',$ex->getMessage());
		}
	}
}