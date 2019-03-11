@extends('layouts.app')

@section('title', 'Attendance Checking System')

@section('content')
    @include('components.title', [
        "title" => "Attendance Checking Log"
    ])

<div class="table-responsive">
	<table class="table table-striped">
	<thead>
			<tr>
				<th>Date</th>
				<th>Time</th>
				<th>Location</th>
				<th>Session</th>
				<th>Checked By</th>
			</tr>
		</thead>
	<tbody>
        @foreach($a as $ac)
	<tr>
		<td>{{ $ac->session_date }}</td>
		<td>{{ $ac->at }}</td>
		<td>{{ $ac->location }}</td>
		<td><?php if($ac->session_key=='M'){
		echo "Morning";
		}
		if($ac->session_key=='L'){
		echo "Late";
		}
		if($ac->session_key=='E'){
		echo "Evening";
		}
		if($ac->session_key=='N'){
		echo "Night";
		}
		if($ac->session_key=='X'){
		echo "Activity Day";
		} ?>
		</td>
		<td>
		<?php 
		$i = 0;
		while($ac->checker != $b[$i]->id){
		     $i = $i + 1;
		}
		echo $b[$i]->name;
		?>

		</td>
 	</tr>
	@endforeach
</table>
</div>
@endsection
