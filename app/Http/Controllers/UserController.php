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
    
   
}
