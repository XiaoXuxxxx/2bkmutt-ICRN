<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UserProfile;
use App\StarVote;

class StarVoteController extends ApiController
{
    public function glacioVote(Request $request,$id){
        $curUser = Auth::user();
        $vote = StarVote::firstOrNew('user_id','user_id','=',$curUser->id)->first();
        $vote->vote_f_profile_id = $id;
        return view("starvote", ["displayCard" => '1',"userprofiles" => $userprofiles ,"staffcard" => "0","voteResult" => $id,"voteSuccess" => true]);
    }
}