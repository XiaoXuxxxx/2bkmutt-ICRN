<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\StaffProfile;

class StaffProfileRegisController extends Controller
{

    public function show(){
        return view('staffregis.step1');
    }

    public function takePhoto(Request $request){
        $profile = StaffProfile::firstOrNew(["first_name_en" => $request->input('first_name_en'),"last_name_en" => $request->input('last_name_en')]);
        $profile->first_name_th = $request->input('first_name_th');
        $profile->last_name_th = $request->input('last_name_th');
        $profile->nickname_th = $request->input('nickname_th');
        $profile->sec = $request->input('sec');
        $profile->dept_id = $request->input('dept_id');
        $profile->nickname_en = $request->input('nickname_en');
        $profile->telephone_no = $request->input('telephone_no');
        $profile->birth_date = $request->input('birth_date');
        $profile->facebook = $request->input('facebook');
        $profile->email = $request->input('email');
        $profile->disease = $request->input('disease');
        $profile->allergic = $request->input('allergic');
        $profile->gender = $request->input('gender');
        $profile->title = $request->input('title');
        $profile->save();
        return view('staffregis.step2',["id"=>$profile->id]);
    }

    public function finish(){
        return view('staffregis.step3');
    }
}
