<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\Post;
use Auth;

class CommentsController extends Controller
{
    public function edit($id){
        $comments= Comments::findorFail($id);

        if ($comments->user_id != Auth::user()->id) {
           abort(403);
        }

        return view('Comments.edit', compact('comments'));
    }

    public function update($id, Request $request){
        $comments= Comments::findorFail($id);

        if ($comments->user_id != Auth::user()->id) {
           abort(403);
        }
        $validated=$request-> validate([
            'text' => 'required|min:10'
        ]);

       
        $comments->text = $validated['text'];
        $comments->save();


        return redirect()->route('index')->with('status','Comment edited');
    }
    
    public function createid($postid){
        $post_id=$postid;
        
        return view('Comments.create', ['post_id'=>$post_id]);
    }
    
    public function store( Request $request){

        $validated=$request-> validate([
            
            'text' => 'required|min:3',
            'post_id' => 'required'
        ]);


        $comments= new Comments;

     
        $comments ->text=$validated['text'];
        $comments->user_id=Auth::user()->id;
        $comments->post_id=$validated['post_id'];

        $comments->save();

        return redirect()->route('posts.show',$comments->post_id)->with('status','Comment added');
    }

}
