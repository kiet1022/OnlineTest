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

class NewsTypeController extends Controller
{
    //
	public function getNewsTypeList(){
		return view('admin.news.newstypelist');
	} 

	public function getAddNewsType(){
		return view('admin.news.addnewstype');
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
            // $newstype->updated_by = Auth::user()->id;
			$newstype->save();
			return redirect()->back()->with('success','Thêm loại tin thành công');
		}catch(Exception $ex){
			return redirect()->back()->with('error','Thêm loại tin thất bại');
		}
	}

	public function deleteNewsType($id){
		try{
			$newstype = NewsType::find($id);
			$newstype->delete();
			return redirect()->back()->with('success','Xóa loại tin thành công');
		}catch(Exception $ex){
			return redirect()->back()->with('error','Xóa loại tin thất bại');
		}
	}

	public function getEditNewsType($id){
		$newtype = NewsType::find($id);
		return view('admin.news.editnewstype',compact('newtype'));
	}

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
}