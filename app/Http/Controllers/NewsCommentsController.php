<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsComments;
use App\Models\News;
use Auth;

class NewsCommentsController extends Controller
{
    public function edit($id){
        $Newscomments= NewsComments::findorFail($id);

        if ($Newscomments->user_id != Auth::user()->id) {
           abort(403);
        }

        return view('Newscomments.edit', compact('Newscomments'));
    }

    public function update($id, Request $request){
        $Newscomments= NewsComments::findorFail($id);

        if ($Newscomments->user_id != Auth::user()->id) {
           abort(403);
        }
        $validated=$request-> validate([
            'text' => 'required|min:10'
        ]);

       
        $Newscomments->text = $validated['text'];
        $Newscomments->save();


        return redirect()->route('newsindex')->with('status','Comment edited');
    }
    
    public function createidnews($newsid){
        $news_id=$newsid;
        
        return view('Newscomments.create', ['news_id'=>$news_id]);
    }
    
    public function store( Request $request){

        $validated=$request-> validate([
            
            'text' => 'required|min:3',
            'news_id' => 'required'
        ]);


        $Newscomments= new NewsComments;

     
        $Newscomments ->text=$validated['text'];
        $Newscomments->user_id=Auth::user()->id;
        $Newscomments->news_id=$validated['news_id'];

        $Newscomments->save();

        return redirect()->route('news.show',$Newscomments->news_id)->with('status','Comment added');
    }
}
