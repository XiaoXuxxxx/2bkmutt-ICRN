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

	<title>STARVOTE 2B-KMUTT15</title>
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
    $SelectCheck = "SELECT * FROM star_votes WHERE user_id = ?";
    $Arrayy = array(Auth::user()->id);
    $QueryCheck = $pdo->prepare($SelectCheck);
    $QueryCheck->execute($Arrayy);
    $FetchCheck = $QueryCheck->fetch(PDO::FETCH_ASSOC);
    $UserProfileM = "SELECT * FROM user_profiles WHERE id = ?";
    $ArrayM = array($FetchCheck['vote_m_profile_id']);
    $QueryProfileM = $pdo->prepare($UserProfileM);
    $QueryProfileM->execute($ArrayM);
    $FetchProfileM = $QueryProfileM->fetch(PDO::FETCH_ASSOC);
    $UserProfileF = "SELECT * FROM user_profiles WHERE id = ?";
    $ArrayF = array($FetchCheck['vote_f_profile_id']);
    $QueryProfileF = $pdo->prepare($UserProfileF);
    $QueryProfileF->execute($ArrayF);
    $FetchProfileF = $QueryProfileF->fetch(PDO::FETCH_ASSOC);
    $UserProfileS = "SELECT * FROM users WHERE id = ?";
    $ArrayS = array($FetchCheck['vote_s_profile_id']);
    $QueryProfileS = $pdo->prepare($UserProfileS);
    $QueryProfileS->execute($ArrayS);
    $FetchProfileS = $QueryProfileS->fetch(PDO::FETCH_ASSOC);
    $UserProfileMF = "SELECT * FROM user_profiles WHERE id = ?";
    $ArrayMF = array($FetchCheck['vote_mf_profile_id']);
    $QueryProfileMF = $pdo->prepare($UserProfileMF);
    $QueryProfileMF->execute($ArrayMF);
    $FetchProfileMF = $QueryProfileMF->fetch(PDO::FETCH_ASSOC);
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
	<hr class="style">
	<?php

	?>
	
	<div class="row centered">
		<div class="col-sm-12">
		<div class="desc" style="color: white;">
			<center>Diao Chan <?php if($FetchProfileF != null){ echo '<br><span style="color: #AAA">(Voted for N.'.$FetchProfileF['nickname-en'].')</span>'; } ?></center>
		</div>
		<hr class="style">
		</div>
		<br>
		<div class="col-sm-2" style="margin-top: 10px;">
			<a href="javascript:void(0)" data-toggle="modal" data-target="#NBie">
				<div class="img-container">
                	<center><img src="/images/bie.png" class="img-fluid image" style="width: 100%;max-width: 300px;"></center>
				  <div class="middle">
				    <div class="text2">
				    	N'BIE
						<hr class="style">
						<span style="font-family: cloud">น้องบี๋</span>
				    </div>
				  </div>
				</div>
            </a>
		</div>
		<div class="col-sm-2" style="margin-top: 10px;">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#NTowrung">
				<div class="img-container">
                	<center><img src="/images/towrung.png" class="img-fluid image" style="width: 100%;max-width: 300px;"></center>
				  <div class="middle">
				    <div class="text2">
				    	N'Towrung
						<hr class="style">
						<span style="font-family: cloud">น้องทอรุ้ง</span>
				    </div>
				  </div>
				</div>
            </a>
		</div>
		<div class="col-sm-2" style="margin-top: 10px;">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#Ndeenee">
				<div class="img-container">
                	<center><img src="/images/deenee.png" class="img-fluid image" style="width: 100%;max-width: 300px;"></center>
				  <div class="middle">
				    <div class="text2">
				    	N'Deenee
						<hr class="style">
						<span style="font-family: cloud">น้องดีนี่</span>
				    </div>
				  </div>
				</div>
            </a>
		</div>
		<div class="col-sm-12" style="margin-top: 50px;">
		<hr class="style">
		</div>
	</div>
	<div class="row centered" style="margin-top: 15px;">
		<div class="col-sm-12">
		<div class="desc" style="color: white;">
			<center>Lu Bu <?php if($FetchProfileM != null){ echo '<br><span style="color: #AAA">(Voted for N.'.$FetchProfileM['nickname-en'].')</span>'; } ?></center>
		</div>
		<hr class="style">
		</div>
		<div class="col-sm-2" style="margin-top: 10px;">
			<a href="javascript:void(0)" data-toggle="modal" data-target="#Nscale">
				<div class="img-container">
                	<center><img src="/images/scale.png" class="img-fluid image" style="width: 100%;max-width: 300px;"></center>
				  <div class="middle">
				    <div class="text2">
				    	N'Scale
						<hr class="style">
						<span style="font-family: cloud">น้องสเกล</span>
				    </div>
				  </div>
				</div>
            </a>
		</div>
		<div class="col-sm-2" style="margin-top: 10px;">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#NBig">
				<div class="img-container">
                	<center><img src="/images/w.png" class="img-fluid image" style="width: 100%;max-width: 300px;"></center>
				  <div class="middle">
				    <div class="text2">
				    	N'Big
						<hr class="style">
						<span style="font-family: cloud">น้องบิ๊ก</span>
				    </div>
				  </div>
				</div>
            </a>
		</div>
		<div class="col-sm-2" style="margin-top: 10px;">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#NJab">
				<div class="img-container">
                	<center><img src="/images/jab.png" class="img-fluid image" style="width: 100%;max-width: 300px;"></center>
				  <div class="middle">
				    <div class="text2">
				    	N'Jabber
						<hr class="style">
						<span style="font-family: cloud">น้องแจ๊บ</span>
				    </div>
				  </div>
				</div>
            </a>
		</div>
		<div class="col-sm-12" style="margin-top: 50px;">
		<hr class="style">
		</div>
	</div>
	<div class="row centered" style="margin-top: 15px;">
		<div class="col-sm-12">
		<div class="desc" style="color: white;">
			<center>Xiahou Yuan <?php if($FetchProfileMF != null){ echo '<br><span style="color: #AAA">(Voted for N.'.$FetchProfileMF['nickname-en'].')</span>'; } ?></center>
		</div>
		<hr class="style">
		</div>
		<div class="col-sm-2" style="margin-top: 10px;">
			<a href="javascript:void(0)" data-toggle="modal" data-target="#NSin">
				<div class="img-container">
                	<center><img src="/images/sin.png" class="img-fluid image" style="width: 100%;max-width: 300px;"></center>
				  <div class="middle">
				    <div class="text2">
				    	N'Sin
						<hr class="style">
						<span style="font-family: cloud">น้องสิน</span>
				    </div>
				  </div>
				</div>
            </a>
		</div>
		<div class="col-sm-2" style="margin-top: 10px;">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#NSming">
				<div class="img-container">
                	<center><img src="/images/sming.png" class="img-fluid image" style="width: 100%;max-width: 300px;"></center>
				  <div class="middle">
				    <div class="text2">
				    	N'Sming
						<hr class="style">
						<span style="font-family: cloud">สมิง</span>
				    </div>
				  </div>
				</div>
            </a>
		</div>
		<div class="col-sm-2" style="margin-top: 10px;">
           <a href="javascript:void(0)" data-toggle="modal" data-target="#NNu">
				<div class="img-container">
                	<center><img src="/images/nu.png" class="img-fluid image" style="width: 100%;max-width: 300px;"></center>
				  <div class="middle">
				    <div class="text2">
				    	N'Nu
						<hr class="style">
						<span style="font-family: cloud">น้องณุ</span>
				    </div>
				  </div>
				</div>
            </a>
		</div>
		<div class="col-sm-12" style="margin-top: 50px;">
		<hr class="style">
		</div>
	</div>
	<div class="row centered" style="margin-top: 15px;">
		<div class="col-sm-12">
		<div class="desc" style="color: white;">
			<center>Zhuge liang <?php if($FetchProfileS != null){ echo '<br><span style="color: #AAA">(Voted for P.'.$FetchProfileS['name'].')</span>'; } ?></center>
		</div>
		<hr class="style">
		</div>
		<div class="col-sm-2" style="margin-top: 10px;">
			<a href="javascript:void(0)" data-toggle="modal" data-target="#NAof">
				<div class="img-container">
                	<center><img src="/images/aof2.png" class="img-fluid image" style="width: 100%;max-width: 300px;"></center>
				  <div class="middle">
				    <div class="text2">
				    	N'Aof
						<hr class="style">
						<span style="font-family: cloud">พี่ออฟ</span>
				    </div>
				  </div>
				</div>
            </a>
		</div>
		<div class="col-sm-2" style="margin-top: 10px;">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#NOab">
				<div class="img-container">
                	<center><img src="/images/oab.png" class="img-fluid image" style="width: 100%;max-width: 300px;"></center>
				  <div class="middle">
				    <div class="text2">
				    	N'Oab
						<hr class="style">
						<span style="font-family: cloud">พี่โอบ</span>
				    </div>
				  </div>
				</div>
            </a>
		</div>
		<div class="col-sm-2" style="margin-top: 10px;">
           <a href="javascript:void(0)" data-toggle="modal" data-target="#NFort">
				<div class="img-container">
                	<center><img src="/images/fort.png" class="img-fluid image" style="width: 100%;max-width: 300px;"></center>
				  <div class="middle">
				    <div class="text2">
				    	N'Fort
						<hr class="style">
						<span style="font-family: cloud">พี่โฟร์ท</span>
				    </div>
				  </div>
				</div>
            </a>
		</div>
	</div>

	<hr class="style">
	<button onclick="gallery()" class="btn btn-block btn-warning" style="font-size: 18px;border-radius: 0px;transition: 0.3s;"><i class="fa fa-fw fa-picture-o"></i>&nbsp;Back To Gallery</button>
	</div>	
	<center>
				<div style="font-family: cloud;font-size: 14px;color: #eee;">
					<i class="fa fa-fw fa-code"></i>&nbsp;Website & System By <a href="https://www.facebook.com/profile.php?id=100008704325244" target="_blank" class="hover">Fort S.</a> & <a href="https://www.facebook.com/waranat.su" target="_blank" class="hover">Aom S.</a><br>
					<i class="fa fa-fw fa-wrench"></i>&nbsp;Recommended By <a target="_blank" href="https://www.facebook.com/Z.pbiicB" class="hover">Bosz CPE30</a>
				</div>
			</center>
</div>
  <div class="modal fade" id="NBie" role="dialog" style="margin-top: 50px;">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-fw fa-star"></i>&nbsp;โหวตน้องบี๋</h4>
        </div>
        <div class="modal-body">
        	<div class="row">
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="bie/bie2.png" class="swipebox" title="N.Bie" rel="NBie">
					<img src="bie/bie2.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="bie/bie4.png" class="swipebox" title="N.Bie" rel="NBie">
					<img src="bie/bie4.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="bie/bie11.png" class="swipebox" title="N.Bie" rel="NBie">
					<img src="bie/bie11.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="bie/bie9.png" class="swipebox" title="N.Bie" rel="NBie">
					<img src="bie/bie9.png" style="width: 100%">
					</a>
				</div>
			</div>
			<div class="row centered" style="margin-top: 10px;">
				
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="bie/bie5.png" class="swipebox" title="N.Bie" rel="NBie">
					<img src="bie/bie5.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="bie/bie1.png" class="swipebox" title="N.Bie" rel="NBie">
					<img src="bie/bie1.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="bie/bie6.png" class="swipebox" title="N.Bie" rel="NBie">
					<img src="bie/bie6.png" style="width: 100%">
					</a>
				</div>
			</div>
			<div class="row centered" style="margin-top: 10px;">
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="bie/bie7.png" class="swipebox" title="N.Bie" rel="NBie">
					<img src="bie/bie7.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="bie/bie8.png" class="swipebox" title="N.Bie" rel="NBie">
					<img src="bie/bie8.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3 style="margin-top: 10px;">
					<a href="bie/bie10.png" class="swipebox" title="N.Bie" rel="NBie">
					<img src="bie/bie10.png" style="width: 100%">
					</a>
				</div>
			</div>
        </div>
        <div class="modal-footer">
          <form action="" method="post">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
          	<input type="hidden" value="75" name="voteID">
          	<input type="submit" class="btn btn-block btn-success" value="ยืนยันการโหวต" style="font-size: 17px;" name="voteFemale">
      	  </form>
        </div>
      </div>
      
    </div>
  </div>
  <div class="modal fade" id="NTowrung" role="dialog" style="margin-top: 50px;">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-fw fa-star"></i>&nbsp;โหวตน้องทอรุ้ง</h4>
        </div>
        <div class="modal-body">
        	<div class="row">
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="towrung/towrung2.png" class="swipebox" title="N.Towrung" rel="NTowrung">
					<img src="towrung/towrung2.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="towrung/towrung4.png" class="swipebox" title="N.Towrung" rel="NTowrung">
					<img src="towrung/towrung4.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="towrung/towrung10.png" class="swipebox" title="N.Towrung" rel="NTowrung">
					<img src="towrung/towrung10.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="towrung/towrung9.png" class="swipebox" title="N.Towrung" rel="NTowrung">
					<img src="towrung/towrung9.png" style="width: 100%">
					</a>
				</div>
			</div>
			<div class="row centered" style="margin-top: 10px;">
				
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="towrung/towrung5.png" class="swipebox" title="N.Towrung" rel="NTowrung">
					<img src="towrung/towrung5.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="towrung/towrung1.png" class="swipebox" title="N.Towrung" rel="NTowrung">
					<img src="towrung/towrung1.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="towrung/towrung7.png" class="swipebox" title="N.Towrung" rel="NTowrung">
					<img src="towrung/towrung7.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="towrung/towrung8.png" class="swipebox" title="N.Towrung" rel="NTowrung">
					<img src="towrung/towrung8.png" style="width: 100%">
					</a>
				</div>
			</div>
        </div>
        <div class="modal-footer">
          <form action="" method="post">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
          	<input type="hidden" value="146" name="voteID">
          	<input type="submit" class="btn btn-block btn-success" value="ยืนยันการโหวต" style="font-size: 17px;" name="voteFemale">
      	  </form>
        </div>
      </div>
      
    </div>
  </div>
  <div class="modal fade" id="Ndeenee" role="dialog" style="margin-top: 50px;">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-fw fa-star"></i>&nbsp;โหวตน้องดีนี่</h4>
        </div>
        <div class="modal-body">
        	<div class="row">
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="deenee/deenee2.png" class="swipebox" title="N.Deenee" rel="NDeenee">
					<img src="deenee/deenee2.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="deenee/deenee4.png" class="swipebox" title="N.Deenee" rel="NDeenee">
					<img src="deenee/deenee4.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="deenee/deenee10.png" class="swipebox" title="N.Deenee" rel="NDeenee">
					<img src="deenee/deenee10.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="deenee/deenee9.png" class="swipebox" title="N.Deenee" rel="NDeenee">
					<img src="deenee/deenee9.png" style="width: 100%">
					</a>
				</div>
			</div>
			<div class="row centered" style="margin-top: 10px;">
				
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="deenee/deenee5.png" class="swipebox" title="N.Deenee" rel="NDeenee">
					<img src="deenee/deenee5.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="deenee/deenee1.png" class="swipebox" title="N.Deenee" rel="NDeenee">
					<img src="deenee/deenee1.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="deenee/deenee7.png" class="swipebox" title="N.Deenee" rel="NDeenee">
					<img src="deenee/deenee7.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="deenee/deenee8.png" class="swipebox" title="N.Deenee" rel="NDeenee">
					<img src="deenee/deenee8.png" style="width: 100%">
					</a>
				</div>
			</div>
        </div>
        <div class="modal-footer">
          <form action="" method="post">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
          	<input type="hidden" value="11" name="voteID">
          	<input type="submit" class="btn btn-block btn-success" value="ยืนยันการโหวต" style="font-size: 17px;" name="voteFemale">
      	  </form>
        </div>
      </div>
      
    </div>
  </div>
  <div class="modal fade" id="Nscale" role="dialog" style="margin-top: 50px;">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-fw fa-star"></i>&nbsp;โหวตน้องสเกล</h4>
        </div>
        <div class="modal-body">
        	<div class="row">
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="scale/scale1.png" class="swipebox" title="N.Scale" rel="NScale">
					<img src="scale/scale1.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="scale/scale2.png" class="swipebox" title="N.Scale" rel="NScale">
					<img src="scale/scale2.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="scale/scale3.png" class="swipebox" title="N.Scale" rel="NScale">
					<img src="scale/scale3.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="scale/scale4.png" class="swipebox" title="N.Scale" rel="NScale">
					<img src="scale/scale4.png" style="width: 100%">
					</a>
				</div>
			</div>
			<div class="row centered" style="margin-top: 10px;">
				
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="scale/scale5.png" class="swipebox" title="N.Scale" rel="NScale">
					<img src="scale/scale5.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="scale/scale6.png" class="swipebox" title="N.Scale" rel="NScale">
					<img src="scale/scale6.png" style="width: 100%">
					</a>
				</div>
			</div>
        </div>
        <div class="modal-footer">
          <form action="" method="post">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
          	<input type="hidden" value="22" name="voteID">
          	<input type="submit" class="btn btn-block btn-success" value="ยืนยันการโหวต" style="font-size: 17px;" name="voteMale">
      	  </form>
        </div>
      </div>
      
    </div>
  </div>
  <div class="modal fade" id="NBig" role="dialog" style="margin-top: 50px;">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-fw fa-star"></i>&nbsp;โหวตน้องบิ๊ก</h4>
        </div>
        <div class="modal-body">
        	<div class="row">
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="big/big1.png" class="swipebox" title="N.Big" rel="NBig">
					<img src="big/big1.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="big/big2.png" class="swipebox" title="N.Big" rel="NBig">
					<img src="big/big2.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="big/big3.png" class="swipebox" title="N.Big" rel="NBig">
					<img src="big/big3.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="big/big4.png" class="swipebox" title="N.Big" rel="NBig">
					<img src="big/big4.png" style="width: 100%">
					</a>
				</div>
			</div>
			<div class="row centered" style="margin-top: 10px;">
				
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="big/big5.png" class="swipebox" title="N.Big" rel="NBig">
					<img src="big/big5.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="big/big6.png" class="swipebox" title="N.Big" rel="NBig">
					<img src="big/big6.png" style="width: 100%">
					</a>
				</div>
			</div>
        </div>
        <div class="modal-footer">
          <form action="" method="post">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
          	<input type="hidden" value="150" name="voteID">
          	<input type="submit" class="btn btn-block btn-success" value="ยืนยันการโหวต" style="font-size: 17px;" name="voteMale">
      	  </form>
        </div>
      </div>
      
    </div>
  </div>
 <div class="modal fade" id="NJab" role="dialog" style="margin-top: 50px;">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-fw fa-star"></i>&nbsp;โหวจน้องแจ๊บ</h4>
        </div>
        <div class="modal-body">
        	<div class="row">
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="jab/jabber1.png" class="swipebox" title="N.Jab" rel="NJab">
					<img src="jab/jabber1.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="jab/jabber2.png" class="swipebox" title="N.Jab" rel="NJab">
					<img src="jab/jabber2.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="jab/jabber3.png" class="swipebox" title="N.Jab" rel="NJab">
					<img src="jab/jabber3.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="jab/jabber4.png" class="swipebox" title="N.Jab" rel="NJab">
					<img src="jab/jabber4.png" style="width: 100%">
					</a>
				</div>
			</div>
			<div class="row centered" style="margin-top: 10px;">
				
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="jab/jabber5.png" class="swipebox" title="N.Jab" rel="NJab">
					<img src="jab/jabber5.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="jab/jabber6.png" class="swipebox" title="N.Jab" rel="NJab">
					<img src="jab/jabber6.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="jab/jabber7.png" class="swipebox" title="N.Jab" rel="NJab">
					<img src="jab/jabber7.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="jab/jabber8.png" class="swipebox" title="N.Jab" rel="NJab">
					<img src="jab/jabber8.png" style="width: 100%">
					</a>
				</div>
			</div>
        </div>
        <div class="modal-footer">
          <form action="" method="post">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
          	<input type="hidden" value="102" name="voteID">
          	<input type="submit" class="btn btn-block btn-success" value="ยืนยันการโหวต" style="font-size: 17px;" name="voteMale">
      	  </form>
        </div>
      </div>
      
    </div>
  </div>
 <div class="modal fade" id="NSming" role="dialog" style="margin-top: 50px;">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-fw fa-star"></i>&nbsp;โหวตน้องสมิง</h4>
        </div>
        <div class="modal-body">
        	<div class="row">
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="sming/sming1.png" class="swipebox" title="N.Sming" rel="NSming">
					<img src="sming/sming1.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="sming/sming2.png" class="swipebox" title="N.Sming" rel="NSming">
					<img src="sming/sming2.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="sming/sming3.png" class="swipebox" title="N.Sming" rel="NSming">
					<img src="sming/sming3.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="sming/sming4.png" class="swipebox" title="N.Sming" rel="NSming">
					<img src="sming/sming4.png" style="width: 100%">
					</a>
				</div>
			</div>
			<div class="row centered" style="margin-top: 10px;">
				
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="sming/sming5.png" class="swipebox" title="N.Sming" rel="NSming">
					<img src="sming/sming5.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="sming/sming6.png" class="swipebox" title="N.Sming" rel="NSming">
					<img src="sming/sming6.png" style="width: 100%">
					</a>
				</div>
			</div>
        </div>
        <div class="modal-footer">
          <form action="" method="post">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
          	<input type="hidden" value="99" name="voteID">
          	<input type="submit" class="btn btn-block btn-success" value="ยืนยันการโหวต" style="font-size: 17px;" name="voteMf">
      	  </form>
        </div>
      </div>
      
    </div>
  </div>
<div class="modal fade" id="NSin" role="dialog" style="margin-top: 50px;">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-fw fa-star"></i>&nbsp;โหวตน้องสิน</h4>
        </div>
        <div class="modal-body">
        	<div class="row">
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="sin/sin1.png" class="swipebox" title="N.Sin" rel="NSin">
					<img src="sin/sin1.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="sin/sin2.png" class="swipebox" title="N.Sin" rel="NSin">
					<img src="sin/sin2.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="sin/sin3.png" class="swipebox" title="N.Sin" rel="NSin">
					<img src="sin/sin3.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="sin/sin4.png" class="swipebox" title="N.Sin" rel="NSin">
					<img src="sin/sin4.png" style="width: 100%">
					</a>
				</div>
			</div>
			<div class="row centered" style="margin-top: 10px;">
				
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="sin/sin5.png" class="swipebox" title="N.Sin" rel="NSin">
					<img src="sin/sin5.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="sin/sin6.png" class="swipebox" title="N.Sin" rel="NSin">
					<img src="sin/sin6.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="sin/sin7.png" class="swipebox" title="N.Sin" rel="NSin">
					<img src="sin/sin7.png" style="width: 100%">
					</a>
				</div>
			</div>
        </div>
        <div class="modal-footer">
          <form action="" method="post">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
          	<input type="hidden" value="116" name="voteID">
          	<input type="submit" class="btn btn-block btn-success" value="ยืนยันการโหวต" style="font-size: 17px;" name="voteMf">
      	  </form>
        </div>
      </div>
      
    </div>
  </div>
 <div class="modal fade" id="NNu" role="dialog" style="margin-top: 50px;">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-fw fa-star"></i>&nbsp;โหวตน้องณุ</h4>
        </div>
        <div class="modal-body">
        	<div class="row">
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="Nu/Nu1.png" class="swipebox" title="N.Nu" rel="NNu">
					<img src="Nu/Nu1.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="Nu/Nu2.png" class="swipebox" title="N.Nu" rel="NNu">
					<img src="Nu/Nu2.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="Nu/Nu3.png" class="swipebox" title="N.Nu" rel="NNu">
					<img src="Nu/Nu3.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="Nu/Nu4.png" class="swipebox" title="N.Nu" rel="NNu">
					<img src="Nu/Nu4.png" style="width: 100%">
					</a>
				</div>
			</div>
			<div class="row centered" style="margin-top: 10px;">
				
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="Nu/Nu5.png" class="swipebox" title="N.Nu" rel="NNu">
					<img src="Nu/Nu5.png" style="width: 100%">
					</a>
				</div>
			</div>
        </div>
        <div class="modal-footer">
          <form action="" method="post">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
          	<input type="hidden" value="141" name="voteID">
          	<input type="submit" class="btn btn-block btn-success" value="ยืนยันการโหวต" style="font-size: 17px;" name="voteMf">
      	  </form>
        </div>
      </div>
      
    </div>
  </div>
<div class="modal fade" id="NAof" role="dialog" style="margin-top: 50px;">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-fw fa-star"></i>&nbsp;โหวตพี่ออฟ (นกกระจอกเทศ)</h4>
        </div>
        <div class="modal-body">
        	<div class="row">
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="aof/Aof1.png" class="swipebox" title="N.Aof" rel="NAof">
					<img src="aof/Aof1.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="aof/Aof2.png" class="swipebox" title="N.Aof" rel="NAof">
					<img src="aof/Aof2.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="aof/Aof3.png" class="swipebox" title="N.Aof" rel="NAof">
					<img src="aof/Aof3.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="aof/Aof4.png" class="swipebox" title="N.Aof" rel="NAof">
					<img src="aof/Aof4.png" style="width: 100%">
					</a>
				</div>
			</div>
			<div class="row centered" style="margin-top: 10px;">
				
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="aof/Aof5.png" class="swipebox" title="N.Aof" rel="NAof">
					<img src="aof/Aof5.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="aof/Aof6.png" class="swipebox" title="N.Aof" rel="NAof">
					<img src="aof/Aof6.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="aof/Aof7.png" class="swipebox" title="N.Aof" rel="NAof">
					<img src="aof/Aof7.png" style="width: 100%">
					</a>
				</div>
			</div>
        </div>
        <div class="modal-footer">
          <form action="" method="post">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
          	<input type="hidden" value="7" name="voteID">
          	<input type="submit" class="btn btn-block btn-success" value="ยืนยันการโหวต" style="font-size: 17px;" name="voteStar">
      	  </form>
        </div>
      </div>
      
    </div>
  </div>

 <div class="modal fade" id="NFort" role="dialog" style="margin-top: 50px;">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-fw fa-star"></i>&nbsp;โหวตพี่โฟร์ท</h4>
        </div>
        <div class="modal-body">
        	<div class="row">
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="Fort/Fort1.png" class="swipebox" title="N.Fort" rel="NFort">
					<img src="Fort/Fort1.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="Fort/Fort2.png" class="swipebox" title="N.Fort" rel="NFort">
					<img src="Fort/Fort2.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="Fort/Fort3.png" class="swipebox" title="N.Fort" rel="NFort">
					<img src="Fort/Fort3.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="Fort/Fort4.png" class="swipebox" title="N.Fort" rel="NFort">
					<img src="Fort/Fort4.png" style="width: 100%">
					</a>
				</div>
			</div>
			<div class="row centered" style="margin-top: 10px;">
				
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="Fort/Fort5.png" class="swipebox" title="N.Fort" rel="NFort">
					<img src="Fort/Fort5.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="Fort/Fort6.png" class="swipebox" title="N.Fort" rel="NFort">
					<img src="Fort/Fort6.png" style="width: 100%">
					</a>
				</div>
			</div>
        </div>
        <div class="modal-footer">
          <form action="" method="post">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
          	<input type="hidden" value="39" name="voteID">
          	<input type="submit" class="btn btn-block btn-success" value="ยืนยันการโหวต" style="font-size: 17px;" name="voteStar">
      	  </form>
        </div>
      </div>
      
    </div>
  </div>

<div class="modal fade" id="NOab" role="dialog" style="margin-top: 50px;">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-fw fa-star"></i>&nbsp;โหวตพี่โอบ</h4>
        </div>
        <div class="modal-body">
        	<div class="row">
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="Oab/Oab1.png" class="swipebox" title="N.Oab" rel="NOab">
					<img src="Oab/Oab1.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="Oab/Oab2.png" class="swipebox" title="N.Oab" rel="NOab">
					<img src="Oab/Oab2.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="Oab/Oab3.png" class="swipebox" title="N.Oab" rel="NOab">
					<img src="Oab/Oab3.png" style="width: 100%">
					</a>
				</div>
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="Oab/Oab4.png" class="swipebox" title="N.Oab" rel="NOab">
					<img src="Oab/Oab4.png" style="width: 100%">
					</a>
				</div>
			</div>
			<div class="row centered" style="margin-top: 10px;">
				
				<div class="col-sm-3" style="margin-top: 10px;">
					<a href="Oab/Oab5.png" class="swipebox" title="N.Oab" rel="NOab">
					<img src="Oab/Oab5.png" style="width: 100%">
					</a>
				</div>
        </div>
        <div class="modal-footer">
          <form action="" method="post">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
          	<input type="hidden" value="38" name="voteID">
          	<input type="submit" class="btn btn-block btn-success" value="ยืนยันการโหวต" style="font-size: 17px;" name="voteStar">
      	  </form>
        </div>
      </div>
      
    </div>
  </div>

</div>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/nanobar.min.js"></script>
<script type="text/javascript" src="/js/sweetalert.js"></script>
<script type="text/javascript" src="/js/jquery.swipebox.min.js"></script>
<?php
	if(isset($_POST['voteFemale'])){
		$UpdateFemale = "UPDATE `star_votes` SET `vote_f_profile_id` = ? WHERE `user_id` = ?; ";
		$QueryFemale = $pdo->prepare($UpdateFemale);
		$ArrayFemale = array($_POST['voteID'], Auth::user()->id);
		$QueryFemale->execute($ArrayFemale);
		?>
		<script type="text/javascript">
			swal({
			  title: "Success",
			  text: "Vote Finised",
			  icon: "success",
			  button: "Next",
			});
		</script>
		<?php
		exit();
	}
	if(isset($_POST['voteMale'])){
		$UpdateMale = "UPDATE `star_votes` SET `vote_m_profile_id` = ? WHERE `user_id` = ?; ";
		$QueryMale = $pdo->prepare($UpdateMale);
		$ArrayMale = array($_POST['voteID'], Auth::user()->id);
		$QueryMale->execute($ArrayMale);
		?>
		<script type="text/javascript">
			swal({
			  title: "Success",
			  text: "Vote Finised",
			  icon: "success",
			  button: "Next",
			});
		</script>
		<?php
		exit();
	}
	if(isset($_POST['voteStar'])){
		$UpdateStar = "UPDATE `star_votes` SET `vote_s_profile_id` = ? WHERE `user_id` = ?; ";
		$QueryStar = $pdo->prepare($UpdateStar);
		$ArrayStar = array($_POST['voteID'], Auth::user()->id);
		$QueryStar->execute($ArrayStar);
		?>
		<script type="text/javascript">
			swal({
			  title: "Success",
			  text: "Vote Finised",
			  icon: "success",
			  button: "Next",
			});
		</script>
		<?php
		exit();
	}
	if(isset($_POST['voteMf'])){
		$UpdateMF = "UPDATE `star_votes` SET `vote_mf_profile_id` = ? WHERE `user_id` = ?; ";
		$QueryMF = $pdo->prepare($UpdateMF);
		$ArrayMF = array($_POST['voteID'], Auth::user()->id);
		$QueryMF->execute($ArrayMF);
		?>
		<script type="text/javascript">
			swal({
			  title: "Success",
			  text: "Vote Finised",
			  icon: "success",
			  button: "Next",
			});
		</script>
		<?php
		exit();
	}
?>

	<script type="text/javascript">
	$( document ).ready(function() {

			/* Basic Gallery */
			$( '.swipebox' ).swipebox();
			
      });
	function main(){
		window.location.href = "/starvotefinal";
	}
	function gallery(){
		window.location.href = "/vote";
	}
	function vote(){
		window.location.href = "/allStar";	
	}
	</script>
</body>
</html>