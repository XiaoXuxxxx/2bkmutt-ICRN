@extends('layouts.app')

@section('title', 'Checking Freeday Comeback')
@section('content')
        @include('components.title', [
        "title" => "Checking Freeday Comeback"
        ])
<style type="text/css">
  #title{
    font-size: 20px;
    font-family: cloud;
    background-color: #c58ec3;
    color: #fff;
  }
  #header{
    font-size: 17px;
    font-family: cloud;
    background-color: #f5d9f5;
  }
  #count{
    font-size: 17px;
    font-family: cloud;
  }
  .btn-pink{
    background-color: #c58ec3;
    color: #fff;
    font-size: 18px;
    font-family: cloud;
    transition: 0.2s;
  }
  .btn-pink:hover{
    background-color: #f4c6f4;
    color: #000;
    font-size: 18px;
    font-family: cloud;
  }
  .desc{
    font-family: cloud;
    font-size: 16px;
  }
</style>

<?php
use DB;
use App\UserProfile;
    $user = UserProfile::orderBy('id','asc')->get();
    $regis = UserProfile::whereNotNull('staff')->whereNotNull('where')->orderBy('where', 'asc')->orderBy('staff', 'asc')->get();
    $bangmod = UserProfile::select('staff','where')->distinct('staff')->where('where','=','BANGMOD')->get();
    $bkt = UserProfile::select('staff','where')->distinct('staff')->where('where','=','BKT')->get();
    $book = UserProfile::select('staff','where')->distinct('staff')->where('where','=','BOOKFAIR')->get();
    $cen = UserProfile::select('staff','where')->distinct('staff')->where('where','=','CEN2')->get();
    $siam = UserProfile::select('staff','where')->distinct('staff')->where('where','=','SIAM')->get();
    $other = UserProfile::select('staff','where')->distinct('staff')->where('where','=','OTHER')->get();
    $bb = UserProfile::select('staff','where')->distinct('staff')->where('where','=','BBGUN')->get();


    $countRegis = UserProfile::whereNotNull('staff')->whereNotNull('where')->count();
    $countBangmod = UserProfile::where('where','=','BANGMOD')->count();
    $countBB = UserProfile::where('where','=','BBGUN')->count();
    $countBKT = UserProfile::where('where','=','BKT')->count();
    $countBOOK = UserProfile::where('where','=','BOOKFAIR')->count();
    $countCen = UserProfile::where('where','=','CEN2')->count();
    $countSIAM = UserProfile::where('where','=','SIAM')->count();
    $countOther = UserProfile::where('where','=','OTHER')->count();

    $countAll = UserProfile::count();

	  $pdo = DB::connection()->getPdo();
	  $today = date('Y-m-d');

	  $user = $pdo->prepare("SELECT * FROM user_profiles WHERE user_profiles.staff != ? AND user_profiles.where != ? ORDER BY user_profiles.where ASC , user_profiles.staff ASC");
          $userC = array("","");
          $user->execute($userC);
	  $count = $user->rowCount();

	  $select2 = $pdo->prepare("SELECT * FROM free_days,user_profiles WHERE free_days.camp_id = user_profiles.camp_id AND user_profiles.staff != ? AND user_profiles.where != ? AND free_days.session_key = ? ORDER BY user_profiles.where ASC , user_profiles.staff ASC");
          $sessionDate2 = array("","","IN");
          $select2->execute($sessionDate2);
          $countA = $select2->rowCount();
  $a = 0;
$b2 = 0;
$c = 0;
$d = 0;
$e = 0;
$f = 0;
$g = 0;        
?>

<a href="{{ url('/tools/freeday-checking') }}" class="btn btn-info" role="button">Freeday-Checking </a>
<hr>
กลับมาแล้ว : {{ $countA }} / {{ $countRegis }} คน
<table border="0" width="100%" class="table table-bordered table-hover table-condensed table-responsive table-striped">
  <tr>
    <th > <div align="center">CAMPID</div></th>
     <th > <div align="center">NAME</div></th>
    <th > <div align="center">STAFF</div></th>   
    <th > <div align="center">WHERE</div></th>
    <th > <div align="center">WHENOUT</div></th>
    <th > <div align="center">WHENBACK</div></th>
    <th > <div align="center">STATUS</div></th>
  </tr>
  <tr>
   @foreach($select2 as $u)
   <td>{{ $u["camp_id"] }}</td>
   <td>{{ $u["nickname-th"] }}</td>
   <td>{{ $u["staff"] }}</td>

   <td> <?php if($u["where"] == 'BANGMOD'){
	     $a = $a + 1;
	     }else if($u["where"] == 'BBGUN'){
             $b2 = $b2 + 1;
	     }else if($u["where"] == 'BKT'){
             $c = $c + 1;
             }else if($u["where"] == 'BOOKFAIR'){
             $d = $d + 1;
             }else if($u["where"] == 'CEN2'){
             $e = $e + 1;
             }else if($u["where"] == 'SIAM'){
             $f = $f + 1;
             }else if($u["where"] == 'OTHER'){
             $g = $g + 1;
             } ?>
	{{ $u["where"] }}</td>
   <td>{{ $u["whenOut"] }}</td>
   <td>{{ $u["whenCome"] }}</td>
   <td>กลับแล้ว</td>
  </tr>   
  @endforeach
</table>

<div class="panel panel-default">
  <div class="panel-heading" id="title">
    <i class="fa fa-fw fa-caret-right"></i>&nbsp;ยอดของน้องวัน Freeday
  </div>
  <div class="panel-body">
<div class="row">
  <div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-users"></i>&nbsp;Bangmod</div>
      <div class="panel-body">
  STAFF : @foreach($bangmod as $b)
              <br>- {{ $b["staff"] }}
        @endforeach
  <br>
        <span id="count">ยอด: {{ $countBangmod }} คน<br>
  กลับแล้ว: {{$a}} คน</span>
      </div>
    </div>    
  </div>
  <div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-users"></i>&nbsp;BBGUN</div>
      <div class="panel-body">
  STAFF : @foreach($bb as $b)
              <br>- {{ $b["staff"] }}
        @endforeach
        <br>
        <span id="count">ยอด: {{ $countBB }} คน<br>
  กลับแล้ว: {{$b2}} คน</span>
 

      </div>
    </div>    
  </div>
  <div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-users"></i>&nbsp;BKT</div>
      <div class="panel-body">
  STAFF : @foreach($bkt as $b)
              <br>- {{ $b["staff"] }}
        @endforeach
        <br>
        <span id="count">ยอด: {{ $countBKT }} คน<br>
  กลับแล้ว: {{$c}} คน</span>


      </div>
    </div>    
  </div>
  <div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-users"></i>&nbsp;BOOKFAIR</div>
      <div class="panel-body">
  STAFF : @foreach($book as $b)
              <br>- {{ $b["staff"] }}
        @endforeach
        <br>
        <span id="count">ยอด: {{ $countBOOK }} คน<br>
  กลับแล้ว: {{$d}} คน</span>


      </div>
    </div>    
  </div>
<div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-users"></i>&nbsp;CEN2</div>
      <div class="panel-body">
  STAFF : @foreach($cen as $b)
              <br>- {{ $b["staff"] }}
        @endforeach
        <br>
        <span id="count">ยอด: {{ $countCen }} คน<br>
  กลับแล้ว: {{$e}} คน</span>

      </div>
    </div>
  </div>

<div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-users"></i>&nbsp;SIAM</div>
      <div class="panel-body">
  STAFF : @foreach($siam as $b)
              <br>- {{ $b["staff"] }}
        @endforeach
        <br>
        <span id="count">ยอด: {{ $countSIAM }} คน<br>
  กลับแล้ว: {{$f}} คน</span>

      </div>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-users"></i>&nbsp;THA MAHARAJ</div>
      <div class="panel-body">
  STAFF : @foreach($other as $b)
              <br>- {{ $b["staff"] }}
        @endforeach
        <br>
        <span id="count">ยอด: {{ $countOther }} คน<br>
  กลับแล้ว: {{$g}} คน</span>

      </div>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-users"></i>&nbsp;FULL AMOUNT</div>
      <div class="panel-body">
  <center><span id="count">{{ $countRegis }} คน</span></center>
      </div>
    </div>
  </div>



</div>
  </div>
</div>


@endsection


