<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserInfo;
use App\NewsType;
use App\News;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\AddNewsRequest;
use App\Http\Requests\EditUserRequest;
use Exception;
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

}
