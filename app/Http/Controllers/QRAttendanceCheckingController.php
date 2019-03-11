<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\UserProfile;
use App\User;
use App\AttendanceLog;
use Auth;

class QRAttendanceCheckingController extends Controller
{
    public function show(){
        $userprofiles = UserProfile::whereNotNull('camp_id')->orderBy('camp_id')->get();


        $check = AttendanceLog::select('attendance_logs.*','user_profiles.is_dorm')->join('user_profiles','attendance_logs.camp_id','=','user_profiles.camp_id')->get();


	//$atten = DB::select('user_profiles.user_id','user_profiles.camp_id','user_profiles.is_dorm','attendance_logs.camp_id','attendance_logs.session_date','attendance_logs.session_key')
	//	->from('user_profiles')
	//	->join('attendance_logs','attendance_logs.camp_id', '=', 'user_profiles.camp_id')
	//	->whereNotNull('user_profiles.user_id')
	//	->get();

        return view('qrattendancechecking', ["p" => $userprofiles], ["c" => $check]);
    }


    
    public function log(){
		$curUser = Auth::user();
		$user = UserProfile::where('user_id','=',$curUser->id)->first();
		$atten = DB::table('attendance_logs')->where('camp_id','=',$user['camp_id'])->get();
		$alluser = DB::table('users')->select('id','name')->get();
		//$test = DB::table('attendance_logs')->where('checker','=',$alluser->id)->get();
		return view('attencheck', ["a" => $atten],["b" => $alluser]);
    }
}
