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

class NewsController extends Controller
{
    //
	public function getNewsList(){
		$news = News::with('newstype')->get();
		return view('admin.news.newslist', compact('news'));
	}

	public function getAddNews(){
		$newstype = NewsType::all();
		return view('admin.news.addnews',compact('newstype'));
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

	public function deleteNews($id){
		try{
			$news = News::find($id);
			if($news->image != ""){
				unlink("images/tintuc/".$news->image);
			}
            // $news->delete();
			$news->status=1;
			$news->updated_at=now()->timestamp;
			$news->save();
			return redirect()->back()->with('success','Xóa tin thành công'); 
		}catch(Exception $ex){
			return redirect()->back()->with('error','Xóa tin thất bại');
		}
	}

	public function getEditNews($id){
		$news = News::find($id);
		//return $news;
		return view('admin.news.editnews',compact('news'));
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
				// while (file_exists("images/tintuc/".$image)) {
				// 	$image = str_random(4)."_".$name;
				// }
				$file->move("images/tintuc",$image);
				// if(file_exists("images/tintuc/".$news->image)){
				// 	return "images/tintuc/".$news->image;
				// 	unlink("images/tintuc/".$news->image);
				// }
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
}
