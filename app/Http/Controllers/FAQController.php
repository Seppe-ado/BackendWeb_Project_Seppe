<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FAQ;
use Auth;


class FAQController extends Controller
{
    public function index(){

        $FAQ= FAQ::orderBy('id','asc')->get();
        return view('FAQ.index', compact('FAQ'));
    }

    public function adminview(){

        $FAQ= FAQ::orderBy('id','asc')->get();
        return view('admin.FAQ', compact('FAQ'));
    }

    public function create(){
        return view('admin.FAQcreate');
    }
    public function store(Request $request){

        $validated=$request-> validate([
            'title' => 'required|min:3',
            'text' => 'required|min:10',
        ]);

        if (Auth::user()->is_admin){
        $FAQ= new FAQ;
        $FAQ ->title=$validated['title'];
        $FAQ ->text=$validated['text'];
        $FAQ->save();

        return redirect()->route('FAQ.adminview');
        }
        return abort(403,"Only admins may delete FAQs");
    }

    public function edit($id){
        $FAQ= FAQ::findorFail($id);

       

        return view('admin.FAQedit', compact('FAQ'));
    }

    public function update($id, Request $request){
        $FAQ= FAQ::findorFail($id);

        
        $validated=$request-> validate([
            'title' => 'required|min:3',
            'text' => 'required|min:10',
        ]);

        $FAQ->title = $validated['title'];
        $FAQ->text = $validated['text'];
        $FAQ->save();


        return redirect()->route('FAQ.adminview');
    }

    public function destroy($id){
        if (Auth::user()->is_admin){
            $FAQ=FAQ::findOrFail($id);
           
            $FAQ->delete();
            return redirect()->route('FAQ.adminview');
        } 
        
        return abort(403,"Only admins may delete Posts");
    }



}
