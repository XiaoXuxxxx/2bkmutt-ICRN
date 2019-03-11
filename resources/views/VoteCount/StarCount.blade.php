@extends('layouts.app')

@section('title', 'Stacount Magic')

@section('content')
    @include('components.title', [
        "title" => "StarCount Magic"
    ])


<?php
    use App\User;
    use App\UserProfile;


?>



<head>
</head>

<?php
$servername = env('DB_HOST', 'localhost');
  $username   = env('DB_USERNAME', 'forge');
  $password   = env('DB_PASSWORD', 'forge');
  $dbname     = env('DB_DATABASE', 'forge');
$con = mysqli_connect($servername,$username,$password,$dbname);


if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
mysqli_set_charset($con,"utf8");

$SQL = "SELECT * FROM user_profiles WHERE image_filename != 'NULL' order by camp_id";
$query_data = mysqli_query($con,$SQL) or die ("Error Query [".$SQL."]");
$item = 1;
?>

<a class="btn btn-primary" href="{{ url('/VoteResult/StaffCount') }}">สิ่งศักดิ์สิทธิ์</a><hr>
<table border="0" width="100%" class="table table-bordered table-hover table-condensed table-responsive table-striped">
  <tr>
  	<th align="center">ITEM</th>
    <th > <div align="center">ID </div></th>
    <th > <div align="center">CAMPID</div></th>
     <th > <div align="center">NAME</div></th>
    <th > <div align="center">เดือน</div></th>   
    <th > <div align="center">ดาว</div></th>   
    <th > <div align="center">ดาวเทียม</div></th>   
  </tr>
<?php
while($getdata = mysqli_fetch_array($query_data))
{
?>
  <tr>
  	<td align="center"><?php echo $item; ?></td>
    <td><div align="center">ID#<?php echo $getdata["id"];?></div></td>
    <td><center><?php echo $getdata["camp_id"];?></td>
    <td><?php 
     $data_name = $getdata["first_name-th"];
     $data_name2 = $getdata["last_name-th"];
     if($data_name == "NULL" && $data_name2 == "NULL"){
     	echo $getdata["first_name-en"];
     	echo " "." ";
     	echo $getdata["last_name-en"];
     }else if($data_name != "NULL" && $data_name2 != "NULL"){
     	echo $getdata["first_name-th"];
     	echo " "." ";
     	echo $getdata["last_name-th"];
     }
     echo " [ ";
     echo $getdata["nickname-en"];;
     echo " ]";
     ?></td>
     <td align="center">
     	<?php
     		$id = $getdata['id'];
			$SQL2 = "SELECT * FROM star_votes";
			$query_data2 = mysqli_query($con,$SQL2) or die ("Error Query [".$SQL2."]");
			$count[$id] = 0;
			while($getdata2 = mysqli_fetch_array($query_data2))
			{
				if($id == $getdata2['vote_m_profile_id']){
					$count[$id] = $count[$id] + 1;
				}
			}
			if($count[$id] == '0'){
				echo "";
			}else{
				echo $count[$id];
			}
		?>

     </td>
     <td align="center">
     	<?php
     		$id = $getdata['id'];
			$SQL2 = "SELECT * FROM star_votes";
			$query_data2 = mysqli_query($con,$SQL2) or die ("Error Query [".$SQL2."]");
			$count[$id] = 0;
			while($getdata2 = mysqli_fetch_array($query_data2))
			{
				if($id == $getdata2['vote_f_profile_id']){
					$count[$id] = $count[$id] + 1;
				}
			}
			if($count[$id] == '0'){
				echo "";
			}else{
				echo $count[$id];
			}
		?>

     </td>
     <td align="center">
     	<?php
     		$id = $getdata['id'];
			$SQL2 = "SELECT * FROM star_votes";
			$query_data2 = mysqli_query($con,$SQL2) or die ("Error Query [".$SQL2."]");
			$count[$id] = 0;
			while($getdata2 = mysqli_fetch_array($query_data2))
			{
				if($id == $getdata2['vote_mf_profile_id']){
					$count[$id] = $count[$id] + 1;
				}
			}
			if($count[$id] == '0'){
				echo "";
			}else{
				echo $count[$id];
			}
		?>

     </td>
  </tr>
<?php
$item ++;
}
?>
</table>
@endsection
