<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;
use Auth;

class LikeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function like( $postid, Request $request){

        $post = Post::findOrFail($postid);
        
        $like =Like:: where('post_id', "=", $postid)->where ('user_id',"=",Auth::user()->id)->first();
        if ($like != NULL){
            abort(403, 'Already liked this post');
        }    

        $like = new Like;
        $like->user_id = Auth::user()->id;
        $like->post_id = $postid;
        $like->save();
        

        return redirect()->route('index')->with('status','Post liked' );
    }
}
