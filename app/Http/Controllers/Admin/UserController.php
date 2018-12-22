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

class UserController extends Controller
{
    //
    public function getAdminHomePage(){
    	return view('admin.home');
    }
	public function getUserlist(){
		if(Auth::check())
		{
			if (Auth::user()->level == 1||Auth::user()->level == 2) {
				$user = User::where('status',0)->get();
				return view('admin.user.member',compact('user'));
			}else{
				$user = User::where('status',0)->get();
				return view('admin.user.member',compact('user'));
			}
		}else{
			return view('pages.login');
        // return redirect('/');
		}
		
	}
	public function getViewAddUser(){
		return view('admin.user.adduser');
	}

	public function addUser(AddUserRequest $request){
		try{
			$user = new User;
         // $user->username = $request->email;
			$user->email = $request->email;
			$user->level = $request->level;
			$user->password = bcrypt('123456');
			$user->updated_by = Auth::user()->id;
			$user->save();

			$userinfo = new UserInfo;
			$userinfo->id_user = $user->id;
         // $userinfo->name = $user->email;
			$userinfo->save();
			return redirect()->back()->with('success','Thêm tài khoản thành công. Mật khẩu là 123456');
		}catch(Exception $ex){
			return redirect()->back()->with('error','Tài khoản đã tồn tại, vui lòng nhập địa chỉ email khác');
		}
	}

	public function deleteUser($id){
		try{
			$user = User::find($id);
          // $userinfo = UserInfo::where('id_user',$id);
          // $userinfo->delete();
          // $user->delete();
			$user->status=1;
			$user->updated_at=now();
			$user->updated_by = Auth::user()->id;
			$user->save();
			return redirect()->back()->with('success','Xóa thành công');
		}catch(Exception $ex){
			return redirect()->back()->with('error','Xóa Thất bại');
		}
	}

	public function getEditUser($id){
		$user = User::find($id);
		return view('admin.user.edituser',compact('user'));
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

}
