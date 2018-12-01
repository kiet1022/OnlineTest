<?php

namespace App\Http\Controllers;

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

class AdminController extends Controller
{
    // GET VIEW
    public function getUserlist(){
    	$user = User::all();
    	return view('admin.user.member',compact('user'));
    }

    public function getEditUser($id){
        $user = User::find($id);
        return view('admin.user.edituser',compact('user'));
    }
    public function getNewsTypeList(){
        return view('admin.news.newstypelist');
    } 
    public function getAddNewsType(){
        return view('admin.news.addnewstype');
    }
    public function getViewAddUser(){
    	return view('admin.user.adduser');
    }
    public function getEditNewsType($id){
        $newtype = NewsType::find($id);
        return view('admin.news.editnewstype',compact('newtype'));
    }
    public function getNewsList(){
        $news = News::with('newstype')->get();
        return view('admin.news.newslist', compact('news'));
    }
    public function getAddNews(){
        $newstype = NewsType::all();
        return view('admin.news.addnews',compact('newstype'));
    }
    public function getEditNews($id){
        $news = News::find($id);
        return view('admin.news.editnews',compact('news'));
    }
    public function getQuestionsTypesList(){
        $types = QuestionsType::all();
        return view('admin.questions.questions_types_list',compact('types'));
    }
    public function getEditQuestionType($id){
        $type = QuestionsType::find($id);
        return view('admin.questions.edit_questions_type',compact('type'));
    }
    public function getQuestionList(){
        $questions = Questions::all();
        return view('admin.questions.questions_list',compact('questions'));
    }
    public function getAddNewQuestion(){
        $question_type = QuestionsType::all();
        return view('admin.questions.addquestion',compact('question_type'));
    }
    public function getEditQuestion($id){
        $question_type = QuestionsType::all();
        $question = Questions::find($id);
        return view('admin.questions.edit_a_question',compact('question','question_type'));
    }
    public function getAddNewQuestionType(){
        return view('admin.questions.add_question_type');
    }
    public function getAddNewTest(){
        $questions = Questions::all();
        return view('admin.test.addnewtest',compact('questions'));
    }
    //INSERT
    public function addUser(AddUserRequest $request){
    	try{
         $user = new User;
         $user->username = $request->username;
         $user->password = bcrypt('123456');
         $user->save();

         $userinfo = new UserInfo;
         $userinfo->id_user = $user->id;
         $userinfo->name = $user->username;
         $userinfo->save();
         return redirect()->back()->with('success','Thêm tài khoản thành công');
         }catch(Exception $ex){
          return redirect()->back()->with('error','Thêm tài khoản thất bại');
        }
    }

    public function postAddNewsType(Request $request){
        $this->validate($request,[
            'typename'=>'required|min:6'
        ],[
            'typename.required'=>'Bạn chưa nhập tên loại tin',
            'typename.min'=>'Tên loại tin phải có ít nhất 6 ký tự',
        ]);
        try{
            $newstype = new NewsType;
            $newstype->name = $request->typename;
            $newstype->title = changeTitle($request->typename);
            $newstype->save();
            return redirect()->back()->with('success','Thêm loại tin thành công');
        }catch(Exception $ex){
            return redirect()->back()->with('error','Thêm loại tin thất bại');
        }
    }

    public function postAddNews(AddNewsRequest $request){
        try{
            $news = new News;
            $news->id_type = $request->id_type;
            $news->owner = 1;
            $news->title = $request->title;
            $news->header_title = changeTitle($request->title);
            $news->summary = $request->summary;
            $news->content = $request->content;

            if($request->hasFile('image')){
                $file = $request->file('image');
                $duoi = $file->getClientOriginalExtension();
                if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                    return redirect()->back()->with('error','Vui lòng chọn đúng định dạng hình');
                }
                $name = $file->getClientOriginalName();
                $image = str_random(4)."_".$name;
                while (file_exists("images/tintuc/".$image)) {
                    $image = str_random(4)."_".$name;
                }
                $file->move("images/tintuc",$image);
                $news->image = $image;
            }else{
                $news->image = "";
            }
            $news->save();
            return redirect()->back()->with('success','Thêm tin thành công');
        }catch(Exception $ex){
            return redirect()->back()->with('error','Thêm tin thất bại');
        }
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
            $ques->save();
            return redirect()->back()->with('success','Thêm câu hỏi thành công');
        }catch(Exception $ex){
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
    public function postAddNewQuestionType(Request $request){
        try{
            $questype = new QuestionsType;
            $questype->name = $request->typename;
            $questype->title = changeTitle($request->typename);
            $questype->save();
            return redirect()->back()->with('success','Thêm câu hỏi thành công');
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
                    $question->owner = Auth::user()->id;
                    $question->save();
                }
                return redirect()->back()->with('success','Thêm câu hỏi thành công');
                } catch (Exception $ex) {
                    return redirect()->back()->with('error',$ex->getMessage());
                }
                
        }
    }

    public function postAddNewTest(Request $request){
        try {
            $test = new Tests;
            $test->title = $request->title;
            $test->time = $request->time;
            $test->number_question = $request->numberofquestion;
            $test->mark = 100;
            $test->owner = Auth::user()->id;
            $test->save();
            for($i = 0; $i< count($request->data);$i++){
                $detail = new TestDetail;
                $detail->id_test = $test->id;
                $detail->id_question = $request->data[$i][1];
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

    //UPDATE
    public function postEditNewsType($id, Request $request){
        try{
            $newstype = NewsType::find($id);
            $newstype->name = $request->typename;
            $newstype->title = changeTitle($request->typename);
            $newstype->save();
            return redirect()->back()->with('success','Sữa loại tin thành công');
        }catch(Exception $ex){
            return redirect()->back()->with('error','Sữa loại tin thất bại');
        }
    }

    public function postEditNews($id, AddNewsRequest $request){
        try{
            $news = News::find($id);
            $news->id_type = $request->id_type;
            $news->owner = 1;
            $news->title = $request->title;
            $news->header_title = changeTitle($request->title);
            $news->summary = $request->summary;
            $news->content = $request->content;

            if($request->hasFile('image')){
                $file = $request->file('image');
                $duoi = $file->getClientOriginalExtension();
                if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                    return redirect()->back()->with('error','Vui lòng chọn đúng định dạng hình');
                }
                $name = $file->getClientOriginalName();
                $image = str_random(4)."_".$name;
                while (file_exists("images/tintuc/".$image)) {
                    $image = str_random(4)."_".$name;
                }
                $file->move("images/tintuc",$image);
                if(file_exists("images/tintuc/".$news->image)){
                    unlink("images/tintuc/".$news->image);
                }
                $news->image = $image;
            }else{
                $news->image = $news->image;
            }
            $news->save();
            return redirect()->back()->with('success','Sửa tin thành công');
        }catch(Exception $ex){
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }

    public function postEditUser($id, EditUserRequest $request){
        try{ 
            $user = User::find($id);
            $userinfo = UserInfo::where('id_user',$id)->first();
            $user->username = $request->username;
            $user->level = $request->level;
            $user->save();
            $userinfo->name = $request->name;
            $userinfo->address = $request->address;
            $userinfo->phone_number = $request->phone_number;
            $userinfo->date_of_birth = $request->date_of_birth;
            $userinfo->sex = $request->sex;
            $userinfo->save();
            return redirect()->back()->with('success','Sửa thông tin thành công');
        }catch(Exception $ex){
            return redirect()->back()->with('error',$ex->getMessage());
        }
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

    //DELETE
    public function deleteNewsType($id){
        try{
            $newstype = NewsType::find($id);
            $newstype->delete();
            return redirect()->back()->with('success','Xóa loại tin thành công');
        }catch(Exception $ex){
            return redirect()->back()->with('error','Xóa loại tin thất bại');
        }
    }

    public function deleteNews($id){
        try{
            $news = News::find($id);
            if($news->image != ""){
                unlink("images/tintuc/".$news->image);
            }
            $news->delete();
            return redirect()->back()->with('success','Xóa tin thành công'); 
        }catch(Exception $ex){
            return redirect()->back()->with('error','Xóa tin thất bại');
        }
    }
    public function deleteUser($id){
        try{
          $user = User::find($id);
          $userinfo = UserInfo::where('id_user',$id);
          $userinfo->delete();
          $user->delete();
          return redirect()->back()->with('success','Xóa thành công');
        }catch(Exception $ex){
          return redirect()->back()->with('error','Xóa Thất bại');
        }
    }
    public function deleteQuestionType($id){
        try{
            $questions = Questions::where('id_type',$id);
            $questions->delete();
            $questionstype = QuestionsType::find($id);
            $questionstype->delete();
            return redirect()->back()->with('success','Xóa thành công');
        }catch(Exception $ex){
            return redirect()->back()->with('error','Xóa Thất bại');
        }
    }
    public function deleteQuestion($id){
        try{
            $old = Questions::find($id);
            $old->delete();
            return redirect()->back()->with('success','Xóa thành công');
        }catch(Exception $ex){
            return redirect()->back()->with('error','Xóa Thất bại');
        }
    }

}
