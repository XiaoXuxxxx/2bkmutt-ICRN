@extends('layouts.app')

@section('title', 'StarVote MagicCount')

@section('content')
    @include('components.title', [
        "title" => "Check Name Count Result"
    ])




<?php
$host = env('DB_HOST', 'localhost');
  $user   = env('DB_USERNAME', 'forge');
  $pass   = env('DB_PASSWORD', 'forge');
  $db     = env('DB_DATABASE', 'forge');

$con = mysqli_connect($host,$user,$pass,$db);
	if (mysqli_connect_errno()){
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	mysqli_set_charset($con,"utf8");
?>

<?php
	
	
	//All User On table [user_profiles]
	$count_all = mysqli_query($con,"SELECT COUNT(*) FROM user_profiles WHERE image_filename != 'NULL'");
    $res = mysqli_fetch_array($count_all);
    $SUM_all = $res[0];

    //User All Male 
    $count_all_male = mysqli_query($con,"SELECT COUNT(*) FROM user_profiles WHERE gender = 'M'");
    $res2 = mysqli_fetch_array($count_all_male);
    $SUM_all_male = $res2[0];

    //User All Female 
    $count_all_female = mysqli_query($con,"SELECT COUNT(*) FROM user_profiles WHERE gender = 'F'");
    $res3 = mysqli_fetch_array($count_all_female);
    $SUM_all_female = $res3[0];



    //นอนหอรวม
    $count_dorm_go = mysqli_query($con,"SELECT COUNT(*) FROM user_profiles WHERE is_dorm = '1'");
    $res4 = mysqli_fetch_array($count_dorm_go);
    $SUM_dorm = $res4[0];  

    //ชายนอนหอ
    $count_dorm_m = mysqli_query($con,"SELECT COUNT(*) FROM user_profiles WHERE is_dorm = '1' and gender = 'M'");
    $res6 = mysqli_fetch_array($count_dorm_m);
    $SUM_dorm_m = $res6[0];
    
    //ชายต่างชาตินอนหอ
    $count_dorm_m_for = mysqli_query($con,"SELECT COUNT(*) FROM user_profiles WHERE is_dorm = '1' and gender = 'M' and remark = 'ต่างชาติ'");
    $res7 = mysqli_fetch_array($count_dorm_m_for);
    $SUM_dorm_m_for = $res7[0];
   
   //ชายไทยนอนหอ
    $SUM_dorm_m_th = $SUM_dorm_m - $SUM_dorm_m_for;


    //หญิงนอนหอ
    $count_dorm_f = mysqli_query($con,"SELECT COUNT(*) FROM user_profiles WHERE is_dorm = '1' and gender = 'F'");
    $res8 = mysqli_fetch_array($count_dorm_f);
    $SUM_dorm_f = $res8[0];
  

    //หญิงต่างชาตินอนหอ
    $count_dorm_f_for = mysqli_query($con,"SELECT COUNT(*) FROM user_profiles WHERE is_dorm = '1' and gender = 'F' and remark = 'ต่างชาติ'");
    $res9 = mysqli_fetch_array($count_dorm_f_for);
    $SUM_dorm_f_for = $res9[0];
 
   
   //หญิงไทยนอนหอ
    $SUM_dorm_f_th = $SUM_dorm_f - $SUM_dorm_f_for;

      //ไปกลับรวม
    $count_home = mysqli_query($con,"SELECT COUNT(*) FROM user_profiles WHERE is_dorm = '0'");
    $res5 = mysqli_fetch_array($count_home);
    $SUM_home = $res5[0];


    //ไปกลับชาย
    $count_home_m = mysqli_query($con,"SELECT COUNT(*) FROM user_profiles WHERE is_dorm = '0' and gender = 'M'");
    $res10 = mysqli_fetch_array($count_home_m);
    $SUM_home_m = $res10[0];

    //ไปกลับหญิง
    $count_home_f = mysqli_query($con,"SELECT COUNT(*) FROM user_profiles WHERE is_dorm = '0' and gender = 'F'");
    $res11 = mysqli_fetch_array($count_home_f);
    $SUM_home_f = $res11[0];

    
   
//LOOP SEC แยกชายหญิง
   for($i=1 ; $i<=5 ; $i++){
	//$count_sec[$i] = mysqli_query($con,"SELECT COUNT(*) FROM user_profiles WHERE sec = '$i'");
    	//$sec[$i] = mysqli_fetch_array($count_sec[$i]);
    	//$SUM_sec[$i] = $sec[$i][0];

   		for($j=1 ; $j<=2 ; $j++){
   			if($j == 1){
   				$gen = 'M';
   			}else if($j == 2){
   				$gen = 'F';
   			}	
	   			$count[$i][$j] = mysqli_query($con,"SELECT COUNT(*) FROM user_profiles WHERE sec = '$i' and gender = '$gen'");
	   			$sec_query[$i][$j] = mysqli_fetch_array($count[$i][$j]);
	   			$SUM_sec[$i][$j] = $sec_query[$i][$j][0];
   		}
   }


//ทดสอบการแสดงผล SEC
   for ($i=1; $i<=5 ; $i++) { 
   		for($j=1 ; $j<=2 ; $j++){
   			if($j == '1'){
   				$gen = 'M';
   			}else if($j == '2'){
   				$gen = 'F';
   			}	
   			echo $gen." SEC".$i." = ";
   			echo $SUM_sec[$i][$j];
   			echo "<br>";
   		}
   }



?>
<div class="row container-fluid">
	<div class="col-md-12">
<h3>ข้อมูลจากฐานข้อมูล</h3>
<table class="table table-bordered table-hover">
	<tr>
		<th>รายการ</th>
		<th>จำนวน</th>
		<th>หมายเหตุ</th>
	</tr>
	<tr>
		<td>จำนวนน้องทั้งหมด</td>
<!--		<td><?php echo $SUM_all?></td> -->
		<td>{{ $SUM_all }}</td>

		<td>DB</td>
	</tr>
	<tr>
		<td>จำนวนผู้ชาย</td>
	<!--	<td><?php echo $SUM_all_male?></td>  -->
		<td>{{ $SUM_all_male }}</td>

		<td>M</td>
	</tr>
	<tr>
		<td>จำนวนผู้หญิง</td>
	<!--	<td><?php echo $SUM_all_female?></td> -->
		<td>{{ $SUM_all_female }}</td>

		<td>F</td>
	</tr>
</table>

<h3>ข้อมูลการนอนหอ-ไปกลับ</h3>
<table class="table table-bordered table-hover">
	<tr>
		<th></th>
		<th>ชาย</th>
		<th>หญิง</th>
		<th>รวม</th>
	</tr>
	<tr>
		<th>นร.นอนหอ(ไทย)</th>

		<td>{{ $SUM_dorm_m_th }}</td>
		<td>{{ $SUM_dorm_f_th }}</td>
		<td>{{ $SUM_dorm_m_th+$SUM_dorm_f_th }}</td>
	</tr>
	<tr>
		<th>นร.นอนหอ(ต่างชาติ)</th>
		<td>{{ $SUM_dorm_m_for }}</td>
		<td>{{ $SUM_dorm_f_for }}</td>
		<td>{{ $SUM_dorm_m_for+$SUM_dorm_f_for }}</td>
	</tr>
	<tr>
		<th>นร.นอนหอ(รวม)</th>
		<td>{{ $SUM_dorm_m }}</td>
		<td>{{ $SUM_dorm_f }}</td>
		<td>{{ $SUM_dorm_m+$SUM_dorm_f }}</td>
	</tr>
	<tr>
		<th>นร.ไปกลับ</th>
		<td>{{ $SUM_home_m }}</td>
		<td>{{ $SUM_home_f }}</td>
		<td>{{ $SUM_home_m+$SUM_home_f }}</td>
	</tr>
	<tr>
		<th>รวมทั้งหมด</th>
		<td>{{ $SUM_dorm_m+$SUM_home_m }}</td>
		<td>{{ $SUM_dorm_f+$SUM_home_f }}</td>
		<td>{{ $SUM_dorm_m+$SUM_dorm_f+$SUM_home_m+$SUM_home_f }}</td>
	</tr>
</table>
<h3>ข้อมูลตาม SEC</h3>
</div>
</div>





@endsection
