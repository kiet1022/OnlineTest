<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserInfo;
use App\Http\Requests\AddUserRequest;
use Exception;
class AdminController extends Controller
{
    public function getUserlist(){
    	$user = User::all();
    	return view('admin.user.member',compact('user'));
    }
    public function getViewAddUser(){
    	return view('admin.user.adduser');
    }
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
    public function getNewsTypeList(){

    	return view('admin.news.newstypelist');
    } 
    public function getAddNewsType(){

    	return view('admin.news.addnewstype');
    }

    public function getNewsList(){

    	return view('admin.news.newslist');
    }
    public function getAddNews(){

    	return view('admin.news.addnews');
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
