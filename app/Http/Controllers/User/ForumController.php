<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostForumRequest;
use Illuminate\Support\Facades\Auth;
use App\News;
use App\NewsType;
use App\Subjects;
use App\Posts;
use App\Comments;
use App\Tests;
use App\TestDetail;
use Execption;

class ForumController extends Controller
{
    //
	public function getForumPage(){
		$subjects = Subjects::all();
		$posts = Posts::orderBy('id','desc')->inRandomOrder()->paginate(5);
		return view('pages.forum.home',compact('subjects','posts'));
	}

	public function getTopicDetail($id){
		$post = Posts::find($id);
		$comments = Comments::where('id_post',$id)->orderBy('id','desc')->inRandomOrder()->paginate(5);
		$subjects = Subjects::all();
		return view('pages.forum.topicdetail',compact('post','comments','subjects'));
	}

	public function postToForum(PostForumRequest $request){
		try{
			$post = new Posts;
			$post->id_subject = $request->id_subject;
			$post->title = $request->title;
			$post->content = $request->content;
			if(Auth::check()){
				$post->id_user = Auth::user()->id;
			}else{
				return redirect()->back()->with('error', 'Vui lòng đăng nhập để thực hiện chức năng này');
			}
			$post->save();
			return redirect()->back();
		}catch(Execption $ex){
			return redirect()->back()->with('error', $ex->getMessage());
		}

	}

	public function commentToPost(Request $request, $id_post){
		try{
			$comment = new Comments;
			$comment->id_post = $id_post;
			$comment->content = $request->content;
			if(Auth::check()){
				$comment->id_user = Auth::user()->id;
			}else{
				return redirect()->back()->with('error', 'Vui lòng đăng nhập để thực hiện chức năng này');
			}
			$comment->save();
			return redirect()->back();
		}catch(Execption $ex){
			return redirect()->back()->with('error', $ex->getMessage());
		}
	}
}
