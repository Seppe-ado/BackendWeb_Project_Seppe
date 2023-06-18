<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\NewsLike;
use App\Models\NewsComments;
use Auth;

class NewsController extends Controller
{

    public function __construct(){
        $this->middleware('auth',['except'=>['Newsindex','show']]);
    }

    public function Newsindex(){

        $news= News::orderBy('created_at','desc')->get();
        return view('news.newsindex', compact('news'));
    }
    public function create(){
        return view('admin.Newscreate');
    }
    public function store(Request $request){

        $validated=$request-> validate([
            'title' => 'required|min:3',
            'text' => 'required|min:10',
        ]);


        $news= new News;
        $news ->title=$validated['title'];
        $news ->text=$validated['text'];
        $news->user_id=Auth::user()->id;
        if (Auth::user()->is_admin){
        $news->save();
        return redirect()->route('adminnews')->with('status','News added');

        } else {
            return abort(403,"Only admins may add News");
        }
    }

    public function show($id){
        $news=News::findOrFail($id);
        $Newscomments=NewsComments::orderBy('created_at','desc')->where('news_id',"=",$news->id)->get();
        return view('news.Newsshow', compact('news','Newscomments'));
    }
    public function edit($id){
        $news= News::findorFail($id);

        if ($news->user_id != Auth::user()->id) {
           abort(403);
        }

        return view('news.edit', compact('news'));
    }
    public function destroy($id){
        if (Auth::user()->is_admin){
            $news=News::findOrFail($id);
            $newslikes=NewsLike::where('news_id', '=',$news->id)->delete();
            $news->delete();
            return redirect()->route('adminnews')->with('status','News deleted');
        } 
        
        return abort(403,"Only admins may delete News");
    }
    public function update($id, Request $request){
        $news= news::findorFail($id);

        if ($news->user_id != Auth::user()->id) {
           abort(403);
        }
        $validated=$request-> validate([
            'title' => 'required|min:3',
            'text' => 'required|min:10',
        ]);

        $news->title = $validated['title'];
        $news->text = $validated['text'];
        $news->save();


        return redirect()->route('Newsindex')->with('status','News edited');
    }
    public function Adminnews(){

        $news= News::orderBy('created_at','desc')->get();
        return view('admin.news', compact('news'));
    }
}
