@extends('layouts.app')

@section('title', 'StarVote MagicCount')

@section('content')
    @include('components.title', [
        "title" => "StaffVote Count Result"
    ])

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

$SQL = "SELECT * FROM staff_profiles order by id ";
$query_data = mysqli_query($con,$SQL) or die ("Error Query [".$SQL."]");
$item = 1;
?>

<a href="{{ url('/VoteResult/StarCount') }}"><button class="btn btn-primary">ดาว | เดือน | ดาวเทียม</button></a><hr>

<table border="0" width="50%" class="table table-hover table-condensed table-bordered table-responsive table-striped">
  <tr>
  	<th align="center"><center>ITEM</th>
    <th > <div align="center">ID </div></th>
    <th > <div align="center">Name</div></th>
    <th > <div align="center">สิ่งศักดิ์สิทธิ์</div></th>   
  </tr>
<?php
while($getdata = mysqli_fetch_array($query_data))
{
?>
  <tr>
  	<td align="center"><?php echo $item; ?></td>
    <td><div align="center">ID#<?php echo $getdata["id"];?></div></td>
    <td>
<?php echo $getdata["title"];?>
<?php echo $getdata["first_name_th"]." ".$getdata["last_name_th"];?>

[ <?php echo "P'".$getdata["nickname_th"];?> ]</td>
    
     <td align="center">
     	<?php
     		$id = $getdata['id'];
			$SQL2 = "SELECT * FROM star_votes";
			$query_data2 = mysqli_query($con,$SQL2) or die ("Error Query [".$SQL2."]");
			$count[$id] = 0;
			while($getdata2 = mysqli_fetch_array($query_data2))
			{
				if($id == $getdata2['vote_s_profile_id']){
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
<?php
$item ++;
}
?>
</table>
@endsection
