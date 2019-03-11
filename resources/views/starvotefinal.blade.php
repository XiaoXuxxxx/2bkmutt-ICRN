<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/css/animated.css">
	<link rel="stylesheet" type="text/css" href="/css/font-awesome/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/finalStyle.css">
	<link rel="icon" type="image/jpeg" href="/img/logo_2b.jpeg">
	<title>ICRN :: STARVOTE 2B-KMUTT15 - HOMEPAGE</title>
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
    $SelectVotes = "SELECT * FROM star_votes WHERE user_id = ?";
    $ArrayUser = array(Auth::user()->id);
    $QueryVotes = $pdo->prepare($SelectVotes);
    $QueryVotes->execute($ArrayUser);
    $rowCount = $QueryVotes->rowCount();
    if($rowCount == 0){
    	$InsertVote = "INSERT INTO `star_votes` (`id`, `user_id`, `vote_m_profile_id`, `vote_f_profile_id`, `vote_s_profile_id`, `vote_mf_profile_id`) VALUES (?, ?, ?, ?, ?, ?);";
    	$QueryInsert = $pdo->prepare($InsertVote);
    	$ArrayInsert = array(NULL, Auth::user()->id, NULL, NULL, NULL, NULL);
    	$QueryInsert->execute($ArrayInsert);
    }
	?>
	<style type="text/css">

	</style>
</head>
<body>
<div class="container animated bounceInDown" style="margin-top:50px;">
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
			<form action="" method="post">
			<div class="well" style="background-color: transparent;border-radius: 0px;border-width: 2px;color: white;">
				<div class="header">
					<center>2B-KMUTT #15</center>
				</div>
				<div class="desc">
					<center>The Three Kingdoms</center>
				</div>
				<hr class="style">
				<div class="hello">
					<center>สวัสดีครับ N'{{ Auth::user()->name }}</center><br>
					<iframe style="width: 100%;height: 350px;" src="https://www.youtube.com/embed/G2I-p5v7OFM" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen autoplay></iframe>
				</div>
				<hr class="style">
				<a href="/vote" class="btn btn-block btn-default" style="font-size: 17px;font-family:nexa;border-radius: 0px;transition: 0.3s;"><i class="fa fa-fw fa-picture-o"></i>&nbsp;View Gallery</a>
				<a href="/" class="btn btn-block btn-warning" style="font-size: 17px;font-family:nexa;border-radius: 0px;transition: 0.3s;"><i class="fa fa-fw fa-sign-out"></i>&nbsp;Back to Website</a>
			</div>
			</form>
			<center>
				<div style="font-family: cloud;font-size: 14px;color: #eee;">
					<i class="fa fa-fw fa-code"></i>&nbsp;Website & System By <a href="https://www.facebook.com/profile.php?id=100008704325244" target="_blank" class="hover">Fort S.</a> & <a href="https://www.facebook.com/waranat.su" target="_blank" class="hover">Aom S.</a><br>
					<i class="fa fa-fw fa-wrench"></i>&nbsp;Recommended By <a target="_blank" href="https://www.facebook.com/Z.pbiicB" class="hover">Bosz CPE30</a>
				</div>
			</center>
		</div>
		<div class="col-sm-2"></div>
	</div>	
</div>

<?php

?>
</body>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/nanobar.min.js"></script>
<script type="text/javascript" src="/js/sweetalert.js"></script>
</html>
