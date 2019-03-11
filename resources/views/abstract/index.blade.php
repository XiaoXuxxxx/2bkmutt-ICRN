@extends('layouts.app')
@section('title', 'Database Abstract 2BKMUTT')

@section('content')
    @include('components.title', [
        "title" => "ICRN Database Abstract 2BKMUTT Camp",
        "desc" => " Created by AOMCPE32 | 2B-KMUTT"
    ])

<!DOCTYPE html>
<html>
<head>
	<title>ICRN-database</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	.aomcss{
	background-color : #fff;
	}
	</style>
</head>
<body>
<form action="" method="post">

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
<div class="well">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="label label-info">Select LAB:</div>
  <!-- <input type="radio" value="1" name="inter"> ค้นหาต่างชาติ</input>     -->
<select name="sort_type" class="form-control">
    <option value = "order by dept_id ASC">Please Select LAB</option>
    <?php

    $mute = "department_full-th";
    $queryusers = "SELECT * FROM departments ";
    $db = mysqli_query($con,$queryusers);
    while ( $d=mysqli_fetch_assoc($db)) {
         $num = $d['camp_dept_id'];
$cod = "'";
      echo "<option value='".number_format($num)."'>".$num." ".$d['department_abbr']." [".$d['department_full_th']."]</option>";
    }
    ?>
      </select> <br>
	<input type="submit" class="btn btn-primary btn-block" value="Search">
</form></div>
<hr>

   <?php
//error_reporting(0);
   $whe = "WHERE dept_id = '";
   $cod = "'";
  // echo "$whe";

 $sort ="";
//if(isset($_POST['room'])){
//	$dorm =  $_POST['room'];
//	$info = "Sort By Command<b> $dorm</b>";
//	$sort = $_POST['room'];
/*}else*/ if(isset($_POST['sort_type'])){
 	$sort = $whe.$_POST['sort_type'].$cod;
 //	echo "DATA SORT by => $sort";
}else if(!isset($_POST['sort_type'])){
 	$sort = "dept_id";
}
//echo $info;

//include 'config.php';
//$sort = $_POST['sort_type'];
   $countx = 0;
$info = "";
for($o=1;$o<=160;$o++){$a[$o] = "";}
$item = "1";
$arrayCount = 1;
$SQL = "SELECT * FROM user_profiles $sort ";
$query_data = mysqli_query($con,$SQL) or die ("Error Query [".$SQL."]");
$item = 1;
?>


<table class="table table-hover table-reponsive table-bordered aomcss">
  <tr bgcolor="#fff">
    <th width="10" bgcolor="#fff" align="center">ที่</th>
   
    <th > <div align="center">Name</div></th>   
	<th>Nickname</th>
      <th>LAB</th>
    <th>ID_DB</th>
    <th>Project Name</th>
    <th>Adviser Name</th>
    <th>File</th>

  </tr>
<?php
while($getdata = mysqli_fetch_array($query_data))
{
?>
  <tr>
    <td align="center"><?php echo $item; ?></td>
    
      <td><?php 
     $data_name = $getdata["first_name-th"];
     $data_name2 = $getdata["last_name-th"];
     if($data_name == "NULL" && $data_name2 == "NULL"){
	 $show = $getdata['title'].$getdata['first_name-en']." "." ".$getdata['last_name-en'];
//      echo $getdata["title"];
      echo $getdata["first_name-en"];
      echo " "." ";
      echo $getdata["last_name-en"];
     }else if($data_name != "NULL" && $data_name2 != "NULL"){
      $show = $getdata['title'].$getdata['first_name-th']." "." ".$getdata['last_name-th'];
	 echo $getdata["title"];
      echo $getdata["first_name-th"];
      echo " "." ";
      echo $getdata["last_name-th"];
     }
     ?></td>
<td>{{$getdata['nickname-th']}}</td>
     <td>
       <?php 
$profile = $getdata['id'];
$dept = $getdata['dept_id']; 
$datarun = substr_replace("00",$dept,2-strlen($dept));
       if(!isset($_POST['sort_type'])){
      $sqlt="SELECT * FROM departments WHERE camp_dept_id = '$datarun' ";
      $dbquery=mysqli_query($con,$sqlt); 
      $resultst=mysqli_fetch_array($dbquery);
      $name_de =$resultst ['department_full_th'];
      echo $name_de;
       }else {
       
      // echo "$profile";
	$dataa = $_POST['sort_type'];
      $sqlt="SELECT * FROM departments WHERE camp_dept_id = '$dataa' ";
      $dbquery=mysqli_query($con,$sqlt); 
      $resultst=mysqli_fetch_array($dbquery);
      $name_de =$resultst ['department_full_th'];
      echo $name_de;
}
       ?>
     </td>
  
     <td>
       <?php 
       $profile = $getdata['id'];
      // echo "$profile";
       $sqlt="SELECT * FROM user_projects WHERE profile_id = '$profile' ";
      $dbquery=mysqli_query($con,$sqlt); 
      $resultst=mysqli_fetch_array($dbquery);
      $idproject =$resultst ['id'];
    
      echo $idproject;

	if($idproject == ""){
		$a[$arrayCount] = $show." [".$name_de."] ";

	//	echo $nowork[$arrayCount];
	//	echo $arrayCount;
		$arrayCount++;
	}
       ?>
     </td>
     <td>
       <?php 
       $profile = $getdata['id'];
      // echo "$profile";
       $sqlt="SELECT * FROM user_projects WHERE profile_id = '$profile' ";
      $dbquery=mysqli_query($con,$sqlt); 
      $resultst=mysqli_fetch_array($dbquery);
      $proth =$resultst ['project_th'];
      $proen =$resultst ['project_en'];
      echo "-<b> ";
      echo $proth;
      echo "</b><br>";
      echo $proen;

       ?>
     </td>
    <td>
       <?php 
       $profile = $getdata['id'];
      // echo "$profile";
       $sqlt="SELECT * FROM user_projects WHERE profile_id = '$profile' ";
      $dbquery=mysqli_query($con,$sqlt); 
      $resultst=mysqli_fetch_array($dbquery);
      $profth =$resultst ['professor_th'];
      $profen =$resultst ['professor_en'];
      echo "-<b> ";
      echo $profth;
      echo "</b><br>";
      echo $profen;

       ?>
     </td>
     <td> 
       <?php 

       $profile = $getdata['id'];
      // echo "$profile";
       $sqlt="SELECT * FROM user_projects WHERE profile_id = '$profile' ";
      $dbquery=mysqli_query($con,$sqlt); 
      $resultst=mysqli_fetch_array($dbquery);
      $pdf =$resultst ['pdf_filename'];
      if($pdf != ""){
        $countx ++;
      }
      echo "<a href='http://docs.google.com/gview?url=https://2bkmutt.com/download/pdf/$pdf' target='_blank'>";
        echo "<button class='btn btn-sm btn-success'>View</button>"; 
	echo "</a>";

       ?>
     </td>    
</tr>
   
<?php
$item ++;
}
?>
<b><h3></b><?php echo $info;?> ส่งแล้ว <?php echo $countx;?> คน</h3>
</table>
<hr>
<h3>คนที่ยังไม่ส่ง</h3>
<?php
//echo $arrayCount;
	$arrayCount -=1 ;
        for($i=1;$i<=$arrayCount;$i++){
                echo $i.". ";
		echo $a[$i];
		echo "<br>";

        }
?>

</body>
</html>
@endsection
