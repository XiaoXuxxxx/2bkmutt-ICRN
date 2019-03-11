<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\StarVote;

class StarVoteCount extends Controller
{
   	 function StarVoteCount (){
		$star = StarVote::orderBy('vote_m_profile_id')->get();
		$star_1 = StarVote::count();
		while($i != $star_1){
			
		}
		
	}
}
