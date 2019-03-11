<?php
$i = 0;
?>
@extends('layouts.app')
@section('title', 'Leaflet V2')

@section('content')
    @include('components.title', [
        "title" => "Checking Status for Permission (น้องค่าย)",
        "desc" => "Leaflet V2"
    ])
@if(isset($withSuccess))
        <div class="alert alert-success">อัพเดตข้อมูลเรียบร้อยแล้ว / Your information has been updated.</div>
    @endif
@if(isset($Fail))
        <div class="alert alert-success">อัพเดตไม่สมบูรณ์</div>
    @endif


<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li><a href="/leaflet2">กรอกใบลา</a></li>
      <li class="active"><a href="/leaflet2/status">เช็คสถานะการยืนยัน</a></li>
    </ul>
  </div>
</nav>

<table border="0" width="100%" class="table table-bordered table-hover table-condensed table-responsive table-striped">
  <thead>
  <tr>
    <th > <div align="center">No </div></th>
    <th > <div align="center">Fullname </div></th>
    <th > <div align="center">Camp_id</div></th>
     <th > <div align="center">Cause</div></th>
    <th > <div align="center">StartDate</div></th>
    <th > <div align="center">ComeBack</div></th>
   <th > <div align="center">Approve</div></th>

  </tr>
  </thead>
  <tbody>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	@foreach($s as $key => $display)
     <tr>
	@if($display->camp_ID != 'JuniorStaff')
	<td> <form method ="post" action="">
		<input type="text" value="{{$display->ID }}" id="ID2" disabled></td>
	<td>{{ $display->fullName }}  </td>
	<td>{{ $display->camp_ID }}  </td>
	<td>{{ $display->description }}  </td>
	<td>{{ $display->startDate }}  </td>
	<td> @if($display->comeBack == '')
		IDK
	     @else
		{{ $display->comeBack }}  
	     @endif
	</td>
	<td> @if($display->status == '0')
			<select class="form-control" required id="status">
			   <option>-</option>
    			    <option value="1">Y</option>
			    <option value="2">N</option>
  			</select>
			<input type="submit" class="btn btn-info" value="Go">
		</form>
	     @else
		@if($display->status == '1')
			Approve
		@elseif($display->status == '2')
			Decline
		@endif
	     @endif
	</td>
	@endif
	<?php $i = $i + 1; ?>
    </tr>
	@endforeach
  </tbody>

</table>
ยอดทั้งหมดที่ยังไม่ผ่านการยืนยัน : {{ $i }} คน


@endsection
