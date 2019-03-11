<!DOCTYPE html>
<html>
<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/css/animated.css">
	<link rel="stylesheet" type="text/css" href="/css/font-awesome/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/finalStyle.css">
	<link rel="stylesheet" type="text/css" href="/css/swipebox.min.css">
	<script type="text/javascript" src="/js/jquery-2.1.0.min.js"></script>
	<link rel="icon" type="image/jpeg" href="/img/logo_2b.jpeg">
	<title>ICRN :: STARVOTE 2B-KMUTT15 - VOTEPORTAL</title>
	<?php
	$servername = env('DB_HOST', 'localhost');
	$username   = env('DB_USERNAME', 'forge');
	$password   = env('DB_PASSWORD', 'forge');
	$dbname     = env('DB_DATABASE', 'forge');
	$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$pdo->exec("set names utf8");
    use App\User;
    use App\UserProfile;
    $recentUser = Auth::user();
    $user = UserProfile::where('user_id','=',$recentUser->id)->first();
	?>
	<style type="text/css">
		.well{
			border-radius: 0px;
			background-color: transparent;
		}
	</style>
</head>
<body>
<div class="container animated bounceInDown" style="margin-top: 50px;">
	<div class="well">
	<div class="row">
		<div class="col-sm-12">
			<div class="header" style="font-family: nexa;color: white">
				<center>2B-KMUTT #15</center>
			</div>
			<div class="desc" style="font-family: nexa;color: #EEE">
				<center>STARVOTE & THE THREE KINGDOMS</center>
			</div>
			<br>
		</div>
	</div>
<!-- 	<div class="row">
		<div class="col-sm-2">
			<a href="">
				<img src="/images/bie.png" style="width: 100%;">
			</a>
		</div>
		<div class="col-sm-2">
			<a href="">
				<img src="/images/towrung.png" style="width: 100%;">
			</a>
		</div>
		<div class="col-sm-2">
			<a href="">
				<img src="/images/deenee.png" style="width: 100%;">
			</a>
		</div>
	</div> -->
	<hr class="style">
	<div class="row">
		<div class="col-sm-6" style="margin-top: 10px;">
			<a rel="diaochan" href="/images/diao.png" class="swipebox" title="DIAO CHAN">
				<div class="img-container">
                	<img src="/images/diao.png" class="img-fluid image" style="width: 100%;">
				  <div class="middle">
				    <div class="text">
				    	DIAO CHAN
						<hr class="style">
						<span style="font-family: cloud">ดาว</span>
				    </div>
				  </div>
				</div>
            </a>
            <a rel="diaochan" href="/diaochan/diao2.png" style="display: hidden;" class="swipebox" title="DIAO CHAN">
            </a>
            <a rel="diaochan" href="/diaochan/diao3.png" style="display: hidden;" class="swipebox" title="DIAO CHAN">
            </a>
		</div>
		<div class="col-sm-6" style="margin-top: 10px;">
			<a rel="month" href="/images/month.png" class="swipebox" title="LUBU">
				<div class="img-container">
                	<img src="/images/month.png" class="img-fluid image" style="width: 100%;">
				  <div class="middle">
				    <div class="text">
				    	LUBU
						<hr class="style">
						<span style="font-family: cloud">เดือน</span>
				    </div>
				  </div>
				</div>
            </a>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6" style="margin-top: 10px;">
			<a rel="daotiam" href="/images/daotiam.png" class="swipebox" title="XIAHOU YUAN">
				<div class="img-container">
                	<img src="/images/daotiam.png" class="img-fluid image" style="width: 100%;">
				  <div class="middle">
				    <div class="text">
				    	XIAHOU YUAN
						<hr class="style">
						<span style="font-family: cloud">ดาวเทียม</span>
				    </div>
				  </div>
				</div>
            </a>
            <a rel="daotiam" href="/daotiam/dao1.png" style="display: hidden;" class="swipebox" title="XIAHOU YUAN">
            </a>
            <a rel="daotiam" href="/daotiam/dao2.png" style="display: hidden;" class="swipebox" title="XIAHOU YUAN">
            </a>
            <a rel="daotiam" href="/daotiam/dao3.png" style="display: hidden;" class="swipebox" title="XIAHOU YUAN">
            </a>
            <a rel="daotiam" href="/daotiam/dao4.png" style="display: hidden;" class="swipebox" title="XIAHOU YUAN">
            </a>
		</div>
		<div class="col-sm-6" style="margin-top: 10px;">
			<a href="/images/sss.png" class="swipebox" title="ZHUGE LIANG">
				<div class="img-container">
                	<img src="/images/sss.png" class="img-fluid image" style="width: 100%;">
				  <div class="middle">
				    <div class="text">
				    	ZHUGE LIANG
						<hr class="style">
						<span style="font-family: cloud">สิ่งศักดิ์สิทธิ์</span>
				    </div>
				  </div>
				</div>
            </a>
            <a rel="sss" href="/sss/sss3.png" style="display: hidden;" class="swipebox" title="ZHUGE LIANG">
            </a>
            <a rel="sss" href="/sss/sss2.png" style="display: hidden;" class="swipebox" title="ZHUGE LIANG">
            </a>
            <a rel="sss" href="/sss/sss1.png" style="display: hidden;" class="swipebox" title="ZHUGE LIANG">
            </a>
		</div>
	</div>
	<hr class="style">
	<button onclick="vote()" class="btn btn-block btn-info" style="font-size: 18px;border-radius: 0px;transition: 0.3s;"><i class="fa fa-fw fa-check"></i>&nbsp;Vote Now !!</button>
	<button onclick="main()" class="btn btn-block btn-warning" style="font-size: 18px;border-radius: 0px;transition: 0.3s;"><i class="fa fa-fw fa-sign-out"></i>&nbsp;Main Menu</button>
	</div>	
	<center>
				<div style="font-family: cloud;font-size: 14px;color: #eee;">
					<i class="fa fa-fw fa-code"></i>&nbsp;Website & System By <a href="https://www.facebook.com/profile.php?id=100008704325244" target="_blank" class="hover">Fort S.</a> & <a href="https://www.facebook.com/waranat.su" target="_blank" class="hover">Aom S.</a><br>
					<i class="fa fa-fw fa-wrench"></i>&nbsp;Recommended By <a target="_blank" href="https://www.facebook.com/Z.pbiicB" class="hover">Bosz CPE30</a>
				</div>
			</center>
</div>
</div>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<!-- <script type="text/javascript" src="/js/nanobar.min.js"></script>
<script type="text/javascript" src="/js/sweetalert.js"></script> -->
<script type="text/javascript" src="/js/jquery.swipebox.min.js"></script>
	<script type="text/javascript">
	$( document ).ready(function() {

			/* Basic Gallery */
			$( '.swipebox' ).swipebox();
			
      });
	function main(){
		window.location.href = "/starvotefinal";
	}
	function vote(){
		window.location.href = "/allStar";	
	}
	</script>
</body>
</html>
