<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\StaffProfile;
use App\Department;

class StaffDataViewerController extends Controller
{

    public function show(){
        $userprofiles = StaffProfile::get();
        return view("staffdataviewer", ["userprofiles" => $userprofiles]);
    }

}
