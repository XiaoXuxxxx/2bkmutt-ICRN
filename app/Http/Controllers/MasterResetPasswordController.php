<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\UserProfile;
use App\User;
use Auth;

class MasterResetPasswordController extends Controller
{
    public function show(){
    	return view('masterresetpassword');
    }

    public function resetpassword(Request $request){
    	$password = User::where('name','=',$request->input("username"))->first();
        if($password == null) { 
            return view('masterresetpassword' , ['UserNotFound' => true]); 
        }
    	else { 
            $password->password = bcrypt($request->input("password"));
        	$password->save();
        	return view('masterresetpassword' , ['withSuccess' => true]);
        }
    }
}