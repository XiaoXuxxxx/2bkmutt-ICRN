<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\UserProfile;
use App\User;
use Auth;

class ResetPasswordController extends Controller
{
    public function show(){
    	return view('resetpassword');
    }

    public function resetpassword(Request $request){
    	$curUser = Auth::user();
    	$password = User::where('id','=',$curUser->id)->first();
    	$password->password = bcrypt($request->input("password"));
    	$password->save();
    	return view('resetpassword' , ['withSuccess' => true]);
    }
}