<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth',['except'=>['index']]);
    }



    public function index(){

        $posts= Post::orderBy('created_at','asc')->get();
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











}
