<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsLike;
use App\Models\News;
use Auth;

class NewsLikesController extends Controller
{
    public function Newslike( $newsid, Request $request){

        $news = News::findOrFail($newsid);
        
        $Newslike =NewsLike:: where('news_id', "=", $newsid)->where ('user_id',"=",Auth::user()->id)->first();
        if ($Newslike != NULL){
            abort(403, 'Already liked this post');
        }    

        $Newslike = new NewsLike;
        $Newslike->user_id = Auth::user()->id;
        $Newslike->news_id = $newsid;
        $Newslike->save();
        

        return redirect()->route('Newsindex')->with('status','News liked' );
    }
}
