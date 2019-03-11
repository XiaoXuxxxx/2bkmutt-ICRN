<?php
header("Refresh:300");
?>
@extends('layouts.app')

@section('title', 'Attendance Checking')

@section('content')
    @include('components.title', [
        "title" => "Attendance Checking"
    ])
<?php

use App\UserProfile;
use App\AttendanceLog;

$getL = AttendanceLog::where('session_key','=','L')->get();
$cDorm = UserProfile::where('is_dorm','=','1')->whereNotNull('user_id')->count();
$cHome = UserProfile::where('is_dorm','=','0')->whereNotNull('user_id')->count();
$countL = AttendanceLog::where('session_key','=','L')->count();



?>

Total Check Late: {{$countL}}

<?php
//	echo $getL[0]->camp_id;
	for($i=1;$i<$countL;$i++){
//		echo " ," . $getL[$i]->camp_id;
	}
?>
<br><hr>
    <div class="attendance-checking">
        <div class="row" id="status">
            <div class="col-sm-3">
                <div class="status-label">SESSION DATE</div>
                <div class="status-show">
                    <input type="date" id="status-date" class="form-control">
                </div>
            </div>
            <div class="col-sm-1">
                <div class="status-label">KEY</div>
                <div class="status-show">
                    <select class="form-control" id="status-key">
                         <option>M</option>
			             <option>L</option> 
                         <option>E</option>
                         <option>N</option>
                         <option>X</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="status-label">LOCATION</div>
                <div class="status-show">
                    <select class="form-control" id="status-location">
                        <option>BANGMOD</option>
                        <option>BANGKHUNTIEN</option>
                        <option>OTHER</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="status-label">CHECKED</div>
                <div class="status-show-psuedo-style" id="status-checked">

                </div>
            </div>
            <div class="col-sm-2">
                <div class="status-label">TIME</div>
                <div class="status-show-psuedo-style" id="status-time">

                </div>
            </div>
            <div class="col-sm-2">
                <div class="status-label">STATUS</div>
                <div class="status-show-psuedo-style" id="status-connection">
                    INITIALIZING..
                </div>
            </div>
        </div>

        <div class="row" id="check" style="margin-top: 16px;">
            <div class="col-sm-4">
                <div class="status-label">SEARCH BY</div>
                <input type="text" id="check-search" class="form-control">
                <p id="check-search-info" class="help-block" style="margin-bottom: 0;"></p>
            </div>
            <div class="col-sm-2">
                <div class="status-label">LAST LOCAL CHECK</div>
                <h5 class="local-name">-</h5>
                Status: <span class="local-status">-</span>
            </div>


            <div class="col-sm-4">
                <div class="status-label">LAST GLOBAL CHECK</div>
                <p class="last-check last-check-1"></p>
                <p class="last-check last-check-2"></p>
                <p class="last-check last-check-3"></p>
            </div>
        </div>
        <hr>
        <div class="" id="display">
            @foreach($p as $user)
                @include('components.attendance-card', ["p" => $user])
            @endforeach
        </div>
        <div class="clearfix"></div>
    </div>
@endsection

@section('footer')
    <script src="{{ asset('js/attendance-checking.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/offline.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.lazyload.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $("div.lazy").lazyload({
                effect : "fadeIn"
            });
        });
    </script>
   <script>
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var yyyy = today.getFullYear();

	if(dd<10) {
    		dd = '0'+dd
	}

	if(mm<10) {
    		mm = '0'+mm
	}

	today = yyyy + '-' + mm + '-' + dd;

   </script>
@endsection
