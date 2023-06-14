<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function user ($name){
        $user= User::where('name','=',$name)->firstOrFail();
        return view('users.profile', compact('user'));
    }





}
