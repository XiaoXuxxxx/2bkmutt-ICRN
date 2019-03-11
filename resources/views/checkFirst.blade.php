<?php
$url=$_SERVER['REQUEST_URI'];
header("Refresh: 30; URL=\"" . $url . "\""); // redirect in 30 second
?>


@extends('layouts.app')
@section('title', 'CheckFirstTimeRegis')
@section('content')
	@include('components.title', [
        "title" => "ตรวจสอบยอดการลงทะเบียนครั้งแรก"
    	])
	<?php 
	$servername = env('DB_HOST', 'localhost');
	$username   = env('DB_USERNAME', 'forge');
	$password   = env('DB_PASSWORD', 'forge');
	$dbname     = env('DB_DATABASE', 'forge');
		$i = 0;
        $j = 0;
        $link = mysqli_connect($servername,$username,$password,$dbname);
	mysqli_set_charset($link, "utf8");
        $sq3 = "SELECT * FROM user_profiles INNER JOIN departments ON user_profiles.dept_id = departments.id";
	$result3 = mysqli_query($link,$sq3);
	?>
	<a class="btn btn-primary" href="{{ url('/Protocol/checkFinishRegis') }}">CHECK Done LIST</a><hr>	
	<div class="table-responsive">
	<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th class="USER_ID">Camp_ID</th>
			<th class="NICKNAME">Lab</th>
			<th class="TEL">นอนหอ</th>
			<th class="answer8">when</th>
			<th class="answer7">where</th>
			<th class="answer1">Nickname</th>
			<th class="answer2">Name</th>
			<th class="answer3">Surname</th>
			<th class="answer4">Grade</th>
			<th class="answer5">Tel</th>
			<th class="answer6">School</th>
		</tr></thead>
		<tbody>
		<?php
		while($row1 = mysqli_fetch_array($result3))
		{
		if($row1["user_id"]==''){$j = $j + 1;
		?>
		<tr>
		<td><?php echo $row1["camp_id"];?></td>
		<td><?php
			echo $row1["department_abbr"];
		?></td>
		<td><?php if($row1["is_dorm"]=="1")
		{
			echo "นอนหอ";
		}else{
			echo "ไปกลับ";
		}
		?>
		</td>
		<td>
			<?php  
			if($row1["whenCome"]==''){	echo "-"; }
			else{ echo $row1["whenCome"];}?>
		</td>
		<td>
		<?php if($row1["checkWhere"] == 1){
		echo "บางมด";
		}
		else if($row1["checkWhere"] == 2){
		echo "บางขุน";
		}
		else{
		echo "-";
		}
		?>
		</td>

	        <td><?php echo $row1["nickname-en"];?></td>
		<td><?php
		 if($row1["first_name-th"]=='NULL')
		 {
			echo $row1["title"].$row1["first_name-en"];
		 }
		 else{
		 echo $row1["title"]." ".$row1["first_name-th"];
		 }?></td>
		<td><?php
                 if($row1["last_name-th"]=='NULL')
                 {
                        echo $row1["last_name-en"];
                 }
                 else{
	                 echo $row1["last_name-th"];
                 }?></td>

                <td><?php echo $row1["grade"];?></td>
                <td><a href="tel:<?php echo "0".$row1["self_telephone_no"];?>">
		<?php 

		if($row1["self_telephone_no"]=="-")
		{
			echo "ไม่มี";
		}
		else
		{
                        echo "0".$row1["self_telephone_no"];
                }
		?>
		</a>   </td>
		<td><?php echo $row1["school"];}$i = $i+1;}?></td>






		</tr>
		</tbody>
		<?php echo "มีจำนวนน้องยังไม่ได้ลงทะเบียนอีก ".$j." จากทั้งหมด ".$i." คน"   ?>
	</table></div>
@endsection



