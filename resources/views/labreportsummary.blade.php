@extends('layouts.app')

@section('title', 'Lab Report')

@section('content')
    @include('components.title', [
        "title" => "Lab Report Summary"
    ])
<div class="table-responsive">
<?php $item = 1 ;?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>FirstName</th>
				<th>Lastname</th>
				<th>Project_EN</th>
				<th>Project_TH</th>
				<th>Professor/TA Name_EN</th>
				<th>Professor/TA Name_TH</th>
				<th align="center">C</th>
				<th align="center">V</th>
				
			</tr>
		</thead>
		<tbody>
			@foreach($project as $key => $display)
				<tr>
					<td>{{$item}}</td>
					@foreach($profile as $disprofile)
						@if($display->profile_id == $disprofile->id)
							<td>{{ $disprofile->{"first_name-en"} }}</td>
							<td>{{ $disprofile->{"last_name-en"} }}</td>
						@endif
					@endforeach
					<td>{{ $display->project_en }}</td>
					<td>{{ $display->project_th }}</td>
					<td>{{ $display->professor_en }}</td>
					<td>{{ $display->professor_th }}</td>
					<td><button class="btn btn-info">Check</button></td>
					<td><a href="http://docs.google.com/gview?url=https://2bkmutt.com/download/pdf/{{$display->pdf_filename}}" target="_blank"><button class="btn btn-success">View</button></a></td>
				</tr>
<?php $item++;?>
			@endforeach
		</tbody>
<h3>จำนวนน้องที่ส่งAbstract แล้ว {{$item-1}} ระเบียน</h3>

	</table>
</div>
@endsection
