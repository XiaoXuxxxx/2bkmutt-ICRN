@extends('layouts.app')
@section('title', '2B-KMUTT')

@section('content')
    @include('components.title', [
        "title" => "Freeday Registration",
        "desc" => "ลงทะเบียนวันกิจกรรม Freeday"
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
    $i = 0;
?>
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
        <span id="count">ยอด: {{ $countBangmod }} คน</span>
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
        <span id="count">ยอด: {{ $countBB }} คน</span>
 

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
        <span id="count">ยอด: {{ $countBKT }} คน</span>


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
        <span id="count">ยอด: {{ $countBOOK }} คน</span>


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
        <span id="count">ยอด: {{ $countCen }} คน</span>

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
        <span id="count">ยอด: {{ $countSIAM }} คน</span>

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
        <span id="count">ยอด: {{ $countOther }} คน</span>

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
<hr>
<div class="form-group" style="font-family: cloud;font-size: 16px;">
        <label class="control-label col-sm-2" for="where">น้องคนไหนเด้อ:</label>
        <div class="col-sm-10">
          <select class="form-control" id="id">
	    <option value="/tools/freeday">โปรดเลือก</option>

	 @foreach($user as $u)
            <option value="/tools/freeday/{{$u->id}}">
            <?php
            if($u["first_name-th"] == 'NULL'){
                echo " ".$u["first_name-en"] ." "  . $u["last_name-en"];
            }
            else{
                echo " ".$u["first_name-th"] ." "  . $u["last_name-th"];
            }
                ?>
                </option>
            @endforeach

	</select>
        </div>
      </div>

<table border="0" width="100%" class="table table-bordered table-hover table-condensed table-responsive table-striped">
  <tr>
    <th > <div align="center">CAMPID</div></th>
     <th > <div align="center">NAME</div></th>
    <th > <div align="center">STAFF</div></th>   
    <th > <div align="center">WHERE</div></th>
    <th > <div align="center">OTHER</div></th>
    <th > <div align="center">WHENOUT</div></th>
    <th > <div align="center">WHENBACK</div></th>
   
  </tr>
  @foreach($regis as $r)
  <tr>
   <td><center>{{ $r["camp_id"] }}</center></td>
   <td><center>
   @if($r["first_name-th"] == 'NULL')
	{{ $r["first_name-en"] }} {{ $r["last_name-en"] }}
   @else
        {{ $r["first_name-th"] }} {{ $r["last_name-th"] }}
   @endif
   </center></td>

   <td><center>{{ $r["staff"] }}</center></td>
   <td><center>{{ $r["where"] }}</center></td>
   <td><center>{{ $r["whereOther"] }}</center></td>
   <td><center>{{ $r["whenOut"] }}</center></td>
   <td><center>{{ $r["whenCome"] }}</center></td>
  </tr>
  @endforeach

   
</table>


@endsection

@section('footer')
<script>
$("select").click(function() {
  var open = $(this).data("isopen");
  if(open) {
    window.location.href = $(this).val()
  }
  //set isopen to opposite so next time when use clicked select box
  //it wont trigger this event
  $(this).data("isopen", !open);
});

</script>

@endsection
