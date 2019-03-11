<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use App\UserProfile;
use App\User;
use App\Role;

class FirstTimeRegistrationController extends Controller
{

    public function chooseType(){
        return view('firsttimeregis.step1');
    }

    public function takePhoto(Request $request){
        return view('firsttimeregis.step2', ['camp_id' => $request->input("camp_id")]);
    }

    public function informationTH(Request $request){
        return view('firsttimeregis.step3', ['camp_id' => $request->input("camp_id")]);
    }

/*
    public function RFIDth(Request $request){
        return view('firsttimeregis.step3rfid', ['camp_id' => $request->input("camp_id")]);
    }
*/

    public function informationEN(Request $request){
        return view('firsttimeregis.step3en', ['camp_id' => $request->input("camp_id")]);
    }




    public function register(Request $request){
        $camp_id = $request->input("camp_id");
        $user = UserProfile::where("camp_id", "=", $camp_id)->get()->first();
        $all = $request->all();
        foreach(array_keys($all) as $field){
            if($field != "_token"){
                $user->$field = $all[$field];
            }
        }
        $user->save();
        return view('firsttimeregis.step4', ['camp_id' => $request->input("camp_id")]);
    }

    public function finish(Request $request){
        $v = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ]);
        if($v->fails()) {
            return view('firsttimeregis.step4', ['camp_id' => $request->input("camp_id"), 'passwordError' => true]);
        }
        if( UserProfile::where("camp_id", "=", $request->input("camp_id"))->get()->first()['user_id'] != null){
            $user = User::where("id", "=", UserProfile::where("camp_id", "=", $request->input("camp_id"))->get()->first()['user_id'])->first();
        }else if( User::where("email", "=", $request->input('email'))->orWhere("name", "=", $request->input('username'))->get()->count() > 0 ){
            return view('firsttimeregis.step4', ['camp_id' => $request->input("camp_id"), 'withError' => true]);
        }else{
            $user = User::firstOrNew([ "email" => $request->input('email'), "name" => $request->input('username') ]);
        }
        $user->password = bcrypt($request->input('password'));
        $user->save();
        $user->roles()->sync([Role::where('name', '=' ,'user')->first()->id]);
        $userProfile = UserProfile::where("camp_id", "=", $request->input("camp_id"))->get()->first();
        $user_id = 'user_id';
        $userProfile->$user_id = $user->id;
        $userProfile->save();
        return view('firsttimeregis.step5', ['camp_id' => $request->input("camp_id")]);
    }

}
