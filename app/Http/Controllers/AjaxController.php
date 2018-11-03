<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
class AjaxController extends Controller
{
    public function resetPass($id){
    	echo $id;
    }

    public function Like(Request $re){
    	$post = Posts::find($re->id);
    	$post->like_count ++;
    	$post->save();
    	echo '<i class="fa fa-thumbs-o-up"></i>'.$post->like_count;
    }

    public function Dislike(Request $re){
    	$post = Posts::find($re->id);
    	$post->dislike_count ++;
    	$post->save();
    	echo '<i class="fa fa-thumbs-o-down"></i>'.$post->dislike_count;
    }
}
