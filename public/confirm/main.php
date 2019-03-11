<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>2B-KMUTT#16 - Confirmation</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/component.css">
    <link rel="icon" href="images/icon.jpeg">
    <link rel="stylesheet" href="css/vegas.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Athiti:500" rel="stylesheet">
    <style type="text/css">
    body{
    font-family: 'Athiti', sans-serif;
    color :#000;
    font-size: 16px;
    background-position: fixed;
    background-image: url("images/bg.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    }
    .btn-st{
    height: 120px;
    }
    .overlay {
    position: absolute;
    width: 100%;
    height: 100vh;
    top: 0;
    left: 0;
    right: 0;
    }
    .btn-success2 {
    background: #4891da;
    font-weight: 300;
    letter-spacing: 2px;
    
    }
    .btn-success2:hover{
    background: #64a9ee;
    font-weight: 300;
    letter-spacing: 2px;
    }
    .f-color{
    color : #000;
    }
    a{
    color : #000;
    text-decoration: none;
    }
    .bg{
    # background-color: #304352;
    }
    </style>
    
  </head>
  <body id="top" data-spy="scroll" bgcolor="#596975" data-offset="50" data-target=".navbar-collapse">
    <?php
    
    include ('auth/config.auth.php');
    include ('auth/user.class.php');
    include ('auth/session.class.php');
    $userClass = new userClass;
    $datauser = $userClass->userDetails($session_auth);
    ?>
    <div class="preloader bg">
      <div class="sk-spinner sk-spinner-pulse"></div>
    </div>
    <div class="container-fluid bg">
      <!-- Contact section -->
      <section id="home">
        <div class="overlay"></div>
        <div style="padding: 20px;"></div>
        <div class="container">
          <div class="row">
            <div class=" col-lg-10 section-title wow fadeInUp" data-wow-delay="0.4s">
              <img src="images/2bkmutt16.png" width="300"> <div style="padding: 10px;"></div>
            </div>
            <div class="row">
              <div class="col-md-12 section-title wow fadeInUp" data-wow-delay="0.5s">
                <div class="panel panel-info">
                  <div class="panel-heading">
                    <h3 class="panel-title"><b><i class="fa fa-hashtag"></i> Confirmation System </b></h3>
                  </div>
                  <div class="panel-body">
                    <!-- Load views Body Module-->
                    <?php
                    require_once('route/route.app.php');
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        
        <!-- Footer section -->
        <footer>
          <div class="container bg">
            <div class="row">
              <div class="col-md-12">
                <center>
                <font color="#fff"><p class="wow fadeInUp"  data-wow-delay="1s" >2bkmuttregis@gmail.com <br>2B-KMUTT GENERATION 16 | 2B-REGISTRAR10 <br></p>

                </font>
                </center>
              </div>
            </div>
          </div>
        </footer>
        <!-- Back top -->
        <!-- Javascript  -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/vegas.min.js"></script>
        <script src="js/modernizr.custom.js"></script>
        <script src="js/toucheffects.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/smoothscroll.js"></script>
        <script type="text/javascript" src="js/bootstrap-datetimepicker.js"></script>
        <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
        <!--<script src="js/wow.min.js"></script>-->
        
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      </body>
    </html>