<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\UserProfile;
use App\Department;
use App\StaffProfile;

class UserDataViewerController extends Controller
{

    public function show(){
        $userprofiles = UserProfile::whereNotNull('camp_id')->orderBy('camp_id')->get();
        $staffcontact = StaffProfile::get();
        return view("userdataviewer", ["userprofiles" => $userprofiles ,"staffcontact" => $staffcontact]);
    }

}
