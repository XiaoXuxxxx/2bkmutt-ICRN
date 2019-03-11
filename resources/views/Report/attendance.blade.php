@extends('layouts.app')
@section('title', 'Attendance_logs')

@section('content')
    @include('components.title', [
        "title" => "Attendance Checking Report",
        "desc" => "จำนวนน้องเช็คชื่อขณะนี้"
    ])
<?php
$servername = env('DB_HOST', 'localhost');
  $username   = env('DB_USERNAME', 'forge');
  $password   = env('DB_PASSWORD', 'forge');
  $dbname     = env('DB_DATABASE', 'forge');
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$pdo->exec("set names utf8");
$today = date("Y-m-d");

$SelectUserD = $pdo->prepare("SELECT * FROM user_profiles WHERE is_dorm = 1");
$SelectUserD->execute();
$countUserD = $SelectUserD->rowCount();
$SelectUserH = $pdo->prepare("SELECT * FROM user_profiles WHERE is_dorm = 0");
$SelectUserH->execute();
$countUserH = $SelectUserH->rowCount();


// echo $countUserD ." ". $countUserH;
?>
<style type="text/css">
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
    font-size: 18px;
    font-family: cloud;
    transition: 0.2s;
  }
  .btn-pink:hover{
    background-color: #f4c6f4;
    color: #000;
    font-size: 18px;
    font-family: cloud;
  }
  .desc{
    font-family: cloud;
    font-size: 16px;
  }
</style>
<div class="row">
<form action="" method="post">
<div class="panel panel-default">
  <div class="panel-heading" id="title">
    <i class="fa fa-fw fa-search"></i>&nbsp;วันที่ต้องการค้นหา
  </div>
  <div class="panel-body">
    <select class="form-control" name="dateSelect">
      <?php
      if(isset($_POST['dateSelect'])){
        ?>
        <option><?php echo $_POST['dateSelect'];?></option>
        <?php
      }else{
        ?>
        <option><?php echo $today;?></option>
        <?php
      }
      ?>
      
      <option>2018-03-19</option>
      <option>2018-03-20</option>
      <option>2018-03-21</option>
      <option>2018-03-22</option>
      <option>2018-03-23</option>
      <option>2018-03-24</option>
      <option>2018-03-25</option>
      <option>2018-03-26</option>
      <option>2018-03-27</option>
      <option>2018-03-28</option>
      <option>2018-03-29</option>
      <option>2018-03-30</option>
      <option>2018-03-31</option>
      <option>2018-04-01</option>
      <option>2018-04-02</option>
      <option>2018-04-03</option>
      <option>2018-04-04</option>
      <option>2018-04-05</option>
      <option>2018-04-06</option>
      <option>2018-04-07</option>
      <option>2018-04-08</option>
      <option>2018-04-09</option>
      <option>2018-04-10</option>

    </select>
  </div>
  <div class="panel-footer">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" name="searchSubmit" class="btn btn-block btn-pink" value="ค้นหา">
  </div>
</div>
</form>
<?php
  if(isset($_POST['searchSubmit'])){
    ?>
<div class="panel panel-default">
  <div class="panel-heading" id="title">
    <i class="fa fa-fw fa-caret-right"></i>&nbsp;เช็คชื่อน้องตอนเช้า <?php echo $_POST['dateSelect']; ?>
  </div>
  <div class="panel-body">
<div class="row">
  <div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-users"></i>&nbsp;จำนวนยอดน้องที่เช็คแล้ว</div>
      <div class="panel-body">
        <?php
          $Select2B = $pdo->prepare("SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ?");
          $sessionDate = array($_POST['dateSelect'], "M");
          $Select2B->execute($sessionDate);
          $countAll = $Select2B->rowCount();
        ?>
        <span id="count"><?php echo $countAll.' คน'; ?></span>
      </div>
    </div>    
  </div>
  <div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-bed"></i>&nbsp;น้องนอนหอ</div>
      <div class="panel-body">
        <?php
          $Select2B = $pdo->prepare("SELECT * FROM attendance_logs,user_profiles WHERE attendance_logs.camp_id = user_profiles.camp_id AND user_profiles.is_dorm = 1 AND attendance_logs.session_date = ? AND attendance_logs.session_key = ?");
          $sessionDate = array($_POST['dateSelect'], "M");
          $Select2B->execute($sessionDate);
          $countAll = $Select2B->rowCount();
        ?>
        <span id="count"><?php echo $countAll.' คน'; ?></span>
      </div>
    </div>    
  </div>
  <div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-truck"></i>&nbsp;น้องไปกลับ</div>
      <div class="panel-body">
        <?php
	  $Select2B = $pdo->prepare("SELECT * FROM attendance_logs,user_profiles WHERE attendance_logs.camp_id = user_profiles.camp_id AND user_profiles.is_dorm = 0 AND attendance_logs.session_date = ? AND attendance_logs.session_key = ?");
          $sessionDate = array($_POST['dateSelect'], "M");
          $Select2B->execute($sessionDate);
          $countAll = $Select2B->rowCount();
        ?>
        <span id="count"><?php echo $countAll.' คน'; ?></span>
      </div>
    </div>    
  </div>
  <div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-clock-o"></i>&nbsp;จำนวนน้องที่ไม่เช็คชื่อ</div>
      <div class="panel-body">
        <?php
          $SelectUser = $pdo->prepare("SELECT * FROM user_profiles");
          $SelectUser->execute();
          $countUser = $SelectUser->rowCount();
          $Select2B = $pdo->prepare("SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ?");
          $sessionDate = array($_POST['dateSelect'], "M");
          $Select2B->execute($sessionDate);
          $countAll = $Select2B->rowCount();

          $Select2BLate = $pdo->prepare("SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ?");
          $sessionDateLate = array($_POST['dateSelect'], "L");
          $Select2BLate->execute($sessionDateLate);
          $countAllLate = $Select2BLate->rowCount();


          $remain = $countUser-($countAll+$countAllLate);
        ?>
        <span id="count"><?php echo $remain.' คน'; ?></span>
      </div>
    </div>    
  </div>
<div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-users"></i>&nbsp;เช็คชื่อเลท</div>
      <div class="panel-body">
        <?php
	  $Select2B = $pdo->prepare("SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ?");
          $sessionDate = array($_POST['dateSelect'], "L");
          $Select2B->execute($sessionDate);
          $countAll2 = $Select2B->rowCount();
        ?>
        <span id="count"><?php echo $countAll2.' คน'; ?></span>
      </div>
    </div>
  </div>

<div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-clock-o"></i>&nbsp;ผลรวมหลังจากนับเช็คเลท</div>
      <div class="panel-body">
        <span id="count"><?php echo ($countAll + $countAll2).' คน'; ?></span>
      </div>
    </div>
  </div>



</div>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading" id="title">
    <i class="fa fa-fw fa-caret-right"></i>&nbsp;เช็คชื่อน้องตอนเย็น <?php echo $_POST['dateSelect']; ?>
  </div>
  <div class="panel-body">
<div class="row">
  <div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-users"></i>&nbsp;จำนวนยอดน้องที่เช็คแล้ว</div>
      <div class="panel-body">
        <?php
          $Select2B = $pdo->prepare("SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ?");
          $sessionDate = array($_POST['dateSelect'], "E");
          $Select2B->execute($sessionDate);
          $countAll = $Select2B->rowCount();
        ?>
        <span id="count"><?php echo $countAll.' คน'; ?></span>
      </div>
    </div>    
  </div>
  <div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-bed"></i>&nbsp;น้องนอนหอ</div>
      <div class="panel-body">
        <?php
$Select2B = $pdo->prepare("SELECT * FROM attendance_logs,user_profiles WHERE attendance_logs.camp_id = user_profiles.camp_id AND user_profiles.is_dorm = 1 AND attendance_logs.session_date = ? AND attendance_logs.session_key = ?");
          $sessionDate = array($_POST['dateSelect'], "E");
          $Select2B->execute($sessionDate);
          $countAll = $Select2B->rowCount();
        ?>
        <span id="count"><?php echo $countAll.' คน'; ?></span>
      </div>
    </div>    
  </div>
  <div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-truck"></i>&nbsp;น้องไปกลับ</div>
      <div class="panel-body">
        <?php
	  $Select2B = $pdo->prepare("SELECT * FROM attendance_logs,user_profiles WHERE attendance_logs.camp_id = user_profiles.camp_id AND user_profiles.is_dorm = 0 AND attendance_logs.session_date = ? AND attendance_logs.session_key = ?");
          $sessionDate = array($_POST['dateSelect'], "E");
          $Select2B->execute($sessionDate);
          $countAll = $Select2B->rowCount();
        ?>
        <span id="count"><?php echo $countAll.' คน'; ?></span>
      </div>
    </div>    
  </div>
  <div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-clock-o"></i>&nbsp;จำนวนน้องที่ไม่เช็คชื่อ</div>
      <div class="panel-body">
        <?php
          $SelectUser = $pdo->prepare("SELECT * FROM user_profiles");
          $SelectUser->execute();
          $countUser = $SelectUser->rowCount();
          $Select2B = $pdo->prepare("SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ?");
          $sessionDate = array($_POST['dateSelect'], "M");
          $Select2B->execute($sessionDate);
          $countAll = $Select2B->rowCount();

          $Select2BLate = $pdo->prepare("SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ?");
          $sessionDateLate = array($_POST['dateSelect'], "L");
          $Select2BLate->execute($sessionDateLate);
          $countAllLate = $Select2BLate->rowCount();


          $remain = $countUser-($countAll+$countAllLate);
        ?>
        <span id="count"><?php echo $remain.' คน'; ?></span>
      </div>
    </div>    
  </div>
</div>
</div>
</div>
<div class="panel panel-default">
  <div class="panel-heading" id="title">
    <i class="fa fa-fw fa-caret-right"></i>&nbsp;เช็คชื่อน้องตอนกลางคืน <?php echo $_POST['dateSelect']; ?>
  </div>
  <div class="panel-body">
<div class="row">
  <div class="col-sm-4">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-users"></i>&nbsp;จำนวนน้องนอนหอทั้งหมด</div>
      <div class="panel-body">
        <?php
          $SelectUser = $pdo->prepare("SELECT * FROM user_profiles WHERE is_dorm = ?");
          $Dorm = array(1);
          $SelectUser->execute($Dorm);
          $countUser = $SelectUser->rowCount();
        ?>
        <span id="count"><?php echo $countUser.' คน'; ?></span>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-bed"></i>&nbsp;น้องที่เช็คชื่อแล้ว</div>
      <div class="panel-body">
	<?php
   $Select2B = $pdo->prepare("SELECT * FROM attendance_logs,user_profiles WHERE attendance_logs.camp_id = user_profiles.camp_id AND user_profiles.is_dorm = 1 AND attendance_logs.session_date = ? AND attendance_logs.session_key = ?");
          $sessionDate = array($_POST['dateSelect'], "N");
          $Select2B->execute($sessionDate);
          $countAll = $Select2B->rowCount();
        ?>
        <span id="count"><?php echo $countAll.' คน'; ?></span>
      </div>
    </div>    
  </div>
  <div class="col-sm-4">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-times"></i>&nbsp;จำนวนน้องที่ไม่เช็คชื่อ</div>
      <div class="panel-body">
        <?php
          /*$SelectUser = $pdo->prepare("SELECT * FROM user_profiles WHERE is_dorm = ?");
          $Dorm = array(1);
          $SelectUser->execute($Dorm);*/
          $countUser = $SelectUser->rowCount();
	  /*$Select2B = $pdo->prepare("SELECT * FROM attendance_logs,user_profiles WHERE attendance_logs.camp_id = user_profiles.camp_id AND user_profiles.is_dorm = '1' AND attendance_logs.session_date = ? AND attendance_logs.session_key = ?");
          $sessionDate = array($_POST['dateSelect'], "N");
          $Select2B->execute($sessionDate);
          $countAll = $Select2B->rowCount(); */
          $remain = $countUser-$countAll;
        ?>
        <span id="count"><?php echo $remain.' คน'; ?></span>
      </div>
    </div>    
  </div>
</div>
<div class="row">
<div class="col-sm-4">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-users"></i>&nbsp;จำนวนน้องไปกลับทั้งหมด</div>
      <div class="panel-body">
        <?php
          $SelectUser = $pdo->prepare("SELECT * FROM user_profiles WHERE is_dorm = ?");
          $Dorm = array(0);
          $SelectUser->execute($Dorm);
          $countUser = $SelectUser->rowCount();
        ?>
        <span id="count"><?php echo $countUser.' คน'; ?></span>
      </div>
    </div>
  </div>
<div class="col-sm-4">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-bed"></i>&nbsp;จำนวนน้องไปกลับทั้งหมดที่เช็คชื่อเข้านอนแล้ว</div>
      <div class="panel-body">
        <?php
	  $Select2B = $pdo->prepare("SELECT * FROM attendance_logs,user_profiles WHERE attendance_logs.camp_id = user_profiles.camp_id AND user_profiles.is_dorm = ? AND attendance_logs.session_date = ? AND attendance_logs.session_key = ?");
          $sessionDate2 = array(0,$_POST['dateSelect'], "N");
	  $Select2B->execute($sessionDate2);
          $countAll = $Select2B->rowCount();
        ?>
        <span id="count"><?php echo $countAll.' คน'; ?></span>
      </div>
    </div>
  </div>
<div class="col-sm-4">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-times""></i>&nbsp;จำนวนน้องไปกลับที่ยังไม่ได้เช็คชื่อเข้านอน</div>
      <div class="panel-body">
        <?php
	$Select2B = $pdo->prepare("SELECT * FROM attendance_logs,user_profiles WHERE attendance_logs.camp_id = user_profiles.camp_id AND user_profiles.is_dorm = ? AND attendance_logs.session_date = ? AND attendance_logs.session_key = ?");
          $sessionDate2 = array(0,$_POST['dateSelect'], "N");
          $Select2B->execute($sessionDate2);
          $countAll = $Select2B->rowCount();
        ?>
        <span id="count"><?php echo $countUser-$countAll.' คน'; ?></span>

      </div>
    </div>
  </div>
</div>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading" id="title"><i class="fa fa-fw fa-file-text"></i>&nbsp;ยอดน้องเช็คชื่อแต่ละห้อง</div>
  <div class="panel-body">
    <div class="row">
      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง 2502</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array(2502);
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
              $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
		$i = 0;
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $sessionDate = array($_POST['dateSelect'], "N", $FetchRoom['camp_id']);
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $QueryCheck->execute($sessionDate);
                $SelectCount = "SELECT COUNT(*) FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCount = $pdo->prepare($SelectCheck);
                $QueryCount->execute($sessionDate);
                $FetchCount = $QueryCount->fetchColumn();
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i=$i+1;?></div>
                  <?php
                }
                ?>
                <?php
              }
             // echo $FetchCount;
            ?>
  <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
  <?php 
    if($i == $countRoom){ 
      echo "ไม่มี"; 
    }else{
      echo $countRoom-$i.' คน';
    }  
    $i = 0; ?>
  </div>
          
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง 2503</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array(2503);
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
              $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($_POST['dateSelect'], "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i=$i+1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
  <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
  <?php 
    if($i == $countRoom){ 
      echo "ไม่มี"; 
    }else{
      echo $countRoom-$i.' คน';
    }  
    $i = 0; ?>
  </div>
          

          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง 2508</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array(2508);
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
              $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($_POST['dateSelect'], "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i =$i+1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
    		  <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
          <?php 
            if($i == $countRoom){ 
              echo "ไม่มี"; 
            }else{
              echo $countRoom-$i.' คน';
            }  
            $i = 0; ?>
          </div>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง 2522</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array(2522);
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
             $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($_POST['dateSelect'], "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i = $i +1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
        	<div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
          <?php 
            if($i == $countRoom){ 
              echo "ไม่มี"; 
            }else{
              echo $countRoom-$i.' คน';
            }  
            $i = 0; ?>
          </div>
                

          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง 2523</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array(2523);
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
              $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($_POST['dateSelect'], "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i=$i+1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
  <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
  <?php 
    if($i == $countRoom){ 
      echo "ไม่มี"; 
    }else{
      echo $countRoom-$i.' คน';
    }  
    $i = 0; ?>
  </div>
          

          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง 2524</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array(2524);
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
             $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($_POST['dateSelect'], "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i = $i + 1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
          <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
          <?php 
            if($i == $countRoom){ 
              echo "ไม่มี"; 
            }else{
              echo $countRoom-$i.' คน';
            }  
            $i = 0; ?>
          </div>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง 2526</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array(2526);
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
              $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($_POST['dateSelect'], "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i=$i+1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
          <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
          <?php 
            if($i == $countRoom){ 
              echo "ไม่มี"; 
            }else{
              echo $countRoom-$i.' คน';
            }  
            $i = 0; ?>
          </div>
                  

          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง 2527</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array(2527);
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
              $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($_POST['dateSelect'], "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i = $i+1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
          <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
          <?php 
            if($i == $countRoom){ 
              echo "ไม่มี"; 
            }else{
              echo $countRoom-$i.' คน';
            }  
            $i = 0; ?>
          </div>
        
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง 2531</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array(2531);
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
             $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($_POST['dateSelect'], "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i=$i+1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
          <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
          <?php 
            if($i == $countRoom){ 
              echo "ไม่มี"; 
            }else{
              echo $countRoom-$i.' คน';
            }  
            $i = 0; ?>
          </div>
                  

          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง 2532</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array(2532);
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
              $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($_POST['dateSelect'], "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i=$i+1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
          <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
          <?php 
            if($i == $countRoom){ 
              echo "ไม่มี"; 
            }else{
              echo $countRoom-$i.' คน';
            }  
            $i = 0; ?>
          </div>
                  

          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง 2533</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array(2533);
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
              $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($_POST['dateSelect'], "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i=$i+1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
          <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
          <?php 
            if($i == $countRoom){ 
              echo "ไม่มี"; 
            }else{
              echo $countRoom-$i.' คน';
            }  
            $i = 0; ?>
          </div>
                  

          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง 2534</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array(2534);
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
              $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($_POST['dateSelect'], "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i=$i+1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
          <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
          <?php 
            if($i == $countRoom){ 
              echo "ไม่มี"; 
            }else{
              echo $countRoom-$i.' คน';
            }  
            $i = 0; ?>
          </div>
          

          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง 2535</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array(2535);
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
              $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($_POST['dateSelect'], "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i=$i+1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
          <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
          <?php 
            if($i == $countRoom){ 
              echo "ไม่มี"; 
            }else{
              echo $countRoom-$i.' คน';
            }  
            $i = 0; ?>
          </div>
          

          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง 2536</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array(2536);
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
              $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($_POST['dateSelect'], "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i=$i+1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
          <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
          <?php 
            if($i == $countRoom){ 
              echo "ไม่มี"; 
            }else{
              echo $countRoom-$i.' คน';
            }  
            $i = 0; ?>
          </div>
          

          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง Fitness</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array('fitness');
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
              $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($_POST['dateSelect'], "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i=$i+1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
          <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
          <?php 
            if($i == $countRoom){ 
              echo "ไม่มี"; 
            }else{
              echo $countRoom-$i.' คน';
            }  
            $i = 0; ?>
          </div>
          

          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง learning</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array('learning');
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
              $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($_POST['dateSelect'], "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i=$i+1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
          <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
          <?php 
            if($i == $countRoom){ 
              echo "ไม่มี"; 
            }else{
              echo $countRoom-$i.' คน';
            }  
            $i = 0; ?>
          </div>
          

          </div>
        </div>
      </div>

    </div>
  </div>
</div>
    <?php
  }else{
    ?>


<div class="panel panel-default">
  <div class="panel-heading" id="title">
    <i class="fa fa-fw fa-caret-right"></i>&nbsp;เช็คชื่อน้องตอนเช้า <?php echo $today; ?>
  </div>
  <div class="panel-body">
<div class="row">
<div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-users"></i>&nbsp;จำนวนยอดน้องที่เช็คแล้ว</div>
      <div class="panel-body">
        <?php
          $Select2B = $pdo->prepare("SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ?");
          $sessionDate = array($today, "M");
          $Select2B->execute($sessionDate);
          $countAll = $Select2B->rowCount();
        ?>
        <span id="count"><?php echo $countAll.' คน'; ?></span>
      </div>
    </div>    
  </div>	
<div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-bed"></i>&nbsp;น้องนอนหอ</div>
      <div class="panel-body">
        <?php
          $Select2B = $pdo->prepare("SELECT * FROM attendance_logs,user_profiles WHERE attendance_logs.camp_id = user_profiles.camp_id AND user_profiles.is_dorm = 1 AND attendance_logs.session_date = ? AND attendance_logs.session_key = ?");
          $sessionDate = array($today, "M");
          $Select2B->execute($sessionDate);
          $countAll = $Select2B->rowCount();
        ?>
        <span id="count"><?php echo $countAll.' คน'; ?></span>
      </div>
    </div>    
  </div>
  <div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-truck"></i>&nbsp;น้องไปกลับ</div>
      <div class="panel-body">
        <?php
	  $Select2B = $pdo->prepare("SELECT * FROM attendance_logs,user_profiles WHERE attendance_logs.camp_id = user_profiles.camp_id AND user_profiles.is_dorm = 0 AND attendance_logs.session_date = ? AND attendance_logs.session_key = ?");
          $sessionDate = array($today, "M");
          $Select2B->execute($sessionDate);
          $countAll = $Select2B->rowCount();
        ?>
        <span id="count"><?php echo $countAll.' คน'; ?></span>
      </div>
    </div>    
  </div>
  <div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-clock-o"></i>&nbsp;จำนวนน้องที่ไม่เช็คชื่อ</div>
      <div class="panel-body">
        <?php
          $SelectUser = $pdo->prepare("SELECT * FROM user_profiles");
          $SelectUser->execute();
          $countUser = $SelectUser->rowCount();
          $Select2B = $pdo->prepare("SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ?");
          $sessionDate = array($today, "M");
          $Select2B->execute($sessionDate);
          $countAll = $Select2B->rowCount();

          $Select2BLate = $pdo->prepare("SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ?");
          $sessionDateLate = array($today, "L");
          $Select2BLate->execute($sessionDateLate);
          $countAllLate = $Select2BLate->rowCount();
          $remain = $countUser-($countAll+$countAllLate);
        ?>
        <span id="count"><?php echo $remain.' คน'; ?></span>
      </div>
    </div>    
  </div>
<div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-users"></i>&nbsp;เช็คชื่อเลท</div>
      <div class="panel-body">
        <?php
	  $Select2B = $pdo->prepare("SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ?");
          $sessionDate = array($today, "L");
          $Select2B->execute($sessionDate);
          $countAll2 = $Select2B->rowCount();
        ?>
        <span id="count"><?php echo $countAll2.' คน'; ?></span>
      </div>
    </div>
  </div>

<div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-clock-o"></i>&nbsp;ผลรวมหลังจากนับเช็คเลท</div>
      <div class="panel-body">
        <span id="count"><?php echo ($countAll + $countAll2).' คน'; ?></span>
      </div>
    </div>
  </div>



</div>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading" id="title">
    <i class="fa fa-fw fa-caret-right"></i>&nbsp;เช็คชื่อน้องตอนเย็น <?php echo $today ?>
  </div>
  <div class="panel-body">
<div class="row">
  <div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-users"></i>&nbsp;จำนวนยอดน้องที่เช็คแล้ว</div>
      <div class="panel-body">
        <?php
          $Select2B = $pdo->prepare("SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ?");
          $sessionDate = array($today, "E");
          $Select2B->execute($sessionDate);
          $countAll = $Select2B->rowCount();
        ?>
        <span id="count"><?php echo $countAll.' คน'; ?></span>
      </div>
    </div>    
  </div>
  <div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-bed"></i>&nbsp;น้องนอนหอ</div>
      <div class="panel-body">
        <?php
$Select2B = $pdo->prepare("SELECT * FROM attendance_logs,user_profiles WHERE attendance_logs.camp_id = user_profiles.camp_id AND user_profiles.is_dorm = 1 AND attendance_logs.session_date = ? AND attendance_logs.session_key = ?");
          $sessionDate = array($today, "E");
          $Select2B->execute($sessionDate);
          $countAll = $Select2B->rowCount();
        ?>
        <span id="count"><?php echo $countAll.' คน'; ?></span>
      </div>
    </div>    
  </div>
  <div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-truck"></i>&nbsp;น้องไปกลับ</div>
      <div class="panel-body">
        <?php
	  $Select2B = $pdo->prepare("SELECT * FROM attendance_logs,user_profiles WHERE attendance_logs.camp_id = user_profiles.camp_id AND user_profiles.is_dorm = 0 AND attendance_logs.session_date = ? AND attendance_logs.session_key = ?");
          $sessionDate = array($today, "E");
          $Select2B->execute($sessionDate);
          $countAll = $Select2B->rowCount();
        ?>
        <span id="count"><?php echo $countAll.' คน'; ?></span>
      </div>
    </div>    
  </div>
  <div class="col-sm-3">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-clock-o"></i>&nbsp;จำนวนน้องที่ไม่เช็คชื่อ</div>
      <div class="panel-body">
        <?php
          $SelectUser = $pdo->prepare("SELECT * FROM user_profiles");
          $SelectUser->execute();
          $countUser = $SelectUser->rowCount();
          $Select2B = $pdo->prepare("SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ?");
          $sessionDate = array($today, "E");
          $Select2B->execute($sessionDate);
          $countAll = $Select2B->rowCount();
          $remain = $countUser-$countAll;
        ?>
        <span id="count"><?php echo $remain.' คน'; ?></span>
      </div>
    </div>    
  </div>
</div>
</div>
</div>
<div class="panel panel-default">
  <div class="panel-heading" id="title">
    <i class="fa fa-fw fa-caret-right"></i>&nbsp;เช็คชื่อน้องตอนกลางคืน <?php echo $today; ?>
  </div>
  <div class="panel-body">
<div class="row">
  <div class="col-sm-4">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-users"></i>&nbsp;จำนวนน้องนอนหอทั้งหมด</div>
      <div class="panel-body">
        <?php
          $SelectUser = $pdo->prepare("SELECT * FROM user_profiles WHERE is_dorm = ?");
          $Dorm = array(1);
          $SelectUser->execute($Dorm);
          $countUser = $SelectUser->rowCount();
        ?>
        <span id="count"><?php echo $countUser.' คน'; ?></span>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-bed"></i>&nbsp;น้องที่เช็คชื่อแล้ว</div>
      <div class="panel-body">
	<?php
   $Select2B = $pdo->prepare("SELECT * FROM attendance_logs,user_profiles WHERE attendance_logs.camp_id = user_profiles.camp_id AND user_profiles.is_dorm = 1 AND attendance_logs.session_date = ? AND attendance_logs.session_key = ?");
          $sessionDate = array($today, "N");
          $Select2B->execute($sessionDate);
          $countAll = $Select2B->rowCount();
        ?>
        <span id="count"><?php echo $countAll.' คน'; ?></span>
      </div>
    </div>    
  </div>
  <div class="col-sm-4">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-times"></i>&nbsp;จำนวนน้องที่ไม่เช็คชื่อ</div>
      <div class="panel-body">
        <?php
          /*$SelectUser = $pdo->prepare("SELECT * FROM user_profiles WHERE is_dorm = ?");
          $Dorm = array(1);
          $SelectUser->execute($Dorm);*/
          $countUser = $SelectUser->rowCount();
	  /*$Select2B = $pdo->prepare("SELECT * FROM attendance_logs,user_profiles WHERE attendance_logs.camp_id = user_profiles.camp_id AND user_profiles.is_dorm = '1' AND attendance_logs.session_date = ? AND attendance_logs.session_key = ?");
          $sessionDate = array($today, "N");
          $Select2B->execute($sessionDate);
          $countAll = $Select2B->rowCount(); */
          $remain = $countUser-$countAll;
        ?>
        <span id="count"><?php echo $remain.' คน'; ?></span>
      </div>
    </div>    
  </div>
<div class="col-sm-4">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-users"></i>&nbsp;จำนวนน้องไปกลับทั้งหมด</div>
      <div class="panel-body">
        <?php
          $SelectUser = $pdo->prepare("SELECT * FROM user_profiles WHERE is_dorm = ?");
          $Dorm = array(0);
          $SelectUser->execute($Dorm);
          $countUser = $SelectUser->rowCount();
        ?>
        <span id="count"><?php echo $countUser.' คน'; ?></span>
      </div>
    </div>
  </div>
<div class="col-sm-4">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-bed"></i>&nbsp;จำนวนน้องไปกลับทั้งหมดที่เช็คชื่อเข้านอนแล้ว</div>
      <div class="panel-body">
        <?php
	  $Select2B = $pdo->prepare("SELECT * FROM attendance_logs,user_profiles WHERE attendance_logs.camp_id = user_profiles.camp_id AND user_profiles.is_dorm = ? AND attendance_logs.session_date = ? AND attendance_logs.session_key = ?");
          $sessionDate2 = array(0,$today, "N");
	  $Select2B->execute($sessionDate2);
          $countAll = $Select2B->rowCount();
        ?>
        <span id="count"><?php echo $countAll.' คน'; ?></span>
      </div>
    </div>
  </div>
<div class="col-sm-4">
    <div class="panel panel-default">
      <div class="panel-heading" id="header"><i class="fa fa-fw fa-times""></i>&nbsp;จำนวนน้องไปกลับที่ยังไม่ได้เช็คชื่อเข้านอน</div>
      <div class="panel-body">
        <?php
	$Select2B = $pdo->prepare("SELECT * FROM attendance_logs,user_profiles WHERE attendance_logs.camp_id = user_profiles.camp_id AND user_profiles.is_dorm = ? AND attendance_logs.session_date = ? AND attendance_logs.session_key = ?");
          $sessionDate2 = array(0,$today, "N");
          $Select2B->execute($sessionDate2);
          $countAll = $Select2B->rowCount();
        ?>
        <span id="count"><?php echo $countUser-$countAll.' คน'; ?></span>

      </div>
    </div>
  </div>
</div>

  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading" id="title"><i class="fa fa-fw fa-file-text"></i>&nbsp;ยอดน้องเช็คชื่อแต่ละห้อง</div>
  <div class="panel-body">
    <div class="row">
      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง 2502</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array(2502);
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
              $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
		$i = 0;
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $sessionDate = array($today, "N", $FetchRoom['camp_id']);
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $QueryCheck->execute($sessionDate);
                $SelectCount = "SELECT COUNT(*) FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCount = $pdo->prepare($SelectCheck);
                $QueryCount->execute($sessionDate);
                $FetchCount = $QueryCount->fetchColumn();
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i=$i+1;?></div>
                  <?php
                }
                ?>
                <?php
              }
             // echo $FetchCount;
            ?>
  <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
  <?php 
    if($i == $countRoom){ 
      echo "ไม่มี"; 
    }else{
      echo $countRoom-$i.' คน';
    }  
    $i = 0; ?>
  </div>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง 2503</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array(2503);
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
              $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($today, "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i=$i+1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
  <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
  <?php 
    if($i == $countRoom){ 
      echo "ไม่มี"; 
    }else{
      echo $countRoom-$i.' คน';
    }  
    $i = 0; ?>
  </div>

          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง 2508</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array(2508);
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
              $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($today, "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i =$i+1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
  <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
  <?php 
    if($i == $countRoom){ 
      echo "ไม่มี"; 
    }else{
      echo $countRoom-$i.' คน';
    }  
    $i = 0; ?>
  </div>

          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง 2522</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array(2522);
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
             $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($today, "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i = $i +1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
  <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
  <?php 
    if($i == $countRoom){ 
      echo "ไม่มี"; 
    }else{
      echo $countRoom-$i.' คน';
    }  
    $i = 0; ?>
  </div>

          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง 2523</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array(2523);
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
              $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($today, "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i=$i+1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
  <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
  <?php 
    if($i == $countRoom){ 
      echo "ไม่มี"; 
    }else{
      echo $countRoom-$i.' คน';
    }  
    $i = 0; ?>
  </div>

          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง 2524</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array(2524);
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
             $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($today, "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i = $i + 1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
  <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
  <?php 
    if($i == $countRoom){ 
      echo "ไม่มี"; 
    }else{
      echo $countRoom-$i.' คน';
    }  
    $i = 0; ?>
  </div>

          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง 2526</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array(2526);
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
              $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($today, "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i=$i+1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
  <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
  <?php 
    if($i == $countRoom){ 
      echo "ไม่มี"; 
    }else{
      echo $countRoom-$i.' คน';
    }  
    $i = 0; ?>
  </div>

          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง 2527</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array(2527);
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
              $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($today, "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i = $i+1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
  <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
  <?php 
    if($i == $countRoom){ 
      echo "ไม่มี"; 
    }else{
      echo $countRoom-$i.' คน';
    }  
    $i = 0; ?>
  </div>

          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง 2531</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array(2531);
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
             $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($today, "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i=$i+1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
  <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
  <?php 
    if($i == $countRoom){ 
      echo "ไม่มี"; 
    }else{
      echo $countRoom-$i.' คน';
    }  
    $i = 0; ?>
  </div>

          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง 2532</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array(2532);
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
              $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($today, "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i=$i+1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
  <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
  <?php 
    if($i == $countRoom){ 
      echo "ไม่มี"; 
    }else{
      echo $countRoom-$i.' คน';
    }  
    $i = 0; ?>
  </div>

          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง 2533</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array(2533);
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
              $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($today, "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i=$i+1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
  <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
  <?php 
    if($i == $countRoom){ 
      echo "ไม่มี"; 
    }else{
      echo $countRoom-$i.' คน';
    }  
    $i = 0; ?>
  </div>

          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง 2534</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array(2534);
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
              $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($today, "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i=$i+1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
  <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
  <?php 
    if($i == $countRoom){ 
      echo "ไม่มี"; 
    }else{
      echo $countRoom-$i.' คน';
    }  
    $i = 0; ?>
  </div>

          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง 2535</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array(2535);
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
              $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($today, "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i=$i+1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
	<div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : </div>
                <div class="desc"><?php if($i == $countRoom){ echo "ไม่มี"; } $i = 0; ?></div>

          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง 2536</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array(2536);
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
              $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($today, "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i=$i+1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
  <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
  <?php 
    if($i == $countRoom){ 
      echo "ไม่มี"; 
    }else{
      echo $countRoom-$i.' คน';
    }  
    $i = 0; ?>
  </div>

          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง Fitness</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array('fitness');
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
              $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($today, "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i=$i+1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
  <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
  <?php 
    if($i == $countRoom){ 
      echo "ไม่มี"; 
    }else{
      echo $countRoom-$i.' คน';
    }  
    $i = 0; ?>
  </div>

          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-heading" id="header"><i class="fa fa-fw fa-tag"></i>&nbsp;ห้อง learning</div>
          <div class="panel-body">
            <?php
              $SelectRoom = "SELECT * FROM user_profiles WHERE dorm_info = ?";
              $roomArray = array('learning');
              $QueryRoom = $pdo->prepare($SelectRoom);
              $QueryRoom->execute($roomArray);
              $countRoom = $QueryRoom->rowCount();
              ?>
              <div class="desc"><i class="fa fa-fw fa-users"></i>&nbsp;น้องทั้งหมด : <?php echo $countRoom;?> คน</div>
              <div class="desc"><i class="fa fa-fw fa-check"></i>&nbsp;น้องที่เช็คแล้ว : </div>
              <?php
              while($FetchRoom = $QueryRoom->fetch(PDO::FETCH_ASSOC)){
                $SelectCheck = "SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND camp_id = ?";
                $QueryCheck = $pdo->prepare($SelectCheck);
                $sessionDate = array($today, "N", $FetchRoom['camp_id']);
                $QueryCheck->execute($sessionDate);
                while($FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <div class="desc">- น้อง<?php echo $FetchRoom['nickname-th']; $i=$i+1;?></div>
                  <?php
                }
                ?>
                  
                <?php
              }
            ?>
  <div class="desc"><i class="glyphicon glyphicon-remove"></i>&nbsp;น้องท่ียังไม่เช็ค : 
  <?php 
    if($i == $countRoom){ 
      echo "ไม่มี"; 
    }else{
      echo $countRoom-$i.' คน';
    }  
    $i = 0; ?>
  </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>








  


    <?php
  }
?>
</div>



@endsection
