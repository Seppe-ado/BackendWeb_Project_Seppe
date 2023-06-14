<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Auth;

class NewsController extends Controller
{
    public function Newsindex(){

        $posts= Post::orderBy('created_at','desc')->get();
        return view('posts.index', compact('posts'));
    }
}
