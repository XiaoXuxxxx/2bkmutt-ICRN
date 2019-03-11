<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Role;
use Auth;

class CreateUserController extends Controller
{

    public function show(){
        return view('createuser');
    }

    public function insert(Request $request){
        if( User::where("email", "=", $request->input('email'))->orWhere("name", "=", $request->input('username'))->get()->count() > 0 ){
            return view('createuser', ['withError' => true]);
        }else{
            $user = User::firstOrNew([ "email" => $request->input('email'), "name" => $request->input('username') ]);
        }
        $user->password = bcrypt($request->input("password"));
        $user->save();

        $role = $request->input('role');
        $curUser = Auth::user();
        if( $curUser->hasRole('junior') && ( $role == 'senior' || $role == 'admin' )){
            $role = "user";
        }
        if( $curUser->hasRole('senior') && ( $role == 'admin' )){
            $role = "user";
        }
        $user->roles()->sync([Role::where('name', '=' , $role)->first()->id]);
        return view('createuser', ['withSuccess' => true]);
    }

}
