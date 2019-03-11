<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\UserProfile;
use App\AttendanceLog;
use App\User;
use App\Role;
use Auth;


class attencheck extends Controller
{
    public function show(){
	$recentUser = Auth::user();
	$user = UserProfile::where('user_id','=',$recentUser->id)->first();
	$atten = AttendanceLog::where('camp_id','=',$user['camp_id'])->first();
        return view('attencheck');
    }
}
