
@extends('layouts.app')
@section('title', '2B-KMUTT')

@section('content')
    @include('components.title', [
        "title" => "2B-KMUTT",
        "desc" => "จำนวนน้องเช็คชื่อขณะนี้"
    ])
<?php
$servername = env('DB_HOST', 'localhost');
  $username   = env('DB_USERNAME', 'forge');
  $password   = env('DB_PASSWORD', 'forge');
  $dbname     = env('DB_DATABASE', 'forge');
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$today = date("Y-m-d");
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
</style>
<div class="row">
<form action="" method="post">
<div class="panel panel-default">
  <div class="panel-heading" id="title">
    <i class="fa fa-fw fa-search"></i>&nbsp;วันที่ต้องการค้นหา
  </div>
  <div class="panel-body">
    <select class="form-control" name="dateSelect">
      <option><?php echo $today;?></option>
        <option>2018-03-19</option>
        <option>2018-03-20</option>
        <option>2018-03-21</option>
        <option>2018-03-22</option>
        <option>2018-03-23</option>
        <option>2018-03-26</option>
        <option>2018-03-27</option>
        <option>2018-03-28</option>
        <option>2018-03-29</option>
        <option>2018-03-30</option>
        <option>2018-03-02</option>
        <option>2018-03-03</option>
        <option>2018-03-04</option>
        <option>2018-03-05</option>
        <option>2018-03-06</option>
        <option>2018-03-09</option>
        <option>2018-03-10</option>
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
          $Select2B = $pdo->prepare("SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND location = ?");
          $sessionDate = array($_POST['dateSelect'], "M", "BANGKHUNTIEN");
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
          $Select2B = $pdo->prepare("SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND location = ?");
          $sessionDate = array($_POST['dateSelect'], "M", "BANGMOD");
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
          $Select2B = $pdo->prepare("SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND location = ?");
          $sessionDate = array($_POST['dateSelect'], "E", "BANGKHUNTIEN");
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
          $Select2B = $pdo->prepare("SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND location = ?");
          $sessionDate = array($_POST['dateSelect'], "E", "BANGMOD");
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
          $sessionDate = array($_POST['dateSelect'], "E");
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
          $Select2B = $pdo->prepare("SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND location = ?");
          $sessionDate = array($today, "M", "BANGKHUNTIEN");
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
          $Select2B = $pdo->prepare("SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND location = ?");
          $sessionDate = array($today, "M", "BANGMOD");
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
    <i class="fa fa-fw fa-caret-right"></i>&nbsp;เช็คชื่อน้องตอนเย็น <?php echo $today; ?>
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
          $Select2B = $pdo->prepare("SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND location = ?");
          $sessionDate = array($today, "E", "BANGKHUNTIEN");
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
          $Select2B = $pdo->prepare("SELECT * FROM attendance_logs WHERE session_date = ? AND session_key = ? AND location = ?");
          $sessionDate = array($today, "E", "BANGMOD");
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
    <?php
  }
?>
</div>



@endsection
