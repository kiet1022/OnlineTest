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

class QuestionController extends Controller
{
    //
        public function getQuestionList(){
        $questions = Questions::where('status',0)->get();
        return view('admin.questions.questions_list',compact('questions'));
    }

     public function getAddNewQuestion(){
        $question_type = QuestionsType::where('status',0)->get();
        return view('admin.questions.addquestion',compact('question_type'));
    }


    public function postAddNewQuestion(AddNewQuestionRequest $request){
        try{
            $ques = new Questions;
            $ques->content = $request->content;
            $ques->id_type = $request->id_type;
            $ques->a = $request->a;
            $ques->b = $request->b;
            $ques->c = $request->c;
            $ques->d = $request->d;
            $correct = '';
            switch ($request->correct_answer) {
                case 'A':
                $correct = $request->a;
                break;
                case 'B':
                $correct = $request->b;
                break;
                case 'C':
                $correct = $request->c;
                break;
                case 'D':
                $correct = $request->d;
                break;
            }
            $ques->correct_answer = $correct;
            if(Auth::check()){
                $ques->owner = Auth::user()->id;
            }else{
                return redirect()->back()->with('error', 'Vui lòng đăng nhập để thực hiện chức năng này');
            }
            $ques->updated_by = Auth::user()->id;
            $ques->save();
            return redirect()->back()->with('success','Thêm câu hỏi thành công');
        }catch(Exception $ex){
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }

        public function deleteQuestion($id){
        try{
            $old = Questions::find($id);
            // $old->delete();
            $old->status=1;
            $old->updated_at=now()->timestamp;
            $old->updated_by = Auth::user()->id;
            $old->save();
            return redirect()->back()->with('success','Xóa thành công');
        }catch(Exception $ex){
            return redirect()->back()->with('error','Xóa Thất bại');
        }
    }

        public function getEditQuestion($id){
        $question_type = QuestionsType::where('status',0)->get();
        $question = Questions::find($id);
        return view('admin.questions.edit_a_question',compact('question','question_type'));
    }

        public function postEditQuestion($id, AddNewQuestionRequest $request){
        try{
            $ques = Questions::find($id);
            $ques->content = $request->content;
            $ques->id_type = $request->id_type;
            $ques->a = $request->a;
            $ques->b = $request->b;
            $ques->c = $request->c;
            $ques->d = $request->d;
            $correct = '';
            switch ($request->correct_answer) {
                case 'A':
                $correct = $request->a;
                break;
                case 'B':
                $correct = $request->b;
                break;
                case 'C':
                $correct = $request->c;
                break;
                case 'D':
                $correct = $request->d;
                break;
            }
            $ques->correct_answer = $correct;
            if(Auth::check()){
                $ques->owner = Auth::user()->id;
            }else{
                return redirect()->back()->with('error', 'Vui lòng đăng nhập để thực hiện chức năng này');
            }
            $ques->save();
            return redirect()->back()->with('success','Sửa câu hỏi thành công');
        }catch(Exception $ex){
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }

        public function importQuestionByFile(Request $request){
        if($request->hasFile('file')){
            $file = $request->file('file');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'xls' && $duoi != 'xlsx'){
                return redirect()->back()->with('error','Vui lòng chọn đúng định dạng file');
            }

            $array = (new ImportQuestion)->toArray($file)[0];

                //return $array;
            try {
                foreach ($array as $row) {
                    $question = New Questions;
                    if(!is_null($row['Content'])){
                        $question->content = $row['Content'];
                    }
                    if(!is_null($row['Type'])){
                        $strType = explode(' ', $row['Type']);
                        $type =  (intval($strType[0]));
                        $question->id_type = $type;
                    }
                    if(!is_null($row['a'])){
                        $question->a = $row['a'];
                    }
                    if(!is_null($row['b'])){
                        $question->b = $row['b'];
                    }
                    if(!is_null($row['c'])){
                        $question->c = $row['c'];
                    }
                    if(!is_null($row['d'])){
                        $question->d = $row['d'];
                    }
                    if(!is_null($row['Correct'])){
                        $question->correct_answer = $row['Correct'];
                    }
                    if(!is_null($row['Status'])){
                        $question->status = $row['Status'];
                    }
                    $question->owner = Auth::user()->id;
                    $question->save();
                }
                return redirect()->back()->with('success','Thêm câu hỏi thành công');
            } catch (Exception $ex) {
                return redirect()->back()->with('error',$ex->getMessage());
            }

        }
    }
}
