<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\UserInfo;
use Exeption;
class UserController extends Controller
{
	//GET VIEW
    public function getRegisterPage(){
    	return view('pages.register');
    }
    public function getLoginPage(){
    	return view('pages.login');
    }
    //HANDLE
    public function postRegister(RegisterRequest $request){
    	try{
    		$user = new User;
    		$userinfo = new UserInfo;
    		$user->username = 'test';
    		$user->email = $request->email;
    		$user->level = 1;
    		$user->password = bcrypt($request->password);
    		$user->save();

    		$userinfo->name = $request->name;
    		$userinfo->id_user = $user->id;
    		$userinfo->save();
    		return redirect()->back()->with('success','Đăng ký tài khoản thành công');
    	}catch(Exeption $ex){
    		return redirect()->back()->with('error', $ex->getMessage());
    	}
    }
    public function PostLogin(Request $request){
    	if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
    		return redirect('pages/home');
    	}else{
    		return redirect()->back()->with('error', 'Sai tài khoản hoặc mật khẩu');
    	}
    }
    public function Logout(){
    	Auth::logout();
    	return redirect()->back();
    }
}
