<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="2B-KMUTT">
    <meta name="description" content="ระบบยืนยันสิทธิ์ค่าย 2B-KMUTT รุ่นที่ 18">
    <title>2B-KMUTT#18 - Confirmation</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/component.css">
    <link rel="icon" href="images/icon.jpeg">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/vegas.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- Google web font  -->
    <link href="https://fonts.googleapis.com/css?family=Athiti:500" rel="stylesheet">
    <style type="text/css">
    body{
    font-family: 'Athiti', sans-serif;
    }
    </style>

  </head>

  <body id="top" data-spy="scroll" data-offset="50" data-target=".navbar-collapse">
    <?php

    include ('auth/config.auth.php');
    include ('auth/user.class.php');
    if(!empty($_SESSION['citizen']) && !empty($_SESSION['user'])){
    header("Location: main.php?mod=home");
    }
    $userClass = new userClass();

    /* Login Form */
    if (!empty($_POST['loginSubmit'])) {
        $citizen = $_POST['citizen'];
        $password = $_POST['password'];
        $login = $userClass->userLogin($citizen,$password);
    if($login){
         if($_SESSION["citizen"] != "" && $_SESSION['user'] != ""){
               ?>
             <script type="text/javascript">
               //swal("สำเร็จ","เข้าสู่ระบบสำเร็จ","success").then((value) => {
               //window.location='main.php?mod=home';
               // });
               window.location='main.php?mod=home';
            </script>
             <?php
         }else{
            ?>
            <script type="text/javascript">
              swal("ผิดพลาด","กรุณาเข้าสู่ระบบ","error").then((value) => {
              window.location='index.php';
            });
        </script>
          <?php
        }
    }else{
    ?>
    <script type="text/javascript"> swal('กรอกได้แค่ตัวเลขนะครับ!','','warning'); </script>
    <?php
    }
    }

    ?>
    <div class="preloader">
      <div class="sk-spinner sk-spinner-pulse"></div>
    </div>
    <section id="home">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-offset-1 col-md-10 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
            <img src="images/ontour.png" width="30%" class="wow fadeInUp" data-wow-delay="0.3s">
            <h1 class="wow fadeInUp" data-wow-delay="0.6s">Confirmation system</h1>
            <p class="wow fadeInUp" data-wow-delay="0.9s">ระบบยืนยันสิทธิ์ค่าย 2B-KMUTT รุ่นที่ 18 <a rel="nofollow" href="#"></a></p>
            <a href="#step1" class="btn btn-success btn-lg wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-check-square"></i> ยืนยันสิทธิ์</a>
            <a href="#check" class="btn btn-success btn-lg wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-search"></i> ตรวจสอบรายชื่อ</a>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact section -->
    <section id="step1">
      <div class="container">
        <div class="row">
          <div class="col-md-offset-1 col-md-10 col-sm-12">
            <div class="col-lg-offset-1 col-lg-10 section-title wow fadeInUp" data-wow-delay="0.4s">
              <h1>sign-in</h1>
              <p>ก่อนอื่นพี่ขอแสดงความยินดีกับน้องที่มีสิทธิ์ในการเข้าร่วมโครงการ 2B-KMUTT รุ่นที่ 18 ด้วยนะครับ ในขั้นตอนการยืนยันสิทธิ์ขึ้นแรกนี้ ให้น้องกรอกหมายเลขบัตรประชาชน 13 หลัก และวัน เดือน ปีเกิดในรูปแบบ xx/xx/xxxx </p>
            </div>
            <form method="post" class="wow fadeInUp" data-wow-delay="0.8s">
              <div class="col-md-12 col-sm-12">
                <input name="citizen" type="text" class="form-control" placeholder="หมายเลขบัตรประชาชน" maxlength="13" onKeyUp="if(isNaN(this.value)){ swal('กรอกได้แค่ตัวเลขนะครับ!','','warning'); this.value='';}">
                <input name="password" type="text" class="form-control"  placeholder="วันเดือนปีเกิด" maxlength="10">
              </div>
              <?php //echo $errorMsgLogin;?>
              <div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6">
                <input type="submit" name="loginSubmit" class="form-control btn-block btn-success" value="เข้าสู่ระบบ">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- Footer section -->
    <footer>
      <div class="container">

        <div class="row">
          <div class="col-md-12 col-sm-12">

            <ul class="social-icon">
              <li><a href="https://www.facebook.com/2BKMUTT.Fanpage/" class="fa fa-facebook wow fadeInUp" data-wow-delay="1.0s"></a></li>
              <li><a href="https://confirm.2bkmutt.com/" class="fa fa-globe wow fadeInUp" data-wow-delay="1.0s"></a></li>
            </ul>
            <p class="wow fadeInUp"  data-wow-delay="1s" >2B-KMUTT GENERATION 18 | 2B-REGISTRAR10 </p>

          </div>

        </div>

      </div>
    </footer>
    <!-- Back top -->
    <a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>
    <!-- Javascript  -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/vegas.min.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <script src="js/toucheffects.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </body>
</html>
