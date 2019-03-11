<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\UserProfile;
use Auth;

class FreeDayController extends Controller
{
    public function serverTime(){
        return response()->json(
            array(
                "content" => time()
            )
        );
    }

    public function getUsers(){
        $users = User::select(array('id', 'name'))->get();
        return response()->json(
            array(
                "status" => 200,
                "content" => $users
            )
        );
    }

    public function checkGet(Request $request){
        $session_date = $request->input('session_date');
        $session_key = $request->input('session_key');
	$dorm1 = 1;
	$home1 = 0;
	$logCountD = 0;
	$i = 0;
        $logPull = DB::table('freeday_logs')->where([
            ["session_date", "=", $session_date],
            ["session_key", "=", $session_key]
        ]);
        $logCount = $logPull->count();
        $log = $logPull->get();

        $usersCount = UserProfile::whereNotNull('user_id')->get()->count();

	$usersCountD = UserProfile::where('is_dorm','=','1')->get()->count();
	$usersCountH = UserProfile::where('is_dorm','=','0')->get()->count();

	return response()->json(
            array(
                "status" => 200,
                "content" => $log,
                "count" => array(
                    "checked" => $logCount,
                    "all" => $usersCount,
		    "dorm" => $usersCountD,
		    "home" => $usersCountH
                )
            )
        );
    }

    public function checkPost(Request $request){
        $at = date('Y-m-d G:i:s');
        $session_date = $request->input('session_date');
        $session_key = $request->input('session_key');
        $camp_id = $request->input('camp_id');
        $location = $request->input('location');
        $checker = Auth::user()->id;
        $log = DB::table('freeday_logs')->firstOrNew([
            "session_date" => $session_date,
            "session_key" => $session_key,
            "camp_id" => $camp_id
        ]);
        $log->at = $at;
        $log->camp_id = $camp_id;
        $log->location = $location;
        $log->checker = $checker;
        $log->save();
        return response()->json(
            array(
                "status" => 200
            )
        );
    }

    public function removePost(Request $request){
        $session_date = $request->input('session_date');
        $session_key = $request->input('session_key');
        $camp_id = $request->input('camp_id');
        $deleted = DB::table('freeday_logs')->where([
            "session_date" => $session_date,
            "session_key" => $session_key,
            "camp_id" => $camp_id
        ])->delete();
        return response()->json(
            array(
                "status" => 200
            )
        );
    }
}
