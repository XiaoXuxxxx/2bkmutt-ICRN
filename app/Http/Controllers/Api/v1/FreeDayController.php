<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\FreeDay;
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
	$logPull = FreeDay::where([
            ["session_date", "=", $session_date],
            ["session_key", "=", $session_key]
        ]);
        $logCount = $logPull->count();
        $log = $logPull->get();

        $usersCount = UserProfile::whereNotNull('user_id')->whereNotNull('staff')->whereNotNull('where')->get()->count();


	return response()->json(
            array(
                "status" => 200,
                "content" => $log,
                "count" => array(
                    "checked" => $logCount,
                    "all" => $usersCount
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
	$log = FreeDay::firstOrNew([
            "session_date" => $session_date,
            "session_key" => $session_key,
            "camp_id" => $camp_id
        ]);
	$getCamp = UserProfile::select('staff')->where('camp_id','=',$log->camp_id)->get();
        $log->at = $at;
        $log->camp_id = $camp_id;
        $log->location = $location;
        $log->checker = $checker;
	$log->who = $getCamp;
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
        $deleted = FreeDay::where([
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

