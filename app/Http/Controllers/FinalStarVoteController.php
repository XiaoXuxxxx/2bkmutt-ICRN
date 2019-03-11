<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\UserProfile;
use App\Department;
use App\StaffProfile;
use App\StarVote;
use Auth;

class FinalStarVoteController extends Controller
{
  public function getForReturn($params) {
    $curUser = Auth::user();
    $vote = StarVote::firstOrNew(['user_id'=> $curUser->id]);
    $render = [
      'm' => $vote->vote_m_profile_id,
      'f' => $vote->vote_f_profile_id,
      's' => $vote->vote_s_profile_id,
      'mf' => $vote->vote_mf_profile_id
    ];
    if($params == 'landing')
      return view('final.index');
    else if($params == 'page')
      return view('final.indexall', $render);
    else if($params == 1)
      return view('final.nat', $render);
    else if($params == 2)
      return view('final.biee', $render);
    else if($params == 3)
      return view('final.aim', $render);
    else if($params == 4)
      return view('final.first', $render);
    else if($params == 5)
      return view('final.best1', $render);
    else if($params == 6)
      return view('final.best2', $render);
    else if($params == 7)
      return view('final.jessie', $render);
    else if($params == 8)
      return view('final.aof', $render);
    else if($params == 9)
      return view('final.nu', $render);
    else if($params == 10)
      return view('final.jed', $render);
    else if($params == 11)
      return view('final.praew', $render);
    else if($params == 12)
      return view('final.aun', $render);
    else
      return('ม่ายดีม่ายดี');
  }

  public function postToSave($params, Request $req) {
    $curUser = Auth::user();
    $type = $req->voteid;
    $vote = StarVote::firstOrNew(['user_id'=> $curUser->id]);
    if($type == 1) {
      $vote->vote_f_profile_id = $params;
    } else if ($type == 2) {
      $vote->vote_m_profile_id = $params;
    } else if ($type == 3) {
      $vote->vote_mf_profile_id = $params;
    } else if ($type == 4) {
      $vote->vote_s_profile_id = $params;
    } else {
      return '';
    }
    $vote->save();
    return redirect('/final/page');
  }
}
