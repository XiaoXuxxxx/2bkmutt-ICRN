<?php
header("Refresh:300");
?>
@extends('layouts.app')

@section('title', 'FreeDay Checking')

@section('content')
    @include('components.title', [
        "title" => "FreeDay Checking"
    ])

<a href="{{ url('/protocol/checkBack') }}" class="btn btn-info" role="button">เช็คชื่อน้องที่กลับแล้ว </a>
<hr>
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
                        <option>OUT</option>
			<option>DuringTravel</option>
			<option>ComingBack</option>
                        <option>IN</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="status-label">LOCATION</div>
                <div class="status-show">
                    <select class="form-control" id="status-location">
                        <option>BANGKHUNTIEN</option>
			<option>CEN2</option>
			<option>CEN3</option>
			<option>SIAM</option>
			<option>BANMOR</option>
			<option>WATPRAKAEW</option>
			<option>DREAMWORLD</option>
			<option>BOOKFAIR</option>
			<option>SIAMPARKCITY</option>
                        <option>OTHER</option>
			<option disabled>กรุณาเลือก</option>

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
                @include('components.freeday-card', ["p" => $user])
            @endforeach
        </div>
        <div class="clearfix"></div>
    </div>
@endsection

@section('footer')
    <script src="{{ asset('js/offline.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/freeday.js') }}" type="text/javascript"></script>
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
