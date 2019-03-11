<?php
    if(isset($_GET['user'])){
    if($_GET['user'] == "logout"){
         
          $log = $userClass->userLogout();

         if($log){
           header("Location : index.php");
          }
        }
    
    }
      
?>
<div class="row">
  <div class="col-md-12 wow fadeInUp" data-wow-delay="0.7s">
    <div class="alert alert-info" role="alert"><a name="learn"></a>
    <strong>สวัสดีครับน้อง</strong> <?php echo $datauser->name_th." ".$datauser->surname_th." | ".$datauser->school; ?>
  </div>
</div>
</div>
<div class="row">
    <div class="col-sm-12">
      <small class="f-color">
        ให้น้อง ๆ กดปุ่มยืนยันสิทธิ์ให้เป็น<i class="bg-success">สีเขียว</i> และกรอกข้อมูลต่าง ๆ ให้ครบถ้วนให้ครบ 100%
      </small>
      
      <div class="progress">
  <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" style="width:1%">
   <div class="f-color">1%Complete (success)</div>
  </div>
</div>
    </div>
</div>
<div class="row wow fadeInUp" data-wow-delay="1.5s">
<div class="col-md-4" style="padding-bottom: 10px; ">
  <button class="btn btn-danger btn-block  btn-st"  ><font size="+7"><i class="fa fa-times"></i></font>  <br>ยังไม่ได้ยืนยันสิทธิ์</button>

</div>
<a href="?mod=profile">
  <div class="col-md-4" style="padding-bottom: 10px;">
  <button class="btn btn-danger btn-block  btn-st"><font size="+7"><i class="fa fa-user"></i></font>  
    <br>ข้อมูลส่วนตัว (15%)
  </button>
</div>
</a>

<a href="?mod=parent">
<div class="col-md-4" style="padding-bottom: 10px;">
  <button class="btn btn-danger btn-block  btn-st"><font size="+7"><i class="fa fa-user-tie"></i></font>  
     <br>ข้อมูลผู้ติดต่อในกรณีฉุกเฉิน (50%) 
  </button>
  
</div>
</a>

</div>
<div class="row wow fadeInUp" data-wow-delay="1.7s">
  <a href="?mod=dorm">
<div class="col-md-4" style="padding-bottom: 10px;">
  <button class="btn btn-danger btn-block  btn-st"><font size="+7"><i class="fa fa-building"></i></font>  
    <br>ยืนยันการเข้าพักหอพัก (0%)
  </button>
  
</div>
</a>

<a href="?mod=group">
<div class="col-md-4" style="padding-bottom: 10px;">
  <button class="btn btn-danger btn-block  btn-st"><font size="+7"><i class="fa fa-address-card"></i></font>  
    <br>ข้อมูลกลุ่มวิจัย  
  </button>
  
</div>
</a>

<a href="?mod=tellme">
<div class="col-md-4" style="padding-bottom: 10px;">
  <button class="btn btn-danger btn-block  btn-st"><font size="+7"><i class="fa fa-user-astronaut"></i></font>  
    <br>มีอะไรอยากบอกพี่ไหม? 
  </button>
  
</div>
</a>

</div>
<div class="row">
<div class="col-md-12">
  <div class="text-right"><hr>
    <a href="?mod=home&user=logout">
      <button class="btn btn-danger"><i class="fa fa-lock"></i> ออกจากระบบ</button>
    </a>
  </div>
</div>
</div>