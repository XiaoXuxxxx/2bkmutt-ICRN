<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\UserProfile;
use App\User;
use App\FreeDay;
use Auth;

class FreeDayController extends Controller
{
    public function show(){
        $userprofiles = UserProfile::whereNotNull('camp_id')->whereNotNull('staff')->whereNotNull('where')->orderBy('camp_id')->get();
        return view('freeday', ["p" => $userprofiles]);
    }
    public function log(){
	$curUser = Auth::user();
	$user = UserProfile::where('user_id','=',$curUser->id)->first();
	$atten = DB::table('freeday_logs')->where('camp_id','=',$user['camp_id'])->get();
	$alluser = DB::table('users')->select('id','name')->get();
	//$test = DB::table('attendance_logs')->where('checker','=',$alluser->id)->get();
	return view('attencheck', ["a" => $atten],["b" => $alluser]);
    }
}
