<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\UserProfile;

class EditUserController extends Controller
{

    public function show($id){
        return view('edituser', ['id' => $id]);
    }

    public function save(Request $request){
        $id = $request->input("id");
        $user = UserProfile::where("id", "=", $id)->get()->first();
        $id = $user->id;
        $all = $request->all();
        foreach(array_keys($all) as $field){
            if($field != "_token" && $field != "id" && $field != "user_id"){
                $user->$field = $all[$field];
            }
        }
        $user->save();
        return view('edituser', ['id' => $id, 'withSuccess' => true]);
    }

}
