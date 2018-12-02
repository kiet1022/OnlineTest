<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostForumRequest;
use Illuminate\Support\Facades\Auth;
use App\News;
use App\Questions;
use App\Tests;
use App\TestDetail;
use App\NewsType;
use App\Subjects;
use App\Posts;
use App\Comments;
use Execption;

class TestController extends Controller
{
	public function getTestList(){
        $tests = Tests::paginate(6);
        return view('pages.test.testlist',compact('tests'));
    }

    public function getTestDetail($id){
        $testDetail = Tests::find($id)->detail;
        return view('pages.test.detail',compact('testDetail'));
    }
}
