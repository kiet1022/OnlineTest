<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\NewsType;
class PageController extends Controller
{
    public function getHomePage(){
    	return view('pages.home');
    }
    public function getNewsPage(){
    	$news = News::with('newstype')->take(4)->inRandomOrder()->get();
    	$hot_news = News::with('newstype')->inRandomOrder()->first();
    	$most_read = News::with('newstype')->where('view_number','>=',50)->inRandomOrder()->take(8)->get();
    	$new_news = News::with('newstype')->orderBy('id','desc')->take(6)->get();
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

}
