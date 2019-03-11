<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\UserProfile;
use App\Department;
use App\StaffProfile;
use App\StarVote;
use DB;
use Auth;

class StarVoteController extends Controller
{
    public function end(){
	return view("endvote");
    }

    public function showvote(){
        // $userprofiles = UserProfile::where(['gender' => 'M'])->get();
        $starvoteinit = StarVote::firstOrNew(['user_id' => Auth::user()->id]);
        $starvoteinit->save();
        return view("starvote", ["displayCard" => '0']);
    }

    public function show(){
        return view("starvote.landing");
    }

    public function viewpicture(){
        return view("starvote.viewall");
    }

    public function glacio(){
        // $userprofiles = UserProfile::where(['gender' => 'M'])->get();
        $curUser = Auth::user();
        $rawuserprofiles = UserProfile::select(
            'id',
            'camp_id', 
            'gender',
            'sec',
            'nickname-th',
            'nickname-en',
            'title',
            'first_name-en',
            'first_name-th',
            'last_name-en',
            'last_name-th',
            'image_filename');
         $userprofiles = $rawuserprofiles->where(['gender' => 'F'])->orderBy('camp_id')->get();
        $chkVote = StarVote::where('user_id','=',$curUser->id)->first();

        if($chkVote->vote_f_profile_id != NULL) {
            $voteResult = $rawuserprofiles->where(['id' => $chkVote->vote_f_profile_id])->first();
            return view("starvote", [
                                    "displayCard" => '1',
                                    "userprofiles" => $userprofiles ,
                                    "staffcard" => "0" ,
                                    "startype" => "1",
                                    "voteResult" => $voteResult
            ]);
        }
        else {
            return view("starvote", [
                                    "displayCard" => '1',
                                    "userprofiles" => $userprofiles ,
                                    "staffcard" => "0" ,
                                    "startype" => "1"
            ]);
        }
    }

    public function fulmo(){
        // $userprofiles = UserProfile::where(['gender' => 'M'])->get();
        $rawuserprofiles = UserProfile::select(
            'id',
            'camp_id', 
            'gender',
            'sec',
            'nickname-th',
            'nickname-en',
            'title',
            'first_name-en',
            'first_name-th',
            'last_name-en',
            'last_name-th',
            'image_filename');

        $curUser = Auth::user();
        $userprofiles = $rawuserprofiles->where(['gender' => 'M'])->orderBy('camp_id')->get();
        $chkVote = StarVote::where('user_id','=',$curUser->id)->first();
        if($chkVote->vote_m_profile_id != NULL) {
            $voteResult = $rawuserprofiles->where(['id' => $chkVote->vote_m_profile_id])->first();
            return view("starvote", [
                                    "displayCard" => '1',
                                    "userprofiles" => $userprofiles ,
                                    "staffcard" => "0" ,
                                    "startype" => "2",
                                    "voteResult" => $voteResult
            ]);
        }
        else {
            return view("starvote", [
                                    "displayCard" => '1',
                                    "userprofiles" => $userprofiles ,
                                    "staffcard" => "0" ,
                                    "startype" => "2"
            ]);
        }
    }

    public function arbaro(){
        // $userprofiles = UserProfile::where(['gender' => 'M'])->get();
        $rawuserprofiles = UserProfile::select(
            'id',
            'camp_id', 
            'gender',
            'sec',
            'nickname-th',
            'nickname-en',
            'title',
            'first_name-en',
            'first_name-th',
            'last_name-en',
            'last_name-th',
            'image_filename');

        $curUser = Auth::user();
        $userprofiles = $rawuserprofiles->orderBy('camp_id')->get();
        $chkVote = StarVote::where('user_id','=',$curUser->id)->first();
        if($chkVote->vote_mf_profile_id != NULL) {
            $voteResult = $rawuserprofiles->where(['id' => $chkVote->vote_mf_profile_id])->first();
            return view("starvote", [
                                    "displayCard" => '1',
                                    "userprofiles" => $userprofiles ,
                                    "staffcard" => "0" ,
                                    "startype" => "3",
                                    "voteResult" => $voteResult
            ]);
        }
        else {
            return view("starvote", [
                                    "displayCard" => '1',
                                    "userprofiles" => $userprofiles ,
                                    "staffcard" => "0" ,
                                    "startype" => "3"
            ]);
        }
    }

    public function lafo(){
        // $userprofiles = UserProfile::where(['gender' => 'M'])->get();
        $rawuserprofiles = StaffProfile::select(
            'id', 
            'gender',
	    'dept_id',
            'sec',
            'nickname_th',
            'nickname_en',
            'title',
            'first_name_en',
            'first_name_th',
            'last_name_en',
            'last_name_th',
            'image_filename');

        $curUser = Auth::user();
        $userprofiles = $rawuserprofiles->orderBy('id')->get();
        $chkVote = StarVote::where('user_id','=',$curUser->id)->first();
        if($chkVote->vote_s_profile_id != NULL) {
            $voteResult = $rawuserprofiles->where(['id' => $chkVote->vote_s_profile_id])->first();
            return view("starvote", [
                                    "displayCard" => '1',
                                    "userprofiles" => $userprofiles ,
                                    "staffcard" => "1" ,
                                    "startype" => "4",
                                    "voteResult" => $voteResult
            ]);
        }
        else {
            return view("starvote", [
                                    "displayCard" => '1',
                                    "userprofiles" => $userprofiles ,
                                    "staffcard" => "1" ,
                                    "startype" => "4"
            ]);
        }
    }

    public function Vote(Request $request){
        $rawuserprofiles = UserProfile::select(
            'id',
            'camp_id', 
            'gender',
            'sec',
            'nickname-th',
            'nickname-en',
            'title',
            'first_name-en',
            'first_name-th',
            'last_name-en',
            'last_name-th',
            'image_filename');

        $rawstaffprofiles = StaffProfile::select(
            'id', 
            'gender',
            'sec',
            'nickname_th',
            'nickname_en',
            'title',
            'first_name_en',
            'first_name_th',
            'last_name_en',
            'last_name_th',
            'image_filename');

        $curUser = Auth::user();
        $vote = StarVote::firstOrNew(['user_id'=> $curUser->id]);
        $staffcard = "0";
        if($request->input('startype') == 1) {
            $vote->vote_f_profile_id = $request->input('voteid'); 
            $userprofiles = $rawuserprofiles->where(['gender' => 'F'])->orderBy('camp_id')->get();
        }
        elseif ($request->input('startype') == 2) {
            $vote->vote_m_profile_id = $request->input('voteid');
            $userprofiles = $rawuserprofiles->where(['gender' => 'M'])->orderBy('camp_id')->get();
        }

        elseif ($request->input('startype') == 3) {
            $vote->vote_mf_profile_id = $request->input('voteid');
            $userprofiles = $rawuserprofiles->orderBy('camp_id')->get();
        }
        elseif ($request->input('startype') == 4) { 
            $vote->vote_s_profile_id = $request->input('voteid'); 
            $userprofiles = $rawstaffprofiles->orderBy('id')->get();
            $staffcard = "1"; 
        }
        else $withError = true;
        $vote->save();
        if($request->input('startype') == 1 || $request->input('startype') == 2 || $request->input('startype') == 3) {
            $voteResult = $rawuserprofiles->where('id','=',$request->input('voteid'))->first();
        }
        elseif($request->input('startype') == 4) {
            $voteResult = $rawstaffprofiles->where('id','=',$request->input('voteid'))->first();
        }
        return view("starvote", [
                                    "displayCard" => '1',
                                    "userprofiles" => $userprofiles ,
                                    "staffcard" => $staffcard,
                                    "voteResult" => $voteResult,
                                    "startype" => $request->input('startype')
        ]);
    }
}
