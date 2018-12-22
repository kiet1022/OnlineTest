<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\UserInfo;
use Exeption;

class InfoController extends Controller
{
    //
	public function getInfoPage($id){
		$user = User::find($id);
		$check_page = 'info';
		return view('pages.user.userinfo',compact('user','check_page'));
	}

	public function postEditInfo($id, Request $request){
		try{
            // $user = User::find($id);
			$userinfo = UserInfo::find($id);

            // foreach ($userinfos as $userinfo) {
			$userinfo->name = $request->name;
			$userinfo->address = $request->address;
			$userinfo->phone_number = $request->phone_number;
			$userinfo->date_of_birth = $request->birth_of_date;
			$userinfo->sex = $request->sex;
			$userinfo->save();
            // }

			return redirect()->back()->with('success','Sửa thông tin thành công');
		}catch(Exception $ex){
			return redirect()->back()->with('error','Sửa thông tin thất bại');
		}
	}
}
