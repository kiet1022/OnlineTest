<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserInfo;
class AdminController extends Controller
{
    public function test(){
    	$user = UserInfo::find(1);

    	return ($user->user->email);
    }
}
