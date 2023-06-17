<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use Auth;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth',['except'=>['index','show']]);
    }



    public function index(){

        $posts= Post::orderBy('created_at','desc')->get();
        return view('posts.index', compact('posts'));
    }

    public function create(){
        return view('posts.create');
    }
    public function store(Request $request){

        $validated=$request-> validate([
            'title' => 'required|min:3',
            'text' => 'required|min:10',
        ]);


        $post= new Post;
        $post ->title=$validated['title'];
        $post ->text=$validated['text'];
        $post->user_id=Auth::user()->id;
        $post->save();

        return redirect()->route('index')->with('status','Post added');
    }

    public function edit($id){
        $post= post::findorFail($id);

        if ($post->user_id != Auth::user()->id) {
           abort(403);
        }

        return view('posts.edit', compact('post'));
    }

    public function update($id, Request $request){
        $post= post::findorFail($id);

        if ($post->user_id != Auth::user()->id) {
           abort(403);
        }
        $validated=$request-> validate([
            'title' => 'required|min:3',
            'text' => 'required|min:10',
        ]);

        $post->title = $validated['title'];
        $post->text = $validated['text'];
        $post->save();


        return redirect()->route('index')->with('status','Post edited');
    }

    public function show($id){
        $post=Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function destroy($id){
        if (Auth::user()->is_admin){
            $post=Post::findOrFail($id);
            $likes=Like::where('post_id', '=',$post->id)->delete();
            $post->delete();
            return redirect()->route('Adminindex')->with('status','Post deleted');
        } 
        
        return abort(403,"Only admins may delete Posts");
    }


    public function Adminindex(){

        $posts= Post::orderBy('created_at','desc')->get();
        return view('admin.index', compact('posts'));
    }


}
