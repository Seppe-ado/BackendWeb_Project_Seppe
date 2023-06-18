<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Requests;
use Auth;

class RequestsController extends Controller
{
    public function create(){
        return view('requests.create');
    }
    public function store(Request $request){

        $validated=$request-> validate([
            'title' => 'required|min:3',
            'text' => 'required|min:10',
        ]);


        $requests= new Requests;
        $requests ->title=$validated['title'];
        $requests ->text=$validated['text'];
        $requests->user_id=Auth::user()->id;
        $requests->save();

        return redirect()->route('index')->with('status','Request sent');
    }

    public function index(){

        $requests= Requests::orderBy('created_at','desc')->get();
        return view('admin.Reqindex', compact('requests'));
    }
    public function destroy($id){
        if (Auth::user()->is_admin){
            $request=Requests::findOrFail($id);
           
            $request->delete();
            return redirect()->route('Requests.index');
        } 
        
        return abort(403,"Only admins may delete Posts");
    }
}
