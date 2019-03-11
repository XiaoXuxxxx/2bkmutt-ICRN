<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\UserProfile;

use App\User;
use App\UserProject;
use App\Role;
use Auth;
use Storage;

class LabReportController extends Controller
{

    public function show(){
        $curUser = Auth::user();
        $user = UserProfile::where('user_id','=',$curUser->id)->first();
        $project_info = UserProject::where('profile_id','=',$user['id'])->first();
        if($project_info != NULL && $project_info->pdf_filename != NULL) {
             return view('labreport',[
                'currentProjectTH' => $project_info->project_th,
                'currentProjectEN' => $project_info->project_en,
                'currentProfessTH' => $project_info->professor_th,
                'currentProfessEN' => $project_info->professor_en,
                'PDFUploaded' => $project_info->pdf_filename
                ]);
        }
        elseif($project_info != NULL) {
             return view('labreport',[
                'currentProjectTH' => $project_info->project_th,
                'currentProjectEN' => $project_info->project_en,
                'currentProfessTH' => $project_info->professor_th,
                'currentProfessEN' => $project_info->professor_en
                ]);
        }
        else {
            return view('labreport');
        }
    }

    public function showSummary(){
        $project = UserProject::get();
        $profile = UserProfile::select('id','first_name-en','last_name-en')->get();
        return view('labreportsummary',['project' => $project ,'profile' => $profile]);
    }

    public function submit(Request $request){
        $curUser = Auth::user();
        $user = UserProfile::where('user_id','=',$curUser->id)->first();
        $project_info = UserProject::firstOrNew(["profile_id" => $user['id']]);
        $project_info->project_th = $request->input('project-th');
        $project_info->project_en = $request->input('project-en');
        $project_info->professor_th = $request->input('professor-th');
        $project_info->professor_en = $request->input('professor-en');
        if($request->hasFile('file')) {
            $file = $request->file("file");
            $name = $curUser->name . "-" . $user->{'first_name-en'} . "-" . $user->{'last_name-en'} .".pdf" ;
            $file = $file->move(storage_path('app/uploads/abstact-pdf'), $name);
            $project_info->pdf_filename = $name;
        }

        $project_info->save();

        if($request->hasFile('file')) {
            return view('labreport', [
                'withSuccess' => true,
                'curUser' => $request->input('project-en'),
                'currentProjectTH' => $project_info->project_th,
                'currentProjectEN' => $project_info->project_en,
                'currentProfessTH' => $project_info->professor_th,
                'currentProfessEN' => $project_info->professor_en,
                'PDFUploaded' => $project_info->pdf_filename
            ]);
        }
        else {
            return view('labreport', [
                'withSuccess' => true,
                'curUser' => $request->input('project-en'),
                'currentProjectTH' => $project_info->project_th,
                'currentProjectEN' => $project_info->project_en,
                'currentProfessTH' => $project_info->professor_th,
                'currentProfessEN' => $project_info->professor_en
            ]);
        }
    }

}
