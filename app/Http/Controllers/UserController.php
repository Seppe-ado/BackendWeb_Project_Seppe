<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function user ($name){
        $user= User::where('name','=',$name)->firstOrFail();
        return view('users.profile', compact('user'));
    }


    public function admins(){

        $users= User::where('is_admin', true)->get();
        return view('admin.admins', compact('users'));
    }

    
    public function addadmins (Request $request){
        $user= User::where('id','=',$request->id)->firstOrFail();
        if (Auth::user()->is_admin){
        $user->is_admin = TRUE;
        $user->save();
        
        return redirect()->route('admins')->with('status','Admin added');
        }else{
            return abort(403,"Only admins may add admins");
        }
    }
    public function profile (){
        $user= Auth::user();
        return view('users.profile', compact('user'));
    }

    public function edit($id){
        $user= User::findorFail($id);

        if ($user->id != Auth::user()->id) {
            abort(403);
         }
 
         return view('users.edit', compact('user'));
        
    }

    public function update($id, Request $request){
        $user= User::findorFail($id);

        

        if ($user->id != Auth::user()->id) {
           abort(403);
        }
        $validated=$request-> validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'aboutMe' => 'required|min:5',
            'birthday' => 'required|date'
        ]);

        $user->name = $validated['name'];
        $user->aboutMe = $validated['aboutMe'];
        $user->email = $validated['email'];
        $user->birthday=$validated['birthday'];
        $user->save();


        return redirect()->route('profile')->with('status','Information edited');
    }

   
    
   
}
