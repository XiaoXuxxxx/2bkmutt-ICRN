<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\AttendanceLog;
use App\User;
use App\UserProfile;
use Auth;

class AttendanceCheckingController extends Controller
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
	$logCountD = 0;
	$i = 0;
        $logPull = AttendanceLog::where([
            ["session_date", "=", $session_date],
            ["session_key", "=", $session_key]
        ]);
        $logCount = $logPull->count();
        $log = $logPull->get();

        $usersCount = UserProfile::whereNotNull('user_id')->get()->count();

	$usersCountD = UserProfile::where('is_dorm','=','1')->get()->count();
	$usersCountH = UserProfile::where('is_dorm','=','0')->get()->count();

	/*$pdo = DB::connection()->getPdo();
        $today = date("Y-m-d");
	$Select2BD = $pdo->prepare("SELECT COUNT(*) FROM attendance_logs,user_profiles WHERE attendance_logs.camp_id = user_profiles.camp_id AND user_profiles.is_dorm = 1 AND attendance_logs.session_date = ? AND attendance_logs.session_key = ?");
        $Select2BH = $pdo->prepare("SELECT COUNT(*) FROM attendance_logs,user_profiles WHERE attendance_logs.camp_id = user_profiles.camp_id AND user_profiles.is_dorm = 0 AND attendance_logs.session_date = ? AND attendance_logs.session_key = ?");

	$sessionDateM = array($today, "M");
        $sessionDateL = array($today, "L");
	$sessionDateE = array($today, "E");
	$sessionDateN = array($today, "N");

	$Select2BDM = $Select2BD->execute($sessionDateM);
	$Select2BHM = $Select2BH->execute($sessionDateM);
        $Select2BDL = $Select2BD->execute($sessionDateL);
        $Select2BHL = $Select2BH->execute($sessionDateL);
	$Select2BDE = $Select2BD->execute($sessionDateE);
        $Select2BHE = $Select2BH->execute($sessionDateE);
	$Select2BDN = $Select2BD->execute($sessionDateN);
        $Select2BHN = $Select2BH->execute($sessionDateN);
*/
//	$countDM = $select2BDM->rowCount();
//	$countHM = $Select2BHM->rowCount();
//	$countDL = $Select2BDL->rowCount();
  //      $countHL = $Select2BHL->rowCount();
//	$countDE = $Select2BDE->rowCount();
  //      $countHE = $Select2BHE->rowCount();
//	$countDN = $Select2BDN->rowCount();
  //      $countHN = $Select2BHN->rowCount();


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
        $log = AttendanceLog::firstOrNew([
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
        $deleted = AttendanceLog::where([
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
