<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
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
    		$user->level = 0;
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
            if(Auth::user()->level == 1){
                return redirect()->route('get_admin_home_page');
            }else {
                return redirect()->route('get_user_info_page',['id'=>Auth::user()->id]);
            }
    	}else{
    		return redirect()->back()->with('error', 'Sai tài khoản hoặc mật khẩu');
    	}
    }
    public function Logout(){
    	Auth::logout();
        return redirect()->route('get_home_page');
    }

    public function changePass($id, Request $re)
    {
        $user = User::find($id);
        if(Hash::check($re->oldpass, $user->password)){
            //return $user;
            $user->password = Hash::make($re->newpass);
            $user->save();
            return redirect()->back()->with('success','Đổi mật khẩu thành công');
        }else{
            return redirect()->back()->with('error', 'Mật khẩu cũ không đúng');
        }
    }
}
