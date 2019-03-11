@extends('layouts.app')
@section('title', '2B-KMUTT')

@section('content')
    @include('components.title', [
        "title" => "Freeday Registration",
        "desc" => "ลงทะเบียนวันกิจกรรม Freeday"
    ])
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
    use App\StaffProfile;
    $staff = StaffProfile::orderBy('id','asc')->get();

$servername = env('DB_HOST', 'localhost');
  $username   = env('DB_USERNAME', 'forge');
  $password   = env('DB_PASSWORD', 'forge');
  $dbname     = env('DB_DATABASE', 'forge');
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$pdo->exec("set names utf8");
$today = date("Y-m-d");


// echo $countUserD ." ". $countUserH;
?>
<?php
  if(isset($_POST['where'])){
    $updateInfo = "UPDATE `user_profiles` SET `checkWhere` = ?, `whenCome` = ?,`whenOut` = ? ,`whereOther` = ?,`staff` = ?, `where` = ? WHERE `id` = ?; ";
    $queryInfo = $pdo->prepare($updateInfo);
    $arrayValues = array($_POST['where'], $_POST['time'],$_POST['when'],$_POST['other'],$_POST['staff'], $_POST['travel'], $userid);
    $queryInfo->execute($arrayValues);
    ?>
    <script type="text/javascript">
      swal({
          title: "Success",
          text: "Saved Infomation",
          icon: "success",
          closeOnClickOutside: false,
          closeOnEsc: false,

        }).then(resp => {
          window.location.href = "/tools/freeday";
        })
    </script>
    <?php
    exit();
  }
?>
<style type="text/css">
  body{
//    font-family: cloud;
  }
  #title{
    font-size: 20px;
    font-family: cloud;
    background-color: #c58ec3;
    color: #fff;
  }
  #header{
    font-size: 17px;
    font-family: cloud;
    background-color: #f5d9f5;
  }
  #count{
    font-size: 17px;
    font-family: cloud;
  }
  .btn-pink{
    background-color: #c58ec3;
    color: #fff;
    font-size: 16px;
    font-family: cloud;
    transition: 0.2s;
  }
  .btn-pink:hover{
    background-color: #f4c6f4;
    color: #555;
    font-family: cloud;
  }
  .desc{
    font-family: cloud;
    font-size: 16px;
  }
</style>

<div class="row">
<?php
$SelectUser = "SELECT * FROM user_profiles WHERE id = ?";
$QueryUser = $pdo->prepare($SelectUser);
$Values = array($userid);
$QueryUser->execute($Values);
$FetchUser = $QueryUser->fetch(PDO::FETCH_ASSOC);
?>
<div class="col-sm-4">
  <img src="../../img/profile/<?php echo $FetchUser['image_filename']; ?>" style="width:100%;border-radius: 5px;">  
</div>
<div class="col-sm-8">
  <div class="panel panel-default">
    <div class="panel-heading" id="header"><i class="fa fa-fw fa-user"></i>&nbsp;ลงทะเบียนวัน Freeday</div>
    <div class="panel-body">
     <form name="myform" class="form-horizontal" action="" method="post">
      <div class="form-group" style="font-family: cloud;font-size: 16px;">
        <label class="control-label col-sm-2" for="fullname">ชื่อจริง :</label>
        <div class="col-sm-10">
	@if($FetchUser['first_name-th'] == 'NULL')
          <input type="text" class="form-control" id="fullname" placeholder="Enter fullname" disabled="" value="{{ $FetchUser['first_name-en'] }} {{ $FetchUser['last_name-en'] }} ({{ $FetchUser['nickname-en']}})">
	@else
	  <input type="text" class="form-control" id="fullname" placeholder="Enter fullname" disabled="" value="{{ $FetchUser['first_name-th'] }} {{ $FetchUser['last_name-th'] }} ({{ $FetchUser['nickname-en']}})">
	@endif
        </div>
      </div>
      <div class="form-group" style="font-family: cloud;font-size: 16px;">
        <label class="control-label col-sm-2" for="where">น้องจะเข้ามาที่ไหน :</label>
        <div class="col-sm-10">
          <select class="form-control" id="where" name="where">
<!--            <option value="1">บางมด</option> -->
            <option value="0">บางขุนเทียน</option>
          </select>
        </div>
      </div>
      <div class="form-group" style="font-family: cloud;font-size: 16px;">
        <label class="control-label col-sm-2" for="staff">น้องจะไปเที่ยวกับใคร :</label>
        <div class="col-sm-10">
          <!--<input name="staff" type="text" class="form-control" id="staff" placeholder="กรอกชื่อพี่สตาฟ เช่น พี่นิว""> -->
		<select class="form-control" id="staff" name="staff">
	  <!--  <option selected>โปรดเลือก พี่สต๊าฟ 1 คนที่ต้องการจะไปด้วย | Choose 1 of the choice</option>-->
<option value="PAof">Aof</option>           
 @foreach($staff as $u)
            <option value="P{{ $u["nickname_en"] }}"> P{{ $u["nickname_en"] }} 
            </option>
            @endforeach
	    <option value="PTonkla">PTonkla | Senior </option>
        </select>

        </div>
      </div>
      <div class="form-group" style="font-family: cloud;font-size: 16px;">
        <label class="control-label col-sm-2" for="travel">สถานที่เที่ยว :</label>
        <div class="col-sm-10">
          <select class="form-control" id="travel" name="travel">
	   <option value="BKT">BKT</option>
            <option value="CEN2">เซนทรัลพระราม 2</option>
            <option value="CEN3">เซนทรัลพระราม 3</option>
            <option value="SIAM">Siam Center</option>
            <option value="BANMOR">บ้านหม้อ</option>
            <option value="WATPRAKAEW">วัดพระแก้ว</option>
            <option value="BOOKFAIR">งานหนังสือ</option>
            <option value="OTHER">อื่นๆ</option>
          </select>
        </div>
      </div>
      <div class="form-group" style="font-family: cloud;font-size: 16px;">
        <label class="control-label col-sm-2" for="other">สำหรับคนเลือก OTHER :</label>
        <div class="col-sm-10">
          <input name="other" autofocus type="text" class="form-control" id="other" placeholder="โปรดระบุให้ละเอียด">
        </div>
      </div>
	<div class="form-group" style="font-family: cloud;font-size: 16px;">
        <label class="control-label col-sm-2" for="when">น้องจะออกจากบางขุนมากี่โมง :</label>
        <div class="col-sm-10">
          <input name="when" type="text" class="form-control" id="when" value="07.00" placeholder="กรอกเวลาที่จะออกจากบางขุน เช่น 11.00">
        </div>
      </div>


      <div class="form-group" style="font-family: cloud;font-size: 16px;">
        <label class="control-label col-sm-2" for="time">น้องจะกลับมาประมาณกี่โมง :</label>
        <div class="col-sm-10">
          <input name="time" type="text" class="form-control" id="time" value="17.00" placeholder="กรอกเวลาที่จะเข้ามา เช่น 11.00">
        </div>
      </div>

      <hr>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <button class="btn btn-block btn-pink" type="submit"><i class="fa fa-fw fa-check"></i>&nbsp;ยืนยัน</button>

      </form> 
    </div>
  </div>
</form>
</div>

</div>



@endsection
