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
	$m = 0;
	$f = 0;
	$dorm1 = 0;
	$dorm2 = 0;
        $link = mysqli_connect($servername,$username,$password,$dbname);
	mysqli_set_charset($link, "utf8");
        $sq3 = "SELECT * FROM user_profiles JOIN departments ON user_profiles.dept_id = departments.id ORDER BY user_profiles.updated_at DESC";
	$result3 = mysqli_query($link,$sq3);
	$result4 = mysqli_query($link,$sq3);

	?>
	<a class="btn btn-primary" href="{{ url('/Protocol/checkFirstTime') }}">CHECK Firsttime LIST</a><hr>

	<table border="0" width="100%" class="table table-bordered table-hover table-condensed table-responsive table-striped">

	<thead>
		<tr>
			<th class="USER_ID">Camp_ID</th>
			<th class="NICKNAME">Lab</th>
			<th class="TEL">นอนหอ</th>
			<th class="answer7">เพศ</th>
			<th class="answer1">Nickname</th>
			<th class="answer2">Name</th>
			<th class="answer6">School</th>
			<th class="answer3">Updated_At</th>
		</tr></thead>
		<tbody>
		<?php
		while($row1 = mysqli_fetch_array($result3)){
		if($row1["user_id"]!=''){$j = $j + 1;
		?>
		<tr>
		<td> <?php if($row1["camp_id"]!=''){ echo $row1["camp_id"]; }  ?> 
		</td>
		<td> <?php if($row1["department_abbr"]!=''){ echo $row1["department_abbr"]; }  ?>
                </td>
		<td><?php if($row1["is_dorm"]=="1")
		{
			echo "นอนหอ";
		}else{
			echo "ไปกลับ";
			$dorm1 = $dorm1 + 1;
		} ?>
		</td>
		<td><?php if($row1["gender"]=="M")
                {
                        echo "ชาย";
			$m = $m + 1;
                }else{
                        echo "หญิง";
			$f = $f + 1;
                } ?>
		</td>
		<td><?php echo $row1["nickname-en"];?></td>
		<td><?php
		 if($row1["first_name-th"]=='NULL')
		 {
			echo $row1["title"].$row1["first_name-en"];
		 }
		 else{
		 echo $row1["title"]." ".$row1["first_name-th"];
		 }?>
		<?php echo " " ;?>
		<?php
                 if($row1["last_name-th"]=='NULL')
                 {
                        echo $row1["last_name-en"];
                 }
                 else{
                         echo $row1["last_name-th"];
                 }?>
		</td>


<!--		<td><?php
                 if($row1["last_name-th"]=='NULL')
                 {
                        echo $row1["last_name-en"];
                 }
                 else{
	                 echo $row1["last_name-th"];
                 }?></td>
-->

		<td><?php echo $row1["school"];?></td>
		<td><?php echo $row1["updated_at"];}}?></td>
		<?php

		while($row2 = mysqli_fetch_array($result4)){
		    if($row2["school"]!=''){ 
		    $i = $i + 1;
		   }
		   if($row2["is_dorm"]==0){
		   $dorm2 = $dorm2 + 1;
		}
		
		}
		$dorm1 = $dorm1 - $dorm2;
		?>


		</tr>
		</tbody>
		<?php echo "มีจำนวนน้องลงทะเบียนแล้ว ".$j." จากทั้งหมด ".$i." คน ";  $home = $i-($j); echo "ไปกลับยังไม่ลงทะเบียนอีก : " .$dorm1. "  คน"  ?><br>
		<?php echo "ข้อมูลฝั่งหอ : ชาย " .$m. " หญิง " .$f. " คน เหลือยอดนอนหออีก " .$home. " คน";  ?> 
	</table>
@endsection

