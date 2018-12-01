<?php

namespace App\Http\Controllers;

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
class PageController extends Controller
{
    public function getHomePage(){
    	return view('pages.home');
    }
    public function getNewsPage(){
    	$news = News::with('newstype')->take(4)->inRandomOrder()->get();
    	$hot_news = News::with('newstype')->inRandomOrder()->first();
    	$most_read = News::with('newstype')->where('view_number','>=',50)->inRandomOrder()->take(8)->get();
    	$new_news = News::with('newstype')->take(6)->get();
    	$newtype = NewsType::with('news')->inRandomOrder()->take(10)->get();
    	return view('pages.news.newshome',compact('news','hot_news','most_read','new_news','newtype'));
    }

    public function getNewsDetail($tenkhongdau,$id){
    	$detail = News::find($id);
    	$detail->view_number += 1;
        $detail->timestamps = false;
    	$detail->save();
    	$relate_news = News::where('id_type',$detail->id_type)->inRandomOrder()->take(3)->get();
    	$newtype = NewsType::with('news')->inRandomOrder()->take(10)->get();
    	return view('pages.news.detail',compact('detail','relate_news','newtype'));
    }

    public function getNewsType($id){
        $news = News::where('id_type',$id)->inRandomOrder()->paginate(8);
        $most_read = News::with('newstype')->where('view_number','>=',50)->inRandomOrder()->take(8)->get();
        $newtype = NewsType::with('news')->inRandomOrder()->take(10)->get();
        return view('pages.news.newstype',compact('news','most_read','newtype'));
    }

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

    public function getTestList(){
        $tests = Tests::paginate(6);
        return view('pages.test.testlist',compact('tests'));
    }

    public function getTestDetail($id){
        $testDetail = Tests::find($id)->detail;
        return view('pages.test.detail',compact('testDetail'));
    }
}
